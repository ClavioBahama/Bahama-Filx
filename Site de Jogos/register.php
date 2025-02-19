<?php
// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'site_jogos');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Captura os dados do formulário
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Verifica se o email já está cadastrado
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "O email já está cadastrado!";
} else {
    // Hash da senha
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserção no banco de dados
    $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Conta criada com sucesso!";
        header("Location: login.html");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
