# MySQL-Front 5.1  (Build 1.5)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: biosoft
# ------------------------------------------------------
# Server version 5.0.45-community-nt-log

#
# Source for table areas
#

CREATE TABLE `areas` (
  `id_area` int(11) NOT NULL auto_increment,
  `nombre_area` varchar(100) NOT NULL,
  `id_centro` int(11) NOT NULL,
  PRIMARY KEY  (`id_area`),
  KEY `id_centro` (`id_centro`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Dumping data for table areas
#
LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;

INSERT INTO `areas` VALUES (1,'Agroindustria',82);
INSERT INTO `areas` VALUES (2,'Ambiental',82);
INSERT INTO `areas` VALUES (3,'Diseño',82);
INSERT INTO `areas` VALUES (4,'Finanzas y Administracion',82);
INSERT INTO `areas` VALUES (5,'Gestion y Comercializacion',82);
INSERT INTO `areas` VALUES (6,'Idiomas',82);
INSERT INTO `areas` VALUES (7,'Materiales Herramientas',82);
INSERT INTO `areas` VALUES (8,'Mecanizacion',82);
INSERT INTO `areas` VALUES (9,'Pecuaria',82);
INSERT INTO `areas` VALUES (10,'Procesamiento,fabricacion y ensamble',82);
INSERT INTO `areas` VALUES (11,'Produccion y Transformacion',82);
INSERT INTO `areas` VALUES (12,'Salud',82);
INSERT INTO `areas` VALUES (13,'Sistemas',82);
INSERT INTO `areas` VALUES (14,'Tecnologias de la informacion',82);
INSERT INTO `areas` VALUES (15,'Ventas y servicios',82);
INSERT INTO `areas` VALUES (16,'asdd',1);
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table autoconsumo
#

CREATE TABLE `autoconsumo` (
  `id_autoconsumo` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `cantidad` varchar(5) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `se_entrega` varchar(100) NOT NULL,
  `aplicacion_en` varchar(200) NOT NULL,
  `actividad_a_realizar` text NOT NULL,
  `autoriza` varchar(100) NOT NULL,
  `recibe` varchar(100) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  `id_cantidad_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY  (`id_autoconsumo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_cantidad_producto` (`id_cantidad_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Dumping data for table autoconsumo
#
LOCK TABLES `autoconsumo` WRITE;
/*!40000 ALTER TABLE `autoconsumo` DISABLE KEYS */;

INSERT INTO `autoconsumo` VALUES (1,'0000-00-00','10','LOMBRINAZA','DANIEL CAMPO','GALLINAS','SE APLICARA PARA UNA MEJOR CALIDAD DE LOS CAMPOS SEMBRADOS','CONSTANZA ROCA','JOSE TOMBE',1,1,1);
INSERT INTO `autoconsumo` VALUES (2,'0000-00-00','20','COMPOSTAJE','CAMILO CAMPO ','CONEJOS','ES PARA LA  MEJORAR LOS PATOS\t','CONSTANZA ROCHA','TATIANA TOMBE',1,2,1);
INSERT INTO `autoconsumo` VALUES (3,'0000-00-00','40','COMPOSTAJE','MARIA TOMBE','CONEJOS ','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','PEDRO PILLIMUE',2,2,1);
INSERT INTO `autoconsumo` VALUES (4,'0000-00-00','30','COMPOSTAJE','JUAN SOLARTE','CABALLOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','FABIAN ERAZO',3,6,1);
INSERT INTO `autoconsumo` VALUES (5,'0000-00-00','23','COMPOSTAJE','MARCOS TOMBE','PATOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','MARIA PEREZ',4,2,1);
INSERT INTO `autoconsumo` VALUES (6,'0000-00-00','80','COMPOSTAJE','PABLO ESCOBAR ','PATOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','OLIVIA VELEZ',4,11,1);
INSERT INTO `autoconsumo` VALUES (7,'0000-00-00','40','COMPOSTAJE','JAVIER CAMPO','CONEJOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R','ROBERTO MARTINES',5,4,1);
INSERT INTO `autoconsumo` VALUES (8,'0000-00-00','80','COMPOSTAJE','MARCOS SOLARTE','CABALLOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','PEDRO ARROYO ',5,9,1);
INSERT INTO `autoconsumo` VALUES (9,'0000-00-00','60','COMPOSTAJE','MARCOS PITO','CABALLOS','ES PARA DAR UNA MAYOR PRODUCCION ','CONSTANZA R.','MARIA PILLIMUE',5,3,1);
INSERT INTO `autoconsumo` VALUES (10,'0000-00-00','87','COMPOSTAJE','JUANA PITO','PATO ','ES PARA DAR UNA MAYOR PRODUCCION ','CONTANZA R.','JUAN TUNUBALA',5,6,1);
/*!40000 ALTER TABLE `autoconsumo` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table cantidad_productos
#

CREATE TABLE `cantidad_productos` (
  `id_cantidad_producto` int(11) NOT NULL auto_increment,
  `cantidad_producto` varchar(4) NOT NULL,
  `fecha` date NOT NULL,
  `id_proceso_productivo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  PRIMARY KEY  (`id_cantidad_producto`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_producto` (`id_producto`),
  KEY `id_proceso_productivo` (`id_proceso_productivo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Dumping data for table cantidad_productos
#
LOCK TABLES `cantidad_productos` WRITE;
/*!40000 ALTER TABLE `cantidad_productos` DISABLE KEYS */;

INSERT INTO `cantidad_productos` VALUES (1,'40','0000-00-00',1,1,5);
INSERT INTO `cantidad_productos` VALUES (2,'30','0000-00-00',1,2,5);
INSERT INTO `cantidad_productos` VALUES (3,'40','0000-00-00',3,5,5);
INSERT INTO `cantidad_productos` VALUES (4,'40','0000-00-00',3,4,5);
INSERT INTO `cantidad_productos` VALUES (5,'10','0000-00-00',3,6,5);
INSERT INTO `cantidad_productos` VALUES (6,'1','0000-00-00',4,7,3);
INSERT INTO `cantidad_productos` VALUES (7,'2','0000-00-00',2,9,3);
INSERT INTO `cantidad_productos` VALUES (8,'1','0000-00-00',2,8,3);
INSERT INTO `cantidad_productos` VALUES (9,'3','0000-00-00',2,10,3);
INSERT INTO `cantidad_productos` VALUES (10,'1','0000-00-00',4,11,3);
INSERT INTO `cantidad_productos` VALUES (11,'40','0000-00-00',1,11,5);
/*!40000 ALTER TABLE `cantidad_productos` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table categoria
#

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL auto_increment,
  `categoria` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Dumping data for table categoria
#
LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;

INSERT INTO `categoria` VALUES (1,'primera');
INSERT INTO `categoria` VALUES (2,'segunda');
INSERT INTO `categoria` VALUES (3,'tercera');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table centro
#

CREATE TABLE `centro` (
  `id_centro` int(11) NOT NULL auto_increment,
  `nombre_centro` varchar(100) NOT NULL,
  `telefono_centro` varchar(20) NOT NULL,
  `direccion_centro` varchar(250) NOT NULL,
  `correo_centro` varchar(100) NOT NULL,
  `id_regional` int(11) NOT NULL,
  PRIMARY KEY  (`id_centro`),
  KEY `id_regional` (`id_regional`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

#
# Dumping data for table centro
#
LOCK TABLES `centro` WRITE;
/*!40000 ALTER TABLE `centro` DISABLE KEYS */;

INSERT INTO `centro` VALUES (1,'CENTRO DE LOS RECURSOS NATURALES RENOVABLES - LA SALADA','(4) 4363892','Medellín, Calle 48 A Nro. 74 - 28','speantioquia@sena.edu.co',1);
INSERT INTO `centro` VALUES (2,'CENTRO INDUSTRIAL Y DE AVIACION','(5)  6537540 Ext 524','Casa del Marqués - Plaza de Aduanas / Ciudad Amurallada','iyepez@sena.edu.co',2);
INSERT INTO `centro` VALUES (3,'CENTRO ATENCION SECTOR AGROPECUARIO','(5)  6537540 Ext 524','Casa del Marqués - Plaza de Aduanas / Ciudad Amurallada','iyepez@sena.edu.co',3);
INSERT INTO `centro` VALUES (4,'CENTRO DE COMERCIO Y SERVICIOS','7404080 Ext. 82751-8','Carrera 9 No. 28-34','mcordobas@sena.edu.co',4);
INSERT INTO `centro` VALUES (5,'CENTRO DE DESARROLLO AGROPECUARIO Y AGROINDUSTRIAL','(6) 8849290 Ext. 624','Carrera 23 Nro. 25 - 32, Edificio Esponsión Piso 3','jagil@sena.edu.co',5);
INSERT INTO `centro` VALUES (6,'CENTRO DE COMERCIO Y SERVICIOS','(2) 8220408 Ext. 220','Calle 4 A Nro. 2 - 80','amunozc@sena.edu.co',6);
INSERT INTO `centro` VALUES (7,'CENTRO AGROINDUSTRIAL Y FORTALECIMIENTO EMPRESARIAL DE CASANARE','(2) 8220408 Ext. 220','Carrera 19 entre calles 14 y 15','amunozc@sena.edu.co',7);
INSERT INTO `centro` VALUES (8,'CENTRO BIOTECNOLOGICO DEL CARIBE','(4) 7838050  Ext. 53','Montería Calles 24 y 27 con Avenida Circunvalar ','amgarciag@sena.edu.co',8);
INSERT INTO `centro` VALUES (9,'CENTRO AMBIENTAL Y ECOTURISTICO DEL NORORIENTE AMAZONICO','(8) 8757104','Carrera 5a. Avenida La Toma','mpavon@sena.edu.co',9);
INSERT INTO `centro` VALUES (10,'CENTRO DE LA INDUSTRIA, LA EMPRESA Y LOS SERVICIOS','(8) 6676697','Villavicencio Kilómetro 1, vía Acacias frente al Centro comercial La Sabana','bgomezp@sena.edu.co',10);
INSERT INTO `centro` VALUES (11,'CENTRO AGROEMPRESARIAL Y DESARROLLO PECUARIO DEL HUILA','4212065 Ext. 53866 -','Av. Ferrocarril No 27-97','mtorralvo@sena.edu.co',11);
INSERT INTO `centro` VALUES (12,'CENTRO DE INDUSTRIA Y SERVICIOS DEL META','5829990  Ext. 72609','Calle 2N Avenida 5 esquina, barrio Pescadero','frsuarez@sena.edu.co',12);
INSERT INTO `centro` VALUES (13,'CENTRO INTERNACIONAL DE PRODUCCION LIMPIA - LOPE','7461417','Armenia el Centro de Comercio y Turismo (Calle 7 No. 18-21 Barrio Galán)','lpachon@sena.edu.co',13);
INSERT INTO `centro` VALUES (14,'CENTRO AGROFORESTAL Y ACUICOLA ARAPAIMA','(6) 3135800','Pereira Carrera 8 26-79','cdelapava@sena.edu.co',14);
INSERT INTO `centro` VALUES (15,'CENTRO ATENCION SECTOR AGROPECUARIO','(7) 6456691','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',15);
INSERT INTO `centro` VALUES (16,'CENTRO DE GESTION AGROEMPRESARIAL DEL ORIENTE','(8) 2700310','Transversal 1 No. 42 - 246','gegarciab@sena.edu.co',16);
INSERT INTO `centro` VALUES (17,'CENTRO DE LA INNOVACION, LA TECNOLOGIA Y LOS SERVICIOS','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',17);
INSERT INTO `centro` VALUES (18,'CENTRO DE INDUSTRIA Y CONSTRUCCION','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',18);
INSERT INTO `centro` VALUES (19,'CENTRO DE COMERCIO Y SERVICIOS','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',19);
INSERT INTO `centro` VALUES (20,'CENTRO DE GESTION Y DESARROLLO AGROINDUSTRIAL DE ARAUCA','(4) 4363906','Medellín, Calle 48 A Nro. 74 - 42','speantioquia@sena.edu.co',20);
INSERT INTO `centro` VALUES (21,'CENTRO DE CALZADO Y MANUFACTURA DE CUERO','(4) 4363893','Medellín, Calle 48 A Nro. 74 - 29','speantioquia@sena.edu.co',21);
INSERT INTO `centro` VALUES (22,'CENTRO DE FORMACION EN DISEÑO, CONFECCION Y MODA','(4) 4363894','Medellín, Calle 48 A Nro. 74 - 30','speantioquia@sena.edu.co',22);
INSERT INTO `centro` VALUES (23,'CENTRO PARA EL DESARROLLO DEL HABITAT Y LA CONSTRUCCION','(4) 4363895','Medellín, Calle 48 A Nro. 74 - 31','speantioquia@sena.edu.co',23);
INSERT INTO `centro` VALUES (24,'CENTRO DE TECNOLOGIA DE LA MANUFACTURA AVANZADA','(4) 4363896','Medellín, Calle 48 A Nro. 74 - 32','speantioquia@sena.edu.co',24);
INSERT INTO `centro` VALUES (25,'CENTRO NACIONAL DE LA MADERA','(4) 4363897','Medellín, Calle 48 A Nro. 74 - 33','speantioquia@sena.edu.co',25);
INSERT INTO `centro` VALUES (26,'CENTRO TECNOLÓGICO DE LA GESTIÓN INDUSTRIAL','(4) 4363898','Medellín, Calle 48 A Nro. 74 - 34','speantioquia@sena.edu.co',26);
INSERT INTO `centro` VALUES (27,'CENTRO AGROECOLOGICO Y EMPRESARIAL','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 70','aangelp@sena.edu.co',27);
INSERT INTO `centro` VALUES (28,'CENTRO DE LA TECNOLOGIA DEL DISEÑO Y LA PRODUCTIVIDAD EMPRESARIAL','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 71','aangelp@sena.edu.co',28);
INSERT INTO `centro` VALUES (29,'CENTRO DE BIOTECNOLOGIA AGROPECUARIA','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 72','aangelp@sena.edu.co',29);
INSERT INTO `centro` VALUES (30,'CENTRO DE DESARROLLO AGROEMPRESARIAL','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 73','aangelp@sena.edu.co',30);
INSERT INTO `centro` VALUES (31,'CENTRO DE TECNOLOGIAS PARA LA CONSTRUCCION Y LA MADERA','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 74','aangelp@sena.edu.co',31);
INSERT INTO `centro` VALUES (32,'CENTRO DE ELECTRICIDAD Y ELECTRONICA','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 75','aangelp@sena.edu.co',32);
INSERT INTO `centro` VALUES (33,'CENTRO DE GESTION INDUSTRIAL','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 76','aangelp@sena.edu.co',1);
INSERT INTO `centro` VALUES (34,'CENTRO DE MANUFACTURA EN TEXTILES Y CUERO','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 77','aangelp@sena.edu.co',2);
INSERT INTO `centro` VALUES (35,'CENTRO DE MECANICA AUTOMOTRIZ Y TRANSPORTE','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 78','aangelp@sena.edu.co',3);
INSERT INTO `centro` VALUES (36,'CENTRO DE COMERCIO Y SERVICIOS','(5)  6537540 Ext 524','Casa del Marqués - Plaza de Aduanas / Ciudad Amurallada','iyepez@sena.edu.co',4);
INSERT INTO `centro` VALUES (37,'CENTRO MINERO','(6) 8849290 Ext. 624','Carrera 23 Nro. 25 - 32, Edificio Esponsión Piso 4',' jagil@sena.edu.co',5);
INSERT INTO `centro` VALUES (38,'CENTRO INDUSTRIAL DE MANTENIMIENTO Y MANUFACTURA','(6) 8849290 Ext. 624','Carrera 23 Nro. 25 - 32, Edificio Esponsión Piso 5','jagil@sena.edu.co',6);
INSERT INTO `centro` VALUES (39,'CENTRO PECUARIO Y AGROEMPRESARIAL','(2) 8220408 Ext. 220','Calle 4 A Nro. 2 - 81','amunozc@sena.edu.co',7);
INSERT INTO `centro` VALUES (40,'CENTRO DE SERVICIOS FINANCIEROS','(5) 7274611','Riohacha, Calle 21 con Carrera 15 Esquina, vía Aeropuerto ','agomezp@misena.edu.co',8);
INSERT INTO `centro` VALUES (41,'CENTRO AGROINDUSTRIAL','(6) 3135801','Pereira Carrera 8 26-80','cdelapava@sena.edu.co',9);
INSERT INTO `centro` VALUES (42,'CENTRO INDUSTRIA, INSTRUMENTACION Y CONTROL DE PROCESOS','(7) 6456692','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',10);
INSERT INTO `centro` VALUES (43,'CENTRO DE COMERCIO Y SERVICIOS','(7) 6456693','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',11);
INSERT INTO `centro` VALUES (44,'CENTRO TURISTICO Y AGROEMPRESARIAL','(8) 2700308','Transversal 1 No. 42 - 244','gegarciab@sena.edu.co',12);
INSERT INTO `centro` VALUES (45,'CENTRO AGROPECUARIO LA GRANJA','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',13);
INSERT INTO `centro` VALUES (46,'CENTRO AGROPECUARIO DE BUGA','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',14);
INSERT INTO `centro` VALUES (47,'CENTRO LATINOAMERICANO DE ESPECIES MENORES','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',15);
INSERT INTO `centro` VALUES (48,'CENTRO NAUTICO PESQUERO DE BUENAVENTURA','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',16);
INSERT INTO `centro` VALUES (49,'CENTRO DE FORMACIÓN PARA EL DESARROLLO RURAL Y MINERO','7461418','Armenia el Centro de Comercio y Turismo (Calle 7 No. 18-21 Barrio Galán)','lpachon@sena.edu.co',17);
INSERT INTO `centro` VALUES (50,'CENTRO DE OPERACION Y MANTENIMIENTO MINERO',' 5756226','Carrera 7 No.12-54 Local 276 y 278','avelascor@sena.edu.co',18);
INSERT INTO `centro` VALUES (51,'CENTRO DE COMERCIO','(4) 4363899','Medellín, Calle 48 A Nro. 74 - 35','speantioquia@sena.edu.co',19);
INSERT INTO `centro` VALUES (52,'CENTRO METALMECANICO','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 79','aangelp@sena.edu.co',20);
INSERT INTO `centro` VALUES (53,'CENTRO NACIONAL COLOMBO ALEMAN','(5)  6537540 Ext 524','Casa del Marqués - Plaza de Aduanas / Ciudad Amurallada','iyepez@sena.edu.co',21);
INSERT INTO `centro` VALUES (54,'CENTRO PARA LA INDUSTRIA PETROQUIMICA','7404080 Ext. 82751-8','Carrera 9 No. 28-36','mcordobas@sena.edu.co',22);
INSERT INTO `centro` VALUES (55,'CENTRO DE GESTION ADMINISTRATIVA Y FORTALECIMIENTO EMPRESARIAL','(6) 8849290 Ext. 624','Carrera 23 Nro. 25 - 32, Edificio Esponsión Piso 6','jagil@sena.edu.co',23);
INSERT INTO `centro` VALUES (56,'CENTRO TECNOLOGICO DE LA AMAZONIA','(2) 8220408 Ext. 220','Calle 4 A Nro. 2 - 82','amunozc@sena.edu.co',24);
INSERT INTO `centro` VALUES (57,'CENTRO PARA EL DESARROLLO TECNOLOGICO DE LA CONSTRUCCION Y LA INDUSTRIA','(6) 3135802','Pereira Carrera 8 26-81','cdelapava@sena.edu.co',25);
INSERT INTO `centro` VALUES (58,'CENTRO DE FORMACION TURISTICA, GENTE DE MAR Y DE SERVICIOS','(7) 6456694','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',26);
INSERT INTO `centro` VALUES (59,'CENTRO AGROEMPRESARIAL Y TURISTICO DE LOS ANDES','(8) 2700309','Transversal 1 No. 42 - 245','gegarciab@sena.edu.co',27);
INSERT INTO `centro` VALUES (60,'CENTRO DE ELECTRICIDAD Y AUTOMATIZACION INDUSTRIAL - CEAI','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',28);
INSERT INTO `centro` VALUES (61,'CENTRO DE SERVICIOS DE SALUD','(4) 4363900','Medellín, Calle 48 A Nro. 74 - 36','speantioquia@sena.edu.co',29);
INSERT INTO `centro` VALUES (62,'CENTRO DE SERVICIOS Y GESTION EMPRESARIAL','(4) 4363901','Medellín, Calle 48 A Nro. 74 - 37','speantioquia@sena.edu.co',30);
INSERT INTO `centro` VALUES (63,'CENTRO DE MATERIALES Y ENSAYOS','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 80','aangelp@sena.edu.co',31);
INSERT INTO `centro` VALUES (64,'CENTRO DE DISEÑO Y METROLOGIA','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 81','aangelp@sena.edu.co',32);
INSERT INTO `centro` VALUES (65,'CENTRO PARA LA INDUSTRIA DE LA COMUNICACION GRAFICA','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 82','aangelp@sena.edu.co',1);
INSERT INTO `centro` VALUES (66,'CENTRO DE GESTION DE MERCADOS, LOGISTICA Y TECNOLOGIAS DE LA INFORMACION','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 83','aangelp@sena.edu.co',2);
INSERT INTO `centro` VALUES (67,'COMPLEJO TECNOLOGICO PARA LA GESTION AGROEMPRESARIAL','(4) 4363902','Medellín, Calle 48 A Nro. 74 - 38','speantioquia@sena.edu.co',3);
INSERT INTO `centro` VALUES (68,'COMPLEJO TECNOLOGICO MINERO AGROEMPRESARIAL','(4) 4363903','Medellín, Calle 48 A Nro. 74 - 39','speantioquia@sena.edu.co',4);
INSERT INTO `centro` VALUES (69,'CENTRO DE LA INNOVACION, LA AGROINDUSTRIA Y EL TURISMO','(4) 4363904','Medellín, Calle 48 A Nro. 74 - 40','speantioquia@sena.edu.co',5);
INSERT INTO `centro` VALUES (70,'COMPLEJO TECNOLOGICO AGROINDUSTRIAL, PECUARIO Y TURISTICO','(4) 4363905','Medellín, Calle 48 A Nro. 74 - 41','speantioquia@sena.edu.co',6);
INSERT INTO `centro` VALUES (71,'CENTRO DE FORMACION DE TALENTO HUMANO EN SALUD','(1) 5461600 Ext. 144','Bogotá D.C. Chapinero, Calle 65 Nro. 11 - 84','aangelp@sena.edu.co',7);
INSERT INTO `centro` VALUES (72,'CENTRO DE RECURSOS NATURALES, INDUSTRIA Y BIODIVERSIDAD','5756227','Carrera 7 No.12-54 Local 276 y 279','avelascor@sena.edu.co',8);
INSERT INTO `centro` VALUES (73,'CENTRO AGROPECUARIO EL PORVENIR','5756228','Carrera 7 No.12-54 Local 276 y 280','avelascor@sena.edu.co',9);
INSERT INTO `centro` VALUES (74,'CENTRO DE COMERCIO, INDUSTRIA Y TURISMO DE CORDOBA','5756229','Carrera 7 No.12-54 Local 276 y 281','avelascor@sena.edu.co',10);
INSERT INTO `centro` VALUES (75,'CENTRO INDUSTRIAL Y DESARROLLO EMPRESARIAL DE SOACHA','5756230','Carrera 7 No.12-54 Local 276 y 282','avelascor@sena.edu.co',11);
INSERT INTO `centro` VALUES (76,'CENTRO DE DESARROLLO AGROINDUSTRIAL Y EMPRESARIAL','5756231','Carrera 7 No.12-54 Local 276 y 283','avelascor@sena.edu.co',12);
INSERT INTO `centro` VALUES (77,'CENTRO AGROEMPRESARIAL Y MINERO','7404080 Ext. 82751-8','Carrera 9 No. 28-35','mcordobas@sena.edu.co',13);
INSERT INTO `centro` VALUES (78,'CENTRO PARA LA FORMACION CAFETERA','(6) 8849290 Ext. 624','Carrera 23 Nro. 25 - 32, Edificio Esponsión Piso 7','jagil@sena.edu.co',14);
INSERT INTO `centro` VALUES (79,'CENTRO DE AUTOMATIZACION INDUSTRIAL','(8) 4374792 Ext. 829','SENA, Kilómetro 3 Vía aeropuerto','ofbonilla@sena.edu.co',15);
INSERT INTO `centro` VALUES (80,'CENTRO AGROINDUSTRIAL Y PESQUERO DE LA COSTA PACIFICA','334545','?Puerto Asís Carrera 23 Nro. 16A-06','mvalenciar@sena.edu.co',16);
INSERT INTO `centro` VALUES (81,'CENTRO DE CONOCIMIENTO PARA LA FORMACION EN PROCESOS INDUSTRIALES Y TECNOLOGICOS','8) 6348311 Ext. 8476','Carrera 19 Nro. 36 - 68','chrojas@sena.edu.co ',17);
INSERT INTO `centro` VALUES (82,'CENTRO AGROPECUARIO','(2) 8220408 Ext. 220','Carrera 19 entre calles 14 y 16','amunozc@sena.edu.co',18);
INSERT INTO `centro` VALUES (83,'CENTRO INDUSTRIAL','(2) 8220408 Ext. 220','Carrera 19 entre calles 14 y 17','amunozc@sena.edu.co',19);
INSERT INTO `centro` VALUES (84,'CENTRO DE COMERCIO Y SERVICIOS','(4) 6723800 Ext. 444','Quibdó Carrera 1 Nro. 28 - 71, Barrio Cristo Rey','dmosquera@sena.edu.co',20);
INSERT INTO `centro` VALUES (85,'CENTRO AGROEMPRESARIAL','(4) 7838050  Ext. 53','Montería Calles 24 y 27 con Avenida Circunvalar ','amgarciag@sena.edu.co',21);
INSERT INTO `centro` VALUES (86,'CENTRO NACIONAL DE HOTELERIA, TURISMO Y ALIMENTOS','(5) 7274612','Riohacha, Calle 21 con Carrera 15 Esquina, vía Aeropuerto ','agomezp@misena.edu.co',22);
INSERT INTO `centro` VALUES (87,'CENTRO INDUSTRIAL Y DE ENERGIAS ALTERNATIVAS','(8) 8757105','Carrera 5a. Avenida La Toma','mpavon@sena.edu.co',23);
INSERT INTO `centro` VALUES (88,'CENTRO AGROEMPRESARIAL Y ACUICOLA','(8) 8757106','Carrera 5a. Avenida La Toma','mpavon@sena.edu.co',24);
INSERT INTO `centro` VALUES (89,'CENTRO DE DESARROLLO, AGROINDUSTRIAL, TURISTICO Y TECNOLOGICO DEL GUAVIARE','(8) 8757107','Carrera 5a. Avenida La Toma','mpavon@sena.edu.co',25);
INSERT INTO `centro` VALUES (90,'CENTRO DE FORMACION AGROINDUSTRIAL','(8) 8757108','Carrera 5a. Avenida La Toma','mpavon@sena.edu.co',26);
INSERT INTO `centro` VALUES (91,'CENTRO DE DESARROLLO AGROEMPRESARIAL Y TURISTICO DEL HUILA','4212065 Ext. 53866 -','Av. Ferrocarril No 27-98','mtorralvo@sena.edu.co',27);
INSERT INTO `centro` VALUES (92,'CENTRO DE GESTION TECNOLOGICA DE SERVICIOS','(8) 5654465   Ext. 8','Puerto Carreño CENTRO DE FORMACION AGROINDUSTRIAL DE LA ORINOQUIA Cra. 10 Nº 15 – 71 Barrio Tamarindo','?mayalap@sena.edu.co',28);
INSERT INTO `centro` VALUES (93,'CENTRO DE PRODUCCION Y TRANSFORMACION AGROINDUSTRIAL DE LA ORINOQUIA','(8) 5654465   Ext. 8','Puerto Carreño CENTRO DE FORMACION AGROINDUSTRIAL DE LA ORINOQUIA Cra. 10 Nº 15 – 71 Barrio Tamarindo','mayalap@sena.edu.co',29);
INSERT INTO `centro` VALUES (94,'CENTRO DE GESTION Y DESARROLLO SOSTENIBLE SURCOLOMBIANO','(8) 6676698','Villavicencio Kilómetro 1, vía Acacias frente al Centro comercial La Sabana','bgomezp@sena.edu.co',30);
INSERT INTO `centro` VALUES (95,'CENTRO DE FORMACIÓN EN ACTIVIDAD FÍSICA Y CULTURA',' 5840010 Ext. 85329','San José del Guaviare, Carrera 24 7-10 Barrio Centro','mpavon@sena.edu.co',31);
INSERT INTO `centro` VALUES (96,'CENTRO ACUICOLA Y AGROINDUSTRIAL DE GAIRA','(2) 7207444 - 720724','Carrera 20 No 17-37 Barrio Centro','jpenac@sena.edu.co',32);
INSERT INTO `centro` VALUES (97,'CENTRO DE LOGISTICA Y PROMOCION ECOTURISTICA DEL MAGDALENA','(2) 7207444 - 720724','Carrera 20 No 17-37 Barrio Centro','jpenac@sena.edu.co',1);
INSERT INTO `centro` VALUES (98,'CENTRO AGROINDUSTRIAL DEL META','(2) 7207444 - 720724','Carrera 20 No 17-37 Barrio Centro','jpenac@sena.edu.co',2);
INSERT INTO `centro` VALUES (99,'CENTRO SUR COLOMBIANO DE LOGISTICA INTERNACIONAL','5829990  Ext. 72610','?Calle 2N Avenida 5 esquina, barrio Pescadero','frsuarez@sena.edu.co',3);
INSERT INTO `centro` VALUES (100,'CENTRO DE LA INDUSTRIA, LA EMPRESA Y LOS SERVICIOS','7461419','Armenia el Centro de Comercio y Turismo (Calle 7 No. 18-21 Barrio Galán)','lpachon@sena.edu.co',4);
INSERT INTO `centro` VALUES (101,'CENTRO DE COMERCIO Y TURISMO','(1) 5123066  Ext. 85','Aveni?da Francisco Newball','mlaverde@sena.edu.co',5);
INSERT INTO `centro` VALUES (102,'CENTRO ATENCION SECTOR AGROPECUARIO','(7) 6456695','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',6);
INSERT INTO `centro` VALUES (103,'CENTRO DE TECNOLOGIAS AGROINDUSTRIALES','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',7);
INSERT INTO `centro` VALUES (104,'CENTRO DE BIOTECNOLOGIA INDUSTRIAL','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',8);
INSERT INTO `centro` VALUES (105,'CENTRO NACIONAL DE ASISTENCIA TECNICA A LA INDUSTRIA - ASTIN','5642223','Mitú av 15 No.6 176 barrio San José','lcardenasv@sena.edu.co',9);
INSERT INTO `centro` VALUES (106,'CENTRO INDUSTRIAL DE MANTENIMIENTO INTEGRAL','(7) 6456696','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',10);
INSERT INTO `centro` VALUES (107,'CENTRO INDUSTRIAL Y DEL DESARROLLO TECNOLOGICO','( 8) 2804015 -(8) 28','Sincelejo Avenida Mariscal Sucre, Calle 25B Nro. 31 - 260, Barrio Boston','mbarrios@sena.edu.co',11);
INSERT INTO `centro` VALUES (108,'CENTRO DE LA CONSTRUCCION','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',12);
INSERT INTO `centro` VALUES (109,'CENTRO DE DISEÑO TECNOLOGICO INDUSTRIAL','6600239 - 6600240 - ','Calle 23N No. 2N-38, Barrio San Vicente','jhpena@sena.edu.co',13);
INSERT INTO `centro` VALUES (110,'CENTRO INDUSTRIAL DEL DISEÑO Y LA MANUFACTURA','(7) 6456697','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',14);
INSERT INTO `centro` VALUES (111,'CENTRO DE COMERCIO Y SERVICIOS','(7) 6456698','Bucaramanga Calle 16 Nro. 27 - 37 Barrio San Alonso','masanchez@sena.edu.co',15);
INSERT INTO `centro` VALUES (112,'CENTRO DE GESTION ADMINISTRATIVA','(8) 5656270','Transversal 6 No. 29A - 55','btello@sena.edu.co',16);
INSERT INTO `centro` VALUES (113,'CENTRO AGROPECUARIO Y DE SERVICIOS AMBIENTALES JIRI - JIRIMO','5642223','Mitú av 15 No.6 176 barrio San José','lcardenasv@sena.edu.co',17);
/*!40000 ALTER TABLE `centro` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table departamento
#

CREATE TABLE `departamento` (
  `id_depto` varchar(10) NOT NULL,
  `nombre_depto` varchar(150) NOT NULL,
  PRIMARY KEY  (`id_depto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table departamento
#
LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;

INSERT INTO `departamento` VALUES ('13','Bolívar');
INSERT INTO `departamento` VALUES ('15','Boyacá');
INSERT INTO `departamento` VALUES ('17','Caldas');
INSERT INTO `departamento` VALUES ('18','Caquetá');
INSERT INTO `departamento` VALUES ('19','Cauca');
INSERT INTO `departamento` VALUES ('20','Cesar');
INSERT INTO `departamento` VALUES ('23','Córdoba');
INSERT INTO `departamento` VALUES ('25','Cundinamarca');
INSERT INTO `departamento` VALUES ('27','Chocó');
INSERT INTO `departamento` VALUES ('41','Huila');
INSERT INTO `departamento` VALUES ('44','La Guajira');
INSERT INTO `departamento` VALUES ('47','Magdalena');
INSERT INTO `departamento` VALUES ('5','Antioquia');
INSERT INTO `departamento` VALUES ('50','Meta');
INSERT INTO `departamento` VALUES ('52','Nariño');
INSERT INTO `departamento` VALUES ('54','Norte de Santander');
INSERT INTO `departamento` VALUES ('63','Quindío');
INSERT INTO `departamento` VALUES ('66','Risaralda');
INSERT INTO `departamento` VALUES ('68','Santander');
INSERT INTO `departamento` VALUES ('70','Sucre');
INSERT INTO `departamento` VALUES ('73','Tolima');
INSERT INTO `departamento` VALUES ('76','Valle del Cauca');
INSERT INTO `departamento` VALUES ('8','Atlántico');
INSERT INTO `departamento` VALUES ('80','Putumayo');
INSERT INTO `departamento` VALUES ('81','Arauca');
INSERT INTO `departamento` VALUES ('85','Casanare');
INSERT INTO `departamento` VALUES ('88','San Andrés y Providencia');
INSERT INTO `departamento` VALUES ('91','Amazonas');
INSERT INTO `departamento` VALUES ('94','Guainía');
INSERT INTO `departamento` VALUES ('95','Guaviare');
INSERT INTO `departamento` VALUES ('97','Vaupés');
INSERT INTO `departamento` VALUES ('99','Vichada');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table estado
#

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL auto_increment,
  `nombre_estado` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Dumping data for table estado
#
LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;

INSERT INTO `estado` VALUES (1,'Cancelado');
INSERT INTO `estado` VALUES (2,'En formacion');
INSERT INTO `estado` VALUES (3,'Induccion');
INSERT INTO `estado` VALUES (4,'Por certificar');
INSERT INTO `estado` VALUES (5,'Retiro voluntario');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table ficha
#

CREATE TABLE `ficha` (
  `codigo_ficha` varchar(20) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY  (`codigo_ficha`),
  KEY `id_area` (`id_area`),
  KEY `id_programa` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table ficha
#
LOCK TABLES `ficha` WRITE;
/*!40000 ALTER TABLE `ficha` DISABLE KEYS */;

INSERT INTO `ficha` VALUES ('1',13,15);
INSERT INTO `ficha` VALUES ('100100',1,1);
INSERT INTO `ficha` VALUES ('100797',2,1);
INSERT INTO `ficha` VALUES ('106179',3,1);
INSERT INTO `ficha` VALUES ('1092033',4,1);
INSERT INTO `ficha` VALUES ('109876',5,1);
INSERT INTO `ficha` VALUES ('1100987',6,1);
INSERT INTO `ficha` VALUES ('110989',7,1);
INSERT INTO `ficha` VALUES ('111098',8,1);
INSERT INTO `ficha` VALUES ('111209',9,1);
INSERT INTO `ficha` VALUES ('111213',10,1);
INSERT INTO `ficha` VALUES ('111232',11,1);
INSERT INTO `ficha` VALUES ('111987',12,1);
INSERT INTO `ficha` VALUES ('112134',13,1);
INSERT INTO `ficha` VALUES ('1135869',14,1);
INSERT INTO `ficha` VALUES ('1142351',15,1);
INSERT INTO `ficha` VALUES ('1145832',16,1);
INSERT INTO `ficha` VALUES ('120212',17,1);
INSERT INTO `ficha` VALUES ('120217',18,1);
INSERT INTO `ficha` VALUES ('120605',19,1);
INSERT INTO `ficha` VALUES ('121303',20,1);
INSERT INTO `ficha` VALUES ('121626',21,1);
INSERT INTO `ficha` VALUES ('122120',22,1);
INSERT INTO `ficha` VALUES ('1223345',23,1);
INSERT INTO `ficha` VALUES ('1234165',24,1);
INSERT INTO `ficha` VALUES ('123444',25,1);
INSERT INTO `ficha` VALUES ('123456',26,1);
INSERT INTO `ficha` VALUES ('123521',27,1);
INSERT INTO `ficha` VALUES ('1263573',28,1);
INSERT INTO `ficha` VALUES ('129384',29,1);
INSERT INTO `ficha` VALUES ('131095',30,1);
INSERT INTO `ficha` VALUES ('135698',31,1);
INSERT INTO `ficha` VALUES ('151421',32,1);
INSERT INTO `ficha` VALUES ('152612',33,1);
INSERT INTO `ficha` VALUES ('1543201',34,1);
INSERT INTO `ficha` VALUES ('154321',35,1);
INSERT INTO `ficha` VALUES ('160315',36,1);
INSERT INTO `ficha` VALUES ('1654032',37,1);
INSERT INTO `ficha` VALUES ('165432',38,1);
INSERT INTO `ficha` VALUES ('1760543',39,1);
INSERT INTO `ficha` VALUES ('176543',40,1);
INSERT INTO `ficha` VALUES ('180009',41,1);
INSERT INTO `ficha` VALUES ('1870654',42,1);
INSERT INTO `ficha` VALUES ('187322',43,1);
INSERT INTO `ficha` VALUES ('187654',44,1);
INSERT INTO `ficha` VALUES ('192655',45,1);
INSERT INTO `ficha` VALUES ('1980765',46,1);
INSERT INTO `ficha` VALUES ('198765',47,1);
INSERT INTO `ficha` VALUES ('2',13,14);
INSERT INTO `ficha` VALUES ('200506',48,1);
INSERT INTO `ficha` VALUES ('206495',49,1);
INSERT INTO `ficha` VALUES ('210987',50,1);
INSERT INTO `ficha` VALUES ('216371',51,1);
INSERT INTO `ficha` VALUES ('2213245',52,1);
INSERT INTO `ficha` VALUES ('222016',53,1);
INSERT INTO `ficha` VALUES ('222432',54,1);
INSERT INTO `ficha` VALUES ('222670',55,1);
INSERT INTO `ficha` VALUES ('223154',56,1);
INSERT INTO `ficha` VALUES ('224898',57,1);
INSERT INTO `ficha` VALUES ('2263542',58,1);
INSERT INTO `ficha` VALUES ('232344',59,1);
INSERT INTO `ficha` VALUES ('23423',13,15);
INSERT INTO `ficha` VALUES ('234555',60,1);
INSERT INTO `ficha` VALUES ('234567',61,1);
INSERT INTO `ficha` VALUES ('235678',62,1);
INSERT INTO `ficha` VALUES ('273648',63,1);
INSERT INTO `ficha` VALUES ('280495',64,1);
INSERT INTO `ficha` VALUES ('294529',65,1);
INSERT INTO `ficha` VALUES ('298500',66,1);
INSERT INTO `ficha` VALUES ('300120',67,1);
INSERT INTO `ficha` VALUES ('309876',68,1);
INSERT INTO `ficha` VALUES ('310535',69,1);
INSERT INTO `ficha` VALUES ('310987',70,1);
INSERT INTO `ficha` VALUES ('311329',71,1);
INSERT INTO `ficha` VALUES ('312829',72,1);
INSERT INTO `ficha` VALUES ('313562',73,1);
INSERT INTO `ficha` VALUES ('314304',74,1);
INSERT INTO `ficha` VALUES ('314869',75,1);
INSERT INTO `ficha` VALUES ('316718',76,1);
INSERT INTO `ficha` VALUES ('316719',77,1);
INSERT INTO `ficha` VALUES ('321098',78,1);
INSERT INTO `ficha` VALUES ('321351',79,1);
INSERT INTO `ficha` VALUES ('322556',80,1);
INSERT INTO `ficha` VALUES ('330987',81,1);
INSERT INTO `ficha` VALUES ('3312343',82,1);
INSERT INTO `ficha` VALUES ('3323264',83,1);
INSERT INTO `ficha` VALUES ('333456',84,1);
INSERT INTO `ficha` VALUES ('3351424',85,1);
INSERT INTO `ficha` VALUES ('337650',86,1);
INSERT INTO `ficha` VALUES ('345109',87,1);
INSERT INTO `ficha` VALUES ('345678',88,1);
INSERT INTO `ficha` VALUES ('355464',89,1);
INSERT INTO `ficha` VALUES ('370206',90,1);
INSERT INTO `ficha` VALUES ('388681',91,1);
INSERT INTO `ficha` VALUES ('400567',92,1);
INSERT INTO `ficha` VALUES ('422880',93,1);
INSERT INTO `ficha` VALUES ('431260',94,1);
INSERT INTO `ficha` VALUES ('4354256',95,1);
INSERT INTO `ficha` VALUES ('440908',96,1);
INSERT INTO `ficha` VALUES ('444543',97,1);
INSERT INTO `ficha` VALUES ('444567',98,1);
INSERT INTO `ficha` VALUES ('4453021',99,1);
INSERT INTO `ficha` VALUES ('445321',100,1);
INSERT INTO `ficha` VALUES ('4456543',101,1);
INSERT INTO `ficha` VALUES ('453215',102,1);
INSERT INTO `ficha` VALUES ('454643',103,1);
INSERT INTO `ficha` VALUES ('456789',104,1);
INSERT INTO `ficha` VALUES ('494024',105,1);
INSERT INTO `ficha` VALUES ('495558',106,1);
INSERT INTO `ficha` VALUES ('554536',107,1);
INSERT INTO `ficha` VALUES ('554653',108,1);
INSERT INTO `ficha` VALUES ('555678',109,1);
INSERT INTO `ficha` VALUES ('556710',110,1);
INSERT INTO `ficha` VALUES ('564643',111,1);
INSERT INTO `ficha` VALUES ('564746',112,1);
INSERT INTO `ficha` VALUES ('567890',113,1);
INSERT INTO `ficha` VALUES ('573206',114,1);
INSERT INTO `ficha` VALUES ('634621',115,1);
INSERT INTO `ficha` VALUES ('643829',116,1);
INSERT INTO `ficha` VALUES ('656458',117,1);
INSERT INTO `ficha` VALUES ('663574',118,1);
INSERT INTO `ficha` VALUES ('664583',119,1);
INSERT INTO `ficha` VALUES ('6654564',120,1);
INSERT INTO `ficha` VALUES ('6655740',121,1);
INSERT INTO `ficha` VALUES ('666757',122,1);
INSERT INTO `ficha` VALUES ('666789',123,1);
INSERT INTO `ficha` VALUES ('667567',124,1);
INSERT INTO `ficha` VALUES ('6675849',125,1);
INSERT INTO `ficha` VALUES ('6687432',126,1);
INSERT INTO `ficha` VALUES ('678901',127,1);
INSERT INTO `ficha` VALUES ('701931',128,1);
INSERT INTO `ficha` VALUES ('702460',129,1);
INSERT INTO `ficha` VALUES ('713631',130,1);
INSERT INTO `ficha` VALUES ('722123',131,1);
INSERT INTO `ficha` VALUES ('722142',132,1);
INSERT INTO `ficha` VALUES ('723105',133,1);
INSERT INTO `ficha` VALUES ('723106',134,1);
INSERT INTO `ficha` VALUES ('7354019',135,1);
INSERT INTO `ficha` VALUES ('761103',136,1);
INSERT INTO `ficha` VALUES ('765571',137,1);
INSERT INTO `ficha` VALUES ('7656453',138,1);
INSERT INTO `ficha` VALUES ('768543',139,1);
INSERT INTO `ficha` VALUES ('777890',140,1);
INSERT INTO `ficha` VALUES ('789012',141,1);
INSERT INTO `ficha` VALUES ('819283',142,1);
INSERT INTO `ficha` VALUES ('827364',143,1);
INSERT INTO `ficha` VALUES ('8767878',144,1);
INSERT INTO `ficha` VALUES ('8865890',145,1);
INSERT INTO `ficha` VALUES ('887864',146,1);
INSERT INTO `ficha` VALUES ('887893',147,1);
INSERT INTO `ficha` VALUES ('888901',148,1);
INSERT INTO `ficha` VALUES ('890123',149,1);
INSERT INTO `ficha` VALUES ('896714',150,1);
INSERT INTO `ficha` VALUES ('900212',151,1);
INSERT INTO `ficha` VALUES ('901234',152,1);
INSERT INTO `ficha` VALUES ('9089786',153,1);
INSERT INTO `ficha` VALUES ('9187635',154,1);
INSERT INTO `ficha` VALUES ('982737',155,1);
INSERT INTO `ficha` VALUES ('987986',156,1);
INSERT INTO `ficha` VALUES ('989786',157,1);
INSERT INTO `ficha` VALUES ('997978',158,1);
INSERT INTO `ficha` VALUES ('998979',159,1);
INSERT INTO `ficha` VALUES ('999012',160,1);
INSERT INTO `ficha` VALUES ('999022',161,1);
INSERT INTO `ficha` VALUES ('999091',162,1);
/*!40000 ALTER TABLE `ficha` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table herramientas
#

CREATE TABLE `herramientas` (
  `id_herramientas` int(11) NOT NULL auto_increment,
  `codigo_herramientas` varchar(15) NOT NULL,
  `nombre_herramienta` varchar(250) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  PRIMARY KEY  (`id_herramientas`),
  KEY `id_unidad` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

#
# Dumping data for table herramientas
#
LOCK TABLES `herramientas` WRITE;
/*!40000 ALTER TABLE `herramientas` DISABLE KEYS */;

INSERT INTO `herramientas` VALUES (1,'1','Escoba',3);
INSERT INTO `herramientas` VALUES (2,'10','Alicates universales ',3);
INSERT INTO `herramientas` VALUES (3,'100','Llaves de estrella ',3);
INSERT INTO `herramientas` VALUES (4,'101','Llaves de tubo ',3);
INSERT INTO `herramientas` VALUES (5,'102','Llaves fijas ',3);
INSERT INTO `herramientas` VALUES (6,'103','Llaves hallen ',3);
INSERT INTO `herramientas` VALUES (7,'104','Llaves ingresas ',3);
INSERT INTO `herramientas` VALUES (8,'105','Maceta',3);
INSERT INTO `herramientas` VALUES (9,'106','Maceta / cincel',3);
INSERT INTO `herramientas` VALUES (10,'107','Maceta de cerrajero',3);
INSERT INTO `herramientas` VALUES (11,'108','Machete',3);
INSERT INTO `herramientas` VALUES (12,'109','Machos para reparar roscas ',3);
INSERT INTO `herramientas` VALUES (13,'11','Alineador de dirección ',3);
INSERT INTO `herramientas` VALUES (14,'110','Maguara',3);
INSERT INTO `herramientas` VALUES (15,'111','Manómetro de presión ',3);
INSERT INTO `herramientas` VALUES (16,'112','Martillo ',3);
INSERT INTO `herramientas` VALUES (17,'113','Martillo de bola',3);
INSERT INTO `herramientas` VALUES (18,'114','Martillo anti-rebote',3);
INSERT INTO `herramientas` VALUES (19,'115','Martillo bujarda una boca',3);
INSERT INTO `herramientas` VALUES (20,'116','Martillo de ajustador',3);
INSERT INTO `herramientas` VALUES (21,'117','Martillo de aluminio',3);
INSERT INTO `herramientas` VALUES (22,'118','Martillo de aplanar',3);
INSERT INTO `herramientas` VALUES (23,'119','Martillo de aplanar para orfebres',3);
INSERT INTO `herramientas` VALUES (24,'12','Apisonador para empedrador',3);
INSERT INTO `herramientas` VALUES (25,'120','Martillo de aplanar y ranura',3);
INSERT INTO `herramientas` VALUES (26,'121','Martillo de bordear',3);
INSERT INTO `herramientas` VALUES (27,'122','Martillo de calderero',3);
INSERT INTO `herramientas` VALUES (28,'123','Martillo de cincelador',3);
INSERT INTO `herramientas` VALUES (29,'124','Martillo de cobre',3);
INSERT INTO `herramientas` VALUES (30,'125','Martillo de cristalero',3);
INSERT INTO `herramientas` VALUES (31,'126','Martillo de embutir',3);
INSERT INTO `herramientas` VALUES (32,'127','Martillo de encofrador modelo alemán',3);
INSERT INTO `herramientas` VALUES (33,'128','Martillo de estirar',3);
INSERT INTO `herramientas` VALUES (34,'129','Martillo de forja',3);
INSERT INTO `herramientas` VALUES (35,'13','Apisonador para hormigón',3);
INSERT INTO `herramientas` VALUES (36,'130','Martillo de gran cara para caldereros',3);
INSERT INTO `herramientas` VALUES (37,'131','Martillo de grapas',3);
INSERT INTO `herramientas` VALUES (38,'132','Martillo de guarnicionero',3);
INSERT INTO `herramientas` VALUES (39,'133','Martillo de herrero',3);
INSERT INTO `herramientas` VALUES (40,'134','Martillo de mecánico de peña',3);
INSERT INTO `herramientas` VALUES (41,'135','Martillo de nailon ',3);
INSERT INTO `herramientas` VALUES (42,'136','Martillo de pulir',3);
INSERT INTO `herramientas` VALUES (43,'137','Martillo de ranuras',3);
INSERT INTO `herramientas` VALUES (44,'138','Martillo de soldador',3);
INSERT INTO `herramientas` VALUES (45,'139','Martillo de zapatero',3);
INSERT INTO `herramientas` VALUES (46,'14','Arandelas',3);
INSERT INTO `herramientas` VALUES (47,'140','Martillo especial',3);
INSERT INTO `herramientas` VALUES (48,'141','Martillo especial de ranuras',3);
INSERT INTO `herramientas` VALUES (49,'142','Martillo especial para trabajos con agua',3);
INSERT INTO `herramientas` VALUES (50,'143','Martillo magnético',3);
INSERT INTO `herramientas` VALUES (51,'144','Martillo para alfareros',3);
INSERT INTO `herramientas` VALUES (52,'145','Martillo para alicatado',3);
INSERT INTO `herramientas` VALUES (53,'146','Martillo para alisar',3);
INSERT INTO `herramientas` VALUES (54,'147','Martillo para cajas de naranjas',3);
INSERT INTO `herramientas` VALUES (55,'148','Martillo para desabollar',3);
INSERT INTO `herramientas` VALUES (56,'149','Martillo para ebanista',3);
INSERT INTO `herramientas` VALUES (57,'15','Arco de sierra',3);
INSERT INTO `herramientas` VALUES (58,'150','Martillo para empedrador',3);
INSERT INTO `herramientas` VALUES (59,'151','Martillo para enchapador',3);
INSERT INTO `herramientas` VALUES (60,'152','Martillo para guadañas',3);
INSERT INTO `herramientas` VALUES (61,'153','Martillo para orfebres',3);
INSERT INTO `herramientas` VALUES (62,'154','Martillo para pizarrita',3);
INSERT INTO `herramientas` VALUES (63,'155','Martillo para rascador plano en ángulo',3);
INSERT INTO `herramientas` VALUES (64,'156','Martillo para tapicero',3);
INSERT INTO `herramientas` VALUES (65,'157','Martillo para toneleros',3);
INSERT INTO `herramientas` VALUES (66,'158','Martillo para zapateros',3);
INSERT INTO `herramientas` VALUES (67,'159','Martillo pequeño de mecánico',3);
INSERT INTO `herramientas` VALUES (68,'16','Arco de sierra especial',3);
INSERT INTO `herramientas` VALUES (69,'160','Martillo ',3);
INSERT INTO `herramientas` VALUES (70,'161','Martillos para geólogos',3);
INSERT INTO `herramientas` VALUES (71,'162','Martillos para relojeros',3);
INSERT INTO `herramientas` VALUES (72,'163','Maza',3);
INSERT INTO `herramientas` VALUES (73,'164','Maza de empedrador',3);
INSERT INTO `herramientas` VALUES (74,'165','Maza de goma',3);
INSERT INTO `herramientas` VALUES (75,'166','Maza de hojalatero',3);
INSERT INTO `herramientas` VALUES (76,'167','Maza de madera',3);
INSERT INTO `herramientas` VALUES (77,'168','Maza de nylon',3);
INSERT INTO `herramientas` VALUES (78,'169','Maza de plástico',3);
INSERT INTO `herramientas` VALUES (79,'17','Asperjadora',3);
INSERT INTO `herramientas` VALUES (80,'170','Maza de tronzar madera',3);
INSERT INTO `herramientas` VALUES (81,'171','Maza rompe-piedras',3);
INSERT INTO `herramientas` VALUES (82,'172','Mazo',3);
INSERT INTO `herramientas` VALUES (83,'173','Metro',3);
INSERT INTO `herramientas` VALUES (84,'174','Metro plegable de madera',3);
INSERT INTO `herramientas` VALUES (85,'175','Micrómetro ',3);
INSERT INTO `herramientas` VALUES (86,'176','Mordaza',3);
INSERT INTO `herramientas` VALUES (87,'177','Motobomba',3);
INSERT INTO `herramientas` VALUES (88,'178','Motosierra',3);
INSERT INTO `herramientas` VALUES (89,'179','Muelle para tijeras',3);
INSERT INTO `herramientas` VALUES (90,'18','Atornillador',3);
INSERT INTO `herramientas` VALUES (91,'180','Nivel',3);
INSERT INTO `herramientas` VALUES (92,'181','Pala ',3);
INSERT INTO `herramientas` VALUES (93,'182','Pala draga',3);
INSERT INTO `herramientas` VALUES (94,'183','Palendra ',3);
INSERT INTO `herramientas` VALUES (95,'184','Pica',3);
INSERT INTO `herramientas` VALUES (96,'185','Pico',3);
INSERT INTO `herramientas` VALUES (97,'186','Pinzas',3);
INSERT INTO `herramientas` VALUES (98,'187','Pinzas de pruebas de corriente ',3);
INSERT INTO `herramientas` VALUES (99,'188','Pistola de aire a presión ',3);
INSERT INTO `herramientas` VALUES (100,'189','Porra',3);
INSERT INTO `herramientas` VALUES (101,'19','Azadón',3);
INSERT INTO `herramientas` VALUES (102,'190','Pulidora ',3);
INSERT INTO `herramientas` VALUES (103,'191','Puntillas',3);
INSERT INTO `herramientas` VALUES (104,'192','Rastrillo',3);
INSERT INTO `herramientas` VALUES (105,'193','Regadera',3);
INSERT INTO `herramientas` VALUES (106,'194','Segueta',3);
INSERT INTO `herramientas` VALUES (107,'195','Serrucho',3);
INSERT INTO `herramientas` VALUES (108,'196','Sierra',3);
INSERT INTO `herramientas` VALUES (109,'197','Soldadura autógena ',3);
INSERT INTO `herramientas` VALUES (110,'198','Soldadura eléctrica ',3);
INSERT INTO `herramientas` VALUES (111,'199','Taladro',3);
INSERT INTO `herramientas` VALUES (112,'2','Abonadora ',3);
INSERT INTO `herramientas` VALUES (113,'20','Banco de trabajo ',3);
INSERT INTO `herramientas` VALUES (114,'200','Taladro',3);
INSERT INTO `herramientas` VALUES (115,'201','Tanques ',3);
INSERT INTO `herramientas` VALUES (116,'202','Tas',3);
INSERT INTO `herramientas` VALUES (117,'203','Tas acanalado',3);
INSERT INTO `herramientas` VALUES (118,'204','Tas para hojalateros',3);
INSERT INTO `herramientas` VALUES (119,'205','Tas para uso general',3);
INSERT INTO `herramientas` VALUES (120,'206','Tas plano cuadrado',3);
INSERT INTO `herramientas` VALUES (121,'207','Tenaza de apertura múltiple\"alligator\"',3);
INSERT INTO `herramientas` VALUES (122,'208','Tenaza para ajustar canalones',3);
INSERT INTO `herramientas` VALUES (123,'209','Tenaza para centrar ranuras',3);
INSERT INTO `herramientas` VALUES (124,'21','Barniz',3);
INSERT INTO `herramientas` VALUES (125,'210','Tenaza para desabollar',3);
INSERT INTO `herramientas` VALUES (126,'211','Tenaza reductora de tubos',3);
INSERT INTO `herramientas` VALUES (127,'212','Tenazas',3);
INSERT INTO `herramientas` VALUES (128,'213','Tenazas de plegar para fontanero',3);
INSERT INTO `herramientas` VALUES (129,'214','Tenazas de remachar',3);
INSERT INTO `herramientas` VALUES (130,'215','Tenazas para adoquines',3);
INSERT INTO `herramientas` VALUES (131,'216','Tenazas para bordillos',3);
INSERT INTO `herramientas` VALUES (132,'217','Tenazas para coger remaches',3);
INSERT INTO `herramientas` VALUES (133,'218','Tenazas para desunir chapas',3);
INSERT INTO `herramientas` VALUES (134,'219','Tenazas para herrero',3);
INSERT INTO `herramientas` VALUES (135,'22','Barómetro digital',3);
INSERT INTO `herramientas` VALUES (136,'220','Tenazas para tejas',3);
INSERT INTO `herramientas` VALUES (137,'221','Tenazas para unir chapas',3);
INSERT INTO `herramientas` VALUES (138,'222','Tenazas para unir chapas en esquinas',3);
INSERT INTO `herramientas` VALUES (139,'223','Tenazas planas para fontanero',3);
INSERT INTO `herramientas` VALUES (140,'224','Tenazas punta redondeada para fontanero',3);
INSERT INTO `herramientas` VALUES (141,'225','Tijera',3);
INSERT INTO `herramientas` VALUES (142,'226','Tijera',3);
INSERT INTO `herramientas` VALUES (143,'227','Tijera de chapa',3);
INSERT INTO `herramientas` VALUES (144,'228','Tijera de corte continuo tipo pelícano',3);
INSERT INTO `herramientas` VALUES (145,'229','Tijera de corte continuo y curvo',3);
INSERT INTO `herramientas` VALUES (146,'23','Barra',3);
INSERT INTO `herramientas` VALUES (147,'230','Tijera de hojas curvas',3);
INSERT INTO `herramientas` VALUES (148,'231','Tijera industrial y profesional',3);
INSERT INTO `herramientas` VALUES (149,'232','Tijera modelo Berlín',3);
INSERT INTO `herramientas` VALUES (150,'233','Tijera para cortar agujeros',3);
INSERT INTO `herramientas` VALUES (151,'234','Tiralíneas enrollable',3);
INSERT INTO `herramientas` VALUES (152,'235','Tiza de trazar de recambio',3);
INSERT INTO `herramientas` VALUES (153,'236','Tornillos',3);
INSERT INTO `herramientas` VALUES (154,'237','Tractor',3);
INSERT INTO `herramientas` VALUES (155,'238','Trasladadora',3);
INSERT INTO `herramientas` VALUES (156,'239','Trazador',3);
INSERT INTO `herramientas` VALUES (157,'24','Barrena',3);
INSERT INTO `herramientas` VALUES (158,'240','Trinche',3);
INSERT INTO `herramientas` VALUES (159,'241','Tuercas ',3);
INSERT INTO `herramientas` VALUES (160,'242','Uña',3);
INSERT INTO `herramientas` VALUES (161,'243','Valdés ',3);
INSERT INTO `herramientas` VALUES (162,'244','Yunque de hojalatero',3);
INSERT INTO `herramientas` VALUES (163,'245','Yunque manual abombado',3);
INSERT INTO `herramientas` VALUES (164,'246','Yunque para guadañas',3);
INSERT INTO `herramientas` VALUES (165,'247   ','Yunque para orfebres',3);
INSERT INTO `herramientas` VALUES (166,'248  ','Yunque para relojero',3);
INSERT INTO `herramientas` VALUES (167,'249  ','Yunque redondo',3);
INSERT INTO `herramientas` VALUES (168,'25','Barretón',3);
INSERT INTO `herramientas` VALUES (169,'250','Zapa picos',3);
INSERT INTO `herramientas` VALUES (170,'26','Berbiquí',3);
INSERT INTO `herramientas` VALUES (171,'27','Bisagra o pernio',3);
INSERT INTO `herramientas` VALUES (172,'28','Bisturí',3);
INSERT INTO `herramientas` VALUES (173,'29','Bomba',3);
INSERT INTO `herramientas` VALUES (174,'3','Aceitera ',3);
INSERT INTO `herramientas` VALUES (175,'30','Broca',3);
INSERT INTO `herramientas` VALUES (176,'31','Bugí',3);
INSERT INTO `herramientas` VALUES (177,'32','Cabeza de nylon para martillos anti-rebote',3);
INSERT INTO `herramientas` VALUES (178,'33','Caja de herramientas',3);
INSERT INTO `herramientas` VALUES (179,'34','Caja de herramientas de metal',3);
INSERT INTO `herramientas` VALUES (180,'35','Caja de herramientas de plástico',3);
INSERT INTO `herramientas` VALUES (181,'36','Calabozo',3);
INSERT INTO `herramientas` VALUES (182,'37','Calibre o pie de rey ',3);
INSERT INTO `herramientas` VALUES (183,'38','Capuchón de goma para macetas',3);
INSERT INTO `herramientas` VALUES (184,'39','Capuchón de nylon',3);
INSERT INTO `herramientas` VALUES (185,'4','Adaptador de puntas magnético',3);
INSERT INTO `herramientas` VALUES (186,'40','Carreta',3);
INSERT INTO `herramientas` VALUES (187,'41','Carretilla ',3);
INSERT INTO `herramientas` VALUES (188,'42','Cepillos de alambre',3);
INSERT INTO `herramientas` VALUES (189,'43','Cincel',3);
INSERT INTO `herramientas` VALUES (190,'44','Cincel',3);
INSERT INTO `herramientas` VALUES (191,'45','Cincel con filo para piedra',3);
INSERT INTO `herramientas` VALUES (192,'46','Cincel para piedra',3);
INSERT INTO `herramientas` VALUES (193,'47','Cincel/tajadera para cortar en caliente',3);
INSERT INTO `herramientas` VALUES (194,'48','Cincel/tajadera para cortar en frió',3);
INSERT INTO `herramientas` VALUES (195,'49','Cinturón de piel',3);
INSERT INTO `herramientas` VALUES (196,'5','Alicate',3);
INSERT INTO `herramientas` VALUES (197,'50','Cizalla de pizarras',3);
INSERT INTO `herramientas` VALUES (198,'51','Clavos ',3);
INSERT INTO `herramientas` VALUES (199,'52','Colgador de herramientas',3);
INSERT INTO `herramientas` VALUES (200,'53','Combinación cuchilla recta y gancho',3);
INSERT INTO `herramientas` VALUES (201,'54','Compás',3);
INSERT INTO `herramientas` VALUES (202,'55  ','Con base de madera de haya y hoja de acero azul',3);
INSERT INTO `herramientas` VALUES (203,'56','Cordón de plomada',3);
INSERT INTO `herramientas` VALUES (204,'57','Cordón de recambio',3);
INSERT INTO `herramientas` VALUES (205,'58','Cortador de asfalto',3);
INSERT INTO `herramientas` VALUES (206,'59','Cortador de forja',3);
INSERT INTO `herramientas` VALUES (207,'6','Alicates apertura al revés de punta redonda',3);
INSERT INTO `herramientas` VALUES (208,'60','Cuchara',3);
INSERT INTO `herramientas` VALUES (209,'61','Cuchilla gancho',3);
INSERT INTO `herramientas` VALUES (210,'62','Cuchilla recta',3);
INSERT INTO `herramientas` VALUES (211,'63','Cuchillas desechables',3);
INSERT INTO `herramientas` VALUES (212,'64','Cuchillo para cables',3);
INSERT INTO `herramientas` VALUES (213,'65','Cuchillo para materiales aislantes',3);
INSERT INTO `herramientas` VALUES (214,'66','Cuchillo para techadores',3);
INSERT INTO `herramientas` VALUES (215,'67','Cuchilla estrella',3);
INSERT INTO `herramientas` VALUES (216,'68','Cuñas cilíndricas',3);
INSERT INTO `herramientas` VALUES (217,'69','Cúter con hoja retráctil',3);
INSERT INTO `herramientas` VALUES (218,'7','Alicates de pico de loro ',3);
INSERT INTO `herramientas` VALUES (219,'70','Cúter universal',3);
INSERT INTO `herramientas` VALUES (220,'71','Cutter\"allegro\"',3);
INSERT INTO `herramientas` VALUES (221,'72','Destornillador',3);
INSERT INTO `herramientas` VALUES (222,'73','Destornillador Philips ',3);
INSERT INTO `herramientas` VALUES (223,'74','Destornillador plano ',3);
INSERT INTO `herramientas` VALUES (224,'75','Discos de corte ',3);
INSERT INTO `herramientas` VALUES (225,'76','Escardilla',3);
INSERT INTO `herramientas` VALUES (226,'77','Espátula',3);
INSERT INTO `herramientas` VALUES (227,'78','Extractores de filtro de aceite ',3);
INSERT INTO `herramientas` VALUES (228,'79','Extractores universales ',3);
INSERT INTO `herramientas` VALUES (229,'8','Alicates de presión ',3);
INSERT INTO `herramientas` VALUES (230,'80','Fumigadora',3);
INSERT INTO `herramientas` VALUES (231,'81','Gato hidráulico ',3);
INSERT INTO `herramientas` VALUES (232,'82','Guadaña',3);
INSERT INTO `herramientas` VALUES (233,'83','Hacha',3);
INSERT INTO `herramientas` VALUES (234,'84','Hacha de encofrador',3);
INSERT INTO `herramientas` VALUES (235,'85','Hacha de encofrador modelo alemán',3);
INSERT INTO `herramientas` VALUES (236,'86','Hebilla de cinturón',3);
INSERT INTO `herramientas` VALUES (237,'87','Herramienta para peldaños',3);
INSERT INTO `herramientas` VALUES (238,'88','Hierro doble pliegue',3);
INSERT INTO `herramientas` VALUES (239,'89','Hilera para reparar rosca de tornillos ',3);
INSERT INTO `herramientas` VALUES (240,'9','Alicates de punta redonda ',3);
INSERT INTO `herramientas` VALUES (241,'90','Juego de galgas ',3);
INSERT INTO `herramientas` VALUES (242,'91','Juego de llaves de vaso ',3);
INSERT INTO `herramientas` VALUES (243,'92','La sierra japonesa',3);
INSERT INTO `herramientas` VALUES (244,'93','Lápiz de carpintero',3);
INSERT INTO `herramientas` VALUES (245,'94','Lima de carrocero',3);
INSERT INTO `herramientas` VALUES (246,'95','Lima para estaño',3);
INSERT INTO `herramientas` VALUES (247,'96','Limas',3);
INSERT INTO `herramientas` VALUES (248,'97','Listón medidor',3);
INSERT INTO `herramientas` VALUES (249,'98','Llave dinanometrica ',3);
INSERT INTO `herramientas` VALUES (250,'99','Llave inglesa',3);
/*!40000 ALTER TABLE `herramientas` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table lenguaje
#

CREATE TABLE `lenguaje` (
  `lenguaje` varchar(30) NOT NULL default '',
  `opcion` varchar(5) default NULL,
  `carpeta` varchar(20) default NULL,
  PRIMARY KEY  (`lenguaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table lenguaje
#
LOCK TABLES `lenguaje` WRITE;
/*!40000 ALTER TABLE `lenguaje` DISABLE KEYS */;

INSERT INTO `lenguaje` VALUES ('Español','1','esp');
INSERT INTO `lenguaje` VALUES ('Ingles','0','eng');
/*!40000 ALTER TABLE `lenguaje` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table lista_precios
#

CREATE TABLE `lista_precios` (
  `id_precio` int(11) NOT NULL auto_increment,
  `cantidad_unitaria` varchar(4) NOT NULL,
  `precio_producto` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  PRIMARY KEY  (`id_precio`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Dumping data for table lista_precios
#
LOCK TABLES `lista_precios` WRITE;
/*!40000 ALTER TABLE `lista_precios` DISABLE KEYS */;

INSERT INTO `lista_precios` VALUES (1,'40',12000,'0000-00-00','0000-00-00',1,1,9);
INSERT INTO `lista_precios` VALUES (2,'33',5000,'0000-00-00','0000-00-00',2,1,5);
INSERT INTO `lista_precios` VALUES (3,'1',200000,'0000-00-00','0000-00-00',4,1,8);
INSERT INTO `lista_precios` VALUES (4,'1',100000,'0000-00-00','0000-00-00',5,1,5);
INSERT INTO `lista_precios` VALUES (5,'40',15000,'0000-00-00','0000-00-00',6,1,5);
INSERT INTO `lista_precios` VALUES (6,'1',2000,'0000-00-00','0000-00-00',7,1,5);
INSERT INTO `lista_precios` VALUES (7,'1',360000,'0000-00-00','0000-00-00',8,1,5);
INSERT INTO `lista_precios` VALUES (8,'1',8000,'0000-00-00','0000-00-00',9,1,5);
INSERT INTO `lista_precios` VALUES (9,'10',7000,'0000-00-00','0000-00-00',10,1,5);
INSERT INTO `lista_precios` VALUES (10,'1',5000,'0000-00-00','0000-00-00',11,1,8);
INSERT INTO `lista_precios` VALUES (11,'1',20000,'0000-00-00','0000-00-00',11,1,8);
/*!40000 ALTER TABLE `lista_precios` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table materia_prima_e_insumos
#

CREATE TABLE `materia_prima_e_insumos` (
  `id_materia_prima_insumos` int(11) NOT NULL auto_increment,
  `id_azas_ins` int(11) NOT NULL,
  `id_tipo_ingreso` int(11) NOT NULL,
  `id_unidad` int(11) default NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `cantidad` varchar(10) NOT NULL,
  `quien_entrega` varchar(100) default NULL,
  `proveedor` varchar(100) default NULL,
  `observaciones` text,
  `id_usuario` int(11) default NULL,
  `id_unidad_medida` int(11) NOT NULL,
  PRIMARY KEY  (`id_materia_prima_insumos`),
  KEY `id_unidad` (`id_unidad`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_azas_ins` (`id_azas_ins`),
  KEY `id_tipo_ingreso` (`id_tipo_ingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

#
# Dumping data for table materia_prima_e_insumos
#
LOCK TABLES `materia_prima_e_insumos` WRITE;
/*!40000 ALTER TABLE `materia_prima_e_insumos` DISABLE KEYS */;

INSERT INTO `materia_prima_e_insumos` VALUES (1,19,3,1,'0000-00-00','10:34:06','8','Edinson Ramos','Agroinsumos del Cauca','El material vegetal llego en muy buenas condiciones',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (2,23,3,2,'0000-00-00','08:26:00','5','Erli Chaguendo','Agroinsumos del Cauca','El material vegetal llego en muy buenas condiciones',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (3,19,3,3,'0000-00-00','14:45:03','193','Edinson Paz','Agroinsumos del Cauca','El material vegetal llego en muy buenas condiciones',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (4,19,3,4,'0000-00-00','15:23:00','146','Jenni Hormiga','Agroinsumos del Cauca','El material vegetal llego con: bolsas plasticas, piedras.',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (5,11,3,5,'0000-00-00','12:00:00','56','Daniel Serrano','Agroinsumos del Cauca','El material vegetal llego con: bolsas plasticas, piedras.',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (6,4,1,6,'0000-00-00','13:43:00','1','Daniel Serrano','Agroinsumos del Cauca','El material vegetal llego con: bolsas plasticas, piedras.',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (7,6,3,7,'0000-00-00','14:05:01','44','Jose Luis Perafan','Agroinsumos del Cauca','El material vegetal llego con: bolsas plasticas, piedras.',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (8,18,3,8,'0000-00-00','14:20:03','3','Jose Luis Perafan ','Agroinsumos del Cauca','El material vegetal llego con: bolsas plasticas, piedras.',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (9,20,3,9,'0000-00-00','09:10:13','256','Yan Carlos Pinchao','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (10,2,3,10,'0000-00-00','11:25:09','26','Andrea Patiño','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (11,19,3,11,'0000-00-00','12:45:27','135','Liliana Velazco','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (12,2,3,12,'0000-00-00','15:37:00','20','Jhon Mario Cabrera','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (13,19,3,13,'0000-00-00','08:12:00','29','Adriana Erazo','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (14,19,3,14,'0000-00-00','10:11:00','497','Yina Marcela Muñoz','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (15,1,1,15,'0000-00-00','13:30:00','2','Yina Marcela Muñoz','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (16,12,4,1,'0000-00-00','09:24:09','15','Yimer Arbey Muñoz','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (17,12,4,2,'0000-00-00','10:14:00','22','Camilo Velasquez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (18,9,4,3,'0000-00-00','13:26:43','2','Camilo Velasquez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (19,15,4,4,'0000-00-00','14:34:00','3728','Derli Cucuñami','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,4);
INSERT INTO `materia_prima_e_insumos` VALUES (20,3,2,5,'0000-00-00','07:27:00','60','Camilo Lopez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (21,17,2,6,'0000-00-00','09:45:09','92','Maria Lozano','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (22,3,2,7,'0000-00-00','12:05:00','60','Yina Muñoz','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (23,3,2,8,'0000-00-00','13:34:34','30','Patricia Calvo','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (24,6,2,9,'0000-00-00','15:29:00','44','Walter Perez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (25,21,4,10,'0000-00-00','13:10:04','1','Karen Truke','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,3);
INSERT INTO `materia_prima_e_insumos` VALUES (26,13,4,11,'0000-00-00','13:20:00','46','Yaqueline Hernandez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (27,21,4,12,'0000-00-00','08:15:03','1','Derly Gomez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,3);
INSERT INTO `materia_prima_e_insumos` VALUES (28,5,3,13,'0000-00-00','12:06:00','47','Patricia Campo','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (29,20,3,14,'0000-00-00','14:15:09','30','Martha Amador','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (30,8,2,15,'0000-00-00','11:26:34','112','Duvier Gomez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (31,7,2,1,'0000-00-00','07:34:23','104','Viki Lopez','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (32,13,4,2,'0000-00-00','08:06:09','18','Patricio Camacho','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (33,9,4,3,'0000-00-00','09:09:09','2','Caren Camayo','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (34,14,4,4,'0000-00-00','11:23:00','30','Yamid Vidal','Agroinsumos del Cauca','La poscosecha se entrego en muy buen estado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (35,23,3,5,'0000-00-00','10:37:06','6','Sandra Jimenez','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (36,6,2,6,'0000-00-00','12:30:30','23','Yuliet Serna','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (37,22,1,7,'0000-00-00','13:13:13','1','Yuliet Serna','Biotecauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,2);
INSERT INTO `materia_prima_e_insumos` VALUES (38,10,2,8,'0000-00-00','08:24:35','1','Sara Santa','Biotecauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,9);
INSERT INTO `materia_prima_e_insumos` VALUES (39,7,2,9,'0000-00-00','12:45:51','12','Amparo Correa','Biotecauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (40,1,1,10,'0000-00-00','13:12:11','2','Amparo Correa','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,7);
INSERT INTO `materia_prima_e_insumos` VALUES (41,3,2,11,'0000-00-00','14:30:00','100','Martha Franco','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (42,2,3,12,'0000-00-00','09:09:09','24','Isabel Varela','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,5);
INSERT INTO `materia_prima_e_insumos` VALUES (43,13,4,13,'0000-00-00','10:35:27','34','Antonio Fernandez','Agroinsumos del Cauca','El tomate se a encontrado con pequeños reciduos plasticos, los cuales se le ha retirado',1,7);
/*!40000 ALTER TABLE `materia_prima_e_insumos` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table medida_termica
#

CREATE TABLE `medida_termica` (
  `id_medida_termica` int(11) NOT NULL auto_increment,
  `medida_termica` varchar(25) NOT NULL,
  PRIMARY KEY  (`id_medida_termica`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Dumping data for table medida_termica
#
LOCK TABLES `medida_termica` WRITE;
/*!40000 ALTER TABLE `medida_termica` DISABLE KEYS */;

INSERT INTO `medida_termica` VALUES (1,'Grados centigrados');
INSERT INTO `medida_termica` VALUES (2,'Grados kelvin');
INSERT INTO `medida_termica` VALUES (3,'Grados Fahrenheit');
/*!40000 ALTER TABLE `medida_termica` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table municipio
#

CREATE TABLE `municipio` (
  `id_municipio` varchar(20) NOT NULL,
  `nombre_municipio` varchar(100) NOT NULL,
  `id_depto` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_municipio`),
  KEY `id_depto` (`id_depto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table municipio
#
LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;

INSERT INTO `municipio` VALUES ('13001','CARTAGENA','13');
INSERT INTO `municipio` VALUES ('13006','ACHÍ','13');
INSERT INTO `municipio` VALUES ('13030','ALTOS DEL ROSARIO','13');
INSERT INTO `municipio` VALUES ('13042','ARENAL','13');
INSERT INTO `municipio` VALUES ('13052','ARJONA','13');
INSERT INTO `municipio` VALUES ('13062','ARROYOHONDO','13');
INSERT INTO `municipio` VALUES ('13074','BARRANCO DE LOBA','13');
INSERT INTO `municipio` VALUES ('13140','CALAMAR','13');
INSERT INTO `municipio` VALUES ('13160','CANTAGALLO','13');
INSERT INTO `municipio` VALUES ('13188','CICUCO','13');
INSERT INTO `municipio` VALUES ('13212','CÓRDOBA','13');
INSERT INTO `municipio` VALUES ('13222','CLEMENCIA','13');
INSERT INTO `municipio` VALUES ('13244','EL CARMEN DE BOLÍVAR','13');
INSERT INTO `municipio` VALUES ('13248','EL GUAMO','13');
INSERT INTO `municipio` VALUES ('13268','EL PEÑÓN','13');
INSERT INTO `municipio` VALUES ('13300','HATILLO DE LOBA','13');
INSERT INTO `municipio` VALUES ('13430','MAGANGUÉ','13');
INSERT INTO `municipio` VALUES ('13433','MAHATES','13');
INSERT INTO `municipio` VALUES ('13440','MARGARITA','13');
INSERT INTO `municipio` VALUES ('13442','MARÍA LA BAJA','13');
INSERT INTO `municipio` VALUES ('13458','MONTECRISTO','13');
INSERT INTO `municipio` VALUES ('13468','MOMPÓS','13');
INSERT INTO `municipio` VALUES ('13473','MORALES','13');
INSERT INTO `municipio` VALUES ('13490','NOROSÍ','13');
INSERT INTO `municipio` VALUES ('13549','PINILLOS','13');
INSERT INTO `municipio` VALUES ('13580','REGIDOR','13');
INSERT INTO `municipio` VALUES ('13600','RÍO VIEJO','13');
INSERT INTO `municipio` VALUES ('13620','SAN CRISTÓBAL','13');
INSERT INTO `municipio` VALUES ('13647','SAN ESTANISLAO','13');
INSERT INTO `municipio` VALUES ('13650','SAN FERNANDO','13');
INSERT INTO `municipio` VALUES ('13654','SAN JACINTO','13');
INSERT INTO `municipio` VALUES ('13655','SAN JACINTO DEL CAUCA','13');
INSERT INTO `municipio` VALUES ('13657','SAN JUAN NEPOMUCENO','13');
INSERT INTO `municipio` VALUES ('13667','SAN MARTÍN DE LOBA','13');
INSERT INTO `municipio` VALUES ('13670','SAN PABLO','13');
INSERT INTO `municipio` VALUES ('13673','SANTA CATALINA','13');
INSERT INTO `municipio` VALUES ('13683','SANTA ROSA','13');
INSERT INTO `municipio` VALUES ('13688','SANTA ROSA DEL SUR','13');
INSERT INTO `municipio` VALUES ('13744','SIMITÍ','13');
INSERT INTO `municipio` VALUES ('13760','SOPLAVIENTO','13');
INSERT INTO `municipio` VALUES ('13780','TALAIGUA NUEVO','13');
INSERT INTO `municipio` VALUES ('13810','TIQUISIO','13');
INSERT INTO `municipio` VALUES ('13836','TURBACO','13');
INSERT INTO `municipio` VALUES ('13838','TURBANÁ','13');
INSERT INTO `municipio` VALUES ('13873','VILLANUEVA','13');
INSERT INTO `municipio` VALUES ('13894','ZAMBRANO','13');
INSERT INTO `municipio` VALUES ('15001','TUNJA','15');
INSERT INTO `municipio` VALUES ('15022','ALMEIDA','15');
INSERT INTO `municipio` VALUES ('15047','AQUITANIA','15');
INSERT INTO `municipio` VALUES ('15051','ARCABUCO','15');
INSERT INTO `municipio` VALUES ('15087','BELÉN','15');
INSERT INTO `municipio` VALUES ('15090','BERBEO','15');
INSERT INTO `municipio` VALUES ('15092','BETÉITIVA','15');
INSERT INTO `municipio` VALUES ('15097','BOAVITA','15');
INSERT INTO `municipio` VALUES ('15104','BOYACÁ','15');
INSERT INTO `municipio` VALUES ('15106','BRICEÑO','15');
INSERT INTO `municipio` VALUES ('15109','BUENAVISTA','15');
INSERT INTO `municipio` VALUES ('15114','BUSBANZÁ','15');
INSERT INTO `municipio` VALUES ('15131','CALDAS','15');
INSERT INTO `municipio` VALUES ('15135','CAMPOHERMOSO','15');
INSERT INTO `municipio` VALUES ('15162','CERINZA','15');
INSERT INTO `municipio` VALUES ('15172','CHINAVITA','15');
INSERT INTO `municipio` VALUES ('15176','CHIQUINQUIRÁ','15');
INSERT INTO `municipio` VALUES ('15180','CHISCAS','15');
INSERT INTO `municipio` VALUES ('15183','CHITA','15');
INSERT INTO `municipio` VALUES ('15185','CHITARAQUE','15');
INSERT INTO `municipio` VALUES ('15187','CHIVATÁ','15');
INSERT INTO `municipio` VALUES ('15189','CIÉNEGA','15');
INSERT INTO `municipio` VALUES ('15204','CÓMBITA','15');
INSERT INTO `municipio` VALUES ('15212','COPER','15');
INSERT INTO `municipio` VALUES ('15215','CORRALES','15');
INSERT INTO `municipio` VALUES ('15218','COVARACHÍA','15');
INSERT INTO `municipio` VALUES ('15223','CUBARÁ','15');
INSERT INTO `municipio` VALUES ('15224','CUCAITA','15');
INSERT INTO `municipio` VALUES ('15226','CUÍTIVA','15');
INSERT INTO `municipio` VALUES ('15232','CHÍQUIZA','15');
INSERT INTO `municipio` VALUES ('15236','CHIVOR','15');
INSERT INTO `municipio` VALUES ('15238','DUITAMA','15');
INSERT INTO `municipio` VALUES ('15244','EL COCUY','15');
INSERT INTO `municipio` VALUES ('15248','EL ESPINO','15');
INSERT INTO `municipio` VALUES ('15272','FIRAVITOBA','15');
INSERT INTO `municipio` VALUES ('15276','FLORESTA','15');
INSERT INTO `municipio` VALUES ('15293','GACHANTIVÁ','15');
INSERT INTO `municipio` VALUES ('15296','GAMEZA','15');
INSERT INTO `municipio` VALUES ('15299','GARAGOA','15');
INSERT INTO `municipio` VALUES ('15317','GUACAMAYAS','15');
INSERT INTO `municipio` VALUES ('15322','GUATEQUE','15');
INSERT INTO `municipio` VALUES ('15325','GUAYATÁ','15');
INSERT INTO `municipio` VALUES ('15332','GÜICÁN','15');
INSERT INTO `municipio` VALUES ('15362','IZA','15');
INSERT INTO `municipio` VALUES ('15367','JENESANO','15');
INSERT INTO `municipio` VALUES ('15368','JERICÓ','15');
INSERT INTO `municipio` VALUES ('15377','LABRANZAGRANDE','15');
INSERT INTO `municipio` VALUES ('15380','LA CAPILLA','15');
INSERT INTO `municipio` VALUES ('15401','LA VICTORIA','15');
INSERT INTO `municipio` VALUES ('15403','LA UVITA','15');
INSERT INTO `municipio` VALUES ('15407','VILLA DE LEYVA','15');
INSERT INTO `municipio` VALUES ('15425','MACANAL','15');
INSERT INTO `municipio` VALUES ('15442','MARIPÍ','15');
INSERT INTO `municipio` VALUES ('15455','MIRAFLORES','15');
INSERT INTO `municipio` VALUES ('15464','MONGUA','15');
INSERT INTO `municipio` VALUES ('15466','MONGUÍ','15');
INSERT INTO `municipio` VALUES ('15469','MONIQUIRÁ','15');
INSERT INTO `municipio` VALUES ('15476','MOTAVITA','15');
INSERT INTO `municipio` VALUES ('15480','MUZO','15');
INSERT INTO `municipio` VALUES ('15491','NOBSA','15');
INSERT INTO `municipio` VALUES ('15494','NUEVO COLÓN','15');
INSERT INTO `municipio` VALUES ('15500','OICATÁ','15');
INSERT INTO `municipio` VALUES ('15507','OTANCHE','15');
INSERT INTO `municipio` VALUES ('15511','PACHAVITA','15');
INSERT INTO `municipio` VALUES ('15514','PÁEZ','15');
INSERT INTO `municipio` VALUES ('15516','PAIPA','15');
INSERT INTO `municipio` VALUES ('15518','PAJARITO','15');
INSERT INTO `municipio` VALUES ('15522','PANQUEBA','15');
INSERT INTO `municipio` VALUES ('15531','PAUNA','15');
INSERT INTO `municipio` VALUES ('15533','PAYA','15');
INSERT INTO `municipio` VALUES ('15537','PAZ DE RÍO','15');
INSERT INTO `municipio` VALUES ('15542','PESCA','15');
INSERT INTO `municipio` VALUES ('15550','PISBA','15');
INSERT INTO `municipio` VALUES ('15572','PUERTO BOYACÁ','15');
INSERT INTO `municipio` VALUES ('15580','QUÍPAMA','15');
INSERT INTO `municipio` VALUES ('15599','RAMIRIQUÍ','15');
INSERT INTO `municipio` VALUES ('15600','RÁQUIRA','15');
INSERT INTO `municipio` VALUES ('15621','RONDÓN','15');
INSERT INTO `municipio` VALUES ('15632','SABOYÁ','15');
INSERT INTO `municipio` VALUES ('15638','SÁCHICA','15');
INSERT INTO `municipio` VALUES ('15646','SAMACÁ','15');
INSERT INTO `municipio` VALUES ('15660','SAN EDUARDO','15');
INSERT INTO `municipio` VALUES ('15664','SAN JOSÉ DE PARE','15');
INSERT INTO `municipio` VALUES ('15667','SAN LUIS DE GACENO','15');
INSERT INTO `municipio` VALUES ('15673','SAN MATEO','15');
INSERT INTO `municipio` VALUES ('15676','SAN MIGUEL DE SEMA','15');
INSERT INTO `municipio` VALUES ('15681','SAN PABLO DE BORBUR','15');
INSERT INTO `municipio` VALUES ('15686','SANTANA','15');
INSERT INTO `municipio` VALUES ('15690','SANTA MARÍA','15');
INSERT INTO `municipio` VALUES ('15693','SANTA ROSA DE VITERBO','15');
INSERT INTO `municipio` VALUES ('15696','SANTA SOFÍA','15');
INSERT INTO `municipio` VALUES ('15720','SATIVANORTE','15');
INSERT INTO `municipio` VALUES ('15723','SATIVASUR','15');
INSERT INTO `municipio` VALUES ('15740','SIACHOQUE','15');
INSERT INTO `municipio` VALUES ('15753','SOATÁ','15');
INSERT INTO `municipio` VALUES ('15755','SOCOTÁ','15');
INSERT INTO `municipio` VALUES ('15757','SOCHA','15');
INSERT INTO `municipio` VALUES ('15759','SOGAMOSO','15');
INSERT INTO `municipio` VALUES ('15761','SOMONDOCO','15');
INSERT INTO `municipio` VALUES ('15762','SORA','15');
INSERT INTO `municipio` VALUES ('15763','SOTAQUIRÁ','15');
INSERT INTO `municipio` VALUES ('15764','SORACÁ','15');
INSERT INTO `municipio` VALUES ('15774','SUSACÓN','15');
INSERT INTO `municipio` VALUES ('15776','SUTAMARCHÁN','15');
INSERT INTO `municipio` VALUES ('15778','SUTATENZA','15');
INSERT INTO `municipio` VALUES ('15790','TASCO','15');
INSERT INTO `municipio` VALUES ('15798','TENZA','15');
INSERT INTO `municipio` VALUES ('15804','TIBANÁ','15');
INSERT INTO `municipio` VALUES ('15806','TIBASOSA','15');
INSERT INTO `municipio` VALUES ('15808','TINJACÁ','15');
INSERT INTO `municipio` VALUES ('15810','TIPACOQUE','15');
INSERT INTO `municipio` VALUES ('15814','TOCA','15');
INSERT INTO `municipio` VALUES ('15816','TOGÜÍ','15');
INSERT INTO `municipio` VALUES ('15820','TÓPAGA','15');
INSERT INTO `municipio` VALUES ('15822','TOTA','15');
INSERT INTO `municipio` VALUES ('15832','TUNUNGUÁ','15');
INSERT INTO `municipio` VALUES ('15835','TURMEQUÉ','15');
INSERT INTO `municipio` VALUES ('15837','TUTA','15');
INSERT INTO `municipio` VALUES ('15839','TUTAZÁ','15');
INSERT INTO `municipio` VALUES ('15842','UMBITA','15');
INSERT INTO `municipio` VALUES ('15861','VENTAQUEMADA','15');
INSERT INTO `municipio` VALUES ('15879','VIRACACHÁ','15');
INSERT INTO `municipio` VALUES ('15897','ZETAQUIRA','15');
INSERT INTO `municipio` VALUES ('17001','MANIZALES','17');
INSERT INTO `municipio` VALUES ('17013','AGUADAS','17');
INSERT INTO `municipio` VALUES ('17042','ANSERMA','17');
INSERT INTO `municipio` VALUES ('17050','ARANZAZU','17');
INSERT INTO `municipio` VALUES ('17088','BELALCÁZAR','17');
INSERT INTO `municipio` VALUES ('17174','CHINCHINÁ','17');
INSERT INTO `municipio` VALUES ('17272','FILADELFIA','17');
INSERT INTO `municipio` VALUES ('17380','LA DORADA','17');
INSERT INTO `municipio` VALUES ('17388','LA MERCED','17');
INSERT INTO `municipio` VALUES ('17433','MANZANARES','17');
INSERT INTO `municipio` VALUES ('17442','MARMATO','17');
INSERT INTO `municipio` VALUES ('17444','MARQUETALIA','17');
INSERT INTO `municipio` VALUES ('17446','MARULANDA','17');
INSERT INTO `municipio` VALUES ('17486','NEIRA','17');
INSERT INTO `municipio` VALUES ('17495','NORCASIA','17');
INSERT INTO `municipio` VALUES ('17513','PÁCORA','17');
INSERT INTO `municipio` VALUES ('17524','PALESTINA','17');
INSERT INTO `municipio` VALUES ('17541','PENSILVANIA','17');
INSERT INTO `municipio` VALUES ('17614','RIOSUCIO','17');
INSERT INTO `municipio` VALUES ('17616','RISARALDA','17');
INSERT INTO `municipio` VALUES ('17653','SALAMINA','17');
INSERT INTO `municipio` VALUES ('17662','SAMANÁ','17');
INSERT INTO `municipio` VALUES ('17665','SAN JOSÉ','17');
INSERT INTO `municipio` VALUES ('17777','SUPÍA','17');
INSERT INTO `municipio` VALUES ('17867','VICTORIA','17');
INSERT INTO `municipio` VALUES ('17873','VILLAMARÍA','17');
INSERT INTO `municipio` VALUES ('17877','VITERBO','17');
INSERT INTO `municipio` VALUES ('18001','FLORENCIA','18');
INSERT INTO `municipio` VALUES ('18029','ALBANIA','18');
INSERT INTO `municipio` VALUES ('18094','BELÉN DE LOS ANDAQUÍES','18');
INSERT INTO `municipio` VALUES ('18150','CARTAGENA DEL CHAIRÁ','18');
INSERT INTO `municipio` VALUES ('18205','CURILLO','18');
INSERT INTO `municipio` VALUES ('18247','EL DONCELLO','18');
INSERT INTO `municipio` VALUES ('18256','EL PAUJIL','18');
INSERT INTO `municipio` VALUES ('18410','LA MONTAÑITA','18');
INSERT INTO `municipio` VALUES ('18460','MILÁN','18');
INSERT INTO `municipio` VALUES ('18479','MORELIA','18');
INSERT INTO `municipio` VALUES ('18592','PUERTO RICO','18');
INSERT INTO `municipio` VALUES ('18610','SAN JOSÉ DEL FRAGUA','18');
INSERT INTO `municipio` VALUES ('18753','SAN VICENTE DEL CAGUÁN','18');
INSERT INTO `municipio` VALUES ('18756','SOLANO','18');
INSERT INTO `municipio` VALUES ('18785','SOLITA','18');
INSERT INTO `municipio` VALUES ('18860','VALPARAÍSO','18');
INSERT INTO `municipio` VALUES ('19001','POPAYÁN','19');
INSERT INTO `municipio` VALUES ('19022','ALMAGUER','19');
INSERT INTO `municipio` VALUES ('19050','ARGELIA','19');
INSERT INTO `municipio` VALUES ('19075','BALBOA','19');
INSERT INTO `municipio` VALUES ('19100','BOLÍVAR','19');
INSERT INTO `municipio` VALUES ('19110','BUENOS AIRES','19');
INSERT INTO `municipio` VALUES ('19130','CAJIBÍO','19');
INSERT INTO `municipio` VALUES ('19137','CALDONO','19');
INSERT INTO `municipio` VALUES ('19142','CALOTO','19');
INSERT INTO `municipio` VALUES ('19212','CORINTO','19');
INSERT INTO `municipio` VALUES ('19256','EL TAMBO','19');
INSERT INTO `municipio` VALUES ('19290','FLORENCIA','19');
INSERT INTO `municipio` VALUES ('19300','GUACHENÉ','19');
INSERT INTO `municipio` VALUES ('19318','GUAPI','19');
INSERT INTO `municipio` VALUES ('19355','INZÁ','19');
INSERT INTO `municipio` VALUES ('19364','JAMBALÓ','19');
INSERT INTO `municipio` VALUES ('19392','LA SIERRA','19');
INSERT INTO `municipio` VALUES ('19397','LA VEGA','19');
INSERT INTO `municipio` VALUES ('19418','LÓPEZ','19');
INSERT INTO `municipio` VALUES ('19450','MERCADERES','19');
INSERT INTO `municipio` VALUES ('19455','MIRANDA','19');
INSERT INTO `municipio` VALUES ('19473','MORALES','19');
INSERT INTO `municipio` VALUES ('19513','PADILLA','19');
INSERT INTO `municipio` VALUES ('19517','PAEZ','19');
INSERT INTO `municipio` VALUES ('19532','PATÍA','19');
INSERT INTO `municipio` VALUES ('19533','PIAMONTE','19');
INSERT INTO `municipio` VALUES ('19548','PIENDAMÓ','19');
INSERT INTO `municipio` VALUES ('19573','PUERTO TEJADA','19');
INSERT INTO `municipio` VALUES ('19585','PURACÉ','19');
INSERT INTO `municipio` VALUES ('19622','ROSAS','19');
INSERT INTO `municipio` VALUES ('19693','SAN SEBASTIÁN','19');
INSERT INTO `municipio` VALUES ('19698','SANTANDER DE QUILICHAO','19');
INSERT INTO `municipio` VALUES ('19701','SANTA ROSA','19');
INSERT INTO `municipio` VALUES ('19743','SILVIA','19');
INSERT INTO `municipio` VALUES ('19760','SOTARA','19');
INSERT INTO `municipio` VALUES ('19780','SUÁREZ','19');
INSERT INTO `municipio` VALUES ('19785','SUCRE','19');
INSERT INTO `municipio` VALUES ('19807','TIMBÍO','19');
INSERT INTO `municipio` VALUES ('19809','TIMBIQUÍ','19');
INSERT INTO `municipio` VALUES ('19821','TORIBIO','19');
INSERT INTO `municipio` VALUES ('19824','TOTORÓ','19');
INSERT INTO `municipio` VALUES ('19845','VILLA RICA','19');
INSERT INTO `municipio` VALUES ('20001','VALLEDUPAR','20');
INSERT INTO `municipio` VALUES ('20011','AGUACHICA','20');
INSERT INTO `municipio` VALUES ('20013','AGUSTÍN CODAZZI','20');
INSERT INTO `municipio` VALUES ('20032','ASTREA','20');
INSERT INTO `municipio` VALUES ('20045','BECERRIL','20');
INSERT INTO `municipio` VALUES ('20060','BOSCONIA','20');
INSERT INTO `municipio` VALUES ('20175','CHIMICHAGUA','20');
INSERT INTO `municipio` VALUES ('20178','CHIRIGUANÁ','20');
INSERT INTO `municipio` VALUES ('20228','CURUMANÍ','20');
INSERT INTO `municipio` VALUES ('20238','EL COPEY','20');
INSERT INTO `municipio` VALUES ('20250','EL PASO','20');
INSERT INTO `municipio` VALUES ('20295','GAMARRA','20');
INSERT INTO `municipio` VALUES ('20310','GONZÁLEZ','20');
INSERT INTO `municipio` VALUES ('20383','LA GLORIA','20');
INSERT INTO `municipio` VALUES ('20400','LA JAGUA DE IBIRICO','20');
INSERT INTO `municipio` VALUES ('20443','MANAURE','20');
INSERT INTO `municipio` VALUES ('20517','PAILITAS','20');
INSERT INTO `municipio` VALUES ('20550','PELAYA','20');
INSERT INTO `municipio` VALUES ('20570','PUEBLO BELLO','20');
INSERT INTO `municipio` VALUES ('20614','RÍO DE ORO','20');
INSERT INTO `municipio` VALUES ('20621','LA PAZ','20');
INSERT INTO `municipio` VALUES ('20710','SAN ALBERTO','20');
INSERT INTO `municipio` VALUES ('20750','SAN DIEGO','20');
INSERT INTO `municipio` VALUES ('20770','SAN MARTÍN','20');
INSERT INTO `municipio` VALUES ('20787','TAMALAMEQUE','20');
INSERT INTO `municipio` VALUES ('23001','MONTERÍA','23');
INSERT INTO `municipio` VALUES ('23068','AYAPEL','23');
INSERT INTO `municipio` VALUES ('23079','BUENAVISTA','23');
INSERT INTO `municipio` VALUES ('23090','CANALETE','23');
INSERT INTO `municipio` VALUES ('23162','CERETÉ','23');
INSERT INTO `municipio` VALUES ('23168','CHIMÁ','23');
INSERT INTO `municipio` VALUES ('23182','CHINÚ','23');
INSERT INTO `municipio` VALUES ('23189','CIÉNAGA DE ORO','23');
INSERT INTO `municipio` VALUES ('23300','COTORRA','23');
INSERT INTO `municipio` VALUES ('23350','LA APARTADA','23');
INSERT INTO `municipio` VALUES ('23417','LORICA','23');
INSERT INTO `municipio` VALUES ('23419','LOS CÓRDOBAS','23');
INSERT INTO `municipio` VALUES ('23464','MOMIL','23');
INSERT INTO `municipio` VALUES ('23466','MONTELÍBANO','23');
INSERT INTO `municipio` VALUES ('23500','MOÑITOS','23');
INSERT INTO `municipio` VALUES ('23555','PLANETA RICA','23');
INSERT INTO `municipio` VALUES ('23570','PUEBLO NUEVO','23');
INSERT INTO `municipio` VALUES ('23574','PUERTO ESCONDIDO','23');
INSERT INTO `municipio` VALUES ('23580','PUERTO LIBERTADOR','23');
INSERT INTO `municipio` VALUES ('23586','PURÍSIMA','23');
INSERT INTO `municipio` VALUES ('23660','SAHAGÚN','23');
INSERT INTO `municipio` VALUES ('23670','SAN ANDRÉS SOTAVENTO','23');
INSERT INTO `municipio` VALUES ('23672','SAN ANTERO','23');
INSERT INTO `municipio` VALUES ('23675','SAN BERNARDO DEL VIENTO','23');
INSERT INTO `municipio` VALUES ('23678','SAN CARLOS','23');
INSERT INTO `municipio` VALUES ('23682','SAN JOSÉ DE URÉ','23');
INSERT INTO `municipio` VALUES ('23686','SAN PELAYO','23');
INSERT INTO `municipio` VALUES ('23807','TIERRALTA','23');
INSERT INTO `municipio` VALUES ('23815','TUCHÍN','23');
INSERT INTO `municipio` VALUES ('23855','VALENCIA','23');
INSERT INTO `municipio` VALUES ('25001','AGUA DE DIOS','25');
INSERT INTO `municipio` VALUES ('25019','ALBÁN','25');
INSERT INTO `municipio` VALUES ('25035','ANAPOIMA','25');
INSERT INTO `municipio` VALUES ('25040','ANOLAIMA','25');
INSERT INTO `municipio` VALUES ('25053','ARBELÁEZ','25');
INSERT INTO `municipio` VALUES ('25086','BELTRÁN','25');
INSERT INTO `municipio` VALUES ('25095','BITUIMA','25');
INSERT INTO `municipio` VALUES ('25099','BOJACÁ','25');
INSERT INTO `municipio` VALUES ('25120','CABRERA','25');
INSERT INTO `municipio` VALUES ('25123','CACHIPAY','25');
INSERT INTO `municipio` VALUES ('25126','CAJICÁ','25');
INSERT INTO `municipio` VALUES ('25148','CAPARRAPÍ','25');
INSERT INTO `municipio` VALUES ('25151','CAQUEZA','25');
INSERT INTO `municipio` VALUES ('25154','CARMEN DE CARUPA','25');
INSERT INTO `municipio` VALUES ('25168','CHAGUANÍ','25');
INSERT INTO `municipio` VALUES ('25175','CHÍA','25');
INSERT INTO `municipio` VALUES ('25178','CHIPAQUE','25');
INSERT INTO `municipio` VALUES ('25181','CHOACHÍ','25');
INSERT INTO `municipio` VALUES ('25183','CHOCONTÁ','25');
INSERT INTO `municipio` VALUES ('25200','COGUA','25');
INSERT INTO `municipio` VALUES ('25214','COTA','25');
INSERT INTO `municipio` VALUES ('25224','CUCUNUBÁ','25');
INSERT INTO `municipio` VALUES ('25245','EL COLEGIO','25');
INSERT INTO `municipio` VALUES ('25258','EL PEÑÓN','25');
INSERT INTO `municipio` VALUES ('25260','EL ROSAL','25');
INSERT INTO `municipio` VALUES ('25269','FACATATIVÁ','25');
INSERT INTO `municipio` VALUES ('25279','FOMEQUE','25');
INSERT INTO `municipio` VALUES ('25281','FOSCA','25');
INSERT INTO `municipio` VALUES ('25286','FUNZA','25');
INSERT INTO `municipio` VALUES ('25288','FÚQUENE','25');
INSERT INTO `municipio` VALUES ('25290','FUSAGASUGÁ','25');
INSERT INTO `municipio` VALUES ('25293','GACHALA','25');
INSERT INTO `municipio` VALUES ('25295','GACHANCIPÁ','25');
INSERT INTO `municipio` VALUES ('25297','GACHETÁ','25');
INSERT INTO `municipio` VALUES ('25299','GAMA','25');
INSERT INTO `municipio` VALUES ('25307','GIRARDOT','25');
INSERT INTO `municipio` VALUES ('25312','GRANADA','25');
INSERT INTO `municipio` VALUES ('25317','GUACHETÁ','25');
INSERT INTO `municipio` VALUES ('25320','GUADUAS','25');
INSERT INTO `municipio` VALUES ('25322','GUASCA','25');
INSERT INTO `municipio` VALUES ('25324','GUATAQUÍ','25');
INSERT INTO `municipio` VALUES ('25326','GUATAVITA','25');
INSERT INTO `municipio` VALUES ('25328','GUAYABAL DE SIQUIMA','25');
INSERT INTO `municipio` VALUES ('25335','GUAYABETAL','25');
INSERT INTO `municipio` VALUES ('25339','GUTIÉRREZ','25');
INSERT INTO `municipio` VALUES ('25368','JERUSALÉN','25');
INSERT INTO `municipio` VALUES ('25372','JUNÍN','25');
INSERT INTO `municipio` VALUES ('25377','LA CALERA','25');
INSERT INTO `municipio` VALUES ('25386','LA MESA','25');
INSERT INTO `municipio` VALUES ('25394','LA PALMA','25');
INSERT INTO `municipio` VALUES ('25398','LA PEÑA','25');
INSERT INTO `municipio` VALUES ('25402','LA VEGA','25');
INSERT INTO `municipio` VALUES ('25407','LENGUAZAQUE','25');
INSERT INTO `municipio` VALUES ('25426','MACHETA','25');
INSERT INTO `municipio` VALUES ('25430','MADRID','25');
INSERT INTO `municipio` VALUES ('25436','MANTA','25');
INSERT INTO `municipio` VALUES ('25438','MEDINA','25');
INSERT INTO `municipio` VALUES ('25473','MOSQUERA','25');
INSERT INTO `municipio` VALUES ('25483','NARIÑO','25');
INSERT INTO `municipio` VALUES ('25486','NEMOCÓN','25');
INSERT INTO `municipio` VALUES ('25488','NILO','25');
INSERT INTO `municipio` VALUES ('25489','NIMAIMA','25');
INSERT INTO `municipio` VALUES ('25491','NOCAIMA','25');
INSERT INTO `municipio` VALUES ('25506','VENECIA','25');
INSERT INTO `municipio` VALUES ('25513','PACHO','25');
INSERT INTO `municipio` VALUES ('25518','PAIME','25');
INSERT INTO `municipio` VALUES ('25524','PANDI','25');
INSERT INTO `municipio` VALUES ('25530','PARATEBUENO','25');
INSERT INTO `municipio` VALUES ('25535','PASCA','25');
INSERT INTO `municipio` VALUES ('25572','PUERTO SALGAR','25');
INSERT INTO `municipio` VALUES ('25580','PULÍ','25');
INSERT INTO `municipio` VALUES ('25592','QUEBRADANEGRA','25');
INSERT INTO `municipio` VALUES ('25594','QUETAME','25');
INSERT INTO `municipio` VALUES ('25596','QUIPILE','25');
INSERT INTO `municipio` VALUES ('25599','APULO','25');
INSERT INTO `municipio` VALUES ('25612','RICAURTE','25');
INSERT INTO `municipio` VALUES ('25645','SAN ANTONIO DEL TEQUENDAMA','25');
INSERT INTO `municipio` VALUES ('25649','SAN BERNARDO','25');
INSERT INTO `municipio` VALUES ('25653','SAN CAYETANO','25');
INSERT INTO `municipio` VALUES ('25658','SAN FRANCISCO','25');
INSERT INTO `municipio` VALUES ('25662','SAN JUAN DE RÍO SECO','25');
INSERT INTO `municipio` VALUES ('25718','SASAIMA','25');
INSERT INTO `municipio` VALUES ('25736','SESQUILÉ','25');
INSERT INTO `municipio` VALUES ('25740','SIBATÉ','25');
INSERT INTO `municipio` VALUES ('25743','SILVANIA','25');
INSERT INTO `municipio` VALUES ('25745','SIMIJACA','25');
INSERT INTO `municipio` VALUES ('25754','SOACHA','25');
INSERT INTO `municipio` VALUES ('25758','SOPÓ','25');
INSERT INTO `municipio` VALUES ('25769','SUBACHOQUE','25');
INSERT INTO `municipio` VALUES ('25772','SUESCA','25');
INSERT INTO `municipio` VALUES ('25777','SUPATÁ','25');
INSERT INTO `municipio` VALUES ('25779','SUSA','25');
INSERT INTO `municipio` VALUES ('25781','SUTATAUSA','25');
INSERT INTO `municipio` VALUES ('25785','TABIO','25');
INSERT INTO `municipio` VALUES ('25793','TAUSA','25');
INSERT INTO `municipio` VALUES ('25797','TENA','25');
INSERT INTO `municipio` VALUES ('25799','TENJO','25');
INSERT INTO `municipio` VALUES ('25805','TIBACUY','25');
INSERT INTO `municipio` VALUES ('25807','TIBIRITA','25');
INSERT INTO `municipio` VALUES ('25815','TOCAIMA','25');
INSERT INTO `municipio` VALUES ('25817','TOCANCIPÁ','25');
INSERT INTO `municipio` VALUES ('25823','TOPAIPÍ','25');
INSERT INTO `municipio` VALUES ('25839','UBALÁ','25');
INSERT INTO `municipio` VALUES ('25841','UBAQUE','25');
INSERT INTO `municipio` VALUES ('25843','VILLA DE SAN DIEGO DE UBATE','25');
INSERT INTO `municipio` VALUES ('25845','UNE','25');
INSERT INTO `municipio` VALUES ('25851','ÚTICA','25');
INSERT INTO `municipio` VALUES ('25862','VERGARA','25');
INSERT INTO `municipio` VALUES ('25867','VIANÍ','25');
INSERT INTO `municipio` VALUES ('25871','VILLAGÓMEZ','25');
INSERT INTO `municipio` VALUES ('25873','VILLAPINZÓN','25');
INSERT INTO `municipio` VALUES ('25875','VILLETA','25');
INSERT INTO `municipio` VALUES ('25878','VIOTÁ','25');
INSERT INTO `municipio` VALUES ('25885','YACOPÍ','25');
INSERT INTO `municipio` VALUES ('25898','ZIPACÓN','25');
INSERT INTO `municipio` VALUES ('25899','ZIPAQUIRÁ','25');
INSERT INTO `municipio` VALUES ('27001','QUIBDÓ','27');
INSERT INTO `municipio` VALUES ('27006','ACANDÍ','27');
INSERT INTO `municipio` VALUES ('27025','ALTO BAUDÓ','27');
INSERT INTO `municipio` VALUES ('27050','ATRATO','27');
INSERT INTO `municipio` VALUES ('27073','BAGADÓ','27');
INSERT INTO `municipio` VALUES ('27075','BAHÍA SOLANO','27');
INSERT INTO `municipio` VALUES ('27077','BAJO BAUDÓ','27');
INSERT INTO `municipio` VALUES ('27099','BOJAYA','27');
INSERT INTO `municipio` VALUES ('27135','EL CANTÓN DEL SAN PABLO','27');
INSERT INTO `municipio` VALUES ('27150','CARMEN DEL DARIÉN','27');
INSERT INTO `municipio` VALUES ('27160','CÉRTEGUI','27');
INSERT INTO `municipio` VALUES ('27205','CONDOTO','27');
INSERT INTO `municipio` VALUES ('27245','EL CARMEN DE ATRATO','27');
INSERT INTO `municipio` VALUES ('27250','EL LITORAL DEL SAN JUAN','27');
INSERT INTO `municipio` VALUES ('27361','ISTMINA','27');
INSERT INTO `municipio` VALUES ('27372','JURADÓ','27');
INSERT INTO `municipio` VALUES ('27413','LLORÓ','27');
INSERT INTO `municipio` VALUES ('27425','MEDIO ATRATO','27');
INSERT INTO `municipio` VALUES ('27430','MEDIO BAUDÓ','27');
INSERT INTO `municipio` VALUES ('27450','MEDIO SAN JUAN','27');
INSERT INTO `municipio` VALUES ('27491','NÓVITA','27');
INSERT INTO `municipio` VALUES ('27495','NUQUÍ','27');
INSERT INTO `municipio` VALUES ('27580','RÍO IRÓ','27');
INSERT INTO `municipio` VALUES ('27600','RÍO QUITO','27');
INSERT INTO `municipio` VALUES ('27615','RIOSUCIO','27');
INSERT INTO `municipio` VALUES ('27660','SAN JOSÉ DEL PALMAR','27');
INSERT INTO `municipio` VALUES ('27745','SIPÍ','27');
INSERT INTO `municipio` VALUES ('27787','TADÓ','27');
INSERT INTO `municipio` VALUES ('27800','UNGUÍA','27');
INSERT INTO `municipio` VALUES ('27810','UNIÓN PANAMERICANA','27');
INSERT INTO `municipio` VALUES ('41001','NEIVA','41');
INSERT INTO `municipio` VALUES ('41006','ACEVEDO','41');
INSERT INTO `municipio` VALUES ('41013','AGRADO','41');
INSERT INTO `municipio` VALUES ('41016','AIPE','41');
INSERT INTO `municipio` VALUES ('41020','ALGECIRAS','41');
INSERT INTO `municipio` VALUES ('41026','ALTAMIRA','41');
INSERT INTO `municipio` VALUES ('41078','BARAYA','41');
INSERT INTO `municipio` VALUES ('41132','CAMPOALEGRE','41');
INSERT INTO `municipio` VALUES ('41206','COLOMBIA','41');
INSERT INTO `municipio` VALUES ('41244','ELÍAS','41');
INSERT INTO `municipio` VALUES ('41298','GARZÓN','41');
INSERT INTO `municipio` VALUES ('41306','GIGANTE','41');
INSERT INTO `municipio` VALUES ('41319','GUADALUPE','41');
INSERT INTO `municipio` VALUES ('41349','HOBO','41');
INSERT INTO `municipio` VALUES ('41357','IQUIRA','41');
INSERT INTO `municipio` VALUES ('41359','ISNOS','41');
INSERT INTO `municipio` VALUES ('41378','LA ARGENTINA','41');
INSERT INTO `municipio` VALUES ('41396','LA PLATA','41');
INSERT INTO `municipio` VALUES ('41483','NÁTAGA','41');
INSERT INTO `municipio` VALUES ('41503','OPORAPA','41');
INSERT INTO `municipio` VALUES ('41518','PAICOL','41');
INSERT INTO `municipio` VALUES ('41524','PALERMO','41');
INSERT INTO `municipio` VALUES ('41530','PALESTINA','41');
INSERT INTO `municipio` VALUES ('41548','PITAL','41');
INSERT INTO `municipio` VALUES ('41551','PITALITO','41');
INSERT INTO `municipio` VALUES ('41615','RIVERA','41');
INSERT INTO `municipio` VALUES ('41660','SALADOBLANCO','41');
INSERT INTO `municipio` VALUES ('41668','SAN AGUSTÍN','41');
INSERT INTO `municipio` VALUES ('41676','SANTA MARÍA','41');
INSERT INTO `municipio` VALUES ('41770','SUAZA','41');
INSERT INTO `municipio` VALUES ('41791','TARQUI','41');
INSERT INTO `municipio` VALUES ('41797','TESALIA','41');
INSERT INTO `municipio` VALUES ('41799','TELLO','41');
INSERT INTO `municipio` VALUES ('41801','TERUEL','41');
INSERT INTO `municipio` VALUES ('41807','TIMANÁ','41');
INSERT INTO `municipio` VALUES ('41872','VILLAVIEJA','41');
INSERT INTO `municipio` VALUES ('41885','YAGUARÁ','41');
INSERT INTO `municipio` VALUES ('44001','RIOHACHA','44');
INSERT INTO `municipio` VALUES ('44035','ALBANIA','44');
INSERT INTO `municipio` VALUES ('44078','BARRANCAS','44');
INSERT INTO `municipio` VALUES ('44090','DIBULLA','44');
INSERT INTO `municipio` VALUES ('44098','DISTRACCIÓN','44');
INSERT INTO `municipio` VALUES ('44110','EL MOLINO','44');
INSERT INTO `municipio` VALUES ('44279','FONSECA','44');
INSERT INTO `municipio` VALUES ('44378','HATONUEVO','44');
INSERT INTO `municipio` VALUES ('44420','LA JAGUA DEL PILAR','44');
INSERT INTO `municipio` VALUES ('44430','MAICAO','44');
INSERT INTO `municipio` VALUES ('44560','MANAURE','44');
INSERT INTO `municipio` VALUES ('44650','SAN JUAN DEL CESAR','44');
INSERT INTO `municipio` VALUES ('44847','URIBIA','44');
INSERT INTO `municipio` VALUES ('44855','URUMITA','44');
INSERT INTO `municipio` VALUES ('44874','VILLANUEVA','44');
INSERT INTO `municipio` VALUES ('47001','SANTA MARTA','47');
INSERT INTO `municipio` VALUES ('47030','ALGARROBO','47');
INSERT INTO `municipio` VALUES ('47053','ARACATACA','47');
INSERT INTO `municipio` VALUES ('47058','ARIGUANÍ','47');
INSERT INTO `municipio` VALUES ('47161','CERRO SAN ANTONIO','47');
INSERT INTO `municipio` VALUES ('47170','CHIVOLO','47');
INSERT INTO `municipio` VALUES ('47189','CIÉNAGA','47');
INSERT INTO `municipio` VALUES ('47205','CONCORDIA','47');
INSERT INTO `municipio` VALUES ('47245','EL BANCO','47');
INSERT INTO `municipio` VALUES ('47258','EL PIÑON','47');
INSERT INTO `municipio` VALUES ('47268','EL RETÉN','47');
INSERT INTO `municipio` VALUES ('47288','FUNDACIÓN','47');
INSERT INTO `municipio` VALUES ('47318','GUAMAL','47');
INSERT INTO `municipio` VALUES ('47460','NUEVA GRANADA','47');
INSERT INTO `municipio` VALUES ('47541','PEDRAZA','47');
INSERT INTO `municipio` VALUES ('47545','PIJIÑO DEL CARMEN','47');
INSERT INTO `municipio` VALUES ('47551','PIVIJAY','47');
INSERT INTO `municipio` VALUES ('47555','PLATO','47');
INSERT INTO `municipio` VALUES ('47570','PUEBLOVIEJO','47');
INSERT INTO `municipio` VALUES ('47605','REMOLINO','47');
INSERT INTO `municipio` VALUES ('47660','SABANAS DE SAN ANGEL','47');
INSERT INTO `municipio` VALUES ('47675','SALAMINA','47');
INSERT INTO `municipio` VALUES ('47692','SAN SEBASTIÁN DE BUENAVISTA','47');
INSERT INTO `municipio` VALUES ('47703','SAN ZENÓN','47');
INSERT INTO `municipio` VALUES ('47707','SANTA ANA','47');
INSERT INTO `municipio` VALUES ('47720','SANTA BÁRBARA DE PINTO','47');
INSERT INTO `municipio` VALUES ('47745','SITIONUEVO','47');
INSERT INTO `municipio` VALUES ('47798','TENERIFE','47');
INSERT INTO `municipio` VALUES ('47960','ZAPAYÁN','47');
INSERT INTO `municipio` VALUES ('47980','ZONA BANANERA','47');
INSERT INTO `municipio` VALUES ('50001','VILLAVICENCIO','50');
INSERT INTO `municipio` VALUES ('50006','ACACÍAS','50');
INSERT INTO `municipio` VALUES ('5001','MEDELLÍN','5');
INSERT INTO `municipio` VALUES ('5002','ABEJORRAL','5');
INSERT INTO `municipio` VALUES ('5004','ABRIAQUÍ','5');
INSERT INTO `municipio` VALUES ('50110','BARRANCA DE UPÍA','50');
INSERT INTO `municipio` VALUES ('50124','CABUYARO','50');
INSERT INTO `municipio` VALUES ('50150','CASTILLA LA NUEVA','50');
INSERT INTO `municipio` VALUES ('5021','ALEJANDRÍA','5');
INSERT INTO `municipio` VALUES ('50223','CUBARRAL','50');
INSERT INTO `municipio` VALUES ('50226','CUMARAL','50');
INSERT INTO `municipio` VALUES ('50245','EL CALVARIO','50');
INSERT INTO `municipio` VALUES ('50251','EL CASTILLO','50');
INSERT INTO `municipio` VALUES ('50270','EL DORADO','50');
INSERT INTO `municipio` VALUES ('50287','FUENTE DE ORO','50');
INSERT INTO `municipio` VALUES ('5030','AMAGÁ','5');
INSERT INTO `municipio` VALUES ('5031','AMALFI','5');
INSERT INTO `municipio` VALUES ('50313','GRANADA','50');
INSERT INTO `municipio` VALUES ('50318','GUAMAL','50');
INSERT INTO `municipio` VALUES ('50325','MAPIRIPÁN','50');
INSERT INTO `municipio` VALUES ('50330','MESETAS','50');
INSERT INTO `municipio` VALUES ('5034','ANDES','5');
INSERT INTO `municipio` VALUES ('50350','LA MACARENA','50');
INSERT INTO `municipio` VALUES ('5036','ANGELÓPOLIS','5');
INSERT INTO `municipio` VALUES ('50370','URIBE','50');
INSERT INTO `municipio` VALUES ('5038','ANGOSTURA','5');
INSERT INTO `municipio` VALUES ('5040','ANORÍ','5');
INSERT INTO `municipio` VALUES ('50400','LEJANÍAS','50');
INSERT INTO `municipio` VALUES ('5042','SANTAFÉ DE ANTIOQUIA','5');
INSERT INTO `municipio` VALUES ('5044','ANZA','5');
INSERT INTO `municipio` VALUES ('5045','APARTADÓ','5');
INSERT INTO `municipio` VALUES ('50450','PUERTO CONCORDIA','50');
INSERT INTO `municipio` VALUES ('5051','ARBOLETES','5');
INSERT INTO `municipio` VALUES ('5055','ARGELIA','5');
INSERT INTO `municipio` VALUES ('50568','PUERTO GAITÁN','50');
INSERT INTO `municipio` VALUES ('50573','PUERTO LÓPEZ','50');
INSERT INTO `municipio` VALUES ('50577','PUERTO LLERAS','50');
INSERT INTO `municipio` VALUES ('5059','ARMENIA','5');
INSERT INTO `municipio` VALUES ('50590','PUERTO RICO','50');
INSERT INTO `municipio` VALUES ('50606','RESTREPO','50');
INSERT INTO `municipio` VALUES ('50680','SAN CARLOS DE GUAROA','50');
INSERT INTO `municipio` VALUES ('50683','SAN JUAN DE ARAMA','50');
INSERT INTO `municipio` VALUES ('50686','SAN JUANITO','50');
INSERT INTO `municipio` VALUES ('50689','SAN MARTÍN','50');
INSERT INTO `municipio` VALUES ('50711','VISTAHERMOSA','50');
INSERT INTO `municipio` VALUES ('5079','BARBOSA','5');
INSERT INTO `municipio` VALUES ('5086','BELMIRA','5');
INSERT INTO `municipio` VALUES ('5088','BELLO','5');
INSERT INTO `municipio` VALUES ('5091','BETANIA','5');
INSERT INTO `municipio` VALUES ('5093','BETULIA','5');
INSERT INTO `municipio` VALUES ('5101','CIUDAD BOLÍVAR','5');
INSERT INTO `municipio` VALUES ('5107','BRICEÑO','5');
INSERT INTO `municipio` VALUES ('5113','BURITICÁ','5');
INSERT INTO `municipio` VALUES ('5120','CÁCERES','5');
INSERT INTO `municipio` VALUES ('5125','CAICEDO','5');
INSERT INTO `municipio` VALUES ('5129','CALDAS','5');
INSERT INTO `municipio` VALUES ('5134','CAMPAMENTO','5');
INSERT INTO `municipio` VALUES ('5138','CAÑASGORDAS','5');
INSERT INTO `municipio` VALUES ('5142','CARACOLÍ','5');
INSERT INTO `municipio` VALUES ('5145','CARAMANTA','5');
INSERT INTO `municipio` VALUES ('5147','CAREPA','5');
INSERT INTO `municipio` VALUES ('5148','EL CARMEN DE VIBORAL','5');
INSERT INTO `municipio` VALUES ('5150','CAROLINA','5');
INSERT INTO `municipio` VALUES ('5154','CAUCASIA','5');
INSERT INTO `municipio` VALUES ('5172','CHIGORODÓ','5');
INSERT INTO `municipio` VALUES ('5190','CISNEROS','5');
INSERT INTO `municipio` VALUES ('5197','COCORNÁ','5');
INSERT INTO `municipio` VALUES ('52001','PASTO','52');
INSERT INTO `municipio` VALUES ('52019','ALBÁN','52');
INSERT INTO `municipio` VALUES ('52022','ALDANA','52');
INSERT INTO `municipio` VALUES ('52036','ANCUYÁ','52');
INSERT INTO `municipio` VALUES ('52051','ARBOLEDA','52');
INSERT INTO `municipio` VALUES ('5206','CONCEPCIÓN','5');
INSERT INTO `municipio` VALUES ('52079','BARBACOAS','52');
INSERT INTO `municipio` VALUES ('52083','BELÉN','52');
INSERT INTO `municipio` VALUES ('5209','CONCORDIA','5');
INSERT INTO `municipio` VALUES ('52110','BUESACO','52');
INSERT INTO `municipio` VALUES ('5212','COPACABANA','5');
INSERT INTO `municipio` VALUES ('52203','COLÓN','52');
INSERT INTO `municipio` VALUES ('52207','CONSACA','52');
INSERT INTO `municipio` VALUES ('52210','CONTADERO','52');
INSERT INTO `municipio` VALUES ('52215','CÓRDOBA','52');
INSERT INTO `municipio` VALUES ('52224','CUASPUD','52');
INSERT INTO `municipio` VALUES ('52227','CUMBAL','52');
INSERT INTO `municipio` VALUES ('52233','CUMBITARA','52');
INSERT INTO `municipio` VALUES ('52240','CHACHAGÜÍ','52');
INSERT INTO `municipio` VALUES ('52250','EL CHARCO','52');
INSERT INTO `municipio` VALUES ('52254','EL PEÑOL','52');
INSERT INTO `municipio` VALUES ('52256','EL ROSARIO','52');
INSERT INTO `municipio` VALUES ('52258','EL TABLÓN DE GÓMEZ','52');
INSERT INTO `municipio` VALUES ('52260','EL TAMBO','52');
INSERT INTO `municipio` VALUES ('52287','FUNES','52');
INSERT INTO `municipio` VALUES ('52317','GUACHUCAL','52');
INSERT INTO `municipio` VALUES ('52320','GUAITARILLA','52');
INSERT INTO `municipio` VALUES ('52323','GUALMATÁN','52');
INSERT INTO `municipio` VALUES ('5234','DABEIBA','5');
INSERT INTO `municipio` VALUES ('52352','ILES','52');
INSERT INTO `municipio` VALUES ('52354','IMUÉS','52');
INSERT INTO `municipio` VALUES ('52356','IPIALES','52');
INSERT INTO `municipio` VALUES ('5237','DONMATÍAS','5');
INSERT INTO `municipio` VALUES ('52378','LA CRUZ','52');
INSERT INTO `municipio` VALUES ('52381','LA FLORIDA','52');
INSERT INTO `municipio` VALUES ('52385','LA LLANADA','52');
INSERT INTO `municipio` VALUES ('52390','LA TOLA','52');
INSERT INTO `municipio` VALUES ('52399','LA UNIÓN','52');
INSERT INTO `municipio` VALUES ('5240','EBÉJICO','5');
INSERT INTO `municipio` VALUES ('52405','LEIVA','52');
INSERT INTO `municipio` VALUES ('52411','LINARES','52');
INSERT INTO `municipio` VALUES ('52418','LOS ANDES','52');
INSERT INTO `municipio` VALUES ('52427','MAGÜI','52');
INSERT INTO `municipio` VALUES ('52435','MALLAMA','52');
INSERT INTO `municipio` VALUES ('52473','MOSQUERA','52');
INSERT INTO `municipio` VALUES ('52480','NARIÑO','52');
INSERT INTO `municipio` VALUES ('52490','OLAYA HERRERA','52');
INSERT INTO `municipio` VALUES ('5250','EL BAGRE','5');
INSERT INTO `municipio` VALUES ('52506','OSPINA','52');
INSERT INTO `municipio` VALUES ('52520','FRANCISCO PIZARRO','52');
INSERT INTO `municipio` VALUES ('52540','POLICARPA','52');
INSERT INTO `municipio` VALUES ('52560','POTOSÍ','52');
INSERT INTO `municipio` VALUES ('52565','PROVIDENCIA','52');
INSERT INTO `municipio` VALUES ('52573','PUERRES','52');
INSERT INTO `municipio` VALUES ('52585','PUPIALES','52');
INSERT INTO `municipio` VALUES ('52612','RICAURTE','52');
INSERT INTO `municipio` VALUES ('52621','ROBERTO PAYÁN','52');
INSERT INTO `municipio` VALUES ('5264','ENTRERRIOS','5');
INSERT INTO `municipio` VALUES ('5266','ENVIGADO','5');
INSERT INTO `municipio` VALUES ('52678','SAMANIEGO','52');
INSERT INTO `municipio` VALUES ('52683','SANDONÁ','52');
INSERT INTO `municipio` VALUES ('52685','SAN BERNARDO','52');
INSERT INTO `municipio` VALUES ('52687','SAN LORENZO','52');
INSERT INTO `municipio` VALUES ('52693','SAN PABLO','52');
INSERT INTO `municipio` VALUES ('52694','SAN PEDRO DE CARTAGO','52');
INSERT INTO `municipio` VALUES ('52696','SANTA BÁRBARA','52');
INSERT INTO `municipio` VALUES ('52699','SANTACRUZ','52');
INSERT INTO `municipio` VALUES ('52720','SAPUYES','52');
INSERT INTO `municipio` VALUES ('52786','TAMINANGO','52');
INSERT INTO `municipio` VALUES ('52788','TANGUA','52');
INSERT INTO `municipio` VALUES ('5282','FREDONIA','5');
INSERT INTO `municipio` VALUES ('52835','SAN ANDRES DE TUMACO','52');
INSERT INTO `municipio` VALUES ('52838','TÚQUERRES','52');
INSERT INTO `municipio` VALUES ('5284','FRONTINO','5');
INSERT INTO `municipio` VALUES ('52885','YACUANQUER','52');
INSERT INTO `municipio` VALUES ('5306','GIRALDO','5');
INSERT INTO `municipio` VALUES ('5308','GIRARDOTA','5');
INSERT INTO `municipio` VALUES ('5310','GÓMEZ PLATA','5');
INSERT INTO `municipio` VALUES ('5313','GRANADA','5');
INSERT INTO `municipio` VALUES ('5315','GUADALUPE','5');
INSERT INTO `municipio` VALUES ('5318','GUARNE','5');
INSERT INTO `municipio` VALUES ('5321','GUATAPE','5');
INSERT INTO `municipio` VALUES ('5347','HELICONIA','5');
INSERT INTO `municipio` VALUES ('5353','HISPANIA','5');
INSERT INTO `municipio` VALUES ('5360','ITAGUI','5');
INSERT INTO `municipio` VALUES ('5361','ITUANGO','5');
INSERT INTO `municipio` VALUES ('5364','JARDÍN','5');
INSERT INTO `municipio` VALUES ('5368','JERICÓ','5');
INSERT INTO `municipio` VALUES ('5376','LA CEJA','5');
INSERT INTO `municipio` VALUES ('5380','LA ESTRELLA','5');
INSERT INTO `municipio` VALUES ('5390','LA PINTADA','5');
INSERT INTO `municipio` VALUES ('5400','LA UNIÓN','5');
INSERT INTO `municipio` VALUES ('54001','CÚCUTA','54');
INSERT INTO `municipio` VALUES ('54003','ABREGO','54');
INSERT INTO `municipio` VALUES ('54051','ARBOLEDAS','54');
INSERT INTO `municipio` VALUES ('54099','BOCHALEMA','54');
INSERT INTO `municipio` VALUES ('54109','BUCARASICA','54');
INSERT INTO `municipio` VALUES ('5411','LIBORINA','5');
INSERT INTO `municipio` VALUES ('54125','CÁCOTA','54');
INSERT INTO `municipio` VALUES ('54128','CACHIRÁ','54');
INSERT INTO `municipio` VALUES ('54172','CHINÁCOTA','54');
INSERT INTO `municipio` VALUES ('54174','CHITAGÁ','54');
INSERT INTO `municipio` VALUES ('54206','CONVENCIÓN','54');
INSERT INTO `municipio` VALUES ('54223','CUCUTILLA','54');
INSERT INTO `municipio` VALUES ('54239','DURANIA','54');
INSERT INTO `municipio` VALUES ('54245','EL CARMEN','54');
INSERT INTO `municipio` VALUES ('5425','MACEO','5');
INSERT INTO `municipio` VALUES ('54250','EL TARRA','54');
INSERT INTO `municipio` VALUES ('54261','EL ZULIA','54');
INSERT INTO `municipio` VALUES ('54313','GRAMALOTE','54');
INSERT INTO `municipio` VALUES ('54344','HACARÍ','54');
INSERT INTO `municipio` VALUES ('54347','HERRÁN','54');
INSERT INTO `municipio` VALUES ('54377','LABATECA','54');
INSERT INTO `municipio` VALUES ('54385','LA ESPERANZA','54');
INSERT INTO `municipio` VALUES ('54398','LA PLAYA','54');
INSERT INTO `municipio` VALUES ('5440','MARINILLA','5');
INSERT INTO `municipio` VALUES ('54405','LOS PATIOS','54');
INSERT INTO `municipio` VALUES ('54418','LOURDES','54');
INSERT INTO `municipio` VALUES ('54480','MUTISCUA','54');
INSERT INTO `municipio` VALUES ('54498','OCAÑA','54');
INSERT INTO `municipio` VALUES ('54518','PAMPLONA','54');
INSERT INTO `municipio` VALUES ('54520','PAMPLONITA','54');
INSERT INTO `municipio` VALUES ('54553','PUERTO SANTANDER','54');
INSERT INTO `municipio` VALUES ('54599','RAGONVALIA','54');
INSERT INTO `municipio` VALUES ('54660','SALAZAR','54');
INSERT INTO `municipio` VALUES ('5467','MONTEBELLO','5');
INSERT INTO `municipio` VALUES ('54670','SAN CALIXTO','54');
INSERT INTO `municipio` VALUES ('54673','SAN CAYETANO','54');
INSERT INTO `municipio` VALUES ('54680','SANTIAGO','54');
INSERT INTO `municipio` VALUES ('54720','SARDINATA','54');
INSERT INTO `municipio` VALUES ('54743','SILOS','54');
INSERT INTO `municipio` VALUES ('5475','MURINDÓ','5');
INSERT INTO `municipio` VALUES ('5480','MUTATÁ','5');
INSERT INTO `municipio` VALUES ('54800','TEORAMA','54');
INSERT INTO `municipio` VALUES ('54810','TIBÚ','54');
INSERT INTO `municipio` VALUES ('54820','TOLEDO','54');
INSERT INTO `municipio` VALUES ('5483','NARIÑO','5');
INSERT INTO `municipio` VALUES ('54871','VILLA CARO','54');
INSERT INTO `municipio` VALUES ('54874','VILLA DEL ROSARIO','54');
INSERT INTO `municipio` VALUES ('5490','NECOCLÍ','5');
INSERT INTO `municipio` VALUES ('5495','NECHÍ','5');
INSERT INTO `municipio` VALUES ('5501','OLAYA','5');
INSERT INTO `municipio` VALUES ('5541','PEÑOL','5');
INSERT INTO `municipio` VALUES ('5543','PEQUE','5');
INSERT INTO `municipio` VALUES ('5576','PUEBLORRICO','5');
INSERT INTO `municipio` VALUES ('5579','PUERTO BERRÍO','5');
INSERT INTO `municipio` VALUES ('5585','PUERTO NARE','5');
INSERT INTO `municipio` VALUES ('5591','PUERTO TRIUNFO','5');
INSERT INTO `municipio` VALUES ('5604','REMEDIOS','5');
INSERT INTO `municipio` VALUES ('5607','RETIRO','5');
INSERT INTO `municipio` VALUES ('5615','RIONEGRO','5');
INSERT INTO `municipio` VALUES ('5628','SABANALARGA','5');
INSERT INTO `municipio` VALUES ('5631','SABANETA','5');
INSERT INTO `municipio` VALUES ('5642','SALGAR','5');
INSERT INTO `municipio` VALUES ('5647','SAN ANDRÉS DE CUERQUÍA','5');
INSERT INTO `municipio` VALUES ('5649','SAN CARLOS','5');
INSERT INTO `municipio` VALUES ('5652','SAN FRANCISCO','5');
INSERT INTO `municipio` VALUES ('5656','SAN JERÓNIMO','5');
INSERT INTO `municipio` VALUES ('5658','SAN JOSÉ DE LA MONTAÑA','5');
INSERT INTO `municipio` VALUES ('5659','SAN JUAN DE URABÁ','5');
INSERT INTO `municipio` VALUES ('5660','SAN LUIS','5');
INSERT INTO `municipio` VALUES ('5664','SAN PEDRO DE LOS MILAGROS','5');
INSERT INTO `municipio` VALUES ('5665','SAN PEDRO DE URABA','5');
INSERT INTO `municipio` VALUES ('5667','SAN RAFAEL','5');
INSERT INTO `municipio` VALUES ('5670','SAN ROQUE','5');
INSERT INTO `municipio` VALUES ('5674','SAN VICENTE','5');
INSERT INTO `municipio` VALUES ('5679','SANTA BÁRBARA','5');
INSERT INTO `municipio` VALUES ('5686','SANTA ROSA DE OSOS','5');
INSERT INTO `municipio` VALUES ('5690','SANTO DOMINGO','5');
INSERT INTO `municipio` VALUES ('5697','EL SANTUARIO','5');
INSERT INTO `municipio` VALUES ('5736','SEGOVIA','5');
INSERT INTO `municipio` VALUES ('5756','SONSON','5');
INSERT INTO `municipio` VALUES ('5761','SOPETRÁN','5');
INSERT INTO `municipio` VALUES ('5789','TÁMESIS','5');
INSERT INTO `municipio` VALUES ('5790','TARAZÁ','5');
INSERT INTO `municipio` VALUES ('5792','TARSO','5');
INSERT INTO `municipio` VALUES ('5809','TITIRIBÍ','5');
INSERT INTO `municipio` VALUES ('5819','TOLEDO','5');
INSERT INTO `municipio` VALUES ('5837','TURBO','5');
INSERT INTO `municipio` VALUES ('5842','URAMITA','5');
INSERT INTO `municipio` VALUES ('5847','URRAO','5');
INSERT INTO `municipio` VALUES ('5854','VALDIVIA','5');
INSERT INTO `municipio` VALUES ('5856','VALPARAÍSO','5');
INSERT INTO `municipio` VALUES ('5858','VEGACHÍ','5');
INSERT INTO `municipio` VALUES ('5861','VENECIA','5');
INSERT INTO `municipio` VALUES ('5873','VIGÍA DEL FUERTE','5');
INSERT INTO `municipio` VALUES ('5885','YALÍ','5');
INSERT INTO `municipio` VALUES ('5887','YARUMAL','5');
INSERT INTO `municipio` VALUES ('5890','YOLOMBÓ','5');
INSERT INTO `municipio` VALUES ('5893','YONDÓ','5');
INSERT INTO `municipio` VALUES ('5895','ZARAGOZA','5');
INSERT INTO `municipio` VALUES ('63001','ARMENIA','63');
INSERT INTO `municipio` VALUES ('63111','BUENAVISTA','63');
INSERT INTO `municipio` VALUES ('63130','CALARCA','63');
INSERT INTO `municipio` VALUES ('63190','CIRCASIA','63');
INSERT INTO `municipio` VALUES ('63212','CÓRDOBA','63');
INSERT INTO `municipio` VALUES ('63272','FILANDIA','63');
INSERT INTO `municipio` VALUES ('63302','GÉNOVA','63');
INSERT INTO `municipio` VALUES ('63401','LA TEBAIDA','63');
INSERT INTO `municipio` VALUES ('63470','MONTENEGRO','63');
INSERT INTO `municipio` VALUES ('63548','PIJAO','63');
INSERT INTO `municipio` VALUES ('63594','QUIMBAYA','63');
INSERT INTO `municipio` VALUES ('63690','SALENTO','63');
INSERT INTO `municipio` VALUES ('66001','PEREIRA','66');
INSERT INTO `municipio` VALUES ('66045','APÍA','66');
INSERT INTO `municipio` VALUES ('66075','BALBOA','66');
INSERT INTO `municipio` VALUES ('66088','BELÉN DE UMBRÍA','66');
INSERT INTO `municipio` VALUES ('66170','DOSQUEBRADAS','66');
INSERT INTO `municipio` VALUES ('66318','GUÁTICA','66');
INSERT INTO `municipio` VALUES ('66383','LA CELIA','66');
INSERT INTO `municipio` VALUES ('66400','LA VIRGINIA','66');
INSERT INTO `municipio` VALUES ('66440','MARSELLA','66');
INSERT INTO `municipio` VALUES ('66456','MISTRATÓ','66');
INSERT INTO `municipio` VALUES ('66572','PUEBLO RICO','66');
INSERT INTO `municipio` VALUES ('66594','QUINCHÍA','66');
INSERT INTO `municipio` VALUES ('66682','SANTA ROSA DE CABAL','66');
INSERT INTO `municipio` VALUES ('66687','SANTUARIO','66');
INSERT INTO `municipio` VALUES ('68001','BUCARAMANGA','68');
INSERT INTO `municipio` VALUES ('68013','AGUADA','68');
INSERT INTO `municipio` VALUES ('68020','ALBANIA','68');
INSERT INTO `municipio` VALUES ('68051','ARATOCA','68');
INSERT INTO `municipio` VALUES ('68077','BARBOSA','68');
INSERT INTO `municipio` VALUES ('68079','BARICHARA','68');
INSERT INTO `municipio` VALUES ('68081','BARRANCABERMEJA','68');
INSERT INTO `municipio` VALUES ('68092','BETULIA','68');
INSERT INTO `municipio` VALUES ('68101','BOLÍVAR','68');
INSERT INTO `municipio` VALUES ('68121','CABRERA','68');
INSERT INTO `municipio` VALUES ('68132','CALIFORNIA','68');
INSERT INTO `municipio` VALUES ('68147','CAPITANEJO','68');
INSERT INTO `municipio` VALUES ('68152','CARCASÍ','68');
INSERT INTO `municipio` VALUES ('68160','CEPITÁ','68');
INSERT INTO `municipio` VALUES ('68162','CERRITO','68');
INSERT INTO `municipio` VALUES ('68167','CHARALÁ','68');
INSERT INTO `municipio` VALUES ('68169','CHARTA','68');
INSERT INTO `municipio` VALUES ('68176','CHIMA','68');
INSERT INTO `municipio` VALUES ('68179','CHIPATÁ','68');
INSERT INTO `municipio` VALUES ('68190','CIMITARRA','68');
INSERT INTO `municipio` VALUES ('68207','CONCEPCIÓN','68');
INSERT INTO `municipio` VALUES ('68209','CONFINES','68');
INSERT INTO `municipio` VALUES ('68211','CONTRATACIÓN','68');
INSERT INTO `municipio` VALUES ('68217','COROMORO','68');
INSERT INTO `municipio` VALUES ('68229','CURITÍ','68');
INSERT INTO `municipio` VALUES ('68235','EL CARMEN DE CHUCURÍ','68');
INSERT INTO `municipio` VALUES ('68245','EL GUACAMAYO','68');
INSERT INTO `municipio` VALUES ('68250','EL PEÑÓN','68');
INSERT INTO `municipio` VALUES ('68255','EL PLAYÓN','68');
INSERT INTO `municipio` VALUES ('68264','ENCINO','68');
INSERT INTO `municipio` VALUES ('68266','ENCISO','68');
INSERT INTO `municipio` VALUES ('68271','FLORIÁN','68');
INSERT INTO `municipio` VALUES ('68276','FLORIDABLANCA','68');
INSERT INTO `municipio` VALUES ('68296','GALÁN','68');
INSERT INTO `municipio` VALUES ('68298','GAMBITA','68');
INSERT INTO `municipio` VALUES ('68307','GIRÓN','68');
INSERT INTO `municipio` VALUES ('68318','GUACA','68');
INSERT INTO `municipio` VALUES ('68320','GUADALUPE','68');
INSERT INTO `municipio` VALUES ('68322','GUAPOTÁ','68');
INSERT INTO `municipio` VALUES ('68324','GUAVATÁ','68');
INSERT INTO `municipio` VALUES ('68327','GÜEPSA','68');
INSERT INTO `municipio` VALUES ('68344','HATO','68');
INSERT INTO `municipio` VALUES ('68368','JESÚS MARÍA','68');
INSERT INTO `municipio` VALUES ('68370','JORDÁN','68');
INSERT INTO `municipio` VALUES ('68377','LA BELLEZA','68');
INSERT INTO `municipio` VALUES ('68385','LANDÁZURI','68');
INSERT INTO `municipio` VALUES ('68397','LA PAZ','68');
INSERT INTO `municipio` VALUES ('68406','LEBRIJA','68');
INSERT INTO `municipio` VALUES ('68418','LOS SANTOS','68');
INSERT INTO `municipio` VALUES ('68425','MACARAVITA','68');
INSERT INTO `municipio` VALUES ('68432','MÁLAGA','68');
INSERT INTO `municipio` VALUES ('68444','MATANZA','68');
INSERT INTO `municipio` VALUES ('68464','MOGOTES','68');
INSERT INTO `municipio` VALUES ('68468','MOLAGAVITA','68');
INSERT INTO `municipio` VALUES ('68498','OCAMONTE','68');
INSERT INTO `municipio` VALUES ('68500','OIBA','68');
INSERT INTO `municipio` VALUES ('68502','ONZAGA','68');
INSERT INTO `municipio` VALUES ('68522','PALMAR','68');
INSERT INTO `municipio` VALUES ('68524','PALMAS DEL SOCORRO','68');
INSERT INTO `municipio` VALUES ('68533','PÁRAMO','68');
INSERT INTO `municipio` VALUES ('68547','PIEDECUESTA','68');
INSERT INTO `municipio` VALUES ('68549','PINCHOTE','68');
INSERT INTO `municipio` VALUES ('68572','PUENTE NACIONAL','68');
INSERT INTO `municipio` VALUES ('68573','PUERTO PARRA','68');
INSERT INTO `municipio` VALUES ('68575','PUERTO WILCHES','68');
INSERT INTO `municipio` VALUES ('68615','RIONEGRO','68');
INSERT INTO `municipio` VALUES ('68655','SABANA DE TORRES','68');
INSERT INTO `municipio` VALUES ('68669','SAN ANDRÉS','68');
INSERT INTO `municipio` VALUES ('68673','SAN BENITO','68');
INSERT INTO `municipio` VALUES ('68679','SAN GIL','68');
INSERT INTO `municipio` VALUES ('68682','SAN JOAQUÍN','68');
INSERT INTO `municipio` VALUES ('68684','SAN JOSÉ DE MIRANDA','68');
INSERT INTO `municipio` VALUES ('68686','SAN MIGUEL','68');
INSERT INTO `municipio` VALUES ('68689','SAN VICENTE DE CHUCURÍ','68');
INSERT INTO `municipio` VALUES ('68705','SANTA BÁRBARA','68');
INSERT INTO `municipio` VALUES ('68720','SANTA HELENA DEL OPÓN','68');
INSERT INTO `municipio` VALUES ('68745','SIMACOTA','68');
INSERT INTO `municipio` VALUES ('68755','SOCORRO','68');
INSERT INTO `municipio` VALUES ('68770','SUAITA','68');
INSERT INTO `municipio` VALUES ('68773','SUCRE','68');
INSERT INTO `municipio` VALUES ('68780','SURATÁ','68');
INSERT INTO `municipio` VALUES ('68820','TONA','68');
INSERT INTO `municipio` VALUES ('68855','VALLE DE SAN JOSÉ','68');
INSERT INTO `municipio` VALUES ('68861','VÉLEZ','68');
INSERT INTO `municipio` VALUES ('68867','VETAS','68');
INSERT INTO `municipio` VALUES ('68872','VILLANUEVA','68');
INSERT INTO `municipio` VALUES ('68895','ZAPATOCA','68');
INSERT INTO `municipio` VALUES ('70001','SINCELEJO','70');
INSERT INTO `municipio` VALUES ('70110','BUENAVISTA','70');
INSERT INTO `municipio` VALUES ('70124','CAIMITO','70');
INSERT INTO `municipio` VALUES ('70204','COLOSO','70');
INSERT INTO `municipio` VALUES ('70215','COROZAL','70');
INSERT INTO `municipio` VALUES ('70221','COVEÑAS','70');
INSERT INTO `municipio` VALUES ('70230','CHALÁN','70');
INSERT INTO `municipio` VALUES ('70233','EL ROBLE','70');
INSERT INTO `municipio` VALUES ('70235','GALERAS','70');
INSERT INTO `municipio` VALUES ('70265','GUARANDA','70');
INSERT INTO `municipio` VALUES ('70400','LA UNIÓN','70');
INSERT INTO `municipio` VALUES ('70418','LOS PALMITOS','70');
INSERT INTO `municipio` VALUES ('70429','MAJAGUAL','70');
INSERT INTO `municipio` VALUES ('70473','MORROA','70');
INSERT INTO `municipio` VALUES ('70508','OVEJAS','70');
INSERT INTO `municipio` VALUES ('70523','PALMITO','70');
INSERT INTO `municipio` VALUES ('70670','SAMPUÉS','70');
INSERT INTO `municipio` VALUES ('70678','SAN BENITO ABAD','70');
INSERT INTO `municipio` VALUES ('70702','SAN JUAN DE BETULIA','70');
INSERT INTO `municipio` VALUES ('70708','SAN MARCOS','70');
INSERT INTO `municipio` VALUES ('70713','SAN ONOFRE','70');
INSERT INTO `municipio` VALUES ('70717','SAN PEDRO','70');
INSERT INTO `municipio` VALUES ('70742','SAN LUIS DE SINCÉ','70');
INSERT INTO `municipio` VALUES ('70771','SUCRE','70');
INSERT INTO `municipio` VALUES ('70820','SANTIAGO DE TOLÚ','70');
INSERT INTO `municipio` VALUES ('70823','TOLÚ VIEJO','70');
INSERT INTO `municipio` VALUES ('73001','IBAGUÉ','73');
INSERT INTO `municipio` VALUES ('73024','ALPUJARRA','73');
INSERT INTO `municipio` VALUES ('73026','ALVARADO','73');
INSERT INTO `municipio` VALUES ('73030','AMBALEMA','73');
INSERT INTO `municipio` VALUES ('73043','ANZOÁTEGUI','73');
INSERT INTO `municipio` VALUES ('73055','ARMERO','73');
INSERT INTO `municipio` VALUES ('73067','ATACO','73');
INSERT INTO `municipio` VALUES ('73124','CAJAMARCA','73');
INSERT INTO `municipio` VALUES ('73148','CARMEN DE APICALÁ','73');
INSERT INTO `municipio` VALUES ('73152','CASABIANCA','73');
INSERT INTO `municipio` VALUES ('73168','CHAPARRAL','73');
INSERT INTO `municipio` VALUES ('73200','COELLO','73');
INSERT INTO `municipio` VALUES ('73217','COYAIMA','73');
INSERT INTO `municipio` VALUES ('73226','CUNDAY','73');
INSERT INTO `municipio` VALUES ('73236','DOLORES','73');
INSERT INTO `municipio` VALUES ('73268','ESPINAL','73');
INSERT INTO `municipio` VALUES ('73270','FALAN','73');
INSERT INTO `municipio` VALUES ('73275','FLANDES','73');
INSERT INTO `municipio` VALUES ('73283','FRESNO','73');
INSERT INTO `municipio` VALUES ('73319','GUAMO','73');
INSERT INTO `municipio` VALUES ('73347','HERVEO','73');
INSERT INTO `municipio` VALUES ('73349','HONDA','73');
INSERT INTO `municipio` VALUES ('73352','ICONONZO','73');
INSERT INTO `municipio` VALUES ('73408','LÉRIDA','73');
INSERT INTO `municipio` VALUES ('73411','LÍBANO','73');
INSERT INTO `municipio` VALUES ('73443','SAN SEBASTIÁN DE MARIQUITA','73');
INSERT INTO `municipio` VALUES ('73449','MELGAR','73');
INSERT INTO `municipio` VALUES ('73461','MURILLO','73');
INSERT INTO `municipio` VALUES ('73483','NATAGAIMA','73');
INSERT INTO `municipio` VALUES ('73504','ORTEGA','73');
INSERT INTO `municipio` VALUES ('73520','PALOCABILDO','73');
INSERT INTO `municipio` VALUES ('73547','PIEDRAS','73');
INSERT INTO `municipio` VALUES ('73555','PLANADAS','73');
INSERT INTO `municipio` VALUES ('73563','PRADO','73');
INSERT INTO `municipio` VALUES ('73585','PURIFICACIÓN','73');
INSERT INTO `municipio` VALUES ('73616','RIOBLANCO','73');
INSERT INTO `municipio` VALUES ('73622','RONCESVALLES','73');
INSERT INTO `municipio` VALUES ('73624','ROVIRA','73');
INSERT INTO `municipio` VALUES ('73671','SALDAÑA','73');
INSERT INTO `municipio` VALUES ('73675','SAN ANTONIO','73');
INSERT INTO `municipio` VALUES ('73678','SAN LUIS','73');
INSERT INTO `municipio` VALUES ('73686','SANTA ISABEL','73');
INSERT INTO `municipio` VALUES ('73770','SUÁREZ','73');
INSERT INTO `municipio` VALUES ('73854','VALLE DE SAN JUAN','73');
INSERT INTO `municipio` VALUES ('73861','VENADILLO','73');
INSERT INTO `municipio` VALUES ('73870','VILLAHERMOSA','73');
INSERT INTO `municipio` VALUES ('73873','VILLARRICA','73');
INSERT INTO `municipio` VALUES ('76001','CALI','76');
INSERT INTO `municipio` VALUES ('76020','ALCALÁ','76');
INSERT INTO `municipio` VALUES ('76036','ANDALUCÍA','76');
INSERT INTO `municipio` VALUES ('76041','ANSERMANUEVO','76');
INSERT INTO `municipio` VALUES ('76054','ARGELIA','76');
INSERT INTO `municipio` VALUES ('76100','BOLÍVAR','76');
INSERT INTO `municipio` VALUES ('76109','BUENAVENTURA','76');
INSERT INTO `municipio` VALUES ('76111','GUADALAJARA DE BUGA','76');
INSERT INTO `municipio` VALUES ('76113','BUGALAGRANDE','76');
INSERT INTO `municipio` VALUES ('76122','CAICEDONIA','76');
INSERT INTO `municipio` VALUES ('76126','CALIMA','76');
INSERT INTO `municipio` VALUES ('76130','CANDELARIA','76');
INSERT INTO `municipio` VALUES ('76147','CARTAGO','76');
INSERT INTO `municipio` VALUES ('76233','DAGUA','76');
INSERT INTO `municipio` VALUES ('76243','EL ÁGUILA','76');
INSERT INTO `municipio` VALUES ('76246','EL CAIRO','76');
INSERT INTO `municipio` VALUES ('76248','EL CERRITO','76');
INSERT INTO `municipio` VALUES ('76250','EL DOVIO','76');
INSERT INTO `municipio` VALUES ('76275','FLORIDA','76');
INSERT INTO `municipio` VALUES ('76306','GINEBRA','76');
INSERT INTO `municipio` VALUES ('76318','GUACARÍ','76');
INSERT INTO `municipio` VALUES ('76364','JAMUNDÍ','76');
INSERT INTO `municipio` VALUES ('76377','LA CUMBRE','76');
INSERT INTO `municipio` VALUES ('76400','LA UNIÓN','76');
INSERT INTO `municipio` VALUES ('76403','LA VICTORIA','76');
INSERT INTO `municipio` VALUES ('76497','OBANDO','76');
INSERT INTO `municipio` VALUES ('76520','PALMIRA','76');
INSERT INTO `municipio` VALUES ('76563','PRADERA','76');
INSERT INTO `municipio` VALUES ('76606','RESTREPO','76');
INSERT INTO `municipio` VALUES ('76616','RIOFRÍO','76');
INSERT INTO `municipio` VALUES ('76622','ROLDANILLO','76');
INSERT INTO `municipio` VALUES ('76670','SAN PEDRO','76');
INSERT INTO `municipio` VALUES ('76736','SEVILLA','76');
INSERT INTO `municipio` VALUES ('76823','TORO','76');
INSERT INTO `municipio` VALUES ('76828','TRUJILLO','76');
INSERT INTO `municipio` VALUES ('76834','TULUÁ','76');
INSERT INTO `municipio` VALUES ('76845','ULLOA','76');
INSERT INTO `municipio` VALUES ('76863','VERSALLES','76');
INSERT INTO `municipio` VALUES ('76869','VIJES','76');
INSERT INTO `municipio` VALUES ('76890','YOTOCO','76');
INSERT INTO `municipio` VALUES ('76892','YUMBO','76');
INSERT INTO `municipio` VALUES ('76895','ZARZAL','76');
INSERT INTO `municipio` VALUES ('8001','BARRANQUILLA','8');
INSERT INTO `municipio` VALUES ('8078','BARANOA','8');
INSERT INTO `municipio` VALUES ('81001','ARAUCA','81');
INSERT INTO `municipio` VALUES ('81065','ARAUQUITA','81');
INSERT INTO `municipio` VALUES ('81220','CRAVO NORTE','81');
INSERT INTO `municipio` VALUES ('81300','FORTUL','81');
INSERT INTO `municipio` VALUES ('8137','CAMPO DE LA CRUZ','8');
INSERT INTO `municipio` VALUES ('8141','CANDELARIA','8');
INSERT INTO `municipio` VALUES ('81591','PUERTO RONDÓN','81');
INSERT INTO `municipio` VALUES ('81736','SARAVENA','81');
INSERT INTO `municipio` VALUES ('81794','TAME','81');
INSERT INTO `municipio` VALUES ('8296','GALAPA','8');
INSERT INTO `municipio` VALUES ('8372','JUAN DE ACOSTA','8');
INSERT INTO `municipio` VALUES ('8421','LURUACO','8');
INSERT INTO `municipio` VALUES ('8433','MALAMBO','8');
INSERT INTO `municipio` VALUES ('8436','MANATÍ','8');
INSERT INTO `municipio` VALUES ('85001','YOPAL','85');
INSERT INTO `municipio` VALUES ('85010','AGUAZUL','85');
INSERT INTO `municipio` VALUES ('85015','CHAMEZA','85');
INSERT INTO `municipio` VALUES ('85125','HATO COROZAL','85');
INSERT INTO `municipio` VALUES ('85136','LA SALINA','85');
INSERT INTO `municipio` VALUES ('85139','MANÍ','85');
INSERT INTO `municipio` VALUES ('85162','MONTERREY','85');
INSERT INTO `municipio` VALUES ('8520','PALMAR DE VARELA','8');
INSERT INTO `municipio` VALUES ('85225','NUNCHÍA','85');
INSERT INTO `municipio` VALUES ('85230','OROCUÉ','85');
INSERT INTO `municipio` VALUES ('85250','PAZ DE ARIPORO','85');
INSERT INTO `municipio` VALUES ('85263','PORE','85');
INSERT INTO `municipio` VALUES ('85279','RECETOR','85');
INSERT INTO `municipio` VALUES ('85300','SABANALARGA','85');
INSERT INTO `municipio` VALUES ('85315','SÁCAMA','85');
INSERT INTO `municipio` VALUES ('85325','SAN LUIS DE PALENQUE','85');
INSERT INTO `municipio` VALUES ('85400','TÁMARA','85');
INSERT INTO `municipio` VALUES ('85410','TAURAMENA','85');
INSERT INTO `municipio` VALUES ('85430','TRINIDAD','85');
INSERT INTO `municipio` VALUES ('85440','VILLANUEVA','85');
INSERT INTO `municipio` VALUES ('8549','PIOJÓ','8');
INSERT INTO `municipio` VALUES ('8558','POLONUEVO','8');
INSERT INTO `municipio` VALUES ('8560','PONEDERA','8');
INSERT INTO `municipio` VALUES ('8573','PUERTO COLOMBIA','8');
INSERT INTO `municipio` VALUES ('86001','MOCOA','85');
INSERT INTO `municipio` VALUES ('8606','REPELÓN','8');
INSERT INTO `municipio` VALUES ('86219','COLÓN','85');
INSERT INTO `municipio` VALUES ('86320','ORITO','85');
INSERT INTO `municipio` VALUES ('8634','SABANAGRANDE','8');
INSERT INTO `municipio` VALUES ('8638','SABANALARGA','8');
INSERT INTO `municipio` VALUES ('86568','PUERTO ASÍS','85');
INSERT INTO `municipio` VALUES ('86569','PUERTO CAICEDO','85');
INSERT INTO `municipio` VALUES ('86571','PUERTO GUZMÁN','85');
INSERT INTO `municipio` VALUES ('86573','PUERTO LEGUÍZAMO','85');
INSERT INTO `municipio` VALUES ('86749','SIBUNDOY','85');
INSERT INTO `municipio` VALUES ('8675','SANTA LUCÍA','8');
INSERT INTO `municipio` VALUES ('86755','SAN FRANCISCO','85');
INSERT INTO `municipio` VALUES ('86757','SAN MIGUEL','85');
INSERT INTO `municipio` VALUES ('86760','SANTIAGO','85');
INSERT INTO `municipio` VALUES ('8685','SANTO TOMÁS','8');
INSERT INTO `municipio` VALUES ('86865','VALLE DEL GUAMUEZ','85');
INSERT INTO `municipio` VALUES ('86885','VILLAGARZÓN','85');
INSERT INTO `municipio` VALUES ('8758','SOLEDAD','8');
INSERT INTO `municipio` VALUES ('8770','SUAN','8');
INSERT INTO `municipio` VALUES ('88001','SAN ANDRÉS','88');
INSERT INTO `municipio` VALUES ('8832','TUBARÁ','8');
INSERT INTO `municipio` VALUES ('8849','USIACURÍ','8');
INSERT INTO `municipio` VALUES ('88564','PROVIDENCIA','88');
INSERT INTO `municipio` VALUES ('91001','LETICIA','91');
INSERT INTO `municipio` VALUES ('91263','EL ENCANTO','91');
INSERT INTO `municipio` VALUES ('91405','LA CHORRERA','91');
INSERT INTO `municipio` VALUES ('91407','LA PEDRERA','91');
INSERT INTO `municipio` VALUES ('91430','LA VICTORIA','91');
INSERT INTO `municipio` VALUES ('91460','MIRITI - PARANÁ','91');
INSERT INTO `municipio` VALUES ('91530','PUERTO ALEGRÍA','91');
INSERT INTO `municipio` VALUES ('91536','PUERTO ARICA','91');
INSERT INTO `municipio` VALUES ('91540','PUERTO NARIÑO','91');
INSERT INTO `municipio` VALUES ('91669','PUERTO SANTANDER','91');
INSERT INTO `municipio` VALUES ('91798','TARAPACÁ','91');
INSERT INTO `municipio` VALUES ('94001','INÍRIDA','94');
INSERT INTO `municipio` VALUES ('94343','BARRANCO MINAS','94');
INSERT INTO `municipio` VALUES ('94663','MAPIRIPANA','94');
INSERT INTO `municipio` VALUES ('94883','SAN FELIPE','94');
INSERT INTO `municipio` VALUES ('94884','PUERTO COLOMBIA','94');
INSERT INTO `municipio` VALUES ('94885','LA GUADALUPE','94');
INSERT INTO `municipio` VALUES ('94886','CACAHUAL','94');
INSERT INTO `municipio` VALUES ('94887','PANA PANA','94');
INSERT INTO `municipio` VALUES ('94888','MORICHAL','94');
INSERT INTO `municipio` VALUES ('95001','SAN JOSÉ DEL GUAVIARE','95');
INSERT INTO `municipio` VALUES ('95015','CALAMAR','95');
INSERT INTO `municipio` VALUES ('95025','EL RETORNO','95');
INSERT INTO `municipio` VALUES ('95200','MIRAFLORES','95');
INSERT INTO `municipio` VALUES ('97001','MITÚ','97');
INSERT INTO `municipio` VALUES ('97161','CARURU','97');
INSERT INTO `municipio` VALUES ('97511','PACOA','97');
INSERT INTO `municipio` VALUES ('97666','TARAIRA','97');
INSERT INTO `municipio` VALUES ('97777','PAPUNAUA','97');
INSERT INTO `municipio` VALUES ('97889','YAVARATÉ','97');
INSERT INTO `municipio` VALUES ('99001','PUERTO CARREÑO','99');
INSERT INTO `municipio` VALUES ('99524','LA PRIMAVERA','99');
INSERT INTO `municipio` VALUES ('99624','SANTA ROSALÍA','99');
INSERT INTO `municipio` VALUES ('99773','CUMARIBO','99');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table proceso_productivo
#

CREATE TABLE `proceso_productivo` (
  `id_proceso_productivo` int(11) NOT NULL auto_increment,
  `id_tipo_proceso` int(11) NOT NULL,
  `id_tipo_pila` int(11) NOT NULL,
  `id_medida_termica` int(11) default NULL,
  `identificacion_de_pila` varchar(5) default NULL,
  `identificacion_de_cama` varchar(5) default NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `cantidad_terminada` varchar(5) NOT NULL,
  `fecha_ficha_tecnica` date NOT NULL,
  `temperatura` varchar(5) default NULL,
  `ph` varchar(20) default NULL,
  `humedad` varchar(20) default NULL,
  `olor` varchar(100) default NULL,
  `color` varchar(20) default NULL,
  `textura` varchar(100) default NULL,
  `id_unidad_medida` int(11) NOT NULL,
  `observaciones` text,
  PRIMARY KEY  (`id_proceso_productivo`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_tipo_proceso` (`id_tipo_proceso`),
  KEY `id_tipo_pila` (`id_tipo_pila`),
  KEY `id_medida_termica` (`id_medida_termica`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Dumping data for table proceso_productivo
#
LOCK TABLES `proceso_productivo` WRITE;
/*!40000 ALTER TABLE `proceso_productivo` DISABLE KEYS */;

INSERT INTO `proceso_productivo` VALUES (1,3,1,1,'1','N1','0000-00-00','0000-00-00','1','0000-00-00','40','10,1','15','1','1','1',1,'1');
INSERT INTO `proceso_productivo` VALUES (2,1,2,1,'2','N2','0000-00-00','0000-00-00','10000','0000-00-00','40','10,4','11','1','1','1',1,'1');
INSERT INTO `proceso_productivo` VALUES (3,4,1,1,'3','N3','0000-00-00','0000-00-00','10000','0000-00-00','42','3,4','20','1','1','1',5,'1');
INSERT INTO `proceso_productivo` VALUES (4,2,2,1,'4','N4','0000-00-00','0000-00-00','100','0000-00-00','38','8,9','17','1','1','1',9,'1');
/*!40000 ALTER TABLE `proceso_productivo` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table productos
#

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL auto_increment,
  `nombre_producto` varchar(50) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY  (`id_producto`),
  KEY `id_tipo_producto` (`id_tipo_producto`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Dumping data for table productos
#
LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;

INSERT INTO `productos` VALUES (1,'Compost',2,1);
INSERT INTO `productos` VALUES (2,'Compost',2,2);
INSERT INTO `productos` VALUES (3,'lombrocompost',2,1);
INSERT INTO `productos` VALUES (4,'lombrinaza',2,1);
INSERT INTO `productos` VALUES (5,'semilla de lombriz',2,1);
INSERT INTO `productos` VALUES (6,'purin la finca',1,1);
INSERT INTO `productos` VALUES (7,'humus mineralizado',1,1);
INSERT INTO `productos` VALUES (8,'humus liquido',1,1);
INSERT INTO `productos` VALUES (9,'humus basico',1,1);
INSERT INTO `productos` VALUES (10,'agrofertil',1,1);
INSERT INTO `productos` VALUES (11,'compost',2,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table programa_formacion
#

CREATE TABLE `programa_formacion` (
  `id_programa` int(11) NOT NULL auto_increment,
  `nombre_programa` varchar(60) NOT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY  (`id_programa`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8;

#
# Dumping data for table programa_formacion
#
LOCK TABLES `programa_formacion` WRITE;
/*!40000 ALTER TABLE `programa_formacion` DISABLE KEYS */;

INSERT INTO `programa_formacion` VALUES (1,'Administración de empresas ',1);
INSERT INTO `programa_formacion` VALUES (2,'Administración de empresas agropecuarias',2);
INSERT INTO `programa_formacion` VALUES (3,'Administración de empresas cafeteras',3);
INSERT INTO `programa_formacion` VALUES (4,'Administración del ensamble y mantenimientos de computadores',4);
INSERT INTO `programa_formacion` VALUES (5,'Agricultura de precisión',5);
INSERT INTO `programa_formacion` VALUES (6,'Agrobiotecnología',6);
INSERT INTO `programa_formacion` VALUES (7,'Agroindustria alimentaria',7);
INSERT INTO `programa_formacion` VALUES (8,'Análisis y desarrollo de sistemas de información',8);
INSERT INTO `programa_formacion` VALUES (9,'Animación en 3D',9);
INSERT INTO `programa_formacion` VALUES (10,'Aplicación de metodologías en los procesos catastrales',10);
INSERT INTO `programa_formacion` VALUES (11,'Apoyo administrativo en salud',11);
INSERT INTO `programa_formacion` VALUES (12,'Aseguramiento de la calidad del café en la finca',12);
INSERT INTO `programa_formacion` VALUES (13,'Asesoría comercial y operaciones de entidades',13);
INSERT INTO `programa_formacion` VALUES (14,'Asistencia administrativa',14);
INSERT INTO `programa_formacion` VALUES (15,'Asistencia en organización de archivos',15);
INSERT INTO `programa_formacion` VALUES (16,'Atención integral a la primera infancia',1);
INSERT INTO `programa_formacion` VALUES (17,'Auxiliar contable',2);
INSERT INTO `programa_formacion` VALUES (18,'Auxiliar en mecánica automotriz',3);
INSERT INTO `programa_formacion` VALUES (19,'Biocomercio sostenible',4);
INSERT INTO `programa_formacion` VALUES (20,'Biotecnología animal',5);
INSERT INTO `programa_formacion` VALUES (21,'Biotecnología industrial',6);
INSERT INTO `programa_formacion` VALUES (22,'Biotecnología vegetal',7);
INSERT INTO `programa_formacion` VALUES (23,'Carpintería',8);
INSERT INTO `programa_formacion` VALUES (24,'Cocina',9);
INSERT INTO `programa_formacion` VALUES (25,'Comercialización de alimentos',10);
INSERT INTO `programa_formacion` VALUES (26,'Construcción de edificaciones',11);
INSERT INTO `programa_formacion` VALUES (27,'Construcción de estructuras en guadua',12);
INSERT INTO `programa_formacion` VALUES (28,'Construcciones livianas en seco',13);
INSERT INTO `programa_formacion` VALUES (29,'Contabilidad y finanzas',14);
INSERT INTO `programa_formacion` VALUES (30,'Contabilización de operaciones comerciales y financieras',15);
INSERT INTO `programa_formacion` VALUES (31,'Control ambiental',1);
INSERT INTO `programa_formacion` VALUES (32,'Control de calidad',2);
INSERT INTO `programa_formacion` VALUES (33,'Control de calidad de alimentos',3);
INSERT INTO `programa_formacion` VALUES (34,'Control de calidad en calzado y marroquinería',4);
INSERT INTO `programa_formacion` VALUES (35,'Control de calidad en confección',5);
INSERT INTO `programa_formacion` VALUES (36,'Corte y venta de carnes',6);
INSERT INTO `programa_formacion` VALUES (37,'Cosmetología y estética integral',7);
INSERT INTO `programa_formacion` VALUES (38,'Cuidado integral del paciente urgente',8);
INSERT INTO `programa_formacion` VALUES (39,'Cultivo y cosecha de la palma de aceite',9);
INSERT INTO `programa_formacion` VALUES (40,'Cultivos agrícolas',10);
INSERT INTO `programa_formacion` VALUES (41,'Desarrollo de operaciones de logísticas en la cadena de abas',11);
INSERT INTO `programa_formacion` VALUES (42,'Desarrollo de software',12);
INSERT INTO `programa_formacion` VALUES (43,'Diseño de joyas y objetos artesanales',13);
INSERT INTO `programa_formacion` VALUES (44,'Diseño de máquinas y equipos automatizados',14);
INSERT INTO `programa_formacion` VALUES (45,'Diseño de modas y confección',15);
INSERT INTO `programa_formacion` VALUES (46,'Diseño de producto',1);
INSERT INTO `programa_formacion` VALUES (47,'Diseño e integración de multimedia',2);
INSERT INTO `programa_formacion` VALUES (48,'efer',3);
INSERT INTO `programa_formacion` VALUES (49,'Elaboración de productos de confitería',4);
INSERT INTO `programa_formacion` VALUES (50,'Enfermería',5);
INSERT INTO `programa_formacion` VALUES (51,'Entrenamiento deportivo',6);
INSERT INTO `programa_formacion` VALUES (52,'Establecimiento y mantenimiento de plantaciones de caucho',7);
INSERT INTO `programa_formacion` VALUES (53,'Explotación agropecuaria ecológica',8);
INSERT INTO `programa_formacion` VALUES (54,'Explotación y transformación de minerías',9);
INSERT INTO `programa_formacion` VALUES (55,'Fabricación de muebles contemporáneos y modulares',10);
INSERT INTO `programa_formacion` VALUES (56,'Floricultura',11);
INSERT INTO `programa_formacion` VALUES (57,'Gestión administrativa',12);
INSERT INTO `programa_formacion` VALUES (58,'Gestión administrativa de servicios financieros',13);
INSERT INTO `programa_formacion` VALUES (59,'Gestión de asistencia técnica agropecuaria',14);
INSERT INTO `programa_formacion` VALUES (60,'Gestión de costos y elaboración de presupuestos en la indust',15);
INSERT INTO `programa_formacion` VALUES (61,'Gestión de empresas agropecuarias',1);
INSERT INTO `programa_formacion` VALUES (62,'Gestión de mercados',2);
INSERT INTO `programa_formacion` VALUES (63,'Gestión de negocios',3);
INSERT INTO `programa_formacion` VALUES (64,'Gestión de producción pecuaria',4);
INSERT INTO `programa_formacion` VALUES (65,'Gestión de propiedad horizontal',5);
INSERT INTO `programa_formacion` VALUES (66,'Gestión de recursos naturales ',6);
INSERT INTO `programa_formacion` VALUES (67,'Gestión de unidades administrativas',7);
INSERT INTO `programa_formacion` VALUES (68,'Gestión del talento humano',8);
INSERT INTO `programa_formacion` VALUES (69,'Gestión empresarial',9);
INSERT INTO `programa_formacion` VALUES (70,'h',10);
INSERT INTO `programa_formacion` VALUES (71,'hbh',11);
INSERT INTO `programa_formacion` VALUES (72,'hgday',12);
INSERT INTO `programa_formacion` VALUES (73,'Implementación de buenas prácticas agropecuarias',13);
INSERT INTO `programa_formacion` VALUES (74,'Inocuidad e higiene alimentaria',14);
INSERT INTO `programa_formacion` VALUES (75,'Inspección y ensayos con procesos no destructivos',15);
INSERT INTO `programa_formacion` VALUES (76,'Instalación de infraestructura para redes móviles',1);
INSERT INTO `programa_formacion` VALUES (77,'Instalación de redes de computadores',2);
INSERT INTO `programa_formacion` VALUES (78,'Instalación y reparación de red de fibra óptica',3);
INSERT INTO `programa_formacion` VALUES (79,'Instalaciones de redes híbridas de fibra óptica y coaxial',4);
INSERT INTO `programa_formacion` VALUES (80,'Instalaciones eléctricas residenciales',5);
INSERT INTO `programa_formacion` VALUES (81,'Instalaciones para suministros de gas combustible en edifica',6);
INSERT INTO `programa_formacion` VALUES (82,'Investigación, planeación y desarrollo de mercados y medios ',7);
INSERT INTO `programa_formacion` VALUES (83,'javdgvas',8);
INSERT INTO `programa_formacion` VALUES (84,'javdgvask',9);
INSERT INTO `programa_formacion` VALUES (85,'jeni',10);
INSERT INTO `programa_formacion` VALUES (86,'jhljfd',11);
INSERT INTO `programa_formacion` VALUES (87,'jn',12);
INSERT INTO `programa_formacion` VALUES (88,'Joyería armada',13);
INSERT INTO `programa_formacion` VALUES (89,'Logística y transporte',14);
INSERT INTO `programa_formacion` VALUES (90,'Manejo ambiental',15);
INSERT INTO `programa_formacion` VALUES (91,'Manejo de viveros',1);
INSERT INTO `programa_formacion` VALUES (92,'Mantenimiento de equipos de computo',2);
INSERT INTO `programa_formacion` VALUES (93,'Mantenimiento de equipos de refrigeración, ventilación y cli',3);
INSERT INTO `programa_formacion` VALUES (94,'Mantenimiento de equipos electrónicos de consumo masivo en a',4);
INSERT INTO `programa_formacion` VALUES (95,'Mantenimiento de los sistemas de refrigeración y climatizaci',5);
INSERT INTO `programa_formacion` VALUES (96,'Mantenimiento de máquinas de confección industrial',6);
INSERT INTO `programa_formacion` VALUES (97,'Mantenimiento de motocicletas',7);
INSERT INTO `programa_formacion` VALUES (98,'Mantenimiento de motores disel',8);
INSERT INTO `programa_formacion` VALUES (99,'Mantenimiento de motores gasolina y gas',9);
INSERT INTO `programa_formacion` VALUES (100,'Mantenimiento del conjunto transmisor de potencia control y ',10);
INSERT INTO `programa_formacion` VALUES (101,'Mantenimiento eléctrico y electrónico en automotores',11);
INSERT INTO `programa_formacion` VALUES (102,'Mantenimiento y reparación de edificaciones',12);
INSERT INTO `programa_formacion` VALUES (103,'Mayordomía de empresas ganaderas',13);
INSERT INTO `programa_formacion` VALUES (104,'mb',14);
INSERT INTO `programa_formacion` VALUES (105,'Mecánica agrícola',15);
INSERT INTO `programa_formacion` VALUES (106,'Mecánica de maquinaria industria',1);
INSERT INTO `programa_formacion` VALUES (107,'Mecánica de motos',2);
INSERT INTO `programa_formacion` VALUES (108,'Mecánica rural',3);
INSERT INTO `programa_formacion` VALUES (109,'Mecánico de maquinaria industrial',4);
INSERT INTO `programa_formacion` VALUES (110,'Mecanización agrícola',5);
INSERT INTO `programa_formacion` VALUES (111,'Mecanización de equipos metalmecánicos',6);
INSERT INTO `programa_formacion` VALUES (112,'Mecanizado de productos metalmecánicos',7);
INSERT INTO `programa_formacion` VALUES (113,'Mesa y bar',8);
INSERT INTO `programa_formacion` VALUES (114,'MSB',9);
INSERT INTO `programa_formacion` VALUES (115,'ngv',10);
INSERT INTO `programa_formacion` VALUES (116,'Nómina y prestaciones sociales',11);
INSERT INTO `programa_formacion` VALUES (117,'Operación de maquinaria pesada para excavación',12);
INSERT INTO `programa_formacion` VALUES (118,'Operaciones comerciales',13);
INSERT INTO `programa_formacion` VALUES (119,'Operario en piscicultura',14);
INSERT INTO `programa_formacion` VALUES (120,'Panadería y repostería',15);
INSERT INTO `programa_formacion` VALUES (121,'Panificación',1);
INSERT INTO `programa_formacion` VALUES (122,'Patronaje industrial de prendas de vestir',2);
INSERT INTO `programa_formacion` VALUES (123,'Pedagogía y orientación de la formación profesional integral',3);
INSERT INTO `programa_formacion` VALUES (124,'Procesamiento de alimentos',4);
INSERT INTO `programa_formacion` VALUES (125,'Procesamiento de alimentos perecederos',5);
INSERT INTO `programa_formacion` VALUES (126,'Procesamiento de carnes y derivados',6);
INSERT INTO `programa_formacion` VALUES (127,'Procesamiento de frutas y hortalizas',7);
INSERT INTO `programa_formacion` VALUES (128,'Procesamiento de lácteos',8);
INSERT INTO `programa_formacion` VALUES (129,'Procesos biotecnológicos aplicados a la industria',9);
INSERT INTO `programa_formacion` VALUES (130,'Procesos cárnicos',10);
INSERT INTO `programa_formacion` VALUES (131,'Producción acuícola',11);
INSERT INTO `programa_formacion` VALUES (132,'Producción agrícola',12);
INSERT INTO `programa_formacion` VALUES (133,'Producción agroalimentaria',13);
INSERT INTO `programa_formacion` VALUES (134,'Producción agropecuaria ',14);
INSERT INTO `programa_formacion` VALUES (135,'Producción agropecuaria ecología',15);
INSERT INTO `programa_formacion` VALUES (136,'Producción con poliéster reforzado',1);
INSERT INTO `programa_formacion` VALUES (137,'Producción de café',2);
INSERT INTO `programa_formacion` VALUES (138,'Producción de cafés especiales',3);
INSERT INTO `programa_formacion` VALUES (139,'Producción de caprinos y ovinos',4);
INSERT INTO `programa_formacion` VALUES (140,'Producción de especies menores',5);
INSERT INTO `programa_formacion` VALUES (141,'Producción equina',6);
INSERT INTO `programa_formacion` VALUES (142,'Producción ganadera',7);
INSERT INTO `programa_formacion` VALUES (143,'Producción industrial',8);
INSERT INTO `programa_formacion` VALUES (144,'Producción limpia',9);
INSERT INTO `programa_formacion` VALUES (145,'Producción multimedia',10);
INSERT INTO `programa_formacion` VALUES (146,'Producción pecuaria',11);
INSERT INTO `programa_formacion` VALUES (147,'Producción porcina',12);
INSERT INTO `programa_formacion` VALUES (148,'Producción y consumo sostenible',13);
INSERT INTO `programa_formacion` VALUES (149,'Producción y cosecha de cultivo de cacao',14);
INSERT INTO `programa_formacion` VALUES (150,'Proyectos agropecuarios',15);
INSERT INTO `programa_formacion` VALUES (151,'qws',1);
INSERT INTO `programa_formacion` VALUES (152,'Recursos humanos',2);
INSERT INTO `programa_formacion` VALUES (153,'Revestimiento en pintura arquitectónica',3);
INSERT INTO `programa_formacion` VALUES (154,'Riesgo, drenaje y manejo de suelos agrícolas',4);
INSERT INTO `programa_formacion` VALUES (155,'Salud ocupacional',5);
INSERT INTO `programa_formacion` VALUES (156,'Salud publica',6);
INSERT INTO `programa_formacion` VALUES (157,'sdgfjahsdgf',7);
INSERT INTO `programa_formacion` VALUES (158,'Secretariado ejecutivo',8);
INSERT INTO `programa_formacion` VALUES (159,'Seguridad ocupacional',9);
INSERT INTO `programa_formacion` VALUES (160,'Servicios de agencias de viajes',10);
INSERT INTO `programa_formacion` VALUES (161,'Servicios farmacéuticos',11);
INSERT INTO `programa_formacion` VALUES (162,'Sistemas agropecuarios ecológicos',12);
INSERT INTO `programa_formacion` VALUES (163,'Soldadura en platina con procesos SMAW y GMAW',13);
INSERT INTO `programa_formacion` VALUES (164,'srq',14);
INSERT INTO `programa_formacion` VALUES (165,'Técnico auxiliar de patronaje corte y confección',15);
INSERT INTO `programa_formacion` VALUES (166,'Técnico de mantenimiento aeronáutico',1);
INSERT INTO `programa_formacion` VALUES (167,'Técnico en formulación de proyectos',2);
INSERT INTO `programa_formacion` VALUES (168,'Técnico en sistemas',3);
INSERT INTO `programa_formacion` VALUES (169,'Técnico laboral auxiliar en salud oral',4);
INSERT INTO `programa_formacion` VALUES (170,'Tecnología agrícola',5);
INSERT INTO `programa_formacion` VALUES (171,'Tecnología de servicios turísticos',6);
INSERT INTO `programa_formacion` VALUES (172,'Tecnologías de la información y las comunicaciones',7);
INSERT INTO `programa_formacion` VALUES (173,'Tecnologías de la información, diseño y desarrollo de softwa',8);
INSERT INTO `programa_formacion` VALUES (174,'Tecnólogo en formulación de proyectos',9);
INSERT INTO `programa_formacion` VALUES (175,'Topografía',10);
INSERT INTO `programa_formacion` VALUES (176,'Trabajo seguro en alturas',11);
INSERT INTO `programa_formacion` VALUES (177,'Venta de productos y servicios',12);
INSERT INTO `programa_formacion` VALUES (178,'Ventas y comercialización',13);
INSERT INTO `programa_formacion` VALUES (179,'hfhutft',13);
INSERT INTO `programa_formacion` VALUES (180,'mnjnj',15);
/*!40000 ALTER TABLE `programa_formacion` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table regional
#

CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL auto_increment,
  `nombre_regional` varchar(100) NOT NULL,
  `direccion_regional` varchar(250) NOT NULL,
  `telefono_regional` varchar(20) NOT NULL,
  `correo_regional` varchar(150) NOT NULL,
  `id_municipio` varchar(20) NOT NULL,
  `departamento` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_regional`),
  KEY `id_municipio` (`id_municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

#
# Dumping data for table regional
#
LOCK TABLES `regional` WRITE;
/*!40000 ALTER TABLE `regional` DISABLE KEYS */;

INSERT INTO `regional` VALUES (1,' Regional Distrito Capital - Bogota','calle 4 ','180005634',' regionalbogota@misena.edu.co','91405','cauca');
INSERT INTO `regional` VALUES (2,' Regional Bolivar','calle 5 No 12-100','8456323',' regionalbolivar@misena.edu.co','91407','cauca');
INSERT INTO `regional` VALUES (3,' Regional Boyaca','cra 17 No 78-34','8406983',' regionalboyaca@misena.edu.co','91430','cauca');
INSERT INTO `regional` VALUES (4,' Regional Caldas','calle 6 No 25-89','8329077',' regionalcaldas@misena.edu.co','91460','cauca');
INSERT INTO `regional` VALUES (5,' Regional Cagueta','KR. 4 No 1 - 78','8876453',' regionalcaqueta@misena.edu.co','91530','cauca');
INSERT INTO `regional` VALUES (6,' Regional Cauca','CL 5 N 10-70','8326094',' regionalcauca@misena.edu.co','91536','cauca');
INSERT INTO `regional` VALUES (7,' Regional Cesar','Calle 18 Norte Numero 4-17','8234962',' regionalcesar@misena.edu.co','91540','cauca');
INSERT INTO `regional` VALUES (8,' Regional Cordoba','CL 18N # 8 - 59','8920910',' regionalcordoba@misena.edu.co','91669','cauca');
INSERT INTO `regional` VALUES (9,' Regional Cundinamarca','Calle 11 # 4 - 49','8877563',' regionalcundinamarca@misena.edu.co','91798','cauca');
INSERT INTO `regional` VALUES (10,' Regional Choco','CL 4 No.7-88','8215368',' regionalchoco@misena.edu.co','5001','cauca');
INSERT INTO `regional` VALUES (11,' Regional Huila','KR 34 # 7-00','8975621',' regionalhuila@misena.edu.co','5002','cauca');
INSERT INTO `regional` VALUES (12,' Regional Guajira','CL 4 No.7-88','8244052',' regionalguajira@misena.edu.co','5004','cauca');
INSERT INTO `regional` VALUES (13,' Regional Magdalena','CARRERA 2 3-45','8546322',' regionalmagdalena@misena.edu.co','5021','cauca');
INSERT INTO `regional` VALUES (14,'Regional Antioquia','crr 39 No-67','8009897','regionalantioquia@misena.edu.co','91001','cauca');
INSERT INTO `regional` VALUES (15,' Regional Meta','CALLE 2 CON CARRERA 10 ESQUINA','8283072',' regionalmeta@misena.edu.co','5030','cauca');
INSERT INTO `regional` VALUES (16,' Regional Nariño','calle3 No 23-13','8536145',' regionalnariño@misena.edu.co','5031','cauca');
INSERT INTO `regional` VALUES (17,' Regional Norte de Santander','calle17 No 89-19','8190584',' regionalnortedesantander@misena.edu.co','5034','cauca');
INSERT INTO `regional` VALUES (18,' Regional Quindio','cra 16 No 65-109','8120597',' regionalquindio@misena.edu.co','5036','cauca');
INSERT INTO `regional` VALUES (19,' Regional Risaralda','CRA 3 # 1N-23','8243256',' regionalrisaralda@misena.edu.co','5038','cauca');
INSERT INTO `regional` VALUES (20,' Regional Santander','CARRERA 10 #5-48','8436546',' regionalsantander@misena.edu.co','5040','cauca');
INSERT INTO `regional` VALUES (21,' Regional Sucre','\tKR 10 #17N - 117','8320207',' regionalsucre@misena.edu.co','5042','cauca');
INSERT INTO `regional` VALUES (22,' Regional Tolima','KR 9 #10N - 94','8196767',' regionaltolima@misena.edu.co','5044','cauca');
INSERT INTO `regional` VALUES (23,' Regional Valle','CALLE 4 7 - 32','8380287',' regionalvalle@misena.edu.co','5045','cauca');
INSERT INTO `regional` VALUES (24,' Regional Atlantico','crr 8 No. 12-39','8203349',' regionatlantico@misena.edu.co','91263','cauca');
INSERT INTO `regional` VALUES (25,' Regional Arauca','CL 8 Norte # 6N-75','8243533',' regionalarauca@misena.edu.co','5051','cundinamarca');
INSERT INTO `regional` VALUES (26,' Regional Casanare','calle 1 N No 3-35','8834643',' regionalcasanarea@misena.edu.co','5055','cundinamarca');
INSERT INTO `regional` VALUES (27,' Regional Putumayo','cra 12 No 13-23','8796560',' regionalputumayo@misena.edu.co','5059','cundinamarca');
INSERT INTO `regional` VALUES (28,' Regional San Andres','Calle 18 Norte Numero 4-17','8120944',' regionalsanandres@misena.edu.co','5079','cundinamarca');
INSERT INTO `regional` VALUES (29,' Regional Amazonas','CR 21 # 6-33','8283072',' regionalamazonas@misena.edu.co','5086','cundinamarca');
INSERT INTO `regional` VALUES (30,' Regional Guainia','CRA 3 # 1N-23','8536145',' regionalguainia@misena.edu.co','5088','cundinamarca');
INSERT INTO `regional` VALUES (31,' Regional Guaviare','CARRERA 10 #5-48','8190584',' regionalguaviare@misena.edu.co','5091','cundinamarca');
INSERT INTO `regional` VALUES (32,' Regional Vaupes','\tKR 10 #17N - 117','8120597',' regionalvaupes@misena.edu.co','5093','cundinamarca');
INSERT INTO `regional` VALUES (33,' Regional Vichada','KR 9 #10N - 94','4566443343',' regionalvichada@misena.edu.co','5101','cundinamarca');
/*!40000 ALTER TABLE `regional` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table registro_usuario
#

CREATE TABLE `registro_usuario` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `n_documento` varchar(30) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `codigo_ficha` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_usuario`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_rol` (`id_rol`),
  KEY `id_estado` (`id_estado`),
  KEY `codigo_ficha` (`codigo_ficha`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=utf8;

#
# Dumping data for table registro_usuario
#
LOCK TABLES `registro_usuario` WRITE;
/*!40000 ALTER TABLE `registro_usuario` DISABLE KEYS */;

INSERT INTO `registro_usuario` VALUES (1,'1000588683','BLANCA NIDIA','DAGUJA ','3238384202','jaimecasajuana@gmail.com','1',1,1,1,'100100');
INSERT INTO `registro_usuario` VALUES (2,'1002777310','WILMAR ALFREDO','JUARES JURADO','570240','tantitamivida@gmail.com','monkey',2,1,1,'100797');
INSERT INTO `registro_usuario` VALUES (3,'1002791777','JOSE','LAME','3219348394','levaa.g@hotmail.com','123456789',3,1,2,'106179');
INSERT INTO `registro_usuario` VALUES (4,'1002821445','CARMELINA','JIRON JONGUITUD','570230','raulcd02ster@gmail.com','dragon',2,1,2,'1092033');
INSERT INTO `registro_usuario` VALUES (5,'1002835038','JOSE USBALDO','MOSQUERA','3192663334','ruliandro@hotmail.com','dragon',1,1,2,'109876');
INSERT INTO `registro_usuario` VALUES (6,'1002840708','DEISY','MUÑOZ','3219724506','ejimenez@med.uchile.cl','letmein',2,1,2,'1100987');
INSERT INTO `registro_usuario` VALUES (7,'1002876274','RAMIRO','CARAVAJAL CARAVALLO','570215','martacam2002@yahoo.com','baseball',5,1,2,'110989');
INSERT INTO `registro_usuario` VALUES (8,'1002917775','ARCADIO','MORALES','3133963944','luuuuuuci@hotmail.com','princess',4,1,2,'111098');
INSERT INTO `registro_usuario` VALUES (9,'1002923850','JOSE ALONSO','MOSQUERA','3136760113','amarantasol@gmail.com','solo',3,1,2,'111209');
INSERT INTO `registro_usuario` VALUES (10,'1002926380','BLANCA DERLY','DORADO','3217493838','cabbada@gmail.com','baseball',2,1,2,'111213');
INSERT INTO `registro_usuario` VALUES (11,'1002926612','VIVIANA','BUTANDA BUTIERRES','569982','llazo@agrical.cl','1qaz2wsx',2,1,2,'111232');
INSERT INTO `registro_usuario` VALUES (12,'1002952206','MARIA','ALARCON ','3113140915','marcelafigueroazamora@hotmail.com','login',3,1,2,'111987');
INSERT INTO `registro_usuario` VALUES (13,'1002955371','BERTA ELENA ','IPIA','3153873922','carlos.goldsack@nismar.cl','welcome',2,1,2,'112134');
INSERT INTO `registro_usuario` VALUES (14,'1002955542','LEIDY YOHANA','MORALES','3128844944','gala108@hotmail.com','passw0rd',2,1,2,'1135869');
INSERT INTO `registro_usuario` VALUES (15,'1002955743','JOSE YOILVER','FRADE FRAGA','3220393838','capitanaguilera@hotmail.com','1234567890',2,1,2,'1142351');
INSERT INTO `registro_usuario` VALUES (16,'1002955966','JOSE ENELIO ','SOLANO ','570220','enrigom@gmail.com','welcome',2,1,2,'1145832');
INSERT INTO `registro_usuario` VALUES (17,'1002956076','HECTOR','FRANCO ','570132','pablo.calderon.cadiz@gmail.com','password',2,1,2,'120212');
INSERT INTO `registro_usuario` VALUES (18,'1002956167','RUBEN DARIO','MOSQUERA','570126','fornickinson@hotmail.com','welcome',2,1,2,'120217');
INSERT INTO `registro_usuario` VALUES (19,'1002956404','JORGE','HERNANDEZ','570112','nina_cabbada@hotmail.com','login',2,1,2,'120605');
INSERT INTO `registro_usuario` VALUES (20,'1002956426','GERSAIN','GARCIA ','3123884930','diazma@tiscali.it','123456',2,1,2,'121303');
INSERT INTO `registro_usuario` VALUES (21,'1002956432','ELSA MARIA ','INBACHI','570179','filipofox@hotmail.com','starwars',2,1,2,'121626');
INSERT INTO `registro_usuario` VALUES (22,'1002956728','HELIA MARIA  ','VILLAMARIN ','570195','carlos.goldsack@nismar.cl','12345',2,1,2,'122120');
INSERT INTO `registro_usuario` VALUES (23,'1002956836','JOSE AVELARDO','JARAMIYO JARQUIN','570222','pablo.calderon.cadiz@gmail.com','1234567890',2,1,2,'1223345');
INSERT INTO `registro_usuario` VALUES (24,'1002957081','ADRIANA YULISA','MORALES','3118372822','mgoldsackz@gmail.com','abc123',2,1,2,'1234165');
INSERT INTO `registro_usuario` VALUES (25,'1002957159','JESUS MARIA ','GALLEGO GALVAN','569920','annabeck_@hotmail.com','1234567',2,1,2,'123444');
INSERT INTO `registro_usuario` VALUES (26,'1002957409','JOSE ALONSO',' IVARRA JACINTO','570209','dantekol@hotmail.com','1234',2,1,2,'123456');
INSERT INTO `registro_usuario` VALUES (27,'1002958366','CLAUDIA LORENA ','HANSASOY ','3123445345','alvaro.espoz@gmail.com','football',2,1,2,'123521');
INSERT INTO `registro_usuario` VALUES (28,'1002958537','JOSE GABRIEL ','VALDERRAMA ','3129383833','Karito_1404@hotmail.com','passw0rd',2,1,2,'1263573');
INSERT INTO `registro_usuario` VALUES (29,'1002959949','MARCELINO','VALENCIA','3225771322','paulifran@hotmail.com','123456789',2,1,2,'129384');
INSERT INTO `registro_usuario` VALUES (30,'1002959959','MARIA EMA ','HERRERA HERVER','3136587684','paulifran@hotmail.com','starwars',2,1,2,'131095');
INSERT INTO `registro_usuario` VALUES (31,'1002960731','LUZ ADRIANA ','VALENCIA ','570181','vivianagarridon@hotmail.com','password',2,1,2,'135698');
INSERT INTO `registro_usuario` VALUES (32,'1002961118','MARIA OLIVA','BUENO BUENTELLO','569960','rlabarcajaque@gmail.com','baseball',2,1,2,'151421');
INSERT INTO `registro_usuario` VALUES (33,'1002963109','MARIA SANTOS ','MOSQUERA','570218','dgomezl@bancochile.cl','baseball',2,1,2,'152612');
INSERT INTO `registro_usuario` VALUES (34,'1002968201','LEONILDE','MOSQUERA IPÍA ','3211424071','cdksfofi@hotmail.com','solo',2,1,2,'1543201');
INSERT INTO `registro_usuario` VALUES (35,'1002970000','JHON JAIRO',' GALICIA GALLARDO','569919','laah.valehh@hotmail.com','1234',2,1,2,'154321');
INSERT INTO `registro_usuario` VALUES (36,'1002970139','ARACELI','MOSQUERA','3206495558','melisherman@hotmail.com','123456',2,1,2,'160315');
INSERT INTO `registro_usuario` VALUES (37,'1002970142','DORIS','CIFUENTES ','570131','icalderon@tecval.cl','123456',2,1,2,'1654032');
INSERT INTO `registro_usuario` VALUES (38,'1002970223','LEYDY','MOSQUERA','5427362','khiton_@hotmail.com','abc123',2,1,2,'165432');
INSERT INTO `registro_usuario` VALUES (39,'1002970271','OLGA ','URMENDEZ','3204338838','arahuetes@manquehue.net','passw0rd',2,1,2,'1760543');
INSERT INTO `registro_usuario` VALUES (40,'1002970459','JULIETH TATIANA','DAGUA ','3175833525','iibarra@bancoestado.cl','12345678',2,1,2,'176543');
INSERT INTO `registro_usuario` VALUES (41,'1002970534','JOSE','CAMAYO','3234434323','plizama@mediplex.cl','welcome',2,1,2,'180009');
INSERT INTO `registro_usuario` VALUES (42,'1002970766','GERARDO','BENJUMEA ORTIZ','570237','paulifran@hotmail.com','1qaz2wsx',2,1,2,'1870654');
INSERT INTO `registro_usuario` VALUES (43,'1002970934','MARIA','CASTILLO','570168','fgaete@colegioaltamira.cl','login',2,1,2,'187322');
INSERT INTO `registro_usuario` VALUES (44,'1002971047','CLEMENTINA','ALMEIDA ','570201','claudiocastanonmigeot@gmail.com','1qaz2wsx',2,1,2,'187654');
INSERT INTO `registro_usuario` VALUES (45,'1002971493','ELISABETH',' JAEN JAHUEY','570212','lukalcagno@gmail.com','1234567',2,1,2,'192655');
INSERT INTO `registro_usuario` VALUES (46,'1002971600','ONIBIA','CUADRADO ','3183939393','loredicat@hotmail.com','starwars',2,1,2,'1980765');
INSERT INTO `registro_usuario` VALUES (47,'1002971634','ANA',' CANDELARIA CANDELARIO','570169','carlosaguileram@hotmail.com','qwertyuiop',2,1,2,'198765');
INSERT INTO `registro_usuario` VALUES (48,'1002971640','RAMON DONALD','CAHUACO CAHUIDZU','570096','cmandak@vtr.net','qwerty',2,1,2,'200506');
INSERT INTO `registro_usuario` VALUES (49,'1002971723','CATALINA','FISCAL FLETES','3023232333','daniela_aguilera_m500@hotmail.com','1234567',2,1,2,'206495');
INSERT INTO `registro_usuario` VALUES (50,'1002972274','MARIA TRANSITO','JARAMILLO ','570164','oscar.brito@gmail.com','starwars',2,1,2,'210987');
INSERT INTO `registro_usuario` VALUES (51,'1002972670','INES','TORO MESA ','570190','acastanon@vectorchile.cl','111111',2,1,2,'216371');
INSERT INTO `registro_usuario` VALUES (52,'1002972702','LUZ AM´PARO ',' CAMPIRANO CAMPOS','570160','cabrigo@garmendia.cl','letmein',2,1,2,'2213245');
INSERT INTO `registro_usuario` VALUES (53,'1002972790','MARIA LINA ','VIDAL FERRER','3118387494','fernandofreitte.xia@gmail.com','login',2,1,2,'222016');
INSERT INTO `registro_usuario` VALUES (54,'1003036344','HIGINIO','ORTIZ ORDOÑEZ','570260','aargomedo@hecsa.cl','monkey',2,1,2,'222432');
INSERT INTO `registro_usuario` VALUES (55,'1003149896','MARIA BAUDILIA ','HERMOSO HERNANDES','3207902637','faraya@sprint.cl','solo',2,1,2,'222670');
INSERT INTO `registro_usuario` VALUES (56,'1003149969','AQUILINA','BOHADA ','570243','bad.girl.-@hotmail.es','dragon',2,1,2,'223154');
INSERT INTO `registro_usuario` VALUES (57,'1003474490','JOSE JAIRO',' HOROSCO HORTA','3106263654','bantomaui@gmail.com','abc123',2,1,2,'224898');
INSERT INTO `registro_usuario` VALUES (58,'1003805339','LINA MARIA ','BRUUM','570233','luisgabriel.gonzalez@gmail.com','abc123',2,1,2,'2263542');
INSERT INTO `registro_usuario` VALUES (59,'1003813097','JORGE',' CAMPA CAMPILLO','570157','osabarca@hotmail.com','monkey',2,1,2,'232344');
INSERT INTO `registro_usuario` VALUES (60,'1003814977','LUZ','PEREZ','570159','debora1611@hotmail.com','monkey',2,1,2,'234555');
INSERT INTO `registro_usuario` VALUES (61,'1004074368','NEIDA ROCIO','CASTRO ','3123903949','rcabbada@vtr.net','1234',2,1,2,'234567');
INSERT INTO `registro_usuario` VALUES (62,'1004082922','JOSE MARINO','EREDIA HERERRA','3233939068','faraya1910@hotmail.com','qwertyuiop',2,1,2,'235678');
INSERT INTO `registro_usuario` VALUES (63,'1004134511','BARBARA',' FRAILE FRANCA','570242','jaimecasajuana@gmail.com','login',2,1,2,'273648');
INSERT INTO `registro_usuario` VALUES (64,'1004214229','FLOR MARIA ','MERA ','569999','solbk26@hotmail.com','baseball',2,1,2,'280495');
INSERT INTO `registro_usuario` VALUES (65,'1004214929','FREDI ARSENIO','GALVIS ','569997','pecmor63@gmail.com','passw0rd',2,1,2,'294529');
INSERT INTO `registro_usuario` VALUES (66,'1004215006','ELNUAR EIDER ',' GARAY GARCIA','569942','anamariadelacarrera@gmail.com','111111',2,1,2,'298500');
INSERT INTO `registro_usuario` VALUES (67,'1004232164','JORGE','VILLAMARIN ','570221','pato_one@hotmail.com','letmein',2,1,2,'300120');
INSERT INTO `registro_usuario` VALUES (68,'1004232306','GLADYS',' MILAN PEREZ','3215361409','solbk26@hotmail.com','login',2,1,2,'309876');
INSERT INTO `registro_usuario` VALUES (69,'1004232505','MARIA CARMELINA ',' BYRD CAACUAA C','569983','amarantasol@gmail.com','dragon',2,1,2,'310535');
INSERT INTO `registro_usuario` VALUES (70,'1004232691','FRANCY','BECOCHE','3183454656','filipofox@hotmail.com','1qaz2wsx',2,1,2,'310987');
INSERT INTO `registro_usuario` VALUES (71,'1004247063','ALBERTO','SOTELO CABRERA ','570206','c.analuz@yahoo.es','dragon',2,1,2,'311329');
INSERT INTO `registro_usuario` VALUES (72,'1004415262','MOISES ANTONIO','IPIA','3136303443','cibravohuerta@yahoo.com','password',2,1,2,'312829');
INSERT INTO `registro_usuario` VALUES (73,'1004417605','OSCAR','VIAFARA','3134567677','rickygodoy@hildegard.cl','letmein',2,1,2,'313562');
INSERT INTO `registro_usuario` VALUES (74,'1004441165','MANUEL','VARGAS','3200012416','consuelo.fornes@gmail.com','passw0rd',2,1,2,'314304');
INSERT INTO `registro_usuario` VALUES (75,'1004441606','VICTOR','MOSQUERA','3104709189','nelsonunion@hotmail.com','login',2,1,2,'314869');
INSERT INTO `registro_usuario` VALUES (76,'1004442391','ERIKA LUCELY','FLOREZ','570170','panchop71@hotmail.com','princess',2,1,2,'316718');
INSERT INTO `registro_usuario` VALUES (77,'1004493274','DIANA LICELI','SAMBRANO ','3136563837','jorge.campos@impromac.cl','princess',2,1,2,'316719');
INSERT INTO `registro_usuario` VALUES (78,'1004539834','ELVER','MOSQUERA','3002674754','fornickinson@hotmail.com','123456',2,1,2,'321098');
INSERT INTO `registro_usuario` VALUES (79,'1004542632','HECTOR FABIO ','ANDREZ ANGEL','3127494349','elizabetharmstrong39@gmail.com','qwerty',2,1,2,'321351');
INSERT INTO `registro_usuario` VALUES (80,'1004550956','DANY','MOSQUERA','3154483232','martacam2002@yahoo.com','123456',2,1,2,'322556');
INSERT INTO `registro_usuario` VALUES (81,'1004561475','AQUILINO',' GAUSIN GAVIA','569941','verocakatalinic@hotmail.com','123456789',2,1,2,'330987');
INSERT INTO `registro_usuario` VALUES (82,'1004577570','GRISELMO',' HIGAREDA HIGUERA','3135620719','aargomedo@hecsa.cl','password',2,1,2,'3312343');
INSERT INTO `registro_usuario` VALUES (83,'1004577732','YONY','RODRIGUEZ','570072','jlescote@gasco.cl','starwars',2,1,2,'3323264');
INSERT INTO `registro_usuario` VALUES (84,'1004579326','CARMEN',' CUEVAS CUEYAR','3113848484','niikhox__@hotmail.com','111111',2,1,2,'333456');
INSERT INTO `registro_usuario` VALUES (85,'1004594025','EULOGIA',' CAMARGO CAMARIL','570149','cmerinosuarez@gmail.com','1qaz2wsx',2,1,2,'3351424');
INSERT INTO `registro_usuario` VALUES (86,'1004598686','LUCIA','PEREZ','3016440342','apalamosg@hotmail.com','letmein',2,1,2,'337650');
INSERT INTO `registro_usuario` VALUES (87,'1004598978','MARIELA','MUNEVAR ','570255','aargomedo@hecsa.cl','master',2,1,2,'345109');
INSERT INTO `registro_usuario` VALUES (88,'1004636579','EDGAR','OBANDO ','569927','carlosarteaga.pef@gmail.com','solo',2,1,2,'345678');
INSERT INTO `registro_usuario` VALUES (89,'1004637556','OFELIA','ITER','3148203833','niikhox__@hotmail.com','login',2,1,2,'355464');
INSERT INTO `registro_usuario` VALUES (90,'1004640078','GRACILIANO','RODRIGUEZ','3107973609','koenigis@googlemail.com','password',2,1,2,'370206');
INSERT INTO `registro_usuario` VALUES (91,'1004666979','JOSE','CAPOTE LEIVA ','570238','pepacordero@gmail.com','qwertyuiop',2,1,2,'388681');
INSERT INTO `registro_usuario` VALUES (92,'1004675224','MARY LUZ','GUE','3118274343','carmenluzlabbe@gmail.com','monkey',2,1,2,'400567');
INSERT INTO `registro_usuario` VALUES (93,'1004695241','MARIA DEL SOCORRO ','MOSTACILLA','3181822113','dlineros@uc.cl','starwars',2,1,2,'422880');
INSERT INTO `registro_usuario` VALUES (94,'1004696548','JOSE DIOMEDES ','MORALES','3015579831','sergiomherrera@gmail.com','123456',2,1,2,'431260');
INSERT INTO `registro_usuario` VALUES (95,'1004697385','JOSE ENELIO','RODRIGUEZ','3213939483','superjp_coco@hotmail.com','1234567',2,1,2,'4354256');
INSERT INTO `registro_usuario` VALUES (96,'1004709614','EVANGELINA',' CABANILLAS CABELLO','569991','monica@arrigoni.cl','letmein',2,1,2,'440908');
INSERT INTO `registro_usuario` VALUES (97,'1004711365','MARIA NELSI',' JASO JAURE','570225','allicamposv@hotmail.com','abc123',2,1,2,'444543');
INSERT INTO `registro_usuario` VALUES (98,'1004731801','MARIA','MOSQUERA','3212909199','luisgabriel.gonzalez@gmail.com','12345678',2,1,2,'444567');
INSERT INTO `registro_usuario` VALUES (99,'1004748603','JOSE ISRAEL ','ERAZO ORDOÑEZ ','3138737818','panchop71@hotmail.com','password',2,1,2,'4453021');
INSERT INTO `registro_usuario` VALUES (100,'1004774393','GLORIA ESTELA ','SANCHEZ','3130398401','ernestogomez@vtr.net','monkey',2,1,2,'445321');
INSERT INTO `registro_usuario` VALUES (101,'1005838477','NABOR','ANTE ','570194','rickygodoy@hildegard.cl','qwerty',2,1,2,'4456543');
INSERT INTO `registro_usuario` VALUES (102,'1005868290','EVER','SERRANO ','570172','f.casajuan@gmail.com','1234567',2,1,2,'453215');
INSERT INTO `registro_usuario` VALUES (103,'1006209804','RAMIRO','CHAGUIENDO VALLEJO ','569994','michelebk@hotmail.com','1234',2,1,2,'454643');
INSERT INTO `registro_usuario` VALUES (104,'1006253181','MAURICIO','VELASCO VALLEJO ','569959','loredicat@hotmail.com','letmein',2,1,2,'456789');
INSERT INTO `registro_usuario` VALUES (105,'1006289398','PEDRO','CERON','3128943732','rlillo_2000@hotmail.com','1234',2,1,2,'494024');
INSERT INTO `registro_usuario` VALUES (106,'1006501470','JOSE PATRICIO ','REYES','3217243433','mfbanto@gmail.com','login',2,1,2,'495558');
INSERT INTO `registro_usuario` VALUES (107,'1006514680','JOSE ANIBAL','ITER','3006724790','Sergio.Aspe@adretail.cl','master',2,1,2,'554536');
INSERT INTO `registro_usuario` VALUES (108,'1006514745','MARIELA','CABRERA ','570110','cabbada@gmail.com','letmein',2,1,2,'554653');
INSERT INTO `registro_usuario` VALUES (109,'1006515035','DUVER','MORALES','3101240014','cfalvear@hotmail.com','football',2,1,2,'555678');
INSERT INTO `registro_usuario` VALUES (110,'1006679753','DOLORES','CAMPO ','569949','fgregoriog@vtr.net','dragon',2,1,2,'556710');
INSERT INTO `registro_usuario` VALUES (111,'1006815996','MARIA','MOSQUERA','3195211423','marissaleone@hotmail.com','qwertyuiop',2,1,2,'564643');
INSERT INTO `registro_usuario` VALUES (112,'1006846983','JULIO CENEN','MOSTACILLA','3218932334','jabravot@yahoo.es','12345',2,1,2,'564746');
INSERT INTO `registro_usuario` VALUES (113,'1006847049','JOSE BERNARDO ',' CANDIA CANEDO','570171','ikis_rojo@hotmail.com','solo',2,1,2,'567890');
INSERT INTO `registro_usuario` VALUES (114,'1006849148','DIOMELINA','CORDOBA ','3133442333','fornickinson@hotmail.com','master',2,1,2,'573206');
INSERT INTO `registro_usuario` VALUES (115,'1006948757','JOAQUIN','SOLARTE GAVIRIA ','3157050961','carmenluzlabbe@gmail.com','password',2,1,2,'634621');
INSERT INTO `registro_usuario` VALUES (116,'1006948898','JOSE GABRIEL ','FERNANEZ FRNACO','569948','Sergio.Aspe@adretail.cl','123456',2,1,2,'643829');
INSERT INTO `registro_usuario` VALUES (117,'1006961945','MARICEL','MOSQUERA','3022422843','dlineros@uc.cl','1234567',2,1,2,'656458');
INSERT INTO `registro_usuario` VALUES (118,'1006995730','EYDER','CORREA PULUCHI','570141','allicamposv@hotmail.com','12345678',2,1,2,'663574');
INSERT INTO `registro_usuario` VALUES (119,'1006998833','JOSE SALVADOR ','MONTANER ','3138409304','pablodubof@gmail.com','password',2,1,2,'664583');
INSERT INTO `registro_usuario` VALUES (120,'1007143591','MARIA CRUCITA ','TRUJILLO','3207173070','fernando.gaete@gmail.com','starwars',2,1,2,'6654564');
INSERT INTO `registro_usuario` VALUES (121,'1007143912','FABIO','IPIA','3165093433','vizkala@hotmail.com','dragon',2,1,2,'6655740');
INSERT INTO `registro_usuario` VALUES (122,'1007194562','JOSE EDUIN ','RODRIGUEZ','3219488484','juanocortes@hotmail.com','master',2,1,2,'666757');
INSERT INTO `registro_usuario` VALUES (123,'1007224910','ROSA','CAMPO CHICANGANA ','570257','juanocortes@hotmail.com','123456',2,1,2,'666789');
INSERT INTO `registro_usuario` VALUES (124,'1007282466','CLEMENTINA','MOSQUERA','3193848494','pato_one@hotmail.com','baseball',2,1,2,'667567');
INSERT INTO `registro_usuario` VALUES (125,'1007284124','ANA','CERTUCHE','3203438843','sergiomherrera@gmail.com','baseball',2,1,2,'6675849');
INSERT INTO `registro_usuario` VALUES (126,'1007284254','MARIA ELIA ','LASSO','3213002832','fgaete@colegioaltamira.cl','123456',2,1,2,'6687432');
INSERT INTO `registro_usuario` VALUES (127,'1007327900','JOSE ESMIR',' GAONA  GARAVITO','569940','tallerlaquilla@gmail.com','abc123',2,1,2,'678901');
INSERT INTO `registro_usuario` VALUES (128,'1007348370','MARIA ENNEIDA ','CAMAHU CAMARENA','570146','almendrita203@hotmail.com','111111',2,1,2,'701931');
INSERT INTO `registro_usuario` VALUES (129,'1007361446','SANDRA','MORALES','3172463884','daniela_aguilera_m500@hotmail.com','1qaz2wsx',2,1,2,'702460');
INSERT INTO `registro_usuario` VALUES (130,'1007392304','CECILIO','RODRIGUEZ','3197438733','angelicabergez@gmail.com','starwars',2,1,2,'713631');
INSERT INTO `registro_usuario` VALUES (131,'1007404749','TITO','MOSQUERA','3217148410','jfreitte@vtr.net','123456789',2,1,2,'722123');
INSERT INTO `registro_usuario` VALUES (132,'1007410737','LUZ EIDI','CAMAYO','3167756743','jabravot@yahoo.es','passw0rd',2,1,2,'722142');
INSERT INTO `registro_usuario` VALUES (133,'1007432800','SANDRA MILENA ','VALENCIA','570140','hfreitte2618@gmail.com','1qaz2wsx',2,1,2,'723105');
INSERT INTO `registro_usuario` VALUES (134,'1007477200','RIGOBERTO','FONCECA FONSECA','3210298383','alexus3@hotmail.com','welcome',2,1,2,'723106');
INSERT INTO `registro_usuario` VALUES (135,'1007490202','JOSE','MOSQUERA','3114112516','fernando.gaete@gmail.com','1234567',2,1,2,'7354019');
INSERT INTO `registro_usuario` VALUES (136,'1007529666','JOSE','VARELA FAJARDO','570115','yaz_antu@yahoo.com','princess',2,1,2,'761103');
INSERT INTO `registro_usuario` VALUES (137,'1007587458','ZULMA','MOSQUERA','3158289967','panchop71@hotmail.com','welcome',2,1,2,'765571');
INSERT INTO `registro_usuario` VALUES (138,'1007638618','YULVER ALFREDO','LAME','3113323849','pablo.calderon.cadiz@gmail.com','monkey',2,1,2,'7656453');
INSERT INTO `registro_usuario` VALUES (139,'1007705967','CONCEPCION','CAPOTE','3213432322','vkunstmann@gmail.com','dragon',2,1,2,'768543');
INSERT INTO `registro_usuario` VALUES (140,'1007714941','DAGOBERTO','MOSQUERA','3129488388','aargomedo@hecsa.cl','1234',2,1,2,'777890');
INSERT INTO `registro_usuario` VALUES (141,'1007745230','YANED','MOSQUERA','570180','katagardu@yahoo.com','123456',2,1,2,'789012');
INSERT INTO `registro_usuario` VALUES (142,'1007808610','RAFAEL','RODRIGUEZ','3212434840','rlabarcajaque@gmail.com','master',2,1,2,'819283');
INSERT INTO `registro_usuario` VALUES (143,'1010070833','MESIAS','MOSQUERA','3129383833','jhaschke@cintazul.cl','starwars',2,1,2,'827364');
INSERT INTO `registro_usuario` VALUES (144,'1010084577','MARIA NELCY','RODRIGUEZ','3148693433','lukalcagno@gmail.com','1qaz2wsx',2,1,2,'8767878');
INSERT INTO `registro_usuario` VALUES (145,'1010103737','ROVER ESNEIDER ','VIAFARA','3181233333','ggomara@bancoestado.cl','111111',2,1,2,'8865890');
INSERT INTO `registro_usuario` VALUES (146,'1010122184','SANDRA PATRICIA','MONTILLA ','3182373727','raulcd02ster@gmail.com','qwertyuiop',2,1,2,'887864');
INSERT INTO `registro_usuario` VALUES (147,'1010127661','ERIKA JULIANA ',' CACIMIRO CACO','570076','pedroloiselle@hotmail.com','passw0rd',2,1,2,'887893');
INSERT INTO `registro_usuario` VALUES (148,'1010132382','JOSE','CAMAYO','3140217564','lml@vtr.net','password',2,1,2,'888901');
INSERT INTO `registro_usuario` VALUES (149,'10105994','JOSE FERNANDO','FRIAS FRUTOS','570253','hugocastanedav@hotmail.com','solo',2,1,2,'890123');
INSERT INTO `registro_usuario` VALUES (150,'1015462206','JOSE JHOVANI','VIDAL','3164727343','jbarrera05@hotmail.com','qwertyuiop',2,1,2,'896714');
INSERT INTO `registro_usuario` VALUES (151,'10206561','ROSA CRUZ','RODRIGUEZ','3193838438','sebastian.hannig.g@gmail.com','solo',2,1,2,'900212');
INSERT INTO `registro_usuario` VALUES (152,'1024556848','LUIS ENRIQUE ','ITER','3193848475','pecmor63@gmail.com','12345',2,1,2,'901234');
INSERT INTO `registro_usuario` VALUES (153,'10308815','JAIME',' BUENAVIDES BUENDIA','3198383883','cabrigo@garmendia.cl','qwerty',2,1,2,'9089786');
INSERT INTO `registro_usuario` VALUES (154,'1033801430','MARI','HURTADO ','3133454646','katagardu@yahoo.com','dragon',2,1,2,'9187635');
INSERT INTO `registro_usuario` VALUES (155,'10404045','JOSE ERNELIO',' INOJOSA ISARRARAS','570203','consuelo_caceres@hotmail.com','football',2,1,2,'982737');
INSERT INTO `registro_usuario` VALUES (156,'1057602160','JAIRO YOBEIRP ','','570074','hpjlr@hotmail.com','solo',2,1,2,'987986');
INSERT INTO `registro_usuario` VALUES (157,'1058975509','PEDRO ELVIS ',' BUGARIN BUITIME','569962','carmenluzlabbe@gmail.com','welcome',2,1,2,'989786');
INSERT INTO `registro_usuario` VALUES (158,'1059910668','JOSE DIONICIO','VARAGAS VARGAS','3022490499','cibravohuerta@yahoo.com','princess',2,1,2,'997978');
INSERT INTO `registro_usuario` VALUES (159,'1059916214','EDUARD','CHANTRE ','6582354','pecmor63@gmail.com','111111',2,1,2,'998979');
INSERT INTO `registro_usuario` VALUES (160,'1060239423','MARIA','SALZAR','3126384343','aylincita11@hotmail.com','password',2,1,2,'999012');
INSERT INTO `registro_usuario` VALUES (161,'1060873935','MARIA','MORALES','95463638','dddura69@gmail.com','1234567890',2,1,2,'999022');
INSERT INTO `registro_usuario` VALUES (162,'1060988489','ANA ZULEI','MOSQUERA','3005429033','luisgabriel.gonzalez@gmail.com','letmein',2,1,2,'999091');
INSERT INTO `registro_usuario` VALUES (163,'1061088387','LUZ MIRIAN','MUÑOZ LEGUISAMLO ','3107184896','cmerinosuarez@gmail.com','123456789',2,1,2,'100100');
INSERT INTO `registro_usuario` VALUES (164,'1061088541','JOSE OMAR',' INIGUES INOJOS','570199','yaz_antu@yahoo.com','123456789',2,1,2,'100797');
INSERT INTO `registro_usuario` VALUES (165,'1061542806','FRANCISCO ANTONIO','MOSQUERA','3194662683','enrigom@gmail.com','master',2,1,2,'106179');
INSERT INTO `registro_usuario` VALUES (166,'1061601352','MARIA IRMA ','CALLES CALLETANO','570133','melisherman@hotmail.com','baseball',2,1,2,'1092033');
INSERT INTO `registro_usuario` VALUES (167,'1061693348','MIREYA','MOSQUERA','3110383883','aarriagada@petrok.cl','1234567890',2,1,2,'109876');
INSERT INTO `registro_usuario` VALUES (168,'1061709383','MARIA SIMONA','LAME','3192939383','claudiocastanonmigeot@gmail.com','123456789',2,1,2,'1100987');
INSERT INTO `registro_usuario` VALUES (169,'1061710138','ELVIA CRUZ','MOSQUERA','3123342343','casajuana_@hotmail.com','12345678',2,1,2,'110989');
INSERT INTO `registro_usuario` VALUES (170,'1061714705','CRUZ NELLY','DIAZ','570136','xfreitte@gmail.com','abc123',2,1,2,'111098');
INSERT INTO `registro_usuario` VALUES (171,'1061725097','DEMETRIA',' GALARZA GARSIA','569916','galo.jara@gmail.com','PASSW0RD',2,1,2,'111209');
INSERT INTO `registro_usuario` VALUES (172,'1061726254','ESPERANZA','HARO HARRIS CUENCA CUESTA','3283398833','apalamosg@hotmail.com','abc123',2,1,2,'111213');
INSERT INTO `registro_usuario` VALUES (173,'1061726693','JOSE DUBAN','PESCADOR ','3102837323','lml@vtr.net','monkey',2,1,2,'111232');
INSERT INTO `registro_usuario` VALUES (174,'1061730297','ANA LILIANA','FUERTE FULGENCIO','570262','claudiocastanonmigeot@gmail.com','starwars',2,1,2,'111987');
INSERT INTO `registro_usuario` VALUES (175,'1061730841','MARCO','SAABEDRA ','570224','faraya1910@hotmail.com','1234567890',2,1,2,'112134');
INSERT INTO `registro_usuario` VALUES (176,'1061732358','LUZ','TROCHEZ','3114043000','c.marambiomelis@gmail.com','princess',2,1,2,'1135869');
INSERT INTO `registro_usuario` VALUES (177,'1061743887','MARIA','CAMACHO','3148189873','xfreitte@gmail.com','12345678',2,1,2,'1142351');
INSERT INTO `registro_usuario` VALUES (178,'1061744201','JORGINA','CAPOTE','3003448343','alexus3@hotmail.com','master',2,1,2,'1145832');
INSERT INTO `registro_usuario` VALUES (179,'1061745671','DENIFE AMPARITO','CUCHILLO','3223204303','f.casajuan@gmail.com','starwars',2,1,2,'120212');
INSERT INTO `registro_usuario` VALUES (180,'1061759608','MARIA','RODRIGUEZ','3113406292','osabarca@hotmail.com','1234567',2,1,2,'120217');
INSERT INTO `registro_usuario` VALUES (181,'1061763512','LUZ ENEIDA ','CAPOTE','570118','consuelo.fornes@gmail.com','1234567',2,1,2,'120605');
INSERT INTO `registro_usuario` VALUES (182,'1061766096','ADIELA','VALENCIA','570197','isabel.goldsack@sekmail.com','123456789',2,1,2,'121303');
INSERT INTO `registro_usuario` VALUES (183,'1061768782','JESUS','ANTE ','570213','claudiocastanonmigeot@gmail.com','master',2,1,2,'121626');
INSERT INTO `registro_usuario` VALUES (184,'1061770873','MARIA','FERREIRA','570099','oscar.brito@gmail.com','1qaz2wsx',2,1,2,'122120');
INSERT INTO `registro_usuario` VALUES (185,'1061771088','MARIA RUBIELA ','PILLIMUE MUÑOZ','570091','francis_nexos@hotmail.com','qwerty',2,1,2,'1223345');
INSERT INTO `registro_usuario` VALUES (186,'1061773665','CRISTIAN ARLEY',' CABESA CABRAL','569993','plizama@mediplex.cl','login',2,1,2,'1234165');
INSERT INTO `registro_usuario` VALUES (187,'1061773773','MARIA','MORALES','3226395384','vkunstmann@gmail.com','starwars',2,1,2,'123444');
INSERT INTO `registro_usuario` VALUES (188,'1061775614','MIGUEL ANGEL','FAYA ','3018367273','rickygodoy@hildegard.cl','baseball',2,1,2,'123456');
INSERT INTO `registro_usuario` VALUES (189,'1061776039','JOSE MELCIADIS ','MOSQUERA','3217393933','anibalito___@hotmail.com','football',2,1,2,'123521');
INSERT INTO `registro_usuario` VALUES (190,'1061777560','HENRY','QUINTANA ','3149293023','x.josegonzalez@gmail.com','qwerty',2,1,2,'1263573');
INSERT INTO `registro_usuario` VALUES (191,'1061777894','JESUS ANTONIO','QUILINDO ','3102938333','jaime.carmona@gendarmeria.cl ','solo',2,1,2,'129384');
INSERT INTO `registro_usuario` VALUES (192,'1061778602','MARIA','JOAQUI PILLIMUE ','570162','jaime.carmona@gendarmeria.cl ','football',2,1,2,'131095');
INSERT INTO `registro_usuario` VALUES (193,'1061780240','JOSE','RODRIGUEZ','3142349484','cjimenez1000@yahoo.es','monkey',2,1,2,'135698');
INSERT INTO `registro_usuario` VALUES (194,'1061783018','HECTOR','CERON','3113424323','koenigis@googlemail.com','welcome',2,1,2,'151421');
INSERT INTO `registro_usuario` VALUES (195,'1061783045','NORALBA','LAME','3015442051','fran.afull@live.cl','1234567890',2,1,2,'152612');
INSERT INTO `registro_usuario` VALUES (196,'1061785086','FIDELINA','MOSQUERA','570078','alvaro.espoz@gmail.com','123456',2,1,2,'1543201');
INSERT INTO `registro_usuario` VALUES (197,'1061786266','FIDELINA ',' CAMBRAY CAMINO','570156','maeillanes@hotmail.com','master',2,1,2,'154321');
INSERT INTO `registro_usuario` VALUES (198,'1061786316','JOSE','BURBANO MUNIPA ','570161','raulcd02ster@gmail.com','123456789',2,1,2,'160315');
INSERT INTO `registro_usuario` VALUES (199,'1061786325','OMAR HERNANDO','MUÑOZ','570142','jfreitte@vtr.net','dragon',2,1,2,'1654032');
INSERT INTO `registro_usuario` VALUES (200,'1061786369','APOLINAR','FERREIRA','3123383483','fran.afull@live.cl','123456789',2,1,2,'165432');
INSERT INTO `registro_usuario` VALUES (201,'1061787686','LUZ','VIAFARA','3104221915','fernandofreitte.xia@gmail.com','qwerty',2,1,2,'1760543');
INSERT INTO `registro_usuario` VALUES (202,'1061788434','ALDEMAR ANTONIO','ZUÑIGA','3117018260','arturojabalquinto@hotmail.com','123456789',2,1,2,'176543');
INSERT INTO `registro_usuario` VALUES (203,'1061788713','MARIANGELA','MOSQUERA','570252','jhaschke@cintazul.cl','letmein',2,1,2,'180009');
INSERT INTO `registro_usuario` VALUES (204,'1061789329','VICTOR','RUIZ REYES ','569976','mfbanto@gmail.com','qwerty',2,1,2,'1870654');
INSERT INTO `registro_usuario` VALUES (205,'1061790659','FERNANDO ALBAN','PAZ','570084','patorfebre@hotmail.com','password',2,1,2,'187322');
INSERT INTO `registro_usuario` VALUES (206,'1061791257','CINDY YORELI','RODRIGUEZ','3192322122','llazo@agrical.cl','qwertyuiop',2,1,2,'187654');
INSERT INTO `registro_usuario` VALUES (207,'1061792532','LUIS EDUARDO ',' CACALOTL CACILLAS','570000','flobato.c@gmail.com','qwertyuiop',2,1,2,'192655');
INSERT INTO `registro_usuario` VALUES (208,'1061793222','MARIELA','LAME','3128373842','aegambet@uc.cl','12345',2,1,2,'1980765');
INSERT INTO `registro_usuario` VALUES (209,'1061793476','MANUEL','CALSADA CALVARIO','570134','aylincita11@hotmail.com','welcome',2,1,2,'198765');
INSERT INTO `registro_usuario` VALUES (210,'1061793625','MARIA','TUMIÑA','3234434343','director@buinzoo.cl','abc123',2,1,2,'200506');
INSERT INTO `registro_usuario` VALUES (211,'1061793806','KATHERINE','LAME','3132323435','patorfebre@hotmail.com','1234',2,1,2,'206495');
INSERT INTO `registro_usuario` VALUES (212,'1061794207','OLIVA','MORALES','3148214142','verocakatalinic@hotmail.com','qwertyuiop',2,1,2,'210987');
INSERT INTO `registro_usuario` VALUES (213,'1061794382','DIMER FERNANDO',' ANTILLON ANTUNA','3152784095','arquitectoasenjo@gmail.com','1234567',2,1,2,'216371');
INSERT INTO `registro_usuario` VALUES (214,'1061794396','JOSE MILCIADES ','FIGUEROA FILOTEO','3000232322','ikis_rojo@hotmail.com','1234',2,1,2,'2213245');
INSERT INTO `registro_usuario` VALUES (215,'1061795272','VIRGELINA','CIFUENTES ','570187','casajuana_@hotmail.com','1234567890',2,1,2,'222016');
INSERT INTO `registro_usuario` VALUES (216,'1061796097','LUIS','MUÑOZ BUESAQUILLO','3181882268','susana0413@hotmail.com','princess',2,1,2,'222432');
INSERT INTO `registro_usuario` VALUES (217,'1061796256','RAQUEL','MOSQUERA','3128383322','pamelagallardop@hotmail.com','qwerty',2,1,2,'222670');
INSERT INTO `registro_usuario` VALUES (218,'1061796301','MARIA FELISA','MOSQUERA','3118383833','aargomedo@hecsa.cl','1234567',2,1,2,'223154');
INSERT INTO `registro_usuario` VALUES (219,'1061796304','DIEGO ALFARO',' GALAVIS GALBAN','569913','joacocordero@gmail.com','123456789',2,1,2,'224898');
INSERT INTO `registro_usuario` VALUES (220,'1061797338','JOSE','MOSQUERA','3003434333','carlos.goldsack@nismar.cl','login',2,1,2,'2263542');
INSERT INTO `registro_usuario` VALUES (221,'1061797425','MARCO ANTONIO ','GANBOA GANDARA','569934','pili_diami_angol@hotmail.com','1234567890',2,1,2,'232344');
INSERT INTO `registro_usuario` VALUES (222,'1061798175','ANA','MOSQUERA','3013456565','mgoldsackz@gmail.com','qwertyuiop',2,1,2,'234555');
INSERT INTO `registro_usuario` VALUES (223,'1061798277','LEON',' CAPETILLO CAPISTRANO','570198','niikhox__@hotmail.com','qwerty',2,1,2,'234567');
INSERT INTO `registro_usuario` VALUES (224,'1061799187','CECILIO',' CALVILLO CALZADA','570135','d.mena@live.cl','1234567890',2,1,2,'235678');
INSERT INTO `registro_usuario` VALUES (225,'1061799774','MARIA EUGENIA ','GAMERO GAMES','569929','juanocortes@hotmail.com','welcome',2,1,2,'273648');
INSERT INTO `registro_usuario` VALUES (226,'1061799837','MARIA CEFERINA ','ILLESCAS INFANTE','570193','nina_cabbada@hotmail.com','12345',2,1,2,'280495');
INSERT INTO `registro_usuario` VALUES (227,'1061800031','FILOMENA','MORALES','3158021599','natygris@hotmail.com','solo',2,1,2,'294529');
INSERT INTO `registro_usuario` VALUES (228,'1061800103','LIDIA MILENA ','IANES IANITO','570184','superjp_coco@hotmail.com','12345678',2,1,2,'298500');
INSERT INTO `registro_usuario` VALUES (229,'1061800128','RUBERT','MOSQUERA','3104220488','diazma@tiscali.it','baseball',2,1,2,'300120');
INSERT INTO `registro_usuario` VALUES (230,'1061800285','LUCILA','ITER','3213943743','cjimenez1000@yahoo.es','1234567',2,1,2,'309876');
INSERT INTO `registro_usuario` VALUES (231,'1061800643','JOSE OMEIDA ','GASPAR GASTAN','569933','nelsonunion@hotmail.com','qwerty',2,1,2,'310535');
INSERT INTO `registro_usuario` VALUES (232,'1061800663',' JAMES OVISSNE ','MORALES','3289445455','joy_pao_@hotmail.com','abc123',2,1,2,'310987');
INSERT INTO `registro_usuario` VALUES (233,'1061801691','LUZ ESTELA ',' FERREL FIERRO','3003443232','carlosaguileram@hotmail.com','football',2,1,2,'311329');
INSERT INTO `registro_usuario` VALUES (234,'1061801965','JOSE BONIFACIO','FERNANDES FERNANDEZ','3219983838','Sb.nashxo.sk8@hotmail.com','12345',2,1,2,'312829');
INSERT INTO `registro_usuario` VALUES (235,'1061802172','EDWIN ANDRES ','VALENCIA','3219383833','japacortes@yahoo.com','dragon',2,1,2,'313562');
INSERT INTO `registro_usuario` VALUES (236,'1061803351','MARIA ISABEL ','GATICA GAUNA','569939','susana0413@hotmail.com','12345',2,1,2,'314304');
INSERT INTO `registro_usuario` VALUES (237,'1061803417','SANDRA INES','FLOR','3103444433','arquitectoasenjo@gmail.com','1qaz2wsx',2,1,2,'314869');
INSERT INTO `registro_usuario` VALUES (238,'1061803981','MARISOL','DORADO','3007519912','amarantasol@gmail.com','football',2,1,2,'316718');
INSERT INTO `registro_usuario` VALUES (239,'1061804351','SAUL','ITER','570123','jmfornes@yahoo.com','baseball',2,1,2,'316719');
INSERT INTO `registro_usuario` VALUES (240,'1061804523','DEISI YURANI','LULIGO','3183483883','javier_celedon@hotmail.com','welcome',2,1,2,'321098');
INSERT INTO `registro_usuario` VALUES (241,'1061804547','YURI ANDREA','RODRIGUEZ','3213348845','nelsonunion@hotmail.com','welcome',2,1,2,'321351');
INSERT INTO `registro_usuario` VALUES (242,'1061804582','ANDRES','SOLARTE CHAVEZ','569915','aarriagada@petrok.cl','princess',2,1,2,'322556');
INSERT INTO `registro_usuario` VALUES (243,'1061804836','MIGUEL ANGEL ','PEÑA ','569950','caspe@canal13.cl','password',2,1,2,'330987');
INSERT INTO `registro_usuario` VALUES (244,'1061805835','ALICIA','RENGIFO ','8380287','paulinadelacarrera@gmail.com','12345',2,1,2,'3312343');
INSERT INTO `registro_usuario` VALUES (245,'1061806176','EIDER','SAMBONI ','3113808625','jmartinezcossio@gmail.com','passw0rd',2,1,2,'3323264');
INSERT INTO `registro_usuario` VALUES (246,'1061808083','JOSE ANTONIO',' FUENTE FUENTES','570256','acastanon@vectorchile.cl','passw0rd',2,1,2,'333456');
INSERT INTO `registro_usuario` VALUES (247,'1061808584','MARIA',' COLLAZOS ','3117624977','flobato.c@gmail.com','abc123',2,1,2,'3351424');
INSERT INTO `registro_usuario` VALUES (248,'1061808649','JOSE ENELIO ','CANCHOLA CANCINO','570165','fran.afull@live.cl','princess',2,1,2,'337650');
INSERT INTO `registro_usuario` VALUES (249,'1061808765','GERMAN','LAME','7594752','alvaro.espoz@gmail.com','dragon',2,1,2,'345109');
INSERT INTO `registro_usuario` VALUES (250,'1061808895','JOSE LIBER','GALINDEZ CAPOTE ','569944','paulinadelacarrera@gmail.com','1qaz2wsx',2,1,2,'345678');
INSERT INTO `registro_usuario` VALUES (251,'1061809038','JOVA','VELASCO','3004580030','consuelo_caceres@hotmail.com','abc123',2,1,2,'355464');
INSERT INTO `registro_usuario` VALUES (252,'1061809165','MANUEL ANTONIO','MOLINA FRANCO ','3118379332','ggedies@hotmail.com','1234567',2,1,2,'370206');
INSERT INTO `registro_usuario` VALUES (253,'1061809284','DORIS','TIAGO MOSQUERA ','3209174545','jlance60@bancoestado.cl','qwerty',2,1,2,'388681');
INSERT INTO `registro_usuario` VALUES (254,'1061809335','SIGIFREDO',' CUMPLIDO CURA','3002343444','kristian_siempre_azul@hotmail.com','dragon',2,1,2,'400567');
INSERT INTO `registro_usuario` VALUES (255,'1061810987','LUCI','SANCHEZ','3215667676','pamelagallardop@hotmail.com','abc123',2,1,2,'422880');
INSERT INTO `registro_usuario` VALUES (256,'1061811343','ALEXIS ARNE ',' CAMAU CAMBEROS','570153','iabarcae@yahoo.es','dragon',2,1,2,'431260');
INSERT INTO `registro_usuario` VALUES (257,'1061811686','DIANA','DORADO','3132015422','loredicat@hotmail.com','1234567',2,1,2,'4354256');
INSERT INTO `registro_usuario` VALUES (258,'1061811803','ENUAR','MOSQUERA','3208657135','constructor77@gmail.com','12345678',2,1,2,'440908');
INSERT INTO `registro_usuario` VALUES (259,'1061811824','MARIA CARMELA ','CAASAYU CABALLERO','569989','dlineros@uc.cl','monkey',2,1,2,'444543');
INSERT INTO `registro_usuario` VALUES (260,'1061811853','JOSE EVARISTO','PIAGUA ','570166','fernando.gaete@gmail.com','letmein',2,1,2,'444567');
INSERT INTO `registro_usuario` VALUES (261,'1061811859','JOSE','JIMENEZ','570106','superjp_coco@hotmail.com','monkey',2,1,2,'4453021');
INSERT INTO `registro_usuario` VALUES (262,'1061811928','SANDRA','MOSQUERA','3223626255','llazo@agrical.cl','123456789',2,1,2,'445321');
INSERT INTO `registro_usuario` VALUES (263,'1061811984','NOREYI','MOLINA FRANCO ','570167','tantitamivida@gmail.com','1234',2,1,2,'4456543');
INSERT INTO `registro_usuario` VALUES (264,'1061812045','JESUS ARIEL ','CHICONGUÑA ','569932','ejimenez@med.uchile.cl','12345678',2,1,2,'453215');
INSERT INTO `registro_usuario` VALUES (265,'1061812050','MARIA MERCEDES ','VIDAL','3193474922','jlescote@gasco.cl','123456789',2,1,2,'454643');
INSERT INTO `registro_usuario` VALUES (266,'1061812057','MONICA ANDREA','MEJIA','3198233337','dgomezl@bancochile.cl','dragon',2,1,2,'456789');
INSERT INTO `registro_usuario` VALUES (267,'1061812066','MANUEL ARCECIO ','IPIA','570259','sergiomherrera@gmail.com','login',2,1,2,'494024');
INSERT INTO `registro_usuario` VALUES (268,'1061812119','JOSE FERNEY','MOSQUERA','3203840334','bantomaui@gmail.com','letmein',2,1,2,'495558');
INSERT INTO `registro_usuario` VALUES (269,'1061812243','MARIA','MORALES SERNA ','3214959984','cmandak@vtr.net','login',2,1,2,'554536');
INSERT INTO `registro_usuario` VALUES (270,'1061812277','ANDRES FELIPE ','MARIN','570235','x.josegonzalez@gmail.com','111111',2,1,2,'554653');
INSERT INTO `registro_usuario` VALUES (271,'1061812320','DELIO','CAPOTE','3193482383','gala108@hotmail.com','1234',2,1,2,'555678');
INSERT INTO `registro_usuario` VALUES (272,'1061812409','MARINO',' GAMA GAMBOA','569926','japacortes@yahoo.com','baseball',2,1,2,'556710');
INSERT INTO `registro_usuario` VALUES (273,'1061812479','JESUS MARIA ',' CUSICUIY CUSIHUIDZU','3195647723','mapuchin@hotmail.com','master',2,1,2,'564643');
INSERT INTO `registro_usuario` VALUES (274,'1061812812','LUZ HERMINDA ','RODRIGUEZ','570261','koenigis@googlemail.com','princess',2,1,2,'564746');
INSERT INTO `registro_usuario` VALUES (275,'1061812859','EVER','LAME','3217528533','rlabarcajaque@gmail.com','123456',2,1,2,'567890');
INSERT INTO `registro_usuario` VALUES (276,'1061813257','FABIONEL','RODRIGUEZ','3103434344','enrigom@gmail.com','123456',2,1,2,'573206');
INSERT INTO `registro_usuario` VALUES (277,'10706866','DIDIMO','CAMAYO ','570075','sebastianatila@hotmail.com','1234567890',2,1,2,'634621');
INSERT INTO `registro_usuario` VALUES (278,'1075294892','ALBA MARY','MOSQUERA','570249','gala108@hotmail.com','monkey',2,1,2,'643829');
INSERT INTO `registro_usuario` VALUES (279,'1075308264','CRUZ','CALBARIO CALBO','570101','emarfil@bancochile.cl','123456789',2,1,2,'656458');
INSERT INTO `registro_usuario` VALUES (280,'1075312403','JOSE','RODRIGUEZ','3232343443','siturri17@hotmail.com','111111',2,1,2,'663574');
INSERT INTO `registro_usuario` VALUES (281,'1077872481','MARIA','BOLAÑOS ','569924','joy_pao_@hotmail.com','qwertyuiop',2,1,2,'664583');
INSERT INTO `registro_usuario` VALUES (282,'1077873093','RAQUEL',' GAVILAN MGAVINO','569945','cdksfofi@hotmail.com','football',2,1,2,'6654564');
INSERT INTO `registro_usuario` VALUES (283,'1079509043','RUBIELA','MONDRAGON ','570095','jabravot@yahoo.es','111111',2,1,2,'6655740');
INSERT INTO `registro_usuario` VALUES (284,'1080265751','PEDRO ANTONIO',' HUARACHA HUERTA','3502293157','mfbanto@gmail.com','1qaz2wsx',2,1,2,'666757');
INSERT INTO `registro_usuario` VALUES (285,'1080265761','MANUEL ROSAS','MORALES','3213983833','c.analuz@yahoo.es','football',2,1,2,'666789');
INSERT INTO `registro_usuario` VALUES (286,'1080265976','MARIA NORALBA ',' CAMAYO ','3131907562','michelebk@hotmail.com','monkey',2,1,2,'667567');
INSERT INTO `registro_usuario` VALUES (287,'1080903045','ELSA','CLAVIJO ','570234','leonor.araya@gmail.com','111111',2,1,2,'6675849');
INSERT INTO `registro_usuario` VALUES (288,'1081408505','HUGO  ALBERTO  ','ANDRADE ','8328213','cabrigo@garmendia.cl','baseball',2,1,2,'6687432');
INSERT INTO `registro_usuario` VALUES (289,'1081420675','ANA  TERESA','CASANOVA ','3198737333','jmfornes@yahoo.com','dragon',2,1,2,'678901');
INSERT INTO `registro_usuario` VALUES (290,'1081594185','NURY',' HERNANDEZ ','570086','cfernandez@isa.cl','12345678',2,1,2,'701931');
INSERT INTO `registro_usuario` VALUES (291,'1081595299','FLOR MARIA ','GALBES GALEGO','569917','pepacordero@gmail.com','football',2,1,2,'702460');
INSERT INTO `registro_usuario` VALUES (292,'1081595359','MARIA','VILLAQUIRAN MUÑLOZ','570228','javier_celedon@hotmail.com','login',2,1,2,'713631');
INSERT INTO `registro_usuario` VALUES (293,'1081595564','MARIA','NORUEGA ','3122887929','cfernandez@isa.cl','monkey',2,1,2,'722123');
INSERT INTO `registro_usuario` VALUES (294,'1082159943','LORENA','AGRDO IPIA ','3204938343','crilofer63@gmail.com','dragon',2,1,2,'722142');
INSERT INTO `registro_usuario` VALUES (295,'1082749003','JAVIER SILVERIO','QUELAL','570128','lml@vtr.net','1234567890',2,1,2,'723105');
INSERT INTO `registro_usuario` VALUES (296,'1082780127','YEFER ENAIRO ',' JARA JARAMILLO','570217','icalderon@tecval.cl','welcome',2,1,2,'723106');
INSERT INTO `registro_usuario` VALUES (297,'1083814379','MELBA ROCIO ',' CARA CARABAJAL','570202','kristian_siempre_azul@hotmail.com','123456789',2,1,2,'7354019');
INSERT INTO `registro_usuario` VALUES (298,'1083874193','JESUS ELADIO ','BURGOS BURNETT','569977','jlance60@bancoestado.cl','abc123',2,1,2,'761103');
INSERT INTO `registro_usuario` VALUES (299,'1083918483','JUAN CARLOS','GUACHETA ','3217393728','kresimirljubetic@vtr.net','12345678',2,1,2,'765571');
INSERT INTO `registro_usuario` VALUES (300,'1083920675','MARIA','MOSQUERA','3219939484','ggedies@hotmail.com','monkey',2,1,2,'7656453');
INSERT INTO `registro_usuario` VALUES (301,'1083921097','MARIA','LEGARDA RIVERA','570122','lukalcagno@gmail.com','passw0rd',2,1,2,'768543');
INSERT INTO `registro_usuario` VALUES (302,'1083922102','MARIA LIDA ','SERNA VEGA ','569990','claudiabergez@gmail.com','football',2,1,2,'777890');
INSERT INTO `registro_usuario` VALUES (303,'1083922308','EVANGELINA',' APODACA APOLINAR','3156882992','Sergio.Aspe@adretail.cl','welcome',2,1,2,'789012');
INSERT INTO `registro_usuario` VALUES (304,'1083922562','JOSE','GARCIA ','3215295216','mafigza@gmail.com','princess',2,1,2,'819283');
INSERT INTO `registro_usuario` VALUES (305,'1083922759','JOSE HONORIO','MOSQUERA','570097','mafigza@gmail.com','123456789',2,1,2,'827364');
INSERT INTO `registro_usuario` VALUES (306,'1083924054','ANA DEYFA ','MENDEZ GOIMEZ','569985','jbarrera05@hotmail.com','123456789',2,1,2,'8767878');
INSERT INTO `registro_usuario` VALUES (307,'1083925137','ROSAURA','AVEDAÑO','570229','faraya@sprint.cl','abc123',2,1,2,'8865890');
INSERT INTO `registro_usuario` VALUES (308,'1083925692','FABIOLA',' CUEYO CUIN','3229348488','luuuuuuci@hotmail.com','1qaz2wsx',2,1,2,'887864');
INSERT INTO `registro_usuario` VALUES (309,'1084227884','RONAL ARLEYY','IPIA','3182128382','fgregoriog@vtr.net','qwertyuiop',2,1,2,'887893');
INSERT INTO `registro_usuario` VALUES (310,'1084552489','HECTOR FABIO ',' HINOJOSA HORNELAS','3204175949','caspe@canal13.cl','1234567890',2,1,2,'888901');
INSERT INTO `registro_usuario` VALUES (311,'1084867429','ERFILIA','MANZILLA MUNIPA ','570104','rcabbada@vtr.net','master',2,1,2,'890123');
INSERT INTO `registro_usuario` VALUES (312,'1084898360','ARELIS','RODRIGUEZ','3201232211','director@buinzoo.cl','qwerty',2,1,2,'896714');
INSERT INTO `registro_usuario` VALUES (313,'1085318754','MARIA YENNI ','LEGUISAMO ','3210797875','maeillanes@hotmail.com','1234',2,1,2,'900212');
INSERT INTO `registro_usuario` VALUES (314,'1085321119','JUAN PABLO','CUSIMAU CUSIMEY','3128747940','eduardo.arancibia@grange.cl','letmein',2,1,2,'901234');
INSERT INTO `registro_usuario` VALUES (315,'1085337095','MARIA ERLY','MORALES','3212384484','carlosarteaga.pef@gmail.com','111111',2,1,2,'9089786');
INSERT INTO `registro_usuario` VALUES (316,'1085338829','JORGE ALONSO',' FRAGOSO FRAIDE','570241','f.casajuan@gmail.com','letmein',2,1,2,'9187635');
INSERT INTO `registro_usuario` VALUES (317,'1085339572','MIGUEL','VIAFARA','3004445638','jmfornes@yahoo.com','starwars',2,1,2,'982737');
INSERT INTO `registro_usuario` VALUES (318,'1085339732','DIMAS','VALENCIA','3128378333','natygris@hotmail.com','111111',2,1,2,'987986');
INSERT INTO `registro_usuario` VALUES (319,'1085635838','HENRY','IBARRA IDALGO','570185','cabbada@gmail.com','qwerty',2,1,2,'989786');
INSERT INTO `registro_usuario` VALUES (320,'1085690545','MAYER','ARMERO ','570250','annabeck_@hotmail.com','passw0rd',2,1,2,'997978');
INSERT INTO `registro_usuario` VALUES (321,'1085939567','CECILIA',' HERNANDEZ HERRADA','3128344209','leonor.araya@gmail.com','passw0rd',2,1,2,'998979');
INSERT INTO `registro_usuario` VALUES (322,'1085942762','YESMIREY','VELASCO SERNA ','3126038868','fgregoriog@vtr.net','123456789',2,1,2,'999012');
INSERT INTO `registro_usuario` VALUES (323,'1085943692','MARIA ALBA ','PEREZ CASRO ','3103221212','debora1611@hotmail.com','passw0rd',2,1,2,'999022');
INSERT INTO `registro_usuario` VALUES (324,'1085945961','YULI','VIDAL CAMPO ','3185188701','hpjlr@hotmail.com','111111',2,1,2,'999091');
INSERT INTO `registro_usuario` VALUES (325,'1085946932','JESUS',' CARABALLO CARABANTES','570204','mapuchin@hotmail.com','football',2,1,2,'100100');
INSERT INTO `registro_usuario` VALUES (326,'1085946965','MANUEL FERNANDO','GUTIERREZ','570174','mareneegaete@hotmail.com','qwertyuiop',2,1,2,'100797');
INSERT INTO `registro_usuario` VALUES (327,'1085947367','LEIDI GUICELA ','LAME','3113737387','xicagogo@yahoo.es','1qaz2wsx',2,1,2,'106179');
INSERT INTO `registro_usuario` VALUES (328,'1085947955','LEIDY KARINA','MOSQUERA','3219392837','plizama@mediplex.cl','password',2,1,2,'1092033');
INSERT INTO `registro_usuario` VALUES (329,'1085948452','LIBARDO','MOSQUERA','3119383023','mapuchin@hotmail.com','solo',2,1,2,'109876');
INSERT INTO `registro_usuario` VALUES (330,'1085948740','MARIA ANGELA ','CACUAA CACUIY','570079','crilofer63@gmail.com','starwars',2,1,2,'1100987');
INSERT INTO `registro_usuario` VALUES (331,'1085949713','JULIAN','MOSQUERA','3134343933','faraya@sprint.cl','qwerty',2,1,2,'110989');
INSERT INTO `registro_usuario` VALUES (332,'1086107136','MARIA MELCY','CAMPO','3013739833','dantekol@hotmail.com','111111',2,1,2,'111098');
INSERT INTO `registro_usuario` VALUES (333,'1086133350','LUZ AIDA ','MOSQUERA','570176','aegambet@uc.cl','passw0rd',2,1,2,'111209');
INSERT INTO `registro_usuario` VALUES (334,'1086298870','LEIDY DORANY','VEGA CHAGUENDO ','3156136332','khiton_@hotmail.com','qwerty',2,1,2,'111213');
INSERT INTO `registro_usuario` VALUES (335,'1086755234','RENE ALEJANDRO ','MOSQUERA','3138838929','vivianagarridon@hotmail.com','1234',2,1,2,'111232');
INSERT INTO `registro_usuario` VALUES (336,'1086982959','YEIMI MAGALI ','RODRIGUEZ','570232','ernestogomez@vtr.net','1234567890',2,1,2,'111987');
INSERT INTO `registro_usuario` VALUES (337,'1087027769','FELICIANO','MOSQUERA','3193848348','galo.jara@gmail.com','dragon',2,1,2,'112134');
INSERT INTO `registro_usuario` VALUES (338,'1087642454','MARIA ELISABETH','MOSQUERA','570183','ggedies@hotmail.com','12345678',2,1,2,'1135869');
INSERT INTO `registro_usuario` VALUES (339,'1088130123','HENRY','RODRIGUEZ','3137152311','Karito_1404@hotmail.com','1234',2,1,2,'1142351');
INSERT INTO `registro_usuario` VALUES (340,'1088597992','MARIA','MOSQUERA','3153892838','sebastian.hannig.g@gmail.com','football',2,1,2,'1145832');
INSERT INTO `registro_usuario` VALUES (341,'1088598757','JOSE ABEL ','VALENCIA','570175','pamelagallardop@hotmail.com','solo',2,1,2,'120212');
INSERT INTO `registro_usuario` VALUES (342,'1088653875','FABIAN','NAVIA','3129393303','hugocastanedav@hotmail.com','qwerty',2,1,2,'120217');
INSERT INTO `registro_usuario` VALUES (343,'1088653959','JAMES YONEI','MOSQUERA','3136256632','verocakatalinic@hotmail.com','abc123',2,1,2,'120605');
INSERT INTO `registro_usuario` VALUES (344,'1088738576','JOSE','CANTERO PEÑA ','570254','japacortes@yahoo.com','starwars',2,1,2,'121303');
INSERT INTO `registro_usuario` VALUES (345,'1088973556','ISABEL','ITER','3293488438','tango_negro@hotmail.com','1234567',2,1,2,'121626');
INSERT INTO `registro_usuario` VALUES (346,'1088976050','JOSE JOSE ',' GEBARA GEORGE','569956','vkunstmann@gmail.com','1234567',2,1,2,'122120');
INSERT INTO `registro_usuario` VALUES (347,'1089484390','JOSE JAIR','RODRIGUEZ','3183271406','cdksfofi@hotmail.com','111111',2,1,2,'1223345');
INSERT INTO `registro_usuario` VALUES (348,'1089847788','ERIKA','MELLIZO','570120','dantekol@hotmail.com','solo',2,1,2,'1234165');
INSERT INTO `registro_usuario` VALUES (349,'1105802','JOSE OVIDIO','ANSALDO ANSURES','3218155060','carlosarteaga.pef@gmail.com','1234',2,1,2,'123444');
INSERT INTO `registro_usuario` VALUES (350,'1112230172','MARIA','VELASCO','3167187322','glazo@mbienes.cl','12345',2,1,2,'123456');
INSERT INTO `registro_usuario` VALUES (351,'1112489621','TOBIAS',' GAYTAN GAZCA','569947','michael.keller@udp.cl','1234',2,1,2,'123521');
INSERT INTO `registro_usuario` VALUES (352,'1113687058','IRMA','CAMAYO CORTEZ','8329077','anamariadelacarrera@gmail.com','qwerty',2,1,2,'1263573');
INSERT INTO `registro_usuario` VALUES (353,'1117550392','MARIA AURORA','MORALES','570094','marcelafigueroazamora@hotmail.com','12345',2,1,2,'129384');
INSERT INTO `registro_usuario` VALUES (354,'1118029178','JESUS','CHATE','3223049939','hectorm_jc@hotmail.com','master',2,1,2,'131095');
INSERT INTO `registro_usuario` VALUES (355,'1122785350','MARIA JESUS ','CAHUIYO CALATA','570098','c.marambiomelis@gmail.com','12345',2,1,2,'135698');
INSERT INTO `registro_usuario` VALUES (356,'1123304431','EYSON',' ANTUNES APARICIO','3128628634','masenjog@gmail.com','baseball',2,1,2,'151421');
INSERT INTO `registro_usuario` VALUES (357,'1123313891','JOSE','CALISTO CALISTRO','570129','jmartinezcossio@gmail.com','1234',2,1,2,'152612');
INSERT INTO `registro_usuario` VALUES (358,'1123331527','JOSELINO','MORALES','3123838323','icalderon@tecval.cl','master',2,1,2,'1543201');
INSERT INTO `registro_usuario` VALUES (359,'1124861270','JOSE DERIS ','LAME','3123883839','isabel.goldsack@sekmail.com','1234567890',2,1,2,'154321');
INSERT INTO `registro_usuario` VALUES (360,'1124865843','JOSE CRISTOBAL','MOSQUERA','3151348737','ejimenez@med.uchile.cl','baseball',2,1,2,'160315');
INSERT INTO `registro_usuario` VALUES (361,'1124866229','PAOLA','HERRERA ','3014344323','isabel.goldsack@sekmail.com','princess',2,1,2,'1654032');
INSERT INTO `registro_usuario` VALUES (362,'1127075658','JOSE',' CAMA CAMACHO','570138','lml@vtr.net','abc123',2,1,2,'165432');
INSERT INTO `registro_usuario` VALUES (363,'1143857917','LAURA','RODRIGUEZ','570205','mgoldsackz@gmail.com','football',2,1,2,'1760543');
INSERT INTO `registro_usuario` VALUES (364,'1143870333','CESAR ARNULFO ','CERON','3123934739','flobato.c@gmail.com','qwerty',2,1,2,'176543');
INSERT INTO `registro_usuario` VALUES (365,'1144031906','MAGDALENA',' GALARZA GALAS','569911','javier_celedon@hotmail.com','12345',2,1,2,'180009');
INSERT INTO `registro_usuario` VALUES (366,'1144083017','OMAIRA',' BUSTAMANTE BUSTOS','569980','glazo@mbienes.cl','111111',2,1,2,'1870654');
INSERT INTO `registro_usuario` VALUES (367,'1144096063','HILARIA','URIBE MAMIAN ','570189','hugocastanedav@hotmail.com','abc123',2,1,2,'187322');
INSERT INTO `registro_usuario` VALUES (368,'1144099005','NANCY YAQUELINE','JUACHE JUAN','570231','jaime.carmona@gendarmeria.cl ','master',2,1,2,'187654');
INSERT INTO `registro_usuario` VALUES (369,'1144102747','MARIO','SANCHEZ','3227714630','lml@vtr.net','qwerty',2,1,2,'192655');
INSERT INTO `registro_usuario` VALUES (370,'1144180723','FRANCY NEYI','CRIOLLO','3214944444','d.mena@live.cl','12345678',2,1,2,'1980765');
INSERT INTO `registro_usuario` VALUES (371,'1192746159','CRICELIA','MELO ','3213938338','x.josegonzalez@gmail.com','login',2,1,2,'198765');
INSERT INTO `registro_usuario` VALUES (372,'1192774677','JOSE','ESCOBAR ','570173','jaimecasajuana@gmail.com','baseball',2,1,2,'200506');
INSERT INTO `registro_usuario` VALUES (373,'1192779342','CARLOS','MONTENEGRO','3204939653','pablodubof@gmail.com','welcome',2,1,2,'206495');
INSERT INTO `registro_usuario` VALUES (374,'1192891881','ANDRES','IPIA','3139348838','faraya1910@hotmail.com','12345678',2,1,2,'210987');
INSERT INTO `registro_usuario` VALUES (375,'1193103806','MARIO','MORENO ','3167383833','jfreitte@vtr.net','qwertyuiop',2,1,2,'216371');
INSERT INTO `registro_usuario` VALUES (376,'1193148731','MARIA ROSALBINA','MOSQUERA','3093434344','c_arnes@hotmail.com','welcome',2,1,2,'2213245');
INSERT INTO `registro_usuario` VALUES (377,'1193149477','JOSE RAIMUNDO ','VALLEJO MELENDEZ','569996','angelicabergez@gmail.com','1234567',2,1,2,'222016');
INSERT INTO `registro_usuario` VALUES (378,'1193476323','ANA MILEMA','CAPOTE','3219387494','oscar.brito@gmail.com','123456789',2,1,2,'222432');
INSERT INTO `registro_usuario` VALUES (379,'12173527','MARCOS','FERRER','570102','anibalito___@hotmail.com','dragon',2,1,2,'222670');
INSERT INTO `registro_usuario` VALUES (380,'1234193610','SIXTO',' CAGUIHUI CAHUA','570092','juanmaceratta@hotmail.com','12345678',2,1,2,'223154');
INSERT INTO `registro_usuario` VALUES (381,'32910','DAMAR','LAME','3128923238','anamariadelacarrera@gmail.com','login',2,1,2,'224898');
INSERT INTO `registro_usuario` VALUES (382,'383947','JOSE OTONIEL','HUISACHE HUISAR','3225577449','jbarrera05@hotmail.com','dragon',2,1,2,'2263542');
INSERT INTO `registro_usuario` VALUES (383,'92082557271','JORGE ALBRTO ','CALDERA CALDERON','570107','cmartina@uai.cl','football',2,1,2,'232344');
INSERT INTO `registro_usuario` VALUES (384,'98043051857','MONICA','ACOSTA ','3129948383','pedroloiselle@hotmail.com','1qaz2wsx',2,1,2,'234555');
INSERT INTO `registro_usuario` VALUES (385,'98062772549','MARIA OTILIA',' CAMAYO MUÑOZ ','569974','diazma@tiscali.it','login',2,1,2,'234567');
INSERT INTO `registro_usuario` VALUES (386,'98062966327','BEIBA JOVITA',' PEREZ ','3188844699','angelicabergez@gmail.com','letmein',2,1,2,'235678');
INSERT INTO `registro_usuario` VALUES (387,'98070266318','LUZ','MOSQUERA','3101425498','michael.keller@udp.cl','passw0rd',2,1,2,'273648');
INSERT INTO `registro_usuario` VALUES (388,'98092068137','JOSE REINEL',' GADILLO GADO','569902','tango_negro@hotmail.com','12345678',2,1,2,'280495');
INSERT INTO `registro_usuario` VALUES (389,'98092918297','OVIDIO ORLANDO','HUMADA HURTADO','570177','anibalito___@hotmail.com','123456',2,1,2,'294529');
INSERT INTO `registro_usuario` VALUES (390,'98100557118','NOHEMY','MORALES','3219383838','nina_cabbada@hotmail.com','welcome',2,1,2,'298500');
INSERT INTO `registro_usuario` VALUES (391,'98100560887','ANA JULIA ','GALLEGO ','3123884660','mareneegaete@hotmail.com','12345678',2,1,2,'300120');
INSERT INTO `registro_usuario` VALUES (392,'98100960222','JOSE  YOBANY','HORTEGA HORTIS','3128689506','mfbanto@gmail.com','111111',2,1,2,'309876');
INSERT INTO `registro_usuario` VALUES (393,'98102816595','CECILIA',' CABRERA CABRIALES','569995','kresimirljubetic@vtr.net','princess',2,1,2,'310535');
INSERT INTO `registro_usuario` VALUES (394,'98102818016','ANYI CAROLINA','JALPA JAMAICA','570216','ruliandro@hotmail.com','baseball',2,1,2,'310987');
INSERT INTO `registro_usuario` VALUES (395,'98103156920','VIVIAN ENID','ZUÑIGA','3214848443','pepacordero@gmail.com','abc123',2,1,2,'311329');
INSERT INTO `registro_usuario` VALUES (396,'98110613148','CRISANTO','RODRIGUEZ','3044095443','xicagogo@yahoo.es','passw0rd',2,1,2,'312829');
INSERT INTO `registro_usuario` VALUES (397,'98110623968','JOSE','MOSQUERA','3132089382','dgomezl@bancochile.cl','starwars',2,1,2,'313562');
INSERT INTO `registro_usuario` VALUES (398,'98111272271','LEYDI MARCELA ','CAMAYO ','3214848442','dddura69@gmail.com','12345678',2,1,2,'314304');
INSERT INTO `registro_usuario` VALUES (399,'98111469520','JAIVER','NOGUERA ','3214141010','francis_nexos@hotmail.com','letmein',2,1,2,'314869');
INSERT INTO `registro_usuario` VALUES (400,'98112514325','JOSEFINA','MOSQUERA','569988','khiton_@hotmail.com','solo',2,1,2,'316718');
INSERT INTO `registro_usuario` VALUES (401,'98120312332','FIDEL','ANGULO','3219399383','jhaschke@cintazul.cl','1234567',2,1,2,'316719');
INSERT INTO `registro_usuario` VALUES (402,'98120518178','OMAIRA','AGREDO ','570151','campos.onfray@gmail.com','qwerty',2,1,2,'321098');
INSERT INTO `registro_usuario` VALUES (403,'98121300966','JOSE ROMULO ',' CANO CANOA','570188','vizkala@hotmail.com','starwars',2,1,2,'321351');
INSERT INTO `registro_usuario` VALUES (404,'98121917181','ROGELIO','RODRIGUEZ','3182388382','cggreve@gmail.com','princess',2,1,2,'322556');
INSERT INTO `registro_usuario` VALUES (405,'98122508668','JOSE','CERVANTES CAPOTE','570223','andrea.geoplanet@gmail.com','welcome',2,1,2,'330987');
INSERT INTO `registro_usuario` VALUES (406,'98122809811','MANUEL ANTONIO','CAMPO','3131828329','tallerlaquilla@gmail.com','letmein',2,1,2,'3312343');
INSERT INTO `registro_usuario` VALUES (407,'98380919','ADOLFO','REYES ','569963','bantomaui@gmail.com','12345678',2,1,2,'3323264');
INSERT INTO `registro_usuario` VALUES (408,'99010504909','EIDER',' CANSINO CANTERO','570191','alexus3@hotmail.com','123456',2,1,2,'333456');
INSERT INTO `registro_usuario` VALUES (409,'99010916123','ANDREA','RUANO ','570154','jorge.campos@impromac.cl','12345',2,1,2,'3351424');
INSERT INTO `registro_usuario` VALUES (410,'99011007623','MARIA ISABEL ','CAMAYO','569979','pablodubof@gmail.com','princess',2,1,2,'337650');
INSERT INTO `registro_usuario` VALUES (411,'99011013267','JOSE MARIA','CAMPO','3223373822','monica@arrigoni.cl','123456',2,1,2,'345109');
INSERT INTO `registro_usuario` VALUES (412,'99011512549','LUZ ADRIANA','PIANDA','3182338443','levaa.g@hotmail.com','qwertyuiop',2,1,2,'345678');
INSERT INTO `registro_usuario` VALUES (413,'99011611903','MARIA EULALIA','MOSQUERA','3166776989','jabravot@yahoo.es','solo',2,1,2,'355464');
INSERT INTO `registro_usuario` VALUES (414,'99011908035','MARIA OTILIA','GALABIS GALAN','569904','pato_one@hotmail.com','qwerty',2,1,2,'370206');
INSERT INTO `registro_usuario` VALUES (415,'99012003702','MARIA VIANEY','VILLEGAS ','3212383737','campos.onfray@gmail.com','login',2,1,2,'388681');
INSERT INTO `registro_usuario` VALUES (416,'99013012004','ANA MILE','MORALES','570117','natygris@hotmail.com','1234',2,1,2,'400567');
INSERT INTO `registro_usuario` VALUES (417,'99020214380','MARIA DEMETRIA ',' GARZA GARZIA','569922','hectorm_jc@hotmail.com','123456',2,1,2,'422880');
INSERT INTO `registro_usuario` VALUES (418,'99021507098','GLADIS AMPARO ','HERNANDEZ','3192394944','claudiocastanonmigeot@gmail.com','1234',2,1,2,'431260');
INSERT INTO `registro_usuario` VALUES (419,'99021509295','ANTONIO','RODRIGUEZ','3138444594','marcelafigueroazamora@hotmail.com','welcome',2,1,2,'4354256');
INSERT INTO `registro_usuario` VALUES (420,'99021515864','WILIAM','MOSQUERA','3100434844','masenjog@gmail.com','dragon',2,1,2,'440908');
INSERT INTO `registro_usuario` VALUES (421,'99022017582','MARIA IRMA ','VIDAL','570210','xicagogo@yahoo.es','1234567',2,1,2,'444543');
INSERT INTO `registro_usuario` VALUES (422,'99022803090','YAMID','CAMPO','570114','marissaleone@hotmail.com','football',2,1,2,'444567');
INSERT INTO `registro_usuario` VALUES (423,'99030205231','SANDRA MILENA','ALBARAN','3192832322','hectorm_jc@hotmail.com','1234',2,1,2,'4453021');
INSERT INTO `registro_usuario` VALUES (424,'99030512886','ASCENSION','MORALES','3006715400','eduardo.arancibia@grange.cl','starwars',2,1,2,'445321');
INSERT INTO `registro_usuario` VALUES (425,'99030807665','YILMER HERMES ','QUIGUANAZ','3183374849','hfreitte2618@gmail.com','princess',2,1,2,'4456543');
INSERT INTO `registro_usuario` VALUES (426,'99030815781','LIBIA','IPIA','3182394292','cggreve@gmail.com','12345',2,1,2,'453215');
INSERT INTO `registro_usuario` VALUES (427,'99031004817','ANGELMIRO','SILVA ','3112293456','anto_demarchi@hotmail.com','football',2,1,2,'454643');
INSERT INTO `registro_usuario` VALUES (428,'99031012488','JOSE EDGAR',' BUEN BUENABIDES','3129388288','osabarca@hotmail.com','12345678',2,1,2,'456789');
INSERT INTO `registro_usuario` VALUES (429,'99031211774','INES',' CARAPIA CARASCO','570211','eduardo.arancibia@grange.cl','1234567',2,1,2,'494024');
INSERT INTO `registro_usuario` VALUES (430,'99031406710','KATERINE','FERNANDEZ','3123484828','filipofox@hotmail.com','123456789',2,1,2,'495558');
INSERT INTO `registro_usuario` VALUES (431,'99031506189','PAOLA ANDREA',' FLORES FLOREZ','3120303994','vizkala@hotmail.com','baseball',2,1,2,'554536');
INSERT INTO `registro_usuario` VALUES (432,'99032208084','ROSA','ULCHUR','3165834720','almendrita203@hotmail.com','12345',2,1,2,'554653');
INSERT INTO `registro_usuario` VALUES (433,'99032305829','YOILBER','ITER','570246','levaa.g@hotmail.com','dragon',2,1,2,'555678');
INSERT INTO `registro_usuario` VALUES (434,'99032509688','EDYAR','MOSQUERA','3104039939','emarfil@bancochile.cl','qwertyuiop',2,1,2,'556710');
INSERT INTO `registro_usuario` VALUES (435,'99032915295','ANA','ALEGRIA ','8347092','tallerlaquilla@gmail.com','12345678',2,1,2,'564643');
INSERT INTO `registro_usuario` VALUES (436,'99033106625','GLADIS','MORALES','3134455454','susana0413@hotmail.com','1234567890',2,1,2,'564746');
INSERT INTO `registro_usuario` VALUES (437,'99040103461','FRANCY','GAVIRIA ','570178','javi_javis_3@hotmail.com','welcome',2,1,2,'567890');
INSERT INTO `registro_usuario` VALUES (438,'99040103941','RICARDO','MOSQUERA','3120883838','leonor.araya@gmail.com','12345',2,1,2,'573206');
INSERT INTO `registro_usuario` VALUES (439,'99040405948','JOSE ANASTACIO','VIAFARA','3129183832','yaz_antu@yahoo.com','1234567890',2,1,2,'634621');
INSERT INTO `registro_usuario` VALUES (440,'99040803404','JESUS HELADIO ','CAPOTE','570245','cggreve@gmail.com','1qaz2wsx',2,1,2,'643829');
INSERT INTO `registro_usuario` VALUES (441,'99040816808','NURI YULIED',' GABINO GABRIEL','570264','claudiocastanonmigeot@gmail.com','password',2,1,2,'656458');
INSERT INTO `registro_usuario` VALUES (442,'99041304410','ANA ROSA ',' GARIBAY GAVIRIA','569909','arturojabalquinto@hotmail.com','starwars',2,1,2,'663574');
INSERT INTO `registro_usuario` VALUES (443,'99041602232','GUILLERMO','VALENCIA','3202324344','mareneegaete@hotmail.com','1234567890',2,1,2,'664583');
INSERT INTO `registro_usuario` VALUES (444,'99041816844','GRATINIANO','ANGULO ANRRIQUEZ','3015973181','joy_pao_@hotmail.com','football',2,1,2,'6654564');
INSERT INTO `registro_usuario` VALUES (445,'99041913904','BELLA NELLY','VALENCIA','3179238282','bad.girl.-@hotmail.es','football',2,1,2,'6655740');
INSERT INTO `registro_usuario` VALUES (446,'99041919007','JESUS ADELMO','CAPOTE','570248','sebastian.hannig.g@gmail.com','master',2,1,2,'666757');
INSERT INTO `registro_usuario` VALUES (447,'99042002573','LUIS EDUARDO','VALENCIA','3148283608','jabravot@yahoo.es','qwerty',2,1,2,'666789');
INSERT INTO `registro_usuario` VALUES (448,'99042203587','MARLENY','SANTANA','3034333222','cfalvear@hotmail.com','solo',2,1,2,'667567');
INSERT INTO `registro_usuario` VALUES (449,'99042913169','RICAURTE','OINO ','570214','tango_negro@hotmail.com','monkey',2,1,2,'6675849');
INSERT INTO `registro_usuario` VALUES (450,'99050318954','JAMES ARBEY','LIZCANO ','3214348484','xfreitte@gmail.com','letmein',2,1,2,'6687432');
INSERT INTO `registro_usuario` VALUES (451,'99050410184','ARLEY','SANTA ','570139','fernandofreitte.xia@gmail.com','111111',2,1,2,'678901');
INSERT INTO `registro_usuario` VALUES (452,'99050809664','ANA ROS ','GARDEA GARDUNO','569903','iibarra@bancoestado.cl','qwertyuiop',2,1,2,'701931');
INSERT INTO `registro_usuario` VALUES (453,'99050810689','MARIA ANUNCIACION',' GARIBAI GARIBALDO','569907','siturri17@hotmail.com','passw0rd',2,1,2,'702460');
INSERT INTO `registro_usuario` VALUES (454,'99051412520','NORBEY','GUASCA ','570073','cibravohuerta@yahoo.com','welcome',2,1,2,'713631');
INSERT INTO `registro_usuario` VALUES (455,'99051504328','RUFINA','LAME','3013343332','ggomara@bancoestado.cl','solo',2,1,2,'722123');
INSERT INTO `registro_usuario` VALUES (456,'99051905829','ANA','ORTERO ','3162815006','p.martinez.lillo@gmail.com','starwars',2,1,2,'722142');
INSERT INTO `registro_usuario` VALUES (457,'99052710428','YUMARI','JAUREGUI JAURI','570226','campos.onfray@gmail.com','111111',2,1,2,'723105');
INSERT INTO `registro_usuario` VALUES (458,'99060109601','UBER','ARIAS ','3213456788','vivianagarridon@hotmail.com','master',2,1,2,'723106');
INSERT INTO `registro_usuario` VALUES (459,'99060412967','JOSE ENNIO',' HIBARRA HIERRO','3234820792','bad.girl.-@hotmail.es','123456',2,1,2,'7354019');
INSERT INTO `registro_usuario` VALUES (460,'99060502435','PEDRO','CAPITAN CAQUIHUI','570200','luuuuuuci@hotmail.com','12345',2,1,2,'761103');
INSERT INTO `registro_usuario` VALUES (461,'99060602901','LAURENTINO','RODRIGUEZ','3123929393','javi_javis_3@hotmail.com','password',2,1,2,'765571');
INSERT INTO `registro_usuario` VALUES (462,'99060902956','VICTOR',' BUITRON BURCIAGA','569971','constructor77@gmail.com','1234567890',2,1,2,'7656453');
INSERT INTO `registro_usuario` VALUES (463,'99061110999','LAIMIR','MORALES','3183434393','arturojabalquinto@hotmail.com','1qaz2wsx',2,1,2,'768543');
INSERT INTO `registro_usuario` VALUES (464,'99062010289','OSORIO','MUNEVAR AVEDAÑO','569938','masenjog@gmail.com','starwars',2,1,2,'777890');
INSERT INTO `registro_usuario` VALUES (465,'99062103627','EDUARDO','HAUMADA HELGUERA','3235960716','martacam2002@yahoo.com','login',2,1,2,'789012');
INSERT INTO `registro_usuario` VALUES (466,'99062114998','CARLOS FERNANDO ','GAVIRIA BURBANO ','3113838387','consuelo.fornes@gmail.com','1qaz2wsx',2,1,2,'819283');
INSERT INTO `registro_usuario` VALUES (467,'99062910751','JAVIER','CANZECO CAPASETE','570196','apalamosg@hotmail.com','12345678',2,1,2,'827364');
INSERT INTO `registro_usuario` VALUES (468,'99063009241','JOSE  DARIO','MORALES SERNA ','3131374848','francis_nexos@hotmail.com','baseball',2,1,2,'8767878');
INSERT INTO `registro_usuario` VALUES (469,'99070302140','CARLOS','ORTIZ','3133848333','kristian_siempre_azul@hotmail.com','qwertyuiop',2,1,2,'8865890');
INSERT INTO `registro_usuario` VALUES (470,'99070506129','MANUEL ALBEYRO','HIJAR HILARIO','3137242310','aargomedo@hecsa.cl','12345678',2,1,2,'887864');
INSERT INTO `registro_usuario` VALUES (471,'99070614002','DOMINGA','ALEGRIA LOPEZ ','3232039398','iibarra@bancoestado.cl','1234567890',2,1,2,'887893');
INSERT INTO `registro_usuario` VALUES (472,'99070904647','ANA JULIA ','AACUSI CAAGHU','569986','rlillo_2000@hotmail.com','master',2,1,2,'888901');
INSERT INTO `registro_usuario` VALUES (473,'99070910400','JOSE ANIBAL','ROSERO ','3218373938','allicamposv@hotmail.com','letmein',2,1,2,'890123');
INSERT INTO `registro_usuario` VALUES (474,'99071111411','ELVIO MARINO ','CAMPOS CANCECO','570163','Sb.nashxo.sk8@hotmail.com','login',2,1,2,'896714');
INSERT INTO `registro_usuario` VALUES (475,'99071210142','WILMER','BUESAQUILLO','570116','consuelo_caceres@hotmail.com','qwertyuiop',2,1,2,'900212');
INSERT INTO `registro_usuario` VALUES (476,'99071402840','BRAYAN YESID','MOSQUERA','3129343423','cfernandez@isa.cl','1234567',2,1,2,'901234');
INSERT INTO `registro_usuario` VALUES (477,'99071509121','CRISTINA ',' GASCA GASCON','569923','cjimenez1000@yahoo.es','password',2,1,2,'9089786');
INSERT INTO `registro_usuario` VALUES (478,'99071509920','DIOMELINA',' CUSIHUIYO CUSIMAHU','3116116464','arahuetes@manquehue.net','monkey',2,1,2,'9187635');
INSERT INTO `registro_usuario` VALUES (479,'99071707144','YOVAN','MONTENEGRO ','3193434307','iabarcae@yahoo.es','football',2,1,2,'982737');
INSERT INTO `registro_usuario` VALUES (480,'99071713322','JOSE GERMAN','MOSQUERA','569953','anto_demarchi@hotmail.com','master',2,1,2,'987986');
INSERT INTO `registro_usuario` VALUES (481,'99072111024','MARIELA','CARABAXAL CARANDIA','570208','arahuetes@manquehue.net','1234',2,1,2,'989786');
INSERT INTO `registro_usuario` VALUES (482,'99072407977','SALVADOR','MOSQUERA','3128383822','marissaleone@hotmail.com','abc123',2,1,2,'997978');
INSERT INTO `registro_usuario` VALUES (483,'99072614247','ABELARDO',' VALLEJO VALLEJO ','569957','Karito_1404@hotmail.com','monkey',2,1,2,'998979');
INSERT INTO `registro_usuario` VALUES (484,'99080109365','MARIA AMPARO','DURAN','3213248938','mfbanto@gmail.com','princess',2,1,2,'999012');
INSERT INTO `registro_usuario` VALUES (485,'99080409920','JAVIER','BETANCOURT','570207','ggomara@bancoestado.cl','1234',2,1,2,'999022');
INSERT INTO `registro_usuario` VALUES (486,'99080610218','MIGUEL ANGEL ',' GARFIAS GARIA','569905','director@buinzoo.cl','solo',2,1,2,'999091');
INSERT INTO `registro_usuario` VALUES (487,'99080612873','EDINSON',' CANTU CANUU','570192','capitanaguilera@hotmail.com','password',2,1,2,'100100');
INSERT INTO `registro_usuario` VALUES (488,'99080712142','MARIA','IPIA','6746482','jlescote@gasco.cl','1qaz2wsx',2,1,2,'100797');
INSERT INTO `registro_usuario` VALUES (489,'99080712908','MARIA ESTEFANIA ','MOSQUERA','3188484844','laah.valehh@hotmail.com','111111',2,1,2,'106179');
INSERT INTO `registro_usuario` VALUES (490,'99081206038','BLANCA NELLY','DURAN','3221312222','siturri17@hotmail.com','12345',2,1,2,'1092033');
INSERT INTO `registro_usuario` VALUES (491,'99081208693','LEONILDA','IPIA','3136969749','michael.keller@udp.cl','1qaz2wsx',2,1,2,'109876');
INSERT INTO `registro_usuario` VALUES (492,'99081211481','ALEJANDRINA','NOGUERA ','3213549810','monica@arrigoni.cl','baseball',2,1,2,'1100987');
INSERT INTO `registro_usuario` VALUES (493,'99081307675','CLAUDIA YOVANA ','CAMAYO','3183939494','annabeck_@hotmail.com','1qaz2wsx',2,1,2,'110989');
INSERT INTO `registro_usuario` VALUES (494,'99081309457','DIEGO MARIA ','MOSQUERA','3168834285','solbk26@hotmail.com','123456',2,1,2,'111098');
INSERT INTO `registro_usuario` VALUES (495,'99081810300','DANNY','PITO ','3127171734','Sb.nashxo.sk8@hotmail.com','welcome',2,1,2,'111209');
INSERT INTO `registro_usuario` VALUES (496,'99082009481','MARIA CLARA',' ANGELES ANGIANO','3007283200','c_arnes@hotmail.com','12345',2,1,2,'111213');
INSERT INTO `registro_usuario` VALUES (497,'99082109982','MARIA','CUETIA ','3219394833','juanmaceratta@hotmail.com','letmein',2,1,2,'111232');
INSERT INTO `registro_usuario` VALUES (498,'99082409927','LUCY ESPERAZA ','VALENCIA','570143','cfalvear@hotmail.com','master',2,1,2,'111987');
INSERT INTO `registro_usuario` VALUES (499,'99082712069','IRENE','CACUSI CAGHI','570085','lexischile@gmail.com','123456',2,1,2,'112134');
INSERT INTO `registro_usuario` VALUES (500,'99083010777','JOSE BERNARDO ','RODRIGUEZ','3133338433','jlance60@bancoestado.cl','login',2,1,2,'1135869');
INSERT INTO `registro_usuario` VALUES (501,'99083111484','DIANA MILENA ','VALENCIA','3163433283','michelebk@hotmail.com','passw0rd',2,1,2,'1142351');
INSERT INTO `registro_usuario` VALUES (502,'99090108383','ROSA','TUNUBALA ','3103341516','hfreitte2618@gmail.com','12345',2,1,2,'1145832');
INSERT INTO `registro_usuario` VALUES (503,'99090210595','FLOR','AREVALO ','570244','laah.valehh@hotmail.com','solo',2,1,2,'120212');
INSERT INTO `registro_usuario` VALUES (504,'99090315591','ABEL','LAME','3188483838','joacocordero@gmail.com','1234567890',2,1,2,'120217');
INSERT INTO `registro_usuario` VALUES (505,'99090506460','GLADYS MARLENY','CAPOTE','3183848449','mafigza@gmail.com','1234567890',2,1,2,'120605');
INSERT INTO `registro_usuario` VALUES (506,'99090605433','TALIA','HOYOS ','3211943944','cmartina@uai.cl','solo',2,1,2,'121303');
INSERT INTO `registro_usuario` VALUES (507,'99091106678','LUIS','TOMBE ','8380287','pili_diami_angol@hotmail.com','password',2,1,2,'121626');
INSERT INTO `registro_usuario` VALUES (508,'99091811100','ROSA CRUZ','HURVINA HYDALGO','570182','rcabbada@vtr.net','password',2,1,2,'122120');
INSERT INTO `registro_usuario` VALUES (509,'99091811711','KAREN YAZMIN',' JAZO JIMENES','570227','jorge.campos@impromac.cl','1qaz2wsx',2,1,2,'1223345');
INSERT INTO `registro_usuario` VALUES (510,'99092012090','JOSE','MOSQUERA','3113493847','andrea.geoplanet@gmail.com','password',2,1,2,'1234165');
INSERT INTO `registro_usuario` VALUES (511,'99092114399','MARIA','BRUM','3192834883','lorerlv@hotmail.com','monkey',2,1,2,'123444');
INSERT INTO `registro_usuario` VALUES (512,'99092117720','JESUS  MARIA ',' IPIA GUZMAN','3216178940','sebastianatila@hotmail.com','qwertyuiop',2,1,2,'123456');
INSERT INTO `registro_usuario` VALUES (513,'99092217147','MARIA','SULES ','3239495953','lexischile@gmail.com','master',2,1,2,'123521');
INSERT INTO `registro_usuario` VALUES (514,'99092502453','ALDEMAR',' FRANCISCO FRANCO','570247','javi_javis_3@hotmail.com','princess',2,1,2,'1263573');
INSERT INTO `registro_usuario` VALUES (515,'99092911876','FREIMER DANIBE','IPIA','3114274839','claudiabergez@gmail.com','solo',2,1,2,'129384');
INSERT INTO `registro_usuario` VALUES (516,'99100415140','MARIA','JARAMILLO CAPOTE ','570236','joacocordero@gmail.com','princess',2,1,2,'131095');
INSERT INTO `registro_usuario` VALUES (517,'99100513168','MARIA','MOSQUERA','3115678943','fgaete@colegioaltamira.cl','baseball',2,1,2,'135698');
INSERT INTO `registro_usuario` VALUES (518,'99100716425','ARNELIO','MORALES','569987','dddura69@gmail.com','qwertyuiop',2,1,2,'151421');
INSERT INTO `registro_usuario` VALUES (519,'99100802496','FRANCISCO','CALLEJAS CALLEROS','570130','p.martinez.lillo@gmail.com','1234567',2,1,2,'152612');
INSERT INTO `registro_usuario` VALUES (520,'99101001977','MARIA ELSY ','MELENDEZ','569984','mfbanto@gmail.com','12345',2,1,2,'1543201');
INSERT INTO `registro_usuario` VALUES (521,'99101009005','MARIA OTILIA ','VIAFARA','3213389483','paulinadelacarrera@gmail.com','princess',2,1,2,'154321');
INSERT INTO `registro_usuario` VALUES (522,'99101012448','JOVANY','VELASCO','3231222322','galo.jara@gmail.com','football',2,1,2,'160315');
/*!40000 ALTER TABLE `registro_usuario` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table rol
#

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL auto_increment,
  `nombre_rol` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Dumping data for table rol
#
LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;

INSERT INTO `rol` VALUES (1,'usuario');
INSERT INTO `rol` VALUES (2,'administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_documento
#

CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL auto_increment,
  `nombre_tipo_documento` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_documento
#
LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;

INSERT INTO `tipo_documento` VALUES (1,'Cedula de Ciudadania');
INSERT INTO `tipo_documento` VALUES (2,'Cedula de Extranjeria');
INSERT INTO `tipo_documento` VALUES (3,'Libreta Militar');
INSERT INTO `tipo_documento` VALUES (4,'Pasaporte');
INSERT INTO `tipo_documento` VALUES (5,'Tarjeta de Identidad');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_ingreso
#

CREATE TABLE `tipo_ingreso` (
  `id_tipo_ingreso` int(11) NOT NULL auto_increment,
  `tipo_ingreso` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_tipo_ingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_ingreso
#
LOCK TABLES `tipo_ingreso` WRITE;
/*!40000 ALTER TABLE `tipo_ingreso` DISABLE KEYS */;

INSERT INTO `tipo_ingreso` VALUES (1,'insumos');
INSERT INTO `tipo_ingreso` VALUES (2,'otros');
INSERT INTO `tipo_ingreso` VALUES (3,'materia prima');
INSERT INTO `tipo_ingreso` VALUES (4,'material vegetal');
/*!40000 ALTER TABLE `tipo_ingreso` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_materia_prima_e_insumos
#

CREATE TABLE `tipo_materia_prima_e_insumos` (
  `id_azas_ins` int(11) NOT NULL auto_increment,
  `azas_ins` varchar(100) NOT NULL,
  `id_tipo_ingreso` int(11) NOT NULL,
  `id_unidad` int(11) default NULL,
  PRIMARY KEY  (`id_azas_ins`),
  KEY `id_unidad` (`id_unidad`),
  KEY `id_tipo_ingreso` (`id_tipo_ingreso`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_materia_prima_e_insumos
#
LOCK TABLES `tipo_materia_prima_e_insumos` WRITE;
/*!40000 ALTER TABLE `tipo_materia_prima_e_insumos` DISABLE KEYS */;

INSERT INTO `tipo_materia_prima_e_insumos` VALUES (1,'Alcohol',1,1);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (2,'Boton de oro',3,2);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (3,'Bovinaza',2,3);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (4,'Cal',1,4);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (5,'Calendula',3,5);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (6,'Caprinaza',2,6);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (7,'Conejaza',2,7);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (8,'Cuyinaza',2,8);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (9,'Descarte Medios',4,9);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (10,'Gallinaza',2,10);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (11,'Hojarasca',3,11);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (12,'Leche',4,12);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (13,'Leche Tratamiento',4,13);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (14,'Leche-yogourth',4,14);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (15,'Mantequilla margarina',4,15);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (16,'Medios de cultivos (M)',4,1);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (17,'Ovinaza',2,2);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (18,'Pasto',3,3);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (19,'Pasto Verde',3,4);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (20,'Poscosecha',3,5);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (21,'Reciduos medios cultivos',4,6);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (22,'Sulfato de sodio',1,7);
INSERT INTO `tipo_materia_prima_e_insumos` VALUES (23,'Tomate',3,8);
/*!40000 ALTER TABLE `tipo_materia_prima_e_insumos` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_pila
#

CREATE TABLE `tipo_pila` (
  `id_tipo_pila` int(11) NOT NULL auto_increment,
  `nombre_tipo_pila` varchar(30) NOT NULL,
  PRIMARY KEY  (`id_tipo_pila`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_pila
#
LOCK TABLES `tipo_pila` WRITE;
/*!40000 ALTER TABLE `tipo_pila` DISABLE KEYS */;

INSERT INTO `tipo_pila` VALUES (1,'C.P.F');
INSERT INTO `tipo_pila` VALUES (2,'C.P.V');
/*!40000 ALTER TABLE `tipo_pila` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_proceso
#

CREATE TABLE `tipo_proceso` (
  `id_tipo_proceso` int(11) NOT NULL auto_increment,
  `id_unidad` int(11) NOT NULL,
  `nombre_proceso` varchar(60) NOT NULL,
  PRIMARY KEY  (`id_tipo_proceso`),
  KEY `id_unidad` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_proceso
#
LOCK TABLES `tipo_proceso` WRITE;
/*!40000 ALTER TABLE `tipo_proceso` DISABLE KEYS */;

INSERT INTO `tipo_proceso` VALUES (1,3,'Abonos Liqudos');
INSERT INTO `tipo_proceso` VALUES (2,3,'Bioliquidos');
INSERT INTO `tipo_proceso` VALUES (3,3,'Compostaje');
INSERT INTO `tipo_proceso` VALUES (4,3,'Lombricultura');
/*!40000 ALTER TABLE `tipo_proceso` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table tipo_producto
#

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL auto_increment,
  `tipo_producto` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_tipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Dumping data for table tipo_producto
#
LOCK TABLES `tipo_producto` WRITE;
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;

INSERT INTO `tipo_producto` VALUES (1,'liquido');
INSERT INTO `tipo_producto` VALUES (2,'solido');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table unidad
#

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL auto_increment,
  `nombre_unidad` varchar(50) NOT NULL,
  `id_area` int(11) NOT NULL,
  PRIMARY KEY  (`id_unidad`),
  KEY `id_area` (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

#
# Dumping data for table unidad
#
LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;

INSERT INTO `unidad` VALUES (1,'Avicola',9);
INSERT INTO `unidad` VALUES (2,'Biofabrica',1);
INSERT INTO `unidad` VALUES (3,'Caracol Cafeteria',9);
INSERT INTO `unidad` VALUES (4,'Caucanita',1);
INSERT INTO `unidad` VALUES (5,'Ciencias Basicas',9);
INSERT INTO `unidad` VALUES (6,'Especies Menores',1);
INSERT INTO `unidad` VALUES (7,'Especies Menores- Conejos',9);
INSERT INTO `unidad` VALUES (8,'Especies Menores-ovejos',1);
INSERT INTO `unidad` VALUES (9,'Establos',9);
INSERT INTO `unidad` VALUES (10,'Fruver',1);
INSERT INTO `unidad` VALUES (11,'Ganaderia',9);
INSERT INTO `unidad` VALUES (12,'Gea Agricola',1);
INSERT INTO `unidad` VALUES (13,'Hortalizas',9);
INSERT INTO `unidad` VALUES (14,'Invernadero',1);
INSERT INTO `unidad` VALUES (15,'Invernadero Biotecnologia',9);
INSERT INTO `unidad` VALUES (16,'Invernadero Tomate',1);
INSERT INTO `unidad` VALUES (17,'Jardines',9);
INSERT INTO `unidad` VALUES (18,'Labiratorio Agrobiotecnologia',1);
INSERT INTO `unidad` VALUES (19,'Lacteos',9);
INSERT INTO `unidad` VALUES (20,'Panificacion',1);
INSERT INTO `unidad` VALUES (21,'Planta de lacteos',9);
INSERT INTO `unidad` VALUES (22,'Vivero Agroforestal',1);
INSERT INTO `unidad` VALUES (23,'Vivero-invernadero',9);
INSERT INTO `unidad` VALUES (24,'Vivero-Jardines',1);
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table unidad_de_medida
#

CREATE TABLE `unidad_de_medida` (
  `id_unidad_medida` int(11) NOT NULL auto_increment,
  `unidad_medida` varchar(10) NOT NULL,
  PRIMARY KEY  (`id_unidad_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Dumping data for table unidad_de_medida
#
LOCK TABLES `unidad_de_medida` WRITE;
/*!40000 ALTER TABLE `unidad_de_medida` DISABLE KEYS */;

INSERT INTO `unidad_de_medida` VALUES (1,'Arroba');
INSERT INTO `unidad_de_medida` VALUES (2,'Botella');
INSERT INTO `unidad_de_medida` VALUES (3,'Galon');
INSERT INTO `unidad_de_medida` VALUES (4,'Gramos');
INSERT INTO `unidad_de_medida` VALUES (5,'Kilogramos');
INSERT INTO `unidad_de_medida` VALUES (6,'Libras');
INSERT INTO `unidad_de_medida` VALUES (7,'Litros');
INSERT INTO `unidad_de_medida` VALUES (8,'Poma');
INSERT INTO `unidad_de_medida` VALUES (9,'Tonelada');
/*!40000 ALTER TABLE `unidad_de_medida` ENABLE KEYS */;
UNLOCK TABLES;

#
# Source for table ventas
#

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL auto_increment,
  `fecha` date NOT NULL,
  `cantidad_ventas` varchar(250) NOT NULL,
  `total_apagar` int(11) NOT NULL,
  `recibe` varchar(200) NOT NULL,
  `id_cantidad_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_precio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_unidad_medida` int(11) NOT NULL,
  PRIMARY KEY  (`id_ventas`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_unidad_medida` (`id_unidad_medida`),
  KEY `id_precio` (`id_precio`),
  KEY `id_producto` (`id_producto`),
  KEY `id_cantidad_producto` (`id_cantidad_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

#
# Dumping data for table ventas
#
LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;

INSERT INTO `ventas` VALUES (1,'0000-00-00','1',15,'Juan Velasco',3,5,4,1,5);
INSERT INTO `ventas` VALUES (2,'0000-00-00','1',15,'Andres Sanchez',4,4,3,1,8);
INSERT INTO `ventas` VALUES (3,'0000-00-00','1',2,'Mario Narvaez',3,5,4,1,5);
INSERT INTO `ventas` VALUES (4,'0000-00-00','1',360,'Harold Toro',3,5,4,1,5);
INSERT INTO `ventas` VALUES (5,'0000-00-00','1',8,'David Acosta',5,6,5,1,5);
INSERT INTO `ventas` VALUES (6,'0000-00-00','1',8,'Hermes Gaviria',5,6,5,1,5);
INSERT INTO `ventas` VALUES (7,'0000-00-00','1',5,'Fernando Rangel',6,7,6,1,5);
INSERT INTO `ventas` VALUES (8,'0000-00-00','1',20,'Julian Leyton',6,7,6,1,5);
INSERT INTO `ventas` VALUES (9,'0000-00-00','1',2,'Daniel Castillo',7,9,8,1,5);
INSERT INTO `ventas` VALUES (10,'0000-00-00','1',4,'Javier Solis',8,9,7,1,5);
INSERT INTO `ventas` VALUES (11,'0000-00-00','20',30,'Hernando Portilla',9,10,9,1,5);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

#
#  Foreign keys for table areas
#

ALTER TABLE `areas`
ADD CONSTRAINT `areas_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id_centro`);

#
#  Foreign keys for table autoconsumo
#

ALTER TABLE `autoconsumo`
ADD CONSTRAINT `autoconsumo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `registro_usuario` (`id_usuario`),
ADD CONSTRAINT `autoconsumo_ibfk_2` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `autoconsumo_ibfk_3` FOREIGN KEY (`id_cantidad_producto`) REFERENCES `cantidad_productos` (`id_cantidad_producto`);

#
#  Foreign keys for table cantidad_productos
#

ALTER TABLE `cantidad_productos`
ADD CONSTRAINT `cantidad_productos_ibfk_1` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `cantidad_productos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
ADD CONSTRAINT `cantidad_productos_ibfk_3` FOREIGN KEY (`id_proceso_productivo`) REFERENCES `proceso_productivo` (`id_proceso_productivo`);

#
#  Foreign keys for table centro
#

ALTER TABLE `centro`
ADD CONSTRAINT `centro_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`);

#
#  Foreign keys for table ficha
#

ALTER TABLE `ficha`
ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`),
ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`id_programa`) REFERENCES `programa_formacion` (`id_programa`);

#
#  Foreign keys for table herramientas
#

ALTER TABLE `herramientas`
ADD CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`);

#
#  Foreign keys for table lista_precios
#

ALTER TABLE `lista_precios`
ADD CONSTRAINT `lista_precios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `registro_usuario` (`id_usuario`),
ADD CONSTRAINT `lista_precios_ibfk_2` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `lista_precios_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

#
#  Foreign keys for table materia_prima_e_insumos
#

ALTER TABLE `materia_prima_e_insumos`
ADD CONSTRAINT `materia_prima_e_insumos_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`),
ADD CONSTRAINT `materia_prima_e_insumos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro_usuario` (`id_usuario`),
ADD CONSTRAINT `materia_prima_e_insumos_ibfk_3` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `materia_prima_e_insumos_ibfk_4` FOREIGN KEY (`id_azas_ins`) REFERENCES `tipo_materia_prima_e_insumos` (`id_azas_ins`),
ADD CONSTRAINT `materia_prima_e_insumos_ibfk_5` FOREIGN KEY (`id_tipo_ingreso`) REFERENCES `tipo_ingreso` (`id_tipo_ingreso`);

#
#  Foreign keys for table municipio
#

ALTER TABLE `municipio`
ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`id_depto`) REFERENCES `departamento` (`id_depto`);

#
#  Foreign keys for table proceso_productivo
#

ALTER TABLE `proceso_productivo`
ADD CONSTRAINT `proceso_productivo_ibfk_1` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `proceso_productivo_ibfk_2` FOREIGN KEY (`id_tipo_proceso`) REFERENCES `tipo_proceso` (`id_tipo_proceso`),
ADD CONSTRAINT `proceso_productivo_ibfk_3` FOREIGN KEY (`id_tipo_pila`) REFERENCES `tipo_pila` (`id_tipo_pila`),
ADD CONSTRAINT `proceso_productivo_ibfk_4` FOREIGN KEY (`id_medida_termica`) REFERENCES `medida_termica` (`id_medida_termica`);

#
#  Foreign keys for table productos
#

ALTER TABLE `productos`
ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`),
ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

#
#  Foreign keys for table programa_formacion
#

ALTER TABLE `programa_formacion`
ADD CONSTRAINT `programa_formacion_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`);

#
#  Foreign keys for table regional
#

ALTER TABLE `regional`
ADD CONSTRAINT `regional_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id_municipio`);

#
#  Foreign keys for table registro_usuario
#

ALTER TABLE `registro_usuario`
ADD CONSTRAINT `registro_usuario_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
ADD CONSTRAINT `registro_usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
ADD CONSTRAINT `registro_usuario_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
ADD CONSTRAINT `registro_usuario_ibfk_4` FOREIGN KEY (`codigo_ficha`) REFERENCES `ficha` (`codigo_ficha`);

#
#  Foreign keys for table tipo_materia_prima_e_insumos
#

ALTER TABLE `tipo_materia_prima_e_insumos`
ADD CONSTRAINT `tipo_materia_prima_e_insumos_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`),
ADD CONSTRAINT `tipo_materia_prima_e_insumos_ibfk_2` FOREIGN KEY (`id_tipo_ingreso`) REFERENCES `tipo_ingreso` (`id_tipo_ingreso`);

#
#  Foreign keys for table tipo_proceso
#

ALTER TABLE `tipo_proceso`
ADD CONSTRAINT `tipo_proceso_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`);

#
#  Foreign keys for table unidad
#

ALTER TABLE `unidad`
ADD CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`);

#
#  Foreign keys for table ventas
#

ALTER TABLE `ventas`
ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `registro_usuario` (`id_usuario`),
ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_unidad_medida`) REFERENCES `unidad_de_medida` (`id_unidad_medida`),
ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_precio`) REFERENCES `lista_precios` (`id_precio`),
ADD CONSTRAINT `ventas_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
ADD CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`id_cantidad_producto`) REFERENCES `cantidad_productos` (`id_cantidad_producto`);


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
