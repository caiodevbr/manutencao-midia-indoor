<!DOCTYPE html>
<?php
    $usuario;
    if (session_status() !=  PHP_SESSION_ACTIVE) {
        header("index.php");
    }
    $usuario = $_SESSION['usuario'];
    if (isset($_GET['noticia'])) {
        $noticia = $_GET['noticia'];
    }
?>
<html>
    <body>
        <h1>Editar Noticia</h1>
        <form method="post" action="<?php 
                $noticiaController = new NoticiaController();
                $noticiaController->editarNoticia(); ?>">
            <input type="hidden" name="id" value="<?php $noticia->getId(); ?>">
            <input type="hidden" name="tagbox" value="<?php $noticia->getId(); ?>">
            <input id='imgBox' name='imgBox' type='text' value='<?php $noticia->getImage(); ?>' placeholder='URL da imagem' required/>
            <input name='titulo' maxlength='40' id='titleBox' type='text' value='<?php $noticia->getTitle(); ?>' placeholder='Título' required/>
            <input id='fontBox' name='fontBox' type='text' value='<?php $noticia->getFont(); ?>' placeholder='Fonte' required/>
            <input name='descricao' maxlength='60' id='descriptionBox' type='text' value='<?php $noticia->getDescricao(); ?>' placeholder='Descrição' required/>
            <textarea maxlength='370' id='mainBox' name='mainBox' type='text' value='<?php $noticia->getText(); ?>' placeholder='Insira a notícia aqui!' required></textarea>
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
    </body>
</html>

