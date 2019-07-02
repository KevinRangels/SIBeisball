<?php
    class partidos{
        public function agregaPartido($datos){
            $c=new conectar();
            $conexion=$c->conexion();
            $fecha=date('Y-m-d');

            $sql="INSERT into juegos (nro_juego,
                                      id_equipo,
                                      fecha,
                                      localia,
                                      JJ,
                                      JG,
                                      JE,
                                      JP,
                                      CF,
                                      H,
                                      E,
                                      CC)
                            values('$datos[0]',
                                   '$datos[1]',
                                   '$datos[2]',
                                   '$datos[3]',
                                   '$datos[4]',
                                   '$datos[5]',
                                   '$datos[6]',
                                   '$datos[7]',
                                   '$datos[8]',
                                   '$datos[9]',
                                   '$datos[10]',
                                   '$datos[11]')";

            return mysqli_query($conexion,$sql);
        }

        public function actualizaPartido($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE juegos set nro_juego='$datos[1]',
                                    id_equipo='$datos[2]',
                                    fecha='$datos[3]',
                                    localia='$datos[4]',
                                    JJ='$datos[5]',
                                    JG='$datos[6]',
                                    JE='$datos[7]',
                                    JP='$datos[8]',
                                    CF='$datos[9]',
                                    H='$datos[10]',
                                    E='$datos[11]',
                                    CC='$datos[12]'
                                    where id_juego='$datos[0]'";
            echo mysqli_query($conexion,$sql);
        }
        public function eliminaPartido($idpartido){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="DELETE from juegos
                    where id_juego='$idpartido'";
            return mysqli_query($conexion,$sql);

        }
        
       
        
    }
?>

