CREATE DATABASE if not exists tarifadreams CHARACTER SET utf8 COLLATE utf8_general_ci;

USE tarifadreams;

CREATE TABLE IF NOT EXISTS cliente(
dni CHAR(9) PRIMARY KEY,
nombre VARCHAR(30) NULL,
apellido_1 VARCHAR(30) NULL,
apellido_2 VARCHAR(30) NULL,
correo VARCHAR(50) NOT NULL,
direccion VARCHAR(60) NULL,
localidad VARCHAR(25) NULL,
telefono CHAR(13) NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS habitacion(
id SMALLINT UNSIGNED PRIMARY KEY,
nombre ENUM("Individual", "Doble", "Triple") NOT NULL,
numero_camas TINYINT UNSIGNED NOT NULL,
max_personas TINYINT UNSIGNED NOT NULL,
precio TINYINT UNSIGNED NOT NULL,
descripcion TEXT NULL
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS reserva (
id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_cliente CHAR(9)NOT NULL,
id_habitacion SMALLINT UNSIGNED NOT NULL,
fecha_entrada DATE NOT NULL,
fecha_salida DATE NOT NULL,
CONSTRAINT FK_reserva_cliente FOREIGN KEY (id_cliente) REFERENCES cliente(dni) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK_reserva_habitacion FOREIGN KEY (id_habitacion) REFERENCES habitacion(id) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS usuario(
nombre VARCHAR(30) PRIMARY KEY COMMENT 'El nombre hace referencia a lo que seria el nombre de usuario, no el nombre de la persona',
correo VARCHAR(50) NOT NULL,
contrasena VARCHAR(25) NOT NULL,
rol BOOLEAN NOT NULL COMMENT '0. Usuario corriente | 1. Administrador'
)ENGINE=INNODB;

CREATE TABLE usuario_cliente(
id_cliente CHAR(9),
id_usuario VARCHAR(30),
PRIMARY KEY(
id_cliente,
id_usuario
),
CONSTRAINT FK_usuario_cliente FOREIGN KEY (id_cliente) REFERENCES cliente(dni) ON UPDATE CASCADE ON DELETE RESTRICT,
CONSTRAINT FK_cliente_usuario FOREIGN KEY (id_usuario) REFERENCES usuario(nombre) ON UPDATE CASCADE ON DELETE RESTRICT
)ENGINE=INNODB;