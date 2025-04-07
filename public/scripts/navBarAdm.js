document.addEventListener("DOMContentLoaded", function () {
    var navBar = document.getElementById("navBar");
    var buttonMenu = document.getElementById("buttonMenu");
    var content = document.getElementById("content");

    // Se o usuário salvou o menu como aberto, remover a classe "minimized"
    if (localStorage.getItem("menuState") === "open") {
        navBar.classList.remove("minimized");
    }

    // Pequeno delay para reativar as transições
    setTimeout(() => {
        navBar.style.transition = "all 0.3s ease-in-out";
        content.style.transition = "margin-left 0.4s ease-in-out";
    }, 10);

    // Função de clique no botão menu
    buttonMenu.addEventListener("click", function () {
        navBar.classList.toggle("minimized");

        // Salva no localStorage se estava aberto ou fechado
        if (navBar.classList.contains("minimized")) {
            localStorage.setItem("menuState", "closed");
        } else {
            localStorage.setItem("menuState", "open");
        }
    });
});
