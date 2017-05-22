CREATE TABLE IF NOT EXISTS `user` (
  id INT(12) PRIMARY KEY NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` INT(1) NOT NULL,
  UNIQUE(`username`)
);
-- 0 for admin, 1 for dentist, 2 for patient

CREATE TABLE IF NOT EXISTS `patient` (
  id INT(12) PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT(12) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  FOREIGN KEY(`user_id`) REFERENCES `user`(id)
) ;

CREATE TABLE IF NOT EXISTS `dentist` (
  id INT(12) PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT(12) NOT NULL,
  `specialty` varchar(30) NOT NULL,
  FOREIGN KEY(`user_id`) REFERENCES `user`(id)
) ;

CREATE TABLE IF NOT EXISTS `days` (
 id INT(1) PRIMARY KEY,
 `name` varchar(15) NOT NULL
) ;

CREATE TABLE IF NOT EXISTS `dentist_time` (
 id INT(3) PRIMARY KEY AUTO_INCREMENT,
  `id_dentist` INT(12) NOT NULL,
  `id_day` INT(1) NOT NULL,
  `time_in` TIME NOT NULL,
  `time_out` TIME NOT NULL,
   FOREIGN KEY(`id_dentist`) REFERENCES `dentist`(id),
   FOREIGN KEY(`id_day`) REFERENCES `days`(id)
) ;

CREATE TABLE IF NOT EXISTS `patient_date` (
  id INT(4) PRIMARY KEY AUTO_INCREMENT,
 `data_date` DATE NOT NULL,
 `hour` time NOT NULL,
 `id_patient` INT(12) NOT NULL,
 `id_dentist` INT(12) NOT NULL,
 FOREIGN KEY(`id_dentist`) REFERENCES `dentist`(id),
 FOREIGN KEY(`id_patient`) REFERENCES `patient`(id),
 UNIQUE(data_date,hour,id_patient,id_dentist)
);

CREATE TABLE `admin` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(12) NOT NULL,
  FOREIGN KEY(`user_id`) REFERENCES `user`(id)
) ;

--
-- Volcado de datos para la tabla
--
INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `password`, `user_type`) VALUES
(165432, 'jdfranko', 'JULIAN', 'TEGUI', '123456', 0),
(145454, 'esteban', 'ESTEBAN', 'SUAREZ', '123456', 0),
(124423, 'james', 'JAMES', 'DIAZ', '123456', 0),
(134689, 'felipe', 'FELIPE', 'PINZON', '123456', 1),
(124577, 'ar2d2', 'ARTURO', 'JAVA', '123456', 1),
(124687, 'luffykun', 'LUFFY', 'MIJA', '123456', 2),
(113453, 'eustaquio', 'EUSTAQUIO', 'DIAZ', '123456', 2),
(132334, 'jamescalle', 'JAMES', 'CALLE', '123456', 2),
(124790, 'carol', 'CAROL', 'MUGIWARA', '123456', 2),
(123456, 'cristian', 'CRISTIAN', 'DIAZ', '123456', 2),
(123576, 'tiagloria', 'GLORIA', 'STEVENSON', '123456', 1);

INSERT INTO `admin` (`user_id`) VALUES --THIS IS RIDICULOUS :P
(165432),
(145454),
(124423);

insert INTO `patient` (`user_id`, `birthdate`, `email`, `phone`) VALUES
  (124687, '1990-10-19', 'luffy@mail.com', '300678903'),
  (113453, '1990-10-19', 'eustaquio@mail.com', '300678903'),
  (132334, '1990-10-19', 'jamesc@mail.com', '300678903'),
  (124790, '1990-10-19', 'carol@mail.com', '300678903'),
  (123456, '1990-10-19', 'cristian@mail.com', '300678903');

INSERT INTO `dentist` (`user_id`, `specialty`) VALUES
(134689, 'endodoncia'),
(124577, 'ortodoncia'),
(123576, 'cirugia y traumatologia');

INSERT INTO `days` (`id`, `name`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado');

INSERT INTO `dentist_time` (`id_dentist`, `id_day`, `time_in`, `time_out`) VALUES
(1, 2, '07:00:00', '16:00:00'),
(2, 3, '07:00:00', '13:00:00'),
(3, 3, '07:00:00', '14:00:00'),
(2, 4, '15:00:00', '20:00:00');

INSERT INTO `patient_date` (`data_date`, `hour`,	`id_patient`,	`id_dentist`) VALUES
('2017-04-16', '07:00:00', 4, 2),
('2017-04-16', '07:00:00', 5, 3);
