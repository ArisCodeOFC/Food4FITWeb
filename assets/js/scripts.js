$(document).ready(function(){
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
});
