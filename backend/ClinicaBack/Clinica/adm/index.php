<<<<<<< Updated upstream
<?php

session_start();
ob_start(); //buffer de saída

//Constante que define que o usuário está acessando páginas internas através da página "index.php".
define('D7E4T2K6F4', true);

//Carregar o Composer
require './vendor/autoload.php';

//Instanciar a classe ConfigController, responsável em tratar a URL
$home = new Core\UrlController();

$home->verifyPage();

=======
<?php

session_start();
ob_start(); //buffer de saída

//Constante que define que o usuário está acessando páginas internas através da página "index.php".
define('D7E4T2K6F4', true);

//Carregar o Composer
require './vendor/autoload.php';

//Instanciar a classe ConfigController, responsável em tratar a URL
$home = new Core\UrlController();

$home->verifyPage();

>>>>>>> Stashed changes
?>