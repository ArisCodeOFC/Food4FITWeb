<?php
    require_once("../../controller/FuncionarioController.class.php");
    if (FuncionarioController::getFuncionarioAtual()) {
        header("location:home.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
	    <link rel="stylesheet" href="../assets/css/jquery.toast.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/cms/main.css">
	    <script src="../assets/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/jquery.toast.min.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
	    <script src="../assets/js/cms/login.js"></script>
    </head>
    <body>
        <section id="main-login">
            <h2 id="titulo">
                <span>Food</span>
                <span>4FIT</span>
                <span id="subtitulo">Comida Fitness</span>
            </h2>
            <form id="form-login">
                <input type="text" name="matricula" placeholder="Matrícula" required>
                <input type="password" name="senha" id="senha" placeholder="Senha" required>
                <div id="rodape">
                    <a href="nao-tenho-conta.php">Não tenho uma conta</a>
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </section>
    </body>
</html>
