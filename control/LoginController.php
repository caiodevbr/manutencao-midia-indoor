<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author miolivc
 */
class LoginController {
    private $usuario;
    private $usuarioDao;
    
    public function __construct() {
        $this->usuario = NULL;
        $this->usuarioDao = new UsuarioDao();
    }
    
    public function login() {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $this->usuario = $this->usuarioDao->find($login);
        if ($this->usuario->getSenha() == $senha && $this->usuario->getAtivo()) {
            session_start();
            $_SESSION['usuario'] = $this->usuario;
            header("home.php");
        }
    }
    
    public function logout() {
        
    }
    
}
