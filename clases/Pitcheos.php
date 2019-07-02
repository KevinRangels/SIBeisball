<?php
    class pitcheos{
        public function agregaPitcheos($datos){
            $c=new conectar();
            $conexion=$c->conexion();
            

            $sql="INSERT into pitcheos (id_equipo,
                                            id_juego,
                                            id_jugador,
                                            IJ,
                                            C,
                                            CL,
                                            Sko,
                                            S,
                                            P,
                                            AVG
                                            )
                            values('$datos[0]',
                                   '$datos[1]',
                                   '$datos[2]',
                                   '$datos[3]',
                                   '$datos[4]',
                                   '$datos[5]',
                                   '$datos[6]',
                                   '$datos[7]',
                                   '$datos[8]',
                                   '$datos[9]')";

            return mysqli_query($conexion,$sql);
        }
        public function obtenDatosPitcheo($idpitcheo){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="SELECT id_pitcheo,
                        id_juego,
                        id_equipo,
                        id_jugador,
                        IJ,
                        C,
                        CL,
                        Sko,
                        S,
                        P,
                        AVG
                   from pitcheos where id_pitcheo='$idpitcheo'";

                $result=mysqli_query($conexion,$sql);
                $ver=mysqli_fetch_row($result);

                $datos=array(
					"id_pitcheo" => $ver[0],
					"id_juego" => $ver[1],
					"id_equipo" => $ver[2],
                    "id_jugador" => $ver[3],
                    "IJ" => $ver[4],
					"C" => $ver[5],
                    "CL" => $ver[6],
                    "Sko" => $ver[7],
                    "S" => $ver[8],
                    "P" => $ver[9],
                    "AVG" => $ver[10]
					
						);

			return $datos;
        }
        public function actualizarPitcheo($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE pitcheos set id_juego='$datos[1]',
                                        id_equipo='$datos[2]',
                                        id_jugador='$datos[3]',
                                        IJ='$datos[4]',
                                        C='$datos[5]',
                                        CL='$datos[6]',
                                        Sko='$datos[7]',
                                        S='$datos[8]',
                                        P='$datos[9]',
                                        AVG='$datos[10]'
                                     
                          where id_pitcheo='$datos[0]'";

            return mysqli_query($conexion,$sql);
        }
        public function eliminaPitcheo($idpitcheo){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="DELETE from pitcheos
                    where id_pitcheo='$idpitcheo'";
            return mysqli_query($conexion,$sql);

        }
    }
?>