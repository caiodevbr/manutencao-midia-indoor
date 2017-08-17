<?php 
	// include_once("model/Usuario.php");
	include("infra/UsuarioDao.php");

	$dao = new UsuarioDao();
	$usuario = $dao->find("miolivc");
    $usuario = new Usuario("teste", "teste", "teste insert");
    $dao->add($usuario);
	//echo "User" . $usuario->getNome();

	// $connection_string = "host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres";
	// $conn = pg_pconnect($connection_string);
	// $login = "miolivc";
	// $query = "SELECT * FROM USUARIO WHERE LOGIN = '".$login."'";
    // $result = pg_query($conn, $query);
    // $test = pg_fetch_array($result);
    // foreach ($test as $value) {
     	// echo $value;
     // } 
    // $usuario = NULL;
    // if(! $result) {
        // $usuario = new Usuario($result['login'], $result['senha'], 
                // $result['nome'], $result['ativo'], $result['admin']);
    // }
    // echo $usuario;

?>