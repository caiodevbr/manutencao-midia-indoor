
<form method="get" action="table-noticias.php">
    <select id='tagBox' name='tagBox' onchange=""='atualizarTable(this.value)' required>
        <option id='saude' value='saude'>Saúde</option>
        <option id='saude' value='nutricao'>Nutrição</option>
        <option id='saude' value='dieta'>Dieta</option>
        <option id='beleza' value='beleza'>Beleza Masculina</option>
        <option id='academia' value='academia'>Academia</option>
        <option selected value=''>Selecione o tipo da notícia...</option>
    </select>
    <input type="submit" name="Enviar"/>
</form>

<?php
    $tag = $_GET['tagBox'];
    $table = "<table id='selectable' cellspacing='4'><thead><tr id='linhaAzul'><td>#</td><td>Título da notícia</td></tr></thead><tbody>";

    $conn = pg_connect("host=127.0.0.1 port=5432 dbname=noticias user=postgres password=postgres");

    $query = "SELECT * FROM noticias";

    if ($tag != "") {
        $query = "SELECT * FROM noticias WHERE tagBox = '$tag' ";
    }

    $results = pg_query($conn, $query);
    pg_close($conn);

    while($result = pg_fetch_array($results)) {
        $table .= "<tr id='linhaCinza'><td>".$result['id']."</td><td>".$result['titulo']."</td></tr>";
    }
    echo "</tbody>".$table;
?>
