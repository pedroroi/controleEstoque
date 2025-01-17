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
    <h2>Listagem de Clientes</h2>
    <div class="container">
        <?php
            require_once "../Models/Cliente.php";

            session_start();
            $lista_clientes = $_SESSION['clientes'];

            try{
                
                echo "<table>";
                echo "<tr>";
                echo "<td>Nome</td>";
                echo "<td>Email</td>";
                echo "<td>Telefone</td>";
                echo "<td>Endereço</td>";
                echo "</tr>";

                foreach($lista_clientes as $cliente){
                    echo "<tr>";
                    echo "<td> {$cliente->getNome()} </td>";
                    echo "<td> {$cliente->getEmail()} </td>";
                    echo "<td> {$cliente->getTelefone()} </td>";
                    echo "<td> {$cliente->getEndereco()} </td>";
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