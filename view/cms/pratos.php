<div class="pratos-wrapper">
     <div id="page-actions">
        <a href="#" id="btn-adicionar-ingrediente">
            <img src="../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
            <span>Adicionar Ingrediente</span>
        </a>
        <a href="#" data-list-reload>
            <img src="../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
            <span>Recarregar Listagem</span>
        </a>
    </div>
    <div class="generic-grid animate fadeInUp">
            <?php
            for($i=1; $i < 15; $i ++ ){


            ?>
            <div class="generic-card">
                <img src="../assets/images/dishs/img1.jpg" alt="Teste" class="generic-card-img">
                <div class="generic-card-ovy">
                    <span class="card-dish-name margin-bottom-20px">Frango Com Batatas</span>
                    <div class="card-dish-separator margin-bottom-15px"></div>
                    <p class="categoria-prato margin-bottom-30px"><b>Categoria:</b> Alguma Coisa</p>


                    <div class="edit-btns">
                        <img src="../assets/images/icons/edit.svg" alt="Editar Prato">
                        <img src="../assets/images/icons/delete-white.svg" alt="Excluir Prato">
                        <img src="../assets/images/icons/checked-white.svg" alt="">
                    </div>
                    <div class="state-row padding-top-15px">
                        <div class="switch_box margin-right-10px">
                            <input type="checkbox" id="chkdish" name="chkdish" class="switch-styled" data-f4f-chk-reserve>
                        </div>
                        <label for="chkdish">Promoção</label>
                    </div>
                    <span class="avaliacoes-pratos">
                        Ver Avaliações
                    </span>
                </div>
            </div>
            <?php
            }
            ?>
    </div>
</div>
