f4fApp.addController("SobreEmpresaController", function($this, $element) {
    $this.onInit = function() {
        var crudController = f4fApp.buildCrud($element.find("[data-crud-controller]"));
        if (crudController) {
            crudController.onInit($this, {
                insert: "../api/v1/sobre-nos",
                get: "../api/v1/sobre-nos/{id}",
                delete: "../api/v1/sobre-nos/{id}",
                update: "../api/v1/sobre-nos/{id}",
                toggle: "../api/v1/sobre-nos/{id}/ativar"
            });
        }

        $element.find("#tabs [data-for]").on("click", $this.changeTab);
    };

    $this.changeTab = function() {
        var target = $(this).data("for");
        $this.openTab(target);
    };

    $this.openTab = function(target) {
        $element
            .find("#tabs-content>*")
            .removeClass("active")
            .filter(target)
            .addClass("active");

        $element
            .find("#tabs span[data-for='" + target + "']")
            .addClass("active")
            .siblings()
            .removeClass("active");
    };

    $this.buildTemplate = function(item) {
        var linha = $("<div class='linha'>").attr("data-param-id", item.id);

        $("<div class='coluna image-large'>")
            .append($("<img>").attr("src", "../" + item.foto).attr("alt", item.titulo))
            .appendTo(linha);

        $("<div class='coluna middle-align medium'>")
            .append($("<span>").text(item.titulo))
            .appendTo(linha);

        $("<div class='coluna descricao large'>")
            .append($("<div>").text($(item.texto).text()))
            .appendTo(linha);

        $("<div class='coluna'>")
            .append($("<span class='toggle'>").addClass(checkBoolean(item.ativo) ? "desativar" : "ativar"))
            .append($("<hr>"))
            .append($("<span class='editar'>"))
            .append($("<hr>"))
            .append($("<span class='excluir'>"))
            .appendTo(linha);

        return linha;
    };

    $this.onFormCancel = function() {
        $element.find("[data-for='#container-form']").text("Adicionar Bloco");
        $this.openTab("#container-listagem");
    };

    $this.onInsert = function() {
        f4fApp.abrirToast("Item inserido com sucesso.");
        $this.openTab("#container-listagem");
    };

    $this.onUpdate = function() {
        f4fApp.abrirToast("Item atualizado com sucesso.");
        $element.find("[data-for='#container-form']").text("Adicionar Bloco");
        $this.openTab("#container-listagem");
    };

    $this.onEditStarted = function() {
        $element.find("[data-for='#container-form']").text("Editar Bloco");
        $this.openTab("#container-form");
    };

    $this.onToggleStatus = function(isDisable) {
        f4fApp.abrirToast("Item " + (isDisable ? "desativado" : "ativado") + " com sucesso.");
    };

    $this.onDelete = function() {
        f4fApp.abrirToast("Item excluído com sucesso.");
    };

    $this.validateForm = function(data) {
        if (!data.texto) {
            f4fApp.abrirToast("O texto não pode ficar vazio.");
            return false;
        } else if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    };
});
