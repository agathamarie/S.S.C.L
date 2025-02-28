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

<section id="sectionFormEditar">
    <h3>Editar seu Perfil</h3>
    <form method="POST" action="../controller/pageUser.php">
        <label for="nameUser">Nome Completo</label>
        <input name="nameUser" id="nameUser" type="text" placeholder="<?php echo $user['nameUser']; ?>">

        <label for="emailUser">Email</label>
        <input name="emailUser" id="emailUser" type="email" placeholder="<?php echo $user['emailUser']; ?>">

        <label for="senhaUser">Senha</label>
        <input name="senhaUser" id="senhaUser" type="text" placeholder="Digite sua nova senha...">
    
        <input type="submit" value="Salvar Alterações" id="editar" name="editar">
    </form>
</section>
