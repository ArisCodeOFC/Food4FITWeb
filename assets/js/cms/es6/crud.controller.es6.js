class CrudController {
    constructor(element) {
        this.element = element;
        this.CRUD_SERVICE = {
            list: "",
            insert: "",
            get: "",
            delete: "",
            update: "",
            toggle: ""
        };
    }

    init(parentController, urls) {
        this.parentController = parentController;
        this.formInstance = this.element.find("[data-crud-form]");
        this.listInstance = this.element.find("[data-crud-list]");
        this.CRUD_SERVICE = $.extend({}, this.CRUD_SERVICE, urls);
        this.setup();
        $.applyDataMask();
    }

    setup() {
        this.element.find("[data-sceditor]").each((index, element) => {
            if (!$(element).data("sceditor-instance")) {
                const instance = $(element).sceditor({
                    format: "xhtml",
                    style: "../assets/public/css/sceditor.default.min.css",
                    emoticons: {},
                    toolbarExclude: "emoticon,youtube,print,maximize,source,table,quote,code",
                    dateFormat: "day/month/year",
                    resizeEnabled: false
                }).sceditor("instance");

                $(element).data("sceditor-instance", instance);
            }
        });

        this.element.find("[data-imagem-upload] input").on("change", this.uploadImage.bind(this));
        this.element.find("[data-form-submit]").on("click", this.submitForm.bind(this));
        this.element.find("[data-form-cancel]").on("click", this.cancelForm.bind(this));
        this.element.find("[data-list-reload]").on("click", this.reload.bind(this));
        this.formInstance.on("submit", this.onFormSubmit.bind(this));
        this.listInstance.on("click", ".editar", this.edit.bind(this));
        this.listInstance.on("click", ".toggle", this.toggleStatus.bind(this));
        this.listInstance.on("click", ".excluir", this.delete.bind(this));
    }

    uploadImage(event) {
        const target = event.target;
        if (target.files && target.files[0]) {
            const reader = new FileReader();
            const parent = $(target).parent();
            reader.onload = e => parent.find("img").attr("src", e.target.result);
            reader.readAsDataURL(target.files[0]);
        }
    }

    submitForm() {
        this.element
            .find("input[type='submit']")
            .trigger("click");
    }

    cancelForm() {
        this.resetForm();
        this.onFormCancel();
    }

    resetForm() {
        this.formInstance.get(0).reset();
        let sceditor = this.formInstance
            .find("[data-sceditor]")
            .data("sceditor-instance");
        sceditor && sceditor.setWysiwygEditorValue("");
        this.formInstance
            .find("[data-imagem-upload] img")
            .removeAttr("src");
        this.formInstance.removeData("object");
    }

    buildUrl(url, object) {
        const regex = /{(.*?)}/g;
        let matches = [];
        while (matches = regex.exec(url)) {
            const param = matches[1];
            if (object[param]) {
                url = url.replace(`{${param}}`, object[param]);
            }
        }

        return url;
    }

    buildUrlFromData(url, data) {
        const object = {};
        for (let key in data) {
            if (key.startsWith("param")) {
                object[$.camelCase(key.replace("param", "").toLowerCase())] = data[key];
            }
        }

        return this.buildUrl(url, object);
    }

    onFormCancel() {
        return this.parentController.onFormCancel && this.parentController.onFormCancel();
    }

    buildTemplate(item) {
        return this.parentController.buildTemplate && this.parentController.buildTemplate(item) || "";
    }

    onInsert() {
        return this.parentController.onInsert && this.parentController.onInsert();
    }

    onUpdate() {
        return this.parentController.onUpdate && this.parentController.onUpdate();
    }

    onEditStarted() {
        return this.parentController.onEditStarted && this.parentController.onEditStarted();
    }

    onToggleStatus(isDisable) {
        return this.parentController.onToggleStatus && this.parentController.onToggleStatus(isDisable);
    }

    onDelete() {
        return this.parentController.onDelete && this.parentController.onDelete();
    }

    validateForm(data) {
        return this.parentController.validateForm ? this.parentController.validateForm(data) : true;
    }

    onFormSubmit(event) {
        event.preventDefault();
        if (this.parentController.onFormSubmit) {
            this.parentController.onFormSubmit(event.target);
        } else {
            this._onFormSubmit(event.target);
        }
    }

    edit() {
        if (this.parentController.edit) {
            this.parentController.edit(event.target);
        } else {
            this._edit(event.target);
        }
    }

    toggleStatus() {
        if (this.parentController.toggleStatus) {
            this.parentController.toggleStatus(event.target);
        } else {
            this._toggleStatus(event.target);
        }
    }

    delete() {
        if (this.parentController.delete) {
            this.parentController.delete(event.target);
        } else {
            this._delete(event.target);
        }
    }

    reload(event) {
        event.preventDefault();
        if (this.parentController.reload) {
            this.parentController.reload(event.target);
        } else {
            this._reload(event.target);
        }
    }

    _onFormSubmit(context) {
        let formData = formToObject(this.formInstance.serializeArray());
        this.formInstance
            .find("input[type=checkbox]:not(:checked)")
            .map((index, input) => input.name)
            .get()
            .forEach(name => {
                formData[name] = "0";
            });

        this.formInstance.find("[data-money-format]").each((index, element) => {
            formData[element.name] = element.value.replace(/\./g, "").replace(/,/g, ".");
        });

        this.formInstance.find("[data-imagem-upload]").each((index, element) => {
            const input = $(element).find("input").get(0);
            if (input.files && input.files[0]) {
                const file = input.files[0];
                formData[$(input).attr("name")] = {
                    fileName: file.name,
                    fileSize: file.size,
                    fileType: file.type,
                    fileData: $(element).find("img").attr("src")
                };
            }
        });

        let url = this.CRUD_SERVICE.insert;
        let isUpdate = false;
        if (this.formInstance.data("object")) {
            formData = $.extend(true, {}, this.formInstance.data("object"), formData);
            url = this.buildUrl(this.CRUD_SERVICE.update, formData);
            isUpdate = true;
        }

        if (this.validateForm(formData)) {
            $.ajax({
                type: isUpdate ? "PUT" : "POST",
                url: url,
                data: JSON.stringify(formData),
                success: item => {
                    this.resetForm();
                    const template = this.buildTemplate(item || formData);
                    if (isUpdate) {
                        this.listInstance
                            .find(`.linha[data-param-id='${formData.id}']`)
                            .replaceWith(template);
                        this.onUpdate();
                    } else {
                        this.listInstance.find(".linha").first().after(template);
                        this.onInsert();
                    }
                },

                error: error => {
                    f4fApp.abrirToast(error.responseJSON.result);
                }
            });
        }
    }

    _edit(context) {
        const url = this.buildUrlFromData(this.CRUD_SERVICE.get, $(context).parent().parent().data());
        $.ajax({
            type: "GET",
            url: url,
            success: item => {
                const itemIterator = convertObject(item);
                for (let key in itemIterator) {
                    const element = this.formInstance.find(`[name='${key}'], [data-bind='${key}']`);
                    if (element.is("[data-sceditor]")) {
                        element.data("sceditor-instance").setWysiwygEditorValue(itemIterator[key]);
                    } else if (element.is("[data-imagem-upload]")) {
                        element.find("img").attr("src", "../" + itemIterator[key]);
                    } else if (element.is(":checkbox")) {
                        element.prop("checked", !!itemIterator[key]);
                    } else {
                        element.val(itemIterator[key]);
                    }
                }

                this.formInstance.data("object", item);
                this.onEditStarted();
                this.formInstance.find("[data-mask]").trigger("input");
            },

            error: error => {
                f4fApp.abrirToast(error.responseJSON.result);
            }
        });
    }

    _toggleStatus(context) {
        const url = this.buildUrlFromData(this.CRUD_SERVICE.toggle, $(context).parent().parent().data());
        $.ajax({
            type: "PUT",
            url: url,
            success: () => {
                $(context).toggleClass("ativar").toggleClass("desativar");
                this.onToggleStatus($(context).hasClass("ativar"));
            },

            error: error => {
                f4fApp.abrirToast(error.responseJSON.result);
            }
        });
    }

    _delete(context) {
        f4fApp.showModal("Exclusão", "Deseja realmente excluir este item?", () => {
            const id = $(context).parent().parent().data("param-id");
            const url = this.buildUrlFromData(this.CRUD_SERVICE.delete, $(context).parent().parent().data());
            $.ajax({
                type: "DELETE",
                url: url,
                success: () => {
                    this.listInstance
                        .find(`.linha[data-param-id='${id}']`)
                        .remove();
                    this.onDelete();

                    if (this.formInstance.data("object") && this.formInstance.data("object").id == id) {
                        this.cancelForm();
                    }
                },

                error: error => {
                    f4fApp.abrirToast(error.responseJSON.result);
                }
            });
        });
    }

    _reload(context) {
        $.ajax({
            type: "GET",
            url: this.CRUD_SERVICE.list,
            success: items => {
                this.listInstance.find(".linha:not(:first)").remove();
                items.forEach(item => {
                    const template = this.buildTemplate(item);
                    this.listInstance.append(template);
                });
            },

            error: error => {
                f4fApp.abrirToast(error.responseJSON.result);
            }
        });
    }
}

f4fApp.addController("CrudController", CrudController);
