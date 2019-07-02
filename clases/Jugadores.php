<?php
    class jugadores{
        public function agregaJugador($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="INSERT into jugadores (id_equipo,
                                       nombre,
                                       apellido,
                                       cedula)
                            values('$datos[0]',
                                   '$datos[1]',
                                   '$datos[2]',
                                   '$datos[3]')";

            return mysqli_query($conexion,$sql);
        }

        public function obtenDatosJugador($idjugador){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="SELECT id_jugador,
                         id_equipo,
                         nombre,
                         apellido,
                         cedula
                   from jugadores where id_jugador='$idjugador'";

                $result=mysqli_query($conexion,$sql);
                $ver=mysqli_fetch_row($result);

                $datos=array(
                    "id_jugador" => $ver[0],
					"id_equipo" => $ver[1],
					"nombre" => $ver[2],
					"apellido" => $ver[3],
					"cedula" => $ver[4]
					
						);

			return $datos;
        }
        public function actualizarJugador($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE jugadores set id_equipo='$datos[1]',
                                     nombre='$datos[2]',
                                     apellido='$datos[3]',
                                     cedula='$datos[4]'
                          where id_jugador='$datos[0]'";

            return mysqli_query($conexion,$sql);
        }
        public function eliminaJugador($idjugador){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="DELETE from jugadores
                    where id_jugador='$idjugador'";
            return mysqli_query($conexion,$sql);

        }
    }
?>