<?php
include "../banco/db.php";

$email = $_POST['emailUser'];
$password_digitada = trim($_POST['senhaUser']);

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
        echo "<script>
                window.location.href='../pages/pageUser.php';
                alert('Login bem sucedido!');
                </script>";
    } else {
        echo "<script>
                window.location.href='../pages/loginUser.php';
                alert('Senha incorreta!');
                </script>";
    }
} else {
    echo "<script>
            window.location.href='../pages/loginUser.php';
            alert('Usuário não cadastrado ou e-mail incorreto!');
            </script>";
}
$stmt_insert->close();
$connection->close();
?>