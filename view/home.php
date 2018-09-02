<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
		<header id="header-flat"><!-- CABEÇALHO DA INDEX -->
			<div id="header-flat-row1" class="animate fadeInUp"><!-- PRIMEIRO CONTAINER-FILHO DO CABEÇALHO DA INDEX -->
				<img src="assets/images/backgrounds/fit.jpeg" alt="Header"><!-- IMAGEM DO CONTAINER-FILHO DO CABEÇALHO DA INDEX -->
				<div id="header-flat-overlay"><!-- CAMADA DO CONTAINER-FILHO DO CABEÇALHO DA INDEX -->
					<h2 class="padding-left-30px padding-bottom-15px">Grãos como principal</h2><!-- TÍTULO DO DESTAQUE -->
					<div class="separator-white margin-left-30px"></div><!-- SEPARADOR -->
					<p class="padding-left-30px padding-top-15px">Veja pratos montados e temperados com diversos tipos de grãos integrais!</p><!-- DESCRIÇÃO DO DESTAQUE -->
					<div id="header-flat-overlay-seemore"><!-- RODAPÉ VIA PHP -->
						<figure>
							<img src="assets/images/icons/arrow.svg" alt="Ver Mais Sobre Prato Destaque"><!-- IMAGEM DO BOTÃO PARA VER MAIS SOBRE O DESTAQUE -->
						</figure>
					</div>
				</div>
			</div>
			<div id="header-flat-row2"><!-- SEGUNDO CONTAINER-FILHO DO CABEÇALHO DA INDEX -->
				<span id="page-title" class="animate fadeInUp">Destaques</span><!-- TÍTULO DA PÁGINA -->
				<div id="header-grid-container"><!-- CONTAINER COM GRID DA INDEX -->
					<div class="highlight-one hl-card animate fadeInUp"  onclick="location.href='prato.php';"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
					<div class="highlight-two hl-card animate fadeInUp"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
					<div class="highlight-three hl-card animate fadeInUp"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
					<div class="highlight-four hl-card animate fadeInUp"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
					<div class="highlight-five hl-card animate fadeInUp"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
					<div class="highlight-six hl-card animate fadeInUp"><!-- CARD DA INDEX -->
						<span class="dish-name margin-top-60px margin-left-30px margin-bottom-15px">Frango Grelhado</span><!-- NOME DO PRATO NA INDEX -->
				  		<div class="dish-separator margin-top-0px margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p><!-- DESCRIÇÃO DO PRATO NA INDEX -->
				  		<div class="dish-price margin-bottom-15px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
				  			<span>R$ 129,90</span><!-- PREÇO -->
				  			<div><img src="assets/images/simbols/shopping-cart.svg" alt="Comprar"></div><!-- ADICIONAR AO CARRINHO -->
				  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
				  		</div>
					</div>
				</div>
				<div class="btn-generic margin-right-auto margin-left-auto margin-top-15px margin-bottom-15px animate fadeInUp"><!-- BOTÃO PARA VER TODOS OS PRATOS -->
					<span>Ver Todos</span>
				</div>
			</div>
		</header>
		<section id="app-section" class="animate fadeInUp"><!-- CONTAINER-MÃE PARA BAIXAR O APP -->
			<div id="app-section-content"><!-- CONTAINER-FILHO PARA BAIXAR O APP -->
				<h2 class="padding-bottom-15px">Baixe nosso aplicativo!</h2><!-- TÍTULO DA SESSÃO -->
				<div id="app-section-separator" class="margin-bottom-15px"></div><!--SEPARADOR -->
				<p class="padding-bottom-15px">Controle as suas dietas e encomendas semanais pelo aplicativo para Android! Baixe agora e mantenha sua saúde em dia!</p><!-- DESCRIÇÃO DA SESSÃO -->
				<div class="btn-generic margin-auto animate fadeInUp"><!-- BOTÃO GENÉRICO -->
					<span>Baixar</span>
				</div>
			</div>
			<figure id="app-section-image"><!-- CONTAINER DE IMAGENS -->
				<img src="assets/images/backgrounds/fade1.jpg" alt="Notificar-me" id="a-s-i-left"><!-- IMAGEM À ESQUERDA -->
				<img src="assets/images/backgrounds/fade2.jpg" alt="Notificar-me" id="a-s-i-center"><!-- IMAGEM AO CENTRO -->
			</figure>
		</section>
		<article id="success-cases-section"><!-- CONTAINER-MÃE DO CASOS DE SUCESSO -->
			<div id="success-cases-content" class="animate fadeInUp"><!-- CONTAINER-FILHO DO CASOS DE SUCESSO -->
				<h2 class="padding-top-60px padding-left-30px padding-bottom-15px">Casos de Sucesso</h2><!-- TÍTULO DA SESSÃO -->

				<div class="separator-white margin-left-30px margin-bottom-15px"></div><!-- SEPARADOR -->

				<p class="padding-left-30px padding-bottom-15px">Conheça as histórias das pessoas que utilizaram<br>nosso serviço e degustaram dos nossos produtos!</p><!-- DESCRIÇÃO DA SESSÃO -->

				<div class="btn-generic margin-left-30px margin-bottom-60px"><!-- BOTÃO GENÉRICO -->
					<span>Ver Mais</span>
				</div>
			</div>
		</article>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
