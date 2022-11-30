<?php
require "../config/config.php";
require "../lib/composer/vendor/autoload.php";

$objEvents = new \Classes\ClassEvents();

$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);
$objEvents->deleteEvent($id);