<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();
    $sql="SELECT jug.nombre,
                 jug.apellido,
                 jug.cedula,
                 equi.nombre,
                 jug.id_jugador 
            from jugadores as jug
            inner join equipos as equi
            on jug.id_equipo=equi.id_equipo
            ORDER BY equi.nombre";

        $result=mysqli_query($conexion,$sql);
?>

<table id="loadDinamic" class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Jugadores</label></caption>
    <thead>
    <tr>
        <td>Nombre</td>
        <td>edad</td>
        <td>Cedula</td>
        <td>Equipo</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
    </thead>
    <tbody>
    <?php while($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[0]; ?></td>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td>
            <span data-toggle="modal" data-target="#abreModalUpdateJugador" class="btn btn-warning btn-xs" onclick="agregaDatosJugador('<?php echo $ver[4] ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaJugador('<?php echo $ver[4] ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>
<?php endwhile; ?>
</tbody>

    
</table>


