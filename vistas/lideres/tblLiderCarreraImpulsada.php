<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
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
   <caption><label style="color:#C70039;">Lideres Carreras Impulsadas</label></caption>
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
