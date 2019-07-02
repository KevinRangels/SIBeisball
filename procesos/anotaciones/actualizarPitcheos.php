<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Pitcheos.php";
   
   $obj= new pitcheos();
   
   $efec=$_POST['clU']*9;
   $efec=$efec/$_POST['ijU'];
   $totalEfectividad= bcdiv($efec, '1', 3);

    $datos=array(
        $_POST['idPitcheos'],
        $_POST['juegoSelectU'],
        $_POST['equipoSelectU'],
        $_POST['jugadorSelectU'],
        $_POST['ijU'],
        $_POST['cU'],
        $_POST['clU'],
        $_POST['skoU'],
        $_POST['sU'],
        $_POST['pU'],
        $totalEfectividad
    );

    echo $obj->actualizarPitcheo($datos);
    
?>