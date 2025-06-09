-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-06-2024 a las 16:12:58
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34
-- Modificaciones integradas por: JAVIER LARA Y MARKUS PLAMEN

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u815611716_teleasistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `num_seguridad_social` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `tipo_beneficiario` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigo_postal` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `situacion_sanitaria` varchar(100) NOT NULL DEFAULT 'NULL',
  `observaciones` varchar(300) NOT NULL DEFAULT 'NULL',
  `situacion_familiar` varchar(100) NOT NULL DEFAULT 'NULL',
  `situacion_de_la_vivienda` varchar(100),
  `situacion_economica` varchar(100),
  `otros_recursos` varchar(100),
  `instalacion_de_terminal` varchar(100),
  `otros_complementos_TAS` varchar(100),
  `dispone_de_teleasistencia_movil` varchar(100),
  `sistema_de_telelocalizacion` varchar(100),
  `custodia_de_llaves` varchar(100),
  `autonomia_personal` ENUM(
    'ABVD_sin_ayuda',
    'ABVD_con_ayuda',
    'Se_desplaza_sin_ayuda',
    'Se_desplaza_con_ayuda',
    'Relacion_con_el_entorno',
    'Soledad'
  ) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `nombre`, `apellidos`, `dni`, `fecha_nacimiento`, `telefono`, `num_seguridad_social`, `sexo`, `estado_civil`, `tipo_beneficiario`, `direccion`, `codigo_postal`, `localidad`, `provincia`, `email`, `situacion_sanitaria`, `observaciones`, `situacion_familiar`, `situacion_de_la_vivienda`, `situacion_economica`, `otros_recursos`, `instalacion_de_terminal`, `otros_complementos_TAS`, `dispone_de_teleasistencia_movil`, `sistema_de_telelocalizacion`, `custodia_de_llaves`, `autonomia_personal`, `created_at`, `updated_at`) VALUES
(2, 'Juan Martínez', 'Pérez', '98765432B', '1975-10-20', '677888900', '0987654321', 'Hombre', 'Casado/a', 'Dependiente', 'Avenida Libertad 45', '46002', 'Valencia', 'Valencia', 'juan.martinez@example.com', 'NULL', 'NULL', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABVD_sin_ayuda', '2024-06-13 13:24:23', '2024-06-18 08:53:36'),
(3, 'Pedro García', 'Fernández', '45678901C', '1990-03-25', '611223344', '5678901234', 'Masculino', 'Soltero/a', 'Titular', 'Calle Primavera 8', '41001', 'Sevilla', 'Sevilla', 'pedro.garcia@example.com', 'NULL', 'NULL', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABVD_sin_ayuda', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, 'Ana Ruiz', 'Sánchez', '23456789D', '1988-12-12', '699887766', '2345678901', 'Femenino', 'Casado/a', 'Titular', 'Paseo del Parque 30', '29016', 'Málaga', 'Málaga', 'ana.ruiz@example.com', 'NULL', 'NULL', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABVD_sin_ayuda', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, 'Carlos Jiménez', 'López', '34567890E', '1985-07-08', '644556677', '3456789012', 'Masculino', 'Soltero/a', 'Dependiente', 'Calle Alameda 5', '18001', 'Granada', 'Granada', 'carlos.jimenez@example.com', 'NULL', 'NULL', 'NULL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABVD_sin_ayuda', '2024-06-13 13:24:23', '2024-06-13 13:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario_interes`
--

CREATE TABLE `beneficiario_interes` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni_beneficiario` varchar(9) NOT NULL,
  `enfermedades` varchar(255) DEFAULT NULL,
  `alergias` varchar(255) DEFAULT NULL,
  `medicacion_manana` varchar(255) DEFAULT NULL,
  `medicacion_tarde` varchar(255) DEFAULT NULL,
  `medicacion_noche` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiario_interes`
--

