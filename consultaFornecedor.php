<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Consulta de Fornecedores - Dio Autocar</title> <!-- Corrigido aqui -->
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

    .supplier-card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
      margin-bottom: 25px;
      padding: 25px;
      border-left: 4px solid var(--gold);
      transition: transform 0.3s ease;
    }

    .supplier-card:hover {
      transform: translateY(-5px);
    }

    .supplier-info {
      margin-bottom: 12px;
      display: flex;
      align-items: center;
    }

    .supplier-info i {
      color: var(--gold);
      min-width: 30px;
      font-size: 1.1rem;
    }

    .supplier-info span {
      color: var(--dark);
      font-weight: 500;
      min-width: 100px;
      display: inline-block;
    }

    .btn-action {
      margin-right: 10px;
      font-weight: 500;
      letter-spacing: 0.5px;
      padding: 8px 15px;
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
      padding: 12px 25px;
      font-size: 1.1rem;
      margin-top: 20px;
    }

    hr {
      border-top: 1px solid rgba(212, 175, 55, 0.3);
    }

    .container {
      max-width: 1200px;
    }

    .actions-container {
      margin-top: 20px;
      padding-top: 15px;
      border-top: 1px dashed #ddd;
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

<div class="container mt-4">
  <h1 class="text-center py-3"><i class="fas fa-truck me-2"></i>Consulta de Fornecedores</h1>

  <?php
  $servidor = "localhost:3306";
  $usuario = "root";
  $senha = "";

  try {
    $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);
    $consulta = $conexao->query("SELECT * FROM fornecedores");

    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
  ?>
      <div class="supplier-card">
        <div class="supplier-info">
          <i class="fas fa-id-card"></i>
          <span>Código:</span> <?php echo $linha['codigo']; ?>
        </div>
        <div class="supplier-info">
          <i class="fas fa-building"></i>
          <span>Nome:</span> <?php echo $linha['nome']; ?>
        </div>
        <div class="supplier-info">
          <i class="fas fa-id-badge"></i>
          <span>CPF:</span> <?php echo $linha['cpf']; ?>
        </div>
        <div class="supplier-info">
          <i class="fas fa-envelope"></i>
          <span>Email:</span> <?php echo $linha['email']; ?>
        </div>
        <div class="supplier-info">
          <i class="fas fa-map-marked-alt"></i>
          <span>CEP:</span> <?php echo $linha['cep']; ?>
        </div>
        <div class="supplier-info">
          <i class="fas fa-home"></i>
          <span>Número:</span> <?php echo $linha['numero']; ?>
        </div>

        <div class="actions-container text-end">
          <button class="btn btn-action btn-edit" onclick="window.location.href='alterarFornecedor.php?cod=<?php echo $linha['codigo']; ?>'">
            <i class="fas fa-edit me-1"></i>Alterar
          </button>
          <button class="btn btn-sm btn-action btn-delete" 
            onclick="window.location.href='confirmarExcluir.php?cod=<?php echo $linha['codigo']; ?>&tabela=fornecedores'">
            <i class='fas fa-trash-alt me-1'></i>Excluir
          </button>
        </div>
      </div>
  <?php
    }
  } catch (PDOException $e) {
    echo "<p>Erro ao conectar: " . $e->getMessage() . "</p>";
  }
  ?>

  <div class="text-center mt-4">
    <button class="btn btn-back" onclick="window.location.href='menu.php'">
      <i class="fas fa-arrow-left me-2"></i>Voltar ao Menu
    </button>
  </div>
</div>

</body>
</html>
