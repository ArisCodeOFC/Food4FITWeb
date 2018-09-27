<?php
    require_once("Database.class.php");
    class LojaDAO {
        public static function inserir($loja) {
            $conn = Database::getConnection();

            $stmt = $conn->prepare("INSERT INTO tbl_endereco (id_cidade, logradouro, numero, bairro, cep, complemento) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $loja->getIdCidade());
            $stmt->bindParam(2, $loja->getLogradouro());
            $stmt->bindParam(3, $loja->getNumero());
            $stmt->bindParam(4, $loja->getBairro());
            $stmt->bindParam(5, $loja->getCep());
            $stmt->bindParam(6, $loja->getComplemento());
            $stmt->execute();

            $idEndereco = $conn->lastInsertId();
            if ($idEndereco) {
                $stmt2 = $conn->prepare("INSERT INTO tbl_nossa_loja (id_endereco, latitude, longitude, funcionamento, ativo, telefone) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt2->bindParam(1, $idEndereco);
                $stmt2->bindParam(2, $loja->getLatitude());
                $stmt2->bindParam(3, $loja->getLongitude());
                $stmt2->bindParam(4, $loja->getFuncionamento());
                $stmt2->bindParam(5, $loja->getAtivo(), PDO::PARAM_INT);
                $stmt2->bindParam(6, $loja->getTelefone());
                $stmt2->execute();
            }

            $conn = null;
        }

        public static function listar() {
            $conn = Database::getConnection();
            $lojas = array();

            $stmt = $conn->prepare("select l.*, e.logradouro, e.numero,
                e.bairro, e.cep, e.complemento,
                c.cidade, es.estado, es.UF as uf
                from tbl_nossa_loja as l
                inner join tbl_endereco as e on l.id_endereco = e.id
                inner join tbl_cidade as c on c.id = e.id_cidade
                inner join tbl_estado as es on c.id_estado = es.id");

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $loja = new Loja($rs);
                    $lojas[] = $loja;
                }
            }

            $conn = null;
            return $lojas;
        }
    }
?>
