
<?php

include "infra/conexao.php";

$tabelaClientes = mysqli_query($conexao, "SELECT * FROM clientes");
$dropClientes = mysqli_query($conexao, "SELECT * FROM clientes");
$animais = mysqli_query($conexao, "
    SELECT animais.*, clientes.nome AS nome_cliente
    FROM animais
    INNER JOIN clientes ON animais.id_clientes = clientes.id
");
//No inner join nos juntamos as informações das duas tabelas assim aparecendo o id do cliente e seu nome

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

<?php while ($cliente = mysqli_fetch_assoc($tabelaClientes)) { ?>
                    <tr>
                        <td><?php echo $cliente["id"] ?></td>
                        <td><?php echo $cliente["nome"] ?></td>
                        <td><?php echo $cliente["email"] ?></td>
                        <td><?php echo $cliente["senha"] ?></td>
                        <td>
                            <a href="public/clientes/clientes-editar.php?editar=<?php echo $cliente["id"]; ?>">Editar</a>
                            <a href="public/clientes/clientes-excluir.php?id=<?php echo $cliente["id"]; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>



</table>
</div>

<div>
<h2>Adicione um novo Animal</h2>
<form action="public/animais/animais-cadastrar.php" method="POST">
    <label for="nomePet"> Nome Pet: </label>
    <input type="text" name="nomePet">
    <br>
    <label for="especies"> Especies: </label>
    <input type="text" name="especies">
    <br>
    <label for="raca"> Raça: </label>
    <input type="text" name="raca">
    <br>
    <label for="idade"> Idade: </label>
    <input type="number" name="idade">
    <br>

 <label for="id_clientes">O dono do pet é: </label>
                <select name="id_clientes">
                    <option value="" selected disabled>Selecione</option>
                    <?php while ($clientes = mysqli_fetch_assoc($dropClientes)) { ?>
                        <option value="<?php echo $clientes['id']; ?>">
                            <?php echo $clientes['nome']; ?></option>
                    <?php } ?>
                </select>
                <br>
                <button type="submit">Cadastrar</button>
            </form>

</div>
<div>
            <h2>Animais Cadastrados</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome Pet: </th>
                    <th>Especies</th>
                    <th>Raça</th>
                    <th>Idade</th>
                    <th>Dono do Pet</th>
                    <th>Ações</th> 
                </tr>

                <?php while ($animal = mysqli_fetch_assoc($animais)) { ?>
                    <tr>
                        <td><?php echo $animal["id"] ?></td>
                        <td><?php echo $animal["nomePet"] ?></td>
                        <td><?php echo $animal["especies"] ?></td>
                        <td><?php echo $animal["raca"] ?></td>
                        <td><?php echo $animal["idade"] ?></td>

                        <td><?php echo $animal["nome_cliente"]; ?></td>

                        <td>
                            <a href="public/animais/animais-editar.php?editar=<?php echo $animal["id"]; ?>">Editar</a>
                            <a href="public/animais/animais-excluir.php?id=<?php echo $animal["id"]; ?>">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>

     

            </table>
        </div>



</main>
    
</body>
</html>