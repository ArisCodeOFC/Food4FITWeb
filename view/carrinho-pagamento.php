<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagamento :: Carrinho - Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
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
        	<h3>PAGAMENTO</h3>
            <p class="shopping-cart-address-subtitle">Selecione ou cadastre um cartão de crédito para<br>confirmar o pagamento do pedido</p>
        	<div id="shopping-cart-address-row">
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um cartão de crédito:</span>
        			<div class="padding-left-30px">
	        			<input type="radio" name="input1">
	        			<label for="input1" class="margin-left-5px">VISA ****6002, João Silva</label>
        			</div>
					<div class="padding-left-30px">
        				<input type="radio" name="input2">
        				<label for="input2" class="margin-left-5px">VISA ****6002, João Silva</label>
					</div>
					<div class="padding-left-30px">
        				<input type="radio" name="input3">
        				<label for="input3" class="margin-left-5px">VISA ****6002, João Silva</label>
        			</div>
                    <a href="" class="padding-left-30px">Cadastrar um cartão</a>
        		</div>
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Por segurança...</span>

                    <div class="form-generic">
                        <form class="form-generic-content width-small padding-left-30px" action="">
                            <label for="dt-expire" class="label-generic">Data de Expiração:</label>
                            <input type="text" name="dt-expire" placeholder="Ex: 11/20" class="input-generic" style="width: 60%;">

                            <label for="card-name" class="label-generic">Nome no Cartão:</label>
                            <input type="text" name="card-name" placeholder="Como no cartão..." class="input-generic" style="width: 60%;">

                            <label for="card-code" class="label-generic">Código de Segurança</label>
                            <input type="text" name="card-code" placeholder="No verso do cartão..." class="input-generic" style="width: 60%;">
                        </form>
                    </div>
        		</div>
        	</div>
        </section>
        <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
        	<span class="padding-right-15px" style="font-size: 18px; font-family: 'Roboto Medium Italic'; color: #7F7F7F;">Passo 2 de 2</span>
        	<div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
        		<span>Finalizar</span>
        	</div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
    <div class="modal">
        <div class="popup-confirm">
            <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">PEDIDO REALIZADO</h2>
            <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Isso aí! Compra finalizada!</span>
            <figure style="width: 90%; max-width: 180px;" class="margin-left-auto margin-right-auto padding-bottom-30px">
                <img src="assets/images/logo/logo-food4fit.svg" alt="Logo" style="max-width: 100%; object-fit: cover; display: block; max-height: 100%;">
            </figure>
            <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Você pode visualizar seus pedidos em Meus Pedidos</span>
            <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                <a href="" class="padding-right-15px" style="text-decoration: none; font-size: 18px; font-family: 'Roboto Medium Italic'; color: #7F7F7F;">Retornar à página inicial</a>
                <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                    <span>Finalizar</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
