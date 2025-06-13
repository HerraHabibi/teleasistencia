-- --------------------------------------------------------

--
-- SOLO EN CASO DE QUE NO SE TENGA QUE CREAR A MANO EN EL HOSTING
-- Creación de la base de datos
--

CREATE DATABASE IF NOT EXISTS u815611716_teleasistencia;
USE u815611716_teleasistencia;

-- ------------

--
-- EN CASO DE HABER TENIDO QUE CREARLA A MANO PREVIAMENTE
-- Seleccionar la base de datos creada
--

USE u815611716_teleasistencia;

-- --------------------------------------------------------

--
-- Eliminar todas las tablas de la base de datos
--

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `beneficiarios`, `beneficiario_interes`, `cache`, `cache_locks`, `citas_medicas`, 
                     `contactos`, `evaluacion_teleoperador`, `evaluacion_usuario`, `failed_jobs`, 
                     `jobs`, `job_batches`, `password_reset_tokens`, `registro_llamadas_entrantes`, 
                     `registro_llamadas_salientes`, `sessions`, `users`;

SET FOREIGN_KEY_CHECKS = 1;

--
-- Configuración de la base de datos
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla beneficiarios
--

CREATE TABLE beneficiarios (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  apellidos VARCHAR(255) NOT NULL,
  dni VARCHAR(9) NOT NULL,
  fecha_nacimiento DATE NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  num_seguridad_social VARCHAR(20) NOT NULL,
  sexo VARCHAR(10) NOT NULL,
  estado_civil VARCHAR(20) NOT NULL,
  tipo_beneficiario VARCHAR(100) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  codigo_postal VARCHAR(10) NOT NULL,
  localidad VARCHAR(100) NOT NULL,
  provincia VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  situacion_sanitaria VARCHAR(100) NOT NULL,
  observaciones VARCHAR(300) NOT NULL,
  situacion_familiar VARCHAR(100) NOT NULL,
  situacion_de_la_vivienda VARCHAR(100) DEFAULT NULL,
  situacion_economica VARCHAR(100) DEFAULT NULL,
  otros_recursos VARCHAR(100) DEFAULT NULL,
  instalacion_de_terminal VARCHAR(100) DEFAULT NULL,
  otros_complementos_TAS VARCHAR(100) DEFAULT NULL,
  dispone_de_teleasistencia_movil VARCHAR(100) DEFAULT NULL,
  sistema_de_telelocalizacion VARCHAR(100) DEFAULT NULL,
  custodia_de_llaves VARCHAR(100) DEFAULT NULL,
  autonomia_personal ENUM(
    'ABVD_sin_ayuda',
    'ABVD_con_ayuda',
    'Se_desplaza_sin_ayuda',
    'Se_desplaza_con_ayuda',
    'Relacion_con_el_entorno',
    'Soledad'
  ) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  UNIQUE KEY dni (dni),
  UNIQUE KEY telefono (telefono),
  UNIQUE KEY num_seguridad_social (num_seguridad_social),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla beneficiario_interes
--

CREATE TABLE beneficiario_interes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  dni_beneficiario VARCHAR(9) NOT NULL,
  enfermedades VARCHAR(255) DEFAULT NULL,
  alergias VARCHAR(255) DEFAULT NULL,
  medicacion_manana VARCHAR(255) DEFAULT NULL,
  medicacion_tarde VARCHAR(255) DEFAULT NULL,
  medicacion_noche VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  KEY dni_beneficiario (dni_beneficiario),
  CONSTRAINT beneficiario_interes_ibfk_1 FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios (dni) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla citas_medicas
--

CREATE TABLE citas_medicas (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  dni_beneficiario VARCHAR(255) NOT NULL,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  observaciones TEXT DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  KEY dni_beneficiario (dni_beneficiario),
  CONSTRAINT citas_medicas_ibfk_1 FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios (dni) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla contactos
--

CREATE TABLE contactos (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  dni_beneficiario VARCHAR(9) NOT NULL,
  email VARCHAR(100) NOT NULL,
  nombre VARCHAR(255) NOT NULL,
  apellidos VARCHAR(255) NOT NULL,
  telefono VARCHAR(20) NOT NULL,
  tipo VARCHAR(20) NOT NULL,
  direccion VARCHAR(255) NOT NULL,
  codigopostal VARCHAR(10) NOT NULL,
  localidad VARCHAR(100) NOT NULL,
  provincia VARCHAR(100) NOT NULL,
  dispone_llave_del_domicilio VARCHAR(10) NOT NULL DEFAULT 'No',
  observaciones VARCHAR(300) NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  UNIQUE KEY email (email),
  UNIQUE KEY telefono (telefono),
  KEY dni_beneficiario (dni_beneficiario),
  CONSTRAINT contactos_ibfk_1 FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios (dni) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla users
--

CREATE TABLE users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  email_verified_at TIMESTAMP NULL,
  `password` VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) NULL,
  last_login TIMESTAMP NULL,
  fecha_nacimiento DATE NOT NULL,
  verificado TINYINT(1) NOT NULL DEFAULT 0,
  perfil TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla evaluacion_teleoperador
--

CREATE TABLE evaluacion_teleoperador (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  email_usuario VARCHAR(100) NOT NULL,
  nombre_usuario VARCHAR(255) DEFAULT NULL,
  email_teleoperador VARCHAR(100) NOT NULL,
  nombre_teleoperador VARCHAR(255) DEFAULT NULL,
  bienvenida INT NOT NULL,
  contenido INT NOT NULL,
  comunicacion INT NOT NULL,
  despedida INT NOT NULL,
  observaciones TEXT DEFAULT NULL,
  media INT NOT NULL,
  hora_inicio DATETIME DEFAULT NULL,
  hora_fin DATETIME DEFAULT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  KEY email_usuario (email_usuario),
  KEY email_teleoperador (email_teleoperador),
  CONSTRAINT evaluacion_teleoperador_ibfk_1 FOREIGN KEY (email_usuario) REFERENCES users (email) ON DELETE CASCADE,
  CONSTRAINT evaluacion_teleoperador_ibfk_2 FOREIGN KEY (email_teleoperador) REFERENCES users (email) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla registro_llamadas_entrantes
--

CREATE TABLE registro_llamadas_entrantes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  email_users VARCHAR(100) NOT NULL,
  observaciones TEXT NULL,
  archivo VARCHAR(255) NULL,
  dni_beneficiario VARCHAR(9) NULL,
  hora_inicio DATETIME NULL,
  hora_fin DATETIME NULL,
  tipo_llamada ENUM(
    'Emergencia: social',
    'Emergencia: sanitaria',
    'Emergencia: crisis de soledad',
    'Emergencia: alarma sin respuesta',
    'No emergencia: comunicación ausencia/regreso',
    'No emergencia: modificación de datos',
    'No emergencia: pulsación por error',
    'No emergencia: petición de información',
    'No emergencia: sugerencia',
    'No emergencia: reclamación o queja',
    'No emergencia: saludo/conversación',
    'Técnica: por pulsación: primera conexión',
    'Técnica: por pulsación: revisión',
    'Técnica: por pulsación: fallo o avería',
    'Técnica: por pulsación: sustitución de terminal/UCR',
    'Técnica: por pulsación: retirada de terminal',
    'Técnica: automática: fallo de protocolo',
    'Técnica: automática: fallo de conexión con el servidor',
    'Técnica: automática: saturación del tráfico de comunicaciones',
    'Técnica: automática: fallo en la red eléctrica'
  ) NULL,
  nivel_activacion ENUM('1', '2', '3') NOT NULL,
  created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP(),
  updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP(),
  PRIMARY KEY (id),
  KEY email_users (email_users) USING BTREE,
  KEY dni_beneficiario (dni_beneficiario) USING BTREE,
  CONSTRAINT registro_llamadas_entrantes_ibfk_1 FOREIGN KEY (email_users) REFERENCES users (email) ON DELETE CASCADE,
  CONSTRAINT fk_dni_beneficiario FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios (dni)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla registro_llamadas_salientes
--

CREATE TABLE registro_llamadas_salientes (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) NOT NULL,
  email_users VARCHAR(100) NOT NULL,
  responde ENUM('Si','No') NOT NULL,
  intentos INT NOT NULL,
  quien_coge VARCHAR(255) NOT NULL,
  beneficiario ENUM('Si','No') NOT NULL,
  observaciones TEXT NULL,
  dni_beneficiario VARCHAR(9) NOT NULL,
  tipo ENUM(
    'Llamada saliente rutinaria por la mañana',
    'Llamada saliente rutinaria por la tarde',
    'Llamada saliente rutinaria por la noche',
    'Llamada saliente para recordatorio de cita médica',
    'Llamada saliente para felicitación de cumpleaños',
    'Llamada saliente atencion psicosocial',
    'Llamada saliente detectar detectar situaciones riesgo',
    'Llamada saliente apoyo al cuidador',
    'Llamada saliente Actualización informacion',
    'Llamada saliente medicacion',
    'Llamada saliente especiales',
    'Llamada saliente alerta',
    'Llamada saliente seguimiento periodico semanal',
    'Llamada saliente seguimiento periodico quincenal',
    'Llamada saliente seguimiento periodico mensual',
    'Llamada seguimiento tras emergencia hospital',
    'Llamada saliente seguimiento tras emergencia accidente',
    'Llamada saliente seguimiento tras emergencia otro',
    'Llamada saliente seguimiento proceso de duelo',
    'Llamada saliente seguimiento tras alta hospitalaria',
    'Llamada saliente ausencia domiciliaria y regreso',
    'Llamada saliente suspension temporal del servicio'
  ) NULL,
  archivo VARCHAR(255) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  hora_inicio DATETIME NULL,
  hora_fin DATETIME NULL,
  PRIMARY KEY (id),
  KEY email_users (email_users) USING BTREE,
  KEY dni_beneficiario (dni_beneficiario),
  CONSTRAINT registro_llamadas_salientes_ibfk_1 FOREIGN KEY (email_users) REFERENCES users (email) ON DELETE CASCADE,
  CONSTRAINT registro_llamadas_salientes_ibfk_2 FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios (dni) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Estructura de tabla para la tabla sessions
--

CREATE TABLE sessions (
  id VARCHAR(255) NOT NULL,
  user_id BIGINT UNSIGNED NULL,
  ip_address VARCHAR(45) NULL,
  user_agent TEXT NULL,
  payload LONGTEXT NOT NULL,
  last_activity INT NOT NULL,
  PRIMARY KEY (id),
  KEY user_id (user_id),
  KEY last_activity (last_activity),
  CONSTRAINT sessions_ibfk_1 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Commit de lo realizado
--

COMMIT;