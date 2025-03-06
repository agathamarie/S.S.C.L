<?php
include "../banco/db.php";

session_start();
if (!isset($_SESSION["usuario_logado"])) {
    echo "Usuário não logado.";
    exit;
}

$email_sessao = $_SESSION["usuario_logado"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nameUser'], $_POST['emailUser'], $_POST['senhaUser'])) {
    $name = $_POST['nameUser'];
    $email = $_POST['emailUser'];
    $password_digitada = $_POST['senhaUser'];
    $password_hash = password_hash($password_digitada, PASSWORD_DEFAULT);

    $query_update = "UPDATE User SET nameUser = ?, emailUser = ?, senhaUser = ? WHERE emailUser = ?";
    $stmt = $connection->prepare($query_update);
    $stmt->bind_param("ssss", $name, $email, $password_hash, $email_sessao);

    if ($stmt->execute()) {
        $_SESSION["usuario_logado"] = $email;
        echo "<script>
        alert('Perfil alterado com sucesso!');
        window.location.href='../templates/pageUser.php';
        </script>";
    } else {
        echo "<script>
        alert('Erro ao alterar seu perfil!');
        window.location.href='../templates/pageUser.php';
        </script>";
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Erro: Dados não recebidos corretamente!";
}