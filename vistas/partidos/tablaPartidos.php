<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="SELECT part.nro_juego,
                 equi.nombre,
                 part.fecha,
                 part.localia,
                 part.JJ,
                 part.JG,
                 part.JE,
                 part.JP,
                 part.CF,
                 part.H,
                 part.E,
                 part.CC,
                 part.id_juego
                
            from juegos as part
            inner join equipos as equi
            on part.id_equipo=equi.id_equipo
            ORDER BY part.nro_juego";

        $result=mysqli_query($conexion,$sql);

        
?>




<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Partidos</label></caption>
    <tr>
        <td>Juego Nº</td>
        <td>Equipo</td>
        <td>Fecha</td>
        <td>Local</td>
        <td>JJ</td>
        <td>JG</td>
        <td>JE</td>
        <td>JP</td>
        <td>CF</td>
        <td>H</td>
        <td>E</td>
        <td>CC</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

    <?php while($ver=mysqli_fetch_row($result)): ?>

    <tr>
        <td><?php echo $ver[0]; ?></td>
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
        <td>
            <span  class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaPartido" onclick="agregaDato('<?php echo $ver[12]  ?>',
                                                                     '<?php echo $ver[0]  ?>',
                                                                     '<?php echo $ver[1];  ?>',
                                                                     '<?php echo $ver[2]  ?>',
                                                                     '<?php echo $ver[3]  ?>',
                                                                     '<?php echo $ver[4]  ?>',
                                                                     '<?php echo $ver[5]  ?>',
                                                                     '<?php echo $ver[6]  ?>',
                                                                     '<?php echo $ver[7]  ?>',
                                                                     '<?php echo $ver[8]  ?>',
                                                                     '<?php echo $ver[9]  ?>',
                                                                     '<?php echo $ver[10]  ?>',
                                                                     '<?php echo $ver[11]  ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaPartido('<?php echo $ver[12]  ?>')" >
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>

    <?php endwhile; ?>
</table>

