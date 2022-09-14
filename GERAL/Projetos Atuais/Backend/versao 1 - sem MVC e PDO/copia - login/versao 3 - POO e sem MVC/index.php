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
    
        require './Usuario.php';
        require './Cliente.php';

        $cliente = new Cliente();

        $cliente->inserir("lau@laucompani.com", "laulau", "barbosa", 123, 321, 231);


        //$listarUsuarios = $cliente->listar();

        /*foreach ($listarUsuarios as $row_usuario) {
            //var_dump($row_usuario);
            extract($row_usuario);
            //echo "ID do usuário " . $row_usuario['id'] . " <br>";
            echo "ID do usuário $id <br>";
            echo "Nome do usuário $nome <br>";
            echo "E-mail do usuário $email <br>";
            echo "<hr>";
        }*/
    
    ?>
</body>
</html>