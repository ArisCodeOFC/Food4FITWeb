<?php
    require_once("InterfaceAPI.class.php");
    require_once(__DIR__ . "/../model/Funcionario.class.php");
    require_once(__DIR__ . "/../model/dao/FuncionarioDAO.class.php");

    /* Classe responsável por controlar todas as APIs relacionadas a funcionário */
    class FuncionarioController implements InterfaceAPI {
        /* Objeto API utilizado para tratar as rotas */
        private $api;

        /*
        * Método construtor
        * @param $api Objeto da classe API
        */
        public function __construct($api) {
            $this->api = $api;
        }

        /* Inicializa todas as rotas que serão tratadas */
        public function init() {
            $this->api->criarRota("POST", "funcionarios/login", [$this, "login"]);
            $this->api->criarRota("POST", "funcionarios/logout", [$this, "logout"]);
        }

        /* Login de funcionários no CMS */
        public function login() {
            $dados = $this->api->dados;
            $funcionario = FuncionarioDAO::login($dados->matricula, $dados->senha);

            if ($funcionario) {
                session_start();
                $_SESSION["funcionario"] = $funcionario;

                $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(401);
            }
        }

        /* Efetua o logout de um usuário logado */
        public function logout() {
            session_start();
            if (isset($_SESSION["funcionario"])) {
                session_destroy();
                $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(401);
            }
        }

        /*
        * Pega o funcionario atual logado em sessão
        * @return Funcionario Caso possua um login em sessão
        * @return null Caso não esteja logado
        */
        public static function getFuncionarioAtual() {
            session_start();
            if (isset($_SESSION["funcionario"])) {
                return $_SESSION["funcionario"];
            } else {
                return null;
            }
        }
    }
?>
