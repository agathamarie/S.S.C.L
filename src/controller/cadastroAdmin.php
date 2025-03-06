<?php
include "../banco/db.php";

$email = $_POST['emailAdmin'];
$password = $_POST['senhaAdmin'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$name = $_POST['nameAdmin'];

if (empty($email) || empty($password) || empty($name)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/cadastroAdmin.php';
          </script>";
    exit();
}

$query_test = "SELECT emailAdmin FROM Admin WHERE emailAdmin = ?";
$stmt = $connection->prepare($query_test);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script language='javascript' type='text/javascript'>
    alert('Esse e-mail já está cadastrado!'); window.location.href='../templates/cadastroAdmin.php';</script>";
} else {
    $query = "INSERT INTO Admin (nameAdmin, emailAdmin, senhaAdmin) VALUES (?, ?, ?)";
    $stmt_insert = $connection->prepare($query);
    $stmt_insert->bind_param("sss", $name, $email, $password_hash);
    $insert = $stmt_insert->execute();

    if ($insert) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Admin cadastrado com sucesso!'); window.location.href='../templates/loginAdmin.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse admin'); window.location.href='../templates/cadastroAdmin.php';</script>";
    }
}

$stmt->close();
$connection->close();
?>
