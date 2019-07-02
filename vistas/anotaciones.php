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
       <div class="row"> <img src="../img/anotaciones.png" </div>

        <div class="row">
            <div class="col-sm-6">
                
                <form id="frmAnotaciones" enctype="multipart/form-data">
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
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-1">
                                <label>VB</label>
                                <input type="text" class="form-control input-xs"  name="vb" id="vb">  
                                <label>CA</label>
                                <input type="text" class="form-control input-xs" name="ca" id="ca">
                                <label>HC</label>
                                <input type="text" class="form-control input-xs" name="hc" id="hc">
                                <label>CI</label>
                                <input type="text" class="form-control input-xs" name="ci" id="ci">
                            </div>
                            <div class="col-xs-1">
                                <label>2B</label>
                                <input type="text" class="form-control input-xs"  name="2b" id="2b">  
                                <label>3B</label>
                                <input type="text" class="form-control input-xs" name="3b" id="3b">
                                <label>HR</label>
                                <input type="text" class="form-control input-xs" name="hr" id="hr">
                                <label>BR</label>
                                <input type="text" class="form-control input-xs" name="br" id="br">
                            </div>
                            <div class="col-xs-1">
                                <label>SF</label>
                                <input type="text" class="form-control input-xs"  name="sf" id="sf">  
                                <label>BB</label>
                                <input type="text" class="form-control input-xs" name="bb" id="bb">
                                <label>DB</label>
                                <input type="text" class="form-control input-xs" name="db" id="db"> 
                            </div>
                            <div class="col-xs-1">
                                <label>OB</label>
                                <input type="text" class="form-control input-xs"  name="ob" id="ob">  
                                <label>K</label>
                                <input type="text" class="form-control input-xs" name="k" id="k">
                                <label>POS</label>
                                <input type="text" class="form-control input-xs" name="pos" id="pos"> 
                            </div>
                            <div class="col-xs-1">
                                <label>IJ</label>
                                <input type="text" class="form-control input-xs"  name="ij" id="ij">  
                                <label>O</label>
                                <input type="text" class="form-control input-xs" name="o" id="o">
                                <label>A</label>
                                <input type="text" class="form-control input-xs" name="a" id="a">
                                <label>E</label>
                                <input type="text" class="form-control input-xs" name="e" id="e"> 
                            </div>
                
                    </div>
                    <br>
                    <span id="btnAgregarAnotaciones" class="btn btn-success">Agregar</span>
                </form>

                
            </div>
                
                
                <br>
                
            </div>

            
                </div>
                
                
            </div>
            
        </div>
        
                
    </div>
    <div class="col-sm-10">
                <div id="tablaAnotacionesLoad"></div>
                
    </div>
</div>
<!-- Button trigger modal -->


                        <!-- VENTANA MODA ANOTACIONES -->
<div class="modal fade" id="abreModalUpdateAnotacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Anotaciones</h4>
      </div>
      <div class="modal-body">
      <form id="frmAnotacionesU" enctype="multipart/form-data">
      <input type="text" id="idAnotaciones" name="idAnotaciones" hidden="">
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
                                <label>VB</label>
                                <input type="text" class="form-control input-xs"  name="vbU" id="vbU">  
                                <label>CA</label>
                                <input type="text" class="form-control input-xs" name="caU" id="caU">
                                <label>HC</label>
                                <input type="text" class="form-control input-xs" name="hcU" id="hcU">
                                <label>CI</label>
                                <input type="text" class="form-control input-xs" name="ciU" id="ciU">
                            </div>
                            <div class="col-xs-1">
                                <label>2B</label>
                                <input type="text" class="form-control input-xs"  name="2bU" id="2bU">  
                                <label>3B</label>
                                <input type="text" class="form-control input-xs" name="3bU" id="3bU">
                                <label>HR</label>
                                <input type="text" class="form-control input-xs" name="hrU" id="hrU">
                                <label>BR</label>
                                <input type="text" class="form-control input-xs" name="brU" id="brU">
                            </div>
                            <div class="col-xs-1">
                                <label>SF</label>
                                <input type="text" class="form-control input-xs"  name="sfU" id="sfU">  
                                <label>BB</label>
                                <input type="text" class="form-control input-xs" name="bbU" id="bbU">
                                <label>DB</label>
                                <input type="text" class="form-control input-xs" name="dbU" id="dbU"> 
                            </div>
                            <div class="col-xs-1">
                                <label>OB</label>
                                <input type="text" class="form-control input-xs"  name="obU" id="obU">  
                                <label>K</label>
                                <input type="text" class="form-control input-xs" name="kU" id="kU">
                                <label>POS</label>
                                <input type="text" class="form-control input-xs" name="posU" id="posU"> 
                            </div>
                            <div class="col-xs-1">
                                <label>IJ</label>
                                <input type="text" class="form-control input-xs"  name="ijU" id="ijU">  
                                <label>O</label>
                                <input type="text" class="form-control input-xs" name="oU" id="oU">
                                <label>A</label>
                                <input type="text" class="form-control input-xs" name="aU" id="aU">
                                <label>E</label>
                                <input type="text" class="form-control input-xs" name="eU" id="eU"> 
                            </div>
                
                    </div>
                    
                    
                </form>
      </div>
      <div class="modal-footer">
        <button id="btnActualizaanotacion" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>




