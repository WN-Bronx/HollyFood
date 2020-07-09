<?php
	include("conexao.php");
	date_default_timezone_set('Brazil/East');
	$data=date("Y-m-d");
	$cc=$_GET["cc"];
	$cr=$_GET["cr"];
	$sql="SELECT * FROM tb_votos WHERE vot_codrestaurante=$cr AND vot_codcliente=$cc;";
	$executar=mysql_query($sql);
	while($coluna=mysql_fetch_array($executar)){
		$v=$coluna["vot_curtida"];
	}
	$contador=mysql_num_rows($executar);
	if($contador==0){
		$sql="INSERT INTO tb_votos VALUES('',true,'$data',$cr,$cc);";
		$voto="curtiu";
	}else{
		if($v==true){
			$sql="UPDATE tb_votos SET vot_curtida=false WHERE vot_codrestaurante=$cr AND vot_codcliente=$cc;";
			$voto="descurtiu";
		}else{
			$sql="UPDATE tb_votos SET vot_curtida=true WHERE vot_codrestaurante=$cr AND vot_codcliente=$cc;";
			$voto="curtiu";
		}
	}
	mysql_query($sql);
	header("Location:restaurante.php?rest=$cr&votou=$voto");
?>