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

    $(document).on("click", "#tabs span[data-for]", function() {
        $("#tabs-content>*").removeClass("active").filter($(this).data("for")).addClass("active");
        $(this).addClass("active").siblings().removeClass("active");
    });

    abrirPagina(location.hash.replace(/[#\/]/g, '') || "dashboard");
});

/* Carrega uma view .php sem recarregar a página */
function abrirPagina(pagina) {
    $.get(pagina + ".php", function(conteudo) {
        $("#page-content").html(conteudo);
        $("#sidebar nav a").removeClass("active");
        var texto = $("#sidebar nav a[data-page-load='" + pagina + "']").addClass("active").find(".label").contents().get(0).nodeValue;;
        window.location.hash = "#/" + pagina;
        $("#titulo-pagina").text(texto);
    });
}
