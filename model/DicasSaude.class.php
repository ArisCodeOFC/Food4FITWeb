<?php
    require_once("Model.class.php");

    class DicasSaude extends Model{
        protected $id;
        protected $idFuncionario;
        protected $titulo;
        protected $data;
        protected $texto;
        protected $status;


        public function __construct($json = null){
            parent::__construct(__CLASS__, $json);
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }


        public function getIdFunci(){
            return $this->idFuncionario;
        }

        public function setIdFuncionario($idFunc){
            $this->idFuncionario = $idFunc;
        }


        public function getTitulo(){
            return $this->titulo;
        }

        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }


        public function getData(){
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }


        public function getTexto(){
            return $this->texto;
        }

        public function setTexto($texto){
            $this->texto = $texto;
        }


        public function getStatus(){
            return $this->status;
        }

        public function setStatus($status){
            $this->status = $status;
        }

    }
?>
