<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho - Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/carrinho.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <section id="shopping-cart-address-block">
        	<a href="" class="margin-left-30px margin-top-30px">Cancelar</a>
        	<h3>ENDEREÇO DE ENTREGA</h3>
        	<p class="shopping-cart-address-subtitle">Selecione ou cadastre um endereço de entrega</p>
        	<div id="shopping-cart-address-row">
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um endereço:</span>
        			<div class="padding-left-30px">
	        			<input type="radio" name="input1">
	        			<label for="input1" class="margin-left-5px">R. Silverstone, 391, JD. Flores, Jandira, SP</label>
        			</div>
					<div class="padding-left-30px">
        				<input type="radio" name="input2">
        				<label for="input2" class="margin-left-5px">R. São Roque, 142, Lago dos Cisnes, Barueri, SP</label>
					</div>
					<div class="padding-left-30px">
        				<input type="radio" name="input3">
        				<label for="input3" class="margin-left-5px">Av. Centuri, 938, João Bosques, Carapicuíba, SP</label>
        			</div>
        			<a href="" class="padding-left-30px">Cadastrar um endereço</a>
        		</div>
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um frete:</span>
        			<div class="padding-left-30px">
	        			<input type="radio" name="input1">
	        			<label for="input1" class="margin-left-5px">Frete Comum (R$12,90)</label>
        			</div>
					<div class="padding-left-30px">
        				<input type="radio" name="input2">
        				<label for="input2" class="margin-left-5px">Frete Expresso (R$25,90)</label>
					</div>
        		</div>
        	</div>
        </section>
        <section class="shopping-cart-block">
        	<div class="shopping-cart-title-menu margin-top-30px">
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">IMAGEM</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">INFORMAÇÕES</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">PREÇO UNIT.</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">QUANTIDADE</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">SUBT0TAL</span>
        		</div>
        	</div>
        	<section class="shopping-cart-grid">
        		<div class="shopping-cart-row">
	        		<div class="shopping-cart-column">
	        			<figure class="shopping-cart-image-container">
	        				<img src="assets/images/dishs/img1.jpg" alt="Nome do Prato">
	        			</figure>
	        		</div>
	        		<div class="shopping-cart-column">
	        			<h2 class="padding-bottom-5px">Nome do Prato</h2>
	        			<h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
	        			<span class="padding-bottom-5px">Ingredientes:</span>
	        			<p class="padding-bottom-15px">Item 1, Item 2, Item 3, Item 4, Item 5, Item 6, Item 7</p>
	        		</div>
	        		<div class="shopping-cart-column align">
	        			<span id="shopping-cart-price">R$ 000,00</span>
	        		</div>
	        		<div class="shopping-cart-column align">
	        			<span id="shopping-cart-qty">QTD: 3</span>
	        		</div>
	        		<div class="shopping-cart-column align">
	        			<span id="shopping-cart-price-total">R$ 000,00</span>
	        		</div>
	        	</div>
        	</section>
        </section>
        <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
        	<span class="padding-right-15px" style="font-size: 18px; font-family: 'Roboto Medium Italic'; color: #7F7F7F;">Passo 1 de 2</span>
        	<div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
        		<span>Próximo</span>
        	</div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
