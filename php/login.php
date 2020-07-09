<?php
//Iniciar a Sessão
session_start();
//Incluir a Conexão com o BD
include("conexao.php");
//Pegar os Dados
$usuario=$_POST["usuario"];
$senha=$_POST["senha"];
//Procurar o Usuário/Senha
$sql="SELECT * FROM tb_usuarios WHERE usu_email='$usuario' AND usu_senha='$senha';";
//Executar o SQL
$executar=mysql_query($sql);
//Contador
$contador=mysql_num_rows($executar);
//Redirecionamento
if($contador==0){
	echo '<meta charset="UTF-8"/>';
	echo '<script>alert("Usuário e/ou senha incorretos.");</script>';
}else{
	//Criar a Sessão
	$_SESSION["sUsuario"]=$usuario;
	$_SESSION["sSenha"]=$senha;
}
//Redirecionamento
echo '<script>window.history.back();</script>';
?>