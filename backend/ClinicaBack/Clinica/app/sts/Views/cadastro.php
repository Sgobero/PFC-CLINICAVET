<?php
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['msg'])){
        echo "Mensagem: " . $_SESSION['msg'] . "<br>";
        unset($_SESSION['msg']);
    }

    if(isset($this->data)){
        extract($this->data);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post" action="">

        <h2> DADOS PESSOAIS </h2>

        <label>NOME: </label>
        <input name="nome_usuario" type="text" placeholder="Nome Completo" value="<?php if(isset($nome_usuario)) {echo "$nome_usuario";} ?>"> <br> <br> 
        
        <label>CPF: </label>
        <input name="cpf" type="text" placeholder="CPF" value="<?php if(isset($cpf)) {echo "$cpf";} ?>"> <br> <br>
        
        <label>RG: </label>
        <input name="rg" type="text" placeholder="RG" value="<?php if(isset($rg)) {echo "$rg";} ?>"> <br> <br>
        
        <label>DATA DE NASCIMENTO: </label>
        <input name="data_nascimento" type="date" placeholder="data" value="<?php if(isset($data_nascimento)) {echo "$data_nascimento";} ?>"> <br> <br>
        
        <label>EMAIL: </label>
        <input name="email" type="text" placeholder="email" value="<?php if(isset($email)) {echo "$email";} ?>"> <br> <br>

        <input type="hidden" name="tipo_usuario" value="cliente">
        
        <label>SENHA: </label>
        <input name="senha_usuario" type="text" placeholder="senha" value="<?php if(isset($senha_usuario)) {echo "$senha_usuario";} ?>"> <br> <br>
        
        <h2> ENDERECO </h2>

        <label>CEP: </label>
        <input name="cep" type="text" placeholder="cep" value="<?php if(isset($cep)) {echo "$cep";} ?>"> <br> <br>

        <label>NOME RUA: </label>
        <input name="rua" type="text" placeholder="nome da rua" value="<?php if(isset($rua)) {echo "$rua";} ?>"> <br> <br>

        <label>NUMERO DA RESIDENCIA: </label>
        <input name="numero_residencial" type="text" placeholder="numero" value="<?php if(isset($numero_residencial)) {echo "$numero_residencial";} ?>"> <br> <br>

        <label>CIDADE: </label>
        <input name="cidade" type="text" placeholder="cidade" value="<?php if(isset($cidade)) {echo "$cidade";} ?>"> <br> <br>

        <label>ESTADO: </label>
        <input name="estado" type="text" placeholder="estado" value="<?php if(isset($estado)) {echo "$estado";} ?>"> <br> <br>

        <input name="AddContMsg" type="submit" value="Enviar">

    </form>
</body>
</html>