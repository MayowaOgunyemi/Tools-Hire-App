-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2024 at 11:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shelton_tool_hire`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT '1 = Building_Const,2 = Cleaning,3 = Decorating,4 = Landscaping,5 = Electrical_&_Heating,6 = Plumbing',
  `type_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT '1 = Electric,2 = Non_Electric',
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = PENDING, 1 = ACCSEPT, 2 = REJECT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `user_id`, `category_id`, `type_id`, `images`, `equipment_name`, `price`, `discount`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '1704594246.Leonardo_Diffusion_XL_Excavator_0.jpg|1704594246.Leonardo_Diffusion_XL_Excavator_1.jpg|1704594246.Leonardo_Diffusion_XL_Excavator_2.jpg|1704594246.Leonardo_Diffusion_XL_Excavator_3.jpg', 'Excavator', '100', '10%', 'Dig, scoop, heavy machinery, construction, earthmoving, hydraulic, bucket, tracks, operator, site, trench, equipment, demolition, soil, mining, crawler, arm, digging depth, efficiency, productivity.', 1, '2024-01-07 02:24:06', '2024-01-07 02:35:17'),
(2, 2, 1, 2, '1704594431.Leonardo_Diffusion_XL_Tower_Crane_0.jpg|1704594431.Leonardo_Diffusion_XL_Tower_Crane_1.jpg|1704594431.Leonardo_Diffusion_XL_Tower_Crane_2.jpg|1704594431.Leonardo_Diffusion_XL_Tower_Crane_3.jpg', 'Tower Crane', '90', '15%', 'Vertical, construction, lifting, steel, concrete, high-rise, operator, counterweight, jib, hook, hoist, rotation, assembly, construction site, building, skyscraper, heavy equipment, foundation, engineering, construction industry.', 0, '2024-01-07 02:27:11', '2024-01-07 02:27:11'),
(3, 2, 1, 1, '1704594614.Leonardo_Diffusion_XL_Concrete_Mixer_0.jpg|1704594614.Leonardo_Diffusion_XL_Concrete_Mixer_1.jpg|1704594614.Leonardo_Diffusion_XL_Concrete_Mixer_2.jpg|1704594614.Leonardo_Diffusion_XL_Concrete_Mixer_3.jpg', 'Concrete Mixer', '50', '5%', 'Mixing, cement, construction, rotating drum, batch, portable, transit, truck-mounted, ingredients, pour, concrete, construction site, mixer drum, discharge, aggregates, water, construction equipment, rotation, consistency, building.', 1, '2024-01-07 02:30:14', '2024-01-07 02:35:37'),
(4, 2, 1, 1, '1704594729.Leonardo_Diffusion_XL_Bulldozer_0.jpg|1704594729.Leonardo_Diffusion_XL_Bulldozer_1.jpg|1704594729.Leonardo_Diffusion_XL_Bulldozer_2.jpg|1704594729.Leonardo_Diffusion_XL_Bulldozer_3.jpg', 'Bulldozer', '90', '10%', 'Earthmoving, tracks, blade, construction, heavy equipment, pushing, grading, soil, crawler, bulldoze, leveling, construction site, operator, power, engine, dirt, excavation, construction industry, clearing, grading.', 1, '2024-01-07 02:32:09', '2024-01-07 02:35:50'),
(5, 2, 1, 1, '1704594841.Leonardo_Diffusion_XL_Mobile_Crane_0.jpg|1704594841.Leonardo_Diffusion_XL_Mobile_Crane_1.jpg|1704594841.Leonardo_Diffusion_XL_Mobile_Crane_2.jpg|1704594841.Leonardo_Diffusion_XL_Mobile_Crane_3.jpg', 'Mobile Crane', '100', '20%', 'Lifting, telescopic, hydraulic, boom, counterweight, mobile, construction, hoisting, operator, rigging, site, telescoping, stability, heavy loads, construction industry, jib, erection, versatile, transportation, crane.', 1, '2024-01-07 02:34:01', '2024-01-07 02:35:29'),
(6, 3, 2, 1, '1704596995.Leonardo_Diffusion_XL_Vacuum_Cleaner_0.jpg|1704596995.Leonardo_Diffusion_XL_Vacuum_Cleaner_1.jpg|1704596995.Leonardo_Diffusion_XL_Vacuum_Cleaner_2.jpg|1704596995.Leonardo_Diffusion_XL_Vacuum_Cleaner_3.jpg', 'Vacuum Cleaner', '20', '10%', 'Suction, cleaning, dust, bagless, cordless, handheld, carpet, floor, filter, power, vacuuming, attachments, canister, home, appliance, lightweight, HEPA, allergens, dirt, maintenance.', 1, '2024-01-07 03:09:55', '2024-01-07 03:18:47'),
(7, 5, 2, 1, '1704597486.Leonardo_Diffusion_XL_Pressure_Washer_0.jpg|1704597486.Leonardo_Diffusion_XL_Pressure_Washer_1.jpg|1704597486.Leonardo_Diffusion_XL_Pressure_Washer_2.jpg|1704597486.Leonardo_Diffusion_XL_Pressure_Washer_3.jpg', 'Pressure Washer', '15', '5%', 'High-pressure, cleaning, water, nozzle, power, spray, dirt, surfaces, exterior, equipment, pressure washing, hose, detergent, patio, deck, driveway, maintenance, washing, grime, stains.', 1, '2024-01-07 03:11:38', '2024-01-07 03:18:15'),
(8, 3, 2, 1, '1704597204.Leonardo_Diffusion_XL_Floor_Scrubber_0.jpg|1704597204.Leonardo_Diffusion_XL_Floor_Scrubber_1.jpg|1704597204.Leonardo_Diffusion_XL_Floor_Scrubber_2.jpg|1704597204.Leonardo_Diffusion_XL_Floor_Scrubber_3.jpg', 'Floor Scrubber', '25', '10%', 'Function: Floor scrubbers are used for cleaning and scrubbing hard floor surfaces. They typically have rotating brushes or pads that agitate and lift dirt, while a built-in system either dispenses cleaning solution or vacuums up dirty water.', 1, '2024-01-07 03:13:24', '2024-01-07 03:18:41'),
(9, 3, 2, 1, '1704597281.Leonardo_Diffusion_XL_Janitorial_Cart_0.jpg|1704597281.Leonardo_Diffusion_XL_Janitorial_Cart_1.jpg|1704597281.Leonardo_Diffusion_XL_Janitorial_Cart_2.jpg|1704597281.Leonardo_Diffusion_XL_Janitorial_Cart_3.jpg', 'Janitorial Cart', '30', '10%', 'Function: Janitorial carts, also known as cleaning carts or maid carts, are mobile storage units equipped with compartments for holding cleaning supplies, tools, and waste collection. They help janitors and cleaning staff organize and transport their equipment efficiently.', 1, '2024-01-07 03:14:41', '2024-01-07 03:18:20'),
(10, 3, 2, 1, '1704597348.Leonardo_Diffusion_XL_Steam_Cleaner_0.jpg|1704597348.Leonardo_Diffusion_XL_Steam_Cleaner_1.jpg|1704597348.Leonardo_Diffusion_XL_Steam_Cleaner_2.jpg|1704597348.Leonardo_Diffusion_XL_Steam_Cleaner_3.jpg', 'Steam Cleaner', '35', '15%', 'Function: Steam cleaners use hot water vapor to clean and sanitize surfaces. They are effective in removing grease, stains, and bacteria without the need for chemical cleaners. Steam cleaning is commonly used in various settings, including kitchens, bathrooms, and healthcare facilities.', 0, '2024-01-07 03:15:48', '2024-01-07 03:15:48'),
(11, 4, 3, 2, '1704653854.Leonardo_Diffusion_XL_Paintbrushes_and_Rollers_0.jpg|1704653854.Leonardo_Diffusion_XL_Paintbrushes_and_Rollers_1.jpg|1704653854.Leonardo_Diffusion_XL_Paintbrushes_and_Rollers_2.jpg|1704653854.Leonardo_Diffusion_XL_Paintbrushes_and_Rollers_3.jpg', 'Paintbrushes and Rollers', '15', '3%', 'Function: Paintbrushes and rollers are essential tools for applying paint to surfaces such as walls, ceilings, and trim. Brushes are suitable for detailed work and cutting in edges, while rollers are great for covering larger areas quickly.', 1, '2024-01-07 18:57:34', '2024-01-07 19:09:42'),
(12, 4, 3, 3, '1704654197.Leonardo_Diffusion_XL_Wallpaper_Smoother_equipment_0.jpg|1704654197.Leonardo_Diffusion_XL_Wallpaper_Smoother_equipment_1.jpg', 'Wallpaper Smoother', '20', '5%', 'Function: A wallpaper smoother, also known as a wallpaper brush or seam roller, is used during the installation of wallpaper. It helps smooth out bubbles, creases, and ensures proper adhesion of the wallpaper to the wall.', 1, '2024-01-07 19:03:17', '2024-01-07 19:10:28'),
(13, 4, 3, 2, '1704654350.Leonardo_Diffusion_XL_Putty_Knife_0.jpg|1704654350.Leonardo_Diffusion_XL_Putty_Knife_1.jpg|1704654350.Leonardo_Diffusion_XL_Putty_Knife_2.jpg|1704654350.Leonardo_Diffusion_XL_Putty_Knife_3.jpg', 'Putty Knife', '20', '10%', 'Function: Putty knives, or spackle knives, are used for filling cracks, holes, and imperfections in walls or wood surfaces with putty or spackle. They are also helpful for scraping off old paint or wallpaper.', 1, '2024-01-07 19:05:50', '2024-01-07 19:09:46'),
(14, 4, 3, 2, '1704654450.Leonardo_Diffusion_XL_Painters_Tape_0.jpg|1704654450.Leonardo_Diffusion_XL_Painters_Tape_1.jpg|1704654450.Leonardo_Diffusion_XL_Painters_Tape_2.jpg|1704654450.Leonardo_Diffusion_XL_Painters_Tape_3.jpg', 'Painter\'s Tape', '10', '15%', 'Function: Painter\'s tape is a type of masking tape designed for use in painting projects. It is applied to edges and surfaces to create clean lines and protect areas from unwanted paint splatter. It is especially useful for achieving sharp, precise edges.', 2, '2024-01-07 19:07:30', '2024-01-07 21:54:31'),
(15, 3, 4, 1, '1704661334.DreamShaper_v7_Lawn_Mower_0.jpg|1704661334.DreamShaper_v7_Lawn_Mower_1.jpg|1704661334.DreamShaper_v7_Lawn_Mower_2.jpg|1704661334.DreamShaper_v7_Lawn_Mower_3.jpg', 'Lawn Mower', '40', '15%', 'Function: Lawn mowers are used to cut grass to a desired length, helping maintain a well-groomed and neat lawn. There are various types of lawn mowers, including push mowers, self-propelled mowers, and riding mowers, each suited for different lawn sizes.', 1, '2024-01-07 21:02:14', '2024-01-07 21:53:56'),
(16, 3, 4, 2, '1704664418.1704661452.DreamShaper_v7_Pruning_Shears_Secateurs_1.jpg|1704664418.1704661452.DreamShaper_v7_Pruning_Shears_Secateurs_2.jpg|1704664418.1704661452.DreamShaper_v7_Pruning_Shears_Secateurs_3.jpg', 'Pruning Shears (Secateurs)', '15', '4%', 'Function: Pruning shears are used for trimming and shaping shrubs, small trees, and plants. They come in various sizes and styles, including bypass and anvil pruners, suitable for different types of branches and cutting needs.', 1, '2024-01-07 21:04:12', '2024-01-07 21:54:06'),
(17, 3, 4, 1, '1704661974.DreamShaper_v7_Shovel_0.jpg|1704661974.DreamShaper_v7_Shovel_1.jpg|1704661974.DreamShaper_v7_Shovel_2.jpg|1704661974.DreamShaper_v7_Shovel_3.jpg', 'Shovel', '7', '0%', 'Function: Shovels are versatile tools used for digging, lifting, and moving soil, mulch, gravel, or other landscaping materials. They come in various shapes and sizes, such as square-point, round-point, and flat-headed shovels, each serving specific purposes.', 1, '2024-01-07 21:12:54', '2024-01-07 21:54:46'),
(18, 3, 4, 1, '1704662107.DreamShaper_v7_Rake_tool_0.jpg|1704662107.DreamShaper_v7_Rake_tool_1.jpg|1704662107.DreamShaper_v7_Rake_tool_2.jpg|1704662107.DreamShaper_v7_Rake_tool_3.jpg', 'Rake', '10', '0%', 'Function: Rakes are used for leveling soil, spreading mulch, and collecting leaves and debris. There are different types of rakes, including leaf rakes for gathering leaves and garden rakes for preparing soil or spreading materials evenly.', 1, '2024-01-07 21:15:07', '2024-01-07 21:54:55'),
(19, 3, 4, 1, '1704662234.DreamShaper_v7_Wheelbarrow_equipment_0.jpg|1704662234.DreamShaper_v7_Wheelbarrow_equipment_1.jpg|1704662234.DreamShaper_v7_Wheelbarrow_equipment_2.jpg|1704662234.DreamShaper_v7_Wheelbarrow_equipment_3.jpg', 'Wheelbarrow', '30', '5%', 'Function: Wheelbarrows are indispensable for transporting heavy loads of soil, mulch, plants, or other landscaping materials. They consist of a large bin mounted on one or two wheels, making it easier to move bulk items around the garden or yard.', 0, '2024-01-07 21:17:14', '2024-01-07 21:17:14'),
(20, 2, 5, 1, '1704662653.DreamShaper_v7_Multimeter_0.jpg|1704662653.DreamShaper_v7_Multimeter_1.jpg|1704662653.DreamShaper_v7_Multimeter_2.jpg|1704662653.DreamShaper_v7_Multimeter_3.jpg', 'Multimeter', '20', '5%', 'Function: A multimeter is a versatile tool used for measuring electrical voltage, current, and resistance. It helps electricians troubleshoot and diagnose electrical problems in circuits and appliances.', 1, '2024-01-07 21:24:13', '2024-01-07 21:55:13'),
(21, 5, 5, 2, '1704664256.1704662739.DreamShaper_v7_Wire_Stripper_0.jpg|1704664256.1704662739.DreamShaper_v7_Wire_Stripper_1.jpg|1704664256.1704662739.DreamShaper_v7_Wire_Stripper_2.jpg|1704664256.1704662739.DreamShaper_v7_Wire_Stripper_3.jpg', 'Wire Stripper', '10', '0%', 'Function: Wire strippers are used to remove the insulation from electrical wires. This tool ensures a clean and precise strip, exposing the conductor for proper termination or connection.', 0, '2024-01-07 21:25:39', '2024-01-07 21:50:56'),
(22, 2, 5, 1, '1704662860.DreamShaper_v7_Voltage_Tester_0.jpg|1704662860.DreamShaper_v7_Voltage_Tester_1.jpg|1704662860.DreamShaper_v7_Voltage_Tester_2.jpg|1704662860.DreamShaper_v7_Voltage_Tester_3.jpg', 'Voltage Tester', '25', '10%', 'Function: A voltage tester, or non-contact voltage detector, is used to check for the presence of voltage in electrical wires, outlets, or circuits without direct contact. It\'s a safety tool to identify live wires before working on them.', 1, '2024-01-07 21:27:40', '2024-01-07 21:55:20'),
(23, 2, 5, 1, '1704663033.DreamShaper_v7_Pipe_Wrench_i_want_to_just_tool_image_0.jpg|1704663033.DreamShaper_v7_Pipe_Wrench_i_want_to_just_tool_image_1.jpg|1704663033.DreamShaper_v7_Pipe_Wrench_i_want_to_just_tool_image_2.jpg', 'Pipe Wrench', '20', '15%', 'Function: Pipe wrenches are adjustable wrenches designed for turning and holding pipes and fittings. They are commonly used in heating applications for installing or removing threaded pipes.', 1, '2024-01-07 21:30:33', '2024-01-07 21:55:27'),
(24, 2, 5, 1, '1704663146.DreamShaper_v7_Soldering_Iron_0.jpg|1704663146.DreamShaper_v7_Soldering_Iron_1.jpg|1704663146.DreamShaper_v7_Soldering_Iron_2.jpg|1704663146.DreamShaper_v7_Soldering_Iron_3.jpg', 'Soldering Iron', '12', '2%', 'Function: A soldering iron is used for joining electrical components or wires by melting and flowing solder onto the joint. It\'s a crucial tool for making electrical connections in a controlled and precise manner.', 0, '2024-01-07 21:32:26', '2024-01-07 21:32:26'),
(25, 4, 6, 3, '1704663628.DreamShaper_v7_Pipe_Wrench_tool_0.jpg|1704663628.DreamShaper_v7_Pipe_Wrench_tool_1.jpg|1704663628.DreamShaper_v7_Pipe_Wrench_tool_2.jpg', 'Pipe Wrench', '20', '5%', 'Function: Pipe wrenches are adjustable wrenches designed for turning and holding pipes and fittings. They come in various sizes and are used for tightening or loosening threaded pipes and fittings.', 1, '2024-01-07 21:40:28', '2024-01-07 21:55:54'),
(26, 4, 6, 3, '1704663713.DreamShaper_v7_Plunger_0.jpg', 'Plunger', '17', '10%', 'Function: A plunger is a basic but effective tool used for clearing clogged drains, sinks, or toilets. There are different types of plungers, including cup plungers for sinks and flange plungers for toilets.', 2, '2024-01-07 21:41:53', '2024-01-07 21:56:10'),
(27, 4, 6, 3, '1704663791.DreamShaper_v7_Pipe_Cutter_2.jpg|1704663791.DreamShaper_v7_Pipe_Cutter_3.jpg', 'Pipe Cutter:', '20', '7%', 'Function: Pipe cutters are used to cut pipes cleanly and accurately. They come in various types, including tubing cutters for copper pipes and soil pipe cutters for cutting larger diameter pipes.', 1, '2024-01-07 21:43:11', '2024-01-07 21:56:14'),
(28, 3, 6, 2, '1704663877.DreamShaper_v7_Adjustable_Wrench_0.jpg|1704663877.DreamShaper_v7_Adjustable_Wrench_1.jpg|1704663877.DreamShaper_v7_Adjustable_Wrench_2.jpg|1704663877.DreamShaper_v7_Adjustable_Wrench_3.jpg', 'Adjustable Wrench', '18', '0%', 'Function: Adjustable wrenches, also known as crescent wrenches, are versatile tools used for tightening or loosening nuts, bolts, and other fasteners. They have an adjustable jaw that can be customized to fit different sizes.', 1, '2024-01-07 21:44:37', '2024-01-07 21:56:23'),
(29, 2, 6, 2, '1704664008.DreamShaper_v7_Plumbing_Snake_Auger_1.jpg|1704664008.DreamShaper_v7_Plumbing_Snake_Auger_2.jpg|1704664008.DreamShaper_v7_Plumbing_Snake_Auger_3.jpg', 'Plumbing Snake (Auger):', '24', '15%', 'Function: Plumbing snakes or augers are used for clearing stubborn clogs in pipes. They come in various lengths and types, including handheld augers for sinks and toilets, as well as motorized augers for larger drains.', 1, '2024-01-07 21:46:48', '2024-01-07 21:56:20'),
(30, 2, 3, 2, '1704665240.DreamShaper_v7_Caulking_Gun_0.jpg|1704665240.DreamShaper_v7_Caulking_Gun_1.jpg|1704665240.DreamShaper_v7_Caulking_Gun_2.jpg|1704665240.DreamShaper_v7_Caulking_Gun_3.jpg', 'Caulking Gun', '14', '5%', 'Function: A caulking gun is used to apply caulk to seal gaps and joints in walls, trim, or other surfaces. It helps create a neat and finished appearance.', 2, '2024-01-07 22:05:41', '2024-01-07 22:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentcategory`
--

CREATE TABLE `equipmentcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipmentcategory`
--

INSERT INTO `equipmentcategory` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Building Construction equipment', NULL, NULL),
(2, 'Cleaning Equipment', NULL, NULL),
(3, 'Decorating tools', NULL, NULL),
(4, 'Landscaping tools', NULL, NULL),
(5, 'Electrical & Heating tools', NULL, NULL),
(6, 'Plumbing tools', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `equipmenttype`
--

CREATE TABLE `equipmenttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipmenttype`
--

INSERT INTO `equipmenttype` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electric', NULL, NULL),
(2, 'Non-Electric', NULL, NULL),
(3, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_26_014955_create_equipmentcategory_table', 1),
(6, '2023_12_26_015022_create_equipmenttype_table', 1),
(7, '2023_12_26_015126_create_equipment_table', 1),
(8, '2024_01_01_122407_create_reviews_table', 1),
(9, '2024_01_02_182045_create_replies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `review_id`, `reply`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'thank you for your review.', '2024-01-07 22:10:36', '2024-01-07 22:10:36'),
(2, 2, 1, 'thank you for your feedback.', '2024-01-07 22:36:41', '2024-01-07 22:36:41'),
(3, 4, 3, 'thank you for your review', '2024-01-07 22:37:43', '2024-01-07 22:37:43'),
(4, 4, 7, 'thank you', '2024-01-07 22:38:03', '2024-01-07 22:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `equipment_id` bigint(20) UNSIGNED NOT NULL,
  `category_1_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_2_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_3_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_4_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = PENDING, 1 = ACCSEPT, 2 = REJECT',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `equipment_id`, `category_1_rate`, `category_2_rate`, `category_3_rate`, `category_4_rate`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '4', '3', '5', '3', 'Super.', 0, '2024-01-07 22:08:51', '2024-01-07 22:08:51'),
(2, 1, 5, '5', '2', '5', '4', 'Good product. thank you', 0, '2024-01-07 22:09:24', '2024-01-07 22:09:24'),
(3, 1, 9, '5', '3', '2', '3', 'almost good.', 0, '2024-01-07 22:31:42', '2024-01-07 22:31:42'),
(4, 1, 8, '5', '5', '5', '5', 'this product is percect', 0, '2024-01-07 22:32:42', '2024-01-07 22:32:42'),
(5, 1, 8, '2', '4', '2', '5', 'friendly customer service.', 0, '2024-01-07 22:33:58', '2024-01-07 22:33:58'),
(6, 1, 13, '5', '2', '2', '5', 'good product.', 0, '2024-01-07 22:35:02', '2024-01-07 22:35:02'),
(7, 1, 13, '5', '2', '5', '4', 'nice', 0, '2024-01-07 22:35:18', '2024-01-07 22:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = USER,1 = ADMIN,2 = SUPER_ADMIN',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `contact_no`, `dob`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL, NULL, 0, 'user@sheltontoolhire.com', NULL, '$2y$10$s5sTr3pVP1yX8YqVM8whs.mwSdHRPw/Zi97iEugivVbFonmJ5em1K', NULL, NULL, NULL),
(2, 'Janith Gomes(admin)', NULL, NULL, NULL, 1, 'janithadmin@sheltontoolhire.com', NULL, '$2y$10$6lbjIZwrHxkfZ4YzTJ8V0.ZQoUBKt8hD31xjUJD6WrR6dlecQ6s/a', NULL, NULL, NULL),
(3, 'Prachi(admin)', NULL, NULL, NULL, 1, 'prachiadmin@sheltontoolhire.com', NULL, '$2y$10$6O.ZcTIOgexfyZE53YNY7.nnlihamMBwAxi.9KGwDWAzhDGBHxXEm', NULL, NULL, NULL),
(4, 'Stephen(admin)', NULL, NULL, NULL, 1, 'stephenadmin@sheltontoolhire.com', NULL, '$2y$10$.Fv/jQv5M1Oksszh0HS68OWWqIscCKW.uF9T6YBoyTFlV1Pz.erKO', NULL, NULL, NULL),
(5, 'Super Admin', NULL, NULL, NULL, 2, 'superadmin@sheltontoolhire.com', NULL, '$2y$10$gjy/7.m7aztB.Vj8hui0OumKZG/sAlLAsc3qfu0tL9qBXS11KfsQG', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipment_user_id_foreign` (`user_id`),
  ADD KEY `equipment_category_id_foreign` (`category_id`),
  ADD KEY `equipment_type_id_foreign` (`type_id`);

--
-- Indexes for table `equipmentcategory`
--
ALTER TABLE `equipmentcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_review_id_foreign` (`review_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_equipment_id_foreign` (`equipment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `equipmentcategory`
--
ALTER TABLE `equipmentcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `equipmenttype`
--
ALTER TABLE `equipmenttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equipment_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `equipmentcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `equipmenttype` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_equipment_id_foreign` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
