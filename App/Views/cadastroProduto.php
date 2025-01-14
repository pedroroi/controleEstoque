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
        <!-- Inicia a sessão para acessar as variáveis de sessão -->
        <?php 
        session_start(); 
        ?>
        <!-- Formulário para cadastro de produto -->
        <form action="/controleEstoque/App/Controllers/rota.php?acao=cadastrarProduto" method="POST">
            <!-- Campo para o nome do produto -->
            <label for="nome">Nome do Produto</label>
            <input type="text" id="nome" name="nome" required>

            <!-- Campo para selecionar o fornecedor do produto -->
            <label for="fornecedor">Fornecedor</label>
            <select id="fornecedor" name="id_fornecedor" required>
                <?php 
                // Assume que a variável de sessão 'fornecedores' está definida
                $fornecedores = $_SESSION['fornecedores'];
                // Itera sobre a lista de fornecedores e cria uma opção para cada um
                foreach ($fornecedores as $fornecedor): ?>
                    <option value="<?php echo $fornecedor['id']; ?>">
                        <?php echo $fornecedor['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Campo para o preço do produto -->
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" required>

            <!-- Campo para a quantidade em estoque do produto -->
            <label for="estoque">Estoque</label>
            <input type="text" id="estoque" name="estoque" required>

            <!-- Campo para a unidade do produto -->
            <label for="unidade">Unidade</label>
            <input type="text" id="unidade" name="unidade" required>

            <!-- Campo para o código de barras do produto -->
            <label for="codigo_barras">Código de Barras</label>
            <input type="text" id="codigo_barras" name="codigo_barras" required>

            <!-- Campo para selecionar a categoria do produto -->
            <label for="categoria">Categoria</label>
            <select id="categoria" name="id_categoria" required>
                <?php 
                // Assume que a variável de sessão 'categorias' está definida
                $categorias = $_SESSION['categorias'];
                // Itera sobre a lista de categorias e cria uma opção para cada uma
                foreach ($categorias as $categoria): ?>
                    <option value="<?php echo $categoria['id']; ?>">
                        <?php echo $categoria['nome']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Botão para enviar o formulário -->
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>
</body>
</html>