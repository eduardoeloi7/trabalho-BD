<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Prepare e execute
    $stmt = $conn->prepare("INSERT INTO vendedor (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $nome, $email);

    try {
        $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redireciona para página de sucesso
        header("Location: cadastro.php");
        exit();
    } catch (Exception $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
} else {
    echo "Método inválido.";
}
?>
