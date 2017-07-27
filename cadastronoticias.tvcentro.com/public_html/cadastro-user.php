<?php

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

$conn = pg_connect('host=127.0.0.1 port=5432 dbname=noticias user=postgres');

if($conn) {
    $query = "INSERT INTO usuario(nome, login, senha, ativo, admin) VALUES('$nome', '$login', '$senha', 'false', 'false')";
    $insert = pg_query($conn, $query);
    pg_close($conn);
    if ($insert) {
        echo "Cadastro efetuado com sucesso! Você será redirecionado!";
    } else {
        echo "Não foi possível concluir seu cadastro devido a algum erro!";
    }
    header("location:index.html");
}
?>
