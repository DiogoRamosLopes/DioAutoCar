<?php

$nome    = $_POST['nome'];
$cpf     = $_POST['cpf'];
$rg      = $_POST['rg'];
$celular = $_POST['celular'];
$email   = $_POST['email'];
$cep     = $_POST['cep'];
$rua     = $_POST['rua'];
$numero  = $_POST['numero'];
$bairro  = $_POST['bairro'];
$cidade  = $_POST['cidade'];
$estado  = $_POST['uf'];

echo $nome."<br>";
echo $cpf."<br>";
echo $rg."<br>";
echo $celular."<br>";
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

$sql = "INSERT INTO tb_cliente(nome, cpf, rg, celular, email, cep, numero)
        VALUES ('$nome','$cpf','$rg', '$celular', '$email', '$cep', '$numero')";

$conexao->exec($sql);

echo "Cadastrado com sucesso";

$conexao = null;
?>