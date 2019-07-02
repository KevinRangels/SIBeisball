<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Jugadores.php";
    $idjug=$_POST['idjugador'];

    $obj= new jugadores();
    echo $obj->eliminaJugador($idjug);
?>