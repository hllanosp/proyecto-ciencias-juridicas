-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ccjj
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `actividades`
--

LOCK TABLES `actividades` WRITE;
/*!40000 ALTER TABLE `actividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `actividades_terminadas`
--

LOCK TABLES `actividades_terminadas` WRITE;
/*!40000 ALTER TABLE `actividades_terminadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividades_terminadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `alerta`
--

LOCK TABLES `alerta` WRITE;
/*!40000 ALTER TABLE `alerta` DISABLE KEYS */;
/*!40000 ALTER TABLE `alerta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_acondicionamientos`
--

LOCK TABLES `ca_acondicionamientos` WRITE;
/*!40000 ALTER TABLE `ca_acondicionamientos` DISABLE KEYS */;
INSERT INTO `ca_acondicionamientos` VALUES (3,'Proyector ');
/*!40000 ALTER TABLE `ca_acondicionamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_areas`
--

LOCK TABLES `ca_areas` WRITE;
/*!40000 ALTER TABLE `ca_areas` DISABLE KEYS */;
INSERT INTO `ca_areas` VALUES (2,'Area 1');
/*!40000 ALTER TABLE `ca_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_aulas`
--

LOCK TABLES `ca_aulas` WRITE;
/*!40000 ALTER TABLE `ca_aulas` DISABLE KEYS */;
INSERT INTO `ca_aulas` VALUES (1,18,'209');
/*!40000 ALTER TABLE `ca_aulas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_aulas_instancias_acondicionamientos`
--

LOCK TABLES `ca_aulas_instancias_acondicionamientos` WRITE;
/*!40000 ALTER TABLE `ca_aulas_instancias_acondicionamientos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ca_aulas_instancias_acondicionamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_cargas_academicas`
--

LOCK TABLES `ca_cargas_academicas` WRITE;
/*!40000 ALTER TABLE `ca_cargas_academicas` DISABLE KEYS */;
INSERT INTO `ca_cargas_academicas` VALUES (2,1,'85863','0501-1994-05961',1,2015);
/*!40000 ALTER TABLE `ca_cargas_academicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_contratos`
--

LOCK TABLES `ca_contratos` WRITE;
/*!40000 ALTER TABLE `ca_contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ca_contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_cursos`
--

LOCK TABLES `ca_cursos` WRITE;
/*!40000 ALTER TABLE `ca_cursos` DISABLE KEYS */;
INSERT INTO `ca_cursos` VALUES (8,33,2,701,2,1,'11456464','0801-9123-12323');
/*!40000 ALTER TABLE `ca_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_cursos_dias`
--

LOCK TABLES `ca_cursos_dias` WRITE;
/*!40000 ALTER TABLE `ca_cursos_dias` DISABLE KEYS */;
INSERT INTO `ca_cursos_dias` VALUES (8,1),(8,2);
/*!40000 ALTER TABLE `ca_cursos_dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_dias`
--

LOCK TABLES `ca_dias` WRITE;
/*!40000 ALTER TABLE `ca_dias` DISABLE KEYS */;
INSERT INTO `ca_dias` VALUES (1,'Lunes'),(2,'Martes'),(3,'Miércoles'),(4,'Jueves'),(5,'Viernes'),(6,'Sábado'),(7,'Domingo');
/*!40000 ALTER TABLE `ca_dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_empleados_contratos`
--

LOCK TABLES `ca_empleados_contratos` WRITE;
/*!40000 ALTER TABLE `ca_empleados_contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ca_empleados_contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_empleados_proyectos`
--

LOCK TABLES `ca_empleados_proyectos` WRITE;
/*!40000 ALTER TABLE `ca_empleados_proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `ca_empleados_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_estados_carga`
--

LOCK TABLES `ca_estados_carga` WRITE;
/*!40000 ALTER TABLE `ca_estados_carga` DISABLE KEYS */;
INSERT INTO `ca_estados_carga` VALUES (1,'Aprobada'),(2,'Cancelada');
/*!40000 ALTER TABLE `ca_estados_carga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_facultades`
--

LOCK TABLES `ca_facultades` WRITE;
/*!40000 ALTER TABLE `ca_facultades` DISABLE KEYS */;
INSERT INTO `ca_facultades` VALUES (2,'Facultad 1');
/*!40000 ALTER TABLE `ca_facultades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_instancias_acondicionamientos`
--

LOCK TABLES `ca_instancias_acondicionamientos` WRITE;
/*!40000 ALTER TABLE `ca_instancias_acondicionamientos` DISABLE KEYS */;
INSERT INTO `ca_instancias_acondicionamientos` VALUES (3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3);
/*!40000 ALTER TABLE `ca_instancias_acondicionamientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_proyectos`
--

LOCK TABLES `ca_proyectos` WRITE;
/*!40000 ALTER TABLE `ca_proyectos` DISABLE KEYS */;
INSERT INTO `ca_proyectos` VALUES (2,'Proyecto nuevo',1,2);
/*!40000 ALTER TABLE `ca_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_roles_proyecto`
--

LOCK TABLES `ca_roles_proyecto` WRITE;
/*!40000 ALTER TABLE `ca_roles_proyecto` DISABLE KEYS */;
INSERT INTO `ca_roles_proyecto` VALUES (1,'Coordinador'),(2,'Participante');
/*!40000 ALTER TABLE `ca_roles_proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_secciones`
--

LOCK TABLES `ca_secciones` WRITE;
/*!40000 ALTER TABLE `ca_secciones` DISABLE KEYS */;
INSERT INTO `ca_secciones` VALUES (700,'07:00:00','08:00:00'),(701,'07:00:00','08:00:00'),(800,'08:00:00','09:00:00'),(1300,'13:00:00','17:00:00');
/*!40000 ALTER TABLE `ca_secciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ca_vinculaciones`
--

LOCK TABLES `ca_vinculaciones` WRITE;
/*!40000 ALTER TABLE `ca_vinculaciones` DISABLE KEYS */;
INSERT INTO `ca_vinculaciones` VALUES (1,'Area 1',2);
/*!40000 ALTER TABLE `ca_vinculaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (2,'Cargo 1'),(3,'Cargo prueba');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categorias_folios`
--

LOCK TABLES `categorias_folios` WRITE;
/*!40000 ALTER TABLE `categorias_folios` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias_folios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clases`
--

LOCK TABLES `clases` WRITE;
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` VALUES (2,'Derecho Romano'),(3,'Introduccion a la estadistica social');
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `clases_has_experiencia_academica`
--

LOCK TABLES `clases_has_experiencia_academica` WRITE;
/*!40000 ALTER TABLE `clases_has_experiencia_academica` DISABLE KEYS */;
INSERT INTO `clases_has_experiencia_academica` VALUES (3,1);
/*!40000 ALTER TABLE `clases_has_experiencia_academica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `costo_porcentaje_actividad_por_trimestre`
--

LOCK TABLES `costo_porcentaje_actividad_por_trimestre` WRITE;
/*!40000 ALTER TABLE `costo_porcentaje_actividad_por_trimestre` DISABLE KEYS */;
/*!40000 ALTER TABLE `costo_porcentaje_actividad_por_trimestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `departamento_laboral`
--

LOCK TABLES `departamento_laboral` WRITE;
/*!40000 ALTER TABLE `departamento_laboral` DISABLE KEYS */;
INSERT INTO `departamento_laboral` VALUES (1,'Departamento prueba'),(2,'Docencia');
/*!40000 ALTER TABLE `departamento_laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `edificios`
--

LOCK TABLES `edificios` WRITE;
/*!40000 ALTER TABLE `edificios` DISABLE KEYS */;
INSERT INTO `edificios` VALUES (18,'B3');
/*!40000 ALTER TABLE `edificios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES ('11456464','0801-9123-12323',2,'2015-06-06',NULL,'OBS',1),('1234','0501-1994-05967',2,'2015-07-09',NULL,'Observacion observacion',1),('12344','1234-0000-00000',2,'2015-07-09',NULL,'ninguna',1),('123444','0000-0000-00000',2,'2015-07-07',NULL,'',1),('85863','0501-1994-05961',1,'2015-07-18',NULL,'Esta es una observacion',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `empleado_has_cargo`
--

LOCK TABLES `empleado_has_cargo` WRITE;
/*!40000 ALTER TABLE `empleado_has_cargo` DISABLE KEYS */;
INSERT INTO `empleado_has_cargo` VALUES ('11456464',3,'2015-07-09',NULL),('85863',2,'2015-07-18',NULL);
/*!40000 ALTER TABLE `empleado_has_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estado_seguimiento`
--

LOCK TABLES `estado_seguimiento` WRITE;
/*!40000 ALTER TABLE `estado_seguimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estudios_academico`
--

LOCK TABLES `estudios_academico` WRITE;
/*!40000 ALTER TABLE `estudios_academico` DISABLE KEYS */;
INSERT INTO `estudios_academico` VALUES (6,'Licenciatura en Ingenieria en Sistemas',1,'0000-0000-00000',3),(7,'Maestria en Derecho Penal',2,'0801-9123-12323',3),(8,'Maestria en Derecho Penal',2,'0000-0000-00000',3);
/*!40000 ALTER TABLE `estudios_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `experiencia_academica`
--

LOCK TABLES `experiencia_academica` WRITE;
/*!40000 ALTER TABLE `experiencia_academica` DISABLE KEYS */;
INSERT INTO `experiencia_academica` VALUES (1,'UNAH',20,'0000-0000-00000');
/*!40000 ALTER TABLE `experiencia_academica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `experiencia_laboral`
--

LOCK TABLES `experiencia_laboral` WRITE;
/*!40000 ALTER TABLE `experiencia_laboral` DISABLE KEYS */;
INSERT INTO `experiencia_laboral` VALUES (1,'UNAH',23,'0000-0000-00000');
/*!40000 ALTER TABLE `experiencia_laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `experiencia_laboral_has_cargo`
--

LOCK TABLES `experiencia_laboral_has_cargo` WRITE;
/*!40000 ALTER TABLE `experiencia_laboral_has_cargo` DISABLE KEYS */;
INSERT INTO `experiencia_laboral_has_cargo` VALUES (1,3);
/*!40000 ALTER TABLE `experiencia_laboral_has_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `folios`
--

LOCK TABLES `folios` WRITE;
/*!40000 ALTER TABLE `folios` DISABLE KEYS */;
/*!40000 ALTER TABLE `folios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grupo_o_comite`
--

LOCK TABLES `grupo_o_comite` WRITE;
/*!40000 ALTER TABLE `grupo_o_comite` DISABLE KEYS */;
INSERT INTO `grupo_o_comite` VALUES (2,'Grupo prueba');
/*!40000 ALTER TABLE `grupo_o_comite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `grupo_o_comite_has_empleado`
--

LOCK TABLES `grupo_o_comite_has_empleado` WRITE;
/*!40000 ALTER TABLE `grupo_o_comite_has_empleado` DISABLE KEYS */;
INSERT INTO `grupo_o_comite_has_empleado` VALUES (2,'123444'),(2,'85863');
/*!40000 ALTER TABLE `grupo_o_comite_has_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `idioma_has_persona`
--

LOCK TABLES `idioma_has_persona` WRITE;
/*!40000 ALTER TABLE `idioma_has_persona` DISABLE KEYS */;
/*!40000 ALTER TABLE `idioma_has_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `indicadores`
--

LOCK TABLES `indicadores` WRITE;
/*!40000 ALTER TABLE `indicadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `motivos`
--

LOCK TABLES `motivos` WRITE;
/*!40000 ALTER TABLE `motivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `motivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notificaciones_folios`
--

LOCK TABLES `notificaciones_folios` WRITE;
/*!40000 ALTER TABLE `notificaciones_folios` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones_folios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `objetivos_institucionales`
--

LOCK TABLES `objetivos_institucionales` WRITE;
/*!40000 ALTER TABLE `objetivos_institucionales` DISABLE KEYS */;
/*!40000 ALTER TABLE `objetivos_institucionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `organizacion`
--

LOCK TABLES `organizacion` WRITE;
/*!40000 ALTER TABLE `organizacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pais`
--

LOCK TABLES `pais` WRITE;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` VALUES (2,'Honduras'),(3,'Estados Unidos'),(4,'MÃ©xico');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('0000-0000-00000','Luis','Manuel','Reyes','Deras','2015-07-16','M','','correonuevo@gmail.com','viudo','Nacionalidad',''),('0050-0000-00000','s','p','s','s','2015-06-06','M','D','correo','Casado','Nacionalidad',''),('01','S','P','O','K','2015-06-06','M','',NULL,NULL,'',''),('021','S','P','O','K','2015-06-06','M','',NULL,NULL,'',''),('0301-1993-04250','Carlos','Alberto','Salgado','Montoya','1993-10-22','F','Col. Kennedy 4ta Entrada, frente a Consejo Liberal.','calbertsm@gmail.com','Soltero','Hondurena',''),('0501-1994-05961','L','M','R','d','2015-06-06','M','D','l@gmail.com','soltero','H',''),('0501-1994-05962','M','R','D','R','2015-06-06','M','','l@gmail.com','Soltero','Nacionalidad',''),('0501-1994-05967','S','S','S','S','2015-07-14','M','Dirección','l@gmail.com','Casado','Nacionalidad',''),('0801-9123-12323','Claudio','','Paz','','2015-07-09','M','Nuevo Paraiso, Morocelí','klypaz@gmail.com','Soltero','Hondureña',''),('0808-1232-12312','P','S','N','S','2015-06-06','F','D','m@gmail.com','Divorciado','N',''),('1234-0000-00000','s','p','s','s','2015-06-06','M','D','correo','Casado','Nacionalidad',''),('1234-1978-91011','sdfghjk','DSAD','mdqow','dmi','2015-07-20','F','',NULL,NULL,'','');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `poa`
--

LOCK TABLES `poa` WRITE;
/*!40000 ALTER TABLE `poa` DISABLE KEYS */;
/*!40000 ALTER TABLE `poa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prioridad`
--

LOCK TABLES `prioridad` WRITE;
/*!40000 ALTER TABLE `prioridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `prioridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `prioridad_folio`
--

LOCK TABLES `prioridad_folio` WRITE;
/*!40000 ALTER TABLE `prioridad_folio` DISABLE KEYS */;
/*!40000 ALTER TABLE `prioridad_folio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `responsables_por_actividad`
--

LOCK TABLES `responsables_por_actividad` WRITE;
/*!40000 ALTER TABLE `responsables_por_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `responsables_por_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (10,'Usuario Basico'),(20,'Docente'),(29,'Asistente Jefatura'),(30,'Jefe Departamento'),(40,'Secretaria General'),(45,'Secretaria Decana'),(50,'Decano'),(100,'root');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_ciudades`
--

LOCK TABLES `sa_ciudades` WRITE;
/*!40000 ALTER TABLE `sa_ciudades` DISABLE KEYS */;
INSERT INTO `sa_ciudades` VALUES (1,'San Pedro Sula'),(2,'Tegucigalpa'),(3,'Comayagua'),(4,'Santa Rosa de Copan'),(5,'Jesus de Otoro'),(6,'La Ceiba'),(7,'Tela'),(8,'El Progreso'),(9,'Choluteca'),(10,'Valle'),(11,'La Paz');
/*!40000 ALTER TABLE `sa_ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_estados_solicitud`
--

LOCK TABLES `sa_estados_solicitud` WRITE;
/*!40000 ALTER TABLE `sa_estados_solicitud` DISABLE KEYS */;
INSERT INTO `sa_estados_solicitud` VALUES (1,'Activa'),(2,'Desactiva');
/*!40000 ALTER TABLE `sa_estados_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_estudiantes`
--

LOCK TABLES `sa_estudiantes` WRITE;
/*!40000 ALTER TABLE `sa_estudiantes` DISABLE KEYS */;
INSERT INTO `sa_estudiantes` VALUES ('0000-0000-00000','0000-0000-0',2,5,'2015-05-05',30,NULL,1,1,1,1,2015);
/*!40000 ALTER TABLE `sa_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_estudiantes_correos`
--

LOCK TABLES `sa_estudiantes_correos` WRITE;
/*!40000 ALTER TABLE `sa_estudiantes_correos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_estudiantes_correos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_estudiantes_menciones_honorificas`
--

LOCK TABLES `sa_estudiantes_menciones_honorificas` WRITE;
/*!40000 ALTER TABLE `sa_estudiantes_menciones_honorificas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sa_estudiantes_menciones_honorificas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_estudiantes_tipos_estudiantes`
--

LOCK TABLES `sa_estudiantes_tipos_estudiantes` WRITE;
/*!40000 ALTER TABLE `sa_estudiantes_tipos_estudiantes` DISABLE KEYS */;
INSERT INTO `sa_estudiantes_tipos_estudiantes` VALUES (1,'0000-0000-00000','2015-05-05 00:00:00');
/*!40000 ALTER TABLE `sa_estudiantes_tipos_estudiantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_examenes_himno`
--

LOCK TABLES `sa_examenes_himno` WRITE;
/*!40000 ALTER TABLE `sa_examenes_himno` DISABLE KEYS */;
INSERT INTO `sa_examenes_himno` VALUES (21,'2015-07-25',20150725,'0000-00-00'),(22,'2015-07-25',20150725,'2015-05-05'),(23,'2015-07-25',20150725,'0000-00-00');
/*!40000 ALTER TABLE `sa_examenes_himno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_menciones_honorificas`
--

LOCK TABLES `sa_menciones_honorificas` WRITE;
/*!40000 ALTER TABLE `sa_menciones_honorificas` DISABLE KEYS */;
INSERT INTO `sa_menciones_honorificas` VALUES (1,'Magna Cum Laude'),(2,'Cum Laude'),(3,'Cum'),(4,'Suma Magna Cum Laude');
/*!40000 ALTER TABLE `sa_menciones_honorificas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_orientaciones`
--

LOCK TABLES `sa_orientaciones` WRITE;
/*!40000 ALTER TABLE `sa_orientaciones` DISABLE KEYS */;
INSERT INTO `sa_orientaciones` VALUES (2,'Derecho Mercantil'),(3,'Ciencias Politicas'),(4,'Derechos Humanos'),(5,'Derecho Maritimo');
/*!40000 ALTER TABLE `sa_orientaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_periodos`
--

LOCK TABLES `sa_periodos` WRITE;
/*!40000 ALTER TABLE `sa_periodos` DISABLE KEYS */;
INSERT INTO `sa_periodos` VALUES (1,'Primer periodo'),(2,'Segundo periodo'),(3,'Tercer periodo');
/*!40000 ALTER TABLE `sa_periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_planes_estudio`
--

LOCK TABLES `sa_planes_estudio` WRITE;
/*!40000 ALTER TABLE `sa_planes_estudio` DISABLE KEYS */;
INSERT INTO `sa_planes_estudio` VALUES (1,'Derecho',120);
/*!40000 ALTER TABLE `sa_planes_estudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_solicitudes`
--

LOCK TABLES `sa_solicitudes` WRITE;
/*!40000 ALTER TABLE `sa_solicitudes` DISABLE KEYS */;
INSERT INTO `sa_solicitudes` VALUES (21,'2015-07-25',NULL,'0000-0000-00000',1,1,1,NULL,NULL),(22,'2015-07-25',NULL,'0000-0000-00000',1,1,1,NULL,NULL),(23,'2015-07-25',NULL,'0000-0000-00000',3,1,1,NULL,NULL);
/*!40000 ALTER TABLE `sa_solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_tipos_estudiante`
--

LOCK TABLES `sa_tipos_estudiante` WRITE;
/*!40000 ALTER TABLE `sa_tipos_estudiante` DISABLE KEYS */;
INSERT INTO `sa_tipos_estudiante` VALUES (1,'Pregrado'),(2,'Postgrado');
/*!40000 ALTER TABLE `sa_tipos_estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_tipos_solicitud`
--

LOCK TABLES `sa_tipos_solicitud` WRITE;
/*!40000 ALTER TABLE `sa_tipos_solicitud` DISABLE KEYS */;
INSERT INTO `sa_tipos_solicitud` VALUES (1,'Tipo solicitud'),(123456,'Hola'),(123457,'esCorrecto'),(123458,'mi solicitud'),(123459,'hola mundo'),(123460,'a'),(123461,'nuevaSolicitud'),(123462,NULL);
/*!40000 ALTER TABLE `sa_tipos_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sa_tipos_solicitud_tipos_alumnos`
--

LOCK TABLES `sa_tipos_solicitud_tipos_alumnos` WRITE;
/*!40000 ALTER TABLE `sa_tipos_solicitud_tipos_alumnos` DISABLE KEYS */;
INSERT INTO `sa_tipos_solicitud_tipos_alumnos` VALUES (1,1);
/*!40000 ALTER TABLE `sa_tipos_solicitud_tipos_alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `seguimiento`
--

LOCK TABLES `seguimiento` WRITE;
/*!40000 ALTER TABLE `seguimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `seguimiento_historico`
--

LOCK TABLES `seguimiento_historico` WRITE;
/*!40000 ALTER TABLE `seguimiento_historico` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguimiento_historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sub_actividad`
--

LOCK TABLES `sub_actividad` WRITE;
/*!40000 ALTER TABLE `sub_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sub_actividades_realizadas`
--

LOCK TABLES `sub_actividades_realizadas` WRITE;
/*!40000 ALTER TABLE `sub_actividades_realizadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_actividades_realizadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_area`
--

LOCK TABLES `tipo_area` WRITE;
/*!40000 ALTER TABLE `tipo_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_estudio`
--

LOCK TABLES `tipo_estudio` WRITE;
/*!40000 ALTER TABLE `tipo_estudio` DISABLE KEYS */;
INSERT INTO `tipo_estudio` VALUES (1,'licenciatura'),(2,'Maestria'),(3,'Doctorado');
/*!40000 ALTER TABLE `tipo_estudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `titulo`
--

LOCK TABLES `titulo` WRITE;
/*!40000 ALTER TABLE `titulo` DISABLE KEYS */;
INSERT INTO `titulo` VALUES (1,'Licenciatura en Ingenieria en Sistemas'),(2,'Licenciatura en Derecho'),(3,'Licenciatura en Matematicas'),(4,'Maestria en Derecho Penal');
/*!40000 ALTER TABLE `titulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ubicacion_archivofisico`
--

LOCK TABLES `ubicacion_archivofisico` WRITE;
/*!40000 ALTER TABLE `ubicacion_archivofisico` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacion_archivofisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ubicacion_notificaciones`
--

LOCK TABLES `ubicacion_notificaciones` WRITE;
/*!40000 ALTER TABLE `ubicacion_notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubicacion_notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unidad_academica`
--

LOCK TABLES `unidad_academica` WRITE;
/*!40000 ALTER TABLE `unidad_academica` DISABLE KEYS */;
/*!40000 ALTER TABLE `unidad_academica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `universidad`
--

LOCK TABLES `universidad` WRITE;
/*!40000 ALTER TABLE `universidad` DISABLE KEYS */;
INSERT INTO `universidad` VALUES (3,'UNAH',2),(4,'Universidad Pedagogica',2);
/*!40000 ALTER TABLE `universidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'123444','prueba','81DF7D234F3B8F5487AF508C2C79B00A',100,'2015-07-06',NULL,1,1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_alertado`
--

LOCK TABLES `usuario_alertado` WRITE;
/*!40000 ALTER TABLE `usuario_alertado` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_alertado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_log`
--

LOCK TABLES `usuario_log` WRITE;
/*!40000 ALTER TABLE `usuario_log` DISABLE KEYS */;
INSERT INTO `usuario_log` VALUES (141,1,'2015-07-07 00:51:30','::1'),(142,1,'2015-07-07 01:04:21','::1'),(143,1,'2015-07-07 02:04:10','::1'),(144,1,'2015-07-09 04:56:43','::1'),(145,1,'2015-07-09 04:57:10','::1'),(146,1,'2015-07-09 05:24:43','::1'),(147,1,'2015-07-09 05:26:32','192.168.0.16'),(148,1,'2015-07-09 05:28:15','192.168.0.22'),(149,1,'2015-07-09 05:28:15','192.168.0.22'),(150,1,'2015-07-09 05:28:35','192.168.0.5'),(151,1,'2015-07-09 05:30:48','::1'),(152,1,'2015-07-09 05:51:35','::1'),(153,1,'2015-07-09 05:57:15','192.168.0.5'),(154,1,'2015-07-09 06:21:13','192.168.0.5'),(155,1,'2015-07-09 06:36:33','::1'),(156,1,'2015-07-09 06:38:30','192.168.0.22'),(157,1,'2015-07-09 06:38:30','192.168.0.22'),(158,1,'2015-07-09 06:51:17','::1'),(159,1,'2015-07-09 06:52:33','::1'),(160,1,'2015-07-09 06:56:41','::1'),(161,1,'2015-07-09 07:03:03','::1'),(162,1,'2015-07-09 07:12:31','192.168.0.16'),(163,1,'2015-07-09 07:39:38','192.168.0.5'),(164,1,'2015-07-09 07:39:43','::1'),(165,1,'2015-07-09 07:41:58','::1'),(166,1,'2015-07-09 08:02:15','::1'),(167,1,'2015-07-09 08:04:13','::1'),(168,1,'2015-07-09 08:12:55','192.168.0.16'),(169,1,'2015-07-09 08:16:36','::1'),(170,1,'2015-07-09 08:56:39','::1'),(171,1,'2015-07-09 09:02:08','::1'),(172,1,'2015-07-09 09:02:30','::1'),(173,1,'2015-07-09 09:04:00','192.168.0.5'),(174,1,'2015-07-09 09:18:57','192.168.0.22'),(175,1,'2015-07-09 09:18:57','192.168.0.22'),(176,1,'2015-07-09 09:27:48','::1'),(177,1,'2015-07-09 09:29:21','::1'),(178,1,'2015-07-09 09:49:38','::1'),(179,1,'2015-07-09 10:00:41','192.168.0.16'),(180,1,'2015-07-09 10:01:42','::1'),(181,1,'2015-07-09 10:02:04','192.168.0.5'),(182,1,'2015-07-09 10:02:26','192.168.0.22'),(183,1,'2015-07-09 10:02:26','192.168.0.22'),(184,1,'2015-07-09 10:08:44','::1'),(185,1,'2015-07-09 10:18:06','192.168.0.5'),(186,1,'2015-07-09 10:18:12','::1'),(187,1,'2015-07-09 10:45:05','192.168.0.5'),(188,1,'2015-07-09 10:47:44','192.168.0.5'),(189,1,'2015-07-09 11:20:58','::1'),(190,1,'2015-07-09 11:26:23','192.168.0.22'),(191,1,'2015-07-09 11:26:23','192.168.0.22'),(192,1,'2015-07-09 23:40:06','::1'),(193,1,'2015-07-11 02:31:00','::1'),(194,1,'2015-07-11 04:01:37','::1'),(195,1,'2015-07-11 04:09:46','192.168.0.23'),(196,1,'2015-07-11 04:11:58','192.168.0.22'),(197,1,'2015-07-11 04:24:10','192.168.0.23'),(198,1,'2015-07-11 04:35:04','192.168.0.23'),(199,1,'2015-07-11 04:58:32','192.168.0.22'),(200,1,'2015-07-11 05:23:49','192.168.0.23'),(201,1,'2015-07-11 05:28:53','::1'),(202,1,'2015-07-11 05:30:48','192.168.0.22'),(203,1,'2015-07-11 05:31:35','192.168.0.23'),(204,1,'2015-07-11 05:38:27','192.168.0.17'),(205,1,'2015-07-11 05:38:27','192.168.0.17'),(206,1,'2015-07-11 05:58:12','192.168.0.17'),(207,1,'2015-07-11 05:58:13','192.168.0.17'),(208,1,'2015-07-11 06:03:01','::1'),(209,1,'2015-07-11 06:34:38','192.168.0.23'),(210,1,'2015-07-11 06:46:38','192.168.0.23'),(211,1,'2015-07-11 06:47:36','192.168.0.17'),(212,1,'2015-07-11 06:47:36','192.168.0.17'),(213,1,'2015-07-11 07:03:51','::1'),(214,1,'2015-07-11 07:09:40','192.168.0.23'),(215,1,'2015-07-11 07:19:33','192.168.0.22'),(216,1,'2015-07-11 07:22:06','192.168.0.17'),(217,1,'2015-07-11 07:22:06','192.168.0.17'),(218,1,'2015-07-11 07:33:52','192.168.0.24'),(219,1,'2015-07-11 07:43:37','192.168.0.23'),(220,1,'2015-07-11 07:54:41','192.168.0.24'),(221,1,'2015-07-11 07:54:57','192.168.0.17'),(222,1,'2015-07-11 07:54:57','192.168.0.17'),(223,1,'2015-07-11 08:21:12','192.168.0.24'),(224,1,'2015-07-11 08:45:03','192.168.0.23'),(225,1,'2015-07-11 08:48:12','192.168.0.22'),(226,1,'2015-07-11 09:17:30','192.168.0.17'),(227,1,'2015-07-11 09:17:30','192.168.0.17'),(228,1,'2015-07-11 09:20:43','::1'),(229,1,'2015-07-11 09:26:21','::1'),(230,1,'2015-07-11 09:31:27','192.168.0.24'),(231,1,'2015-07-11 09:43:26','::1'),(232,1,'2015-07-11 09:45:08','192.168.0.22'),(233,1,'2015-07-11 10:07:47','192.168.0.22'),(234,1,'2015-07-11 10:21:10','192.168.0.24'),(235,1,'2015-07-11 11:01:08','192.168.0.17'),(236,1,'2015-07-11 11:01:08','192.168.0.17'),(237,1,'2015-07-11 11:03:38','192.168.0.24'),(258,1,'2015-07-25 16:06:00','::1'),(259,1,'2015-07-25 16:06:02','::1'),(260,1,'2015-07-25 16:06:05','::1'),(261,1,'2015-07-25 16:06:07','::1'),(262,1,'2015-07-25 16:06:18','::1'),(263,1,'2015-07-25 16:06:22','::1'),(264,1,'2015-07-25 16:06:31','::1'),(265,1,'2015-07-25 16:06:56','::1'),(266,1,'2015-07-25 16:07:41','::1'),(267,1,'2015-07-25 16:07:45','::1'),(268,1,'2015-07-25 16:08:10','::1'),(269,1,'2015-07-25 16:45:01','::1'),(270,1,'2015-07-25 16:45:17','::1'),(271,1,'2015-07-25 16:45:37','::1'),(272,1,'2015-07-25 16:45:40','::1'),(273,1,'2015-07-25 16:45:42','::1'),(274,1,'2015-07-25 16:45:43','::1'),(275,1,'2015-07-25 16:46:09','::1'),(276,1,'2015-07-25 16:49:32','::1'),(277,1,'2015-07-25 16:49:39','::1'),(278,1,'2015-07-25 16:49:55','::1'),(279,1,'2015-07-25 16:52:00','::1'),(280,1,'2015-07-25 16:56:17','::1'),(281,1,'2015-07-25 16:56:56','::1'),(282,1,'2015-07-25 16:57:30','::1'),(283,1,'2015-07-25 17:00:33','::1'),(284,1,'2015-07-25 17:00:59','::1'),(285,1,'2015-07-25 17:04:06','::1'),(286,1,'2015-07-25 17:24:12','::1'),(287,1,'2015-07-25 17:24:32','192.168.43.1'),(288,1,'2015-07-25 17:24:48','::1'),(289,1,'2015-07-25 20:40:56','::1'),(290,1,'2015-07-25 20:42:14','::1'),(291,1,'2015-07-25 20:45:19','::1'),(292,1,'2015-07-25 20:46:43','::1'),(293,1,'2015-07-25 20:48:43','::1'),(294,1,'2015-07-25 20:49:47','::1'),(295,1,'2015-07-25 20:52:07','::1'),(296,1,'2015-07-25 20:57:36','::1'),(297,1,'2015-07-25 21:09:11','::1'),(298,1,'2015-07-25 21:11:29','::1'),(299,1,'2015-07-25 21:13:01','::1'),(300,1,'2015-07-25 21:16:25','::1'),(301,1,'2015-07-25 21:16:49','::1'),(302,1,'2015-07-25 21:18:15','::1'),(303,1,'2015-07-25 21:20:07','::1'),(304,1,'2015-07-25 21:21:08','::1'),(305,1,'2015-07-25 21:21:56','::1'),(306,1,'2015-07-26 20:39:25','::1'),(307,1,'2015-07-26 21:15:01','::1'),(308,1,'2015-07-26 21:25:19','::1'),(309,1,'2015-07-26 21:27:40','::1'),(310,1,'2015-07-26 21:29:35','::1'),(311,1,'2015-07-26 21:33:46','::1'),(312,1,'2015-07-26 21:34:36','::1'),(313,1,'2015-07-26 21:35:08','::1'),(314,1,'2015-07-26 21:43:18','::1'),(315,1,'2015-07-26 21:45:11','::1'),(316,1,'2015-07-26 21:45:43','::1'),(317,1,'2015-07-26 21:45:46','::1'),(318,1,'2015-07-26 21:49:41','::1'),(319,1,'2015-07-26 22:12:00','::1'),(320,1,'2015-07-26 22:13:05','::1'),(321,1,'2015-07-26 22:16:19','::1'),(322,1,'2015-07-26 22:16:52','::1'),(323,1,'2015-07-26 22:20:48','::1'),(324,1,'2015-07-26 22:20:51','::1'),(325,1,'2015-07-26 22:23:06','::1'),(326,1,'2015-07-26 22:35:05','::1'),(327,1,'2015-07-26 22:38:00','::1'),(328,1,'2015-07-26 22:38:19','::1'),(329,1,'2015-07-26 22:39:31','::1'),(330,1,'2015-07-26 23:03:19','::1'),(331,1,'2015-07-26 23:07:15','::1'),(332,1,'2015-07-26 23:11:55','::1'),(333,1,'2015-07-26 23:13:26','::1'),(334,1,'2015-07-26 23:22:24','::1'),(335,1,'2015-07-26 23:23:00','::1'),(336,1,'2015-07-27 03:02:02','::1'),(337,1,'2015-07-27 23:54:48','::1'),(338,1,'2015-07-28 00:25:39','::1'),(339,1,'2015-07-28 00:33:28','::1'),(340,1,'2015-07-28 05:16:31','::1'),(341,1,'2015-07-28 05:40:26','::1'),(342,1,'2015-07-28 15:26:49','::1');
/*!40000 ALTER TABLE `usuario_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_notificado`
--

LOCK TABLES `usuario_notificado` WRITE;
/*!40000 ALTER TABLE `usuario_notificado` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_notificado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-28 10:40:23
