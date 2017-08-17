<?php

/**
 * Description of Usuario
 *
 * @author miolivc
 */
class Usuario {
    
    private $login;
    private $senha;
    private $nome;
    private $ativo;
    private $admin;

    public function __construct($login, $senha, $nome) {
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
    }
    
    public function getLogin() {
        return $this->login;
    }

        public function setLogin($login) {
        $this->login = $login;
    }
    
    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
    
    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }
    
    
}