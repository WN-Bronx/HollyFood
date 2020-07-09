<?php
	include("conexao.php");
	if(isset($_GET["emailExiste"])){
		$erro=$_GET["emailExiste"];
		if($erro){
			echo '<script>alert("O cliente não pôde ser cadastrado, pois o e-mail informado já está cadastrado no nosso sistema.");</script>';
			echo '<script>window.history.go(-2);</script>';
		}
	}
	if(isset($_GET["cadastrado"])){
		$cad=$_GET["cadastrado"];
		if($cad){
			echo '<script>alert("Cliente cadastrado com sucesso.");</script>';
			echo '<script>window.location="restaurantes.php";</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/cCliente.css"/>
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
			<div id="dCorpo">
				<div id="dCadastro">
					<form id="formCadCliente" action="cadCliente.php" method="post">
						<h1>Cadastro de Cliente</h1>
						<fieldset>
							<label for="iCadNome"><span class="dourado">*</span> Nome: </label>
							<input id="iCadNome" type="text" name="nome" required/>
						</fieldset>
						<fieldset>
							<label for="iCadEmail"><span class="dourado">*</span> E-mail: </label>
							<input id="iCadEmail" type="text" name="email" required/>
						</fieldset>
						<fieldset>
							<label for="iCadSenha"><span class="dourado">*</span> Senha: </label>
							<input id="iCadSenha" type="password" name="senha" placeholder="De 6 a 8 caracteres" maxlength="8" required/>
						</fieldset>
						<fieldset>
							<label for="iConfSenha"><span class="dourado">*</span> Senha: </label>
							<input id="iConfSenha" type="password" placeholder="Confirme a senha" maxlength="8" required/>
						</fieldset>
						<fieldset>
							<p class="obs">* Campos Obrigatórios!</p>
						</fieldset>
						<fieldset>
							<button type="submit">Confirmar</button>
						</fieldset>
					</form>
					<script src="js/validaCliente.js"></script>
				</div>
			</div>
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>