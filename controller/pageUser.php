<?php
include "../banco/db.php";

$email = $_POST['emailUser'];
$password_nova = $_POST['senhaUser'];
$password_hash = password_hash($password_nova, PASSWORD_DEFAULT);
$name = $_POST['nameUser'];

$query = "UPDATE User SET ";
if($name != "" && $email != "" && $password_nova != ""){
    $query .= "nameUser = '$name', emailUser = '$email, senhaUser = $password_hash";
}
if ($name != "") {
    $query."nameUser = '$name'";
}
if ($email != ""){
    $query .= "emailUser = '$email";
}
if ($password_nova != ""){
    $query .= "senhaUser = $password_hash";
}

$query .= " WHERE emailUser = '{$_SESSION["usuario_logado"]}'";
$stmt = $connection->prepare($query);
$stmt->execute();
