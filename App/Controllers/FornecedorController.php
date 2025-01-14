<?php
require_once __DIR__ . '/../Models/Conexao.php';
require_once __DIR__ . '/../Models/Fornecedor.php';

class FornecedorController {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }

    // Método para cadastrar um fornecedor
    public function cadastrarFornecedor($fornecedor) {
        try {
            $conexao = new Conexao();
            $this->conn = $conexao->getConexao();
            
            $sql = "INSERT INTO Fornecedores (nome, telefone, email, endereco, cnpj, id_usuario) 
                    VALUES (:nome, :telefone, :email, :endereco, :cnpj, :id_usuario)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $fornecedor->getNome());
            $stmt->bindValue(':telefone', $fornecedor->getTelefone());
            $stmt->bindValue(':email', $fornecedor->getEmail());
            $stmt->bindValue(':endereco', $fornecedor->getEndereco());
            $stmt->bindValue(':cnpj', $fornecedor->getCnpj());
            $stmt->bindValue(':id_usuario', $fornecedor->getId_usuario());
            $stmt->execute();

            $conexao->fechar();
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para buscar fornecedor pelo nome (usando LIKE para buscas parciais)
    public function buscarPorNome($nome) {
        try {
            $sql = "SELECT * FROM Fornecedores WHERE nome LIKE :nome";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', '%' . $nome . '%');
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para listar todos os fornecedores
    public function listarFornecedores($id_usuario) {
        try {
            $sql = "SELECT * FROM Fornecedores WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_fornecedores = [];

            foreach ($resultado as $linha) {
                
                $fornecedor = new Fornecedor();
                $fornecedor->setId($linha['id']);
                $fornecedor->setNome($linha['nome']);
                $fornecedor->setCnpj($linha['cnpj']);
                $fornecedor->setTelefone($linha['telefone']);
                $fornecedor->setEmail($linha['email']);
                $fornecedor->setEndereco($linha['endereco']);
                $fornecedor->setId_usuario($linha['id_usuario']);

                $lista_fornecedores[] = $fornecedor;
            }

            return $lista_fornecedores;

        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para atualizar um fornecedor
    public function atualizarFornecedor($fornecedor, $id) {
        try {
            $sql = "UPDATE Fornecedores SET 
                    nome = :nome, 
                    telefone = :telefone, 
                    email = :email, 
                    endereco = :endereco, 
                    cnpj = :cnpj 
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $fornecedor->getNome());
            $stmt->bindValue(':telefone', $fornecedor->getTelefone());
            $stmt->bindValue(':email', $fornecedor->getEmail());
            $stmt->bindValue(':endereco', $fornecedor->getEndereco());
            $stmt->bindValue(':cnpj', $fornecedor->getCnpj());
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw $erro;
        }
    }

    // Método para excluir um fornecedor
    public function excluirFornecedor($id) {
        try {
            $sql = "DELETE FROM Fornecedores WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw $erro;
        }
    }
}
?>