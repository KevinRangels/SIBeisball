<?php

require_once "../../clases/Conexion.php";
require_once "../../clases/Equipos.php";
    $idequi=$_POST['idequipo'];
    $obj=new equipos();

    echo $obj->eliminaEquipo($idequi);
?>