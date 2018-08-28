<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?>
	<section class="main">
		<header id="header-flat">
			<div id="header-flat-row1" class="animated fadeInUp">
				<img src="assets/images/backgrounds/fit.jpeg" alt="Header">
				<div id="header-flat-overlay">
					<h2>Grãos como principal</h2>
					<p>Veja pratos montados e temperados com diversos tipos de grãos integrais!</p>
					<div id="header-flat-overlay-seemore">
						<figure>
							<img src="assets/images/icons/arrow.svg" alt="">
						</figure>
					</div>
				</div>
			</div>
			<div id="header-flat-row2">
				<span id="page-title" class="animated fadeInUp">Destaques</span>
				<div id="header-grid-container">
					<div class="highlight-one hl-card animated fadeInUp">
						<span class="dish-name">Frango Grelhado</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
					<div class="highlight-two hl-card animated fadeInUp">
						<span class="dish-name">Salada</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor. Tempore officiis veritatis eveniet deserunt eaque?</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
					<div class="highlight-three hl-card animated fadeInUp">
						<span class="dish-name">Sopa</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
					<div class="highlight-four hl-card animated fadeInUp">
						<span class="dish-name">Salada</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet. Magni magnam saepe reiciendis.</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
					<div class="highlight-five hl-card animated fadeInUp">
						<span class="dish-name">Ovos Cozidos</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
					<div class="highlight-six hl-card animated fadeInUp">
						<span class="dish-name">Bife Mal-Passado</span>
				  		<div class="dish-separator"></div>
				  		<p class="dish-description">Lorem ipsum dolor sit amet, consectetur. Magni magnam saepe reiciendis.</p>
				  		<span class="dish-price">R$129,90</span>
					</div>
				</div>
				<div class="btn-generic animated fadeInUp">
					<span>Ver Todos</span>
				</div>
			</div>
		</header>
		<section id="app-section" class="animated fadeInUp">
			<div id="app-section-content">
				<h2>Baixe nosso aplicativo!</h2>
				<div id="app-section-separator"></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia nostrum modi, aut fugit excepturi odio quam quis possimus!</p>
				<div class="btn-generic animated fadeInUp">
					<span>Baixar</span>
				</div>
			</div>
			<figure id="app-section-image">
				<img src="assets/images/backgrounds/fade1.jpg" alt="Notificar-me" id="a-s-i-left">
				<img src="assets/images/backgrounds/fade2.jpg" alt="Notificar-me" id="a-s-i-center">
			</figure>
		</section>
		<article style="width: 100%; background-image: url('assets/images/backgrounds/bg.jpg'); background-size: cover; display: flex; flex-direction: column; justify-content: center; align-items: center;">
			<figure style="width: 80%; max-width: 800px; background: linear-gradient(-45deg, #fcfcfc, #FFF); border-radius: 10px; height: auto; padding: 0; margin: 120px auto; box-shadow: 4px 4px 10px 4px rgba(0,0,0,0.1);" class="animated fadeInUp">
				<h2 style="text-align: center; color: #9CC283; font-size: 21px; padding: 30px; padding-bottom: 20px; font-family: 'Roboto Bold';">Receba notificações de pratos novos!</h2>
				<div style="width: 80px; height: 2.5px; background: #9CC283; margin: auto; border-radius: 30px; margin-bottom: 20px;"></div>
				<div style="width: 90%; max-width: 320px; margin: auto; margin-bottom: 20px;">
					<input type="text" placeholder="exemplo@endereco.com" style="border: none; outline: none; border-radius: 50px; background: #F1F1F1; width: 100%; height: 30px; text-indent: 15px;">
				</div>
				<div style="width: 80px; height: auto; margin: auto; margin-bottom: 30px;">
					<input type="submit" value="Enviar" style="width: 100%; height: 30px; background-color: #F1F1F1; border-radius: 50px; border: none; outline: none; font-family:'Roboto Bold';">
				</div>
			</figure>
		</article>
	</section>
	<?php require_once("components/sidebar.html"); ?>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
