function FormCargarArchivo() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/CargarArchivo.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });
    $("#contenido").html(data);
}
function ExaminarArchivo() {

    var separacion = $("#separacion").val();
    var archivo = document.getElementById("archivo");

    if (separacion == "" || $("#archivo").val() == "") {

        alert("Ingrese todos los campos");

    } else {


        var formElement = document.getElementById("frm_forms");
        var data = new FormData(formElement);
        var file;
        file = archivo.files[0];
        data.append('archivo', file);
        data.append('separador', separacion);
        data.append('opcion', 'ExaminarArchivo');


        var url = "lib/Control/ClienteController.php";
        var retorno;
        $.ajax({
            url: url,
            dataType: "json",
            type: 'POST',
            contentType: false,
            data: data,
            async: false,
            processData: false,
            cache: false
        }).done(function (retu) {
            //console.log(retu);
            retorno = retu;
        });

        //console.log(retorno);

        if (retorno == 'archivo_vacio') {
            alert("EL ARCHIVO ESTA VACIO");
        } else {
            var filas = retorno[0].length;

            var html = "<table class='table'><thead><tr><th colspan='" + filas + "'>DATOS DE EL ARCHIVO CARGADO (solo se cargan las dos primeras filas)</th></tr><tr>";

            for (var i = 1; i <= retorno[0].length; i++) {
                html += "<th> COLUMNA #" + i + "</th>";

            }
            html += "</tr></thead><tbody>";

            for (var a = 0; a < retorno.length; a++) {
                html += "<tr>";
                for (var e = 0; e < retorno[a].length; e++) {
                    html += "<td>" + $.trim(retorno[a][e]) + "</td>";
                }
                html += "</tr>";
            }



            html += "</tbody></table>";
            $("#carga_archivo").html(html);

            FormAlmacenarCientes(filas);

        }
    }
}

function FormAlmacenarCientes(filas) {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/AlmacenarClientes.php",
        async: false,
        data: {
            filas: filas
        },
        success: function (retu) {
            data = retu;
        }
    });
    $("#cont_form_almacenar").html(data);
}

function AlmacenarClientes() {

    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var campania = $("#campania").val();

    var separacion = $("#separacion").val();
    var archivo = document.getElementById("archivo");
    var formElement = document.getElementById("frm_forms");
    var data = new FormData(formElement);
    var file;
    file = archivo.files[0];
    data.append('archivo', file);
    data.append('separador', separacion);
    data.append('opcion', 'AlmacenarClientes');
    data.append('nombres', nombres);
    data.append('apellidos', apellidos);
    data.append('telefono', telefono);
    data.append('direccion', direccion);
    data.append('campania', campania);

    var url = "lib/Control/ClienteController.php";
    var retorno;
    $.ajax({
        url: url,
        dataType: "json",
        type: 'POST',
        contentType: false,
        data: data,
        async: false,
        processData: false,
        cache: false
    }).done(function (retu) {
        //console.log(retu);
        retorno = retu;
    });

    if (retorno == 'archivo_vacio') {
        alert("El archivo esta vacio");
    } else if (retorno == 1) {
        alert("Se ingreso correctamente los clientes en la campaña seleccionada");
        FormCargarArchivo();
    } else if (retorno == 3) {
        alert("Ocurrio un error al tratar de alacenar los clientes");
    }

}

function GridClientes() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Vista/GridClientes.php",
        async: false,
        success: function (retu) {
            data = retu;
        }
    });

    $("#contenido").html(data);
}
function ListarClientes() {
    var data;
    $.ajax({
        type: "POST",
        url: "lib/Control/ClienteController.php",
        async: false,
        dataType: 'json',
        data: {
            opcion: 'ListarClientes'
        },
        success: function (retu) {
            data = retu;
        }
    });
    return data;
}