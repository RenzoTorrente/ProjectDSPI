


-- Creacion de tabla usuarios
CREATE TABLE `usuarios`
(
 `id `int
(10) NOT NULL,
`user` varchar
(45) NOT NULL,
  `password` varchar
(255) NOT NULL,
  `name` varchar
(200) NOT NULL,
  `email` varchar
(200) NOT NULL
) ENGINE=InnoDB ;
--Asignando llave table usuarios 
ALTER TABLE `usuarios`
ADD PRIMARY KEY
(`id`);

--Creacion de tabla films
CREATE TABLE `film`
(
`id` int
(10) NOT NULL,
`userID` int
(10) NOT NULL,
  `filmname` varchar
(255) NOT NULL,
  `calificacion` varchar
(200) NOT NULL
  
) ENGINE=InnoDB;
-- Asignando llave foranea a tabla film
ADD CONSTRAINT `fk_film` FOREIGN KEY
(`userid`) REFERENCES `usuarios`
(`id`) ON
DELETE CASCADE ON
UPDATE CASCADE;






