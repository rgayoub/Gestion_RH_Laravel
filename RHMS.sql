-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 12 sep. 2024 à 20:22
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hrms`
--

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL DEFAULT uuid(),
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `emergency_contact` varchar(255) NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `training` smallint(6) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `uuid`, `first_name`, `last_name`, `national_id`, `nationality`, `gender`, `date_of_birth`, `email`, `phone_number`, `address`, `salary`, `emergency_contact`, `cv`, `image`, `position_id`, `training`, `start_date`, `deleted_at`, `created_at`, `updated_at`, `schedule_id`) VALUES
(1, 'c04fad72-4887-46f4-a0f3-0fa8802de954', 'Regragui', 'Ayoub', '123456', 'France', 'Male', '2024-07-01', 'ayoub@gmail.com', '0606939590', 'Rabat', 1500.00, '0661827861', 'cv/qu71kLdjiyZzuue8ksX90PA0dymi0exVPsPfTUJt.pdf', 'images/7ldM7aO0ffJbSOnIgT34695U9ppgIUGTbTcBoYWM.jpg', 1, 1, '2024-07-03', '2024-07-08 21:09:32', '2024-07-03 21:04:45', '2024-07-08 21:09:32', NULL),
(2, '7dd13ead-79bb-4fba-ba06-047f6fc6427f', 'Regragui', 'Ayoub', '123456', 'Morocco', 'Male', '1998-11-15', 'ayoub@gmail.com', '0606939590', 'Rabat', 1500.00, '0661827861', 'cv/XubhHeAwpwXeDnoZUOtR4NOEx0XcRK0yMfPV6Ne9.pdf', 'images/OkkwwqlEbWNOeuuqMjI8MKBmzZYmiA2WJDuKRPxy.jpg', 1, 1, '2024-07-08', '2024-07-16 11:52:44', '2024-07-08 21:16:30', '2024-07-16 11:52:44', NULL),
(3, 'fb1b7706-9482-4f6c-9f38-18fe8860c79b', 'Regragui', 'Ayoub', '123457', 'Colombia', 'Male', '1990-12-15', 'ayoub@gmail.com', '0606939590', 'Rabat', 1500.00, '0661827861', 'cv/nGDIsBje1VNkMAUJ4bC9w8Zlih4qeHpDk0P7Mjiq.pdf', 'images/vKXZr7KVZiUXTBCQABztqQPHq0sroDaSTjqs5ITH.jpg', 1, 0, '2024-07-09', NULL, '2024-07-09 15:36:53', '2024-07-16 15:32:06', 1),
(4, '2108cb72-4bf5-4a56-8183-e9b45121bcec', 'Regragui', 'Ayoub', '123457', 'Morocco', 'Male', '2024-06-20', 'ayoub@gmail.com', '0606939590', 'Rabat', 3000.00, '0661827861', 'cv/qer0ulsKk5eDEoYAH9YSBLTYUqyhGK5pDiYTaIl0.pdf', 'images/gp5CLtSM46nMQFlT0e8VDaW5pGsAArtnG0GXozu8.jpg', 1, 1, '2024-07-16', NULL, '2024-07-16 14:46:59', '2024-07-16 14:46:59', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `interviews`
--

CREATE TABLE `interviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `hr_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_02_112454_create_positions_table', 1),
(6, '2024_04_03_213721_create_employees_table', 1),
(7, '2024_04_23_194711_create_vacations_table', 1),
(8, '2024_04_26_130350_create_schedules_table', 1),
(9, '2024_04_26_131216_add_schedule_id_to_employees_table', 1),
(10, '2024_05_14_105445_add_is_active_to_users_table', 1),
(11, '2024_05_14_193648_create_interviews_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `positions`
--

INSERT INTO `positions` (`id`, `name`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'IT', 15000.00, '2024-07-03 21:02:43', '2024-07-16 15:46:38'),
(2, 'Génie Civil', 7000.00, '2024-07-22 09:47:30', '2024-07-22 09:47:30');

-- --------------------------------------------------------

--
-- Structure de la table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `days_of_week` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `schedules`
--

INSERT INTO `schedules` (`id`, `name`, `start_time`, `end_time`, `days_of_week`, `created_at`, `updated_at`) VALUES
(1, 'entretient', '10:00:00', '11:00:00', 'Monday', '2024-07-09 08:16:51', '2024-07-09 08:16:51');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `role` enum('admin','moderator') NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `phone_number`, `role`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'User', 'admin123', 'admin@example.com', NULL, '$2y$12$GcZmedCudr.4HHXIVq8JkuAM5BhjbFjhQ/DN7GP29mubo7Ja0dj4e', '1234567890', 'admin', 1, NULL, '2024-07-03 20:44:27', '2024-07-03 20:44:27');

-- --------------------------------------------------------

--
-- Structure de la table `vacations`
--

CREATE TABLE `vacations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vacations`
--

INSERT INTO `vacations` (`id`, `employee_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 3, '2024-07-16', '2024-07-20', '2024-07-16 15:34:56', '2024-07-16 15:34:56'),
(2, 3, '2024-07-22', '2024-07-26', '2024-07-22 14:48:35', '2024-07-22 14:48:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_uuid_unique` (`uuid`),
  ADD KEY `employees_position_id_foreign` (`position_id`),
  ADD KEY `employees_schedule_id_foreign` (`schedule_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviews_hr_id_foreign` (`hr_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `vacations`
--
ALTER TABLE `vacations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vacations_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vacations`
--
ALTER TABLE `vacations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_hr_id_foreign` FOREIGN KEY (`hr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vacations`
--
ALTER TABLE `vacations`
  ADD CONSTRAINT `vacations_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
