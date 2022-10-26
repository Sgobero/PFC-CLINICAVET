<?php

    require '../controller/Conn.php';
    require './class/Usuario.php';
    require './class/Cliente.php';
  
    //conecta com o banco de dados
    $conn = new Conn();
    $connect = $conn->conectar(); 

    //sql para conferir se já tem alguma conta com aquele mesmo email
    $email = $_POST['email'];  
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
        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT); // Dados passados pelo POST entram no $formData
        $cliente = new Cliente();
        $cliente->formData = $formData;
        $value = $cliente->inserir();
        if($value){
            header("Location: ../views/tela_login.html");
        }else{
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        } 
    }


?>