/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : spinn

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2016-09-29 14:52:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for catalogo
-- ----------------------------
DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE `catalogo` (
  `IdCT` int(11) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`IdCT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catalogo
-- ----------------------------

-- ----------------------------
-- Table structure for catrol
-- ----------------------------
DROP TABLE IF EXISTS `catrol`;
CREATE TABLE `catrol` (
  `IdRol` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(4000) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catrol
-- ----------------------------
INSERT INTO `catrol` VALUES ('1', 'Super Administrador', '\0');
INSERT INTO `catrol` VALUES ('2', 'Administrador', '\0');
INSERT INTO `catrol` VALUES ('3', 'Vendedor', '\0');

-- ----------------------------
-- Table structure for detallect
-- ----------------------------
DROP TABLE IF EXISTS `detallect`;
CREATE TABLE `detallect` (
  `IdCT` int(11) DEFAULT NULL,
  `IdIMG` int(11) DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `IMG` varchar(150) DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  KEY `FK_DetalleCT_IdCT` (`IdCT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallect
-- ----------------------------

-- ----------------------------
-- Table structure for tblusuario
-- ----------------------------
DROP TABLE IF EXISTS `tblusuario`;
CREATE TABLE `tblusuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Clave` varchar(50) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `Zona` varchar(255) DEFAULT NULL,
  `NombreVendedor` varchar(255) DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT NULL,
  `FechaBaja` datetime DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblusuario
-- ----------------------------
INSERT INTO `tblusuario` VALUES ('1', 'Admin', 'Alder Hernandez', '123', '1', null, null, '2016-09-28 11:15:23', '2016-09-29 11:40:12', '');

-- ----------------------------
-- Table structure for tmp_catalogo
-- ----------------------------
DROP TABLE IF EXISTS `tmp_catalogo`;
CREATE TABLE `tmp_catalogo` (
  `v_IdCT1` int(11) DEFAULT NULL,
  `v_IdIMG1` int(11) DEFAULT NULL,
  `v_Nombre1` varchar(255) DEFAULT NULL,
  `v_IMG1` varchar(150) DEFAULT NULL,
  `v_Puntos1` int(11) DEFAULT NULL,
  `v_IdCT2` int(11) DEFAULT NULL,
  `v_IdIMG2` int(11) DEFAULT NULL,
  `v_Nombre2` varchar(255) DEFAULT NULL,
  `v_IMG2` varchar(150) DEFAULT NULL,
  `v_Puntos2` int(11) DEFAULT NULL,
  `v_IdCT3` int(11) DEFAULT NULL,
  `v_IdIMG3` int(11) DEFAULT NULL,
  `v_Nombre3` varchar(255) DEFAULT NULL,
  `v_IMG3` varchar(150) DEFAULT NULL,
  `v_Puntos3` int(11) DEFAULT NULL,
  `v_IdCT4` int(11) DEFAULT NULL,
  `v_IdIMG4` int(11) DEFAULT NULL,
  `v_Nombre4` varchar(255) DEFAULT NULL,
  `v_IMG4` varchar(150) DEFAULT NULL,
  `v_Puntos4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tmp_catalogo
-- ----------------------------
