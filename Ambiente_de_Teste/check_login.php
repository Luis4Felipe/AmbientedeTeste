<?php
session_start();
require 'config.php';

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT senha FROM usuarios WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($hashed_password);

if ($stmt->num_rows > 0) {
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        $_SESSION['login'] = $login;
        header("Location: welcome.php");
    } else {
        echo "Senha inválida. <a href='login.php'>Tente novamente</a>.";
    }
} else {
    echo "Usuário não encontrado. <a href='register.php'>Cadastre-se</a>.";
}
$stmt->close();
$conn->close();
?>
