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

<div class="row">
<div class="col-sm-6">
    <img src="../img/logo.png" width="200" height="200">
<div class="col-sm-4">
    <h1>Reporte Lideres</h1>
</div>
</div>

</div>


    <div class="container">
    <div class="row">
       
        </div>
                    <!--Lideres BATEO-->
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
            <?php
    
    
    
    $sql="SELECT  
                  equi.nombre,
                  jugad.nombre,
                    SUM(anot.HR),
                    anot.id_anotaciones
            from anotaciones as anot
           
            inner join equipos as equi
            on anot.id_equipo=equi.id_equipo
            inner join jugadores as jugad
            on anot.id_jugador=jugad.id_jugador
            
            
            GROUP BY jugad.nombre
            ORDER BY SUM(anot.HR) DESC
            LIMIT 5";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label style="color:#C70039;">Lideres Jonrones</label></caption>
    <tr>
        <td><h4 >Jugador</h4></td>
        <td><h4>Equipo</h4></td>
        <td><h4>HR</h4></td>
        
        
    </tr>
    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[0] ?></td>
        <td><?php echo $ver[2] ?></td>
            
        
    </tr>
<?php endwhile; ?>
</table>


            <!--LIDERES CARRERAS IMPULSADAS-->
            <div class="col-sm-3">
                <div>
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
                        <td><?php echo $ver[1] ?></td>
                        <td><?php echo $ver[0] ?></td>
                        <td><?php echo $ver[2] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
                </div>
            </div>

            <!-- LIDERES BASES ROBADAS -->
            <div class="col-sm-3">
            <?php
    
    
    $sql="SELECT  
                  equi.nombre,
                  jugad.nombre,
                    SUM(anot.BR),
                    anot.id_anotaciones
            from anotaciones as anot
           
            inner join equipos as equi
            on anot.id_equipo=equi.id_equipo
            inner join jugadores as jugad
            on anot.id_jugador=jugad.id_jugador
            GROUP BY equi.nombre
            ORDER BY SUM(anot.BR) DESC
            LIMIT 5
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>


<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label style="color:#C70039;">Lideres Bases Robadas</label></caption>
    <tr>
        <td><h4>Jugador</h4></td>
        <td><h4>Equipo</h4></td>
        <td><h4>BR</h4></td>
           
    </tr>
    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[0] ?></td>
        <td><?php echo $ver[2] ?></td>     
    </tr>
<?php endwhile; ?>
</table>

            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
        
        </div>
        <div class="row">
        <!-- LIDERES GANADOS -->
            <div class="col-sm-3 col-sm-offset-1">
            <?php
    
    
    $sql="SELECT  
                 jugad.nombre,
                  equi.nombre,
                  SUM(pit.Sko)
                  from pitcheos as pit
                  inner join equipos as equi
                  on pit.id_equipo=equi.id_equipo
                  inner join jugadores as jugad
                  on pit.id_jugador=jugad.id_jugador
                  GROUP BY jugad.nombre
                  ORDER BY SUM(pit.Sko) DESC
                  LIMIT 5
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label style="color:#C70039;">Juegos Ganados</label></caption>
    <tr>
        <td><h4>Jugador</h4></td>
        <td><h4>Equipo</h4></td>
        <td><h4>JG</h4></td>
        
        
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

            <!-- LIDERES PONCHES -->
            <div class="col-sm-3">
            <?php
    
    
    $sql="SELECT  
                  jugad.nombre,
                  equi.nombre,
                  SUM(pit.P)
                  from pitcheos as pit
                  inner join equipos as equi
                  on pit.id_equipo=equi.id_equipo
                  inner join jugadores as jugad
                  on pit.id_jugador=jugad.id_jugador
                  GROUP BY jugad.nombre
                  ORDER BY SUM(pit.P) DESC
                  LIMIT 5
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label style="color:#C70039;">Ponches</label></caption>
    <tr>
        <td><h4>Jugador</h4></td>
        <td><h4>Equipo</h4></td>
        <td><h4>P</h4></td>
        
        
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
            <!-- JUEGOS SALVADOS -->
            <div class="col-sm-3">
            <?php
    
    
    $sql="SELECT  
                  jugad.nombre,
                  equi.nombre,
                  SUM(pit.S)
                  from pitcheos as pit
                  inner join equipos as equi
                  on pit.id_equipo=equi.id_equipo
                  inner join jugadores as jugad
                  on pit.id_jugador=jugad.id_jugador
                  GROUP BY jugad.nombre
                  ORDER BY SUM(pit.S) DESC
                  LIMIT 5
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label style="color:#C70039;">Juego Salvados</label></caption>
    <tr>
        <td><h4>Jugador</h4></td>
        <td><h4>Equipo</h4></td>
        <td><h4>JS</h4></td>
        
        
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
            </div
        </div>
    </div>

 
<script type="text/javascript">
    $(document).ready(function(){
        //$('#tablaLiderJonronesLoad').load("lideres/tblLiderJonrones.php");
        //$('#tablaLiderCarreraImpulsadaLoad').load("lideres/tblLiderCarreraImpulsada.php");
        //$('#tablaLiderBasesRobadasLoad').load("lideres/tblLiderBasesrobadas.php");
        //$('#tablaLiderGanadosLoad').load("lideres/tblLiderGanados.php");
        //$('#tablaLiderPonchesLoad').load("lideres/tblLiderPonches.php");
        //$('#tablaLiderJuegosSalvadosLoad').load("lideres/tblLiderJuegosSalvados.php");
        
});
</script>

</body>
</html>
