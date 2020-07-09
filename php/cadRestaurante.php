<?php
	include("conexao.php");
	$nome=$_POST["nome"];
	$razao=$_POST["razao"];
	$cnpj=$_POST["cnpj"];
	$estado=$_POST["estado"];
	$cidade=$_POST["cidade"];
	$rua=$_POST["rua"];
	$bairro=$_POST["bairro"];
	$numero=$_POST["numero"];
	$complemento=$_POST["complemento"];
	$telefone=$_POST["telefone"];
	$cep=$_POST["cep"];
	$url=$_POST["url"];
	$categoria=$_POST["categoria"];
	$email=$_POST["email"];
	$senha=$_POST["senha"];
	$sql="SELECT usu_codigo FROM tb_usuarios WHERE usu_email='$email'";
	$executar=mysql_query($sql);
	$contador=mysql_num_rows($executar);
	if($contador==0){
		$sql="INSERT INTO tb_enderecos VALUES('','$rua','$numero','$cep','$complemento',$bairro);";
		mysql_query($sql);
		$endereco=MYSQL_INSERT_ID();
		$sql="INSERT INTO tb_usuarios VALUES('','$email','$senha',1);";
		mysql_query($sql);
		$sql="INSERT INTO tb_restaurantes VALUES('','$nome','$razao','$telefone','$cnpj','','$url',$endereco,LAST_INSERT_ID(),$categoria);";
		mysql_query($sql);
		header("Location:cadastrarRestaurante.php?cadastrado=true");
	}else{
		header("Location:cadastrarRestaurante.php?emailExiste=true");
	}
?>