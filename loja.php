<?php
$conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
$produtos = $conexao->query("SELECT * FROM tb_produto")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Loja - Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .produto-card {
      border: 1px solid #ccc;
      border-left: 5px solid #d4af37;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 20px;
      background-color: white;
      transition: transform 0.3s ease;
    }
    .produto-card:hover {
      transform: scale(1.02);
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      color: #d4af37;
      margin-top: 20px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="container">
  <h1><i class="fas fa-car me-2"></i>Produtos à Venda</h1>
  
  <?php foreach($produtos as $p): ?>
    <div class="produto-card">
      <h4><i class="fas fa-tag me-2"></i><?php echo htmlspecialchars($p['nome']); ?></h4>
      <p><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($p['descricao'])); ?></p>
      <p><strong>Valor:</strong> R$ <?php echo number_format($p['valor'], 2, ',', '.'); ?></p>
      <p><strong>Estoque disponível:</strong> <?php echo $p['estoque']; ?></p>
    </div>
  <?php endforeach; ?>

  <div class="text-center mt-4">
    <a href="menu.php" class="btn btn-dark">
      <i class="fas fa-arrow-left me-2"></i>Voltar ao Menu
    </a>
  </div>
</div>

</body>
</html>
