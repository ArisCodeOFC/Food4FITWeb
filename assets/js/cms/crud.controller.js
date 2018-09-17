var urlsBase = {
    insert: "",
    get: "",
    delete: "",
    update: "",
    toggle: ""
};

f4fApp.addController("CrudController", function($this, $element) {
    $this.onInit = function(parentController, urls) {
        $this.parentController = parentController;
        $this.formInstance = $element.find("[data-crud-form]");
        $this.listInstance = $element.find("[data-crud-list]");
        $this.setup();
        $this.urls = $.extend({}, urlsBase, urls);
    };

    $this.setup = function() {
        $element.find("[data-sceditor]").each(function() {
            if (!$(this).data("sceditor-instance")) {
                var instance = $(this).sceditor({
                    format: "xhtml",
                    style: "../assets/public/css/sceditor.default.min.css",
                    emoticons: {},
                    toolbarExclude: "emoticon,youtube,print,maximize,source,table,quote,code",
                    dateFormat: "day/month/year",
                    resizeEnabled: false
                }).sceditor("instance");

                $(this).data("sceditor-instance", instance);
            }
        });

        $element.find("[data-imagem-upload] input").on("change", $this.uploadImage);
        $element.find("[data-form-submit]").on("click", $this.submitForm);
        $element.find("[data-form-cancel]").on("click", $this.cancelForm);
        $this.formInstance.on("submit", $this.onFormSubmit);
        $this.listInstance.on("click", ".editar", $this.edit);
        $this.listInstance.on("click", ".toggle", $this.toggleStatus);
        $this.listInstance.on("click", ".excluir", $this.delete);
    };

    $this.uploadImage = function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var parent = $(this).parent();
            reader.onload = function(event) {
                parent.find("img").attr("src", event.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    };

    $this.submitForm = function() {
        $element
            .find("input[type='submit']")
            .trigger("click");
    };

    $this.cancelForm = function() {
        $this.resetForm();
        $this.onFormCancel();
    };

    $this.resetForm = function() {
        $this.formInstance.get(0).reset();
        $this.formInstance
            .find("[data-sceditor]")
            .data("sceditor-instance")
            .setWysiwygEditorValue("");
        $this.formInstance
            .find("[data-imagem-upload] img")
            .removeAttr("src");
        $this.formInstance.removeData("object");
    };

    $this.buildUrl = function(url, object) {
        var regex = /{(.*?)}/g;
        var matches = [];
        while (matches = regex.exec(url)) {
            var param = matches[1];
            if (object[param]) {
                url = url.replace("{" + param + "}", object[param]);
            }
        }

        return url;
    }

    $this.buildUrlFromData = function(url, data) {
        var object = {};
        for (var key in data) {
            if (key.startsWith("param")) {
                object[$.camelCase(key.replace("param", "").toLowerCase())] = data[key];
            }
        }

        return $this.buildUrl(url, object);
    }

    $this.onFormSubmit = function(event) {
        event.preventDefault();
        if ($this.parentController.onFormSubmit) {
            $this.parentController.onFormSubmit(this);
        } else {
            $this._onFormSubmit(this);
        }
    };

    $this.edit = function() {
        if ($this.parentController.edit) {
            $this.parentController.edit(this);
        } else {
            $this._edit(this);
        }
    };

    $this.toggleStatus = function() {
        if ($this.parentController.toggleStatus) {
            $this.parentController.toggleStatus(this);
        } else {
            $this._toggleStatus(this);
        }
    };

    $this.delete = function() {
        if ($this.parentController.delete) {
            $this.parentController.delete(this);
        } else {
            $this._delete(this);
        }
    };

    $this.onFormCancel = function() {
        return $this.parentController.onFormCancel && $this.parentController.onFormCancel();
    };

    $this.buildTemplate = function(item) {
        return $this.parentController.buildTemplate && $this.parentController.buildTemplate(item) || "";
    };

    $this.onInsert = function() {
        return $this.parentController.onInsert && $this.parentController.onInsert();
    };

    $this.onUpdate = function() {
        return $this.parentController.onUpdate && $this.parentController.onUpdate();
    };

    $this.onEditStarted = function() {
        return $this.parentController.onEditStarted && $this.parentController.onEditStarted();
    };

    $this.onToggleStatus = function(isDisable) {
        return $this.parentController.onToggleStatus && $this.parentController.onToggleStatus(isDisable);
    };

    $this.onDelete = function() {
        return $this.parentController.onDelete && $this.parentController.onDelete();
    };

    $this.validateForm = function(data) {
        return $this.parentController.validateForm ? $this.parentController.validateForm(data) : true;
    };

    $this._onFormSubmit = function(context) {
        var formData = f4fApp.formToObject($this.formInstance.serializeArray());

        $this.formInstance.find("[data-imagem-upload]").each(function() {
            var input = $(this).find("input")[0];
            if (input.files && input.files[0]) {
                var file = input.files[0];
                formData[$(input).attr("name")] = {
                    fileName: file.name,
                    fileSize: file.size,
                    fileType: file.type,
                    fileData: $(this).find("img").attr("src")
                }
            }
        });

        var url = $this.urls.insert;
        var isUpdate = false;
        if ($this.formInstance.data("object")) {
            formData = $.extend($this.formInstance.data("object"), formData);
            url = $this.buildUrl($this.urls.update, formData);
            isUpdate = true;
        }

        if ($this.validateForm(formData)) {
            $.ajax({
                type: isUpdate ? "PUT" : "POST",
                url: url,
                data: JSON.stringify(formData),
                success: function(item) {
                    $this.resetForm();
                    var template = $this.buildTemplate(item || formData);
                    if (isUpdate) {
                        $this.listInstance
                            .find(".linha[data-param-id='" + formData.id + "']")
                            .replaceWith(template);
                        $this.onUpdate();
                    } else {
                        $this.listInstance.append(template);
                        $this.onInsert();
                    }
                },

                error: function(error) {
                    f4fApp.abrirToast(error.responseJSON.result);
                }
            });
        }
    };

    $this._edit = function(context) {
        var url = $this.buildUrlFromData($this.urls.get, $(context).parent().parent().data());
        $.ajax({
            type: "GET",
            url: url,
            success: function(item) {
                for (var key in item) {
                    var element = $this.formInstance.find("[name='" + key + "'], [data-bind='" + key + "']");
                    if (element.is("[data-sceditor]")) {
                        element.data("sceditor-instance").setWysiwygEditorValue(item[key]);
                    } else if (element.is("[data-imagem-upload]")) {
                        element.find("img").attr("src", "../" + item[key]);
                    } else {
                        element.val(item[key]);
                    }
                }

                $this.formInstance.data("object", item);
                $this.onEditStarted();
            },

            error: function(error) {
                f4fApp.abrirToast(error.responseJSON.result);
            }
        });
    };

    $this._toggleStatus = function(context) {
        var button = $(context);
        var url = $this.buildUrlFromData($this.urls.toggle, button.parent().parent().data());
        $.ajax({
            type: "PUT",
            url: url,
            success: function() {
                button.toggleClass("ativar").toggleClass("desativar");
                $this.onToggleStatus(button.hasClass("ativar"));
            },

            error: function(error) {
                f4fApp.abrirToast(error.responseJSON.result);
            }
        });
    };

    $this._delete = function(context) {
        f4fApp.showModal("Exclusão", "Deseja realmente excluir este item?", function() {
            var id = $(context).parent().parent().data("param-id");
            var url = $this.buildUrlFromData($this.listInstance.data($this.urls.delete), $(context).parent().parent().data());
            $.ajax({
                type: "DELETE",
                url: url,
                success: function() {
                    $this.listInstance
                        .find(".linha[data-param-id='" + id + "']")
                        .remove();
                    $this.onDelete();
                },

                error: function(error) {
                    f4fApp.abrirToast(error.responseJSON.result);
                }
            });
        });
    };
});
