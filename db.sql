create database DPC;
use DPC;
create table Libro(
	idLibro int AUTO_INCREMENT
	,nombreLibro varchar(60)
	,escritor varchar(40)
	,sinopsis text
    ,frase text
	,imagen varchar(60)
	,primary key(idLibro)
);
create table Frase(
	idFrase int AUTO_INCREMENT
	,frase varchar(300)
	,primary key(idFrase)
);
create table Usuario(
	idUsuario int AUTO_INCREMENT
	,nombre varchar(110)
	,area varchar(110)
	,descripcion text
	,srcimagen varchar(100)
	,frase varchar(110)
	,primary key(idUsuario)
);
create table Admin(
	idAdmin int AUTO_INCREMENT
	,nombre varchar(70)
	,pass varchar(40)
	,primary key(idAdmin)
);

INSERT INTO `usuario`(`nombre`, `area`, `descripcion`, `srcimagen`, `frase`) VALUES 
('Mr. Cat','Programación','Amo escribir, decitar poesía y desarrollar proyectos en computación','adrihanx.jpg')