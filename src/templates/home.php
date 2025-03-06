<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSCL</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="icon" href="../css/images/iconAgatha.png" type="image/png">
</head>
<body>

    <section id="sectionBody">
        <div id="divBody">
            <h2>Olá<h2>
            <br>

            <p class="text">Bem-vindo(a) ao simples sistema de cadastro e login,<br>com dois tipos de usuários: Adm  e Usuário Comum.</p>

            <br>
            <p class="text">Qual tipo de usuário você é:</p>
            <div id="cardsEscolha">
                <div class="card" onclick="window.location='cadastroUser.php';">
                    <img class="cardImage" src="../css/images/iconUser.png">
                    <p class="tituloCard">Usuário Comum</p>
                </div>
                <div class="card" onclick="window.location='cadastroAdmin.php';">
                    <img class="cardImage" src="../css/images/iconAdmin.png">
                    <p class="tituloCard">Administrador</p>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>