<?php
    session_start();
    if (!isset($_SESSION['type_user'])) {
        header('Location: ../../views/pages/login/login.php');
        exit;
    }
    $type_user = $_SESSION['type_user'];

    if ($type_user == 'adm'){
        $location = '../../public/components/navBarAdm.php';
        $css = '../../public/css/pagesAdm.css';
    } elseif ($type_user == 'user') {
        $locantion = '../../public/components/navBarUser.php';
        $css = '../../public/css/pagesUser.css';
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SS</title>
    <link href="/website/css/uicons.css">
    <link rel="icon" href="../../public/images/iconSite.png" type="image/png">
    <link rel="stylesheet" href="../../public/css/default.css">
    <link rel="stylesheet" href="<?= $css ?>">
</head>
<body>

    <section id="navBar">
        <?php
            include($location);
        ?>
    </section>