<?php

include("locadora.php");

$nomeContato = $_POST["nomeContato"];
$telefoneContato = $_POST["telefoneContato"];
$emailContato = $_POST["emailContato"];
$cpfContato = $_POST["cpfContato"];
$idadeContato = $_POST["idadeContato"];
$niverContato = $_POST["niverContato"];

    if(isset($nomeContato)== "" or isset($telefoneContato) == "" or isset($emailContato) == "" 
    or isset($cpfContato) == "" or isset($idadeContato) == "" or isset($niverContato) == ""){
        echo "Você não preencheutodos os dados";
    }