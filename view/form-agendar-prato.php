<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/stylesheet.css">
	<link rel="stylesheet" href="assets/css/classes-genericas.css">
	<link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
	<link rel="stylesheet" href="assets/css/mobile-stylesheet.css">
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<div class="form-generic width-small margin-left-auto margin-right-auto margin-top-30px margin-bottom-30px">
		<form class="form-generic-content" action="#" method="POST" name="frmagendar">
			<div style="width: 100%; height: auto; display: flex; justify-content: center">
    			<input type="radio" name="periodo" id="dia" value="D" required checked>
    			<label for="dia" class="label-generic margin-right-30px">Dia</label>
    			<input type="radio" name="periodo" id="semana" value="S" required>
    			<label for="semana" class="label-generic margin-right-30px">Semana</label>
    			<input type="radio" name="periodo" id="mes" value="M" required>
    			<label for="mes" class="label-generic">Mes</label>
    		</div>
			<div style="width: 100%; height: auto; display: flex; flex-direction: column; justify-content: center">
    			<label for="tempo-agendado" class="margin-left-auto margin-right-auto margin-top-15px">Intervalo da Compra:</label>
    		<input type="text" id="tempo-agendado" class="input-generic margin-left-auto margin-right-auto" style="width:300px ">
    		</div>
    		<div class="generic-modal-row margin-top-30px margin-bottom-60px" style="align-items: center;">
				<div class="cancel margin-left-auto margin-right-15px">
					<span>Cancelar</span>
				</div>
				<div class="btn-generic confirm box-shadow margin-right-auto">
					<span>Agendar</span>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
