<?php
include "../banco/db.php";

session_start();

if (!isset($_SESSION["user_logado"])) {
    echo "Usuário não logado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['nameUser']);
    $email = trim($_POST['email']);
    $password_digitada = trim($_POST['senha']);

    $password_hash = password_hash($password_digitada, PASSWORD_DEFAULT);

    $query_update = "UPDATE User SET nameUser = ?, email = ?, senha = ? WHERE email = ?";
    $stmt = $connection->prepare($query_update);

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $connection->error);
    }

    $stmt->bind_param("ssss", $name, $email, $password_hash, $_SESSION["user_logado"]);

    if ($stmt->execute()) {
        $_SESSION["user_logado"] = $email;

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
?>