</body>
</html>
<script type="text/javascript">
 function agregaDatosAnotacion(idanotacion){
    $.ajax({
        type:"POST",
        data:"idanot=" + idanotacion,
        url:"../procesos/anotaciones/obtenDatosAnotacion.php",
        success:function(r){
            
            dato=jQuery.parseJSON(r);
            $('#idAnotaciones').val(dato['id_anotaciones']);
            $('#juegoSelectU').val(dato['id_juego']);
            $('#equipoSelectU').val(dato['id_equipo']);
            $('#jugadorSelectU').val(dato['id_jugador']);
            $('#vbU').val(dato['VB']);
            $('#caU').val(dato['CA']);
            $('#hcU').val(dato['HC']);
            $('#ciU').val(dato['CI']);
            $('#2bU').val(dato['B2']);
            $('#3bU').val(dato['B3']);
            $('#hrU').val(dato['HR']);
            $('#brU').val(dato['BR']);
            $('#sfU').val(dato['SF']);
            $('#bbU').val(dato['BB']);
            $('#dbU').val(dato['DB']);
            $('#obU').val(dato['OB']);
            
            $('#kU').val(dato['k']);
            $('#posU').val(dato['POS']);
            $('#ijU').val(dato['IJ']);
            $('#oU').val(dato['O']);
            $('#aU').val(dato['A']);
            $('#eU').val(dato['E']);
            
            
            

        }
    });
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnActualizaanotacion').click(function(){

            datos=$('#frmAnotacionesU').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/anotaciones/actualizarAnotaciones.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaAnotacionesLoad').load("anotaciones/tablaAnotaciones.php");
                            alertify.success("Actualizado con exito");
                        }else{
                            alertify.error("Error al actualizar")
                        }

                    }
                });
    });
});
</script>





<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaAnotacionesLoad').load("anotaciones/tablaAnotaciones.php");

        $('#btnAgregarAnotaciones').click(function(){

            vacios=validarFormVacio('frmAnotaciones');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmAnotaciones').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/anotaciones/agregaAnotacion.php",
            success:function(r){
                if(r==1){
                    $('#frmAnotaciones')[0].reset();
                    $('#tablaAnotacionesLoad').load("anotaciones/tablaAnotaciones.php");
                    alertify.success("Agregado con exito");
                }else{
                    
                    alertify.error("No se pudo Agregar");
                }
            }
        });
        });
    });
    function eliminaAnotacion(idAnotacion){
        alertify.confirm('¿Desea eliminar Anotacion?', function(){
            $.ajax({
			    type:"POST",
			    data:"idanotacion=" + idAnotacion,
			    url:"../procesos/anotaciones/eliminarAnotacion.php",
			    success:function(r){
                    if(r==1){
                        $('#tablaAnotacionesLoad').load("anotaciones/tablaAnotaciones.php");
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



<?php
    }else{
        header("location:../index.php");
    }
?>