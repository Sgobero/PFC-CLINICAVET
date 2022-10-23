
<?php
echo "<hr>";

    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['msg']))
    {   
        echo "Mensagem: " . $_SESSION['msg'] . "<br>";
        unset($_SESSION['msg']);
    }
    if(isset($_SESSION['idusuario']))
    {
        echo "Id: " . $_SESSION['idusuario'] . "<br>";
        echo "Endereco: " . $_SESSION['idendereco'] . "<br>";
    }

echo "<hr>";
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
    
    echo "<h2>View Home</h2>";
    echo "<a href='" . URL . "Cadastro'> Cadastro </a> <br>";
    echo "<a href='" . URL . "Login'> Login </a> <br>";
    echo "<a href='" . URL . "Sobre-Cliente'> Sobre Cliente </a> <br>";
    echo "<a href='" . URL . "Cadastro-Pet'> Cadastro Pet </a> <br>";
    echo "<a href='" . URL . "Servicos'> Serviços da Clinica</a> <br>";

?>

<form method="post" action="">

    <br>
    <input name="session_destroy" type="submit" value="session_destroy" >

</form>

</body>
</html>
