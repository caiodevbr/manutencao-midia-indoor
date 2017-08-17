<?php

include("ConnectionFactory.php");
include_once("../model/Usuario.php");

class UsuarioDao {
    
    private $conn;
    
    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }
    
    public function add(Usuario $usuario) {
       $query = "INSERT INTO USUARIO (LOGIN, SENHA, NOME)"
               . " VALUES('{$usuario->getLogin()}', '{$usuario->getSenha()}' , "
               . "'{$usuario->getNome()}')";
        //return pg_query($conn, $query) != NULL;
    }
    
    public function find($login) {
        $query = "SELECT LOGIN, SENHA, NOME, ATIVO, ADMIN FROM USUARIO WHERE LOGIN = '".$login."'";
        $results = pg_query($this->conn, $query);
        echo $results['login'];
        $usuario = NULL;
        foreach (pg_fetch_all($results) as $result) {
            $usuario = new Usuario($result['login'], $result['senha'], $result['nome']);
            $usuario->setAtivo($result['ativo']);
            $usuario->setAtivo($result['admin']);
            break;
        }
        //echo "User: " . $usuario->getNome() . "Ativo: " . $usuario->getAtivo();
        return $usuario;
    }

    public function edit(Usuario $usuario) {
        $query = "UPDATE USUARIO SET NOME = '{$usuario->getNome()}' SENHA = '{$usuario->getSenha()}'"
                . "ATIVO = '{$usuario->getAtivo()}' ADMIN = '{$usuario->getAdmin()}' "
                . "WHERE LOGIN = '{$usuario->getLogin()}'";
        return pg_query($this->conn, $query) != NULL;
    }
    
    public function lista() {
        $list = array();
        $query = "SELECT * FROM USUARIO";
        $results = pg_query($this->conn, $query);
        foreach (pg_fetch_all($results) as $result) {
            $usuario = new Usuario($result['login'], $result['senha'], 
                    $result['nome'], $result['ativo'], $result['admin']);
            $list[] = $usuario;
        }
        return $list;
    }
    
    public function remove(string $login) {
        $query = "DELETE FROM USUARIO WHERE LOGIN = '{$login}'";
        return pg_query($this->conn, $query) != NULL;
    }
    
}
?>