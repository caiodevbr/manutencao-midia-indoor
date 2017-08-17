<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form method="post" action="control/LoginController.php">
            <input type="hidden" name="acao" value="login">
            <input type="text" name="login" placeholder="Digite seu login"/>
            <input type="password" name="senha" placeholder="Digite sua senha"/>
            <button type="submit">Entrar</button>
            <button type="reset">Limpar</button>
        </form>
        <a href="view/cadastro-user.php">Cadastre-se</a>
    </body>
</html>
