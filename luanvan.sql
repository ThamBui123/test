-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 28 Avril 2017 à 15:06
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `luanvan`
--

-- --------------------------------------------------------

--
-- Structure de la table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `daxem` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `binhluan`
--

INSERT INTO `binhluan` (`id`, `sanpham_id`, `khachhang_id`, `parent_id`, `noidung`, `daxem`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 0, 'Đây là sản phẩm tốt nhất tôi từng sữ dụng,  Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, ', '1', '1', '2017-01-20 01:45:30', '2017-01-20 01:45:30'),
(4, 4, 1, 1, 'Đây là sản phẩm tốt nhất tôi từng sữ dụng,  Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, ', '1', '0', '2017-01-20 01:45:30', '2017-02-06 21:10:40'),
(5, 4, 1, 0, 'Cám ơn bạn', '1', '1', '2017-02-10 00:34:23', '2017-02-10 00:34:23'),
(6, 9, 1, 0, 'Bình luận', '1', '1', '2017-02-16 00:29:19', '2017-02-16 00:31:37'),
(7, 9, 1, 0, 'Bình luận nữa', '1', '1', '2017-02-16 00:31:02', '2017-02-23 07:55:32'),
(8, 1, 1, 0, 'grerggessssssssssssssssssssss', '1', '1', '2017-02-28 19:19:44', '2017-03-02 04:03:29'),
(9, 4, 1, 0, 'Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng,', '1', '1', '2017-03-03 08:28:36', '2017-03-03 08:28:36'),
(10, 4, 1, 0, 'Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng,', '1', '1', '2017-03-03 08:30:17', '2017-03-03 08:30:17'),
(11, 4, 1, 4, 'Nguyễn Hoàng phút: \nĐây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng,', '1', '1', '2017-03-03 08:33:36', '2017-03-03 08:33:36'),
(14, 4, 1, 1, 'Nguyễn Hoàng phút: \nBình luận của bạn đã được gửi đi vui lòng đợi bình luận của bạn được duyệt', '1', '1', '2017-03-03 08:38:24', '2017-03-03 08:38:24'),
(15, 4, 1, 0, 'Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng, Đây là sản phẩm tốt nhất tôi từng sữ dụng,', '1', '1', '2017-03-05 18:10:32', '2017-04-06 12:01:22'),
(17, 21, 1, 0, 'Bình luận cho sản phẩm miếng dán tường', '1', '1', '2017-03-27 19:20:28', '2017-03-27 19:23:14'),
(18, 21, 1, 0, 'Bình luận cho sản phẩm miếng dán tường', '1', '1', '2017-03-27 19:23:33', '2017-03-27 19:58:32'),
(19, 21, 1, 17, 'Xin chào bạn bình luận gì thế nhỉ', '1', '1', '2017-03-27 19:46:51', '2017-03-27 19:58:27'),
(20, 21, 1, 0, 'Xin chào các bạn đây là bình luận của mình', '1', '1', '2017-04-02 07:39:35', '2017-04-06 12:00:07');

-- --------------------------------------------------------

--
-- Structure de la table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `donhang_id` int(11) DEFAULT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` bigint(20) NOT NULL,
  `dagiao` int(11) NOT NULL,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`donhang_id`, `sanpham_id`, `soluong`, `giaban`, `dagiao`, `options`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 2590000, 1, '', '2017-01-17 19:15:47', '2017-01-17 19:15:47'),
(11, 2, 1, 2180000, 1, '', '2017-01-17 19:24:56', '2017-01-17 19:24:56'),
(11, 3, 1, 9390000, 1, '', '2017-01-17 19:24:56', '2017-01-17 19:24:56'),
(12, 4, 1, 14090000, 1, '', '2017-02-06 21:08:00', '2017-02-06 21:08:00'),
(13, 5, 1, 16090000, 1, '', '2017-02-06 21:08:56', '2017-02-06 21:08:56'),
(15, 6, 1, 3390000, 1, '', '2017-02-16 05:05:59', '2017-02-16 05:05:59'),
(17, 7, 1, 11090000, 1, '', '2017-02-16 05:49:43', '2017-02-16 05:49:43'),
(18, 8, 1, 390000, 1, '', '2017-02-16 23:30:48', '2017-02-16 23:30:48'),
(19, 9, 1, 220000, 1, '', '2017-02-24 18:41:27', '2017-02-24 18:41:27'),
(20, 10, 1, 340000, 1, '', '2017-02-24 18:45:22', '2017-02-24 18:45:22'),
(22, 11, 1, 390000, 1, '', '2017-02-26 00:06:48', '2017-02-26 00:06:48'),
(23, 12, 1, 1080000, 1, '', '2017-02-26 00:16:26', '2017-02-26 00:16:26'),
(24, 13, 1, 390000, 1, '', '2017-03-12 19:42:59', '2017-03-12 19:42:59'),
(24, 14, 1, 170000, 1, '', '2017-03-12 19:42:59', '2017-03-12 19:42:59'),
(25, 15, 1, 430000, 1, '', '2017-03-12 23:58:18', '2017-03-12 23:58:18'),
(26, 16, 1, 320000, 1, '', '2017-03-14 20:08:39', '2017-03-14 20:08:39'),
(27, 17, 1, 160000, 1, '', '2017-03-18 18:20:28', '2017-03-18 18:20:28'),
(29, 19, 1, 670000, 1, '', '2017-03-18 19:03:01', '2017-03-18 19:03:01'),
(30, 20, 1, 540000, 1, '', '2017-03-18 19:05:46', '2017-03-18 19:05:46'),
(30, 21, 1, 19890000, 1, '', '2017-03-18 19:05:46', '2017-03-18 19:05:46'),
(31, 22, 1, 220000, 1, '', '2017-03-18 19:06:55', '2017-03-18 19:06:55'),
(32, 23, 1, 120000, 1, '', '2017-03-18 19:09:16', '2017-03-18 19:09:16'),
(33, 24, 1, 320000, 1, '', '2017-03-18 19:16:06', '2017-03-18 19:16:06'),
(34, 25, 1, 155000, 1, '', '2017-03-19 05:14:14', '2017-03-19 05:14:14'),
(35, 26, 1, 240000, 1, '', '2017-03-19 23:42:10', '2017-03-19 23:42:10'),
(35, 27, 1, 210000, 1, '', '2017-03-19 23:42:10', '2017-03-19 23:42:10'),
(38, 31, 1, 200000, 1, '', '2017-03-21 00:05:40', '2017-03-21 00:05:40'),
(38, 34, 1, 200000, 1, '', '2017-03-21 00:05:40', '2017-03-21 00:05:40'),
(39, 35, 1, 130000, 1, '', '2017-03-21 04:50:34', '2017-03-21 04:50:34'),
(40, 35, 1, 120000, 1, '', '2017-04-28 11:12:18', '2017-04-28 11:12:18'),
(41, 31, 1, 200000, 1, '', '2017-04-28 11:24:40', '2017-04-28 11:24:40'),
(42, 21, 1, 19890000, 1, '', '2017-04-28 11:33:04', '2017-04-28 11:33:04'),
(43, 4, 1, 14090000, 1, '', '2017-04-28 11:34:46', '2017-04-28 11:34:46');

-- --------------------------------------------------------

--
-- Structure de la table `chitietnhaphang`
--

CREATE TABLE `chitietnhaphang` (
  `nhaphang_id` int(11) DEFAULT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `gianhap` bigint(20) NOT NULL,
  `soluongnhap` bigint(20) NOT NULL,
  `ghichuchitiet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chitietnhaphang`
--

INSERT INTO `chitietnhaphang` (`nhaphang_id`, `sanpham_id`, `gianhap`, `soluongnhap`, `ghichuchitiet`, `created_at`, `updated_at`) VALUES
(51, 1, 2500000, 101, '', '2017-04-27 12:13:34', '2017-04-27 12:13:34'),
(51, 2, 2090000, 101, '', '2017-04-27 12:13:34', '2017-04-27 12:13:34'),
(51, 3, 9300000, 101, '', '2017-04-27 12:13:34', '2017-04-27 12:13:34'),
(51, 4, 14000000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 5, 16000000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 6, 3300000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 7, 11000000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 8, 300000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 9, 130000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 10, 250000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 11, 300000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 12, 990000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 13, 300000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 14, 80000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 15, 340000, 101, '', '2017-04-27 12:13:35', '2017-04-27 12:13:35'),
(51, 16, 230000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 17, 70000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 19, 580000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 20, 450000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 21, 19800000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 22, 130000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 23, 30000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 24, 230000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 25, 65000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 26, 150000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 27, 120000, 101, '', '2017-04-27 12:13:36', '2017-04-27 12:13:36'),
(51, 31, 110000, 101, '', '2017-04-27 12:13:37', '2017-04-27 12:13:37'),
(51, 34, 110000, 101, '', '2017-04-27 12:13:37', '2017-04-27 12:13:37'),
(51, 35, 40000, 101, '', '2017-04-27 12:13:37', '2017-04-27 12:13:37'),
(52, 36, 49000, 100, 'Nhập hàng mới', '2017-04-28 12:30:11', '2017-04-28 12:30:11');

-- --------------------------------------------------------

--
-- Structure de la table `chitietuathich`
--

CREATE TABLE `chitietuathich` (
  `sanpham_id` int(11) DEFAULT NULL,
  `uathich_id` int(11) DEFAULT NULL,
  `ghichuuathich` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `chitietuathich`
--

INSERT INTO `chitietuathich` (`sanpham_id`, `uathich_id`, `ghichuuathich`, `created_at`, `updated_at`) VALUES
(4, 1, '', '2017-01-20 17:57:19', '2017-01-20 17:57:19'),
(1, 1, '', '2017-01-20 18:00:27', '2017-01-20 18:00:27'),
(5, 1, '', '2017-02-03 02:48:42', '2017-02-03 02:48:42'),
(7, 1, '', '2017-02-16 00:14:01', '2017-02-16 00:14:01'),
(8, 1, '', '2017-02-16 00:14:28', '2017-02-16 00:14:28'),
(6, 1, '', '2017-02-16 00:14:39', '2017-02-16 00:14:39'),
(9, 1, '', '2017-02-16 00:14:59', '2017-02-16 00:14:59'),
(13, 1, '', '2017-02-24 19:49:32', '2017-02-24 19:49:32'),
(14, 1, '', '2017-03-04 23:50:09', '2017-03-04 23:50:09');

-- --------------------------------------------------------

--
-- Structure de la table `cuahang`
--

CREATE TABLE `cuahang` (
  `tencuahang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cuahang`
--

INSERT INTO `cuahang` (`tencuahang`, `diachi`, `gioithieu`, `sodienthoai`, `email`, `created_at`, `updated_at`) VALUES
('OpenShop', '123 Xuân Khánh, Ninh Kiều, Cần Thơ', 'Website bán hàng online chất lượng cao, mua sắm thả ra, rinh quà về nhà', '01239614554', 'styput995@gmail.com', '2017-04-11 11:52:52', '2017-04-11 11:52:53');

-- --------------------------------------------------------

--
-- Structure de la table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `madonhang` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `phuongthuctt_id` int(11) DEFAULT NULL,
  `phuongthucvc_id` int(11) DEFAULT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `ngaydat` datetime NOT NULL,
  `ngaynhan` datetime DEFAULT NULL,
  `options` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichudonhang` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichukhachhang` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tinhtrangdonhang` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `donhang`
--

