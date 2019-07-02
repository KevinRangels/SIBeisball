<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Pitcheos.php";

    $obj= new pitcheos();

    $idpit=$_POST['idpit'];

    echo json_encode($obj->obtenDatosPitcheo($idpit));
?>

