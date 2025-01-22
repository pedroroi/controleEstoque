<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Vendas</title>
    <link rel="stylesheet" href="../../CSS/styleListar.css"> <!-- Vinculando o CSS -->
</head>
<body>

    <?php include '../../includes/header.php'; ?>

    <h2>Listagem de Vendas</h2>
    <div class="container">
        <?php
            require_once "../Models/Venda.php";
            require_once "../Models/Produto.php";
            require_once "../Models/Fornecedor.php";

            session_start();
            $lista_vendas = $_SESSION['vendas'];

            try{
                
                echo "<table>";
                echo "<tr>";
                echo "<td>ID da Venda</td>";
                echo "<td>Nome do Produto</td>";
                echo "<td>Data da Venda</td>";
                echo "<td>Valor Total</td>";
                echo "<td>Forma de Pagamento</td>";
                echo "<td>Status</td>";
                echo "</tr>";

                foreach($lista_vendas as $venda){
                    echo "<tr>";
                    echo "<td> {$venda->getId()} </td>";
                    echo "<td> {$venda->getNome()} </td>";
                    echo "<td> {$venda->getDataVenda()} </td>";
                    echo "<td> {$venda->getValorTotal()} </td>";
                    echo "<td> {$venda->getFormaPagamento()}</td>";
                    echo "<td> {$venda->getStatus()}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } catch (Exception $erro) {
                echo "<tr><td colspan='7'>" . $erro->getMessage() . "</td></tr>";
            }
        ?>

        <?php include '../../includes/footer.php'; ?>
        </div>

</body>
</html>