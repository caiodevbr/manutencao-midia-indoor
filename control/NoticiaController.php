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
        $tag = $_POST['TAGBOX'];
        $image = $_POST['IMGBOX']; //Tratar p download depois
        $title = $_POST['TITULO'];
        $font = $_POST['FONTBOX'];
        $descricao = $_POST['DESCRICAO'];
        $text = $_POST['MAINBOX'];
        $this->noticia = new Noticia($tag, $title, $font, $descricao, $text, $image);
        $this->noticiaDao->add($noticia);
        $this->noticia = NULL;
        header("view/noticia.php");
    }
    
    public function removeNoticia(Noticia $noticia) {
        $this->noticiaDao->remove($noticia);
        header("view/noticia.php");
    }
    
    public function editarNoticia() {
        $id = $_POST['ID']; 
        $tag = $_POST['TAGBOX'];
        $image = $_POST['IMGBOX']; //Tratar p download depois
        $title = $_POST['TITULO'];
        $font = $_POST['FONTBOX'];
        $descricao = $_POST['DESCRICAO'];
        $text = $_POST['MAINBOX'];
        $this->noticia = new Noticia($tag, $title, $font, $descricao, $text, $image);
        $this->noticia->setId($id);
        $this->noticiaDao->edit($noticia);
        header("view/noticia.php");
    }
    
    public function listaTodas() {
        return $this->noticiaDao->listAll();
    }
    
    public function listaTodasTag(string $tag) {
        return $this->noticiaDao->lista($tag);
    }
    
}
