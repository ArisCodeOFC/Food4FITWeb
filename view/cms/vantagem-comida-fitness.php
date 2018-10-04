<div data-crud-controller>
    <div class="saude-wrapper display-none" data-form-content>
        <div class="saude-content form-generic">
            <h2 class="padding-top-30px padding-bottom-30px">VANTAGENS DA COMIDA FITNESS - PUBLICAÇÕES</h2>
            <form action="#" class="form-generic-content padding-left-15px padding-right-15px padding-bottom-15px padding-top-15px">
                <div class="form-column">
                    <label for="titulo" class="label-generic">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="input-generic">
                </div>
                <label for="chkdish">Status:</label>
                <div class="switch_box margin-bottom-15px">
                    <input type="checkbox" name="ativo" class="switch-styled">
                </div>
                <div class="form-column">
                    <label for="texto">Texto:</label>
                    <textarea name="texto" id="texto" class="textarea-generic height-800px" data-sceditor></textarea>
                </div>
                <div class="form-row">
                    <span class="margin-right-20px">Cancelar</span>
                    <div class="btn-generic margin-right-30px">
                        <span>Salvar</span>
                    </div>
                </div>
            </form>
        </div>
        <aside class="publications-aside">
            <h2 class="padding-bottom-10px">Mais Lidas</h2>
            <?php
                for($i = 1; $i < 10; $i++){
            ?>
            <div class="publications-card">
                <h2>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>
                <p>André Sanchez</p>
                <span>01/01/2018</span>
            </div>
            <?php
                }
            ?>
        </aside>
    </div>
</div>
