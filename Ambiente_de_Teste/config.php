<?php
$servername = "localhost";
$username = "root"; // seu usuário do MySQL (geralmente 'root' em um ambiente local)
$password = ""; // sua senha do MySQL (geralmente em branco em um ambiente local)
$dbname = "sistema_login"; // nome do banco de dados criado

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
