<?php
    $usuario;
    if (session_status() !=  PHP_SESSION_ACTIVE) {
        header("index.php");
    }
    if(isset($_GET['noticia'])) {
        $noticiaController = new NoticiaController();
        $noticiaController->removeNoticia($noticia);
    }
?>
