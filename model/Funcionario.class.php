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

        /*
        * Pega as inicias do nome do funcionário
        * @return string Primeira letra do nome e do último nome caso exista
        */
        public function getIniciaisNome() {
            $iniciaisNome = "";
            $listaNomes = explode(" ", $this->nome);
            $quantidadeNomes = count($listaNomes);
            if ($quantidadeNomes > 0) {
                $iniciaisNome .= substr($listaNomes[0], 0, 1);
                if ($quantidadeNomes > 1) {
                    $iniciaisNome .= substr($listaNomes[$quantidadeNomes - 1], 0, 1);
                }
            }

            return strtoupper($iniciaisNome);
        }
    }
?>
