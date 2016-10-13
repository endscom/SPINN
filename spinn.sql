/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50136
Source Host           : localhost:3306
Source Database       : spinn

Target Server Type    : MYSQL
Target Server Version : 50136
File Encoding         : 65001

Date: 2016-10-13 16:03:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for catalogo
-- ----------------------------
DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE `catalogo` (
  `IdCT` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`IdCT`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of catalogo
-- ----------------------------
INSERT INTO `catalogo` VALUES ('18', 'Catalogo de Octubre', '\0', '2016-10-01 00:00:00');

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
INSERT INTO `catrol` VALUES ('1', 'ADMINISTRADOR', '\0');
INSERT INTO `catrol` VALUES ('2', 'SAC', '\0');
INSERT INTO `catrol` VALUES ('3', 'VENDEDOR', '\0');

-- ----------------------------
-- Table structure for detallect
-- ----------------------------
DROP TABLE IF EXISTS `detallect`;
CREATE TABLE `detallect` (
  `IdCT` int(11) DEFAULT NULL,
  `IdIMG` int(11) DEFAULT NULL,
  `Nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMG` varchar(150) DEFAULT NULL,
  `Puntos` int(11) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  KEY `FK_DetalleCT_IdCT` (`IdCT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of detallect
-- ----------------------------
INSERT INTO `detallect` VALUES ('18', '104089', 'ARROCERA B&D HC3000', '104089.jpg', '500', '\0');
INSERT INTO `detallect` VALUES ('18', '105233', 'MUEBLES PEQUEÑOS', '105233.jpg', '1500', '\0');
INSERT INTO `detallect` VALUES ('18', '105975', 'MUEBLES ROJOS', '105975.jpg', '1500', '\0');

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
  `IdVendedor` varchar(10) DEFAULT NULL,
  `NombreVendedor` varchar(255) DEFAULT NULL,
  `FechaCreacion` datetime DEFAULT NULL,
  `FechaBaja` datetime DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tblusuario
-- ----------------------------
INSERT INTO `tblusuario` VALUES ('1', 'Admin', 'Alder Hernandez', '202cb962ac59075b964b07152d234b70', '1', '', null, null, '2016-09-28 11:15:23', '2016-10-03 10:27:48', '');
INSERT INTO `tblusuario` VALUES ('9', 'cesia', 'cesia moreire', '202cb962ac59075b964b07152d234b70', '3', '', '23', 'Cesia Moreira', '2016-10-03 13:29:58', null, '');
INSERT INTO `tblusuario` VALUES ('12', 'bayardo', 'Bayardo Jose Ortega Henriquez', '202cb962ac59075b964b07152d234b70', '3', null, '45', 'Bayardo Jose Ortega Henriquez', '2016-10-13 11:00:16', null, '');

-- ----------------------------
-- Table structure for tmp_catalogo
-- ----------------------------
DROP TABLE IF EXISTS `tmp_catalogo`;
CREATE TABLE `tmp_catalogo` (
  `v_IdCT1` int(11) DEFAULT NULL,
  `v_IdIMG1` int(11) DEFAULT NULL,
  `v_Nombre1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_IMG1` varchar(150) DEFAULT NULL,
  `v_Puntos1` int(11) DEFAULT NULL,
  `v_IdCT2` int(11) DEFAULT NULL,
  `v_IdIMG2` int(11) DEFAULT NULL,
  `v_Nombre2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_IMG2` varchar(150) DEFAULT NULL,
  `v_Puntos2` int(11) DEFAULT NULL,
  `v_IdCT3` int(11) DEFAULT NULL,
  `v_IdIMG3` int(11) DEFAULT NULL,
  `v_Nombre3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_IMG3` varchar(150) DEFAULT NULL,
  `v_Puntos3` int(11) DEFAULT NULL,
  `v_IdCT4` int(11) DEFAULT NULL,
  `v_IdIMG4` int(11) DEFAULT NULL,
  `v_Nombre4` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `v_IMG4` varchar(150) DEFAULT NULL,
  `v_Puntos4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tmp_catalogo
-- ----------------------------
INSERT INTO `tmp_catalogo` VALUES ('18', '104089', 'ARROCERA B&D HC3000', '104089.jpg', '500', '18', '105233', 'MUEBLES PEQUEÑOS', '105233.jpg', '1500', '18', '105975', 'MUEBLES ROJOS', '105975.jpg', '1500', '0', '0', '', '', '0');

-- ----------------------------
-- View structure for view_catalogo_activo
-- ----------------------------
DROP VIEW IF EXISTS `view_catalogo_activo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `view_catalogo_activo` AS SELECT
detallect.IdIMG,
detallect.Nombre,
detallect.IMG,
detallect.Puntos,
catalogo.Descripcion,
catalogo.IdCT
FROM
detallect
RIGHT JOIN catalogo ON detallect.IdCT = catalogo.IdCT
WHERE catalogo.Estado=0 ;

-- ----------------------------
-- Procedure structure for pc_Catalogo
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_Catalogo`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pc_Catalogo`(
  IN CATALOGO int
)
BEGIN
		DECLARE v_IdCT, v_CodImg, v_Puntos 	INT;
		DECLARE v_Nombre VARCHAR(255);
		DECLARE v_Imagen VARCHAR(150);
		
		DECLARE cont, conse INT DEFAULT 1;
		
		DECLARE CSQL VARCHAR(8000) DEFAULT "(";
		DECLARE RELLENO, errores, COMAS INT DEFAULT 0;
		
		DECLARE data_cursor CURSOR FOR 
			SELECT detallect.IdCT, detallect.IdIMG, detallect.Nombre, detallect.IMG, detallect.Puntos
			FROM detallect
			WHERE detallect.IdCT = CATALOGO AND detallect.Estado <> 1
			ORDER BY detallect.IdIMG;
		DECLARE CONTINUE HANDLER FOR NOT FOUND SET errores = 1;

		SELECT COUNT(IdCT) INTO RELLENO FROM detallect WHERE detallect.IdCT = CATALOGO AND detallect.Estado <> 1;
        
        SET COMAS = 4 - (((RELLENO/4) - FLOOR(RELLENO/4)) * 4);
        
        IF COMAS <> 4 THEN
           SET COMAS = RELLENO+1;
        ELSE
            SET COMAS = RELLENO;
        END IF;
        
        IF RELLENO <> 0 THEN
		   OPEN data_cursor;
  
		   read_data: LOOP
				FETCH data_cursor INTO v_IdCT, v_CodImg, v_Nombre, v_Imagen, v_Puntos;
				
				IF errores = 1 THEN
					LEAVE read_data;
				END IF;
                
				SET CSQL = CONCAT(CSQL, v_IdCT, ",", v_CodImg, ",'", v_Nombre, "','", v_Imagen, "',", v_Puntos);
                
				IF cont = 4 THEN
					SET CSQL = CONCAT(CSQL, "),(");
					SET cont = 0;
				ELSEIF conse < COMAS THEN
					SET CSQL = CONCAT(CSQL, ",");
				END IF;
				
				SET cont = cont + 1;
				SET conse = conse + 1;
		    END LOOP read_data;
		    
		    CLOSE data_cursor;
		    		    
		    SET RELLENO = 4 - (((RELLENO/4) - FLOOR(RELLENO/4)) * 4);
		    
		    IF RELLENO = COMAS THEN 
               SET CSQL = CONCAT(CSQL, ",");
            END IF;
		    		        
		    IF RELLENO <> 4 THEN
			   WHILE RELLENO <> 0 DO
				SET CSQL = CONCAT(CSQL, "'0','0','','','0'");
				SET RELLENO = RELLENO - 1;
                
				IF RELLENO <> 0 THEN
					SET CSQL = CONCAT(CSQL, ",");
				END IF;
			 END WHILE;
             
			 SET CSQL = CONCAT(CSQL, ")");
		   ELSE
		     SET CSQL=SUBSTRING(CSQL,1,length(CSQL)-2);
           END IF;
   	       
		   DELETE FROM tmp_Catalogo;
           
		   SET @query = CONCAT("INSERT INTO tmp_Catalogo VALUES", CSQL);
           
		   PREPARE IC FROM @query; 
		   EXECUTE IC; 
		   DEALLOCATE PREPARE IC;
           
		END IF;
END
;;
DELIMITER ;
