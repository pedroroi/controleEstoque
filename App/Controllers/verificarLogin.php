<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id_usuario'])) {
    // Se não estiver logado, redireciona para o login
    header('Location: ../../index.php');
    exit(); // Garante que o script pare de executar após o redirecionamento
}
?>
