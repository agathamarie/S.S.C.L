<?php
include "../banco/db.php"; 

session_start();

if (isset($_SESSION["user_logado"])) {
    $query = "SELECT * FROM User WHERE email = ?";
    $stmt = $connection->prepare($query);

    if ($stmt === false) {
        die('Erro na preparação da consulta: ' . $connection->error);
    }

    $stmt->bind_param("s", $_SESSION["user_logado"]);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $user = $resultado->fetch_assoc();
} else {
    echo "Adm não logado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['excluirUser'])) {
    $idUser = $_POST['excluirUser'];
    $queryDelete = "DELETE FROM User WHERE ID = ?";
    $stmt = $connection->prepare($queryDelete);

    if ($stmt === false) {
        die('Erro na preparação da consulta de exclusão: ' . $connection->error);
    }

    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    
    header("Location: ../templates/pageAdmin.php");
    exit();
}

$query = "SELECT ID, nameUser, email FROM User WHERE typeUser = 'userComum'";
$stmt = $connection->prepare($query);

if ($stmt === false) {
    die('Erro na preparação da consulta de listagem de usuários: ' . $connection->error);
}

$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($user = $resultado->fetch_assoc()) {
        echo '<div class="card">';
        echo '  <div class="container">';
        echo '      <h3>' . htmlspecialchars($user['nameUser']) . '</h3>';
        echo '      <p>' . htmlspecialchars($user['email']) . '</p>';
        echo '  </div>';
        echo '  <div class="container">';
        echo '      <button class="editarUser" onclick="abrirPopup(' . $user['ID'] . ')">Editar</button>';
        echo '      <form id="formExcluir' . $user['ID'] . '" method="POST">';
        echo '          <input type="hidden" name="excluirUser" value="' . $user['ID'] . '">';
        echo '          <button type="button" class="excluirUser" onclick="confirmarExclusao(' . $user['ID'] . ')">Excluir</button>';
        echo '      </form>';
        echo '  </div>';
        echo '</div>';
    }
} else {
    echo 'Nenhum usuário encontrado.';
}
?>

<script>
function abrirPopup(idUser) {
    window.location.href = '../components/pageEditarUser-Adm.php?idUser=' + idUser;
}

function confirmarExclusao(idUser) {
    if (confirm("Você tem certeza que deseja excluir este usuário?")) {
        document.getElementById('formExcluir' + idUser).submit();
    }
}
</script>