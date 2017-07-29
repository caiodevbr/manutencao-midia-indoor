buttonAdd.onclick= function(){
    swal("Preste atenção", "Antes de preencher os campos, selecione um tipo de noticia válido.", "info");
    document.getElementById('formulario').innerHTML = "<select id='tagBox' name='tagBox' onchange='getSelectedOption()' required>"+
        "<option id='saude' value='saude'>Saúde</option>"+
        "<option id='saude' value='nutricao'>Nutrição</option>"+
        "<option id='saude' value='dieta'>Dieta</option>"+
        "<option id='beleza' value='beleza'>Beleza Masculina</option>"+
        "<option id='academia' value='academia'>Academia</option>"+
        "<option selected value=''>Selecione o tipo da notícia...</option>"+
    "</select>"+
    "<input id='imgBox' name='imgBox' type='text' value='' placeholder='URL da imagem' required/>"+
    "<input name='titulo' maxlength='40' id='titleBox' type='text' value='' placeholder='Título' required/>"+
    "<p id='titleChars'>Digite algo para iniciar a contagem de caracteres...</p>"+
    "<input id='fontBox' name='fontBox' type='text' value='' placeholder='Fonte' required/>"+
    "<input name='descricao' maxlength='60' id='descriptionBox' type='text' value='' placeholder='Descrição' required/>"+
    "<p id='descChars'>Digite algo para iniciar a contagem de caracteres...</p>"+
    "<textarea maxlength='370' id='mainBox' name='mainBox' type='text' value='' placeholder='Insira a notícia aqui!' required></textarea>"+
    "<p id='chars'>Digite algo para iniciar a contagem de caracteres...</p>"+
    "<center><input id='buttonCadastrar' type='submit'/></center>";
    document.getElementById('buttonCadastrar').disabled = true;
    onStart();
};

var mainLength;
var descLength;
var titleLength;

function resetInfo(opt){
    document.getElementById('titleBox').value = '';
    document.getElementById('descriptionBox').value = '';
    document.getElementById('mainBox').value = '';
    document.getElementById('imgBox').value = '';
    document.getElementById('fontBox').value = '';
    document.getElementById('titleBox').maxLength = titleLength;
    document.getElementById('descriptionBox').maxLength = descLength;
    document.getElementById('mainBox').maxLength = mainLength;
    document.getElementById('titleChars').innerHTML =titleLength+' caracteres restantes';
    if (opt == 'Beleza Masculina'){
        document.getElementById('descChars').innerHTML = '';
    }
    else{
        document.getElementById('descChars').innerHTML = descLength+' caracteres restantes';
    }
    document.getElementById('chars').innerHTML = mainLength+' caracteres restantes';
}

const option = function getSelectedOption(tagBox) {
    var conceptName;
    conceptName = $('#tagBox').find(":selected").text();
    opt = conceptName;
    if (opt=='Beleza Masculina'){
        mainLength = 500;
        descLength = 20;
        titleLength = 20;
        resetInfo(opt);
        document.getElementById('buttonCadastrar').disabled = false;
        document.getElementById('descriptionBox').disabled = true;
        document.getElementById('descriptionBox').placeholder ='Campo desabilitado para este tipo de notícia';
    }
    else if (opt=='Academia'){
        mainLength = 270;
        descLength = 70;
        titleLength = 25;
        resetInfo(opt);
        document.getElementById('buttonCadastrar').disabled = false;
        document.getElementById('descriptionBox').disabled = false;
        document.getElementById('descriptionBox').placeholder ='Descrição';
    }
    else if (opt=='Saúde' || opt=='Nutrição' || opt=='Dieta'){
        mainLength = 350;
        descLength = 60;
        titleLength = 40;
        resetInfo(opt);
        document.getElementById('buttonCadastrar').disabled = false;
        document.getElementById('descriptionBox').disabled = false;
        document.getElementById('descriptionBox').placeholder ='Descrição';
    }
    else{
        resetInfo();
        swal("Preste atenção", "Antes de preencher os campos, selecione um tipo de noticia válido.", "info");
        document.getElementById('buttonCadastrar').disabled = true;
        document.getElementById('titleChars').innerHTML = 'Selecione o tipo da notícia';
        document.getElementById('descChars').innerHTML = 'Selecione o tipo da notícia';
        document.getElementById('chars').innerHTML = 'Selecione o tipo da notícia';
    }
    return opt;
}

function onStart(){
    $('textarea').keyup(function() {
        var id = "chars";
        var length = $(this).val().length;
        length = mainLength-length;
        $('#chars').text(length+" caracteres restantes");

    });
    $("input[name='descricao']").keyup(function() {
        var id = "descChars";
        var length = $(this).val().length;
        length = descLength-length;
        $('#descChars').text(length+" caracteres restantes");

    });
    $("input[name='titulo']").keyup(function() {
        var length = $(this).val().length;
        var id = "titleChars";
        length = titleLength-length;
        $('#titleChars').text(length+" caracteres restantes");

    });
}

buttonExibir.onclick = function(){
    document.getElementById('formulario').innerHTML = "<select id='tagBox' name='tagBox' onchange='getSelectedOption()' required>"+
            "<option id='saude' value='saude'>Saúde</option>"+
            "<option id='saude' value='nutricao'>Nutrição</option>"+
            "<option id='saude' value='dieta'>Dieta</option>"+
            "<option id='beleza' value='beleza'>Beleza Masculina</option>"+
            "<option id='academia' value='academia'>Academia</option>"+
            "<option selected value=''>Todas</option>"+
        "</select>"+
        "<center>"+
        "<table id='selectable' cellspacing='4'>"+
            "<tr><td id='linhaCinza'>Notícia 1</td></tr>"+
    "<tr><td id='linhaAzul'>Notícia 2</td></tr>"+
    "<tr><td id='linhaCinza'>Notícia 3</td></tr>"+
    "<tr><td id='linhaAzul'>Notícia 4</td></tr>"+
    "<tr><td id='linhaCinza'>Notícia 5</td></tr>"+
    "<tr><td id='linhaAzul'>Notícia 6</td></tr>"+
    "<tr><td id='linhaCinza'>Notícia 7</td></tr>"+
    "<tr><td id='linhaAzul'>Notícia 8</td></tr>"+
    "<tr><td id='linhaCinza'>Notícia 9</td></tr>"+
    "<tr><td id='linhaAzul'>Notícia 10</td></tr>"+
    "</table>"+
    "</center>"+
    "<button id='buttonPreview'>Pré-visualizar</button>"+
        "<button id='buttonEdit'>Editar notícia</button>"+
    "<button id='buttonDelete'>Excluir notícia</button>";
    $( function() {
        $( "#selectable" ).selectable();
    } );
};
