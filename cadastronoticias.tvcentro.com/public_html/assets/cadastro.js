swal("Preste atenção", "Antes de preencher os campos, selecione um tipo de noticia válido.", "info");
document.getElementById('buttonCadastrar').disabled = true;
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

function getSelectedOption(tagBox) {
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