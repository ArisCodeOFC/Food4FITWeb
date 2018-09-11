<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/cadastro-usuario.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form action="#" method="POST" name="frmsignup" class="form-generic-content">
                <label for="nome" class="label-generic margin-top-30px">Nome:</label>
                <input type="text" name="nome" id="nome" class="input-generic" placeholder="Ex: João" required>
                <label for="sobrenome" class="label-generic margin-top-30px">Sobrenome:</label>
                <input type="text" name="sobrenome" id="sobrenome" class="input-generic" placeholder="Ex: Guedez da Silva" required>
                <label for="email" class="label-generic margin-top-30px">E-Mail:</label>
                <input type="email" name="email" id="email" class="input-generic" placeholder="Ex: endereco@provedor.com" required>
                <label for="cpf" class="label-generic margin-top-30px">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="input-generic" placeholder="Ex: 111.222.333-44" required>
                <label for="cep" class="label-generic margin-top-30px">CEP:</label>
                <input type="text" name="cep" id="cep" class="input-generic" placeholder="Ex: 09933-888" required>
                <div class="button-basic-information margin-top-30px margin-bottom-30px">
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
