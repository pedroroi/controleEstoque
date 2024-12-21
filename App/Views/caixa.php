<?php
    include 'verificarUsuarioLogado.php';
    require_once '../Controllers/VendaController.php';

    // Obtem todas as vendas para listagem
    $vendaController = new VendaController();
    $vendas = $vendaController->listarVendas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Vendas</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <?php include '../../includes/header.php'; ?>

    <h2>Cadastrar Nova Venda</h2>
    <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarVenda" method="POST">
        <label for="id_cliente">Cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required>

        <label for="data_venda">Data da Venda:</label>
        <input type="date" id="data_venda" name="data_venda" required>

        <label for="valor_total">Valor Total (R$):</label>
        <input type="text" id="valor_total" name="valor_total" required>

        <label for="forma_pagamento">Forma de Pagamento:</label>
        <select id="forma_pagamento" name="forma_pagamento" required>
            <option value="dinheiro">Dinheiro</option>
            <option value="cartao">Cartão</option>
            <option value="pix">Pix</option>
        </select>

        <label for="id_usuario">Usuário:</label>
        <input type="number" id="id_usuario" name="id_usuario" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="pendente">Pendente</option>
            <option value="finalizada">Finalizada</option>
        </select>

        <button type="submit">Cadastrar Venda</button>
    </form>

    <?php include '../../includes/footer.php'; ?>

</body>
</html>
