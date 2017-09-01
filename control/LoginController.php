<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// include ("../model/Usuario.php");
include ("./UsuarioController.php");

class LoginController {
    private $usuario;
    private $userController;

    public function __construct() {
        $this->usuario = NULL;
        $this->userController = new UsuarioController();

        if ($_POST['acao'] == 'login') {
            $this->login();
        } else if ($_POST['acao'] == "logout") {
            $this->logout();
        } else if ($_POST['acao'] == "subscribe") {
            $this->subscribe();
        }
    }

    public function login() {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $this->usuario = $this->userController->findUsuario($login);
        // eSSE TRECHO TALVEZ NAO ESTEJA EXECUTANDO
        if (($this->usuario->getSenha() == $senha) && ($this->usuario->getAtivo())) {
            session_start();
            $_SESSION['usuario'] = $this->usuario->getNome();
            header("Location:../view/home.php");
        } else {
            header("Location:../../index.php");
        }
    }

    public function logout() {
        echo $_SESSION['usuario'];
        session_destroy();
        echo "Tentei";
        #header("Location:../../index.php");
    }

    public function subscribe() {
        $this->userController->addUsuario();
    }
}

new LoginController();
?>
