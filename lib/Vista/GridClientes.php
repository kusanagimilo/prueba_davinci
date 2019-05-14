<table id="clientes" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Campañas</th>
        </tr>
    </thead>
</table>
<script>
    var json = ListarClientes();

    $(document).ready(function () {
        $('#clientes').DataTable({
            data: json,
            language: {
                url: "js/espanol.json"
            }
        });
    });
</script>