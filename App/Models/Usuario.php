<?php

class Usuario {
    private $usuario;
    private $senha;
    private $nivel_acesso;

    public function setUsuario($usuario) {
        return $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        return $this->senha = $senha;
    }

    public function setNivel_acesso($nivel_acesso) {
        return $this->nivel_acesso = $nivel_acesso;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNivel_acesso($nivel_acesso) {
        return $this->nivel_acesso;
    }
}
?>
