<?php
// /App/Controllers/LoginController.php

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Models/Conexao.php';

class LoginController {
    private $conn;

    public function __construct() {
        // Conecta ao banco de dados
        $this->conn = Conexao::getInstance();
    }

    public function autenticar() {
        // Verifica se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            
            $usuarioModel = new Usuario($this->conn);

            // Verifica se a autenticação foi bem-sucedida
            $dadosUsuario = $usuarioModel->autenticar($usuario, $senha);
            
            if ($dadosUsuario) {
                // Usuário autenticado com sucesso, inicia a sessão
                session_start();
                $_SESSION['id_usuario'] = $dadosUsuario['id']; // Supondo que o ID seja retornado
                $_SESSION['usuario'] = $dadosUsuario['usuario']; // Usuário autenticado
                
                // Redireciona para a dashboard
                header('Location: /projeto/App/Views/dashboard.php');
                exit();
            } else {
                echo 'Deu ruim, mano';
            }
        }
    }
}

// Criação de uma instância para chamar o método autenticar
$loginController = new LoginController();
$loginController->autenticar();


?>
