<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Partidos</title>
    <?php require_once "menu.php" ?>
    <?php require_once "../clases/Conexion.php";
        $c= new conectar();
        $conexion=$c->conexion();
        $sql="SELECT id_equipo,nombre
                from equipos";
        $result=mysqli_query($conexion,$sql);
    ?>
</head>
<body>
<div class="container">
        <div class="row"  > <img src="../img/partidos.png" </div>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmPartidos" enctype="multipart/form-data">
                <label>Juego Nro</label>
                    <input type="text" class="form-control input-sm" name="nroJuego" id="nroJuego">
                <label>Equipo</label>
                    <select class="form-control input-sm" id="equipoSelect" name="equipoSelect">
                        <option value="A">Selecciona Equipo</option>
                        <?php 
                             $sql="SELECT id_equipo,nombre
                             from equipos";
                            $result=mysqli_query($conexion,$sql);
                        ?>
                        <?php while($ver=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                <label>Fecha</label>
                    <input type="date" class="form-control input-sm" name="fechaPartido" id="fechaPartido">
                <label>Localia</label>
                    <input type="text" class="form-control input-sm" name="Localia" id="Localia">
                    <div class="col-sm-6">
                        <div class="container">
                            <div class="row">
                            <div class="col-xs-1">
                                <label>JJ</label>
                                    <input type="text" class="form-control input-sm" name="jj" id="jj">
                                <label>JG</label>
                                    <input type="text" class="form-control input-sm" name="jg" id="jg">
                                <label>JE</label>
                                    <input type="text" class="form-control input-sm" name="je" id="je">
                            </div>
                            <div class="col-xs-1">
                                <label>JP</label>
                                    <input type="text" class="form-control input-sm" name="jp" id="jp">
                                <label>CF</label>
                                    <input type="text" class="form-control input-sm" name="cf" id="cf">
                                <label>H</label>
                                    <input type="text" class="form-control input-sm" name="h" id="h">
                            </div>
                            <div class="col-xs-1">
                                <label>E</label>
                                    <input type="text" class="form-control input-xs" name="e" id="e">
                                <label>CC</label>
                                    <input type="text" class="form-control input-xs" name="cc" id="cc">
                            </div>
                            </div>
                        </div>
                        <br>
                        <span id="btnAgregaPartido" class="btn btn-success">Agregar</span>
                    </div>
                
                
                
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaPartidosLoad"></div>
                
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="actualizaPartido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Partidos</h4>
      </div>
      <div class="modal-body">
      <form id="frmPartidosU" enctype="multipart/form-data">
      <input type="text" id="idpartido" name="idpartido" hidden="">
      <label>Juego Nro</label>
                    <input type="text" class="form-control input-sm" name="nroJuegoU" id="nroJuegoU">
                <label>Equipo</label>
                    <select class="form-control input-sm" id="equipoSelectU" name="equipoSelectU">
                        <option value="A">Selecciona Equipo</option>
                        <?php
                            $sql="SELECT id_equipo,nombre
                            from equipos";
                            $result=mysqli_query($conexion,$sql);
                        ?>
                        <?php while($ver=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                        <?php endwhile; ?>
                    </select>
                <label>Fecha</label>
                    <input type="date" class="form-control input-sm" name="fechaPartidoU" id="fechaPartidoU">
                <label>Localia</label>
                    <input type="text" class="form-control input-sm" name="LocaliaU" id="LocaliaU">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-1">
                            <label>JJ</label>
                                <input type="text" class="form-control input-sm" name="jjU" id="jjU">
                            <label>JG</label>
                                <input type="text" class="form-control input-sm" name="jgU" id="jgU">
                            <label>JE</label>
                                <input type="text" class="form-control input-sm" name="jeU" id="jeU"> 
                            </div>
                            <div class="col-xs-1">
                            <label>JP</label>
                                    <input type="text" class="form-control input-sm" name="jpU" id="jpU">
                                <label>CF</label>
                                    <input type="text" class="form-control input-sm" name="cfU" id="cfU">
                                <label>H</label>
                                    <input type="text" class="form-control input-sm" name="hU" id="hU">
                            </div>
                            <div class="col-xs-1">
                            <label>E</label>
                                    <input type="text" class="form-control input-xs" name="eU" id="eU">
                                <label>CC</label>
                                    <input type="text" class="form-control input-xs" name="ccU" id="ccU">
                            </div>
                            
                
                    </div>
                    
                    
                </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" id="btnactualizarPartido"class="btn btn-warning" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>





<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaPartidosLoad').load("partidos/tablaPartidos.php");
        $('#tablaPruebaLoad').load("prueba.php");

        $('#btnAgregaPartido').click(function(){

            vacios=validarFormVacio('frmPartidos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmPartidos').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/partidos/agregaPartidos.php",
            success:function(r){
                if(r==1){
                    $('#frmPartidos')[0].reset();
                    $('#tablaPartidosLoad').load("partidos/tablaPartidos.php");


                    alertify.success("Agregado con exito");
                }else{
                    alert(r);
                    alertify.error("No se pudo Agregar");
                }
            }
        });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnactualizarPartido').click(function(){

            datos=$('#frmPartidosU').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"../procesos/partidos/actualizaPartido.php",
                success:function(r){
                    if(r==1){
                    $('#frmPartidos')[0].reset();
                    $('#tablaPartidosLoad').load("partidos/tablaPartidos.php");


                    alertify.success("Actualizado con exito");
                }else{
                    alert(r);
                    alertify.error("No se pudo Actualizar");
                }
                }
             });
        });
    });
</script>
<script type="text/javascript">
    function agregaDato(idPartido,nroJuego,equipoSelect,fechaPartido,Localia,jj,jg,je,jp,cf,h,e,cc){
        $('#idpartido').val(idPartido);
        $('#nroJuegoU').val(nroJuego);
        $('#equipoSelectU').val(equipoSelect);
        $('#fechaPartidoU').val(fechaPartido);
        $('#LocaliaU').val(Localia);
        $('#jjU').val(jj);
        $('#jgU').val(jg);
        $('#jeU').val(je);
        $('#jpU').val(jp);
        $('#cfU').val(cf);
        $('#hU').val(h);
        $('#eU').val(e);
        $('#ccU').val(cc);
    }

    function eliminaPartido(idPartido){
        alertify.confirm('¿Desea eliminar Partido?', function(){
            $.ajax({
			    type:"POST",
			    data:"idpartido=" + idPartido,
			    url:"../procesos/partidos/eliminarPartido.php",
			    success:function(r){
                    if(r==1){
                        $('#tablaPartidosLoad').load("partidos/tablaPartidos.php");
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