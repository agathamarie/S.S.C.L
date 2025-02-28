<section id="sectionFormCadastro">
        <h3>Cadastre-se</h3>
        <form method="POST" action="../controller/cadastroUser.php">
            <label for="nameUser">Nome Completo</label>
            <input name="nameUser" id="nameUser" type="text" placeholder="Digite seu nome...">

            <label for="emailUser">Email</label>
            <input name="emailUser" id="emailUser" type="email" placeholder="Digite seu email...">

            <label for="senhaUser">Senha</label>
            <input name="senhaUser" id="senhaUser" type="text" placeholder="Crie uma senha...">
        
            <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
        </form>

</section>