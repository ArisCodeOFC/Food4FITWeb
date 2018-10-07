<span data-page-controller="DicasSaudeController" data-page-title="Dicas de Saúde"></span>

<div class="saude-wrapper">
	<div class="saude-content form-generic">
		<h2 class="padding-top-30px padding-bottom-30px">DICAS DE SAÚDE - PUBLICAÇÕES</h2>
		<form action="#" class="form-generic-content">
			<h2 class="form-title padding-left-30px">Publicação 'Nome da Publicação'</h2>
			<div class="saude-flex">
				<div class="column2">
					<label for="titulo" class="label-generic">Título:</label>
					<input type="text" name="titulo" id="titulo" class="input-generic">

					<span class="label-generic">Data:</span>
					<div style="display: flex;">
						<input type="text" class="input-generic margin-right-15px" name="dia" id="dia" placeholder="Dia">
						<input type="text" class="input-generic" name="mes" id="mes" placeholder="Mês">
						<input type="text" class="input-generic margin-left-15px" name="ano" id="ano" placeholder="Ano">
					</div>
					<label for="chkdish">Status:</label>
					<div class="switch_box">
                        <input type="checkbox" name="chkdish" class="switch-styled" data-f4f-chk-reserve>
                    </div>
				</div>
				<div class="column1">
					<label for="texto">Texto:</label>
					<textarea name="texto" id="texto" class="textarea-generic height-800px" data-sceditor></textarea>
				</div>
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
