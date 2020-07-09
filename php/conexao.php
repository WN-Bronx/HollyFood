<?php
//Conectar ao banco de dados
$conexao=mysql_connect("localhost","root","usbw");
//Selecionar a base de dados
$verifica=mysql_select_db("hollyfood");
mysql_set_charset('UTF8',$conexao);
/*
echo "<meta charset='UTF-8'/>";
//Verificar se a Base de Dados foi Encontrada
if($verifica==""){
	echo "Base de Dados Não Encontrada";
}else{
	echo "Base de Dados Encontrada";
}
echo "<br/>";
echo "<br/>";
//Verificar se a Conexão foi Estabelecida
if($conexao==""){
	echo "Erro de Conexão";
}else{
	echo "Conexão Estabelecida";
}
*/
?>