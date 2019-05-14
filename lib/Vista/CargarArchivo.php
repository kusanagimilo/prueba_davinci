
<style>
    .scroller{ 
        overflow-x: scroll;
        overflow-y: hidden;
        height: 90px;
        white-space:nowrap;
    } 
</style>

<div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Examinar Archivo</h3>
    </div>
    <div class="panel-body" >
        <form enctype='multipart/form-data' method='post' name='fileinfo' id='frm_forms'> 
            <table class="table table-bordered table-striped">

                <tr>
                    <td>Seleccione el archivo</td>
                    <td><input type="file" name="archivo" id="archivo" ></td>
                </tr>
                <tr>
                    <td>Ingrese la separacion de columnas de el archivo</td>
                    <td><input type="text" id="separacion" name="separacion"></td>
                </tr>
                <tr>
                    <td colspan="2">
                <center>
                    <input type="button" onclick="ExaminarArchivo()" value="examinar archivo" class="btn btn-primary">
                </center>
                </td>
                </tr>
                <tr>
                    <td colspan="2" id="carga_archivo" class="scroller">

                <center><span class="label label-info">Cargue el archivo para ver su contenido</span></center>
                </td>
                </tr>

            </table>
        </form>
    </div>
</div>
<div id="cont_form_almacenar">

</div>

