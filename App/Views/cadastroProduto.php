<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Produto</h2>
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarProduto" method="POST">
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" required>

            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" required>

            <label for="estoque">Estoque</label>
            <input type="text" id="estoque" name="estoque" required>

            <label for="unidade">Unidade</label>
            <input type="text" id="unidade" name="unidade" required>

            <label for="codigo_barras">Código de Barras</label>
            <input type="text" id="codigo_barras" name="codigo_barras" required>

            <label for="fornecedor">Fornecedor</label>
            <select id="fornecedor" name="id_fornecedor" required>
                <?php 
                session_start();
                if (isset($_SESSION['fornecedores'])) {
                    $fornecedores = $_SESSION['fornecedores'];
                    foreach ($fornecedores as $fornecedor): ?>
                        <option value="<?php echo $fornecedor['id']; ?>">
                            <?php echo $fornecedor['nome']; ?>
                        </option>
                    <?php endforeach;
                } else {
                    echo '<option value="">Nenhum fornecedor disponível</option>';
                }
                ?>
            </select>
            <br>
            <label for="categoria">Categoria</label>
            <select id="categoria" name="id_categoria" required>
                <?php 
                if (isset($_SESSION['categorias'])) {
                    $categorias = $_SESSION['categorias'];
                    foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>">
                            <?php echo $categoria['nome']; ?>
                        </option>
                    <?php endforeach;
                } else {
                    echo '<option value="">Nenhuma categoria disponível</option>';
                }
                ?>
            </select>

            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>