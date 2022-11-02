<?php

    #ALMACENAR DATOS #
    //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    $usuario = limpiarCadena($_POST['login_usuario']);
    $clave = limpiarCadena($_POST['login_clave']);

    #verificar datos obligatorios #
    if($usuario=="" || $clave==""){
        echo '
            <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }
    if(verificarDatos("[a-zA-Z0-9]{4,20}",$usuario)){
        echo '
            <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
           El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificarDatos("[a-zA-Z0-9$@.-]{7,100}",$clave)){
        echo '
            <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
           El CLAVE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    $check_user = conexion();
    print_r($check_user);
    $check_user=$check_user->query("SELECT * FROM usuarios WHERE usuario='$usuario'");

    if($check_user->rowCount()==1){
        $check_user=$check_user->fetch();
        if($check_user['usuario']==$usuario && $clave == $check_user['claveusuario']){
            $_SESSION['nombre']=$check_user['nombre'];
            $_SESSION['id']=$check_user['documento'];
            
            $_SESSION['usuario']=$check_user['usuario'];
            if(headers_sent()){
                echo "<script> window.location.href='index.php?vista=home'</script>";
            }else{
                header("Location: index.php?vista=home");
            }
        }else{

        }
    }else{
        echo '
            <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
           Usuario o Clave incorrectos
            </div>
        ';
    }
    $check_user=null;
?>