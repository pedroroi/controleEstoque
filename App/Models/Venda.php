<?php

class Venda {
    private $id;
    private $produto;
    private $cliente;
    //private $id_produto;
    //private $id_cliente;
    private $id_usuario;
    private $data_venda;
    private $valor_total;
    private $forma_pagamento;
    private $status;

    // Métodos Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setProduto($produto) {
        $this->produto = $produto;
    }

    public function setUsuario($usuario) {
        $this->$usuario = $usuario;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    /*public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }

    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }*/

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setDataVenda($data_venda) {
        $this->data_venda = $data_venda;
    }

    public function setValorTotal($valor_total) {
        $this->valor_total = $valor_total;
    }

    public function setFormaPagamento($forma_pagamento) {
        $this->forma_pagamento = $forma_pagamento;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Métodos Getters
    public function getId() {
        return $this->id;
    }

    public function getProduto() {
        return $this->produto;
    }

    public function getCliente() {
        return $this->cliente;
    }

    /*public function getIdProduto() {
        return $this->id_produto;
    }

    public function getIdCliente() {
        return $this->id_cliente;
    }*/

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getDataVenda() {
        return $this->data_venda;
    }

    public function getValorTotal() {
        return $this->valor_total;
    }

    public function getFormaPagamento() {
        return $this->forma_pagamento;
    }

    public function getStatus() {
        return $this->status;
    }
}

?>