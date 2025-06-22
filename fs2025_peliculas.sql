CREATE DATABASE fs2025_peliculas
DEFAULT CHARACTER SET utf8mb4
COLLATE UTF8MB4_UNICODE_CI;

USE fs2025_peliculas;

CREATE TABLE paises(
	pais_id smallint AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(100)
);

CREATE TABLE directores(
	director_id int AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50),
	apellido VARCHAR(50),
	pais_id SMALLINT	
);

CREATE TABLE clientes(
	cliente_id int AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(50),
	apellido VARCHAR(50),
	fecha_nacimiento DATE,
	fecha_suscripcion DATE,
	correo_electronico VARCHAR(100),
	telefono_movil INT(8)
);

CREATE TABLE suscripciones(
	suscripcion_id int AUTO_INCREMENT PRIMARY KEY,
	cliente_id int,
	pelicula_id int,
	fecha_suscripcion DATE,
	fecha_finalizacion DATE,
	precio DECIMAL(8,2)
);

CREATE TABLE peliculas(
	pelicula_id int AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(150),
	fecha_estreno DATE,
	duracion_minutos smallint,
	director_id INT
);


ALTER TABLE directores
ADD FOREIGN KEY(pais_id)
REFERENCES paises(pais_id)
ON UPDATE CASCADE 
ON DELETE CASCADE;

ALTER TABLE peliculas
ADD FOREIGN KEY(director_id)
REFERENCES directores(director_id)
ON UPDATE CASCADE 
ON DELETE CASCADE;

ALTER TABLE suscripciones
ADD FOREIGN KEY(pelicula_id)
REFERENCES peliculas(pelicula_id)
ON UPDATE CASCADE 
ON DELETE CASCADE;

ALTER TABLE suscripciones
ADD FOREIGN KEY(cliente_id)
REFERENCES clientes(cliente_id)
ON UPDATE CASCADE 
ON DELETE CASCADE;
