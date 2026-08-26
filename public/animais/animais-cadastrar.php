<?php

include "../../infra/conexao.php";

$nomePet = $_POST['nomePet'];
    $especies = $_POST['especies'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $id_clientes = $_POST['id_clientes'];


$query = "INSERT INTO animais (nomePet, especies, raca, idade, id_clientes) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $query);

mysqli_stmt_bind_param($stmt, "sssii", $nomePet, $especies, $raca, $idade, $id_clientes);

mysqli_stmt_execute($stmt);

header("Location: ../../index.php");
exit();


?>