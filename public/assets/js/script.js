$(document).ready(function (){

    const radioIconContainers = document.querySelectorAll(".radio-icon-container");

    radioIconContainers.forEach(container => {
        const checkIcon = container.querySelector(".clicked_jquery_check");
        const uncheckIcon = container.querySelector(".clicked_jquery_uncheck");
        const radioButtons = container.querySelectorAll(".radio_button");

        checkIcon.addEventListener("click", () => {
            if (radioButtons[0].checked) {
                radioButtons[0].checked = false;
                checkIcon.classList.remove("checked");
            } else {
                radioButtons[0].checked = true;
                checkIcon.classList.add("checked");
                radioButtons[1].checked = false;
                uncheckIcon.classList.remove("checked");
            }
        });

        uncheckIcon.addEventListener("click", () => {
            if (radioButtons[1].checked) {
                radioButtons[1].checked = false;
                uncheckIcon.classList.remove("checked");
            } else {
                radioButtons[1].checked = true;
                uncheckIcon.classList.add("checked");
                radioButtons[0].checked = false;
                checkIcon.classList.remove("checked");
            }
        });
    });

})
