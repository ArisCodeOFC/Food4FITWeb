class IngredienteController {
    constructor(element) {
        this.element = element;
        this.CRUD_SERVICE = {
            list: "../api/v1/ingrediente",
            insert: "../api/v1/ingrediente",
            get: "../api/v1/ingrediente/{id}",
            delete: "../api/v1/ingrediente/{id}",
            update: "../api/v1/ingrediente/{id}",
            toggle: "../api/v1/ingrediente/{id}/ativar"
        };
    }

    init() {
        const crudController = f4fApp.buildCrud(this.element.find("[data-crud-controller]"));
        if (crudController && crudController.init) {
            crudController.init(this, this.CRUD_SERVICE);
        }

        this.element.find("#btn-adicionar-ingrediente").on("click", this.showForm.bind(this));
    }

    buildTemplate(ingrediente) {
        const linha = $("<div class='linha'>").attr("data-param-id", ingrediente.id);

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
            .append($("<span class='toggle'>").addClass(parseInt(ingrediente.ativo) ? "desativar" : "ativar"))
            .append($("<hr>"))
            .append($("<span class='editar'>"))
            .append($("<hr>"))
            .append($("<span class='excluir'>"))
            .appendTo(linha);

        return linha;
    }

    showForm(event) {
        if (event) {
            event.preventDefault();
        }

        this.element.find("#form-content").removeClass("display-none");
        this.element.find("#list-content").addClass("display-none");
    }

    showList() {
        this.element.find("#form-content").addClass("display-none");
        this.element.find("#list-content").removeClass("display-none");
    }

    validateForm(data) {
        if (!data.descricao) {
            f4fApp.abrirToast("A descrição não pode ficar vazia.");
            return false;
        } else if (!data.uploadData && !data.foto) {
            f4fApp.abrirToast("Selecione uma imagem.");
            return false;
        }

        return true;
    }

    onEditStarted() {
        this.showForm();
    }

    onInsert() {
        f4fApp.abrirToast("Ingrediente inserido com sucesso.");
        this.showList();
    }

    onUpdate() {
        f4fApp.abrirToast("Ingrediente atualizado com sucesso.");
        this.showList();
    }

    onToggleStatus(isDisable) {
        f4fApp.abrirToast("Ingrediente " + (isDisable ? "desativado" : "ativado") + " com sucesso.");
    }

    onDelete() {
        f4fApp.abrirToast("Ingrediente excluído com sucesso.");
    }
}

f4fApp.addController("IngredienteController", IngredienteController);
