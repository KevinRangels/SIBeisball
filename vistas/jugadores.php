<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Jugadores</title>
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
    <div class="row"> <img src="../img/jugadores.png" </div>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmJugadores" enctype="multipart/form-data">
                
                
                <label>Equipo</label>
                <select class="form-control input-sm"  id="equipoSelect" name="equipoSelect">
                    <option value="A">Selecciona Equipo</option>
                    <?php while($ver=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                    <?php endwhile; ?>
                </select>
                
                <label>Nombre y Apellido</label>
                <input type="text" class="form-control input-sm" name="nombreJugador" id="nombreJugador">
                <label>Edad</label>
                <input type="text" class="form-control input-sm" name="apellidoJugador" id="apellidoJugador">
                <label>Cedula</label>
                <input type="text" class="form-control input-sm" name="cedulaJugador" id="cedulaJugador">
                <br>
                <span id="btnAgregaJugador" class="btn btn-success">Agregar</span>
                </form>
            </div>
            <div class="col-sm-8">
                <div id="tablaJugadorLoad"></div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="abreModalUpdateJugador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Jugador</h4>
      </div>
      <div class="modal-body">
        <form id="frmJugadoresU" enctype="multipart/form-data">
            <input type="text" id="idJugador" name="idJugador" hidden="">
           <label>Equipo</label>
           <select class="form-control input-sm"  id="equipoSelectU" name="equipoSelectU">
                <option value="A">Selecciona Equipo</option>
                    <?php $sql="SELECT id_equipo,nombre
                                from equipos";
                                $result=mysqli_query($conexion,$sql); ?>
                    <?php while($ver=mysqli_fetch_row($result)): ?>
                        <option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
                    <?php endwhile; ?>
            </select>
            <label>Nombre y Apellido</label>
            <input type="text" class="form-control input-sm" name="nombreJugadorU" id="nombreJugadorU">
            <label>Edad</label>
            <input type="text" class="form-control input-sm" name="apellidoJugadorU" id="apellidoJugadorU">
            <label>Cedula</label>
            <input type="text" class="form-control input-sm" name="cedulaJugadorU" id="cedulaJugadorU">
            
        </form>
      </div>
      <div class="modal-footer">
        <button  id="btnActualizajugador" type="button" class="btn btn-warning" data-dismiss="modal">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script type="text/javascript">
 function agregaDatosJugador(idjugador){
    $.ajax({
        type:"POST",
        data:"idjugad=" + idjugador,
        url:"../procesos/jugadores/obtenDatosJugador.php",
        success:function(r){
            
            
            dato=jQuery.parseJSON(r);
            $('#idJugador').val(dato['id_jugador']);
            $('#equipoSelectU').val(dato['id_equipo']);
            $('#nombreJugadorU').val(dato['nombre']);
            $('#apellidoJugadorU').val(dato['apellido']);
            $('#cedulaJugadorU').val(dato['cedula']);
            

        }
        
    });
}
function eliminaJugador(idJugador){
        alertify.confirm('¿Desea eliminar el jugador?', function(){
            $.ajax({
			    type:"POST",
			    data:"idjugador=" + idJugador,
			    url:"../procesos/jugadores/eliminarJugador.php",
			    success:function(r){
                    if(r==1){
                        $('#tablaJugadorLoad').load("jugadores/tablaJugadores.php");
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
        $('#btnActualizajugador').click(function(){

            datos=$('#frmJugadoresU').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"../procesos/jugadores/actualizarJugador.php",
                    success:function(r){
                        if(r==1){
                            $('#tablaJugadorLoad').load("jugadores/tablaJugadores.php");
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
        $('#tablaJugadorLoad').load("jugadores/tablaJugadores.php");

        $('#btnAgregaJugador').click(function(){

            vacios=validarFormVacio('frmJugadores');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmJugadores').serialize();
        $.ajax({
            type:"POST",
            data:datos,
            url:"../procesos/jugadores/agregaJugador.php",
            success:function(r){
                if(r==1){
                    $('#frmJugadores')[0].reset();
                    $('#tablaJugadorLoad').load("jugadores/tablaJugadores.php");
                    alertify.success("Agregado con exito");
                }else{
                    alertify.error("No se pudo Agregar");
                }
            }
        });
        });
    });
</script>
 <script>
        $(document).ready(function() {
    $('#loadDinamic').DataTable();
} );
        </script>

<?php
    }else{
        header("location:../index.php");
    }
?>