<?php

/**
 * Description of UsuarioDao
 *
 * @author miolivc
 */
class UsuarioDao {
    
    private $conn;
    
    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }
    
    public function add(Usuario $usuario) {
       $query = "INSERT INTO USUARIO (LOGIN, SENHA, NOME, ATIVO, ADMIN)"
               . " VALUES('{$usuario->getLogin()}', '{$usuario->getSenha()}' , "
               . "'{$usuario->getNome()}', '{$usuario->getAtivo()}', '{$usuario->getAdmin()}')";
        return isset(pg_query($conn, $query));
    }
    
    public function find(string $login) {
        $query = "SELECT * FROM USUARIO WHERE LOGIN = '{$login}'";
        $result = pg_query($conn, $query);
        $usuario = NULL;
        if(! $result) {
            $usuario = new Usuario($result['login'], $result['senha'], 
                    $result['nome'], $result['ativo'], $result['admin']);
        }
        return $usuario;
    }
    
    public function lista() {
        $list = array();
        $query = "SELECT * FROM USUARIO";
        $result = pg_query($conn, $query);
        if(! $result) {
            $usuario = new Usuario($result['login'], $result['senha'], 
                    $result['nome'], $result['ativo'], $result['admin']);
            $list[] = $usuario;
        }
        return $list;
    }
    
    public function remove(string $login) {
        $query = "DELETE FROM USUARIO WHERE LOGIN = '{$login}'";
        return isset(pg_query($conn, $query));
    }
    
}
