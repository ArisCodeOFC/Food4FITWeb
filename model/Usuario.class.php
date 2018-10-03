<?php
    require_once("Model.class.php");

    /* Classe modelo de Usuário */
    class Usuario extends Model {
        /* Atributos */
        protected $id;
        protected $nome;
        protected $sobrenome;
        protected $email;
        protected $hash;

        /*
        * Método construtor
        * @param $json Objeto JSON para ser lido, por padrão nulo
        */
        public function __construct($json = null) {
            /* Chama o construtor da classe Model */
            parent::__construct(__CLASS__, $json);
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getSobrenome() {
            return $this->sobrenome;
        }

        public function setSobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setHash($email, $senha) {
            $hash = base64_encode($email) . ":" . base64_encode($senha);
            $hash = md5($hash);
            $hash = hash("sha256", $hash);
            $hash = md5($hash . "FOOD4FIT");
            $hash = hash("sha256", $hash);
            $hash = base64_encode($hash);
            $this->hash = $hash;
        }

        public function getHash() {
            return $this->hash;
        }
    }
?>
