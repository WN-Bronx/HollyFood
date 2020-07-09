<?php
	session_start();
	include("conexao.php");
	$cod=$_GET["cod"];
	$email=$_SESSION["sUsuario"];
	$senha=$_SESSION["sSenha"];
	$sql="SELECT usu_codigo FROM tb_usuarios WHERE usu_email='$email' AND usu_senha='$senha'";
	$codigo=mysql_query($sql);
	if($cod==$codigo){
		$sql="UPDATE tb_usuarios SET usu_senha='', usu_nivel=2 WHERE usu_codigo=$codigo;";
		mysql_query($sql);
		echo '<script>window.history.back();</script>';
	}else{
		echo '<script>window.history.back();</script>';
	}
?>