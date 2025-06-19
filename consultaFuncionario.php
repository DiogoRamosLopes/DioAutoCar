<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Consulta de Funcionários - Dio AutoCar</title>
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
    
    .table {
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
    
    .table thead th {
      background-color: var(--dark);
      color: var(--gold);
      border-bottom: 2px solid var(--gold);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.9rem;
      letter-spacing: 0.5px;
    }
    
    .table tbody tr {
      transition: all 0.2s ease;
    }
    
    .table tbody tr:hover {
      background-color: rgba(212, 175, 55, 0.05);
      transform: translateX(2px);
    }
    
    .btn-action {
      margin: 2px;
      font-weight: 500;
      min-width: 90px;
    }
    
    .btn-edit {
      background-color: var(--gold);
      color: black;
      border: none;
    }
    
    .btn-edit:hover {
      background-color: #c9a227;
    }
    
    .btn-delete {
      background-color: #dc3545;
      color: white;
      border: none;
    }
    
    .btn-delete:hover {
      background-color: #c82333;
    }
    
    .btn-back {
      background-color: var(--light-dark);
      color: white;
      border: none;
      padding: 12px;
      font-size: 1.1rem;
      margin-top: 20px;
    }
    
    .btn-back:hover {
      background-color: #2c2c2c;
    }
    
    .container {
      max-width: 1400px;
    }
    
    /* Responsividade da tabela */
    @media (max-width: 992px) {
      .table-responsive {
        overflow-x: auto;
      }
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
  <h1 class="text-center py-3"><i class="fas fa-users me-2"></i>Consulta de Funcionários</h1>
  
  <div class="table-responsive">
    <?php
    $servidor = "localhost:3306";
    $usuario = "root";
    $senha = "";

    try {
      $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $consulta = $conexao->query("SELECT * FROM funcionarios");

      echo "<table class='table table-hover'>";
      echo "<thead>
            <tr>
              <th><i class='fas fa-id-card me-1'></i>Código</th>
              <th><i class='fas fa-user me-1'></i>Nome</th>
              <th><i class='fas fa-id-badge me-1'></i>CPF</th>
              <th><i class='fas fa-address-card me-1'></i>RG</th>
              <th><i class='fas fa-phone me-1'></i>Celular</th>
              <th><i class='fas fa-envelope me-1'></i>Email</th>
              <th><i class='fas fa-map-marker-alt me-1'></i>CEP</th>
              <th><i class='fas fa-home me-1'></i>Número</th>
              <th>Ações</th>
            </tr>
            </thead><tbody>";

      while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <td>{$linha['codigo']}</td>
                <td>{$linha['nome']}</td>
                <td>{$linha['cpf']}</td>
                <td>{$linha['rg']}</td>
                <td>{$linha['celular']}</td>
                <td>{$linha['email']}</td>
                <td>{$linha['cep']}</td>
                <td>{$linha['numero']}</td>
                <td>
                  <button class='btn btn-sm btn-action btn-edit' onclick=\"window.location.href='alterarFuncionario.php?cod={$linha['codigo']}'\">
                    <i class='fas fa-edit me-1'></i>Alterar
                  </button>
                  <button class='btn btn-sm btn-action btn-delete' onclick=\"window.location.href='confirmarExcluir.php?cod={$linha['codigo']}&tabela=funcionarios'\">
                    <i class='fas fa-trash-alt me-1'></i>Excluir
                  </button>
                </td>
              </tr>";
      }

      echo "</tbody></table>";
    } catch(PDOException $e) {
      echo "<div class='alert alert-danger'>Erro ao conectar ou consultar: " . $e->getMessage() . "</div>";
    }
    ?>
  </div>
  
  <div class="d-grid">
    <button type="button" class="btn btn-back" onclick="window.location.href='menu.php'">
      <i class="fas fa-arrow-left me-2"></i>Voltar ao Menu
    </button>
  </div>
</div>

</body>
</html>
