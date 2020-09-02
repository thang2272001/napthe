-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 12, 2020 lúc 09:01 AM
-- Phiên bản máy phục vụ: 5.6.47-cll-lve
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `democode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_bank`
--

CREATE TABLE `TMQ_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `bank` text CHARACTER SET utf8,
  `ctk` text CHARACTER SET utf8,
  `stk` text CHARACTER SET utf8,
  `chinhanh` text CHARACTER SET utf8,
  `bank_type` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_biendoi`
--

CREATE TABLE `TMQ_biendoi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `noidung` text CHARACTER SET utf32 NOT NULL,
  `truocgd` int(11) NOT NULL,
  `saugd` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_chietkhau`
--

CREATE TABLE `TMQ_chietkhau` (
  `id` bigint(20) NOT NULL,
  `loaithe` text,
  `10000` int(11) DEFAULT NULL,
  `20000` int(11) DEFAULT NULL,
  `30000` int(11) DEFAULT NULL,
  `50000` int(11) DEFAULT NULL,
  `100000` int(11) DEFAULT NULL,
  `200000` int(11) DEFAULT NULL,
  `300000` int(11) DEFAULT NULL,
  `500000` int(11) DEFAULT NULL,
  `1000000` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_chuyentien`
--

CREATE TABLE `TMQ_chuyentien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid_chuyen` text NOT NULL,
  `uid_nhan` text NOT NULL,
  `sotien` int(11) NOT NULL,
  `time` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_gachthe`
--

CREATE TABLE `TMQ_gachthe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `serial` text CHARACTER SET utf8,
  `mathe` text CHARACTER SET utf8,
  `menhgia` int(11) DEFAULT NULL,
  `thucnhan` int(11) NOT NULL,
  `loaithe` text CHARACTER SET utf8,
  `trangthai` text CHARACTER SET utf8 NOT NULL,
  `time` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_key`
--

CREATE TABLE `TMQ_key` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_khothe`
--

CREATE TABLE `TMQ_khothe` (
  `id` bigint(20) NOT NULL,
  `uid` text CHARACTER SET utf8 NOT NULL,
  `serial` text CHARACTER SET utf8 NOT NULL,
  `mathe` text CHARACTER SET utf8 NOT NULL,
  `menhgia` text CHARACTER SET utf8 NOT NULL,
  `loaithe` text CHARACTER SET utf8 NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_loaithe`
--

CREATE TABLE `TMQ_loaithe` (
  `id` bigint(20) NOT NULL,
  `menhgia` int(11) NOT NULL,
  `loaithe` text CHARACTER SET utf8 NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_muathe`
--

CREATE TABLE `TMQ_muathe` (
  `id` bigint(20) NOT NULL,
  `uid` text CHARACTER SET utf8,
  `serial` text CHARACTER SET utf8,
  `mathe` text CHARACTER SET utf8,
  `menhgia` int(11) DEFAULT NULL,
  `loaithe` text CHARACTER SET utf8,
  `trutien` int(11) NOT NULL,
  `date` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_napthe`
--

CREATE TABLE `TMQ_napthe` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `mathe` varchar(100) NOT NULL,
  `loaithe` text CHARACTER SET utf8 NOT NULL,
  `menhgia` int(11) NOT NULL,
  `trangthai` text CHARACTER SET utf8 NOT NULL,
  `date` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_network`
--

CREATE TABLE `TMQ_network` (
  `ten` text CHARACTER SET utf8 NOT NULL,
  `ck` int(11) NOT NULL,
  `ck_mua` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_ruttien`
--

CREATE TABLE `TMQ_ruttien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `bank` text CHARACTER SET utf8,
  `stk` text CHARACTER SET utf8,
  `amount` int(11) DEFAULT NULL,
  `trangthai` text CHARACTER SET utf8,
  `time` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_setting`
--

CREATE TABLE `TMQ_setting` (
  `key` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `TMQ_setting`
--

INSERT INTO `TMQ_setting` (`key`, `text`) VALUES
('title', 'Hệ Thống Gạch Thẻ Số 1 Việt Nam'),
('baotri', '0'),
('facebook', 'https://www.facebook.com/zTMQz'),
('phone', '01628877015'),
('name', 'Trần Minh Quang'),
('thongbao', 'Chào mừng ae đến với website gạch thẻ AzThe247.Tk!!!&lt;br&gt;\n\nHệ thống chạy được thẻ tự động cả 3 nhà mạng: &lt;span style=&quot;color:#e74c3c&quot;&gt;Viettel, Vina, Mobi&lt;/span&gt;&lt;br&gt;\n\nChiết khấu sẽ ổn định dần trong các ngày tới cam kết giá ưu đãi nhất cho anh em sử dụng !!!&lt;br&gt;'),
('logo', '/img/logo.png'),
('tb_napthe', '&lt;p&gt;&lt;span style=&quot;color:#e74c3c&quot;&gt;&lt;strong&gt;Cảnh báo: Cố tình Spam check thẻ sai sẽ khóa tài khoản vĩnh viễn&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Hệ thống chạy được thẻ tự động cả 3 nhà mạng: &lt;span style=&quot;color:#e74c3c&quot;&gt;Viettel, Vina, Mobi&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Chiết khấu sẽ ổn định dần trong các ngày tới cam kết giá ưu đãi nhất cho anh em sử dụng !!!&lt;/strong&gt;&lt;/p&gt;\n\n&lt;p&gt;&lt;strong&gt;Website sử dụng công nghệ mới cam kết không nuốt thẻ của đối tác hoặc bảo trì thẻ dưới mọi hình thức !!!&lt;/strong&gt;&lt;/p&gt;'),
('tb_muathe', '&lt;p&gt;&lt;strong&gt;Nhân dịp khai trương chức năng bán thẻ.&lt;/strong&gt;&lt;/p&gt;\n\n&lt;pHệ thống giảm giá thẻ cực sốc đối với tất cả các loại thẻ.&lt;/p&gt;\n\n&lt;p&gt;&lt;span style=&quot;color:#e74c3c&quot;&gt;&lt;strong&gt;Tuyển đại lý bán thẻ  lh SĐT 0383498297 để có chiết khấu thẻ tốt nhất.&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `TMQ_user`
--

CREATE TABLE `TMQ_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` text CHARACTER SET utf8,
  `matkhau` text CHARACTER SET utf8,
  `pass` text CHARACTER SET utf8,
  `name` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `phone` text CHARACTER SET utf8,
  `facebook` text CHARACTER SET utf8,
  `cash` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `ban` int(11) DEFAULT NULL,
  `date` text CHARACTER SET utf8
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `TMQ_user`
--

INSERT INTO `TMQ_user` (`id`, `uid`, `matkhau`, `pass`, `name`, `email`, `phone`, `facebook`, `cash`, `admin`, `ban`, `date`) VALUES
(1, 'thuongit', '29eae72a0566d598aaa9c834a714f6c9', 'b1b53ea9ff125b675503eb8597a6c293', 'Phạm Trâm', 'Trickandgame1230@gmail.com', NULL, NULL, 0, 9, 0, '12-08-2020'),
(2, 'Admin', '5bbd9309a81809aab0298d3c105d8fce', NULL, 'pageyeu19@gmail.com', 'pageyeu19@gmail.com', NULL, NULL, 0, 0, 0, '12-08-2020');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `TMQ_bank`
--
ALTER TABLE `TMQ_bank`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_biendoi`
--
ALTER TABLE `TMQ_biendoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_chietkhau`
--
ALTER TABLE `TMQ_chietkhau`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_chuyentien`
--
ALTER TABLE `TMQ_chuyentien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_gachthe`
--
ALTER TABLE `TMQ_gachthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_khothe`
--
ALTER TABLE `TMQ_khothe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_loaithe`
--
ALTER TABLE `TMQ_loaithe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_muathe`
--
ALTER TABLE `TMQ_muathe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_napthe`
--
ALTER TABLE `TMQ_napthe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_ruttien`
--
ALTER TABLE `TMQ_ruttien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `TMQ_user`
--
ALTER TABLE `TMQ_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `TMQ_bank`
--
ALTER TABLE `TMQ_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_biendoi`
--
ALTER TABLE `TMQ_biendoi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_chietkhau`
--
ALTER TABLE `TMQ_chietkhau`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_chuyentien`
--
ALTER TABLE `TMQ_chuyentien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_gachthe`
--
ALTER TABLE `TMQ_gachthe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_khothe`
--
ALTER TABLE `TMQ_khothe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_loaithe`
--
ALTER TABLE `TMQ_loaithe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_muathe`
--
ALTER TABLE `TMQ_muathe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_napthe`
--
ALTER TABLE `TMQ_napthe`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_ruttien`
--
ALTER TABLE `TMQ_ruttien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `TMQ_user`
--
ALTER TABLE `TMQ_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;