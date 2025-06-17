<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vendedor Cadastrado - SKINS.COM</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: rgb(115,115,117);
    }
    .card {
      max-width: 600px;
      margin: 30px auto;
    }
    .logo {
      width: 120px;
      height: 105px;
      object-fit: contain;
      margin: 20px auto;
      display: block;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Logo -->
    <img src="logo_skins.png" alt="Logo SKINS.COM" class="logo">

    <!-- Card de sucesso -->
    <div class="card bg-light p-4 text-center">
      <h2 class="text-success mb-4">Vendedor cadastrado com sucesso!</h2>
      <a href="vendedorconsulta.php" class="btn btn-primary">Consultar Vendedores</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
