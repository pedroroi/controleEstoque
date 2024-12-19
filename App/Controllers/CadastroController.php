<?php
// /App/Controllers/CadastroController.php

// Corrigindo o caminho para garantir que o arquivo seja encontrado
require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Models/Conexao.php';

class CadastroController {
    private $conn;

    public function __construct() {
        // Conecta ao banco de dados
        $this->conn = Conexao::getInstance();
    }

    public function cadastrar() {
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $nivel_acesso = $_POST['nivel_acesso'];

            $usuarioModel = new Usuario($this->conn);

            if ($usuarioModel->cadastrar($usuario, $senha, $nivel_acesso)) {
                // Se o cadastro for bem-sucedido, redireciona para a página de login
                header('Location: /projeto/index.php');
                exit();
            } else {
                // Se falhar, retorna uma mensagem de erro
                $erro = "Erro ao cadastrar o usuário!";
                return $erro;
            }
        }
    }
}
?>
