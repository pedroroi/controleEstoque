<?php

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $endereco;
    private $id_usuario;

    // Getters e Setters para cada campo
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getId_Usuario() {
        return $this->id_usuario;
    }

    public function setId_Usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

}
?>