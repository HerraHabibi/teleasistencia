-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-06-2024 a las 16:12:58
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`id`, `nombre`, `apellidos`, `dni`, `fecha_nacimiento`, `telefono`, `num_seguridad_social`, `sexo`, `estado_civil`, `tipo_beneficiario`, `direccion`, `codigo_postal`, `localidad`, `provincia`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Juan Martínez', 'Pérez', '98765432B', '1975-10-20', '677888900', '0987654321', 'Hombre', 'Casado/a', 'Dependiente', 'Avenida Libertad 45', '46002', 'Valencia', 'Valencia', 'juan.martinez@example.com', '2024-06-13 13:24:23', '2024-06-18 08:53:36'),
(3, 'Pedro García', 'Fernández', '45678901C', '1990-03-25', '611223344', '5678901234', 'Masculino', 'Soltero/a', 'Titular', 'Calle Primavera 8', '41001', 'Sevilla', 'Sevilla', 'pedro.garcia@example.com', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, 'Ana Ruiz', 'Sánchez', '23456789D', '1988-12-12', '699887766', '2345678901', 'Femenino', 'Casado/a', 'Titular', 'Paseo del Parque 30', '29016', 'Málaga', 'Málaga', 'ana.ruiz@example.com', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, 'Carlos Jiménez', 'López', '34567890E', '1985-07-08', '644556677', '3456789012', 'Masculino', 'Soltero/a', 'Dependiente', 'Calle Alameda 5', '18001', 'Granada', 'Granada', 'carlos.jimenez@example.com', '2024-06-13 13:24:23', '2024-06-13 13:24:23');

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
  `hora_preferente_manana` time NOT NULL DEFAULT '08:00:00',
  `hora_preferente_tarde` time NOT NULL DEFAULT '15:00:00',
  `hora_preferente_noche` time NOT NULL DEFAULT '21:00:00',
  `ambulatorio` enum('Si','No') NOT NULL,
  `ambulancia` enum('Si','No') NOT NULL,
  `policia` enum('Si','No') NOT NULL,
  `bomberos` enum('Si','No') NOT NULL,
  `urgencias` enum('Si','No') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `beneficiario_interes`
--

