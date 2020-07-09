<?php
//Iniciar Sessão
session_start();
//Validação de Usuário
if(!(isset($_SESSION["sUsuario"])&&($_SESSION["sSenha"]))){
	include("div/dTopo.html");
}else{
	include("div/dTopo.php");
}
?>