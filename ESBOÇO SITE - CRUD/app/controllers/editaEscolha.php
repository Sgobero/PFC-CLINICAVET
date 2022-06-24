<?php

require_once __DIR__ . "/userController.php";
findAll();
?>

<!DOCTYPE html>

<html lang = "pt-br">

    <head>

        <meta charset = "utf-8">
        <title>Cadastrar</title>

    </head>

    <body>

        <h1>Editar Usuário</h1>

        <form method = "post" action = "./edita.php">
        <h4> Qual dos id acima você deseja editar?</h4>
        <input type = "number" name = "editar">
            <input type = "submit" name="Editar">
        </form>

        <a href="../../index.php"> Página inicial</a>

    </body>
</html>