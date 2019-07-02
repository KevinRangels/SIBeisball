<?
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Partidos.php";

    

    $datos=array(
        $_POST['idpartido'],
        $_POST['nroJuegoU'],
        $_POST['equipoSelectU'],
        $_POST['fechaPartidoU'],
        $_POST['LocaliaU'],
        $_POST['jjU'],
        $_POST['jgU'],
        $_POST['jeU'],
        $_POST['jpU'],
        $_POST['cfU'],
        $_POST['hU'],
        $_POST['eU'],
        $_POST['ccU']
        
    );

    $obj= new partidos();
    echo $obj->actualizaPartido($datos);

?>