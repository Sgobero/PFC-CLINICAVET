<?php

require_once __DIR__ . "/userController.php";

$userD = $_POST['exclui'];
echo $userD;

deleteUserById($userD);
header("location: ./app/controllers/deleta.php");

