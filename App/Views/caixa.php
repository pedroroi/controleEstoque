<?php
require_once __DIR__ . '/../Models/Venda.php';
require_once __DIR__ . '/../Models/Produto.php';

session_start();
$produtos = isset($_SESSION['produtos']) ? $_SESSION['produtos'] : [];
$clientes = isset($_SESSION['clientes']) ? $_SESSION['clientes'] : [];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Vendas</title>
    <link rel="stylesheet" href="../../CSS/styleListar.css"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../scripts/autoCompleteProduto.js"></script>
    <style>
        .autocomplete-suggestions {
            border: 1px solid #ddd;
            max-height: 150px;
            overflow-y: auto;
            background-color: #fff;
            position: absolute;
            z-index: 9999;
        }
        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php include '../../includes/header.php'; ?> <!-- Incluindo o header -->
        <h2>Gestão de Vendas</h2>
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarVenda" method="POST">
            
            <label for="produto">Produto</label>
            <input type="text" id="produto" name="produto" autocomplete="off" required>
            <div id="autocomplete-suggestions-produto" class="autocomplete-suggestions"></div>
            
            <input type="hidden" id="id_produto" name="id_produto" required>
            
            <br>
            
            <label for="cliente">Cliente</label>
            <input type="text" id="cliente" name="cliente" autocomplete="off" required>
            <div id="autocomplete-suggestions-cliente" class="autocomplete-suggestions"></div>
            
            <input type="hidden" id="id_cliente" name="id_cliente" required>
            
            <br>
            
            <label for="valor_total">Valor Total</label>
            <input type="text" id="valor_total" name="valor_total" required>
            
            <br>
            
            <label for="forma_pagamento">Forma de Pagamento</label>
            <select id="forma_pagamento" name="forma_pagamento" required>
                <option value="dinheiro">Dinheiro</option>
                <option value="cartao">Cartão</option>
                <option value="pix">PIX</option>
                <option value="boleto">Boleto</option>
                <option value="trans">Transferência</option>
            </select>
            
            <br>
            
            <label for="status">Status</label>
            <select id="status" name="status" required>
                <option value="finalizada">Finalizada</option>
                <option value="pendente">Pendente</option>
            </select>
            
            <br>

            <button type="submit">Cadastrar Venda</button>
        </form>
        <?php include '../../includes/footer.php'; ?> 
    </div>
</body>
</html>