<?php

require_once __DIR__ . "/userController.php";

$userD = $_POST['exclui'];

echo("Usuário deletado com sucesso!");

deleteUserById($userD);

?>

<br>
<a href="../../index.php"> Página inicial</a>


