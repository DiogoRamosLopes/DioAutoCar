<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Produtos - Dio Autocar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
      :root {
        --gold: #d4af37;
        --dark: #121212;
        --light-dark: #1e1e1e;
        --danger: #dc3545;
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
      
      .btn-submit {
        background-color: var(--gold);
        color: black;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
      }
      
      .btn-submit:hover {
        background-color: #c9a227;
        transform: translateY(-2px);
      }
      
      .btn-reset {
        background-color: var(--danger);
        color: white;
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
      }
      
      .btn-reset:hover {
        background-color: #c82333;
        transform: translateY(-2px);
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
      <h1 class="text-center py-3"><i class="fas fa-box-open me-2"></i>Cadastro de Produtos</h1>
      
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="form-container">
            <form action="salvarProduto.php" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-tag me-2"></i>Nome do Produto</label>
                <input class="form-control" name="nome" placeholder="Digite o nome do produto" required>
              </div>
              
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-align-left me-2"></i>Descrição</label>
                <textarea class="form-control" name="descricao" rows="3" placeholder="Descreva o produto" required></textarea>
              </div>
              
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-dollar-sign me-2"></i>Valor</label>
                <div class="input-group">
                  <span class="input-group-text">R$</span>
                  <input type="text" class="form-control" name="valor" placeholder="0,00" required>
                </div>
              </div>
              
              <div class="mb-4">
                <label class="form-label"><i class="fas fa-boxes me-2"></i>Estoque</label>
                <input type="number" class="form-control" name="estoque" placeholder="Quantidade em estoque" required>
              </div>

              <div class="mb-4">
                <label class="form-label"><i class="fas fa-image me-2"></i>Imagem do Carro</label>
                <input type="file" name="imagem" class="form-control" accept="image/*" required>
              </div>

              <div class="text-center mt-5">
                <button type="submit" class="btn btn-submit me-3">
                  <i class="fas fa-save me-2"></i>Cadastrar
                </button>
                <button type="reset" class="btn btn-reset">
                  <i class="fas fa-broom me-2"></i>Limpar
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      
      document.querySelector('input[name="valor"]').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = (value/100).toLocaleString('pt-BR', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
        });
        e.target.value = value;
      });
    </script>
  </body>
</html>
