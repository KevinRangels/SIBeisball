<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
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