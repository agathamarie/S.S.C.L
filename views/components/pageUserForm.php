<?php
include "../banco/db.php";

session_start();

if (isset($_SESSION["user_logado"])) {
    $query = "SELECT * FROM User WHERE email = ?";
    $stmt = $connection->prepare($query);

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $connection->error);
    }

    $stmt->bind_param("s", $_SESSION["user_logado"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
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
            <input name="nameUser" id="nameUser" class="inputForm" type="text" value="<?php echo htmlspecialchars($user['nameUser']); ?>" placeholder=" Seu nome: <?php echo htmlspecialchars($user['nameUser']); ?>">
        </div>

        <div class="divInput">
            <label for="email">Email</label>
            <input name="email" id="email" class="inputForm" type="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder=" Seu email: <?php echo htmlspecialchars($user['email']); ?>">
        </div>

        <div class="divInput">
            <label for="senhar">Senha</label>
            <div class="input-container">
                <input name="senha" id="senha" class="inputForm" type="password" placeholder="Digite sua nova senha...">
                <span class="fa fa-eye-slash" id="iconePassword"></span> 
            </div>
        </div>

        <input type="submit" value="Salvar Alterações" id="editar" name="editar">
    </form>
</div>

<script>
    const iconePassword = document.getElementById('iconePassword');
    const conteudoPassword = document.getElementById('senha');

    iconePassword.addEventListener('click', function () {
        const type = conteudoPassword.type === 'password' ? 'text' : 'password';
        conteudoPassword.type = type;

        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>