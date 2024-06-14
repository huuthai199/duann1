-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 02, 2024 lúc 02:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(10) NOT NULL,
  `bill_email` varchar(100) NOT NULL,
  `bill_pttt` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán trực tiếp 2.Thanh toán chuyển khoản 3.Thanh toán online',
  `ngaydathang` varchar(50) DEFAULT NULL,
  `tongdonhang` int(10) NOT NULL DEFAULT 0,
  `tinhtrang` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0.Đơn hàng mới 1.Đang xử lí 2.Đang giao hàng 3.đã giao hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydathang`, `tongdonhang`, `tinhtrang`) VALUES
(16, 0, 'Thai Huu', '23 tran phu', '0334306410', 'thainhph44403@fpt.edu.vn', 0, '10:48:24am 01/02/2024', 1624000, 0),
(21, 0, 'Thai Huu', '23 tran phu', '0334306410', 'thainhph44403@fpt.edu.vn', 0, '01:36:25am 02/02/2024', 1265000, 1),
(22, 0, 'hihi123', '23 tran phu', '127', 'thainhph44403@fpt.edu.vn', 0, '01:49:51am 02/02/2024', 3433000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` varchar(30) NOT NULL,
  `idpro` int(10) NOT NULL,
  `ngaybinhluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `iduser`, `idpro`, `ngaybinhluan`) VALUES
(1, 'tại sao ', 'hihi123', 7, '2002-07-08 00:00:00'),
(2, 'lú thế', 'hihi123', 7, '2002-07-22 00:00:00'),
(5, 'hú', 'hihi123', 9, '01:54:17am 02/02/2024');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `iduser` int(10) NOT NULL,
  `idpro` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT 0,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(10) NOT NULL,
  `idbill` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idpro`, `img`, `name`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(1, 1, 7, '../upload/s-product-2.jpg', 'Máy cạo râu 3 răng', 756000, 1, 756000, 1),
(2, 1, 8, '../upload/s-product-1.jpg', 'Cọ đánh má ', 112000, 1, 112000, 1),
(3, 1, 7, '../upload/s-product-2.jpg', 'Máy cạo râu 3 răng', 756000, 1, 756000, 2),
(4, 1, 8, '../upload/s-product-1.jpg', 'Cọ đánh má ', 112000, 1, 112000, 2),
(5, 1, 6, '../upload/jd5-removebg-preview.png', 'Giày Nile cổ cao phối màu đen vàng', 1300000, 1, 1300000, 3),
(6, 1, 8, '../upload/s-product-1.jpg', 'Cọ đánh má ', 112000, 1, 112000, 4),
(7, 1, 7, '../upload/s-product-2.jpg', 'Máy cạo râu 3 răng', 756000, 1, 756000, 5),
(8, 1, 9, '../upload/product-10.jpg', 'Nước hoa Taylor', 1265000, 1, 1265000, 5),
(9, 1, 7, '../upload/s-product-2.jpg', 'Máy cạo râu 3 răng', 756000, 1, 756000, 5),
(10, 0, 7, '../upload/s-product-2.jpg', 'Máy cạo râu 3 răng', 756000, 1, 756000, 6),
(11, 0, 4, '../upload/product-14.jpg', 'Bảng kẻ mắt 12 màu trung tính', 435000, 1, 435000, 8),
(12, 4, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 10),
(13, 4, 8, '../upload/nike-sb-dunk-low-black-white.jpg', 'nike-sb-dunk-low-black-white', 112000, 1, 112000, 11),
(14, 4, 9, '../upload/ultra-boost-light-red-white.jpg', 'ultra-boost-light-red-white', 1265000, 1, 1265000, 11),
(15, 4, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 11),
(16, 4, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 12),
(21, 1, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 16),
(22, 1, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 16),
(23, 1, 8, '../upload/nike-sb-dunk-low-black-white.jpg', 'nike-sb-dunk-low-black-white', 112000, 1, 112000, 16),
(28, 1, 9, '../upload/ultra-boost-light-red-white.jpg', 'ultra-boost-light-red-white', 1265000, 1, 1265000, 21),
(29, 1, 9, '../upload/ultra-boost-light-red-white.jpg', 'ultra-boost-light-red-white', 1265000, 1, 1265000, 22),
(30, 1, 8, '../upload/nike-sb-dunk-low-black-white.jpg', 'nike-sb-dunk-low-black-white', 112000, 1, 112000, 22),
(31, 1, 7, '../upload/nike-dunk-low-lottery.jpg', 'nike-dunk-low-lottery', 756000, 1, 756000, 22),
(32, 1, 6, '../upload/jd5-removebg-preview.png', 'Giày Nile cổ cao đen vàng', 1300000, 1, 1300000, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(10) NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `gia` int(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `tongdonhang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'adidas'),
(2, 'nike'),
(3, 'converse');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(10) NOT NULL DEFAULT 0,
  `iddm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `price`, `img`, `mota`, `luotxem`, `iddm`) VALUES
(1, 'adidas-ultra-boost-22-core', 1250000, '../upload/adidas-ultra-boost-22-core-black-mint.jpg', '', 10, 1),
(2, 'air-force-1-low-multi', 250000, '../upload/air-force-1-low-multi-etch-swoosh-white-black.jpg', '', 30, 2),
(3, 'converse-chuck', 2560000, '../upload/converse-chuck-1970-den-co-thap-nam-nu.jpg', '', 22, 3),
(4, 'converse-chuck-taylor', 756000, '../upload/converse-chuck-taylor-all-star-lift-festival-high-white.jpg', '', 56, 3),
(5, 'converse-high-red-heart', 300000, '../upload/converse-high-red-heart.jpg', '', 62, 3),
(6, 'Giày Nile cổ cao đen vàng', 1300000, '../upload/jd5-removebg-preview.png', '', 105, 2),
(7, 'nike-dunk-low-lottery', 756000, '../upload/nike-dunk-low-lottery.jpg', '', 0, 2),
(8, 'nike-sb-dunk-low-black-white', 112000, '../upload/nike-sb-dunk-low-black-white.jpg', '', 63, 2),
(9, 'ultra-boost-light-red-white', 1265000, '../upload/ultra-boost-light-red-white.jpg', '', 52, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` tinyint(20) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `user`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'hihi123', '123456', 'thainhph44403@fpt.edu.vn', '23 tran phu', 127, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lkidbill` (`idbill`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lkiddm` (`iddm`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lkidbill` FOREIGN KEY (`idbill`) REFERENCES `cart` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
