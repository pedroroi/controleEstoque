<?php
session_start(); // Inicia a sessão

// Destrói todas as variáveis da sessão
session_unset();

// Destrói a sessão
session_destroy();

// Remove cookies relacionados à sessão, se houver
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Redireciona para a página de login
header('Location: index.php');
exit(); // Garante que o script pare de executar
?>
