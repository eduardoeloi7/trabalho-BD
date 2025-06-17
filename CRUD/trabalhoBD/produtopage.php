<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro Produto - SKINS.COM</title>

  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous" />

  <style>
    body {
      background-color: rgb(115, 115, 117);
    }
    .logo {
      width: 120px;
      height: 105px;
      object-fit: contain;
      margin-top: 20px;
    }
    .card {
      box-shadow: 0 0 10px rgba(145, 64, 64, 0);
      max-width: 600px;
      margin: auto;
    }
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
      <h2 class="bg-dark text-white py-3 rounded">Cadastrar Produto</h2>
    </div>

    <div class="card bg-light p-4">

      <form action="cadproduto.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="nome" class="form-label">Nome do Produto</label>
          <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Skin AK-47 | Redline" required />
        </div>

        <!-- Campo Tipo como select -->
        <div class="mb-3">
          <label for="tipo" class="form-label">Tipo</label>
          <select id="tipo" name="tipo" class="form-select" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="Rifle">Rifle</option>
            <option value="Pistola">Pistola</option>
            <option value="Rifle de Precisão">Rifle de Precisão</option>
            <option value="Faca">Faca</option>
            <option value="Luva">Luva</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="preco" class="form-label">Preço (R$)</label>
          <input type="number" step="0.01" min="0" id="preco" name="preco" class="form-control" placeholder="Ex: 150.00" required />
        </div>

        <!-- Campo vendedor responsável -->
        <div class="mb-3">
          <label for="id_vendedor" class="form-label">Vendedor Responsável</label>
          <select id="id_vendedor" name="id_vendedor" class="form-select" required>
            <option value="">Selecione um vendedor</option>
            <?php
              include 'conexao.php';
              $vendedores = $conn->query("SELECT id_vendedor, nome FROM vendedor ORDER BY nome");
              while ($v = $vendedores->fetch_assoc()):
            ?>
              <option value="<?= $v['id_vendedor'] ?>"><?= htmlspecialchars($v['nome']) ?></option>
            <?php endwhile; ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="imagem" class="form-label">Imagem do Produto</label>
          <input type="file" id="imagem" name="imagem" class="form-control" accept="image/*" required />
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-success me-2">Cadastrar</button>
          <a href="index.php" class="btn btn-secondary">Home</a>
        </div>

      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</body>
</html>
