/*
Navicat MySQL Data Transfer

Source Server         : LEMP VBOX
Source Server Version : 50716
Source Host           : localhost:3306
Source Database       : framedev

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-01-01 12:01:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cm_catalogo
-- ----------------------------
DROP TABLE IF EXISTS `cm_catalogo`;
CREATE TABLE `cm_catalogo` (
  `id_cat` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_padre` int(32) unsigned DEFAULT NULL,
  `catalogo` varchar(100) DEFAULT NULL,
  `etiqueta` varchar(100) DEFAULT NULL,
  `activo` varchar(5) DEFAULT NULL,
  `orden` int(32) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cat`),
  KEY `fk_cm_catalogo_cm_catalogo_1` (`id_padre`) USING BTREE,
  CONSTRAINT `fk_cm_catalogo_cm_catalogo_1` FOREIGN KEY (`id_padre`) REFERENCES `cm_catalogo` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of cm_catalogo
-- ----------------------------
INSERT INTO `cm_catalogo` VALUES ('1', null, 'tipo_ubicacion', 'Oficinas Centrales', '1', '1', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:22');
INSERT INTO `cm_catalogo` VALUES ('2', null, 'tipo_ubicacion', 'Base', '1', '2', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('3', null, 'status', 'Activo', '1', '1', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('4', null, 'status', 'Inactivo', '1', '2', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('5', null, 'status', 'Eliminado', '1', '3', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('25', null, 'tiporol', 'Framework', '1', '1', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('26', null, 'tiporol', 'Cliente', '1', '2', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('27', null, 'tiporol', 'Operacion', '1', '3', '', '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:14');
INSERT INTO `cm_catalogo` VALUES ('131', null, 'status', 'Login Fallido', '1', '4', null, '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:41:31');
INSERT INTO `cm_catalogo` VALUES ('132', null, 'pass_chge', 'Requerir cambio de password', '1', '1', null, '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:52:04');
INSERT INTO `cm_catalogo` VALUES ('133', null, 'pass_chge', 'No requerir cambio de password', '1', '1', null, '1', '1', '0000-00-00 00:00:00', '2016-11-16 14:52:40');

-- ----------------------------
-- Table structure for fw_area
-- ----------------------------
DROP TABLE IF EXISTS `fw_area`;
CREATE TABLE `fw_area` (
  `id_area` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_ubicacion` int(32) unsigned DEFAULT NULL,
  `cat_status` int(32) unsigned DEFAULT NULL,
  `area_area` varchar(100) DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_area`),
  KEY `fk_area_ubicacion_1` (`id_ubicacion`) USING BTREE,
  KEY `fk_area_ae_catalogo_1` (`cat_status`) USING BTREE,
  CONSTRAINT `fk_area_ae_catalogo_1` FOREIGN KEY (`cat_status`) REFERENCES `cm_catalogo` (`id_cat`),
  CONSTRAINT `fk_area_ubicacion_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `fw_ubicacion` (`id_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_area
-- ----------------------------

-- ----------------------------
-- Table structure for fw_config
-- ----------------------------
DROP TABLE IF EXISTS `fw_config`;
CREATE TABLE `fw_config` (
  `id_config` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_site` int(32) unsigned DEFAULT NULL,
  `descripcion` varchar(64) DEFAULT NULL,
  `valor` varchar(16) DEFAULT NULL,
  `tmp_val` varchar(16) DEFAULT NULL,
  `data` text,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_config
-- ----------------------------
INSERT INTO `fw_config` VALUES ('1', '1', 'login_permitido', '1', '0', '0', '1', '1', '2016-05-28 21:15:57', '2016-12-21 03:16:08');

-- ----------------------------
-- Table structure for fw_login
-- ----------------------------
DROP TABLE IF EXISTS `fw_login`;
CREATE TABLE `fw_login` (
  `id_login` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(32) unsigned DEFAULT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `open` int(1) DEFAULT NULL,
  `fecha_login` datetime DEFAULT NULL,
  `ultima_verificacion` datetime DEFAULT NULL,
  `fecha_logout` datetime DEFAULT NULL,
  `tiempo_session` varchar(20) DEFAULT NULL,
  `ipv4` varchar(15) DEFAULT NULL,
  `ipv6` varchar(42) DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_login`),
  KEY `fk_fw_login_fw_usuarios_1` (`id_usuario`) USING BTREE,
  CONSTRAINT `fk_fw_login_fw_usuarios_1` FOREIGN KEY (`id_usuario`) REFERENCES `fw_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fw_login
-- ----------------------------
INSERT INTO `fw_login` VALUES ('1', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 21:02:45', '2016-11-17 21:02:55', '2016-11-17 21:02:55', '0000-00-00 00:00:10', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:02:45', '2016-11-17 21:02:55');
INSERT INTO `fw_login` VALUES ('2', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 21:05:16', '2016-11-17 21:05:33', '2016-11-17 21:05:33', '0000-00-00 00:00:17', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:05:16', '2016-11-17 21:05:33');
INSERT INTO `fw_login` VALUES ('3', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 21:06:01', '2016-11-17 21:09:36', '2016-11-17 21:09:36', '0000-00-00 00:03:35', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:06:01', '2016-11-17 21:09:36');
INSERT INTO `fw_login` VALUES ('4', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 21:09:37', '2016-11-17 21:09:49', '2016-11-17 21:09:49', '0000-00-00 00:00:12', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:09:37', '2016-11-17 21:09:49');
INSERT INTO `fw_login` VALUES ('5', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 21:59:11', '2016-11-17 21:59:11', '2016-11-17 21:59:16', '0000-00-00 00:00:05', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:59:11', '2016-11-17 21:59:16');
INSERT INTO `fw_login` VALUES ('6', '1', '1ubu59ne7r14khhktubaasglo4', '0', '2016-11-17 21:59:16', '2016-11-17 21:59:51', '2016-11-17 21:59:51', '0000-00-00 00:00:35', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 21:59:16', '2016-11-17 21:59:51');
INSERT INTO `fw_login` VALUES ('7', '1', 'bbhb57jrfpii6qqrrlhhmfhaf0', '0', '2016-11-17 22:02:05', '2016-11-17 22:07:16', '2016-11-18 14:15:37', '0000-00-00 16:13:32', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-17 22:02:05', '2016-11-18 14:15:37');
INSERT INTO `fw_login` VALUES ('8', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 14:15:38', '2016-11-18 14:15:42', '2016-11-18 14:15:42', '0000-00-00 00:00:04', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 14:15:38', '2016-11-18 14:15:42');
INSERT INTO `fw_login` VALUES ('9', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 14:25:34', '2016-11-18 14:56:03', '2016-11-18 14:56:03', '0000-00-00 00:30:29', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 14:25:34', '2016-11-18 14:56:03');
INSERT INTO `fw_login` VALUES ('10', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 15:11:41', '2016-11-18 15:11:41', '2016-11-18 15:11:41', '0000-00-00 00:00:00', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 15:11:41', '2016-11-18 15:11:41');
INSERT INTO `fw_login` VALUES ('11', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 15:12:11', '2016-11-18 15:25:44', '2016-11-18 15:25:44', '0000-00-00 00:13:33', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 15:12:11', '2016-11-18 15:25:44');
INSERT INTO `fw_login` VALUES ('12', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 15:37:26', '2016-11-18 15:37:34', '2016-11-18 15:37:34', '0000-00-00 00:00:08', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 15:37:26', '2016-11-18 15:37:34');
INSERT INTO `fw_login` VALUES ('13', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 17:45:32', '2016-11-18 17:45:49', '2016-11-18 17:45:49', '0000-00-00 00:00:17', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 17:45:32', '2016-11-18 17:45:49');
INSERT INTO `fw_login` VALUES ('14', '1', 'd1mqk1o42gqjtq3nl2320m9m30', '0', '2016-11-18 19:27:01', '2016-11-18 19:38:33', '2016-11-18 21:09:16', '0000-00-00 01:42:15', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 19:27:01', '2016-11-18 21:09:16');
INSERT INTO `fw_login` VALUES ('15', '1', 'idrja2dlc4h8qt4bra4rn6up15', '0', '2016-11-18 21:09:16', '2016-11-18 21:10:05', '2016-11-18 21:10:05', '0000-00-00 00:00:49', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 21:09:16', '2016-11-18 21:10:05');
INSERT INTO `fw_login` VALUES ('16', '1', 'idrja2dlc4h8qt4bra4rn6up15', '0', '2016-11-18 21:54:50', '2016-11-18 22:13:33', '2016-11-18 22:13:33', '0000-00-00 00:18:43', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-18 21:54:50', '2016-11-18 22:13:33');
INSERT INTO `fw_login` VALUES ('17', '1', '3s3btddf5ffvumcrp8vra58ag4', '0', '2016-11-19 08:16:57', '2016-11-19 08:17:01', '2016-11-19 08:17:01', '0000-00-00 00:00:04', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-19 08:16:57', '2016-11-19 08:17:01');
INSERT INTO `fw_login` VALUES ('18', '1', '3s3btddf5ffvumcrp8vra58ag4', '0', '2016-11-19 09:43:51', '2016-11-19 09:44:10', '2016-11-19 09:44:10', '0000-00-00 00:00:19', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-19 09:43:51', '2016-11-19 09:44:10');
INSERT INTO `fw_login` VALUES ('19', '1', '3s3btddf5ffvumcrp8vra58ag4', '0', '2016-11-19 15:07:12', '2016-11-19 15:08:33', '2016-11-19 15:08:33', '0000-00-00 00:01:21', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-19 15:07:12', '2016-11-19 15:08:33');
INSERT INTO `fw_login` VALUES ('20', '1', 'ohubce2n15re4kghp9ldktae44', '0', '2016-11-19 21:31:38', '2016-11-19 21:42:20', '2016-12-12 11:49:49', '0000-00-22 14:18:11', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-11-19 21:31:38', '2016-12-12 11:49:49');
INSERT INTO `fw_login` VALUES ('21', '1', 'uvfu6firup8414uflmlaqr4aa0', '0', '2016-12-12 11:49:50', '2016-12-12 12:03:14', '2016-12-21 03:15:50', '0000-00-08 15:26:00', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-12-12 11:49:50', '2016-12-21 03:15:50');
INSERT INTO `fw_login` VALUES ('22', '1', '24a343vr9j16736cotr19i2jf6', '0', '2016-12-21 03:15:50', '2016-12-21 03:16:53', '2016-12-21 03:16:53', '0000-00-00 00:01:03', '172.20.8.11', 'ac14::08b::/48', '1', '1', '2016-12-21 03:15:50', '2016-12-21 03:16:53');

-- ----------------------------
-- Table structure for fw_login_log
-- ----------------------------
DROP TABLE IF EXISTS `fw_login_log`;
CREATE TABLE `fw_login_log` (
  `id_login_log` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(32) unsigned DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `intentos` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_login_log`),
  KEY `fk_login_log_usuarios_1` (`id_usuario`) USING BTREE,
  CONSTRAINT `fk_fw_login_log_fw_usuarios_1` FOREIGN KEY (`id_usuario`) REFERENCES `fw_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fw_login_log
-- ----------------------------
INSERT INTO `fw_login_log` VALUES ('1', '1', '172.20.8.11', '2016-11-16 13:20:49', '5');

-- ----------------------------
-- Table structure for fw_lost_password
-- ----------------------------
DROP TABLE IF EXISTS `fw_lost_password`;
CREATE TABLE `fw_lost_password` (
  `id_lost` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(64) DEFAULT NULL,
  `id_usuario` int(32) unsigned DEFAULT NULL,
  `correo` varchar(64) DEFAULT NULL,
  `cat_status` int(32) unsigned DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lost`),
  KEY `fk_lost_password_usuarios_1` (`id_usuario`) USING BTREE,
  KEY `fk_lost_password_ae_catalogo_1` (`cat_status`) USING BTREE,
  CONSTRAINT `fk_lost_password_ae_catalogo_1` FOREIGN KEY (`cat_status`) REFERENCES `cm_catalogo` (`id_cat`),
  CONSTRAINT `fk_lost_password_usuarios_1` FOREIGN KEY (`id_usuario`) REFERENCES `fw_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_lost_password
-- ----------------------------
INSERT INTO `fw_lost_password` VALUES ('12', 'C2lBu4GdUzfgHpmoxKJwWjDF3a519YTSRAXsn0INbMtPEciQ86yvrOqkZheLV7', '1', 'manuelaguado@gmail.com', null, null, null, null, '2016-11-18 22:14:53');

-- ----------------------------
-- Table structure for fw_metodos
-- ----------------------------
DROP TABLE IF EXISTS `fw_metodos`;
CREATE TABLE `fw_metodos` (
  `id_metodo` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `controlador` varchar(255) DEFAULT NULL,
  `metodo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` longtext,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_metodos
-- ----------------------------
INSERT INTO `fw_metodos` VALUES ('1', 'Area', 'index', 'Indice', 'No tiene accion asignada envia a un error 404', '0', '1', '0000-00-00 00:00:00', '2016-11-17 16:50:48');
INSERT INTO `fw_metodos` VALUES ('2', 'Area', 'select_area', 'Seleccionar areas', 'Muestra un combo de seleccion con las areas', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('3', 'Controllers', 'index', 'Indice', 'Muestra la tabla con los metodos que se pueden relacionar a los roles', '0', '1', '0000-00-00 00:00:00', '2016-11-17 20:11:31');
INSERT INTO `fw_metodos` VALUES ('4', 'Controllers', 'obtener_controllers', 'Lista de Controladores', 'Realiza la peticion al modelo para obtener la lista de modelos', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('5', 'Controllers', 'data_controller', 'Modal Metodos', 'Solicita una ventana modal para la edicion de metodos', '0', '1', '0000-00-00 00:00:00', '2016-06-17 18:59:56');
INSERT INTO `fw_metodos` VALUES ('6', 'Controllers', 'editar_metodo', 'Editar Metodo', 'Envia los datos para editar el metodo', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('7', 'Controllers', 'modal_add_metodo', 'Modal Agregar Metodo', 'Solicita una modal para el alta de un nuevo par Controlador - Metodo', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('8', 'Controllers', 'agregar_metodo', 'Agregar Metodo', 'Envia datos para un nuevo par de Controlador - Metodo', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('9', 'Controllers', 'eliminar_par', 'Elimina Metodo', 'Envia la peticion para eliminar el par Controlador - Metodo, eta accion elimina en cascada los identificadores que se ligaron dentro de la tabla permisos', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('10', 'Extensions', 'init', 'Inicializa las extensiones', 'Clase principal que permite inicializar las extensiones', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('11', 'Inicio', 'index', 'Ventana Principal', 'Muestra la ventana principal que se muestra al usuario despues de loguearse', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('12', 'Login', 'salir', 'Salir', 'Sale del sistema, es necesario hacer universal para todos los usuarios', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('13', 'Roles', 'index', 'Indice', 'No tiene accion asignada envia a un error 404', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('14', 'Roles', 'modal_roles', 'Modal Roles', 'Muestra una ventana modal donde se listan los Roles', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('15', 'Roles', 'agregar_rol', 'Inserta Nivel', 'Inserta un nuevo nivel o rol a la lista de roles del sistema', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('16', 'Roles', 'permisos', 'Administracion de permisos', 'Pagina donde se listan todos los permisos para asignarlos a los roles', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('17', 'Roles', 'establecer_permiso', 'Setear permiso', 'Setea el permiso de una actividad en true o false', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('18', 'Roles', 'clonar', 'Clonar roles', 'clona los permisos de un rol a otro para facilitar la creacion de roles basados en uno ya establecido', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('19', 'Ubicacion', 'index', 'Indice', 'No tiene accion asignada envia a un error 404', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('20', 'Ubicacion', 'obtener_ubicaciones', 'Obtiene ubicaciones', 'Obtiene un arreglo con las ubicaciones', '0', '1', '0000-00-00 00:00:00', '2015-10-08 20:13:31');
INSERT INTO `fw_metodos` VALUES ('21', 'Usuarios', 'index', 'Indice', 'Muestra la lista de los usuarios del sistema', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('22', 'Usuarios', 'obtener_usuarios', 'Lista de usuarios', 'Obtiene los datos de todos los usuarios para presentarlos en una lista para su administracion', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('23', 'Usuarios', 'datos_usuario', 'Datos de usuario', 'Obtiene los datos de un usuario en particular para mostrarlo en una ventana modal', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('24', 'Usuarios', 'modal_add_usr', 'Modal agregar usuario', 'Muestra una ventana modal con un formulario para dar de alta un nuevo usuario', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('25', 'Usuarios', 'agregar_usuario', 'Insert Usuario', 'Inserta un nuevo registro para un nuevo usuario', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('26', 'Usuarios', 'editar_usuario', 'Update Usuario', 'Realiza la actualizacion de datos de usuario', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('27', 'Usuarios', 'baja_usuario', 'Update status baja', 'marca a un usuario para su baja ya que no esta permitido en el sistema la eliminacion de usuarios', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('32', 'Usuarios', 'perfil', 'Modificar Perfil', 'Obtiene la vista de edicion del perfil para el usuario actual.', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('33', 'Usuarios', 'editar_perfil', 'Actualiza el perfil', 'Envia la solicitud de actualizacion de perfil al modelo.', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('34', 'Usuarios', 'upload_avatar', 'Subir o cambiar avatar', 'Establece el avatar para el usuario, de manera predeterminada el usuario tiene un avatar generico, que se puede cambiar con esta opcion, tambien establece los permisos para tres funciones estaticas complementarias y relacionadas a esta funcion.', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('35', 'Sidebar', 'obtenerExtensiones', 'Obtener extensiones con controladores y metodos', 'Obtiene un arreglo con las extensiones sus controladores y metodos de acuerdo a los permisos asignados para los usuarios, es necesario para renderear el menu lateral o sidebar, y deberia de estar disponible para todos los usuarios que tienen acceso a las ', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `fw_metodos` VALUES ('106', 'Pdf', 'resguardo_telefonico', 'Resguardo telefónico', 'Permite descargar el formato de resguardo telefónico', '1', null, '2016-03-17 01:50:59', '2016-03-17 08:50:59');
INSERT INTO `fw_metodos` VALUES ('125', 'Usuarios', 'logueados', 'Logueados', 'Muestra los usuarios que tienen una sessión abierta actual', '1', null, '2016-04-13 13:56:42', '2016-04-13 19:56:42');
INSERT INTO `fw_metodos` VALUES ('126', 'Login', 'force_sign_out', 'Forzar Deslogueo del sistema', 'Forza la salida del usuario deslogueandolo del sistema', '1', null, '2016-04-13 18:54:04', '2016-04-14 00:54:04');
INSERT INTO `fw_metodos` VALUES ('128', 'Login', 'force_all_sign_out', 'Forzar el deslogueo glabal', 'Elimina las sesiones de todos los usuarios y provoca una nueva solicitud de logueo', '1', null, '2016-05-09 18:05:18', '2016-05-10 00:05:18');
INSERT INTO `fw_metodos` VALUES ('129', 'Login', 'switch_login_op', 'Deshabilita y habilita el logueo de los peradores', 'Permite permutar entre permitir el logueo y des habilitar el logueo de los operadores', '1', '1', '2016-05-10 02:24:20', '2016-05-28 22:46:48');
INSERT INTO `fw_metodos` VALUES ('137', 'Catalogo', 'index', 'Indice', 'Lista el catalogo de claves ', '1', null, '2016-06-17 18:29:49', '2016-06-17 18:29:49');
INSERT INTO `fw_metodos` VALUES ('138', 'Catalogo', 'editar_catalogo', 'Edita los elementos del catalogo', 'Muestra un a modal que permite la edición de un elemento del catalogo seleccionado', '1', '1', '2016-06-17 18:52:32', '2016-06-17 19:01:26');
INSERT INTO `fw_metodos` VALUES ('139', 'Catalogo', 'eliminar_elemento', 'Eliminar elemento de catalogo', 'Permite eliminar un elemento del catalogo', '1', null, '2016-06-17 23:46:29', '2016-06-17 23:46:29');
INSERT INTO `fw_metodos` VALUES ('140', 'Catalogo', 'add_elemento', 'Agrega un nuevo elemento', 'Agrega un nuevo elemento al catalogo', '1', null, '2016-06-18 00:19:02', '2016-06-18 00:19:02');
INSERT INTO `fw_metodos` VALUES ('141', 'Mobile', 'index', 'Acceso desde el mobil', 'página inicial de acceso desde el móvil', '1', null, '2016-11-14 22:01:13', '2016-11-14 22:01:13');

-- ----------------------------
-- Table structure for fw_nivel
-- ----------------------------
DROP TABLE IF EXISTS `fw_nivel`;
CREATE TABLE `fw_nivel` (
  `id_nivel` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_origen` int(32) unsigned DEFAULT NULL,
  `origen` varchar(255) DEFAULT NULL,
  `nivel` int(2) DEFAULT NULL,
  `n0` int(32) DEFAULT '0',
  `n1` int(32) DEFAULT '0',
  `n2` int(32) DEFAULT '0',
  `n3` int(32) DEFAULT '0',
  `n4` int(32) DEFAULT '0',
  `n5` int(32) DEFAULT '0',
  `n6` int(32) DEFAULT '0',
  `n7` int(32) DEFAULT '0',
  `n8` int(32) DEFAULT '0',
  `n9` int(32) DEFAULT '0',
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_nivel`),
  KEY `fk_nivel_area_1` (`id_origen`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_nivel
-- ----------------------------

-- ----------------------------
-- Table structure for fw_permisos
-- ----------------------------
DROP TABLE IF EXISTS `fw_permisos`;
CREATE TABLE `fw_permisos` (
  `id_permiso` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_metodo` int(32) unsigned DEFAULT NULL,
  `id_rol` int(32) unsigned DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_permiso`),
  KEY `fk_permisos_roles_1` (`id_rol`) USING BTREE,
  KEY `fk_permisos_metodos_1` (`id_metodo`) USING BTREE,
  CONSTRAINT `fk_permisos_metodos_1` FOREIGN KEY (`id_metodo`) REFERENCES `fw_metodos` (`id_metodo`),
  CONSTRAINT `fk_permisos_roles_1` FOREIGN KEY (`id_rol`) REFERENCES `fw_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_permisos
-- ----------------------------
INSERT INTO `fw_permisos` VALUES ('1', '1', '1', '1', null, '2016-11-09 07:27:15', '2016-11-09 07:27:15');
INSERT INTO `fw_permisos` VALUES ('3', '137', '1', '1', null, '2016-11-09 07:27:16', '2016-11-09 07:27:16');
INSERT INTO `fw_permisos` VALUES ('4', '138', '1', '1', null, '2016-11-09 07:27:17', '2016-11-09 07:27:17');
INSERT INTO `fw_permisos` VALUES ('5', '139', '1', '1', null, '2016-11-09 07:27:18', '2016-11-09 07:27:18');
INSERT INTO `fw_permisos` VALUES ('6', '140', '1', '1', null, '2016-11-09 07:27:18', '2016-11-09 07:27:18');
INSERT INTO `fw_permisos` VALUES ('7', '3', '1', '1', null, '2016-11-09 07:27:20', '2016-11-09 07:27:20');
INSERT INTO `fw_permisos` VALUES ('8', '4', '1', '1', null, '2016-11-09 07:27:21', '2016-11-09 07:27:21');
INSERT INTO `fw_permisos` VALUES ('9', '5', '1', '1', null, '2016-11-09 07:27:22', '2016-11-09 07:27:22');
INSERT INTO `fw_permisos` VALUES ('10', '6', '1', '1', null, '2016-11-09 07:27:22', '2016-11-09 07:27:22');
INSERT INTO `fw_permisos` VALUES ('11', '7', '1', '1', null, '2016-11-09 07:27:23', '2016-11-09 07:27:23');
INSERT INTO `fw_permisos` VALUES ('12', '8', '1', '1', null, '2016-11-09 07:27:24', '2016-11-09 07:27:24');
INSERT INTO `fw_permisos` VALUES ('13', '9', '1', '1', null, '2016-11-09 07:27:26', '2016-11-09 07:27:26');
INSERT INTO `fw_permisos` VALUES ('14', '10', '1', '1', null, '2016-11-09 07:27:27', '2016-11-09 07:27:27');
INSERT INTO `fw_permisos` VALUES ('15', '11', '1', '1', null, '2016-11-09 07:27:28', '2016-11-09 07:27:28');
INSERT INTO `fw_permisos` VALUES ('16', '12', '1', '1', null, '2016-11-09 07:27:30', '2016-11-09 07:27:30');
INSERT INTO `fw_permisos` VALUES ('17', '126', '1', '1', null, '2016-11-09 07:27:31', '2016-11-09 07:27:31');
INSERT INTO `fw_permisos` VALUES ('18', '128', '1', '1', null, '2016-11-09 07:27:32', '2016-11-09 07:27:32');
INSERT INTO `fw_permisos` VALUES ('19', '129', '1', '1', null, '2016-11-09 07:27:33', '2016-11-09 07:27:33');
INSERT INTO `fw_permisos` VALUES ('20', '106', '1', '1', null, '2016-11-09 07:27:35', '2016-11-09 07:27:35');
INSERT INTO `fw_permisos` VALUES ('21', '13', '1', '1', null, '2016-11-09 07:27:41', '2016-11-09 07:27:41');
INSERT INTO `fw_permisos` VALUES ('22', '15', '1', '1', null, '2016-11-09 07:27:42', '2016-11-09 07:27:42');
INSERT INTO `fw_permisos` VALUES ('23', '14', '1', '1', null, '2016-11-09 07:27:43', '2016-11-09 07:27:43');
INSERT INTO `fw_permisos` VALUES ('24', '16', '1', '1', null, '2016-11-09 07:27:44', '2016-11-09 07:27:44');
INSERT INTO `fw_permisos` VALUES ('25', '17', '1', '1', null, '2016-11-09 07:27:45', '2016-11-09 07:27:45');
INSERT INTO `fw_permisos` VALUES ('26', '18', '1', '1', null, '2016-11-09 07:27:46', '2016-11-09 07:27:46');
INSERT INTO `fw_permisos` VALUES ('27', '35', '1', '1', null, '2016-11-09 07:27:46', '2016-11-09 07:27:46');
INSERT INTO `fw_permisos` VALUES ('28', '19', '1', '1', null, '2016-11-09 07:27:48', '2016-11-09 07:27:48');
INSERT INTO `fw_permisos` VALUES ('29', '20', '1', '1', null, '2016-11-09 07:27:50', '2016-11-09 07:27:50');
INSERT INTO `fw_permisos` VALUES ('30', '21', '1', '1', null, '2016-11-09 07:27:51', '2016-11-09 07:27:51');
INSERT INTO `fw_permisos` VALUES ('31', '22', '1', '1', null, '2016-11-09 07:27:52', '2016-11-09 07:27:52');
INSERT INTO `fw_permisos` VALUES ('32', '23', '1', '1', null, '2016-11-09 07:27:53', '2016-11-09 07:27:53');
INSERT INTO `fw_permisos` VALUES ('33', '24', '1', '1', null, '2016-11-09 07:27:55', '2016-11-09 07:27:55');
INSERT INTO `fw_permisos` VALUES ('34', '25', '1', '1', null, '2016-11-09 07:27:57', '2016-11-09 07:27:57');
INSERT INTO `fw_permisos` VALUES ('35', '26', '1', '1', null, '2016-11-09 07:28:02', '2016-11-09 07:28:02');
INSERT INTO `fw_permisos` VALUES ('36', '27', '1', '1', null, '2016-11-09 07:28:02', '2016-11-09 07:28:02');
INSERT INTO `fw_permisos` VALUES ('41', '32', '1', '1', null, '2016-11-09 07:28:08', '2016-11-09 07:28:08');
INSERT INTO `fw_permisos` VALUES ('43', '34', '1', '1', null, '2016-11-09 07:28:09', '2016-11-09 07:28:09');
INSERT INTO `fw_permisos` VALUES ('46', '125', '1', '1', null, '2016-11-12 00:36:36', '2016-11-12 00:36:36');
INSERT INTO `fw_permisos` VALUES ('47', '33', '1', '1', null, '2016-11-12 00:44:10', '2016-11-12 00:44:10');
INSERT INTO `fw_permisos` VALUES ('48', '141', '1', '1', null, '2016-11-14 22:01:30', '2016-11-14 22:01:30');
INSERT INTO `fw_permisos` VALUES ('49', '2', '1', '1', null, '2016-12-12 12:01:34', '2016-12-12 12:01:34');

-- ----------------------------
-- Table structure for fw_roles
-- ----------------------------
DROP TABLE IF EXISTS `fw_roles`;
CREATE TABLE `fw_roles` (
  `id_rol` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cat_tiporol` int(32) unsigned DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol`),
  KEY `fk_fw_roles_cm_catalogo_1` (`cat_tiporol`) USING BTREE,
  CONSTRAINT `fk_fw_roles_cm_catalogo_1` FOREIGN KEY (`cat_tiporol`) REFERENCES `cm_catalogo` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_roles
-- ----------------------------
INSERT INTO `fw_roles` VALUES ('1', '25', 'Desarrollador', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for fw_roles_alta
-- ----------------------------
DROP TABLE IF EXISTS `fw_roles_alta`;
CREATE TABLE `fw_roles_alta` (
  `id_rol_alta` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(32) unsigned DEFAULT NULL,
  `access` int(32) unsigned DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rol_alta`),
  KEY `fk_fw_roles_alta_fw_roles_1` (`id_rol`) USING BTREE,
  CONSTRAINT `fk_fw_roles_alta_fw_roles_1` FOREIGN KEY (`id_rol`) REFERENCES `fw_roles` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_roles_alta
-- ----------------------------
INSERT INTO `fw_roles_alta` VALUES ('3', '1', '1', '1', null, '2016-11-16 01:58:54', '2016-11-16 01:58:54');

-- ----------------------------
-- Table structure for fw_ubicacion
-- ----------------------------
DROP TABLE IF EXISTS `fw_ubicacion`;
CREATE TABLE `fw_ubicacion` (
  `id_ubicacion` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion_ubicacion` varchar(100) DEFAULT NULL,
  `direccion` longtext,
  `cat_tipo_ubicacion` int(32) unsigned DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ubicacion`),
  KEY `fk_ubicacion_ae_catalogo_1` (`cat_tipo_ubicacion`) USING BTREE,
  CONSTRAINT `fk_ubicacion_ae_catalogo_1` FOREIGN KEY (`cat_tipo_ubicacion`) REFERENCES `cm_catalogo` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_ubicacion
-- ----------------------------
INSERT INTO `fw_ubicacion` VALUES ('1', 'Oficinas Centrales', 'Direccion', '1', '0', '0', '0000-00-00 00:00:00', '2016-11-09 07:31:50');

-- ----------------------------
-- Table structure for fw_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `fw_usuarios`;
CREATE TABLE `fw_usuarios` (
  `id_usuario` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_area` int(32) unsigned DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `id_rol` int(32) unsigned DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `id_ubicacion` int(32) unsigned DEFAULT NULL,
  `cat_pass_chge` int(32) unsigned DEFAULT NULL,
  `cat_status` int(32) unsigned DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_fw_usuarios_cm_catalogo_1` (`cat_status`) USING BTREE,
  KEY `fk_usuarios_area_1` (`id_area`) USING BTREE,
  KEY `fk_usuarios_roles_1` (`id_rol`) USING BTREE,
  KEY `fk_usuarios_ubicacion_1` (`id_ubicacion`) USING BTREE,
  CONSTRAINT `fk_fw_usuarios_cm_catalogo_1` FOREIGN KEY (`cat_status`) REFERENCES `cm_catalogo` (`id_cat`),
  CONSTRAINT `fk_usuarios_area_1` FOREIGN KEY (`id_area`) REFERENCES `fw_area` (`id_area`),
  CONSTRAINT `fk_usuarios_roles_1` FOREIGN KEY (`id_rol`) REFERENCES `fw_roles` (`id_rol`),
  CONSTRAINT `fk_usuarios_ubicacion_1` FOREIGN KEY (`id_ubicacion`) REFERENCES `fw_ubicacion` (`id_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_usuarios
-- ----------------------------
INSERT INTO `fw_usuarios` VALUES ('1', null, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'framedev@gmail.com', '1', 'Manuel Emiliano', 'Aguado', 'Meza', '1', '133', '3', '1', '1', '0000-00-00 00:00:00', '2016-12-12 12:01:03');

-- ----------------------------
-- Table structure for fw_usuarios_config
-- ----------------------------
DROP TABLE IF EXISTS `fw_usuarios_config`;
CREATE TABLE `fw_usuarios_config` (
  `id_usuario_config` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(32) unsigned DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `paginacion` int(32) DEFAULT NULL,
  `activar_paginado` varchar(5) DEFAULT NULL,
  `aceptar_tyc` varchar(2) DEFAULT 'NO',
  `fecha_ingreso` date DEFAULT NULL,
  `user_alta` int(32) DEFAULT NULL,
  `user_mod` int(32) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `fecha_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario_config`),
  KEY `fk_usuarios_config_usuarios_1` (`id_usuario`) USING BTREE,
  CONSTRAINT `fk_usuarios_config_usuarios_1` FOREIGN KEY (`id_usuario`) REFERENCES `fw_usuarios` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of fw_usuarios_config
-- ----------------------------
INSERT INTO `fw_usuarios_config` VALUES ('1', '1', 'FwTsBn.jpg', '0', '0', 'SI', '0000-00-00', '1', '1', '2016-02-08 13:59:40', '2016-12-12 11:57:04');
SET FOREIGN_KEY_CHECKS=1;
