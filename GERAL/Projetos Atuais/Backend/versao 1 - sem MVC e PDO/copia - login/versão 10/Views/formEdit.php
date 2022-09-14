<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar cliente</h2>

    <p/>

    <?php foreach($data['clientes'] as $cli): ?>

        <form action="../Controllers/UserController.php?action=update&id=<?= $cli['id']?>" method="POST">

            Nome: <input type="text" name="nome" value="<?= $cli['nome']; ?>">
            <br>
            Email: <input type="text" name="email" value="<?= $cli['email']; ?>">
            <br>
            CPF: <input type="text" name="cpf" value="<?= $cli['cpf']; ?>">
            <br>
            RG: <input type="text" name="rg" value="<?= $cli['rg']; ?>">
            <br>
            Telefone: <input type="text" name="telefone" value="<?= $cli['telefone']; ?>">
            <p/>
            <input type="submit" value="Atualizar">
            <input type="reset" value="Limpar">

        </form>	

    <?php endforeach; ?>
    
</body>
</html>