<?php

class Produto {
    private $id;
    private $nome;
    private $preco;
    private $estoque;
    private $unidade;
    private $codigo_barras;
    private $fornecedor;
    private $categoria;
    //private $id_fornecedor;
    //private $id_categoria;
    private $id_usuario;


    // Métodos Setters
    public function setId($id) {
        $this->id = $id;
    }

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

    /*public function setIdFornecedor($id_fornecedor) {
        $this->id_fornecedor = $id_fornecedor;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    } */
        
    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setCodigoBarras($codigo_barras) {
        $this->codigo_barras = $codigo_barras;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setFornecedor($fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    // Métodos Getters
    public function getId() {
        return $this->id;
    }

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

    /*public function getIdFornecedor() {
        return $this->id_fornecedor;
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }*/

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getCodigoBarras() {
        return $this->codigo_barras;
    }

    public function getFornecedor() {
        return $this->fornecedor;
    }

    public function getCategoria() {
        return $this->categoria;
    }
}
?>
