<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="SELECT  jueg.nro_juego,
                  equi.nombre,
                  jugad.nombre,
                    SUM(anot.VB),
                    SUM(anot.CA),
                    SUM(anot.HC),
                    SUM(anot.CI),
                    SUM(anot.B2),
                    SUM(anot.B3),
                    SUM(anot.HR),
                    SUM(anot.BR),
                    SUM(anot.SF),
                    SUM(anot.BB),
                    SUM(anot.DB),
                    SUM(anot.OB),
                    SUM(anot.k),
                    SUM(anot.POS),
                    SUM(anot.IJ),
                    SUM(anot.O),
                    SUM(anot.A),
                    SUM(anot.E),
                    anot.AVG,
                    anot.id_anotaciones
            from anotaciones as anot
            inner join juegos as jueg
            on anot.id_juego=jueg.id_juego
            inner join equipos as equi
            on anot.id_equipo=equi.id_equipo
            inner join jugadores as jugad
            on anot.id_jugador=jugad.id_jugador
            GROUP BY jugad.nombre
            ORDER BY anot.AVG DESC";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label>Estadisticas de Bateo</label></caption>
    <tr>
        <td><h3>Jugador</h3></td>
        <td><h3>Equipo</h3></td>
        <td><h3>VB</h3></td>
        <td><h3>CA</h3></td>
        <td><h3>HC</h3></td>
        <td><h3>2B</h3></td>
        <td><h3>3B</h3></td>
        <td><h3>HR</h3></td>
        <td><h3>CI</h3></td>
        <td><h3>BR</h3></td>
        <td><h3>DB</h3></td>
        <td><h3>BB</h3></td>
        <td><h3>K</h3></td>
        <td><h3>AVG</h3></td>
        
        
    </tr>
    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $ver[2] ?></td>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[3] ?></td>
        <td><?php echo $ver[4] ?></td>
        <td><?php echo $ver[5] ?></td>
        <td><?php echo $ver[6] ?></td>
        <td><?php echo $ver[7] ?></td>
        <td><?php echo $ver[8] ?></td>
        <td><?php echo $ver[9] ?></td>
        <td><?php echo $ver[10] ?></td>
        <td><?php echo $ver[13] ?></td>
        <td><?php echo $ver[12] ?></td>
        <td><?php echo $ver[15] ?></td>
        <td><?php echo $ver[21] ?></td>
        

        
        
        
            
        
    </tr>
<?php endwhile; ?>
</table>