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

    <h2>Listagem de Vendas</h2>
            <?php if (!empty($vendas)): ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Valor Total</th>
                            <th>Forma de Pagamento</th>
                            <th>Funcionário</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vendas as $venda): ?>
                            <tr>
                                <td><?= $venda['id'] ?></td>
                                <td><?= $venda['id_cliente'] ?></td>
                                <td><?= $venda['data_venda'] ?></td>
                                <td>R$ <?= number_format($venda['valor_total'], 2, ',', '.') ?></td>
                                <td><?= $venda['forma_pagamento'] ?></td>
                                <td><?= $venda['id_funcionario'] ?></td>
                                <td><?= $venda['status'] ?></td>
                                <td>
                                    <a href="../rota.php?acao=editarVenda&id=<?= $venda['id'] ?>">Editar</a> |
                                    <a href="../rota.php?acao=excluirVenda&id=<?= $venda['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir esta venda?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhuma venda cadastrada.</p>
            <?php endif; ?>
    
            <?php include '../../includes/footer.php'; ?>
</body>
</html>