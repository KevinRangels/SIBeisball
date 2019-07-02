<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Campeonatos</title>
    <?php require_once "menu.php" ?>
</head>
<body>
    
    <div class="container">
    <div class="row"> <img  src="../img/campeonatos.png" </div>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmCampeonatos">
                <br><br>
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="nombreC" id="nombreC">
                    <label>Categoria</label>
                    <input type="text" class="form-control input-sm" name="categoriaC" id="categoriaC">
                    <label>Fecha Inicio</label>
                    <input type="date" class="form-control input-sm" name="fechaC" id="fechaC">
                    <p></p>
                    <span class="btn btn-success" id="btnAgregarCampeonato">Agregar</span>
                </form>
            </div>
            <div class="col-sm-6">
                <div id="tablaCampeonatoLoad"></div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="actualizaCampeonato" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualiza Campeonatos</h4>
      </div>
      <div class="modal-body">
        <form id="frmCampeonatoU">
            <input type="text" hidden="" id="idcampeonato" name="idcampeonato">
            <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="nombreCU" id="nombreCU">
                    <label>Categoria</label>
                    <input type="text" class="form-control input-sm" name="categoriaCU" id="categoriaCU">
                    <label>Fecha Inicio</label>
                    <input type="date" class="form-control input-sm" name="fechaCU" id="fechaCU"> 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnActualizaCampeonato" class="btn btn-warning" data-dismiss="modal">Guardar</button>
        
      </div>
    </div>
  </div>
</div>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        $('#tablaCampeonatoLoad').load("campeonatos/tablaCampeonatos.php");
        $('#btnAgregarCampeonato').click(function(){

            vacios=validarFormVacio('frmCampeonatos');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

        datos=$('#frmCampeonatos').serialize();
        $.ajax({
        type:"POST",
        data:datos,
        url:"../procesos/campeonatos/agregaCampeonato.php",
        success:function(r){
            if(r==1){
                $('#frmCampeonatos')[0].reset();
                $('#tablaCampeonatoLoad').load("campeonatos/tablaCampeonatos.php");
                alertify.succes("Campeonato agregado con exito");
            }else{
                alertify.error("No se pudo agregar el Campeonato");
            }
        }
    });
});
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#btnActualizaCampeonato').click(function(){
            

            datos=$('#frmCampeonatoU').serialize();
            $.ajax({
                 type:"POST",
                 data:datos,
                 url:"../procesos/campeonatos/actualizaCampeonato.php",
                 success:function(r){
                    if(r==1){
                        $('#tablaCampeonatoLoad').load("campeonatos/tablaCampeonatos.php");
                        alertify.success("Actualizado con exito");
                    }else{
                        alertify.error("No se pudo actualizar");
                    }
                }
            });
        });
    });
</script>

<script  type="text/javascript">
    function agregaDato(idCampeonato,nombreC,categoriaC,fechaC){
        $('#idcampeonato').val(idCampeonato);
        $('#nombreCU').val(nombreC);
        $('#categoriaCU').val(categoriaC);
        $('#fechaCU').val(fechaC);
    }

    function eliminaCampeonato(idcampeonato){
        alertify.confirm('¿Desea eliminar el campeonato?', function(){
            $.ajax({
			    type:"POST",
			    data:"idcampeonato=" + idcampeonato,
			    url:"../procesos/campeonatos/eliminarCampeonato.php",
			    success:function(r){
                    if(r==1){
                        $('#tablaCampeonatoLoad').load("campeonatos/tablaCampeonatos.php");
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