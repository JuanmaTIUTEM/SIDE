-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-08-2023 a las 18:34:42
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbside`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addGroup` (IN `in_career` INT, IN `in_cuatri` VARCHAR(50), IN `in_grade` INT, IN `in_group` INT)   BEGIN
	
	DECLARE cveCareer VARCHAR(20);
   DECLARE cveGroup VARCHAR(20);
	SELECT c.careerCve INTO cveCareer FROM catcareers c WHERE c.career_id = in_career;
   SET cveGroup = CONCAT(in_grade,cveCareer,in_group);
	INSERT INTO catgroups (career_id,grade,numGroup,groupCve,cuarter,bActive)
	VALUES (in_career,in_grade,in_group,cveGroup,in_cuatri,b'1');
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `asignarRFC` (IN `in_userId` INT, IN `in_rfc` VARCHAR(20))   BEGIN
	UPDATE catrfcs SET bActive = 0 WHERE user_id = in_userId;
	INSERT INTO catrfcs (user_id,txtRfc,txtRfcPass,feAssigned,bActive)
	VALUES (in_userId,in_rfc,MD5(in_rfc),NOW(),b'1');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `changeStatus` (IN `userID` INT)   BEGIN
	DECLARE st BIT(1);
    
    -- Verificar si existe un registro con el ID proporcionado
    SELECT bActive INTO st FROM catusers WHERE user_id = userID;
    
    -- Si el registro existe y su estado es 0, cambiarlo a 1
    IF st = 0 THEN
        UPDATE catusers SET bActive = 1 WHERE user_id = userID;
    ELSE
        UPDATE catusers SET bActive = 0 WHERE user_id = userID;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `changeStatusG` (IN `groupID` INT)   BEGIN
	DECLARE st BIT(1);
    
    -- Verificar si existe un registro con el ID proporcionado
    SELECT bActive INTO st FROM catgroups  WHERE gropu_id = groupID;
    
    -- Si el registro existe y su estado es 0, cambiarlo a 1
    IF st = 0 THEN
        UPDATE catgroups SET bActive = 1 WHERE gropu_id = groupID;
    ELSE
        UPDATE catgroups SET bActive = 0 WHERE gropu_id = groupID;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `changeStatusR` (IN `in_user_id` INT, IN `in_rfc` VARCHAR(20))   BEGIN 
	SET @ac = (SELECT bActive FROM catrfcs  
	WHERE txtRfc = in_rfc);
	if @ac = 0 then
		SET @actives = (SELECT count(bActive) FROM catrfcs WHERE user_id = in_user_id AND bActive = 1);
		if @actives > 0 then
			UPDATE catrfcs SET bActive = 0 WHERE user_id = in_user_id;
		END if;
			
		UPDATE catrfcs SET bActive = 1 WHERE txtrfc = in_rfc;		
	else
		#UPDATE catrfcs SET bActive = 0 WHERE user_id = in_user_id;
		UPDATE catrfcs SET bActive = 0 WHERE txtrfc = in_rfc;	
		
	END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insNewUser` (IN `in_userType_id` INT, IN `in_career_id` INT, IN `in_departamento` VARCHAR(50), IN `in_group_id` INT, IN `in_personName` VARCHAR(50), IN `in_personLName` VARCHAR(100), IN `in_personEmail` VARCHAR(200), IN `in_userCve` VARCHAR(50))   BEGIN
	DECLARE personid INT;
	INSERT INTO catpersonas (name,lastName,email) VALUES (in_personName,in_personLName,in_personEmail);
	SET personid = LAST_INSERT_ID();
	INSERT INTO catusers (person_id,txtPass,cveUser,userType,career,tgroup,departament,bActive)
	VALUES (personid,md5(in_userCve),in_userCve,in_userType_id,in_career_id,in_group_id,in_departamento,1);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insStatament` (IN `in_txtPeriodicidad` VARCHAR(40), IN `in_txtRFC` VARCHAR(15), IN `in_txtNumCtrl` VARCHAR(10), IN `in_txtEjercicio` VARCHAR(10), IN `in_txtPeriodo` VARCHAR(50), IN `in_txtTipoDeclaracion` VARCHAR(50), IN `in_fecha` DATETIME, IN `in_iSR_1` BOOLEAN, IN `in_iSR_2` BOOLEAN, IN `in_iSR_3` BOOLEAN, IN `in_iVA_1` BOOLEAN, IN `in_iVA_2` BOOLEAN)   BEGIN
	INSERT INTO catstatements(txtPeriodicidad,txtRFC,txtNumCtrl,txtEjercicio,txtPeriodo,txtTipoDeclaracion, isr1, isr2, isr3, iva1, iva2,feCreatedAt,feUpdatedAt)
    VALUES (in_txtPeriodicidad,in_txtRFC,in_txtNumCtrl,in_txtEjercicio,in_txtPeriodo,in_txtTipoDeclaracion,in_iSR_1, in_iSR_2, in_iSR_3, in_iVA_1, in_iVA_2,in_fecha,in_fecha);
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proisrsimp` (IN `fkeIdDeclaracion` INT, IN `in_TotIngresos` VARCHAR(20), IN `in_DescBonif` VARCHAR(20), IN `in_IngresosDisminuir` VARCHAR(20), IN `in_IngresosAdicionales` VARCHAR(20), IN `in_ISRRetenido` VARCHAR(20), IN `in_Subsidio` VARCHAR(20), IN `in_Compensaciones` VARCHAR(20), IN `in_CantidadPagar` VARCHAR(20), IN `in_fecha` DATETIME)   BEGIN
		INSERT INTO `isrsimp`
		(`fk_eIdDeclaracion`, `txtTotIngresos`, `txtDescBonif`, `txtIngresosDisminuir`, `txtIngresosAdicionales`, `txtISRRetenido`, `txtSubsidio`, `txtCompensaciones`, `txtCantidadPagar`, `feCreatedAt`, `feUpdatedAt`) VALUES 
		(fkeIdDeclaracion,in_TotIngresos,in_DescBonif, in_IngresosDisminuir,in_IngresosAdicionales, in_ISRRetenido,in_Subsidio, in_Compensaciones,in_CantidadPagar, in_fecha,in_fecha);	
	END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_data` (IN `p_career_name` VARCHAR(200), IN `p_career_cve` VARCHAR(20), IN `p_group_career_id` INT, IN `p_group_grade` INT, IN `p_group_numGroup` INT, IN `p_group_cve` VARCHAR(15), IN `p_person_name` VARCHAR(255), IN `p_person_lastName` VARCHAR(255), IN `p_person_email` VARCHAR(255), IN `p_user_type_name` VARCHAR(20), IN `p_user_type_desc` TEXT, IN `p_user_txtRfc` VARCHAR(50), IN `p_user_txtPass` VARCHAR(50), IN `p_user_bActive` BIT(1), IN `p_user_cveUser` VARCHAR(50), IN `p_user_departament` VARCHAR(50))   BEGIN
    DECLARE v_career_id INT;
    DECLARE v_group_id INT;
    DECLARE v_person_id INT;
    DECLARE v_user_type_id INT;

    -- Insertar en la tabla catcareers
    INSERT INTO catcareers (careerName, careerCve)
    VALUES (p_career_name, p_career_cve);

    -- Obtener el ID generado
    SET v_career_id = LAST_INSERT_ID();

    -- Insertar en la tabla catgroups
    INSERT INTO catgroups (career_id, grade, numGroup, groupCve)
    VALUES (v_career_id, p_group_grade, p_group_numGroup, p_group_cve);

    -- Obtener el ID generado
    SET v_group_id = LAST_INSERT_ID();

    -- Insertar en la tabla catpersonas
    INSERT INTO catpersonas (name, lastName, email)
    VALUES (p_person_name, p_person_lastName, p_person_email);

    -- Obtener el ID generado
    SET v_person_id = LAST_INSERT_ID();

    -- Insertar en la tabla catusertypes
    INSERT INTO catusertypes (typeName, typeDesc)
    VALUES (p_user_type_name, p_user_type_desc);

    -- Obtener el ID generado
    SET v_user_type_id = LAST_INSERT_ID();

    -- Insertar en la tabla catusers
    INSERT INTO catusers (person_id, txtRfc, txtPass, bActive, cveUser, userType, career, tgroup, departament)
    VALUES (v_person_id, p_user_txtRfc, p_user_txtPass, p_user_bActive, p_user_cveUser, v_user_type_id, v_career_id, v_group_id, p_user_departament);
    
    -- Obtener el ID generado
    SET @user_id = LAST_INSERT_ID();
    
    -- Devolver el ID generado
    SELECT @user_id;
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `allusers`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `allusers` (
`user_id` int
,`person_id` int
,`txtPass` varchar(50)
,`bActive` bit(1)
,`userType` int
,`email` varchar(255)
,`persona_id` int
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcareers`
--

CREATE TABLE `catcareers` (
  `career_id` int NOT NULL,
  `careerName` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `careerCve` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catcareers`
--

INSERT INTO `catcareers` (`career_id`, `careerName`, `careerCve`) VALUES
(1, 'TSU en Contaduría', 'TCN'),
(2, 'Lic. en Contaduría', 'LCN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catgrades`
--

CREATE TABLE `catgrades` (
  `grade_id` int NOT NULL,
  `task_id` int DEFAULT NULL,
  `numCtrl` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catgroups`
--

CREATE TABLE `catgroups` (
  `gropu_id` int NOT NULL,
  `career_id` int DEFAULT NULL,
  `grade` int NOT NULL,
  `numGroup` int NOT NULL,
  `groupCve` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cuarter` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `bActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catgroups`
--

INSERT INTO `catgroups` (`gropu_id`, `career_id`, `grade`, `numGroup`, `groupCve`, `cuarter`, `bActive`) VALUES
(1, 1, 1, 1, '1CNT1', 'SEP-DIC \'23', b'1'),
(2, 1, 4, 1, '4CNT1', 'SEP-DIC \'23', b'1'),
(3, 2, 7, 1, '7LCN1', 'SEP-DIC \'23', b'1'),
(4, 2, 10, 1, '10LCN1', 'SEP-DIC \'23', b'1'),
(5, 1, 3, 2, '3TCN2', 'MAY-AGO 23', b'1'),
(6, 2, 9, 1, '9LCN1', 'MAY-AGO 23', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catpersonas`
--

CREATE TABLE `catpersonas` (
  `persona_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catpersonas`
--

INSERT INTO `catpersonas` (`persona_id`, `name`, `lastName`, `email`) VALUES
(1, 'Administrador', 'Sistema', 'laboratorios_ti@utem.edu.mx'),
(3, 'Juan Manuel', 'Fernández Alvarez', 'manuel-fernandez@utem.edu.mx'),
(4, 'Juan', 'Alvarez', 'iscjuanmafa@gmail.com'),
(5, 'Administrador', 'Sistemas', 'juan-fernandez@utmzo.onmicrosoft.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catrfcs`
--

CREATE TABLE `catrfcs` (
  `rfd_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `txtRfc` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtRfcPass` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `feAssigned` date DEFAULT NULL,
  `bActive` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catrfcs`
--

INSERT INTO `catrfcs` (`rfd_id`, `user_id`, `txtRfc`, `txtRfcPass`, `feAssigned`, `bActive`) VALUES
(1, 3, 'FEAJ850930GV1', 'ffabacd2f340581c11e26cd97ae7ddaa', '2023-05-31', b'1'),
(2, 3, '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', '2023-06-05', b'0'),
(3, 3, '321654', 'd553d148479a268914cecb77b2b88e6a', '2023-06-05', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catstatements`
--

CREATE TABLE `catstatements` (
  `eIdStatement` int NOT NULL,
  `txtPeriodicidad` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtRFC` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtNumCtrl` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtEjercicio` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtPeriodo` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtTipoDeclaracion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `isr1` tinyint(1) NOT NULL DEFAULT '0',
  `isr2` tinyint(1) NOT NULL DEFAULT '0',
  `isr3` tinyint(1) NOT NULL DEFAULT '0',
  `iva1` tinyint(1) NOT NULL DEFAULT '0',
  `iva2` tinyint(1) NOT NULL DEFAULT '0',
  `feCreatedAt` datetime DEFAULT NULL,
  `feUpdatedAt` datetime DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catstatements`
--

INSERT INTO `catstatements` (`eIdStatement`, `txtPeriodicidad`, `txtRFC`, `txtNumCtrl`, `txtEjercicio`, `txtPeriodo`, `txtTipoDeclaracion`, `isr1`, `isr2`, `isr3`, `iva1`, `iva2`, `feCreatedAt`, `feUpdatedAt`, `bActive`) VALUES
(1, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2021', 'Enero-Marzo', 'Normal', 1, 0, 0, 0, 0, '2023-06-28 12:06:00', '2023-06-28 12:06:00', b'1'),
(2, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2020', 'Enero-Marzo', 'Normal', 0, 0, 0, 0, 1, '2023-06-29 11:06:00', '2023-06-29 11:06:00', b'1'),
(3, '1-Mensual', 'FEAJ850930GV1', '20230001', '2020', 'Agosto', 'Normal', 0, 0, 0, 0, 0, '2023-06-29 12:06:00', '2023-06-29 12:06:00', b'1'),
(4, '1-Mensual', 'FEAJ850930GV1', '20230001', '2020', 'Octubre', 'Normal con Corrección Fiscal', 0, 0, 0, 0, 0, '2023-06-30 12:06:00', '2023-06-30 12:06:00', b'1'),
(5, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2021', 'Abril-Junio', 'Normal', 1, 0, 1, 0, 1, '2023-07-03 01:07:00', '2023-07-03 01:07:00', b'1'),
(6, '2-Bimestral', 'FEAJ850930GV1', '20230001', '2023', 'Mayo-Junio', 'Normal', 1, 0, 0, 0, 1, '2023-07-03 01:07:00', '2023-07-03 01:07:00', b'1'),
(7, '9-Sin periodo', 'FEAJ850930GV1', '20230001', '2021', '', 'Normal', 1, 0, 0, 0, 1, '2023-07-04 10:07:00', '2023-07-04 10:07:00', b'1'),
(8, '5-Semestral (A)', 'FEAJ850930GV1', '20230001', '2021', 'Enero-Junio', 'Normal', 1, 0, 0, 0, 1, '2023-07-04 10:07:00', '2023-07-04 10:07:00', b'1'),
(9, '5-Semestral (A)', 'FEAJ850930GV1', '20230001', '2022', 'Enero-Junio', 'Normal', 1, 0, 0, 0, 1, '2023-07-04 02:07:00', '2023-07-04 02:07:00', b'1'),
(10, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2020', '', 'Normal', 1, 0, 0, 0, 1, '2023-07-05 02:07:00', '2023-07-05 02:07:00', b'1'),
(11, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2021', 'Abril-Junio', 'Normal', 1, 0, 0, 0, 1, '2023-07-05 02:07:00', '2023-07-05 02:07:00', b'1'),
(12, '1-Mensual', 'FEAJ850930GV1', '20230001', '2020', 'Febrero', 'Normal', 1, 0, 0, 0, 1, '2023-08-02 09:08:00', '2023-08-02 09:08:00', b'1'),
(13, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2021', 'Enero-Marzo', 'Normal', 1, 0, 0, 0, 0, '2023-08-02 09:08:00', '2023-08-02 09:08:00', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cattasks`
--

CREATE TABLE `cattasks` (
  `task_id` int NOT NULL,
  `txtTitle` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtDescription` text COLLATE utf8mb4_spanish_ci,
  `feEntrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catusers`
--

CREATE TABLE `catusers` (
  `user_id` int NOT NULL,
  `person_id` int DEFAULT NULL,
  `txtPass` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `bActive` bit(1) DEFAULT NULL,
  `cveUser` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `career` int DEFAULT NULL,
  `tgroup` int DEFAULT NULL,
  `departament` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catusers`
--

INSERT INTO `catusers` (`user_id`, `person_id`, `txtPass`, `bActive`, `cveUser`, `userType`, `career`, `tgroup`, `departament`) VALUES
(1, 1, '04d63f34c0f706111fcde593ab7f0a77', b'1', 'ADMIN01', 1, NULL, NULL, NULL),
(2, 3, '5e315235d0bad549068b21c039f424ad', b'1', '0399', 3, 1, NULL, ''),
(3, 4, '4f02676d5e165980c5a21332c1bbc81f', b'1', '20230001', 4, NULL, 1, ''),
(4, 5, 'a9b7ba70783b617e9998dc4dd82eb3c5', b'1', '1000', 1, NULL, NULL, 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catusertypes`
--

CREATE TABLE `catusertypes` (
  `type_id` int NOT NULL,
  `typeName` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `typeDesc` text COLLATE utf8mb4_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catusertypes`
--

INSERT INTO `catusertypes` (`type_id`, `typeName`, `typeDesc`) VALUES
(1, 'Administrador', NULL),
(2, 'Director de Carrera', NULL),
(3, 'Docente', NULL),
(4, 'Alumno', NULL),
(5, 'Administrativo', NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `groupcareer`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `groupcareer` (
`group_id` int
,`groupCve` varchar(15)
,`career_id` int
,`grade` int
,`numGroup` int
,`careerName` varchar(200)
,`careerCve` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isrsimp`
--

CREATE TABLE `isrsimp` (
  `eIdISR1` int NOT NULL,
  `fk_eIdDeclaracion` int DEFAULT NULL,
  `txtTotIngresos` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtDescBonif` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtIngresosDisminuir` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtIngresosAdicionales` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtISRRetenido` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtSubsidio` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtCompensaciones` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `txtCantidadPagar` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `feCreatedAt` datetime DEFAULT NULL,
  `feUpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `isrsimp`
--

INSERT INTO `isrsimp` (`eIdISR1`, `fk_eIdDeclaracion`, `txtTotIngresos`, `txtDescBonif`, `txtIngresosDisminuir`, `txtIngresosAdicionales`, `txtISRRetenido`, `txtSubsidio`, `txtCompensaciones`, `txtCantidadPagar`, `feCreatedAt`, `feUpdatedAt`) VALUES
(1, 9, '54000', '0', '0', '0', '675', '0', '0', '135.00', '2023-07-04 03:07:00', '2023-07-04 03:07:00'),
(2, 9, '54000', '0', '0', '0', '675', '0', '0', '135.00', '2023-07-04 03:07:00', '2023-07-04 03:07:00'),
(3, 13, '54000', '123', '0', '0', '0', '0', '0', '808.15', '2023-08-02 09:08:00', '2023-08-02 09:08:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relteachergroup`
--

CREATE TABLE `relteachergroup` (
  `eIdTG` int NOT NULL,
  `fk_eIdTeacher` int DEFAULT NULL,
  `fk_eIdGroup` int DEFAULT NULL,
  `bActive` bit(1) DEFAULT b'1',
  `feCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `viewgroups`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `viewgroups` (
`Id` int
,`Grado` int
,`Grupo` int
,`Clave_Grupo` varchar(15)
,`Cuatrimestre` varchar(50)
,`career_id` int
,`Carrera` varchar(200)
,`Activo` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwadministrativos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwadministrativos` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`email` varchar(255)
,`cveUser` varchar(50)
,`userType` int
,`departament` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwadmins`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwadmins` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`email` varchar(255)
,`cveUser` varchar(50)
,`userType` int
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwallrfcs`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwallrfcs` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`cveUser` varchar(50)
,`groupCve` varchar(15)
,`feAssigned` date
,`rfd_id` int
,`txtRfc` varchar(20)
,`txtRfcPass` varchar(50)
,`bActive` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwallusers`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwallusers` (
`user_id` int
,`persona_id` int
,`cveUser` varchar(50)
,`personName` varchar(255)
,`personLName` varchar(255)
,`email` varchar(255)
,`departament` varchar(50)
,`career_id` int
,`careerName` varchar(200)
,`userTypeId` int
,`UserType` varchar(20)
,`UserActive` bit(1)
,`gropu_id` int
,`groupCve` varchar(15)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwalumnos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwalumnos` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`email` varchar(255)
,`cveUser` varchar(50)
,`userType` int
,`career` int
,`grade` int
,`numGroup` int
,`groupCve` varchar(15)
,`careerCve` varchar(20)
,`careerName` varchar(200)
,`bActive` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwdeclaraciones`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwdeclaraciones` (
`eIdStatement` int
,`isr1` tinyint(1)
,`isr2` tinyint(1)
,`isr3` tinyint(1)
,`iva1` tinyint(1)
,`iva2` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwdirectores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwdirectores` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`email` varchar(255)
,`cveUser` varchar(50)
,`userType` int
,`career` int
,`group` int
,`careerName` varchar(200)
,`careerCve` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwdocentes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwdocentes` (
`persona_id` int
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
,`email` varchar(255)
,`cveUser` varchar(50)
,`userType` int
,`career` int
,`careerName` varchar(200)
,`careerCve` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwgroup`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwgroup` (
`gropu_id` int
,`grade` int
,`numGroup` int
,`groupCve` varchar(15)
,`career_id` int
,`careerName` varchar(200)
,`careerCve` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwteachergroup`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwteachergroup` (
`eIdTG` int
,`bActive` bit(1)
,`gropu_id` int
,`grade` int
,`numGroup` int
,`groupCve` varchar(15)
,`career_id` int
,`careerName` varchar(200)
,`careerCve` varchar(20)
,`user_id` int
,`name` varchar(255)
,`lastName` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vwusertypes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwusertypes` (
`id` int
,`uType` varchar(20)
,`tDesc` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `allusers`
--
DROP TABLE IF EXISTS `allusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `allusers`  AS SELECT `u`.`user_id` AS `user_id`, `u`.`person_id` AS `person_id`, `u`.`txtPass` AS `txtPass`, `u`.`bActive` AS `bActive`, `u`.`userType` AS `userType`, `p`.`email` AS `email`, `p`.`persona_id` AS `persona_id` FROM (`catusers` `u` join `catpersonas` `p` on((`u`.`person_id` = `p`.`persona_id`))) WHERE (`u`.`bActive` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `groupcareer`
--
DROP TABLE IF EXISTS `groupcareer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `groupcareer`  AS SELECT `g`.`gropu_id` AS `group_id`, `g`.`groupCve` AS `groupCve`, `c`.`career_id` AS `career_id`, `g`.`grade` AS `grade`, `g`.`numGroup` AS `numGroup`, `c`.`careerName` AS `careerName`, `c`.`careerCve` AS `careerCve` FROM (`catgroups` `g` join `catcareers` `c` on((`g`.`career_id` = `c`.`career_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `viewgroups`
--
DROP TABLE IF EXISTS `viewgroups`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewgroups`  AS SELECT `g`.`gropu_id` AS `Id`, `g`.`grade` AS `Grado`, `g`.`numGroup` AS `Grupo`, `g`.`groupCve` AS `Clave_Grupo`, `g`.`cuarter` AS `Cuatrimestre`, `c`.`career_id` AS `career_id`, `c`.`careerName` AS `Carrera`, `g`.`bActive` AS `Activo` FROM (`catgroups` `g` join `catcareers` `c` on((`g`.`career_id` = `c`.`career_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwadministrativos`
--
DROP TABLE IF EXISTS `vwadministrativos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `vwadministrativos`  AS SELECT `p`.`persona_id` AS `persona_id`, `u`.`user_id` AS `user_id`, `p`.`name` AS `name`, `p`.`lastName` AS `lastName`, `p`.`email` AS `email`, `u`.`cveUser` AS `cveUser`, `u`.`userType` AS `userType`, `u`.`departament` AS `departament` FROM ((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) WHERE (`u`.`userType` = 5) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwadmins`
--
DROP TABLE IF EXISTS `vwadmins`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `vwadmins`  AS SELECT `p`.`persona_id` AS `persona_id`, `u`.`user_id` AS `user_id`, `p`.`name` AS `name`, `p`.`lastName` AS `lastName`, `p`.`email` AS `email`, `u`.`cveUser` AS `cveUser`, `u`.`userType` AS `userType` FROM ((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) WHERE (`u`.`userType` = 1) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwallrfcs`
--
DROP TABLE IF EXISTS `vwallrfcs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwallrfcs`  AS SELECT `a`.`persona_id` AS `persona_id`, `a`.`user_id` AS `user_id`, `a`.`name` AS `name`, `a`.`lastName` AS `lastName`, `a`.`cveUser` AS `cveUser`, `a`.`groupCve` AS `groupCve`, `r`.`feAssigned` AS `feAssigned`, `r`.`rfd_id` AS `rfd_id`, `r`.`txtRfc` AS `txtRfc`, `r`.`txtRfcPass` AS `txtRfcPass`, `r`.`bActive` AS `bActive` FROM (`catrfcs` `r` join `vwalumnos` `a` on((`r`.`user_id` = `a`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwallusers`
--
DROP TABLE IF EXISTS `vwallusers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwallusers`  AS SELECT `u`.`user_id` AS `user_id`, `p`.`persona_id` AS `persona_id`, `u`.`cveUser` AS `cveUser`, `p`.`name` AS `personName`, `p`.`lastName` AS `personLName`, `p`.`email` AS `email`, `u`.`departament` AS `departament`, `c`.`career_id` AS `career_id`, `c`.`careerName` AS `careerName`, `t`.`type_id` AS `userTypeId`, `t`.`typeName` AS `UserType`, `u`.`bActive` AS `UserActive`, `g`.`gropu_id` AS `gropu_id`, `g`.`groupCve` AS `groupCve` FROM ((((`catusers` `u` join `catpersonas` `p` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `t` on((`u`.`userType` = `t`.`type_id`))) left join `catcareers` `c` on((`u`.`career` = `c`.`career_id`))) left join `vwgroup` `g` on((`u`.`tgroup` = `g`.`gropu_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwalumnos`
--
DROP TABLE IF EXISTS `vwalumnos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `vwalumnos`  AS SELECT `p`.`persona_id` AS `persona_id`, `u`.`user_id` AS `user_id`, `p`.`name` AS `name`, `p`.`lastName` AS `lastName`, `p`.`email` AS `email`, `u`.`cveUser` AS `cveUser`, `u`.`userType` AS `userType`, `u`.`career` AS `career`, `g`.`grade` AS `grade`, `g`.`numGroup` AS `numGroup`, `g`.`groupCve` AS `groupCve`, `g`.`careerCve` AS `careerCve`, `g`.`careerName` AS `careerName`, `u`.`bActive` AS `bActive` FROM (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) join `groupcareer` `g` on((`u`.`tgroup` = `g`.`group_id`))) WHERE (`u`.`userType` = 4) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwdeclaraciones`
--
DROP TABLE IF EXISTS `vwdeclaraciones`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdeclaraciones`  AS SELECT `catstatements`.`eIdStatement` AS `eIdStatement`, `catstatements`.`isr1` AS `isr1`, `catstatements`.`isr2` AS `isr2`, `catstatements`.`isr3` AS `isr3`, `catstatements`.`iva1` AS `iva1`, `catstatements`.`iva2` AS `iva2` FROM `catstatements` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwdirectores`
--
DROP TABLE IF EXISTS `vwdirectores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `vwdirectores`  AS SELECT `p`.`persona_id` AS `persona_id`, `u`.`user_id` AS `user_id`, `p`.`name` AS `name`, `p`.`lastName` AS `lastName`, `p`.`email` AS `email`, `u`.`cveUser` AS `cveUser`, `u`.`userType` AS `userType`, `u`.`career` AS `career`, `u`.`tgroup` AS `group`, `c`.`careerName` AS `careerName`, `c`.`careerCve` AS `careerCve` FROM (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) join `catcareers` `c` on((0 <> `c`.`career_id`))) WHERE (`u`.`userType` = 2) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwdocentes`
--
DROP TABLE IF EXISTS `vwdocentes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`adminSiDe`@`localhost` SQL SECURITY DEFINER VIEW `vwdocentes`  AS SELECT `p`.`persona_id` AS `persona_id`, `u`.`user_id` AS `user_id`, `p`.`name` AS `name`, `p`.`lastName` AS `lastName`, `p`.`email` AS `email`, `u`.`cveUser` AS `cveUser`, `u`.`userType` AS `userType`, `u`.`career` AS `career`, `c`.`careerName` AS `careerName`, `c`.`careerCve` AS `careerCve` FROM (((`catpersonas` `p` join `catusers` `u` on((`u`.`person_id` = `p`.`persona_id`))) join `catusertypes` `ut` on((`u`.`userType` = `ut`.`type_id`))) left join `catcareers` `c` on((`u`.`career` = `c`.`career_id`))) WHERE (`u`.`userType` = 3) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwgroup`
--
DROP TABLE IF EXISTS `vwgroup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwgroup`  AS SELECT `g`.`gropu_id` AS `gropu_id`, `g`.`grade` AS `grade`, `g`.`numGroup` AS `numGroup`, `g`.`groupCve` AS `groupCve`, `c`.`career_id` AS `career_id`, `c`.`careerName` AS `careerName`, `c`.`careerCve` AS `careerCve` FROM (`catgroups` `g` join `catcareers` `c` on((`g`.`career_id` = `c`.`career_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwteachergroup`
--
DROP TABLE IF EXISTS `vwteachergroup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwteachergroup`  AS SELECT `r`.`eIdTG` AS `eIdTG`, `r`.`bActive` AS `bActive`, `g`.`gropu_id` AS `gropu_id`, `g`.`grade` AS `grade`, `g`.`numGroup` AS `numGroup`, `g`.`groupCve` AS `groupCve`, `g`.`career_id` AS `career_id`, `g`.`careerName` AS `careerName`, `g`.`careerCve` AS `careerCve`, `t`.`user_id` AS `user_id`, `t`.`name` AS `name`, `t`.`lastName` AS `lastName` FROM ((`relteachergroup` `r` join `vwgroup` `g` on((`r`.`fk_eIdGroup` = `g`.`gropu_id`))) join `vwdocentes` `t` on((`r`.`fk_eIdTeacher` = `t`.`user_id`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vwusertypes`
--
DROP TABLE IF EXISTS `vwusertypes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwusertypes`  AS SELECT `t`.`type_id` AS `id`, `t`.`typeName` AS `uType`, `t`.`typeDesc` AS `tDesc` FROM `catusertypes` AS `t` ORDER BY `t`.`typeName` ASC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catcareers`
--
ALTER TABLE `catcareers`
  ADD PRIMARY KEY (`career_id`);

--
-- Indices de la tabla `catgrades`
--
ALTER TABLE `catgrades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `numCtrl` (`numCtrl`);

--
-- Indices de la tabla `catgroups`
--
ALTER TABLE `catgroups`
  ADD PRIMARY KEY (`gropu_id`),
  ADD KEY `career_id` (`career_id`);

--
-- Indices de la tabla `catpersonas`
--
ALTER TABLE `catpersonas`
  ADD PRIMARY KEY (`persona_id`);

--
-- Indices de la tabla `catrfcs`
--
ALTER TABLE `catrfcs`
  ADD PRIMARY KEY (`rfd_id`);

--
-- Indices de la tabla `catstatements`
--
ALTER TABLE `catstatements`
  ADD PRIMARY KEY (`eIdStatement`);

--
-- Indices de la tabla `cattasks`
--
ALTER TABLE `cattasks`
  ADD PRIMARY KEY (`task_id`);

--
-- Indices de la tabla `catusers`
--
ALTER TABLE `catusers`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `cveUser` (`cveUser`);

--
-- Indices de la tabla `catusertypes`
--
ALTER TABLE `catusertypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Indices de la tabla `isrsimp`
--
ALTER TABLE `isrsimp`
  ADD PRIMARY KEY (`eIdISR1`);

--
-- Indices de la tabla `relteachergroup`
--
ALTER TABLE `relteachergroup`
  ADD PRIMARY KEY (`eIdTG`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catcareers`
--
ALTER TABLE `catcareers`
  MODIFY `career_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `catgrades`
--
ALTER TABLE `catgrades`
  MODIFY `grade_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catgroups`
--
ALTER TABLE `catgroups`
  MODIFY `gropu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `catpersonas`
--
ALTER TABLE `catpersonas`
  MODIFY `persona_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `catrfcs`
--
ALTER TABLE `catrfcs`
  MODIFY `rfd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catstatements`
--
ALTER TABLE `catstatements`
  MODIFY `eIdStatement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cattasks`
--
ALTER TABLE `cattasks`
  MODIFY `task_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catusers`
--
ALTER TABLE `catusers`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `catusertypes`
--
ALTER TABLE `catusertypes`
  MODIFY `type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `isrsimp`
--
ALTER TABLE `isrsimp`
  MODIFY `eIdISR1` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `relteachergroup`
--
ALTER TABLE `relteachergroup`
  MODIFY `eIdTG` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catgroups`
--
ALTER TABLE `catgroups`
  ADD CONSTRAINT `catgroups_ibfk_1` FOREIGN KEY (`career_id`) REFERENCES `catcareers` (`career_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
