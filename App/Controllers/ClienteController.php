<?php
require_once __DIR__ . '/../Models/Conexao.php';
require_once __DIR__ . '/../Models/Cliente.php';

class ClienteController {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }

    // Método para cadastrar um cliente
    public function cadastrarCliente($cliente) {
        try {        
            $sql = "INSERT INTO Clientes (nome, email, telefone, endereco, id_usuario) 
                    VALUES (:nome, :email, :telefone, :endereco, :id_usuario)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':id_usuario', $cliente->getId_Usuario());
            $stmt->execute();

            $conexao->fechar();
        } catch (Exception $erro) {
            throw new Exception("Erro ao cadastrar cliente: " . $erro->getMessage());
        }
    }

    // Método para buscar cliente por ID
    public function buscarPorId($id_cliente) {
        try {
            $sql = "SELECT * FROM Clientes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_cliente);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            throw new Exception("Erro ao buscar cliente por ID: " . $erro->getMessage());
        }
    }

    // Método para listar todos os clientes
    public function listarClientes($id_usuario) {
        try {
            $sql = "SELECT * FROM Clientes WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_clientes = [];

            foreach ($resultado as $linha) {
                
                $cliente = new Cliente();
                $cliente->setId($linha['id']);
                $cliente->setNome($linha['nome']);
                $cliente->setEmail($linha['email']);
                $cliente->setTelefone($linha['telefone']);
                $cliente->setEndereco($linha['endereco']);
                $cliente->setId_usuario($linha['id_usuario']);

                $lista_fornecedores[] = $cliente;
            }

            return $lista_fornecedores;

        } catch (Exception $erro) {
            throw new Exception("Erro ao listar clientes: " . $erro->getMessage());
        }
    }

    // Método para atualizar um cliente
    public function atualizarCliente($cliente, $id_cliente) {
        try {
            $sql = "UPDATE Clientes SET 
                    nome = :nome, 
                    email = :email, 
                    telefone = :telefone, 
                    endereco = :endereco 
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':id', $id_cliente);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw new Exception("Erro ao atualizar cliente: " . $erro->getMessage());
        }
    }

    // Método para excluir um cliente
    public function excluirCliente($id_cliente) {
        try {
            $sql = "DELETE FROM Clientes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_cliente);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw new Exception("Erro ao excluir cliente: " . $erro->getMessage());
        }
    }
}
?>