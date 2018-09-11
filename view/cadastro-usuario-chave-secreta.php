<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chave Secreta - Cadastro de Usuário - Food 4Fit</title>
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
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-small margin-left-auto margin-right-auto">
            <form action="#" method="POST" name="frmsignup" class="form-generic-content">
                <label for="senha" class="label-generic margin-top-30px">Senha:</label>
                <input type="password" name="senha" id="senha" class="input-generic" required>
                <label for="confsenha" class="label-generic margin-top-30px">Confirme a Senha:</label>
                <input type="password" name="confsenha" id="confsenha" class="input-generic" required>
                <label for="perguntasecreta" class="label-generic margin-top-30px">Pergunta Secreta:</label>
                <select name="perguntasecreta" id="perguntasecreta" class="input-generic margin-top-30px">
                    <option>Selecione uma opção</option>
                </select>
                <label for="respostasecreta" class="label-generic margin-top-30px">Resposta:</label>
                <input type="text" name="respostasecreta" id="respostasecreta" class="input-generic margin-bottom-60px" required>
                <div class="button-basic-information margin-top-30px margin-bottom-30px">
                    <div class="btn-generic">
                        <a href="cadastro-usuario-dados-adicionais.php">
                            <span>Voltar</span>
                        </a>
                    </div>
                    <div class="btn-generic margin-left-auto">
                        <a href="modal-confirmacao-usuario.php">
                            <span>Finalizar</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
