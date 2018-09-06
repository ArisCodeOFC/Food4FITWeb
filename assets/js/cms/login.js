/* Converte os dados de um formulário do HTML para um objeto do JavaScript */
function formToObject(dados) {
    return dados.reduce(function(resultado, propriedade) {
        resultado[propriedade.name] = propriedade.value;
        return resultado;
    }, {});
}

$(document).ready(function() {
    /* Login de algum funcionário no CMS */
    $("#form-login").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/login",
            type: "POST",
            data: JSON.stringify(formToObject($(this).serializeArray())),
            success: function() {
                window.location.href = "home.php";
            },
            error: function() {
                alert("Usuário ou senha incorretos.");
            }
        });
    });
});
