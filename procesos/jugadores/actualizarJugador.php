<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Jugadores.php";
   
   $obj= new jugadores();
   
    $datos=array(
        $_POST['idJugador'],
        $_POST['equipoSelectU'],
        $_POST['nombreJugadorU'],
        $_POST['apellidoJugadorU'],
        $_POST['cedulaJugadorU']
    );

    echo $obj->actualizarJugador($datos);
    
?>