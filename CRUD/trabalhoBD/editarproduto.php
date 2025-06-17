<?php
include("conexao.php");

// Verifica se o ID foi enviado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de produto inválido.");
}

$id = intval($_GET['id']);
$erro = '';

// Buscar dados do produto
$stmt = $conn->prepare("SELECT * FROM Produto WHERE id_produto = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    die("Produto não encontrado.");
}
$produto = $result->fetch_assoc();
$stmt->close();

// Atualização se enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $tipo = trim($_POST['tipo']);
    $preco = floatval($_POST['preco']);
    $nome_imagem = $produto['imagem'];

    // Verifica imagem nova (opcional)
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ext, $permitidas)) {
            $erro = "Formato de imagem inválido.";
        } else {
            $pasta = 'uploads/';
            if (!is_dir($pasta)) mkdir($pasta, 0755, true);
            $nome_imagem = uniqid() . "." . $ext;
            move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $nome_imagem);

            // Remove imagem antiga (se desejar)
            if ($produto['imagem'] && file_exists($pasta . $produto['imagem'])) {
                unlink($pasta . $produto['imagem']);
            }
        }
    }

    if (!$erro) {
        $stmt = $conn->prepare("UPDATE Produto SET nome = ?, tipo = ?, preco = ?, imagem = ? WHERE id_produto = ?");
        $stmt->bind_param("ssdsi", $nome, $tipo, $preco, $nome_imagem, $id);
        if ($stmt->execute()) {
            header("Location: produtoconsulta.php?msg=" . urlencode("Produto atualizado com sucesso."));
            exit;
        } else {
            $erro = "Erro ao atualizar: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Produto - SKINS.COM</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #121212; color: #fff; }
    .container { max-width: 600px; margin-top: 60px; }
    .card { background-color: #1f1f1f; padding: 20px; border-radius: 10px; }
    .form-label { font-weight: bold; }
    img.preview { width: 100%; max-height: 250px; object-fit: cover; margin-bottom: 15px; border-radius: 8px; }
  </style>
</head>
<body>
<div class="container">
  <h2 class="mb-4 text-center">Editar Produto</h2>

  <?php if ($erro): ?>
    <div class="alert alert-danger"><?= $erro ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" class="card">
    <div class="mb-3">
      <label class="form-label">Nome do Produto</label>
      <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Tipo</label>
      <input type="text" name="tipo" class="form-control" value="<?= htmlspecialchars($produto['tipo']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Preço (R$)</label>
      <input type="number" step="0.01" min="0" name="preco" class="form-control" value="<?= htmlspecialchars($produto['preco']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Imagem Atual</label><br>
      <img src="uploads/<?= htmlspecialchars($produto['imagem']) ?>" class="preview" alt="Imagem atual">
    </div>
    <div class="mb-3">
      <label class="form-label">Nova Imagem (opcional)</label>
      <input type="file" name="imagem" class="form-control" accept=".jpg,.jpeg,.png,.gif">
    </div>
    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
  </form>
  <div class="text-center mt-3">
    <a href="produtoconsulta.php" class="btn btn-secondary">Cancelar e Voltar</a>
  </div>
</div>
</body>
</html>
