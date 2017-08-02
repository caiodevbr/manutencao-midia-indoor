<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/cadastro.css">
        <link rel="stylesheet" href="assets/cadastro.js">
        <link rel="stylesheet" href="assets/sweetalert2.css">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
        <center>
            <img id="logo" src="logos/logo.png">
        </center>
        <div id="table">
            <!-- TABLE -->
            <?php
                $table = "<table id='selectable' cellspacing='4'><thead><tr id='linhaAzul'><td>Username</td><td>Nome</td><td>Ativo</td><td>Administrador</td><td>Ações</td></tr></thead><tbody>";

                $conn = pg_connect("host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres");

                $query = "SELECT * FROM usuario";
                $results = pg_query($conn, $query);
                while($result = pg_fetch_array($results)) {
                    $table .= "<tr id='linhaCinza'><td>".$result['login']."</td><td>".$result['nome']."</td><td>".$result['ativo']."</td><td>".$result['admin']."</td>";
                    $table .= "<td><button>Editar</button>  <button>Excluir</button></td></tr>";
                }
                echo "</tbody>".$table;
            ?>
        </div>
    </body>
</html>
