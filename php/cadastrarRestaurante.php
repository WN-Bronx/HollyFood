<?php
	include("conexao.php");
	if(isset($_GET["emailExiste"])){
		$erro=$_GET["emailExiste"];
		if($erro){
			echo '<script>alert("O restaurante não pôde ser cadastrado, pois o e-mail informado já está cadastrado no nosso sistema.");</script>';
			echo '<script>window.history.go(-2);</script>';
		}
	}
	if(isset($_GET["cadastrado"])){
		$cad=$_GET["cadastrado"];
		if($cad){
			echo '<script>alert("Restaurante cadastrado com sucesso.");</script>';
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
		<link rel="stylesheet" href="css/cRestaurante.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<script src="js/mascara.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
			?>
			<div id="dCorpo">
				<div id="dCadastro">
					<form id="formCadRestaurante" action="cadRestaurante.php" method="post">
						<h1>Cadastro de Restaurante</h1>
						<fieldset>
							<label for="iCadNome" class="nome"><!--span class="dourado">*</span--> Nome Fantasia: </label>
							<input id="iCadNome" type="text" name="nome" required/>
						</fieldset>
						<fieldset>
							<label for="iCadRazao" class="razao"><span class="dourado">*</span> Razão Social: </label>
							<input id="iCadRazao" type="text" name="razao" required/>
						</fieldset>
						<fieldset>
							<label for="iCadCNPJ" class="cnpj"><span class="dourado">*</span> CNPJ: </label>
							<input id="iCadCNPJ" type="text" name="cnpj" maxlength="18" onkeyup="mascara(this, mcnpj);" required/>
						</fieldset>
						<fieldset>
							<label for="iCadEstado" class="uf"><span class="dourado">*</span> UF: </label>
							<select id="iCadEstado" name="estado" required>
								<?php
									//Selecionar dados da tabela
									$sql="SELECT * FROM tb_estados";
									//Executar seleção
									$executar=mysql_query($sql);
									//Listar dados da tabela
									while($coluna=mysql_fetch_array($executar)){
										echo "<option value=".$coluna['est_codigo'].">".$coluna['est_sigla']."</option>";
									}
								?>
							</select>
							<label for="iCadCidade" class="cidade"><span class="dourado">*</span> Cidade: </label>
							<select id="iCadCidade" name="cidade" required>
								<?php
									//Selecionar dados da tabela
									$sql="SELECT * FROM tb_cidades";
									//Executar seleção
									$executar=mysql_query($sql);
									//Listar dados da tabela
									while($coluna=mysql_fetch_array($executar)){
										echo "<option value=".$coluna['cid_codigo'].">".$coluna['cid_nome']."</option>";
									}
								?>
							</select>
						</fieldset>
						<fieldset>
							<label for="iCadRua" class="rua"><span class="dourado">*</span> Rua: </label>
							<input id="iCadRua" type="text" name="rua" required/>
						</fieldset>
						<fieldset>
							<label for="iCadBairro" class="bairro"><span class="dourado">*</span> Bairro: </label>
							<select id="iCadBairro" name="bairro" required>
								<?php
									//Selecionar dados da tabela
									$sql="SELECT * FROM tb_bairros";
									//Executar seleção
									$executar=mysql_query($sql);
									//Listar dados da tabela
									while($coluna=mysql_fetch_array($executar)){
										echo "<option value=".$coluna['bai_codigo'].">".$coluna['bai_nome']."</option>";
									}
								?>
							</select>
							<label for="iCadNumero" class="nume"><!--span class="dourado">*</span--> Nº: </label>
							<input id="iCadNumero" type="text" name="numero" maxlength="5" onkeyup="mascara(this, mnum);" required/>
						</fieldset>
						<fieldset>
							<label for="iCadComplemento" class="complemento">Complemento: </label>
							<input id="iCadComplemento" type="text" name="complemento"/>
						</fieldset>
						<fieldset>
							<label for="iCadTelefone" class="telefone"><span class="dourado">*</span> Telefone: </label>
							<input id="iCadTelefone" type="text" name="telefone" maxlength="15" onkeyup="mascara(this, mtel);" required/>
							<label for="iCadCEP" class="cep"><span class="dourado">*</span> CEP: </label>
							<input id="iCadCEP" type="text" name="cep" maxlength="9" onkeyup="mascara(this, mcep);" required/>
						</fieldset>
						<fieldset>
							<label for="iCadURL" class="url">URL: </label>
							<input id="iCadURL" type="text" name="url"/>
						</fieldset>
						<fieldset>
							<label for="iCadCategoria" class="categoria"><span class="dourado">*</span> Categoria: </label>
							<select id="iCadCategoria" name="categoria" required>
								<?php
									//Selecionar dados da tabela
									$sql="SELECT * FROM tb_categorias";
									//Executar seleção
									$executar=mysql_query($sql);
									//Listar dados da tabela
									while($coluna=mysql_fetch_array($executar)){
										echo "<option value=".$coluna['cat_codigo'].">".$coluna['cat_tipo']."</option>";
									}
								?>
							</select>
						</fieldset>
						<fieldset>
							<label for="iCadEmail" class="email"><span class="dourado">*</span> E-mail: </label>
							<input id="iCadEmail" type="text" name="email" required/>
						</fieldset>
						<fieldset>
							<label for="iCadSenha" class="senha"><span class="dourado">*</span> Senha: </label>
							<input id="iCadSenha" type="password" name="senha" placeholder="De 6 a 8 caracteres" maxlength="8" required/>
							<input id="iConfSenha" type="password" placeholder="Confirme" maxlength="8" required/>
						</fieldset>
						<!--fieldset>
							<input id="iCadAceito" type="checkbox" required/>
							<label id="iLabAceito" for="iCadAceito">Eu li e aceito os termos de uso desse site.</label>
						</fieldset-->
						<fieldset>
							<p class="obs">* Campos Obrigatórios!</p>
						</fieldset>
						<fieldset>
							<button type="submit">Confirmar</button>
						</fieldset>
					</form>
					<script src="js/validaRestaurante.js"></script>
				</div>
			</div>
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>