$.fn.serializeArrayDisabled = function () {
    var disabled = this.find(":input:disabled").removeAttr("disabled");
    var serialized = this.serializeArray();
    disabled.attr("disabled", "disabled");
    return serialized;
};

function formToObject(dados) {
    var resultado = {};
    dados.forEach(function(item) {
        if (item.name.indexOf(".") != -1) {
            var propriedade = item.name.split(".");
            if (propriedade.length == 2) {
                if (!resultado[propriedade[0]]) {
                    resultado[propriedade[0]] = {};
                }

                resultado[propriedade[0]][propriedade[1]] = item.value;
            }

        } else {
            resultado[item.name] = item.value;
        }
    });

    return resultado;
}

function convertObject(obj, current) {
    var resultado = arguments.length <= 2 || arguments[2] === undefined ? {} : arguments[2];
    for (var propriedade in obj) {
        var valor = obj[propriedade];
        var chave = current ? current + "." + propriedade : propriedade;
        if (valor && typeof valor === "object") {
            convertObject(valor, chave, resultado);
        } else {
            resultado[chave] = valor;
        }
    }

    return resultado;
}

function moneyFormat(value) {
    var re = "\\d(?=(\\d{3})+\\D)", num = value.toFixed(Math.max(0, 2));
    return num.replace(".", ",").replace(new RegExp(re, "g"), "$&.");
}

function checkBoolean(value) {
    return value == "true" || value == true || parseInt(value);
}