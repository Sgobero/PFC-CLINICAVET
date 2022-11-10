<?php

    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['msg']))
    {
        echo "Mensagem: " . $_SESSION['msg'] . "<br>"; 
        unset($_SESSION['msg']);   
    }

    if(isset($this->data)){
        //echo "<pre>";var_dump($this->data);echo "</pre>";
        extract($this->data['user'][0]);
        extract($this->data['adress'][0]);
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


    <hr>


    <!-- FORMULÁRIO PARA ALTERAR INFORMAÇÕES DO CLIENTE -->
    <form method="post" action="">

        <h2> DADOS PESSOAIS </h2>

        <label>NOME: </label>
        <input name="nome_usuario" type="text" placeholder="Nome Completo" value="<?php if(isset($nome_usuario)) {echo "$nome_usuario";} ?>"> <br> <br> 
        
        <label>DATA DE NAS.: </label>
            <input name="data_nascimento" type="date" placeholder="data" value="<?php if(isset($data_nascimento)) {echo "$data_nascimento";} ?>"> <br> <br>
        
        <!-- 
            <label>EMAIL: </label>
            <input name="email" type="text" placeholder="email" value="<?php //if(isset($email)) {echo "$email";} ?>"> <br> <br>
            <label>CPF: </label>
            <input name="cpf" type="text" placeholder="CPF" value="<?php //if(isset($cpf)) {echo "$cpf";} ?>"> <br> <br>
            <label>RG: </label>
            <input name="rg" type="text" placeholder="RG" value="<?php //if(isset($rg)) {echo "$rg";} ?>"> <br> <br>
         -->
        
        <input name="AlterUser" type="submit" value="Alterar">

    </form>

    <form method="post" action="">

        <h4> ENDERECO </h4>

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

        <input name="AlterAdress" type="submit" value="Alterar">

    </form>


    <hr>


    <!-- FORMULÁRIO PARA ALTERAR INFORMAÇÕES DO PET -->
    <!-- falta implementar -->

    <?php
            for($x = 0; $x < count($this->data['pet']); $x++){
                $pet = $this->data['pet'][$x];

                extract($pet);
                
                echo "<h4> Pet " . $x+1 . ": " . $nome_pet . "</h4>";
    ?> 

        <form method="post" action="">
            
                <label>Nome: </label>
                <input name="nome_pet" type="text" value="<?php if(isset($nome_pet)) { echo $nome_pet; } ?>"> <br> <br>

                <label>Idade Pet: </label>
                <input name="idade_pet" type="text" value="<?php if(isset($idade_pet)) {echo $idade_pet; } ?>"> <br> <br>

                <label>Sexo: </label>
                <select name="sexo">
                    <option value="<?php echo $sexo ?>"> <?php echo $sexo ?> </option>
                    <option value="masculino"> Masculino </option>
                    <option value="feminino"> Feminino </option>
                </select> <br> <br>
                    

                <input type="hidden" name="idpet" value="<?php echo $idpet ?>">;
                <?php echo " idPet: " . $idpet . "<br>" ?>
                    <!-- 
                <label>Espécie: </label>
                <input name="tipo_pet" type="text" value="<?php //if(isset($raca)) { echo $raca; } ?>"> <br> <br>
                <label>Raça: </label>
                <input name="raca" type="text" value="<?php//if(isset($tipo_pet)) { echo $tipo_pet; } ?>"> <br> <br>
                -->
                <input name="AlterPet" type="submit" value="Alterar" >
                <input name="DeleteU" type="submit" value="Delete" >

                <hr>

            

        </form>

    <?php } ?>

</body>
</html>