<?php

require_once __DIR__ . '/../Models/Conexao.php';

class CadastroController {
    private $conn;
    
    // Função para cadastrar um novo usuário
    public function cadastrar($usuario) {
        try {
            $conexao = new Conexao(); // Instancia a conexão
            $this->conn = $conexao->getConexao(); // Atribui à propriedade $conn

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT); // Criptografa a senha

            $sql = "INSERT INTO Usuarios (usuario, senha, nivel_acesso) VALUES (:usuario, :senha, :nivel_acesso)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':senha', $senhaHash);
            $stmt->bindParam(':nivel_acesso', $nivel_acesso);
            $stmt->execute();

            $conexao->fechar();
        } catch (Exception $erro) {
            throw $erro;
        }
    }
}
?>
