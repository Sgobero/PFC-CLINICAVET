<?php
#Caminhos absolutos
$dirInt = "";
//define('DIRPAGE' , "http://{$_SERVER['HTTP_HOST']}/{$dirInt}");

define('DIRPAGE' , 'http://localhost/php/calendario2022/');

$bar = (substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?"":"/";

define('DIRREQ' , "{$_SERVER['DOCUMENT_ROOT']}{$bar}{$dirInt}");

#Banco de Dados
define('HOST', 'localhost');
define('DB', 'sistema');
define('USER', 'root');
define('PASS', '');

#Incluir Arquivos
//include(DIRREQ.'lib/composer/vendor/autoload.php');