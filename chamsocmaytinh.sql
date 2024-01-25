-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 19, 2024 lúc 04:13 AM
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
-- Cơ sở dữ liệu: `chamsocmaytinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` int(11) NOT NULL,
  `MaLK` int(11) NOT NULL,
  `SoL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaLK`, `SoL`) VALUES
(2, 15, 1),
(2, 16, 1),
(3, 19, 2),
(3, 24, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadonoffline`
--

CREATE TABLE `chitiethoadonoffline` (
  `MaHDO` int(11) NOT NULL,
  `MaDV` int(11) NOT NULL,
  `MaLK` int(11) NOT NULL,
  `SoL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadontamthoi`
--

CREATE TABLE `chitiethoadontamthoi` (
  `MaHDT` int(11) NOT NULL,
  `MaLK` int(11) NOT NULL,
  `SoL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDV` int(11) NOT NULL,
  `TenDV` varchar(50) NOT NULL,
  `GiaTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MaDV`, `TenDV`, `GiaTien`) VALUES
(1, 'Vệ sinh máy tính', 300000),
(2, 'Sửa chữa máy tính', 150000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaND` int(11) NOT NULL,
  `MaLK` int(11) NOT NULL,
  `SoL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `MaND` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `NgayLap`, `MaND`, `MaNV`) VALUES
(2, '2024-01-08', 1, 1),
(3, '2024-01-08', 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonoffline`
--

CREATE TABLE `hoadonoffline` (
  `MaHDO` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `NgayLap` date NOT NULL,
  `MaNV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadontamthoi`
--

CREATE TABLE `hoadontamthoi` (
  `MaHDT` int(11) NOT NULL,
  `MaND` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhen`
--

CREATE TABLE `lichhen` (
  `MaLH` int(11) NOT NULL,
  `NgayHen` date NOT NULL,
  `TinhTrang` int(1) NOT NULL,
  `MaND` int(11) NOT NULL,
  `MaDV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichhen`
--

INSERT INTO `lichhen` (`MaLH`, `NgayHen`, `TinhTrang`, `MaND`, `MaDV`) VALUES
(1, '2024-01-11', -1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhkien`
--

CREATE TABLE `linhkien` (
  `MaLK` int(11) NOT NULL,
  `TenLK` varchar(100) NOT NULL,
  `Loai` varchar(50) NOT NULL,
  `GiaTien` int(11) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `linhkien`
--

INSERT INTO `linhkien` (`MaLK`, `TenLK`, `Loai`, `GiaTien`, `Anh`) VALUES
(9, 'Ram Laptop G.Skill Ripjaws DDR4 8GB 3200MHz 1.2v F4-3200C22S-8GRS', 'RAM', 790000, './Anh/ram-laptop-g-skill-ripjaws-ddr4.jpg'),
(10, 'Ram Laptop Kingston DDR4 8GB 2666MHz 1.2v KVR26S19S6/8 CMT32GX4M2E3200C16', 'RAM', 799000, './Anh/ram-laptop-kingston-ddr4-8gb-2666mhz-1-2v-kvr26s19s6-8.jpg'),
(11, 'Ram PC G.SKILL Trident Z Royal Elite Silver RGB 16GB 3600MHz DDR4 (8GBx2) F4-3600C16D', 'RAM', 3950000, './Anh/trident-z-royal-elite-silver-03.jpg'),
(12, 'Ram PC G.SKILL Trident Z Royal Elite Gold RGB 16GB 3600MHz DDR4 (8GBx2) F4-3600C16D', 'RAM', 3950000, './Anh/trident-z-royal-elite-gold-03.jpg'),
(13, 'Ram PC Kingston Fury Beast RGB 32GB 3600MHz DDR4 (2x16GB) KF436C18BBAK2/32', 'RAM', 3950000, './Anh/ram-pc-kingston-fury-beast-rgb-32gb-3600mhz-ddr4-2x16gb-kf436c18bbak2-32-809ce46d-f357-4dd2-a92a-d6835f15ff2a.jpg'),
(14, 'Ram PC Corsair Dominator Platinum RGB 32GB 3200Mhz DDR4 (2x16GB)', 'RAM', 4850000, './Anh/ram-pc-corsair-dominator-platinum-rgb-32gb-5200mhz-ddr5-2x16gb-cmt32gx5m2b5200c40-297848a8-aa1b-4602-87e6-665b479c1caa.jpg'),
(15, 'Ram PC G.SKILL Trident Z5 RGB 32GB 6000MHz DDR5 (16GBx2) F5-6000U3636E16GX2-TZ5RK', 'RAM', 10900000, './Anh/ram-pc-g-skill-trident-z5-rgb-32gb-5600mhz-ddr5-16gbx2-f5-5600u3636c16gx2-tz5rk-b21b41ed-0aa2-4420-9b9b-6b71cc3f5aba-6a2a846d-a863-4a50-a124-33f241d2fd45.jpg'),
(16, 'Ram PC Kingston Fury Beast RGB 64GB 5600MHz DDR5 (2x32GB) KF556C40BBAK2-64', 'RAM', 12300000, './Anh/ram-pc-kingston-fury-beast-rgb-ddr5-cfd6978e-f165-4afe-ae07-0c3feac58802-92abd276-2dc6-4424-b4ce-204b401bd951.jpg'),
(17, 'SSD Dahua C800A 120GB 2.5-Inch SATA III DHI-SSD-C800AS120G', 'SSD', 390000, './Anh/ssd-dahua-c800a-120gb-2-5-inch-sata-iii-dhi-ssd-c800as120g.jpg'),
(18, 'SSD SamSung PM871b 3D-NAND M.2 2280 SATA III 128GB', 'SSD', 550000, './Anh/ssd-samsung-pm871b-3d-nand-m-2-2280-sata-iii-128gb-mz-nln128f.jpg'),
(19, 'SSD Transcend SSD110S M.2 2280 PCIe Gen3 x4 NVMe 128GB', 'SSD', 600000, './Anh/ssd-transcend-ssd110s-m-2-2280-pcie-gen3-x4-nvme-256gb-ts256gmte110s-944253f3-3cca-4421-9fe6-a13c0ce07db8.jpg'),
(20, 'SSD Kingston A400 2.5-Inch SATA III 120GB SA400S37/120G', 'SSD', 600000, './Anh/a400-01.jpg'),
(21, 'SSD Kingston A400 2.5-Inch SATA III 240GB SA400S37/240G', 'SSD', 750000, './Anh/a400-01-be7f2126-f2ce-4fcd-8945-f2c31db996f5.jpg'),
(22, 'SSD Western Digital Green Sata III 240GB WDS240G3G0A', 'SSD', 750000, './Anh/ssd-western-digital-green-sata-iii-240gb-wds240g2g0a.jpg'),
(23, 'SSD Kingston A400 M.2 2280 SATA 3 240GB SA400M8/240G', 'SSD', 770000, './Anh/sa400m8-01-93669938-904b-44fd-84b6-0d95d6650a61.jpg'),
(24, 'SSD Crucial BX500 3D NAND 2.5-Inch SATA III 240GB', 'SSD', 770000, './Anh/bx500-01-d62e354b-bb57-4259-9bd9-9b4f0d9ed6df.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaND` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Tentk` varchar(30) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `HoTen`, `Tentk`, `MatKhau`, `SDT`, `NgaySinh`, `DiaChi`) VALUES
(1, 'Nguyễn Văn Nam', 'namkks', '123456', '0962205147', '2003-06-10', 'Nhân Khang - Lý Nhân - Hà Nam'),
(2, 'Nguyễn Tuấn Anh', 'kero', '123456', '0987654321', '2003-12-30', 'Số 22 LK 27 - Vân Canh - Hoài Đức - Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `TaiKhoan`, `MatKhau`, `SDT`, `DiaChi`) VALUES
(1, 'Nguyễn Văn Nam', 'admin', 'admin', '0896130627', '22LK27 - Vân Canh - Hoài Đức');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHD`,`MaLK`),
  ADD KEY `FK_CTHD_LK` (`MaLK`);

--
-- Chỉ mục cho bảng `chitiethoadonoffline`
--
ALTER TABLE `chitiethoadonoffline`
  ADD PRIMARY KEY (`MaHDO`,`MaDV`,`MaLK`),
  ADD KEY `FK_CTHDO_DV` (`MaDV`),
  ADD KEY `FK_CTHDO_LK` (`MaLK`);

--
-- Chỉ mục cho bảng `chitiethoadontamthoi`
--
ALTER TABLE `chitiethoadontamthoi`
  ADD PRIMARY KEY (`MaHDT`,`MaLK`),
  ADD KEY `FK_CTHDT_LK` (`MaLK`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDV`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaND`,`MaLK`),
  ADD KEY `FK_GH_LK` (`MaLK`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_HD_ND` (`MaND`),
  ADD KEY `FK_HD_NV` (`MaNV`);

--
-- Chỉ mục cho bảng `hoadonoffline`
--
ALTER TABLE `hoadonoffline`
  ADD PRIMARY KEY (`MaHDO`),
  ADD KEY `FK_HDO_NV` (`MaNV`);

--
-- Chỉ mục cho bảng `hoadontamthoi`
--
ALTER TABLE `hoadontamthoi`
  ADD PRIMARY KEY (`MaHDT`),
  ADD KEY `FK_HDT_ND` (`MaND`);

--
-- Chỉ mục cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  ADD PRIMARY KEY (`MaLH`),
  ADD KEY `FK_LH_ND` (`MaND`),
  ADD KEY `FK_LH_DV` (`MaDV`);

--
-- Chỉ mục cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  ADD PRIMARY KEY (`MaLK`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaND`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MaDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadonoffline`
--
ALTER TABLE `hoadonoffline`
  MODIFY `MaHDO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadontamthoi`
--
ALTER TABLE `hoadontamthoi`
  MODIFY `MaHDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  MODIFY `MaLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `linhkien`
--
ALTER TABLE `linhkien`
  MODIFY `MaLK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK_CTHD_HD` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHD_LK` FOREIGN KEY (`MaLK`) REFERENCES `linhkien` (`MaLK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadonoffline`
--
ALTER TABLE `chitiethoadonoffline`
  ADD CONSTRAINT `FK_CTHDO_DV` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHDO_HDO` FOREIGN KEY (`MaHDO`) REFERENCES `hoadonoffline` (`MaHDO`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHDO_LK` FOREIGN KEY (`MaLK`) REFERENCES `linhkien` (`MaLK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadontamthoi`
--
ALTER TABLE `chitiethoadontamthoi`
  ADD CONSTRAINT `FK_CTHDT_HDT` FOREIGN KEY (`MaHDT`) REFERENCES `hoadontamthoi` (`MaHDT`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHDT_LK` FOREIGN KEY (`MaLK`) REFERENCES `linhkien` (`MaLK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_GH_LK` FOREIGN KEY (`MaLK`) REFERENCES `linhkien` (`MaLK`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_GH_ND` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_HD_ND` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HD_NV` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonoffline`
--
ALTER TABLE `hoadonoffline`
  ADD CONSTRAINT `FK_HDO_NV` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadontamthoi`
--
ALTER TABLE `hoadontamthoi`
  ADD CONSTRAINT `FK_HDT_ND` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lichhen`
--
ALTER TABLE `lichhen`
  ADD CONSTRAINT `FK_LH_DV` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_LH_ND` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
