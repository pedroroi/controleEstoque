<?php
    require_once 'UsuarioController.php';
    require_once 'ProdutoController.php';
    require_once 'LoginController.php';
    require_once __DIR__ . '/../Models/Usuario.php';
    require_once __DIR__ . '/../Models/Produto.php';
    
    $acao = $_GET['acao'];

    if ($acao == 'cadastrarUsuario') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nivel_acesso = $_POST['nivel_acesso'];

        $usuario = new Usuario();
        $usuario->setUsuario($login);
        $usuario->setSenha($senha);
        $usuario->setNivel_acesso($nivel_acesso);

        $usuarioControlador = new UsuarioController ();
        try {
            $usuarioControlador->cadastrar($usuario);
            header('Location: Views/cadastroUsuario.php');
        } catch(Exception $erro) {
            //tratar erro
            echo $erro->getMessage();
        }

        } else if ($acao == 'cadastrarProduto') {
            include 'verificarUsuarioLogado.php';
    
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $estoque = $_POST['estoque'];
            $logradouro = $_POST['unidade'];
            $codigo_barras = $_POST['codigo_barras'];
    
            $produto = new Produto();
            $produto->setNome($nome);
            $produto->setPreco($preco);
            $produto->setEstoque($estoque);
            $produto->setUnidade($unidade);
            $produto->setCodigoBarras($preco);
    
            /*Falta isso aqui
            private $id_fornecedor;
            private $id_categoria;
            */
    
            session_start();
    
    
            $produtoControlador = new ProdutoController ();
            try {
                $produtoControlador->cadastrar($produto);
                header('Location: Views/dashboard.php');
            } catch(Exception $erro) {
                //tratar erro
                echo $erro->getMessage();
    }

    } else if ($acao == 'venda') {
        include 'verificarUsuarioLogado.php';

        $data_venda = $_POST['data_venda'];
        $valor_total = $_POST['valor_total'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $status = $_POST['status'];

        $venda = new Venda();
        $venda->setDataVenda($data_venda);
        $venda->setValorTotal($valor_total);
        $venda->setFormaPagamento($forma_pagamento);
        $venda->setStatus($status);

        $vendaControlador = new VendaController ();
        try {
            $vendaControlador->cadastrar($venda);
            header('Location: Views/dashboard.php');
        } catch(Exception $erro) {
            //tratar erro
            echo $erro->getMessage();
        }


    } else if ($acao == 'autenticar') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->setUsuario($login);
        $usuario->setSenha($senha);

        // Instancia o LoginController
        $loginController = new LoginController();
        try {
            // Chama o método autenticar
            $loginController->autenticar($usuario);
            header('Location: Views/dashboard.php');
        } catch(Exception $erro) {
            //tratar erro
            echo $erro->getMessage();
        } 

    } else if ($acao == 'logout') {
        include 'logout.php';

    } else {
        header('Location: index.html');
    }

?>