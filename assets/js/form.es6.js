function updateReactiveForm(form) {
    let $this = formToObject(form.serializeArrayDisabled());
    form
        .find("[data-f4f-form-step]")
        .not(".display-none")
        .find("[data-f4f-if]")
        .each(function() {
            let condition = $(this).data("f4f-if");
            let visible = eval(`{${condition}}`);

            $(this)
                .toggle(visible)
                .find(":input")
                .prop("disabled", !visible);
        });
}

function changeFormStep(form, step, validate) {
    if (validate && !form.get(0).checkValidity()) {
        form.find(":submit").click();
    } else {
        form
            .find(`[data-f4f-form-step="${step}"]`)
            .removeClass("display-none")
            .find(":input")
            .prop("disabled", false)
            .end()
            .siblings()
            .addClass("display-none")
            .find(":input")
            .prop("disabled", true);

        $("[data-f4f-form-stepper]")
            .find("span")
            .eq(step - 1)
            .addClass("active")
            .siblings()
            .removeClass("active");

        return true;
    }
}

$(document).ready(function() {
    $("[data-f4f-form] [data-f4f-watch]").on("keyup change paste", function() {
        let form = $(this).closest("form");
        updateReactiveForm(form);
    });

    $("[data-f4f-form]").each(function() {
        let step = $("[data-f4f-form-stepper]").data("f4f-form-stepper");
        changeFormStep($(this), step);
        updateReactiveForm($(this));
        $(this).parent().removeClass("display-none");
    });

    $("[data-f4f-form-change-step]").on("click", function() {
        let form = $(this).closest("form");
        let step = $(this).data("f4f-form-change-step");
        if (changeFormStep(form, step, $(this).is("[data-f4f-form-step-validate]"))) {
            updateReactiveForm(form);
        }
    });

    $("[data-f4f-form-submit]").on("click", function() {
        $(this).closest("form").find(":submit").click();
    });

    $("[data-f4f-form-password], [data-f4f-form-password-confirm]").on("change", function() {
        let password = $("[data-f4f-form-password]").val();
        let passwordConfirm = $("[data-f4f-form-password-confirm]").val();
        if (password != passwordConfirm) {
            $("[data-f4f-form-password-confirm]").get(0).setCustomValidity("As senhas não correspondem.");
        } else {
            $("[data-f4f-form-password-confirm]").get(0).setCustomValidity("");
        }
    });
});
