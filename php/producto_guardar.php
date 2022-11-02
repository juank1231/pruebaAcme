<?php
    require_once "./main.php";

    #almacenar datos

    $cedulapro = limpiarCadena($_POST['cedulapro']);
    $pnombrepro = limpiarCadena($_POST['pnombrepro']);
    $snombrepro = limpiarCadena($_POST['snombrepro']);
    $apellidospro = limpiarCadena($_POST['apellidospro']);
    $direccionpro = limpiarCadena($_POST['direccionpro']);
    $telefonopro = limpiarCadena($_POST['telefonopro']);
    $ciudadpro = limpiarCadena($_POST['ciudadpro']);

    $pnombrecon = limpiarCadena($_POST['pnombrecon']);
    $snombrecon = limpiarCadena($_POST['snombrecon']);
    $apellidoscon = limpiarCadena($_POST['apellidoscon']);
    $direccioncon = limpiarCadena($_POST['direccioncon']);
    $telefonocon = limpiarCadena($_POST['telefonocon']);
    $ciudadcon = limpiarCadena($_POST['ciudadcon']);
    $cedulacon = limpiarCadena($_POST['cedulacon']);

    $placav = limpiarCadena($_POST['placav']);
    $colorv = limpiarCadena($_POST['colorv']);
    $marcav = limpiarCadena($_POST['marcav']);
    $tipov = limpiarCadena($_POST['tipov']);
 
   
    #verificar datos obligatorios #
    if($cedulapro=="" || $pnombrepro=="" || $snombrepro=="" || $apellidospro=="" || $direccionpro=="" || $telefonopro=="" || $ciudadpro=="" ||
    $cedulacon=="" || $pnombrecon=="" || $snombrecon=="" || $apellidoscon=="" || $direccioncon=="" || $telefonocon=="" || $ciudadcon=="" ||
    $placav=="" || $colorv=="" || $marcav=="" || $tipov=="" ){
        echo '
            <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }

   


    # validando datos ## 

      
        
    # una ves verificado empiezo a guardar el propietario
    $guardar_producto=conexion();
    $guardar_producto= $guardar_producto->prepare("INSERT INTO propietarios(documento,primer_nombre,segundo_nombre,apellidos,direccion,telefono,ciudad)
    VALUES(:documento,:pnombre,:snombre,:apellidos,:direccion,:telefono,:ciudad)");
    $fecha = date("Ymd");
    $marcadores=[
        ":documento"=>$cedulapro,
        ":pnombre"=>$pnombrepro,
        ":snombre"=>$snombrepro,
        ":apellidos"=>$apellidospro,
        ":direccion"=>$direccionpro,
        ":telefono"=>$telefonopro,
        ":ciudad"=>$ciudadpro       
      
  
    ];

    $guardar_producto->execute($marcadores);
 
    $guardar_producto1=conexion();
    $guardar_producto1= $guardar_producto1->prepare("INSERT INTO conductores(documento,primer_nombre,segundo_nombre,apellidos,direccion,telefono,ciudad)
    VALUES(:documento,:pnombre,:snombre,:apellidos,:direccion,:telefono,:ciudad)");
    $fecha = date("Ymd");
    $marcadores1=[
        ":documento"=>$cedulacon,
        ":pnombre"=>$pnombrecon,
        ":snombre"=>$snombrecon,
        ":apellidos"=>$apellidoscon,
        ":direccion"=>$direccioncon,
        ":telefono"=>$telefonocon,
        ":ciudad"=>$ciudadcon       
      
  
    ];
    //var_dump($guardar_producto);
    $guardar_producto1->execute($marcadores1);

 
    $guardar_producto2=conexion();
    $guardar_producto2= $guardar_producto2->prepare("INSERT INTO vehiculos(placa,color,marca,tipo_vehiculo,conductor,propietario)
    VALUES(:placa,:color,:marca,:tipo,:conductor,:propietario)");
    $fecha = date("Ymd");
    $marcadores2=[
        ":placa"=>$placav,
        ":color"=>$colorv,
        ":marca"=>$marcav,
        ":tipo"=>$tipov,
        ":conductor"=>$cedulacon,
        ":propietario"=>$cedulapro    
      
  
    ];
    //var_dump($guardar_producto);
    $guardar_producto2->execute($marcadores2);
    if($guardar_producto2->rowCount()==1){
        echo '
        <div class="notification is-info is-light">
            <strong>Vehiculo REGISTRADO!</strong><br>
            El vehiculo a sido registrado exitosamente.
        </div>
        ';
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No se pudo registrar el vehiculo, por favor intente nuevmente.
        </div>
    ';
    }
   
    $guardar_producto=null;
    $guardar_producto1=null;
    $guardar_producto2=null;
    
?>

