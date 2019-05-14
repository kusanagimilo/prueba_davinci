<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Campania
 *
 * @author JuanCamilo
 */
require_once '../config/UtilidadesBD.php';

class Campania {

    public function CrearCampania($data) {
        $utilidades = new UtilidadesBD();
        $existe = $utilidades->ValidarExiste('campania', 'campania', $data['campania']);
        if ($existe > 0) {
            return 2;
        } else {
            /* campos de la tabla */
            $campos = array('campania',
                'estado');
            /* valores que llegan desde el control */
            $valores = array('campania' => $data['campania'],
                'estado' => 'AC');
            $retorno = $utilidades->Insertar('campania', $campos, $valores);
            if ($retorno == "error") {
                return 3;
            } else if ($retorno == 'ingreso') {
                return 1;
            }
        }
    }

    public function ListarCampania($data) {

        $arreglo_retorno = array();

        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT id_campania,campania,estado FROM campania WHERE estado=:estado";
        $parametros = array('estado' => 'AC');
        $arreglo = $utilidades->Datos($sentencia, $parametros);


        foreach ($arreglo as $key => $value) {
            $arreglo_interior = array($value['campania']);
            array_push($arreglo_retorno, $arreglo_interior);
        }

        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function SelectCampania($data) {
        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT id_campania,campania FROM campania WHERE estado=:estado";
        $parametros = array('estado' => 'AC');
        $arreglo = $utilidades->Datos($sentencia, $parametros);
        $json = json_encode($arreglo);
        return $json;
    }

}
