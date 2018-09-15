<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fale Conosco - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id='page-title' class="margin-left-auto margin-right-auto">ENTRE EM CONTATO</h2>
        <div class="form-generic width-small margin-left-auto margin-right-auto margin-top-30px">
            <form class="form-generic-content" action="#" method="POST" name="frmcontact">
                <label for="nome" class="label-generic">Nome:</label>
                <input id="nome" name="nome" class="input-generic" placeholder="Digite o seu nome...">
                <label for="sobrenome" class="label-generic">Sobrenome:</label>
                <input id="sobrenome" name="sobrenome" class="input-generic" placeholder="Digite o seu sobrenome...">
                <label for="email" class="label-generic">E-mail:</label>
                <input id="email" name="email" class="input-generic" placeholder="Ex: endereco@provedor.com">
                <label for="telefone" class="label-generic">Telefone:</label>
                <input id="telefone" name="telefone" class="input-generic" placeholder="Fixo">
                <label for="celular" class="label-generic">Celular:</label>
                <input id="celular" name="celular" class="input-generic" placeholder="(DDD) 98888-8888">
                <label for="assunto" class="label-generic">Assunto:</label>
                <input id="assunto" name="assunto" class="input-generic" placeholder="Sobre o que é esta mensagem?">
                <label for="comentario" class="label-generic">O que deseja nos dizer?</label>
                <textarea id="comentario" name="comentario" class="textarea-generic"></textarea>
            </form>
            <div class='btn-generic'>
                <span>Enviar</span>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
