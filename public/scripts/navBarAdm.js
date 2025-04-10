document.addEventListener("DOMContentLoaded", function () {
    var navBar = document.getElementById("navBar");
    var buttonMenu = document.getElementById("buttonMenu");
    var content = document.getElementById("content");

    if (localStorage.getItem("menuState") === "open") {
        navBar.classList.remove("minimized");
    }

    buttonMenu.addEventListener("click", function () {
        navBar.classList.toggle("minimized");

        if (navBar.classList.contains("minimized")) {
            localStorage.setItem("menuState", "closed");
        } else {
            localStorage.setItem("menuState", "open");
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    var buttonMenu = document.getElementById("buttonMenuMobile");
    var divOutros = document.getElementById("#div-outros")

    buttonMenu.addEventListener("click", () => {
        divOutros.classList.toggle("show-menu");
    });
});