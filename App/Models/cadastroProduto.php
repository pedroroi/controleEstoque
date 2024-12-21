<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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
        input {
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
        <h2>Cadastro de Produtos</h2>
        <form action="../rota.php?acao=cadastrarProduto" method="POST">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" required>

            <label for="preco">Preço</label>
            <input type="number" step="0.01" id="preco" name="preco" required>

            <label for="estoque">Estoque</label>
            <input type="number" id="estoque" name="estoque" required>

            <label for="unidade">Unidade</label>
            <input type="text" id="unidade" name="unidade" required>

            <label for="codigo_barras">Código de Barras</label>
            <input type="text" id="codigo_barras" name="codigo_barras" required>

            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>
