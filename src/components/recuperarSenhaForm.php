<div id="divForm">

    <h3>Recupere sua Senha</h3>
    <p style="width: 350px; margin: 5px 0 21px; align-items: center;">Iremos mandar um código de confirmação em seu email para que você possa recuperar sua senha, por favor digite seu email e aguarde!</p>
    <form method="POST" action="../controller/recuperarSenha.php" id="form">
        <div class="divInput">
            <label for="emailUser">Email</label>
            <input name="emailUser" id="emailUser" class="inputForm" type="email" placeholder="Digite seu email...">
        </div>

        <input type="submit" value="Enviar" id="Enviar" name="Enviar">
    </form>
</div>