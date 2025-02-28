<?php
include "../banco/db.php"; 

$query = "SELECT nameUser, emailUser FROM User";
$stmt = $connection->prepare($query);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    while ($user = $resultado->fetch_assoc()) {
        echo '<div class="card">';
        echo '  <div class="infosUser">';
        echo '      <h3>' . htmlspecialchars($user['nameUser']) . '</h3>';
        echo '      <p>' . htmlspecialchars($user['emailUser']) . '</p>';
        echo '  </div>';
        echo '  <button class="editarUser" name="editarUser">Editar</button>';
        echo '  <button class="excluirUser" name="excluirUser">Excluir</button>';
        echo '</div>';
    }
} else {
    echo 'Nenhum usuário encontrado.';
}
?>
