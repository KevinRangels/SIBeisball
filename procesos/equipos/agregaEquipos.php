<?php
    session_start();
    $iduser=$_SESSION['iduser'];
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Equipos.php";

    $idcampeonato=$_POST['campeonatoSelect'];
    $nombre=$_POST['nombreEquipo'];
    $manager=$_POST['nombreManager'];

    $datos=array(
        $idcampeonato,
        $nombre,
        $manager
    );
   
    $obj= new equipos();
    echo $obj->agregaEquipo($datos);

?>



