<?php

include "../../infra/conexao.php";

if (isset($_POST['atualizar'])) {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
   

    $sql = "UPDATE clientes
            SET nome = ?, email = ?, senha = ?
            WHERE id = ?";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "ssii",
        $nome,
        $email,
        $senha,
        $id
    );

    $stmt->execute();

    header("location: ../../index.php");
    exit;
}

if (isset($_GET['editar'])) {

    $id = $_GET['editar'];

    $sql = "SELECT * FROM clientes WHERE id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $cliente = $resultado->fetch_assoc();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR CLIENTE</title>
</head>
<body>

 <header>
    <h1>EDITAR CLIENTE</h1>
 </header>

 <main> 
    <h2>Editando o cliente <?php echo $cliente["nome"]?>!</h2>
        <form  method="POST">

            <input type="hidden" name="id" value="<?php echo $cliente["id"]?>">

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $cliente["nome"]?>">
            <br>
            <label for="email">email:</label>
            <input type="text" name="email" value="<?php echo $cliente["email"]?>">
            <br>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" value="<?php echo $cliente["senha"]?>">
            <br>
        
            <button type="submit" name="atualizar">Atualizar</button>
        </form>






 </main>
    
</body>
</html>