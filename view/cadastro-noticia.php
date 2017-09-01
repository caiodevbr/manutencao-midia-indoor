<!DOCTYPE html>
<?php
    if (! isset($_SESSION['usuario'])) {
        header("index.php");
    } else {
        $usuario = $_SESSION['usuario'];
    }
?>

<html>
    <body>
        <h1>Cadastrar Noticia</h1>
        <form method="post" action="">
            <select id='tagBox' name='tagBox' required>
		<option id='saude' value='saude'>Saúde</option>
		<option id='saude' value='nutricao'>Nutrição</option>
		<option id='saude' value='dieta'>Dieta</option>
		<option id='beleza' value='beleza'>Beleza Masculina</option>
		<option id='academia' value='academia'>Academia</option>
		<option selected value=''>Selecione o tipo da notícia...</option>
            </select>
            <input type="hidden" name="acao" value="add"/>
            <input id='imgBox' name='imgBox' type='text' value='' placeholder='URL da imagem' required/>
            <input name='titulo' maxlength='40' id='titleBox' type='text' value='' placeholder='Título' required/>
            <input id='fontBox' name='fontBox' type='text' value='' placeholder='Fonte' required/>
            <input name='descricao' maxlength='60' id='descriptionBox' type='text' value='' placeholder='Descrição' required/>
            <textarea maxlength='370' id='mainBox' name='mainBox' type='text' value='' placeholder='Insira a notícia aqui!' required></textarea>
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </form>
    </body>
</html>
