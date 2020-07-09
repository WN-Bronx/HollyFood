var formCadastro = document.getElementById('formCadRestaurante');
var nome = document.getElementById('iCadNome');
var email = document.getElementById('iCadEmail');
var telefone = document.getElementById('iCadTelefone');

function validaNome(campo){
	return campo.value.length>2?true:false;
}

function validaEmail(campo){
	var reEmail = new RegExp(/^[a-zA-Z0-9._%+-]+@(?:[a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/gi);
	return campo.value.match(reEmail)?true:false;
}

function validaTelefone(campo){
	var reFone = new RegExp(/\(\d{2}\) \d{4}-\d{4}/);
	return campo.value.match(reFone)?true:false;
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

function campoErroT(campo){
	campo.style.border = '1px solid #FF0000';
	alert("Para efetuar o cadastro, coloque um telefone valido.");
}

formCadastro.onsubmit = function(){
	validaNome(nome)?campoOk(nome):campoErroN(nome);
	validaEmail(email)?campoOk(email):campoErroE(email);
	validaTelefone(telefone)?campoOk(telefone):campoErroT(telefone);
	if(!validaNome(nome) || !validaEmail(email) || !validaTelefone(telefone)){
		return false;
	}else{
		return true;
	}
}