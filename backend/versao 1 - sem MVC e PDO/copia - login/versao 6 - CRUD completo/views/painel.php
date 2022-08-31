<?php
include('../model/protect.php');
require_once('../model/class/Usuario.php');
require_once('../model/class/Cliente.php');
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
        
        $cliente = new Cliente();
        $cliente->id = $id;
        $informacoes= $cliente->visualizar();
        extract($informacoes); 
        echo "<h1>Seja bem vindo ao painel, {$nome}</h1>";

        if (isset($_SESSION['mensagem'])) {
            echo $_SESSION['mensagem'];
            unset($_SESSION['mensagem']);
        }

        echo "<br> <a href='../model/logout.php'>Sair</a> <br>";
        echo "<a href='./tela_visualizar.php?id=$id'>Visualizar Informações do Perfil</a> <br>";
        echo "<a href='./tela_alterar.php?id=$id'>Alterar Informações do Perfil</a> <br>";
        echo "<a href='./tela_excluir.php'>Excluir Perfil</a>";
    ?>
    
</body>
</html>