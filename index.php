
<?php

include "infra/conexao.php";

$tabelaClientes = mysqli_query($conexao, "SELECT * FROM clientes");
$dropClientes = mysqli_query($conexao, "SELECT * FROM clientes");
$tabelaAnimais = mysqli_query($conexao, "SELECT * FROM animais");

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patinhas com segurança</title>
</head>
<body>

<main>

<div> 

<h2>Adicione um novo Cliente</h2>
<form action="public/clientes/clientes-cadastrar.php" method="POST">
    <label for="nome"> Nome: </label>
    <input type="text" name="nome">
    <br>
    <label for="email"> Email: </label>
    <input type="text" name="email">
    <br>
    <label for="senha"> Senha: </label>
    <input type="password" name="senha">
    <br>
    <button type= "submit"> Cadastrar </button>

</form>

</div>

<div>

<h2>Clientes Cadastrados</h2>
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Senha</th>
</tr>

<?php while ($clientes = mysqli_fetch_assoc($tabelaClientes)) {
                    echo "<tr>";
                    echo "<td>" . $clientes['id'] . "</td>";
                    echo "<td>" . $clientes['nome'] . "</td>";
                    echo "<td>" . $clientes['email'] . "</td>";
                    echo "<td>" . $clientes['senha'] . "</td>";
                    echo "</tr>";
                }
?>

</table>
</div>




</main>
    
</body>
</html>