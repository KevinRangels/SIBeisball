<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="SELECT  anota.id_juego,
                  equi.nombre,
                  juga.nombre,
                    anota.VB,
                    anota.CA,
                    anota.HC,
                    anota.CI,
                    anota.B2,
                    anota.B3,
                    anota.HR,
                    anota.BR,
                    anota.SF,
                    anota.BB,
                    anota.DB,
                    anota.OB,
                    anota.k,
                    anota.POS,
                    anota.IJ,
                    anota.O,
                    anota.A,
                    anota.E,
                    anota.AVG,
                    anota.id_anotaciones
            from anotaciones as anota
            inner join jugadores as juga
            on anota.id_jugador=juga.id_jugador
            inner join equipos equi
            on anota.id_equipo=equi.id_equipo
            ";
            
            

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label><h2>Anotaciones</h2></label></caption>
    <tr>
        <td>Equipo</td>
        <td>Jugador</td>
        <td>VB</td>
        <td>CA</td>
        <td>HC</td>
        <td>CI</td>
        <td>2B</td>
        <td>3B</td>
        <td>HR</td>
        <td>BR</td>
        <td>SF</td>
        <td>BB</td>
        <td>DB</td>
        <td>OB</td>
        <td>K</td>
        <td>POS</td>
        <td>IJ</td>
        <td>O</td>
        <td>A</td>
        <td>E</td>
        <td>TL</td>
        <td>AVG</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

    <?php while($ver=mysqli_fetch_row($result)):
        $tl=$ver[18]+$ver[19]+$ver[20]; ?>

    
    <tr>
        
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td><?php echo $ver[8]; ?></td>
        <td><?php echo $ver[9]; ?></td>
        <td><?php echo $ver[10]; ?></td>
        <td><?php echo $ver[11]; ?></td>
        <td><?php echo $ver[12]; ?></td>
        <td><?php echo $ver[13]; ?></td>
        <td><?php echo $ver[14]; ?></td>
        <td><?php echo $ver[15]; ?></td>
        <td><?php echo $ver[16]; ?></td>
        <td><?php echo $ver[17]; ?></td>
        
        
        <td><?php echo $ver[18]; ?></td>
        <td><?php echo $ver[19]; ?></td>
        <td><?php echo $ver[20]; ?></td>
        <td><?php echo $tl; ?></td>
        <td><?php echo $ver[21]; ?></td>
        
        
        

        <td>
            <span data-toggle="modal" data-target="#abreModalUpdateAnotacion" class="btn btn-warning btn-xs" onclick="agregaDatosAnotacion('<?php echo $ver[22] ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaAnotacion('<?php echo $ver[22]  ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>

    <?php endwhile; ?>
</table>