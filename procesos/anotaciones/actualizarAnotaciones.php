<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Anotaciones.php";
   
   $obj= new anotaciones();
   
   $efec=($_POST['hcU']) / ($_POST['vbU']);
   
   $totalEfectividad= bcdiv($efec, '1', 3);

    $datos=array(
        $_POST['idAnotaciones'],
        $_POST['juegoSelectU'],
        $_POST['equipoSelectU'],
        $_POST['jugadorSelectU'],
        $_POST['vbU'],
        $_POST['caU'],
        $_POST['hcU'],
        $_POST['ciU'],
        $_POST['2bU'],
        $_POST['3bU'],
        $_POST['hrU'],
        $_POST['brU'],
        $_POST['sfU'],
        $_POST['bbU'],
        $_POST['dbU'],
        $_POST['obU'],
        $_POST['kU'],
        $_POST['posU'],
        $_POST['ijU'],
        $_POST['oU'],
        $_POST['aU'],
        $_POST['eU'],
        $totalEfectividad
    );

    echo $obj->actualizarAnotacion($datos);
    
?>