<?php
    require_once("../../controller/LojaController.class.php");
    $lojas = LojaController::listar();
?>

<div class="shops-wrapper">
    <section class="shop-form width-100 padding-bottom-30px form-generic">
        <form action="#" class="form-generic-content" id="form-loja">
            <h2 class="form-title">Cadastrar um Local Físico</h2>
            <label for="logradouro" class="label-generic">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" class="input-generic" placeholder="Ex: R. Athena">

            <label for="numero" class="label-generic">Número:</label>
            <input type="text" name="numero" id="numero" class="input-generic" placeholder="Ex: 438">

            <label for="bairro" class="label-generic">Bairro:</label>
            <input type="text" name="bairro" id="bairro" class="input-generic" placeholder="Ex: JD. Gregório Antunes">

            <label for="cidade" class="label-generic">Cidade:</label>
            <input type="text" name="cidade" id="cidade" class="input-generic" placeholder="Ex: Olímpia">

            <label for="estado" class="label-generic">Estado:</label>
            <input type="text" name="estado" id="estado" class="input-generic" placeholder="Ex: São Paulo">

            <label for="cep" class="label-generic">CEP:</label>
            <input type="text" name="cep" id="cep" class="input-generic" placeholder="Ex: 17745-111">

            <label for="telefone" class="label-generic">Telefone:</label>
            <input type="text" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11) 98888-7777">
            <span id="message" class="padding-bottom-20px">Este será o telefone em que clientes próximos desta instalação irão<br>ligar caso exijam alguma informação.</span>

            <label for="horario" class="label-generic">Horário de Funcionamento:</label>
            <textarea name="horario" id="horario" class="textarea-generic"></textarea>
            <div class="form-row">
                <button type="submit" class="btn-generic margin-right-20px">
                    <span>Salvar</span>
                </button>
                <span>Cancelar</span>
            </div>
        </form>
    </section>
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
</div>
