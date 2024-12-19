<<<<<<< HEAD
=======
<?php
// /Views/cadastroUsuario.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../Controllers/CadastroController.php';

// Instancia o controlador de cadastro
$cadastroController = new CadastroController();

// Verifica se houve erro no cadastro
$erro = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $erro = $cadastroController->cadastrar();
}
?>

>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleCadastroUsuario.css">
    <title>Página de Cadastro</title>
</head>
<body>
    <div class="containerLogin">
<<<<<<< HEAD
        <form action="../rota.php?=cadastrarUsuario" method="POST">
=======
        <form action="cadastroUsuario.php" method="POST">
>>>>>>> e5ae8b96f558c0cb4a939304f2addbdf0960d0e3
            <h3>Cadastro de Usuário</h3>
            <hr>
            <div class="containerInput">
                <input type="text" name="usuario" placeholder="Usuário" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <br>
            </div>
            <div class="containerAcesso">   
                    <label for="nivel_acesso">Nível de Acesso:</label>
                    <select name="nivel_acesso" id="nivel_acesso" required>
                        <option value="administrador">Administrador</option>
                        <option value="funcionario">Funcionário</option>
                    </select>
            </div> 
            <br>
            <!-- Exibe mensagem de erro ou sucesso -->
            <?php if ($erro): ?>
                <div class="mensagem" style="color: red; text-align: center;">
                    <?= htmlspecialchars($erro); ?>
                </div>
            <?php elseif (isset($_GET['mensagem'])): ?>
                <div class="mensagem" style="color: green; text-align: center;">
                    <?= htmlspecialchars($_GET['mensagem']); ?>
                </div>
            <?php endif; ?>
            
            <button type="submit">Cadastrar</button>
            <hr>
        </form>
    </div>
    <footer>
        <h6>Pedro Moreira e José Orlando</h6>
    </footer>
</body>
</html>
