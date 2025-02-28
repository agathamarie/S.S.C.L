<section id="sectionFormCadastro">
        <h3>Cadastre-se</h3>
        <form method="POST" action="../controller/cadastroAdmin.php">
            <label for="nameAdmin">Nome Completo</label>
            <input name="nameAdmin" id="nameAdmin" type="text" placeholder="Digite seu nome...">

            <label for="emailAdmin">Email</label>
            <input name="emailAdmin" id="emailAdmin" type="email" placeholder="Digite seu email...">

            <label for="senhaAdmin">Senha</label>
            <input name="senhaAdmin" id="senhaAdmin" type="text" placeholder="Crie uma senha...">
        
            <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">
        </form>

</section>