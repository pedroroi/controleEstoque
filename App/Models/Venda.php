<?php

class Venda {
    private $id_cliente;
    private $id_usuario;
    private $data_venda;
    private $valor_total;
    private $forma_pagamento;
    private $status;

    // Métodos Setters
    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setIdUsuario($id_usuario) {
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
    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getIdUsuario() {
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