<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    $stmt = $conn->prepare("UPDATE vendedor SET nome = ?, email = ? WHERE id_vendedor = ?");
    $stmt->bind_param("ssi", $nome, $email, $id);

    if ($stmt->execute()) {
        header("Location: vendedorconsulta.php");
        exit();
    } else {
        echo "Erro ao atualizar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acesso inválido.";
}
?>
