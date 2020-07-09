<?php
	include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/ranking.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<script src="js/ranking.js"></script>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
			?>
			<h3>Olimpos Destaques:</h3>
			<div id="dCentro">
				<!--div id="dDia">
					<h2>Dia</h2>
				</div>
				<div id="dSemana">
					<h2>Semana</h2>
				</div>
				<div id="dMes">
					<h2>Mês</h2>
				</div-->
			</div>
			</br>
			<div id="dCorpo">
				</br>
				<div id="dLinha"></div>
				</br>
				<?php
					$top1="";
					$top2="";
					$top3="";
					$cod1="";
					$cod2="";
					$cod3="";
					$sql="SELECT res_codigo FROM tb_restaurantes;";
					$executar=mysql_query($sql);
					while($coluna=mysql_fetch_array($executar)){
						$sql2="SELECT COUNT(*) AS total FROM tb_votos WHERE vot_curtida=1 AND vot_codrestaurante=".$coluna["res_codigo"].";";
						$executar2=mysql_query($sql2);
						while($coluna2=mysql_fetch_array($executar2)){
							if($coluna2["total"]>$top1){
								$top3=$top2;
								$top2=$top1;
								$top1=$coluna2["total"];
								$cod3=$cod2;
								$cod2=$cod1;
								$cod1=$coluna["res_codigo"];
							}elseif($coluna2["total"]>$top2){
								$top3=$top2;
								$top2=$coluna2["total"];
								$cod3=$cod2;
								$cod2=$coluna["res_codigo"];
							}elseif($coluna2["total"]>$top3){
								$top3=$coluna2["total"];
								$cod3=$coluna["res_codigo"];
							}
						}
					}
				?>
				<div id="dTop1">
					<img class="img1" src="imagens/ranking/ouro.jpg">
					<p class="ranking"></p>
					<?php
						$sql="SELECT res_nmfantasia FROM tb_restaurantes WHERE res_codigo=$cod1;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
					?>
					<div class="cCirculo"><img class="ImgC" src="imagens/multy-user.png" alt="Posição"/></div>
					<div class="cFoto"><p>1º LUGAR: <?php echo $coluna["res_nmfantasia"]; ?></p></div>
					<?php
						}
					?>
				</div><br/>
				<div id="dTop2">
					<img class="img2" src="imagens/ranking/prata.jpg">
					<p class="ranking"></p>
					<?php
						$sql="SELECT res_nmfantasia FROM tb_restaurantes WHERE res_codigo=$cod2;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
					?>
					<div class="cCirculo"><img class="ImgC" src="imagens/multy-user.png" alt="Posição"/></div>
					<div class="cFoto"><p>2º LUGAR: <?php echo $coluna["res_nmfantasia"]; ?></p></div>
					<?php
						}
					?>
				</div><br/>
				<div id="dTop3">
					<img class="img3" src="imagens/ranking/bronze.jpg">
					<p class="ranking"></p>
					<?php
						$sql="SELECT res_nmfantasia FROM tb_restaurantes WHERE res_codigo=$cod3;";
						$executar=mysql_query($sql);
						while($coluna=mysql_fetch_array($executar)){
					?>
					<div class="cCirculo"><img class="ImgC" src="imagens/multy-user.png" alt="Posição"/></div>
					<div class="cFoto"><p>3º LUGAR: <?php echo $coluna["res_nmfantasia"]; ?></p></div>
					<?php
						}
					?>
				</div>
			</div>
			<h4>Parabenizamos todos os Olimpos em destaque e torcemos pra que continuem servindo um manjar que os deuses apreciariam!</h4>
			<h5>Equipe Holly Food</h5>
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>