<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Jugadores.php";

    $obj= new jugadores();

    $idjugad=$_POST['idjugad'];

    echo json_encode($obj->obtenDatosJugador($idjugad));
?>