INSERT INTO `beneficiario_interes` (`id`, `dni_beneficiario`, `enfermedades`, `alergias`, `medicacion_manana`, `medicacion_tarde`, `medicacion_noche`, `hora_preferente_manana`, `hora_preferente_tarde`, `hora_preferente_noche`, `ambulatorio`, `ambulancia`, `policia`, `bomberos`, `urgencias`, `created_at`, `updated_at`) VALUES
(3, '45678901C', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', '08:00:00', '15:00:00', '21:00:00', 'No', 'No', 'No', 'No', 'No', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, '23456789D', 'Alergia al polen', 'Penicilina', 'Ninguna', 'Ninguna', 'Ninguna', '08:30:00', '15:30:00', '21:30:00', 'Si', 'No', 'No', 'Si', 'No', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, '34567890E', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', 'Ninguna', '08:00:00', '15:00:00', '21:00:00', 'No', 'No', 'No', 'No', 'No', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(6, '98765432B', NULL, NULL, NULL, NULL, NULL, '10:56:00', '16:55:00', '22:55:00', 'Si', 'Si', 'Si', 'Si', 'Si', '2024-06-18 08:55:44', '2024-06-18 08:55:44');

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `dni_beneficiario`, `email`, `nombre`, `apellidos`, `telefono`, `tipo`, `direccion`, `codigopostal`, `localidad`, `provincia`, `created_at`, `updated_at`) VALUES
(2, '98765432B', 'contacto2@example.com', 'Marcos', 'Rodríguez', '655443311', 'Amigo/a', 'Avenida España 25', '46005', 'Valencia', 'Valencia', '2024-06-13 13:24:23', '2024-06-14 01:57:11'),
(3, '45678901C', 'contacto3@example.com', 'Sara', 'Pérez', '688998877', 'Familiar', 'Calle Luna 3', '41005', 'Sevilla', 'Sevilla', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(4, '23456789D', 'contacto4@example.com', 'Mario', 'Martín', '633224411', 'Amigo/a', 'Avenida Andalucía 15', '29010', 'Málaga', 'Málaga', '2024-06-13 13:24:23', '2024-06-13 13:24:23'),
(5, '34567890E', 'contacto5@example.com', 'Elena', 'Gómez', '611223344', 'Familiar', 'Calle Granada 20', '18002', 'Granada', 'Granada', '2024-06-13 13:24:23', '2024-06-13 13:24:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_teleoperador`
--

CREATE TABLE `evaluacion_teleoperador` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `email_teleoperador` varchar(100) DEFAULT NULL,
  `bienvenida` int(11) NOT NULL,
  `contenido` int(11) NOT NULL,
  `comunicacion` int(11) NOT NULL,
  `despedida` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `media` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_usuario`
--

CREATE TABLE `evaluacion_usuario` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `email_teleoperador` varchar(100) DEFAULT NULL,
  `creatividad` int(11) NOT NULL,
  `satisfaccion_usuario` int(11) NOT NULL,
  `satisfaccion_teleoperador` int(11) NOT NULL,
  `teatralizacion` int(11) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `media` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `email` varchar(100) NOT NULL,
  `email_users` varchar(100) NOT NULL,
  `quien_llama` varchar(255) NOT NULL,
  `beneficiario` enum('Si','No') NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL DEFAULT '00:00:00',
  `duracion` varchar(10) NOT NULL DEFAULT '0m0s',
  `observaciones` text DEFAULT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo_llamada` enum('Llamada entrante para conversar','Llamada entrante para obtener información (teléfonos, horarios, direcciones...)','Llamada entrante para pedir cita médica','Llamada entrante para asistencia médica','Llamada entrante por accidente doméstico','Otras llamadas entrantes') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_llamadas_entrantes`
--

INSERT INTO `registro_llamadas_entrantes` (`id`, `email`, `email_users`, `quien_llama`, `beneficiario`, `fecha`, `hora`, `duracion`, `observaciones`, `archivo`, `tipo_llamada`, `created_at`, `updated_at`) VALUES
(7, 'admin@gmail.com', 'admin@gmail.com', 'Yo', 'Si', '0011-11-11', '11:11:00', '12m0s', '123', '1718474974.mp3', 'Llamada entrante para conversar', '2024-06-15 18:09:34', '2024-06-15 18:09:34'),
(9, 'asd@gmail.com', 'admin@gmail.com', 'Yo', 'Si', '1111-11-11', '11:11:00', '12m0s', '123', '1718475239.mp3', 'Llamada entrante para conversar', '2024-06-15 18:13:59', '2024-06-15 18:13:59');

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
  `fecha` date NOT NULL,
  `hora` time NOT NULL DEFAULT '00:00:00',
  `duracion` varchar(10) NOT NULL DEFAULT '0m0s',
  `observaciones` text DEFAULT NULL,
  `dni_beneficiario` varchar(9) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `tipo` enum('Llamada saliente rutinaria por la mañana','Llamada saliente rutinaria por la tarde','Llamada saliente rutinaria por la noche','Llamada saliente para recordatorio de cita médica','Llamada saliente para felicitación de cumpleaños') NOT NULL,
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
('kh3XpBaxWHim0zmhvYsTgbzEKzvpjDMpXL3jA2aC', NULL, '93.158.90.40', 'Mozilla/5.0 (X11; CrOS x86_64 14541.0.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSzdmbUJYYll4cm1TVm14R0toMjY0TFlteUV3dEc2czNzUndrZHphYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718884431),
('Qr76dAj76EU3eQrmsfr9AfgmK0MAUEdRdNDEELK7', NULL, '43.130.37.62', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiakJ4eFhBR1lBenpLUTBqT2VqdzVZRXZtb29JcnhYNnQyOVJNVHYzYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vd3d3LnRlbGVhc2lzdGVuY2lhbGVvbmFyZG9kYXZpbmNpLnNpdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1718896269),
('t5UgVW28jbQDh68tGd0iKxzoIzdos07jD35Am44w', NULL, '34.219.8.129', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.181 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2h5M1RNR2NYUzFjTFcxT1kwVUxBMUFQbHZhSnBQWmtWODhsRVdDeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vdGVsZWFzaXN0ZW5jaWFsZW9uYXJkb2RhdmluY2kuc2l0ZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1718881079);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `perfil` tinyint(1) NOT NULL DEFAULT 0,
  `verificado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_nacimiento` date NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `perfil`, `verificado`, `fecha_nacimiento`, `last_login`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$VBHPJcpWzCA5.SaQS8VY0uQ9esqDiyM8FLxKVAI3UXRDda1f1ptA.', NULL, '2024-06-15 12:38:33', '2024-06-15 18:15:58', 1, 1, '2024-06-08', NULL),
(2, 'Jane Smith', 'jane.smith@example.com', NULL, 'hashed_password', NULL, '2024-06-13 13:24:23', '2024-06-13 13:24:23', 0, 1, '1985-05-20', NULL),
(3, 'Michael Brown', 'michael.brown@example.com', NULL, 'hashed_password', NULL, '2024-06-13 13:24:23', '2024-06-13 13:41:41', 1, 1, '1982-11-10', NULL),
(4, 'Emily Davis', 'emily.davis@example.com', NULL, 'hashed_password', NULL, '2024-06-13 13:24:23', '2024-06-13 13:24:23', 0, 1, '1995-09-08', NULL),
(5, 'Daniel Johnson', 'daniel.johnson@example.com', NULL, 'hashed_password', NULL, '2024-06-13 13:24:23', '2024-06-13 13:41:42', 0, 1, '1988-03-25', NULL),
(9, 'Izan', 'izan@gmail.com', NULL, '$2y$12$dv/hREi2qwATpAC.3Hsq6OXdEIWPMcythv5k1hvfaDUtYcuddLr..', NULL, '2024-06-18 08:45:53', '2024-06-18 08:49:32', 0, 1, '0111-11-11', NULL),
(10, 'Pedro', 'pedro@gmail.com', NULL, '$2y$12$j3ypV2W6Nz.6NVwk/J8LdO076O6jCLsOnA16OarzayC4XNxLJtQHu', NULL, '2024-06-18 08:47:43', '2024-06-18 08:49:31', 0, 1, '2024-06-17', NULL),
(11, 'ALFONSO', 'arebolleda@educa.madrid.org', NULL, '$2y$12$b/qwW9mQi4LzWBd/ZC8MCOEwmSWc9YnsL6r/QIVACALgLyY.FOiUC', NULL, '2024-06-18 08:48:27', '2024-06-18 08:49:29', 0, 1, '2024-06-18', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `num_seguridad_social` (`num_seguridad_social`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `beneficiario_interes`
--
ALTER TABLE `beneficiario_interes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_beneficiario` (`dni_beneficiario`) USING BTREE;

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_beneficiario` (`dni_beneficiario`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD KEY `dni_beneficiario` (`dni_beneficiario`);

--
-- Indices de la tabla `evaluacion_teleoperador`
--
ALTER TABLE `evaluacion_teleoperador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_usuario` (`email_usuario`),
  ADD KEY `email_teleoperador` (`email_teleoperador`);

--
-- Indices de la tabla `evaluacion_usuario`
--
ALTER TABLE `evaluacion_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_usuario` (`email_usuario`),
  ADD KEY `email_teleoperador` (`email_teleoperador`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uuid` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `registro_llamadas_entrantes`
--
ALTER TABLE `registro_llamadas_entrantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_users` (`email_users`) USING BTREE,
  ADD KEY `email` (`email`) USING BTREE;

--
-- Indices de la tabla `registro_llamadas_salientes`
--
ALTER TABLE `registro_llamadas_salientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni_beneficiario` (`dni_beneficiario`),
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `email_users` (`email_users`) USING BTREE;

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `beneficiario_interes`
--
ALTER TABLE `beneficiario_interes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `evaluacion_teleoperador`
--
ALTER TABLE `evaluacion_teleoperador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_usuario`
--
ALTER TABLE `evaluacion_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_llamadas_entrantes`
--
ALTER TABLE `registro_llamadas_entrantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `registro_llamadas_salientes`
--
ALTER TABLE `registro_llamadas_salientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `beneficiario_interes`
--
ALTER TABLE `beneficiario_interes`
  ADD CONSTRAINT `beneficiario_interes_ibfk_1` FOREIGN KEY (`dni_beneficiario`) REFERENCES `beneficiarios` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `citas_medicas`
--
ALTER TABLE `citas_medicas`
  ADD CONSTRAINT `citas_medicas_ibfk_1` FOREIGN KEY (`dni_beneficiario`) REFERENCES `beneficiarios` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`dni_beneficiario`) REFERENCES `beneficiarios` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evaluacion_teleoperador`
--
ALTER TABLE `evaluacion_teleoperador`
  ADD CONSTRAINT `evaluacion_teleoperador_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluacion_teleoperador_ibfk_2` FOREIGN KEY (`email_teleoperador`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Filtros para la tabla `evaluacion_usuario`
--
ALTER TABLE `evaluacion_usuario`
  ADD CONSTRAINT `evaluacion_usuario_ibfk_1` FOREIGN KEY (`email_usuario`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluacion_usuario_ibfk_2` FOREIGN KEY (`email_teleoperador`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_llamadas_entrantes`
--
ALTER TABLE `registro_llamadas_entrantes`
  ADD CONSTRAINT `registro_llamadas_entrantes_ibfk_1` FOREIGN KEY (`email_users`) REFERENCES `users` (`email`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registro_llamadas_salientes`
--
ALTER TABLE `registro_llamadas_salientes`
  ADD CONSTRAINT `registro_llamadas_salientes_ibfk_1` FOREIGN KEY (`email_users`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_llamadas_salientes_ibfk_2` FOREIGN KEY (`dni_beneficiario`) REFERENCES `beneficiarios` (`dni`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;



/* JAVIER LARA Y MARKUS PLAMEN */
ALTER TABLE beneficiarios
  ADD COLUMN mayor65 VARCHAR(10) NOT NULL DEFAULT 'no',
  ADD COLUMN discapacidad VARCHAR(10) NOT NULL DEFAULT 'no',
  ADD COLUMN situacion_sanitaria VARCHAR(100) NOT NULL DEFAULT 'NULL',
  ADD COLUMN observaciones VARCHAR(300) NOT NULL DEFAULT 'NULL',
  ADD COLUMN situacion_familiar VARCHAR(100) NOT NULL DEFAULT 'NULL';

ALTER TABLE registro_llamadas_entrantes
  DROP COLUMN beneficiario;

ALTER TABLE beneficiario_interes
  MODIFY COLUMN hora_preferente_manana TIME NULL DEFAULT NULL,
  MODIFY COLUMN hora_preferente_tarde TIME NULL DEFAULT NULL,
  MODIFY COLUMN hora_preferente_noche TIME NULL DEFAULT NULL,
  MODIFY COLUMN ambulatorio ENUM('Si', 'No') NULL DEFAULT NULL,
  MODIFY COLUMN ambulancia ENUM('Si', 'No') NULL DEFAULT NULL,
  MODIFY COLUMN policia ENUM('Si', 'No') NULL DEFAULT NULL,
  MODIFY COLUMN bomberos ENUM('Si', 'No') NULL DEFAULT NULL,
  MODIFY COLUMN urgencias ENUM('Si', 'No') NULL DEFAULT NULL
  ADD COLUMN observaciones VARCHAR(300) NOT NULL DEFAULT 'NULL';

ALTER TABLE registro_llamadas_entrantes
  DROP COLUMN email,
  DROP COLUMN quien_llama,
  DROP COLUMN fecha,
  DROP COLUMN hora,
  DROP COLUMN duracion,
  DROP COLUMN tipo_llamada,
  ADD COLUMN tipo_llamada ENUM(
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
  ADD COLUMN dni_beneficiario VARCHAR(9) NULL,
  ADD CONSTRAINT fk_dni_beneficiario FOREIGN KEY (dni_beneficiario) REFERENCES beneficiarios(dni),
  ADD COLUMN hora_inicio DATETIME NULL,
  ADD COLUMN hora_fin DATETIME NULL;
  
  ALTER TABLE registro_llamadas_salientes 
	MODIFY tipo ENUM(
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
	);
  
  ALTER TABLE beneficiarios
	ADD COLUMN situacion_de_la_vivienda VARCHAR(100),
	ADD COLUMN situacion_economica VARCHAR(100),
	ADD COLUMN otros_recursos VARCHAR(100);
	ADD COLUMN instalacion_de_terminal VARCHAR(100),
	ADD COLUMN otros_complementos_TAS VARCHAR(100),
	ADD COLUMN dispone_de_teleasistencia_movil VARCHAR(100),
	ADD COLUMN sistema_de_telelocalizacion VARCHAR(100),
	ADD COLUMN custodia_de_llaves VARCHAR(100);
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
