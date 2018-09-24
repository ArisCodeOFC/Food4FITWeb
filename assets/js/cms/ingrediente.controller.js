f4fApp.addController("IngredienteController", function($this, $element) {
    $this.onInit = function() {
        var crudController = f4fApp.buildCrud($element.find("[data-crud-controller]"));
        if (crudController) {
            crudController.onInit($this, {
                list: "../api/v1/ingrediente",
                insert: "../api/v1/ingrediente",
                get: "../api/v1/ingrediente/{id}",
                delete: "../api/v1/ingrediente/{id}",
                update: "../api/v1/ingrediente/{id}",
                toggle: "../api/v1/ingrediente/{id}/ativar"
            });
        }

        $element.find("#btn-adicionar-ingrediente").on("click", $this.showForm);
    };

    $this.buildTemplate = function(ingrediente) {
        var linha = $("<div class='linha'>").attr("data-param-id", ingrediente.id);

        $("<div class='coluna image-small'>")
            .append($("<img>").attr("src", "../" + ingrediente.foto).attr("alt", ingrediente.titulo))
            .appendTo(linha);

        $("<div class='coluna middle-align medium'>")
            .append($("<span>").text(ingrediente.titulo))
            .appendTo(linha);

        $("<div class='coluna middle-align medium'>")
            .append($("<span>").text(ingrediente.categoria.titulo))
            .appendTo(linha);

        $("<div class='coluna descricao large'>")
            .append($("<div>").text($(ingrediente.descricao).text()))
            .appendTo(linha);

        $("<div class='coluna middle-align medium'>")
            .append($("<span>").text("R$ " + moneyFormat(ingrediente.preco)))
            .appendTo(linha);

        $("<div class='coluna'>")
            .append($("<span class='toggle'>").addClass(checkBoolean(ingrediente.ativo) ? "desativar" : "ativar"))
            .append($("<hr>"))
            .append($("<span class='editar'>"))
            .append($("<hr>"))
            .append($("<span class='excluir'>"))
            .appendTo(linha);

        return linha;
    };

    $this.showForm = function(event) {
        if (event) {
            event.preventDefault();
        }

        $element.find("#form-content").removeClass("display-none");
        $element.find("#list-content").addClass("display-none");
    }

    $this.showList = function() {
        $element.find("#form-content").addClass("display-none");
        $element.find("#list-content").removeClass("display-none");
    }

    $this.onInsert = function() {
        f4fApp.abrirToast("Ingrediente inserido com sucesso.");
        $this.showList();
    };

    $this.onUpdate = function() {
        f4fApp.abrirToast("Ingrediente atualizado com sucesso.");
        $this.showList();
    };

    $this.onEditStarted = function() {
        $this.showForm();
    };

    $this.onToggleStatus = function(isDisable) {
        f4fApp.abrirToast("Ingrediente " + (isDisable ? "desativado" : "ativado") + " com sucesso.");
    };

    $this.onDelete = function() {
        f4fApp.abrirToast("Ingrediente excluído com sucesso.");
    };

    $this.validateForm = function(data) {
        if (!data.descricao) {
            f4fApp.abrirToast("A descrição não pode ficar vazia.");
            return false;
        } else if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    };
});
