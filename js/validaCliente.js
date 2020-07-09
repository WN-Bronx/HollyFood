var formCadastro = document.getElementById('formCadCliente');
var nome = document.getElementById('iCadNome');
var email = document.getElementById('iCadEmail');

function validaNome(campo){
	return campo.value.length>2?true:false;
}

function validaEmail(campo){
	var reEmail = new RegExp(/^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/gi);
	return campo.value.match(reEmail)?true:false;
}

function campoOk(campo){
	campo.style.border = '1px solid #E7B44F';
}

function campoErroN(campo){
	campo.style.border = '1px solid #FF0000';
	alert("Para efetuar o cadastro, coloque um nome com no mínimo 3 caracteres.");
}

function campoErroE(campo){
	campo.style.border = '1px solid #FF0000';
	alert("Para efetuar o cadastro, coloque um e-mail valido.");
}

formCadastro.onsubmit = function(){
	validaNome(nome)?campoOk(nome):campoErroN(nome);
	validaEmail(email)?campoOk(email):campoErroE(email);
	if(!validaNome(nome) || !validaEmail(email)){
		return false;
	}else{
		return true;
	}
}