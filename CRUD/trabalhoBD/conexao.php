<?php
$servername = "localhost";
$username = "root";       // seu usuário do MySQL
$password = "";           // sua senha do MySQL
$dbname = "loja_skins";  // nome do seu banco

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Opcional: ativar exceções no mysqli para capturar erros via try-catch
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
    