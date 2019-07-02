<?php
    session_start();
    $iduser=$_SESSION['iduser'];
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Pitcheos.php";

    
    $idequipo=$_POST['equipoSelect'];
    $nrojuego=$_POST['juegoSelect'];
    $nombreJugador=$_POST['jugadorSelect'];
    $IJ=$_POST['ij'];
    $C=$_POST['c'];
    $CL=$_POST['cl'];
    $Sko=$_POST['sko'];
    $S=$_POST['s'];
    $P=$_POST['p'];

    $efectividad=$CL*9;
    $efectividad=($efectividad/$IJ);
    $totalEfectividad= bcdiv($efectividad, '1', 3);
               
    

       $datos=array(
        $idequipo,
        $nrojuego,
        $nombreJugador,
        $IJ,
        $C,
        $CL,
        $Sko,
        $S,
        $P,
        $totalEfectividad
        );
    

    $obj= new pitcheos();
    echo $obj->agregaPitcheos($datos);
?>