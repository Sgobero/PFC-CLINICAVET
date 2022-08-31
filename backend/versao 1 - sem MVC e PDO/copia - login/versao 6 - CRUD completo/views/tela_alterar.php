<?php
    $id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    include('../model/protect.php');
    //$id = $_SESSION['id'];
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

    <?php
        require '../model/class/Usuario.php';
        require '../model/class/Cliente.php';

        //$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if(!empty($id))
        {   
            //echo $id;
            $cliente = new Cliente();
            $cliente->id = $id;
            $informacoes = $cliente->visualizar();
            extract($informacoes);
            /*
            echo "<pre>";
            var_dump($informacoes);
            echo "</pre>";
            */            
        }

        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if(!empty($formData["SendEditUser"])){
            $cliente2 = new Cliente();
            $cliente2->formData = $formData;
            $value = $cliente2->alterar();
        
            if($value){
                $_SESSION['mensagem'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
                header("location: ./painel.php");
            }else{
                $_SESSION['mensagem'] = "<p style='color: red;'>Usuário não editado com sucesso!</p>";
                header("location: ./painel.php");
            }
        }  
    ?>

    <h2>Alterar Informações da Conta</h2>

    <form name="EditUser" method="POST" action="">
        <input type="hidden" name="id" id="id" value="<?php echo $id ?>" /> 

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome ?>">
            <br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>">
            <br>
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" value="<?php echo $rg ?>">
            <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" value="<?php echo $telefone ?>">
            <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $email ?>">
            <br>
        
        <input type="submit" value="editar" name="SendEditUser" />
    </form>

    <?php 
          
    ?>

</body>
</html>