<?php
    require_once "../Models/Produto.php";

    session_start();
    $lista_produtos = $_SESSION['produtos'];

    try{
        
        echo "<table>";
        echo "<tr>";
        echo "<td>Nome</td>";
        echo "<td>Preço</td>";
        echo "<td>Estoque</td>";
        echo "<td>Unidade</td>";
        echo "<td>Código de Barras</td>";
        echo "<td>Fornecedor</td>";
        echo "<td>Categoria</td>";
        echo "</tr>";

        foreach($lista_produtos as $produto){
            echo "<tr>";
            echo "<td> {$produto->getNome()} </td>";
            echo "<td> {$produto->getPreco()} </td>";
            echo "<td> {$produto->getEstoque()} </td>";
            echo "<td> {$produto->getUnidade()} </td>";
            echo "<td> {$produto->getCodigoBarras()}</td>";
            echo "<td> {$produto->getFornecedor()}</td>";
            echo "<td> {$produto->getCategoria()}</td>";
            echo "</tr>";
        }
        echo "</table>";

    }catch(Exception $erro){
        echo $erro->getMessage();
    }

?>