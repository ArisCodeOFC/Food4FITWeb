/* Converte os dados de um formulário do HTML para um objeto do JavaScript */
function formToObject(dados) {
    return dados.reduce(function(resultado, propriedade) {
        resultado[propriedade.name] = propriedade.value;
        return resultado;
    }, {});
}

$(document).ready(function() {
    /* Efetuar logout */
    $(".btn-logout").click(function(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/logout",
            type: "POST",
            success: function() {
                window.location.href = "login.php";
            },
            error: function() {
                alert("Não foi possível efetuar o logout.");
            }
        });
    });

    $("#sidebar-collapse").click(function(event) {
        event.preventDefault();
        $("#sidebar").toggleClass("collapse");
    });

    $("a[data-page-load]").click(function(event) {
        event.preventDefault();
        var anchor = $(this);
        $.get(anchor.data("page-load"), function(conteudo) {
            $("#page-content").html(conteudo);
            $("#sidebar nav a").removeClass("active");
            anchor.addClass("active");
        });
    });

    $(document).on("mouseenter", "#sidebar.collapse nav a", function() {
        var offset = $(this).offset();
        var texto = $(this).find(".label").contents().get(0).nodeValue
        $("#tooltip").text(texto).css({top: offset.top + 5, left: offset.left + 50}).show();
    });

    $(document).on("mouseleave", "#sidebar.collapse nav a", function() {
        $("#tooltip").hide();
    });
});
