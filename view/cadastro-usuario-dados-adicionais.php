<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dados Adicionais - Cadastro de Usuário - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/cadastro-usuario.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">DADOS ADICIONAIS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form action="#" method="POST" name="frmsignup" class="form-generic-content">
                <label for="dtnasc" class="label-generic margin-top-30px">Data de Nascimento:</label>
                <input type="text" name="dtnasc" id="dtnasc" class="input-generic" placeholder="Ex: 01/01/1990" required>

                <span style="display: block; font-size: 18px; font-family: 'Roboto Regular'; color: #000;" class="margin-top-30px margin-bottom-15px">Gênero:</span>
                <div id="sexo" style="display: flex;">
                    <input type="radio" name="sexo" id="homem" value="H" required>
                    <label for="homem" class="label-generic">Homem</label>
                    <input type="radio" name="sexo" id="mulher" value="M" required class="margin-left-15px">
                    <label for="mulher" class="label-generic">Mulher</label>
                </div>
                <label for="telefone" class="label-generic margin-top-30px">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11)9999-9999" required>
                <label for="celular" class="label-generic margin-top-30px">Celular:</label>
                <input type="text" name="celular" id="celular" class="input-generic" placeholder="Ex: (11)98888-8888" required>
                <span class="aviso-contato">Caso necessário o contato através de e-mail ou<br>
                    telefone/celular, usaremos o seu nome escolhido como vulgo.
                </span>
                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px" onclick="javascript:history.back()">Voltar</span>
                    <div class="btn-generic" onclick="javascript:location.href='cadastro-usuario-chave-secreta.php'">
                        <span>Próximo</span>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
