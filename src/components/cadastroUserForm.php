<div id="divForm">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h3>Cadastre-se</h3>
    <form method="POST" action="../controller/cadastroUser.php" id="form">
        <div class="divInput">
            <label for="nameUser">Nome Completo</label>
            <input name="nameUser" id="nameUser" class="inputForm" type="text" placeholder="Digite seu nome...">
        </div>

        <div class="divInput">
            <label for="emailUser">Email</label>
            <input name="emailUser" id="emailUser" class="inputForm" type="email" placeholder="Digite seu email...">
        </div>

        <div class="divInput">
            <label for="senhaUser">Senha</label>
            <div class="input-container">
                <input name="senhaUser" id="senhaUser" class="inputForm" type="password" placeholder="Crie uma senha...">
                <span class="fa fa-eye-slash" id="iconePassword"></span> 
            </div>
        </div>

        <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
        <p id="pArea">Já tem uma conta? <a id="aArea" href="../templates/loginUser.php">Faça login!</a></p>
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