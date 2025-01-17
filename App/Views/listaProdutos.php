<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="../../CSS/styleListar.css"> <!-- Vinculando o CSS -->
</head>
<body>
    <?php include '../../includes/header.php'; ?> <!-- Incluindo o header -->
    <h2>Listagem de Produtos</h2>
    <div class="container">
        <?php
        require_once "../Models/Produto.php";
        require_once "../Models/Categoria.php";
        require_once "../Models/Fornecedor.php";

        session_start();
        $lista_produtos = $_SESSION['produtos'];
        //var_dump($lista_produtos);

        try {
            echo "<table>";
            echo "<tr>";
            echo "<th>Nome</th>";
            echo "<th>Preço</th>";
            echo "<th>Estoque</th>";
            echo "<th>Unidade</th>";
            echo "<th>Código de Barras</th>";
            echo "<th>Fornecedor</th>";
            echo "<th>Categoria</th>";
            echo "</tr>";

            foreach ($lista_produtos as $produto) {
                echo "<tr>";
                echo "<td> {$produto->getNome()} </td>";
                echo "<td> {$produto->getPreco()} </td>";
                echo "<td> {$produto->getEstoque()} </td>";
                echo "<td> {$produto->getUnidade()} </td>";
                echo "<td> {$produto->getCodigoBarras()} </td>";
                echo "<td> {$produto->getFornecedor()->getNome()} </td>";
                echo "<td> {$produto->getCategoria()->getNome()} </td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }
        ?>
        <?php include '../../includes/footer.php'; ?> <!-- Incluindo o footer -->
    </div>
</body>
</html>