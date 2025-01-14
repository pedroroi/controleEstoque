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