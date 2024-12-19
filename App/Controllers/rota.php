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
                header('Location: views/cadastroUsuario.php');
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

        /*Falta isso aqui
        private $id_fornecedor;
        private $id_categoria;
        */

        session_start();


        $produtoControlador = new ProdutoController ();
            try {
                $produtoControlador->cadastrar($produto);
                header('Location: views/dashboard.php');
            } catch(Exception $erro) {
                //tratar erro
                echo $erro->getMessage();
            }


    } else if ($acao == 'autenticar') {
        echo "Entrou";
        /*$usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->setUsuario($usuario);
        $usuario->setSenha($senha);
        $usuario->setNivel_acesso($nivel_acesso);

        // Instancia o LoginController
        $loginController = new LoginController();
        try {
            // Chama o método autenticar
            $loginController->autenticar($usuario);
            header('Location: views/dashboard.php');
        } catch(Exception $erro) {
            //tratar erro
            echo $erro->getMessage();
        }   */   

    } else if ($acao == 'logout') {
        include 'logout.php';

    } else {
        header('Location: index.html');
    }

?>