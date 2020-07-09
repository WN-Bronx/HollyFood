function mostraLogin(){
	$('#dLogin').toggle(1500);
}
function logoff(){
	l = confirm('Deseja sair?');
	if(l==true){
		window.location='sair.php';
	}
}
$(document).ready(function(){
	$('form').submit(function(){
		var cadastrar=true;
		if($('#iCadSenha').val().length<6){
			alert('Para efetuar o cadastro, coloque uma senha com no mínimo 6 caracteres.');
			cadastrar=false;
		}else{
			if($('#iCadSenha').val()!=$('#iConfSenha').val()){
				alert('Para efetuar o cadastro, coloque senhas iguais.');
				cadastrar=false;
			}
		}
		if(cadastrar==false){
			$('#iCadSenha').val("");
			$('#iConfSenha').val("");
			return false;
		}
	});
});