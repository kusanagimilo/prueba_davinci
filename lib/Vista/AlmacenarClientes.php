<?php
$filas = $_POST['filas'];
?>
<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Cargar archivo de clientes y almacenar</h3>
    </div>
    <div class="panel-body" >


        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th colspan="4" style="color: red">
                        SELECCIONE LA COLUMNA QUE HACE REFERENCIA A LOS CAMPOS QUE SON SOLICITADOS PARA ALMACENAR EL CLIENTE
                    </th>
                </tr>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                </tr>    
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select id="nombres">

                        </select>
                    </td>
                    <td>
                        <select id="apellidos">

                        </select>
                    </td>
                    <td>
                        <select id="telefono">

                        </select>
                    </td>
                    <td>
                        <select id="direccion">

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Seleccione la campaña para los clientes</td>
                    <td colspan="2"><select id="campania"></select></td>
                </tr>
                <tr>
                    <td colspan="4">
            <center>
                <input type="button" value="Almacenar clientes" onclick="AlmacenarClientes()" class="btn btn-success">
            </center>
            </td>
            </tr>
            </tbody>


        </table>

    </div>
</div>
<script>
    var opciones = "<option value=''>Seleccione la columna</option>";
    for (var i = 1; i <= <?php echo $filas; ?>; i++) {
        opciones += "<option value='" + i + "'>COLUMNA # " + i + "</option>";
    }
    $("#nombres").html(opciones);
    $("#apellidos").html(opciones);
    $("#telefono").html(opciones);
    $("#direccion").html(opciones);
    SelectTratamientos();
</script>
