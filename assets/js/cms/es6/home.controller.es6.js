class HomeController {
    constructor(element) {
        this.element = element;
    }

    init() {
        this.loadView(location.hash.replace(/[#\/]/g, "") || "dashboard");
        this.element.find("a[data-page-load]").on("click", this.changeView.bind(this));
        this.element.find(".btn-logout").on("click", this.logout.bind(this));
        this.element.find("#sidebar-collapse").on("click", this.collapseSidebar.bind(this));
        this.element.on("mouseenter", "#sidebar.collapse nav a", this.sidebarMouseEnter.bind(this));
        this.element.on("mouseleave", "#sidebar.collapse nav a", this.sidebarMouseLeave.bind(this));
    }

    loadView(pagina) {
        const routerLink = this.element.find(`#sidebar nav a[data-page-load='${pagina}']`);
        const controller = routerLink.data("pageController");

        $.get(pagina + ".php", (conteudo) => {
            this.element.find("#page-content").html(conteudo);
            this.element.find("#sidebar nav a").removeClass("active");
            const texto = routerLink
                .addClass("active")
                .find(".label")
                .contents()
                .get(0).nodeValue;

            this.element.find("#titulo-pagina").text(texto);
            window.location.hash = "#/" + pagina;

            const instance = f4fApp.setElementController(this.element, controller);
            if (instance && instance.init) {
                instance.init();
            }
        });
    }

    changeView(event) {
        event.preventDefault();
        this.loadView($(event.currentTarget).data("page-load"));
    }

    logout(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/logout",
            type: "POST",
            success: () => {
                window.location.href = "login.php";
            },

            error: () => {
                f4fApp.abrirToast("Não foi possível efetuar o logout.");
            }
        });
    }

    collapseSidebar(event) {
        event.preventDefault();
        this.element.find("#sidebar").toggleClass("collapse");
    }

    sidebarMouseEnter(event) {
        const offset = $(event.currentTarget).offset();
        const texto = $(event.currentTarget)
            .find(".label")
            .contents()
            .get(0).nodeValue;

        this.element.find("#tooltip")
            .text(texto)
            .css({top: offset.top + 5, left: offset.left + 50})
            .show();
    }

    sidebarMouseLeave() {
        this.element.find("#tooltip").hide();
    }
}

f4fApp.addController("HomeController", HomeController);
