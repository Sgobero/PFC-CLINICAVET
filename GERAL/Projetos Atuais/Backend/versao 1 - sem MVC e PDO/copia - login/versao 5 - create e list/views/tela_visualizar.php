<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="./painel.php">Voltar</a>
    <h2> Detalhes Do Perfil <h2>

    <?php
        
        require "../model/class/Usuario.php";
        require "../model/class/Cliente.php";

        $id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if(!empty($id)){
            $cliente = new Cliente();
            $cliente->id = $id;
            $informacoes = $cliente->visualizar();

            extract($informacoes);
            echo "Id: $id <br>";
            echo "Nome: $nome <br>";
            echo "Email: $email <br>";
            echo "CPF: $cpf <br>";
            echo "RG: $rg <br>";
            echo "Telefone: $telefone <br>";

        }
        else{
            echo "Falha no id";
        }

    ?>
</body>
</html>