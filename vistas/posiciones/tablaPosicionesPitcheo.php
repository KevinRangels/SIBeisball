<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="SELECT  jugad.nombre,
                  equi.nombre,
                  SUM(pit.IJ),
                  SUM(pit.C),
                  SUM(pit.CL),
                  SUM(pit.Sko),
                  SUM(pit.S),
                  SUM(pit.P),
                  pit.AVG


                  
                    
            from pitcheos as pit
            
            inner join equipos as equi
            on pit.id_equipo=equi.id_equipo
            inner join jugadores as jugad
            on pit.id_jugador=jugad.id_jugador
            GROUP BY jugad.nombre
            ORDER BY pit.AVG
            
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label>Estadisticas de Pitcheo</label></caption>
    <tr>
        <td><h3>Jugador</h3></td>
        <td><h3>Equipo</h3></td>
        <td><h3>IJ</h3></td>
        <td><h3>C</h3></td>
        <td><h3>CL</h3></td>
        <td><h3>JG</h3></td>
        <td><h3>JS</h3></td>
        <td><h3>P</h3></td>
        <td><h3>EFEC</h3></td>
        
        
    </tr>
    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        


        <td><?php echo $ver[0] ?></td>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[2] ?></td>
        <td><?php echo $ver[3] ?></td>
        <td><?php echo $ver[4] ?></td>
        <td><?php echo $ver[5] ?></td>
        <td><?php echo $ver[6] ?></td>
        <td><?php echo $ver[7] ?></td>
        <td><?php echo $ver[8] ?></td>
        
        
        
        
            
        
    </tr>
<?php endwhile; ?>
</table>