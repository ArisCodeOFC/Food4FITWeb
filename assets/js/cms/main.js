/* Converte os dados de um formulário do HTML para um objeto do JavaScript */
function formToObject(dados) {
    return dados.reduce(function(resultado, propriedade) {
        resultado[propriedade.name] = propriedade.value;
        return resultado;
    }, {});
}

/* Exibe uma mensagem na tela em um formato "toast" */
function abrirToast(mensagem) {
    $.toast({
        text: mensagem,
        loader: false,
        position: {right: "10px", bottom: "10px"},
        showHideTransition: "fadeIn",
        textAlign: "center"
    });
}
