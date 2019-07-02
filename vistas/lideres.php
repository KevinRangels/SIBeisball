<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    <title>Posiciones</title>
    <?php require_once "menu.php" ?>
</head>

<body>
    <br><br>
    <div class="container">
    <div class="row">
    <div class="row"> <img class="center-block" src="../img/lideresbateo.png" </div>
        </div>
        
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div id="tablaLiderJonronesLoad"></div>

            </div>
            <div class="col-sm-3">
                <div id="tablaLiderCarreraImpulsadaLoad"></div>
            </div>
            <div class="col-sm-3">
                <div id="tablaLiderBasesRobadasLoad"></div>
            </div
            
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
        <div class="row"> <img class="center-block" src="../img/liderespicheo.png" </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div id="tablaLiderGanadosLoad"></div>

            </div>
            <div class="col-sm-3">
                <div id="tablaLiderPonchesLoad"></div>
            </div>
            <div class="col-sm-3">
                <div id="tablaLiderJuegosSalvadosLoad"></div>
            </div
        </div>
    </div>
    <a href="../ayuda/reporte.php" class="btn btn-danger btn-md">
							Imprimir <span class="glyphicon glyphicon-file"></span>
						</a>

 
                        <script type="text/javascript">
    $(document).ready(function(){

        $('#tablaLiderJonronesLoad').load("lideres/tblLiderJonrones.php");
        $('#tablaLiderCarreraImpulsadaLoad').load("lideres/tblLiderCarreraImpulsada.php");
        $('#tablaLiderBasesRobadasLoad').load("lideres/tblLiderBasesrobadas.php");
        $('#tablaLiderGanadosLoad').load("lideres/tblLiderGanados.php");
        $('#tablaLiderPonchesLoad').load("lideres/tblLiderPonches.php");
        $('#tablaLiderJuegosSalvadosLoad').load("lideres/tblLiderJuegosSalvados.php");
        
});
</script>
</body>
</html>

<?php
    }else{
        //header("location:../index.php");
    }
?>