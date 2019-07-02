<?php
    session_start();
    $iduser=$_SESSION['iduser'];
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Partidos.php";
    require_once "../../clases/Anotaciones.php";
    require_once "../../clases/Pitcheos.php";

    $sql="SELECT jueg.nro_juego,
    SUM(anot.CA),
    anot.HC,
    anot.id_anotaciones,
    from anotaciones as anot
    inner join juegos as jueg
    on anot.id_juego=jueg.id_juego
    GROUP BY jueg.nro_juego";
    


    
  

    $nrojuego=$_POST['nroJuego'];
    $idequipo=$_POST['equipoSelect'];
    $fecha=$_POST['fechaPartido'];
    $localia=$_POST['Localia'];
    $JJ=$_POST['jj'];
    $JG=$_POST['jg'];
    $JE=$_POST['je'];
    $JP=$_POST['jp'];
    $CF=$_POST['cf'];
    $H=$_POST['h'];
    $E=$_POST['e'];
    $CC=$_POST['cc'];

 

    $datos=array(
        $nrojuego,
        $idequipo,
        $fecha,
        $localia,
        $JJ,
        $JG,
        $JE,
        $JP,
        $CF,
        $H,
        $E,
        $CC

    );

    $obj= new partidos();
    echo $obj->agregaPartido($datos);
?>

