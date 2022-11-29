use andic;

DELIMITER $$
	CREATE PROCEDURE newUser(
		in name_p varchar(30),
        in app_p varchar(25),
        in apm_p varchar(25),
        in sex char(1),
        in date_p date,
        in mail varchar(60),
        in phone varchar(10),
        in street varchar(60),
        in codep int
    )
    begin
		declare lastID int default 0;
		INSERT INTO persona (nombre,app,apm,sexo,fecha_nac,correo,tel,estado) VALUES (name_p, app_p, apm_p, sex, date_p, mail, phone,1);
		SET lastID = LAST_INSERT_ID();
        IF lastID > 0 then
			INSERT INTO domicilio(id_dom, calle, cp) VALUES (lastID, street, codep);
			INSERT INTO angeles(id_angel,pass,picture,perfil) VALUES (lastID,"AndicAC123",'noImg.png',1);
			commit;
		else
        rollback;
        end if;
    end
$$

DELIMITER $$
	CREATE PROCEDURE newPerson(
		in name_p varchar(30),
        in app_p varchar(25),
        in apm_p varchar(25),
        in sex char(1),
        in date_p date,
        in mail varchar(60),
        in phone varchar(10),
        in street varchar(60),
        in codep int
    )
    begin
		declare lastID int default 0;
		INSERT INTO persona (nombre,app,apm,sexo,fecha_nac,correo,tel,estado) VALUES (name_p, app_p, apm_p, sex, date_p, mail, phone,1);
		SET lastID = LAST_INSERT_ID();
        IF lastID > 0 then
			INSERT INTO domicilio(id_dom, calle, cp) VALUES (lastID, street, codep);
			INSERT INTO angeles(id_angel,pass,picture,perfil) VALUES (lastID,"AndicAC123",'noImg.png',2);
			commit;
		else
        rollback;
        end if;
    end
$$

DELIMITER $$
	CREATE PROCEDURE updatePerson(
		in name_p varchar(30),
        in app_p varchar(25),
        in apm_p varchar(25),
        in sex char(1),
        in date_p date,
        in mail varchar(60),
        in phone varchar(10),
        
        in street varchar(60),
        in codep int,
        
        in person int
    )
    begin
        UPDATE persona SET nombre = name_p, app = app_p, apm = apm_p, sexo = sex, fecha_nac = date_p, correo = mail, tel = phone WHERE id_p = person;
        UPDATE domicilio SET calle = street, cp = codep WHERE id_dom = person;
    end
$$

DELIMITER $$
	CREATE PROCEDURE newInst(
		in clave_i varchar(18),
        in name_i varchar(30),
        in type_i int,
        in jefe varchar(40),
        in rep varchar(40),
        in phone varchar(10),
        in street mediumtext
    )
    begin
		INSERT INTO institucion (clave, nombre_ins, tipo_ins, repre, sub, phone, direc) VALUES (clave_i, name_i, type_i, jefe, rep, phone, street);
    end
$$