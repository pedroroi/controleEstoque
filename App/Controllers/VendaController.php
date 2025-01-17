<?php
require_once __DIR__ . '/../Models/Conexao.php';
require_once __DIR__ . '/../Models/Venda.php';

class VendaController {
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConexao();
    }

    // Método para cadastrar uma nova venda
    public function cadastrarVenda($venda) {
        try {

            $sql = "INSERT INTO Vendas (id_cliente, id_usuario, data_venda, valor_total, forma_pagamento, status) 
                    VALUES (:id_cliente, :id_usuario, :data_venda, :valor_total, :forma_pagamento, :status)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_cliente', $venda->getIdCliente());
            $stmt->bindValue(':id_usuario', $venda->getIdUsuario());
            $stmt->bindValue(':data_venda', date('Y-m-d H:i:s')); // Define a data e horário automaticamente
            $stmt->bindValue(':valor_total', $venda->getValorTotal());
            $stmt->bindValue(':forma_pagamento', $venda->getFormaPagamento());
            $stmt->bindValue(':status', $venda->getStatus());
            $stmt->execute();

            $this->conn = null;
        } catch (Exception $erro) {
            throw new Exception("Erro ao cadastrar venda: " . $erro->getMessage());
        }
    }

    // Método para listar todas as vendas
    public function listarVendas($id_usuario) {
        try {
            $sql = "SELECT * FROM Vendas WHERE id_usuario = :id_usuario";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_usuario', $id_usuario);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $lista_vendas = [];

            foreach ($resultado as $linha) {
                
                $venda = new venda();
                $venda->setId($linha['id']);
                $venda->setIdCliente($linha['id_cliente']);
                $venda->setDataVenda($linha['data_venda']);
                $venda->setValorTotal($linha['valor_total']);
                $venda->setFormaPagamento($linha['forma_pagamento']);
                $venda->setStatus($linha['status']);
                $venda->setId_usuario($linha['id_usuario']);

                // Formatar a data para o padrão brasileiro ao exibir
                $dataVenda = DateTime::createFromFormat('Y-m-d H:i:s', $linha['data_venda']);
                $venda->setDataVenda($dataVenda->format('d/m/Y H:i:s'));

                $lista_vendas[] = $venda;
            }

            return $lista_vendas;
        } catch (Exception $erro) {
            throw new Exception("Erro ao listar vendas: " . $erro->getMessage());
        }
    }

    // Método para buscar venda por ID
    public function buscarVendaPorId($id_venda) {
        try {
            $sql = "SELECT * FROM Vendas WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_venda);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $erro) {
            throw new Exception("Erro ao buscar venda por ID: " . $erro->getMessage());
        }
    }

    // Método para atualizar uma venda existente
    public function atualizarVenda($venda, $id_venda) {
        try {
            $sql = "UPDATE Vendas SET 
                    id_cliente = :id_cliente, 
                    id_usuario = :id_usuario, 
                    data_venda = :data_venda, 
                    valor_total = :valor_total, 
                    forma_pagamento = :forma_pagamento,
                    status = :status 
                    WHERE id = :id";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id_cliente', $venda->getIdCliente());
            $stmt->bindValue(':id_usuario', $venda->getIdUsuario());
            $stmt->bindValue(':data_venda', date('Y-m-d H:i:s')); // Define a data e horário automaticamente
            $stmt->bindValue(':valor_total', $venda->getValorTotal());
            $stmt->bindValue(':forma_pagamento', $venda->getFormaPagamento());
            $stmt->bindValue(':status', $venda->getStatus());
            $stmt->bindValue(':id', $id_venda);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw new Exception("Erro ao atualizar venda: " . $erro->getMessage());
        }
    }

    // Método para excluir uma venda
    public function excluirVenda($id_venda) {
        try {
            $sql = "DELETE FROM Vendas WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id_venda);

            return $stmt->execute();
        } catch (Exception $erro) {
            throw new Exception("Erro ao excluir venda: " . $erro->getMessage());
        }
    }
}
?>