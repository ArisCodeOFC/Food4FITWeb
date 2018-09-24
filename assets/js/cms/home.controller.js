f4fApp.addController("HomeController", function($this, $element) {
    $this.onInit = function() {
        $this.loadView(location.hash.replace(/[#\/]/g, "") || "dashboard");
    };

    $element.find(".btn-logout").click(function(event) {
        event.preventDefault();
        $.ajax({
            url: "../api/v1/funcionarios/logout",
            type: "POST",
            success: function() {
                window.location.href = "login.php";
            },
            error: function() {
                f4fApp.abrirToast("Não foi possível efetuar o logout.");
            }
        });
    });

    $element.find("#sidebar-collapse").click(function(event) {
        event.preventDefault();
        $element.find("#sidebar").toggleClass("collapse");
    });

    $element.find("a[data-page-load]").click(function(event) {
        event.preventDefault();
        $this.loadView($(this).data("page-load"));
    });

    $element.on("mouseenter", "#sidebar.collapse nav a", function() {
        var offset = $(this).offset();
        var texto = $(this)
            .find(".label")
            .contents()
            .get(0).nodeValue;

        $element.find("#tooltip")
            .text(texto)
            .css({top: offset.top + 5, left: offset.left + 50})
            .show();
    });

    $element.on("mouseleave", "#sidebar.collapse nav a", function() {
        $element.find("#tooltip").hide();
    });

    $this.loadView = function(pagina) {
        var routerLink = $element.find("#sidebar nav a[data-page-load='" + pagina + "']");
        var controller = routerLink.data("pageController");
        $.get(pagina + ".php", function(conteudo) {
            $element.find("#page-content").html(conteudo);
            $element.find("#sidebar nav a").removeClass("active");
            var texto = routerLink
                .addClass("active")
                .find(".label")
                .contents()
                .get(0).nodeValue;

            $element.find("#titulo-pagina").text(texto);
            window.location.hash = "#/" + pagina;

            var controllerInstance = f4fApp.setElementController($element, controller);
            if (controllerInstance && controllerInstance.onInit) {
                controllerInstance.onInit();
            }
        });
    };
});
