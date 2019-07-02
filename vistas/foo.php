<!DOCTYPE html>
<html>
<head>
    <title>Posiciones</title>
    <?php 
        require_once "dependencias.php"; 
        require_once "../clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();
    ?>
    
</head>

<body>
    <div class="container">
    <div class="row">
       <h1 class="col-sm-12 col-sm-offset-4" style="color:red;" >Lideres de Bateo</h1>
        </div>
        
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <!--<div id="tablaLiderJonronesLoad"></div>-->

            </div>
            <div class="col-sm-3">
                <caption><label style="color:#C70039;">Lideres Carreras Impulsadas</label></caption>
                <?php
                    $sql="SELECT  
                        equi.nombre,
                        jugad.nombre,
                        SUM(anot.CI),
                        anot.id_anotaciones
                        from anotaciones as anot
                        inner join equipos as equi
                        on anot.id_equipo=equi.id_equipo
                        inner join jugadores as jugad
                        on anot.id_jugador=jugad.id_jugador
                        GROUP BY equi.nombre
                        ORDER BY SUM(anot.CI) DESC
                        LIMIT 5
                    ";
                
                    $result=mysqli_query($conexion,$sql);   
                ?>

                <table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
                    <tr>
                        <td><h4>Jugador</h4></td>
                        <td><h4>Equipo</h4></td>
                        <td><h4>CI</h4></td>
                    </tr>
                    <?php
                        while($ver=mysqli_fetch_row($result)):
                    ?>
                    <tr>
                        <td><?php echo $ver[0] ?></td>
                        <td><?php echo $ver[1] ?></td>
                        <td><?php echo $ver[2] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <div class="col-sm-3">
                <!--<div id="tablaLiderBasesRobadasLoad"></div>-->
            </div>
        </div>
    </div>
    <br><br>
    <!--<div class="container">
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
    </div>-->

 
<script type="text/javascript">
    $(document).ready(function(){
        //$('#tablaLiderJonronesLoad').load("lideres/tblLiderJonrones.php");
        //$('#tablaLiderCarreraImpulsadaLoad').load("lideres/tblLiderCarreraImpulsada.php");
        //$('#tablaLiderBasesRobadasLoad').load("lideres/tblLiderBasesrobadas.php");
        ////$('#tablaLiderGanadosLoad').load("lideres/tblLiderGanados.php");
        //$('#tablaLiderPonchesLoad').load("lideres/tblLiderPonches.php");
        //$('#tablaLiderJuegosSalvadosLoad').load("lideres/tblLiderJuegosSalvados.php");
        
});
</script>
</body>
</html>
