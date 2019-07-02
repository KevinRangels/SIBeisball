<?php
    class equipos{
        public function agregaEquipo($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="INSERT into equipos (id_campeonato,
                                       nombre,
                                       manager)
                            values('$datos[0]',
                                   '$datos[1]',
                                   '$datos[2]')";

            return mysqli_query($conexion,$sql);
        }

        public function obtenDatosEquipo($idequipo){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="SELECT id_equipo,
                         id_campeonato,
                         nombre,
                         manager
                   from equipos where id_equipo='$idequipo'";

                $result=mysqli_query($conexion,$sql);
                $ver=mysqli_fetch_row($result);

                $datos=array(
					"id_equipo" => $ver[0],
					"id_campeonato" => $ver[1],
					"nombre" => $ver[2],
					"manager" => $ver[3]
					
						);

			return $datos;
        }

        public function actualizarEquipo($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE equipos set id_campeonato='$datos[1]',
                                     nombre='$datos[2]',
                                     manager='$datos[3]'
                          where id_equipo='$datos[0]'";

            return mysqli_query($conexion,$sql);
        }
        public function eliminaEquipo($idequipo){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="DELETE from equipos where id_equipo='$idequipo'";
            return mysqli_query($conexion,$sql);
        }
    }
?>