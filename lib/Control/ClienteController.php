<?php

include '../Modelo/Cliente.php';
$obj_cliente = new Cliente();
$opcion = $_POST['opcion'];
if ($opcion == 'ExaminarArchivo') {
    $retorno = $obj_cliente->ExaminarArchivo($_POST, $_FILES);
    echo $retorno;
}if ($opcion == 'AlmacenarClientes') {
    $retorno = $obj_cliente->AlmacenarClientes($_POST, $_FILES);
    echo $retorno;
}if ($opcion == 'ListarClientes') {
    $retorno = $obj_cliente->ListarClientes($_POST, $_FILES);
    echo $retorno;
}