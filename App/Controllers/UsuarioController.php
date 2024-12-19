<?php
// /App/Controllers/CadastroController.php

// Corrigindo o caminho para garantir que o arquivo seja encontrado
require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Models/Conexao.php';

class CadastroController {
    private $conn; // Declarar a propriedade de conexão

    // Construtor para conectar ao banco
    public function __construct() {
        $conexao = new Conexao(); // Instancia a conexão
        $this->conn = $conexao->getConexao(); // Atribui à propriedade $conn
    }

    // Função para cadastrar um novo usuário
    public function cadastrar($usuario, $senha, $nivel_acesso) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha

        $sql = "INSERT INTO Usuarios (usuario, senha, nivel_acesso) VALUES (:usuario, :senha, :nivel_acesso)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':nivel_acesso', $nivel_acesso);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
