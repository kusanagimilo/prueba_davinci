<input type="button" class="btn btn-success" name="crear_tratamiento" value="Crear Campaña" onclick="DialogCrearCampania()">
<br>
<br>
<table id="campanias" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Campaña</th>
        </tr>
    </thead>
</table>
<div id="dialog_n_campania"></div>
<script>
    var json = ListarCampania();

    $(document).ready(function () {
        $('#campanias').DataTable({
            data: json,
            language: {
                url: "js/espanol.json"
            }
        });
    });
</script>