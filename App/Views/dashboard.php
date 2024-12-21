<?php

require_once '../Controllers/verificarLogin.php'; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleDashboard.css">
    <title>Dashboard</title>
</head>
<body>
    
<?php include '../../includes/header.php'; ?>

    <section class="iconesMenu">
        <ul>
            <li>
              <a href="/controleEstoque/App/Views/caixa.php">Caixa</a>
            </li>
            <li>
              <a href="/controleEstoque/App/Views/vendas.php">Vendas</a>
            </li>
            <li>
                <a href="/controleEstoque/App/Views/cadastroProduto.php">Cadastrar Produto</a>
            </li>
            <li>
                <a href="../rota.php?acao=cadastrarFornecedor">Cadastrar Fornecedor</a>
            </li>
        </ul>
    </section>

    <?php include '../../includes/footer.php'; ?>

</body>
</html>
