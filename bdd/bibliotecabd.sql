/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : 127.0.0.1:3306
Source Database       : bibliotecabd

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-03-08 01:50:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for libro
-- ----------------------------
DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) DEFAULT NULL,
  `Autor` varchar(30) DEFAULT NULL,
  `Url` varchar(200) DEFAULT NULL,
  `Portada` varchar(100) DEFAULT NULL,
  `FkCuenta` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `FkCuenta` (`FkCuenta`),
  CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`FkCuenta`) REFERENCES `usuario` (`Cuenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libro
-- ----------------------------
INSERT INTO `libro` VALUES ('1', 'UML Manual de Referencia', 'Los 3 amigos', 'http://www.mislibros.com', 'Descripcion', 'admin');
INSERT INTO `libro` VALUES ('2', 'C# 4.0', 'Microsoft', 'http://www.microsoft.com', 'POO', 'biblio');
INSERT INTO `libro` VALUES ('5', 'programacion de robots', 'joyanes aguilar', 'http://uno.php', '../images/images.jpg', 'admin');
INSERT INTO `libro` VALUES ('6', 'programacion multimedia', 'otra', 'http://nose.com', '../images/web.png', 'saul');
INSERT INTO `libro` VALUES ('7', 'UML', 'Bosh', 'http://uno.com', '../images/web.png', 'saul');
INSERT INTO `libro` VALUES ('8', 'Programacion Paralela con GO', 'Google', 'http://google.go.com', '../images/15056384_163238827478795_155901180140686505_n.jpg', 'juan');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `Cuenta` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Celular` int(11) NOT NULL,
  PRIMARY KEY (`Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('admin', '8cb2237d0679ca88db6464eac60da96345513964', 'Roymer', '73839810');
INSERT INTO `usuario` VALUES ('ana', 'beec983e1d29e81bde7148cec004bbbc9e1034f5', 'ana maria corales', '68787687');
INSERT INTO `usuario` VALUES ('biblio', 'e8a089e5193d64e54c43f80cf4093b9624d142e1', 'Susana', '76765434');
INSERT INTO `usuario` VALUES ('juan', 'ee06bf8bfebe408f1954466bb64ba4d6497629d3', 'juan pablo garcia marquez', '78783878');
INSERT INTO `usuario` VALUES ('pedro', '55a1b02046146d34402fe09cb93b568de962bcde', 'pedro', '990809');
INSERT INTO `usuario` VALUES ('saul', '64a5dd76d94f11d72d26c3fbfded5de5ab59cf9b', 'saul mamani', '0');

-- ----------------------------
-- View structure for vwlibrousuario
-- ----------------------------
DROP VIEW IF EXISTS `vwlibrousuario`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `vwlibrousuario` AS SELECT
usuario.Cuenta,
usuario.`Password`,
usuario.Nombre,
usuario.Celular,
libro.Id,
libro.Titulo,
libro.Autor,
libro.Url,
libro.Portada,
libro.FkCuenta
FROM
usuario
INNER JOIN libro ON libro.FkCuenta = usuario.Cuenta ; ;

-- ----------------------------
-- Procedure structure for sprestadistico
-- ----------------------------
DROP PROCEDURE IF EXISTS `sprestadistico`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sprestadistico`()
BEGIN
	#Routine body goes here...
select FkCuenta, COUNT(FkCuenta) as Cantidad 
from libro
GROUP BY FkCuenta;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for sprLibroUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `sprLibroUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sprLibroUsuario`()
BEGIN

select FkCuenta as Usuario, count(FkCuenta) 
from libro
GROUP BY FkCuenta;

END
;;
DELIMITER ;
