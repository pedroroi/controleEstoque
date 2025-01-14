<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>

    <?php include '../../includes/header.php'; ?>

    <h2>Cadastrar Novo Cliente</h2>
    <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarCliente" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <button type="submit">Cadastrar Cliente</button>
    </form>

    <?php include '../../includes/footer.php'; ?>

</body>
</html>