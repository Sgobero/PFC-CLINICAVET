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
        include 'app/sts/Controllers/helpers/protect.php';

        if(isset($_SESSION['msg']))
        {
            echo "Mensagem: " . $_SESSION['msg'];     
        }
        if(isset($_SESSION['idusuario']))
        {
            echo $_SESSION['idusuario'] . "<br>";
        }

        echo "Tela servissos html";
        echo "<pre>"; var_dump($this->data); echo "</pre>";
    ?>
    
</body>
</html>
