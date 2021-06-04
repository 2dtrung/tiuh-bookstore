-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th6 04, 2021 lúc 03:45 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) NOT NULL,
  `rating` float(2,1) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `author`, `category`, `status`, `code`, `rating`, `price`, `image`) VALUES
(1, 'How to Win Friends and Influence People', 'Dale Carnegie', 'life', 'Bán chạy', 'DS01', 4.5, '90000', ' ./img/product-img/1.jpg'),
(2, 'The One Thing', 'Gary Keller và Jay Papasa', 'life', '', 'DS02', 2.8, '75000', ' ./img/product-img/2.jpg'),
(3, 'Being A Happy Teenager', 'Andrew Matthews', 'life', 'Bán chạy', 'DS03', 3.8, '52000', ' ./img/product-img/3.jpg'),
(4, 'Thinking Big', 'David J', 'life', '', 'DS04', 3.2, '66000', ' ./img/product-img/4.jpg'),
(5, 'The Alchemist', ' Paulo Coelho', 'life', '', 'DS05', 4.5, '36000', ' ./img/product-img/5.jpg'),
(6, 'A New Earth: Awakening to Your Life\'s Purpose', 'Eckhart Tolle', 'life', 'Hết hàng', 'DS06', 5.0, '136000', ' ./img/product-img/6.jpg'),
(7, '451 độ F', 'Stephen R', 'fiction', '', 'VT01', 3.0, '126000', ' ./img/product-img/7.jpg'),
(8, 'Người Về Từ Sao Hỏa', 'Andy Weir', 'fiction', 'Hết hàng', 'VT02', 2.6, '129000', ' ./img/product-img/8.jpg'),
(9, 'Hai Vạn Dặm Dưới Đáy Biển', 'Jules Verne', 'fiction', '', 'VT03', 4.2, '136000', ' ./img/product-img/9.jpg'),
(10, 'Bí Kíp Quá Giang Vào Ngân Hà', 'Douglas Adams', 'fiction', 'Bán chạy', 'VT04', 3.2, '36000', ' ./img/product-img/10.jpg'),
(11, 'Cỗ Máy Thời Gian', 'H. G. Wells', 'fiction', '', 'VT05', 2.4, '260000', './img/product-img/11.jpg'),
(12, 'Tôi là người máy', 'Isaac Asimov', 'fiction', '', 'VT06', 4.2, '290000', ' ./img/product-img/12.jpg'),
(13, 'Tiếng chim hót trong bụi mận gai', 'Colleen McCullough', 'novel', '', 'TT01', 4.1, '36000', ' ./img/product-img/13.jpg'),
(14, 'Ông già và biển cả', 'Ernest Hemingway', 'novel', '', 'TT02', 4.0, '316000', ' ./img/product-img/14.jpg'),
(15, 'Hai số phận', 'Jeffrey Archer', 'novel', 'Bán chạy', 'TT03', 3.8, '126000', ' ./img/product-img/15.jpg'),
(16, 'Kẻ Trộm Sách', 'Markus Zusak', 'novel', '', 'TT04', 4.2, '129000', ' ./img/product-img/16.jpg'),
(17, 'Rừng Na Uy', 'Haruki Murakami', 'novel', '', 'TT05', 3.7, '76000', ' ./img/product-img/17.jpg'),
(18, 'Không gia đình', 'Hector Malot', 'novel', 'Hết hàng', 'TT06', 3.6, '75000', ' ./img/product-img/18.jpg'),
(19, 'Lược Sử Thời Gian', 'Stephen Hawking', 'tech', '', 'CN01', 4.7, '152000', ' ./img/product-img/19.jpg'),
(20, 'Lược Sử Vạn Vật', 'Bill Bryson', 'tech', '', 'CN02', 4.9, '166000', ' ./img/product-img/20.jpg'),
(21, 'Einstein – Cuộc Đời Và Vũ Trụ', 'Walter Isaacson', 'tech', '', 'CN03', 3.9, '76000', ' ./img/product-img/21.jpg'),
(22, 'Tế Bào Gốc: Khám Phá Cùng Nhà Khoa Học', 'Paul Knoepfler', 'tech', 'Bán chạy', 'CN04', 2.9, '75000', ' ./img/product-img/22.jpg'),
(23, 'GEN: Lịch Sử Và Tương Lai Của Nhân Loại', 'Siddhartha Mukherjee', 'tech', '', 'CN05', 2.5, '152000', ' ./img/product-img/23.jpg'),
(24, 'Nguồn Gốc Các Loài', 'Charles Darwin', 'tech', '', 'CN06', 4.7, '66000', ' ./img/product-img/24.jpg'),
(25, 'Ayoade On top', 'Ayoade Richard', 'comedy', 'Giảm giá', 'CM5', 4.6, '340000', './img/product-img/product11.jpg'),
(26, 'The Divine Comedy', 'Dante', 'comedy', 'Giám giá', 'CM4', 4.0, '110000', './img/product-img/product10.jpg'),
(27, 'Happy Girl Lucky', 'Holly Smale', 'comedy', 'Giảm giá', 'CM3', 3.8, '145000', './img/product-img/product9.jpg'),
(28, 'Eleanor Oliphant', 'Gail Honeyman', 'comedy', 'Giảm giá', 'CM2', 4.1, '66000', './img/product-img/product8.jpg'),
(29, 'Maxx Comedy', 'Gordon Korman', 'comedy', '', 'CM6', 4.7, '290000', './img/product-img/product12.jpg'),
(30, 'Crazy Rich Asian', 'Kevin Kwan', 'comedy', 'Hết hàng', 'CM1', 4.7, '235000', './img/product-img/product7.jpg'),
(31, 'Phantom Thread', 'Thomas Anderson', 'horror', 'Còn hàng', 'HR1', 4.5, '200000', './img/product-img/product2.jpg'),
(32, 'The Apartment', 'Slater', 'horror', 'Bán chạy', 'HR4', 4.5, '120000', './img/product-img/product4.jpg'),
(33, 'Scary Stories', 'Alvin', 'horror', 'Hết hàng', 'HR5', 4.2, '120000', './img/product-img/product5.jpg'),
(34, 'Destroyer', 'Victor Lavalle', 'horror', 'Hết hàng', 'HR6', 4.6, '210000', './img/product-img/product6.jpg'),
(35, 'IT', 'Stephen King', 'horror', 'Còn hàng', 'HR2', 4.9, '180000', './img/product-img/product1.jpg'),
(36, 'The Troop', 'Nick Cutter', 'horror', 'Còn hàng', 'HR3', 4.2, '172000', './img/product-img/product3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `name` varchar(25) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `user_level` int(11) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `name`, `phone`, `address`, `user_level`) VALUES
(1, 'tuhuynh', '$2y$10$v0cNajTLVfkemo1TdMIBu.iiXl0uBysfD8NlCzf22W2Wvm374wE.6', '2020-06-27 09:37:56', '', '0', '', 0),
(4, 'trung2418', '$2y$10$WnO5jDSYSFzFLv8Y.4lh2eetmg6J8mO7MUNaC5vIp14ffB7R2NSKe', '2020-07-10 10:22:20', '', '0', '', 0),
(5, '1713691', '$2y$10$8DoHwjjOAoxMah4GIw1qEedy4zPP.ouQtpbUOmCPVYePMfGSgbrF2', '2021-05-30 13:29:27', 'Le Duc T', '0988577367', 'Dĩ An, Bình Dương', 1),
(6, 'abcd', '$2y$10$53g4NIUF7yP6CuEQAteweuyw4mRTCi5ieodd8rzXcP426YuOXyPDO', '2021-05-30 13:41:33', 'Do Duc Trung', '927746924', 'Phuong Linh Xuan', 0),
(7, 'abcxyz', '$2y$10$UxnVuhg4/.2VbYo7dZrEy.qBQMex.YRVpRvYhfPSPZW26igXpkMTe', '2021-06-01 11:09:51', 'Do Duc Trung', '927746924', 'Phuong Linh Xuan', 0),
(8, 'tr', '$2y$10$LpzuFF7DVlCB1XzeTwtofOAWcsFCMJk/j7GHEaebMpNRkbhqAqmz6', '2021-06-01 11:42:18', 'Do Duc Trung', '927746924', 'Phuong Linh Xuan', 0),
(9, 'admin', '$2y$10$HNoG3i50hZf2j/or2yHe/u95Oy4tlx2hK.eGgSWHR15K3ZKSbdXoK', '2021-06-04 22:44:17', 'ADMIN', '0927746924', 'Phuong Linh Xuan', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
