<?php
    session_start();

    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Posiciones</title>
    <?php require_once "menu.php" ?>
</head>

<body>
    
    <br><br>
    <div class="container">
        <div class="row">
        
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <div id="tablaPruebasLoad"></div>

            </div>
            
        </div>
    </div>
    

 

</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        $('#tablaPruebasLoad').load("prueba/tblPrueba.php");
        
        
});
</script>



<?php
    }else{
        header("location:../index.php");
    }
?>

