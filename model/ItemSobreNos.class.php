<?php
    require_once("Model.class.php");
    require_once("UploadModel.class.php");

    /* Classe modelo de Sobre Nós */
    class ItemSobreNos extends UploadModel {
        /* Atributos */
        protected $id;
        protected $titulo;
        protected $foto;
        protected $texto;
        protected $ativo = true;

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

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setFoto($foto) {
            $this->foto = $foto;
        }

        public function getTexto() {
            return $this->texto;
        }

        public function setTexto($texto) {
            $this->texto = $texto;
        }

        public function isAtivo() {
            return $this->ativo;
        }

        public function setAtivo($ativo) {
            $this->ativo = $ativo;
        }
    }
?>
