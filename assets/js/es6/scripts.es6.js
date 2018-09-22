$(document).ready(function() {
    $("#navbar-flat-menu").click(function() {
        $("#sidebar-left").fadeIn("fast");
    });

    $("#sidebar-left-close").click(function() {
        $("#sidebar-left").fadeOut("fast");
    });

    $("#navbar-flat-login, #user-bubble").click(function() {
        $("#sidebar-right").fadeIn("fast");
    });

    $("#sidebar-right-close").click(function() {
        $("#sidebar-right").fadeOut("fast");
    });

    $(".save-data-button").click(function() {
        $(".form-generic").slideToggle(200);
    });

    $(".close-modal").click(function(){
        $('.generic-modal').css('display', 'none');
    });

    $("#show").click(function() {
        $('.dish-form').css('display', 'block');
        $('.dish-form').addClass("animate fadeInUp");
    });

    $("#abrir").click(function(){
        $(".form-generic").slideToggle(200);
    });

    $("#fechar").click(function(){
        $(".form-generic").fadeOut(200);
    });

    $("#comentario").click(function() {
        $('.publication-comments').slideToggle(50);
    });

    $("#form-cadastro-usuario").submit(function(event) {
        event.preventDefault();
        let userData = formToObject($(this).serializeArrayDisabled());
        this.reset();
        $("#modal-cadastro").addClass("display-flex");

        let counter = 5;
        let interval = setInterval(() => {
            $("#modal-cadastro .counter").text(--counter);
            if (counter == 0) {
                clearInterval(interval);
                location.href = "index.php";
            }

        }, 1000);
    })

    if ($.fn.datepicker) {
        $("#dtnasc").datepicker({
            maxDate: "+0D",
            showAnim: "slideDown",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            dateFormat: "dd/mm/yyyy",
            dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"],
            dayNamesMin: ["D", "S", "T", "Q", "Q", "S", "S", "D"],
            dayNamesShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
            monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            nextText: "Proximo",
            prevText: "Anterior"
        });

        $("#dtnasc").on("focusin", function() {
           $(this).prop("readonly", true);
        });

        $("#dtnasc").on("focusout", function() {
           $(this).prop("readonly", false);
        });
    }

    if ($.applyDataMask) {
        $.applyDataMask();
    }
});

$(window).on("load", function() {
    let recaptcha = $("#g-recaptcha-response");
    if (recaptcha) {
        recaptcha.prop("required", true).prop("disabled", true);
    }
});
