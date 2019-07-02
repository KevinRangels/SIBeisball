<!DOCTYPE html>
<html>
<head>
    <title>Posiciones</title>
    <?php require_once "../dependencias.php" ?>
</head>

<body>
    <br><br>
    <div class="container">
    <div class="row">
        <h1 class="col-sm-12 col-sm-offset-4" style="color:red;" >Lideres de Bateo</h1>
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
        <h1 class="col-sm-12 col-sm-offset-4" style="color:red;" >Lideres de Pitcheo</h1>
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

 
<script type="text/javascript">
    $(document).ready(function(){

        //$('#tablaLiderJonronesLoad').load("lideres/tblLiderJonrones.php");
        $('#tablaLiderCarreraImpulsadaLoad').load("tblLiderCarreraImpulsada.php");
        $('#tablaLiderBasesRobadasLoad').load("tblLiderBasesrobadas.php");
        $('#tablaLiderGanadosLoad').load("tblLiderGanados.php");
        $('#tablaLiderPonchesLoad').load("tblLiderPonches.php");
        $('#tablaLiderJuegosSalvadosLoad').load("tblLiderJuegosSalvados.php");
        
});
</script>
</body>
</html>
