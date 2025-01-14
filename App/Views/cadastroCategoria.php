<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Categoria</title>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Categoria</h2>
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarCategoria" method="POST">
            <label for="nome">Nome da Categoria</label>
            <input type="text" id="nome" name="nome" required>
            <button type="submit">Cadastrar Categoria</button>
        </form>
    </div>
</body>
</html>