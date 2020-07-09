<?php
	include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/perfilRestaurante.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
				//Validação de Usuário
				if(!(isset($_SESSION["sUsuario"])&&($_SESSION["sSenha"]))){
					echo '<script>window.history.back();</script>';
				}elseif($y==2){
					echo '<script>window.history.back();</script>';
				}
			?>
			<div id="dCorpo">
				<div id="dCadastro">
					<?php
						$sql="SELECT res_codigo FROM tb_restaurantes WHERE res_codusuario=$x;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
							$codRest=$coluna["res_codigo"];
						}
						$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE res_codendereco=end_codigo AND end_codbairro=bai_codigo AND res_codigo=$codRest;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
					?>
					<form id="formCadRestaurante" action="cadRestaurante.php" method="post">
						<h1>Dados Pessoais</h1>
						<div id="dLinha">
							<a href="perfilRestaurante.php?editar=true"><p class="cEditar">Editar</p></a>
						</div>
						<fieldset>
							<label for="iCadNome" class="nome">Nome Fantasia: </label>
							<input id="iCadNome" type="text" name="nome" value="<?php echo $z; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadRazao" class="razao">Razão Social: </label>
							<input id="iCadRazao" type="text" name="razao" value="<?php echo $coluna["res_rzsocial"]; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadCNPJ" class="cnpj">CNPJ: </label>
							<input id="iCadCNPJ" type="text" name="cnpj" value="<?php echo $coluna["res_cnpj"]; ?>" maxlength="18" onkeyup="mascara(this, mcnpj);" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadEstado" class="uf">UF: </label>
							<select id="iCadEstado" name="estado" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required>
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
							<label for="iCadCidade" class="cidade">Cidade: </label>
							<select id="iCadCidade" name="cidade" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required>
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
							<label for="iCadRua" class="rua">Rua: </label>
							<input id="iCadRua" type="text" name="rua" value="<?php echo $coluna["end_logradouro"]; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadBairro" class="bairro">Bairro: </label>
							<select id="iCadBairro" name="bairro" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required>
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
							<label for="iCadNumero" class="nume">Nº: </label>
							<input id="iCadNumero" type="text" name="numero" value="<?php echo $coluna["end_numero"]; ?>" maxlength="6" onkeyup="mascara(this, mnum);" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadComplemento" class="complemento">Complemento: </label>
							<input id="iCadComplemento" type="text" name="complemento" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?>/>
						</fieldset>
						<fieldset>
							<label for="iCadTelefone" class="telefone">Telefone: </label>
							<input id="iCadTelefone" type="text" name="telefone" maxlength="15" onkeyup="mascara(this, mtel);" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
							<label for="iCadCEP" class="cep">CEP: </label>
							<input id="iCadCEP" type="text" name="cep" maxlength="9" onkeyup="mascara(this, mcep);" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadURL" class="url">URL: </label>
							<input id="iCadURL" type="text" name="url" value="<?php echo $coluna["res_url"]; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?>/>
						</fieldset>
						<fieldset>
							<label for="iCadCategoria" class="categoria">Categoria: </label>
							<select id="iCadCategoria" name="categoria" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required>
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
							<label for="iCadEmail" class="email">E-mail: </label>
							<input id="iCadEmail" type="text" name="email" value="<?php echo $usuario; ?>" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadSenha" class="senha">Senha: </label>
							<input id="iCadSenha" type="password" name="senha" placeholder="De 6 a 8 caracteres" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<fieldset>
							<label for="iCadSenha" class="Nsenha">Nova Senha: </label>
							<input id="iConfSenha" type="password" name="senha" placeholder="De 6 a 8 caracteres" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
							<input id="iConfSenha1" type="password" placeholder="Novamente" maxlength="8" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?> required/>
						</fieldset>
						<!--fieldset>
							<input id="iCadAceito" type="checkbox" required/>
							<label id="iLabAceito" for="iCadAceito">Eu li e aceito os termos de uso desse site.</label>
						</fieldset-->
						<fieldset>
							<button type="submit">Salvar</button>
							<a href="perfilRestaurante.php"><button type="button" <?php if(!(isset($_GET["editar"]))){ echo "disabled"; } ?>>Cancelar</button></a>
						</fieldset>
					</form>
					<?php
						}
					?>
					<script src="js/validaRestaurante.js"></script>
				</div>
				<!--div id="dImagen">
					<input type="file">
				</div>
				<a href="sair.php"><p id="desativarConta">Desativar conta</p></a-->
			</div>
			<div id="dLinha2">				
			</div>
			<div class="cCurtidas">
				<p class="cCu">Curtidas :</p>
				<div class="cQE">
					<img class="estrela" src="imagens/votos/estrela-dourada.jpg"/>
					<p class="cN1">100</p>
					<div id="dLinha3"></div>
					<p class="cN4">DIA</p>
				</div>
				<div class="cQE">
					<img class="estrela" src="imagens/votos/estrela-dourada.jpg"/>
					<p class="cN2">100</p>
					<div id="dLinha3"></div>
					<p class="cN4">SEMANA</p>
				</div>
				<div class="cQE">
					<img class="estrela" src="imagens/votos/estrela-dourada.jpg"/>
					<p class="cN3">100</p>
					<div id="dLinha3"></div>
					<p class="cN4">MÊS</p>
				</div>
				<div id="dSeparar"></div>
			</div>
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>