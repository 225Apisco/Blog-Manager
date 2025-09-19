-- Adminer 4.8.1 MySQL 5.5.5-10.6.22-MariaDB-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `freeads`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ads_user_id_foreign` (`user_id`),
  CONSTRAINT `ads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ads` (`id`, `user_id`, `title`, `category`, `description`, `photo`, `price`, `location`, `created_at`, `updated_at`) VALUES
(4,	1,	'Baby stroller',	'Baby',	'A baby stroller is a vehicle with a wheel, often foldable, designed to transport a young child. It generally consists of a chassis, a seat or a nacelle, and a wheel system to move it. The strollers vary in terms of size, weight, functionalities and type, adapted to the different ages and needs of children, as well as to the preferences of parents and uses.',	'ads_photos/MicfE5RWDvzagYhQcvl3OsqOoQ04e9kt6fneLBSN.jpg',	623,	'Adjame',	'2025-08-09 12:32:53',	'2025-08-09 20:20:42'),
(7,	1,	'MacBook',	'Laptop',	'A MacBook is a laptop computer designed and marketed by Apple, known for its sleek design, reliability, and intuitive macOS interface. There are two main lines: the MacBook Air and the MacBook Pro. The MacBook Air is lighter and more suited to general office use, while the MacBook Pro, with its increased cooling capacity, is designed for more demanding tasks like graphics and photo editing.',	'ads_photos/UsHnNsVbwXZF5asucxv1BHWLhcNQlYtw7RDsjCIV.jpg',	5000,	'Adjame',	'2025-08-09 12:51:01',	'2025-08-09 20:00:21'),
(9,	1,	'NISSAN',	'Voiture',	'Nissan is a renowned Japanese car manufacturer, offering a wide range of vehicles, from city cars to SUVs, electric models, and utility vehicles. Nissan stands out for the reliability of its cars, its innovative technologies, and its commitment to electric mobility.',	NULL,	75000,	'Yopougon',	'2025-08-09 13:59:53',	'2025-08-09 17:41:34');

DROP TABLE IF EXISTS `ad_photos`;
CREATE TABLE `ad_photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` bigint(20) unsigned NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_photos_ad_id_foreign` (`ad_id`),
  CONSTRAINT `ad_photos_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ad_photos` (`id`, `ad_id`, `path`, `created_at`, `updated_at`) VALUES
(36,	9,	'ads_photos/66Yfca1hJw0VNAOcqf7muw4sLpkSL5P3G13lN27y.jpg',	'2025-08-10 17:42:58',	'2025-08-10 17:42:58'),
(37,	9,	'ads_photos/OAxHnLScA4Z0VnZsUIDZFGvDzNf1J0WEuPJG8Ehg.jpg',	'2025-08-10 17:43:12',	'2025-08-10 17:43:12'),
(38,	9,	'ads_photos/IIlO0I4yrEXvW6h5TvrmYRTVsGyNwRWXX6NtCzC8.jpg',	'2025-08-10 17:43:38',	'2025-08-10 17:43:38'),
(39,	7,	'ads_photos/7gTDDtI5HXWSVbj4zlNRdtBziQh8ZqPJru2JQVUx.jpg',	'2025-08-10 17:44:02',	'2025-08-10 17:44:02'),
(40,	7,	'ads_photos/RWwvyEbtuLeDSifNORclJcohgOPAcRjC4aT0IDYp.jpg',	'2025-08-10 17:44:26',	'2025-08-10 17:44:26'),
(41,	7,	'ads_photos/T3xNofyWy8oHQfAq7W9r9MDcOsyupOYHbHGVLkJG.jpg',	'2025-08-10 17:44:54',	'2025-08-10 17:44:54'),
(42,	4,	'ads_photos/TGLLsPGLK618j94OAFFfDo4MRgPOqMVlRys9kVNe.jpg',	'2025-08-10 17:45:17',	'2025-08-10 17:45:17'),
(43,	4,	'ads_photos/GlxcoKWhwZeBSf0hmMSNv7vdHPINk5WPUIk83GON.jpg',	'2025-08-10 17:45:35',	'2025-08-10 17:45:35');

DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
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
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'0001_01_01_000000_create_users_table',	1),
(2,	'0001_01_01_000001_create_cache_table',	1),
(3,	'0001_01_01_000002_create_jobs_table',	1),
(4,	'2025_08_05_191846_add_phone_to_users_table',	1),
(5,	'2025_08_07_190007_create_ads_table',	1),
(6,	'2025_08_09_131358_create_ad_photos_table',	2);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3d0lRQM7ho4WIn8uRPCMjnCQc1CGgecjqyEOL6IH',	1,	'127.0.0.1',	'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:141.0) Gecko/20100101 Firefox/141.0',	'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiY0VzamhWeEZySVl5VWV1dFpHczJUa1ROUFBDVnhBUWM5TGswRVltUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',	1754848276);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1,	'Magui',	'mariametimite006@gmail.com',	'2025-08-07 21:12:22',	'$2y$12$o2RTXe4sxvOy36ci3uHPSOAvrJqdURo9SZRE8CxXa5bgF3lfqoUse',	NULL,	'2025-08-07 21:11:34',	'2025-08-07 21:47:24',	'0102993735'),
(2,	'Nafi',	'nafissagbane@gmail.com',	'2025-08-10 11:26:14',	'$2y$12$fEXe9gTicxYfyqfAuS4fN.czY9Ain/REod8EAgNjmFi8gTVquKpFy',	'Uc9w29VVgLoVcpI6uC7l6rBbsaxFnRjPdkzN8mdhQzoe3jsCEzpQbAqYXUW8',	'2025-08-10 11:23:46',	'2025-08-10 11:26:14',	'0149249794');

-- 2025-08-10 18:01:31
