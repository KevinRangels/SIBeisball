create database serviciocomunitario222;

use serviciocomunitario;

create table usuarios(
				id_usuario int auto_increment,
				nombre varchar(50),
				apellido varchar(50),
				email varchar(50),
				password text(50),
				fechaCaptura date,
				primary key(id_usuario)
					);

create table campeonatos(
        id_campeonato int auto_increment,
        id_usuario int not null,
        nombre varchar(50),
        categoria varchar(50),
        fechainicio date,
        primary key(id_campeonato)
        );
        
create table equipos(
        id_equipo int auto_increment,
        id_campeonato int not null,
        nombre varchar(50),
        manager varchar(50),
        primary key(id_equipo)
        );

create table juegos(
        id_juego int,
        nro_juego int not null,
        id_equipo int not null,
        id_campeonato int not null,
        fecha date,
        localia varchar(30),
        JJ int,
        JG int,
        JE int,
        JP int,
        CF int,
        H int,
        E int,
        CC int,
        primary key(nro_juego)
        );

create table jugadores(
    id_jugador int auto_increment,
    id_equipo int not null,
    nombre varchar(50),
    apellido varchar(50),
    cedula int not null,
    primary key (id_jugador)
);

create table anotaciones(
    id_anotaciones int auto_increment,
    id_juego int not null,
    id_equipo int not null,
    id_jugador int not null,
    VB int,
    CA int,
    HC int,
    CI int,
    B2 int,
    B3 int,
    HR int,
    BR int,
    SF int,
    BB int,
    DB int,
    OB int,
    k int,
    POS int,
    IJ int,
    O int,
    A int,
    E int,
    AVG float(10,3),
    primary key(id_anotaciones)
);
create table pitcheos(
    id_pitcheo int auto_increment,
    id_juego int not null,
    id_equipo int not null,
    id_jugador int not null,
    IJ int,
    C int,
    CL int,
    Sko int,
    S int,
    P int,
    AVG float(10,3),
    primary key(id_pitcheo)
);

