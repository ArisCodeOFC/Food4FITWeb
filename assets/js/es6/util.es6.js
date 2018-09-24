$.fn.serializeArrayDisabled = function() {
    let disabled = this.find(":input:disabled").removeAttr("disabled");
    let serialized = this.serializeArray();
    disabled.attr("disabled", "disabled");
    return serialized;
};

function formToObject(dados) {
    const resultado = {};
    dados.forEach(item => {
        if (item.name.indexOf(".") != -1) {
            let propriedade = item.name.split(".");
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

function convertObject(obj, current, resultado = {}) {
    for (let propriedade in obj) {
        let valor = obj[propriedade];
        let chave = current ? current + "." + propriedade : propriedade;
        if (valor && typeof valor === "object") {
            convertObject(valor, chave, resultado);
        } else {
            resultado[chave] = valor;
        }
    }

    return resultado;
}

function moneyFormat(value) {
    let re = "\\d(?=(\\d{3})+\\D)", num = value.toFixed(Math.max(0, 2));
    return num.replace(".", ",").replace(new RegExp(re, "g"), "$&.");
}

function checkBoolean(value) {
    return value == "true" || parseInt(value);
}
