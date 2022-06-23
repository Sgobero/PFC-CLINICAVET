<?php

session_start();
include_once("conexao.php");

$nomeFuncionario= filter_input(INPUT_POST, 'nomeF', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);

$resul_usuario = "INSERT INTO usuarios (nomeF, endereco, cargo,created) VALUES ('$nomeFuncionario', '$endereco', 'cargo', NOW())";

$resultado_usuario = mysqli_query($conn, $resul_usuario);


if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'> Usuário cadastrado com sucesso </p>";

    header("Location: index.php");
} else{
    $_SESSION['msg'] = "<p style='color:red;'> Usuário não foi cadastrado com sucesso</p>";
    header("Location: index.php");
}