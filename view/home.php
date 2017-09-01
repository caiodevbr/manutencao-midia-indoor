<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href="noticia.php">Gerenciar Noticias</a>
            <?php
                include_once("../control/UsuarioController.php");
                $userController = new UsuarioController();
                $user = $userController->findUsuario('miolivc');
                echo $user->getAdmin();
                if ($user->getAdmin() == 0) {
                    echo "<a href='usuarios.php'>Gerenciar Usuarios</a>";
                }
            ?>
        </nav>
        <h1>Bem vindo, <?php echo $user->getNome(); ?></h1>
    </body>
</html>
