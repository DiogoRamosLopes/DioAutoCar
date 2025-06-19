<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = filter_input(INPUT_POST, 'codigo', FILTER_VALIDATE_INT);
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
    $salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);

    if (!$codigo || !$nome || !$cpf || !$rg || !$celular || !$email || !$cep || !$numero || $salario === false) {
        echo "Erro: Dados inválidos ou incompletos.";
        exit;
    }

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=oficina", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE tb_funcionario SET
                nome = :nome,
                cpf = :cpf,
                rg = :rg,
                celular = :celular,
                email = :email,
                cep = :cep,
                numero = :numero,
                salario = :salario
                WHERE codigo = :codigo";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);

        $stmt->execute();

        header("Location: consultaFuncionario.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao atualizar funcionário: " . $e->getMessage();
    }
} else {
    echo "Acesso inválido.";
}
?>
