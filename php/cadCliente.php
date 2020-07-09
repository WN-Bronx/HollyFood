<?php
	include("conexao.php");
	$nome=$_POST["nome"];
	$email=$_POST["email"];
	$senha=$_POST["senha"];
	$sql="SELECT usu_codigo FROM tb_usuarios WHERE usu_email='$email'";
	$executar=mysql_query($sql);
	$contador=mysql_num_rows($executar);
	if($contador==0){
		$sql="INSERT INTO tb_usuarios VALUES('','$email','$senha',2);";
		mysql_query($sql);
		$sql="INSERT INTO tb_clientes VALUES('','$nome',LAST_INSERT_ID());";
		mysql_query($sql);
		header("Location:cadastrarCliente.php?cadastrado=true");
	}else{
		header("Location:cadastrarCliente.php?emailExiste=true");
	}
?>