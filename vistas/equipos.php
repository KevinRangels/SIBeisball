<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Equipos</title>
    <?php require_once "menu.php"; ?>
    <?php require_once "../clases/Conexion.php";
            $c= new conectar();
            $conexion=$c->conexion();
            $sql="SELECT id_campeonato,nombre
                  from campeonatos";
            $result=mysqli_query($conexion,$sql);
    ?>
</head>
<body>
    <div class="container">
    <div class="row"> <img src="../img/equipos.png" </div>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmEquipos" enctype="multipart/form-data">
                <label>Campeonato</label>
                <select class="form-control input-sm"  id="campeonatoSelect" name="campeonatoSelect">
                    <option value="A">Selecciona Campeonato</option>
                    <?php while($ver=mysqli_fetch_row($result)): ?>
                    <option value="<?php echo $ver[0] ?>">
                        <?php echo $ver[1]; ?>
                    </option>
                    <?php endwhile; ?>
                </select>
                <label>Nombre</label>
                <input type="text" class="form-control input-sm" name="nombreEquipo" id="nombreEquipo">
                <label>Manager</label>
                <input type="text" class="form-control input-sm" name="nombreManager" id="nombreManager">
                <br>
                <span id="btnAgregaEquipo" class="btn btn-success">Agregar</span>
                </form>
            </div>
            <div class="col-sm-6">
                <div id="tablaEquiposLoad"></div>
            </div>
        </div>  
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="abreModalUpdateEquipo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Equipo</h4>
      </div>
      <div class="modal-body">
        <form id="frmEquiposU" enctype="multipart/form-data">
            <input type="text" id="idEquipo" name="idEquipo" hidden="">
            <label>Campeonato</label>
            <select class="form-control input-sm"  id="campeonatoSelectU" name="campeonatoSelectU">
                <option value="A">Selecciona Campeonato</option>
                    <?php
                        $sql="SELECT id_campeonato,nombre
                        from campeonatos";
                        $result=mysqli_query($conexion,$sql);
                    ?>
                    <?php while($ver=mysqli_fetch_row($result)): ?>
                <option value="<?php echo $ver[0] ?>">
                    <?php echo $ver[1]; ?>
                </option>
                    <?php endwhile; ?>
            </select>
            <label>Nombre</label>
            <input type="text" class="form-control input-sm" name="nombreEquipoU" id="nombreEquipoU">
            <label>Manager</label>
            <input type="text" class="form-control input-sm" name="nombreManagerU" id="nombreManagerU">
            <br>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btnActualizaequipo" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
 function agregaDatosEquipo(idequipo){
    $.ajax({
        type:"POST",
        data:"idequi=" + idequipo,
        url:"../procesos/equipos/obtenDatosEquipo.php",
        success:function(r){
            
            dato=jQuery.parseJSON(r);
            $('#idEquipo').val(dato['id_equipo']);
            $('#campeonatoSelectU').val(dato['id_campeonato']);
            $('#nombreEquipoU').val(dato['nombre']);
            $('#nombreManagerU').val(dato['manager']);
            

        }
    });
}

function eliminaEquipo(idEquipo){
        alertify.confirm('¿Desea eliminar el equipos?', function(){
            $.ajax({
			    type:"POST",
			    data:"idequipo=" + idEquipo,
			    url:"../procesos/equipos/eliminarEquipo.php",
			    success:function(r){
                    if(r==1){
                        // $('#tablaEquiposLoad').load("equipos/tablaEquipos.php");
                        alert("Eliminado con exito");
                    }else{
                        alert(r);
                        alert("Error al eliminar");
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
        $('#btnActualizaequipo').click(function(){

            datos=$('#frmEquiposU').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/equipos/actualizarEquipos.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaEquiposLoad').load("equipos/tablaEquipos.php");
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
        $('#tablaEquiposLoad').load("equipos/tablaEquipos.php");

        $('#btnAgregaEquipo').click(function(){

            vacios=validarFormVacio('frmEquipos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmEquipos').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/equipos/agregaEquipos.php",
            success:function(r){
                
                if(r==1){
                    $('#frmEquipos')[0].reset();
                    $('#tablaEquiposLoad').load("equipos/tablaEquipos.php");
                    alertify.success("Agregado con exito");
                }else{
                    alertify.error("No se pudo Agregar");
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