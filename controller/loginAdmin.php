<?php
include "../banco/db.php";

$email = $_POST['emailAdmin'];
$password_digitada = trim($_POST['senhaAdmin']);

$query = "SELECT * FROM Admin WHERE emailAdmin = ?";
$stmt_insert = $connection->prepare($query);
$stmt_insert->bind_param("s", $email);
$verifica = $stmt_insert->execute();
$resultado = $stmt_insert->get_result();

if ($resultado->num_rows > 0) {
    $admin = $resultado->fetch_assoc();
    if (password_verify($password_digitada, $admin['senhaAdmin'])) {
        session_start();
        $_SESSION["adm_logado"] = $user['emailAdmin'];
        echo "<script>
                window.location.href='../pages/pageAdmin.php';
                alert('Login bem sucedido!');
                </script>";
    } else {
        echo "<script>
                window.location.href='../pages/loginAdmin.php';
                alert('Senha incorreta!');
                </script>";
    }
} else {
    echo "<script>
            window.location.href='../pages/loginAdmin.php';
            alert('Admin não cadastrado ou e-mail incorreto!');
            </script>";
}
$stmt_insert->close();
$connection->close();
?>