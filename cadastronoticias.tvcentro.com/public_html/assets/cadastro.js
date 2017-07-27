buttonEntrar.onclick = function() {
  window.location.href= "index2.html";
};

buttonCadastraUsuario.onclick = function(){
  document.getElementById('formulario').innerHTML= "<center>"+
      "<input id='nome' placeholder='Nome Completo' value='' name='nome'></input>"+
      "<input id='nomeUsuario' placeholder='Nome de Usuário' value='' name='nomeUsuario'></input>"+
      "<input id='cadastroSenha' placeholder='Senha' value='' name='senha'></input>"+
      "<input id='confereSenha' placeholder='Confirme a Senha' value='' name='confereSenha'></input>"+
      "<button id='buttonConfirmaCadastro' type='submit'>Cadastrar</button>"+
      "<button id='buttonCancela' type='button'>Cancelar</button>"+
    "</center>";
  buttonCancela.onclick = function() {
    window.location.reload();
  };
};