<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Pitcheos.php";
    $idpit=$_POST['idpitcheo'];

    $obj= new pitcheos();
    echo $obj->eliminaPitcheo($idpit);
?>