/* Generated by Babel */
"use strict";

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var CrudController = (function () {
    function CrudController(element) {
        _classCallCheck(this, CrudController);

        this.element = element;
        this.CRUD_SERVICE = {
            list: "",
            insert: "",
            get: "",
            "delete": "",
            update: "",
            toggle: ""
        };
    }

    _createClass(CrudController, [{
        key: "init",
        value: function init(parentController, urls) {
            this.parentController = parentController;
            this.formInstance = this.element.find("[data-crud-form]");
            this.listInstance = this.element.find("[data-crud-list]");
            this.CRUD_SERVICE = $.extend({}, this.CRUD_SERVICE, urls);
            this.setup();
            $.applyDataMask();
        }
    }, {
        key: "setup",
        value: function setup() {
            this.element.find("[data-sceditor]").each(function (index, element) {
                if (!$(element).data("sceditor-instance")) {
                    var instance = $(element).sceditor({
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
            this.listInstance.on("click", ".excluir", this["delete"].bind(this));
        }
    }, {
        key: "uploadImage",
        value: function uploadImage(event) {
            var target = event.target;
            if (target.files && target.files[0]) {
                (function () {
                    var reader = new FileReader();
                    var parent = $(target).parent();
                    reader.onload = function (e) {
                        return parent.find("img").attr("src", e.target.result);
                    };
                    reader.readAsDataURL(target.files[0]);
                })();
            }
        }
    }, {
        key: "submitForm",
        value: function submitForm() {
            this.element.find("input[type='submit']").trigger("click");
        }
    }, {
        key: "cancelForm",
        value: function cancelForm() {
            this.resetForm();
            this.onFormCancel();
        }
    }, {
        key: "resetForm",
        value: function resetForm() {
            this.formInstance.get(0).reset();
            var sceditor = this.formInstance.find("[data-sceditor]").data("sceditor-instance");
            sceditor && sceditor.setWysiwygEditorValue("");
            this.formInstance.find("[data-imagem-upload] img").removeAttr("src");
            this.formInstance.removeData("object");
        }
    }, {
        key: "buildUrl",
        value: function buildUrl(url, object) {
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
    }, {
        key: "buildUrlFromData",
        value: function buildUrlFromData(url, data) {
            var object = {};
            for (var key in data) {
                if (key.startsWith("param")) {
                    object[$.camelCase(key.replace("param", "").toLowerCase())] = data[key];
                }
            }

            return this.buildUrl(url, object);
        }
    }, {
        key: "onFormCancel",
        value: function onFormCancel() {
            return this.parentController.onFormCancel && this.parentController.onFormCancel();
        }
    }, {
        key: "buildTemplate",
        value: function buildTemplate(item) {
            return this.parentController.buildTemplate && this.parentController.buildTemplate(item) || "";
        }
    }, {
        key: "onInsert",
        value: function onInsert() {
            return this.parentController.onInsert && this.parentController.onInsert();
        }
    }, {
        key: "onUpdate",
        value: function onUpdate() {
            return this.parentController.onUpdate && this.parentController.onUpdate();
        }
    }, {
        key: "onEditStarted",
        value: function onEditStarted() {
            return this.parentController.onEditStarted && this.parentController.onEditStarted();
        }
    }, {
        key: "onToggleStatus",
        value: function onToggleStatus(isDisable) {
            return this.parentController.onToggleStatus && this.parentController.onToggleStatus(isDisable);
        }
    }, {
        key: "onDelete",
        value: function onDelete() {
            return this.parentController.onDelete && this.parentController.onDelete();
        }
    }, {
        key: "validateForm",
        value: function validateForm(data) {
            return this.parentController.validateForm ? this.parentController.validateForm(data) : true;
        }
    }, {
        key: "onFormSubmit",
        value: function onFormSubmit(event) {
            event.preventDefault();
            if (this.parentController.onFormSubmit) {
                this.parentController.onFormSubmit(event.target);
            } else {
                this._onFormSubmit(event.target);
            }
        }
    }, {
        key: "edit",
        value: function edit() {
            if (this.parentController.edit) {
                this.parentController.edit(event.target);
            } else {
                this._edit(event.target);
            }
        }
    }, {
        key: "toggleStatus",
        value: function toggleStatus() {
            if (this.parentController.toggleStatus) {
                this.parentController.toggleStatus(event.target);
            } else {
                this._toggleStatus(event.target);
            }
        }
    }, {
        key: "delete",
        value: function _delete() {
            if (this.parentController["delete"]) {
                this.parentController["delete"](event.target);
            } else {
                this._delete(event.target);
            }
        }
    }, {
        key: "reload",
        value: function reload(event) {
            event.preventDefault();
            if (this.parentController.reload) {
                this.parentController.reload(event.target);
            } else {
                this._reload(event.target);
            }
        }
    }, {
        key: "_onFormSubmit",
        value: function _onFormSubmit(context) {
            var _this = this;

            var formData = formToObject(this.formInstance.serializeArray());
            this.formInstance.find("input[type=checkbox]:not(:checked)").map(function (index, input) {
                return input.name;
            }).get().forEach(function (name) {
                formData[name] = "0";
            });

            this.formInstance.find("[data-money-format]").each(function (index, element) {
                formData[element.name] = element.value.replace(/\./g, "").replace(/,/g, ".");
            });

            this.formInstance.find("[data-imagem-upload]").each(function (index, element) {
                var input = $(element).find("input").get(0);
                if (input.files && input.files[0]) {
                    var file = input.files[0];
                    formData[$(input).attr("name")] = {
                        fileName: file.name,
                        fileSize: file.size,
                        fileType: file.type,
                        fileData: $(element).find("img").attr("src")
                    };
                }
            });

            var url = this.CRUD_SERVICE.insert;
            var isUpdate = false;
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
                    success: function success(item) {
                        _this.resetForm();
                        var template = _this.buildTemplate(item || formData);
                        if (isUpdate) {
                            _this.listInstance.find(".linha[data-param-id='" + formData.id + "']").replaceWith(template);
                            _this.onUpdate();
                        } else {
                            _this.listInstance.find(".linha").first().after(template);
                            _this.onInsert();
                        }
                    },

                    error: function error(_error) {
                        f4fApp.abrirToast(_error.responseJSON.result);
                    }
                });
            }
        }
    }, {
        key: "_edit",
        value: function _edit(context) {
            var _this2 = this;

            var url = this.buildUrlFromData(this.CRUD_SERVICE.get, $(context).parent().parent().data());
            $.ajax({
                type: "GET",
                url: url,
                success: function success(item) {
                    var itemIterator = convertObject(item);
                    for (var key in itemIterator) {
                        var element = _this2.formInstance.find("[name='" + key + "'], [data-bind='" + key + "']");
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

                    _this2.formInstance.data("object", item);
                    _this2.onEditStarted();
                    _this2.formInstance.find("[data-mask]").trigger("input");
                },

                error: function error(_error2) {
                    f4fApp.abrirToast(_error2.responseJSON.result);
                }
            });
        }
    }, {
        key: "_toggleStatus",
        value: function _toggleStatus(context) {
            var _this3 = this;

            var url = this.buildUrlFromData(this.CRUD_SERVICE.toggle, $(context).parent().parent().data());
            $.ajax({
                type: "PUT",
                url: url,
                success: function success() {
                    $(context).toggleClass("ativar").toggleClass("desativar");
                    _this3.onToggleStatus($(context).hasClass("ativar"));
                },

                error: function error(_error3) {
                    f4fApp.abrirToast(_error3.responseJSON.result);
                }
            });
        }
    }, {
        key: "_delete",
        value: function _delete(context) {
            var _this4 = this;

            f4fApp.showModal("Exclusão", "Deseja realmente excluir este item?", function () {
                var id = $(context).parent().parent().data("param-id");
                var url = _this4.buildUrlFromData(_this4.CRUD_SERVICE["delete"], $(context).parent().parent().data());
                $.ajax({
                    type: "DELETE",
                    url: url,
                    success: function success() {
                        _this4.listInstance.find(".linha[data-param-id='" + id + "']").remove();
                        _this4.onDelete();

                        if (_this4.formInstance.data("object") && _this4.formInstance.data("object").id == id) {
                            _this4.cancelForm();
                        }
                    },

                    error: function error(_error4) {
                        f4fApp.abrirToast(_error4.responseJSON.result);
                    }
                });
            });
        }
    }, {
        key: "_reload",
        value: function _reload(context) {
            var _this5 = this;

            $.ajax({
                type: "GET",
                url: this.CRUD_SERVICE.list,
                success: function success(items) {
                    _this5.listInstance.find(".linha:not(:first)").remove();
                    items.forEach(function (item) {
                        var template = _this5.buildTemplate(item);
                        _this5.listInstance.append(template);
                    });
                },

                error: function error(_error5) {
                    f4fApp.abrirToast(_error5.responseJSON.result);
                }
            });
        }
    }]);

    return CrudController;
})();

f4fApp.addController("CrudController", CrudController);
