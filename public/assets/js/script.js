$(document).ready(function (){

    // When the checkmark icon is clicked
    $(".clicked_jquery_check").click(function() {

        // Find the associated radio input elements
        var radioInputs = $(this).closest(".radio-icon-container").find(".radio_button");

        // Set the value of the "checked" radio input to "checked" and the other one to "unchecked"
        radioInputs.eq(0).prop("checked", true);
        radioInputs.eq(1).prop("checked", false);

        // Add the "checked" class to the clicked icon and remove it from the "X" icon
        $(this).addClass("checked");
        $(this).closest(".radio-icon-container").find(".clicked_jquery_uncheck").removeClass("checked");
    });

// When the "X" icon is clicked
    $(".clicked_jquery_uncheck").click(function() {
        // Find the associated radio input elements
        var radioInputs = $(this).closest(".radio-icon-container").find(".radio_button");

        // Set the value of the "unchecked" radio input to "checked" and the other one to "unchecked"
        radioInputs.eq(0).prop("checked", false);
        radioInputs.eq(1).prop("checked", true);

        // Add the "checked" class to the clicked "X" icon and remove it from the checkmark icon
        $(this).addClass("checked");
        $(this).closest(".radio-icon-container").find(".clicked_jquery_check").removeClass("checked");
    });

})
