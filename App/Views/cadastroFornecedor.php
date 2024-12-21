<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, textarea {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Fornecedor</h2>
        <form action="../rota.php?acao=cadastrarFornecedor" method="POST">
            <label for="nome">Nome do Fornecedor</label>
            <input type="text" id="nome" name="nome" required>

            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="endereco">Endereço</label>
            <textarea id="endereco" name="endereco" rows="3" required></textarea>

            <label for="cnpj">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" required>

            <button type="submit">Cadastrar Fornecedor</button>
        </form>
    </div>
</body>
</html>
