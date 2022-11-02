


function guardainformacion(){
    debugger;
    var cedulapro = $("#cedulapro").val();
    var pnombrepro = $("#pnombrepro").val();
    var snombrepro = $("#snombrepro").val();
    var apellidospro = $("#apellidospro").val();
    var direccionpro = $("#direccionpro").val();
    var telefonopro = $("#telefonopro").val();
    var ciudadpro = $("#ciudadpro").val();
    var pnombrecon = $("#pnombrecon").val();
    var snombrecon = $("#snombrecon").val();
    var apellidoscon = $("#apellidoscon").val();
    var direccioncon = $("#direccioncon").val();
    var telefonocon = $("#telefonocon").val();
    var ciudadcon = $("#ciudadcon").val();
    var metodo = "guardarpropietario_conductor";
    if(cedulapro!="" && pnombrepro!="" && snombrepro!="" && apellidospro!="" &&
    direccionpro!="" && telefonopro!="" && ciudadpro!="" && pnombrecon!="" &&
    snombrecon!="" && apellidoscon!="" && direccioncon!="" && telefonocon!="" &&
    ciudadcon!=""){
        $.ajax({
            url: 'gestion_vehiculos.php',
            method: 'POST',
            data: 'fuente='+canal+'&btn=traer_fuente_local'
        }).done(function (respuesta) {
            if (tabgpros_fuente === 0){
                $('#'+id_fuente).append(respuesta);
            }else{
                $('#'+id_fuente).select2('val','');
                if(primero_vacio == 1){
                    add = '<option value="">Todos</option>';
                }
                $('#'+id_fuente).html(add+respuesta);
            }
        });
    }else{
        $("#smsvehiculo").html('<div class="notification is-danger is-light"><strong>¡Ocurrio un error inesperado!</strong><br>Complete todos los campos</div>');
    }

}