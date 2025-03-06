<?php
include "../banco/db.php";

if (isset($_POST['idUser'], $_POST['nameUser'], $_POST['emailUser'])) {
    $idUser = $_POST['idUser'];
    $name = $_POST['nameUser'];
    $email = $_POST['emailUser'];

    $query_update = "UPDATE User SET nameUser = ?, emailUser = ? WHERE ID = ?";
    $stmt = $connection->prepare($query_update);
    $stmt->bind_param("ssi", $name, $email, $idUser);

    if ($stmt->execute()) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Usuário alterado com sucesso!'); window.location.href='../templates/pageAdmin.php';</script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Erro ao alterar o usuário!'); window.location.href='../templates/pageAdmin.php';</script>";
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Erro: Dados não recebidos corretamente!<br>";
    echo "ID: " . htmlspecialchars($_POST['idUser']) . "<br>";
    echo "Name: " . htmlspecialchars($_POST['nameUser']) . "<br>";
    echo "Email: " . htmlspecialchars($_POST['emailUser']) . "<br>";
}
?>
