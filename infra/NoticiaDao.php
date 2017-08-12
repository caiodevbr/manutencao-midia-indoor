<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticiaDao
 *
 * @author miolivc
 */

class NoticiaDao {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }
    
    public function add(Noticia $noticia) {
        $query = "INSERT INTO NOTICIA(TAGBOX, IMGBOX, TITULO, FONTBOX, DESCRICAO, MAINBOX, INSERCAO)"
                . " VALUES ('{$noticia->getTag()}','{$noticia->getImage()}', '{$noticia->getTitle()}',"
                . "'{$noticia->getFont()}', '{$noticia->getDescricao()}','{$noticia->getText()}', '{now()}')";
        $result = pg_query($conn, $query);
        return isset($result);
    }
    
    public function remove(Noticia $noticia) {
        $query = "DELETE FROM NOTICIA WHERE ID = '{$noticia->getId()}'";
        $result = pg_query($conn, $query);
        return isset($result);
    }
    
    public function lista() {
        $query = "SELECT * FROM NOTICIA";
        $results = pg_query($conn, $query);
        return $results;
    }
    
}
