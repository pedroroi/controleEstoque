<?php
require_once __DIR__ . '/../Models/Categoria.php';
require_once __DIR__ . '/../Models/Fornecedor.php';

session_start();
$categorias = isset($_SESSION['categorias']) ? $_SESSION['categorias'] : [];
$fornecedores = isset($_SESSION['fornecedores']) ? $_SESSION['fornecedores'] : [];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/styleListar.css">
    <title>Cadastro de Produto</title>
</head>
<body>
    <?php include '../../includes/header.php'; ?> <!-- Incluindo o header -->
    <div class="container">
        <form action="../Controllers/rota.php?acao=cadastrarProduto" method="POST">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" required>
            <br>
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" required>
            <br>
            <label for="estoque">Estoque</label>
            <input type="text" id="estoque" name="estoque" required>
            <br>
            <label for="unidade">Unidade</label>
            <input type="text" id="unidade" name="unidade" required>
            <br>
            <label for="codigo_barras">Código de Barras</label>
            <input type="text" id="codigo_barras" name="codigo_barras" required>
            <br>
            
            <label for="categoria">Categoria</label>
            <select id="categoria" name="id_categoria" required>

            <?php foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria->getId(); ?>">
                        <?php echo $categoria->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br>
            
            <label for="fornecedor">Fornecedor</label>
            <select id="fornecedor" name="id_fornecedor" required>
                <?php foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?php echo $fornecedor->getId(); ?>">
                        <?php echo $fornecedor->getNome(); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br>
            <button type="submit">Cadastrar Produto</button>
        </form>
        <?php include '../../includes/footer.php'; ?> <!-- Incluindo o footer -->
    </div>
</body>
</html>