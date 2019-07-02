<!DOCTYPE html>
<html>
<head>
  <title>Sistema de Anotaciones</title>
  <?php require_once "dependencias.php" ?>
</head>
<body>

    <!-- Navbar Principal -->
<div id="nav">
  <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"></button>
        </div>
              <div id="navbar" class="collapse navbar-collapse">

                <!--Funciones de Los BOTONOS-->

                <ul class="nav navbar-nav" "activate">
                  <li><a href="inicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                  <li><a href="campeonatos.php"><span class="glyphicon glyphicon-star"></span> Campeonatos</a></li>
                  <li><a href="equipos.php"><span class="glyphicon glyphicon-th"></span> Equipos</a></li>
                  <li><a href="jugadores.php"><span class="glyphicon glyphicon-user"></span> Jugadores</a></li>
                  <li><a href="partidos.php"><span class="glyphicon glyphicon-star-empty"></span> Partidos</a></li> 
                
                  <!--Dropdown menus-->

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Agregar Anotaciones <span class="caret"></span></a>
                   <!--Dropdown Anotaciones--> 
                <ul class="dropdown-menu">
                    <li><a href="anotaciones.php"><span class="glyphicon glyphicon-th-list"></span>Anotaciones</a></li>
                    <li><a href="pitcheos.php"><span class="glyphicon glyphicon-th-list"></span>Pitcheo</a></li>
                </ul>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Estadisticas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="posiciones.php">Tablas de Posiciones</a></li>
                      <li><a href="lideres.php">Lideres</a></li>
                    </ul>
                  <!--Dropdown Sistema--> 
                  <li class="dropdown" >
                  <a href="#" style="color: green"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario: <?php echo $_SESSION['usuario']; ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a style="color: red" href="../procesos/salir.php"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                </ul>
              </div>
        <!--/.nav-collapse -->
            <hr color="" size=3>
      </div>
      <!--/.contatiner -->
  </div>
</div>

</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(150);

    }else {
      $('.logo').height(100);
    }
  });
</script>

