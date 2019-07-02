<?php
    session_start();
    $iduser=$_SESSION['iduser'];
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Anotaciones.php";

    
    $idequipo=$_POST['equipoSelect'];
    $nrojuego=$_POST['juegoSelect'];
    $nombreJugador=$_POST['jugadorSelect'];
    $VB=$_POST['vb'];
    $CA=$_POST['ca'];
    $HC=$_POST['hc'];
    $CI=$_POST['ci'];
    $B2=$_POST['2b'];
    $B3=$_POST['3b'];
    $HR=$_POST['hr'];
    $BR=$_POST['br'];
    $SF=$_POST['sf'];
    $BB=$_POST['bb'];
    $DB=$_POST['db'];
    $OB=$_POST['ob'];
    $K=$_POST['k'];
    $POS=$_POST['pos'];
    $IJ=$_POST['ij'];
    $O=$_POST['o'];
    $A=$_POST['a'];
    $E=$_POST['e'];

    $efectividad=(($HC/$VB));
    
    $totalEfectividad= bcdiv($efectividad, '1', 3);
    

       $datos=array(
        
        $nrojuego,
        $idequipo,
        $nombreJugador,
        $VB,
        $CA,
        $HC,
        $CI,
        $B2,
        $B3,
        $HR,
        $BR,
        $SF,
        $BB,
        $DB,
        $OB,
        $K,
        $POS,
        $IJ,
        $O,
        $A,
        $E,
        $totalEfectividad
       );
    

    $obj= new anotaciones();
    echo $obj->agregaAnotacion($datos);
?>
