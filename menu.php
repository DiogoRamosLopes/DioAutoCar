<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Dio - AutoCar</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    :root {
      --gold: #d4af37;
      --dark: #121212;
      --light-dark: #1e1e1e;
      --card-bg: #1e1e1e;
      --card-hover-bg: #2a2a2a;
      --text-light: #eee;
    }

    body {
      background-color: var(--dark);
      color: var(--text-light);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background-color: var(--dark) !important;
      border-bottom: 2px solid var(--gold);
    }

    .navbar-brand img {
      border: 2px solid var(--gold);
      transition: transform 0.3s ease;
    }

    .navbar-brand:hover img {
      transform: scale(1.05);
    }

    .nav-link, .dropdown-item {
      color: var(--text-light) !important;
      font-weight: 500;
    }

    .nav-link:hover, .dropdown-item:hover {
      color: var(--gold) !important;
      text-decoration: underline;
    }

    /* Estilo para dropdown com fundo preto */
    .dropdown-menu {
      background-color: #000000 !important;
      border: 1px solid #333;
    }

    .dropdown-item {
      color: #fff !important;
    }

    .dropdown-item:hover, 
    .dropdown-item:focus {
      background-color: var(--gold) !important;
      color: #121212 !important;
    }

    /* Grid dos produtos */
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill,minmax(280px,1fr));
      gap: 20px;
      padding: 30px 0;
    }

    /* Card do produto */
    .product-card {
      background-color: var(--card-bg);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(212, 175, 55, 0.2);
      display: flex;
      flex-direction: column;
      transition: background-color 0.3s ease;
    }

    .product-card:hover {
      background-color: var(--card-hover-bg);
      box-shadow: 0 6px 25px rgba(212, 175, 55, 0.5);
    }

    .product-image {
      width: 100%;
      aspect-ratio: 16/9;
      object-fit: cover;
    }

    .product-info {
      padding: 15px 20px;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-title {
      font-size: 1.2rem;
      font-weight: 700;
      margin-bottom: 5px;
      color: var(--gold);
    }

    .product-desc {
      font-size: 0.9rem;
      color: #ccc;
      margin-bottom: 10px;
      flex-grow: 1;
      overflow: hidden;
      text-overflow: ellipsis;
      max-height: 3.6em; /* 2 lines */
      line-height: 1.8em;
    }

    .product-price {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--gold);
      margin-bottom: 10px;
    }

    .product-stock {
      font-size: 0.85rem;
      color: #aaa;
      margin-bottom: 15px;
    }

    .btn-details {
      align-self: start;
      background-color: var(--gold);
      border: none;
      color: black;
      padding: 8px 16px;
      font-weight: 600;
      border-radius: 6px;
      transition: background-color 0.3s ease;
      text-decoration: none;
    }

    .btn-details:hover {
      background-color: #c9a227;
      color: black;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="menu.php">
      <img src="img/logo.png" alt="Dio AutoCar" style="width:80px;" class="rounded-circle" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-plus-circle me-1"></i> Cadastro
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastroCliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="cadastroFuncionario.php">Funcionário</a></li>
            <li><a class="dropdown-item" href="cadastroFornecedor.php">Fornecedor</a></li>
            <li><a class="dropdown-item" href="cadastroProduto.php">Produto</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-search me-1"></i> Consulta
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="consultaCliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="consultaFuncionario.php">Funcionário</a></li>
            <li><a class="dropdown-item" href="consultaFornecedor.php">Fornecedor</a></li>
            <li><a class="dropdown-item" href="consultaProduto.php">Produto</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-sign-out-alt me-1"></i> Sair
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h2 class="mt-4 mb-3 text-center" style="color: var(--gold); font-weight: 700;">Produtos em Destaque</h2>

  <div class="product-grid">
    <?php
      try {
        $pdo = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM tb_produto ORDER BY codigo DESC LIMIT 12");

        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $imagem = !empty($produto['imagem']) ? "img/produtos/" . htmlspecialchars($produto['imagem']) : "img/no-image.png";

          // Limite de caracteres para descrição (exemplo: 100)
          $descricao_curta = mb_strimwidth($produto['descricao'], 0, 100, "...");

          echo '<div class="product-card">';
          echo '<img src="' . $imagem . '" alt="' . htmlspecialchars($produto['nome']) . '" class="product-image" />';
          echo '<div class="product-info">';
          echo '<div class="product-title">' . htmlspecialchars($produto['nome']) . '</div>';
          echo '<div class="product-desc">' . htmlspecialchars($descricao_curta) . '</div>';
          echo '<div class="product-price">R$ ' . number_format($produto['valor'], 2, ",", ".") . '</div>';
          echo '<div class="product-stock">Estoque: ' . intval($produto['estoque']) . '</div>';
          echo '<a href="consultaProduto.php" class="btn-details">Ver detalhes</a>';
          echo '</div></div>';
        }
      } catch (PDOException $e) {
        echo '<p class="text-danger">Erro ao carregar produtos: ' . htmlspecialchars($e->getMessage()) . '</p>';
      }
    ?>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
