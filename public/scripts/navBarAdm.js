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
    
    var buttonMenuMobile = document.getElementById("buttonMenuMobile");
    var divOutrosMobile = document.getElementById("div-outros-mobile");
    
    buttonMenuMobile.addEventListener("click", function () {
        divOutrosMobile.classList.toggle("show-menu");
        buttonMenuMobile.classList.toggle("ativo");

    
        if (buttonMenuMobile.classList.contains('fi-br-menu-burger')) {
            buttonMenuMobile.classList.remove('fi-br-menu-burger');
            buttonMenuMobile.classList.add('fi-sr-circle-xmark');
        } else {
            buttonMenuMobile.classList.remove('fi-sr-circle-xmark');
            buttonMenuMobile.classList.add('fi-br-menu-burger');
        }
    });    
});