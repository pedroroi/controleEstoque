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