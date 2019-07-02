<?php
    session_start();
    $iduser=$_SESSION['iduser'];
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Jugadores.php";

    
    $idequipo=$_POST['equipoSelect'];
    $nombre=$_POST['nombreJugador'];
    $apellido=$_POST['apellidoJugador'];
    $cedula=$_POST['cedulaJugador'];

    $datos=array(
        $idequipo,
        $nombre,
        $apellido,
        $cedula
    );

    $obj= new jugadores();
    echo $obj->agregaJugador($datos);
?>

