<?php require "../../config/config.php";?>
<?php require "../../lib/html/header.php";?>
<?php require "../../lib/composer/vendor/autoload.php";?>

<?php
$objEvents = new \Classes\ClassEvents();
$events = $objEvents->getEventsById($_GET['id']);
$date = new \DateTime($events['start']);
?>

<a id="delete" href="<?php echo DIRPAGE.'controller/ControllerDelete.php?id='.$_GET['id'] ?>">
<img src="<?php echo DIRPAGE.'img/lixeira.png' ?>" alt="">
</a>

<form name="formAdd" id="formEdit" method="POST" action="<?php echo DIRPAGE.'controller/ControllerEdit.php';?>">
    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>"> <br>
    Data: <input type="date" name="date" id="date" value="<?php echo $date->format("Y-m-d"); ?>"> <br>
    Hora: <input type="time" name="time" id="time" value="<?php echo $date->format("H:i"); ?>"> <br>
    Cliente: <input type="text" name="title" id="title" value="<?php echo $events['title']; ?>"> <br>
    Descrição: <input type="text" name="description" id="description" value="<?php echo $events['description']; ?>"> <br>

    <input type="submit" value="Confirmar Consulta">
</form>

<?php require "../../lib/html/footer.php";?>