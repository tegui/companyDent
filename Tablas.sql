CREATE TABLE IF NOT EXISTS `paciente` (
  id INT(12) PRIMARY KEY,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `odontologo` (
  id INT(12) PRIMARY KEY,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `especialidad` varchar(30) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `dias` (
 id INT(1) PRIMARY KEY AUTO_INCREMENT,
 `nombre` varchar(10) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `horario_odontologo` (
 id INT(3) PRIMARY KEY AUTO_INCREMENT,
  `id_odontologo` INT(12) NOT NULL,
  `id_dia` INT(1) NOT NULL,
  `horario_in` DATETIME NOT NULL,
  `horario_out` DATETIME NOT NULL,
   FOREIGN KEY(`id_odontologo`) REFERENCES `dias`(id),
   FOREIGN KEY(`id_dia`) REFERENCES `odontologo`(id)
) ;


CREATE TABLE IF NOT EXISTS `cita` (
 id INT(5) PRIMARY KEY AUTO_INCREMENT,
 `fecha` DATE NOT NULL,
 `hora` time NOT NULL,
 `id_paciente` INT(12) NOT NULL,
 `id_odontologo` INT(12) NOT NULL,
  FOREIGN KEY(`id_odontologo`) REFERENCES `odontologo`(id),
 FOREIGN KEY(`id_paciente`) REFERENCES `paciente`(id)
) ;



INSERT INTO `paciente` (`id`, `nombre`, `apellido`) VALUES
(11111, 'andres', 'Rios'),
(22222, 'sandra', 'lara');


INSERT INTO `odontologo` (`id`, `nombre`, `apellido`, `especialidad`) VALUES
(14, 'juan', 'Rojas', 'higiene'),
(31, 'pedro', 'sanches', 'odontologia'),
(35, 'ana', 'lara', 'odontologia'),
(44, 'james', 'diaz', 'ortopedista'),
(55, 'julian', 'diaz', 'higiene');



INSERT INTO `cita` (`id`, `fecha`, `hora`, `id_paciente`, `id_odontologo`) VALUES
(1, '2017-04-16', '07:00:00', 11111, 31),
(2, '2017-04-16', '08:00:00', 11111, 44),
(3, '2017-04-17', '07:00:00', 11111, 14);
