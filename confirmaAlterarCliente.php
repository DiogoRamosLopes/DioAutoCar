<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);

    if (!$codigo || !$nome || !$cpf || !$rg || !$cep || !$numero || !$email || !$celular) {
        echo "Erro: Dados inválidos ou incompletos.";
        exit;
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tb_cliente 
                SET nome = :nome, cpf = :cpf, rg = :rg, cep = :cep, numero = :numero, email = :email, celular = :celular
                WHERE codigo = :codigo";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: consultaCliente.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar cliente: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
?>
