-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-11-2017 a las 15:24:00
-- Versión del servidor: 5.5.58-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jordan_jordan-plas`
--
CREATE DATABASE IF NOT EXISTS `jordan_jordan-plas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jordan_jordan-plas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `budgets`
--

CREATE TABLE `budgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `budgets`
--

INSERT INTO `budgets` (`id`, `created_at`, `updated_at`, `client_id`, `product_id`, `amount`) VALUES
(1, '2017-10-31 23:06:33', '2017-10-31 23:06:33', '6', '28', 50),
(2, '2017-10-31 23:22:27', '2017-10-31 23:22:27', '7', '27', 50),
(3, '2017-10-31 23:22:27', '2017-10-31 23:22:27', '7', '33', 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`, `avatar`) VALUES
(1, '2017-10-29 00:20:40', '2017-10-30 18:23:53', 'canalizador vial', 'Fabricados por método de inyección con Polipropileno y Co Polímeros o TPU SOFPUR (Poliuretano Termoplástico) o por método de extrusión con EVA, con agregados de resinas plásticas de alta resistencia, aditivos antioxidantes  y Filtos UV. Resistente a los hidrocarburos y variaciones extremas de temperatura. Su estructura se ve reforzada especialmete por compuestos de retículas termoplásticas que otrorgan una óptima resistencia, rebatibilidad y flexibilidad mecánica al producto. Su ESTACA esta fabricada con compuestos termoplásticos especiales que otorgan una óptima resistencia a golpes y aplastamientos. Posee láminas reflectivas de alta Intensidad 3M Grado Diamante y Avery Denninson Omnicube. Son muy visibles de día como de noche. Es un Producto Ideal para la División y Demarcación de Avenidas, Calles Principales y Sendas Peatonales y Ciclovías. Los matriales utilizados le otrogan al producto una muy alta Resistencia al Transito y al Impacto. El agregado de filtros UV favorece permite mantener inalterable el Color a lo largo del tiempo.  Es de rápida y fácil instalación con elementos mecánicos de fijación.', 'category-avatar/canalizador-vial-avatar.png'),
(2, '2017-10-29 00:21:15', '2017-10-30 18:24:08', 'divisor calzada', 'Fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. Su estructura se ve reforzada especialmete por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al modulo. Cada módulo posee reflectivos de alta visibilidad en sus laterales. Es de fácil instalación con elementos mecánicos de fijación.  Es un producto ideado para la división y demarcación de avenidas, calles principales y sendas peatonales y ciclovías. Los matriales utilizados le otrogan al producto una muy alta resistencia al transito y al impacto. El agregado de Filtros UV permite mantener inalterable el color del material a lo largo del tiempo.', 'category-avatar/divisor-calzada-avatar.png'),
(3, '2017-10-29 00:21:39', '2017-10-30 18:24:34', 'lomos de burro', 'Fabricados en Polipropileno con Co Polimeros, con agregados de resinas, compuestas con aditivos antioxidantes y Filtros UV, son resistentes a los hidrocarburos y variaciones extremas de temperatura. Por el diseño de sus estructuras, refuerzos y zonas de apoyo son altamente resistente a grandes compresiones y tiene una larga vida útil. El agregado de reflectivos de alta intensidad le otorga gran vision o reflexión tanto diurna como nocturna. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.', 'category-avatar/lomos-de-burro-avatar.png'),
(4, '2017-10-29 00:21:56', '2017-10-30 18:51:05', 'reductores de velocidad', 'Fabricados en PVC de alta calidad certificado por normas ISO. Con agregados de filtros UV que evita la decoloración del material a lo largo del tiempo. Colocación: se fija con un tirafondo, una arandela y un tarugo cada 25 cm de distancia.', 'category-avatar/reductores-avatar.png'),
(5, '2017-10-29 00:22:21', '2017-10-30 18:11:41', 'tope de estacionamiento', 'Fabricados por método de extrusión en PVC de alta calidad certificado por normas ISO o por método de inyección en Polipropileno con Co Polimeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV que evitan la decoloración del material. Possen una altísima resistencia al impacto, la compresión y abrasión. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.', 'category-avatar/tope-de-estacionamiento-avatar.png'),
(6, '2017-10-29 00:25:34', '2017-11-02 15:24:55', 'tachas redondas', 'Fabricadas con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. Su estructura se ve especialmente reforzada por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al producto. Poseen reflectivos de alta visibilidad en sus laterales. Recomendado para la demarcación de calles, avenidas y sendas escolares o peatonales. Tambien aconsejadas para instalar como camas reductoras, colocándose en 3 o 4 filas paralelas entre sí. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.También según el modelo con Pegamento Bituminoso o Epoxi.', 'category-avatar/tachas-avatar.png'),
(7, '2017-11-02 15:31:38', '2017-11-02 15:31:38', 'tachas solares', 'Las tachas solares modelos TS-8, TS-10 y TS-12, poseen una vida útil de funcionamiento mayor a 3 Años. La visibilidad del LED es hasta de 200 metros de distancia. Cuentan con sensores especiales de carga que otrogan entre 100 y 200 hs de trabajo una vez efectuada la carga de manera completa. Poseen un alto rango de resistencia a temperaturas entre -20ºC  a 70ºC. Cuentan con un panel solar con un voltaje de 2V o 1,5V / 100-200mAH. Su batería posee un voltaje de 1.2V / 600-800mAH. Cuentan con LED 3 por LADO, con un destello en una frecuencia de 2Hz ± 20%. Alcanzan una resistencia a la compresion de entre 20 a 30 Toneladas. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.', 'category-avatar/tachas-solares-avatar.png'),
(8, '2017-11-02 15:32:35', '2017-11-02 15:32:35', 'tachas cuadradas', 'Las Tachas LT-52 está fabricada con Polipropileno con Co Polímeros, con agregados de resinas plásticas, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. Posee 2 cajas reflectivas de Policarbonato cuyo interior contiene láminas reflectivas 3M GRADO DIAMANTE que otorgan una alta intensidad de reflexión. La Tacha VLP VLP-100 esta fabricada en ABS de Alto impacto bajo Normas ASTM (EEUU) e IRAM con agregado de Filtros UV. Posee 2 reflectivos elaborados en PMMA (Metacrilato Puro) compuesto de hexágonos cóncavos micro pristmátcos, soldados al cuerpo de la Tacha por tecnología de Ultra Sonido, otorgando la mas Alta Luminosidad del Mercado. La Tacha VLP-100 cumple con la Normativa Internacional ASTM e IRAM de Resistencia  de Compresión, Luminosidad, Reflectividad y Abrasión.', 'category-avatar/tachas-cuadradas-avatar.png'),
(9, '2017-11-02 15:34:26', '2017-11-02 15:34:26', 'tachas rectangulares', 'Las tachas LT-51 y LT-53 están fabricadas con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Poseen 1 o 2 líneas de LED reflectivos de Policarbonato de esferas microprismáticas que otorgan una alta intensidad lumínica tanto diurna como nocturna. La tacha VLP VLP-115 esta fabricada en ABS de alto impacto, con agregado de Filtros  UV bajo normas ASTM (EEUU) e IRAM. Posee 2 reflectivos elaborados en PMMA (Metacrilato Puro) compuesto de hexágonos cóncavos micro pristmátcos, soldados por tecnología de Ultra Sonido, otorgando la mas alta luminosidad del mercado. Recomendado su uso para señalizar y demarcar, carriles de calles, avenidas, rutas, autopistas, cordones y dársenas. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.También según el modelo con Pegamento Bituminoso o Epoxi.', 'category-avatar/tachas-rectangulares-avatar.png'),
(10, '2017-11-02 15:37:11', '2017-11-02 15:37:11', 'tachas planas', 'Fabricadas con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. Su estructura se ve especialmente reforzada por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al producto. Recomendado para la demarcación de calles y sendas escolares, peatonales, ciclovías, garages y estaciones de servicios. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.', 'category-avatar/tachas-planas-avatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `certificates`
--

INSERT INTO `certificates` (`id`, `created_at`, `updated_at`, `name`, `image`, `product_id`) VALUES
(8, '2017-10-29 00:55:39', '2017-10-29 00:55:39', 'ISO 9001/2008', 'certificates/iso-9001-2008-logo.jpeg', NULL),
(9, '2017-10-29 00:56:28', '2017-10-29 00:56:28', 'ISO 14001/2004', 'certificates/iso-14001-2004-logo.jpeg', NULL),
(10, '2017-10-29 00:56:49', '2017-10-29 00:56:49', 'OHSAS 18001:2007', 'certificates/ohsas-18001-2007-logo.jpeg', NULL),
(12, '2017-10-29 00:58:09', '2017-10-29 00:58:09', 'INTI - ASTM E1252:98 (2013)', 'certificates/inti---astm-e1252-98--2013--logo.jpeg', NULL),
(13, '2017-10-29 00:59:04', '2017-10-29 00:59:04', 'INTI Certif Resistencia Compresion', 'certificates/inti-certif-resistencia-compresion-logo.jpeg', NULL),
(14, '2017-10-29 00:59:20', '2017-10-29 00:59:20', 'IRAM', 'certificates/iram-logo.jpeg', NULL),
(15, '2017-10-29 00:59:38', '2017-10-29 00:59:38', 'ASTM', 'certificates/astm-logo.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificate_product`
--

CREATE TABLE `certificate_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `certificate_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `certificate_product`
--

INSERT INTO `certificate_product` (`id`, `certificate_id`, `product_id`) VALUES
(1, 3, 7),
(2, 3, 8),
(3, 4, 8),
(5, 4, 4),
(6, 1, 23),
(7, 3, 23),
(10, 8, 25),
(11, 12, 25),
(12, 8, 26),
(13, 8, 27),
(14, 8, 28),
(15, 8, 29),
(16, 8, 30),
(17, 8, 31),
(18, 9, 31),
(19, 10, 31),
(20, 12, 31),
(21, 13, 31),
(27, 8, 33),
(28, 9, 33),
(29, 10, 33),
(30, 12, 33),
(31, 13, 33),
(32, 8, 34),
(33, 12, 34),
(42, 12, 32),
(66, 8, 24),
(67, 10, 24),
(68, 10, 26),
(69, 12, 26),
(70, 13, 26),
(71, 8, 35),
(72, 8, 36),
(73, 8, 37),
(74, 10, 37),
(75, 12, 37),
(76, 13, 37),
(77, 8, 38),
(78, 8, 39),
(79, 10, 39),
(80, 8, 40),
(81, 10, 40),
(82, 12, 40),
(83, 13, 41),
(84, 14, 41),
(85, 15, 41),
(86, 8, 42),
(87, 10, 42),
(88, 8, 43),
(89, 10, 43),
(90, 13, 44),
(91, 14, 44),
(92, 15, 44),
(93, 8, 45),
(94, 9, 45),
(95, 10, 45),
(96, 8, 53),
(97, 12, 53),
(98, 8, 54),
(99, 12, 54),
(100, 8, 55),
(101, 9, 55),
(102, 10, 55),
(103, 12, 55),
(104, 13, 55),
(105, 8, 56),
(106, 10, 56),
(107, 8, 57),
(108, 10, 57),
(109, 8, 58),
(110, 10, 58),
(111, 13, 58),
(112, 8, 59),
(113, 10, 59),
(114, 12, 59),
(115, 13, 59),
(116, 8, 60),
(117, 10, 60),
(118, 12, 60),
(119, 13, 60),
(120, 8, 61),
(121, 10, 61),
(122, 12, 61),
(123, 13, 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `budget_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `email`, `name`, `phone`, `message`, `newsletter`, `budget_id`) VALUES
(1, '2017-10-30 22:30:10', '2017-10-30 22:30:10', 'tm.rodrigo@gmail.com', 'Rodrigo', 1524063115, 'hello', NULL, NULL),
(2, '2017-10-30 22:34:33', '2017-10-30 22:34:33', 'tm.rodrigo@gmail.com', 'Rodrigo', 2212406615, 'hello', NULL, NULL),
(3, '2017-10-30 22:36:22', '2017-10-30 22:36:22', 'pdre@gmail.com', 'pedre', 1124063115, 'hola', NULL, NULL),
(4, '2017-10-30 22:38:01', '2017-10-30 22:38:01', 'hey@gmail.com', 'hello', 1124066135, 'hey', NULL, NULL),
(5, '2017-10-31 23:00:06', '2017-10-31 23:00:06', 'tm.rodrigo@gmail.com', 'Rodrigo', 1124063115, 'heuy', NULL, NULL),
(6, '2017-10-31 23:06:33', '2017-10-31 23:06:33', 'agus@gmail.com', 'agus', 2212406315, 'hey', NULL, NULL),
(7, '2017-10-31 23:22:27', '2017-10-31 23:22:27', 'tm.rodrigo@gmail.com', 'Rodrigo', 22124063115, 'hello', NULL, NULL),
(8, '2017-10-31 23:27:41', '2017-10-31 23:27:41', 'pedro@gmail.com', 'pedro', 22124065124, 'hola', NULL, NULL),
(9, '2017-10-31 23:28:36', '2017-10-31 23:28:36', 'fabo@gmai.com', 'gabo', 115555555, 'hola', NULL, NULL),
(10, '2017-10-31 23:29:37', '2017-10-31 23:29:37', 'hey@gmail.com', 'hey', 115454545, 'hola', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client_logos`
--

CREATE TABLE `client_logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `client_logos`
--

INSERT INTO `client_logos` (`id`, `created_at`, `updated_at`, `url`) VALUES
(3, '2017-11-01 16:25:08', '2017-11-01 16:25:08', 'clients/boetto-y-butilengo.png'),
(4, '2017-11-01 16:25:08', '2017-11-01 16:25:08', 'clients/3m.png'),
(5, '2017-11-01 16:25:09', '2017-11-01 16:25:09', 'clients/aa-2000.png'),
(6, '2017-11-01 16:25:09', '2017-11-01 16:25:09', 'clients/abasto-shopping.png'),
(7, '2017-11-01 16:25:10', '2017-11-01 16:25:10', 'clients/alto-palermo.png'),
(8, '2017-11-01 16:25:10', '2017-11-01 16:25:10', 'clients/ansv.png'),
(9, '2017-11-01 16:25:35', '2017-11-01 16:25:35', 'clients/club-de-campo-los-pinguinos.jpg'),
(10, '2017-11-01 16:25:35', '2017-11-01 16:25:35', 'clients/bra.png'),
(11, '2017-11-01 16:25:36', '2017-11-01 16:25:36', 'clients/cablevision.jpg'),
(12, '2017-11-01 16:25:36', '2017-11-01 16:25:36', 'clients/calico.png'),
(13, '2017-11-01 16:25:37', '2017-11-01 16:25:37', 'clients/camino-de-la-sierra.png'),
(14, '2017-11-01 16:25:37', '2017-11-01 16:25:37', 'clients/ceamse.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `created_at`, `updated_at`, `name`, `value`) VALUES
(1, NULL, NULL, 'red', 'rojo'),
(2, NULL, NULL, 'yellow', 'amarillo'),
(3, NULL, NULL, 'white', 'blanco'),
(4, NULL, NULL, 'orange', 'naranja'),
(5, NULL, NULL, 'redWhite', 'Rojo y Blanco'),
(6, NULL, NULL, 'redYellow', 'Rojo y Amarillo'),
(7, NULL, NULL, 'yellowWhite', 'Amarillo y Blanco'),
(8, NULL, NULL, 'black', 'negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors_products`
--

CREATE TABLE `colors_products` (
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `created_at`, `updated_at`, `email`, `address`, `description`, `phone`, `fax`, `celular`) VALUES
(1, '2017-10-29 01:37:36', '2017-10-29 01:37:36', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '541142419726', '5491167891320', '5491133602561'),
(2, '2017-10-29 01:39:40', '2017-10-29 01:39:40', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '5491167891320', '5491133602561'),
(3, '2017-10-29 01:40:05', '2017-10-29 01:40:05', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(4, '2017-10-30 19:16:24', '2017-10-30 19:16:24', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(5, '2017-10-30 19:16:48', '2017-10-30 19:16:48', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(6, '2017-10-30 19:16:59', '2017-10-30 19:16:59', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(7, '2017-10-30 19:17:05', '2017-10-30 19:17:05', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(8, '2017-10-30 19:17:13', '2017-10-30 19:17:13', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(9, '2017-10-30 19:17:22', '2017-10-30 19:17:22', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.  El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.  En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos  mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.  La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a  los productos.   Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.  Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y  reflectividad.  Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos.  Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.  Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(10, '2017-10-31 01:03:43', '2017-10-31 01:03:43', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', 'Jordan Plas es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <br>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa. El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción. En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de PVC por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el POLIPROPILENO combinado con CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA se decidio complementar y ampliar la gama de productos mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento. La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos. Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a los productos. Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas. Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias) conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y reflectividad. Recientemente se aplicó e implementó la más alta tecnología en el desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado. Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia) de sus Reflectivos a los productos. Las Cintas o Láminas Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: 3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD. Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561'),
(11, '2017-10-31 01:13:00', '2017-10-31 01:13:00', 'cotizaciones@jordan-plas.com.ar', 'Lanús - Argentina', '<b>Jordan Plas</b> es una empresa con años de trayectoria en el mercado Vial y de la Construcción. <b>Se caracteriza por el desarrollo propio, el diseño y la construcción de la totalidad de las matrices y moldes de los productos y reflectivos que produce y comercializa.</b><br><br>El desarrollo, la producción y comercialización de Productos Viales ocupa un lugar destacado dentro de la variedad de productos que comercializa, entre los que también se encuentran productos del mercado de la Construcción.<br><br>En sus inicios la empresa se especializo en la producción de Reductores de Velocidad de <b>PVC</b> por Estrusión. Con posterioridad en virtud de nuevas y mejores tecnologías y Materias Primas como el <b>POLIPROPILENO</b> combinado con <b>CO POLIMEROS, TPU POLIURETANO TERMOPLASTICO, ABS y EVA</b> se decidio complementar y ampliar la gama de productos mediante la fabricación por Inyección de: Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales, Divisores de Carril, Tachas Reflectivas, Tachas Demarcatorias y Calzas de Estacionamiento.<br><br><b>La empresa ha desarrollado exigentes procesos de producción, selección de materia prima a efectos de cumplimentar con las Normativas ISO, IRAM y ASTM que regulan la actividad y sus productos.</b> Asimismo la totalidad de sus productos cuenta con agregados de FILTROS UV a efectos de absorver los rayos ultra violetas evitando que los mismos lleguen a la masa de los polímeros y otorgando de esta manera una óptima prestación física y reflectiva a los productos.<br><br><b>Ha obtenido la certificación del INTI (Instituto Nacional de Tecnología Industria. Presidencia de la Nación) de sus Principales Productos y de la composición de la Materia Prima de los mismos. Tambien ha obtenido del INTI la Certificación en diversos Test de Resistencia a la Compresión de sus Lomos de Burro, Topes de Estacionamiento, Canalizadores Viales y Tachas Reflectivas.</b><br><br>Ha desarrollado nuevos productos (Canalizadores Viales, Tachas Reflectivas y Demarcatorias)<u>conforme a las exigentes regulaciones que rigen la materia del ASTM (EEUU) e IRAM (Argentina). Estos productos en los Test de ensayos y certificaciones ante el INTI han superado holgadamente la valores normativos de resistencia a la compresión, abrasión y reflectividad.</u><br><br>Recientemente se aplicó e implementó la más alta tecnología en el <b>desarrollo de sus propios Reflectivos con la utilización de los más puros y nobles componentes como el PMMA (Poli Metil Metacrilato) que otorgan los más altos índices de traslucencia, reflectividad y resistencia del mercado.</b><u>Con el objetivo de cumplir standards Internacionales y nacionales ASTM e IRAM se aplica la técnica de Pegado por Ultra Sonido (Fusión por Vibración de Alta Frecuencia)</u> de sus Reflectivos a los productos.<br><br>Las <b>Cintas o Láminas</b> Reflectivas utilizadas cumplen con las normativas de tránsito nacionales e internacionales siendo las: <b>3M Grado DIAMANTE y AVERY DENNINSON OMNICUBE de ALTA INTENSIDAD.</b><br><br>Hace años confían en nuestros Productos y Servicios las más importantes Constructoras, Barrios Privados, Hiper Mercados, Shoppings, Concesionarios de Autopistas Provinciales y Nacionales, el Gobierno Nacional, los Gobiernos Provinciales y Municipales y el Gobierno de Ciudad Autónoma de Bueos Aires.', '+5411 4241-9726', '+54911 6789-1320', '+54911 3360-2561');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `created_at`, `updated_at`, `url`, `category_id`, `product_id`) VALUES
(1, '2017-11-01 21:57:46', '2017-11-01 21:57:46', 'products/muestra-01.jpg-1', '1', 53),
(2, '2017-11-01 21:57:46', '2017-11-01 21:57:46', 'products/muestra-02.jpg-1', '1', 53),
(3, '2017-11-01 21:58:23', '2017-11-01 21:58:23', 'products/muestra-01.jpg-2', '2', 55),
(4, '2017-11-01 21:58:23', '2017-11-01 21:58:23', 'products/muestra-02.jpg-2', '2', 55),
(12, '2017-11-01 22:05:12', '2017-11-01 22:05:12', 'products/muestra-01.jpg-33-3', '3', 33),
(13, '2017-11-01 22:05:13', '2017-11-01 22:05:13', 'products/muestra-02.jpg-33-3', '3', 33),
(14, '2017-11-01 22:05:21', '2017-11-01 22:05:21', 'products/muestra-01.jpg-31-3', '3', 31),
(15, '2017-11-01 22:05:31', '2017-11-01 22:05:31', 'products/muestra-01.jpg-32-3', '3', 32),
(16, '2017-11-01 22:05:31', '2017-11-01 22:05:31', 'products/muestra-02.jpg-32-3', '3', 32),
(17, '2017-11-01 22:11:33', '2017-11-01 22:11:33', 'products/muestra-01.jpg-37-5', '5', 37),
(18, '2017-11-01 22:11:33', '2017-11-01 22:11:33', 'products/muestra-02.jpg-37-5', '5', 37),
(19, '2017-11-01 22:12:12', '2017-11-01 22:12:12', 'products/muestra-01.jpg-30-4', '4', 30),
(20, '2017-11-01 22:12:13', '2017-11-01 22:12:13', 'products/muestra-02.jpg-30-4', '4', 30),
(35, '2017-11-02 15:53:11', '2017-11-02 15:53:11', 'products/muestra-01.jpg-59-6', '6', 59),
(36, '2017-11-02 15:53:11', '2017-11-02 15:53:11', 'products/muestra-02.jpg-59-6', '6', 59),
(37, '2017-11-02 15:53:24', '2017-11-02 15:53:24', 'products/muestra-01.jpg-60-6', '6', 60),
(38, '2017-11-02 15:53:24', '2017-11-02 15:53:24', 'products/muestra-02.jpg-60-6', '6', 60),
(39, '2017-11-02 15:53:34', '2017-11-02 15:53:34', 'products/muestra-01.jpg-61-6', '6', 61),
(40, '2017-11-02 15:53:34', '2017-11-02 15:53:34', 'products/muestra-02.jpg-61-6', '6', 61),
(41, '2017-11-02 15:54:11', '2017-11-02 15:54:11', 'products/muestra-01.jpg-53-9', '9', 53),
(42, '2017-11-02 15:54:11', '2017-11-02 15:54:11', 'products/muestra-02.jpg-53-9', '9', 53),
(43, '2017-11-02 15:54:20', '2017-11-02 15:54:20', 'products/muestra-01.jpg-38-9', '9', 38),
(44, '2017-11-02 15:54:20', '2017-11-02 15:54:20', 'products/muestra-02.jpg-38-9', '9', 38),
(45, '2017-11-02 15:54:39', '2017-11-02 15:54:39', 'products/muestra-01.jpg-42-10', '10', 42),
(46, '2017-11-02 15:54:48', '2017-11-02 15:54:48', 'products/muestra-01.jpg-43-10', '10', 43),
(47, '2017-11-02 16:19:36', '2017-11-02 16:19:36', 'company/empresa-01.jpg', 'company', NULL),
(48, '2017-11-02 16:19:36', '2017-11-02 16:19:36', 'company/empresa-02.jpg', 'company', NULL),
(49, '2017-11-02 16:19:37', '2017-11-02 16:19:37', 'company/empresa-03.jpg', 'company', NULL),
(50, '2017-11-02 16:24:38', '2017-11-02 16:24:38', 'company/empresa-01.jpg', 'company', NULL),
(51, '2017-11-02 16:24:38', '2017-11-02 16:24:38', 'company/empresa-02.jpg', 'company', NULL),
(52, '2017-11-02 16:24:38', '2017-11-02 16:24:38', 'company/empresa-03.jpg', 'company', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_03_154005_create_table_products', 1),
(4, '2017_08_03_154621_add_products_columns', 2),
(20, '2017_08_08_173046_create_categories_table', 3),
(21, '2017_08_08_190229_create_posts_table', 3),
(22, '2017_08_10_140445_create_budgets_table', 3),
(23, '2017_09_06_160356_create_projects_table', 3),
(24, '2017_09_08_174311_create_products_table', 3),
(25, '2017_09_08_174823_edit_pducts_table', 3),
(26, '2017_09_11_122044_create_images_table', 3),
(27, '2017_09_11_172841_create_colors_table', 3),
(28, '2017_09_11_180819_create_colors_products_table', 3),
(29, '2017_09_11_183129_delete_product_id', 3),
(30, '2017_09_11_191720_create_table_product_atributes', 3),
(31, '2017_09_11_215056_create_image_column', 4),
(32, '2017_09_11_230506_create_clients_table', 5),
(33, '2017_09_11_231358_edit_clients_table', 6),
(34, '2017_09_13_203846_create_certificates_table', 7),
(35, '2017_09_18_181553_add_columns_avaiable_unit_productTable', 8),
(36, '2017_09_18_203946_create_description_column_categories_table', 9),
(37, '2017_09_18_222222_create_companies_table', 10),
(38, '2017_09_18_232643_create_services_table', 11),
(39, '2017_09_20_124446_chance_budgets_table', 12),
(40, '2017_09_20_222100_create_client_logos_table', 13),
(41, '2017_09_22_161125_add_column_product_id', 14),
(42, '2017_09_22_173751_add_certificates_column', 15),
(43, '2017_09_22_175052_create_certifictate_product_table', 16),
(44, '2017_09_25_142218_edit_category_column', 17),
(45, '2017_10_28_210408_longtextCategories', 18),
(46, '2017_10_28_211622_changeLongCategories', 19),
(47, '2017_10_28_211830_dropDescriptionCategories', 20),
(48, '2017_10_28_211928_createDescriptionCategories', 21),
(49, '2017_10_28_212344_dropDescriptionProducts', 22),
(50, '2017_10_28_212424_createDescriptionProducts', 23),
(51, '2017_10_28_222052_dropDescriptionCompanie', 24),
(52, '2017_10_28_222136_dropDescriptionCompanieV2', 25),
(53, '2017_10_28_222212_createDescriptionCompanie', 25),
(54, '2017_10_28_223519_dropColumnsCompanies', 26),
(55, '2017_10_28_223617_createColumnsCompanies', 26),
(56, '2017_10_30_143638_addAvatarCategories', 27),
(57, '2017_10_30_160336_dropDescriptionServices', 28),
(58, '2017_10_30_160402_createDescriptionServices', 28),
(59, '2017_10_31_175451_createValueColors', 29),
(60, '2017_11_01_202525_dropMeasures', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `updated_at`, `name`, `description`, `image`) VALUES
(1, '2017-10-30 17:19:53', '2017-10-30 17:19:53', 'Jordan Plas', 'Seguridad vial', 'novedades/jordan-plas.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reflex_s` double(8,2) DEFAULT NULL,
  `resistence` double(8,2) DEFAULT NULL,
  `info_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `available` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `units` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_id` int(11) DEFAULT NULL,
  `certificate_iso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `height`, `width`, `depth`, `weight`, `reflex_s`, `resistence`, `info_file`, `manual_file`, `left_img`, `right_img`, `rating`, `name`, `avatar`, `category_id`, `available`, `units`, `certificate_id`, `certificate_iso`, `description`) VALUES
(27, '2017-10-30 16:27:49', '2017-10-30 17:04:06', '33.00', '140.00', '1000.00', '4000.00', NULL, NULL, 'info_files/l-33.pdf', NULL, 'products/l-33-left.png', 'products/l-33-right.png', NULL, 'l-33', 'products/l-33.png', 4, NULL, 'mt', NULL, NULL, 'El reductor de velocidad macizo L-33 es ideal para el alto tránsito, se recomienda colocarlo en dos o tres líneas paralelas (efecto serrucho), de esa manera se logra reducir la velocidad de autos, camiones, micros y demás vehículos pesados a una velocidad aproximada de 30 a 40 Km/h (se colocan en acceso a ciudades, entradas o salidas de autopistas, accesos a supermercados, cercanías de escuelas, etc).'),
(28, '2017-10-30 16:29:11', '2017-10-30 17:03:55', '35.00', '160.00', '1000.00', '5000.00', NULL, NULL, 'info_files/l-34.pdf', NULL, 'products/l-34-left.png', 'products/l-34-right.png', NULL, 'l-34', 'products/l-34.png', 4, NULL, 'mt', NULL, NULL, 'El reductor de velocidad macizo L-34 es ideal para el alto tránsito, se recomienda colocarlo en dos o tres líneas paralelas (efecto serrucho), de esa manera se logra reducir la velocidad de autos, camiones, micros y demás vehículos pesados a una velocidad aproximada de 30 a 40 Km/h (se colocan en acceso a ciudades, entradas o salidas de autopistas, accesos a supermercados, cercanías de escuelas, etc).'),
(29, '2017-10-30 16:32:33', '2017-10-31 18:08:56', '17.00', '75.00', '1000.00', '1000.00', NULL, NULL, 'info_files/l-39.pdf', NULL, 'products/l-39-left.png', 'products/l-39-right.png', 4, 'l-39', 'products/l-39.png', 4, NULL, 'mt', NULL, NULL, 'El reductor de velocidad macizo L-39 es un producto ideado para la demarcación de cocheras, dividir zonas dentro de fábricas, producir lomadas para llamar la atención de vehículos. Colocado en forma de serrucho en dos o tres lineas paralelas produce un efecto de despertador o de atención en el conductor.'),
(30, '2017-10-30 16:37:50', '2017-10-30 16:37:50', '25.00', '125.00', '1000.00', '2800.00', NULL, NULL, 'info_files/l-43.pdf', NULL, 'products/l-43-left.png', 'products/l-43-right.png', NULL, 'l-43', 'products/l-43.png', 4, NULL, 'mt', NULL, NULL, 'El reductor de velocidad macizo L-43 es un producto ideado para la demarcación de cocheras, dividir zonas dentro de fábricas, estacionamientos y producir lomadas para llamar la atención de vehículos. Colocado en forma de serrucho en dos o tres lineas paralelas produce un efecto de despertador o de atención en el conductor.'),
(31, '2017-10-30 16:42:45', '2017-10-30 17:03:07', '50.00', '220.00', '333.00', '1200.00', NULL, NULL, 'info_files/l-44.pdf', NULL, 'products/l-44-left.png', 'products/l-44-right.png', 3, 'l-44', 'products/l-44.png', 3, NULL, 'mt', NULL, NULL, 'El lomo de burro L-44 esta fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas, aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada especialmente por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al módulo. Soporta una compresion mayor a 29,5 Toneladas. Cada módulo posee reflectivos de alta visibilidad en sus laterales. De fácil instalación con elementos mecánicos de fijación. Se comercializa por metro lineal compuesto por 3 módulos (2 módulos negros y 1 módulo amarillo).'),
(32, '2017-10-30 16:56:17', '2017-10-31 02:41:31', '55.00', '200.00', '400.00', '1300.00', NULL, NULL, 'info_files/l-52.pdf', NULL, 'products/l-52-left.png', 'products/l-52-right.png', 3, 'l-52', 'products/l-52.png', 3, NULL, 'mt', NULL, NULL, 'El lomo de burro L-52 esta fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas, aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada especialmente por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al módulo. Soporta una compresion mayor a 32 Toneladas. Cada módulo posee reflectivos de alta visibilidad en sus laterales. De fácil instalación con elementos mecánicos de fijación. Se comercializa por metro lineal compuesto por 5 módulos (3 módulos negros y 2 módulos amarillos).'),
(33, '2017-10-30 16:58:39', '2017-10-30 17:02:26', '60.00', '200.00', '950.00', '10000.00', NULL, NULL, 'info_files/l-50.pdf', NULL, 'products/l-50-left.png', 'products/l-50-right.png', 1, 'l-50', 'products/l-50.png', 3, NULL, 'mt', NULL, NULL, 'El lomo de burro L-50 esta fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas, aditivos antioxidantes y Filtros UV. Su estructura se ve especialmente reforzada por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al módulo. Soporta una compresion mayor a 55,8 Toneladas. Cada módulo posee reflectivos de alta visibilidad en sus laterales. Tambien cuenta con una flecha reflectiva indicativa del sentido de circulación compuesto por  una pintura de imprimación lumínica junto con una de alto tránsito y esferas de vidrio. Su estructura evita golpes bruscos por parte del vehículo, no transmitiendo así vibraciones y ruidos molestos.  Se comercializa por metro lineal el que está compuesto por 2 módulos negros.'),
(34, '2017-10-30 17:12:44', '2017-10-31 18:11:30', '45.00', '160.00', '1000.00', '5200.00', NULL, NULL, 'info_files/l-31.pdf', NULL, 'products/l-31-left.png', 'products/l-31-right.png', 4, 'l-31', 'products/l-31.png', 4, NULL, 'mt', NULL, NULL, 'El reductor de velocidad L-31 es un producto recomendado para areas urbanas; reduce la velocidad de una manera importante, haciendo que el vehículo circule a una velocidad aprox de entre 20 y 35 km/h (recomendable su colocación en cercanías de peajes, escuelas, entradas a calles, avenidas y garages.)'),
(35, '2017-11-01 17:38:31', '2017-11-01 17:46:55', '90.00', '135.00', '500.00', '4000.00', NULL, NULL, 'info_files/le-36.pdf', NULL, 'products/le-36-left.png', 'products/le-36-right.png', 1, 'le-36', 'products/le-36.png', 5, NULL, 'un', NULL, NULL, 'El tope de estacionamiento LE-36 esta fabricado por el método de extrusión de PVC de alta calidad certificado por normas ISO. Tiene una muy alta resistencia al impacto, la compresión y abrasión. Es habitualmente utilizado tanto para autos, maquinas viales como para camiones o micros. También en estacionamientos, empresas, laboratorios, fábricas y talleres industriales.'),
(36, '2017-11-01 17:40:07', '2017-11-01 17:48:22', '105.00', '170.00', '500.00', '8000.00', NULL, NULL, 'info_files/l-36.pdf', NULL, 'products/l-36-left.png', 'products/l-36-right.png', 2, 'l-36', 'products/l-36.png', 5, NULL, 'un', NULL, NULL, 'El tope de estacionamiento L-36 esta fabricado por el método de extrusión de PVC de alta calidad certificado por normas ISO. Tiene la más alta resistencia de los topes existentes en el mercado, al impacto, la compresión y abrasión. Es habitualmente utilizado tanto para autos, maquinas viales como para camiones o micros. También en estacionamientos, empresas, laboratorios, fábricas y talleres industriales.'),
(37, '2017-11-01 17:42:29', '2017-11-01 17:46:18', '100.00', '125.00', '450.00', '1100.00', NULL, NULL, 'info_files/l-60.pdf', NULL, 'products/l-60-left.png', 'products/l-60-right.png', 0, 'l-60', 'products/l-60.png', 5, NULL, 'un', NULL, NULL, 'El tope de estacionamiento L-60 esta fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas, aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada especialmente por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al módulo. Soporta una compresion mayor a 24,5 Toneladas. Posee 6 cajas reflectivas de Policarbonato cuyo interior contienen láminas reflectivas 3M GRADO DIAMANTE que otorgan una muy alta intensidad de reflexión.'),
(38, '2017-11-01 17:45:19', '2017-11-01 17:47:55', '90.00', '135.00', '500.00', '5100.00', NULL, NULL, 'info_files/l-53.pdf', NULL, 'products/l-53-left.png', 'products/l-53-right.png', 3, 'l-53', 'products/l-53.png', 5, NULL, 'un', NULL, NULL, 'Las calzas moviles L-53 están fabricadas por el método de extrusión de PVC de alta calidad certificado por normas ISO. Es muy resistente al impacto, la compresión y abrasión. Es habitualmente utilizado tanto para autos, maquinas viales como para camiones o micros. También en estacionamientos, empresas, laboratorios, fábricas y talleres industriales.'),
(39, '2017-11-01 17:54:48', '2017-11-02 15:37:30', '25.00', '70.00', '90.00', '50.00', NULL, NULL, 'info_files/lt-51.pdf', NULL, 'products/lt-51-left.png', 'products/lt-51-right.png', 0, 'lt-51', 'products/lt-51.png', 9, NULL, 'un', NULL, NULL, 'La tacha rectangular L-51 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Posee 1 línea de LED reflectivos de Policarbonato de esferas microprismáticas que otorgan una alta intensidad lumínica tanto diurna como nocturna. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.También según el modelo con Pegamento Bituminoso o Epoxi.'),
(40, '2017-11-01 17:59:11', '2017-11-02 15:37:53', '21.00', '105.00', '125.00', '90.00', NULL, NULL, 'info_files/lt-53.pdf', NULL, 'products/lt-53-left.png', 'products/lt-53-right.png', 0, 'lt-53', 'products/lt-53.png', 9, NULL, 'un', NULL, NULL, 'La tacha rectangular L-53 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Posee 2 líneas de LED reflectivos de Policarbonato de esferas microprismáticas que otorgan una alta intensidad lumínica tanto diurna como nocturna. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.También según el modelo con Pegamento Bituminoso o Epoxi.'),
(41, '2017-11-01 20:42:02', '2017-11-02 15:38:09', '17.50', '85.00', '115.00', '110.00', NULL, NULL, 'info_files/vlp-115.pdf', NULL, 'products/vlp-115-left.png', 'products/vlp-115-right.png', 0, 'vlp-115', 'products/vlp-115.png', 9, NULL, 'un', NULL, NULL, 'La tacha VLP-115 esta fabricada en ABS de alto impacto y agregados de Filtros UV  bajo normas ASTM (EEUU) e IRAM. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 22,5 Toneladas de compresión. Posee 2 reflectivos elaborados en PMMA (Metacrilato Puro) compuesto de hexágonos cóncavos micro pristmátcos, soldados por tecnología de Ultra Sonido, otorgando la mas alta luminosidad y reflectividad del mercado. Cumple con la normativa internacional ASTM e IRAM de resistencia a la compresión, luminosidad, reflectividad y abrasión. Se comercializa CON o SIN el modelo un tirafondo de ABS integrado al cuerpo de la tacha.  De fácil y rápida colocación: con Pegamento Bituminoso o Epoxi.'),
(42, '2017-11-01 20:46:48', '2017-11-02 15:38:30', '5 / 6', '90 / 120 - 150 / 180', NULL, '20 / 45', NULL, NULL, 'info_files/lt-48.pdf', NULL, 'products/lt-48-left.png', 'products/lt-48-right.png', 0, 'lt-48', 'products/lt-48.png', 10, NULL, 'un', NULL, NULL, 'La tacha plana LT-48 fabricadas con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(43, '2017-11-01 20:47:53', '2017-11-02 15:38:46', '6.00', '150.00', NULL, NULL, NULL, NULL, 'info_files/lt-49.pdf', NULL, 'products/lt-49-left.png', 'products/lt-49-right.png', 0, 'lt-49', 'products/lt-49.png', 10, NULL, 'un', NULL, NULL, 'La Tacha Plana LT-49 Demarcatoria está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV.  Posee resistencia a los hidrocarburos y variaciones extremas de temperatura.  En dos tamanos de 150 y 180 mm de diámetro, su centro cuenta con las siguentes IMAGENES DEMARCATORIAS: CRUCE PEATONAL o EMABARAZADA-DISCAPACITADO o CRUCE ESCOLAR o PROHIBIDO ESTACIONAR. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(44, '2017-11-01 20:49:29', '2017-11-02 15:39:09', '19.00', '100.00', '100.00', '120.00', NULL, NULL, 'info_files/vlp-100.pdf', NULL, 'products/vlp-100-left.png', 'products/vlp-100-right.png', 0, 'vlp-100', 'products/vlp-100.png', 8, NULL, 'un', NULL, NULL, 'La tacha VLP-100 esta fabricada en ABS de alto impacto y agregados de Filtros UV  bajo normas ASTM (EEUU) e IRAM. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 19,3 Toneladas de compresión. Posee 2 reflectivos elaborados en PMMA (Metacrilato Puro) compuesto de hexágonos cóncavos micro pristmátcos, soldados por tecnología de Ultra Sonido, otorgando la mas alta luminosidad y reflectividad del mercado. Cumple con la normativa internacional ASTM e IRAM de resistencia a la compresión, luminosidad, reflectividad y abrasión. Se comercializa CON o SIN el modelo un tirafondo de ABS integrado al cuerpo de la tacha.  De fácil y rápida colocación: con Pegamento Bituminoso o Epoxi.'),
(45, '2017-11-01 20:50:45', '2017-11-02 15:39:26', '20.00', '92.00', '100.00', '70.00', NULL, NULL, 'info_files/lt-52.pdf', NULL, 'products/lt-52-left.png', 'products/lt-52-right.png', 0, 'lt-52', 'products/lt-52.png', 8, NULL, 'un', NULL, NULL, 'La Tacha L-52 esta fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas de alta resistencia, compuestos con aditivos antioxidantes y Filtros UV. Posee 2 Cajas Reflectivas de Policarbonato con láminas de Cinta 3M Grado Diamante en su Interior. Posee resistencia a los hidrocarburos y variaciones extremas de temperatura. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(46, '2017-11-01 20:52:04', '2017-11-02 15:41:45', '23.00', '95.00', '106.00', '280.00', NULL, NULL, 'info_files/ts-8.pdf', NULL, 'products/ts-8-left.png', 'products/ts-8-right.png', 0, 'ts-8', 'products/ts-8.png', 7, NULL, 'un', NULL, NULL, 'Cuerpo de Metalico. Peso de 280 Grs. Cantidad de LED: 3 por lado. Color del LED: Amarillo. Panel Solar de 2V /100mAH. Bateria de 1.2V /600mAH.  De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(51, '2017-11-01 21:03:26', '2017-11-02 15:42:02', '23.00', '110.00', '115.00', '305.00', NULL, NULL, 'info_files/ts-10.pdf', NULL, 'products/ts-10-left.png', 'products/ts-10-right.png', 0, 'ts-10', 'products/ts-10.png', 7, NULL, 'un', NULL, NULL, 'Cuerpo de Metalico. Peso de 305 Grs. Cantidad de LED: 3 por lado. Color del LED: Amarillo. Panel Solar de 2V /100mAH. Bateria de 1.2V /600mAH.  De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(52, '2017-11-01 21:05:32', '2017-11-02 15:42:25', '25.00', '124.00', '124.00', '275.00', NULL, NULL, 'info_files/ts-12.pdf', NULL, 'products/ts-12-left.png', 'products/ts-12-right.png', 0, 'ts-12', 'products/ts-12.png', 7, NULL, 'un', NULL, NULL, 'Tacha Circular. Diametro 124 mm. Cuerpo Acrílico con Polimeros. Peso de 275 Grs. Cantidad de LED: 3 por lado. Color del LED: Amarillo. Panel Solar de 1,5V /100mAH. Bateria de 1.2V /600-800mAH. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(53, '2017-11-01 21:26:19', '2017-11-01 21:26:19', '600.00', '185.00', NULL, '810.00', NULL, NULL, 'info_files/l-51.pdf', NULL, 'products/l-51-left.png', 'products/l-51-right.png', NULL, 'l-51', 'products/l-51.png', 1, NULL, 'un', NULL, NULL, 'El canalizador vial L-51 está elaborado por el método de extrusión tiene una base elaborada con Polipropileno y Co Polímeros. La ESTACA esta elaborada con goma EVA que otorga una óptima rebatibilidad, flexibilidad y resistencia a golpes y aplastamientos. Posee 2 láminas reflectivas de alta Intensidad 3M Grado Diamante y Avery Denninson Omnicube. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica. Su ESTACA es re cambiable mediante un solo tirafondo sin necesidad de desistalar su base del asfalto.'),
(54, '2017-11-01 21:27:28', '2017-11-01 21:27:28', '600.00', '200.00', NULL, NULL, NULL, NULL, 'info_files/l-61.pdf', NULL, 'products/l-61-left.png', 'products/l-61-right.png', NULL, 'l-61', 'products/l-61.png', 1, NULL, 'un', NULL, NULL, 'El canalizador vial L-61 está elaborado por el método de inyección de TPU (Poliuretano Termoplástico), con agregados de resinas termoplásticas, compuestos con aditivos antioxidantes y Filtos UV. Resiste hidrocarburos y variaciones extremas de temperatura. Su estructura es especialmete resistente a golpes y aplastamientos. Según el alto de su ESTACA posee de 4 a 7 láminas reflectivas de alta Intensidad 3M Grado Diamante y Avery Denninson Omnicube. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(55, '2017-11-01 21:30:35', '2017-11-01 21:30:35', '90.00', '350.00', '700.00', '3500.00', NULL, 25.00, 'info_files/l-42.pdf', NULL, 'products/l-42-left.png', 'products/l-42-right.png', NULL, 'l-42', 'products/l-42.png', 2, NULL, 'un', NULL, NULL, 'El divisor de calzada L-42 esta fabricado con Polipropileno y Co Polímeros, con agregados de resinas plásticas, aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada especialmente por compuestos de retículas prismáticas que otrorgan una óptima resistencia mecánica al módulo. Soporta una compresion mayor a 25 Toneladas. Cada módulo posee reflectivos de alta visibilidad en sus laterales. De fácil instalación con elementos mecánicos de fijación. Se comercializa por módulo de 700 mm de Largo x 350 mm de ancho x 90 mm de altura.'),
(56, '2017-11-01 22:19:44', '2017-11-01 22:19:44', '21.00', '100.00', NULL, '60.00', NULL, NULL, 'info_files/lt-40.pdf', NULL, 'products/lt-40-left.png', 'products/lt-40-right.png', NULL, 'lt-40', 'products/lt-40.png', 6, NULL, 'un', NULL, NULL, 'La tacha redonda reflectiva LT- 40 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Posee Un Reflectivo u Ojo de Gato de Policarbonato con una cinta reflectiva 3M Grado Diamante. Se fijan con elementos Mecanicos o Pegamento Bituminoso o Epoxi.'),
(58, '2017-11-01 22:23:42', '2017-11-01 22:23:42', '49.00', '200.00', NULL, '350.00', NULL, 13.50, 'info_files/lt-41.pdf', NULL, 'products/lt-41-left.png', 'products/lt-41-right.png', NULL, 'lt-41', 'products/lt-41.png', 6, NULL, 'un', NULL, NULL, 'La tacha redonda reflectiva LT-41 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 13,5 Toneladas de compresión. Posee 1 o 2 cajas reflectivas de Policarbonato cuyo interior contiene láminas reflectivas 3M GRADO DIAMANTE que otorgan una muy alta intensidad de reflexión. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(59, '2017-11-01 22:25:31', '2017-11-01 22:25:31', '23.00', '125.00', NULL, '125.00', NULL, 12.50, 'info_files/lta-125.pdf', NULL, 'products/lta-125-left.png', 'products/lta-125-right.png', NULL, 'lta-125', 'products/lta-125.png', 6, NULL, 'un', NULL, NULL, 'La tacha redonda reflectiva LTA-125 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 12,5 Toneladas de compresión. Posee 2 cajas reflectivas de Policarbonato cuyo interior contiene láminas reflectivas 3M GRADO DIAMANTE que otorgan una muy alta intensidad de reflexión. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(60, '2017-11-01 22:26:55', '2017-11-01 22:26:55', '35.00', '150.00', NULL, '165.00', NULL, 9.00, 'info_files/lta-150.pdf', NULL, 'products/lta-150-left.png', 'products/lta-150-right.png', NULL, 'lta-150', 'products/lta-150.png', 6, NULL, 'un', NULL, NULL, 'La tacha redonda reflectiva LTA-150 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 9 Toneladas de compresión. Posee 2 cajas reflectivas de Policarbonato cuyo interior contiene láminas reflectivas 3M GRADO DIAMANTE que otorgan una muy alta intensidad de reflexión. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.'),
(61, '2017-11-01 22:28:08', '2017-11-02 15:56:24', '42.00', '200.00', NULL, '360.00', NULL, NULL, 'info_files/lta-200.pdf', NULL, 'products/lta-200-left.png', 'products/lta-200-right.png', 0, 'lta-200', 'products/lta-200.png', 6, NULL, 'un', NULL, NULL, 'La tacha redonda reflectiva LTA-200 está fabricada con Polipropileno y Co Polímeros, con agregados de resinas plásticas, compuestas con aditivos antioxidantes y Filtros UV. Su estructura se ve reforzada por resinas termoplásticas que le otrorgan una resistencia mayor a las 10,5 Toneladas de compresión. Posee 2 cajas reflectivas de Policarbonato cuyo interior contiene láminas reflectivas 3M GRADO DIAMANTE que otorgan una muy alta intensidad de reflexión. De fácil y rápida colocación: con un tirafondo, una arandela y un tarugo en cada orificio de fijación mecánica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_atributes`
--

CREATE TABLE `product_atributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `atribute` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product_atributes`
--

INSERT INTO `product_atributes` (`id`, `created_at`, `updated_at`, `product_id`, `atribute`, `value`) VALUES
(1, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'body_color', 'white'),
(2, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'body_color', 'yellow'),
(3, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'yellow'),
(4, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'white'),
(5, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'red'),
(6, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'redWhite'),
(7, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'redYellow'),
(8, '2017-10-29 00:41:17', '2017-10-29 00:41:17', 23, 'reflex_color', 'yellowWhite'),
(17, '2017-10-30 16:24:55', '2017-10-30 16:24:55', 25, 'body_color', 'yellow'),
(18, '2017-10-30 16:24:55', '2017-10-30 16:24:55', 25, 'reflex_color', 'yellowWhite'),
(19, '2017-10-30 16:26:15', '2017-10-30 16:26:15', 26, 'body_color', 'yellow'),
(20, '2017-10-30 16:26:15', '2017-10-30 16:26:15', 26, 'reflex_color', 'yellow'),
(21, '2017-10-30 16:26:15', '2017-10-30 16:26:15', 26, 'reflex_color', 'white'),
(22, '2017-10-30 16:26:15', '2017-10-30 16:26:15', 26, 'reflex_color', 'yellowWhite'),
(23, '2017-10-30 16:27:49', '2017-10-30 16:27:49', 27, 'body_color', 'yellow'),
(24, '2017-10-30 16:27:49', '2017-10-30 16:27:49', 27, 'reflex_color', 'yellow'),
(25, '2017-10-30 16:27:49', '2017-10-30 16:27:49', 27, 'reflex_color', 'white'),
(26, '2017-10-30 16:27:49', '2017-10-30 16:27:49', 27, 'reflex_color', 'yellowWhite'),
(27, '2017-10-30 16:29:11', '2017-10-30 16:29:11', 28, 'body_color', 'yellow'),
(28, '2017-10-30 16:29:11', '2017-10-30 16:29:11', 28, 'reflex_color', 'yellow'),
(29, '2017-10-30 16:29:11', '2017-10-30 16:29:11', 28, 'reflex_color', 'white'),
(30, '2017-10-30 16:29:11', '2017-10-30 16:29:11', 28, 'reflex_color', 'yellowWhite'),
(31, '2017-10-30 16:32:33', '2017-10-30 16:32:33', 29, 'body_color', 'yellow'),
(32, '2017-10-30 16:32:33', '2017-10-30 16:32:33', 29, 'reflex_color', 'yellow'),
(33, '2017-10-30 16:32:33', '2017-10-30 16:32:33', 29, 'reflex_color', 'white'),
(34, '2017-10-30 16:32:33', '2017-10-30 16:32:33', 29, 'reflex_color', 'yellowWhite'),
(35, '2017-10-30 16:37:50', '2017-10-30 16:37:50', 30, 'body_color', 'yellow'),
(36, '2017-10-30 16:37:50', '2017-10-30 16:37:50', 30, 'reflex_color', 'yellow'),
(37, '2017-10-30 16:37:50', '2017-10-30 16:37:50', 30, 'reflex_color', 'white'),
(38, '2017-10-30 16:37:50', '2017-10-30 16:37:50', 30, 'reflex_color', 'yellowWhite'),
(39, '2017-10-30 16:42:45', '2017-10-30 16:42:45', 31, 'body_color', 'black'),
(40, '2017-10-30 16:42:45', '2017-10-30 16:42:45', 31, 'body_color', 'yellow'),
(41, '2017-10-30 16:42:45', '2017-10-30 16:42:45', 31, 'reflex_color', 'yellow'),
(42, '2017-10-30 16:42:45', '2017-10-30 16:42:45', 31, 'reflex_color', 'red'),
(43, '2017-10-30 16:42:45', '2017-10-30 16:42:45', 31, 'reflex_color', 'redYellow'),
(44, '2017-10-30 16:56:17', '2017-10-30 16:56:17', 32, 'body_color', 'black'),
(45, '2017-10-30 16:56:17', '2017-10-30 16:56:17', 32, 'body_color', 'yellow'),
(46, '2017-10-30 16:56:17', '2017-10-30 16:56:17', 32, 'reflex_color', 'yellow'),
(47, '2017-10-30 16:56:17', '2017-10-30 16:56:17', 32, 'reflex_color', 'red'),
(48, '2017-10-30 16:56:17', '2017-10-30 16:56:17', 32, 'reflex_color', 'redYellow'),
(49, '2017-10-30 16:58:39', '2017-10-30 16:58:39', 33, 'body_color', 'black'),
(50, '2017-10-30 16:58:39', '2017-10-30 16:58:39', 33, 'body_color', 'yellow'),
(51, '2017-10-30 16:58:39', '2017-10-30 16:58:39', 33, 'reflex_color', 'yellow'),
(52, '2017-10-30 16:58:39', '2017-10-30 16:58:39', 33, 'reflex_color', 'red'),
(53, '2017-10-30 16:58:39', '2017-10-30 16:58:39', 33, 'reflex_color', 'redYellow'),
(54, '2017-10-30 17:10:38', '2017-10-30 17:10:38', 25, 'reflex_color', 'yellow'),
(55, '2017-10-30 17:10:39', '2017-10-30 17:10:39', 25, 'reflex_color', 'white'),
(56, '2017-10-30 17:10:39', '2017-10-30 17:10:39', 25, 'reflex_color', 'yellowWhite'),
(57, '2017-10-30 17:12:44', '2017-10-30 17:12:44', 34, 'body_color', 'yellow'),
(58, '2017-10-30 17:12:44', '2017-10-30 17:12:44', 34, 'reflex_color', 'yellow'),
(59, '2017-10-30 17:12:44', '2017-10-30 17:12:44', 34, 'reflex_color', 'white'),
(60, '2017-10-30 17:12:44', '2017-10-30 17:12:44', 34, 'reflex_color', 'yellowWhite'),
(84, '2017-10-31 21:45:14', '2017-10-31 21:45:14', 24, 'body_color', 'yellow'),
(85, '2017-10-31 21:45:14', '2017-10-31 21:45:14', 24, 'body_color', 'white'),
(86, '2017-10-31 21:48:49', '2017-10-31 21:48:49', 24, 'reflex_color', 'yellow'),
(87, '2017-10-31 21:48:49', '2017-10-31 21:48:49', 24, 'reflex_color', 'white'),
(88, '2017-10-31 21:48:49', '2017-10-31 21:48:49', 24, 'reflex_color', 'orange'),
(89, '2017-10-31 21:48:59', '2017-10-31 21:48:59', 24, 'reflex_color', 'redWhite'),
(90, '2017-10-31 21:48:59', '2017-10-31 21:48:59', 24, 'reflex_color', 'redYellow'),
(91, '2017-10-31 21:48:59', '2017-10-31 21:48:59', 24, 'reflex_color', 'yellowWhite'),
(92, '2017-10-31 21:49:09', '2017-10-31 21:49:09', 24, 'reflex_color', 'red'),
(93, '2017-10-31 21:49:09', '2017-10-31 21:49:09', 24, 'reflex_color', 'yellow'),
(94, '2017-10-31 21:49:09', '2017-10-31 21:49:09', 24, 'reflex_color', 'redWhite'),
(95, '2017-10-31 21:54:20', '2017-10-31 21:54:20', 24, 'body_color', 'yellow'),
(96, '2017-10-31 21:54:20', '2017-10-31 21:54:20', 24, 'body_color', 'white'),
(97, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'body_color', 'yellow'),
(98, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'body_color', 'orange'),
(99, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'body_color', 'black'),
(100, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'reflex_color', 'red'),
(101, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'reflex_color', 'yellow'),
(102, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'reflex_color', 'white'),
(103, '2017-11-01 00:53:20', '2017-11-01 00:53:20', 26, 'reflex_color', 'redWhite'),
(104, '2017-11-01 00:53:21', '2017-11-01 00:53:21', 26, 'reflex_color', 'redYellow'),
(105, '2017-11-01 00:53:21', '2017-11-01 00:53:21', 26, 'reflex_color', 'yellowWhite'),
(106, '2017-11-01 17:38:31', '2017-11-01 17:38:31', 35, 'body_color', 'yellow'),
(107, '2017-11-01 17:38:31', '2017-11-01 17:38:31', 35, 'reflex_color', 'yellow'),
(108, '2017-11-01 17:38:32', '2017-11-01 17:38:32', 35, 'reflex_color', 'white'),
(109, '2017-11-01 17:38:32', '2017-11-01 17:38:32', 35, 'reflex_color', 'yellowWhite'),
(110, '2017-11-01 17:40:07', '2017-11-01 17:40:07', 36, 'body_color', 'yellow'),
(111, '2017-11-01 17:40:07', '2017-11-01 17:40:07', 36, 'reflex_color', 'yellow'),
(112, '2017-11-01 17:40:07', '2017-11-01 17:40:07', 36, 'reflex_color', 'white'),
(113, '2017-11-01 17:40:07', '2017-11-01 17:40:07', 36, 'reflex_color', 'yellowWhite'),
(114, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'body_color', 'yellow'),
(115, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'body_color', 'orange'),
(116, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'body_color', 'black'),
(117, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'red'),
(118, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'yellow'),
(119, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'white'),
(120, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'redWhite'),
(121, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'redYellow'),
(122, '2017-11-01 17:42:29', '2017-11-01 17:42:29', 37, 'reflex_color', 'yellowWhite'),
(123, '2017-11-01 17:45:19', '2017-11-01 17:45:19', 38, 'body_color', 'yellow'),
(124, '2017-11-01 17:45:19', '2017-11-01 17:45:19', 38, 'reflex_color', 'yellow'),
(125, '2017-11-01 17:45:19', '2017-11-01 17:45:19', 38, 'reflex_color', 'white'),
(126, '2017-11-01 17:45:20', '2017-11-01 17:45:20', 38, 'reflex_color', 'yellowWhite'),
(127, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'body_color', 'yellow'),
(128, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'red'),
(129, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'yellow'),
(130, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'white'),
(131, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'redWhite'),
(132, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'redYellow'),
(133, '2017-11-01 17:54:48', '2017-11-01 17:54:48', 39, 'reflex_color', 'yellowWhite'),
(134, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'body_color', 'yellow'),
(135, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'red'),
(136, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'yellow'),
(137, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'white'),
(138, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'redWhite'),
(139, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'redYellow'),
(140, '2017-11-01 17:59:11', '2017-11-01 17:59:11', 40, 'reflex_color', 'yellowWhite'),
(141, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'body_color', 'yellow'),
(142, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'body_color', 'white'),
(143, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'red'),
(144, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'yellow'),
(145, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'white'),
(146, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'redWhite'),
(147, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'redYellow'),
(148, '2017-11-01 20:42:02', '2017-11-01 20:42:02', 41, 'reflex_color', 'yellowWhite'),
(149, '2017-11-01 20:46:48', '2017-11-01 20:46:48', 42, 'body_color', 'yellow'),
(150, '2017-11-01 20:46:48', '2017-11-01 20:46:48', 42, 'body_color', 'white'),
(151, '2017-11-01 20:46:48', '2017-11-01 20:46:48', 42, 'body_color', 'orange'),
(152, '2017-11-01 20:46:48', '2017-11-01 20:46:48', 42, 'reflex_color', 'orange'),
(153, '2017-11-01 20:47:53', '2017-11-01 20:47:53', 43, 'body_color', 'yellow'),
(154, '2017-11-01 20:47:53', '2017-11-01 20:47:53', 43, 'body_color', 'white'),
(155, '2017-11-01 20:47:53', '2017-11-01 20:47:53', 43, 'body_color', 'orange'),
(156, '2017-11-01 20:47:53', '2017-11-01 20:47:53', 43, 'reflex_color', 'orange'),
(157, '2017-11-01 20:49:29', '2017-11-01 20:49:29', 44, 'body_color', 'yellow'),
(158, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'body_color', 'white'),
(159, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'body_color', 'orange'),
(160, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'red'),
(161, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'yellow'),
(162, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'white'),
(163, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'redWhite'),
(164, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'redYellow'),
(165, '2017-11-01 20:49:30', '2017-11-01 20:49:30', 44, 'reflex_color', 'yellowWhite'),
(166, '2017-11-01 20:50:45', '2017-11-01 20:50:45', 45, 'body_color', 'yellow'),
(167, '2017-11-01 20:50:45', '2017-11-01 20:50:45', 45, 'body_color', 'white'),
(168, '2017-11-01 20:50:45', '2017-11-01 20:50:45', 45, 'body_color', 'orange'),
(169, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'red'),
(170, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'yellow'),
(171, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'white'),
(172, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'redWhite'),
(173, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'redYellow'),
(174, '2017-11-01 20:50:46', '2017-11-01 20:50:46', 45, 'reflex_color', 'yellowWhite'),
(175, '2017-11-01 21:03:26', '2017-11-01 21:03:26', 51, 'reflex_color', 'yellow'),
(176, '2017-11-01 21:05:32', '2017-11-01 21:05:32', 52, 'body_color', 'white'),
(177, '2017-11-01 21:05:32', '2017-11-01 21:05:32', 52, 'reflex_color', 'yellow'),
(178, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'body_color', 'yellow'),
(179, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'body_color', 'orange'),
(180, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'reflex_color', 'red'),
(181, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'reflex_color', 'yellow'),
(182, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'reflex_color', 'white'),
(183, '2017-11-01 21:26:19', '2017-11-01 21:26:19', 53, 'reflex_color', 'redWhite'),
(184, '2017-11-01 21:26:20', '2017-11-01 21:26:20', 53, 'reflex_color', 'redYellow'),
(185, '2017-11-01 21:26:20', '2017-11-01 21:26:20', 53, 'reflex_color', 'yellowWhite'),
(186, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'body_color', 'yellow'),
(187, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'body_color', 'orange'),
(188, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'red'),
(189, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'yellow'),
(190, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'white'),
(191, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'redWhite'),
(192, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'redYellow'),
(193, '2017-11-01 21:27:28', '2017-11-01 21:27:28', 54, 'reflex_color', 'yellowWhite'),
(194, '2017-11-01 21:30:35', '2017-11-01 21:30:35', 55, 'body_color', 'yellow'),
(195, '2017-11-01 21:30:35', '2017-11-01 21:30:35', 55, 'reflex_color', 'yellow'),
(196, '2017-11-01 21:30:35', '2017-11-01 21:30:35', 55, 'reflex_color', 'white'),
(197, '2017-11-01 21:30:35', '2017-11-01 21:30:35', 55, 'reflex_color', 'yellowWhite'),
(198, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'body_color', 'yellow'),
(199, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'body_color', 'white'),
(200, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'red'),
(201, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'yellow'),
(202, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'white'),
(203, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'redWhite'),
(204, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'redYellow'),
(205, '2017-11-01 22:19:44', '2017-11-01 22:19:44', 56, 'reflex_color', 'yellowWhite'),
(206, '2017-11-01 22:21:35', '2017-11-01 22:21:35', 57, 'body_color', 'yellow'),
(207, '2017-11-01 22:21:35', '2017-11-01 22:21:35', 57, 'body_color', 'white'),
(208, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'red'),
(209, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'yellow'),
(210, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'white'),
(211, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'redWhite'),
(212, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'redYellow'),
(213, '2017-11-01 22:21:36', '2017-11-01 22:21:36', 57, 'reflex_color', 'yellowWhite'),
(214, '2017-11-01 22:23:42', '2017-11-01 22:23:42', 58, 'body_color', 'yellow'),
(215, '2017-11-01 22:23:42', '2017-11-01 22:23:42', 58, 'reflex_color', 'red'),
(216, '2017-11-01 22:23:43', '2017-11-01 22:23:43', 58, 'reflex_color', 'yellow'),
(217, '2017-11-01 22:23:43', '2017-11-01 22:23:43', 58, 'reflex_color', 'white'),
(218, '2017-11-01 22:23:43', '2017-11-01 22:23:43', 58, 'reflex_color', 'redWhite'),
(219, '2017-11-01 22:23:43', '2017-11-01 22:23:43', 58, 'reflex_color', 'redYellow'),
(220, '2017-11-01 22:23:43', '2017-11-01 22:23:43', 58, 'reflex_color', 'yellowWhite'),
(221, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'body_color', 'yellow'),
(222, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'body_color', 'white'),
(223, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'red'),
(224, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'yellow'),
(225, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'white'),
(226, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'redWhite'),
(227, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'redYellow'),
(228, '2017-11-01 22:25:31', '2017-11-01 22:25:31', 59, 'reflex_color', 'yellowWhite'),
(229, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'body_color', 'yellow'),
(230, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'red'),
(231, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'yellow'),
(232, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'white'),
(233, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'redWhite'),
(234, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'redYellow'),
(235, '2017-11-01 22:26:56', '2017-11-01 22:26:56', 60, 'reflex_color', 'yellowWhite'),
(236, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'body_color', 'yellow'),
(237, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'red'),
(238, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'yellow'),
(239, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'white'),
(240, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'redWhite'),
(241, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'redYellow'),
(242, '2017-11-01 22:28:08', '2017-11-01 22:28:08', 61, 'reflex_color', 'yellowWhite'),
(243, '2017-11-02 15:18:48', '2017-11-02 15:18:48', 46, 'reflex_color', 'yellow');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `created_at`, `updated_at`, `name`, `url`) VALUES
(5, '2017-11-02 16:35:58', '2017-11-02 16:35:58', 'Instalación', 'projects/instalacion-84.jpeg'),
(6, '2017-11-02 16:36:45', '2017-11-02 16:36:45', 'Instalación', 'projects/instalacion-75.jpeg'),
(7, '2017-11-02 16:37:10', '2017-11-02 16:37:10', 'Instalación', 'projects/instalacion-18.jpeg'),
(8, '2017-11-02 16:37:18', '2017-11-02 16:37:18', 'Instalación', 'projects/instalacion-48.jpeg'),
(9, '2017-11-02 16:37:28', '2017-11-02 16:37:28', 'Instalación', 'projects/instalacion-87.jpeg'),
(10, '2017-11-02 16:37:38', '2017-11-02 16:37:38', 'Instalación', 'projects/instalacion-62.jpeg'),
(11, '2017-11-02 16:37:48', '2017-11-02 16:37:48', 'Instalación', 'projects/instalacion-66.jpeg'),
(12, '2017-11-02 16:38:01', '2017-11-02 16:38:01', 'Instalación', 'projects/instalacion-44.jpeg'),
(13, '2017-11-02 16:38:14', '2017-11-02 16:38:14', 'Instalación', 'projects/instalacion-68.jpeg'),
(14, '2017-11-02 16:38:24', '2017-11-02 16:38:24', 'Instalación', 'projects/instalacion-72.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, '2017-10-30 19:05:12', '2017-10-30 19:05:12', 'Asesoramiento', 'Asesoramos a nuestros clientes conforme a la reglamentación de tránsito y señalización que rige a la industria de acuerdo a las normativas nacionales, provinciales, municipales  e internacionales.'),
(2, '2017-10-30 19:05:41', '2017-10-30 19:10:51', 'Elaboración de proyectos', 'Ofrecemos la elaboración de Proyectos de Demarcación y Señalización y la utilización de los productos adecuados a las necesidades viales del cliente.'),
(3, '2017-10-30 19:06:21', '2017-10-30 19:06:21', 'Colocación', 'Ofrecemos el servicio de colocación de la totalidad de nuestros Productos.'),
(4, '2017-10-30 19:06:43', '2017-10-30 19:06:43', 'Post-Venta', 'Ofrecemos el servicio de post Venta de mantenimiento de productos: consistente en la limpieza de reflectivos con solventes químicos exlusivos, el lavado por alta presión de los productos y el reemplazo o ajuste y fijación de productos ya colocados.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rodrigo', 'tm.rodrigo@gmail.com', '$2y$10$aQJlvmhH3uUy9NapOHuAsOpnF2l/tTFEIBrZThkcnmHLOOHgQlwca', 'fDLlyAVDTo9QYY61rBKN444PknQjbzWBk7CfY7TY46AeUL4ZnlGF3cLnITSh', '2017-08-09 18:09:18', '2017-08-09 18:09:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificate_product`
--
ALTER TABLE `certificate_product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_id_unique` (`id`);

--
-- Indices de la tabla `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_id_unique` (`id`);

--
-- Indices de la tabla `colors_products`
--
ALTER TABLE `colors_products`
  ADD KEY `colors_products_color_id_foreign` (`color_id`),
  ADD KEY `colors_products_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_id_unique` (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_id_unique` (`id`);

--
-- Indices de la tabla `product_atributes`
--
ALTER TABLE `product_atributes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_id_unique` (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `certificate_product`
--
ALTER TABLE `certificate_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `product_atributes`
--
ALTER TABLE `product_atributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colors_products`
--
ALTER TABLE `colors_products`
  ADD CONSTRAINT `colors_products_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `colors_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
