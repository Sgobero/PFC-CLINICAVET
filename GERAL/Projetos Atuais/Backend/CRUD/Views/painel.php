<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "<h2>Seja Bem Vindo Ao Painel<h2> <br>";
    echo "Selecione o que deseja fazer<br>";

    //echo "<a href='../Views/formNew.php'> Criar Usuario </a> <br>";
    echo "<a href='../Controllers/UserController.php?action=loadFormNew'> Criar Usuario </a> <br>";
    echo "<a href='../Controllers/UserController.php?action=findAll'> Mostrar Usuarios </a>  << Edit e excluir aqui<br>";
    
    ?>
</body>
</html>