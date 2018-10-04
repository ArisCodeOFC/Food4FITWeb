<?php
    require_once("Database.class.php");

    /* Classe FuncionarioDAO, responsável por fazer o acesso ao banco de dados do objeto Funcionario */
    class FuncionarioDAO {
        /*
        * Tenta fazer o login de um funcionário
        * @param $matricula Matricula do funcionário
        * @param $senha Senha do funcinonário
        * @return Funcionario Caso os dados de login informados estejam corretos
        * @return null Caso os dados estejam incorretos
        */
        public static function login($matricula, $senha) {
            $funcionario = null;
            $conn = Database::getConnection();
            $stmt = $conn->prepare("SELECT id, nome, sobrenome, email, matricula FROM tbl_funcionario WHERE matricula = ? AND senha = ?");
            $stmt->bindParam(1, $matricula);
            $stmt->bindValue(2, md5($senha));

            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $funcionario = new Funcionario($rs);
                }
            }

            $conn = null;
            return $funcionario;
        }
    }
?>
