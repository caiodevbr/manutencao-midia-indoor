<?php

/**
 * Description of NoticiaController
 *
 * @author miolivc
 */
class NoticiaController {
    private $noticia;
    private $noticiaDao;
    
    public function __clone() {
        $this->noticia = NULL;
        $this->noticiaDao = new NoticiaDao();
    }
    
    public function addNoticia() {
        $tag = $_POST['tag'];
        $title = $_POST['title'];
    }
}
