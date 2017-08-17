<!DOCTYPE html>
<?php
    include_once("../control/UsuarioController.php");

    $usuario;
    //if (session_status() ==  PHP_SESSION_ACTIVE) {
    //    header("Location:../index.php");
    //}
    //$usuario = $_SESSION['usuario'];
    $usuario = "miolivc";
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
                $user = $userController->findUsuario($usuario);
                if ($user->getAdmin() == true) {
                    echo "<a href='view/usuarios.php'>Gerenciar Usuarios</a>";
                }
            ?>
        </nav>
        <h1>Bem vindo, <?php echo $usuario; ?></h1>
    </body>
</html>
