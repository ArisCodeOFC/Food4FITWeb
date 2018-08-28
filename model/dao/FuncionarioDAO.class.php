<?php
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
            if ($matricula == "1234" && $senha == "xpto") {
                $funcionario = new Funcionario();
                $funcionario->id = 1;
                $funcionario->nome = "Chico picadinho";
                $funcionario->email = "chico@voutecortar.com.br";
                $funcionario->matricula = 1234;
                return $funcionario;
            } else {
                return null;
            }
        }
    }
?>
