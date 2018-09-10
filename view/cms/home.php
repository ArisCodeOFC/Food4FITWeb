<?php
    require_once("../../controller/FuncionarioController.class.php");
    $funcionario = FuncionarioController::getFuncionarioAtual();
    if (!$funcionario) {
        header("location:login.php");
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
        <link rel="stylesheet" href="../assets/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/cms/main.css">
        <link rel="stylesheet" href="../assets/css/cms/form.css">
	    <script src="../assets/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/js/jquery.toast.min.js"></script>
        <script src="../assets/js/jquery.sceditor.xhtml.min.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
	    <script src="../assets/js/cms/home.js"></script>
    </head>
    <body>
        <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <div id="main-content">
                <header>
                    <span id="titulo-pagina"></span>
                    <div>
                        <input type="search" placeholder="Pesquise por algo">
                        <img src="../assets/images/cms/icons/pesquisa.svg" alt="Pesquisar">
                    </div>
                    <div>
                        <span id="ultimas-interacoes">Últimas Interações</span>
                        <div id="notificacoes">
                            <img src="../assets/images/cms/icons/notificacoes.svg" alt="Notificações">
                            <span>12</span>
                        </div>
                        <img class="btn-logout" src="../assets/images/cms/icons/sair-navbar.svg" alt="Sair">
                    </div>
                </header>
                <div id="page-content">
                </div>
            </div>
        </section>
    </body>
</html>
