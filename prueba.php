<?php

$filas = file('miarchivo.csv');
$i = 0;

var_dump(count($filas));
die();
foreach ($filas as $value) {
   
    $linea = explode(",", $value);
    var_dump($linea);
}
?>