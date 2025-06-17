<?php
include 'conexao.php';

// Verifica se o ID foi passado
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID do vendedor não informado.";
    exit();
}

$id = intval($_GET['id']);

// Busca os dados do vendedor
$stmt = $conn->prepare("SELECT * FROM vendedor WHERE id_vendedor = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Vendedor não encontrado.";
    exit();
}

$vendedor = $resultado->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Vendedor - SKINS.COM</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: rgb(115, 115, 117); }
    .logo { width: 120px; height: 105px; object-fit: contain; margin-top: 20px; }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="text-center mb-4">
      <img src="logo_skins.png" class="img-fluid img-thumbnail logo" alt="Logo SKINS.COM">
    </div>
    <div class="text-center mb-4">
      <h2 class="bg-dark text-white py-3 rounded">Editar Vendedor</h2>
    </div>
    <div class="card mx-auto" style="max-width: 600px;">
      <div class="card-body bg-light">
        <form action="atualizarvendedor.php" method="POST">
          <input type="hidden" name="id" value="<?= $vendedor['id_vendedor'] ?>">

          <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required value="<?= htmlspecialchars($vendedor['nome']) ?>">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" required value="<?= htmlspecialchars($vendedor['email']) ?>">
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="vendedorconsulta.php" class="btn btn-secondary">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
