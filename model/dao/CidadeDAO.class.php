<?php

    require_once("Database.class.php");
    class CidadeDAO {
        public static function listar(){


            $lista = [];

            $conn = Database::getConnection();

            $stmt = $conn->prepare("SELECT * FROM tbl_cidade");


            if($stmt->execute()){
                while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $listarCidade = new Cidade();
                    $listarCidade->setId($resultado['id']);
                    $listarCidade->setEstado($resultado['id_estado']);
                    $listarCidade->setCidade($resultado['cidade']);

                    $lista[] = $listarCidade;



                }
            }


            $conn = null;
            return $lista;
        }
    }
?>
