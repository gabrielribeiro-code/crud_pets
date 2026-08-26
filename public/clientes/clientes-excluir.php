<?php

include "../../infra/conexao.php";
$id = $_GET["id"];


$sql = "SELECT id FROM animais WHERE id_clientes = ?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
    echo "<script>alert ('Não é possível excluir este cliente porque ele possui animais cadastrados');</script>";    
    exit;
}

//Essa parte serve para nao deixar excluir um cliente que tenha animal ainda cadastrado no sistema.

$stmt = mysqli_prepare (
    $conexao, 

    "DELETE FROM clientes WHERE id = ? "
);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

header("location: ../../index.php");
exit;


?> 