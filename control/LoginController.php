<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// include ("../model/Usuario.php");
include ("../infra/UsuarioDao.php");

class LoginController {
    private $usuario;
    private $usuarioDao;
    
    public function __construct() {
        $this->usuario = NULL;
        $this->usuarioDao = new UsuarioDao();

        if($_POST['acao'] == "login") {
            $this->login();
        } else if ($_POST['acao'] == "logout") {
            $this->logout();
        }
    }
    
    public function login() {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $this->usuario = $this->usuarioDao->find($login);
        // eSSE TRECHO TALVEZ NAO ESTEJA EXECUTANDO
        if (($this->usuario->getSenha() == $senha) && ($this->usuario->getAtivo())) {
            echo "Entrou ne";
            session_start();
            $_SESSION['usuario'] = $this->usuario->getNome();
            header("Location:../view/home.php");
        } else {
            header("Location:../../index.php");
        }
        
    }
    
    public function logout() {
        unset($_SESSION['usuario']);
        session_destroy();
        header("Location:../../index.php");
    }
    
}

new LoginController();
?>