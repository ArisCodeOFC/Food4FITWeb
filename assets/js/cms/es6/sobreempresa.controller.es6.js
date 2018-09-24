class SobreEmpresaController {
    constructor(element) {
        this.element = element;
        this.CRUD_SERVICE = {
            insert: "../api/v1/sobre-nos",
            get: "../api/v1/sobre-nos/{id}",
            delete: "../api/v1/sobre-nos/{id}",
            update: "../api/v1/sobre-nos/{id}",
            toggle: "../api/v1/sobre-nos/{id}/ativar"
        };
    }

    init() {
        const crudController = f4fApp.buildCrud(this.element.find("[data-crud-controller]"));
        if (crudController && crudController.init) {
            crudController.init(this, this.CRUD_SERVICE);
        }

        this.element.find("#tabs [data-for]").on("click", this.changeTab.bind(this));
    }

    changeTab(event) {
        var target = $(event.currentTarget).data("for");
        this.openTab(target);
    }

    openTab(target) {
        this.element
            .find("#tabs-content>*")
            .removeClass("active")
            .filter(target)
            .addClass("active");

        this.element
            .find(`#tabs span[data-for='${target}']`)
            .addClass("active")
            .siblings()
            .removeClass("active");
    }

    buildTemplate(item) {
        const linha = $("<div class='linha'>").attr("data-param-id", item.id);

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
    }

    onFormCancel() {
        this.element.find("[data-for='#container-form']").text("Adicionar Bloco");
        this.openTab("#container-listagem");
    }

    onInsert() {
        f4fApp.abrirToast("Item inserido com sucesso.");
        this.openTab("#container-listagem");
    }

    onUpdate() {
        f4fApp.abrirToast("Item atualizado com sucesso.");
        this.element.find("[data-for='#container-form']").text("Adicionar Bloco");
        this.openTab("#container-listagem");
    }

    onEditStarted() {
        this.element.find("[data-for='#container-form']").text("Editar Bloco");
        this.openTab("#container-form");
    }

    onToggleStatus(isDisable) {
        f4fApp.abrirToast("Item " + (isDisable ? "desativado" : "ativado") + " com sucesso.");
    }

    onDelete() {
        f4fApp.abrirToast("Item excluído com sucesso.");
    }

    validateForm(data) {
        if (!data.texto) {
            f4fApp.abrirToast("O texto não pode ficar vazio.");
            return false;
        } else if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    }
}

f4fApp.addController("SobreEmpresaController", SobreEmpresaController);
