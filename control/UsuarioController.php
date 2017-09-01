<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author miolivc
 */

include_once("../infra/UsuarioDao.php");

class UsuarioController {
    private $usuario;
    private $usuarioDao;

    public function __construct() {
        $this->usuario = NULL;
        $this->usuarioDao = new UsuarioDao();
    }

    public function addUsuario() {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $this->usuario = new Usuario($login, $senha, $nome);
        $this->usuarioDao->add($usuario);
        header("../index.php");
    }

    public function listUsuario() {
        return $this->usuarioDao->lista();
    }

    public function findUsuario($login) {
        return $this->usuarioDao->find($login);
    }

    public function removeUsuario($login){
        $this->usuarioDao->remove($login);
    }
}

?>
