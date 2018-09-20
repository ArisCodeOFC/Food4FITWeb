<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#9CC283">
    <meta name="msapplication-navbutton-color" content="#9CC283">
    <meta name="apple-mobile-web-app-status-bar-style" content="#9CC283">
	<title>Diário de Bordo - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bases.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/sizes.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="assets/public/js/jquery-ui.min.js"></script>
	<script src="assets/js/scripts.js"></script>
    <script>
        $( function() {
            $( "#slider-range-max" ).slider({
                range: "max",
                min: 1,
                max: 5,
                value: 2,
                slide: function( event, ui ) {
                    $( "#progresso" ).val( ui.value );
                }
            });
            $( "#progresso" ).val( $( "#slider-range-max" ).slider( "value" ) );
      });
    </script>
    <style>
        .diario-de-bordo-header{
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .diario-de-bordo-header>h2{
            font-size: 4vw;
            color: #9CC283;
            font-family: 'Roboto Bold';
            line-height: auto;
            text-align: center;
        }
        .diario-de-bordo-header>h2::after{
            content: "";
            display: block;
            width: 60px;
            height: 3px;
            border-radius: 50px;
            background-color: #000;
            margin: 20px auto;
        }
        .diario-de-bordo-header>p{
            font-size: 16px;
            color: #7F7F7F;
            font-family: 'Roboto Regular';
            line-height: 23px;
            text-align: center;
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="generic-block">
            <header class="diario-de-bordo-header">
                <h2 class="padding-top-60px">DIÁRIO<br>DE<br>BORDO</h2>
                <p class="padding-bottom-70px">Fale para a gente como você evoluiu<br>com os serviços da Food 4Fit!</p>
            </header>
            <div class="form-generic width-550px margin-right-auto margin-left-auto">
                <form action="#" class="form-generic-content">
                    <label for="titulo" class="label-generic">Título:</label>
                    <input name="titulo" id="titulo" class="input-generic">

                    <label for="texto" class="label-generic">Depoimento:</label>
                    <textarea name="texto" id="texto" class="textarea-generic"></textarea>

                    <label for="progresso" class="label-generic">Progresso:</label>
                    <input type="text" id="progresso" name="progresso" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    <div id="slider-range-max"></div>
                </form>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
