<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuarios</title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="post" action="<?php 
                    $usuarioController = new UsuarioController();
                    $usuarioController->addUsuario(); ?>">
            <input type="text" name="nome" placeholder="Digite seu nome"/>
            <input type="text" name="login" placeholder="Digite seu login"/>
            <input type="password" name="senha" placeholder="Digite sua senha"/>
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
        <a href="view/cadastro-user.php">Cadastre-se</a>
    </body>
</html>