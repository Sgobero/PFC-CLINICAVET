<?php

$servidor = "localhost";
$usuario = "root";
$senha = "bancodedados";
$dbname = "cadastro";

//


//criar conexao

$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);

if($conn -> connect_error){
    echo "Desconectado! Erro: " . $conn -> connect_error;
} else{
    echo "Conectado!";
}
