<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM vendedor WHERE id_vendedor = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: vendedorconsulta.php");
        exit();
    } else {
        echo "Erro ao excluir vendedor: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
