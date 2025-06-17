<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SKINS.COM - Início</title>
  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <style>
    body {
      background-color: rgb(255, 255, 255);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.4rem;
    }
    .content {
      flex: 1;
    }
    footer {
      margin-top: 100px;
      padding: 20px 0;
      background-color: rgba(0, 0, 0, 0.71);
      color: #fff;
      text-align: center;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">

      <!-- Menu à esquerda -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Menu
          </button>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="vendedorpage.php">Cadastrar
            <li><a class="dropdown-item" href="produtopage.php">Quero vender Skins </a></li>
            <li><a class="dropdown-item" href="produtoconsulta.php">meus produtos </a></li>
          </ul>
        </li>
      </ul>

      <!-- Logo à direita -->
      <a class="navbar-brand ms-auto" href="#">SKINS.COM</a>

    </div>
  </nav>

  <!-- Conteúdo principal -->
  <div class="container content">
    <div class="text-center">
      <h1 class="display-5">Bem-vindo ao SKINS.COM</h1>
      <p class="lead">Renove seu inventário com facilidade.</p>

      <!-- Imagem do Logo -->
      <img src="logo_skins.png" alt="Logo SKINS.COM" class="img-fluid my-4" style="max-height: 300px;">
    </div>
  </div>

  <!-- Rodapé -->
  <footer>
    &copy; <?php echo date('Y'); ?> SKINS.COM - Todos os direitos reservados
  </footer>

  <!-- Scripts -->
  <script src="bootstrap-5.3.6-dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" 
          crossorigin="anonymous"></script>
</body>
</html>
