<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="SELECT id_campeonato,
                nombre,
                categoria,
                fechainicio
                FROM campeonatos";
    $result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
   <caption><label>Campeonatos</label></caption>
    <tr>
        <td>Nombre</td>
        <td>Categoria</td>
        <td>Fecha Inicio</td>
        <td>Editar</td>
        <td>Eliminar</td>
        
    </tr>
    <?php
        while($ver=mysqli_fetch_row($result)):
    ?>
    <tr>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[2] ?></td>
        <td><?php echo $ver[3] ?></td>
        <td>
            <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCampeonato" onclick="agregaDato('<?php echo $ver[0] ?>',
                                                                                                                            '<?php echo $ver[1] ?>',
                                                                                                                            '<?php echo $ver[2] ?>',
                                                                                                                            '<?php echo $ver[3] ?>')">
                <span class="glyphicon glyphicon-pencil"></span>
            </span>
        </td>
        <td>
            <span class="btn btn-danger btn-xs" onclick="eliminaCampeonato('<?php echo $ver[0] ?>',
                                                                           '<?php echo $ver[1] ?>',
                                                                           '<?php echo $ver[2] ?>',
                                                                           '<?php echo $ver[3] ?>')">
                <span class="glyphicon glyphicon-remove"></span>
            </span>
        </td>
        
    </tr>
<?php endwhile; ?>
</table>