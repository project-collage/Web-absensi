-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2021 pada 18.09
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi_updated`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id_positions` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id_positions`, `position_name`) VALUES
(1, 'Web Developer'),
(2, 'Software Engineer'),
(3, 'Mobile Developer'),
(4, 'Project Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presents`
--

CREATE TABLE `presents` (
  `id_presents` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `information` char(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presents`
--

INSERT INTO `presents` (`id_presents`, `user_id`, `date`, `time`, `information`, `status`) VALUES
(36, 19, '2020-08-27', '09:00:32', 'M', 1),
(37, 19, '2020-08-27', '09:00:35', 'I', 2),
(38, 19, '2020-08-27', '09:00:38', 'S', 2),
(39, 21, '2021-09-08', '19:59:57', 'M', 1),
(40, 21, '2021-09-08', '20:03:19', 'S', 1),
(41, 23, '2021-09-09', '13:15:03', 'M', 1),
(42, 22, '2021-09-09', '14:07:19', 'S', 2),
(43, 23, '2021-09-09', '14:24:53', 'M', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id_roles`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `no_employee` char(18) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `no_employee`, `name`, `gender`, `email`, `photo`, `password`, `role_id`, `position_id`, `date_created`) VALUES
(1, '', 'Administrator', '', 'admin@gmail.com', NULL, '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', 1, 0, '2020-04-14'),
(21, '123456789123456789', 'Muhammad Zidane', 'L', 'muhammadzidane633@gmail.com', NULL, '$2y$10$HHZTNmkAMR5VJwMtOAlrJ.zuNYsXColhLz4OjNIWM.UH4s2jYi3gq', 2, 3, '2021-09-08'),
(22, '123132143434', 'Tony Stark', 'L', 'tony@gmail.com', 'f3620e7c6cd11976defe13adf8c27438.jpg', '$2y$10$.BllmLz/o/WqC0LZl/ErsOoBYsUad5TSZDjEQ1Hwc43yGlS9S3xpe', 2, 1, '2021-09-08'),
(23, '76575654533222', 'Steve Rogers', 'L', 'steve@gmail.com', 'b577fdc1eb2cd25276109bb42ae16c16.jpg', '$2y$10$j2HPLug3b7kIoeHCCMTbGONq0TWSAS0cRY4zuj4ARrw0gsbUwQDMO', 2, 2, '2021-09-09'),
(24, '78956745212', 'Bruno Mars', 'L', 'bruno@gmail.com', '7cdf449fde2174c1495a653538ed9eb3.jpg', '$2y$10$Xaldq5SSsRJkyqKq4jwYGOqIsRQ.BgAs0v/URcHDUTEoT1MdTdQA2', 2, 4, '2021-09-10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id_positions`);

--
-- Indeks untuk tabel `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id_presents`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id_positions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `presents`
--
ALTER TABLE `presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
