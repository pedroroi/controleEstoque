<?php
require_once __DIR__ . '/../Models/Conexao.php';
require_once __DIR__ . '/../Models/Produto.php';

class ProdutoController {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }
    
    // Método para cadastrar um produto
    public function cadastrarProduto($produto) {
        
        $sql = "INSERT INTO Produtos (nome, preco, estoque, unidade, id_fornecedor, id_categoria, codigo_barras, id_usuario) 
                VALUES (:nome, :preco, :estoque, :unidade, :id_fornecedor, :id_categoria, :codigo_barras, :id_usuario)";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':estoque', $produto->getEstoque());
        $stmt->bindValue(':unidade', $produto->getUnidade());
        $stmt->bindValue(':id_fornecedor', $produto->getFornecedor()->getId());
        $stmt->bindValue(':id_categoria', $produto->getCategoria()->getId());
        $stmt->bindValue(':codigo_barras', $produto->getCodigoBarras());
        $stmt->bindValue(':id_usuario', $produto->getId_usuario());

        $stmt->execute();
    }

    // Método para buscar produto pelo código de barras
    public function buscarPorCodigoBarras($codigo_barras) {
        $sql = "SELECT * FROM Produtos WHERE codigo_barras = :codigo_barras";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':codigo_barras', $codigo_barras);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        // Método para buscar produtos com base em um termo e no ID do usuário
        public function buscarProdutos($termo, $id_usuario) {
            try {
                $sql = "SELECT * FROM Produtos WHERE nome LIKE :termo AND id_usuario = :id_usuario";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindValue(':termo', '%' . $termo . '%');
                $stmt->bindValue(':id_usuario', $id_usuario);
                $stmt->execute();
    
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $erro) {
                throw new Exception("Erro ao buscar produtos: " . $erro->getMessage());
            }
        }

    // Método para listar todos os produtos
    /*public function listarProdutos($id_usuario) {
        try {
            $sql = "SELECT * FROM Produtos WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_produtos = [];

            foreach ($resultado as $linha) {
                
                $produto = new Produto();
                $produto->setId($linha['id']);
                $produto->setNome($linha['nome']);
                $produto->setPreco($linha['preco']);
                $produto->setEstoque($linha['estoque']);
                $produto->setCodigoBarras($linha['codigo_barras']);
                $produto->setUnidade($linha['unidade']);
                $produto->setIdFornecedor($linha['id_fornecedor']);
                $produto->setIdCategoria($linha['id_categoria']);
                $produto->setId_usuario($linha['id_usuario']);

                $lista_produtos[] = $produto;
            }

            return $lista_produtos;
            
        } catch (Exception $erro) {
            throw $erro;
        }
    }*/

    // Método para listar todos os produtos
    public function listarProdutos($id_usuario) {
        try {
            $sql = "SELECT * FROM Produtos WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_produtos = [];

            $controladorCategoria = new CategoriaController();

            $controladorFornecedor = new FornecedorController();

            foreach ($resultado as $linha) {
                $produto = new Produto();
                $produto->setId($linha['id']);
                $produto->setNome($linha['nome']);
                $produto->setPreco($linha['preco']);
                $produto->setEstoque($linha['estoque']);
                $produto->setUnidade($linha['unidade']);
                /*$produto->setIdFornecedor($linha['id_fornecedor']);
                $produto->setIdCategoria($linha['id_categoria']);*/
                
                $categoria = $controladorCategoria->buscarCategoriaPorId($linha['id_categoria'], $id_usuario);
                $fornecedor = $controladorFornecedor->buscarFornecedorPorId($linha['id_fornecedor'], $id_usuario);

                $produto->setCategoria($categoria);
                $produto->setFornecedor($fornecedor);

                $produto->setCodigoBarras($linha['codigo_barras']);

                $produto->setId_usuario($linha['id_usuario']);

                $lista_produtos[] = $produto;
            }

            return $lista_produtos;
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para atualizar um produto
    public function atualizarProduto(Produto $produto, $id) {
        $sql = "UPDATE Produtos SET 
                nome = :nome, 
                preco = :preco, 
                estoque = :estoque, 
                unidade = :unidade, 
                id_fornecedor = :id_fornecedor, 
                id_categoria = :id_categoria, 
                codigo_barras = :codigo_barras 
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $produto->getNome());
        $stmt->bindValue(':preco', $produto->getPreco());
        $stmt->bindValue(':estoque', $produto->getEstoque());
        $stmt->bindValue(':unidade', $produto->getUnidade());
        $stmt->bindValue(':id_fornecedor', $produto->getIdFornecedor());
        $stmt->bindValue(':id_categoria', $produto->getIdCategoria());
        $stmt->bindValue(':codigo_barras', $produto->getCodigoBarras());
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    // Método para excluir um produto
    public function excluirProduto($id) {
        $sql = "DELETE FROM Produtos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
?>
