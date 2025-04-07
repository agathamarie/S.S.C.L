    <footer id="footer">
        <a href="../../views/home.php"><img id="logoFooter" src="../../public/images/logos/logoFooter.png" alt="Logo Simple System"></a>

        <nav id="navFooter">
            <a href="../../views/sobre-projeto.php" class="itemnav-footer">Sobre o Projeto</a>
            <a href="../../views/sobre-agatha.php" class="itemnav-footer">Sobre Mim</a>
        </nav>

        <p id="textFooter">© 2025 Feito com ♡ por Agatha Marie | Versão 2.0</p>
    </footer>

</body>
</head>

<style>
@import url("https://fonts.googleapis.com/css?family=Poppins:wght@300;400;600;700&display=swap");
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

:root {
    --darkred: #893D4C;
    --red: #860F37;
    --darkpink: #EF6A85;
    --pink: #FFC6C5;
    --whiteyellow: #FFF6E5;
    --black: #452129;
}

#footer {
    background-color: var(--pink);
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
    #logoFooter {
        height: 50px;
        transition: transform .4s;
        cursor: pointer;
    }
    #logoFooter:hover {
        transform: scale(1.1);
    }

    #navFooter {
        padding: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: .3rem;
    }

    .itemnav-footer {
        color: var(--darkpink);
        transition: color 0.3s ease;
        padding: 5px;
        text-decoration: none;
        position: relative;
    }
    .itemnav-footer::after {    
        content: "";
        position: absolute;
        left: 50%;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background: var(--darkpink);
        transition: width 0.3s ease, background 0.3s ease, left 0.3s ease;
    }
    .itemnav-footer:hover {
        color: var(--darkred);
    }
    .itemnav-footer:hover::after { 
        width: 100%;
        left: 0;
        background: var(--darkred);
    }

    #textFooter {
        color: #E7AAAD;
        font-size: 13px;
        cursor: default;
    }

</style>