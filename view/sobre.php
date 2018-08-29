<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Food 4fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?>
	<section class="main">
	    <header id="header-flat">
			<div id="header-flat-row1">
		        <h1 style="margin: 150px 0; text-align: center; color: #fdfdfd;">Na vida temos duas certezas, uma é a morte, a outra é que a ArisCode é melhor que a Binary Tech.</h1>
            </div>
        </header>
	</section>
	<?php require_once("components/sidebar-left.html"); ?><!-- MENU LATERAL ESQUERDO VIA PHP -->
	<?php require_once("components/sidebar-right.html"); ?><!-- MENU LATERAL DIREITO VIA PHP -->

	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
