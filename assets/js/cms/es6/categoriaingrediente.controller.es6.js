class CategoriaIngredienteController {
    constructor(element) {
        this.element = element;
        this.CRUD_SERVICE = {
            insert: "../api/v1/categoria-ingrediente",
            get: "../api/v1/categoria-ingrediente/{id}",
            delete: "../api/v1/categoria-ingrediente/{id}",
            update: "../api/v1/categoria-ingrediente/{id}",
            toggle: "../api/v1/categoria-ingrediente/{id}/ativar"
        };
    }

    init() {
        const crudController = f4fApp.buildCrud(this.element.find("[data-crud-controller]"));
        if (crudController && crudController.init) {
            crudController.init(this, this.CRUD_SERVICE);
        }
    }

    buildTemplate(categoria) {
        const linha = $("<div class='linha'>").attr("data-param-id", categoria.id);

        $("<div class='coluna image-small'>")
            .append($("<img>").attr("src", "../" + categoria.foto).attr("alt", categoria.titulo))
            .appendTo(linha);

        $("<div class='coluna middle-left-align'>")
            .append($("<span>").text(categoria.titulo))
            .appendTo(linha);

        $("<div class='coluna'>")
            .append($("<span class='toggle'>").addClass(parseInt(categoria.ativo) ? "desativar" : "ativar"))
            .append($("<hr>"))
            .append($("<span class='editar'>"))
            .append($("<hr>"))
            .append($("<span class='excluir'>"))
            .appendTo(linha);

        return linha;
    }

    validateForm(data) {
        if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    }

    onInsert() {
        f4fApp.abrirToast("Categoria inserida com sucesso.");
    }

    onUpdate() {
        f4fApp.abrirToast("Categoria atualizada com sucesso.");
        this.element.find("#titulo-acao").text("Cadastrar uma Categoria");
    }

    onToggleStatus(isDisable) {
        f4fApp.abrirToast("Categoria " + (isDisable ? "desativada" : "ativada") + " com sucesso.");
    }

    onDelete() {
        f4fApp.abrirToast("Categoria excluída com sucesso.");
    }

    onEditStarted() {
        this.element.find("#titulo-acao").text("Editar Categoria");
    }
}

f4fApp.addController("CategoriaIngredienteController", CategoriaIngredienteController);
