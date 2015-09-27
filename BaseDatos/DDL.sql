-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2015 a las 19:31:31
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ccjj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `id_indicador` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `correlativo` varchar(20) NOT NULL,
  `supuesto` text NOT NULL,
  `justificacion` text NOT NULL,
  `medio_verificacion` text NOT NULL,
  `poblacion_objetivo` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_terminadas`
--

CREATE TABLE `actividades_terminadas` (
  `id_Actividades_Terminadas` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(15) NOT NULL,
  `observaciones` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `Id_Alerta` int(11) NOT NULL,
  `NroFolioGenera` varchar(25) NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `Atendido` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_Area` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_tipo_area` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID_cargo` int(11) NOT NULL,
  `Cargo` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_folios`
--

CREATE TABLE `categorias_folios` (
  `Id_categoria` int(11) NOT NULL,
  `NombreCategoria` text NOT NULL,
  `DescripcionCategoria` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_acondicionamientos`
--

CREATE TABLE `ca_acondicionamientos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_areas`
--

CREATE TABLE `ca_areas` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_aulas`
--

CREATE TABLE `ca_aulas` (
  `codigo` int(11) NOT NULL,
  `cod_edificio` int(11) NOT NULL,
  `numero_aula` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_aulas_instancias_acondicionamientos`
--

