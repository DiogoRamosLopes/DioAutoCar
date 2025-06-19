<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <title>Alterar Cliente - Dio AutoCar</title>
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
    }

    .form-control {
      padding: 12px 15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
    }

    .form-control:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
    }

    .btn-update {
      background-color: var(--gold);
      color: black;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
    }

    .btn-update:hover {
      background-color: #c9a227;
    }

    .btn-back {
      background-color: var(--light-dark);
      color: white;
      border: none;
      padding: 12px 30px;
      font-weight: 600;
    }

    .btn-back:hover {
      background-color: #2c2c2c;
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

<h1 class="text-center"><i class="fas fa-user-edit me-2"></i>Alterar Cliente</h1>

<div class="form-container">
  <?php
    $servidor = "localhost:3306";
    $usuario = "root";
    $senha = "";
    $conexao = new PDO("mysql:host=$servidor;dbname=oficina", $usuario, $senha);
    $codigo = $_GET['cod'];
    $select = $conexao->prepare("SELECT * FROM tb_cliente WHERE codigo = :codigo");
    $select->bindParam(':codigo', $codigo, PDO::PARAM_INT);
    $select->execute();
    $row = $select->fetch();
  ?>

  <form action="confirmaAlterarCliente.php" method="POST">
    <label class="form-label">Código</label>
    <input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo'];?>" readonly>

    <label class="form-label">Nome</label>
    <input type="text" class="form-control" name="nome" value="<?php echo $row['nome'];?>" required>

    <label class="form-label">CPF</label>
    <input type="text" class="form-control" name="cpf" value="<?php echo $row['cpf'];?>" maxlength="11" required>

    <label class="form-label">RG</label>
    <input type="text" class="form-control" name="rg" value="<?php echo $row['rg'];?>" required>

    <label class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $row['cep'];?>" onblur="pesquisacep(this.value);" required>

    <label class="form-label">Rua</label>
    <input type="text" class="form-control" name="rua" id="rua">

    <label class="form-label">Número</label>
    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $row['numero'];?>">

    <label class="form-label">Bairro</label>
    <input type="text" class="form-control" name="bairro" id="bairro">

    <label class="form-label">Cidade</label>
    <input type="text" class="form-control" name="cidade" id="cidade">

    <label class="form-label">Estado (UF)</label>
    <input type="text" class="form-control" name="uf" id="uf">

    <label class="form-label">Celular</label>
    <input type="text" class="form-control" name="celular" value="<?php echo $row['celular'];?>" required>

    <label class="form-label">Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" required>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-update me-2">
        <i class="fas fa-save me-1"></i>Atualizar
      </button>
      <button type="button" class="btn btn-back" onclick="window.location.href='consultaCliente.php'">
        <i class="fas fa-arrow-left me-1"></i>Voltar
      </button>
    </div>
  </form>
</div>

<script>
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
