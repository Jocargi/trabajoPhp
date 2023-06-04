/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - tarifadreams
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tarifadreams` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `tarifadreams`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `dni` char(9) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido_1` varchar(30) DEFAULT NULL,
  `apellido_2` varchar(30) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `localidad` varchar(25) DEFAULT NULL,
  `telefono` char(13) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `cliente` */

insert  into `cliente`(`dni`,`nombre`,`apellido_1`,`apellido_2`,`correo`,`direccion`,`localidad`,`telefono`) values 
('123987654','Ana','García','Hernández','ana@gmail.com','Calle Secundaria 123','Ciudad','1239876540'),
('147258369','Sofío','López','González','sofia@gmail.com','Avenida Principal 741','Ciudad','1472583690'),
('159357486','Hugo','Ramírez','González','hugo@gmail.com','Calle Secundaria 159','Pueblo','1593574860'),
('321987654','Ana','Martínez','Ramírez','ana@gmail.com','Calle Principal 987','Pueblo','321987654'),
('357486159','Lucía','Sánchez','Fernández','lucia@gmail.com','Avenida Principal 357','Ciudad','3574861590'),
('369852147','Alejandra','Hernández','Ramírez','alejandro@gmail.com','Avenida','Pueblo','3698521470'),
('456321789','Antonio','Martínez','García','antonio@gmail.com','Calle Mayor 456','Pueblo','4563217890'),
('456789123','Laura','Fernández','Pérez','laura@gmail.com','Calle Secundaria 321','Pueblo','4567891230'),
('654123987','Andrés','López','Gómez','andres@gmail.com','Calle Principal 654','Pueblo','6541239870'),
('654321987','Pedro','López','Gómez','pedro@gmail.com','Calle Principal 789','Ciudad','6543219870'),
('741258963','Elena','Fernández','López','elena@gmail.com','Calle Mayor 369','Ciudad','7412589630'),
('789123456','Carlos','Hernández','García','carlosh@gmail.com','Avenida Secundaria 654','Ciudad','7891234560'),
('789654123','Carlos','Fernández','Gómez','carlos@gmail.com','Avenida Principal 789','Pueblo','7896541230'),
('852741963','Manuel','Gómez','Martínez','manuel@gmail.com','Avenida Principal 852','Pueblo','8527419630'),
('963741852','Marta','López','Hernández','marta@gmail.com','Calle Principal 741','Ciudad','9637418520'),
('963852741','Luis','Martínez','García','luis@gmail.com','Calle Mayor 852','Pueblo','9638527410'),
('987654123','Sara','González','Pérez','sara@gmail.com','Avenida Principal 987','Ciudad','9876541230'),
('987654321','María','Rodríguez','Sánchez','maria@gmail.com','Avenida Principal 456','Pueblo','9876543210');

/*Table structure for table `habitacion` */

DROP TABLE IF EXISTS `habitacion`;

