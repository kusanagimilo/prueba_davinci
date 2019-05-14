function GridCampanias() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/GridCampania.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}
function ListarCampania() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/CampaniaController.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListarCampania'
        },
        success: function (retu) {
            data = retu;
        }
    });
    return data;
}
function DialogCrearCampania() {
    var data;

    $.ajax({
        type: "POST",
        url: 'lib/Vista/CrearCampania.php',
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#dialog_n_campania").html(data);
    $("#dialog_n_campania").dialog({
        width: '500',
        height: '500',
        title: 'Crear Campaña',
        modal: true,
        buttons: {
            "Cerrar": function ()
            {
                $("#dialog_n_campania").dialog('close');
                $("#dialog_n_campania").dialog('destroy');
                $("#dialog_n_campania").html("");
            }
        }
    });

}

function CrearCampania() {

    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/CampaniaController.php",
        async: false,
        data: {
            opcion: 'CrearCampania',
            campania: $("#campania").val()
        },
        success: function (retu) {
            data = retu;
        }
    });
    if (data == 1) {
        alert("Se ingreso correctamente la campaña");
        $("#dialog_n_campania").dialog('close');
        $("#dialog_n_campania").dialog('destroy');
        $("#dialog_n_campania").html("");
        GridCampanias();

    } else if (data == 2) {
        alert("El tratamiento ya existe cambielo");
    } else if (data == 3) {
        alert("Error al tratar de almacenar el tratamiento");
    }
}

function SelectTratamientos() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/CampaniaController.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'SelectCampania'
        },
        success: function (retu) {
            data = retu;
        }
    });

    $("#campania").html("");
    $("#campania").append("<option value=''>--seleccione--</option>");
    $.each(data, function (key, datos) {
        $("#campania").append("<option value='" + datos.id_campania + "'>" + datos.campania + "</option>");
    });
    $("#campania").select2();
}