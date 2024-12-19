<?php
<<<<<<< HEAD
    class Conexao {
        private $conexao = null;    
        
        function __construct() {
            try {
                $this->conexao = new PDO("mysql:host=localhost;dbname=controleEstoque", "root", "");
                $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(Exception $erro) {
                throw $erro;
            }
        }

        public function getConexao() {
            return $this->conexao;
        }

        public function fechar() {
            $this->conexao=null;
        }
    }
?>
=======
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
>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
