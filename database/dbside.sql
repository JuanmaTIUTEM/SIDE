-- Volcando estructura para vista dbside.allusers
DROP VIEW IF EXISTS `allusers`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `allusers` (
	`user_id` INT(10) NOT NULL,
	`person_id` INT(10) NULL,
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`txtPass` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`bActive` BIT(1) NULL,
	`userType` INT(10) NULL,
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`persona_id` INT(10) NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla dbside.catcareers
DROP TABLE IF EXISTS `catcareers`;
CREATE TABLE IF NOT EXISTS `catcareers` (
  `career_id` int NOT NULL AUTO_INCREMENT,
  `careerName` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `careerCve` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`career_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;


DROP TABLE IF EXISTS `catgrades`;
CREATE TABLE IF NOT EXISTS `catgrades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `task_id` int DEFAULT NULL,
  `numCtrl` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`grade_id`),
  KEY `numCtrl` (`numCtrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.catgroups
DROP TABLE IF EXISTS `catgroups`;
CREATE TABLE IF NOT EXISTS `catgroups` (
  `gropu_id` int NOT NULL AUTO_INCREMENT,
  `career_id` int DEFAULT NULL,
  `grade` int NOT NULL,
  `numGroup` int NOT NULL,
  `groupCve` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`gropu_id`),
  KEY `career_id` (`career_id`),
  CONSTRAINT `catgroups_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `catcareers` (`career_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.catpersonas
DROP TABLE IF EXISTS `catpersonas`;
CREATE TABLE IF NOT EXISTS `catpersonas` (
  `persona_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.catrfcs
DROP TABLE IF EXISTS `catrfcs`;
CREATE TABLE IF NOT EXISTS `catrfcs` (
  `rfd_id` int NOT NULL AUTO_INCREMENT,
  `numCtrl` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtRfc` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtRfcPass` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `feAssigned` date DEFAULT NULL,
  PRIMARY KEY (`rfd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.cattasks
DROP TABLE IF EXISTS `cattasks`;
CREATE TABLE IF NOT EXISTS `cattasks` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `txtTitle` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtDescription` text COLLATE utf8mb4_spanish_ci,
  `feEntrega` date DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.catusers
DROP TABLE IF EXISTS `catusers`;
CREATE TABLE IF NOT EXISTS `catusers` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `person_id` int DEFAULT NULL,
  `txtRfc` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `txtPass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `bActive` bit(1) DEFAULT NULL,
  `cveUser` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `career` int DEFAULT NULL,
  `group` int DEFAULT NULL,
  `departament` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `cveUser` (`cveUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla dbside.catusertypes
DROP TABLE IF EXISTS `catusertypes`;
CREATE TABLE IF NOT EXISTS `catusertypes` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `typeName` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `typeDesc` text COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para vista dbside.groupcareer
DROP VIEW IF EXISTS `groupcareer`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `groupcareer` (
	`group_id` INT(10) NOT NULL,
	`career_id` INT(10) NOT NULL,
	`grade` INT(10) NOT NULL,
	`numGroup` INT(10) NOT NULL,
	`careerName` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`careerCve` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.vwadministrativos
DROP VIEW IF EXISTS `vwadministrativos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwadministrativos` (
	`persona_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`lastName` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`cveUser` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`userType` INT(10) NULL,
	`departament` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.vwadmins
DROP VIEW IF EXISTS `vwadmins`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwadmins` (
	`persona_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`lastName` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`cveUser` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`userType` INT(10) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.vwalumnos
DROP VIEW IF EXISTS `vwalumnos`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwalumnos` (
	`persona_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`lastName` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`cveUser` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`userType` INT(10) NULL,
	`career` INT(10) NULL,
	`grade` INT(10) NOT NULL,
	`numGroup` INT(10) NOT NULL,
	`careerCve` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`careerName` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.vwdirectores
DROP VIEW IF EXISTS `vwdirectores`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwdirectores` (
	`persona_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`lastName` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`cveUser` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`userType` INT(10) NULL,
	`career` INT(10) NULL,
	`group` INT(10) NULL,
	`careerName` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`careerCve` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.vwdocentes
DROP VIEW IF EXISTS `vwdocentes`;
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vwdocentes` (
	`persona_id` INT(10) NOT NULL,
	`user_id` INT(10) NOT NULL,
	`name` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`lastName` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`email` VARCHAR(255) NULL COLLATE 'utf8mb4_spanish_ci',
	`txtRfc` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`cveUser` VARCHAR(50) NULL COLLATE 'utf8mb4_spanish_ci',
	`userType` INT(10) NULL,
	`career` INT(10) NULL,
	`group` INT(10) NULL,
	`careerName` VARCHAR(200) NOT NULL COLLATE 'utf8mb4_spanish_ci',
	`careerCve` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_spanish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista dbside.allusers
DROP VIEW IF EXISTS `allusers`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `allusers`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `allusers` AS select `u`.`user_id` AS `user_id`,`u`.`person_id` AS `person_id`,`u`.`txtRfc` AS `txtRfc`,`u`.`txtPass` AS `txtPass`,`u`.`bActive` AS `bActive`,`u`.`userType` AS `userType`,`p`.`email` AS `email`,`p`.`persona_id` AS `persona_id` from (`catusers` `u` join `catpersonas` `p` on((`u`.`person_id` = `p`.`persona_id`))) where (`u`.`bActive` = 1);

-- Volcando estructura para vista dbside.groupcareer
DROP VIEW IF EXISTS `groupcareer`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `groupcareer`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `groupcareer` AS select `g`.`gropu_id` AS `group_id`,`c`.`career_id` AS `career_id`,`g`.`grade` AS `grade`,`g`.`numGroup` AS `numGroup`,`c`.`careerName` AS `careerName`,`c`.`careerCve` AS `careerCve` from (`catgroups` `g` join `catcareers` `c` on((`g`.`career_id` = `c`.`career_id`)));

-- Volcando estructura para vista dbside.vwadministrativos
DROP VIEW IF EXISTS `vwadministrativos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwadministrativos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwadministrativos` AS select `p`.`persona_id` AS `persona_id`,`u`.`user_id` AS `user_id`,`p`.`name` AS `name`,`p`.`lastName` AS `lastName`,`p`.`email` AS `email`,`u`.`txtRfc` AS `txtRfc`,`u`.`cveUser` AS `cveUser`,`u`.`userType` AS `userType`,`u`.`departament` AS `departament` from ((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) where (`u`.`userType` = 5);

-- Volcando estructura para vista dbside.vwadmins
DROP VIEW IF EXISTS `vwadmins`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwadmins`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwadmins` AS select `p`.`persona_id` AS `persona_id`,`u`.`user_id` AS `user_id`,`p`.`name` AS `name`,`p`.`lastName` AS `lastName`,`p`.`email` AS `email`,`u`.`txtRfc` AS `txtRfc`,`u`.`cveUser` AS `cveUser`,`u`.`userType` AS `userType` from ((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) where (`u`.`userType` = 1);

-- Volcando estructura para vista dbside.vwalumnos
DROP VIEW IF EXISTS `vwalumnos`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwalumnos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwalumnos` AS select `p`.`persona_id` AS `persona_id`,`u`.`user_id` AS `user_id`,`p`.`name` AS `name`,`p`.`lastName` AS `lastName`,`p`.`email` AS `email`,`u`.`txtRfc` AS `txtRfc`,`u`.`cveUser` AS `cveUser`,`u`.`userType` AS `userType`,`u`.`career` AS `career`,`g`.`grade` AS `grade`,`g`.`numGroup` AS `numGroup`,`g`.`careerCve` AS `careerCve`,`g`.`careerName` AS `careerName` from (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) join `groupcareer` `g` on((`u`.`group` = `g`.`group_id`))) where (`u`.`userType` = 4);

-- Volcando estructura para vista dbside.vwdirectores
DROP VIEW IF EXISTS `vwdirectores`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwdirectores`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwdirectores` AS select `p`.`persona_id` AS `persona_id`,`u`.`user_id` AS `user_id`,`p`.`name` AS `name`,`p`.`lastName` AS `lastName`,`p`.`email` AS `email`,`u`.`txtRfc` AS `txtRfc`,`u`.`cveUser` AS `cveUser`,`u`.`userType` AS `userType`,`u`.`career` AS `career`,`u`.`group` AS `group`,`c`.`careerName` AS `careerName`,`c`.`careerCve` AS `careerCve` from (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) join `catcareers` `c` on((0 <> `c`.`career_id`))) where (`u`.`userType` = 2);

-- Volcando estructura para vista dbside.vwdocentes
DROP VIEW IF EXISTS `vwdocentes`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vwdocentes`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vwdocentes` AS select `p`.`persona_id` AS `persona_id`,`u`.`user_id` AS `user_id`,`p`.`name` AS `name`,`p`.`lastName` AS `lastName`,`p`.`email` AS `email`,`u`.`txtRfc` AS `txtRfc`,`u`.`cveUser` AS `cveUser`,`u`.`userType` AS `userType`,`u`.`career` AS `career`,`u`.`group` AS `group`,`c`.`careerName` AS `careerName`,`c`.`careerCve` AS `careerCve` from (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) join `catcareers` `c` on((0 <> `c`.`career_id`))) where (`u`.`userType` = 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
