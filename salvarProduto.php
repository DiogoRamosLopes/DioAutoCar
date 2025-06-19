<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $valor = str_replace(['.', ','], ['', '.'], $_POST['valor']); // Converte valor pt-BR para padrão float
    $estoque = $_POST['estoque'];
    $imagem = '';

    // Diretório onde as imagens serão salvas
    $diretorioImagens = 'img/produtos/';

    // Cria a pasta se não existir
    if (!is_dir($diretorioImagens)) {
        mkdir($diretorioImagens, 0777, true);
    }

    // Tratamento da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
        $nomeImagem = uniqid('carro_') . '.' . $extensao;
        $caminhoImagem = $diretorioImagens . $nomeImagem;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem)) {
            $imagem = $nomeImagem;
        } else {
            echo "Erro ao salvar a imagem.";
            exit;
        }
    }

    // Conexão com banco
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insere os dados no banco
        $stmt = $pdo->prepare("INSERT INTO tb_produto (nome, descricao, valor, estoque, imagem) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $descricao, $valor, $estoque, $imagem]);

        // Redireciona após sucesso
        header("Location: consultaProduto.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao conectar ou inserir no banco: " . $e->getMessage();
    }
}
?>