CREATE TABLE `ca_aulas_instancias_acondicionamientos` (
  `cod_aula` int(11) NOT NULL,
  `cod_instancia_acondicionamiento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_cargas_academicas`
--

CREATE TABLE `ca_cargas_academicas` (
  `codigo` int(11) NOT NULL,
  `cod_periodo` int(11) DEFAULT NULL,
  `no_empleado` varchar(20) DEFAULT NULL,
  `dni_empleado` varchar(20) DEFAULT NULL,
  `cod_estado` int(11) DEFAULT NULL,
  `anio` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_contratos`
--

CREATE TABLE `ca_contratos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_cursos`
--

CREATE TABLE `ca_cursos` (
  `codigo` int(11) NOT NULL,
  `cupos` int(11) DEFAULT NULL,
  `cod_carga` int(11) DEFAULT NULL,
  `cod_seccion` int(11) DEFAULT NULL,
  `cod_asignatura` int(11) DEFAULT NULL,
  `cod_aula` int(11) DEFAULT NULL,
  `no_empleado` varchar(20) DEFAULT NULL,
  `dni_empleado` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_cursos_dias`
--

CREATE TABLE `ca_cursos_dias` (
  `cod_curso` int(11) NOT NULL,
  `cod_dia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_dias`
--

CREATE TABLE `ca_dias` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(9) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_empleados_contratos`
--

CREATE TABLE `ca_empleados_contratos` (
  `no_empleado` varchar(20) NOT NULL,
  `dni_empleado` varchar(20) NOT NULL,
  `cod_contrato` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_empleados_proyectos`
--

CREATE TABLE `ca_empleados_proyectos` (
  `no_empleado` varchar(20) NOT NULL,
  `dni_empleado` varchar(20) NOT NULL,
  `cod_proyecto` int(11) NOT NULL,
  `cod_rol_proyecto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_estados_carga`
--

CREATE TABLE `ca_estados_carga` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_facultades`
--

CREATE TABLE `ca_facultades` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_instancias_acondicionamientos`
--

CREATE TABLE `ca_instancias_acondicionamientos` (
  `codigo` int(11) NOT NULL,
  `cod_acondicionamiento` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_proyectos`
--

CREATE TABLE `ca_proyectos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cod_vinculacion` int(11) DEFAULT NULL,
  `cod_area` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_roles_proyecto`
--

CREATE TABLE `ca_roles_proyecto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_secciones`
--

CREATE TABLE `ca_secciones` (
  `codigo` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ca_vinculaciones`
--

CREATE TABLE `ca_vinculaciones` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cod_facultad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `ID_Clases` int(11) NOT NULL,
  `Clase` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_has_experiencia_academica`
--

CREATE TABLE `clases_has_experiencia_academica` (
  `ID_Clases` int(11) NOT NULL,
  `ID_Experiencia_academica` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo_porcentaje_actividad_por_trimestre`
--

CREATE TABLE `costo_porcentaje_actividad_por_trimestre` (
  `id_Costo_Porcentaje_Actividad_Por_Trimesrte` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `observacion` text,
  `trimestre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_laboral`
--

CREATE TABLE `departamento_laboral` (
  `Id_departamento_laboral` int(11) NOT NULL,
  `nombre_departamento` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE `edificios` (
  `Edificio_ID` int(11) NOT NULL,
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `No_Empleado` varchar(20) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Id_departamento` int(11) NOT NULL,
  `Fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `Observacion` text,
  `estado_empleado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_cargo`
--

CREATE TABLE `empleado_has_cargo` (
  `No_Empleado` varchar(20) NOT NULL,
  `ID_cargo` int(11) NOT NULL,
  `Fecha_ingreso_cargo` date NOT NULL,
  `Fecha_salida_cargo` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_seguimiento`
--

CREATE TABLE `estado_seguimiento` (
  `Id_Estado_Seguimiento` tinyint(4) NOT NULL,
  `DescripcionEstadoSeguimiento` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_academico`
--

CREATE TABLE `estudios_academico` (
  `ID_Estudios_academico` int(11) NOT NULL,
  `Nombre_titulo` varchar(45) NOT NULL,
  `ID_Tipo_estudio` int(11) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Id_universidad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_academica`
--

CREATE TABLE `experiencia_academica` (
  `ID_Experiencia_academica` int(11) NOT NULL,
  `Institucion` varchar(45) NOT NULL,
  `Tiempo` int(3) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE `experiencia_laboral` (
  `ID_Experiencia_laboral` int(11) NOT NULL,
  `Nombre_empresa` varchar(45) NOT NULL,
  `Tiempo` int(3) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral_has_cargo`
--

CREATE TABLE `experiencia_laboral_has_cargo` (
  `ID_Experiencia_laboral` int(11) NOT NULL,
  `ID_cargo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE `folios` (
  `NroFolio` varchar(25) NOT NULL,
  `NroFolioRespuesta` varchar(25) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaEntrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PersonaReferente` text NOT NULL,
  `UnidadAcademica` int(11) DEFAULT NULL,
  `Organizacion` int(11) DEFAULT NULL,
  `Categoria` int(11) NOT NULL,
  `DescripcionAsunto` text,
  `TipoFolio` tinyint(1) NOT NULL,
  `UbicacionFisica` int(5) NOT NULL,
  `Prioridad` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_o_comite`
--

CREATE TABLE `grupo_o_comite` (
  `ID_Grupo_o_comite` int(11) NOT NULL,
  `Nombre_Grupo_o_comite` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_o_comite_has_empleado`
--

CREATE TABLE `grupo_o_comite_has_empleado` (
  `ID_Grupo_o_comite` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `ID_Idioma` int(11) NOT NULL,
  `Idioma` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma_has_persona`
--

CREATE TABLE `idioma_has_persona` (
  `ID_Idioma` int(11) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
  `Id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `id_Indicadores` int(11) NOT NULL,
  `id_ObjetivosInsitucionales` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos`
--

CREATE TABLE `motivos` (
  `Motivo_ID` int(11) NOT NULL,
  `descripcion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_folios`
--

CREATE TABLE `notificaciones_folios` (
  `Id_Notificacion` int(11) NOT NULL,
  `NroFolio` varchar(25) NOT NULL,
  `IdEmisor` int(15) NOT NULL,
  `Titulo` text NOT NULL,
  `Cuerpo` text NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `IdUbicacionNotificacion` int(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos_institucionales`
--

CREATE TABLE `objetivos_institucionales` (
  `id_Objetivo` int(11) NOT NULL,
  `definicion` text NOT NULL,
  `area_Estrategica` text NOT NULL,
  `resultados_Esperados` text NOT NULL,
  `id_Area` int(11) NOT NULL,
  `id_Poa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE `organizacion` (
  `Id_Organizacion` int(11) NOT NULL,
  `NombreOrganizacion` text NOT NULL,
  `Ubicacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Id_pais` int(11) NOT NULL,
  `Nombre_pais` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_Permisos` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `dias_permiso` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `revisado_por` varchar(15) DEFAULT NULL,
  `id_Edificio_Registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `N_identidad` varchar(20) NOT NULL,
  `Primer_nombre` varchar(20) NOT NULL,
  `Segundo_nombre` varchar(20) DEFAULT NULL,
  `Primer_apellido` varchar(45) NOT NULL,
  `Segundo_apellido` varchar(20) DEFAULT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Direccion` varchar(300) NOT NULL,
  `Correo_electronico` varchar(40) DEFAULT NULL,
  `Estado_Civil` varchar(15) DEFAULT NULL,
  `Nacionalidad` varchar(20) NOT NULL,
  `foto_perfil` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poa`
--

CREATE TABLE `poa` (
  `id_Poa` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_de_Inicio` date NOT NULL,
  `fecha_Fin` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `Id_Prioridad` tinyint(4) NOT NULL,
  `DescripcionPrioridad` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad_folio`
--

CREATE TABLE `prioridad_folio` (
  `Id_PrioridadFolio` int(11) NOT NULL,
  `IdFolio` varchar(25) NOT NULL,
  `Id_Prioridad` tinyint(4) NOT NULL,
  `FechaEstablecida` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables_por_actividad`
--

CREATE TABLE `responsables_por_actividad` (
  `id_Responsable_por_Actividad` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `id_Responsable` int(11) NOT NULL,
  `fecha_Asignacion` date NOT NULL,
  `observacion` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id_Rol` tinyint(4) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_ciudades`
--

CREATE TABLE `sa_ciudades` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_estados_solicitud`
--

CREATE TABLE `sa_estados_solicitud` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_estudiantes`
--

CREATE TABLE `sa_estudiantes` (
  `dni` varchar(20) NOT NULL,
  `no_cuenta` varchar(11) NOT NULL,
  `anios_inicio_estudio` int(11) NOT NULL,
  `indice_academico` decimal(10,0) NOT NULL,
  `fecha_registro` date NOT NULL,
  `uv_acumulados` int(11) NOT NULL,
  `cantcodad_solicitudes` int(11) DEFAULT NULL,
  `cod_plan_estudio` int(11) NOT NULL,
  `cod_ciudad_origen` int(11) NOT NULL,
  `cod_orientacion` int(11) NOT NULL,
  `cod_residencia_actual` int(11) NOT NULL,
  `anios_final_estudio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_estudiantes_correos`
--

CREATE TABLE `sa_estudiantes_correos` (
  `dni_estudiante` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_estudiantes_menciones_honorificas`
--

CREATE TABLE `sa_estudiantes_menciones_honorificas` (
  `dni_estudiante` varchar(20) NOT NULL,
  `cod_mencion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_estudiantes_tipos_estudiantes`
--

CREATE TABLE `sa_estudiantes_tipos_estudiantes` (
  `codigo_tipo_estudiante` int(11) NOT NULL,
  `dni_estudiante` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_examenes_himno`
--

CREATE TABLE `sa_examenes_himno` (
  `cod_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `nota_himno` decimal(10,0) DEFAULT NULL,
  `fecha_examen_himno` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_menciones_honorificas`
--

CREATE TABLE `sa_menciones_honorificas` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_orientaciones`
--

CREATE TABLE `sa_orientaciones` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_periodos`
--

CREATE TABLE `sa_periodos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_planes_estudio`
--

CREATE TABLE `sa_planes_estudio` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `uv` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_solicitudes`
--

CREATE TABLE `sa_solicitudes` (
  `codigo` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `dni_estudiante` varchar(20) NOT NULL,
  `cod_periodo` int(11) NOT NULL,
  `cod_estado` int(11) NOT NULL,
  `cod_tipo_solicitud` int(11) NOT NULL,
  `cod_solicitud_padre` int(11) DEFAULT NULL,
  `fecha_solicitud_padre` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_tipos_estudiante`
--

CREATE TABLE `sa_tipos_estudiante` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_tipos_solicitud`
--

CREATE TABLE `sa_tipos_solicitud` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sa_tipos_solicitud_tipos_alumnos`
--

CREATE TABLE `sa_tipos_solicitud_tipos_alumnos` (
  `cod_tipo_solicitud` int(11) NOT NULL,
  `cod_tipo_alumno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `Id_Seguimiento` int(11) NOT NULL,
  `NroFolio` varchar(25) NOT NULL,
  `UsuarioAsignado` int(11) DEFAULT NULL,
  `Notas` text NOT NULL,
  `Prioridad` tinyint(4) NOT NULL,
  `FechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FechaFinal` date DEFAULT NULL,
  `EstadoSeguimiento` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_historico`
--

CREATE TABLE `seguimiento_historico` (
  `Id_SeguimientoHistorico` int(11) NOT NULL,
  `Id_Seguimiento` int(11) NOT NULL,
  `Id_Estado_Seguimiento` tinyint(4) NOT NULL,
  `Notas` text NOT NULL,
  `Prioridad` tinyint(4) NOT NULL,
  `FechaCambio` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_actividad`
--

CREATE TABLE `sub_actividad` (
  `id_sub_Actividad` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_monitoreo` date NOT NULL,
  `id_Encargado` varchar(20) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_actividades_realizadas`
--

CREATE TABLE `sub_actividades_realizadas` (
  `id_subActividadRealizada` int(11) NOT NULL,
  `id_SubActividad` int(11) NOT NULL,
  `fecha_Realizacion` date NOT NULL,
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `ID_Telefono` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Numero` varchar(20) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_area`
--

CREATE TABLE `tipo_area` (
  `id_Tipo_Area` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estudio`
--

CREATE TABLE `tipo_estudio` (
  `ID_Tipo_estudio` int(11) NOT NULL,
  `Tipo_estudio` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `id_titulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_archivofisico`
--

CREATE TABLE `ubicacion_archivofisico` (
  `Id_UbicacionArchivoFisico` int(5) NOT NULL,
  `DescripcionUbicacionFisica` text NOT NULL,
  `Capacidad` int(10) NOT NULL,
  `TotalIngresados` int(10) NOT NULL DEFAULT '0',
  `HabilitadoParaAlmacenar` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_notificaciones`
--

CREATE TABLE `ubicacion_notificaciones` (
  `Id_UbicacionNotificaciones` tinyint(4) NOT NULL,
  `DescripcionUbicacionNotificaciones` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_academica`
--

CREATE TABLE `unidad_academica` (
  `Id_UnidadAcademica` int(11) NOT NULL,
  `NombreUnidadAcademica` text NOT NULL,
  `UbicacionUnidadAcademica` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `Id_universidad` int(11) NOT NULL,
  `nombre_universidad` varchar(50) NOT NULL,
  `Id_pais` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `No_Empleado` varchar(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `Password` varbinary(250) NOT NULL,
  `Id_Rol` tinyint(4) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Alta` date DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL,
  `esta_logueado` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_alertado`
--

CREATE TABLE `usuario_alertado` (
  `Id_UsuarioAlertado` int(11) NOT NULL,
  `Id_Alerta` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_log`
--

CREATE TABLE `usuario_log` (
  `Id_log` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_conn` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_notificado`
--

CREATE TABLE `usuario_notificado` (
  `Id_UsuarioNotificado` int(11) NOT NULL,
  `Id_Notificacion` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `IdUbicacionNotificacion` tinyint(4) NOT NULL,
  `Estado` tinyint(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_indicador` (`id_indicador`);

--
-- Indices de la tabla `actividades_terminadas`
--
ALTER TABLE `actividades_terminadas`
  ADD PRIMARY KEY (`id_Actividades_Terminadas`),
  ADD KEY `id_Actividad` (`id_Actividad`),
  ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`Id_Alerta`),
  ADD KEY `fk_alerta_folios_idx` (`NroFolioGenera`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_Area`),
  ADD KEY `id_tipo_area` (`id_tipo_area`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID_cargo`);

--
-- Indices de la tabla `categorias_folios`
--
ALTER TABLE `categorias_folios`
  ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `ca_acondicionamientos`
--
ALTER TABLE `ca_acondicionamientos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_areas`
--
ALTER TABLE `ca_areas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_aulas`
--
ALTER TABLE `ca_aulas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `aulas_edificios_FK_idx` (`cod_edificio`);

--
-- Indices de la tabla `ca_aulas_instancias_acondicionamientos`
--
ALTER TABLE `ca_aulas_instancias_acondicionamientos`
  ADD PRIMARY KEY (`cod_aula`),
  ADD KEY `a_i_a_instancias_acondicionamientos_FK_idx` (`cod_instancia_acondicionamiento`);

--
-- Indices de la tabla `ca_cargas_academicas`
--
ALTER TABLE `ca_cargas_academicas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cargas_academicas_periodos_FK_idx` (`cod_periodo`),
  ADD KEY `cargas_academicas_empleados_FK_idx` (`no_empleado`,`dni_empleado`),
  ADD KEY `cargas_academicas_estados_FK_idx` (`cod_estado`);

--
-- Indices de la tabla `ca_contratos`
--
ALTER TABLE `ca_contratos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_cursos`
--
ALTER TABLE `ca_cursos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cursos_cargas_FK_idx` (`cod_carga`),
  ADD KEY `cursos_secciones_FK_idx` (`cod_seccion`),
  ADD KEY `cursos_asignaturas_FK_idx` (`cod_asignatura`),
  ADD KEY `cursos_aulas_FK_idx` (`cod_aula`),
  ADD KEY `cursos_empleados_FK_idx` (`no_empleado`,`dni_empleado`);

--
-- Indices de la tabla `ca_cursos_dias`
--
ALTER TABLE `ca_cursos_dias`
  ADD PRIMARY KEY (`cod_curso`,`cod_dia`),
  ADD KEY `cursos_dias_dias_FK_idx` (`cod_dia`);

--
-- Indices de la tabla `ca_dias`
--
ALTER TABLE `ca_dias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_empleados_contratos`
--
ALTER TABLE `ca_empleados_contratos`
  ADD PRIMARY KEY (`no_empleado`,`dni_empleado`),
  ADD KEY `e_c_contratos_FK_idx` (`cod_contrato`);

--
-- Indices de la tabla `ca_empleados_proyectos`
--
ALTER TABLE `ca_empleados_proyectos`
  ADD PRIMARY KEY (`no_empleado`,`dni_empleado`),
  ADD KEY `d_e_p_proyectos_FK_idx` (`cod_proyecto`),
  ADD KEY `d_e_p_roles_proyecto_FK_idx` (`cod_rol_proyecto`);

--
-- Indices de la tabla `ca_estados_carga`
--
ALTER TABLE `ca_estados_carga`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_facultades`
--
ALTER TABLE `ca_facultades`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_instancias_acondicionamientos`
--
ALTER TABLE `ca_instancias_acondicionamientos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `instancias_acondicionamientos_acondicionamientos_FK_idx` (`cod_acondicionamiento`);

--
-- Indices de la tabla `ca_proyectos`
--
ALTER TABLE `ca_proyectos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `proyectos_vinculaciones_FK_idx` (`cod_vinculacion`),
  ADD KEY `proyectos_areas_FK_idx` (`cod_area`);

--
-- Indices de la tabla `ca_roles_proyecto`
--
ALTER TABLE `ca_roles_proyecto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_secciones`
--
ALTER TABLE `ca_secciones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ca_vinculaciones`
--
ALTER TABLE `ca_vinculaciones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `vinculaciones_facultades_FK_idx` (`cod_facultad`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`ID_Clases`);

--
-- Indices de la tabla `clases_has_experiencia_academica`
--
ALTER TABLE `clases_has_experiencia_academica`
  ADD PRIMARY KEY (`ID_Clases`,`ID_Experiencia_academica`),
  ADD KEY `fk_Clases_has_Experiencia_academica_Experiencia_academica1_idx` (`ID_Experiencia_academica`),
  ADD KEY `fk_Clases_has_Experiencia_academica_Clases1_idx` (`ID_Clases`);

--
-- Indices de la tabla `costo_porcentaje_actividad_por_trimestre`
--
ALTER TABLE `costo_porcentaje_actividad_por_trimestre`
  ADD PRIMARY KEY (`id_Costo_Porcentaje_Actividad_Por_Trimesrte`),
  ADD KEY `id_Actividad` (`id_Actividad`);

--
-- Indices de la tabla `departamento_laboral`
--
ALTER TABLE `departamento_laboral`
  ADD PRIMARY KEY (`Id_departamento_laboral`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
  ADD PRIMARY KEY (`Edificio_ID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`No_Empleado`,`N_identidad`),
  ADD UNIQUE KEY `No_Empleado_2` (`No_Empleado`),
  ADD KEY `fk_Empleado_Persona1_idx` (`N_identidad`),
  ADD KEY `fk_empleado_dep_idx` (`Id_departamento`),
  ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `empleado_has_cargo`
--
ALTER TABLE `empleado_has_cargo`
  ADD PRIMARY KEY (`No_Empleado`,`ID_cargo`),
  ADD KEY `fk_Empleado_has_Cargo_Cargo1_idx` (`ID_cargo`),
  ADD KEY `fk_Empleado_has_Cargo_Empleado1_idx` (`No_Empleado`),
  ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `estado_seguimiento`
--
ALTER TABLE `estado_seguimiento`
  ADD PRIMARY KEY (`Id_Estado_Seguimiento`);

--
-- Indices de la tabla `estudios_academico`
--
ALTER TABLE `estudios_academico`
  ADD PRIMARY KEY (`ID_Estudios_academico`),
  ADD KEY `fk_Estudios_academico_Tipo_estudio1_idx` (`ID_Tipo_estudio`),
  ADD KEY `fk_Estudios_academico_Persona1_idx` (`N_identidad`),
  ADD KEY `fk_estudio_universidad_idx` (`Id_universidad`);

--
-- Indices de la tabla `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
  ADD PRIMARY KEY (`ID_Experiencia_academica`),
  ADD KEY `fk_Experiencia_academica_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  ADD PRIMARY KEY (`ID_Experiencia_laboral`),
  ADD KEY `fk_Experiencia_laboral_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `experiencia_laboral_has_cargo`
--
ALTER TABLE `experiencia_laboral_has_cargo`
  ADD PRIMARY KEY (`ID_Experiencia_laboral`,`ID_cargo`),
  ADD KEY `fk_Experiencia_laboral_has_Cargo_Cargo1_idx` (`ID_cargo`),
  ADD KEY `fk_Experiencia_laboral_has_Cargo_Experiencia_laboral1_idx` (`ID_Experiencia_laboral`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
  ADD PRIMARY KEY (`NroFolio`),
  ADD KEY `fk_folios_unidad_academica_unidadAcademica_idx` (`UnidadAcademica`),
  ADD KEY `fk_folios_organizacion_organizacion_idx` (`Organizacion`),
  ADD KEY `fk_folios_tblTipoPrioridad_idx` (`Prioridad`),
  ADD KEY `fk_folios_ubicacion_archivofisico_ubicacionFisica_idx` (`UbicacionFisica`),
  ADD KEY `fk_folio_folioRespuesta_idx` (`NroFolioRespuesta`),
  ADD KEY `fk_folios_categoria_idx` (`Categoria`);

--
-- Indices de la tabla `grupo_o_comite`
--
ALTER TABLE `grupo_o_comite`
  ADD PRIMARY KEY (`ID_Grupo_o_comite`);

--
-- Indices de la tabla `grupo_o_comite_has_empleado`
--
ALTER TABLE `grupo_o_comite_has_empleado`
  ADD PRIMARY KEY (`ID_Grupo_o_comite`,`No_Empleado`),
  ADD KEY `fk_Grupo_o_comite_has_Empleado_Empleado1_idx` (`No_Empleado`),
  ADD KEY `fk_Grupo_o_comite_has_Empleado_Grupo_o_comite1_idx` (`ID_Grupo_o_comite`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`ID_Idioma`);

--
-- Indices de la tabla `idioma_has_persona`
--
ALTER TABLE `idioma_has_persona`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Idioma_has_Persona_Persona1_idx` (`N_identidad`),
  ADD KEY `fk_Idioma_has_Persona_Idioma_idx` (`ID_Idioma`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id_Indicadores`),
  ADD KEY `id_ObjetivosInsitucionales` (`id_ObjetivosInsitucionales`);

--
-- Indices de la tabla `motivos`
--
ALTER TABLE `motivos`
  ADD PRIMARY KEY (`Motivo_ID`);

--
-- Indices de la tabla `notificaciones_folios`
--
ALTER TABLE `notificaciones_folios`
  ADD PRIMARY KEY (`Id_Notificacion`,`IdEmisor`),
  ADD KEY `fk_notificaciones_folios_folios_idx` (`NroFolio`),
  ADD KEY `fk_usuario_notificaciones_idx` (`IdEmisor`);

--
-- Indices de la tabla `objetivos_institucionales`
--
ALTER TABLE `objetivos_institucionales`
  ADD PRIMARY KEY (`id_Objetivo`),
  ADD KEY `id_Area` (`id_Area`),
  ADD KEY `id_Poa` (`id_Poa`),
  ADD KEY `id_Area_2` (`id_Area`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  ADD PRIMARY KEY (`Id_Organizacion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Id_pais`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_Permisos`),
  ADD KEY `fk_motivo_idx` (`id_motivo`),
  ADD KEY `fk_empleado_idx` (`No_Empleado`),
  ADD KEY `fk_edificio_registro_idx` (`id_Edificio_Registro`),
  ADD KEY `fk_revisado_idx` (`revisado_por`),
  ADD KEY `fk_departamento_idx` (`id_departamento`),
  ADD KEY `fk_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`N_identidad`);

--
-- Indices de la tabla `poa`
--
ALTER TABLE `poa`
  ADD PRIMARY KEY (`id_Poa`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`Id_Prioridad`);

--
-- Indices de la tabla `prioridad_folio`
--
ALTER TABLE `prioridad_folio`
  ADD PRIMARY KEY (`Id_PrioridadFolio`),
  ADD KEY `fk_prioridad_folio_folios_idx` (`IdFolio`),
  ADD KEY `fk_prioridad_folio_prioridad_idx` (`Id_Prioridad`);

--
-- Indices de la tabla `responsables_por_actividad`
--
ALTER TABLE `responsables_por_actividad`
  ADD PRIMARY KEY (`id_Responsable_por_Actividad`),
  ADD KEY `id_Actividad` (`id_Actividad`,`id_Responsable`),
  ADD KEY `id_Responsable` (`id_Responsable`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `sa_ciudades`
--
ALTER TABLE `sa_ciudades`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_estados_solicitud`
--
ALTER TABLE `sa_estados_solicitud`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_estudiantes`
--
ALTER TABLE `sa_estudiantes`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `no_cuenta_estudiantes_UC` (`no_cuenta`),
  ADD KEY `estudiante_plan_FK_idx` (`cod_plan_estudio`),
  ADD KEY `estudiante_ciudad_FK_idx` (`cod_ciudad_origen`),
  ADD KEY `estudiante_orientacion_FK_idx` (`cod_orientacion`),
  ADD KEY `estudiantes_lugar_origen_FK_idx` (`cod_residencia_actual`);

--
-- Indices de la tabla `sa_estudiantes_correos`
--
ALTER TABLE `sa_estudiantes_correos`
  ADD PRIMARY KEY (`dni_estudiante`,`correo`);

--
-- Indices de la tabla `sa_estudiantes_menciones_honorificas`
--
ALTER TABLE `sa_estudiantes_menciones_honorificas`
  ADD PRIMARY KEY (`dni_estudiante`,`cod_mencion`),
  ADD KEY `estudiante_mencion_mencion_FK_idx` (`cod_mencion`);

--
-- Indices de la tabla `sa_estudiantes_tipos_estudiantes`
--
ALTER TABLE `sa_estudiantes_tipos_estudiantes`
  ADD PRIMARY KEY (`codigo_tipo_estudiante`,`dni_estudiante`),
  ADD KEY `sa_estudiantes_tipos_estudiantes_estudiantes_idx` (`dni_estudiante`);

--
-- Indices de la tabla `sa_examenes_himno`
--
ALTER TABLE `sa_examenes_himno`
  ADD PRIMARY KEY (`cod_solicitud`,`fecha_solicitud`);

--
-- Indices de la tabla `sa_menciones_honorificas`
--
ALTER TABLE `sa_menciones_honorificas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_orientaciones`
--
ALTER TABLE `sa_orientaciones`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_periodos`
--
ALTER TABLE `sa_periodos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_planes_estudio`
--
ALTER TABLE `sa_planes_estudio`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_solicitudes`
--
ALTER TABLE `sa_solicitudes`
  ADD PRIMARY KEY (`codigo`,`fecha_solicitud`),
  ADD KEY `solicitud_estudiante_FK_idx` (`dni_estudiante`),
  ADD KEY `solicitud_periodo_FK_idx` (`cod_periodo`),
  ADD KEY `solicitud_estados_solicitud_FK_idx` (`cod_estado`),
  ADD KEY `solicitud_tipo_solicitud_FK_idx` (`cod_tipo_solicitud`),
  ADD KEY `solicitud_solicitud_FK_idx` (`cod_solicitud_padre`,`fecha_solicitud_padre`);

--
-- Indices de la tabla `sa_tipos_estudiante`
--
ALTER TABLE `sa_tipos_estudiante`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_tipos_solicitud`
--
ALTER TABLE `sa_tipos_solicitud`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `sa_tipos_solicitud_tipos_alumnos`
--
ALTER TABLE `sa_tipos_solicitud_tipos_alumnos`
  ADD PRIMARY KEY (`cod_tipo_solicitud`,`cod_tipo_alumno`),
  ADD KEY `tipo_alumno_tipo_solicitud_t_a_FK_idx` (`cod_tipo_alumno`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`Id_Seguimiento`),
  ADD KEY `fk_seguimiento_folios_idx` (`NroFolio`),
  ADD KEY `fk_seguimiento_usuarioAsignado_idx` (`UsuarioAsignado`);

--
-- Indices de la tabla `seguimiento_historico`
--
ALTER TABLE `seguimiento_historico`
  ADD PRIMARY KEY (`Id_SeguimientoHistorico`),
  ADD KEY `fk_seguimiento_historico_seguimiento` (`Id_Seguimiento`),
  ADD KEY `fk_seguimiento_historico_tblEstdoSeguimiento_idx` (`Id_Estado_Seguimiento`);

--
-- Indices de la tabla `sub_actividad`
--
ALTER TABLE `sub_actividad`
  ADD PRIMARY KEY (`id_sub_Actividad`),
  ADD KEY `idActividad` (`idActividad`),
  ADD KEY `id_Encargado(Usuario)` (`id_Encargado`);

--
-- Indices de la tabla `sub_actividades_realizadas`
--
ALTER TABLE `sub_actividades_realizadas`
  ADD PRIMARY KEY (`id_subActividadRealizada`),
  ADD UNIQUE KEY `id_SubActividad_2` (`id_SubActividad`),
  ADD KEY `id_SubActividad` (`id_SubActividad`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`ID_Telefono`),
  ADD KEY `fk_Telefono_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
  ADD PRIMARY KEY (`id_Tipo_Area`);

--
-- Indices de la tabla `tipo_estudio`
--
ALTER TABLE `tipo_estudio`
  ADD PRIMARY KEY (`ID_Tipo_estudio`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id_titulo`);

--
-- Indices de la tabla `ubicacion_archivofisico`
--
ALTER TABLE `ubicacion_archivofisico`
  ADD PRIMARY KEY (`Id_UbicacionArchivoFisico`);

--
-- Indices de la tabla `ubicacion_notificaciones`
--
ALTER TABLE `ubicacion_notificaciones`
  ADD PRIMARY KEY (`Id_UbicacionNotificaciones`);

--
-- Indices de la tabla `unidad_academica`
--
ALTER TABLE `unidad_academica`
  ADD PRIMARY KEY (`Id_UnidadAcademica`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`Id_universidad`),
  ADD KEY `fk_universidad_pais_idx` (`Id_pais`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD KEY `fk_usuarios_roles_idx` (`Id_Rol`),
  ADD KEY `fk_usuario_empleado_` (`No_Empleado`);

--
-- Indices de la tabla `usuario_alertado`
--
ALTER TABLE `usuario_alertado`
  ADD PRIMARY KEY (`Id_UsuarioAlertado`),
  ADD KEY `fk_usuario_alertado_usuario_idx` (`Id_Usuario`),
  ADD KEY `fk_usuario_alertado_alerta_idx` (`Id_Alerta`);

--
-- Indices de la tabla `usuario_log`
--
ALTER TABLE `usuario_log`
  ADD PRIMARY KEY (`Id_log`);

--
-- Indices de la tabla `usuario_notificado`
--
ALTER TABLE `usuario_notificado`
  ADD PRIMARY KEY (`Id_UsuarioNotificado`),
  ADD KEY `fk_usuario_notificado_notificaciones_folios_idx` (`Id_Notificacion`),
  ADD KEY `fk_usuario_notificado_ubicacion_notificacionesFolios` (`IdUbicacionNotificacion`),
  ADD KEY `fk_usuario_notificado_usuario_idx` (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `actividades_terminadas`
--
ALTER TABLE `actividades_terminadas`
  MODIFY `id_Actividades_Terminadas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
  MODIFY `Id_Alerta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_Area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID_cargo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias_folios`
--
ALTER TABLE `categorias_folios`
  MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_acondicionamientos`
--
ALTER TABLE `ca_acondicionamientos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_areas`
--
ALTER TABLE `ca_areas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_aulas`
--
ALTER TABLE `ca_aulas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_cargas_academicas`
--
ALTER TABLE `ca_cargas_academicas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_contratos`
--
ALTER TABLE `ca_contratos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_cursos`
--
ALTER TABLE `ca_cursos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_dias`
--
ALTER TABLE `ca_dias`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_facultades`
--
ALTER TABLE `ca_facultades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_instancias_acondicionamientos`
--
ALTER TABLE `ca_instancias_acondicionamientos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_proyectos`
--
ALTER TABLE `ca_proyectos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_roles_proyecto`
--
ALTER TABLE `ca_roles_proyecto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ca_vinculaciones`
--
ALTER TABLE `ca_vinculaciones`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `ID_Clases` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `costo_porcentaje_actividad_por_trimestre`
--
ALTER TABLE `costo_porcentaje_actividad_por_trimestre`
  MODIFY `id_Costo_Porcentaje_Actividad_Por_Trimesrte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamento_laboral`
--
ALTER TABLE `departamento_laboral`
  MODIFY `Id_departamento_laboral` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `edificios`
--
ALTER TABLE `edificios`
  MODIFY `Edificio_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_seguimiento`
--
ALTER TABLE `estado_seguimiento`
  MODIFY `Id_Estado_Seguimiento` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estudios_academico`
--
ALTER TABLE `estudios_academico`
  MODIFY `ID_Estudios_academico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
  MODIFY `ID_Experiencia_academica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
  MODIFY `ID_Experiencia_laboral` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo_o_comite`
--
ALTER TABLE `grupo_o_comite`
  MODIFY `ID_Grupo_o_comite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `ID_Idioma` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `idioma_has_persona`
--
ALTER TABLE `idioma_has_persona`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id_Indicadores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `motivos`
--
ALTER TABLE `motivos`
  MODIFY `Motivo_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones_folios`
--
ALTER TABLE `notificaciones_folios`
  MODIFY `Id_Notificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `objetivos_institucionales`
--
ALTER TABLE `objetivos_institucionales`
  MODIFY `id_Objetivo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
  MODIFY `Id_Organizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `Id_pais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_Permisos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `poa`
--
ALTER TABLE `poa`
  MODIFY `id_Poa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prioridad_folio`
--
ALTER TABLE `prioridad_folio`
  MODIFY `Id_PrioridadFolio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `responsables_por_actividad`
--
ALTER TABLE `responsables_por_actividad`
  MODIFY `id_Responsable_por_Actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_ciudades`
--
ALTER TABLE `sa_ciudades`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_estados_solicitud`
--
ALTER TABLE `sa_estados_solicitud`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_menciones_honorificas`
--
ALTER TABLE `sa_menciones_honorificas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_orientaciones`
--
ALTER TABLE `sa_orientaciones`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_planes_estudio`
--
ALTER TABLE `sa_planes_estudio`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_solicitudes`
--
ALTER TABLE `sa_solicitudes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_tipos_estudiante`
--
ALTER TABLE `sa_tipos_estudiante`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sa_tipos_solicitud`
--
ALTER TABLE `sa_tipos_solicitud`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `Id_Seguimiento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seguimiento_historico`
--
ALTER TABLE `seguimiento_historico`
  MODIFY `Id_SeguimientoHistorico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sub_actividad`
--
ALTER TABLE `sub_actividad`
  MODIFY `id_sub_Actividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sub_actividades_realizadas`
--
ALTER TABLE `sub_actividades_realizadas`
  MODIFY `id_subActividadRealizada` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `ID_Telefono` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
  MODIFY `id_Tipo_Area` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_estudio`
--
ALTER TABLE `tipo_estudio`
  MODIFY `ID_Tipo_estudio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ubicacion_archivofisico`
--
ALTER TABLE `ubicacion_archivofisico`
  MODIFY `Id_UbicacionArchivoFisico` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ubicacion_notificaciones`
--
ALTER TABLE `ubicacion_notificaciones`
  MODIFY `Id_UbicacionNotificaciones` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `unidad_academica`
--
ALTER TABLE `unidad_academica`
  MODIFY `Id_UnidadAcademica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `Id_universidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_alertado`
--
ALTER TABLE `usuario_alertado`
  MODIFY `Id_UsuarioAlertado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_log`
--
ALTER TABLE `usuario_log`
  MODIFY `Id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_notificado`
--
ALTER TABLE `usuario_notificado`
  MODIFY `Id_UsuarioNotificado` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
