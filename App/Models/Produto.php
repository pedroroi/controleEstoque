<?php

class Produto {
    private $nome;
    private $preco;
    private $estoque;
    private $unidade;
    private $id_fornecedor;
    private $id_categoria;
    private $codigo_barras;

    // Métodos Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    public function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    public function setIdFornecedor($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setCodigoBarras($codigo_barras) {
        $this->codigo_barras = $codigo_barras;
    }

    // Métodos Getters
    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getEstoque() {
        return $this->estoque;
    }

    public function getUnidade() {
        return $this->unidade;
    }

    public function getIdFornecedor() {
        return $this->id_fornecedor;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getCodigoBarras() {
        return $this->codigo_barras;
    }
}
?>
