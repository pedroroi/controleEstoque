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
    <h2>Listagem de Fornecedores</h2>
    <div class="container">

        <?php
            require_once "../Models/Fornecedor.php";

            session_start();
            $lista_fornecedores = $_SESSION['fornecedores'];

            try{
                
                echo "<table>";
                echo "<tr>";
                echo "<td>Nome</td>";
                echo "<td>CNPJ</td>";
                echo "<td>Email</td>";
                echo "<td>Endereco</td>";
                echo "<td>Telefone</td>";
                echo "</tr>";

                foreach($lista_fornecedores as $fornecedor){
                    echo "<tr>";
                    echo "<td> {$fornecedor->getNome()} </td>";
                    echo "<td> {$fornecedor->getCnpj()} </td>";
                    echo "<td> {$fornecedor->getEmail()} </td>";
                    echo "<td> {$fornecedor->getTelefone()} </td>";
                    echo "<td> {$fornecedor->getEndereco()}</td>";
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