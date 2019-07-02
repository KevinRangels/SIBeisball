<?php
    class anotaciones{
        public function agregaAnotacion($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="INSERT into anotaciones (id_juego,
                                           id_equipo,
                                           id_jugador,
                                            VB,
                                            CA,
                                            HC,
                                            CI,
                                            B2,
                                            B3,
                                            HR,
                                            BR,
                                            SF,
                                            BB,
                                            DB,
                                            OB,
                                            k,
                                            POS,
                                            IJ,
                                            O,
                                            A,
                                            E,
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
                                   '$datos[9]',
                                   '$datos[10]',
                                   '$datos[11]',
                                   '$datos[12]',
                                   '$datos[13]',
                                   '$datos[14]',
                                   '$datos[15]',
                                   '$datos[16]',
                                   '$datos[17]',
                                   '$datos[18]',
                                   '$datos[19]',
                                   '$datos[20]',
                                   '$datos[21]')";

            return mysqli_query($conexion,$sql);
        }

        public function obtenDatosAnotacion($idanotacion){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="SELECT id_anotaciones,
                        id_juego,
                        id_equipo,
                        id_jugador,
                        VB,
                        CA,
                        HC,
                        CI,
                        B2,
                        B3,
                        HR,
                        BR,
                        SF,
                        BB,
                        DB,
                        OB,
                        k,
                        POS,
                        IJ,
                        O,
                        A,
                        E,
                        AVG
                   from anotaciones where id_anotaciones='$idanotacion'";

                $result=mysqli_query($conexion,$sql);
                $ver=mysqli_fetch_row($result);

                $datos=array(
					"id_anotaciones" => $ver[0],
					"id_juego" => $ver[1],
					"id_equipo" => $ver[2],
                    "id_jugador" => $ver[3],
                    "VB" => $ver[4],
					"CA" => $ver[5],
                    "HC" => $ver[6],
                    "CI" => $ver[7],
                    "B2" => $ver[8],
                    "B3" => $ver[9],
                    "HR" => $ver[10],
                    "BR" => $ver[11],
                    "SF" => $ver[12],
                    "BB" => $ver[13],
                    "DB" => $ver[14],
                    "OB" => $ver[15],
                    "k" => $ver[16],
                    "POS" => $ver[17],
                    "IJ" => $ver[18],
                    "O" => $ver[19],
                    "A" => $ver[20],
                    "E" => $ver[21],
                    "AVG" => $ver[22]
					
						);

			return $datos;
        }
        public function actualizarAnotacion($datos){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE anotaciones set id_juego='$datos[1]',
                                        id_equipo='$datos[2]',
                                        id_jugador='$datos[3]',
                                        VB='$datos[4]',
                                        CA='$datos[5]',
                                        HC='$datos[6]',
                                        CI='$datos[7]',
                                        B2='$datos[8]',
                                        B3='$datos[9]',
                                        HR='$datos[10]',
                                        BR='$datos[11]',
                                        SF='$datos[12]',
                                        BB='$datos[13]',
                                        DB='$datos[14]',
                                        OB='$datos[15]',
                                        k='$datos[16]',
                                        POS='$datos[17]',
                                        IJ='$datos[18]',
                                        O='$datos[19]',
                                        A='$datos[20]',
                                        E='$datos[21]',
                                        AVG='$datos[22]'
                                     
                          where id_anotaciones='$datos[0]'";

            return mysqli_query($conexion,$sql);
        }
        public function eliminaAnotacion($idanotacion){
            $c=new conectar();
            $conexion=$c->conexion();

            $sql="DELETE from anotaciones
                    where id_anotaciones='$idanotacion'";
            return mysqli_query($conexion,$sql);

        }
    }
?>