CREATE TABLE `habitacion` (
  `id` smallint(5) unsigned NOT NULL,
  `nombre` enum('Individual','Doble','Triple') NOT NULL,
  `numero_camas` tinyint(3) unsigned NOT NULL,
  `max_personas` tinyint(3) unsigned NOT NULL,
  `precio` tinyint(3) unsigned NOT NULL,
  `descripcion` text DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `metros` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `habitacion` */

insert  into `habitacion`(`id`,`nombre`,`numero_camas`,`max_personas`,`precio`,`descripcion`,`ruta_imagen`,`metros`) values 
(1,'Individual',1,1,50,'Habitación con cama individual. Está pensada para una sola persona.\nTiene un baño adjunto, un pequeño tocador, una pequeña mesita de noche y un pequeño escritorio','images/131908970.jpg',NULL),
(2,'Doble',2,2,80,'Habitación con 2 camas individuales o 1 cama King Size. Está equipada con muebles adecuados, como tocador y mesa de escribir, un televisor y una pequeña nevera.','images/457536987.jpg',NULL),
(3,'Triple',3,3,100,'Habitación con 1 camas individual y 1 cama doble. Se componen de uno o más dormitorios, una sala de estar, una cocina con utensilios y un comedor. Es excelente para los huéspedes que prefieren más espacio','images/39322973.jpg',NULL),
(4,'Individual',1,1,50,'Habitación con cama individual. Está pensada para una sola persona.\nTiene un baño adjunto, un pequeño tocador, una pequeña mesita de noche y un pequeño escritorio','images/131908970.jpg',NULL),
(5,'Doble',2,2,80,'Habitación con 2 camas individuales o 1 cama King Size. Está equipada con muebles adecuados, como tocador y mesa de escribir, un televisor y una pequeña nevera.','images/457536987.jpg',NULL),
(6,'Triple',3,3,100,'Habitación con 1 camas individual y 1 cama doble. Se componen de uno o más dormitorios, una sala de estar, una cocina con utensilios y un comedor. Es excelente para los huéspedes que prefieren más espacio','images/39322973.jpg',NULL),
(7,'Individual',1,1,50,'Habitación con cama individual. Está pensada para una sola persona.\nTiene un baño adjunto, un pequeño tocador, una pequeña mesita de noche y un pequeño escritorio','images/131908970.jpg',NULL),
(8,'Doble',2,2,80,'Habitación con 2 camas individuales o 1 cama King Size. Está equipada con muebles adecuados, como tocador y mesa de escribir, un televisor y una pequeña nevera.','images/457536987.jpg',NULL),
(9,'Triple',3,3,100,'Habitación con 1 camas individual y 1 cama doble. Se componen de uno o más dormitorios, una sala de estar, una cocina con utensilios y un comedor. Es excelente para los huéspedes que prefieren más espacio','images/39322973.jpg',NULL),
(10,'Individual',1,1,50,'Habitación con cama individual. Está pensada para una sola persona.\nTiene un baño adjunto, un pequeño tocador, una pequeña mesita de noche y un pequeño escritorio','images/131908970.jpg',NULL),
(11,'Doble',2,2,80,'Habitación con 2 camas individuales o 1 cama King Size. Está equipada con muebles adecuados, como tocador y mesa de escribir, un televisor y una pequeña nevera.','images/457536987.jpg',NULL),
(12,'Triple',3,3,100,'Habitación con 1 camas individual y 1 cama doble. Se componen de uno o más dormitorios, una sala de estar, una cocina con utensilios y un comedor. Es excelente para los huéspedes que prefieren más espacio','images/39322973.jpg',NULL),
(14,'Doble',2,2,80,'Habitación con 2 camas individuales o 1 cama King Size. Está equipada con muebles adecuados, como tocador y mesa de escribir, un televisor y una pequeña nevera.','images/457536987.jpg',NULL);

/*Table structure for table `reserva` */

DROP TABLE IF EXISTS `reserva`;

CREATE TABLE `reserva` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` char(9) NOT NULL,
  `id_habitacion` smallint(5) unsigned NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_reserva_cliente` (`id_cliente`),
  KEY `FK_reserva_habitacion` (`id_habitacion`),
  CONSTRAINT `FK_reserva_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`dni`) ON UPDATE CASCADE,
  CONSTRAINT `FK_reserva_habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitacion` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `reserva` */

insert  into `reserva`(`id`,`id_cliente`,`id_habitacion`,`fecha_entrada`,`fecha_salida`) values 
(46,'123987654',1,'2023-05-01','2023-05-05'),
(48,'159357486',1,'2023-07-20','2023-07-25'),
(49,'321987654',4,'2023-07-20','2023-07-25'),
(50,'357486159',7,'2023-07-20','2023-07-25'),
(51,'369852147',10,'2023-07-20','2023-07-25'),
(52,'456321789',7,'2023-11-15','2023-11-20'),
(53,'456789123',8,'2023-12-20','2023-12-25'),
(54,'654123987',9,'2024-01-05','2024-01-10'),
(55,'654321987',10,'2024-02-10','2024-02-15');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `nombre` varchar(30) NOT NULL COMMENT 'El nombre hace referencia a lo que seria el nombre de usuario, no el nombre de la persona',
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `rol` tinyint(1) NOT NULL COMMENT '0. Usuario corriente | 1. Administrador',
  `id_cliente` char(9) DEFAULT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`nombre`,`correo`,`contrasena`,`rol`,`id_cliente`) values 
('Alejandro','alejandro@gmail.com','1234',0,'369852147'),
('Ana','ana@gmail.com','1234',0,'321987654'),
('Anag','ana@gmail.com','secreto123',0,'123987654'),
('Andrés','andres@example.com','secreto654',0,'654123987'),
('Antoniom','antonio@example.com','secreto456',0,'456321789'),
('Carlos','carlosh@gmail.com','1234',1,'789123456'),
('Carlosf','carlosf@example.com','secreto789',0,'789654123'),
('Elena','elena@gmail.com','secreto369',0,'741258963'),
('Hugo','hugo@gmail.com','secreto159',0,'159357486'),
('Isabel','isabel@gmail.com','1234',0,'258741369'),
('Juan','juan@gmail.com','1234',0,'123456789'),
('Juang','juang@gmail.com','1234',0,'12345678L'),
('Juangn','juan@gmail.com','1234',0,'123456789'),
('Laura','laura@gmail.com','1234',1,'456789123'),
('Lucía','lucia@gmail.com','secreto357',0,'357486159'),
('Luis','luis@gmail.com','1234',0,'963852741'),
('Manuel','manuel@gmail.com','secreto852',0,'852741963'),
('María','maria@gmail.com','1234',0,'987654321'),
('Marta','marta@gmail.com','secreto741',0,'963741852'),
('Pedro','pedro@gmail.com','1234',0,'654321987'),
('Sara','sara@example.com','secreto987',0,'987654123'),
('segura','segura@gmail.com','1234',1,NULL),
('Sofía','sofia@gmail.com','1234',0,'147258369');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
