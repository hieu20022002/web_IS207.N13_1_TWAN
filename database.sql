-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2022 lúc 04:31 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `twancosmetics`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(30) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `image_id`, `status`, `delete_flag`, `date_created`) VALUES
(5000, 'Cocoon', 'Câu chuyện thương hiệu COCOON - Mỹ phẩm thuần chay - cho nét đẹp thuần Việt', NULL, 1, 0, '2022-11-06 20:38:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `modifiled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
--

CREATE TABLE `cartdetail` (
  `cart_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(100, 'Tẩy Trang'),
(101, 'Sữa rửa mặt'),
(102, 'Tẩy tế bào chết'),
(103, 'Mặt nạ'),
(104, 'Tonner'),
(105, 'Xịt khoáng'),
(106, 'Serum'),
(107, 'Lotion'),
(108, 'Kem dưỡng'),
(109, 'Kem chống nắng'),
(110, 'Chăm sóc vùng da mắt'),
(111, 'Combo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `u_image` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `variant` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` double NOT NULL,
  `price` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `variant`, `product_id`, `quantity`, `price`, `date_created`, `date_updated`) VALUES
(6000000, '100ml', 1000000, 500, 295000, '2022-11-06 22:15:18', NULL),
(6000001, '30ml', 1000000, 500, 115000, '2022-11-06 22:18:15', NULL),
(6000002, '140ml', 1000003, 500, 180000, '2022-11-06 22:20:56', NULL),
(6000003, '5ml', 1000004, 500, 125000, '2022-11-06 22:21:57', '2022-11-06 22:23:24'),
(6000004, '310ml', 1000005, 500, 295000, '2022-11-06 22:22:45', '2022-11-06 22:24:03'),
(6000005, '100ml', 1000007, 500, 300000, '2022-11-06 22:26:30', NULL),
(6000006, '100ml', 1000008, 500, 325000, '2022-11-06 22:27:40', NULL),
(6000007, '140ml', 1000009, 500, 125000, '2022-11-06 22:28:21', NULL),
(6000008, '500ml', 1000009, 500, 275000, '2022-11-06 22:28:53', NULL),
(6000009, 'bộ', 1000002, 500, 584000, '2022-11-06 22:30:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_voucher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modifiled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `SKU` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete_flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `SKU`, `image_id`, `brand_id`, `category_id`, `status`, `delete_flag`) VALUES
(1000000, 'Mặt nạ bí đao', 'test', 'test', NULL, 5000, 103, 1, 0),
(1000002, 'Combo làm sạch và chăm sóc da dầu mụn Cocoon', 'test', 'test1', NULL, 5000, 111, 1, 0),
(1000003, 'Dầu tẩy trang hoa hồng', 'test', 'test2', NULL, 5000, 100, 1, 0),
(1000004, 'Dung dịch chấm mụn bí đao', 'test', 'test3', NULL, 5000, 106, 1, 0),
(1000005, 'Gel bí đao rửa mặt', 'test', 'test5', NULL, 5000, 103, 1, 0),
(1000007, 'Thạch hoa hồng dưỡng ẩm Cocoon', 'test', 'test6', NULL, 5000, 103, 1, 0),
(1000008, 'Mặt nạ hoa hồng', 'test', 'test7', NULL, 5000, 103, 1, 0),
(1000009, 'Nước tẩy trang bí đao', 'test', 'test8', NULL, 5000, 100, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(10, 'Admin'),
(11, 'Người dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gender` bit(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phoneNumber` varchar(10) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modifiled_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `code` mediumint(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `gender`, `email`, `phoneNumber`, `address`, `city`, `image_id`, `username`, `password`, `role_id`, `created_at`, `modifiled_at`, `code`) VALUES
(3000000, 'Nguyễn Minh Hiếu', b'1', 'hieunguyen31122001@gmail.com', '0328357464', 'Thủ Đức, HCM city', 'THủ Đức', NULL, 'admin', 'admin1234', 10, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000001, 'Nguyễn An Tín', b'1', 'mytran86@yahoo.com', '0902041237', 'Phú Mậu Phú Vang Huế', 'Huế', NULL, 'tinna', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000002, 'Trần Thị Bích', b'0', 'lian27111985@yahoo.com', '0902047524', '397 Nguyễn Thái Bình Q. Tân Bình HCM', 'HCM', NULL, 'bichtt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000003, 'Đặng Hoàng Yến', b'0', 'thanhan36@yahoo.com', '0902052681', '170/64 Vườn Lài P.Tân Thành Q.Tân Phú HCM', 'HCM', NULL, 'yendh', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000004, 'Đào Đức Duy', b'1', 'anbody2006@yahoo.com', '0902154845', '1/8 Bis Nguyễn Văn Quá Q.12 TPHCM', 'HCM', NULL, 'duydd', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000005, 'Bùi Thị Cẩm Vân', b'0', 'anhparkland@yahoo.com', '0902301050', '20/2A Tổ 64 P.16 Q.Tân Bình HCM', 'HCM', NULL, 'vanbtc', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000006, 'Quách Thanh Liêm', b'1', 'hoaxuyenchi1802@yahoo.com', '0902351038', '199/20 Tân Quý P.Tân Quý Q.Tân Phú TPHCM', 'HCM', NULL, 'liemqt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000007, 'Nguyễn Thị Minh Trang', b'0', 'honganh20002@yahoo.com', '0902367442', '232/47 Lý Thường Kiệt P.14 Q.10 HCM', 'HCM', NULL, 'trangntm', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000008, 'Nguyễn Hữu Thoại', b'1', 'nguyenbichbich@gmail.com', '0902412347', '84/19 Tân Sơn Nhì Tân Phú HCM', 'HCM', NULL, 'thoainh', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL),
(3000009, 'Bùi Thị Lợi', b'0', 'ephamba@gmail.com', '0902446778', '84/19 Tân Sơn Nhì Tân Phú HCM', 'HCM', NULL, 'loibt', '123456', 11, '2022-11-06 00:00:00', '2022-11-06 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `code` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `discount_percentage` decimal(10,0) NOT NULL,
  `discount_price` decimal(10,0) NOT NULL,
  `exp` datetime NOT NULL,
  `min_bill` decimal(10,0) NOT NULL,
  `remain` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Brand_Image` (`image_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cart_User` (`user_id`);

--
-- Chỉ mục cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`cart_id`,`inventory_id`),
  ADD KEY `FK_CartDetail_Inventory` (`inventory_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Feedback_User` (`user_id`),
  ADD KEY `FK_Feedback_Product` (`product_id`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_Inventory_Product` (`product_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Order_User` (`user_id`),
  ADD KEY `Fk_Order_Voucher` (`id_voucher`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_id`,`inventory_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Post_Image` (`image_id`),
  ADD KEY `FK_Post_User` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `Fk_Product_Image` (`image_id`),
  ADD KEY `Fk_Product_Brand` (`brand_id`),
  ADD KEY `FK_Product_Category` (`category_id`);
ALTER TABLE `product` ADD FULLTEXT KEY `description` (`description`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `Fk_User_Image` (`image_id`),
  ADD KEY `FK_User_Role` (`role_id`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Voucher_Image` (`image_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5001;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4000000;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6000010;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5000000;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11000;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000010;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3000010;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21000;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `Fk_Brand_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_Cart_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `FK_CartDetail_Cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CartDetail_Inventory` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_Feedback_Product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_Feedback_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `Fk_Inventory_Product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_Order_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Order_Voucher` FOREIGN KEY (`id_voucher`) REFERENCES `voucher` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderDetail_Order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Post_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `FK_Post_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_Category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Product_Brand` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Product_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_Role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `Fk_User_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Các ràng buộc cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `FK_Voucher_Image` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
