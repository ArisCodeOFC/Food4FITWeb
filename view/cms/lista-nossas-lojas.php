  <?php
    require_once("../../controller/LojaController.class.php");
    $lojas = LojaController::listar();
?>


        <div class="shops-view">
        <!-- Listando o conteudo do banco-->
        <?php foreach ($lojas as $loja) { ?>
            <section class="shop-card">
                <h2><?= $loja->getEstado() ?> - <?php echo $loja->getAtivo() ? "Ativo" : "Desativado" ?></h2>
                <h3><?= $loja->getLogradouro() ?>, <?= $loja->getNumero() ?>, <?= $loja->getBairro() ?>, <?= $loja->getCidade() ?> - <?= $loja->getUf() ?>, <?= $loja->getCep() ?></h3>
                <div>
                    <span>Editar</span>
                    <span id="dlt">Excluir</span>
                    <span>Ativar/Desativar</span>
                </div>
            </section>
        <?php } ?>
    </div>
