<?php
include "../banco/db.php";

session_start();

if (isset($_SESSION["usuario_logado"])) {
    $query = "SELECT * FROM User WHERE emailUser = '{$_SESSION["usuario_logado"]}'";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
} else {
    echo "Usuário não logado.";
    exit;
}
?>

<div id="divForm">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <h3>Editar seu Perfil</h3>
    <form method="POST" action="../controller/pageUser.php">
        <div class="divInput">
            <label for="nameUser">Nome Completo</label>
            <input name="nameUser" id="nameUser" class="inputForm" type="text" placeholder="<?php echo $user['nameUser']; ?>">
        </div>

        <div class="divInput">
            <label for="emailUser">Email</label>
            <input name="emailUser" id="emailUser" class="inputForm" type="email" placeholder="<?php echo $user['emailUser']; ?>">
        </div>

        <div class="divInput">
            <label for="senhaUser">Senha</label>
            <div class="input-container">
                <input name="senhaUser" id="senhaUser" class="inputForm" type="password" placeholder="Digite sua nova senha...">
                <span class="fa fa-eye-slash" id="iconePassword"></span> 
            </div>
        </div>

        <input type="submit" value="Salvar Alterações" id="editar" name="editar">
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
