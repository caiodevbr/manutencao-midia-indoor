<!DOCTYPE html>
<?php
    if (isset($_SESSION['usuario'])) {
        header("index.php");
    }
    $usuario = $_SESSION['usuario'];
    if(isset($_GET['noticia'])) {
        include("../control/NoticiaController.php");
        $controler = new NoticiaController();
        $noticia = $controler->get($_GET['noticia']);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href="cadastro-noticia.php">Cadastrar Noticia</a>
            <a href="noticia-tags.php">Gerenciar Noticia por tag</a>
        </nav>
        <div>
            <p>Tag: <?php $noticia->getTag(); ?></p>
            <img src="<?php $noticia->getImage(); ?>"/>
            <p>Titulo: <?php $noticia->getTitle(); ?></p>
            <p>Fonte: <?php $noticia->getFont(); ?></p>
            <p>Desscricao: <?php $noticia->getDescricao(); ?></p>
            <p>Texto: <?php $noticia->getText(); ?></p>
        </div>
        <div id="options">
            <a href='detalhes-noticia.php/?noticia={$noticia}'>Detalhes</a>
            <a href='editar-noticia.php/?noticia={$noticia}'>Editar</a>
            <a href='remover-noticia.php/?noticia={$noticia}'>Editar</a>
        </div>
    </body>
</html>
