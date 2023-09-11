$(document).ready(function (){

    $(".clicked_jquery_check").click(function() {

        var checkbox = $(this).closest(".radio-icon-container").find(".radio_button");
        checkbox.prop("checked", true);

        $(this).addClass("checked");

        $(this).closest(".radio-icon-container").find(".clicked_jquery_uncheck").removeClass("checked");

    });


    $(".clicked_jquery_uncheck").click(function() {

        var checkbox = $(this).closest(".radio-icon-container").find(".radio_button");
        checkbox.prop("checked", false);


        $(this).addClass("checked");


        $(this).closest(".radio-icon-container").find(".clicked_jquery_check").removeClass("checked");
    });
})
