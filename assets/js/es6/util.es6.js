$.fn.serializeArrayDisabled = function() {
    let disabled = this.find(":input:disabled").removeAttr("disabled");
    let serialized = this.serializeArray();
    disabled.attr("disabled", "disabled");
    return serialized;
};

function formToObject(dados) {
    return dados.reduce((obj, item) => (obj[item.name] = item.value, obj), {});
}
