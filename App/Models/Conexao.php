<?php
// /App/Models/Conexao.php

class Conexao {
    public static function getInstance() {
        $dsn = "mysql:host=localhost;dbname=controleEstoque";
        $username = "root";
        $password = "";
        
        try {
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }
}
?>
