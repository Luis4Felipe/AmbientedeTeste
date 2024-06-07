<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo</h2>
        <p>Parabéns, você entrou no nosso site!</p>
        <div class="button-group">
            <form action="reset_password.php" method="get">
                <button type="submit">Redefinir Senha</button>
            </form>
            <form action="login.php" method="get">
                <button type="submit">Voltar a Página de Login</button>
            </form>
        </div>
    </div>
</body>
</html>
