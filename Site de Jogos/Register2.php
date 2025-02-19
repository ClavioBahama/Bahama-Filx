<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'site_jogos');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura os dados do formulário
$email = $_POST['email'];
$password = $_POST['password'];

// Verifica o email e recupera a senha hash
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "Login bem-sucedido!";
        // Redirecionar para a página da conta ou home
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Email não encontrado!";
}

$conn->close();
?>
