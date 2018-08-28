$(document).ready(function() {
    $("#navbar-flat-menu").click(function() {
        $("#sidebar").fadeIn("fast");
    });

    $("#sidebar-close").click(function() {
        $("#sidebar").fadeOut("fast");
    });
});
