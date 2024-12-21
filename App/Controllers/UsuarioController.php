<?php

require_once __DIR__ . '/../Models/Conexao.php';

class UsuarioController {
    public function cadastrar($usuario) {
        try {
            //include conexao.php
            $conexao = new Conexao();
            $conn = $conexao->getConexao();
            
            // Gera o hash da senha
            $senhaHash = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
        
            // Insere o usuário com a senha hash no banco
            $sql = "INSERT INTO Usuarios(usuario, senha, nivel_acesso) 
                        VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $usuario->getUsuario());
            $stmt->bindParam(2, $senhaHash);
            $stmt->bindValue(3, $usuario->getNivel_acesso());
            $stmt->execute();

            $conexao->fechar();
        
        } catch (Exception $erro) {
            throw $erro;
        }
    }

}
?>
