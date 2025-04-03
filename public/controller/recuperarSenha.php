<?php
include "../banco/db.php";

$email = $_POST['emailUser'];

if (empty($email)) {
    echo "<script>
            alert('Por favor, preencha todos os campos!');
            window.location.href='../templates/loginUser.php';
          </script>";
    exit();
}

$query = "SELECT * FROM User WHERE email = ?";
$stmt = $connection->prepare($query);

if ($stmt === false) {
    die("Erro ao preparar query de verificação do email: " . $connection->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $user = $resultado->fetch_assoc();

    function token($tamanho = 10, $id = "", $up = false) {
        $characters = $id . 'abcdefghijklmnopqrstuvwxyz0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $tamanho; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if ($up === true) {
            return strtoupper($id . $randomString);
        } else {
            return $id . $randomString;
        }
    }

    $codigo_verificacao = token(5);

    $query = "INSERT INTO Token (codigo) VALUES (?)";
    $stmt = $connection->prepare($query);
    if ($stmt === false) {
        die("Erro ao preparar query do token: " . $connection->error);
    }
    $stmt->bind_param("s", $codigo_verificacao);
    if ($stmt->execute()){
        $assunto = 'Recuperar Senha S.S.C.L - Seu código de confirmação';
        $corpo = "Olá! Você solicitou a troca de senha da sua conta {$email}.\nSeu código de verificação é: {$codigo_verificacao}";
        $headers = "From: sscloficial.envio@gmail.com";
    
        if (mail($email, $assunto, $corpo, $headers)) {
            echo "<script>
                    alert('Código enviado com sucesso!');
                    window.location.href='../templates/confirmarCodigo.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Algo deu errado, por favor tente novamente mais tarde!');
                    window.location.href='../templates/recuperarSenhaUser.php';
                  </script>";
        }
    } else {
        echo "<script>
            alert('Algo deu errado ao gerar o código, por favor tente novamente mais tarde!');
            window.location.href='../templates/recuperarSenhaUser.php';
            </script>";
    }
} else {
    echo "<script>
            alert('Usuário não cadastrado ou e-mail incorreto!');
            window.location.href='../templates/loginUser.php';
          </script>";
}

$stmt->close();
$connection->close();
?>