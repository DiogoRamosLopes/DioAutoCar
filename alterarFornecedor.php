<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Alterar Fornecedor - Dio AutoCar</title>
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
    }
    
    .btn-back:hover {
      background-color: #2c2c2c;
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
  <h1 class="text-center py-3"><i class="fas fa-truck me-2"></i>Alterar Fornecedor</h1>
  
  <div class="form-container">
    <?php
    $servidor = "localhost:3306";
    $usuario = "root";
    $senha = "";

    $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);

    $codigo = filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_NUMBER_INT);
     
    $select = $conexao->prepare("SELECT * FROM fornecedores WHERE codigo = :codigo");
    $select->bindParam(':codigo', $codigo, PDO::PARAM_INT);
    $select->execute();

    $row = $select->fetch();
    ?>
    
    <form action="confirmaAlterarFornecedor.php" method="POST">
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-id-badge me-2"></i>Código</label>
        <input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo']; ?>" readonly>
      </div>
      
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-building me-2"></i>Nome da Empresa</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>" required>
      </div>
      
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-id-card me-2"></i>CNPJ/CPF</label>
        <input type="text" class="form-control" name="cpf" value="<?php echo $row['cpf']; ?>" 
               oninput="formatCPF(this)" required>
      </div>
      
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
      </div>
      
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-map-marked-alt me-2"></i>CEP</label>
        <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $row['cep']; ?>" 
               onblur="pesquisacep(this.value);" required>
      </div>
      
      <div class="mb-4">
        <label class="form-label"><i class="fas fa-home me-2"></i>Número</label>
        <input type="text" class="form-control" name="numero" value="<?php echo $row['numero']; ?>" required>
      </div>
      
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-update me-3">
          <i class="fas fa-save me-2"></i>Atualizar
        </button>
        <button type="button" class="btn btn-back" onclick="window.location.href='consultaFornecedor.php'">
          <i class="fas fa-arrow-left me-2"></i>Voltar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  // Formatação de CPF/CNPJ
  function formatCPF(input) {
    let value = input.value.replace(/\D/g, '');
    
    if (value.length <= 11) {
      // Formata como CPF
      if (value.length > 3) value = value.replace(/^(\d{3})(\d)/g, '$1.$2');
      if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
      if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
      input.value = value.substring(0, 14);
    } else {
      // Formata como CNPJ
      if (value.length > 2) value = value.replace(/^(\d{2})(\d)/g, '$1.$2');
      if (value.length > 5) value = value.replace(/^(\d{2})\.(\d{3})(\d)/g, '$1.$2.$3');
      if (value.length > 8) value = value.replace(/\.(\d{3})(\d)/g, '.$1/$2');
      if (value.length > 12) value = value.replace(/(\d{4})(\d)/g, '$1-$2');
      input.value = value.substring(0, 18);
    }
  }

  // Funções do CEP
  function limpa_formulário_cep() {
    document.getElementById('rua').value = "";
    document.getElementById('bairro').value = "";
    document.getElementById('cidade').value = "";
    document.getElementById('uf').value = "";
  }

  function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
      document.getElementById('rua').value = conteudo.logradouro;
      document.getElementById('bairro').value = conteudo.bairro;
      document.getElementById('cidade').value = conteudo.localidade;
      document.getElementById('uf').value = conteudo.uf;
    } else {
      limpa_formulário_cep();
      alert("CEP não encontrado.");
    }
  }

  function pesquisacep(valor) {
    var cep = valor.replace(/\D/g, '');
    if (cep != "") {
      var validacep = /^[0-9]{8}$/;
      if(validacep.test(cep)) {
        document.getElementById('rua').value = "...";
        document.getElementById('bairro').value = "...";
        document.getElementById('cidade').value = "...";
        document.getElementById('uf').value = "...";
        
        var script = document.createElement('script');
        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
        document.body.appendChild(script);
      } else {
        limpa_formulário_cep();
        alert("Formato de CEP inválido.");
      }
    } else {
      limpa_formulário_cep();
    }
  }
</script>
</body>
</html>