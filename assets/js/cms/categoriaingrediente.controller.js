f4fApp.addController("CategoriaIngredienteController", function($this, $element) {
    $this.onInit = function() {
        var crudController = f4fApp.buildCrud($element.find("[data-crud-controller]"));
        if (crudController) {
            crudController.onInit($this, {
                insert: "../api/v1/categoria-ingrediente",
                get: "../api/v1/categoria-ingrediente/{id}",
                delete: "../api/v1/categoria-ingrediente/{id}",
                update: "../api/v1/categoria-ingrediente/{id}",
                toggle: "../api/v1/categoria-ingrediente/{id}/ativar"
            });
        }
    };

    $this.buildTemplate = function(categoria) {
        var linha = $("<div class='linha'>").attr("data-param-id", categoria.id);

        $("<div class='coluna image-small'>")
            .append($("<img>").attr("src", "../" + categoria.foto).attr("alt", categoria.titulo))
            .appendTo(linha);

        $("<div class='coluna middle-left-align'>")
            .append($("<span>").text(categoria.titulo))
            .appendTo(linha);

        $("<div class='coluna'>")
            .append($("<span class='toggle'>").addClass(checkBoolean(categoria.ativo) ? "desativar" : "ativar"))
            .append($("<hr>"))
            .append($("<span class='editar'>"))
            .append($("<hr>"))
            .append($("<span class='excluir'>"))
            .appendTo(linha);

        return linha;
    };

    $this.onInsert = function() {
        f4fApp.abrirToast("Categoria inserida com sucesso.");
    };

    $this.onUpdate = function() {
        f4fApp.abrirToast("Categoria atualizada com sucesso.");
        $element.find("#titulo-acao").text("Cadastrar uma Categoria");
    };

    $this.onEditStarted = function() {
        $element.find("#titulo-acao").text("Editar Categoria");
    };

    $this.onToggleStatus = function(isDisable) {
        f4fApp.abrirToast("Categoria " + (isDisable ? "desativada" : "ativada") + " com sucesso.");
    };

    $this.onDelete = function() {
        f4fApp.abrirToast("Categoria excluída com sucesso.");
    };

    $this.validateForm = function(data) {
        if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    };
});
