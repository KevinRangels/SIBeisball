<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    
    $sql="SELECT  jueg.nro_juego,
            equi.nombre,
            jug.nombre,
            pit.IJ,
            pit.C,
            pit.CL,
            pit.Sko,
            pit.S,
            pit.P,
            pit.AVG,
            pit.id_pitcheo
            from pitcheos as pit
            inner join jugadores as jug
            on pit.id_jugador=jug.id_jugador
            inner join equipos as equi
            on pit.id_equipo=equi.id_equipo
            inner join juegos as jueg
            on pit.id_juego=jueg.id_juego
            ORDER BY jueg.nro_juego";
                     

        $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label><h2>Pitcheos</h2></label></caption>
    <tr>
        <td>JuegoNro</td>
        <td>Equipo</td>
        <td>Jugador</td>
        <td>IJ</td>
        <td>C</td>
        <td>CL</td>
        <td>JG</td>
        <td>JS</td>
        <td>P</td>
        <td>AVG</td>
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
        <td>
            <span data-toggle="modal" data-target="#abremodalUpdatePitcheo"  class="btn btn-warning btn-xs" onclick="agregaDatosPitcheo('<?php echo $ver[10]?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaPitcheo('<?php echo $ver[10]  ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>

    <?php endwhile; ?>
</table>