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
                abrirToast("Matrícula ou senha incorretos.");
                $("#senha").val("").focus();
            }
        });
    });
});
