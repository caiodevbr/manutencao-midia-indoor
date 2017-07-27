<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

$conn = pg_connect('host=187.17.184.44 port=5432 dbname=noticias user=postgres');

if($conn) {
    $query = "SELECT login, senha, ativo FROM usuario";
    $result = pg_query($conn, $query);
    pg_close($conn);
    if ($result['login'] == login && $result['senha'] == senha) {
        if($result['ativo']) {
            session_start();
            header("location:home.php");
        } else {
            echo "Usuário ainda não foi aprovado!";
            header("location:index.html");
        }
    } else {
        header("location:cadastro.html");
    }
}
?>
