<!DOCTYPE html>
<?php include("control/UsuarioController.php"); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro de Usuarios</title>
    </head>
    <body>
        <h1>Login</h1>
            <form method="post" action="control/userController.php">
            <input type="hidden" name="acao" value="addUsuario">
            <input type="text" name="nome" placeholder="Digite seu nome"/>
            <input type="text" name="login" placeholder="Digite seu login"/>
            <input type="password" name="senha" placeholder="Digite sua senha"/>
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
    </body>
</html>
