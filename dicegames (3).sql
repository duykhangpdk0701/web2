-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2021 lúc 04:16 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dicegames`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `imgBrowseUrl` varchar(128) DEFAULT NULL,
  `imgNameUrl` varchar(128) DEFAULT NULL,
  `imgRepresentativeUrl` varchar(128) DEFAULT NULL,
  `developer` varchar(128) DEFAULT NULL,
  `dateRelease` datetime DEFAULT NULL,
  `tags` varchar(128) DEFAULT NULL,
  `platform` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `facebookUrl` varchar(128) DEFAULT NULL,
  `websiteUrl` varchar(128) DEFAULT NULL,
  `os` varchar(128) DEFAULT NULL,
  `processor` varchar(128) DEFAULT NULL,
  `memory` varchar(128) DEFAULT NULL,
  `storage` varchar(128) DEFAULT NULL,
  `directX` varchar(128) DEFAULT NULL,
  `graphics` varchar(128) DEFAULT NULL,
  `sellerId` int(11) NOT NULL,
  `adminApproveId` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `imgBrowseUrl`, `imgNameUrl`, `imgRepresentativeUrl`, `developer`, `dateRelease`, `tags`, `platform`, `description`, `facebookUrl`, `websiteUrl`, `os`, `processor`, `memory`, `storage`, `directX`, `graphics`, `sellerId`, `adminApproveId`, `status`) VALUES
(1, 'outriders', 59.99, './img/outriders-browse.webp', './img/outriders-name.webp', './img/outriders-representation.jpg', 'People Can Fly', '2021-04-02 00:00:00', 'Action, Shooter, Adventure', 'window', NULL, 'https://www.facebook.com/outridersgame', 'https://outriders.square-enix-games.com/', 'window 10', 'Intel I5-3470 / AMD FX-8350', '8GB', '70GB', '11', 'Nvidia GeForce GTX 750ti / AMD Radeon R9 270x', 3, 3, 1),
(2, 'Fortnite', 0, './img/fortnite-browse.webp', './img/fortnite-name.webp', './img/fortnite-representation.jpg', 'Epic game', '2017-07-25 00:00:00', ' Shooter, Multiplayer, Single Player ', 'window', NULL, 'https://www.facebook.com/FortniteGame/', 'https://www.epicgames.com/fortnite/en-US/home', 'Windows 7/8/10 64-bit', 'Core i3 3.3 GHz', '4GB', '70GB', '11', 'Intel HD 4000', 3, 3, 1),
(3, 'Star War Battlefront 2', 39.99, './img/starWarBattleFront2-browse.jpg', './img/starWarBattleFront2-name.webp', './img/starWarBattleFront2-representation.jpg', 'Dice', '2017-11-18 00:00:00', ' Action, Adventure, Shooter ', 'window', NULL, 'https://www.facebook.com/gaming/starwarsbattlefrontii', 'https://www.epicgames.com/fortnite/en-US/home', '64-bit Windows 7 SP1/Windows 8.1/Windows 10', 'Processor (AMD): AMD FX 6350 Processor (Intel): Intel Core i5 6600K', '8GB', '60GB', '11', 'Graphics card (AMD): AMD Radeon™ HD 7850 2GB Graphics card (NVIDIA): NVIDIA GeForce® GTX 660 2GB', 3, 3, 1),
(4, 'Cyberpunk 2077', 39.99, './img/cyberpunk-browse.webp', './img/cyberpunk-name.webp', './img/cyberpunk-representation.jpg', 'Cd Project Red', '2017-11-18 00:00:00', 'RPG, Single Player, Action', 'window', NULL, 'https://www.facebook.com/CyberpunkGame', 'https://www.cyberpunk.net/us/en/', '64-bit Windows 7 SP1/Windows 8.1/Windows 10', 'Intel Core i5-3570K or AMD FX-8310', '8GB', '70GB', '11', 'NVIDIA GeForce GTX 780 or AMD Radeon RX 470', 3, 3, 1),
(5, 'The Fall', 10, './img/TheFall-imgBrowseUrl.webp', './img/TheFall-imgNameUrl.webp', './img/TheFall-imgRepresentativeUrl.jpg', 'Over The Moon', '2020-05-30 00:00:00', 'Action Puzzle Adventure', 'window', NULL, 'https://www.facebook.com/OverTheMoonGames', 'https://www.overthemoongames.com/', 'Windows XP Sp3 or later', '2.5 GHz dual core', '3 GB', '530 MB', '9', 'GeForce 8600 or equivalent, 256 MB memory', 3, 3, 1),
(7, 'Skate City', 5, './img/SkateCity-imgBrowseUrl.webp', './img/SkateCity-imgNameUrl.webp', './img/SkateCity-imgRepresentativeUrl.webp', 'Agens', '2021-05-06 00:00:00', 'Action Indie', 'window', NULL, 'https://www.facebook.com/watch/skatecitygame/', 'https://skatecitygame.com/', 'Windows 7SP', '2.4 GHz intel i3', '2 GB', '595 Mb', '11', 'NVIDIA GT 460 or AMD Radeon HD 5550 w/ 1024 MB', 3, 9, 1),
(8, 'Scavengers', 0, './img/Scavengers-imgBrowseUrl.jpg', './img/Scavengers-imgNameUrl.webp', './img/Scavengers-imgRepresentativeUrl.webp', 'Midwinter Entertainment', '2021-05-06 00:00:00', 'Shooter', 'window', NULL, 'https://www.facebook.com/playscavengers/', 'https://www.playscavengers.com/en/', 'Windows 10', 'Processor Core I5-6500 or equivalent', '8 GB', '15 GB', '9', 'NVIDIA GeForce GTX 760 / AMD Radeon R9 380', 6, 9, 1),
(10, 'Lost World', 5, './img/LostWorld-imgBrowseUrl.webp', './img/LostWorld-imgNameUrl.webp', './img/LostWorld-imgRepresentativeUrl.jpg', 'Sketchbook Games, Fourth State', '2021-06-05 00:00:00', 'Adventure Platformer Indie', 'window', NULL, 'https://www.facebook.com/ModusGames', 'https://lostwordsgame.com/', 'Windows 7 64 Bit', 'Intel Core 2 Duo or equivalent', '2 GB RAM', '3 GB available space', '11', 'Graphics Card with support for DirectX 11', 3, 3, 1),
(11, 'The Fal', 10, './img/TheFal-imgBrowseUrl.webp', './img/TheFal-imgNameUrl.webp', './img/TheFal-imgRepresentativeUrl.webp', 'Over The Moon', '2021-05-15 00:00:00', 'Action Puzzle Adventure', 'window', NULL, 'https://www.facebook.com/OverTheMoonGames', 'https://www.overthemoongames.com/', 'Windows XP Sp3 or later', '2.5 GHz dual core', '3 GB', '530 MB', '9', 'GeForce 8600 or equivalent, 256 MB memory', 3, 3, 0),
(12, 'Subnautica Below Zero', 15, './img/SubnauticaBelowZero-imgBrowseUrl.jpg', './img/SubnauticaBelowZero-imgNameUrl.webp', './img/SubnauticaBelowZero-imgRepresentativeUrl.jpg', 'Unknown Worlds Entertainment', '2019-01-30 00:00:00', 'Survival Open World Adventure', 'Window, Mac', NULL, 'https://www.facebook.com/subnautica/', 'https://www.subnautica.com/', 'Windows 7 64-bit', 'Intel Core i3 / AMD Ryzen 3 2.6ghz+', '8 GB RAM', '15 GB available space', 'Version 11', 'Intel HD 530 or better', 5, 9, 1),
(13, 'Subnautica', 20, './img/Subnautica-imgBrowseUrl.webp', './img/Subnautica-imgNameUrl.webp', './img/Subnautica-imgRepresentativeUrl.jpg', 'Unknown Worlds Entertainment', '2018-01-23 00:00:00', 'Survival, Open World ,Adventure', 'Window, Mac', NULL, 'https://www.facebook.com/subnautica', 'https://www.subnautica.com/', 'Windows Vista SP2 or newer, 64-bit', 'Intel Haswell 2 cores / 4 threads @2.5Ghz or equivalent', '4GB', '20GB', '11', 'Intel HD 4600 or equivalent. This includes most GPUs scoring greater than 950 points in the 3DMark Fire Strike benchmark', 9, 9, 1),
(14, 'Grand Theft Auto V', 20, './img/GrandTheftAutoV-imgBrowseUrl.webp', './img/GrandTheftAutoV-imgNameUrl.webp', './img/GrandTheftAutoV-imgRepresentativeUrl.jpg', 'Rockstar Games', '2013-09-17 00:00:00', '–', 'window', NULL, 'https://www.rockstargames.com/V/restricted-content/agegate/form?redirect=https%3A%2F%2Fwww.rockstargames.com%2FV%2F&options=&loc', 'https://www.facebook.com/gaming/grandtheftauto', 'Windows 10 64 Bit, Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1, Windows Vista 64 Bit Service Pack 2* (', 'ntel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.5GHz', '4 GB RAM', '90 GB available space', '11', 'NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1, 11)', 9, 9, 1),
(15, 'Hit man 3', 50, './img/Hitman3-imgBrowseUrl.jpg', './img/Hitman3-imgNameUrl.png', './img/Hitman3-imgRepresentativeUrl.jpg', 'IO Interactive A/S', '2021-01-20 00:00:00', 'Action Stealth', 'window', NULL, 'https://www.facebook.com/iointeractive', 'https://hitman.com/global/', 'OS 64-bit Windows 10', 'Intel CPU Core i5-2500K 3.3GHz / AMD CPU Phenom II X4 940', '8 GB', '20GB', '12', 'NVIDIA GeForce GTX 660 / Radeon HD 7870', 9, 9, 1),
(16, 'Lost World 2', 10, './img/LostWorld2-imgBrowseUrl.webp', './img/LostWorld2-imgNameUrl.webp', './img/LostWorld2-imgRepresentativeUrl.jpg', 'Over The Moon', '2021-05-15 00:00:00', 'Action Puzzle Adventure', 'Window, Mac', NULL, 'https://www.facebook.com/OverTheMoonGames', 'https://lostwordsgame.com/', 'Windows XP Sp3 or later', '2.5 GHz dual core', '8 GB RAM', '3 GB available space', 'Version 11', 'NVIDIA GT 460 or AMD Radeon HD 5550 w/ 1024 MB', 9, 9, 1),
(17, 'Lost World 3', 5, './img/LostWorld3-imgBrowseUrl.webp', './img/LostWorld3-imgNameUrl.webp', './img/LostWorld3-imgRepresentativeUrl.jpg', 'Over The Moon', '2021-05-15 00:00:00', 'Survival, Open World ,Adventure', 'Window', NULL, 'https://www.facebook.com/OverTheMoonGames', 'https://www.overthemoongames.com/', 'Windows 7 64 Bit', 'Intel Core 2 Duo or equivalent', '8 GB', '20GB', '11', 'NVIDIA GeForce GTX 760 / AMD Radeon R9 380', 9, 9, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productsawaitapproved`
--

