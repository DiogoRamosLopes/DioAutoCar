<?php

$nome    = $_POST['Nome'];
$descricao     = $_POST['Descricao'];
$valor      = $_POST['Valor'];
$estoque = $_POST['Estoque'];


echo $nome."<br>";
echo $descricao."<br>";
echo $valor."<br>";
echo $estoque."<br>";


$servidor = "localhost:3306";
$usuario = "root";
$senha = "";

$conexao = new PDO("mysql:host=$servidor;dbname=oficina",
                   $usuario, $senha);

$sql = "INSERT INTO tb_produto(nome, descricao, valor, estoque)
        VALUES ('$nome','$descricao','$valor', '$estoque')";

$conexao->exec($sql);

echo "Cadastrado com sucesso";

$conexao = null;
?>