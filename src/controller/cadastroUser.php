<?php
include "../banco/db.php";

$email = $_POST['emailUser'];
$password = $_POST['senhaUser'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['nameUser'];

if (empty($email) || empty($password) || empty($name)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/cadastroUser.php';
          </script>";
    exit();
}

$query_test = "SELECT emailUser FROM User WHERE emailUser = ?";
$stmt = $connection->prepare($query_test);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Esse e-mail já está cadastrado!'); window.location.href='../templates/cadastroUser.php';</script>";
} else {
    $query = "INSERT INTO User (nameUser, emailUser, senhaUser) VALUES (?, ?, ?)";
    $stmt_insert = $connection->prepare($query);
    $stmt_insert->bind_param("sss", $name, $email, $password_hash);
    $insert = $stmt_insert->execute();

    if ($insert) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!'); window.location.href='../templates/loginUser.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário'); window.location.href='../templates/cadastroUser.php';</script>";
    }
}

$stmt->close();
$connection->close(); 
?>