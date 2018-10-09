<?php
    require_once("Database.class.php");

    class FaleConoscoDAO {
        public static function listar() {
            $itens = array();
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT v.id, v.id_funcionario, v.titulo, v.texto, v.ativo,  DATE_FORMAT(v.data, '%d/%m/%Y') AS data, CONCAT_WS(' ', f.nome, f.sobrenome) AS autor
            FROM tbl_fale_conosco AS v
            INNER JOIN tbl_funcionario AS f ON f.id = v.id_funcionario
            ORDER BY v.id DESC");

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $itens[] = new DicasSaude($rs);
                }
            }

            $conn = null;
            return $itens;
        }

        public static function selecionar($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT v.id, v.id_funcionario, v.titulo, v.texto, v.ativo,  DATE_FORMAT(v.data, '%d/%m/%Y') AS data, CONCAT_WS(' ', f.nome, f.sobrenome) AS autor
            FROM tbl_fale_conosco AS v
            INNER JOIN tbl_funcionario AS f ON f.id = v.id_funcionario
            WHERE v.id = ?");
            $stmt->bindParam(1, $id);

            $item = null;
            if ($stmt->execute()) {
                if ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $item = new DicasSaude($rs);
                }
            }

            $conn = null;
            return $item;
        }

        public static function inserir($item) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("INSERT INTO tbl_fale_conosco (nome, sobrenome, email, telefone, celular, assunto, observacao) VALUES (?, ?, ?, ?, ?, ?, ?))");
            $stmt->bindValue(1, $item->geNome());
            $stmt->bindValue(2, $item->getSobrenome());
            $stmt->bindValue(3, $item->getEmail());
            $stmt->bindValue(4, $item->getTelefone());
            $stmt->bindValue(5, $item->getCelular());
            $stmt->bindValue(6, $item->getAssunto());
            $stmt->bindValue(7, $item->getComentario());

            $resultado = null;
            if ($stmt->execute()) {
                $resultado = DicasSaudeDAO::selecionar($conn->lastInsertId());
            }

            $conn = null;
            return $resultado;
        }


        public static function excluir($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("DELETE FROM tbl_fale_conosco WHERE id = ?");
            $stmt->bindParam(1, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }
    }
?>