INSERT INTO `donhang` (`id`, `madonhang`, `nhanvien_id`, `phuongthuctt_id`, `phuongthucvc_id`, `khachhang_id`, `ngaydat`, `ngaynhan`, `options`, `ghichudonhang`, `ghichukhachhang`, `tinhtrangdonhang`, `trangthai`, `created_at`, `updated_at`) VALUES
(10, '1484705747', 1, 1, 1, 1, '2017-01-18 02:15:47', '2017-03-12 12:14:22', '{"phivanchuyen":0,"phantramgiamgia":0}', '', NULL, '2', '1', '2017-01-17 19:15:47', '2017-03-12 05:14:22'),
(11, '1484706295', 1, 1, 1, 1, '2017-01-18 02:24:55', '2014-01-12 19:22:00', '{"phivanchuyen":0,"phantramgiamgia":0}', NULL, NULL, '2', '1', '2017-01-17 19:24:55', '2017-02-03 23:08:55'),
(12, '1486440480', 1, 1, 1, 1, '2017-02-07 04:08:00', '2017-03-11 12:54:54', '{"phivanchuyen":0,"phantramgiamgia":0}', 'Ghi chú', '', '2', '1', '2017-02-06 21:08:00', '2017-03-11 05:54:54'),
(13, '1486440536', 1, 1, 1, 1, '2017-02-07 04:08:56', '2016-02-07 04:15:51', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-06 21:08:56', '2017-02-06 21:15:51'),
(15, '1487246759', 1, 1, 1, 1, '2017-02-16 12:05:59', '2017-03-11 12:56:15', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Thanh toán nhanh choa tui nhé', '2', '1', '2017-02-16 05:05:59', '2017-03-11 05:56:15'),
(17, '1487249383', 1, 1, 1, 1, '2017-02-16 12:49:43', '2017-03-10 12:54:31', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-16 05:49:43', '2017-03-11 05:54:31'),
(18, '1487313048', 1, 1, 1, 1, '2017-02-17 06:30:48', '2017-03-09 12:54:31', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-16 23:30:48', '2017-03-11 05:54:19'),
(19, '1487986887', 1, 1, 1, 1, '2017-02-25 01:41:27', '2017-03-01 12:54:31', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Ghi chu', '2', '1', '2017-02-24 18:41:27', '2017-03-11 05:53:58'),
(20, '1487987122', 1, 1, 1, 1, '2017-02-25 01:45:22', '2017-03-04 11:44:54', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-24 18:45:22', '2017-03-04 04:44:54'),
(22, '1488092808', 1, 1, 1, 1, '2017-02-26 07:06:48', '2014-03-04 11:43:59', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-26 00:06:48', '2017-03-04 04:43:59'),
(23, '1488093386', 1, 1, 1, 1, '2017-02-26 07:16:26', '2017-03-12 12:19:10', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-02-26 00:16:26', '2017-03-12 05:19:10'),
(24, '1489372979', 1, 1, 1, 1, '2017-03-13 02:42:59', '2017-03-13 03:47:48', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-12 19:42:59', '2017-03-12 20:47:48'),
(25, '1489388298', 1, 1, 1, 1, '2017-03-13 06:58:18', '2017-03-13 07:00:50', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Ghi chú', '2', '1', '2017-03-12 23:58:18', '2017-03-13 20:37:22'),
(26, '1489547319', 1, 1, 1, 1, '2017-03-15 03:08:39', '2017-03-15 03:10:00', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Gửi nhanh cho tôi', '2', '1', '2017-03-14 20:08:39', '2017-03-14 20:10:00'),
(27, '1489886428', 1, 1, 1, 1, '2017-03-19 01:20:28', '2017-03-19 01:23:13', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Vận chuyển đến tận nhà cho tui nhé :)))', '2', '1', '2017-03-18 18:20:28', '2017-03-18 18:23:13'),
(28, '1489887427', 1, 1, 1, 1, '2017-03-19 01:37:07', '2017-03-18 01:37:43', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 18:37:07', '2017-03-18 18:37:43'),
(29, '1489888981', 1, 1, 1, 1, '2017-03-19 02:03:01', '2017-03-19 02:10:17', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 19:03:01', '2017-03-18 19:10:17'),
(30, '1489889146', 1, 1, 1, 1, '2017-03-19 02:05:46', '2017-03-19 02:10:40', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 19:05:46', '2017-03-18 19:10:40'),
(31, '1489889215', 1, 1, 1, 1, '2017-03-19 02:06:55', '2017-03-17 02:11:20', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 19:06:55', '2017-03-18 19:11:21'),
(32, '1489889356', 1, 1, 1, 1, '2017-03-19 02:09:16', '2017-03-19 02:11:58', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 19:09:16', '2017-03-18 19:11:58'),
(33, '1489889765', 1, 1, 1, 1, '2017-03-19 02:16:05', '2017-03-19 13:57:30', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-18 19:16:05', '2017-03-19 06:57:30'),
(34, '1489925654', 1, 1, 1, 1, '2017-03-19 12:14:14', '2017-03-21 06:35:29', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-19 05:14:14', '2017-03-20 23:35:29'),
(35, '1489992130', 1, 1, 1, 1, '2017-03-20 06:42:10', '2017-03-21 07:02:13', '{"phivanchuyen":0,"phantramgiamgia":0}', 'Ghi chú', '', '2', '1', '2017-03-19 23:42:10', '2017-03-21 00:02:13'),
(38, '1490079940', 1, 1, 1, 1, '2017-04-21 07:05:40', '2017-04-22 07:09:19', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-03-21 00:05:40', '2017-03-21 00:09:19'),
(39, '1490097034', 1, 1, 1, 1, '2017-04-21 11:50:34', '2017-04-23 12:51:06', '{"phivanchuyen":0,"phantramgiamgia":0}', 'Giao hàng cho sản phẩm', '', '2', '1', '2017-03-21 04:50:34', '2017-03-21 05:51:06'),
(40, '1493377938', 1, 1, 1, 1, '2017-04-28 18:12:18', '2017-04-28 18:15:33', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-04-28 11:12:18', '2017-04-28 11:15:33'),
(41, '1493378679', 1, 1, 1, 30, '2017-04-28 18:24:39', '2017-04-28 18:52:33', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-04-28 11:24:39', '2017-04-28 11:52:33'),
(42, '1493379184', 1, 1, 1, 1, '2017-04-28 18:33:04', '2017-04-25 19:41:47', '{"phivanchuyen":0,"phantramgiamgia":0}', '', 'Giao hàng cho tui nhé', '2', '1', '2017-04-28 11:33:04', '2017-04-28 12:41:47'),
(43, '1493379286', 1, 1, 1, 31, '2017-04-28 18:34:46', '2017-04-28 19:41:21', '{"phivanchuyen":0,"phantramgiamgia":0}', '', '', '2', '1', '2017-04-28 11:34:46', '2017-04-28 12:41:21');

-- --------------------------------------------------------

--
-- Structure de la table `facebookkhachhang`
--

CREATE TABLE `facebookkhachhang` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `facebook_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `facebookkhachhang`
--

INSERT INTO `facebookkhachhang` (`id`, `khachhang_id`, `facebook_id`, `created_at`, `updated_at`) VALUES
(6, 1, '1240490162737435', '2017-04-27 12:35:55', '2017-04-27 12:35:55');

-- --------------------------------------------------------

--
-- Structure de la table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logohang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slughsx` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`id`, `tenhang`, `logohang`, `slughsx`, `trangthai`, `created_at`, `updated_at`) VALUES
(3, 'Samsung', '414b8074640d69e0570762669d010149.png', 'samsung', '1', '2016-12-31 05:05:14', '2017-02-28 00:11:07'),
(4, 'Asus', '636982c221c883a570c27367545085c9.png', 'asus', '1', '2017-02-08 05:30:18', '2017-02-09 22:57:17'),
(5, 'HTC', '32f08c9dbb0f0befa41a90c1144bcecd.jpg', 'htc', '1', '2017-02-09 22:57:00', '2017-02-09 22:57:00'),
(6, 'Khác', '7c4f8287386aaf2cf47cd13fb4cfd0a2.jpg', 'khac', '1', '2017-02-10 04:27:06', '2017-03-12 19:13:27'),
(7, 'Dell', '4850f04bcce3ce66df985d0e2e204e27.png', 'dell', '1', '2017-03-12 19:15:03', '2017-03-12 19:15:03'),
(8, 'Xiaomi', '2b959144a6cb574b0c0cfd2872465db9.png', 'xiaomi', '1', '2017-03-12 19:17:08', '2017-03-12 19:17:30');

-- --------------------------------------------------------

--
-- Structure de la table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `lienket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenhinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id`, `sanpham_id`, `lienket`, `tenhinh`, `created_at`, `updated_at`) VALUES
(1, 1, '55d4338d45e15f06affa0bf6eac126f1.jpg', 'Samsung Core 2', '2016-12-31 06:28:23', '2016-12-31 06:28:23'),
(2, 1, '537c66ba6e3b45d8c80847357c296922.jpg', 'Samsung Core 2', '2016-12-31 06:28:23', '2016-12-31 06:28:23'),
(3, 1, '0f56301e504aab66f8a968768fb78758.jpg', 'Samsung Core 2', '2016-12-31 06:28:23', '2016-12-31 06:28:23'),
(4, 1, '459fd977a096ed96fe17d8af8debd87c.jpg', 'Samsung Core 2', '2016-12-31 06:28:23', '2016-12-31 06:28:23'),
(5, 1, '9ec6e075484e3e1d1f459fe8008dc755.jpg', 'Samsung Core 2', '2016-12-31 06:28:24', '2016-12-31 06:28:24'),
(6, 2, '74adb558a769dd0046a21fe88494d628.jpg', 'Samsung Core 3', '2016-12-31 06:44:40', '2016-12-31 06:44:40'),
(7, 2, '24dab633bb24438df121fd99899a71af.jpg', 'Samsung Core 3', '2016-12-31 06:44:40', '2016-12-31 06:44:40'),
(8, 2, '3c5c99eec989c22f821e0bf4766a7c5c.jpg', 'Samsung Core 3', '2016-12-31 06:44:40', '2016-12-31 06:44:40'),
(9, 3, '42b5adfa63b7d49d514ef5b06831102a.jpg', 'Samsung S6', '2016-12-31 22:17:25', '2016-12-31 22:17:25'),
(10, 3, 'b09eea5dc71fdc66258e031c2e7f6446.jpg', 'Samsung S6', '2016-12-31 22:17:25', '2016-12-31 22:17:25'),
(11, 3, '07134d8bbd67b2b3a570e099c94fec5e.jpg', 'Samsung S6', '2016-12-31 22:17:25', '2016-12-31 22:17:25'),
(12, 3, '958586d318ac240273d0d06744394d4b.jpg', 'Samsung S6', '2016-12-31 22:17:26', '2016-12-31 22:17:26'),
(13, 4, '958586d318ac240273d0d06744394d4b.jpg', 'Samsung S6', '2016-12-31 22:17:26', '2016-12-31 22:17:26'),
(14, 4, '958586d318ac240273d0d06744394d4b.jpg', 'Samsung S6', '2016-12-31 22:17:26', '2016-12-31 22:17:26'),
(15, 5, '868ab5211504a87fd432b5769b918415.jpg', 'Iphone 6 Plus', '2017-01-04 05:13:00', '2017-01-04 05:13:00'),
(16, 5, '7502bed0150cf4d39343e7d376be84c8.jpg', 'Iphone 6 Plus', '2017-01-04 05:13:00', '2017-01-04 05:13:00'),
(17, 5, '909adb0cdd624fe8a96ddd564bde71b2.jpg', 'Iphone 6 Plus', '2017-01-04 05:13:00', '2017-01-04 05:13:00'),
(18, 6, '016b5cd487811b1ff786b1699ecea0aa.png', 'Điện thoại Asus Zenfone 2 Laser 6" ZE601KL', '2017-01-04 05:14:35', '2017-01-04 05:14:35'),
(20, 6, 'c3633199e6cefe6afe99ed650570b38b.jpg', 'Điện thoại Asus Zenfone 2 Laser 6" ZE601KL', '2017-02-09 22:58:34', '2017-02-09 22:58:34'),
(21, 7, '086ec3a10265fb9a547402f2d0b99946.jpg', 'SMART TIVI LG 49 INCH 49LH605T', '2017-02-10 00:57:30', '2017-02-10 00:57:30'),
(22, 7, '0125d798db00a67dcfd239383892170a.jpg', 'SMART TIVI LG 49 INCH 49LH605T', '2017-02-10 00:57:30', '2017-02-10 00:57:30'),
(23, 7, '7b04e46bc6f94a3b65d13a426cf954ac.jpg', 'SMART TIVI LG 49 INCH 49LH605T', '2017-02-10 00:57:30', '2017-02-10 00:57:30'),
(24, 8, '0de995ab314e610cdb6629b61763cfb0.jpg', 'Áo khoác da nam lót lông VNXK AK91', '2017-02-10 01:17:13', '2017-02-10 01:17:13'),
(25, 8, '4ce3140ba90b378d4153a29d628ba198.jpg', 'Áo khoác da nam lót lông VNXK AK91', '2017-02-10 01:17:13', '2017-02-10 01:17:13'),
(26, 8, '1fa07f8c93690ee0aef303b906311db9.jpg', 'Áo khoác da nam lót lông VNXK AK91', '2017-02-10 01:17:13', '2017-02-10 01:17:13'),
(27, 9, '44ddbff78c2aeda2cd0daca7ca97ecff.jpg', '5Giày vải Nỉ cho bé(không phải giày tập đi)', '2017-02-10 04:29:11', '2017-02-10 04:29:11'),
(28, 10, '5bf3345c3affa42b70f18c568ceb6a3f.jpg', 'SỈ TỦ GỖ CAO CẤP 3 BUỒNG 8 NGĂN 300K', '2017-02-24 07:59:48', '2017-02-24 07:59:48'),
(29, 10, '23dc6649313292d53adf4206fd3a4a09.jpg', 'SỈ TỦ GỖ CAO CẤP 3 BUỒNG 8 NGĂN 300K', '2017-02-24 07:59:48', '2017-02-24 07:59:48'),
(30, 10, '204094c43e8bb5b730245bedb18624ae.jpg', 'SỈ TỦ GỖ CAO CẤP 3 BUỒNG 8 NGĂN 300K', '2017-02-24 07:59:48', '2017-02-24 07:59:48'),
(31, 11, 'cb87840ce35f4c7d74e89421c01eb1cf.jpg', 'Tủ vải khung gỗ', '2017-02-24 08:05:02', '2017-02-24 08:05:02'),
(32, 11, '4889e52d40bf54b7e4649c1b4c41a354.jpg', 'Tủ vải khung gỗ', '2017-02-24 08:05:02', '2017-02-24 08:05:02'),
(33, 11, '3d96583d750f984745545324a1dbb4c2.jpg', 'Tủ vải khung gỗ', '2017-02-24 08:05:03', '2017-02-24 08:05:03'),
(34, 12, '9e58139a1fc8ccea97eed190ea3b4b27.jpg', 'Giường hơi toto cao cấp', '2017-02-24 08:10:47', '2017-02-24 08:10:47'),
(35, 12, 'c7e1c099ae301f994bf3a0ada3cb33bf.jpg', 'Giường hơi toto cao cấp', '2017-02-24 08:10:47', '2017-02-24 08:10:47'),
(36, 12, 'b5d245b88c66cc6f9cda0eea44b912c2.jpg', 'Giường hơi toto cao cấp', '2017-02-24 08:10:47', '2017-02-24 08:10:47'),
(37, 12, 'c76d9ca62583c971485163b791d9cada.jpg', 'Giường hơi toto cao cấp', '2017-02-24 08:10:47', '2017-02-24 08:10:47'),
(38, 13, '21003186b8e430c69a6da85fa34cb50a.jpg', 'Sữa rửa mặt La roche posay', '2017-02-24 08:17:24', '2017-02-24 08:17:24'),
(39, 13, 'da52ab840edf9f05c9d968b289e66322.jpg', 'Sữa rửa mặt La roche posay', '2017-02-24 08:17:24', '2017-02-24 08:17:24'),
(40, 14, '8a86feebf45e4c659364aaa1b7c82042.jpg', 'Xịt khoáng Laneige', '2017-02-24 08:19:19', '2017-02-24 08:19:19'),
(41, 15, 'be0f3e4f4208c22c2f794f5102ec3aa4.jpg', 'Áo khoác Real 2015-2016 trắng xanh super fake Thái Lan', '2017-02-24 08:26:15', '2017-02-24 08:26:15'),
(42, 16, '87ca6230348aeaa8394a276b5bd16cee.jpg', 'Váy Voan Hoa Hàn Quốc Dài Tay Bèo Tầng Chân Váy', '2017-02-24 17:04:35', '2017-02-24 17:04:35'),
(43, 16, 'ce3969ea81afea88ccdaba24d52f99e7.jpg', 'Váy Voan Hoa Hàn Quốc Dài Tay Bèo Tầng Chân Váy', '2017-02-24 17:04:35', '2017-02-24 17:04:35'),
(44, 16, '4580c3b7f3b8ac94b049a8d366f253f4.jpg', 'Váy Voan Hoa Hàn Quốc Dài Tay Bèo Tầng Chân Váy', '2017-02-24 17:04:35', '2017-02-24 17:04:35'),
(45, 17, '2ac380f56ead46074f2c57bbd0ad97fe.jpg', 'Xăng Đan Da Lộn Cao Gót Kéo Khóa Sau', '2017-02-24 17:07:50', '2017-02-24 17:07:50'),
(46, 17, '619c1de6c0820186852a58c3381028c0.jpg', 'Xăng Đan Da Lộn Cao Gót Kéo Khóa Sau', '2017-02-24 17:07:50', '2017-02-24 17:07:50'),
(47, 17, '2a0c9b7922e08c6b4e0734e729744c65.jpg', 'Xăng Đan Da Lộn Cao Gót Kéo Khóa Sau', '2017-02-24 17:07:50', '2017-02-24 17:07:50'),
(49, 19, 'f9581c12d7fefcfa863795f2d1013627.jpg', 'TIVI BOX INTERNET MXQ-K4 TIVI THƯỜNG THÀNH TIVI INTERNET', '2017-03-12 18:22:30', '2017-03-12 18:22:30'),
(50, 20, 'b71725ad7cbc5dec2d9469ca7d1718b3.jpg', 'Đầu Box TV - Biến Tivi Thường Thành Smart TV', '2017-03-12 18:26:35', '2017-03-12 18:26:35'),
(51, 20, '068323eb0e982ec0643088c888f6c665.jpg', 'Đầu Box TV - Biến Tivi Thường Thành Smart TV', '2017-03-12 18:26:35', '2017-03-12 18:26:35'),
(52, 20, '6f0ec5af3e5cca1110a6d6f7934ef390.jpg', 'Đầu Box TV - Biến Tivi Thường Thành Smart TV', '2017-03-12 18:26:35', '2017-03-12 18:26:35'),
(53, 20, '54bf804b10a561bc00bcd0af9039f714.jpg', 'Đầu Box TV - Biến Tivi Thường Thành Smart TV', '2017-03-12 18:26:35', '2017-03-12 18:26:35'),
(54, 21, '527b304e1cf6edda42c4ee12262e8b99.jpg', 'Laptop Dell Vostro 3568 15.6inch', '2017-03-12 18:29:53', '2017-03-12 18:29:53'),
(55, 22, 'a9e957c683383d196d83f556752031ac.jpg', 'Skin Perfecting 2% BHA Liquid Exfoliant 30ml', '2017-03-12 18:35:56', '2017-03-12 18:35:56'),
(56, 23, 'b74826089fb928b276af1b30d209ad23.jpg', 'SỮA RỬA MẶT NIVEA MEN - THÁI LAN', '2017-03-12 18:39:59', '2017-03-12 18:39:59'),
(57, 24, '2c37743b0e11f9090e8c8cb2e71f4f42.jpg', 'ÁO DÀI HOA HỒNG KÈM MẤN MẸ BÉ mẹ bé: 280 áo mẹ: 210 ', '2017-03-12 18:42:44', '2017-03-12 18:42:44'),
(58, 25, '940d8a9a3e2b39292c2bd89acb59a5c6.jpg', 'VÒI SEN TĂNG ÁP', '2017-03-12 19:21:50', '2017-03-12 19:21:50'),
(59, 25, '530405672a6246db4427be96b137006e.jpg', 'VÒI SEN TĂNG ÁP', '2017-03-12 19:21:50', '2017-03-12 19:21:50'),
(60, 25, '6a0b4e13fe19595d10ec01c2d937a655.jpg', 'VÒI SEN TĂNG ÁP', '2017-03-12 19:21:50', '2017-03-12 19:21:50'),
(61, 26, '00245373e1d47ac9325abe2fdb7ce4ff.jpg', 'Miếng dán tường bếp', '2017-03-12 19:24:25', '2017-03-12 19:24:25'),
(62, 26, '88b168f0c2eb90954aec15e6be3fa706.jpg', 'Miếng dán tường bếp', '2017-03-12 19:24:25', '2017-03-12 19:24:25'),
(63, 27, '81f1b3bec2ff8a17dbb68663a0490efa.jpg', 'Đồng hồ thông minh SmartWatch DZ09', '2017-03-27 20:07:27', '2017-03-27 20:07:27'),
(64, 27, '8fba1e1bff73196c6c36eabcfc0e51cc.jpg', 'Đồng hồ thông minh SmartWatch DZ09', '2017-03-27 20:07:27', '2017-03-27 20:07:27'),
(65, 27, 'f088112ff608e0a37bbe028c245a75a8.jpg', 'Đồng hồ thông minh SmartWatch DZ09', '2017-03-27 20:07:28', '2017-03-27 20:07:28'),
(66, 27, '6573c511a8fb5e23d6e3bb7c0f8d97a3.jpg', 'Đồng hồ thông minh SmartWatch DZ09', '2017-03-27 20:07:28', '2017-03-27 20:07:28'),
(67, 31, '739247570b3069be6fcd68fae1ef0d7e.jpg', 'Bộ đồ đá bóng manchester city 2016 - 2017', '2017-04-27 06:47:53', '2017-04-27 06:47:53'),
(68, 31, 'b3fb65b5a5441ba161c79c753c651ca4.jpg', 'Bộ đồ đá bóng manchester city 2016 - 2017', '2017-04-27 06:49:33', '2017-04-27 06:49:33'),
(69, 31, '2740d17d81e61958914b7f5671bd4da9.jpg', 'Bộ đồ đá bóng manchester city 2016 - 2017', '2017-04-27 06:50:53', '2017-04-27 06:50:53'),
(70, 34, 'bc2b2f7d42d589d62655000f090a60fc.jpg', 'Túi du lịch nhở', '2017-04-27 07:14:58', '2017-04-27 07:14:58'),
(71, 34, '0ac84d6e628de8f567255ac6a4f8f057.jpg', 'Vali túi du lịch', '2017-04-27 07:18:03', '2017-04-27 07:18:03'),
(72, 35, '81139fcf38a52f167df64a43a5e0df52.jpg', 'Lotion kích trắng da body White Body Magic Flowers - Body Magic', '2017-04-27 07:26:18', '2017-04-27 07:26:18'),
(73, 35, '93a63b1e246604a2abb3dcb3f3622983.jpg', 'Lotion kích trắng da body White Body Magic Flowers - Body Magic', '2017-04-27 07:26:18', '2017-04-27 07:26:18'),
(74, 35, '6ca1e97da009546cc1e17e460254636e.jpg', 'Lotion kích trắng da body White Body Magic Flowers - Body Magic', '2017-04-27 07:26:18', '2017-04-27 07:26:18'),
(76, 36, '791889db61bf6f50f65870d52faf3e4c.jpg', 'Xịt ngăn mùi nam mát lạnh NIVEA MEN Cool Kick 150ml ', '2017-04-28 12:32:47', '2017-04-28 12:32:47'),
(77, 36, '565d46fc6b064839539e9117fdfffe48.jpg', 'Xịt ngăn mùi nam mát lạnh NIVEA MEN Cool Kick 150ml ', '2017-04-28 12:33:55', '2017-04-28 12:33:55');

-- --------------------------------------------------------

--
-- Structure de la table `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoaikh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaikh` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `khachhang`
--

INSERT INTO `khachhang` (`id`, `email`, `password`, `sodienthoaikh`, `hovaten`, `gioitinh`, `ngaysinh`, `diachi`, `loaikh`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'styput1995@gmail.com', '$2y$10$QNk.ei5sO0l7cP1TnMyEHuTI5mPFZwzz4YSLtuchvWinBE3RB36Iu', '01886502858', 'Nguyễn Hoàng Phút', '1', '1995-11-16', 'Thới Bình, Thới Bình, Cà Mau', '1', '1', 'aOzONjN6AEbOpGhWTwEQJqKUYV0PNVIFWq8v3xs2CHX8J56U4h6yWR7Nbaw9', '2017-01-13 22:34:16', '2017-04-28 11:33:27'),
(30, '', NULL, '01239614554', 'Trần Hùng Tuấn Anh', '0', NULL, 'Cái Răng, Cần Thơ', '0', '1', NULL, '2017-04-28 11:24:39', '2017-04-28 11:24:39'),
(31, '', NULL, '01239614554', 'Nguyễn Khoa Trường', '0', NULL, 'Đồng Tháp', '0', '1', NULL, '2017-04-28 11:34:46', '2017-04-28 11:34:46');

-- --------------------------------------------------------

--
-- Structure de la table `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int(11) NOT NULL,
  `maso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phantramgiamgia` int(11) NOT NULL,
  `ngayhethan` date NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `magiamgia`
--

INSERT INTO `magiamgia` (`id`, `maso`, `phantramgiamgia`, `ngayhethan`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '9HYQt67', 10, '2017-02-26', '1', '2017-01-19 02:24:50', '2017-02-24 17:24:23'),
(2, 'BxuGqP', 10, '2017-02-28', '2', '2017-02-24 17:20:33', '2017-02-24 17:24:49'),
(3, 'dsdasdasdsa', 10, '2017-04-29', '1', '2017-03-12 20:54:59', '2017-04-25 07:06:33');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(11) NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_12_18_160819_create_khachhang_table', 1),
(4, '2016_12_18_161219_create_phuongthuctt_table', 1),
(5, '2016_12_18_161303_create_donhang_table', 1),
(6, '2016_12_18_161331_create_phuongthucvc_table', 1),
(7, '2016_12_18_161355_create_sanpham_table', 1),
(8, '2016_12_18_161421_create_hangsanxuat_table', 1),
(9, '2016_12_18_161504_create_binhluan_table', 1),
(10, '2016_12_18_161525_create_uathich_table', 1),
(11, '2016_12_18_161602_create_cuahang_table', 1),
(12, '2016_12_18_161621_create_sosanh_table', 1),
(13, '2016_12_19_135546_create_chitietsosanh_table', 1),
(14, '2016_12_19_135725_create_chitietuathich_table', 1),
(15, '2016_12_19_140010_create_chitietdonhang_table', 1),
(16, '2016_12_19_140136_create_phieunhap_table', 1),
(17, '2016_12_19_140231_create_chitietphieunhap_table', 1),
(18, '2016_12_19_140438_create_theloai_table', 1),
(19, '2016_12_19_140733_create_hinhsanpham_table', 1),
(20, '2016_12_28_151114_create_thuoctinh_table', 1),
(21, '2016_12_29_033950_create_magiamgia_table', 1),
(22, '2016_12_29_034909_create_thuoctinhchitiet_table', 1),
(23, '2016_12_31_105947_create_nhomsanpham_table', 1),
(24, '2017_01_14_055708_create_nhanvien_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `nhomquyen_id` int(11) DEFAULT NULL,
  `manhanvien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoainv` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `ngaysinh` date NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `nhomquyen_id`, `manhanvien`, `email`, `password`, `sodienthoainv`, `hovaten`, `gioitinh`, `ngaysinh`, `diachi`, `trangthai`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'B1304881', 'styput1995@gmail.com', '$2y$10$07lJu2au6N8elLOd9ZMbQej0bUqPCQMe.GbbibBySG8dnDOecPogG', '01886502858', 'Administrator', '1', '1995-11-16', 'Thới Bình, Thới Bình, Cà Mau', '1', '3slZ1CicO2o9JT7mqbyQrDfGwqYrHZheIQvMhAYz12Wg1cQhP6fCS7VqXjMd', '2017-01-14 07:25:54', '2017-04-10 14:07:59'),
(2, 4, 'B1304882', 'styput1996@gmail.com', '$2y$10$lQZ8q6/wepI4KLiVrv4l8u3lMlQCVX1hiVixoZuDOgcvWaJcCXaQu', '01886502858', 'Nguyễn Hoàng Phút', '1', '1995-11-13', 'Thới Bình, Thới Bình, Cà Mau', '1', 'Oto8bsGfnwt50fBllFoFDrxCZYjKZAGVay2UJNIxEHnEHI1Q0unnVKSZgR1R', '2017-01-14 07:25:54', '2017-02-23 23:34:13'),
(4, 3, 'NV123456789', 'styput1998@gmail.com', '$2y$10$d0ey8JuFDTj2xWoNxAGbRutx97vbrPiHVxJrQvEQuCp/Nq/4IkM6q', '0123456789', 'Nguyễn Gì Đó', '0', '1995-11-15', 'Thới Bình, Thới Bình, Cà Mau', '1', NULL, '2017-02-23 23:51:23', '2017-02-24 00:16:26'),
(5, 4, 'NV1487921047', 'styput165@gmail.com', '$2y$10$HtBCehc7iPqB3gP4AGphQeLPwm3achU0T5Jy2VW401g4Y2taXf1r.', '0123456789', 'Nguyễn Văn Tèo', '1', '1995-11-15', 'Hà Nội', '1', NULL, '2017-02-24 00:24:44', '2017-03-24 04:36:24'),
(6, 4, 'NV1487921195', 'styput165@gmail.comm', '$2y$10$CsqWsrFKllgbNZRhXtQQ9.vPMZAhiexIhDrUtEmMIQ2gsNzF5jNOS', '01234567890', 'Nguyễn Văn B', '1', '1995-11-15', 'Hà Nội', '1', NULL, '2017-02-24 00:26:42', '2017-02-24 00:26:42'),
(7, 4, 'NV1488799219', 'styput1997@gmail.com', '$2y$10$9Fln4b2boYQSuDnopAuv0uN9h8pFcF4WG5BFLT19Ie13i78wcHi9S', '01239614554', 'Anh B', '1', '1970-01-01', 'Thới Bình, Thới Bình, Cà Mau', '1', NULL, '2017-03-06 04:20:37', '2017-03-06 04:20:37');

-- --------------------------------------------------------

--
-- Structure de la table `nhaphang`
--

CREATE TABLE `nhaphang` (
  `id` int(11) NOT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `ngaynhaphang` datetime NOT NULL,
  `ghichunhaphang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nhaphang`
--

INSERT INTO `nhaphang` (`id`, `nhanvien_id`, `ngaynhaphang`, `ghichunhaphang`, `trangthai`, `created_at`, `updated_at`) VALUES
(51, 1, '2017-04-27 19:13:34', 'Nhập hàng mới cho sản phẩm', '1', '2017-04-27 12:13:34', '2017-04-27 12:13:34'),
(52, 1, '2017-04-28 19:30:11', 'Nhập hàng mới cho sản phẩm', '1', '2017-04-28 12:30:11', '2017-04-28 12:30:11');

-- --------------------------------------------------------

--
-- Structure de la table `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tennhomquyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioithieu` text COLLATE utf8_unicode_ci,
  `trangthai` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nhomquyen`
--

INSERT INTO `nhomquyen` (`id`, `key`, `tennhomquyen`, `gioithieu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'Administrator', 'Chủ cửa hàng, đầy đủ chức năng', '1', NULL, NULL),
(2, 'NVTN', 'Nhân viên thu ngân', 'Có quyền tra cứu hàng hóa/khách hàng, tạo đơn đặt hàng cũng như hóa đơn bán hàng và tra cứu doanh số hóa đơn do mình tạo. ', '0', NULL, NULL),
(3, 'NVDH', 'Nhân viên duyệt hàng', 'Có quyền thiết lập hàng hóa (thêm mới/sửa hàng hóa), nhập hàng tồn đầu kỳ, tạo các chứng từ kho, xem các báo cáo kho và báo cáo nhập hàng. ', '1', NULL, NULL),
(4, 'NVNH', 'Nhân viên nhập hàng', 'Chỉ được giao hàng không được phép đăng nhập hệ thống', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nhomsanpham`
--

CREATE TABLE `nhomsanpham` (
  `id` int(11) NOT NULL,
  `tennhomsanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slugnsp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioithieunsp` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `nhomsanpham`
--

INSERT INTO `nhomsanpham` (`id`, `tennhomsanpham`, `slugnsp`, `gioithieunsp`, `parent_id`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Điện tử', 'dien-tu', 'Cung cấp đồ điện tử chất lượng cao', 0, '1', '2016-12-30 17:00:00', '2017-03-11 09:38:26'),
(2, 'Thể thao & du lịch', 'the-thao-du-lich', 'Đồ thể thao mẫu mã đẹp hợp thời trang', 0, '1', '2016-12-31 06:04:40', '2017-02-24 08:14:39'),
(3, 'Làm đẹp', 'lam-dep', 'Làm đẹp cho chị em phụ nữ', 0, '1', '2016-12-31 06:05:09', '2017-01-13 04:51:17'),
(4, 'Nhà cửa & đời sống', 'nha-cua-doi-song', 'Nhà cửa sang trọng hợp phong thủy', 0, '1', '2017-01-01 07:56:03', '2017-01-13 04:54:01'),
(5, 'Mẹ & Bé', 'me-be', 'Đồ đẹp cho mẹ và bé nhé', 0, '1', '2017-01-01 07:56:25', '2017-01-13 04:53:50'),
(6, 'Thời trang', 'thoi-trang', 'Thời trang nam và nữ', 0, '1', '2017-01-11 00:45:28', '2017-01-13 04:50:30');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `tieude` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci,
  `trangthai` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id`, `tieude`, `slug`, `noidung`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '<h3>THẢNH THƠI MUA SẮM TẠI&nbsp;OPENSHOP</h3>\r\n<p>&nbsp;</p>\r\n<div class="content_container">\r\n<p><strong>Nơi mua sắm l&yacute; tưởng</strong></p>\r\n<p>Với h&agrave;ng trăm ng&agrave;n sản phẩm đa dạng thuộc những ng&agrave;nh h&agrave;ng kh&aacute;c nhau từ sức khỏe v&agrave; sắc đẹp, trang tr&iacute; nh&agrave; cửa, thời trang, điện thoại v&agrave; m&aacute;y t&iacute;nh bảng đến h&agrave;ng điện tử ti&ecirc;u d&ugrave;ng v&agrave; điện gia dụng, openshop&nbsp;sẽ đ&aacute;p ứng tất cả nhu cầu mua sắm của bạn.</p>\r\n<p>B&ecirc;n cạnh những sản phẩm đến từ c&aacute;c thương hiệu quốc tế v&agrave; Việt Nam, bạn cũng c&oacute; thể t&igrave;m thấy nhiều sản phẩm độc quyền chỉ c&oacute; duy nhất tại Lazada.</p>\r\n</div>\r\n<div class="content_container">\r\n<p><strong>Mua sắm dễ d&agrave;ng v&agrave; thuận tiện</strong></p>\r\n<p>Kh&ocirc;ng c&ograve;n phải lo kẹt xe, đ&ocirc;ng đ&uacute;c v&agrave; xếp h&agrave;ng d&agrave;i chờ đợi! Giờ đ&acirc;y, bạn c&oacute; thể mua sắm bất cứ khi n&agrave;o, ở bất cứ đ&acirc;u tr&ecirc;n m&aacute;y t&iacute;nh v&agrave; điện thoại di động của m&igrave;nh.</p>\r\n<p>Với dịch vụ chuyển h&agrave;ng nhanh ch&oacute;ng v&agrave; đ&aacute;ng tin cậy, bạn chỉ cần ngồi thư gi&atilde;n tại nh&agrave; v&agrave; m&oacute;n h&agrave;ng sẽ được giao đến tận nơi.</p>\r\n</div>\r\n<div class="content_container">\r\n<p><strong>Mua sắm an to&agrave;n v&agrave; đảm bảo</strong></p>\r\n<p>Hiểu được tầm quan trọng của việc mua sắm an to&agrave;n v&agrave; đảm bảo, ch&uacute;ng t&ocirc;i cung cấp cho kh&aacute;ch h&agrave;ng nhiều lựa chọn thanh to&aacute;n an ninh bao gồm cả thanh to&aacute;n khi nhận được h&agrave;ng, nghĩa l&agrave; bạn chỉ trả tiền khi đ&atilde; nhận được m&oacute;n h&agrave;ng của m&igrave;nh.</p>\r\n<p>Bảo đảm về chất lượng v&agrave; t&iacute;nh x&aacute;c thực: Tất cả c&aacute;c giao dịch tr&ecirc;n openshop&nbsp;đều được đảm bảo l&agrave; sản phẩm ch&iacute;nh h&atilde;ng, mới, kh&ocirc;ng khiếm khuyết hay hư hỏng. Nếu kh&ocirc;ng, bạn c&oacute; thể ho&agrave;n trả.</p>\r\n</div>', '1', '2017-03-15 07:16:21', '2017-03-15 04:21:42'),
(2, 'Điều khoản', 'dieu-khoan', 'Điều khoản của tôi', '1', '2017-03-15 07:16:21', '2017-03-15 07:16:23'),
(3, 'Hướng dẫn mua hàng', 'huong-dan-mua-hang', 'Hướng dẫn mua hàng', '1', '2017-03-15 07:32:16', '2017-03-15 07:32:17'),
(4, 'Hình thức thanh toán', 'hinh-thuc-thanh-toan', 'Hình thức thanh toán', '1', '2017-03-15 07:33:07', '2017-03-15 07:33:08'),
(5, 'Liên hệ', 'lien-he', '<h2 id="mcetoc_1bbgnnkmb0">Mọi chi tiết xin vui l&ograve;ng li&ecirc;n hệ qua</h2>\r\n<p>Email: <strong><a href="mailto:styput1995@gmail.com">styput1995@gmail.com</a></strong></p>\r\n<p>Số điện thoại: <strong>01239614554</strong></p>\r\n<p>Facebook: <strong><a href="https://facebook.com/hoangphut1995">https://facebook.com/hoangphut1995</a></strong></p>\r\n<p>&nbsp;</p>', '1', '2017-03-15 07:33:07', '2017-03-18 05:56:02'),
(6, 'Vận chuyển', 'van-chuyen', 'Vận Chuyển', '1', '2017-03-15 07:33:07', '2017-03-15 07:33:08'),
(7, 'Test', 'test', '<p><strong>dgdfgdfg&nbsp;dgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfgdgdfgdfg</strong></p>', '2', '2017-03-15 04:06:15', '2017-03-15 04:06:15');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('styput1995@gmail.com', '1b2526a3355db7ea84a0827cd1a18c0a140efd6ead2659c4fcba35dd6ab0970c', '2017-04-02 07:37:35');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets_nhanvien`
--

CREATE TABLE `password_resets_nhanvien` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `phuongthuctt`
--

CREATE TABLE `phuongthuctt` (
  `id` int(11) NOT NULL,
  `tenphuongthuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huongdan` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phuongthuctt`
--

INSERT INTO `phuongthuctt` (`id`, `tenphuongthuc`, `huongdan`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Mặc định', 'Thanh toán khi nhận hàng', '3', '2017-02-16 00:11:32', '2017-02-16 00:11:32'),
(2, 'Thanh toán trực tiếp', 'Khách hàng sẻ phải thanh toán tiền cho chúng tôi khi nhận hàng', '1', '2017-02-16 00:11:32', '2017-02-16 00:11:32'),
(3, 'Paypal', 'Khách hàng vui lòng gửi tiền qua paypal cho chúng tôi', '1', '2017-04-26 06:21:09', '2017-04-26 06:21:09'),
(4, 'Visa', 'Vui lòng gửi tiền qua tài khoản visa', '1', '2017-04-26 06:26:56', '2017-04-26 06:26:56'),
(5, 'Master card', 'Vui lòng gửi tiền qua master card', '1', '2017-04-26 06:27:22', '2017-04-26 06:27:22'),
(6, 'American express', 'Vui lòng gửi tiền qua american express, Vui lòng gửi tiền qua american express, Vui lòng gửi tiền qua american express , Vui lòng gửi tiền qua american express', '1', '2017-04-26 06:27:54', '2017-04-26 06:28:09');

-- --------------------------------------------------------

--
-- Structure de la table `phuongthucvc`
--

CREATE TABLE `phuongthucvc` (
  `id` int(11) NOT NULL,
  `tenvanchuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoigianvanchuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phivanchuyen` bigint(20) NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `phuongthucvc`
--

INSERT INTO `phuongthucvc` (`id`, `tenvanchuyen`, `thoigianvanchuyen`, `phivanchuyen`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Gửi qua bưu điện', '10 ngày', 10000, '3', '2017-01-09 18:06:26', '2017-01-09 18:06:26'),
(2, 'Gửi nhanh', '3 ngày', 100000, '1', '2017-02-10 05:19:44', '2017-02-10 05:19:44'),
(3, 'Gửi qua bưu điện', '10 ngày', 10000, '1', '2017-01-09 18:06:26', '2017-01-09 18:06:26');

-- --------------------------------------------------------

--
-- Structure de la table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `masanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theloai_id` int(11) DEFAULT NULL,
  `hangsanxuat_id` int(11) DEFAULT NULL,
  `tensanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slugsp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giasanpham` bigint(20) NOT NULL,
  `giamgiasanpham` bigint(20) NOT NULL DEFAULT '0',
  `anhsanpham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluongsanpham` int(11) NOT NULL DEFAULT '0',
  `kichthuoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trongluong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mausac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motakhac` longtext COLLATE utf8_unicode_ci,
  `gioithieungan` text COLLATE utf8_unicode_ci,
  `gioithieusanpham` longtext COLLATE utf8_unicode_ci,
  `luotxem` int(11) NOT NULL DEFAULT '0',
  `sanphamdacbiet` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sanphamlienquan` text COLLATE utf8_unicode_ci,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sanpham`
--

INSERT INTO `sanpham` (`id`, `masanpham`, `theloai_id`, `hangsanxuat_id`, `tensanpham`, `slugsp`, `giasanpham`, `giamgiasanpham`, `anhsanpham`, `soluongsanpham`, `kichthuoc`, `trongluong`, `mausac`, `motakhac`, `gioithieungan`, `gioithieusanpham`, `luotxem`, `sanphamdacbiet`, `sanphamlienquan`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '1483190583', 3, 3, 'Samsung core 2', 'samsung-core-2', 2950000, 0, '0138f9d584283059b3639fc2aa1d3fca.jpg', 206, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', '', 0, '1', '2', '1', '2016-12-31 06:28:23', '2017-04-27 14:23:11'),
(2, '1483191832', 3, 3, 'Samsung core 3', 'samsung-core-3', 2180000, 0, '0d642e6f194ce93afe89eef7d6a07295.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', '<p>Giới thiệu</p>', 0, '1', '3', '1', '2016-12-31 06:44:40', '2017-04-27 12:13:34'),
(3, '1483247504', 3, 3, 'Samsung s6', 'samsung-s6', 9390000, 0, '8657555e158310ddba90a632cb50e1d3.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', 'Giới thiệu', 0, '1', '2', '1', '2016-12-31 22:17:25', '2017-04-27 12:13:34'),
(4, '1483247505', 1, 3, 'Samsung s7', 'samsung-s7', 14090000, 0, '6993ea4cd59d18670533a5004db4da38.jpg', 99, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', '', 0, '1', '2', '1', '2016-12-31 22:17:25', '2017-04-28 12:41:21'),
(5, '1483531907', 1, 3, 'Iphone 6 plus', 'iphone-6-plus', 16090000, 0, '0708d995c42ce612c59945f6e74bafbf.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', '', 0, '1', '2,3,6', '1', '2017-01-04 05:13:00', '2017-04-27 12:13:35'),
(6, '1483531981', 1, 4, 'Điện thoại asus zenfone 2 laser 6 inch', 'dien-thoai-asus-zenfone-2-laser-6-ze601kl', 3390000, 0, '016b5cd487811b1ff786b1699ecea0aa.png', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', '<p>Giới thiệu sản phẩm</p>', 0, '0', '5', '1', '2017-01-04 05:14:35', '2017-04-27 12:13:35'),
(7, '1486713000', 2, 3, 'Smart tivi lg 49 inch 49LH605T', 'smart-tivi-lg-49-inch-49lh605t', 11090000, 0, '086ec3a10265fb9a547402f2d0b99946.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho sản phẩm thêm sinh động', 'Giới thiệu sản phẩm', 0, '0', '3', '1', '2017-02-10 00:57:30', '2017-04-27 12:13:35'),
(8, '1486714527', 5, 5, 'Áo khoác da nam lót lông VNXK AK91', 'ao-khoac-da-nam-lot-long-vnxk-ak91', 390000, 0, '6db42e5a13501c8402b6673bb753a692.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu cho Áo khoác da nam lót lông VNXK AK91', '', 0, '1', '7', '1', '2017-02-10 01:17:13', '2017-04-27 12:13:35'),
(9, '1486726031', 6, 6, 'Giày vải Nỉ cho bé(không phải giày tập đi)', 'giay-vai-ni-cho-bekhong-phai-giay-tap-di', 220000, 0, 'bdb7133fd11b6e9520b9a35d8f75bcab.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Giới thiệu ngắn cho Giày vải Nỉ cho bé(không phải giày tập đi)', '', 0, '1', '2,5', '1', '2017-02-10 04:29:11', '2017-04-27 12:13:35'),
(10, '1487947823', 8, 6, 'Sỉ tủ gỗ cao cấp 3 buồn 8 ngăn 300k', 'si-tu-go-cao-cap-3-buong-8-ngan-300k', 340000, 0, '5bf3345c3affa42b70f18c568ceb6a3f.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Cấu tạo: 2 hoặc 3 ngăn lớn treo quần áo và 6 ngăn nhỏ đựng quần áo gấp, túi xách...', 'Cấu tạo: 2 hoặc 3 ngăn lớn treo quần áo và 6 ngăn nhỏ đựng quần áo gấp, túi xách...', 0, '0', '8', '1', '2017-02-24 07:59:47', '2017-04-27 12:13:35'),
(11, '1487948388', 8, 6, 'Tủ vải khung gỗ', 'tu-vai-khung-go', 390000, 0, '92eb00f7664c707ed539de35ddce76fd.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Tủ vải khung gỗ mới về  này . \r\n Có. 2 thanh treo có chiều dài lên tới 55cm giúp cho bạn có thể treo được nhiều quần áo hơn, mẫu thanh treo bằng gỗ cũng giúp tủ có khả năng chịu được lực treo lớn hơn các mẫu tủ thông thường. Bạn có thể treo những bộ vest, áo rét, áo dài, quần áo sơ mi... mà không phải lo lắng về việc tủ bị biến dạng hay xô lệch. \r\nCực khỏe - bền - chắc ', 'Tủ vải khung gỗ mới về  này . \r\n Có. 2 thanh treo có chiều dài lên tới 55cm giúp cho bạn có thể treo được nhiều quần áo hơn, mẫu thanh treo bằng gỗ cũng giúp tủ có khả năng chịu được lực treo lớn hơn các mẫu tủ thông thường. Bạn có thể treo những bộ vest, áo rét, áo dài, quần áo sơ mi... mà không phải lo lắng về việc tủ bị biến dạng hay xô lệch. \r\nCực khỏe - bền - chắc ', 0, '1', '10', '1', '2017-02-24 08:05:02', '2017-04-27 12:13:35'),
(12, '1487948703', 8, 6, 'Giường hơi toto cao cấp', 'giuong-hoi-toto-cao-cap', 1080000, 0, 'e5a3f5901dd9b8f39a67f092060a14a9.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', '➡ Sản phẩm "GIƯỜNG HƠI TOTORO " là giải pháp tối ưu nhất giúp bạn có thể thỏa mãn được mong muốn có chỗ nghỉ tiện nghi cho cả gia đình. Không những tiết kiệm diện tích mà còn là đồ trang trí sang trọng cho căn phòng.', '<span>Bạn muốn có chỗ để Bố mẹ ngả lưng thư giãn xem ti vi cùng gia đình?\r\n<br>&nbsp;- Bạn muốn có chỗ để cho con cái vui chơi cùng bố mẹ?\r\n<br>&nbsp;- Hay bạn muốn ngả lưng thư giãn những múc mệt mỏi?\r\n \r\nVới phòng có diện tích nhỏ dùng đệm thì mất điện tích, nằm ra sàn thì lạnh &amp; đau lưng. Vậy giải pháp nào để cho cả nhà cùng tận hưởng cảm giác thư giãn ?<br>&nbsp;➡ Sản phẩm "GIƯỜNG HƠI TOTORO " là giải pháp tối ưu nhất giúp bạn có thể thỏa mãn được mong muốn có chỗ nghỉ tiện nghi cho cả gia đình. Không những tiết kiệm diện tích mà còn là đồ trang trí sang trọng cho căn phòng.\r\n<br>✩ Kích thước: 1.5 x 2 m\r\n✩ Trọng lượng: 8 kg\r\n✩ <br>Khả năng chịu lực tối đa: 300 kg</span><br>', 0, '0', '10', '1', '2017-02-24 08:10:46', '2017-04-27 12:13:35'),
(13, '1487949290', 11, 6, 'Sữa rửa mặt La roche posay', 'sua-rua-mat-la-roche-posay', 390000, 0, 'da52ab840edf9f05c9d968b289e66322.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Sữa rửa mặt La roche posay 400ml ', 'Sữa rửa mặt La roche posay 400ml ', 0, '0', '10,12', '1', '2017-02-24 08:17:24', '2017-04-27 12:13:35'),
(14, '1487949444', 11, 6, 'Xịt khoáng Laneige', 'xit-khoang-laneige', 170000, 160000, '8a86feebf45e4c659364aaa1b7c82042.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'đỏ', 'Bảo hàng 1 tháng', 'Xịt khoáng Laneige WATER BANK MINERAL SKIN MIST Thương hiệu: Laneige Hàn Quốc Dung tích: 30ml Dành cho: mọi loại da, đặc biệt làn da khô.', '<span>Xịt khoáng Laneige WATER BANK MINERAL SKIN MIST\r\nThương hiệu: Laneige Hàn Quốc\r\nDung tích: 30ml\r\nDành cho: mọi loại da, đặc biệt làn da khô.<br><br></span>', 0, '0', '13', '1', '2017-02-24 08:19:19', '2017-04-27 12:13:35'),
(15, '1487949854', 13, 6, 'Áo khoác Real 2015-2016 trắng xanh super fake Thái Lan', 'ao-khoac-real-2015-2016-trang-xanh-super-fake-thai-lan', 430000, 0, 'be0f3e4f4208c22c2f794f5102ec3aa4.jpg', 100, '13cm x 12cm x 13cm', '0.3', NULL, 'Bảo hàng 1 tháng', 'Fans Real Madrid chọn cho mình một chiếc áo khoác để bảo vệ bản thân trước những lúc tập luyện trên sân cỏ là điều vô cùng quan trọng đối với mỗi cầu thủ. Các bạn hãy tham khảo mẫu áo khoác Real 2015-2016 trắng xanh super fake Thái Lan sẽ khiến cho các đấng mày râu mê mẩn:', 'Fans Real Madrid chọn cho mình một chiếc áo khoác để bảo vệ bản thân trước những lúc tập luyện trên sân cỏ là điều vô cùng quan trọng đối với mỗi cầu thủ. Các bạn hãy tham khảo mẫu&nbsp;áo khoác Real 2015-2016 trắng xanh super fake Thái Lan&nbsp;sẽ khiến cho các đấng mày râu mê mẩn:<span>Áo khoác Real 2015-2016 trắng xanh super fake Thái Lan&nbsp;màu trắng&nbsp;phối xanh&nbsp;là mẫu áo có thể nói là đẹp nhất trong các mẫu áo khoác tại giải Laliga.&nbsp;Áo khoác Real&nbsp;Real 2015-2016 trắng xanh&nbsp;được thiết kế với phần chủ đạo màu đỏ kết hợp với phần màu phối đen&nbsp;tạo nên điểm nhấn khá mạnh mẻ khiến cho mẫu áo Real&nbsp;thực sự cuốn hút với người nhìn. Áo khoác tại&nbsp;Hồng Phúc Sport&nbsp;luôn được bán với giá rẻ nhất và chất lượng đảm bảo nhất.<br>Hãy ghé Hồng Phúc Sport&nbsp;để kiểm chứng chất lượng và giá cả nhé…</span>Mùa đông tới, các Fan hâm mộ Việt Nam lại có dịp khoác trên mình những&nbsp;mẫu áo khoác bóng đá 2015-2016&nbsp;vô cùng đẹp của những Đội tuyển quốc gia, câu lạc bộ nổi tiếng mà mình yêu thích.&nbsp;HỒNG PHÚC&nbsp;SPORT&nbsp;xin gửi tới các bạn những mẫu&nbsp;áo khoác bóng đá đẹp mùa giải 2015 – 2016. Chúng tôi sẽ cập nhập liên tục những&nbsp;mẫu mới nhất&nbsp;như&nbsp;áo khoác nỉ bóng đá,&nbsp;áo khoác gió bóng đá,&nbsp;bộ nỉ bóng đá,&nbsp;bộ gió bóng đá&nbsp;để các bạn có thể xem và lựa chọn cho mình trong mùa đông tới.<h3>Điểm nổi bật áo khoác Real 2015-2016 trắng xanh super fake Thái Lan</h3>Chất liệu vải : Thun nỉ&nbsp;made in thailandXuất sứ : Thái Lan &nbsp; Size: S M L XL ( size châu âu)Giá:&nbsp;380k/ 1 áoThiết kế : Những đường nét được thiết kế, in ấn rất tinh xảo giống hệt áo CLB thi đấu.<div>Áo khoác Real 2015-2016 trắng xanh super fake Thái Lan&nbsp;Super fake&nbsp;(SF) Thái lan với chất liệu thun&nbsp;nỉ chất lượng cao, sợi vải chắc chắn, tinh tế mang lại cảm giác vừa vặn và thoải mái đồng thời thể hiện đầy đủ&nbsp;sự&nbsp;hâm mộ với &nbsp;Pháo thủ thành Manchester. Vải thun nỉ polyester giúp cơ thể giữ nhiệt tốt, rất phù hợp để mặc với điều kiện&nbsp;thời tiết Sài Gòn cuối năm.</div><div>&gt; Thương hiệu và logo&nbsp;Real Madrid<br>&gt; Tay dài<br>&gt; Vải thun nỉ chất liệu 100% polyester chất lượng cao, không xù, co giãn tốt</div><div>&gt; Màu xanh chủ đạo với các viền bo hông màu xanh và xám</div><div>&gt; 3 sọc đặc trưng của adidas màu xanh chạy dọc cánh tay</div><div>&gt;&nbsp;Cổ cao, có thể kéo khóa để cổ dựng lên, giữ ấm cho cổ</div><div>&gt;&nbsp;Có thể được giặt tay hoặc giặt bằng máy</div><div>&gt; Chất liệu Nỉ cao cấp<br>Mẫu áo khoác Real 2015-2016 trắng xanh super fake Thái Lan đồng&nbsp;phù hợp với mặc trong thời tiết mát và se lạnh, trước và sau khi chơi thể thao. Ngoài ra, cũng là 1 giải pháp hữu hiệu đi lại ngoài trời trong thời tiết nắng nóng.</div><div>Dưới đây là hình ảnh&nbsp;Mẫu Áo khoác Real 2015-2016 trắng xanh hàng Super Fake&nbsp;Thái Lan, mời các bạn đón xem, nhận định &amp; đánh giá mẫu áo khoác mới của&nbsp;Real Madrid&nbsp;2015/16&nbsp;:<div><img width="600" alt="o khoc Real 2015-2016 trng xanh super fake Thi Lan" src="http://dothethao.net.vn/wp-content/uploads/2015/12/ao_khoac_real_madrid_2015_2016_trang_xanh_600x900.jpg" height="900">Áo khoác Real 2015-2016 trắng xanh super fake Thái Lan</div></div>Chiếc áo này rất ngầu với thiết kế 2 gam màu xanh tím than super fake Thái Lan. Phần trên cổ và vai có màu vàng, còn phần thân và cánh tay dưới có màu xanh tím than. Đây là sự kết hợp rất đẹp mắt, nổi bật. Ngực áo in hình logo Real Madrid&nbsp;đầy giá trị. Phần ống và thân dưới được bo vào giúp ích cho sự vận động của bạn.Chất liệu cũng là điều các cầu thủ cần cân nhắc kĩ lưỡng khi chọn cho mình bộ đồ ưng ý. Với một chiếc áo khoác gió ngoài tác dụng cản gió rất tốt, nó còn không thấm mưa thuận tiện trong những thời tiết khắc nghiệt. Còn chất liệu nỉ sẽ mềm mại hơn, tạo cảm giác ấm áp và thoải mái cho người mặc.Đừng để cái lạnh cản trở tình yêu thể thao của bạn. Hãy đến cửa hàng của chúng tôi để rinh về chiếc áo mà bạn ưng ý nhé.Sản phẩm&nbsp;áo khoác Real&nbsp;2015-2016 trắng xanh hàng Thái Lan&nbsp;được bán ra tại shop thể thao Hồng Phúc Sport&nbsp;có chất lượng cao, kiểu dáng ôm body, khác biệt với những sản phẩm khác trên thị trường.<span>Xem thêm: Mẫu&nbsp;<span><a target="_blank" rel="nofollow" href="http://dothethao.net.vn/san-pham/ao-khoac-mu-do-2015-2016/">áo khoác MU đỏ 2015-2016 super fake Thái Lan</a>&nbsp;, Mẫu&nbsp;<a target="_blank" rel="nofollow" href="http://dothethao.net.vn/san-pham/ao-khoac-mu-trang-2015-2016-super-fake-thai-lan/">áo khoác MU trắng 2015-2016 super fake Thái Lan</a></span></span><h3>Mặt sau mẫu áo khoác Real&nbsp;2015-2016 trắng xanh super fake Thái Lan</h3><div><img width="600" alt="Mt sau o khoc Real 2015-2016 trng xanh super fake Thi Lan" src="http://dothethao.net.vn/wp-content/uploads/2015/12/ao_khoac_real_madrid_2015_2016_trang_xanh_lung_600x900.jpg" height="900">Mặt sau áo khoác Real 2015-2016 trắng xanh super fake Thái Lan</div>', 0, '0', '8', '1', '2017-02-24 08:26:15', '2017-04-27 12:13:36'),
(16, '1487980850', 14, 6, 'Váy voan hoa hàn quốc dài tay bèo tầng chân váy', 'vay-voan-hoa-han-quoc-dai-tay-beo-tang-chan-vay', 320000, 0, '87ca6230348aeaa8394a276b5bd16cee.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Váy voan hoa dài tay Cổ cao cài nút ngực áo Chân váy dài bèo tầng duyên dáng Cam kết chất lượng như hình 100% sản phẩm nhập khẩu', 'Váy voan hoa dài tayCổ cao cài nút ngực&nbsp;áoChân váy dài bèo tầng duyên dángCam kết chất lượng như hình100% sản phẩm nhập khẩu', 0, '0', '8,15', '1', '2017-02-24 17:04:35', '2017-04-27 12:13:36'),
(17, '1487981128', 14, 3, 'Xăng đan da lộn cao gót kéo khóa sau', 'xang-dan-da-lon-cao-got-keo-khoa-sau', 160000, 0, '2a0c9b7922e08c6b4e0734e729744c65.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Xăng Đan Da Lộn Cao Gót Kéo Khóa Sau', '<span>Xăng Đan Da Lộn Cao Gót Kéo Khóa Sau<br><b>Hướng dẫn chọn size:</b><br></span><img alt="Cch chn size" src="http://yishop.vn/wp-content/uploads/2016/06/chon-size-2.jpg"><br>Kích thước có thể thay đổi 1-3cm do tính chất loại vải có độ co giãn hoặc thiết kế kiểu dáng khác nhau.', 0, '0', '8,15,16,1,2,3,4,17', '1', '2017-02-24 17:07:50', '2017-04-27 12:13:36'),
(19, '1489368007', 2, 6, 'Tivi box internet mxq-k4 tivi thường thành tivi internet', 'tivi-box-internet-mxq-k4-tivi-thuong-thanh-tivi-internet', 670000, 0, 'f9581c12d7fefcfa863795f2d1013627.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'CPU Amlogic S805 MXQ Quad-Core Cortex A5 1.5GHz XBMC TV Box', 'Android tivi box internet MXq (đen)\r\n\r\nTính năng \r\n\r\nCPU Amlogic S805 MXQ Quad-Core Cortex A5 1.5GHz XBMC TV Box\r\nOS Android 4.4 KitKat\r\nUI Windows 8 Phong cách\r\nbộ nhớ trong DDR3 1GB\r\nLưu trữ Nand Flash 8GB\r\nHỗ trợ bên ngoài ổ đĩa cứng đĩa 10GB đến 2TB \r\nNâng cấp FW Nâng cấp từ thẻ SD hoặc ổ đĩa USB\r\nMạng lưới WIFI 2.4GHz\r\nRJ45 giao diện kết nối mạng \r\nAdobe Flash Player Adobe Flash Player\r\nPhần mềm Android Market, trình duyệt, video trực tuyến, Music, Picture, Office Phần mềm (Word, Execel, PDF), Truyền thông Phần mềm (QQ, MSN, Skype), Netflix, Youtube, E-mail, 2D / 3D Trò chơi và các ứng dụng phần mềm khác.\r\nGPU Quad Core Mali 450 GPU 600MHz\r\nHệ thống tập tin FAT32 / NTFS / Ext3\r\nMột nút Recover Hỗ trợ một nút reset để sản xuất thiết lập\r\nCác tính năng khác DLNA, MIRACAST, WIFI HOT POT, PPPoE.\r\nVideo MPEG1 / 2/4: lên đến 1920 * 1080; H.264: H.265 lên đến 1920 * 1080; VC-1 / WMV: lên đến 1920 * 1080; bao gồm dat, avi, mpg, mpeg, mkv, vob, ts, m2ts, mp4 hậu tố và do đó trên.\r\nÂm thanh MP3, WMA, MIDI, WAV, OGG, APE, FLAC, AAC, MPEG\r\nHình ảnh JPEG, BMP, GIF, PNG, TIFF\r\nNgôn ngữ Tiếng Anh, tiếng Tây Ban Nha, Pháp, Đức, Ý, Hà Lan, Nga, Hebrew, tiếng Ả Rập, vv Multilanguages ​​(20 ngôn ngữ)\r\nRC Khoảng cách điều khiển từ xa giá trị hơn 6 mét IR\r\nGiao diện 4 * USB 2.0 HOST\r\n1 * SD / MMC khe cắm \r\n1 * kết nối Ethernet dây RJ45 \r\n1 * đầu ra HDMI \r\n1 * AV Output ', 0, '0', '7', '1', '2017-03-12 18:22:30', '2017-04-27 12:13:36'),
(20, '1489368151', 2, 6, 'Đầu box tv - biến tivi thường thành smart tv', 'dau-box-tv-bien-tivi-thuong-thanh-smart-tv', 540000, 0, 'b71725ad7cbc5dec2d9469ca7d1718b3.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Chiếc Vinabox X2 mới được Công Ty TNHH Phân Phối Thương Mại và Dịch Vụ Vinahitech (Vinahitech co.,ltd) vừa mới tung ra trên thị trường đang được đánh giá là một trong những sản phẩm nổi bật về giá cả và chất lượng cho thị trường Việt Nam. Có thể nói, Vinabox X2là sản phẩm độc đáo trên thị trường được công ty Việt Nam thiết kế nội dung việt hóa 100% và đươc tích hợp phong phú những nội dung truyền hình, giải trí, học tập cho người Việt bậc nhất hiện nay.', 'Biến tivi thường thành tivi thông minh \r\nChiếc Vinabox X2 mới được Công Ty TNHH Phân Phối Thương Mại và Dịch Vụ Vinahitech (Vinahitech co.,ltd) vừa mới tung ra trên thị trường đang được đánh giá là một trong những sản phẩm nổi bật về giá cả và chất lượng cho thị trường Việt Nam. Có thể nói, Vinabox X2là sản phẩm độc đáo trên thị trường được công ty Việt Nam thiết kế nội dung việt hóa 100% và đươc tích hợp phong phú những nội dung truyền hình, giải trí, học tập cho người Việt bậc nhất hiện nay.\r\nCấu hình cũng khá mạnh mẽ với chip lõi tứ 4 nhân, chạy trên nền tảng chip ARM Cortex A7, Ram 1G, Android 4.4, với giá cả phân phối khá hợp lý thì Vinabox X2 đang là một sản phẩm đáng được xem xét và lựa chọn cho những khách hàng ở ngoại thành, chưa tiếp cận nhiều với nền tảng Android hay người già và trẻ nhỏ.\r\nsản phẩm đáng được xem xét và lựa chọn cho những khách hàng ở ngoại thành, chưa tiếp cận nhiều với nền tảng Android hay người già và trẻ nhỏ.\r\nVINABOX X2 TRANG BỊ CẤU HÌNH MẠNH MẼ:\r\nCPU: Rockchip RK3128 (Thương hiệu Rockchip sản xuất Minix X5, MINIX X7, Zidoo X6)\r\nGPU: Mali400P\r\nRAM: DDR3 - 1G/32bit\r\nBộ Nhớ Trong: 8G\r\nOS: Android 4.4.2\r\nKodi: 16.1\r\n\r\nHỗ Trợ Cổng Kết Nối:\r\n\r\nHDMI: 01 Cổng HDMI 1.4A\r\nUSB: 02 Cổng USB 2.0\r\nAV: Cổng AV 3 chân LRV riêng biệt, giúp chất lượng hình ảnh và âm thanh tốt hơn với loại 1 chân ra 3.\r\nKết nối TV CRT, TV LED, TV Plasm\r\nẤn tượng với chiếc Vinabox X2, một sản phẩm của công ty Việt Nam, với giá rẻ nhưng có phần cứng thiết kế rất bắt mắt.\r\nVinabox X2 sở hữu vỏ nhôm nguyên khối, màu vàng đồng như những thiết bị Android box quốc tế cao cấp khác.\r\nNổi bật thiết kế với những đường viền sắc cạnh, chắc khỏe.\r\nVới vỏ nhôm nguyên khối giúp VINABOX X2 tản nhiệt mát mặc dù chạy liên tục 24h/24h vẫn không làm hao hiệu năng của thiết bị\r\nVinabox X2 với vỏ nhôm ngoài ra còn được thiết kế rất thoảng và thời trang khá chuyên nghiệp. \r\nĐược trang bị 2 râu anten wifi giúp cải thiện đáng kể chất lượng wifi của Vinabox so với các Android box thông thường.\r\nTất cả cổng kết nối trên Vinabox X2 được thiết kế khéo léo ở mặt sau, với đầy đủ các cổng kết nối cần thiết với 1 chiếc Android box thông thường.\r\nHDMI, Cổng USB, Cổng AV, Cổng LAN RJ45, và nút nguồn để tắt mở thuận tiện mà không cần rút nguồn.\r\nVINABOX X2 - Một Box Android Cho Người Việt Với Nội Dung Phong Phú Bậc Nhất và Việt Hóa 100%.\r\n\r\nVinabox X2 được công ty Vinago Co, đây là đơn vị lớn chuyên phân phối các Android box quốc tế lớn như HIMEDIA, MINIX, MYGICA đầu tiên tại thị trường Việt Nam, nhờ vậy sản phẩm Vinabox cũng được tích hợp những ứng dụng giải trí độc quyền với chất lượng cao, và nội dung giải trí phong phú độc đáo bậc nhất hiện nay.\r\nVinabox X2 được tích hợp đầy đủ các kho phim HDplay, KODI ITVPLUS, HDviet, Các kho truyền hình... hơn 26 ứng dụng được tích hợp.\r\nVinabox đã tích hợp hơn 250 kênh truyền hình HD, SD ngoài ra cập nhật liên tục chuyên mục thể thao giải trí giúp khách hàng xem trực tiếp bóng đá và các kênh truyền hình yêu thích mà không cần tới đầu kỹ ', 0, '0', '7,19', '1', '2017-03-12 18:26:35', '2017-04-27 12:13:36'),
(21, '1489368482', 3, 3, 'Laptop Dell Vostro 3568 15.6inch', 'laptop-dell-vostro-3568-156inch', 19890000, 0, '527b304e1cf6edda42c4ee12262e8b99.jpg', 99, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Dell Vostro 3568 là dòng sản.phẩm mới của Dell và được coi là sản phẩm mong đợi nhất của giới.công nghệ, Dell Vostro 3568 không những tích hợp con chíp CPU và.card đồ họa cao mà với thiết kế kiểu mới sang trọng hơn, đẳng cấp.hơn. Dell Vostro 3568 (V3568B - Black) là chiếc laptop có thiết kế.hầm hố, tinh tế cùng cấu hình mạnh mẽ khi được trang bị chip xử lý.thế hệ thứ 7 Kaby Lake, card đồ họa AMD mạnh mẽ đáp ứng đầy đủ mọi.yêu cầu của người dùng', 'Giới thiệu sản phẩm Laptop Dell Vostro 3568 15.6inch - Hàng nhập khẩu + Tặng chuột.không dây + Balo Laptop(Đen).        .            .        .        Laptop Dell Vostro 3568.Laptop Dell Vostro 3568 là dòng sản.phẩm mới của Dell và được coi là sản phẩm mong đợi nhất của giới.công nghệ, Dell Vostro 3568 không những tích hợp con chíp CPU và.card đồ họa cao mà với thiết kế kiểu mới sang trọng hơn, đẳng cấp.hơn. Dell Vostro 3568 (V3568B - Black) là chiếc laptop có thiết kế.hầm hố, tinh tế cùng cấu hình mạnh mẽ khi được trang bị chip xử lý.thế hệ thứ 7 Kaby Lake, card đồ họa AMD mạnh mẽ đáp ứng đầy đủ mọi.yêu cầu của người dùng..Laptop Dell Vostro 3568 sử dụng Chip Intel mới nhất thế hệ thứ 7.Kaby Lake. Bộ vi xử lý i5-7200U với công nghệ đột phá của Intel có.tốc độ lên tới 2.5GHz và có thể Turbo lên 3.1GHz. Laptop Dell.Vostro 3568 Core i5 (V3568B - Black) không những chip tốc độ cao mà.còn sử dụng RAM 4GB DDR4 (có thể nâng cấp lên 8GB hoặc 16GB tùy nhu.cầu sử dụng), ổ cứng HDD 1TB SATA III 6Gbps giúp chúng ta lưu trữ.dữ liệu một cách thoải mái. Dell Vostro v3568 không chỉ được trang.bị công nghệ CPU và RAM, nó còn sử card đồ họa Intel HD 620M VGA.kết hợp với R5 M420 2G DDR3 cũng đủ chúng ta dùng với bất cứ mục.đích gì, từ giải trí thông thường, chơi game, hay xử lí đồ họa.chuyên nghiệp..Laptop Dell Vostro 3568 được trang bị màn hình kích thước 15.inch với độ phân giải HD (1366 x 768 pixel) – những thông số phổ.thông trong phân khúc giá, đủ để đảm bảo chất lượng hình ảnh sống.động và sắc nét. Đặc biệt, sự có mặt của công nghệ WLED Truelife sẽ.giúp màn hình này có khả năng chống lóa cực tốt, đem đến sự thoải.mái cho người dùng khi quan sát dưới các điều kiện ánh sáng và góc.nhìn khác nhau.&nbsp; Webcam chất lượng HD và Waves MaxxAudio® Pro.cho phép bạn thực hiện những cuộc gọi video với chất lượng hoàn.hảo..Laptop Dell V3568B core i5 (V3568B - Black) được trang bị bàn.phím dạng chiclet thông dụng hiện nay với các phím bấm được sắp xếp.khoa học, độ nảy phím tốt, bàn phím số giúp người dùng nhập liệu.nhanh chóng và chính xác. Ở phía dưới bàn phím là touchpad cảm ứng.rộng rãi có bề mặt được làm mịn, rất thuận tiện để người dùng sử.dụng thay thế chuột rời. Cảm biến vân tay giúp bảo mật tối đa cho.laptop của bạn..Kênh âm thanh 2.0 của Dell Vostro 3568 được tích hợp thêm công.nghệ MaxxAudio cao cấp, sẽ giúp tái hiện mọi sắc thái âm thanh trầm.bổng của một cách rõ ràng, chi tiết, không chỉ với các bản nhạc MP3.mà còn âm thanh trong các bộ phim hành động hay game 3D đỉnh cao..Nhờ đó, trải nghiệm giải trí của người dùng sẽ luôn thoải mái, ấn.tượng và đầy thú vị. Với các dòng Dell Vostro trước bạn luôn hỏi.sao không có cổng VGA đời cũ, rồi người bán hướng dẫn bạn đi mua.một cổng chuyển từ HDMI ra VGA, điều đó thật bất tiện và mất thời.gian. Nhưng nay bạn không cần làm gi cả, Dell Vostro 3568 đã giúp.bạn làm điều đó khi nó được kết hợp gắn cả cổng HDMI và cổng VGA.trên cùng 1 chiếc laptop, thật tuyệt vời phải không nào. Với một.loạt cổng USB 3.0, HDMI, cổng VGA và Giga', 0, '0', '7,19,20', '1', '2017-03-12 18:29:53', '2017-04-28 12:41:47'),
(22, '1489368594', 11, 6, 'Skin perfecting 2% bha liquid exfoliant 30ml', 'skin-perfecting-2-bha-liquid-exfoliant-30ml', 220000, 0, 'a9e957c683383d196d83f556752031ac.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Chi tiết sản phẩm:\r\nPaula''s Choice Skin Perfecting 2% BHA Liquid Exfoliant là dòng tẩy da chết hóa học giúp làm giảm lỗ chân lông, làm giảm nếp nhăn và cải thiện làn da mịn màng.\r\nChống Lão Hóa, mụn đầu đen, Phì Lỗ chân lông, Đỏ, nếp nhăn. 2% BHA làm giảm lỗ chân lông và kích thích sản sinh collagen , chiết xuất trà xanh làm giảm mẩn đỏ và kích ứng.', 'Chi tiết sản phẩm:\r\nPaula''s Choice Skin Perfecting 2% BHA Liquid Exfoliant là dòng tẩy da chết hóa học giúp làm giảm lỗ chân lông, làm giảm nếp nhăn và cải thiện làn da mịn màng.\r\nChống Lão Hóa, mụn đầu đen, Phì Lỗ chân lông, Đỏ, nếp nhăn. 2% BHA làm giảm lỗ chân lông và kích thích sản sinh collagen , chiết xuất trà xanh làm giảm mẩn đỏ và kích ứng.\r\nCó rất nhiều nghiên cứu chỉ ra rằng BHA (acid salicylic) làm tăng sản xuất collagen và quyết liệt làm mượt bề mặt của da. Ngoài ra, BHA có tính chất kháng khuẩn mà ngay lập tức có thể ngăn chặn vi khuẩn mụn gây. Công thức dạng lỏng nhẹ cho phép một tỷ lệ tẩy da chết sâu nhanh hơn, nhưng nhẹ nhàng hơn so với gel hoặc lotion các sản phẩm của chúng tôi BHA, vì vậy nó là một sự lựa chọn lý tưởng cho các lỗ chân lông bị tắc cứng đầu hoặc mụn đầu đen.\r\nSản phẩm này là 100% không gồm hương liệu và chất tạo mùi với một phạm vi pH 3,2-3,8 sản phẩm phù hợp với mọi da.\r\nNhững người tiêu dùng sử dụng 2% BHA lỏng trong ít nhất 30 ngày đã thấy kết quả như sau:\r\n91% thấy đáng khỏe-làn da\r\n 90% thấy cải thiện kết cấu da\r\n 82% thấy lỗ chân lông rõ ràng nhỏ hơn\r\nAi sử dụng được sản phẩm này?\r\nTất cả các loại da có thể sử dụng sản phẩm này, nhưng kết cấu đặc biệt phù hợp cho những người có bình thường đến da dầu hoặc da hỗn hợp, mụn đầu đen cứng đầu.\r\n', 0, '0', '16', '1', '2017-03-12 18:35:56', '2017-04-27 12:13:36'),
(23, '1489369086', 11, 6, 'Sửa rửa mặt nivia men - thái lan', 'sua-rua-mat-nivea-men-thai-lan', 120000, 0, 'b74826089fb928b276af1b30d209ad23.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', '– Với sức mạnh từ bùn khoáng, nay dưới dạng bọt siêu mịn, sản phẩm làm sạch nhanh và sâu bụi bẩn, bã nhờn trên da.\r\n– Đồng thời, dưỡng ẩm từ sâu bên trong lỗ chân lông đem đến làn da sạch nhanh hiệu quả mà không bị khô, cho da dần trở nên sáng mịn. Sản phẩm có công thức dịu nhẹ, không gây kích ứng da hay bắt nắng.', '– Với sức mạnh từ bùn khoáng, nay dưới dạng bọt siêu mịn, sản phẩm làm sạch nhanh và sâu bụi bẩn, bã nhờn trên da.\r\n– Đồng thời, dưỡng ẩm từ sâu bên trong lỗ chân lông đem đến làn da sạch nhanh hiệu quả mà không bị khô, cho da dần trở nên sáng mịn. Sản phẩm có công thức dịu nhẹ, không gây kích ứng da hay bắt nắng.\r\n\r\n– NIVEA Men Thái Lan với công thức cải tiến vượt trội chứa 10 loại dưỡng chất và chiết xuất từ Bạc Hà và Hoa Mộc Lan cho hiệu quả\r\n\r\n– Loại bỏ lượng bã nhờn dư thừa trên da mặt, làm sạch sâu da cũng như lỗ chân lông.\r\n\r\n– Ngăn chặn sự xuất hiện trở lại các vấn đề trên da nhờ các hạt li ti tẩy tế bào chết.\r\n\r\n– Giúp tái tạo làn da đem một làn da đầy sức sống.\r\n\r\n– Với những thành phần ưu việt trong sản phẩm mang đến công dụng ngừa mụn 1 cách tốt nhất.\r\n\r\nLoại da phù hợp: Da thâm sạm, da nhờn.\r\n\r\nHướng dẫn sử dụng:\r\n\r\n– Làm ướt da\r\n– Lấy một lượng vừa đủ vào lòng bàn tay, tạo bọt và massage nhẹ nhàng lên mặt\r\n– Rửa sạch với nước\r\n– Dùng hàng ngày vào buổi sáng và buổi tối\r\n– Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao', 0, '0', '14', '1', '2017-03-12 18:39:59', '2017-04-27 12:13:36'),
(24, '1489369199', 7, 6, 'Áo dài hoa hoa hồng kèm mẹ và bé mẹ bé: 280 áo mẹ: 210 ', 'ao-dai-hoa-hong-kem-man-me-be-me-be-280-ao-me-210', 320000, 0, '2c37743b0e11f9090e8c8cb2e71f4f42.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'ÁO DÀI HOA HỒNG KÈM MẤN MẸ BÉ\r\nmẹ bé: 280\r\náo mẹ: 210\r\nChất liệu: satin\r\nMàu sắc: vàng', '<p>&Aacute;O D&Agrave;I HOA HỒNG K&Egrave;M MẤN MẸ B&Eacute; mẹ b&eacute;: 280 &aacute;o mẹ: 210 Chất liệu: satin M&agrave;u sắc: v&agrave;ng</p>', 0, '0', '8', '1', '2017-03-12 18:42:44', '2017-04-27 12:13:36'),
(25, '1489371573', 8, 6, 'Vòi sen tăng áp', 'voi-sen-tang-ap', 155000, 0, 'f17a24103bc7727e84789bcd4689ee05.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Với áp lực siêu mạnh của 300 lỗ phun trên bề mặt giúp massage da đầu, da mặt, ngực... có tác dụng rất lớn giúp tuần hoàn máu dưới da, giúp cho làn da khỏe mạnh.\r\n*Vật liệu : Nhựa ABS chịu lực + thép không gỉ\r\n*Đầu vòi sen đã được tiêu chuẩn về kích thước nên có thể vừa với bất kì loại dây sen nào trên thị trường\r\n*Dễ dàng lắp đặt (chỉ cần tháo vòi cũ và vặn vòi mới vào)', 'VÒI SEN TĂNG ÁP\r\nVới áp lực siêu mạnh của 300 lỗ phun trên bề mặt giúp massage da đầu, da mặt, ngực... có tác dụng rất lớn giúp tuần hoàn máu dưới da, giúp cho làn da khỏe mạnh.\r\n*Vật liệu : Nhựa ABS chịu lực + thép không gỉ\r\n*Đầu vòi sen đã được tiêu chuẩn về kích thước nên có thể vừa với bất kì loại dây sen nào trên thị trường\r\n*Dễ dàng lắp đặt (chỉ cần tháo vòi cũ và vặn vòi mới vào)\r\n*Dùng nước nóng, lạnh thoải mái\r\n*Có gioăng chắn cặn\r\n*Thí nghiệm thực tế cho thấy so với vòi thường, vòi sen tăng áp tiết kiệm 40% nước so với vòi sen truyền thống.', 0, '0', NULL, '1', '2017-03-12 19:21:49', '2017-04-27 12:13:36'),
(26, '1489371710', 9, 6, 'Miếng dán tường bếp', 'mieng-dan-tuong-bep', 240000, 0, 'cb6b7fec0e00cef19ee361484d525de6.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Miếng tráng kẽm dán bếp tráng dầu mờ bám vào tường, lau chùi dễ dàng lại trang trí làm căn bếp sinh động hơn.', '<p><strong>Miếng tr&aacute;ng kẽm d&aacute;n bếp tr&aacute;ng dầu mờ b&aacute;m v&agrave;o tường, lau ch&ugrave;i dễ d&agrave;ng lại trang tr&iacute; l&agrave;m căn bếp sinh động hơn.</strong></p>', 0, '1', '12', '1', '2017-03-12 19:24:24', '2017-04-27 12:13:36'),
(27, '1490670185', 8, 6, 'Đồng hồ thông minh smartwatch DZ09', 'dong-ho-thong-minh-smartwatch-dz09', 210000, 0, '81f1b3bec2ff8a17dbb68663a0490efa.jpg', 100, '13cm x 12cm x 13cm', '0.3', 'Xám, vàng, bạc', 'Bảo hàng 1 tháng', 'Năm 2015, đồng hồ thông minh sẽ là một trong những cuộc đua công nghệ khốc liệt của các nhà sản xuất để đáp ứng nhu cầu của người tiêu dùng. Một sản phẩm công nghệ đa năng, hiệu quả cho những ai yêu thích công nghệ, mẫu mã thời trang, năng động, sang trọng hơn là đồng hồ đeo tay thông thường mà giá cả rẻ hơn. Với nhứng tiêu chí đó, đồng hồ thông minh Smart watch DZ09 sẽ đáp ứng phần nào nhu cầu mà bạn đang tiềm kiếm.\r\n', '<h2 class="product-description__title">Giới thiệu sản phẩm Bộ đồng hồ th&ocirc;ng minh Smart Watch Uwatch DZ09 (V&agrave;ng) v&agrave; Viết cảm ứng</h2>\r\n<div class="product-description__webyclip-thumbnails">&nbsp;</div>\r\n<p>L&agrave; h&agrave;ng được nhập khẩu trực tiếp từ nước ngo&agrave;i bởi doanh nghiệp trong nước, kh&ocirc;ng th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức tại thị trường Việt Nam.<br />H&agrave;ng nhập khẩu được nhiều người chọn lựa bởi gi&aacute; th&agrave;nh tốt, chất lượng vẫn được đảm bảo như những sản phẩm được nhập khẩu th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức (v&igrave; được sản xuất từ c&ugrave;ng một nh&agrave; m&aacute;y của h&atilde;ng sản xuất). Hơn nữa, d&ugrave; kh&ocirc;ng được bảo h&agrave;nh tại c&aacute;c trung t&acirc;m bảo h&agrave;nh ch&iacute;nh thức của h&atilde;ng, c&aacute;c sản phẩm n&agrave;y vẫn được &aacute;p dụng đầy đủ ch&iacute;nh s&aacute;ch bảo h&agrave;nh của doanh nghiệp nhập khẩu.</p>\r\n<p>Năm 2015, đồng hồ th&ocirc;ng minh sẽ l&agrave; một trong những cuộc đua c&ocirc;ng nghệ khốc liệt của c&aacute;c nh&agrave; sản xuất để đ&aacute;p ứng nhu cầu của người ti&ecirc;u d&ugrave;ng. Một sản phẩm c&ocirc;ng nghệ đa năng, hiệu quả cho những ai y&ecirc;u th&iacute;ch c&ocirc;ng nghệ, mẫu m&atilde; thời trang, năng động, sang trọng hơn l&agrave; đồng hồ đeo tay th&ocirc;ng thường m&agrave; gi&aacute; cả rẻ hơn. Với nhứng ti&ecirc;u ch&iacute; đ&oacute;, đồng hồ th&ocirc;ng minh Smart watch DZ09 sẽ đ&aacute;p ứng phần n&agrave;o nhu cầu m&agrave; bạn đang tiềm kiếm.</p>\r\n<p><img class="productlazyimage" src="https://cdn.chv.me/images/thumbnails/DZ09_Watch_Phone_Can_Sync_To_qr_pPxCF.jpg.thumb_400x400.jpg" alt="image" width="639" height="639" data-original="https://cdn.chv.me/images/thumbnails/DZ09_Watch_Phone_Can_Sync_To_qr_pPxCF.jpg.thumb_400x400.jpg" /></p>\r\n<p>Điểm nổi bật:<br />- LẮP SIM V&Agrave; HOẠT ĐỘNG ĐỘC LẬP NHƯ ĐIỆN THOẠI<br />- KẾT NỐI VỚI CHUẨN BLUETOOTH 3.0<br />- HỖ TRỢ THẺ NHỚ<br />- T&Iacute;CH HỢP CAMERA<br />- L&Agrave;M REMOTE CHỤP H&Igrave;NH CHO ĐIỆN THOẠI (ANDROID)</p>\r\n<p><img class="productlazyimage" src="http://img.olx.com.br/images/72/729506013402939.jpg" alt="image" data-original="http://img.olx.com.br/images/72/729506013402939.jpg" /></p>\r\n<p>T&Iacute;NH NĂNG SẢN PHẨM:</p>\r\n<p>Smartwatch DZ09 được thế kế bởi m&agrave;n h&igrave;nh cảm ứng điện dung, c&oacute; độ nhạy cao. K&iacute;ch thước 1.55 inch ph&ugrave; hợp với tầm nh&igrave;n, độ ph&acirc;n giải m&agrave;u sắc 240 x 240 meagpixel. Khung viền được gia cố rất kĩ bằng th&eacute;p kh&ocirc;ng gỉ, d&acirc;y đeo bằng silicon vừa dẻo dai, vừa bền. Tạo cảm gi&aacute;c y&ecirc;n t&acirc;m thỏa m&aacute;i khi đeo đồng hồ tr&ecirc;n tay.</p>\r\n<p>Sức h&uacute;t của đồng hồ th&ocirc;ng minh kh&ocirc;ng chỉ dừng lại ở chức năng nghe gọi, nhắn tin độc lập như một chiếc di dộng th&ocirc;ng thường m&agrave; n&oacute; c&ograve;n c&oacute; khả năng kết nối Bluetooth với điện thoại. N&ecirc;n tiện &iacute;ch hơn rất nhiều. Bạn sẽ kh&ocirc;ng cần m&ograve; tay v&agrave;o t&uacute;i m&oacute;c điện thoại ra để nghe gọi, nhắn tin, đọc c&aacute;c d&ograve;ng startus tr&ecirc;n facebook, webchat, twiter,&hellip;tốn thời gian. Chỉ cần nhấn m&uacute;t v&agrave; thực hiện c&aacute;c thao t&aacute;c ngay tr&ecirc;n tay. Đồng thời với chức năng Bluetooth chiếc smartphone với smartwatch sẽ được kết nối chống mất trộm 2 chiều b&aacute;n k&iacute;nh 15m, khi thiết bị ngo&agrave;i b&aacute;n k&iacute;nh, đồng hồ sẽ tự b&aacute;o chu&ocirc;ng để gi&uacute;p bạn t&igrave;m kiếm dễ d&agrave;ng hơn.</p>\r\n<p>Chức năng, nghe nhạc, FM, camera cũng được hỗ trợ mỗi khi đi chơi xa. DZ09 sẽ gi&uacute;p bạn ghi lại những cảnh vật, khoảnh khắc đẹp nhất để chia sẽ với bạn b&egrave;, gia đ&igrave;nh. Đồng thời đồng hồ th&ocirc;ng minh sẽ gi&uacute;p bạn giảm stress hơn khi xem lại c&aacute;c clip do m&igrave;nh tự ghi.</p>\r\n<p>Ngo&agrave;i những t&iacute;nh năng tr&ecirc;n, đồng hồ th&ocirc;ng minh n&agrave;y c&ograve;n c&oacute; la b&agrave;n, b&aacute;o thức, nhắc nhở lịch vận động, bộ đếm bước ch&acirc;n, ngủ gi&aacute;m s&aacute;t&hellip;.</p>\r\n<p><img class="productlazyimage" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" alt="image" data-original="denied:data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" /></p>\r\n<p>LƯU &Yacute; : Sản phẩm chỉ hỗ trợ đầy đủ t&iacute;nh năng với c&aacute;c thiết bị Android.</p>', 0, '1', '7,19,20', '1', '2017-03-27 20:07:27', '2017-04-27 12:13:37'),
(31, '1493274970', 13, 6, 'Bộ đồ đá bóng manchester city 2016 - 2017', 'bo-do-da-bong-manchester-city-2016-2017', 200000, 0, '0d2f34a3793291ac874e47c89d1221b1.jpg', 99, 'size S, size M, Size L', '0.1', 'Xanh chuối', '', 'Giới thiệu sản phẩm Bộ Đồ Đá Bóng Manchester City 2016 - 2017 (Xanh Chuối)', '<div class="product-de ion__wrap prd-de ionWrapper">\r\n<div class="product-de ion__block">\r\n<h3 class="product-de ion__title">Giới thiệu sản phẩm Bộ Đồ Đ&aacute; B&oacute;ng Manchester City 2016 - 2017 (Xanh Chuối)</h3>\r\n<div class="product-de ion__webyclip-thumbnails">&nbsp;</div>\r\n<img class="productlazyimage" src="https://media3.scdn.vn/img2/2017/2_19/bo-do-da-bong-manchester-city-2016-2017-xanh-chuoi-1m4G3-kpYta0.jpg" alt="Bộ Đồ Đ&aacute; B&oacute;ng Manchester City 2016 - 2017 -Xanh Chuối 1" />\r\n<div class="clear">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class="product-de ion__block">\r\n<h5 class="product-de ion__title">Th&ocirc;ng tin sản phẩm Bộ Đồ Đ&aacute; B&oacute;ng Manchester City 2016 - 2017 (Xanh Chuối)</h5>\r\n<div class="product-de ion__inbox toclear"><span class="product-subheader__element">Bộ sản phẩm bao gồm:</span>\r\n<div class="inbox__wrap">\r\n<ul class="ui-listBulleted">\r\n<li class="inbox__item">01 x sản phẩm</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class="product-subheader__element">Đặc điểm ch&iacute;nh:</div>\r\n<table class="specification-table">\r\n<tbody>\r\n<tr>\r\n<td class="specification-table__property">SKU</td>\r\n<td class="specification-table__value">FI518FAAA1ONIZVNAMZ-2796576</td>\r\n</tr>\r\n<tr>\r\n<td class="bold">Mẫu m&atilde;</td>\r\n<td>NewpointCo (Tp.HCM)-MANCHESTERCTI-CHUOI-S</td>\r\n</tr>\r\n<tr>\r\n<td class="bold">Sản xuất tại</td>\r\n<td>Việt Nam</td>\r\n</tr>\r\n<tr>\r\n<td class="bold">Loại h&igrave;nh bảo h&agrave;nh</td>\r\n<td>No Warranty</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', 0, '1', '8,15', '1', '2017-04-27 06:47:52', '2017-04-28 11:52:33'),
(34, '1493277170', 16, 6, 'Vali túi du lịch', 'vali-tui-du-lich', 200000, 0, '3aad29010c39530d9ecda246d3adc8a5.jpg', 100, '47x25', '0.3', 'Đỏ, đen, xanh', '', 'Giới thiệu sản phẩm cho túi du lịch nhở', '<p>T&uacute;i <a href="https://www.sendo.vn/the-thao.htm">thể thao</a><br />Vai gai<br />K&iacute;ch thước 47x25<br />Chất đẹp, kh&ocirc;ng thấm nước <br />Gi&aacute; rẻ nhất thị trường</p>', 0, '0', '8,15,24', '1', '2017-04-27 07:14:58', '2017-04-28 12:29:23'),
(35, '1493277675', 11, 6, 'Lotion kích trắng da body White Body Magic Flowers - Body Magic', 'lotion-kich-trang-da-body-white-body-magic-flowers-body-magic', 130000, 120000, 'cc5fd45fddb9cd26719d209725dd83f5.jpg', 99, '12x80x30', '0.1', 'Trắng', 'Kem dưỡng kích thích da', 'Chiết xuất từ  thiên nhiên  và các loại Vitamin E,  cung cấp Protein cho da\r\n- Bảo vệ làn da bạn dưới ánh nắng gay gắt, bảo vệ da khỏi tia UVA & UVB', '<h3>Kem kích trắng New White Body Magic Flowers</h3>\r\n<p>Hiện sản phẩm c&oacute; mẫu mới độ chống nắng <strong>SPF 50 PA +++</strong></p>\r\n<p><strong><a href="https://www.sendo.vn/shop/catshop/"><img src="https://media3.scdn.vn/img2/2016/10_25/lotion-kich-trang-da-body-white-body-magic-flowers-1m4G3-0lmVF4_simg_d0daf0_800x1200_max.jpg" alt="Lotion k&iacute;ch trắng da body White Body Magic Flowers 2" width="710" height="408" /></a><br /></strong></p>\r\n<p><strong>Kem kích trắng&nbsp; New White Body&nbsp; Magic Flowers SPF 50 PA +++ Hàn Qu&ocirc;́c</strong></p>\r\n<p>- Chiết xuất từ&nbsp; thi&ecirc;n nhi&ecirc;n&nbsp; v&agrave; c&aacute;c loại Vitamin E,&nbsp; cung cấp Protein cho da</p>\r\n<p>- Bảo vệ l&agrave;n da bạn dưới &aacute;nh nắng gay gắt, bảo vệ da khỏi tia UVA &amp; UVB</p>\r\n<p>- Nguy&ecirc;n nh&acirc;n khiến bạn nổi mụn đen sạm, t&agrave;n nhang&hellip;</p>\r\n<p>- Chỉ số chống nắng<strong> SPF 50 PA +++ , SPF 35 PA ++<br /></strong></p>\r\n<ul>\r\n<li>Chứa nhiều tinh chất dưỡng da, c&ugrave;ng vitamin E,</li>\r\n</ul>\r\n<p>Chống lại sự l&atilde;o h&oacute;a da do c&aacute;c t&aacute;c động từ m&ocirc;i trường, kh&oacute;i bụi, h&oacute;a chất.</p>\r\n<p>-&nbsp;T&aacute;c dụng l&agrave;m s&aacute;ng da, mờ c&aacute;c vết th&acirc;m ... cho l&agrave;n da trở n&ecirc;n tươi mới v&agrave; trắng s&aacute;ng.</p>\r\n<p>-&nbsp;Cung cấp đầy đủ dưỡng chất v&agrave; dưỡng ẩm gi&uacute;p da căng mịn đầy sức sống</p>\r\n<p>- Dung t&iacute;ch:<strong> 150ml</strong></p>\r\n<p><strong>- </strong>Xu&acirc;́t xứ <strong>: Hàn Qu&ocirc;́c</strong></p>\r\n<p><a href="https://www.sendo.vn/shop/catshop/"><img src="https://media3.scdn.vn/img2/2016/10_25/lotion-kich-trang-da-body-white-body-magic-flowers-1m4G3-CUcOS5_simg_d0daf0_800x1200_max.jpg" alt="Lotion k&iacute;ch trắng da body White Body Magic Flowers 4" width="689" height="689" /></a><br /><strong>Kem kích trắng&nbsp; New<em> White Body Magic Flowers</em> SPF 50 PA +++ Hàn Qu&ocirc;́c </strong>với chiết xuất ho&agrave;n to&agrave;n từ thi&ecirc;n nhi&ecirc;n, với vitamin E c&ugrave;ng c&aacute;c tinh chất dưỡng da, đảm bảo cho bạn l&agrave;n da mịn m&agrave;ng, rạng rỡ .<br /><br /></p>\r\n<p>Với chỉ số chống nắng cao <strong>SPF 50 PA +++&nbsp; l</strong>&agrave;n da bạn sẽ được bảo vệ an to&agrave;n tuyệt đối khỏi &aacute;nh nắng mặt trời gay gắt, tia UVA, UVB, nguy&ecirc;n nh&acirc;n ch&iacute;nh g&acirc;y ra da bi nám đen ....c&ograve;n c&oacute; t&aacute;c dụng cung cấp đầy đủ dưỡng chất v&agrave; dưỡng ẩm gi&uacute;p da căng mịn đầy sức sống<strong>.</strong> Sản phẩm c&ograve;n được đ&aacute;nh gi&aacute; cao v&igrave; kh&ocirc;ng g&acirc;y nhờn r&iacute;t khi b&ocirc;i v&agrave;o da, v&agrave; hương thơm nhẹ nh&agrave;ng tạo cảm gi&aacute;c dễ chịu thoải m&aacute;i.</p>\r\n<p><a href="https://www.sendo.vn/shop/catshop/"><img src="https://media3.scdn.vn/img2/2016/10_25/lotion-kich-trang-da-body-white-body-magic-flowers-1m4G3-sWoQdS_simg_d0daf0_800x1200_max.jpg" alt="Lotion k&iacute;ch trắng da body White Body Magic Flowers 5" /></a></p>', 0, '0', '', '1', '2017-04-27 07:26:17', '2017-04-28 11:15:33'),
(36, '1493382239', 5, 6, 'Xịt ngăn mùi nam mát lạnh NIVEA MEN Cool Kick 150ml ', 'xit-ngan-mui-nam-mat-lanh-nivea-men-cool-kick-150ml', 69000, 0, '791889db61bf6f50f65870d52faf3e4c.jpg', 100, '', '', '', '', ' Xịt ngăn mùi nam mát lạnh NIVEA MEN Cool Kick 150ml ', '<h3 class="product-description__title">&nbsp;</h3>\r\n<p>Sở hữu c&ocirc;ng thức độc đ&aacute;o tạo cảm gi&aacute;c m&aacute;t lạnh lan tỏa tr&ecirc;n da, lăn ngăn m&ugrave;i cho nam <strong>NIVEA Men Cool Kick</strong> l&agrave;m giảm tiết mồ h&ocirc;i tức th&igrave; v&agrave; ngăn m&ugrave;i hiệu quả đến 48 giờ, mang lại cảm gi&aacute;c kh&ocirc; tho&aacute;ng suốt thời gian d&agrave;i. Sản phẩm kh&ocirc;ng bổ sung cồn, kh&ocirc;ng chất tạo m&agrave;u hay chất bảo quản, tuyệt đối an to&agrave;n cho l&agrave;n da bạn. Lăn ngăn m&ugrave;i <strong>NIVEA Men Cool Kick</strong> cho ph&aacute;i mạnh tự tin thể hiện m&igrave;nh.</p>\r\n<div><strong>TH&Ocirc;NG TIN CHI TIẾT</strong></div>\r\n<p><strong>Loại sản phẩm</strong><br />Xịt khử m&ugrave;i với c&ocirc;ng thức độc đ&aacute;o tạo cảm gi&aacute;c m&aacute;t lạnh lan tỏa tr&ecirc;n da, l&agrave;m giảm tiết mồ h&ocirc;i tức th&igrave; v&agrave; ngăn m&ugrave;i hiệu quả đến 48 giờ, mang lại cảm gi&aacute;c kh&ocirc; tho&aacute;ng suốt thời gian d&agrave;i. Sản phẩm c&oacute; hương thơm nam t&iacute;nh.</p>\r\n<p><strong>Độ an to&agrave;n</strong><br />Sản phẩm kh&ocirc;ng bổ sung cồn, kh&ocirc;ng chất tạo m&agrave;u hay chất bảo quản, tuyệt đối an to&agrave;n cho l&agrave;n da bạn.</p>\r\n<p><strong>Cách dùng</strong><br />D&ugrave;ng hằng ng&agrave;y, sau khi tắm. Lăn đều l&ecirc;n v&ugrave;ng da dưới c&aacute;nh tay mỗi ng&agrave;y, đợi dung dịch sản phẩm kh&ocirc; rồi mặc &aacute;o.</p>', 0, '0', '', '1', '2017-04-28 12:30:10', '2017-04-28 12:35:47');

-- --------------------------------------------------------

--
-- Structure de la table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `tieude` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lienket` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `trangthai` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sliders`
--

INSERT INTO `sliders` (`id`, `tieude`, `lienket`, `hinhanh`, `vitri`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Slider', 'http://openshop.dev/san-pham/samsung-s7', 'bottom-banner1.png', '1', '1', '2017-03-15 07:55:12', '2017-04-27 12:34:46'),
(2, 'Slider', 'http://openshop.dev/san-pham/dong-ho-thong-minh-smartwatch-dz09', 'bottom-banner.png', '1', '1', '2017-03-15 07:55:13', '2017-04-27 12:34:25'),
(3, 'Slider', 'http://openshop.dev/san-pham/bo-do-da-bong-manchester-city-2016-2017', 'bottom-banner1.png', '2', '1', '2017-03-15 07:55:14', '2017-04-27 12:34:12'),
(4, 'Slider', 'http://openshop.dev/san-pham/ao-dai-hoa-hong-kem-man-me-be-me-be-280-ao-me-210', 'bottom-banner1.png', '2', '1', '2017-03-15 07:55:15', '2017-03-15 08:35:43'),
(9, 'opp', 'http://openshop.dev/san-pham/iphone-6-plus', '1489581131-thoikhoabieu.PNG.PNG', '1', '0', '2017-03-15 05:21:56', '2017-03-15 08:35:56'),
(10, 'fsdfgd', 'http://openshop.dev/san-pham/ao-khoac-da-nam-lot-long-vnxk-ak91', '1489737745-thoikhoabieu.PNG.PNG', '2', '0', '2017-03-17 01:02:25', '2017-03-17 01:02:25');

-- --------------------------------------------------------

--
-- Structure de la table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `nhomsanpham_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `tentheloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slugtl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioithieutl` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `theloai`
--

INSERT INTO `theloai` (`id`, `nhomsanpham_id`, `parent_id`, `tentheloai`, `slugtl`, `gioithieutl`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Điện thoại', 'dien-thoai', 'Điện thoại chính hãng', '1', '2016-12-31 05:22:19', '2017-04-06 13:57:33'),
(2, 1, 0, 'Tivi', 'tivi', 'Ti vi với nhiều thương hiệu', '1', '2016-12-31 05:22:56', '2017-03-02 21:02:59'),
(3, 1, 0, 'Laptop', 'laptop', 'Laptop cực sock', '1', '2016-12-31 21:49:53', '2017-04-06 13:57:13'),
(4, 1, 0, 'Máy tính bảng', 'may-tinh-bang', '', '1', '2016-12-31 21:50:10', '2017-01-01 18:33:49'),
(5, 6, 0, 'Thời trang nam', 'thoi-trang-nam', 'Thời trang nam nổi bật', '1', '2017-02-10 01:14:53', '2017-03-11 09:40:24'),
(6, 5, 0, 'Đồ cho bé', 'do-cho-be', '', '1', '2017-02-10 04:30:30', '2017-02-10 04:30:30'),
(7, 5, 0, 'Đồ cho mẹ', 'do-cho-me', '', '1', '2017-02-10 04:30:40', '2017-02-10 04:30:40'),
(8, 4, 0, 'Đồ nội thất', 'do-noi-that', '', '1', '2017-02-24 07:48:57', '2017-02-24 07:48:57'),
(9, 4, 0, 'Dụng cụ làm bếp', 'dung-cu-lam-bep', '', '1', '2017-02-24 07:49:24', '2017-02-24 07:49:24'),
(10, 4, 0, 'Đồ gia dụng nhà bếp', 'do-gia-dung-nha-bep', '', '1', '2017-02-24 07:50:07', '2017-02-24 08:14:26'),
(11, 3, 0, 'Chăm sóc da', 'cham-soc-da', '', '1', '2017-02-24 08:12:51', '2017-02-24 08:12:51'),
(12, 3, 0, 'Mỹ phẩm nam', 'my-pham-nam', '', '1', '2017-02-24 08:13:51', '2017-02-24 08:13:51'),
(13, 2, 0, 'Đồ đá banh', 'do-da-banh', '', '1', '2017-02-24 08:24:00', '2017-02-24 08:24:00'),
(14, 6, 0, 'Giầy dép', 'giay-dep', '', '1', '2017-02-24 17:05:06', '2017-03-02 21:12:34'),
(15, 3, 0, 'Son và chăm sóc môi', 'son-va-cham-soc-moi', '', '1', '2017-03-12 18:37:11', '2017-04-07 08:07:30'),
(16, 2, 0, 'Vali túi xách du lịch', 'vali-tui-xach-du-lich', 'Vali túi xách du lịch', '1', '2017-04-27 07:04:20', '2017-04-27 07:39:17');

-- --------------------------------------------------------

--
-- Structure de la table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `nhanvien_id` int(11) DEFAULT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` longtext COLLATE utf8_unicode_ci,
  `luotxem` bigint(20) DEFAULT NULL,
  `trangthai` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tintuc`
--

INSERT INTO `tintuc` (`id`, `nhanvien_id`, `tieude`, `thumbnail`, `slug`, `noidung`, `luotxem`, `trangthai`, `created_at`, `updated_at`) VALUES
(3, 2, 'MWC 2017: Siêu phẩm LG G6 trình làng với màn hình 18:9, hỗ trợ chống nước IP68', 'f6fc9b9019761b330898116b0057ca1f.jpg', 'mwc-2017-sieu-pham-lg-g6-trinh-lang-voi-man-hinh-189-ho-tro-chong-nuoc-ip68', '<div><img src="https://cdn.tgdd.vn/Files/2017/02/26/954801/gsmarena_049_800x449.jpg" alt="LG" /></div>\r\n<h2>Đ&uacute;ng như dự kiến, vừa mới đ&acirc;y si&ecirc;u phẩm&nbsp;<a href="https://www.thegioididong.com/dtdd/lg-g6" target="_blank" rel="nofollow noopener noreferrer">LG G6</a>&nbsp;đ&atilde; ch&iacute;nh thức tr&igrave;nh l&agrave;ng trong khu&ocirc;n khổ sự kiện MWC 2017.</h2>\r\n<p>Như đ&atilde; từng r&ograve; rỉ th&igrave; LG G6 sở hữu thiết kế lột x&aacute;c so với người tiền nhiệm G5, sản phẩm sở hữu m&agrave;n h&igrave;nh 5.7 inch tỷ lệ 18:9 d&agrave;i v&agrave; hẹp hơn, viền m&agrave;n h&igrave;nh si&ecirc;u mỏng, thiết kế m&ocirc;-đun cũng đ&atilde; loại bỏ ho&agrave;n to&agrave;n.</p>\r\n<p>&nbsp;</p>\r\n<div><img src="https://cdn2.tgdd.vn/Files/2017/02/26/954801/v_800x451.jpg" alt="LG" /></div>\r\n<p>&nbsp;</p>\r\n<p>M&agrave;n h&igrave;nh tiếp tục l&agrave; điểm nhấn tr&ecirc;n flagship mới từ nh&agrave; sản xuất H&agrave;n Quốc khi h&atilde;ng cho biết m&agrave;n h&igrave;nh tr&ecirc;n G6 hỗ trợ hai chuẩn m&agrave;u rộng hơn l&agrave; Dolby Vision v&agrave; HDR 10 gi&uacute;p hiển thị nhiều m&agrave;u sắc, độ tương phản tốt hơn v&agrave; tối ưu h&oacute;a c&aacute;c diễn hoạt trong video.Sản phẩm cũng đi k&egrave;m với camera k&eacute;p 13 MP ở mặt lưng c&ugrave;ng camera g&oacute;c rộng 5 MP ở mặt trước, trang tin&nbsp;<a href="http://www.phonearena.com/news/LG-G6-goes-official-stylish-and-durable-5.7-inch-full-screen-design-in-a-surprisingly-small-body_id91425" target="_blank" rel="nofollow noopener noreferrer">phonearena</a>&nbsp;cho hay.C&aacute;c th&ocirc;ng số c&ograve;n lại gồm m&agrave;n h&igrave;nh 5.7 inch QHD+ 2880 x 1440 px, chip Snapdragon 821, dung lượng RAM 4 GB k&egrave;m bộ nhớ trong 32 GB, vi&ecirc;n pin 3.300 mAh, khả năng chống bụi v&agrave; nước ti&ecirc;u chuẩn IP68. Sản phẩm khởi chạy Android 7.1 mới nhất.</p>', 23, '1', '2017-02-26 19:45:14', '2017-04-26 06:04:12'),
(4, 1, 'MWC 2017: Thời gian lên kệ và giá bán của siêu phẩm LG G6', '7d39009e9bcadb50121a1c4429f71750.jpg', 'mwc-2017-thoi-gian-len-ke-va-gia-ban-cua-sieu-pham-lg-g6', '<div><img alt="LG" src="https://cdn.tgdd.vn/Files/2017/02/26/954852/lg-g6-2017-02-15-2-1_800x450.jpg"></div><h2>Vậy là siêu phẩm&nbsp;<a target="_blank" rel="nofollow" href="https://www.thegioididong.com/dtdd/lg-g6">LG G6</a>&nbsp;đã chính thức trình làng mà không có quá nhiều bất ngờ bởi hầu hết thông tin về sản phẩm đã rò rỉ trước đó, và câu hỏi đặt ra bây giờ là khi nào sản phẩm sẽ được bán ra.</h2><span>Theo đó trang tin&nbsp;<a target="_blank" rel="nofollow" href="http://www.phonearena.com/news/LG-G6-price-and-release-date_id91211">phonearena</a>&nbsp;cho biết LG G6 sẽ cho phép đặt hàng từ ngày 2/3 đến 9/3, sản phẩm sẽ bắt đầu giao đến tay người dùng từ ngày 10/3. Thời gian có thể sớm hoặc muộn hơn đôi chút tùy vào từng thị trường cụ thể.</span>Về giá bán, LG vẫn chưa chính thức công bố nhưng có thể dự đoán vào khoảng 649 USD đến 699 USD (khoảng 14.7 triệu đến 15.9 triệu đồng).Nhắc lại một chút về cấu hình, LG G6 trang bị màn hình 5.7 inch QHD+ 2880 x 1440 px, chip Snapdragon 821, dung lượng RAM 4 GB kèm bộ nhớ trong 32 GB, viên pin 3.300 mAh, khả năng chống bụi và nước tiêu chuẩn IP68. Sản phẩm khởi chạy Android 7.1 mới nhất.', 8, '1', '2017-02-26 20:16:19', '2017-04-26 06:04:39'),
(5, 1, 'Tuần này có gì: Infographic, Oukitel, sau 17 năm, đọ camera với LG G6', 'ac455c93c796b0ccfedbe94bee136d2c.jpg', 'tuan-nay-co-gi-infographic-oukitel-sau-17-nam-do-camera-voi-lg-g6', '<h3 id="mcetoc_1bekdhvdj0">Đ&aacute;nh gi&aacute; chi tiết Oukitel K4000 Pro: Smartphone pin khủng dưới 2 triệu</h3>\r\n<p>L&agrave; một phi&ecirc;n bản n&acirc;ng cấp dung lượng pin của Oukitel K4000,&nbsp;<a href="https://www.vuivui.com/dien-thoai-di-dong/oukitel-k4000-pro" target="_blank" rel="nofollow noopener noreferrer">Oukitel K4000 Pro</a>&nbsp;dường như kh&ocirc;ng c&oacute; thay đổi g&igrave; về phần cứng. Hiện tại sản phẩm đang được ph&acirc;n phối ch&iacute;nh h&atilde;ng tại&nbsp;<a href="https://www.vuivui.com/" target="_blank" rel="nofollow noopener noreferrer">vuivui.com</a>. Ch&uacute;ng ta c&ugrave;ng xem xem Oukitel mang đến những g&igrave; ở ph&acirc;n kh&uacute;c smartphone dưới 2 triệu đồng h&agrave;ng ch&iacute;nh h&atilde;ng.</p>\r\n<div><img src="https://cdn1.tgdd.vn/Files/2017/03/12/959938/namlee10_1280x720_1280x720.jpg" alt="Tun ny c g" width="854" height="480" /></div>\r\n<p>Xem th&ecirc;m:&nbsp;<a href="https://www.thegioididong.com/tin-tuc/danh-gia-chi-tiet-oukitel-k4000-pro-smartphone-pin-khung-duoi-2-trieu-958413" target="_blank" rel="nofollow noopener noreferrer">Đ&aacute;nh gi&aacute; chi tiết Oukitel K4000 Pro: Smartphone pin khủng dưới 2 triệu</a></p>\r\n<h3 id="mcetoc_1bekdhvdj1">Cảm nhận Nokia 3310 "&ocirc;ng tổ": Sau 17 năm thay đổi thế n&agrave;o?</h3>\r\n<p>Thật may mắn khi h&ocirc;m nay m&igrave;nh được mượn hai chiếc&nbsp;<a href="https://www.thegioididong.com/tin-tuc/tim-kiem?key=Nokia+3310" target="_blank" rel="nofollow noopener noreferrer">Nokia 3310</a>&nbsp;phi&ecirc;n bản "đời tống &ocirc;ng sơ" ngay trong khoảng thời gian Nokia 3310 (2017) đang l&agrave;m mưa l&agrave;m gi&oacute; truyền th&ocirc;ng. H&atilde;y c&ugrave;ng m&igrave;nh lật lại lịch sử, so s&aacute;nh nhanh Nokia 3310 phi&ecirc;n bản 2000 v&agrave; 2017.</p>\r\n<div><img src="https://cdn4.tgdd.vn/Files/2017/03/12/959938/img_0737_1280x720_1280x720.jpg" alt="Tun ny c g" width="842" height="474" /></div>\r\n<p>Xem th&ecirc;m:&nbsp;<a href="https://www.thegioididong.com/tin-tuc/cam-nhan-nokia-3310-ong-to-sau-17-nam-thay-doi-the-nao--958455" target="_blank" rel="nofollow noopener noreferrer">Cảm nhận Nokia 3310 "&ocirc;ng tổ": Sau 17 năm thay đổi thế n&agrave;o?</a></p>\r\n<h3 id="mcetoc_1bekdhvdj2">So s&aacute;nh camera của LG G6 v&agrave; Huawei P10 kẻ t&aacute;m lạng người nửa c&acirc;n</h3>\r\n<p>Ch&uacute;ng ta h&atilde;y c&ugrave;ng đi so s&aacute;nh về camera tr&ecirc;n&nbsp;<a href="https://www.thegioididong.com/dtdd/huawei-p10" target="_blank" rel="nofollow noopener noreferrer">Huawei P10</a>v&agrave; LG G6. Cả 2 đều g&acirc;y được sự ch&uacute; &yacute; mạnh mẽ ở sự kiện MWC 2017 vừa qua. Với c&ocirc;ng nghệ Leica tr&ecirc;n cụm camera k&eacute;p tr&ecirc;n Huawei P10 c&oacute; đ&aacute;nh bại được sự cải tiến đ&aacute;ng kể của camera tr&ecirc;n&nbsp;<a href="https://www.thegioididong.com/dtdd/lg-g6" target="_blank" rel="nofollow noopener noreferrer">LG G6</a>&nbsp;vốn đ&atilde; l&agrave; thế mạnh từ l&acirc;u của nh&agrave; sản xuất H&agrave;n Quốc? Mời bạn đi v&agrave;o b&agrave;i so s&aacute;nh sau.</p>\r\n<div><img src="https://cdn2.tgdd.vn/Files/2017/03/12/959938/gsmarena_014_728x454-1_728x410_728x410.jpg" alt="Tun ny c g" /></div>\r\n<p>Xem th&ecirc;m:&nbsp;<a href="https://www.thegioididong.com/tin-tuc/so-sanh-camera-cua-lg-g6-va-huawei-p10-ke-tam-lang-nguoi-nua-can-958509" target="_blank" rel="nofollow noopener noreferrer">So s&aacute;nh camera của LG G6 v&agrave; Huawei P10 kẻ t&aacute;m lạng người nửa c&acirc;n</a></p>\r\n<h3 id="mcetoc_1bekdhvdj3">[Infographic] Đ&aacute;nh gi&aacute; chi tiết pin Galaxy A7 2017: Onscreen 5h30, hỗn hợp hơn 11h</h3>\r\n<p><a href="https://www.thegioididong.com/dtdd/samsung-galaxy-a7-2017" target="_blank" rel="nofollow noopener noreferrer">Galaxy A 2017</a>&nbsp;l&agrave; một bước tiến lớn của Samsung trong ph&acirc;n kh&uacute;c tầm trung cho đến cận cao cấp. Lần trước đ&atilde; c&oacute; b&agrave;i đ&aacute;nh gi&aacute; pin chiếc A5 2017 với số liệu ấn tượng, th&igrave; lần n&agrave;y m&igrave;nh sẽ đ&aacute;nh gi&aacute; lu&ocirc;n thời lượng sử dụng pin tr&ecirc;n chiếc phablet cận cao cấp Galaxy A7 2017 n&agrave;y nh&eacute;.&nbsp;</p>\r\n<div><img src="https://cdn.tgdd.vn/Files/2017/03/12/959938/img_0753_1280x720_1280x720.jpg" alt="Tun ny c g" width="775" height="436" /></div>', 12, '1', '2017-03-12 06:03:33', '2017-04-27 08:33:02');

-- --------------------------------------------------------

--
-- Structure de la table `uathich`
--

CREATE TABLE `uathich` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `uathich`
--

INSERT INTO `uathich` (`id`, `khachhang_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-01-20 17:52:25', '2017-01-20 17:52:25');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `diemvote` float DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `votes`
--

INSERT INTO `votes` (`id`, `sanpham_id`, `diemvote`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 24, 4, '127.0.0.1', '2017-03-19 08:00:13', '2017-03-19 08:00:13'),
(3, 24, 5, '127.0.0.12', '2017-03-19 08:00:13', '2017-03-19 08:00:13'),
(4, 7, 4, '127.0.0.1', '2017-03-19 08:29:48', '2017-03-19 08:29:48'),
(5, 4, 4, '127.0.0.1', '2017-03-19 08:33:03', '2017-03-19 08:33:03'),
(6, 26, 4, '127.0.0.1', '2017-03-19 18:02:24', '2017-03-19 18:02:24'),
(7, 1, 5, '127.0.0.1', '2017-03-20 08:58:17', '2017-03-20 08:58:17'),
(8, 20, 4.5, '127.0.0.1', '2017-03-20 09:19:48', '2017-03-20 09:19:48'),
(9, 25, 4.5, '127.0.0.1', '2017-03-20 18:10:58', '2017-03-20 18:10:58');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Index pour la table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `donhang_id` (`donhang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Index pour la table `chitietnhaphang`
--
ALTER TABLE `chitietnhaphang`
  ADD KEY `nhaphang_id` (`nhaphang_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Index pour la table `chitietuathich`
--
ALTER TABLE `chitietuathich`
  ADD KEY `uathich_id` (`uathich_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Index pour la table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`),
  ADD KEY `khachhang_id` (`khachhang_id`),
  ADD KEY `phuongthucvc_id` (`phuongthucvc_id`),
  ADD KEY `phuongthuctt_id` (`phuongthuctt_id`);

--
-- Index pour la table `facebookkhachhang`
--
ALTER TABLE `facebookkhachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Index pour la table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Index pour la table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhomquyen_id` (`nhomquyen_id`);

--
-- Index pour la table `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Index pour la table `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `password_resets_nhanvien`
--
ALTER TABLE `password_resets_nhanvien`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Index pour la table `phuongthuctt`
--
ALTER TABLE `phuongthuctt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `phuongthucvc`
--
ALTER TABLE `phuongthucvc`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `theloai_id` (`theloai_id`),
  ADD KEY `hangsanxuat_id` (`hangsanxuat_id`);

--
-- Index pour la table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_theloai_nhomsanpham` (`nhomsanpham_id`);

--
-- Index pour la table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhanvien_id` (`nhanvien_id`);

--
-- Index pour la table `uathich`
--
ALTER TABLE `uathich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Index pour la table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `facebookkhachhang`
--
ALTER TABLE `facebookkhachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT pour la table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `nhaphang`
--
ALTER TABLE `nhaphang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `nhomquyen`
--
ALTER TABLE `nhomquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `nhomsanpham`
--
ALTER TABLE `nhomsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `phuongthuctt`
--
ALTER TABLE `phuongthuctt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `phuongthucvc`
--
ALTER TABLE `phuongthucvc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `uathich`
--
ALTER TABLE `uathich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_binhluan_khachhang` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_binhluan_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `FK_chitietdonhang_donhang` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietdonhang_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `chitietnhaphang`
--
ALTER TABLE `chitietnhaphang`
  ADD CONSTRAINT `FK_chitietnhaphang_nhaphang` FOREIGN KEY (`nhaphang_id`) REFERENCES `nhaphang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietnhaphang_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `chitietuathich`
--
ALTER TABLE `chitietuathich`
  ADD CONSTRAINT `FK_chitietuathich_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietuathich_uathich` FOREIGN KEY (`uathich_id`) REFERENCES `uathich` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_donhang_khachhang` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_donhang_nhanvien` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_donhang_phuongthuctt` FOREIGN KEY (`phuongthuctt_id`) REFERENCES `phuongthuctt` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_donhang_phuongthucvc` FOREIGN KEY (`phuongthucvc_id`) REFERENCES `phuongthucvc` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `facebookkhachhang`
--
ALTER TABLE `facebookkhachhang`
  ADD CONSTRAINT `FK_facebookkhachhang_khachhang` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `FK_hinhsanpham_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `thuoc_nhomquyen` FOREIGN KEY (`nhomquyen_id`) REFERENCES `nhomquyen` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD CONSTRAINT `FK_nhaphang_nhanvien` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_hangsanxuat` FOREIGN KEY (`hangsanxuat_id`) REFERENCES `hangsanxuat` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sanpham_theloai` FOREIGN KEY (`theloai_id`) REFERENCES `theloai` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `theloai`
--
ALTER TABLE `theloai`
  ADD CONSTRAINT `FK_theloai_nhomsanpham` FOREIGN KEY (`nhomsanpham_id`) REFERENCES `nhomsanpham` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `FK_tintuc_nhanvien` FOREIGN KEY (`nhanvien_id`) REFERENCES `nhanvien` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `uathich`
--
ALTER TABLE `uathich`
  ADD CONSTRAINT `FK_uathich_khachhang` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `FK_votes_sanpham` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
