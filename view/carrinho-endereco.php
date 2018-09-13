<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Endereço :: Carrinho - Food 4Fit</title>
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
            <h3 class="form-title">Cadastre um Endereço:</h3>
            <form action="#" method="POST" name="frmendereco" class="form-generic-content">
                <label for="logradouro" class="label-generic">Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" placeholder="Ex: R. Flores/Av. 13 de Maio" class="input-generic">

                <label for="numero" class="label-generic">Número:</label>
                <input type="text" name="numero" id="numero" placeholder="Ex: 845" class="input-generic">

                <label for="bairro" class="label-generic">Bairro:</label>
                <input type="text" name="bairro" id="bairro" placeholder="Ex: Vila Almeida" class="input-generic">

                <label for="complemento" class="label-generic">Complemento:</label>
                <input type="text" name="complemento" id="complemento" placeholder="Ex: Ao lado do shopping" class="input-generic">

                <label for="cep" class="label-generic">CEP:</label>
                <input type="text" name="cep" id="cep" placeholder="Ex: 01234-567" class="input-generic">

                <label for="cidade" class="label-generic">Cidade:</label>
                <select name="cidade" id="cidade" class="input-generic">
                    <option>Selecione uma opção</option>
                </select>

                <label for="estado" class="label-generic">Estado:</label>
                <select name="estado" id="estado" class="input-generic">
                    <option>Selecione uma opção</option>
                </select>

                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px">Cancelar</span>
                    <div class="btn-generic">
                        <span>Salvar</span>
                    </div>
                </div>
            </form>
        </div>
        <section id="shopping-cart-address-block" class="padding-top-15px">
        	<h3>ENDEREÇO DE ENTREGA</h3>
        	<p class="shopping-cart-address-subtitle">Selecione ou cadastre um endereço de entrega</p>
        	<div id="shopping-cart-address-row">
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um endereço:</span>
        			<div class="padding-left-30px">
	        			<input type="radio" name="endereco" id="input1" value="1">
	        			<label for="input1" class="margin-left-5px">R. Silverstone, 391, JD. Flores, Jandira, SP</label>
        			</div>
					<div class="padding-left-30px">
        				<input type="radio" name="endereco" id="input2" value="1">
        				<label for="input2" class="margin-left-5px">R. São Roque, 142, Lago dos Cisnes, Barueri, SP</label>
					</div>
					<div class="padding-left-30px">
        				<input type="radio" name="endereco" id="input3" value="1">
        				<label for="input3" class="margin-left-5px">Av. Centuri, 938, João Bosques, Carapicuíba, SP</label>
        			</div>
        			<span class="save-data-button padding-left-30px">Cadastrar um endereço</span>
        		</div>
        		<div class="shopping-cart-address-column">
        			<span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Frete:</span>
        			<p class="padding-left-30px">Frete Gerado: <b>R$ 00,00</b></p>
        		</div>
        	</div>
            <div id="total-price" style="">
                <span>Total da compra:<br><b>R$ 000,00</b></span>
            </div>
            <div class="shopping-cart-row-next">
                <span class="padding-left-30px">Passo 1 de 2</span>
                <a href="" class="margin-right-30px">Cancelar</a>
                <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" onclick="location.href='carrinho-pagamento.php';">
                    <span>Próximo</span>
                </div>
            </div>
        </section>
        <div class="shopping-cart-block">
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
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
