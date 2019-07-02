<?php 

    require_once "../../clases/Conexion.php";
    require_once "../../clases/Campeonatos.php";
    $id=$_POST['idcampeonato'];

    $obj= new campeonatos();
    echo $obj->eliminaCampeonato($id);
?>