<?php
$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
$tabela = filter_input(INPUT_POST, 'tabela', FILTER_SANITIZE_STRING);

// Lista de tabelas permitidas para segurança
$tabelas_permitidas = ['tb_cliente', 'funcionarios', 'fornecedores', 'tb_produto'];

if (!$codigo || !in_array($tabela, $tabelas_permitidas)) {
    die("Parâmetros inválidos.");
}

try {
    $conexao = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara a query usando placeholders para evitar SQL Injection
    $stmt = $conexao->prepare("DELETE FROM `$tabela` WHERE codigo = :codigo");
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

    if ($stmt->execute()) {
        // Redireciona para a página correta após exclusão
        switch ($tabela) {
            case 'tb_cliente':
                header("Location: consultaCliente.php");
                break;
            case 'funcionarios':
                header("Location: consultaFuncionario.php");
                break;
            case 'fornecedores':
                header("Location: consultaFornecedor.php");
                break;
            case 'tb_produto':
                header("Location: consultaProduto.php");
                break;
            default:
                header("Location: menu.php");
        }
        exit;
    } else {
        echo "Falha ao excluir o registro.";
    }
} catch (PDOException $e) {
    echo "Erro ao conectar/executar: " . $e->getMessage();
}
?>
