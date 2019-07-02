<?php
     require_once "../../clases/Conexion.php";
     require_once "../../clases/Campeonatos.php";

     

     $datos=array(
        $_POST['idcampeonato'],
        $_POST['nombreCU'],
        $_POST['categoriaCU'],
        $_POST['fechaCU']
     );

     $obj= new campeonatos();

     echo $obj->actualizaCampeonato($datos);
?>