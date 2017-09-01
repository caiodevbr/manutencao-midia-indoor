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
        $result = pg_query($this->conn, $query);
        return isset($result);
    }

    public function edit($ud) {
        $query = "UPDATE NOTICIA SET TAGBOX = '{$noticia->getTag()}' IMGBOX = '{$noticia->getImage()}' "
                . "TITULO = '{$noticia->getTitle()}' FONTBOX = '{$noticia->getFont()}'"
                . " DESCRICAO = '{$noticia->getDescricao()}' MAINBOX = '{$noticia->getText()}') "
                . "WHERE ID = '{$noticia->getId()}'";
        $result = pg_query($this->conn, $query);
        return isset($result);
    }

    public function remove($id) {
        $query = "DELETE FROM NOTICIA WHERE ID = '{$id}'";
        $result = pg_query($this->conn, $query);
        return isset($result);
    }

    public function listaAll() {
        $list = array();
        $query = "SELECT * FROM NOTICIA";
        $result = pg_query($this->conn, $query);
        while ($row = pg_fetch_array($result)) {
            $noticia = new Noticia();
            $noticia->setId($row['id']);
            $noticia->setTag($row['tagBox']);
            $noticia->setFont($row['fontBox']);
            $noticia->setImage($row['imgBox']);
            $noticia->setTitle($row['titulo']);
            $noticia->setDescricao($row['descricao']);
            $noticia->setText($row['mainBox']);
            $list[] = $noticia;
        }
        return $list;
    }
    public function lista(string $tag) {
        $list = array();
        $query = "SELECT * FROM NOTICIA WHERE TAGBOX = '{$tag}'";
        $result = pg_query($this->conn, $query);
        if(! $result) {
            while ($row = pg_fetch_array($result)) {
                $noticia = new Noticia();
                $noticia->setId($row['id']);
                $noticia->setTag($row['tagBox']);
                $noticia->setFont($row['fontBox']);
                $noticia->setImage($row['imgBox']);
                $noticia->setTitle($row['titulo']);
                $noticia->setDescricao($row['descricao']);
                $noticia->setText($row['mainBox']);
                $list[] = $noticia;
            }
        }
        return $list;
    }

    public function get($id) {
        $query = "SELECT * FROM NOTICIA WHERE ID =".$id.";";
        $results = pg_query($this->conn, $query);
        $usuario = $noticia;
        foreach (pg_fetch_all($results) as $result) {
            $noticia = new Noticia();
            $noticia->setId($row['id']);
            $noticia->setTag($row['tagBox']);
            $noticia->setFont($row['fontBox']);
            $noticia->setImage($row['imgBox']);
            $noticia->setTitle($row['titulo']);
            $noticia->setDescricao($row['descricao']);
            $noticia->setText($row['mainBox']);
            break;
        }
        return $noticia;
    }

}
