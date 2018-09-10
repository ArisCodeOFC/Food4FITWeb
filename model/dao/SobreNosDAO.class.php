<?php
    require_once("Database.class.php");

    class SobreNosDAO {
        public static function listar() {
            $itens = array();
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT * FROM tbl_item_sobre_nos");

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $itens[] = new ItemSobreNos($rs);
                }
            }

            $conn = null;
            return $itens;
        }

        public static function selecionar($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT * FROM tbl_item_sobre_nos WHERE id = ?");
            $stmt->bindParam(1, $id);

            $item = null;
            if ($stmt->execute()) {
                if ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $item = new ItemSobreNos($rs);
                }
            }

            $conn = null;
            return $item;
        }

        public static function inserir($item) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("INSERT INTO tbl_item_sobre_nos (titulo, texto, imagem) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $item->titulo);
            $stmt->bindParam(2, $item->texto);
            $stmt->bindParam(3, $item->imagem);

            $resultado = null;
            if ($stmt->execute()) {
                $item->id = $conn->lastInsertId();
            }

            $conn = null;
            return true;
        }

        public static function atualizar($id, $item) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("UPDATE tbl_item_sobre_nos SET titulo = ?, texto = ?, imagem = ? WHERE id = ?");
            $stmt->bindParam(1, $item->titulo);
            $stmt->bindParam(2, $item->texto);
            $stmt->bindParam(3, $item->imagem);
            $stmt->bindParam(4, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }

        public static function ativar($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("UPDATE tbl_item_sobre_nos SET ativo = !ativo WHERE id = ?");
            $stmt->bindParam(1, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }

        public static function excluir($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("DELETE FROM tbl_item_sobre_nos WHERE id = ?");
            $stmt->bindParam(1, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }
    }
?>
