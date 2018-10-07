<?php


    class Cidade{
        private $id;
        private $idEstado;
        private $cidade;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getIdEstado(){
		return $this->idEstado;
	}

	public function setIdEstado($idEstado){
		$this->estado = $idEstado;
	}

	public function getCidade(){
		return $this->cidade;
	}

	public function setCidade($cidade){
		$this->cidade = $cidade;
	}

    }
?>
