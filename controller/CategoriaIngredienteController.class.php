<?php
    require_once("InterfaceAPI.class.php");
    require_once(__DIR__ . "/../model/CategoriaIngrediente.class.php");
    require_once(__DIR__ . "/../model/dao/CategoriaIngredienteDAO.class.php");

    class CategoriaIngredienteController implements InterfaceAPI {
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
            $this->api->criarRota("POST", "categoria-ingrediente", [$this, "inserir"]);
            $this->api->criarRota("GET", "categoria-ingrediente/{id}", [$this, "selecionarItem"]);
            $this->api->criarRota("PUT", "categoria-ingrediente/{id}", [$this, "atualizar"]);
            $this->api->criarRota("PUT", "categoria-ingrediente/{id}/ativar", [$this, "ativar"]);
            $this->api->criarRota("DELETE", "categoria-ingrediente/{id}", [$this, "excluir"]);
        }

        public function inserir() {
            $categoria = new CategoriaIngrediente($this->api->dados);
            try {
                $categoria->startUpload("assets/images/categorias");
                if (CategoriaIngredienteDAO::inserir($categoria)) {
                    $this->api->enviarResultado($categoria);
                } else {
                    $this->api->enviarStatus(500, "Não foi possível inserir.");
                }

            } catch (Exception $erro) {
                $this->api->enviarStatus(500, $erro->getMessage());
            }
        }

        public function selecionarItem($id) {
            $categoria = CategoriaIngredienteDAO::selecionar($id);
            if ($categoria) {
                $this->api->enviarResultado($categoria);
            } else {
                $this->api->enviarStatus(404, "Categoria não encontrada");
            }
        }

        public function atualizar($id) {
            $categoria = new CategoriaIngrediente($this->api->dados);
            try {
                $categoria->startUpload("assets/images/categorias");
                if (CategoriaIngredienteDAO::atualizar($id, $categoria)) {
                    $this->api->enviarResultado($categoria);
                } else {
                    $this->api->enviarStatus(404, "Categoria não encontrada");
                }

            } catch (Exception $erro) {
                $this->api->enviarStatus(500, $erro->getMessage());
            }
        }

        public function ativar($id) {
            if (CategoriaIngredienteDAO::ativar($id)) {
               $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(404, "Categoria não encontrada");
            }
        }

        public function excluir($id) {
            try {
                if (CategoriaIngredienteDAO::excluir($id)) {
                    $this->api->enviarStatus(204);
                } else {
                    $this->api->enviarStatus(404, "Categoria não encontrada");
                }

            } catch (PDOException $error) {
                if ($error->getCode()) {
                    $this->api->enviarStatus(403, "Você não pode excluir esta categoria, pois ela possui ingredientes atrelados á ela.");
                } else {
                    throw $error;
                }
            }
        }

        public static function listar() {
            return CategoriaIngredienteDAO::listar();
        }
    }
?>
