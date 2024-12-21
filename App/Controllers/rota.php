<?php
    require_once 'UsuarioController.php';
    require_once 'ProdutoController.php';
    require_once 'VendaController.php';
    require_once 'LoginController.php';
    require_once __DIR__ . '/../Models/Usuario.php';
    require_once __DIR__ . '/../Models/Produto.php';
    require_once __DIR__ . '/../Models/Venda.php';

    $acao = $_GET['acao'];

    if ($acao == 'cadastrarUsuario') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];
        $nivel_acesso = $_POST['nivel_acesso'];

        $usuario = new Usuario();
        $usuario->setUsuario($login);
        $usuario->setSenha($senha);
        $usuario->setNivel_acesso($nivel_acesso);

        $usuarioControlador = new UsuarioController();
        try {
            $usuarioControlador->cadastrar($usuario);
            header('Location: ../../index.php');
        } catch (Exception $erro) {
            echo $erro = "MINHA POMBA";
        }

    } else if ($acao == 'cadastrarProduto') {
        include 'verificarUsuarioLogado.php';

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $unidade = $_POST['unidade'];
        $codigo_barras = $_POST['codigo_barras'];

        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setEstoque($estoque);
        $produto->setUnidade($unidade);
        $produto->setCodigoBarras($codigo_barras);

        $produtoControlador = new ProdutoController();
        try {
            $produtoControlador->cadastrarProduto($produto);
            header('Location: Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'cadastrarVenda') {
        include 'verificarUsuarioLogado.php';

        $data_venda = $_POST['data_venda'];
        $valor_total = $_POST['valor_total'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $id_usuario = $_POST['id_usuario'];
        $status = $_POST['status'];

        $venda = new Venda();
        $venda->setDataVenda($data_venda);
        $venda->setValorTotal($valor_total);
        $venda->setFormaPagamento($forma_pagamento);
        $venda->setIdUsuario($id_usuario);
        $venda->setStatus($status);

        $vendaControlador = new VendaController();
        try {
            $vendaControlador->cadastrarVenda($venda);
            header('Location: ../views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'editarVenda') {
        include 'verificarUsuarioLogado.php';

        $id = $_GET['id'];
        $vendaController = new VendaController();
        $venda = $vendaController->buscarVendaPorId($id);

        if ($venda) {
            // Redireciona para uma página de edição com os dados preenchidos
            header("Location: ../views/editarVenda.php?id=$id");
        } else {
            echo "Venda não encontrada.";
        }

    } else if ($acao == 'atualizarVenda') {
        include 'verificarUsuarioLogado.php';

        $id = $_POST['id'];
        $data_venda = $_POST['data_venda'];
        $valor_total = $_POST['valor_total'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $id_usuario = $_POST['id_usuario'];
        $status = $_POST['status'];

        $venda = new Venda();
        $venda->setIdCliente($id_cliente);
        $venda->setDataVenda($data_venda);
        $venda->setValorTotal($valor_total);
        $venda->setFormaPagamento($forma_pagamento);
        $venda->setIdUsuario($id_funcionario);
        $venda->setStatus($status);

        $vendaControlador = new VendaController();
        try {
            $vendaControlador->atualizarVenda($id, $venda);
            header('Location: ../views/vendas.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'excluirVenda') {
        include 'verificarUsuarioLogado.php';

        $id = $_GET['id'];
        $vendaControlador = new VendaController();
        try {
            $vendaControlador->excluirVenda($id);
            header('Location: ../views/vendas.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'autenticar') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->setUsuario($login);
        $usuario->setSenha($senha);

        $loginController = new LoginController();
        try {
            $loginController->autenticar($usuario);
            header('Location: Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'logout') {
        include 'logout.php';

    } else {
        header('Location: index.php');
    }
?>
