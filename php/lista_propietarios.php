<?php

    $inicio = ($pagina>0) ? (($pagina*$registros)-$registros) : 0;
    $tabla="";

   
        $consulta_datos="SELECT * FROM propietarios where true
        ORDER BY documento ASC LIMIT $inicio,$registros";

        $consulta_total="SELECT count(documento) FROM propietarios";
    
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
                    <th>Documento</th>
                    <th>Primer Nombre</th>
                    <th>Segundo Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion Venta</th>
                    <th>Telefono</th>                    
                    <th>Ciudad</th>                    
                    
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
                <td>'.$rows['documento'].'</td>
                <td>'.$rows['primer_nombre'].'</td>
                <td>'.$rows['segundo_nombre'].'</td>
                <td>$'.$rows['apellidos'].'</td>
                <td>$'.$rows['direccion'].'</td>
                <td>'.$rows['telefono'].'</td>
                <td>'.$rows['ciudad'].'</td>
                
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
        $tabla.=' <p class="has-text-right">Mostrando Ventas <strong>'.
        $pag_inicio.'</strong> al <strong>'.$pag_final.'</strong> de un 
        <strong>total de '.$total.'</strong></p>';
    }


    $conexion=null;
    echo $tabla;
    if($total>=1 && $pagina<=$Npaginas){
        echo paginador_tablas($pagina,$Npaginas,$url,7);
    }
?>





