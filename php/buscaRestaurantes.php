<?php
	include("conexao.php");
	$cat=$_POST["categoria"];
	$bai=$_POST["bairro"];
	if($cat!='nulo' and $bai!='nulo'){
		header("Location:restaurantes.php?cat=$cat&bai=$bai");
	}elseif($cat!='nulo' and $bai=='nulo'){
		header("Location:restaurantes.php?cat=$cat");
	}elseif($cat=='nulo' and $bai!='nulo'){
		header("Location:restaurantes.php?bai=$bai");
	}elseif($cat=='nulo' and $bai=='nulo'){
		header("Location:restaurantes.php?erro=true");
	}
?>