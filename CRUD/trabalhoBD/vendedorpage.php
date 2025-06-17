<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro de Vendedor - SKINS.COM</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: rgb(115, 115, 117); }
    .card { box-shadow: 0 0 10px rgba(145, 64, 64, 0); }
    .logo { width: 120px; height: 105px; object-fit: contain; }
  </style>
</head>
<body>
  <div class="container my-5">
    <div class="text-center mb-4">
      <img src="logo_skins.png" class="img-fluid img-thumbnail logo" alt="Logo SKINS.COM" />
    </div>
    <div class="text-center mb-4">
      <h2 class="bg-dark text-white py-3 rounded">SKINS.COM</h2>
    </div>
    <div class="card mx-auto" style="max-width: 600px;">
      <div class="card-header bg-dark text-white text-center">
        <h3 class="mb-0">Cadastro/consulta de Vendedores</h3>
      </div>
      <div class="card-body bg-light">
        <form action="cadvendedor.php" method="POST">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome do Vendedor</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: vendedorskins123" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">E-mail do Vendedor</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email de contato" required />
          </div>
          <div class="text-center mt-4">
            <button type="submit" class="btn btn-success me-2">Cadastrar</button>
            <a href="vendedorconsulta.php" class="btn btn-primary me-2">Consultar</a>
            <a href="index.php" class="btn btn-secondary">Home</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
