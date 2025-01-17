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
    <h2>Listagem de Categorias</h2>
    <div class="container">        
        <?php
            require_once "../Models/Categoria.php";

            session_start();
            $lista_categorias = $_SESSION['categorias'];

            try{
                
                echo "<table>";
                echo "<tr>";
                echo "<td>Nome</td>";
                echo "</tr>";

                foreach($lista_categorias as $categoria){
                    echo "<tr>";
                    echo "<td> {$categoria->getNome()} </td>";
                    echo "</tr>";
                }
                echo "</table>";

            }catch(Exception $erro){
                echo $erro->getMessage();
            }

        ?>
        <?php include '../../includes/footer.php'; ?> <!-- Incluindo o footer -->
    </div>
</body>
</html>