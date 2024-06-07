<?php
require 'config.php';

$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "SELECT id FROM usuarios WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Usuário já cadastrado. <a href='login.php'>Tente fazer login</a>.";
} else {
    $stmt->close();
    $sql = "INSERT INTO usuarios (login, senha) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password);
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso. <a href='login.php'>Faça login</a>.";
    } else {
        echo "Erro ao cadastrar usuário.";
    }
}
$stmt->close();
$conn->close();
?>