<?php
    require '../config/config.php';
    require '../lib/composer/vendor/autoload.php';
    $objEvents = new \Classes\ClassEvents();
    echo $objEvents->getEvents();
?>