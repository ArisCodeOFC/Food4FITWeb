<?php
    require_once("Model.class.php");

    /* Classe modelo de Funcionario */
    class Funcionario extends Model {
        /* Atributos */
        public $id;
        public $matricula;
        public $nome;
        public $email;

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
