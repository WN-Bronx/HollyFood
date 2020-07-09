<?php
	include("conexao.php");
	if(isset($_GET["editado"])){
		$edt=$_GET["editado"];
		if($edt){
			echo '<script>alert("Cliente editado com sucesso.");</script>';
			echo '<script>window.location="perfilCliente.php";</script>';
		}
	}
	if(isset($_GET["senhaErrada"])){
		$sen=$_GET["senhaErrada"];
		if($sen){
			echo '<script>alert("A senha atual está incorreta.");</script>';
			echo '<script>window.location="perfilCliente.php?editar=true";</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/perfilCliente.css"/>
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
					echo '<script>window.history.back();</script>';
				}
			?>
			<div id="dCorpo">
				<div id="dCadastro">
					<form id="formCadCliente" action="editarCliente.php" method="post">
						<h1>Dados Pessoais</h1>
						<div id="dLinha">
							<a href="perfilCliente.php?editar=true"><p class="cEditar">Editar</p></a>
						</div>
						<fieldset>
							<label for="iCadNome"></span>Nome: </label>
							<input id="iCadNome" type="text" name="nome" value="<?php echo $z; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadEmail">E-mail: </label>
							<input id="iCadEmail" type="text" name="email" value="<?php echo $usuario; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset class="dSenhas">
							<label for="iSenhaAtual">Senha Atual: </label>
							<input id="iSenhaAtual" type="password" name="senhaAtual" placeholder="Senha Atual" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset class="dSenhas">
							<label for="iCadSenha">Nova Senha: </label>
							<input id="iCadSenha" type="password" name="senha" placeholder="De 6 a 8 caracteres" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset class="dSenhaC">
							<label for="iConfSenha">Confirmar Senha: </label>
							<input id="iConfSenha" type="password" placeholder="Confirme a senha" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<input type="hidden" name="codigo" value="<?php echo $x ?>"/>
							<button type="submit" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?>>Salvar</button>
							<a href="perfilCliente.php"><button type="button" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?>>Cancelar</button></a>
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