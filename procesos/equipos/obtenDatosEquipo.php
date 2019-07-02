<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Equipos.php";

    $obj= new equipos();

    $idequi=$_POST['idequi'];

    echo json_encode($obj->obtenDatosEquipo($idequi));
?>