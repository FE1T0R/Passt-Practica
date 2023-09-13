CREATE DATABASE passt;
USE passt;
DROP TABLE IF EXISTS Usuarios; #terminado
CREATE TABLE Usuarios(
    id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_u VARCHAR(45) NOT NULL,
    apellido_u VARCHAR(45) NOT NULL,
    email_u VARCHAR(255) NOT NULL,
    celular_u VARCHAR(60) NOT NULL,
    usuario_u VARCHAR(60) NOT NULL,
    respuesta1 VARCHAR(60) NOT NULL,
    respuesta2 VARCHAR(60) NOT NULL,
    respuesta3 VARCHAR(60) NOT NULL);


DROP TABLE IF EXISTS Sitios; #terminado
CREATE TABLE Sitios(
    id_sitio INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre_s VARCHAR(45) NOT NULL,
    usuario_s VARCHAR(45),
    email_s VARCHAR(255) NOT NULL,
    password_s VARCHAR(60) NOT NULL,
    id_usuario_s INT,
    fechacreado TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    FOREIGN KEY (id_usuario_s) REFERENCES Usuarios (id_usuario));

DROP TABLE IF EXISTS Repositorios; #terminado
CREATE TABLE Repositorios(
    id_registro INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombreSitio VARCHAR(45) NOT NULL,
    usuarioSitio VARCHAR(45),
    emailSitio VARCHAR(255) NOT NULL,
    passwordSitio VARCHAR(60) NOT NULL,
    fecha TIMESTAMP NOT NULL,
    comentario VARCHAR(255) NOT NULL);


#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS busqueda; #terminado // BUSQUEDA
DELIMITER //
CREATE PROCEDURE busqueda(IN sitioBuscado VARCHAR(45))
BEGIN
   SELECT id_sitio, nombre_s, usuario_s, email_s, password_s, fechacreado from Sitios WHERE nombre_s LIKE (SELECT CONCAT('%',sitioBuscado,'%'));
END //

#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS guardarSitio; #terminado // NUEVO SITIO
DELIMITER //
CREATE PROCEDURE guardarSitio(IN nombreIn VARCHAR(45),IN usuarioIn VARCHAR(45),emailIn VARCHAR(255),passwordIn VARCHAR(60))
BEGIN
   INSERT INTO Sitios (nombre_s, usuario_s, email_s, password_s) VALUES (nombreIn, usuarioIn, emailIn, passwordIn);
END //


#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS consultar; #terminado // CONSULTAR X ID
DELIMITER //
CREATE PROCEDURE consultar(IN idBuscado INT)
BEGIN
   SELECT id_sitio, nombre_s, usuario_s, email_s, password_s, fechacreado FROM Sitios WHERE id_sitio = idBuscado;
END //

#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS consultarGeneral; #terminado // CONSULTAR DE FORMA GENERAL
DELIMITER //
CREATE PROCEDURE consultarGeneral()
BEGIN
   SELECT id_sitio, nombre_s, usuario_s, email_s, password_s, fechacreado FROM Sitios;
END //


#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS editar; #terminado // ACTUALIZAR
DELIMITER //
CREATE PROCEDURE editar(IN nombreIn VARCHAR(45),IN usuarioIn VARCHAR(45),IN emailIn VARCHAR(255),IN passwordIn VARCHAR(60),IN idIn INT)
BEGIN
   UPDATE Sitios SET nombre_s = nombreIn, usuario_s = usuarioIn, email_s = emailIn, password_s = passwordIn WHERE id_sitio = idIn;
END //

#Se crea procedimiento Almacenado
DROP PROCEDURE IF EXISTS eliminar; #terminado // ELIMINAR
DELIMITER //
CREATE PROCEDURE eliminar(IN idIn INT)
BEGIN
   DELETE FROM Sitios WHERE id_sitio = idIn;
END //



#Se crea TRIGGER 
DROP TRIGGER IF EXISTS almacenar; #terminado // ALMACENAR CONTRASEÑAS VIEJAS
DELIMITER //
CREATE TRIGGER almacenar BEFORE UPDATE ON Sitios
FOR EACH ROW
BEGIN
   INSERT INTO Repositorios (nombreSitio,usuarioSitio,emailSitio,passwordSitio,fecha,comentario)
   values (OLD.nombre_s, OLD.usuario_s,OLD.email_s,OLD.password_s,now(),"Sitio Actualizado");
END //
   

#Se crea funcion de codificado
DROP FUNCTION IF EXISTS codificado;
DELIMITER //
CREATE FUNCTION codificado(pass VARCHAR (60))
   RETURNS VARCHAR(255) deterministisc
   BEGIN
   DECLARE a VARCHAR(255);
   SET a = hex(aes_encrypt(pass,'password'));
   RETURN a;
END //


#Se crea funcion de Decodificado
DROP FUNCTION IF EXISTS decodificado;
DELIMITER //
CREATE FUNCTION decodificado(pass VARCHAR(255))
   RETURNS VARCHAR (60) deterministisc
   BEGIN
   DECLARE a VARCHAR(60);
   SET a = aes_decrypt(unhex(pass),'password');

   RETURN a;
END //

INSERT INTO passt.Usuarios (id_usuario,nombre_u,apellido_u,email_u,celular_u,usuario_u,respuesta1,respuesta2,respuesta3) VALUES ('1','Pablo Arturo','Jimenez','pablojimenez@gmail.com','3123123120','Pablito123','firulais','bogotá','1');
INSERT INTO passt.Usuarios (id_usuario,nombre_u,apellido_u,email_u,celular_u,usuario_u,respuesta1,respuesta2,respuesta3) VALUES ('2','Camilo','Rueda','camilorueda123@gmail.com','3013013010','Camilin','Rambo','Medellin','1');
INSERT INTO passt.Usuarios (id_usuario,nombre_u,apellido_u,email_u,celular_u,usuario_u,respuesta1,respuesta2,respuesta3) VALUES ('3','Jenny','Nuñez','jennynunez@gmail.com','3203203201','JennyM','Pintado','Tunja','3');


INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('1', 'Netflix', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('2', 'Facebook', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('3', 'AulaVirtual', '1111111111', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('4', 'Paypal', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('5', 'Disney', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('6', 'Hotmail', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('7', 'Mercado Libre', 'paquito', 'sucorreo@correo.com','hola123','1', '2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('8', 'Biblored', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('9', 'MiClaro', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('10', 'MovistarApp', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('11', 'Disney', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('12', 'Gef', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('13', 'Reebok', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('14', 'ASIS', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('15', 'Youtube', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('16', 'Steam', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('17', 'Tidal', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('18', 'Amazon', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('19', 'W3School', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('20', 'Nvidia', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('21', 'Spotify', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('22', 'Computador Oficina', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('23', 'Sistema Contable', 'paquito', 'sucorreo@correo.com','hola123','2','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('24', 'Seguridad Social', 'paquito', 'sucorreo@correo.com','hola123','3','2023-03-11 12:01:01');
INSERT INTO passt.Sitios (id_sitio, nombre_s, usuario_s, email_s, password_s, id_usuario_s, fechacreado) VALUES ('25', 'EPS Sura', 'paquito', 'sucorreo@correo.com','hola123','1','2023-03-11 12:01:01');














