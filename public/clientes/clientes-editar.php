<?php

include "../../infra/conexao.php";

if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $nomePet = $_POST['nomePet'];
    $especies = $_POST['especies'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];

    $sql = "UPDATE animais
            SET nomePet = ?, especies = ?, raca = ?, idade = ?
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssii",
        $nomePet,
        $especies,
        $raca,
        $idade,
        $id
    );

    $stmt->execute();

    header("location: ../../index.php");
    exit;
}

if (isset($_GET['editar'])) {

    $id = $_GET['editar'];

    $sql = "SELECT * FROM animais WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $animal = $resultado->fetch_assoc();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR ANIMAL</title>
</head>
<body>

 <header>
    <h1>EDITAR ANIMAL</h1>
 </header>

 <main> 
    <h2>Editando o animal <?php echo $animal["nomePet"]?>!</h2>
        <form  method="POST">

            <input type="hidden" name="id" value="<?php echo $animal["id"]?>">

            <label for="nomePet">Nome:</label>
            <input type="text" name="nomePet" value="<?php echo $animal["nomePet"]?>">
            <br>
            <label for="especies">Especies:</label>
            <input type="text" name="especies" value="<?php echo $animal["especies"]?>">
            <br>
            <label for="raca">Raca:</label>
            <input type="text" name="raca" value="<?php echo $animal["raca"]?>">
            <br>
            <label for="idade">Idade:</label>
            <input type="number" name="idade" value="<?php echo $animal["idade"]?>">
            <br>
        
            <button type="submit" name="atualizar">Atualizar</button>
        </form>






 </main>
    
</body>
</html>