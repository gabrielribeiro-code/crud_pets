<?php

$host = "localhost: 6608";
$usuario = "root";
$senha = "";
$banco = "petssDB";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao -> connect_error) {
    die("Erro na conexão como banco: " . $conexao -> connect_error);

};

$conexao -> set_charset("utf8mb4");

?>