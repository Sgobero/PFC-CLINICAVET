<?php

session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <title> Cadastrar: </title>
    <head>

    <body>
        <h1> Cadastrar Usuário</h1>
        <?php

        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']); //destroi variavel global
        }

        ?>

        <form method="POST" action="processa.php">
            <label> Nome: </label>
            <input type="text" name="nomeF"
    placeholder="Digite o seu nome"><br><br>

            <label> E-mail: </label>
                    <input type="email" name="endereco"
    placeholder="Digite o seu endereço"><br><br>
    <label> Cargo: </label>
            <input type="text" name="cargo"
    placeholder="Digite o seu cargo"><br><br>

            <input type="submit" value="Cadastrar">
        </form>
    
    </body>
</html>
        
        