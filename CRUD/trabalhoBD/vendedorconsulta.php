<?php
include 'conexao.php';

// Buscar vendedores do banco
$resultado = $conn->query("SELECT * FROM vendedor ORDER BY id_vendedor DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Vendedores Cadastrados - SKINS.COM</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: rgb(115, 115, 117); }
    .card { max-width: 300px; margin: 10px; }
    .logo { width: 120px; height: 105px; object-fit: contain; margin-top: 20px; }
  </style>
</head>
<body>
  <div class="container my-5">
    <!-- Logo -->
    <div class="text-center mb-4">
      <img src="logo_skins.png" alt="Logo SKINS.COM" class="img-fluid img-thumbnail logo" />
    </div>

    <!-- Título -->
    <div class="text-center mb-4">
      <h2 class="bg-dark text-white py-3 rounded">Vendedores Cadastrados</h2>
    </div>

    <!-- Lista de Vendedores -->
    <div class="row justify-content-center">
      <?php while ($vendedor = $resultado->fetch_assoc()): ?>
        <div class="col-md-4 d-flex justify-content-center">
          <div class="card">
            <div class="card-body text-center">
              <h5 class="card-title"><?= htmlspecialchars($vendedor['nome']) ?></h5>
              <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($vendedor['email']) ?></p>
              <a href="editarvendedor.php?id=<?= $vendedor['id_vendedor'] ?>" class="btn btn-warning btn-sm mt-2">Editar</a>
              <a href="excluirvendedor.php?id=<?= $vendedor['id_vendedor'] ?>" 
                 class="btn btn-danger btn-sm mt-2"
                 onclick="return confirm('Tem certeza que deseja excluir este vendedor?');">
                 Excluir
              </a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <!-- Botões -->
    <div class="text-center mt-4">
      <a href="vendedorpage.php" class="btn btn-success me-2">Cadastrar Novo Vendedor</a>
      <a href="index.php" class="btn btn-secondary">Home</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
