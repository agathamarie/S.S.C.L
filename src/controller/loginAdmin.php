<?php
session_start();

include "../banco/db.php";

$email = $_POST['emailAdmin'];
$password_digitada = trim($_POST['senhaAdmin']);

if (empty($email) || empty($password_digitada)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/loginAdmin.php';
          </script>";
    exit();
}

$query = "SELECT * FROM Admin WHERE emailAdmin = ?";
$stmt_insert = $connection->prepare($query);
$stmt_insert->bind_param("s", $email);
$verifica = $stmt_insert->execute();
$resultado = $stmt_insert->get_result();

if ($resultado->num_rows > 0) {
    $admin = $resultado->fetch_assoc();

    if (password_verify($password_digitada, $admin['senhaAdmin'])) {
        $_SESSION["adm_logado"] = $admin['emailAdmin'];
        
        header('Location: ../templates/pageAdmin.php');
        exit();
    } else {
        echo "<script>
                alert('Senha incorreta!');
                window.location.href='../templates/loginAdmin.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('Admin não cadastrado ou e-mail incorreto!');
            window.location.href='../templates/loginAdmin.php';
          </script>";
    exit();
}

$stmt_insert->close();
$connection->close();
?>
