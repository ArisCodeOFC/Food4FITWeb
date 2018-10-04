<?php
    require_once("Database.class.php");

    class VantagemComidaFitnessDAO {
        public static function listar() {
            $itens = array();
            $conn = Database::getConnection();
            $stmt = $conn->prepare("select id, id_funcionario, titulo, texto, ativo, DATE_FORMAT(data, '%d/%m/%Y') from tbl_vantagem_comida_fitness ORDER BY id DESC");

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $itens[] = new VantagemComidaFitness(Model::convertArray($rs));
                }
            }

            $conn = null;
            return $itens;
        }
    }
?>
