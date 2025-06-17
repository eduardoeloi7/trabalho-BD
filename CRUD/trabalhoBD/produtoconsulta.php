<?php
include("conexao.php");

// Exclusão segura com prepared statement
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);
    $stmt = $conn->prepare("DELETE FROM Produto WHERE id_produto = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $msg = "Produto excluído com sucesso.";
    } else {
        $msg = "Erro ao excluir produto: " . $stmt->error;
    }
    $stmt->close();

    // Redirecionar para evitar reenvio do GET
    header("Location: produtoconsulta.php?msg=" . urlencode($msg));
    exit;
}

// Buscar produtos
$resultado = $conn->query("SELECT * FROM Produto ORDER BY id_produto DESC");
if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}

// Captura mensagem de sucesso ou erro após exclusão
$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Produtos Cadastrados - SKINS.COM</title>
    <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 0 4px rgba(0,0,0,0.3);
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(8px);
        }
        .card-img-top {
            height: 400px;
            object-fit: cover;
        }
        .container {
            margin-top: 70px;
        }
        .btn {
            min-width: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mb-4 text-center">Produtos Cadastrados</h1>

    <?php if ($msg): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <?= $msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    <?php endif; ?>

    <?php if ($resultado->num_rows === 0): ?>
        <p class="text-center fs-5">Nenhum produto cadastrado no momento.</p>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php while ($produto = $resultado->fetch_assoc()): ?>
                <div class="col">
                    <div class="card bg-light text-dark h-100">
                        <img src="uploads/<?= htmlspecialchars($produto['imagem']) ?>" alt="Imagem de <?= htmlspecialchars($produto['nome']) ?>" class="card-img-top" />
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($produto['nome']) ?></h5>
                            <p class="card-text mb-1"><strong>Tipo:</strong> <?= htmlspecialchars($produto['tipo']) ?></p>
                            <p class="card-text mb-3"><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                            <a href="editarproduto.php?id=<?= $produto['id_produto'] ?>" class="btn btn-warning mb-2">Editar</a>
                            <a href="produtoconsulta.php?excluir=<?= $produto['id_produto'] ?>" 
                               class="btn btn-danger mb-2" 
                               onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                Excluir
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
