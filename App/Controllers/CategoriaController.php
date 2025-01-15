<?php
require_once __DIR__ . '/../Models/Conexao.php';
require_once __DIR__ . '/../Models/Categoria.php';

class CategoriaController {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }

    // Método para cadastrar uma categoria
    public function cadastrarCategoria($categoria) {
        try {
            $sql = "INSERT INTO Categorias (nome, id_usuario) VALUES (:nome, :id_usuario)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $categoria->getNome());
            $stmt->bindValue(':id_usuario', $categoria->getId_Usuario());
            $stmt->execute();

            $this->conn = null;
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para buscar categoria pelo nome
    public function buscarPorNome($nome) {
        try {
            $sql = "SELECT * FROM Categorias WHERE nome LIKE :nome";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', '%' . $nome . '%');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para listar todas as categorias
    public function listarCategorias($id_usuario) {
        try {
            $sql = "SELECT * FROM Categorias WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_categorias = [];

            foreach ($resultado as $linha) {
                
                $categoria = new Categoria();
                $categoria->setId($linha['id']);
                $categoria->setNome($linha['nome']);
                $categoria->setId_usuario($linha['id_usuario']);

                $lista_categorias[] = $categoria;
            }

            return $lista_categorias;

        } catch (Exception $erro) {
            throw new Exception("Erro ao listar categorias: " . $erro->getMessage());
        }
    }

    // Método para atualizar uma categoria
    public function atualizarCategoria(Categoria $categoria, $id) {
        try {
            $sql = "UPDATE Categorias SET nome = :nome WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $categoria->getNome());
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para excluir uma categoria
    public function excluirCategoria($id) {
        try {
            $sql = "DELETE FROM Categorias WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw $erro;
        }
    }
}
?>