<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedor</title>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarFornecedor" method="POST">
           
            <label for="nome">Nome do Fornecedor</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" required>

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" required>

            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" required>

            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>