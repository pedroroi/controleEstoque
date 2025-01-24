<?php
    require_once 'UsuarioController.php';
    require_once 'ProdutoController.php';
    require_once 'ClienteController.php';
    require_once 'EstoqueController.php';
    require_once 'FornecedorController.php';
    require_once 'CategoriaController.php';
    require_once 'VendaController.php';
    require_once 'LoginController.php';
    require_once __DIR__ . '/../Models/Usuario.php';
    require_once __DIR__ . '/../Models/Produto.php';
    require_once __DIR__ . '/../Models/Venda.php';
    require_once __DIR__ . '/../Models/Cliente.php';
    require_once __DIR__ . '/../Models/Estoque.php';
    require_once __DIR__ . '/../Models/Categoria.php';
    require_once __DIR__ . '/../Models/Fornecedor.php';

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

    } else if ($acao == 'exibeCadastroProduto') {
        include 'verificarLogin.php';

        $fornecedorControlador = new FornecedorController();
        $categoriaControlador = new CategoriaController();
        try {
            session_start();
            $id_usuario = $_SESSION['id_usuario'];

            $fornecedores = $fornecedorControlador->listarFornecedores($id_usuario);
            $categorias = $categoriaControlador->listarCategorias($id_usuario);
            $_SESSION['fornecedores'] = $fornecedores;
            $_SESSION['categorias'] = $categorias;

            // Redireciona para uma página de cadastro de produto
            header('Location: ../Views/cadastroProduto.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }


    } else if ($acao == 'cadastrarProduto') {
        include 'verificarLogin.php';

        session_start();
        $id_usuario = $_SESSION['id_usuario'];

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $unidade = $_POST['unidade'];
        $codigo_barras = $_POST['codigo_barras'];
        $id_fornecedor = $_POST['id_fornecedor'];
        $id_categoria = $_POST['id_categoria'];

        $produto = new Produto();

        $produto->setNome($nome);
        $produto->setPreco($preco);
        $produto->setEstoque($estoque);
        $produto->setUnidade($unidade);
        $produto->setCodigoBarras($codigo_barras);

        $controladorCategoria = new CategoriaController();
        $controladorFornecedor = new FornecedorController();

        $categoria = $controladorCategoria->buscarCategoriaPorId($id_categoria, $id_usuario);
        $fornecedor = $controladorFornecedor->buscarFornecedorPorId($id_fornecedor, $id_usuario);

        $produto->setCategoria($categoria);
        $produto->setFornecedor($fornecedor);

        $produto->setId_usuario($id_usuario);

        $produtoControlador = new ProdutoController();
        try {
            $produtoControlador->cadastrarProduto($produto);
            header('Location: ../Views/dashboard.php');

        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'listarProdutos') {
        include 'verificarLogin.php';
    
        $produtoControlador = new ProdutoController();
        try {
            session_start();
            $id_usuario = $_SESSION['id_usuario'];
    
            $lista_produtos = $produtoControlador->listarProdutos($id_usuario);
            $_SESSION['produtos'] = $lista_produtos; // Corrigido para usar a variável correta
            // Redireciona para uma página de listagem com os dados dos produtos
            header('Location: ../Views/listaProdutos.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'buscarProdutos') {
        include 'verificarUsuarioLogado.php';
    
        $termo = $_GET['termo'];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $produtoControlador = new ProdutoController();
        try {
            $produtos = $produtoControlador->buscarProdutos($termo, $id_usuario);
            echo json_encode($produtos);
        } catch (Exception $erro) {
            echo json_encode(['erro' => $erro->getMessage()]);
        }

    } else if ($acao == 'cadastrarCategoria') {
        include 'verificarLogin.php';

        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        
        $nome = $_POST['nome'];
    
        $categoria = new Categoria();
        $categoria->setNome($nome);
        $categoria->setId_usuario($id_usuario);
    
        $categoriaControlador = new CategoriaController();
        try {
            $categoriaControlador->cadastrarCategoria($categoria);
            header('Location: ../Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'listarCategorias') {
        include 'verificarLogin.php';
    
        $categoriaControlador = new CategoriaController();
        try {
            session_start();
            $id_usuario = $_SESSION['id_usuario'];
    
            $lista_categorias = $categoriaControlador->listarCategorias($id_usuario);
            $_SESSION['categorias'] = $lista_categorias; // Corrigido para usar a variável correta
            // Redireciona para uma página de listagem com os dados dos produtos
            header('Location: ../Views/listaCategorias.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'cadastrarFornecedor') {
        include 'verificarLogin.php';
        
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $cnpj = $_POST['cnpj'];
    
        $fornecedor = new Fornecedor();
        $fornecedor->setNome($nome);
        $fornecedor->setTelefone($telefone);
        $fornecedor->setEmail($email);
        $fornecedor->setEndereco($endereco);
        $fornecedor->setCnpj($cnpj);
        $fornecedor->setId_usuario($id_usuario);
    
        $fornecedorControlador = new FornecedorController();
        try {
            $fornecedorControlador->cadastrarFornecedor($fornecedor);
            header('Location: ../Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'listarFornecedores') {

        include 'verificarLogin.php';

        //criar um metodo para buscar os contatos
        $fornecedorControlador = new FornecedorController();
        try{
            session_start();
            $id_usuario = $_SESSION['id_usuario'];

            $lista_fornecedores = $fornecedorControlador->listarFornecedores($id_usuario);
            $_SESSION['fornecedores'] = $lista_fornecedores;
            // Redireciona para uma página de listagem com os dados dos clientes
            header('Location: ../Views/listaFornecedores.php');
        }catch(Exception $erro){
            //tratar erro
            echo $erro->getMessage();
        }

    } else if ($acao == 'cadastrarCliente') {
        include 'verificarLogin.php';

        session_start();
        $id_usuario = $_SESSION['id_usuario'];

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
    
        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);
        $cliente->setEndereco($endereco);   
        $cliente->setId_usuario($id_usuario);
    
        $clienteControlador = new ClienteController();
        try {
            $clienteControlador->cadastrarCliente($cliente);
            header('Location: ../Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'listarClientes') {

        include 'verificarLogin.php';

        //criar um metodo para buscar os contatos
        $clienteControlador = new ClienteController();
        try{
            session_start();
            $id_usuario = $_SESSION['id_usuario'];

            $lista_clientes = $clienteControlador->listarClientes($id_usuario);
            $_SESSION['clientes'] = $lista_clientes;
            // Redireciona para uma página de listagem com os dados dos clientes
            header('Location: ../Views/listaClientes.php');
        }catch(Exception $erro){
            //tratar erro
            echo $erro->getMessage();
        }

    } else if ($acao == 'buscarClientes') {
        include 'verificarUsuarioLogado.php';
    
        $termo = $_GET['termo'];
        session_start();
        $id_usuario = $_SESSION['id_usuario'];
        $clienteControlador = new ClienteController();
        try {
            $clientes = $clienteControlador->buscarClientes($termo, $id_usuario);
            echo json_encode($clientes);
        } catch (Exception $erro) {
            echo json_encode(['erro' => $erro->getMessage()]);
        }

    } else if ($acao == 'exibeVenda') {
        include 'verificarLogin.php';

        $produtosControlador = new ProdutoController();
        $clientesControlador = new ClienteController();

        try {
            session_start();
            $id_usuario = $_SESSION['id_usuario'];
            
            $produtos = $produtosControlador->listarProdutos($id_usuario);
            $_SESSION['produtos'] = $produtos;
            $clientes = $clientesControlador->listarClientes($id_usuario);
            $_SESSION['clientes'] = $clientes;
            // Redireciona para uma página de cadastro de produto
            header('Location: ../Views/caixa.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }
    
    } else if ($acao == 'cadastrarVenda') {
        include 'verificarLogin.php';

        session_start();
        $id_usuario = $_SESSION['id_usuario'];
    
        $id_produto = $_POST['id_produto'];
        $id_cliente = $_POST['id_cliente'];
        $valor_total = $_POST['valor_total'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $status = $_POST['status'];

        $controladorCliente = new ClienteController();
        $controladorProduto = new ProdutoController();

        $venda = new Venda();

        $venda->setDataVenda(date('Y-m-d H:i:s'));
        $venda->setValorTotal($valor_total);
        $venda->setFormaPagamento($forma_pagamento);
        $venda->setStatus($status);
        $venda->setId_usuario($id_usuario);

        $venda->setCliente($controladorCliente->buscarClientePorId($id_cliente, $id_usuario));
        $venda->setProduto($controladorProduto->buscarProdutoPorId($id_produto, $id_usuario));
  
        $vendaControlador = new VendaController();
        try {
            $vendaControlador->cadastrarVenda($venda);
            header('Location: ../Views/dashboard.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'listarVendas') {

       include 'verificarLogin.php';

        //criar um metodo para buscar os contatos
        $vendaControlador = new VendaController();
        try{
            session_start();
            $id_usuario = $_SESSION['id_usuario'];

            $lista_vendas = $vendaControlador->listarVendas($id_usuario);
            $_SESSION['vendas'] = $lista_vendas;
            // Redireciona para uma página de listagem com os dados dos clientes
            header('Location: ../Views/listaVendas.php');
        }catch(Exception $erro){
            //tratar erro
            echo $erro->getMessage();
        }

    } else if ($acao == 'editarVenda') {
        include 'verificarLogin.php';

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
        include 'verificarLogin.php';

        $id = $_POST['id'];
        $data_venda = $_POST['data_venda'];
        $valor_total = $_POST['valor_total'];
        $forma_pagamento = $_POST['forma_pagamento'];
        $id_usuario = $_POST['id_usuario'];
        $status = $_POST['status'];

        $venda = new Venda();
        $venda->setDataVenda($data_venda);
        $venda->setValorTotal($valor_total);
        $venda->setFormaPagamento($forma_pagamento);
        $venda->setStatus($status);

        $controladorCliente = new ClienteController();
        $controladorProduto = new ProdutoController();

        $cliente = $controladorCliente->buscarClientePorId($id_cliente, $id_usuario);
        $produto = $controladorProduto->buscarProdutoPorId($id_produto, $id_usuario);

        $venda->setCliente($cliente);
        $venda->setProduto($produto);

        $vendaControlador = new VendaController();
        try {
            $vendaControlador->atualizarVenda($id, $venda);
            header('Location: ../views/vendas.php');
        } catch (Exception $erro) {
            echo $erro->getMessage();
        }

    } else if ($acao == 'excluirVenda') {
        include 'verificarLogin.php';

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
        header('Location: ../../index.php');
    }
?>
