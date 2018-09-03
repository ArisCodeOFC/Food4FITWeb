<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todos os Pratos - Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<link rel="stylesheet" href="assets/css/prato.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?>
	<section class="main">
		<div class="filter-menu">
			<div class="filter-menu-column">
				<label for="categorias" class="dishes-filter-label padding-left-15px">Categorias:</label>
				<select name="categorias" id="categorias" class="dishes-filter-select margin-bottom-15px margin-top-15px margin-left-15px margin-right-15px">
					<option>Selecione uma opção</option>
				</select>
			</div>
			<div class="filter-menu-column">
				<label for="price-initial" class="price-initial padding-left-15px margin-right-15px">DE:</label>
				<input type="text" placeholder="R$ 00,00" name="price-initial" class="dishes-filter-input margin-right-15px">

				<label for="price-final" class="price-initial margin-right-15px">À:</label>
				<input type="text" placeholder="R$ 000,00" name="price-final" class="dishes-filter-input margin-right-15px">

				<div class="btn-generic margin-bottom-15px margin-top-15px margin-right-15px ">
					<span>Pesquisar</span>
				</div>
			</div>
		</div>
		<article class="generic-grid">
			<div class="generic-card animated fadeInUp">
				<img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ 129,90</span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
				</div>
			</div>
			<div class="generic-card animated fadeInUp">
				<img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ 129,90</span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
				</div>
			</div>
			<div class="generic-card animated fadeInUp">
				<img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ 129,90</span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
				</div>
			</div>
		</article>
		<div class="margin-right-auto margin-left-auto margin-bottom-30px">
		  	<div class="pagination">
			    <a href="#">&laquo;</a>
			    <a href="#" class="active">1</a>
			    <a href="#">2</a>
			    <a href="#">3</a>
			    <a href="#">4</a>
			    <a href="#">5</a>
			    <a href="#">6</a>
			    <a href="#">&raquo;</a>
		  	</div>
		</div>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
