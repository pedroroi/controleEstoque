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
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarUsuario" method="POST">
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
            <button type="submit">Cadastrar</button>
            <hr>
        </form>
    </div>
    <footer>
        <h6>Pedro Moreira e José Orlando</h6>
    </footer>
</body>
</html>
