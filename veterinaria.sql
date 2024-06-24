-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2023 a las 16:46:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(191) NOT NULL,
  `horario` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `estado`, `horario`, `created_at`, `updated_at`) VALUES
(10, '2023-07-20', 'pendiente', NULL, '2023-07-11 20:31:57', '2023-07-11 23:00:33'),
(11, '2023-07-14', 'pendiente', NULL, '2023-07-11 20:53:31', '2023-07-11 23:04:29'),
(12, '2023-07-14', 'aprobado', NULL, '2023-07-11 21:30:07', '2023-07-11 23:04:14'),
(14, '2023-07-12', 'pendiente', NULL, '2023-07-12 00:51:02', '2023-07-12 00:51:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_medico`
--

CREATE TABLE `cita_medico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cita_id` bigint(20) UNSIGNED NOT NULL,
  `medico_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cita_medico`
--

INSERT INTO `cita_medico` (`id`, `cita_id`, `medico_id`, `created_at`, `updated_at`) VALUES
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 1, NULL, NULL),
(14, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_paciente`
--

CREATE TABLE `cita_paciente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cita_id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cita_paciente`
--

INSERT INTO `cita_paciente` (`id`, `cita_id`, `paciente_id`, `created_at`, `updated_at`) VALUES
(14, 10, 2, NULL, NULL),
(15, 11, 1, NULL, NULL),
(16, 12, 1, NULL, NULL),
(18, 14, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `descripcion` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'dasdsad', 'dsa', '2023-07-10 22:51:16', '2023-07-10 22:51:16'),
(2, 'sdsaadsdaad', '22', '2023-07-12 00:36:21', '2023-07-12 00:36:21'),
(3, 'cirujia', 'asas', '2023-07-12 00:42:05', '2023-07-12 00:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_medico`
--

CREATE TABLE `especialidades_medico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `medico_id` bigint(20) UNSIGNED NOT NULL,
  `especialidades_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especialidades_medico`
--

INSERT INTO `especialidades_medico` (`id`, `medico_id`, `especialidades_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-07-10 22:51:27', '2023-07-10 22:51:27'),
(2, 1, 2, '2023-07-12 00:36:25', '2023-07-12 00:36:25'),
(4, 2, 3, '2023-07-12 00:42:13', '2023-07-12 00:42:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'dsa', '2023-07-10 22:50:48', '2023-07-10 22:50:48'),
(2, 'dsa22', '2023-07-10 22:50:52', '2023-07-10 22:50:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie_paciente`
--

CREATE TABLE `especie_paciente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `especie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `especie_paciente`
--

INSERT INTO `especie_paciente` (`id`, `paciente_id`, `especie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historials`
--

CREATE TABLE `historials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaR` date DEFAULT NULL,
  `temperatura` double(8,2) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `diagnostico` varchar(191) NOT NULL,
  `diet` varchar(191) NOT NULL,
  `analisis` varchar(191) NOT NULL,
  `tratamiento` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historials`
--

INSERT INTO `historials` (`id`, `fechaR`, `temperatura`, `peso`, `diagnostico`, `diet`, `analisis`, `tratamiento`, `created_at`, `updated_at`) VALUES
(2, '2023-07-13', 23.00, 42.00, 'sda', 'dsa', 'das', 'sda', '2023-07-11 23:46:21', '2023-07-11 23:46:21'),
(3, '2023-07-12', 2.00, 3.00, 'dsa', 'ds', 'sda', 'dsa', '2023-07-12 00:08:58', '2023-07-12 00:08:58'),
(4, '2023-07-20', 22.00, 3.00, 'weq', 'dsa', 'dsa', 'wqe', '2023-07-12 00:09:21', '2023-07-12 00:09:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

CREATE TABLE `historial_medico` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `historial_id` bigint(20) UNSIGNED NOT NULL,
  `medico_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_medico`
--

INSERT INTO `historial_medico` (`id`, `historial_id`, `medico_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_paciente`
--

CREATE TABLE `historial_paciente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `historial_id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_paciente`
--

INSERT INTO `historial_paciente` (`id`, `historial_id`, `paciente_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cita_id` bigint(20) UNSIGNED NOT NULL,
  `horario` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `cita_id`, `horario`, `created_at`, `updated_at`) VALUES
(38, 10, '16:00 - 17:00', '2023-07-11 23:00:56', '2023-07-11 23:00:56'),
(39, 12, '18:00 - 19:00', '2023-07-11 23:04:14', '2023-07-11 23:04:14'),
(40, 11, '17:00 - 18:00', '2023-07-11 23:04:29', '2023-07-11 23:04:29'),
(41, 14, '08:00 - 09:00', '2023-07-12 00:51:02', '2023-07-12 00:51:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `apellido` varchar(191) NOT NULL,
  `CI` int(11) NOT NULL,
  `telefono` varchar(191) NOT NULL,
  `direccion` varchar(191) NOT NULL,
  `sexo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `apellido`, `CI`, `telefono`, `direccion`, `sexo`, `created_at`, `updated_at`) VALUES
(1, 'das', 'dsa', 321432, '54353', 'fdsafa', 'hombre', '2023-07-10 22:51:27', '2023-07-10 22:51:27'),
(2, 'pepe', 'hdhdhd', 12121212, '54763', 'dhskjn', 'mujer', '2023-07-12 00:39:44', '2023-07-12 00:39:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_18_155443_create_permission_tables', 1),
(6, '2023_06_18_161300_create_especialidades_table', 1),
(7, '2023_06_18_191519_create_raza_table', 1),
(8, '2023_06_18_191534_create_especie_table', 1),
(9, '2023_06_18_191607_create__medico_table', 1),
(10, '2023_06_18_191629_create__paciente_table', 1),
(11, '2023_06_20_130219_create__propietario_table', 1),
(12, '2023_06_22_145154_create_especialidad_medico_table', 1),
(13, '2023_06_24_135155_create_citas_table', 1),
(14, '2023_06_26_043330_create_cita_medico_table', 1),
(15, '2023_06_26_043458_create_cita_paciente_table', 1),
(16, '2023_06_26_110950_create_paciente_raza', 1),
(17, '2023_06_26_110959_create_paciente_especie', 1),
(18, '2023_06_26_112949_create_especie_paciente_table', 1),
(19, '2023_06_26_124119_create_historial_table', 1),
(20, '2023_06_26_124129_create_historial_medico_table', 1),
(21, '2023_06_26_124141_create_historial_paciente_table', 1),
(22, '2023_07_09_204910_create_paciente_propietario_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `apellido` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  `peso` double(8,2) NOT NULL,
  `edad` int(11) NOT NULL,
  `fechaN` date NOT NULL,
  `vacunas` varchar(191) NOT NULL,
  `alergias` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `color`, `peso`, `edad`, `fechaN`, `vacunas`, `alergias`, `created_at`, `updated_at`) VALUES
(1, 'fdsadsf', 'fdsf', 'fds', 6.00, 2, '2023-07-05', 'dsadas', 'camote', '2023-07-10 22:52:25', '2023-07-10 22:52:25'),
(2, 'fffff', 'fffff', 'fsa', 6.00, 3, '2023-07-19', 'ewq', 'ewq', '2023-07-10 22:54:33', '2023-07-10 22:54:33'),
(3, 'dddsss', 'ssss', 'dsadas', 4.00, 4, '2023-07-22', '2wad', 'dsa', '2023-07-10 22:55:10', '2023-07-10 22:55:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_especie`
--

CREATE TABLE `paciente_especie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `especie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_propietario`
--

CREATE TABLE `paciente_propietario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `propietario_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente_propietario`
--

INSERT INTO `paciente_propietario` (`id`, `paciente_id`, `propietario_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-07-10 22:52:25', '2023-07-10 22:52:25'),
(2, 2, 2, '2023-07-10 22:54:33', '2023-07-10 22:54:33'),
(3, 3, 1, '2023-07-10 22:55:10', '2023-07-10 22:55:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente_raza`
--

CREATE TABLE `paciente_raza` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `raza_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente_raza`
--

INSERT INTO `paciente_raza` (`id`, `paciente_id`, `raza_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-rol', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(2, 'crear-rol', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(3, 'editar-rol', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(4, 'borrar-rol', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(5, 'ver-especialidad', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(6, 'crear-especialidad', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(7, 'editar-especialidad', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(8, 'borrar-especialidad', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(9, 'ver-usuarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(10, 'crear-usuarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(11, 'editar-usuarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(12, 'borrar-usuarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(13, 'ver-citas', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(14, 'crear-citas', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(15, 'editar-citas', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(16, 'borrar-citas', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(17, 'ver-medico', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(18, 'crear-medico', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(19, 'editar-medico', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(20, 'borrar-medico', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(21, 'ver-pacientes', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(22, 'crear-pacientes', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(23, 'editar-pacientes', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(24, 'borrar-pacientes', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(25, 'ver-propietarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(26, 'crear-propietarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(27, 'editar-propietarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(28, 'borrar-propietarios', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(29, 'ver-historial', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(30, 'crear-historial', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(31, 'editar-historial', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45'),
(32, 'borrar-historial', 'web', '2023-07-10 22:49:45', '2023-07-10 22:49:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietarios`
--

CREATE TABLE `propietarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CI` int(11) NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `apellido` varchar(191) NOT NULL,
  `tel1` int(11) NOT NULL,
  `tel2` int(11) NOT NULL,
  `direccion` varchar(191) NOT NULL,
  `sexo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `propietarios`
--

INSERT INTO `propietarios` (`id`, `CI`, `nombre`, `apellido`, `tel1`, `tel2`, `direccion`, `sexo`, `created_at`, `updated_at`) VALUES
(1, 12121212, 'dsad', 'dsadas', 543543, 543534, 'sda', 'hombre', '2023-07-10 22:51:39', '2023-07-10 22:51:39'),
(2, 44324432, 'dsaffds', 'fdsfs', 432423, 423423, 'sdadas', 'hombre', '2023-07-10 22:51:55', '2023-07-10 22:51:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'dsa', '2023-07-10 22:50:59', '2023-07-10 22:50:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2023-07-10 22:50:38', '2023-07-10 22:50:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$FCKyg2JG42NMWpAzXnyOn.cWW3OooSKu7jq1bAVKu.AwZn023EG1C', NULL, '2023-07-10 22:49:41', '2023-07-10 22:49:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cita_medico`
--
ALTER TABLE `cita_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cita_medico_cita_id_foreign` (`cita_id`),
  ADD KEY `cita_medico_medico_id_foreign` (`medico_id`);

--
-- Indices de la tabla `cita_paciente`
--
ALTER TABLE `cita_paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cita_paciente_cita_id_foreign` (`cita_id`),
  ADD KEY `cita_paciente_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades_medico`
--
ALTER TABLE `especialidades_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especialidades_medico_medico_id_foreign` (`medico_id`),
  ADD KEY `especialidades_medico_especialidades_id_foreign` (`especialidades_id`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especie_paciente`
--
ALTER TABLE `especie_paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `especie_paciente_paciente_id_foreign` (`paciente_id`),
  ADD KEY `especie_paciente_especie_id_foreign` (`especie_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historials`
--
ALTER TABLE `historials`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_medico_historial_id_foreign` (`historial_id`),
  ADD KEY `historial_medico_medico_id_foreign` (`medico_id`);

--
-- Indices de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_paciente_historial_id_foreign` (`historial_id`),
  ADD KEY `historial_paciente_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_cita_id_foreign` (`cita_id`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente_especie`
--
ALTER TABLE `paciente_especie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_especie_paciente_id_foreign` (`paciente_id`),
  ADD KEY `paciente_especie_especie_id_foreign` (`especie_id`);

--
-- Indices de la tabla `paciente_propietario`
--
ALTER TABLE `paciente_propietario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_propietario_paciente_id_foreign` (`paciente_id`),
  ADD KEY `paciente_propietario_propietario_id_foreign` (`propietario_id`);

--
-- Indices de la tabla `paciente_raza`
--
ALTER TABLE `paciente_raza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_raza_paciente_id_foreign` (`paciente_id`),
  ADD KEY `paciente_raza_raza_id_foreign` (`raza_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cita_medico`
--
ALTER TABLE `cita_medico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cita_paciente`
--
ALTER TABLE `cita_paciente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `especialidades_medico`
--
ALTER TABLE `especialidades_medico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `especie_paciente`
--
ALTER TABLE `especie_paciente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historials`
--
ALTER TABLE `historials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente_especie`
--
ALTER TABLE `paciente_especie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente_propietario`
--
ALTER TABLE `paciente_propietario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `paciente_raza`
--
ALTER TABLE `paciente_raza`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietarios`
--
ALTER TABLE `propietarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita_medico`
--
ALTER TABLE `cita_medico`
  ADD CONSTRAINT `cita_medico_cita_id_foreign` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cita_medico_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cita_paciente`
--
ALTER TABLE `cita_paciente`
  ADD CONSTRAINT `cita_paciente_cita_id_foreign` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cita_paciente_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `especialidades_medico`
--
ALTER TABLE `especialidades_medico`
  ADD CONSTRAINT `especialidades_medico_especialidades_id_foreign` FOREIGN KEY (`especialidades_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `especialidades_medico_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `especie_paciente`
--
ALTER TABLE `especie_paciente`
  ADD CONSTRAINT `especie_paciente_especie_id_foreign` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `especie_paciente_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_medico`
--
ALTER TABLE `historial_medico`
  ADD CONSTRAINT `historial_medico_historial_id_foreign` FOREIGN KEY (`historial_id`) REFERENCES `historials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_medico_medico_id_foreign` FOREIGN KEY (`medico_id`) REFERENCES `medicos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historial_paciente`
--
ALTER TABLE `historial_paciente`
  ADD CONSTRAINT `historial_paciente_historial_id_foreign` FOREIGN KEY (`historial_id`) REFERENCES `historials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historial_paciente_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_cita_id_foreign` FOREIGN KEY (`cita_id`) REFERENCES `citas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paciente_especie`
--
ALTER TABLE `paciente_especie`
  ADD CONSTRAINT `paciente_especie_especie_id_foreign` FOREIGN KEY (`especie_id`) REFERENCES `especies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_especie_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paciente_propietario`
--
ALTER TABLE `paciente_propietario`
  ADD CONSTRAINT `paciente_propietario_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_propietario_propietario_id_foreign` FOREIGN KEY (`propietario_id`) REFERENCES `propietarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paciente_raza`
--
ALTER TABLE `paciente_raza`
  ADD CONSTRAINT `paciente_raza_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paciente_raza_raza_id_foreign` FOREIGN KEY (`raza_id`) REFERENCES `razas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
