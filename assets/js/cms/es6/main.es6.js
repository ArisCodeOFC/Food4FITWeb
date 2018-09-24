class Application {
    constructor() {
        this.controllers = [];
    }

    addFunction(name, fn) {
        this[name] = fn;
    }

    addController(name, controller) {
        this.controllers[name] = controller;
    }

    loadController() {
        $("[data-controller]").each((index, element) => {
            if (!$(element).data("controller-instance")) {
                const controllerName = $(element).data("controller");
                const instance = this.setElementController($(element), controllerName);
                if (instance && instance.init) {
                    instance.init();
                }
            }
        });
    }

    setElementController(element, controllerName) {
        if (this.controllers[controllerName] && typeof this.controllers[controllerName] === "function") {
            const instance = new this.controllers[controllerName](element);
            element.data("controller-instance", instance);
            return instance;
        }
    }

    buildCrud(element) {
        return this.setElementController(element, "CrudController");
    }
}

const f4fApp = new Application();
f4fApp.addFunction("abrirToast", mensagem => {
     $.toast({
        text: mensagem,
        loader: false,
        position: {right: "10px", bottom: "10px"},
        showHideTransition: "fade",
        textAlign: "center"
    });
});

f4fApp.addFunction("showModal", (title, text, accept) => {
    const modal = $("[data-modal]");
    modal.find("[data-modal-accept], [data-modal-close]").off();
    modal.find("[data-modal-title]").text(title);
    modal.find("[data-modal-text]").text(text);
    modal.addClass("show");
    modal.find("[data-modal-close]").on("click", function() {
        modal.removeClass("show");
    });

    modal.find("[data-modal-accept]").on("click", function() {
        modal.removeClass("show");
        if (accept && typeof accept === "function") {
            accept();
        }
    });
});

$(function() {
    f4fApp.loadController();
});
