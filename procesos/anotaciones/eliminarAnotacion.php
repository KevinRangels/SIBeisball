<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Anotaciones.php";
    $idanot=$_POST['idanotacion'];

    $obj= new anotaciones();
    echo $obj->eliminaAnotacion($idanot);
?>