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
            $sql = "INSERT INTO Categorias (nome) VALUES (:nome)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $categoria->getNome());
            $stmt->execute();

            $conexao->fechar();
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
    public function listarCategorias() {
        try {
            $sql = "SELECT * FROM Categorias";
            $stmt = $this->conn->query($sql);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            throw $erro;
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