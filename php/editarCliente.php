<?php
	session_start();
	include("conexao.php");
	$senhaAtual=$_POST["senhaAtual"];
	if($senhaAtual==$_SESSION["sSenha"]){
		$codigo=$_POST["codigo"];
		$nome=$_POST["nome"];
		$email=$_POST["email"];
		$senha=$_POST["senha"];
		$sql="UPDATE tb_usuarios SET usu_email='$email', usu_senha='$senha', usu_nivel=2 WHERE usu_codigo=$codigo;";
		mysql_query($sql);
		$sql="UPDATE tb_clientes SET cli_nome='$nome' WHERE cli_codusuario='$codigo';";
		mysql_query($sql);
		$_SESSION["sUsuario"]=$email;
		$_SESSION["sSenha"]=$senha;
		header("Location:perfilCliente.php?editado=true");
	}else{
		header("Location:perfilCliente.php?senhaErrada=true");
	}
?>