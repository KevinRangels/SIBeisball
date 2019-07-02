<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Partidos.php";
    $idpart=$_POST['idpartido'];

    $obj= new partidos();
    echo $obj->eliminaPartido($idpart);
?>