<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "systemCadastro";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error){
    die($connection->connect_error);
}

?>