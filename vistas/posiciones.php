<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Posiciones</title>
    <?php require_once "menu.php" ?>
</head>

<body>

	<div class="container">
	<div class="row"> <img src="../img/posiciones.png" </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="tablaPosicionEquiposBtn">Equipos</span>
		 		<span class="btn btn-default" id="tablaPosicionesBateoBtn">Bateo</span>
                 <span class="btn btn-default" id="tablaPosicionesPitcheoBtn">Pitcheo</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="tablaEquipos"></div>
		 		<div id="tablaBateo"></div>
                 <div id="tablaPitcheo"></div>
		 	</div>
		 </div>
	</div>
</body>
</html>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaPosicionEquiposBtn').click(function(){
				esconderSeccionVenta();
				$('#tablaEquipos').load('posiciones/tablaPosicionesEquipos.php');
				$('#tablaEquipos').show();
			});
			$('#tablaPosicionesBateoBtn').click(function(){
				esconderSeccionVenta();
				$('#tablaBateo').load('posiciones/tablaPosicionesBateo.php');
				$('#tablaBateo').show();
			});
            $('#tablaPosicionesPitcheoBtn').click(function(){
				esconderSeccionVenta();
				$('#tablaPitcheo').load('posiciones/tablaPosicionesPitcheo.php');
				$('#tablaPitcheo').show();
			});
		});

		function esconderSeccionVenta(){
			$('#tablaEquipos').hide();
			$('#tablaBateo').hide();
            $('#tablaPitcheo').hide();
		}

	</script>


<?php
    }else{
        header("location:../index.php");
    }
?>