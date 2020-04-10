$(document).ready(function() {
    $("#name").on("keypress", function() {
        $(this).next("p.error").hide()
    });
    $("#price").on("keypress", function() {
        $(this).next("p.error").hide()
    });
    $("#shortDescription").on("keypress", function() {
        $(this).next("p.error").hide();
    })
});

