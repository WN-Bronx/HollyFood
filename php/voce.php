<?php
	include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/voce.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
			?>
			<h1 class="voce">Selecione o que você é:</h1>
			<div id="dCorpo">
				<div class="dImagem">
					<a href="cadastrarRestaurante.php"><img src="imagens/voce/dono.jpg" alt="Sou Dono de Restaurante"/></a>
				</div>
				<div class="dImagem">
					<a href="cadastrarCliente.php"><img src="imagens/voce/cliente.jpg" alt="Sou Cliente"/></a>
				</div>
			</div>
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>