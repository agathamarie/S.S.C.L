<?php
session_start();

include "../banco/db.php";

$email = $_POST['email'];
$password_digitada = trim($_POST['senha']);

if (empty($email) || empty($password_digitada)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/login.php';
          </script>";
    exit();
}

$query = "SELECT * FROM User WHERE email = ?";
$stmt_insert = $connection->prepare($query);
$stmt_insert->bind_param("s", $email);
$verifica = $stmt_insert->execute();
$resultado = $stmt_insert->get_result();

if ($resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();

    if (password_verify($password_digitada, $user['senha'])) {
        $_SESSION["user_logado"] = $user['email'];
        
        if ($user['typeUser'] === 'userAdm'){
            header('Location: ../templates/pageAdmin.php');
            exit();
        } else if ($user['typeUser'] === 'userComum') {
            header('Location: ../templates/pageUser.php');
            exit();
        } else {
            echo "<script>
                alert('Usuário não definido, algo deu errado!');
                window.location.href='../templates/login.php';
              </script>";
        }
    } else {
        echo "<script>
                alert('Senha incorreta!');
                window.location.href='../templates/login.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('Usuário não cadastrado ou e-mail incorreto!');
            window.location.href='../templates/login.php';
          </script>";
    exit();
}

$stmt_insert->close();
$connection->close();
?>
