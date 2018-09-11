<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Monte Seu Prato - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
	<link rel="stylesheet" href="assets/css/montar-prato.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/jquery-ui.min.js"></script>
	<script src="assets/js/dragscroll.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/montar-prato.js"></script>
</head>
<body>
    <?php require_once("components/navbar.html") ?>
    <section class="main">
        <span id="page-title" class="animate fadeInUp">MONTE SEU PRATO</span>
        <section id="monte-seu-prato-container" class="clearfix animate fadeInUp">
            <div id="ingredientes-categorias" class="sem-ingredientes clearfix">
                <div id="breadcrumb">
                    <span>
                        <a href="#">Início</a>
                    </span>
                </div>
                <p id="categoria-vazia">Esta categoria não possui nenhum ingrediente ou subcategoria.</p>
                <div id="categorias" class="clearfix">
                    <h2>Categorias</h2>
                    <div id="lista-categorias" class="clearfix dragscroll">
                    </div>
                </div>
                <div id="ingredientes" class="clearfix">
                    <h2>Ingredientes</h2>
                    <div id="lista-ingredientes" class="clearfix"></div>
                </div>
            </div>
            <div id="meus-ingredientes" class="clearfix">
            </div>
        </section>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
