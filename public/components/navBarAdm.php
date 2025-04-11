    <script>
        if (localStorage.getItem("menuState") === "open") {
            document.documentElement.classList.add("menu-open");
        }
    </script>

<section id="navBar" class="minimized">
    <nav id="adm">
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

            <div class="div-ul" id="div-outros">
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

<section id="navBarResponsivo">
    <nav id="adm">
        <ul id="ul-nav">
            <div class="div-ul">
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-apps"></i>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-users-alt"></i>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-sr-users-gear"></i>
                    </a>
                </li>
                <li class="item-menu">
                    <a href="" class="nav-item">
                        <i class="fi fi-br-stats"></i>
                    </a>
                </li>

                <!-- <div class="div">
                    <li class="item-menu">
                        <div class="nav-item">
                            </div>
                        </li>
                    </div>
                </div>
            </ul> -->
        </nav>
        <i id="buttonMenuMobile" class="fi fi-br-menu-burger"></i>
    <div id="div-outros-mobile">
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
</section>

<script src="../../public/scripts/navBarAdm.js"></script>