<?php

session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['id_usuario'])) {
    // Se estiver logado, redireciona para a dashboard
    header('Location: /projeto/App/Views/dashboard.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleIndex.css">
    <title>Seja Bem-Vindo!</title>
</head>
<body>
    <div class="containerLogin">
<<<<<<< HEAD
        <form action="/controleEstoque/App/Controllers/rota.php?acao=autenticar" method="POST">
=======
        <form action="/projeto/App/Controllers/LoginController.php" method="POST">
>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
            <h3>Login</h3>
            <hr>
            <div class="containerInput">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <br>
                <input type="checkbox" name="lembrar" id="lembrar"><label for="lembrar">Lembrar senha</label>
                <br>
            </div>
            <button type="submit">Entrar</button>
            <hr>
            <div class="containerCadastro">
                <a href="/projeto/App/Views/cadastroUsuario.php">Criar novo cadastro</a>
            </div>
        </form>
<<<<<<< HEAD
=======

        <!-- Exibe mensagem de erro -->
        <?php if ($erro): ?>
            <div class="mensagemErro" style="color: red; text-align: center;">
                <?= htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>
        
>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
    </div>

    <footer>
        <h6>Pedro Moreira e José Orlando</h6>
    </footer>
</body>
</html>
