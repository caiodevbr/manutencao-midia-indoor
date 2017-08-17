<!DOCTYPE html>
<?php
    $usuario;
    if (session_status() !=  PHP_SESSION_ACTIVE) {
        header("index.php");
    }
    $usuario = $_SESSION['usuario'];
    $noticiaController = new NoticiaController();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <a href="cadastro-noticia.php">Cadastrar Noticia</a>
            <a href="noticia-tags.php">Gerenciar Noticia por tag</a>
        </nav>
        
        <form method="get" action="<?php $noticia = $noticiaController->listaTodasTag(tagBox); ?>">
            <select id='tagBox' name='tagBox' required>
		<option id='saude' value='saude'>Saúde</option>
		<option id='saude' value='nutricao'>Nutrição</option>
		<option id='saude' value='dieta'>Dieta</option>
		<option id='beleza' value='beleza'>Beleza Masculina</option>
		<option id='academia' value='academia'>Academia</option>
		<option selected value=''>Selecione o tipo da notícia...</option>
            </select>
            <button type="submit">Buscar</button>
        </form>
        
        <?php 
            
//            if(isset($_GET['tagbox'])) {
//                $noticiaController->listaTodasTag($_GET['tagbox']);
//            } else {
//                $noticiaController->listaTodas();
//            }
//          
            $table = "<table><thread><tr><td>Título da Notícia</td>Ações</tr></thread><tbody>";
            foreach ($noticias as $noticia) {
                $table .= "<tr><td>'{$noticia->getTitle()}'</td><td>"
                . "<a href='detalhes-noticia.php/?noticia={$noticia}'>Detalhes</a>"
                . "<a href='editar-noticia.php/?noticia={$noticia}'>Editar</a>"
                . "<a href='remover-noticia.php/?noticia={$noticia}'>Editar</a></td></tr>";
            }
            $table .= "</tbody></table>";
            echo $table;
        ?>
    </body>
</html>