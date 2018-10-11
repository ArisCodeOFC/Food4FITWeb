<?php
    require_once("Controller.class.php");
    require_once(__DIR__ . "/../model/FaleConosco.class.php");
    require_once(__DIR__ . "/../model/dao/FaleConoscoDAO.class.php");

    class FaleConoscoController extends Controller{
        /* Inicializa todas as rotas que serão tratadas */
        public function init(){
            $this->criarRota("GET", "fale_conosco", "listarTodos");
            $this->criarRota("POST", "fale_conosco", "inserir");
            $this->criarRota("GET", "fale_conosco/{id}", "selecionar");
            $this->criarRota("DELETE", "fale_conosco/{id}", "excluir");
            //$this->criarRota("DELETE", "fale_conosco/{id}", "excluirMarcados");
        }


        public function listarTodos(){

        }


        public function inserir(){
            $menssagem = new FaleConosco($this->dados);

            if(!$menssagem){
                $this->api->enviarStatus(403, "Preencha todos os campos.");
            }else{
                $resultado = FaleConoscoDAO::inserir($menssagem);
                if($resultado){
                    $this->api->enviarResultado($resultado);
                }else{
                    $this->api->enviarStatus(500, "Não foi possível inserir.");
                }

            }
        }


        public function selecionar(){
            $menssagem = FaleConoscoDAO::selecionar($id);
            if ($menssagem) {
                $this->api->enviarResultado($menssagem);
            } else {
                $this->api->enviarStatus(404, "Menssagem não encontrado");
            }
        }


        public function excluir($id){
            if(FaleConoscoDAO::excluir($id)){
                $this->api->enviarStatus(204);
            }else{
                $this->api->enviarStatus(404, "Menssagem não encontrada");
            }
        }


        public function excluirMarcados(){

        }
    }


//        public function listarTodos() {
//            $this->api->enviarResultado(IngredienteController::listar());
//        }
//
//
//        public static function listar() {
//            return IngredienteDAO::listar();
//        }


?>
