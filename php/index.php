<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/inicio.css"/>
		<title>Holly Food</title>
	</head>
	<body>
		<div id="dPrincipal">
			<div id="dTopo">
				<img src="imagens/logo.jpg" alt="Holly Food"/>
				<hr/>
			</div>
			<div id="dCorpo">
				<h1>Qual local você deseja conhecer?</h1>
				<a href="restaurantes.php?cat=10"><div class="dOptions">
					<div class="dTexto align1"><p>Restaurantes Japoneses</p></div>
					<img src="imagens/categorias/japao.jpg" alt="Restaurantes Japoneses"/>
				</div></a>
				<a href="restaurantes.php?cat=9"><div class="dOptions">
					<div class="dTexto align1"><p>Restaurantes Italianos</p></div>
					<img src="imagens/categorias/italia.jpg" alt="Restaurantes Italianos"/>
				</div></a>
				<a href="restaurantes.php?cat=11"><div class="dOptions">
					<div class="dTexto align1"><p>Restaurantes Mexicanos</p></div>
					<img src="imagens/categorias/mexico.jpg" alt="Restaurantes Mexicanos"/>
				</div></a>
				<a href="restaurantes.php?cat=7"><div class="dOptions jump">
					<div class="dTexto align1"><p>Restaurantes Árabes</p></div>
					<img src="imagens/categorias/arabe.jpg" alt="Restaurantes Árabes"/>
				</div></a>
				<a href="restaurantes.php?cat=3"><div class="dOptions">
					<div class="dTexto align2"><p>Lanchonetes</p></div>
					<img src="imagens/categorias/lanchonete.jpg" alt="Lanchonetes"/>
				</div></a>
				<a href="restaurantes.php?cat=2"><div class="dOptions">
					<div class="dTexto align2"><p>Coffee Houses</p></div>
					<img src="imagens/categorias/coffeehouse.jpg" alt="Coffee Houses"/>
				</div></a>
				<a href="restaurantes.php?cat=1"><div class="dOptions">
					<div class="dTexto align2"><p>Churrascarias</p></div>
					<img src="imagens/categorias/churrascaria.jpg" alt="Churrascarias"/>
				</div></a>
				<a href="restaurantes.php?cat=6"><div class="dOptions">
					<div class="dTexto align1"><p>Restaurantes Alemães</p></div>
					<img src="imagens/categorias/alemanha.jpg" alt="Restaurantes Alemães"/>
				</div></a>
				<a class="setaDir" href="restaurantes.php" title="Outras Categorias">&rarr;</a>
			</div>
			<?php
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>