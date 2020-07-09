<?php
	include("conexao.php");
	$comentario=$_POST["comentario"];
	date_default_timezone_set('Brazil/East');
	$data=date("Y-m-d");
	$cc=$_POST["cc"];
	$cr=$_POST["cr"];
	$sql="INSERT INTO tb_comentarios VALUES('','$comentario','$data',$cr,$cc);";
	mysql_query($sql);
	header("Location:restaurante.php?rest=$cr&cadastrado=true");
?>