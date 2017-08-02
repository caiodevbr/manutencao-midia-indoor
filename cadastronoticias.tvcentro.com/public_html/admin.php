<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/cadastro.css">
        <link rel="stylesheet" href="assets/sweetalert2.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
        <center>
            <img id="logo" src="logos/logo.png">
        </center>
        <div id="table">
            <!-- TABLE -->
        </div>
    </body>
</html>

<?php
    $table = "<table id='selectable' cellspacing='4'><thead><tr id='linhaAzul'><td>#</td>" + 
        "<td>Username</td><td>Nome</td><td>Ativo</td><td>Administrador</td></tr></thead><tbody>";

    $conn = pg_connect("host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres");

    $query = "SELECT * FROM usuarios";

    $count = 0;
    $lineColor;
    $results = pg_query($conn, $query);
    while($result = pg_fetch_array($results)) {
        if (count % 2 == 0) {
            $lineColor = "linhaCinza";
        } else {
            $lineColor = "linhaAzul";
        }
        $table .= "<tr id='".$lineColor."'><td>".$result['username']."</td>" + 
            "<td>".$result['name']."</td><td>".$result['ativo']."</td>" + 
            "<td>".$result['admin']."</td></tr>";
    }
    echo "</tbody>".$table;
?>