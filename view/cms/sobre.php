<?php
    require_once("../../controller/SobreNosController.class.php");
    $itens = SobreNosController::listar();
?>

<div data-crud-controller>
    <div id="tabs">
        <span data-for="#container-form">Adicionar Bloco</span>
        <span class="active" data-for="#container-listagem">Listar Blocos</span>
    </div>
    <div id="tabs-content">
        <div id="container-form">
            <div class="form-generic">
                <form id="form-sobre-nos" class="form-generic-content" data-crud-form>
                    <label for="titulo" class="label-generic">Título</label>
                    <input id="titulo" name="titulo" class="input-generic" required maxlength="255">

                    <label for="texto" class="label-generic">Texto</label>
                    <textarea id="texto" name="texto" class="textarea-generic" data-sceditor></textarea>

                    <span class="label-generic">Imagem</span>
                    <div class="imagem-upload-wrapper" data-imagem-upload data-bind="imagem">
                        <div>
                            <img alt="">
                        </div>
                        <label for="imagem" class="label-generic">Selecione um arquivo...</label>
                        <input id="imagem" name="uploadData" type="file" accept="image/*">
                    </div>

                    <input type="submit" name="submit">
                </form>
                <div class="controls">
                    <span class="cancel" data-form-cancel>Cancelar</span>
                    <div class="btn-generic">
                        <span data-form-submit>Enviar</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="active" id="container-listagem">
            <div id="tabela-items" data-crud-list>
                <div class="linha">
                    <div class="coluna">Imagem</div>
                    <div class="coluna titulo">Título</div>
                    <div class="coluna descricao">Descrição</div>
                    <div class="coluna">Opções</div>
                </div>
                <?php foreach ($itens as $item) { ?>
                    <div class="linha" data-param-id="<?= $item->id ?>">
                        <div class="coluna">
                            <img src="../<?= $item->imagem ?>" alt="<?= $item->titulo ?>">
                        </div>
                        <div class="coluna titulo"><span><?= $item->titulo ?></span></div>
                        <div class="coluna descricao">
                            <div>
                                <?= strip_tags($item->texto) ?>
                            </div>
                        </div>
                        <div class="coluna">
                            <span class="toggle <?= $item->ativo ? "desativar" : "ativar" ?>"></span><hr>
                            <span class="editar"></span><hr>
                            <span class="excluir"></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
