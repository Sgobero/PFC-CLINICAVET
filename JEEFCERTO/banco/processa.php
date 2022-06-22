<?php

session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

$resul_usuario = "INSERT INTO usuarios (nome, email, created) VALUES ('$nome', '$email', NOW())";

$resultado_usuario = mysqli_query($conn, $resul_usuario);


if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'> Usuário cadastrado com sucesso </p>";

    header("Location: index.php");
} else{
    $_SESSION['msg'] = "<p style='color:red;'> Usuário não foi cadastrado com sucesso</p>";
    header("Location: index.php");
}