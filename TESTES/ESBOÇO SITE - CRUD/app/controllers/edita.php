<?php
require_once __DIR__ . "/userController.php";

$editar = $_POST['editar'];

echo $editar;

findUserById($editar);

?>

<h1>Cadastrar Usuário</h1>

<form method = "post" action = "userController.php?action=update">
    <label>Nome: </label>
    <input type = "text" name = "username" value="">
    <br><br>

    <label>Login </label>
    <input type = "text" name = "login"
    placeholder = "Digite o seu login">
    <br><br>

    <label>Senha: </label>
    <input type = "text" name = "senha"
    placeholder = "Digite a sua senha">
    <br><br>

    <label>E-mail: </label>
    <input type = "text" name = "email"
    placeholder = "Digite o seu melhor e-mail">
    <br><br>

    <label>Cpf: </label>
    <input type = "text" name = "cpf"
    placeholder = "Digite o seu cpf">
    <br><br>

    <label>Rg: </label>
    <input type = "text" name = "rg"
    placeholder = "Digite o seu melhor e-mail">
    <br><br>

    <input type ="hidden" name = "userType">
    <br>

    <input type = "submit" value = "Atualizar">
</form>

    <a href="../../index.php"> Página inicial</a>
</body>