<?php
    if(isset($_GET['tagBox'])){
        $tag = $_GET['tagBox'];
    } else {
        $tag = 'all';
    }

    $table = "<table id='selectable' cellspacing='4'><thead><tr id='linhaAzul'><td>#</td>" + 
        "<td>Título da notícia</td></tr></thead><tbody>";

    $conn = pg_connect("host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres");

    $query = "SELECT * FROM noticias WHERE tagBox = '$tag'";

    if($query == 'all') {
        $query = "SELECT * FROM noticias";
    }

    $count = 0;
    $lineColor;
    $results = pg_query($conn, $query);
    while($result = pg_fetch_array($results)) {
        if (count % 2 == 0) {
            $lineColor = "linhaCinza";
        } else {
            $lineColor = "linhaAzul";
        }
        $table .= "<tr id='".$lineColor."'><td>".$result['id']."</td>" + 
            "<td>".$result['titulo']."</td><td><button>Excluir</button></td></tr>";
    }
    echo "</tbody>".$table;
?>
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
        <form method="get">
            <center>
                <select id='tagBox' name='tagBox'>
    		        <option id='saude' value='saude'>Saúde</option>
    		        <option id='saude' value='nutricao'>Nutrição</option>
    		        <option id='saude' value='dieta'>Dieta</option>
    		        <option id='beleza' value='beleza'>Beleza Masculina</option>
    		        <option id='academia' value='academia'>Academia</option>
    		        <option selected value='all'>Todas</option>
    		    </select>
                <button type="submit">Atualizar Lista</button>
            </center>
        </form>

        <div id="table"></div>
    </body>
</html>
