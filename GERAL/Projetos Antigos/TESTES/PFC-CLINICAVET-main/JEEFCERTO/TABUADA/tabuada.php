
<?php

$num = $_POST['num'];
$vezes = $_POST['vezes'];
$resul;

    echo "<h2>TÁBUADA DO $num MULTIPLICADA $vezes VEZES </h2><hr>";

    for($i = 1 ; $i <=$vezes ; $i++){
        $resul= $num*$i;
        echo "$num  *  $i  =   $resul  <br>"; 
    }