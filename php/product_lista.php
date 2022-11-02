<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla="";
    
    if(isset($_POST['txt_buscador']) && $_POST['txt_buscador']!=""){
        $busqueda = $_POST['txt_buscador'];
        $consulta_datos="SELECT * FROM vehiculos veh inner join tipo_vehiculo tip on tip.codigo = veh.tipo_vehiculo WHERE ((placa LIKE '%$busqueda%' 
        OR color LIKE '%$busqueda%' OR marca LIKE '%$busqueda%' OR tipo_vehiculo LIKE '%$busqueda%'
        OR conductor LIKE '%$busqueda%' OR propietario LIKE '%$busqueda%')) 
        ORDER BY placa ASC LIMIT";

        $consulta_total="SELECT count(placa) FROM vehiculos WHERE((placa LIKE '%$busqueda%' OR color LIKE '%$busqueda%'
        OR marca LIKE '%$busqueda%' OR tipo_vehiculo LIKE '%$busqueda%' OR conductor LIKE '%$busqueda%')) ";
    }else{
        $consulta_datos="SELECT prop.primer_nombre as pnombrepro, prop.segundo_nombre as snombrepro, prop.apellidos as apellidospro,
        con.primer_nombre as pnombrecon,con.segundo_nombre as snombrecon, con.apellidos as apellidoscon, placa, marca, tip.descripcion  FROM vehiculos veh 
        inner join tipo_vehiculo tip on tip.codigo = veh.tipo_vehiculo
        inner join propietarios prop on prop.documento = veh.propietario
        inner join conductores con on con.documento = veh.conductor
         where true
        ORDER BY placa ASC LIMIT $inicio,$registros";

        $consulta_total="SELECT count(placa) FROM vehiculos ";
    }
    //var_dump($consulta_datos);
    $conexion = conexion();

    $datos =  $conexion ->query($consulta_datos);
    $datos = $datos->fetchAll();

    $total = $conexion->query($consulta_total);
    $total = (int) $total->fetchColumn();

    $Npaginas=ceil($total/$registros);

    $tabla.='
    <div class="table-container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr class="has-text-centered">
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Nombre Conductor</th>
                    <th>Nombre Propietario</th>
                    <th>Tipo vehiculo</th>                   
                    <th colspan="2">Opciones</th>
                </tr>
            </thead>
            <tbody>
    
    ';
    if($total>=1 && $pagina<=$Npaginas){
        $contador=$inicio+1;
        $pag_inicio=$inicio+1;
        foreach($datos as $rows){
            
            $tabla.='
            <tr class="has-text-centered" >
                <td>'.$rows['placa'].'</td>
                <td>'.$rows['marca'].'</td>
                <td>'.$rows['pnombrecon'].' '.$rows['snombrecon'].' '.$rows['apellidoscon'].'</td>
                <td>'.$rows['pnombrepro'].' '.$rows['snombrepro'].' '.$rows['apellidospro'].'</td>
                <td>'.$rows['descripcion'].'</td>
                
                <td>
                  <!--  <a href="index.php?vista=product_update&idpro='.$rows['placa'].'" class="button is-success is-rounded is-small">Actualizar</a> -->
                </td>
                <td>
                   <!-- <a href="'.$url.$pagina.'&produc_del='.$rows['placa'].'" class="button is-danger is-rounded is-small">Eliminar</a> -->
                </td>
            </tr>   
            ';
            $contador++;
        }
        $pag_final=$contador-1;
    }else{
        if($total>=1){
            $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    <a href="'.$url.'1" class="button is-link is-rounded is-small mt-4 mb-4">
                        Haga clic acá para recargar el listado
                    </a>
                </td>
            </tr>
            ';
        }else{
            $tabla.='
            <tr class="has-text-centered" >
                <td colspan="7">
                    No hay registros en el sistema
                </td>
            </tr>
            ';
        }
    }

    $tabla.='</tbody></table></div>';

    if($total>=1 && $pagina<=$Npaginas){
        $tabla.=' <p class="has-text-right">Mostrando usuarios <strong>'.
        $pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un 
        <strong>total de '.$total.'</strong></p>';
    }


    $conexion=null;
    echo $tabla;
    if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
    }
?>





