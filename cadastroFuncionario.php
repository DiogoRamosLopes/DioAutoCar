<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Funcionário - Dio AutoCar</title>
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
    
    .address-group {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      border-left: 3px solid var(--gold);
    }
    
    .input-group-text {
      background-color: var(--gold);
      color: black;
      font-weight: 600;
    }
    
    @media (max-width: 768px) {
      .form-container {
        padding: 20px;
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

  <div class="container">
    <h1 class="text-center py-3"><i class="fas fa-user-tie me-2"></i>Cadastro de Funcionário</h1>
    
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-container">
          <form action="recebeDadosFuncionarios.php" method="POST">
            <div class="row">
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-user me-2"></i>Nome Completo</label>
                <input class="form-control" name="nome" placeholder="Digite o nome completo" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-id-card me-2"></i>CPF</label>
                <input class="form-control" name="cpf" placeholder="000.000.000-00" oninput="formatCPF(this)" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-address-card me-2"></i>RG</label>
                <input class="form-control" name="rg" placeholder="Digite o RG" required>
              </div>
              <div class="col-md-6">
                <label class="form-label"><i class="fas fa-phone me-2"></i>Celular</label>
                <input class="form-control" name="celular" placeholder="(00) 00000-0000" oninput="formatPhone(this)" required>
              </div>
            </div>

            <div class="mb-4">
              <label class="form-label"><i class="fas fa-envelope me-2"></i>Email</label>
              <input type="email" class="form-control" name="email" placeholder="seu@email.com" required>
            </div>

            <div class="mb-4">
              <label class="form-label"><i class="fas fa-money-bill-wave me-2"></i>Salário</label>
              <div class="input-group">
                <span class="input-group-text">R$</span>
                <input type="text" class="form-control" name="salario" placeholder="0,00" oninput="formatCurrency(this)" required>
              </div>
            </div>

            <div class="address-group">
              <h5 class="mb-4"><i class="fas fa-map-marker-alt me-2"></i>Endereço</h5>
              
              <div class="row">
                <div class="col-md-4">
                  <label class="form-label"><i class="fas fa-map-pin me-2"></i>CEP</label>
                  <input class="form-control" name="cep" type="text" id="cep" placeholder="00000-000" 
                         onblur="pesquisacep(this.value);" required>
                </div>
                <div class="col-md-8">
                  <label class="form-label"><i class="fas fa-road me-2"></i>Rua</label>
                  <input class="form-control" name="rua" type="text" id="rua" placeholder="Nome da rua" readonly>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <label class="form-label"><i class="fas fa-home me-2"></i>Nº</label>
                  <input class="form-control" name="numero" type="text" id="numero" placeholder="Número">
                </div>
                <div class="col-md-5">
                  <label class="form-label"><i class="fas fa-map-marked-alt me-2"></i>Bairro</label>
                  <input class="form-control" name="bairro" type="text" id="bairro" placeholder="Bairro" readonly>
                </div>
                <div class="col-md-4">
                  <label class="form-label"><i class="fas fa-city me-2"></i>Cidade</label>
                  <input class="form-control" name="cidade" type="text" id="cidade" placeholder="Cidade" readonly>
                </div>
                <div class="col-md-1">
                  <label class="form-label"><i class="fas fa-flag me-2"></i>UF</label>
                  <input class="form-control" name="uf" type="text" id="uf" placeholder="UF" readonly>
                </div>
              </div>
            </div>

            <div class="text-center mt-4">
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
    // Formatação de CPF
    function formatCPF(input) {
      let value = input.value.replace(/\D/g, '');
      if (value.length > 3) value = value.replace(/^(\d{3})(\d)/g, '$1.$2');
      if (value.length > 6) value = value.replace(/^(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3');
      if (value.length > 9) value = value.replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/g, '$1.$2.$3-$4');
      input.value = value.substring(0, 14);
    }

    // Formatação de telefone
    function formatPhone(input) {
      let value = input.value.replace(/\D/g, '');
      if (value.length > 0) value = '(' + value;
      if (value.length > 3) value = value.substring(0, 3) + ') ' + value.substring(3);
      if (value.length > 10) value = value.substring(0, 10) + '-' + value.substring(10);
      input.value = value.substring(0, 15);
    }

    // Formatação de moeda
    function formatCurrency(input) {
      let value = input.value.replace(/\D/g, '');
      value = (value/100).toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
      input.value = value;
    }

    // Funções do CEP (mantidas do código original)
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