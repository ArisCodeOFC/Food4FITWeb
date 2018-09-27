<?php
    require_once("Controller.class.php");
    require_once(__DIR__ . "/../model/Loja.class.php");
    require_once(__DIR__ . "/../model/dao/LojaDAO.class.php");

    class LojaController extends Controller {
        public function init() {
            $this->criarRota("POST", "loja/inserir", "inserir");
        }

        public function inserir() {
            $loja = new Loja($this->dados);
            LojaDAO::inserir($loja);
        }

        public static function listar() {
            return LojaDAO::listar();
        }
    }
?>
