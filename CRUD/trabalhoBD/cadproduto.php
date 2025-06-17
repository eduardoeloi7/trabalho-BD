<?php 
// Conexão com o banco
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "loja_skins";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função simples para limpar input
function clean_input($data) {
    return htmlspecialchars(trim($data));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = clean_input($_POST['nome']);
    $tipo = clean_input($_POST['tipo']);
    $preco = floatval($_POST['preco']);
    $id_vendedor = isset($_POST['id_vendedor']) ? intval($_POST['id_vendedor']) : 0;

    if ($id_vendedor <= 0) {
        die("Erro: Vendedor não selecionado.");
    }

    // Upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($extensao, $permitidos)) {
            die("Formato de imagem não permitido.");
        }

        // Pasta para salvar as imagens
        $pasta_upload = "uploads/";
        if (!is_dir($pasta_upload)) {
            mkdir($pasta_upload, 0755, true);
        }

        // Nome único para evitar conflitos
        $nome_arquivo = uniqid() . "." . $extensao;
        $caminho_upload = $pasta_upload . $nome_arquivo;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_upload)) {
            // Inserir no banco incluindo id_vendedor
            $stmt = $conn->prepare("INSERT INTO Produto (nome, tipo, preco, imagem, id_vendedor) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssdsi", $nome, $tipo, $preco, $nome_arquivo, $id_vendedor);

            if ($stmt->execute()) {
                // Cadastro OK, exibir confirmação
                ?>
                <!DOCTYPE html>
                <html lang="pt-br">
                <head>
                  <meta charset="utf-8" />
                  <meta name="viewport" content="width=device-width, initial-scale=1" />
                  <title>Produto Cadastrado - SKINS.COM</title>
                  <link href="bootstrap-5.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
                  <style>
                    body { background-color: rgb(115,115,117); }
                    .card { max-width: 600px; margin: 30px auto; }
                    .logo { width: 120px; height: 105px; object-fit: contain; margin: 20px auto; display: block; }
                  </style>
                </head>
                <body>
                  <div class="container">
                    <img src="logo_skins.png" alt="Logo SKINS.COM" class="logo" />
                    <div class="card bg-light p-4 text-center">
                      <h2 class="text-success mb-4">Produto cadastrado com sucesso!</h2>
                      <h4>Nome: <?= htmlspecialchars($nome) ?></h4>
                      <p>Tipo: <?= htmlspecialchars($tipo) ?></p>
                      <p>Preço: R$ <?= number_format($preco, 2, ',', '.') ?></p>
                      <img src="<?= $caminho_upload ?>" alt="Imagem do Produto" class="img-fluid mb-3" style="max-height:300px;"/>
                      <a href="produtopage.php" class="btn btn-primary me-2">Cadastrar outro produto</a>
                      <a href="produtoconsulta.php" class="btn btn-secondary">Ver produtos</a>
                    </div>
                  </div>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
                </body>
                </html>
                <?php
            } else {
                echo "Erro ao cadastrar produto: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Nenhuma imagem enviada ou erro no upload.";
    }
} else {
    echo "Método inválido.";
}

$conn->close();
?>
