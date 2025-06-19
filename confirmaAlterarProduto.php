<?php
// Conexão PDO
try {
    $pdo = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Recebe dados do formulário
$codigo     = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao  = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor_raw  = str_replace(['.', ','], ['', '.'], $_POST['valor']); // Converte valor para formato float
$valor      = floatval($valor_raw);
$estoque    = filter_input(INPUT_POST, 'estoque', FILTER_VALIDATE_INT);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);
$imagemAntiga = filter_input(INPUT_POST, 'imagemAntiga', FILTER_SANITIZE_STRING);

$imagem = $imagemAntiga; // padrão: mantém imagem antiga

// Verifica se foi enviada nova imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $extensao = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($extensao, $extensoesPermitidas)) {
        // Gera nome único para imagem
        $novoNome = uniqid('img_') . '.' . $extensao;
        $destino = 'img/produtos/' . $novoNome;

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
            // Apaga imagem antiga se existir e for diferente de vazio
            if (!empty($imagemAntiga) && file_exists('img/produtos/' . $imagemAntiga)) {
                unlink('img/produtos/' . $imagemAntiga);
            }
            $imagem = $novoNome; // atualiza variável para o novo nome
        } else {
            die("Erro ao salvar a nova imagem.");
        }
    } else {
        die("Extensão de imagem não permitida. Use jpg, jpeg, png ou gif.");
    }
}

// Atualiza os dados no banco
try {
    $sql = "UPDATE tb_produto 
            SET nome = :nome,
                descricao = :descricao,
                valor = :valor,
                estoque = :estoque,
                quantidade = :quantidade,
                imagem = :imagem
            WHERE codigo = :codigo";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':estoque', $estoque, PDO::PARAM_INT);
    $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
    $stmt->bindParam(':imagem', $imagem);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

    $stmt->execute();

    // Redireciona para consultaProduto.php após sucesso
    header("Location: consultaProduto.php");
    exit;

} catch (PDOException $e) {
    die("Erro ao atualizar produto: " . $e->getMessage());
}
?>
