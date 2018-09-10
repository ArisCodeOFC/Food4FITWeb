<?php
    /* Classe responsável por controlar e tratar resquisições da API */
    class APIController {
        /* URL requisitada pelo usuário para API */
        private $url = "";

        /* Método HTTP utilizado: GET, POST, PUT ou DELETE */
        private $metodo = "";

        /* Dados enviado pela requisição via "body" em formato JSON */
        public $dados = array();

        /* Varíavel para definir se a API foi executada com sucesso ou não */
        public $sucesso = false;

        /* Lista de respostas HTTP para serem tratadas pelo cliente */
        private $listaStatus = array(
            204 => "No Content",
            401 => "Unauthorized",
            404 => "Not Found",
            405 => "Method Not Allowed",
            500 => "Internal Server Error",
        );

        /* Método contrutor */
        public function __construct() {
            /* Desabilita a proteção CORS e diz que o resultado da resposta será um JSON */
            header("Access-Control-Allow-Orgin: *");
            header("Access-Control-Allow-Methods: *");
            header("Content-Type: application/json");
            //error_reporting(0);

            /* Pega a url da requisição que foi mandada pelo arquivo .htaccess */
            if (isset($_REQUEST["request"])) {
                $this->url = $_REQUEST["request"];

                /* Define qual é o método HTTP que está sendo utilizado no momento */
                $this->metodo = $_SERVER["REQUEST_METHOD"];
                if ($this->metodo == "POST" && array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER)) {
                    if ($_SERVER["HTTP_X_HTTP_METHOD"] == "DELETE") {
                        $this->metodo = "DELETE";
                    } else if ($_SERVER["HTTP_X_HTTP_METHOD"] == "PUT") {
                        $this->metodo = "PUT";
                    } else {
                        $this->enviarStatus(405, "Metodo não autorizado");
                        return;
                    }
                }

                /* Verfica se o método da requsição é autorizado pela API e decodifica os dados recebidos em formato JSON (ou via URL caso a requisição seja em GET) */
                if ($this->metodo == "POST" || $this->metodo == "PUT" || $this->metodo == "DELETE") {
                    $this->dados = json_decode(file_get_contents("php://input"));
                } else if ($this->metodo == "GET") {
                    $this->dados = $_GET;
                } else {
                    $this->enviarStatus(405, "Metodo não autorizado");
                }
            }
        }

        /*
        * Envia um status de uma resposta HTTP para o cliente e imprime opcionalmente uma mensagem para o usuário
        * @param $status código de status para ser enviado ao cliente
        * @param $resultado uma mensagem qualquer para ser exibida ao cliente, por padrão vazia
        */
        public function enviarStatus($status, $resultado = "") {
            header("HTTP/1.1 " . $status . " " . $this->procurarStatus($status));
            if ($resultado) {
                $this->enviarResultado(array("result" => $resultado));
            }
        }

        /*
        * Procura uma descrição para uma resposta HTTP
        * @param $status código de status para ser procurado
        * @return string descrição para a resposta HTTP, ou por padrão a descrição da resposta de status 500 (erro no servidor)
        */
        private function procurarStatus($status) {
            return $this->listaStatus[$status] ? $this->listaStatus[$status] : $this->listaStatus[500];
        }

        /*
        * Imprime um resultado para o cliente em formato JSON
        * @param $resultado uma mensagem para ser mostrada
        */
        public function enviarResultado($resultado) {
            echo(preg_replace("/,\s*\"[^\"]+\":null|\"[^\"]+\":null,?/", "", json_encode($resultado, JSON_UNESCAPED_UNICODE)));
        }

        /*
        * Cria uma rota para ser tratada pela api
        * @param $metodo método HTTP que será tratado por esta rota (GET, POST, PUT, DELETE),
        * @param $rota a rota a ser tratada pela api (Exemplo: "usuarios/{idUsuario}/tarefas/{idTarefas}")
        * @param $funcao uma função que será executada caso a rota esteja correta
        */
        public function criarRota($metodo, $rota, $funcao) {
            /* Verifica se o método HTTP requisitado pela rota é o mesmo que foi recebido */
            if (!$this->sucesso && $metodo == $this->metodo) {
                /* Cria uma expressão regular para procurar os parâmetros da url entre {} */
                $regex = "/^" . str_replace("/", "\\/", preg_replace("/\{(\w+)\}/", "(?P<$1>\w+)", $rota)) . "\/{0,}$/";
                /* Joga os parâmetros da url em um array */
                preg_match($regex, $this->url, $resultado);
                /* Verifica se a rota consiste com a requisição do usuário */
                if (!empty($resultado)) {
                    /* Remove os indíces numéricos do resultado da expressão regular, deixando apenas os parâmetros da url */
                    foreach (range(0, floor(count($resultado) / 2)) as $index) {
                        unset($resultado[$index]);
                    }

                    /* Chama a função, passando o resultado da expressão regular como parâmetros para a função */
                    try {
                        call_user_func_array($funcao, $resultado);
                    } catch (PDOException $erro) {
                        /* Caso algum erro de banco de dados tenha acontecido durante a execução, ele é interceptado e o cliente recebe um status de erro 500 */
                        $this->enviarStatus(500, "Erro no banco de dados. " . (count($erro->errorInfo) >= 3 ? $erro->errorInfo[2] : $erro->getMessage()));
                    }

                    /* Define que a API foi executada com sucesso */
                    $this->sucesso = true;
                }
            }
        }

        /* Inicializa todas as rotas declaradas */
        public function inicializar() {
            /* Faz um loop em todas as classes PHP */
            foreach (get_declared_classes() as $nomeClasse) {
                /* Verifica se a classe implementa a interface "InterfaceAPI" */
                if (in_array("InterfaceAPI", class_implements($nomeClasse))) {
                    /* Cria uma nova instância da classe e inicializa ela */
                    $classe = new $nomeClasse($this);
                    $classe->init();
                }
            }

            /* Caso nenhuma rota tenha sido encontrada, retorna um erro 404 */
            if (!$this->sucesso) {
                $this->enviarStatus(404, "Rota não encontrada");
            }
        }
    }
?>
