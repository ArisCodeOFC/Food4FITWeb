f4fApp.addController("DicasSaudeController", function($this, $elemento) {
    $elemento.find("#form-dicassaude").submit(function(evento) {
        evento.preventDefault();

    });
});