CREATE TABLE `productsawaitapproved` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `imgBrowseUrl` varchar(128) DEFAULT NULL,
  `imgNameUrl` varchar(128) DEFAULT NULL,
  `imgRepresentativeUrl` varchar(128) DEFAULT NULL,
  `developer` varchar(128) DEFAULT NULL,
  `dateRelease` datetime DEFAULT NULL,
  `tags` varchar(128) DEFAULT NULL,
  `platform` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `facebookUrl` varchar(128) DEFAULT NULL,
  `websiteUrl` varchar(128) DEFAULT NULL,
  `os` varchar(128) DEFAULT NULL,
  `processor` varchar(128) DEFAULT NULL,
  `memory` varchar(128) DEFAULT NULL,
  `storage` varchar(128) DEFAULT NULL,
  `directX` varchar(128) DEFAULT NULL,
  `graphics` varchar(128) DEFAULT NULL,
  `sellerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `productsawaitapproved`
--

INSERT INTO `productsawaitapproved` (`id`, `name`, `price`, `imgBrowseUrl`, `imgNameUrl`, `imgRepresentativeUrl`, `developer`, `dateRelease`, `tags`, `platform`, `description`, `facebookUrl`, `websiteUrl`, `os`, `processor`, `memory`, `storage`, `directX`, `graphics`, `sellerId`) VALUES
(17, 'The Fall 42', 10, './img/TheFall42-imgBrowseUrl.webp', './img/TheFall42-imgNameUrl.webp', './img/TheFall42-imgRepresentativeUrl.webp', 'Over The Moon', '2020-05-30 00:00:00', 'Action Puzzle Adventure', 'window', NULL, 'https://www.facebook.com/watch/skatecitygame/', 'https://www.overthemoongames.com/', 'Windows XP Sp3 or later', '2.4 GHz intel i3', '3 GB', '530 MB', '9', 'NVIDIA GT 460 or AMD Radeon HD 5550 w/ 1024 MB', 3),
(25, 'Hit man 2', 5, './img/Hitman2-imgBrowseUrl.jpg', './img/Hitman2-imgNameUrl.png', './img/Hitman2-imgRepresentativeUrl.jpg', 'Over The Moon', '2021-04-27 00:00:00', 'Shooter', 'window', NULL, 'https://www.facebook.com/OverTheMoonGames', 'https://www.overthemoongames.com/', 'Windows 7SP', '2.4 GHz intel i3', '8 GB RAM', '20GB', 'Version 11', 'Graphics Card with support for DirectX 11', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `productsId` int(11) DEFAULT NULL,
  `purchasesDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `purchases`
