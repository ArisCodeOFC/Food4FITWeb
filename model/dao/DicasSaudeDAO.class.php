<?php
    require_once("Database.class.php");

    class DicasSaudeDAO {

        public static function listar(){
            $dicas = array[];
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT * FROM tbl_dica_saude");

            if($stmt->execute()){
                while($rs = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $dicas = new DicasSaude(Model::convertArray($rs));
                }
            }

            $conn = null;
            return $dicas;
        }
    }
?>
