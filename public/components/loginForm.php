<div id="divForm">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h3>Faça Login</h3>
    <form method="POST" action="../controller/login.php" id="form">
        <div class="divInput">
            <label for="email">Email</label>
            <input name="email" id="email" class="inputForm" type="email" placeholder="Digite seu email...">
        </div>

        <div class="divInput">
            <label for="senha">Senha</label>
            <div class="input-container">
                <input name="senha" id="senha" class="inputForm" type="password" placeholder="Digite sua senha...">
                <span class="fa fa-eye-slash" id="iconePassword"></span> 
            </div>
            <a href="../templates/recuperarSenha.php" id="esqueciSenha" name="esqueciSenha">Esqueci a senha</a>
        </div>
    
        <input type="submit" value="Entrar" id="entrar" name="entrar">
        <p id="pArea">Ainda não tem uma conta? <a id="aArea" href="../templates/cadastro.php">Cadastre-se!</a></p>
    </form>
</div>

<script>
    const iconePassword = document.getElementById('iconePassword');
    const conteudoPassword = document.getElementById('senha');

    iconePassword.addEventListener('click', function () {
        const type = conteudoPassword.type === 'password' ? 'text' : 'password';
        conteudoPassword.type = type;

        this.classList.toggle('menu-burger');
        this.classList.toggle('fa-eye-slash');
    });
</script>