--

INSERT INTO `purchases` (`id`, `usersId`, `productsId`, `purchasesDate`) VALUES
(4, 5, 1, '2021-04-19 16:23:12'),
(6, 7, 2, '2021-04-20 12:54:02'),
(13, 5, 3, '2021-04-21 00:34:20'),
(14, 9, 2, '2021-04-21 16:06:08'),
(15, 9, 3, '2021-04-21 17:30:55'),
(16, 9, 1, '2021-04-21 18:06:05'),
(21, 10, 4, '2021-04-24 14:10:20'),
(22, 10, 2, '2021-04-24 14:14:34'),
(23, 11, 4, '2021-04-24 14:16:36'),
(32, 3, 2, '2021-04-26 23:21:11'),
(37, 3, 1, '2021-04-28 13:09:27'),
(38, 9, 5, '2021-05-07 20:59:16'),
(39, 9, 4, '2021-05-14 14:08:44'),
(40, 6, 3, '2021-05-15 01:39:23'),
(41, 6, 2, '2021-05-15 01:39:26'),
(42, 6, 1, '2021-05-15 01:40:24'),
(43, 3, 3, '2021-05-15 02:05:48'),
(44, 3, 4, '2021-05-15 07:36:02'),
(45, 9, 8, '2021-05-15 09:04:02'),
(46, 9, 7, '2021-05-15 09:04:02'),
(47, 9, 12, '2021-05-15 09:04:02'),
(48, 9, 15, '2021-05-15 09:04:02'),
(49, 9, 16, '2021-05-15 09:04:02'),
(50, 9, 10, '2021-05-15 09:05:31'),
(51, 9, 13, '2021-05-15 09:05:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `dateJoin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `seller`
--

INSERT INTO `seller` (`id`, `userId`, `dateJoin`) VALUES
(1, 3, '2021-04-20 00:00:00'),
(4, 9, '2021-04-22 15:07:33'),
(5, 10, '2021-04-24 14:10:44'),
(6, 6, '2021-05-08 04:37:45'),
(7, 5, '2021-05-15 07:46:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ids` int(11) NOT NULL,
  `firstNames` varchar(128) NOT NULL,
  `lastNames` varchar(128) NOT NULL,
  `userNames` varchar(128) NOT NULL,
  `emails` varchar(128) NOT NULL,
  `passwords` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ids`, `firstNames`, `lastNames`, `userNames`, `emails`, `passwords`, `admin`) VALUES
(3, 'Khang', 'Phùng', 'duykhangpdk0701', 'duykhangpdk0701@gmail.com', '$2y$10$7GvtOAwn0RqZL70Rp6e1Tu/zSh7isVMV0wPA08wUGXF77ncxo/2aW', 1),
(4, 'hien', 'nguyen', 'theRealNVH', 'hientadao@gmail.com', '$2y$10$fPpjawcgsaZTg3eopW.nCerIYJcyz215hmk27LnIXWS3SIDw9J4Pi', 0),
(5, 'Phùng', 'Khang', 'duykhangpdk', 'duykhangpdk@gmail.com', '$2y$10$HckJb688QHGTmmI3.Sqr5uE2nlH/wHr2nmf2a79y3ltO.akGHvH/2', 0),
(6, 'Reed', 'Richard', 'duykhangpdk0702', 'khangboi000@gmail.com', '$2y$10$f0/5n0W1791emfNLhrg5kunAbQ9V/vupzcEtIpbJPbU0xCzh4rJ2e', 0),
(7, 'Phùng', 'Khang', 'duykhangpdk03', 'duykhangpdk02@gmail.com', '$2y$10$7tVKyX2idW8o0qxS8y9XFOBN75vqyqeYZlvZrTBDZKaWvC5kSlRcG', 0),
(9, 'Khang', 'Phùng', 'admin', 'admin@gmail.com', '$2y$10$uF0bEH8PMFIMBXy6YfFBzOqSu50kaLtLydyn4JbvL1RjHhVwQsaQy', 1),
(10, 'Hien', 'Cu To', 'HienCuTo', 'cuto@gmail.com', '$2y$10$DB0uAsMV7s5bk2uHSdjggOA6qWneb0uE5kgVHY.m.DYLjhJaLyMSi', 0),
(11, 'AA', 'A', 'luccube', 'dinhluc@gmail.com', '$2y$10$NnsA6xfv9CZyCVLuda76ouLRagpCutL/CQHZ9DaeWan32lvjuJxO.', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `dateAddToWishlist` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `dateAddToWishlist`) VALUES
(19, 7, 2, '2021-04-20 12:53:58'),
(23, 7, 3, '2021-04-20 21:00:30'),
(50, 5, 2, '2021-04-21 18:07:53'),
(52, 5, 4, '2021-04-21 18:08:40'),
(64, 10, 3, '2021-04-24 14:12:47'),
(278, 6, 4, '2021-05-15 01:39:30'),
(279, 6, 5, '2021-05-15 01:39:31'),
(282, 3, 7, '2021-05-15 03:09:18'),
(283, 3, 8, '2021-05-15 03:09:21'),
(295, 9, 14, '2021-05-15 09:14:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminApproveId` (`adminApproveId`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Chỉ mục cho bảng `productsawaitapproved`
--
ALTER TABLE `productsawaitapproved`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellerId` (`sellerId`);

--
-- Chỉ mục cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersId` (`usersId`),
  ADD KEY `productsId` (`productsId`);

--
-- Chỉ mục cho bảng `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seller` (`userId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ids`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `productsawaitapproved`
--
ALTER TABLE `productsawaitapproved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`ids`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`adminApproveId`) REFERENCES `users` (`ids`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`userId`);

--
-- Các ràng buộc cho bảng `productsawaitapproved`
--
ALTER TABLE `productsawaitapproved`
  ADD CONSTRAINT `productsawaitapproved_ibfk_1` FOREIGN KEY (`sellerId`) REFERENCES `seller` (`userId`);

--
-- Các ràng buộc cho bảng `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`ids`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`productsId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchases_ibfk_3` FOREIGN KEY (`usersId`) REFERENCES `users` (`ids`),
  ADD CONSTRAINT `purchases_ibfk_4` FOREIGN KEY (`productsId`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `fk_seller` FOREIGN KEY (`userId`) REFERENCES `users` (`ids`),
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`ids`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`ids`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
