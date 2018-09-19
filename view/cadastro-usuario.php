<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bases.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form action="#" method="POST" name="frmsignup" class="form-generic-content">
                <span style="display: block; font-size: 18px; font-family: 'Roboto Bold'; color: #000;" class="margin-top-30px margin-bottom-15px">Eu sou...</span>
                <div id="pessoa" style="display: flex;">
                    <input type="radio" name="pessoa" id="fisica" value="F" required checked>
                    <label for="fisica" class="label-generic">Pessoa Física</label>
                    <input type="radio" name="pessoa" id="juridica" value="J" required class="margin-left-15px">
                    <label for="juridica" class="label-generic">Pessoa Jurídica</label>
                </div>
                <label for="nome" class="label-generic margin-top-30px">Nome:</label>
                <input type="text" name="nome" id="nome" class="input-generic" placeholder="Ex: João" required>
                <label for="sobrenome" class="label-generic margin-top-30px">Sobrenome:</label>
                <input type="text" name="sobrenome" id="sobrenome" class="input-generic" placeholder="Ex: Guedez da Silva" required>
                <label for="email" class="label-generic margin-top-30px">E-Mail:</label>
                <input type="email" name="email" id="email" class="input-generic" placeholder="Ex: endereco@provedor.com" required>
                <label for="rg" class="label-generic margin-top-30px">RG:</label>
                <input type="text" name="rg" id="rg" class="input-generic" placeholder="Ex: 12.345.678-9" required>
                <label for="cpf" class="label-generic margin-top-30px">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="input-generic" placeholder="Ex: 111.222.333-44" required>
                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px" onclick="javascript:location.href='index.php'">Cancelar</span>
                    <div class="btn-generic" onclick="javascript:location.href='cadastro-usuario-dados-adicionais.php'">
                        <span>Próximo</span>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
