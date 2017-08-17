<!DOCTYPE html>
<?php
    $usuario;
    if (session_status() !=  PHP_SESSION_ACTIVE) {
        header("index.php");
    }
    $usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Gerenciamento de usuarios!</title>
	</head>
	<body>
		<h1>Bem vindo, <?php $usuario ?>!</h1>
		<?php 
            $usuarioController = new UsuarioController();
            $table = "<table><thread><tr><td>Título da Notícia</td>Ações</tr></thread><tbody>";
            foreach ($noticiaController->listaTodas() as $noticia) {
                $table .= "<tr><td>'{$noticia->getTitle()}'</td><td>"
                . "<a href='detalhes-noticia.php/?noticia={$noticia}'>Detalhes</a>"
                . "<a href='editar-noticia.php/?noticia={$noticia}'>Editar</a>"
                . "<a href='remover-noticia.php/?noticia={$noticia}'>Editar</a></td></tr>";
            }
            $table .= "</tbody></table>";
            echo $table;
        ?>
	</body>
</html>