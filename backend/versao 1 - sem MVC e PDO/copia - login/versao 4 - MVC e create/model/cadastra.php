<?php

    require '../controller/Conn.php';
    require './class/Usuario.php';
    require './class/Cliente.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $telefone = $_POST['telefone'];
    
    //conecta com o banco de dados
    $conn = new Conn();
    $connect = $conn->conectar(); 

    //sql para conferir se já tem alguma conta com aquele mesmo email
    $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
    $sql_query = $connect->query($sql_code);
    $quantidade = $sql_query->rowCount();

    if($quantidade == 1) 
    {
        echo "Usuário ja cadastrado, tente outro email";
        echo "<a href='../views/tela_cadastro.html'>voltar</a>";
    } 
    else 
    {
        $cliente = new Cliente($email, $senha, $nome, $cpf, $rg, $telefone);
        $value = $cliente->inserir($cliente);
        if($value){
            header("Location: ../views/tela_login.html");
        }else{
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        } 
    }


?>