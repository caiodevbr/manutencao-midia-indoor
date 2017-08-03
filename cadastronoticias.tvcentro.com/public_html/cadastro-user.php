<?php

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$senha2 = $_POST['senha2'];

$conn = pg_connect('host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres');

if($conn) {
    $query = "INSERT INTO usuario(nome, login, senha, ativo, admin) VALUES('$nome', '$login', '$senha', 'false', 'false')";
    if (senha != senha2) {
        echo "Você digitou a confirmação de senha diferente da senha, tente novamente";
        header("location:cadastro-user.html");
    }
    $insert = pg_query($conn, $query);
    pg_close($conn);
    if ($insert) {
        header("Refresh:5; url=index.html");
		// echo '<link rel="stylesheet" href="assets/sweetalert2.css">';
		// echo '<script src="assets/jquery-3.1.1.min.js"></script>';
		// echo '<script src="assets/sweetalert2.js"></script>';
		// echo '<script type="text/javascript">';
		// echo 'setTimeout(function () {swal("Sucesso!", "As informações foram inseridas com sucesso!", "success")});';
		// echo '</script>';
    } else {
        header("Refresh:5; url=erro.html");
    }
}
?>
