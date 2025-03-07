<?php
include "../banco/db.php";

$email = $_POST['email'];
$password = $_POST['senha'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['nameUser'];
$tipo = $_POST['typeUser'];

if (empty($email) || empty($password) || empty($name) || empty($tipo)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/cadastro.php';
          </script>";
    exit();
}

$query_test = "SELECT * FROM User WHERE email = ?;";
$stmt = $connection->prepare($query_test);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Esse e-mail já está cadastrado!'); window.location.href='../templates/cadastro.php';</script>";
} else {
    $query = "INSERT INTO User (nameUser, email, senha, typeUser) VALUES (?, ?, ?, ?)";
    $stmt_insert = $connection->prepare($query);
    $stmt_insert->bind_param("ssss", $name, $email, $password_hash, $tipo);
    $insert = $stmt_insert->execute();

    if ($insert) {
        header('Location: ../templates/login.php');
    } else {
        header('Location: ../templates/cadastro.php');
    }
}

$stmt->close();
$connection->close();
?>
