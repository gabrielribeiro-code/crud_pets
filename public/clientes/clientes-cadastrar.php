<?php

include "../../infra/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$query = "INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conexao, $query);

mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

mysqli_stmt_execute($stmt);

header("Location: ../index.php");
exit();


?>