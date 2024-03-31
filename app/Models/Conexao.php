<?php

class Conexao {
    private static $instancia;

    private function __construct() {}

    public static function getConexao() {
        // verifica se $instancia já foi definida
        if (!isset(self::$instancia)) {
            // Define os parâmetros do banco de dados
            $dbname = 'gabi';
            $host = 'localhost';
            $user = 'root';
            $password = '';

            // tenta conectar
            try {
                self::$instancia = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
                // define para que o PDO lance exceções em caso de erro
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                // Em caso de erro, lança uma exceção
                throw new Exception('Erro ao conectar ao banco de dados: ' . $error->getMessage());
            }
        }

        // Retorna a instância da conexão PDO
        return self::$instancia;
    }
}
