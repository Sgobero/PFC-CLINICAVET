<?php
require 'config/config.php';
require 'lib/composer/vendor/autoload.php';
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Calendário Agenda com PHP</title>

    <link rel = "stylesheet" href="<?php echo DIRPAGE;?>lib/css/style.css">
    <link rel = "stylesheet" href="<?php echo DIRPAGE;?>lib/js/FullCalendar/main.min.css"> 
</head>

<body>
    <div class="calendar"></div>
    
    <script src ="<?php echo DIRPAGE;?>lib/js/FullCalendar/main.min.js"></script>
    <script src ="<?php echo DIRPAGE;?>lib/js/javascript.js"></script>
</body>
</html>