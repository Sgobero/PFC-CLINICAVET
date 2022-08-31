<?php

    require '../controller/Conn.php';

    $conn = new Conn();
    $connect = $conn->conectar();

    $email = $_POST['email']; 
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $connect->query($sql_code);
    $quantidade = $sql_query->rowCount();

    if($quantidade == 1) {
        
        $usuario = $sql_query->fetch(PDO::FETCH_ASSOC);
        
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];

        header("Location: ../views/painel.php");

    } else {
        echo "Falha ao logar! E-mail ou senha incorretos <br>";
        echo "<a href='../views/tela_login.html'>voltar</a>";
    }

?>