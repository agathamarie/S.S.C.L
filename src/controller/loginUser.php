<?php
include "../banco/db.php";

$email = $_POST['emailUser'];
$password_digitada = trim($_POST['senhaUser']);

if (empty($email) || empty($password_digitada)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/loginUser.php';
          </script>";
    exit();
}

$query = "SELECT * FROM User WHERE emailUser = ?";
$stmt_insert = $connection->prepare($query);
$stmt_insert->bind_param("s", $email);
$verifica = $stmt_insert->execute();
$resultado = $stmt_insert->get_result();

if ($resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();

    if (password_verify($password_digitada, $user['senhaUser'])) {
        session_start();
        $_SESSION["usuario_logado"] = $user['emailUser'];
        header('Location: ../templates/pageUser.php');
        exit();
    } else {
        echo "<script>
                alert('Senha incorreta!');
                window.location.href='../templates/loginUser.php';
                </script>";
    }
} else {
    echo "<script>
            alert('Usuário não cadastrado ou e-mail incorreto!');
            window.location.href='../templates/loginUser.php';
            </script>";
}

$stmt_insert->close();
$connection->close();
?>