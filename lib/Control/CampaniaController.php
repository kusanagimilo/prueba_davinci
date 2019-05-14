<?php

require_once '../Modelo/Campania.php';
$obj_campania = new Campania();
$opcion = $_POST['opcion'];
$retorno;
switch ($opcion) {
    case 'CrearCampania':
        $retorno = $obj_campania->CrearCampania($_POST);
        echo $retorno;
        break;
    case 'ListarCampania':
        $retorno = $obj_campania->ListarCampania($_POST);
        echo $retorno;
        break;
    case 'SelectCampania':
        $retorno = $obj_campania->SelectCampania($_POST);
        echo $retorno;
        break;
}