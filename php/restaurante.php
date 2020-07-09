<?php
	include("conexao.php");
	if(isset($_GET["rest"])){
		$rest=$_GET["rest"];
		$sql="SELECT * FROM tb_restaurantes,tb_enderecos,tb_bairros WHERE res_codigo=$rest AND res_codendereco=end_codigo AND end_codbairro=bai_codigo;";
		$executar=mysql_query($sql);
	}else{
		header("Location:restaurantes.php");
	}
	if(isset($_GET["cadastrado"])){
		$cad=$_GET["cadastrado"];
		if($cad){
			echo '<script>alert("Comentário cadastrado com sucesso.");</script>';
			echo '<script>window.location="restaurante.php?rest='.$rest.'";</script>';
		}
	}
	if(isset($_GET["votou"])){
		$voto=$_GET["votou"];
		if($voto=="curtiu"){
			echo '<script>alert("Voto contabilizado com sucesso.");</script>';
		}elseif($voto=="descurtiu"){
			echo '<script>alert("Voto removido com sucesso.");</script>';
		}
		echo '<script>window.location="restaurante.php?rest='.$rest.'";</script>';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/restaurante.css"/>
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
			<div id="dtPerfil" class="dtitulo">
				<p>Perfil</p>
			</div>
			<div id="dRest">
				<div id="dCirculo">
					<img id="dImgC" src="imagens/multy-user.png" alt="Posição">
				</div>
				<div id="dTexto">
					<?php
						while($coluna=mysql_fetch_array($executar)){
							echo "<h2>".$coluna["res_nmfantasia"]."</h2>";
							echo "<p>".$coluna["end_logradouro"].", ".$coluna["end_numero"]."</p>";
							echo "<p>".$coluna["bai_nome"]."</p>";
							echo "<p>".$coluna["res_telefone"]."</p>";
						}
					?>
				</div>
				<div id="dEstrela">
					<img id="ImgE" src="imagens/votos/estrela-dourada.jpg" alt="Estrela"/>
					<?php
						$sql="SELECT COUNT(vot_curtida) AS total FROM tb_votos WHERE vot_curtida=1 AND vot_codrestaurante=$rest;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
							echo "<p id='PE'>".$coluna["total"]."</p>";
						}
					?>
				</div>
				<div id="dcurtir">
					<?php
						$cc="";
						if(isset($_SESSION["sUsuario"])&&($_SESSION["sSenha"])){
							if($y==2){
								$sql="SELECT cli_codigo FROM tb_clientes WHERE cli_codusuario=$x;";
								$executar=mysql_query($sql);
								while($coluna=mysql_fetch_array($executar)){
									$cc=$coluna["cli_codigo"];
								}
								$sql="SELECT * FROM tb_votos WHERE vot_codrestaurante=$rest AND vot_codcliente=$cc;";
								$executar=mysql_query($sql);
								$contador=mysql_num_rows($executar);
								if($contador>0){
									while($coluna=mysql_fetch_array($executar)){
										$v=$coluna["vot_curtida"];
									}
									if($v){
										$mao="descurtir";
									}else{
										$mao="curtir";
									}
								}else{
									$mao="curtir";
								}
							}else{
								$mao="curtir";
							}
						}else{
							$mao="curtir";
						}
						if($cc==""){
							echo "<img id='curtir' src='imagens/votos/$mao.png' alt='Mão fazendo sinal de positivo' class='curtir'/>";
						}else{
							echo "<a href='cadVoto.php?cc=".$cc."&cr=".$rest."'><img id='curtir' src='imagens/votos/$mao.png' alt='Mão fazendo sinal de positivo' class='curtir'/></a>";
						}
					?>
				</div>
			</div>
			<div id="dtcomentario"class="dtitulo">
				<p>Comentários</p>
			</div>
			<?php
				if(isset($_SESSION["sUsuario"])&&($_SESSION["sSenha"])){
					if($y==2){
			?>
				<div class="dComentario">
					<form id="formComentario" action="cadComentario.php" method="post">
						<p id="tcomentarios">Escreva seu comentário</p>
						<textarea id="comentar" class="dPalavras" name="comentario" placeholder="  Máx. 300 caracteres" maxlength="300"></textarea>
						<?php
							$sql="SELECT cli_codigo FROM tb_clientes WHERE cli_codusuario=$x;";
							$executar=mysql_query($sql);
							while($coluna=mysql_fetch_array($executar)){
								$cc=$coluna["cli_codigo"];
							}
						?>
						<input type="hidden" name="cc" value="<?php echo $cc ?>"/>
						<input type="hidden" name="cr" value="<?php echo $rest ?>"/>
						<button type="submit">Enviar</button>
					</form>
				</div>
			<?php
					}
				}
				$sql="SELECT * FROM tb_comentarios,tb_clientes WHERE com_codrestaurante=$rest AND com_codcliente=cli_codigo ORDER BY com_codigo DESC;";
				$executar=mysql_query($sql);
				$contador=mysql_num_rows($executar);
				if($contador>0){
					while($coluna=mysql_fetch_array($executar)){
			?>
			<div class="dComentario">
				<?php
					echo "<p>".$coluna["cli_nome"]." disse: </p>";
					echo "<p class='dPalavras'>".$coluna["com_descricao"]."</p>";
				?>
			</div>
			<?php
					}
			?>
			<div class="dvm">
				<p>Ver Mais</p>
			</div>
			<?php
				}else{
					echo "<p id='msg'>Esse restaurante não possui nenhum comentário.</p>";
					echo "<p id='msg'>Seja o primeiro a comentar.</p>";
				}
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>