<?php
    require_once("model/dao/Database.class.php");
    require_once("controller/APIController.class.php");
    require_once("controller/FuncionarioController.class.php");
    require_once("controller/SobreNosController.class.php");
    require_once("controller/IngredienteController.class.php");
    require_once("controller/CategoriaIngredienteController.class.php");

    /* Cria uma nova instância da classe APIController e inicializa todas as rotas */
    $api = new APIController();
    $api->inicializar();
?>
