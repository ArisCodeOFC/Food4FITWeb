<?php
    require_once("Database.class.php");

    class DicasFitnessDAO {
        public static function listar() {
            $itens = array();
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT v.id, v.id_funcionario, v.titulo, v.texto, v.ativo,  DATE_FORMAT(v.data, '%d/%m/%Y') AS data, CONCAT_WS(' ', f.nome, f.sobrenome) AS autor
            FROM tbl_dica_fitness AS v
            INNER JOIN tbl_funcionario AS f ON f.id = v.id_funcionario
            ORDER BY v.id DESC");

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $itens[] = new DicasFitness($rs);
                }
            }

            $conn = null;
            return $itens;
        }

        public static function selecionar($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT v.id, v.id_funcionario, v.titulo, v.texto, v.ativo,  DATE_FORMAT(v.data, '%d/%m/%Y') AS data, CONCAT_WS(' ', f.nome, f.sobrenome) AS autor
            FROM tbl_dica_fitness AS v
            INNER JOIN tbl_funcionario AS f ON f.id = v.id_funcionario
            WHERE v.id = ?");
            $stmt->bindParam(1, $id);

            $item = null;
            if ($stmt->execute()) {
                if ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $item = new DicasFitness($rs);
                }
            }

            $conn = null;
            return $item;
        }

        public static function inserir($item) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("INSERT INTO tbl_dica_fitness (id_funcionario, titulo, texto, ativo, data) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bindValue(1, $item->getIdFuncionario());
            $stmt->bindValue(2, $item->getTitulo());
            $stmt->bindValue(3, $item->getTexto());
            $stmt->bindValue(4, $item->isAtivo(), PDO::PARAM_INT);

            $resultado = null;
            if ($stmt->execute()) {
                $resultado = DicasFitnessDAO::selecionar($conn->lastInsertId());
            }

            $conn = null;
            return $resultado;
        }

        public static function atualizar($id, $item) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("UPDATE tbl_dica_fitness SET titulo = ?, texto = ?, ativo = ? WHERE id = ?");
            $stmt->bindValue(1, $item->getTitulo());
            $stmt->bindValue(2, $item->getTexto());
            $stmt->bindValue(3, $item->isAtivo(), PDO::PARAM_INT);
            $stmt->bindParam(4, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }

        public static function ativar($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("UPDATE tbl_dica_fitness SET ativo = !ativo WHERE id = ?");
            $stmt->bindParam(1, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }

        public static function excluir($id) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("DELETE FROM tbl_dica_fitness WHERE id = ?");
            $stmt->bindParam(1, $id);
            $resultado = $stmt->execute() ? $stmt->rowCount() : -1;
            $conn = null;
            return $resultado;
        }
    }
?>
