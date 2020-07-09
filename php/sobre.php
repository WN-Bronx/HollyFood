<?php
	include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Holly Food</title>
		<link rel="stylesheet" href="css/estilo.css"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/sobre.css"/>
		<link rel="stylesheet" href="css/login.css"/>
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/funcoes.js"></script>
		<script src="js/sobre.js"></script>
		
	</head>
	<body>
		<div id="dPrincipal">
			<?php
				include("verificaLogin.php");
			?>
			<img id="slide"src="imagens/sobre/pinos-mapa.jpg" alt="Pinos no Mapa"/>
			<div id="dsobre" >
				<p class="titulo">Objetivo Principal</p>
				<p class="resposta">Desenvolvido com o objetivo de proporcionar a oportunidade aos usuários de conhecerem novos
				estabelecimentos gastrônomicos de sua cidade. Além de permitir aos restaurantes de divulgarem sua atividade e,	 assim, 
				poderem adquirir novos clientes. </p>
				<p class="titulo">Desenvolvedores </p>
				<p class="resposta">O Holly Food foi desenvolvido por colegas de classe para o trabalho do conclusão do ensino médio técnico 
				em informática deles. Estes sendo:</p>
				<ul class="resposta">
					<li class="li"><span class="destaque">Cleber</span>, o piadista e salvador da pátria;</li>
					<li class="li"><span class="destaque">Wemerson</span>, o Pretto mais foda(e único) do grupo; </li>
					<li class="li"><span class="destaque">Mário</span>, apelidado de Pudim pelo nosso Delegado e auxiliador nos serviços gerais; </li>
					<li class="li"><span class="destaque">Jaiane</span>, "a estágiaria", faz de tudo um pouco no grupo. </li>
				</ul>
			</div>
			<div id="dfaq" >
				<p id="faq">Perguntas Frequentes</p>
				
				<p class="titulo">Como posso localizar um restaurante? </p>
				<p class="resposta">Existe dois meios:</p>
				<ul class="resposta">
					<li class="li">1º Você pode ir na <a class="links" href="index.php">Página Principal</a> e selecionar uma das categorias existentes;</li>
					<li class="li">2º Ou, ir na  <a class="links" href="restaurantes.php">Página Restaurantes</a>, selecionar os filtros e clicar em buscar.</li>
				</ul>
				<p class="titulo">Tenho um restaurante. Como posso cadastra-lo? </p>
				<p class="resposta">Para cadastrar-se <a class="links" href="voce.php">Clique Aqui</a>, selecione seu tipo de cadastro e preencha todos os campos obrigatórios. Pronto,
				já está sendo exibido na listagens do restaurantes!	:) </p>
				<p class="titulo">Como posso comentar sobre os restaurante? </p>
				<p class="resposta">Para comentar você deve estar logando, faça a pesquisa do restaurante e ao aparecer os resultados, clique em "Perfil.
				Após, é só rolar a página e escrever achar o campo para escrever seu comentário.</p>
			</div>
			<div id="dfotos">
				<img src="imagens/sobre/i1.jpg" alt="imagem1" id="i1" class="fotinhos"/>
				<img src="imagens/sobre/i2.jpg" alt="imagem2" id="i2" class="fotinhos"/>
				<img src="imagens/sobre/i7.jpg" alt="imagem7" id="i7" class="fotinhos"/>
				<img src="imagens/sobre/post.jpg" alt="poster" id="post" class="posts"/>
				
			</div>	
				
			<?php
				include("div/dLogin.html");
				include("div/dRodape.html");
			?>
		</div>
	</body>
</html>