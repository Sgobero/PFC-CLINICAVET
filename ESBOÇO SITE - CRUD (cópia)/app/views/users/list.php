<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="gray">


    <h1>Usuários</h1>

    <?php foreach($data['usuarios'] as $user): ?>
        <table border="1">

            <tr>
                <td>
                    ID
                </td>

                <td>
                    NOME
                </td>

                <td>
                    EMAIL
                </td>

                <td>
                    LOGIN
                </td>

                <td>
                    CPF
                </td>

                <td>
                    RG
                </td>

                <td>TIPO DE USUÁRIO
                
                <td>
                    OPERAÇÕES
                </td>
                </td>
                
            </tr>
            

    <ul>

            <tr>
                <td>
                    <?= $user['id'] ?>
                    </td>

                    <td>
                    <?= $user['username'] ?>
                    </td>

                    <td>
                    <?= $user['email'] ?>
                    </td>

                    <td>
                    <?= $user['login'] ?>
                    </td>

                    <td>
                    <?= $user['cpf'] ?>
                    </td>

                    <td>
                    <?= $user['rg'] ?>
                    </td>

                    <td>
                    <?= $user['userType'] ?>
                    </td>
                    <td> <a href="../controllers/userController.php?action=findUserById&id=<?= $user['id'] ?>">EDITAR </a> |
                    <a href="../controllers/userController.php?action=deleteUserById&id=<?= $user['id'] ?>">EXCLUIR </a>
                
                    </td>
                </td>

            </tr>

        </table>

        <?php endforeach; ?>
    </ul>
    
</body>
</html>