<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Vendas</title>
</head>
<body>

    <?php include '../../includes/header.php'; ?>

    <h2>Listagem de Vendas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Usuário</th>
                <th>Data da Venda</th>
                <th>Valor Total</th>
                <th>Forma de Pagamento</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once __DIR__ . '/../Controllers/VendaController.php';
            $vendaControlador = new VendaController();
            try {
                $vendas = $vendaControlador->listarVendas();
                foreach ($vendas as $venda) {
                    echo "<tr>";
                    echo "<td>" . $venda['id'] . "</td>";
                    echo "<td>" . $venda['id_cliente'] . "</td>";
                    echo "<td>" . $venda['id_usuario'] . "</td>";
                    echo "<td>" . $venda['data_venda'] . "</td>";
                    echo "<td>" . $venda['valor_total'] . "</td>";
                    echo "<td>" . $venda['forma_pagamento'] . "</td>";
                    echo "<td>" . $venda['status'] . "</td>";
                    echo "</tr>";
                }
            } catch (Exception $erro) {
                echo "<tr><td colspan='7'>" . $erro->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <?php include '../../includes/footer.php'; ?>

</body>
</html>