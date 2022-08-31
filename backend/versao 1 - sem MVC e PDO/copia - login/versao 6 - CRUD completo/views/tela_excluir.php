<?php
    include '../model/protect.php';
    $id = $_SESSION['id'];
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

    <?php
        require "../controller/Conn.php";
        require "../model/class/Usuario.php";
        require "../model/class/Cliente.php";
    
        if(!empty($id)){
            $excluirCliente = new Cliente();
            $excluirCliente->id = $id;
            $resultado = $excluirCliente->excluir();
            if($resultado){
                require "../model/logout.php";
            }
        }
    
    ?>
</body>

</html>