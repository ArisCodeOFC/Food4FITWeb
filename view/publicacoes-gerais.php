<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Publicações Gerais - Food 4Fit</title>
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
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="geral-pubs-block"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">PUBLICAÇÕES GERAIS</h2>
        <p id="page-subtitle">Veja publicações de quem utiliza nosso serviço<br>e interaja com a comunidade!</p>
        <div class="geral-pubs-wrapper">
            <div class="btn-add-pub margin-bottom-30px" id="abrir">
                <span>CRIAR PUBLICAÇÃO</span>
            </div>
            <div class="form-generic hide margin-bottom-20px">
                <form action="#" class="form-generic-content" style="display: flex; justify-content: space-between;">
                    <div class="pub-create-column one">
                        <label for="titulo" class="label-generic">Título da Publicação:</label>
                        <input type="text" name="titulo" id="titulo" class="input-generic">

                        <label for="texto" class="label-generic">Diga algo interessante!</label>
                        <textarea name="texto" id="texto" class="textarea-generic"></textarea>
                    </div>
                    <div class="pub-create-column two">
                        <label for="imagem" class="label-generic">Que tal uma imagem?</label>
                        <input type="file" name="imagem" id="imagem" class="file-generic">
                    </div>
                </form>
                <div class="margin-top-10px margin-bottom-30px form-row">
                    <span class="margin-right-15px" id="fechar">Cancelar</span>
                    <div class="btn-generic">
                        <span>Finalizar</span>
                    </div>
                </div>
            </div>
            <?php
                for($i = 1; $i < 8; $i++){
            ?>
            <article class="publication">
                <figure>
                    <img src="assets/images/backgrounds/img.jpg" alt="Imagem da Publicação">
                </figure>
                <div>
                    <h2 class="padding-left-30px">Título da Publicação</h2>
                    <h3 class="padding-left-30px padding-bottom-10px">Por <a href="">Maurício Linhares</a>, em 01/01/2018</h3>
                    <span class="padding-left-30px"><b>12</b> Comentários</span>
                    <div class="btn-generic margin-top-10px margin-left-30px">
                        <span>Ler Mais</span>
                    </div>
                </div>
            </article>
            <?php
                }
            ?>
            <div class="btn-generic margin-left-auto margin-right-auto">
                <span>Carregar Mais</span>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
