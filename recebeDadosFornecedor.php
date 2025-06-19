<?php

$nome    = $_POST['nome'];
$cpf     = $_POST['cpf'];
$email = $_POST['email'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$estado = $_POST['uf'];

echo $nome."<br>";
echo $cpf."<br>";
echo $email."<br>";
echo $cep."<br>";
echo $rua."<br>";
echo $numero."<br>";
echo $bairro."<br>";
echo $cidade."<br>";
echo $estado."<br>";


$servidor = "localhost:3306";
$usuario = "root";
$senha = "";

$conexao = new PDO("mysql:host=$servidor;dbname=oficina",
                   $usuario, $senha);

$sql = "INSERT INTO fornecedores(nome, cpf, email, cep, numero)
        VALUES ('$nome','$cpf', '$email', '$cep', '$numero')";

$conexao->exec($sql);

echo "Cadastrado com sucesso";

$conexao = null;
?>