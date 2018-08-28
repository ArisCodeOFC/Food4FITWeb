<?php
    /* Classe responsável por montar conexões com o banco de dados */
    class Database {
        /* Atributos de conexão */
        const HOST = "localhost";
        const USUARIO = "root";
        const SENHA = "bcd127";
        const DB = "db_food4fit";
        /* Define que o método "rowsCount()" do PDO irá retornar o número de linhas encontradas, e não o número de linhas alteradas, garantindo que o usuário não receba um erro caso um UPDATE não faça nenhuma alteração */
        const CONFIG = array(
            PDO::MYSQL_ATTR_FOUND_ROWS => true
        );

        /*
        * Retorna uma conexão com o banco de dados
        * @return PDO objeto para acesso do banco de dados caso a conexão seja feita com sucesso
        * @return JSON se a conexão não poder ser efetuada
        */
        public static function getConnection() {
            try {
                $conn = new PDO("mysql:host=" . Database::HOST . ";dbname=" . Database::DB, Database::USUARIO, Database::SENHA, Database::CONFIG);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conn->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
                return $conn;

            } catch (PDOException $erro) {
                die(json_encode(array("result" => $erro->getMessage())));
            }
        }
    }
?>
