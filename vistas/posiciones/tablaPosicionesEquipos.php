<?php
    require_once "../../clases/Conexion.php";
    $c= new conectar();
    $conexion=$c->conexion();

    $sql="SELECT equi.nombre,
                 SUM(jue.JJ),
                 SUM(jue.JG),
                 SUM(jue.JP),
                 SUM(jue.JE)
                 
                
                FROM juegos as jue
                
                inner join equipos as equi
                on jue.id_equipo=equi.id_equipo
                GROUP BY equi.nombre
                 ORDER BY SUM(jue.JG) DESC  
                            
                ";
    $result=mysqli_query($conexion,$sql);


?>

<table class="table table-hover table-condensed table-bordered table-striped" style="text-align: center;">
   <caption><label>Equipos</label></caption>
    <tr>
        <td><h3>Equipo</h3></td>
        <td><h3>JJ</h3></td>
        <td><h3>JG</h3></td>
        <td><h3>JP</h3></td>
        <td><h3>JE<h3></td>
        
        
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
        
        
        
            
        
    </tr>
<?php endwhile; ?>
</table>