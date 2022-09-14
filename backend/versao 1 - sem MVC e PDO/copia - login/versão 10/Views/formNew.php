<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<!-- <form action="?action=create" method="POST"> / ./UserController.php?action=create -->
    <form action="../Controllers/UserController.php?action=create" method="POST">

        <h2>Crie Sua Conta</h2>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" required>

        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" required>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" required>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" required>

        <input type="submit" value="Cadastrar">

        <!-- <br> <a href="tela_login.html">Login</a> --> 

    </form>

</body>
</html>