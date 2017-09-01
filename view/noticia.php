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
            <a href="noticia-tags.php">Gerenciar Noticia por Tag</a>
        </nav>
        <?php
            $noticiaController = new NoticiaController();
            $table = "<table><thread><tr><td>Título da Notícia</td><td>Ações</td></tr></thread><tbody>";
            foreach ($noticiaController->listaTodas() as $noticia) {
                $table .= "<tr><td>". $noticia->getTitle() ."</td><td>"
                    . "<a href='detalhes-noticia.php/?noticia='". $noticia->getId() .">Detalhes</a> | "
                    . "<a href='editar-noticia.php/'>Editar</a> | "
                    . "<a href='remover-noticia.php/'>Remover</a></td></tr>";
            }
            $table .= "</tbody></table>";
            echo $table;
        ?>
    </body>
</html>
