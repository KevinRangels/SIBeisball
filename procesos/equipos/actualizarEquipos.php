<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Equipos.php";
   
   $obj= new equipos();
   
    $datos=array(
        $_POST['idEquipo'],
        $_POST['campeonatoSelectU'],
        $_POST['nombreEquipoU'],
        $_POST['nombreManagerU']
    );

    echo $obj->actualizarEquipo($datos);
    
?>