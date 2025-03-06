<div id="divForm">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h3>Faça Login</h3>
    <form method="POST" action="../controller/loginUser.php" id="form">
        <div class="divInput">
            <label for="emailUser">Email</label>
            <input name="emailUser" id="emailUser" class="inputForm" type="email" placeholder="Digite seu email...">
        </div>

        <div class="divInput">
            <label for="senhaUser">Senha</label>
            <div class="input-container">
                <input name="senhaUser" id="senhaUser" class="inputForm" type="password" placeholder="Digite sua senha...">
                <span class="fa fa-eye-slash" id="iconePassword"></span> 
            </div>
            <p id="esqueciSenha" name="esqueciSenha">Esqueci a senha</p>
        </div>

        <input type="submit" value="Entrar" id="entrar" name="entrar">
        <p id="pArea">Ainda não tem uma conta? <a id="aArea" href="../templates/cadastroUser.php">Cadastre-se!</a></p>
    </form>
</div>

<script>
    const iconePassword = document.getElementById('iconePassword');
    const conteudoPassword = document.getElementById('senhaUser');

    iconePassword.addEventListener('click', function () {
        const type = conteudoPassword.type === 'password' ? 'text' : 'password';
        conteudoPassword.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>