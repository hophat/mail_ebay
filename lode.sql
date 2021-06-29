-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2021 lúc 07:25 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chot_so`
--

CREATE TABLE `tbl_chot_so` (
  `chot_so_id` int(11) NOT NULL,
  `chot_so_user_id` int(11) NOT NULL,
  `lo_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lo_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_btl` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `de_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `de_2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `de_3` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `de_4` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `de_5` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `de_6` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `mien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chot_so`
--

INSERT INTO `tbl_chot_so` (`chot_so_id`, `chot_so_user_id`, `lo_1`, `lo_2`, `lo_btl`, `de_1`, `de_2`, `de_3`, `de_4`, `de_5`, `de_6`, `date`, `created`, `mien`) VALUES
(14, 4, '11', '11', '32', '12', '22', '23', '12', '3', '12', '2021-06-27', '2021-06-27 10:45:43', 0),
(16, 5, '22', '32', '66', '12', '23', '43', '23', '41', '42', '2021-06-27', '2021-06-27 11:09:58', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_kq_lo_dau`
--

CREATE TABLE `tbl_kq_lo_dau` (
  `lo_dau_id` int(11) NOT NULL,
  `lo_dau_0` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_dau_total` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_kq_lo_dau`
--

INSERT INTO `tbl_kq_lo_dau` (`lo_dau_id`, `lo_dau_0`, `lo_dau_1`, `lo_dau_2`, `lo_dau_3`, `lo_dau_4`, `lo_dau_5`, `lo_dau_6`, `lo_dau_7`, `lo_dau_8`, `lo_dau_9`, `lo_dau_total`, `date`, `created`) VALUES
(8, '00 ; 01 ; 05', '10 ; 19', '26 ; 27', '39 ; 39', '42 ; 48 ; 49 ; 49 ; 49', '51 ; 52', '61 ; 63 ; 66', '74 ; 78 ; 78 ; 79', '84 ; 84', '90 ; 90', '00 ; 01 ; 05;10 ; 19;26 ; 27;39 ; 39;42 ; 48 ; 49 ; 49 ; 49;51 ; 52;61 ; 63 ; 66;74 ; 78 ; 78 ; 79;84 ; 84;90 ; 90;', '2021-06-26', '2021-06-27 12:00:17'),
(9, '', '', '', '', '', '', '', '', '', '', ';;;;;;;;;;', '2021-06-27', '2021-06-27 12:17:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_kq_lo_duoi`
--

CREATE TABLE `tbl_kq_lo_duoi` (
  `lo_duoi_id` int(11) NOT NULL,
  `lo_duoi_0` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_8` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_9` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi_total` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_kq_lo_duoi`
--

INSERT INTO `tbl_kq_lo_duoi` (`lo_duoi_id`, `lo_duoi_0`, `lo_duoi_1`, `lo_duoi_2`, `lo_duoi_3`, `lo_duoi_4`, `lo_duoi_5`, `lo_duoi_6`, `lo_duoi_7`, `lo_duoi_8`, `lo_duoi_9`, `lo_duoi_total`, `date`, `created`) VALUES
(7, '00 ; 10 ; 90 ; 90', '01 ; 51 ; 61', '42 ; 52', '63', '74 ; 84 ; 84', '05', '26 ; 66', '27', '48 ; 78 ; 78', '19 ; 39 ; 39 ; 49 ; 49 ; 49 ; 79', '00 ; 10 ; 90 ; 90;01 ; 51 ; 61;42 ; 52;63;74 ; 84 ; 84;05;26 ; 66;27;48 ; 78 ; 78;19 ; 39 ; 39 ; 49 ', '2021-06-26', '2021-06-27 12:00:17'),
(8, '', '', '', '', '', '', '', '', '', '', ';;;;;;;;;;', '2021-06-27', '2021-06-27 12:17:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_kq_xs`
--

CREATE TABLE `tbl_kq_xs` (
  `kq_xs_id` int(11) NOT NULL,
  `kq_xs_db` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_6` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_7` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kq_xs_date` date NOT NULL,
  `kq_xs_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_kq_xs`
--

INSERT INTO `tbl_kq_xs` (`kq_xs_id`, `kq_xs_db`, `kq_xs_1`, `kq_xs_2`, `kq_xs_3`, `kq_xs_4`, `kq_xs_5`, `kq_xs_6`, `kq_xs_7`, `kq_xs_date`, `kq_xs_created`) VALUES
(8, '[\"20290\"]', '[\"47139\"]', '[\"21826\",\"45549\"]', '[\"86949\",\"39905\",\"81448\",\"26263\",\"91519\",\"93679\"]', '[\"3378\",\"9684\",\"2651\",\"3661\"]', '[\"8627\",\"5066\",\"8490\",\"5649\",\"3101\",\"9484\"]', '[\"300\",\"842\",\"178\"]', '[\"10\",\"74\",\"39\",\"39\"]', '2021-06-26', '2021-06-27 12:00:16'),
(9, '[null]', '[null]', '[null,null]', '[null,null,null,null,null,null]', '[null,null,null,null]', '[null,null,null,null,null,null]', '[null,null,null]', '[null,null,null,null]', '2021-06-27', '2021-06-27 12:17:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lo`
--

CREATE TABLE `tbl_lo` (
  `lo_id` int(11) NOT NULL,
  `lo_dau` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lo_duoi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lo_date` date NOT NULL,
  `lo_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_avatar` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(11) NOT NULL,
  `user_diem_lo` int(11) NOT NULL DEFAULT 0,
  `user_diem_db` int(11) NOT NULL DEFAULT 0,
  `user_diem_btl` int(11) NOT NULL DEFAULT 0,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_avatar`, `user_phone`, `user_pass`, `user_active`, `user_diem_lo`, `user_diem_db`, `user_diem_btl`, `user_email`, `user_created`) VALUES
(1, 'phatho@gmail.com', '', '0989555412', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, 0, 0, 0, 'phatho@gmail.com', '2021-06-26 11:37:17'),
(3, 'phatho@gmail.com', '', '0989555413', 'f5bb0c8de146c67b44babbf4e6584c', 0, 0, 0, 0, 'phatho@gmail.com', '2021-06-26 11:38:10'),
(4, '123456', 'https://chotlo.com/images/avt/soi-cau-366.png', '1234567890', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, 0, 0, 0, 'phat@gmail.com', '2021-06-27 09:44:19'),
(5, 'phatle', 'https://chotlo.com/upload/thumbs/100/100/files/2020/09/526c6b1c-c01e-405a-8d9b-8ca435d0c21cjpeg1598931352.jpeg', '0909090909', 'f5bb0c8de146c67b44babbf4e6584cc0', 0, 0, 0, 0, 'hh@gmail.com', '2021-06-27 11:09:27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chot_so`
--
ALTER TABLE `tbl_chot_so`
  ADD PRIMARY KEY (`chot_so_id`);

--
-- Chỉ mục cho bảng `tbl_kq_lo_dau`
--
ALTER TABLE `tbl_kq_lo_dau`
  ADD PRIMARY KEY (`lo_dau_id`);

--
-- Chỉ mục cho bảng `tbl_kq_lo_duoi`
--
ALTER TABLE `tbl_kq_lo_duoi`
  ADD PRIMARY KEY (`lo_duoi_id`);

--
-- Chỉ mục cho bảng `tbl_kq_xs`
--
ALTER TABLE `tbl_kq_xs`
  ADD PRIMARY KEY (`kq_xs_id`),
  ADD UNIQUE KEY `kq_xs_date` (`kq_xs_date`);

--
-- Chỉ mục cho bảng `tbl_lo`
--
ALTER TABLE `tbl_lo`
  ADD PRIMARY KEY (`lo_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chot_so`
--
ALTER TABLE `tbl_chot_so`
  MODIFY `chot_so_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_kq_lo_dau`
--
ALTER TABLE `tbl_kq_lo_dau`
  MODIFY `lo_dau_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_kq_lo_duoi`
--
ALTER TABLE `tbl_kq_lo_duoi`
  MODIFY `lo_duoi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_kq_xs`
--
ALTER TABLE `tbl_kq_xs`
  MODIFY `kq_xs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_lo`
--
ALTER TABLE `tbl_lo`
  MODIFY `lo_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
