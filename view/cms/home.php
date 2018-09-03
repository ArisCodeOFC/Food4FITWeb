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
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/cms/main.css">
	    <script src="../assets/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
    </head>
    <body>
        <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <section id="main-content">
                <header>
                    <h2>Dashboard</h2>
                    <div>
                        <input type="search" placeholder="Pesquise por algo">
                        <img src="../assets/images/cms/icons/pesquisa.svg">
                    </div>
                    <div>
                        <span id="ultimas-interacoes">Últimas Interações</span>
                        <div id="notificacoes">
                            <img src="../assets/images/cms/icons/notificacoes.svg">
                            <span>12</span>
                        </div>
                        <img class="btn-logout" src="../assets/images/cms/icons/sair-navbar.svg">
                    </div>
                </header>
                <section id="page-content">
                    <?php require_once("./dashboard.php") ?>
                </section>
            </section>
        </section>
    </body>
</html>
