-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 29, 2020 lúc 06:30 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_tshirt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idad` int(50) NOT NULL,
  `tendangnhapad` varchar(50) NOT NULL,
  `matkhauad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idad`, `tendangnhapad`, `matkhauad`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(100) NOT NULL,
  `idkh` int(100) NOT NULL,
  `sanpham` varchar(100) NOT NULL,
  `ngaymua` varchar(100) NOT NULL,
  `tongtien` int(100) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `ghichu` varchar(50) NOT NULL,
  `trangthai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `idkh`, `sanpham`, `ngaymua`, `tongtien`, `hoten`, `email`, `sodienthoai`, `diachi`, `ghichu`, `trangthai`) VALUES
(71, 1, 'Black/Red Flannel (1)<br>Black Skinny Jeans (1)<br>', 'May 26, 2020, 9:37 am', 1200000, 'Duy Võ', 'voduy200999@gmail.com', '0773355662', 'Ninh Kiều, Cần Thơ', 'giao hàng nhanh nhé', '2'),
(72, 2, 'Marilyn Manson Tee (1)<br>', 'May 26, 2020, 9:38 am', 700000, 'Diễm My', 'mytran165@gmail.com', '0329545822', 'Ninh Kiều, Cần Thơ', 'giao hàng nhanh nhé', '1'),
(73, 20, 'Smoker Tee (Black) (2)<br>Black Basic Jeans (1)<br>', 'May 26, 2020, 9:45 am', 1890000, 'Lý Phếnh', 'phenhdep@gmail.com', '0794131818', 'Ngã Bảy, Hậu Giang', 'giao hàng nhanh nhé', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `loai` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `idsp` int(50) NOT NULL,
  `idkh` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `amount` int(50) DEFAULT NULL,
  `loai` varchar(50) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `amount`, `loai`, `price`, `picture`) VALUES
(1, 'Black Basic Tee', 10, 'tshirt', 350, 'sanpham/T-ShirtBlack.jpg'),
(2, 'White Basic Tee', 10, 'tshirt', 350, 'sanpham/T-ShirtWhite.jpg'),
(3, 'Gray Basic Tee', 10, 'tshirt', 350, 'sanpham/T-ShirtGray.jpg'),
(4, 'Olive Basic Tee', 10, 'tshirt', 350, 'sanpham/T-ShirtOlive.jpg'),
(5, 'Eagle Thunder Tee', 10, 'tshirt', 500, 'sanpham/eagle.jpg'),
(6, 'The Lost Boys Tee (Black)', 10, 'tshirt', 500, 'sanpham/thelostboys_black.jpg'),
(7, 'The Lost Boys Tee (White)', 10, 'tshirt', 500, 'sanpham/8.jpg'),
(8, 'Marilyn Manson Tee', 10, 'tshirt', 700, 'sanpham/manson.jpg'),
(9, 'Smoker Tee (Black)', 10, 'tshirt', 500, 'sanpham/smoker_black.jpg'),
(10, 'Smoker Tee (White)', 10, 'tshirt', 500, 'sanpham/smoker_white.jpg'),
(11, 'Black/Red Flannel', 10, 'shirts', 550, 'sanpham/flannelred1.jpg'),
(12, 'Yellow Flannel ', 10, 'shirts', 550, 'sanpham/flannelyellow.jpg'),
(13, 'Blue/Red Flannel', 10, 'shirts', 550, 'sanpham/flannelred.jpg'),
(14, 'Flamigo Flannel', 10, 'shirts', 550, 'sanpham/flannelflamigo.jpg'),
(15, 'Belgrade Flannel', 10, 'shirts', 450, 'sanpham/belgrade-compressor_1920x@2x.jpg'),
(16, 'Lisbon Flannel', 10, 'shirts', 450, 'sanpham/lisbon-plaid-compressor_1920x@2x.jpg'),
(17, 'Black/White Flannel', 10, 'shirts', 550, 'sanpham/gotica-compressor_1920x@2x.jpg'),
(18, 'Brick Oganre Flannel', 10, 'shirts', 550, 'sanpham/elysee-plaid-compressor_1920x@2x.jpg'),
(19, 'Light Blue Jeans', 10, 'jeans', 650, 'sanpham/lightblue.jpg'),
(20, 'Black Basic Jeans', 10, 'jeans', 890, 'sanpham/jeansblack.jpg'),
(21, 'Dark Blue Jeans', 10, 'jeans', 650, 'sanpham/darkblue.jpg'),
(22, 'Black Skinny Jeans', 10, 'jeans', 650, 'sanpham/blackskinny.jpg'),
(23, 'Cargo Jeans', 10, 'jeans', 500, 'sanpham/cargo.jpg'),
(24, 'Light Blue Crack Jeans', 10, 'jeans', 750, 'sanpham/lightbluecrack.jpg'),
(25, 'Distressed Skinny Jeans', 10, 'jeans', 750, 'sanpham/blackskinny1.jpg'),
(26, 'Dark Blue Crack Jeans', 10, 'jeans', 750, 'sanpham/darkbluecrack.jpg'),
(27, 'Michael Jackson Tee (Black)', 10, 'tshirt', 500, 'sanpham/michael_black.jpg'),
(28, 'Michael Jackson Tee (White)', 10, 'tshirt', 500, 'sanpham/michael_white.jpg'),
(29, 'Red Leon Flannel', 10, 'shirts', 3500, 'sanpham/redleon_1920x@2x.jpg'),
(30, 'Blue Leon Flannel', 10, 'shirts', 3500, 'sanpham/LEON-PLAID-compressor_1_1920x@2x.webp'),
(31, 'Azul Cava Flannel', 10, 'shirts', 3500, 'sanpham/fw19_plaid1FIX-compressor_1920x@2x.webp'),
(32, 'Aman Zipper Flannel', 10, 'shirts', 3500, 'sanpham/aman-zipper-compressor_1920x@2x.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(50) NOT NULL,
  `ho` varchar(50) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tendangnhap` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `sodienthoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `ho`, `ten`, `email`, `tendangnhap`, `matkhau`, `sodienthoai`) VALUES
(1, 'Võ', 'Duy', 'voduy200999@gmail.com', 'duyvo209', '123', '0773355662'),
(2, 'Trần', 'My', 'mytran165@gmail.com', 'mytran411', '123', '0329545822'),
(20, 'Châu', 'Phếnh', 'phenhdep@gmail.com', 'phenhchau1812', '123', '0794131818'),
(48, 'Vo', 'Duy', 'duyb1706456@student.ctu.edu.vn', 'vokhanhduy', 'vokhanhduy', '0773355662'),
(50, 'Huỳnh', 'Phúc', 'kengungoc@gmail.com', 'thanhphuc', '123456789', '0123456789');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idad`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkh` (`idkh`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkh` (`idkh`),
  ADD KEY `giohang_ibfk_1` (`idsp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idad` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`idkh`) REFERENCES `thanhvien` (`id`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idkh`) REFERENCES `thanhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
