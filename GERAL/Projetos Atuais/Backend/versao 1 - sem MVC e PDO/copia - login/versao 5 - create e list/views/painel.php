<?php

include('../model/protect.php');
$id = $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>

    <?php

    echo "<h1>Bem Vindo ao Painel {$_SESSION['nome']}</h1>";
    echo "<br> <a href='../model/logout.php'>Sair</a> <br>";
    echo "<a href='./tela_visualizar.php?id=$id'>Visualizar Informações do Perfil</a>";

    ?>
    
</body>
</html>