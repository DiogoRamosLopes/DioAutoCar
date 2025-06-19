<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Consulta de Produtos - Dio Autocar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root {
      --gold: #d4af37;
      --dark: #121212;
      --light-dark: #1e1e1e;
    }

    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
      background-color: var(--dark) !important;
      border-bottom: 2px solid var(--gold);
    }

    .navbar-brand img {
      border: 2px solid var(--gold);
    }

    h1 {
      background: linear-gradient(to right, var(--dark), var(--light-dark)) !important;
      color: var(--gold) !important;
      padding: 20px 0;
      margin-bottom: 30px;
      font-weight: 600;
      letter-spacing: 1px;
      border-bottom: 2px solid var(--gold);
    }

    .product-card {
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      margin-bottom: 30px;
      padding: 20px;
      border-left: 4px solid var(--gold);
    }

    .product-info {
      margin-bottom: 12px;
    }

    .product-info strong {
      color: var(--dark);
      min-width: 100px;
      display: inline-block;
    }

    .btn-action {
      margin-right: 10px;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    .btn-edit {
      background-color: var(--gold);
      color: black;
      border: none;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
      border: none;
    }

    .btn-back {
      background-color: var(--light-dark);
      color: white;
      border: none;
    }

    .product-image {
      max-width: 100%;
      max-height: 200px;
      object-fit: cover;
      border: 2px solid var(--gold);
      border-radius: 5px;
    }

    .container {
      max-width: 1200px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="menu.php"><img src="img/logo.png" style="width:80px;" class="rounded-circle"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cadastro</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="cadastroCliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="cadastroFuncionario.php">Funcionário</a></li>
            <li><a class="dropdown-item" href="cadastroFornecedor.php">Fornecedor</a></li>
            <li><a class="dropdown-item" href="cadastroProduto.php">Produto</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Consulta</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="consultaCliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="consultaFuncionario.php">Funcionário</a></li>
            <li><a class="dropdown-item" href="consultaFornecedor.php">Fornecedor</a></li>
            <li><a class="dropdown-item" href="consultaProduto.php">Produto</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h1 class="text-center py-3"><i class="fas fa-car me-2"></i>Consulta de Produtos</h1>

  <?php
  $servidor = "localhost:3306";
  $usuario = "root";
  $senha = "";

  try {
    $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $consulta = $conexao->query("SELECT * FROM tb_produto");

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  ?>
  <div class="product-card row">
    <div class="col-md-4 text-center">
      <?php if (!empty($linha['imagem'])): ?>
        <img src="img/produtos/<?php echo htmlspecialchars($linha['imagem']); ?>" alt="Imagem do Produto" class="product-image">
      <?php else: ?>
        <img src="img/produtos/sem-imagem.png" alt="Sem Imagem" class="product-image">
      <?php endif; ?>
    </div>
    <div class="col-md-8">
      <div class="product-info">
        <strong><i class="fas fa-barcode me-2"></i>Código:</strong> <?php echo htmlspecialchars($linha['codigo']); ?>
      </div>
      <div class="product-info">
        <strong><i class="fas fa-tag me-2"></i>Nome:</strong> <?php echo htmlspecialchars($linha['nome']); ?>
      </div>
      <div class="product-info">
        <strong><i class="fas fa-align-left me-2"></i>Descrição:</strong> <?php echo htmlspecialchars($linha['descricao']); ?>
      </div>
      <div class="product-info">
        <strong><i class="fas fa-dollar-sign me-2"></i>Valor:</strong> R$ <?php echo number_format($linha['valor'], 2, ',', '.'); ?>
      </div>
      <div class="product-info">
        <strong><i class="fas fa-boxes me-2"></i>Estoque:</strong> <?php echo htmlspecialchars($linha['estoque']); ?>
      </div>

      <div class="mt-3">
        <button class="btn btn-action btn-edit" onclick="window.location.href='alterarProduto.php?cod=<?php echo urlencode($linha['codigo']); ?>'">
          <i class="fas fa-edit me-1"></i>Alterar
        </button>
        <button class="btn btn-action btn-delete" onclick="window.location.href='confirmarExcluir.php?cod=<?php echo urlencode($linha['codigo']); ?>&tabela=tb_produto'">
          <i class="fas fa-trash-alt me-1"></i>Excluir
        </button>
      </div>
    </div>
  </div>
  <?php
    }
  } catch (PDOException $e) {
    echo '<div class="alert alert-danger">Erro ao conectar ou consultar: ' . htmlspecialchars($e->getMessage()) . '</div>';
  }
  ?>

  <div class="text-center mt-4">
    <button class="btn btn-action btn-back" onclick="window.location.href='menu.php'">
      <i class="fas fa-arrow-left me-1"></i>Voltar ao Menu
    </button>
  </div>
</div>

</body>
</html>
