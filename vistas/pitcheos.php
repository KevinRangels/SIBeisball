<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Anotaciones</title>
    <?php require_once "menu.php" ?>
    <?php require_once "../clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();
        $sql="SELECT id_juego,nro_juego
        from juegos";
        $result=mysqli_query($conexion,$sql);
        $result3=mysqli_query($conexion,$sql);
        $sql="SELECT id_equipo,nombre
                from equipos";
        $result1=mysqli_query($conexion,$sql);
        $result4=mysqli_query($conexion,$sql);

        $sql="SELECT id_jugador,nombre
                from jugadores";
        $result2=mysqli_query($conexion,$sql);
        $result5=mysqli_query($conexion,$sql);

    ?>
</head>
<body>
    <div class="container">
    <div class="row"> <img src="../img/picheos.png" </div>
        <div class="row">
            <div class="col-sm-6">
                
            <form id="frmPitcheos" enctype="multipart/form-data">
                    <label>Juego Nro</label>
                    <select class="form-control input-sm"  id="juegoSelect" name="juegoSelect">
                        <option value="A">Selecciona Juego</option>
                        <?php while($ver=mysqli_fetch_row($result3)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label>Equipo</label>
                    <select class="form-control input-sm"  id="equipoSelect" name="equipoSelect">
                        <option value="A">Selecciona Equipo</option>
                        <?php while($ver=mysqli_fetch_row($result4)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label>Jugador</label>
                    <select class="form-control input-sm"  id="jugadorSelect" name="jugadorSelect">
                        <option value="A">Selecciona Jugador</option>
                        <?php while($ver=mysqli_fetch_row($result5)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                
                
                    <div class="col-sm-6">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-xs-1">
                                    <label>IJ</label>
                                    <input type="text" class="form-control input-xs" name="ij" id="ij">
                                    <label>C</label>
                                    <input type="text" class="form-control input-xs" name="c" id="c">
                                    <label>CL</label>
                                    <input type="text" class="form-control input-xs" name="cl" id="cl">
                                    <label>JG</label>
                                    <input type="text" class="form-control input-xs" name="sko" id="sko"> 
                                </div>
                                <div class="col-xs-1">
                                    <label>JS</label>
                                    <input type="text" class="form-control input-xs" name="s" id="s">
                                    <label>P</label>
                                    <input type="text" class="form-control input-xs" name="p" id="p">
                                    
                        </div>
                    </div>
                    <br>
                    <span id="btnAgregarPitcheo" class="btn btn-success">Agregar</span>
                </form>

                
            </div>
                
                
                <br>
                
            </div>

            
                
                
                
            </div>
            
        </div>
        
                
    </div>
    <div class="col-sm-10">
                
                <div id="tablaPitcheosLoad"></div>
    </div>
</div>

<!--                         VENTANA MODAL PITCHEO                  -->


<div class="modal fade" id="abremodalUpdatePitcheo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Pitcheos</h4>
      </div>
      <div class="modal-body">
      <form id="frmPitcheosU" enctype="multipart/form-data">
      <input type="text" id="idPitcheos" name="idPitcheos" hidden="">
                    <label>Juego Nro</label>
                    <select class="form-control input-sm"  id="juegoSelectU" name="juegoSelectU">
                        <option value="A">Selecciona Juego</option>
                        <?php
                            $sql="SELECT id_juego,nro_juego
                            from juegos";
                            $result=mysqli_query($conexion,$sql);
                        ?>
                        <?php while($ver=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label>Equipo</label>
                    <select class="form-control input-sm"  id="equipoSelectU" name="equipoSelectU">
                        <option value="A">Selecciona Equipo</option>
                        <?php
                            $sql="SELECT id_equipo,nombre
                            from equipos";
                            $result1=mysqli_query($conexion,$sql);
                        ?>
                        <?php while($ver=mysqli_fetch_row($result1)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <label>Jugador</label>
                    <select class="form-control input-sm"  id="jugadorSelectU" name="jugadorSelectU">
                        <option value="A">Selecciona Jugador</option>
                        <?php
                            $sql="SELECT id_jugador,nombre
                            from jugadores";
                             $result2=mysqli_query($conexion,$sql);
                        ?>
                        <?php while($ver=mysqli_fetch_row($result2)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-1">
                            <label>IJ</label>
                            <input type="text" class="form-control input-xs" name="ijU" id="ijU">
                            <label>C</label>
                            <input type="text" class="form-control input-xs" name="cU" id="cU">
                            <label>CL</label>
                            <input type="text" class="form-control input-xs" name="clU" id="clU">
                            <label>JG</label>
                            <input type="text" class="form-control input-xs" name="skoU" id="skoU"> 
                            </div>
                            <div class="col-xs-1">
                            <label>JS</label>
                            <input type="text" class="form-control input-xs" name="sU" id="sU">
                            <label>P</label>
                            <input type="text" class="form-control input-xs" name="pU" id="pU">
                            </div>
                            
                
                    </div>
                    
                    
                </form>
      </div>
      <div class="modal-footer">
        <button id="btnActualizapitcheo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>

<script type="text/javascript">
 function agregaDatosPitcheo(idpitcheo){
    $.ajax({
        type:"POST",
        data:"idpit=" + idpitcheo,
        url:"../procesos/anotaciones/obtenDatosPitcheo.php",
        success:function(r){
            
            
            dato=jQuery.parseJSON(r);
            $('#idPitcheos').val(dato['id_pitcheo']);
            $('#juegoSelectU').val(dato['id_juego']);
            $('#equipoSelectU').val(dato['id_equipo']);
            $('#jugadorSelectU').val(dato['id_jugador']);
            $('#ijU').val(dato['IJ']);
            $('#cU').val(dato['C']);
            $('#clU').val(dato['CL']);
            $('#skoU').val(dato['Sko']);
            $('#sU').val(dato['S']);
            $('#pU').val(dato['P']);
 
        }
    });
}
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#btnActualizapitcheo').click(function(){

            datos=$('#frmPitcheosU').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/anotaciones/actualizarPitcheos.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaPitcheosLoad').load("anotaciones/tablaPitcheos.php");
                            alertify.success("Actualizado con exito");
                        }else{
                            alertify.error("Error al actualizar")
                        }

                    }
                });
    });
});
function eliminaPitcheo(idPitcheo){
        alertify.confirm('¿Desea eliminar Pitcheo?', function(){
            $.ajax({
			    type:"POST",
			    data:"idpitcheo=" + idPitcheo,
			    url:"../procesos/anotaciones/eliminarPitcheo.php",
			    success:function(r){
                    if(r==1){
                        $('#tablaPitcheosLoad').load("anotaciones/tablaPitcheos.php");
                        alertify.success("Eliminado con exito");
                    }else{
                        alertify.error("Error al eliminar");
                    }
			    }
		    });
         }, function(){
              alertify.error('Cancelo')
            });
    }
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaPitcheosLoad').load("anotaciones/tablaPitcheos.php");

        $('#btnAgregarPitcheo').click(function(){

            vacios=validarFormVacio('frmPitcheos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmPitcheos').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/anotaciones/agregaPitcheos.php",
            success:function(r){
                if(r==1){
                    $('#frmPitcheos')[0].reset();
                    $('#tablaPitcheosLoad').load("anotaciones/tablaPitcheos.php");
                    alertify.success("Agregado con exito");
                }else{
                    
                    alertify.error("No se pudo Agregar");
                    alert(r);
                }
            }
        });
        });
    });
</script>

<?php
    }else{
        header("location:../index.php");
    }
?>