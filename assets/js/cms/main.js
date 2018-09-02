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
});
