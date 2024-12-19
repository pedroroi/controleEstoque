<?php
<<<<<<< HEAD

class Usuario {
    private $usuario;
    private $senha;
    private $nivel_acesso;

    public function setUsuario($usuario) {
        return $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        return $this->senha = $senha;
    }

    public function setNivel_acesso($nivel_acesso) {
        return $this->nivel_acesso = $nivel_acesso;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNivel_acesso($nivel_acesso) {
        return $this->nivel_acesso;
=======
// /App/Models/Usuario.php

class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Função para autenticar o usuário
    public function autenticar($usuario, $senha) {
        $sql = "SELECT * FROM Usuarios WHERE usuario = :usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dados && password_verify($senha, $dados['senha'])) {
            return $dados;
        } else {
            return false;
        }
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
>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
    }
}
?>
