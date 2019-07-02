<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="SELECT equi.nombre,
                 equi.manager,
                 camp.nombre,
                 equi.id_equipo
                from equipos as equi
                inner join campeonatos as camp
                on equi.id_campeonato=camp.id_campeonato";
    $result=mysqli_query($conexion,$sql);
?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
    <caption><label>Equipos</label></caption>
    <tr>
        <td>Nombre</td>
        <td>Manager</td>
        <td>Campeonato</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>

    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $ver[0] ?></td>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[2] ?></td>
        <td>
            <span data-toggle="modal" data-target="#abreModalUpdateEquipo" class="btn btn-warning btn-xs" onclick="agregaDatosEquipo('<?php echo $ver[3] ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaEquipo('<?php echo $ver[3] ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
    </tr>

    <?php endwhile; ?>
</table>