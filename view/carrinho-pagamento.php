<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pagamento :: Carrinho - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/carrinho.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <div class="form-generic width-small margin-right-auto margin-left-auto margin-top-30px hide">
            <h3 class="form-title">Cadastre um Cartão de Crédito:</h3>
            <form action="#" method="POST" name="frmendereco" class="form-generic-content">
                <label for="numero" class="label-generic">Número do Cartão:</label>
                <input type="text" name="numero" id="numero" placeholder="Ex: 1239 9434 2938 0093" class="input-generic">

                <label for="titular" class="label-generic">Títular:</label>
                <input type="text" name="titular" id="titular" placeholder="Como no cartão" class="input-generic">

                <label for="expiracao" class="label-generic">Data de Expiração:</label>
                <input type="text" name="expiracao" id="expiracao" placeholder="Ex: 11/20" class="input-generic">

                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px">Cancelar</span>
                    <div class="btn-generic">
                        <span>Salvar</span>
                    </div>
                </div>
            </form>
        </div>
        <section id="shopping-cart-address-block" class="margin-top-15px">
            <h3>PAGAMENTO</h3>
            <p class="shopping-cart-address-subtitle">Selecione ou cadastre um cartão de crédito para<br>confirmar o pagamento do pedido</p>
        	<div id="shopping-cart-address-row">
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um cartão de crédito:</span>
        			<div class="padding-left-30px">
	        			<input type="radio" name="cartao" id="input1" value="1">
	        			<label for="input1" class="margin-left-5px">VISA ****6002, João Silva</label>
        			</div>
					<div class="padding-left-30px">
        				<input type="radio" name="cartao" id="input2" value="1">
        				<label for="input2" class="margin-left-5px">VISA ****6002, João Silva</label>
					</div>
					<div class="padding-left-30px">
        				<input type="radio" name="cartao" id="input3" value="1">
        				<label for="input3" class="margin-left-5px">VISA ****6002, João Silva</label>
        			</div>
                    <span class="save-data-button padding-left-30px">Cadastrar um cartão</span>
        		</div>
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Por segurança...</span>

                    <div style="height: auto; position: relative;">
                        <form class="form-generic-content width-small padding-left-30px" action="#" method="GET" name="frm">
                            <label for="dt-expire" class="label-generic">Data de Expiração:</label>
                            <input type="text" name="dt-expire" id="dt-expire" placeholder="Ex: 11/20" class="input-generic" style="width: 60%;">

                            <label for="card-name" class="label-generic">Nome no Cartão:</label>
                            <input type="text" name="card-name" id="card-name" placeholder="Como no cartão..." class="input-generic" style="width: 60%;">

                            <label for="card-code" class="label-generic">Código de Segurança</label>
                            <input type="text" name="card-code" id="card-code" placeholder="No verso do cartão..." class="input-generic" style="width: 60%;">
                        </form>
                    </div>
        		</div>
        	</div>
            <div id="total-price" style="">
                <span>Total da compra:<br><b>R$ 000,00</b></span>
            </div>
            <div class="shopping-cart-row-next">
                <span class="padding-left-30px">Passo 2 de 2</span>
                <a href="" class="margin-right-30px">Cancelar</a>
                <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" onclick="location.href='carrinho-pagamento.php';">
                    <span>Finalizar</span>
                </div>
            </div>
        </section>
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
