class LoginController {
    constructor(element) {
        this.element = element;
    }

    init() {
        this.formLogin = this.element.find("#form-login");
        this.formLogin.on("submit", this.submit.bind(this));
    }

    submit(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/login",
            type: "POST",
            data: JSON.stringify(formToObject($(event.currentTarget).serializeArray())),
            success: () => {
                window.location.href = "home.php";
            },

            error: () => {
                f4fApp.abrirToast("Matrícula ou senha incorretos.");
                this.formLogin
                    .find("#senha")
                    .val("")
                    .focus();
            }
        });
    }
}

f4fApp.addController("LoginController", LoginController);
