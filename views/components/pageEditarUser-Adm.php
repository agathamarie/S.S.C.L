<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Editar Perfil Usuário</title>
    <link rel="stylesheet" href="../css/modeloLoginCadastro.css">
    <link rel="icon" href="../css/images/iconAdmin.png" type="image/png">
</head>

<?php
include "../banco/db.php"; 

if (isset($_GET['idUser']) && is_numeric($_GET['idUser'])) {
    $idUser = (int) $_GET['idUser'];

    $query = "SELECT ID, nameUser, email FROM User WHERE ID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $idUser);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
        echo '<div id="divForm">';
        echo '  <form method="POST" action="../controller/editarUser.php">';

        echo '      <input type="hidden" name="idUser" value="' . htmlspecialchars($user['ID']) . '">';

        echo '      <label for="nameUser">Nome:</label>';
        echo '      <input type="text" name="nameUser" class="inputForm" value="' . htmlspecialchars($user['nameUser']) . '" required><br>';

        echo '      <label for="email">Email:</label>';
        echo '      <input type="email" name="email" class="inputForm" value="' . htmlspecialchars($user['email']) . '" required><br>';

        echo '      <input type="submit" value="Salvar" id="salvar" name="salvar">';
        echo '  </form>';
        echo '</div>';
    } else {
        echo '<p>Usuário não encontrado.</p>';
    }
} else {
    echo '<p>ID do usuário não especificado ou inválido.</p>';
}
?>