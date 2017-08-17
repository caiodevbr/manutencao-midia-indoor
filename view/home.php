<!DOCTYPE html>
<?php
    $usuario;
    if (session_status() !=  PHP_SESSION_ACTIVE) {
        header("index.php");
    }
    $usuario = $_SESSION['usuario'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href="view/noticia.php">Gerenciar Noticias</a>
            <?php
                $userController = new UsuarioController();
                if ($userController->findUsuario($usuario)->getAdmin()) {
                    echo "<a href='view/usuarios.php'>Gerenciar Usuarios</a>";
                }
            ?>
        </nav>
        <h1>Bem vindo, <?php echo $usuario ?></h1>
    </body>
</html>