INSERT INTO `beneficiario_interes` (`id`, `dni_beneficiario`, `enfermedades`, `alergias`, `medicacion_manana`, `medicacion_tarde`, `medicacion_noche`, `created_at`, `updated_at`) VALUES
(3, '45678901C', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, '23456789D', 'Alergia al polen', 'Penicilina', 'Ninguna', 'Ninguna', 'Ninguna', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, '34567890E', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(6, '98765432B', NULL, NULL, NULL, NULL, NULL, '2024-06-18 08:55:44', '2024-06-18 08:55:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas_medicas`
--

CREATE TABLE `citas_medicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni_beneficiario` varchar(9) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `observaciones` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas_medicas`
--

INSERT INTO `citas_medicas` (`id`, `dni_beneficiario`, `fecha`, `hora`, `observaciones`, `created_at`, `updated_at`) VALUES
(2, '98765432B', '2024-06-16', '11:00:00', 'Control de diabetes.', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(3, '45678901C', '2024-06-17', '10:15:00', 'Chequeo médico.', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, '23456789D', '2024-06-18', '08:45:00', 'Seguimiento de alergias.', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, '34567890E', '2024-06-19', '12:30:00', 'Revisión de estado general.', '2024-06-13 13:24:23', '2024-06-13 13:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni_beneficiario` varchar(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `codigopostal` varchar(10) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `dispone_llave_del_domicilio` varchar(10) NOT NULL DEFAULT 'No',
  `observaciones` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `dni_beneficiario`, `email`, `nombre`, `apellidos`, `telefono`, `tipo`, `direccion`, `codigopostal`, `localidad`, `provincia`, `dispone_llave_del_domicilio`, `observaciones`, `created_at`, `updated_at`) VALUES
(2, '98765432B', 'contacto2@example.com', 'Marcos', 'Rodríguez', '655443311', 'Amigo/a', 'Avenida España 25', '46005', 'Valencia', 'Valencia', 'No', '', '2024-06-13 13:24:23', '2024-06-14 01:57:11'),
(3, '45678901C', 'contacto3@example.com', 'Sara', 'Pérez', '688998877', 'Familiar', 'Calle Luna 3', '41005', 'Sevilla', 'Sevilla', 'No', '', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, '23456789D', 'contacto4@example.com', 'Mario', 'Martín', '633224411', 'Amigo/a', 'Avenida Andalucía 15', '29010', 'Málaga', 'Málaga', 'No', '', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, '34567890E', 'contacto5@example.com', 'Elena', 'Gómez', '611223344', 'Familiar', 'Calle Granada 20', '18002', 'Granada', 'Granada', 'No', '', '2024-06-13 13:24:23', '2024-06-13 13:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_teleoperador`
--

CREATE TABLE `evaluacion_teleoperador` (
  `id` int(11) NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `nombre_usuario` varchar(255),
  `email_teleoperador` varchar(100) DEFAULT NULL,
  `nombre_teleoperador` varchar(255),
  `bienvenida` int(11) NOT NULL,
  `contenido` int(11) NOT NULL,
  `comunicacion` int(11) NOT NULL,
  `despedida` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `media` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_usuario`
--

CREATE TABLE `evaluacion_usuario` (
  `id` int(11) NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `email_teleoperador` varchar(100) DEFAULT NULL,
  `creatividad` int(11) NOT NULL,
  `satisfaccion_usuario` int(11) NOT NULL,
  `satisfaccion_teleoperador` int(11) NOT NULL,
  `teatralizacion` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `media` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_llamadas_entrantes`
--

CREATE TABLE `registro_llamadas_entrantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo_llamada` ENUM(
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
  `dni_beneficiario` varchar(9) NULL,
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL,
  `nivel_activacion` ENUM('1', '2', '3') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_llamadas_entrantes`
--

INSERT INTO `registro_llamadas_entrantes` (`id`, `email_users`, `observaciones`, `archivo`, `tipo_llamada`, `dni_beneficiario`, `hora_inicio`, `hora_fin`, `nivel_activacion`, `created_at`, `updated_at`) VALUES
(7, 'admin@gmail.com', '123', '1718474974.mp3', 'No emergencia: saludo/conversación', NULL, NULL, NULL, '1', '2024-06-15 18:09:34', '2024-06-15 18:09:34'),
(9, 'admin@gmail.com', '123', '1718475239.mp3', 'No emergencia: saludo/conversación', NULL, NULL, NULL, '1', '2024-06-15 18:13:59', '2024-06-15 18:13:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_llamadas_salientes`
--

CREATE TABLE `registro_llamadas_salientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `responde` enum('Si','No') NOT NULL,
  `intentos` int(11) NOT NULL,
  `quien_coge` varchar(255) NOT NULL,
  `beneficiario` enum('Si','No') NOT NULL,
  `observaciones` text DEFAULT NULL,
  `dni_beneficiario` varchar(9) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo` ENUM(
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
  ) NOT NULL,
  `hora_inicio` DATETIME NULL,
  `hora_fin` DATETIME NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BaWY27Kb36bqz6Fk5nowSR6ETNV6RCDYCRNlqG5T', NULL, '43.130.37.62', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTURmMVM4cVpKOEo1NjNzMXJNNkpMajlMVFA5Qm1KU2JhdUlSaUJpeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vd3d3LnRlbGVhc2lzdGVuY2lhbGVvbmFyZG9kYXZpbmNpLnNpdGUvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718896270),
('gaXgeAbga2ZHPj4BFgNBGf7gWMlZQyztsGTHtSia', NULL, '54.202.255.123', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/68.0.3440.106 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN204Q2hxWTdFaDlwVHk3YTZ1U1pENFRLMGM2SmQ4Tlo1WWwyNk9pcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718881086),
('gcSzhdlJo9i8UgvorG6kGLfZMPXTeBwckXKrdPZZ', NULL, '34.219.8.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT01mZWRzaTMxajNNV1dGbk1MeG1BZmtWcUl6UXhIR3NrNXBSZ01QTCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718881078),
('J0I1Lq5abxVeboM8JkA38uL3sqdmVgZOFJU05qnK', NULL, '93.158.90.12', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHQzbHBwNXAweVZtWVRoNGJPbVc2UFFaYmVBblVvMk1rSzJjZUh1NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718884430),
('kh3XpBaxWHim0zmhvYsTgbzEKzvpjDMpXL3jA2aC', NULL, '93.158.90.40', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzdmbUJYYll4cm1TVm14R0toMjY0TFlteUV3dEc2czNzUndrZHphYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZS9sb2dpbiI7f
