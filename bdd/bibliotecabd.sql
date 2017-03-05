/*
Navicat MySQL Data Transfer

Source Server         : cursoMysql
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : bibliotecabd

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2017-03-01 18:09:05
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libro
-- ----------------------------
INSERT INTO `libro` VALUES ('1', 'UML Manual de Referencia', 'Los 3 amigos', 'http://www.mislibros.com', 'Descripcion', 'admin');
INSERT INTO `libro` VALUES ('2', 'C# 4.0', 'Microsoft', 'http://www.microsoft.com', 'POO', 'biblio');

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
INSERT INTO `usuario` VALUES ('admin', '12345', 'Roymer', '73839810');
INSERT INTO `usuario` VALUES ('biblio', '12345', 'Susana', '76765434');

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
INNER JOIN libro ON libro.FkCuenta = usuario.Cuenta ;

-- ----------------------------
-- Procedure structure for sprLibroUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `sprLibroUsuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sprLibroUsuario`(IN `pCuenta` varchar(20))
BEGIN

select * from vwlibrousuario
where Cuenta = pCuenta;

END
;;
DELIMITER ;
