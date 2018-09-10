<?php
    require_once("InterfaceAPI.class.php");
    require_once(__DIR__ . "/../model/ItemSobreNos.class.php");
    require_once(__DIR__ . "/../model/dao/SobreNosDAO.class.php");

    class SobreNosController implements InterfaceAPI {
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
            $this->api->criarRota("POST", "sobre-nos", [$this, "inserir"]);
            $this->api->criarRota("GET", "sobre-nos/{id}", [$this, "selecionarItem"]);
            $this->api->criarRota("PUT", "sobre-nos/{id}", [$this, "atualizar"]);
            $this->api->criarRota("PUT", "sobre-nos/{id}/ativar", [$this, "ativar"]);
            $this->api->criarRota("DELETE", "sobre-nos/{id}", [$this, "excluir"]);
        }

        public function inserir() {
            $item = new ItemSobreNos($this->api->dados);
            try {
                $item->startUpload("assets/images/sobre-nos");
                if (SobreNosDAO::inserir($item)) {
                    $this->api->enviarResultado($item);
                }

            } catch (Exception $erro) {
                $this->api->enviarStatus(500, $erro->getMessage());
            }
        }

        public function selecionarItem($id) {
            $item = SobreNosDAO::selecionar($id);
            if ($item) {
                $this->api->enviarResultado($item);
            } else {
                $this->api->enviarStatus(404, "Item não encontrado");
            }
        }

        public function atualizar($id) {
            $item = new ItemSobreNos($this->api->dados);
            try {
                $item->startUpload("assets/images/sobre-nos");
                if (SobreNosDAO::atualizar($id, $item)) {
                   $this->api->enviarResultado($item);
                } else {
                    $this->api->enviarStatus(404, "Item não encontrado");
                }

            } catch (Exception $erro) {
                $this->api->enviarStatus(500, $erro->getMessage());
            }
        }

        public function ativar($id) {
            if (SobreNosDAO::ativar($id)) {
               $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(404, "Item não encontrado");
            }
        }

        public function excluir($id) {
            if (SobreNosDAO::excluir($id)) {
               $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(404, "Item não encontrado");
            }
        }

        public static function listar() {
            return SobreNosDAO::listar();
        }
    }
?>
