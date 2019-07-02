<?php
    session_start();
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Campeonatos.php";

    $fecha=$_POST['fechaC'];
    $idusuario=$_SESSION['iduser'];
    $campeonato=$_POST['nombreC'];
    $categoria=$_POST['categoriaC'];
    
    $datos=array(
        $idusuario,
        $campeonato,
        $categoria,
        $fecha
    );

    $obj= new campeonatos();

    echo $obj->agregaCampeonato($datos);
?>