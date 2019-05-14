<script>
    $('#frm_campania').validate({
        rules: {
            campania: {required: true}
        },
        messages: {
            campania: {required: 'Ingrese el nombre de la campaña.'}
        },
        debug: true,
        invalidHandler: function () {

            alert('Hay información en el formulario sin diligenciar por favor completarla');
            return false;
        },
        submitHandler: function (form) {
            CrearCampania();
        }
    });
</script>

<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Nueva Campaña</h3>
    </div>
    <div class="panel-body" >
        <form id="frm_campania">
            <table class="table table-bordered table-striped">

                <tr>
                    <td>Ingrese el nombre de la campaña</td>
                    <td><input type="text" id="campania" name="campania"></td>
                </tr>
                <td colspan="2"><center>

                    <button id="btoGuardarPaciente" name="btoGuardarPaciente" class="btn btn-success" type="submit" >Guardar</button>
                </center></td>
                </tr>
            </table>
        </form>
    </div>
</div>

