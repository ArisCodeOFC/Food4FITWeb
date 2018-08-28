<?php
    require_once("../../controller/FuncionarioController.class.php");
    $funcionario = FuncionarioController::getFuncionarioAtual();
    if (!$funcionario) {
        header("location:login.php");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
	    <script src="../assets/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
    </head>
    <body>
        Olá, <?= $funcionario->nome ?>,<br>
        seu email é <?= $funcionario->email ?>,<br>
        matrícula <?= $funcionario->matricula ?><br>
        <a href="#" id="btn-logout">Logout</a>
    </body>
</html>
