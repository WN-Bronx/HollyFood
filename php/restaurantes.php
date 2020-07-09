<?php
	include("conexao.php");
	if(isset($_GET["erro"])){
		$erro=$_GET["erro"];
		if($erro){
			echo '<script>alert("Erro ao realizar a busca. Por favor, selecione uma categoria e/ou bairro.");</script>';
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
		<link rel="stylesheet" href="css/restaurantes.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<script src="js/restaurantes.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
			?>
			<div id="dBorde">
				<div id="dTitulo">
					<h2 id="titulo">Restaurantes</h2>
				</div>
				<div id="dLinha"></div>
				</br>
				<div id="dCategoria">
					<form action="buscaRestaurantes.php" method="post">
						<fieldset>
							<label for="iCadCategoria"> Categorias: </label>
							<select id="iCadCategoria" name="categoria" class="tselect" required>
							<option value="nulo">SELECIONE A CATEGORIA</option>
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
								<label for="iCadBairro"> Bairros: </label>
							<select id="iCadBairro" name="bairro" class="tselect" required>
								<option value="nulo">SELECIONE O BAIRRO</option>
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
							<button id="botao" type="submit">Buscar</button>
						</fieldset>
					</form>
				</div>
				<div id="dLinha2"></div>
				<br/>
				<div id="dCorpo"></br>
					<?php
						if((isset($_GET["cat"]))and(isset($_GET["bai"]))){
							$cat=$_GET["cat"];
							$bai=$_GET["bai"];
							$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE res_codcategoria=$cat AND end_codbairro=$bai AND res_codendereco=end_codigo AND end_codbairro=bai_codigo ORDER BY res_nmfantasia;";
						}elseif(isset($_GET["cat"])){
							$cat=$_GET["cat"];
							$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE res_codcategoria=$cat AND res_codendereco=end_codigo AND end_codbairro=bai_codigo ORDER BY res_nmfantasia;";
						}elseif(isset($_GET["bai"])){
							$bai=$_GET["bai"];
							$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE end_codbairro=$bai AND res_codendereco=end_codigo AND end_codbairro=bai_codigo ORDER BY res_nmfantasia;";
						}else{
							$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE res_codendereco=end_codigo AND end_codbairro=bai_codigo ORDER BY res_nmfantasia;";
						}
						$executar=mysql_query($sql);
						$contador=mysql_num_rows($executar);
						if($contador==0){
							echo "<p id='msg'>Nenhum restaurante encontrado.</p>";
						}else{
							while($coluna=mysql_fetch_array($executar)){
					?>
					<div class="dRest">
						<div class="dCirculo">
							<img class="ImgC" src="imagens/multy-user.png" alt="Posição"/>
						</div>
						<div class="dTexto"> 
							<?php
								echo "<h2>".$coluna["res_nmfantasia"]."</h2>";
								echo "<p>".$coluna["end_logradouro"].", ".$coluna["end_numero"]."</p>";
								echo "<p>".$coluna["bai_nome"]."</p>";
								echo "<p>".$coluna["res_telefone"]."</p>";
								echo "<a class='site' href='".$coluna["res_url"]."' target='_blank'><p>".$coluna["res_url"]."</p></a>";
							?>
						</div>
						<div class="dEstrela">
							<img class="ImgE" src="imagens/votos/estrela-dourada.jpg" alt="Posição">
							<?php
								$sql2="SELECT COUNT(vot_curtida) AS total FROM tb_votos WHERE vot_curtida=1 AND vot_codrestaurante=".$coluna["res_codigo"].";";
								$executar2=mysql_query($sql2);
								while($coluna2=mysql_fetch_array($executar2)){
									$totalVotos="<p id='PE'>".$coluna2["total"]."</p>";
								}
								echo $totalVotos;
							?>
						</div>
						<?php
							echo "<a href='restaurante.php?rest=".$coluna["res_codigo"]."' target='_blank'>";
						?>
							<div class="dVerPerfil">
								<p class="VP">Perfil</p>
							</div>
						</a>
					</div>
					<?php
							}
						}
					?>
				</div>
			</div>	
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>