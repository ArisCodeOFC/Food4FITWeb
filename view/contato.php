<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
	<link rel="stylesheet" href="assets/css/contato.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id='page-title' class="margin-left-auto margin-right-auto">ENTRE EM CONTATO</h2>
        <div class="form-generic width-small margin-left-auto margin-right-auto margin-top-30px">
            <form class="form-generic-content">
                <label for="txtnome" class="label-generic">Nome:</label>
                <input id='txtnome' name="txtnome" class="input-generic" placeholder="Digite o seu nome...">
                <label for="txsobrenome" class="label-generic">Sobrenome:</label>
                <input id='txsobrenome' name="txsobrenome" class="input-generic" placeholder="Digite o seu sobrenome...">
                <label for="txtemail" class="label-generic">E-mail:</label>
                <input id='txtemail' name="txtemail" class="input-generic" placeholder="Ex: endereco@provedor.com">
                <label for="txttelefone" class="label-generic">Telefone:</label>
                <input id='txttelefone' name="txttelefone" class="input-generic" placeholder="Fixo">
                <label for="txtcelular" class="label-generic">Celular:</label>
                <input id='txtcelular' name="txtcelular" class="input-generic" placeholder="(DDD) 98888-8888">
                <label for="txtcelular" class="label-generic">O que deseja nos dizer?</label>
                <textarea id='txtcomentario' name='txtcomentario' class="textarea-generic"></textarea>
            </form>
            <div class='btn-generic'>
                <span>Enviar</span>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
