<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Alterar Produto - Dio AutoCar</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
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
      transition: transform 0.3s ease;
    }
    .navbar-brand:hover img {
      transform: scale(1.05);
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
    .form-container {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 20px rgba(0,0,0,0.1);
      padding: 30px;
      border-top: 4px solid var(--gold);
      max-width: 800px;
      margin: 0 auto;
    }
    .form-label {
      font-weight: 500;
      color: var(--dark);
      margin-bottom: 8px;
      display: block;
    }
    .form-control {
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }
    .form-control[readonly] {
      background-color: #f8f9fa;
    }
    .btn-update {
      background-color: var(--gold);
      color: black;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }
    .btn-update:hover {
      background-color: #c9a227;
      transform: translateY(-2px);
    }
    .btn-back {
      background-color: var(--light-dark);
      color: white;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }
    .btn-back:hover {
      background-color: #2c2c2c;
      transform: translateY(-2px);
      text-decoration: none;
      color: white;
    }
    .input-group-text {
      background-color: var(--gold);
      color: black;
      font-weight: 600;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="menu.php"><img src="img/logo.png" style="width:80px;" class="rounded-circle" alt="Logo"></a>
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
            <li><a class="dropdown-item" href="cadastroUsuario.php">Usuário</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Consulta</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="consultaCliente.php">Cliente</a></li>
            <li><a class="dropdown-item" href="consultaFuncionario.php">Funcionário</a></li>
            <li><a class="dropdown-item" href="consultaFornecedor.php">Fornecedor</a></li>
            <li><a class="dropdown-item" href="consultaProduto.php">Produto</a></li>
            <li><a class="dropdown-item" href="consultaUsuario.php">Usuário</a></li>
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
  <h1 class="text-center py-3"><i class="fas fa-edit me-2"></i>Alterar Produto</h1>

  <div class="form-container">
    <?php
    $conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
    $codigo = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
    $select = $conexao->prepare("SELECT * FROM tb_produto WHERE codigo = :codigo");
    $select->bindParam(':codigo', $codigo, PDO::PARAM_INT);
    $select->execute();
    $row = $select->fetch();
    ?>

    <form action="confirmaAlterarProduto.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="codigo" value="<?php echo $row['codigo']; ?>">
      <input type="hidden" name="imagemAntiga" value="<?php echo htmlspecialchars($row['imagem']); ?>">

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-tag me-2"></i>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-align-left me-2"></i>Descrição</label>
        <textarea class="form-control" name="descricao" required><?php echo htmlspecialchars($row['descricao']); ?></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-dollar-sign me-2"></i>Valor</label>
        <input type="text" class="form-control" name="valor" value="<?php echo number_format($row['valor'], 2, ',', '.'); ?>" required>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-boxes me-2"></i>Estoque</label>
        <input type="number" class="form-control" name="estoque" value="<?php echo $row['estoque']; ?>" min="0" required>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-image me-2"></i>Imagem Atual</label><br>
        <?php if (!empty($row['imagem'])) { ?>
          <img src="img/produtos/<?php echo htmlspecialchars($row['imagem']); ?>" alt="Imagem do Produto" style="max-width:200px;" class="img-thumbnail mb-2">
        <?php } else { echo "Nenhuma imagem disponível."; } ?>
      </div>

      <div class="mb-4">
        <label class="form-label"><i class="fas fa-upload me-2"></i>Nova Imagem (opcional)</label>
        <input type="file" class="form-control" name="imagem" accept="image/*" />
      </div>

      <div class="text-center mt-4">
        <button type="submit" class="btn btn-update me-3">
          <i class="fas fa-save me-2"></i>Atualizar
        </button>
        <a href="consultaProduto.php" class="btn btn-back">
          <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
      </div>
    </form>
  </div>
</div>

<script>
  document.querySelector('input[name="valor"]').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    value = (value / 100).toLocaleString('pt-BR', { minimumFractionDigits: 2 });
    e.target.value = value;
  });
</script>
</body>
</html>
