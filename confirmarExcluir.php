<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Confirmar Exclusão - Dio AutoCar</title>
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
      background-color: var(--dark);
      border-bottom: 2px solid var(--gold);
    }
    
    .navbar-brand img {
      border: 2px solid var(--gold);
      transition: transform 0.3s ease;
    }
    
    .navbar-brand:hover img {
      transform: scale(1.05);
    }
    
    h1 {
      background: linear-gradient(to right, var(--dark), var(--light-dark));
      color: var(--gold);
      padding: 20px 0;
      margin-bottom: 30px;
      font-weight: 600;
      letter-spacing: 1px;
      border-bottom: 2px solid var(--gold);
    }
    
    .confirmation-container {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 20px rgba(0,0,0,0.1);
      padding: 30px;
      border-top: 4px solid var(--gold);
      max-width: 600px;
      margin: 0 auto;
      text-align: center;
    }
    
    .warning-icon {
      color: #dc3545;
      font-size: 4rem;
      margin-bottom: 20px;
    }
    
    .confirmation-message {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: var(--dark);
    }
    
    .btn-confirm {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      margin-right: 15px;
    }
    
    .btn-confirm:hover {
      background-color: #bb2d3b;
      transform: translateY(-2px);
    }
    
    .btn-cancel {
      background-color: var(--light-dark);
      color: white;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }
    
    .btn-cancel:hover {
      background-color: #2c2c2c;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark">
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
  <h1 class="text-center py-3"><i class="fas fa-exclamation-triangle me-2"></i>Confirmar Exclusão</h1>
  
  <div class="confirmation-container">
    <?php
    $codigo = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
    $tabela = filter_input(INPUT_GET, 'tabela', FILTER_SANITIZE_STRING);

    // Permitir somente tabelas esperadas para segurança
    $tabelas_validas = ['tb_cliente', 'funcionarios', 'fornecedores', 'tb_produto'];

    if (!in_array($tabela, $tabelas_validas)) {
      echo "<p class='text-danger'>Tabela inválida.</p>";
      echo "<p><a href='menu.php' class='btn btn-back'>Voltar ao Menu</a></p>";
      exit;
    }

    $entidade = '';
    $pagina_retorno = '';
    
    switch($tabela) {
      case 'tb_cliente':
        $entidade = 'Cliente';
        $pagina_retorno = 'consultaCliente.php';
        break;
      case 'funcionarios':
        $entidade = 'Funcionário';
        $pagina_retorno = 'consultaFuncionario.php';
        break;
      case 'fornecedores':
        $entidade = 'Fornecedor';
        $pagina_retorno = 'consultaFornecedor.php';
        break;
      case 'tb_produto':
        $entidade = 'Produto';
        $pagina_retorno = 'consultaProduto.php';
        break;
    }
    ?>
    
    <div class="warning-icon">
      <i class="fas fa-exclamation-circle"></i>
    </div>
    
    <div class="confirmation-message">
      <p>Tem certeza que deseja excluir este <?php echo htmlspecialchars($entidade); ?> permanentemente?</p>
      <p>Esta ação não pode ser desfeita.</p>
    </div>
    
    <div class="text-center">
      <form action="excluirRegistro.php" method="POST">
        <input type="hidden" name="codigo" value="<?php echo htmlspecialchars($codigo); ?>">
        <input type="hidden" name="tabela" value="<?php echo htmlspecialchars($tabela); ?>">
        
        <button type="submit" class="btn btn-confirm">
          <i class="fas fa-trash-alt me-2"></i>Confirmar Exclusão
        </button>
        
        <a href="<?php echo htmlspecialchars($pagina_retorno); ?>" class="btn btn-cancel">
          <i class="fas fa-times me-2"></i>Cancelar
        </a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
