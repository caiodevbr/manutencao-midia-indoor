<!DOCTYPE html>
<?php
    include("../control/NoticiaController.php");
    if (! isset($_SESSION['usuario'])) {
        header("index.php");
    } else {
        $usuario = $_SESSION['usuario'];
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
        <?php
            $noticiaController = new NoticiaController();
            $table = "<table><thread><tr><td>Título da Notícia</td>Ações</tr></thread><tbody>";
            if ($noticias = $noticiaController->listaTodas() != NULL) {
                foreach ($noticias as $noticia) {
                    $table .= "<tr><td>'{$noticia->getTitle()}'</td><td>"
                    . "<a href='detalhes-noticia.php/?noticia={$noticia}'>Detalhes</a>"
                    . "<a href='editar-noticia.php/?noticia={$noticia}'>Editar</a>"
                    . "<a href='remover-noticia.php/?noticia={$noticia}'>Editar</a></td></tr>";
                }
            }
            $table .= "</tbody></table>";
            echo $table;
        ?>
    </body>
</html>
