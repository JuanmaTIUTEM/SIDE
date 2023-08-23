DELIMITER //

CREATE PROCEDURE sp_insert_data (
    IN p_career_name VARCHAR(200),
    IN p_career_cve VARCHAR(20),
    IN p_group_career_id INT,
    IN p_group_grade INT,
    IN p_group_numGroup INT,
    IN p_group_cve VARCHAR(15),
    IN p_person_name VARCHAR(255),
    IN p_person_lastName VARCHAR(255),
    IN p_person_email VARCHAR(255),
    IN p_user_type_name VARCHAR(20),
    IN p_user_type_desc TEXT,
    IN p_user_txtRfc VARCHAR(50),
    IN p_user_txtPass VARCHAR(50),
    IN p_user_bActive BIT(1),
    IN p_user_cveUser VARCHAR(50),
    IN p_user_departament VARCHAR(50)
)
BEGIN
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
    
END //

DELIMITER ;
