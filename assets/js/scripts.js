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
});
