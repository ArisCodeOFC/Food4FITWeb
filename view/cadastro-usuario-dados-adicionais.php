<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário</title>
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
        <span id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">DADOS ADICIONAIS</span><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form class="form-generic-content">
                <label for="txtdatanasc" class="label-generic margin-top-30px">Data de Nascimento:</label>
                <input type="text" name="dtnasc" id="dtnasc" class="input-generic" placeholder="Ex: 01/01/1990" required>
                <label for="txtsexo" class="label-generic margin-top-30px">Genero:</label>
                <div id="txtsexo">
                    <input type="radio" name="sexo" value="H" required>Homem
                    <input type="radio" name="sexo" value="M" required >Mulher
                </div>
                <label for="txttelefone" class="label-generic margin-top-30px">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11)9999-9999" required>
                <label for="txtcelular" class="label-generic margin-top-30px">Celular:</label>
                <input type="text" name="celular" id="celular" class="input-generic" placeholder="Ex: (11)98888-8888" required>
                <span class="aviso-contato">Caso necessário o contato através de e-mail ou<br>
                    telefone/celular, usaremos o seu nome escolhido como vulgo.
                </span>
                <div class="button-basic-information margin-top-60px margin-bottom-30px">
                    <div class="btn-generic">
                        <a href="cadastro-usuario.php">
                            <span>Voltar</span>
                        </a>
                    </div>
                    <div class="btn-generic margin-left-auto">
                        <a href="cadastro-usuario-chave-secreta.php">
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
