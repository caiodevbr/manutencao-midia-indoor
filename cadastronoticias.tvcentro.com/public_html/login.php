<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

$conn = pg_connect('host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres');

if($conn) {
    $query = "SELECT * FROM usuario";
    $result = pg_query($conn, $query);
    pg_close($conn);

    if ($result['login'] != null && $result['senha'] != null $result['login'] == $login && $result['senha'] == $senha) {
        if($result['ativo']) {
            session_start();
            header("location:table-noticias.php");
        } else {
            echo "Usuário ainda não foi aprovado!";
            header("location:index.html");
        }
    }
}
?>
