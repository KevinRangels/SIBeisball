<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="../img/mifavicon.png" />
<head>
    
    <title>Inicio</title>
    <?php require_once "menu.php" ?>
</head>
<body>
<div class="container" >
		<div class="texto-bv">
			<p >
		    	<h1 class="text-center">Bienvenido  al sistema de recolección de anotaciones, 
		    	de la Asociación Idependiente de Unipen de Mérida (A.I.U.M) </h1>
		    	<img src="../img/logo.png"  height="190" class="centrado" style="margin-left:40%;" >
	    	</p>
    	</div>
    </div>
</body>
</html>
<?php
    }else{
        header("location:../index.php");
    }
?>