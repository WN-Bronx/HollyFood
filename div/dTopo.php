<!--
	<link rel="stylesheet" href="css/menu.css"/>
-->
<div id="dTopo">
	<div id="dLogo">
		<a href="index.php"><img src="imagens/logo.jpg" alt="Holly Food" title="Voltar à Página Inicial"/></a>
	</div>
	<?php
		//Exibe Usuário
		$usuario=$_SESSION["sUsuario"];
		$senha=$_SESSION["sSenha"];
		//Procura Nome do Usuário
		$sql="SELECT usu_codigo FROM tb_usuarios WHERE usu_email='$usuario'";
		$codUsuario=mysql_query($sql);
		while($coluna=mysql_fetch_assoc($codUsuario)){
			$x=$coluna['usu_codigo'];
		};
		$sql="SELECT usu_nivel FROM tb_usuarios WHERE usu_codigo=".$x.";";
		$nivUsuario=mysql_query($sql);
		while($coluna=mysql_fetch_assoc($nivUsuario)){
			$y=$coluna['usu_nivel'];
		};
		if($y==1){
			$sql="SELECT res_nmfantasia FROM tb_restaurantes,tb_usuarios WHERE res_codusuario=usu_codigo AND usu_codigo='".$x."';";
		}else{
			$sql="SELECT cli_nome FROM tb_clientes,tb_usuarios WHERE cli_codusuario=usu_codigo AND usu_codigo='".$x."';";
		}
		$nomeUsuario=mysql_query($sql);
		while($coluna=mysql_fetch_assoc($nomeUsuario)){
			if($y==1){
				$z=$coluna['res_nmfantasia'];
			}else{
				$z=$coluna['cli_nome'];
			}
		};
	?>
	<div id="dLoginMenu">
		<div id="dLinkLogin" onclick="logoff();">
			<img src="imagens/logoff.png" alt="Ícone de Logoff"/>
			<p><?php echo $z; ?></p>
		</div>
		<nav id="dMenu">
			<ul>
				<a href="sobre.php"><li class="pg1">Sobre</li></a>
				<a href="restaurantes.php"><li class="pg2">Restaurantes</li></a>
				<a href="ranking.php"><li class="pg3">Ranking</li></a>
				<a href="perfil.php"><li class="pg4">Meu Perfil</li></a>
			</ul>
		</nav>
	</div>
	<hr/>
</div>