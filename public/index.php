<?php

session_start();

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] !== ''){
    header('Location: ../src/templates/pageUser.php');
    exit();
} else if (isset($_SESSION['adm_logado']) && $_SESSION['adm_logado'] !== ''){
    header('Location: ../src/templates/pageAdmin.php');
    exit();
} else {
    header('Location: ../src/templates/home.php');
    exit();
}