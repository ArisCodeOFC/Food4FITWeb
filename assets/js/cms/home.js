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
        var texto = $(this).find(".label").contents().get(0).nodeValue;
        $("#tooltip").text(texto).css({top: offset.top + 5, left: offset.left + 50}).show();
    });

    $(document).on("mouseleave", "#sidebar.collapse nav a", function() {
        $("#tooltip").hide();
    });

    $(document).on("click", "#tabs [data-for]", function() {
        openTab($(this).data("for"));
    });

    $(document).on("change", "[data-imagem-upload] input", function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            var parent = $(this).parent();
            reader.onload = function(event) {
                var image = parent.find("img");
                image.attr("src", event.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    $(document).on("click", "[data-form-submit]", function() {
        $($(this).data("form-submit")).find("input[type='submit']").trigger("click");
    });

    $(document).on("submit", "[data-ajax-form]", function(event) {
        event.preventDefault();
        var form = $(this);
        var formData = formToObject($(this).serializeArray());
        form.find("[data-imagem-upload]").each(function() {
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

        var url = $(this).data("ajax-new");
        var isUpdate = false;
        if (form.data("object")) {
            formData = $.extend(form.data("object"), formData);
            url = $(this).data("ajax-update").replace("{id}", formData.id);
            isUpdate = true;
        }

        $.ajax({
            type: isUpdate ? "PUT" : "POST",
            url: url,
            data: JSON.stringify(formData),
            success: function(item) {
                resetForm(form);
                var template = buildTemplate(item || formData);
                if (isUpdate) {
                    $("#tabela-items .linha[data-id='" + formData.id + "']").replaceWith(template);
                    abrirToast("Item atualizado com sucesso.");
                } else {
                    $("#tabela-items").append(template);
                    abrirToast("Item inserido com sucesso.");
                }
            },

            error: function(erro) {
                abrirToast(erro.responseJSON.result);
            }
        });
    });

    $(document).on("click", "#tabela-items .editar", function() {
        var id = $(this).parent().parent().data("id");
        var url = $("#tabela-items").data("ajax-edit").replace("{id}", id);
        var form = $($("#tabela-items").data("form"));
        $.ajax({
            type: "GET",
            url: url,
            success: function(item) {
                for (var key in item) {
                    var element = form.find("[name='" + key + "'], [data-bind='" + key + "']");
                    if (element.is("[data-sceditor]")) {
                        element.data("sceditor-instance").setWysiwygEditorValue(item[key]);
                    } else if (element.is("[data-imagem-upload]")) {
                        element.find("img").attr("src", "../" + item[key]);
                    } else {
                        element.val(item[key]);
                    }
                }

                form.data("object", item);
                $("[data-for='#container-form']").text("Editar Bloco");
                openTab("#container-form");
            },

            error: function(erro) {
                abrirToast(erro.responseJSON.result);
            }
        });
    });

    $(document).on("click", "#tabela-items .toggle", function() {
        var button = $(this);
        var id = button.parent().parent().data("id");
        var url = $("#tabela-items").data("ajax-toggle").replace("{id}", id);
        $.ajax({
            type: "PUT",
            url: url,
            success: function() {
                button.toggleClass("ativar").toggleClass("desativar");
                abrirToast("Item " + (button.hasClass("ativar") ? "desativado" : "ativado") + " com sucesso.");
            },

            error: function(erro) {
                abrirToast(erro.responseJSON.result);
            }
        });
    });

    $(document).on("click", "#tabela-items .excluir", function() {
        var id = $(this).parent().parent().data("id");
        var url = $("#tabela-items").data("ajax-delete").replace("{id}", id);
        $.ajax({
            type: "DELETE",
            url: url,
            success: function() {
                $("#tabela-items .linha[data-id='" + id + "']").remove();
                abrirToast("Item excluído com sucesso.");
            },

            error: function(erro) {
                abrirToast(erro.responseJSON.result);
            }
        });
    });

    $(document).on("click", "[data-form-cancel]", function() {
        resetForm($($(this).data("form-cancel")));
    });

    abrirPagina(location.hash.replace(/[#\/]/g, "") || "dashboard");
});

/* Carrega uma view .php sem recarregar a página */
function abrirPagina(pagina) {
    $.get(pagina + ".php", function(conteudo) {
        $("#page-content").html(conteudo);
        $("#sidebar nav a").removeClass("active");
        var texto = $("#sidebar nav a[data-page-load='" + pagina + "']").addClass("active").find(".label").contents().get(0).nodeValue;;
        window.location.hash = "#/" + pagina;
        $("#titulo-pagina").text(texto);
        onViewLoad();
    });
}

/* Evento para quando uma nova view for carregada */
function onViewLoad() {
    $("[data-sceditor]").each(function() {
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
    })
}

function openTab(target) {
    $("#tabs-content>*").removeClass("active").filter(target).addClass("active");
    $("#tabs span[data-for='" + target + "']").addClass("active").siblings().removeClass("active");
}

function buildTemplate(item) {
    var linha = $("<div class='linha' data-id='" + item.id + "'>");
    $("<div class='coluna'>").append($("<img>").attr("src", "../" + item.imagem).attr("alt", item.titulo)).appendTo(linha);
    $("<div class='coluna titulo'>").append($("<span>").text(item.titulo)).appendTo(linha);
    $("<div class='coluna descricao'>").append($("<span>").text($(item.texto).text())).appendTo(linha);
    $("<div class='coluna'>").html("<span class='toggle " + (item.ativo ? "desativar" : "ativar") +  "'></span><hr><span class='editar'></span><hr><span class='excluir'></span>").appendTo(linha);
    return linha;
}

function resetForm(form) {
    form[0].reset();
    form.find("[data-sceditor]").data("sceditor-instance").setWysiwygEditorValue("");
    form.find("[data-imagem-upload] img").removeAttr("src");
    form.removeData("object");
    $("[data-for='#container-form']").text("Adicionar Bloco");
    openTab("#container-listagem");
}
