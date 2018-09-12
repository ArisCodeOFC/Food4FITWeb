$(document).ready(function() {
    $(".btn-logout").click(function(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/logout",
            type: "POST",
            success: function() {
                window.location.href = "login.php";
            },
            error: function() {
                abrirToast("Não foi possível efetuar o logout.");
            }
        });
    });

    $("#sidebar-collapse").click(function(event) {
        event.preventDefault();
        $("#sidebar").toggleClass("collapse");
    });

    $("a[data-page-load]").click(function(event) {
        event.preventDefault();
        abrirPagina($(this).data("page-load"));
    });

    $(document).on("mouseenter", "#sidebar.collapse nav a", function() {
        var offset = $(this).offset();
        var texto = $(this)
            .find(".label")
            .contents()
            .get(0).nodeValue;

        $("#tooltip")
            .text(texto)
            .css({top: offset.top + 5, left: offset.left + 50})
            .show();
    });

    $(document).on("mouseleave", "#sidebar.collapse nav a", function() {
        $("#tooltip").hide();
    });

    abrirPagina(location.hash.replace(/[#\/]/g, "") || "dashboard");
});

/* Carrega uma view .php sem recarregar a página */
function abrirPagina(pagina) {
    $.get(pagina + ".php", function(conteudo) {
        $("#page-content").html(conteudo);
        $("#sidebar nav a").removeClass("active");
        var texto = $("#sidebar nav a[data-page-load='" + pagina + "']")
            .addClass("active")
            .find(".label")
            .contents()
            .get(0).nodeValue;

        window.location.hash = "#/" + pagina;
        $("#titulo-pagina").text(texto);
        new CrudService();
    });
}

function CrudService() {
    var crudService = {
        init: function() {
            crudService.instance = $("[data-crud-instance]");
            crudService.formInstance = crudService.instance.find("[data-ajax-form]");
            crudService.tabelaInstance = crudService.instance.find("[data-tabela]");
            crudService.setup();
        },

        setup: function() {
            crudService.instance.find("[data-sceditor]").each(function() {
                if (!$(this).data("sceditor-instance")) {
                    var instance = $(this).sceditor({
                        format: "xhtml",
                        style: "../assets/css/sceditor.default.min.css",
                        emoticons: {},
                        toolbarExclude: "emoticon,youtube,print,maximize,source,table,quote,code",
                        dateFormat: "day/month/year",
                        resizeEnabled: false
                    }).sceditor("instance");

                    $(this).data("sceditor-instance", instance);
                }
            });

            crudService.instance.on("click", "#tabs [data-for]", crudService.changeTab);
            crudService.instance.on("change", "[data-imagem-upload] input", crudService.imageUpload);
            crudService.instance.on("click", "[data-form-submit]", crudService.submitForm);
            crudService.instance.on("click", "[data-form-cancel]", crudService.cancelarForm);
            crudService.formInstance.on("submit", crudService.onFormSubmit);
            crudService.tabelaInstance.on("click", ".editar", crudService.editar);
            crudService.tabelaInstance.on("click", ".toggle", crudService.toggle);
            crudService.tabelaInstance.on("click", ".excluir", crudService.excluir);
        },

        imageUpload: function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                var parent = $(this).parent();
                reader.onload = function(event) {
                    parent
                        .find("img")
                        .attr("src", event.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        },

        changeTab: function() {
            crudService.openTab($(this).data("for"));
        },

        openTab: function(target) {
            crudService.instance
                .find("#tabs-content>*")
                .removeClass("active")
                .filter(target)
                .addClass("active");

            crudService.instance
                .find("#tabs span[data-for='" + target + "']")
                .addClass("active")
                .siblings()
                .removeClass("active");
        },

        submitForm: function() {
            crudService.formInstance
                .find("input[type='submit']")
                .trigger("click");
        },

        cancelarForm: function() {
            crudService.resetForm();
        },

        onFormSubmit: function(event) {
            event.preventDefault();
            var formData = formToObject(crudService.formInstance.serializeArray());

            crudService.formInstance.find("[data-imagem-upload]").each(function() {
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

            var url = crudService.formInstance.data("ajax-new");
            var isUpdate = false;
            if (crudService.formInstance.data("object")) {
                formData = $.extend(crudService.formInstance.data("object"), formData);
                url = crudService.formInstance
                    .data("ajax-update")
                    .replace("{id}", formData.id);

                isUpdate = true;
            }

            $.ajax({
                type: isUpdate ? "PUT" : "POST",
                url: url,
                data: JSON.stringify(formData),
                success: function(item) {
                    crudService.resetForm();
                    var template = crudService.buildTemplate(item || formData);
                    if (isUpdate) {
                        crudService.tabelaInstance
                            .find(".linha[data-id='" + formData.id + "']")
                            .replaceWith(template);
                        abrirToast("Item atualizado com sucesso.");
                    } else {
                        crudService.tabelaInstance.append(template);
                        abrirToast("Item inserido com sucesso.");
                    }
                },

                error: function(erro) {
                    abrirToast(erro.responseJSON.result);
                }
            });
        },

        editar: function() {
            var id = $(this).parent().parent().data("id");
            var url = crudService.tabelaInstance
                .data("ajax-edit")
                .replace("{id}", id);

            $.ajax({
                type: "GET",
                url: url,
                success: function(item) {
                    for (var key in item) {
                        var element = crudService.formInstance.find("[name='" + key + "'], [data-bind='" + key + "']");
                        if (element.is("[data-sceditor]")) {
                            element
                                .data("sceditor-instance")
                                .setWysiwygEditorValue(item[key]);
                        } else if (element.is("[data-imagem-upload]")) {
                            element
                                .find("img")
                                .attr("src", "../" + item[key]);
                        } else {
                            element.val(item[key]);
                        }
                    }

                    crudService.formInstance.data("object", item);
                    $("[data-for='#container-form']").text("Editar Bloco");
                    crudService.openTab("#container-form");
                },

                error: function(erro) {
                    abrirToast(erro.responseJSON.result);
                }
            });
        },

        toggle: function() {
            var button = $(this);
            var id = button.parent().parent().data("id");
            var url = crudService.tabelaInstance.data("ajax-toggle").replace("{id}", id);
            $.ajax({
                type: "PUT",
                url: url,
                success: function() {
                    button
                        .toggleClass("ativar")
                        .toggleClass("desativar");
                    abrirToast("Item " + (button.hasClass("ativar") ? "desativado" : "ativado") + " com sucesso.");
                },

                error: function(erro) {
                    abrirToast(erro.responseJSON.result);
                }
            });
        },

        excluir: function() {
            var id = $(this).parent().parent().data("id");
            var url = crudService.tabelaInstance.data("ajax-delete").replace("{id}", id);
            $.ajax({
                type: "DELETE",
                url: url,
                success: function() {
                    crudService.tabelaInstance
                        .find(".linha[data-id='" + id + "']")
                        .remove();
                    abrirToast("Item excluído com sucesso.");
                },

                error: function(erro) {
                    abrirToast(erro.responseJSON.result);
                }
            });
        },

        buildTemplate: function(item) {
            var linha = $("<div class='linha' data-id='" + item.id + "'>");
            $("<div class='coluna'>")
                .append($("<img>")
                        .attr("src", "../" + item.imagem)
                        .attr("alt", item.titulo))
                .appendTo(linha);
            $("<div class='coluna titulo'>")
                .append($("<span>").text(item.titulo))
                .appendTo(linha);
            $("<div class='coluna descricao'>")
                .append($("<span>").text($(item.texto).text()))
                .appendTo(linha);
            $("<div class='coluna'>")
                .html("<span class='toggle " + (item.ativo ? "desativar" : "ativar") +  "'></span><hr><span class='editar'></span><hr><span class='excluir'></span>")
                .appendTo(linha);
            return linha;
        },

        resetForm: function() {
            crudService.formInstance[0].reset();
            crudService.formInstance
                .find("[data-sceditor]")
                .data("sceditor-instance")
                .setWysiwygEditorValue("");
            crudService.formInstance
                .find("[data-imagem-upload] img")
                .removeAttr("src");
            crudService.formInstance.removeData("object");
            crudService.instance
                .find("[data-for='#container-form']")
                .text("Adicionar Bloco");
            crudService.openTab("#container-listagem");
        }
    };

    crudService.init();
    return crudService;
}
