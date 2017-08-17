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

include("ConnectionFactory.php");

class NoticiaDao {
    private $conn;

    public function __construct() {
        $this->conn = ConnectionFactory::getConnection();
    }
    
    public function add(Noticia $noticia) {
        $query = "INSERT INTO NOTICIA(TAGBOX, IMGBOX, TITULO, FONTBOX, DESCRICAO, MAINBOX)"
                . " VALUES ('{$noticia->getTag()}','{$noticia->getImage()}', '{$noticia->getTitle()}',"
                . "'{$noticia->getFont()}', '{$noticia->getDescricao()}','{$noticia->getText()}')";
        $result = pg_query($conn, $query);
        return isset($result);
    }
    
    public function edit(Noticia $noticia) {
        $query = "UPDATE NOTICIA SET TAGBOX = '{$noticia->getTag()}' IMGBOX = '{$noticia->getImage()}' "
                . "TITULO = '{$noticia->getTitle()}' FONTBOX = '{$noticia->getFont()}'"
                . " DESCRICAO = '{$noticia->getDescricao()}' MAINBOX = '{$noticia->getText()}') " 
                . "WHERE ID = '{$noticia->getId()}'";
        $result = pg_query($conn, $query);
        return isset($result);
    }
    
    public function remove(Noticia $noticia) {
        $query = "DELETE FROM NOTICIA WHERE ID = '{$noticia->getId()}'";
        $result = pg_query($conn, $query);
        return isset($result);
    }
    
    public function listaAll() {
        $list = array();
        $query = "SELECT * FROM NOTICIA";
        $result = pg_query($conn, $query);
        if(! $result) {
            while ($row = pg_fetch_array($result)) {
                $noticia = new Noticia();
                $noticia->setId($row['id']);
                $noticia->setTag($row['tagBox']);
                $noticia->getFont($row['fontBox']);
                $noticia->getImage($row['imgBox']);
                $noticia->getTitle($row['titulo']);
                $noticia->getDescricao($row['descricao']);
                $noticia->getText($row['mainBox']);
                $list[] = $noticia;
            }
        }
        return $list;
    }
    public function lista(string $tag) {
        $list = array();
        $query = "SELECT * FROM NOTICIA WHERE TAGBOX = '{$tag}'";
        $result = pg_query($conn, $query);
        if(! $result) {
            while ($row = pg_fetch_array($result)) {
                $noticia = new Noticia();
                $noticia->setId($row['id']);
                $noticia->setTag($row['tagBox']);
                $noticia->getFont($row['fontBox']);
                $noticia->getImage($row['imgBox']);
                $noticia->getTitle($row['titulo']);
                $noticia->getDescricao($row['descricao']);
                $noticia->getText($row['mainBox']);
                $list[] = $noticia;
            }
        }
        return $list;
    }
    
}
