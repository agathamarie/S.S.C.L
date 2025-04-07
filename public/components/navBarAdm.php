<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css">
<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
<link rel="stylesheet" href="../../public/css/teste.css">
<section id="navBar">

    <script>
        if (localStorage.getItem("menuState") === "open") {
            document.documentElement.classList.add("menu-open");
        }
    </script>
    <nav id="adm" class="minimized">
        <div id="divMenu">
            <i id="buttonMenu" class="fi fi-br-menu-burger"></i>
        </div>

        
        <ul id="ul-nav">
            <div class="div-ul">
                <p class="textMenu">Menu</p>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-apps"></i> <span class="textMenuItem">GERAL</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-users-alt"></i> <span class="textMenuItem">USUÁRIOS</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-users-gear"></i> <span class="textMenuItem">ADMINS</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-br-stats"></i> <span class="textMenuItem">RELATÓRIOS</span>
                    </a>
                </li>
            </div>

            <div class="div-ul">
                <p class="textMenu">Outros</p>
                <li class="item-menu">
                    <a href="#" class="nav-item">
                        <i class="fi fi-sr-circle-user"></i> <span class="textMenuItem">PERFIL</span>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="../../index.php" class="nav-item">
                        <i class="fi fi-br-sign-out-alt"></i> <span class="textMenuItem">SAIR</span>
                    </a>
                </li>
            </div>
        </ul>
    </nav>

</section>