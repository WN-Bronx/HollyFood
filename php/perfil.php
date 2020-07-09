<?php
	include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<script src="js/perfil.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
				//Validação de Usuário
				if(!(isset($_SESSION["sUsuario"])&&($_SESSION["sSenha"]))){
					echo '<script>window.history.back();</script>';
				}elseif($y==1){
					header("Location:perfilRestaurante.php");
				}else{
					header("Location:perfilCliente.php");
				}
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>