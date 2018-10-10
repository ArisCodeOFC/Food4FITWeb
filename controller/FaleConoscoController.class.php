<?php
    require_once("Controller.class.php");
    require_once(__DIR__ . "/../modelFaleConosco.class.php");
    require_once(__DIR__ . "/../dao/modelFaleConoscoDAO.class.php");

    class FaleConoscoController extends Controller{
        /* Inicializa todas as rotas que serão tratadas */
        public function init(){
            $this->criarRota("GET", "fale_conosco", "listarTodos");
            $this->criarRota("POST", "fale_conosco", "inserir");
            $this->criarRota("GET", "fale_conosco/{id}", "selecionar");
            $this->criarRota("DELETE", "fale_conosco/{id}", "excluir");
        }
    }
?>







<?php


    class IngredienteController extends Controller {
        /* Inicializa todas as rotas que serão tratadas */
        public function init() {
            $this->criarRota("GET", "ingrediente", "listarTodos");
            $this->criarRota("POST", "ingrediente", "inserir");
            $this->criarRota("GET", "ingrediente/{id}", "selecionarItem");
            $this->criarRota("DELETE", "ingrediente/{id}", "excluir");
        }

        public function listarTodos() {
            $this->api->enviarResultado(IngredienteController::listar());
        }

        public function inserir() {
            $ingrediente = new Ingrediente($this->dados);
            if (!$ingrediente->getUnidadeMedida() || !$ingrediente->getCategoria()) {
                $this->api->enviarStatus(403, "Preencha todos os campos.");
            } else {
                try {
                    $ingrediente->startUpload("assets/images/ingredientes");
                    $resultado = IngredienteDAO::inserir($ingrediente);
                    if ($resultado) {
                        $this->api->enviarResultado($resultado);
                    } else {
                        $this->api->enviarStatus(500, "Não foi possível inserir.");
                    }

                } catch (Exception $erro) {
                    $this->api->enviarStatus(500, $erro->getMessage());
                }
            }
        }

        public function selecionarItem($id) {
            $ingrediente = IngredienteDAO::selecionar($id);
            if ($ingrediente) {
                $this->api->enviarResultado($ingrediente);
            } else {
                $this->api->enviarStatus(404, "Ingrediente não encontrado");
            }
        }



        public function excluir($id) {
            if (IngredienteDAO::excluir($id)) {
                $this->api->enviarStatus(204);
            } else {
                $this->api->enviarStatus(404, "Ingrediente não encontrado");
            }
        }

        public static function listar() {
            return IngredienteDAO::listar();
        }


    }
?>
