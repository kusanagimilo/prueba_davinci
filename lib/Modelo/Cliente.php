<?php

require_once '../config/UtilidadesBD.php';

class Cliente {

    public function ExaminarArchivo($data, $files_data) {

        $arreglo_retorno = array();
        $filas = file($files_data['archivo']['tmp_name']);

        $conteo_filas = count($filas);
        $fin = 0;

        if ($conteo_filas == 0) {
            return "archivo_vacio";
        } else if ($conteo_filas == 1) {
            $fin = 1;
        } else if ($conteo_filas > 1) {
            $fin = 2;
        }

        for ($index = 0; $index < $fin; $index++) {
            $linea = explode($data["separador"], $filas[$index]);
            array_push($arreglo_retorno, $linea);
        }

        return json_encode($arreglo_retorno);
    }

    public function AlmacenarClientes($data, $files_data) {

        $filas = file($files_data['archivo']['tmp_name']);
        $conteo_filas = count($filas);
        $utilidades = new UtilidadesBD();

        if ($conteo_filas == 0) {
            return "archivo_vacio";
        } else {
            for ($index = 0; $index < count($filas); $index++) {
                $linea = explode($data["separador"], $filas[$index]);
                $nombres = $linea[$data['nombres'] - 1];
                $apellidos = $linea[$data['apellidos'] - 1];
                $telefono = $linea[$data['telefono'] - 1];
                $direccion = $linea[$data['direccion'] - 1];

                $sentencia = "SELECT id_cliente FROM cliente WHERE nombres=:nombres AND apellidos=:apellidos";
                $parametros = array(':nombres' => $nombres,
                    ':apellidos' => $apellidos);
                $arreglo = $utilidades->Datos($sentencia, $parametros);
                $id_cliente = "";
                if (!empty($arreglo)) {
                    $id_cliente = $arreglo[0]["id_cliente"];
                } else {
                    /* campos de la tabla */
                    $campos = array('nombres',
                        'apellidos',
                        'telefono',
                        'direccion');
                    /* valores que llegan desde el control */
                    $valores = array('nombres' => $nombres,
                        'apellidos' => $apellidos,
                        'telefono' => $telefono,
                        'direccion' => $direccion);
                    $resultado_cliente = $utilidades->Insertar('cliente', $campos, $valores);
                    if ($resultado_cliente == "error") {
                        return 2;
                    } else {
                        $sentencia2 = "SELECT MAX(id_cliente) AS maximo_id FROM cliente";
                        $parametros2 = NULL;
                        $arreglo2 = $utilidades->Datos($sentencia2, $parametros2);
                        $id_cliente = $arreglo2[0]['maximo_id'];
                    }
                }
                $campos2 = array('id_campania',
                    'id_cliente');
                /* valores que llegan desde el control */
                $valores2 = array('id_campania' => $data['campania'],
                    'id_cliente' => $id_cliente);
                $resultado_cliente2 = $utilidades->Insertar('campania_cliente', $campos2, $valores2);
            }
            if ($resultado_cliente2 == 'ingreso') {
                return 1;
            } else if ($resultado_cliente2 == 'error') {
                return 3;
            }
        }
    }

    public function ListarClientes($data) {

        $arreglo_retorno = array();

        $utilidades = new UtilidadesBD();
        $sentencia = "SELECT id_cliente,nombres,apellidos,telefono,direccion FROM cliente";
        $parametros = NULL;
        $arreglo = $utilidades->Datos($sentencia, $parametros);

        if (empty($arreglo)) {
            return 0;
        } else {
            foreach ($arreglo as $key => $value) {
                $campaña = "<ul>";

                $sentencia2 = "SELECT cmp.campania
FROM campania_cliente cmpc
INNER JOIN campania cmp ON cmpc.id_campania = cmp.id_campania
WHERE cmpc.id_cliente =:cliente";
                $parametros2 = array('cliente' => $value['id_cliente']);
                $arreglo2 = $utilidades->Datos($sentencia2, $parametros2);

                foreach ($arreglo2 as $key => $value2) {
                    $campaña .= "<li><span class='label label-primary'>" . $value2['campania'] . "</span></li>";
                }
                $campaña .= "</ul>";

                $arreglo_interior = array($value['nombres'],
                    $value['apellidos'],
                    $value['telefono'],
                    $value['direccion'],
                    $campaña);
                array_push($arreglo_retorno, $arreglo_interior);

                $campaña = "";
            }
        }

        $json = json_encode($arreglo_retorno);
        return $json;
    }

}
