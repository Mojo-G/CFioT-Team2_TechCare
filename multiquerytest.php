<?php
include_once ('dbconfig.php');

$query = mysql_query("SELECT * FROM `smartwatch_sensor` ORDER BY `smartwatch_sensor`.`timestamp` DESC LIMIT 1");
while (($row = mysql_fetch_assoc($query)) !==false){
    echo $row['temp'], '<br/>';
}

$query = mysql_query("SELECT * FROM `detection` ORDER BY `detection`.`timestamp` DESC LIMIT 1");
while (($row = mysql_fetch_assoc($query)) !==false){
    echo $row['status'], '<br/>';
}
?>