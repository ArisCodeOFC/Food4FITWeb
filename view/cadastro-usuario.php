<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/cadastro-usuario.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <span id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</span><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form class="form-generic-content">
                <label for="txtnome" class="label-generic margin-top-30px">Nome:</label>
                <input type="text" name="txtnome" id="txtnome" class="input-generic" placeholder="Ex: João" required>
                <label for="txtsobrenome" class="label-generic margin-top-30px">Sobrenome:</label>
                <input type="text" name="txtsobrenome" id="txtsobrenome" class="input-generic" placeholder="Ex: Guedez da Silva" required>
                <label for="txtemail" class="label-generic margin-top-30px">E-Mail:</label>
                <input type="email" name="txtemail" id="txtemail" class="input-generic" placeholder="Ex: endereco@provedor.com" required>
                <label for="txtcpf" class="label-generic margin-top-30px">CPF:</label>
                <input type="text" name="txtcpf" id="txtcpf" class="input-generic" placeholder="Ex: 111.222.333-44" required>
                <label for="txtcep" class="label-generic margin-top-30px">CEP:</label>
                <input type="text" name="txtcep" id="txtcep" class="input-generic" placeholder="Ex: 09933-888" required>
                <div class="butto-basic-information margin-top-60px margin-bottom-30px">
                    <div class="btn-generic">
                        <span>Cancelar</span>
                    </div>
                    <div class="btn-generic margin-left-auto">
                        <a href="cadastro-usuario-dados-adicionais.php">
                            <span>Próximo</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
