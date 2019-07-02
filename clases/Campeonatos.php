<?php
    class campeonatos{
        public function agregaCampeonato($datos){
            $c= new conectar();
            $conexion=$c->conexion();

            $sql="INSERT into campeonatos(
                              id_usuario,
                              nombre,
                              categoria,
                              fechainicio)
                        values ('$datos[0]',
                                '$datos[1]',
                                '$datos[2]',
                                '$datos[3]')";
            return mysqli_query($conexion,$sql);            
        }

        public function actualizaCampeonato($datos){
            $c= new conectar();
            $conexion=$c->conexion();

            $sql="UPDATE campeonatos set nombre='$datos[1]',
                                         categoria='$datos[2]',
                                         fechainicio='$datos[3]'
                                    where id_campeonato='$datos[0]'";

            return mysqli_query($conexion,$sql);
        }

        public function eliminaCampeonato($idcampeonato){
            $c= new conectar();
            $conexion=$c->conexion();
            $sql="DELETE from campeonatos where id_campeonato='$idcampeonato'";
            return mysqli_query($conexion,$sql);
        }
    }
?>