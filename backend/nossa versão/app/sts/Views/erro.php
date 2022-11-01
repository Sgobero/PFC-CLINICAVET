<?php
    if(!isset($_SESSION)){
        session_start();
    }
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
        echo "<h1 style='text-align:center'> Erro " . $this->data['numero'] . "</h1>";
        echo "<h2 style='text-align:center'> " . $this->data['descricao'] . "</h2>";   
    ?>
    
</body>
</html>