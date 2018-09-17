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
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
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
                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px" onclick="javascript:history.back()">Voltar</span>
                    <div class="btn-generic" onclick="$('.generic-modal').css('display', 'flex');">
                        <span>Finalizar</span>
                    </div>
                </div>
            </form>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
    <div class="generic-modal">
        <article class="generic-modal-wrapper">
            <h2 class="margin-top-60px">EXEMPLO DE MODAL GENÉRICA</h2>
            <p>Esta é uma modal genérica de exemplo desenvolvida afim de testar seu layout. Este parágrafo pode, além de texto, conter <a href="#">links</a>.</p>
            <div class="generic-modal-row margin-top-30px margin-bottom-60px">
                <div class="btn-generic-modal cancel box-shadow margin-left-auto margin-right-15px">
                    <span>Aceitar</span>
                </div>
                <div class="btn-generic-modal confirm box-shadow margin-right-auto">
                    <span>Recusar</span>
                </div>
            </div>
            <figure class="close-modal">
                <img src="assets/images/icons/delete.svg" alt="Fechar Modal">
            </figure>
        </article>
    </div>
</body>
</html>
