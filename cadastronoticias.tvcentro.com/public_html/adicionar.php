<?php

$tagBox = $_POST['tagBox'];
$imgBox = $_POST['imgBox'];
$titulo = $_POST['titulo'];
$fontBox = $_POST['fontBox'];
$descricao = $_POST['descricao'];
$mainBox = $_POST['mainBox'];

$conn = pg_connect('host=127.0.0.1 port=5432 dbname=noticias user=postgres');

if($conn){
	$query = "INSERT INTO noticias(tagBox, imgBox, titulo,fontBox, descricao, mainBox, insercao) VALUES('$tagBox','$imgBox', '$titulo', '$fontBox', '$descricao', '$mainBox', now())";

	$insercao = pg_query($conn, $query);

	if($insercao){
		pg_close($conn);
		header("Refresh:5; url=index.html");
		echo '<link rel="stylesheet" href="assets/sweetalert2.css">';
		echo '<script src="assets/jquery-3.1.1.min.js"></script>';
		echo '<script src="assets/sweetalert2.js"></script>';
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () {swal("Sucesso!", "As informações foram inseridas com sucesso!", "success")});';	
		echo '</script>';
	} else {
		header("Refresh:5; url=index.html");
		echo '<link rel="stylesheet" href="assets/sweetalert2.css">';
		echo '<script src="assets/jquery-3.1.1.min.js"></script>';
		echo '<script src="assets/sweetalert2.js"></script>';
		echo '<script type="text/javascript">';
		echo 'setTimeout(function () {swal("Que droga...", "Falha ao inserir dados...", "error")});';	
		echo '</script>';
		}

}
 else {
	header("Refresh:5; url=index.html");
	echo '<link rel="stylesheet" href="assets/sweetalert2.css">';
	echo '<script src="assets/jquery-3.1.1.min.js"></script>';
	echo '<script src="assets/sweetalert2.js"></script>';
	echo '<script type="text/javascript">';
	echo 'setTimeout(function () {swal("Falha ao conectar com o servidor...", "A sua conexão com a internet está ativa?", "warning")});';	
	echo '</script>';
}
?>
