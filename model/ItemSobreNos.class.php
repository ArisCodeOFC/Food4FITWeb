<?php
    require_once("Model.class.php");

    /* Classe modelo de Sobre Nós */
    class ItemSobreNos extends Model {
        /* Atributos */
        public $id;
        public $titulo;
        public $imagem;
        public $texto;
        public $ativo = true;

        /*
        * Método construtor
        * @param $json Objeto JSON para ser lido, por padrão nulo
        */
        public function __construct($json = null) {
            /* Chama o construtor da classe Model */
            parent::__construct(__CLASS__, $json);
        }
    }
?>
