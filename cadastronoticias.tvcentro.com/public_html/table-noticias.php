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
        <table id='selectable' cellspacing='4'>
            <thead>
                <tr>
                    <td>Título da notícia</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $conn = pg_connect("host=127.0.0.1 port=5432 dbname=noticias user=postgres");
                    
                    $query = null;
                    
                    if ($tagBox != null) {
                        $query = "SELECT * FROM noticias WHERE '$tagBox' == tagBox";   
                    } else {
                        $query = "SELECT * FROM noticias";
                    }
                    $results = pg_query($conn, $query);

                    pg_close($conn);

                    foreach ($results as $result) {
                        echo "<tr><td id='linhaCinza'>'$result['title']'</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>    