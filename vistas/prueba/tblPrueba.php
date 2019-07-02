<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    


        $sql="SELECT  
                    jueg.nro_juego,
                    equi.nombre,
        
                     SUM(anot.CA),
                     SUM(anot.HC),
                     SUM(anot.E),
                     SUM(anot.VB)
                     from anotaciones as anot
                     inner join juegos as jueg
                     on anot.id_juego=jueg.id_juego
                     inner join equipos as equi
                     on anot.id_equipo=equi.id_equipo
                     GROUP BY equi.nombre,jueg.nro_juego
                     ORDER BY jueg.nro_juego ";
                     
        
        $result2=mysqli_query($conexion,$sql);

        $sql="SELECT  
                    jueg.nro_juego,
                    equi.nombre,
        
                     SUM(pit.CA),
                     pit.HC
                     from pitcheos as pit
                     inner join juegos as jueg
                     on pit.id_juego=jueg.id_juego
                     inner join equipos as equi
                     on pit.id_equipo=equi.id_equipo
                     GROUP BY equi.nombre and jueg.nro_juego";
                     
        
        $result3=mysqli_query($conexion,$sql);

   
?>




<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Partidos</label></caption>
    <tr>
        <td>Juego Nº</td>
        <td>Equipo</td>
        <!--<td>Fecha</td>
        <td>Local</td>-->
        <td>JJ</td>
        <td>JG</td>
        <td>JE</td>
        <td>JP</td>
        <td>CF</td>
        <td>H</td>
        <td>E</td>
        <td>CC</td>
        
    </tr>
    
    
    <?php while($ver2=mysqli_fetch_row($result2)):
    $CarrerasAnotadas=$ver2[2];
    $hitsConectados=$ver2[3];
    $Errores=$ver2[4];
    $VecesAlBate=$ver2[5];

    if ($VecesAlBate > 1){
        $JuegoJugado=1;
    }
    

          ?>
          
    
    <tr>
        <td><?php echo $ver2[0]; ?></td>
        <td><?php echo $ver2[1]; ?></td>
        <td><?php echo $JuegoJugado; ?></td>
        <td><?php echo $ver2[3]; ?></td>
        <td><?php echo $ver2[3]; ?></td>
        <td><?php echo $ver2[3]; ?></td>
        <td><?php echo $ver2[3]; ?></td>
        <td><?php echo $hitsConectados; ?></td>
        <td><?php echo $Errores; ?></td>
        <td><?php echo $CarrerasAnotadas; ?></td>
     
        
    </tr>
    <?php endwhile; ?>
    
    
</table>