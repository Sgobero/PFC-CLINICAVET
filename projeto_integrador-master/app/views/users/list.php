<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>Usuários</h1>

    <ul>
        <?php foreach($usuarios as $user): ?>

            <li>
                <?= $user['id'] ?>
                <?= $user['username'] ?>
                <?= $user['email'] ?>
                <?= $user['password'] ?>
            </li>

        <?php endforeach; ?>
    </ul>
    
</body>
</html>