-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-08-2023 a las 08:57:10
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insisr1` (IN `in_fk_eIdDeclaracion` INT, IN `in_flTotalIngresosIsr` DECIMAL(12,2), IN `in_txtCopropiedad` VARCHAR(10), IN `in_flEfectivos` DECIMAL(12,2), IN `in_flDescuentos` DECIMAL(12,2), IN `in_flIngresosDisminuir` DECIMAL(12,2), IN `in_flIngresosAdicionales` DECIMAL(12,2), IN `in_flTotalIngresos_Determinacion` DECIMAL(12,2), IN `in_flBaseGravable` DECIMAL(12,2), IN `in_txtTasaAplicable` VARCHAR(10), IN `in_flImpuestoMensual` DECIMAL(12,2), IN `in_flIsrRetMorales` DECIMAL(12,2), IN `in_flImpuestoCargoIsr` DECIMAL(12,2), IN `in_flCntAcargo` DECIMAL(12,2), IN `in_flTotalContribuciones` DECIMAL(12,2), IN `in_flSubsidio` DECIMAL(12,2), IN `in_flCompensacionesPago` DECIMAL(12,2), IN `in_flompensaciones` DECIMAL(12,2), IN `in_flAplicacionesPago` DECIMAL(12,2), IN `in_flTotalContribucionesPago` DECIMAL(12,2), IN `in_flAplicaciones` DECIMAL(12,2), IN `in_flCantidadCargo` DECIMAL(12,2), IN `in_flCantidadPago` DECIMAL(12,2))   BEGIN

	INSERT INTO `isr_1`( `fk_eIdDeclaracion`,flTotalIngresosIsr, `txtCopropiedad`, `flEfectivos`, `flDescuentos`, `flIngresosDisminuir`, `flIngresosAdicionales`, `flTotalIngresos_Determinacion`, `flBaseGravable`, `txtTasaAplicable`, `flImpuestoMensual`, `flIsrRetMorales`, `flImpuestoCargoIsr`, `flCntAcargo`, `flTotalContribuciones`, `flSubsidio`, `flCompensacionesPago`, `flompensaciones`, `flAplicacionesPago`, `flTotalContribucionesPago`, `flAplicaciones`, `flCantidadCargo`, `flCantidadPago`) VALUES (in_fk_eIdDeclaracion,
in_flTotalIngresosIsr,in_txtCopropiedad,in_flEfectivos,in_flDescuentos,in_flIngresosDisminuir,in_flIngresosAdicionales,in_flTotalIngresos_Determinacion,in_flBaseGravable,in_txtTasaAplicable,in_flImpuestoMensual,in_flIsrRetMorales,in_flImpuestoCargoIsr,in_flCntAcargo,in_flTotalContribuciones,in_flSubsidio,in_flCompensacionesPago,in_flompensaciones,in_flAplicacionesPago,in_flTotalContribucionesPago,in_flAplicaciones,in_flCantidadCargo,in_flCantidadPago);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insiva1` (IN `in_fk_eIdDeclaracion` INT, `in_flActGravadas16` DECIMAL(12,2), `in_flActGravadas_1` DECIMAL(12,2), `in_flActExentas` DECIMAL(12,2), `in_flNoObjeto` DECIMAL(12,2), `in_flIVA16` DECIMAL(12,2), `in_flIVACargo` DECIMAL(12,2), `in_flIVANoCobrado` DECIMAL(12,2), `in_flIVARetenido` DECIMAL(12,2), `in_flIVAPeriodo` DECIMAL(12,2), `in_flIVAPeriodoDesc` DECIMAL(12,2), `in_flCantidadCargo` DECIMAL(12,2), `in_flAcreditamiento` DECIMAL(12,2), `in_flCantidadCargoT` DECIMAL(12,2), `in_flCantidadCargo_F` DECIMAL(12,2), `in_flCantidadCargoF` DECIMAL(12,2), `in_flAcargo2` DECIMAL(12,2), `in_flTotCont2` DECIMAL(12,2), `in_txtComAplicar` VARCHAR(5), `in_flcompensaciones` DECIMAL(12,2), `in_txtEstimulos2` VARCHAR(5), `in_flestimulos` DECIMAL(12,2), `in_flTotAplic2` DECIMAL(12,2), `in_flTotContrib2` DECIMAL(12,2), `in_flTotAplic2_1` DECIMAL(12,2), `in_flCntAcargo` DECIMAL(12,2), `in_flAPagar2` DECIMAL(12,2))   BEGIN
	INSERT INTO iva_1(fk_eIdDeclaracion,flActGravadas16,flActGravadas_1,flActExentas,flNoObjeto,flIVA16,flIVACargo,flIVANoCobrado,flIVARetenido,flIVAPeriodo,flIVAPeriodoDesc,flCantidadCargo,flAcreditamiento,flCantidadCargoT,flCantidadCargo_F,flCantidadCargoF,flAcargo2,flTotCont2,txtComAplicar,flcompensaciones,txtEstimulos2,flestimulos,flTotAplic2,flTotContrib2,flTotAplic2_1,flCntAcargo,flAPagar2)
	values(in_fk_eIdDeclaracion,in_flActGravadas16,in_flActGravadas_1,in_flActExentas,in_flNoObjeto,in_flIVA16,in_flIVACargo,in_flIVANoCobrado,in_flIVARetenido,in_flIVAPeriodo,in_flIVAPeriodoDesc,in_flCantidadCargo,in_flAcreditamiento,in_flCantidadCargoT,in_flCantidadCargo_F,in_flCantidadCargoF,in_flAcargo2,in_flTotCont2,in_txtComAplicar,in_flcompensaciones,in_txtEstimulos2,in_flestimulos,in_flTotAplic2,in_flTotContrib2,in_flTotAplic2_1,in_flCntAcargo,in_flAPagar2);
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
(1, '3-Trimestral', 'FEAJ850930GV1', '20230001', '2023', 'Abril-Junio', 'Normal', 1, 0, 0, 0, 1, '2023-08-23 01:08:00', '2023-08-23 01:08:00', b'1');

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
(3, 4, '05e2b841411d095d8836e21d8f10ee79', b'1', '20230001', 4, NULL, 1, ''),
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
-- Estructura Stand-in para la vista `isrrfcdec`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `isrrfcdec` (
`eIdStatement` int
,`txtRFC` varchar(15)
,`txtNumCtrl` varchar(10)
,`name` varchar(255)
,`lastName` varchar(255)
,`txtPeriodicidad` varchar(40)
,`txtEjercicio` varchar(10)
,`txtPeriodo` varchar(50)
,`txtTipoDeclaracion` varchar(50)
,`isr1` tinyint(1)
,`bActive` bit(1)
,`flTotalIngresosIsr` decimal(12,2)
,`txtCopropiedad` varchar(10)
,`flEfectivos` decimal(12,2)
,`flDescuentos` decimal(12,2)
,`flIngresosDisminuir` decimal(12,2)
,`flIngresosAdicionales` decimal(12,2)
,`flTotalIngresos_Determinacion` decimal(12,2)
,`flBaseGravable` decimal(12,2)
,`txtTasaAplicable` varchar(10)
,`flImpuestoMensual` decimal(12,2)
,`flIsrRetMorales` decimal(12,2)
,`flImpuestoCargoIsr` decimal(12,2)
,`flCntAcargo` decimal(12,2)
,`flTotalContribuciones` decimal(12,2)
,`flSubsidio` decimal(12,2)
,`flCompensacionesPago` decimal(12,2)
,`flompensaciones` decimal(12,2)
,`flAplicacionesPago` decimal(12,2)
,`flTotalContribucionesPago` decimal(12,2)
,`flAplicaciones` decimal(12,2)
,`flCantidadCargo` decimal(12,2)
,`flCantidadPago` decimal(12,2)
,`bIsr1Active` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `isr_1`
--

CREATE TABLE `isr_1` (
  `eIdIsr_1` int NOT NULL,
  `flTotalIngresosIsr` decimal(12,2) NOT NULL DEFAULT '0.00',
  `fk_eIdDeclaracion` int NOT NULL,
  `txtCopropiedad` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT 'NO',
  `flEfectivos` decimal(12,2) DEFAULT '0.00',
  `flDescuentos` decimal(12,2) DEFAULT '0.00',
  `flIngresosDisminuir` decimal(12,2) DEFAULT '0.00',
  `flIngresosAdicionales` decimal(12,2) DEFAULT '0.00',
  `flTotalIngresos_Determinacion` decimal(12,2) DEFAULT '0.00',
  `flBaseGravable` decimal(12,2) DEFAULT '0.00',
  `txtTasaAplicable` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT '0.0%',
  `flImpuestoMensual` decimal(12,2) DEFAULT '0.00',
  `flIsrRetMorales` decimal(12,2) DEFAULT '0.00',
  `flImpuestoCargoIsr` decimal(12,2) DEFAULT '0.00',
  `flCntAcargo` decimal(12,2) DEFAULT '0.00',
  `flTotalContribuciones` decimal(12,2) DEFAULT '0.00',
  `flSubsidio` decimal(12,2) DEFAULT '0.00',
  `flCompensacionesPago` decimal(12,2) DEFAULT '0.00',
  `flompensaciones` decimal(12,2) DEFAULT '0.00',
  `flAplicacionesPago` decimal(12,2) DEFAULT '0.00',
  `flTotalContribucionesPago` decimal(12,2) DEFAULT '0.00',
  `flAplicaciones` decimal(12,2) DEFAULT '0.00',
  `flCantidadCargo` decimal(12,2) DEFAULT '0.00',
  `flCantidadPago` decimal(12,2) DEFAULT '0.00',
  `dtCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `bIsr1Active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `isr_1`
--

INSERT INTO `isr_1` (`eIdIsr_1`, `flTotalIngresosIsr`, `fk_eIdDeclaracion`, `txtCopropiedad`, `flEfectivos`, `flDescuentos`, `flIngresosDisminuir`, `flIngresosAdicionales`, `flTotalIngresos_Determinacion`, `flBaseGravable`, `txtTasaAplicable`, `flImpuestoMensual`, `flIsrRetMorales`, `flImpuestoCargoIsr`, `flCntAcargo`, `flTotalContribuciones`, `flSubsidio`, `flCompensacionesPago`, `flompensaciones`, `flAplicacionesPago`, `flTotalContribucionesPago`, `flAplicaciones`, `flCantidadCargo`, `flCantidadPago`, `dtCreatedAt`, `dtUpdatedAt`, `bIsr1Active`) VALUES
(2, 175000.00, 1, 'No', 175000.00, 1254.00, 2000.00, 0.00, 171746.00, 171746.00, '2.00%', 3434.92, 1520.00, 1914.92, 1914.92, 1914.92, 123.00, 100.00, 100.00, 0.00, 1914.92, 0.00, 1691.92, 1691.92, '2023-08-23 02:22:32', '2023-08-23 02:22:32', b'1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ivarfcdec`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `ivarfcdec` (
`eIdStatement` int
,`txtRFC` varchar(15)
,`txtNumCtrl` varchar(10)
,`txtPeriodicidad` varchar(40)
,`txtEjercicio` varchar(10)
,`txtPeriodo` varchar(50)
,`txtTipoDeclaracion` varchar(50)
,`isr1` tinyint(1)
,`iva1` tinyint(1)
,`bActive` bit(1)
,`flActGravadas16` decimal(12,2)
,`flActGravadas_1` decimal(12,2)
,`flActExentas` decimal(12,2)
,`flNoObjeto` decimal(12,2)
,`flIVA16` decimal(12,2)
,`flIVACargo` decimal(12,2)
,`flIVANoCobrado` decimal(12,2)
,`flIVARetenido` decimal(12,2)
,`flIVAPeriodo` decimal(12,2)
,`flIVAPeriodoDesc` decimal(12,2)
,`flCantidadCargo` decimal(12,2)
,`flAcreditamiento` decimal(12,2)
,`flCantidadCargoT` decimal(12,2)
,`flCantidadCargo_F` decimal(12,2)
,`flCantidadCargoF` decimal(12,2)
,`flAcargo2` decimal(12,2)
,`flTotCont2` decimal(12,2)
,`txtComAplicar` varchar(5)
,`flcompensaciones` decimal(12,2)
,`txtEstimulos2` varchar(5)
,`flestimulos` decimal(12,2)
,`flTotAplic2` decimal(12,2)
,`flTotContrib2` decimal(12,2)
,`flTotAplic2_1` decimal(12,2)
,`flCntAcargo` decimal(12,2)
,`flAPagar2` decimal(12,2)
,`bActiveIva1` bit(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva_1`
--

CREATE TABLE `iva_1` (
  `eIdIva_1` int NOT NULL,
  `fk_eIdDeclaracion` int NOT NULL,
  `flActGravadas16` decimal(12,2) DEFAULT '0.00',
  `flActGravadas_1` decimal(12,2) DEFAULT '0.00',
  `flActExentas` decimal(12,2) DEFAULT '0.00',
  `flNoObjeto` decimal(12,2) DEFAULT '0.00',
  `flIVA16` decimal(12,2) DEFAULT '0.00',
  `flIVACargo` decimal(12,2) DEFAULT '0.00',
  `flIVANoCobrado` decimal(12,2) DEFAULT '0.00',
  `flIVARetenido` decimal(12,2) DEFAULT '0.00',
  `flIVAPeriodo` decimal(12,2) DEFAULT '0.00',
  `flIVAPeriodoDesc` decimal(12,2) DEFAULT '0.00',
  `flCantidadCargo` decimal(12,2) DEFAULT '0.00',
  `flAcreditamiento` decimal(12,2) DEFAULT '0.00',
  `flCantidadCargoT` decimal(12,2) DEFAULT '0.00',
  `flCantidadCargo_F` decimal(12,2) DEFAULT '0.00',
  `flCantidadCargoF` decimal(12,2) DEFAULT '0.00',
  `flAcargo2` decimal(12,2) DEFAULT '0.00',
  `flTotCont2` decimal(12,2) DEFAULT '0.00',
  `txtComAplicar` varchar(5) COLLATE utf8mb4_spanish_ci DEFAULT 'NO',
  `flcompensaciones` decimal(12,2) DEFAULT '0.00',
  `txtEstimulos2` varchar(5) COLLATE utf8mb4_spanish_ci DEFAULT 'NO',
  `flestimulos` decimal(12,2) DEFAULT '0.00',
  `flTotAplic2` decimal(12,2) DEFAULT '0.00',
  `flTotContrib2` decimal(12,2) DEFAULT '0.00',
  `flTotAplic2_1` decimal(12,2) DEFAULT '0.00',
  `flCntAcargo` decimal(12,2) DEFAULT '0.00',
  `flAPagar2` decimal(12,2) DEFAULT '0.00',
  `dtCreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtUpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `bActiveIva1` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
-- Estructura Stand-in para la vista `vwallactivitiesusr`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vwallactivitiesusr` (
`eIdStatement` int
,`feCreatedAt` datetime
,`activeStatement` bit(1)
,`persona_id` int
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
-- Estructura para la vista `isrrfcdec`
--
DROP TABLE IF EXISTS `isrrfcdec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `isrrfcdec`  AS SELECT `d`.`eIdStatement` AS `eIdStatement`, `d`.`txtRFC` AS `txtRFC`, `d`.`txtNumCtrl` AS `txtNumCtrl`, `u`.`name` AS `name`, `u`.`lastName` AS `lastName`, `d`.`txtPeriodicidad` AS `txtPeriodicidad`, `d`.`txtEjercicio` AS `txtEjercicio`, `d`.`txtPeriodo` AS `txtPeriodo`, `d`.`txtTipoDeclaracion` AS `txtTipoDeclaracion`, `d`.`isr1` AS `isr1`, `d`.`bActive` AS `bActive`, `i`.`flTotalIngresosIsr` AS `flTotalIngresosIsr`, `i`.`txtCopropiedad` AS `txtCopropiedad`, `i`.`flEfectivos` AS `flEfectivos`, `i`.`flDescuentos` AS `flDescuentos`, `i`.`flIngresosDisminuir` AS `flIngresosDisminuir`, `i`.`flIngresosAdicionales` AS `flIngresosAdicionales`, `i`.`flTotalIngresos_Determinacion` AS `flTotalIngresos_Determinacion`, `i`.`flBaseGravable` AS `flBaseGravable`, `i`.`txtTasaAplicable` AS `txtTasaAplicable`, `i`.`flImpuestoMensual` AS `flImpuestoMensual`, `i`.`flIsrRetMorales` AS `flIsrRetMorales`, `i`.`flImpuestoCargoIsr` AS `flImpuestoCargoIsr`, `i`.`flCntAcargo` AS `flCntAcargo`, `i`.`flTotalContribuciones` AS `flTotalContribuciones`, `i`.`flSubsidio` AS `flSubsidio`, `i`.`flCompensacionesPago` AS `flCompensacionesPago`, `i`.`flompensaciones` AS `flompensaciones`, `i`.`flAplicacionesPago` AS `flAplicacionesPago`, `i`.`flTotalContribucionesPago` AS `flTotalContribucionesPago`, `i`.`flAplicaciones` AS `flAplicaciones`, `i`.`flCantidadCargo` AS `flCantidadCargo`, `i`.`flCantidadPago` AS `flCantidadPago`, `i`.`bIsr1Active` AS `bIsr1Active` FROM ((`catstatements` `d` join `isr_1` `i` on((`d`.`eIdStatement` = `i`.`fk_eIdDeclaracion`))) join `vwallrfcs` `u` on((`u`.`txtRfc` = `d`.`txtRFC`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `ivarfcdec`
--
DROP TABLE IF EXISTS `ivarfcdec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ivarfcdec`  AS SELECT `d`.`eIdStatement` AS `eIdStatement`, `d`.`txtRFC` AS `txtRFC`, `d`.`txtNumCtrl` AS `txtNumCtrl`, `d`.`txtPeriodicidad` AS `txtPeriodicidad`, `d`.`txtEjercicio` AS `txtEjercicio`, `d`.`txtPeriodo` AS `txtPeriodo`, `d`.`txtTipoDeclaracion` AS `txtTipoDeclaracion`, `d`.`isr1` AS `isr1`, `d`.`iva1` AS `iva1`, `d`.`bActive` AS `bActive`, `i`.`flActGravadas16` AS `flActGravadas16`, `i`.`flActGravadas_1` AS `flActGravadas_1`, `i`.`flActExentas` AS `flActExentas`, `i`.`flNoObjeto` AS `flNoObjeto`, `i`.`flIVA16` AS `flIVA16`, `i`.`flIVACargo` AS `flIVACargo`, `i`.`flIVANoCobrado` AS `flIVANoCobrado`, `i`.`flIVARetenido` AS `flIVARetenido`, `i`.`flIVAPeriodo` AS `flIVAPeriodo`, `i`.`flIVAPeriodoDesc` AS `flIVAPeriodoDesc`, `i`.`flCantidadCargo` AS `flCantidadCargo`, `i`.`flAcreditamiento` AS `flAcreditamiento`, `i`.`flCantidadCargoT` AS `flCantidadCargoT`, `i`.`flCantidadCargo_F` AS `flCantidadCargo_F`, `i`.`flCantidadCargoF` AS `flCantidadCargoF`, `i`.`flAcargo2` AS `flAcargo2`, `i`.`flTotCont2` AS `flTotCont2`, `i`.`txtComAplicar` AS `txtComAplicar`, `i`.`flcompensaciones` AS `flcompensaciones`, `i`.`txtEstimulos2` AS `txtEstimulos2`, `i`.`flestimulos` AS `flestimulos`, `i`.`flTotAplic2` AS `flTotAplic2`, `i`.`flTotContrib2` AS `flTotContrib2`, `i`.`flTotAplic2_1` AS `flTotAplic2_1`, `i`.`flCntAcargo` AS `flCntAcargo`, `i`.`flAPagar2` AS `flAPagar2`, `i`.`bActiveIva1` AS `bActiveIva1` FROM (`catstatements` `d` join `iva_1` `i` on((`d`.`eIdStatement` = `i`.`fk_eIdDeclaracion`))) ;

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
-- Estructura para la vista `vwallactivitiesusr`
--
DROP TABLE IF EXISTS `vwallactivitiesusr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwallactivitiesusr`  AS SELECT `d`.`eIdStatement` AS `eIdStatement`, `d`.`feCreatedAt` AS `feCreatedAt`, `d`.`bActive` AS `activeStatement`, `r`.`persona_id` AS `persona_id`, `r`.`user_id` AS `user_id`, `r`.`name` AS `name`, `r`.`lastName` AS `lastName`, `r`.`cveUser` AS `cveUser`, `r`.`groupCve` AS `groupCve`, `r`.`feAssigned` AS `feAssigned`, `r`.`rfd_id` AS `rfd_id`, `r`.`txtRfc` AS `txtRfc`, `r`.`txtRfcPass` AS `txtRfcPass`, `r`.`bActive` AS `bActive` FROM (`catstatements` `d` join `vwallrfcs` `r` on((`d`.`txtRFC` = `r`.`txtRfc`))) WHERE (`r`.`bActive` = 1) ;

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
-- Indices de la tabla `isr_1`
--
ALTER TABLE `isr_1`
  ADD PRIMARY KEY (`eIdIsr_1`);

--
-- Indices de la tabla `iva_1`
--
ALTER TABLE `iva_1`
  ADD PRIMARY KEY (`eIdIva_1`);

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
  MODIFY `eIdStatement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de la tabla `isr_1`
--
ALTER TABLE `isr_1`
  MODIFY `eIdIsr_1` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `iva_1`
--
ALTER TABLE `iva_1`
  MODIFY `eIdIva_1` int NOT NULL AUTO_INCREMENT;

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
