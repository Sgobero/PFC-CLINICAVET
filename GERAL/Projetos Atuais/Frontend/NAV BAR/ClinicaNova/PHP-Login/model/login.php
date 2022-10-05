<?php

    require '../controller/Conn.php';

    $conn = new Conn();
    $connect = $conn->conectar();

    $email = $_POST['email']; 
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $connect->query($sql_code);
    $quantidade = $sql_query->rowCount();

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $connect->query($sql_code);
    $quantidade2 = $sql_query->rowCount();


    if($quantidade == 1) {
        
        $usuario = $sql_query->fetch(PDO::FETCH_ASSOC);
        
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: ../views/painel.php");

    } 
    elseif($quantidade2 == 1)
    {
        echo "Senha Incorreta <br>";
        echo "<a href='../views/tela_login.html'>voltar</a>";
    } 
    else{
        echo "Esse Email não possui cadastro no banco de dados <br>";
        echo "<a href='../views/tela_login.html'>voltar</a>";
    }

?>