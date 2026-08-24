<?php

include "../../infra/conexao.php";
$id = $_GET["id"];

$stmt prepare (
    $conexao, 

    "DELETE FROM animais WHERE id = ? "
);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

header("location: ../index.php");


?> 