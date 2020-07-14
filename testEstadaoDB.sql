
CREATE DATABASE IF NOT EXISTS `testestadao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `testestadao`;

CREATE TABLE `carro` (
  `idCarro` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `ano` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `carro`
  ADD PRIMARY KEY (`idCarro`);
ALTER TABLE `carro`
  MODIFY `idCarro` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO `carro` (`idCarro`, `marca`, `modelo`, `ano`) VALUES
(1, 'FIAT', 'Uno', 2012),
(2, 'VOLKSWAGEN', 'Gol', 2015),
(3, 'CHEVROLET', 'Onix', 2020),
(4, 'HYUNDAI', 'HB20', 2019),
(5, 'RENAULT', 'Kwid', 2021);
