<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Anotaciones.php";

    $obj= new anotaciones();

    $idanot=$_POST['idanot'];

    echo json_encode($obj->obtenDatosAnotacion($idanot));
?>