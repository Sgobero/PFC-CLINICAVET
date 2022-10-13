<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php foreach($data['clientes'] as $cli): ?>

        <?= "Id: " . $cli['id'] . "<br>" ?>
        <?= "Nome: " . $cli['nome'] . "<br>" ?>
        <?= "Tipo: " . $cli['tipo'] . "<br>" ?>
        <?= "Email: " . $cli['email'] . "<br> " ?>
        <a href="../Controllers/UserController.php?action=edit&id=<?= $cli['id'] ?>">Editar </a> <br> <hr>
        
    
    <?php endforeach; ?>
    
</body>
</html>