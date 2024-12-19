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
              <a href="../rota.php?acao=venda">Venda</a>
            </li>
            <li>
                <a href="../rota.php?acao=cadastrarProduto">Cadastrar Produto</a>
            </li>
            <li>
                <a href="../rota.php?acao=cadastrarFornecedor">Cadastrar Fornecedor</a>
            </li>
        </ul>
    </section>

    <?php include '../../includes/footer.php'; ?>

</body>
</html>
