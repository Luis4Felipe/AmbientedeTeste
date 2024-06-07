<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$login = $_SESSION['login'];

if (isset($_GET['new_password'])) {
    $new_password = $_GET['new_password'];
    // Simulação de atualização de senha no banco de dados
    require 'config.php';
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET senha = ? WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $hashed_password, $login);
    if ($stmt->execute()) {
        echo "Senha redefinida com sucesso.";
    } else {
    $stmt->close();
    $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Redefinir Senha</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>
        <form action="reset_password.php" method="get">
            <label for="new_password">Nova Senha:</label>
            <input type="password" id="new_password" name="new_password" required>
            <br>
            <button type="submit">Redefinir</button>
        </form>
        <form action="login.php" method="get">
            <button type="submit">Voltar a Página de Login</button>
        </form>
    </div>
</body>
</html>
