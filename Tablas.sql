CREATE TABLE IF NOT EXISTS `paciente` (
  id INT(12) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `dentist` (
  id INT(12) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `specialty` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `dias` (
 id INT(1) PRIMARY KEY,
 `nombre` varchar(15) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `horario_odontologo` (
 id INT(3) PRIMARY KEY AUTO_INCREMENT,
  `id_odontologo` INT(12) NOT NULL,
  `id_dia` INT(1) NOT NULL,
  `horario_in` TIME NOT NULL,
  `horario_out` TIME NOT NULL,
   FOREIGN KEY(`id_odontologo`) REFERENCES `odontologo`(id),
   FOREIGN KEY(`id_dia`) REFERENCES `dias`(id)
) ;


CREATE TABLE IF NOT EXISTS `cita` (
 
 `fecha` DATE NOT NULL,
 `hora` time NOT NULL,
 `id_paciente` INT(12) NOT NULL,
 `id_odontologo` INT(12) NOT NULL,
  FOREIGN KEY(`id_odontologo`) REFERENCES `odontologo`(id),
 FOREIGN KEY(`id_paciente`) REFERENCES `paciente`(id),
 PRIMARY KEY(fecha,hora,id_odontologo)
) ;

CREATE TABLE `patient` (
  `id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `brithdate` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `patient`
--

INSERT INTO `patient` (`id`, `name`, `brithdate`, `email`, `phone`, `password`) VALUES
('02', 'juana', '1990-10-19', 'juana@gmail.com', '88888888', '123'),
('03', 'pedro daza', '1990-05-14', 'pedro@gmail.com', '12345', '123');


CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '1234');


INSERT INTO `paciente` (`id`, `nombre`, `apellido`) VALUES
(11111, 'andres', 'Rios'),
(22222, 'sandra', 'lara');


INSERT INTO `odontologo` (`id`, `nombre`, `apellido`, `especialidad`) VALUES
(NULL, 'juan', 'Rojas', 'higiene'),
(NULL, 'pedro', 'sanches', 'odontologia'),
(NULL, 'ana', 'lara', 'odontologia'),
(NULL, 'james', 'diaz', 'ortodoncia'),
(NULL, 'julian', 'diaz', 'higiene'),
(NULL, 'david', 'ossa', 'higiene');

INSERT INTO `dias` (`id`, `nombre`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado');

INSERT INTO `horario_odontologo` (`id`, `id_odontologo`, `id_dia`, `horario_in`, `horario_out`) VALUES
(1, 2, 2, '07:00:00', '16:00:00'),
(2, 2, 3, '07:00:00', '13:00:00'),
(3, 3, 3, '07:00:00', '14:00:00'),
(4, 1, 4, '13:00:00', '20:00:00'),
(5, 4, 5, '09:00:00', '17:00:00'),
(6, 5, 4, '08:00:00', '18:00:00'),
(7, 2, 5, '12:00:00', '19:00:00'),
(8, 6, 6, '06:00:00', '12:00:00');

INSERT INTO `cita` (`fecha`, `hora`, `id_paciente`, `id_odontologo`) VALUES
('2017-04-16', '07:00:00', 11111, 3),
('2017-04-16', '08:00:00', 11111, 6),
('2017-04-17', '07:00:00', 11111, 2);

ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--