-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2017 at 04:23 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khachsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `chinh_sach_tra_phongs`
--

CREATE TABLE `chinh_sach_tra_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ThoiGianQuyDinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuThu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hoa_dons`
--

CREATE TABLE `chi_tiet_hoa_dons` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaSuDungDichVu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaChinhSach` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhuThu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TienPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TienDichVu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiamGiaKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhThucThanhToan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoNgay` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThanhTien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_nhan_phongs`
--

CREATE TABLE `chi_tiet_phieu_nhan_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTenKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTraDuKien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayTraThucTe` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_thue_phongs`
--

CREATE TABLE `chi_tiet_phieu_thue_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDangKi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_sach_su_dung_dich_vus`
--

CREATE TABLE `danh_sach_su_dung_dich_vus` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaDichVu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNhanPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dich_vus`
--

CREATE TABLE `dich_vus` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaLoaiDichVu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaDonVi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonGia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_vis`
--

CREATE TABLE `don_vis` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenDonVi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` int(10) UNSIGNED NOT NULL,
  `NhanVienLap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNhanPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TongTien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayLap` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hangs`
--

CREATE TABLE `khach_hangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CMND` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuocTich` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_dich_vus`
--

CREATE TABLE `loai_dich_vus` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoaiDichVu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_phongs`
--

CREATE TABLE `loai_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoaiPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DonGia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoNguoiChuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoNguoiToiDa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TyLeTang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai_tinh_trangs`
--

CREATE TABLE `loai_tinh_trangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenLoaiTinhTrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_10_23_135723_add_role_column_to_users_table', 1),
(25, '2017_11_04_044858_create_tham_sos_table', 1),
(26, '2017_11_04_044910_create_quy_dinhs_table', 1),
(27, '2017_11_04_044924_create_chi_tiet_phieu_nhan_phongs_table', 1),
(28, '2017_11_04_044938_create_phieu_nhan_phongs_table', 1),
(29, '2017_11_04_045013_create_loai_tinh_trangs_table', 1),
(30, '2017_11_04_045022_create_phieu_thue_phongs_table', 1),
(31, '2017_11_04_045040_create_khach_hangs_table', 1),
(32, '2017_11_04_045045_create_hoa_dons_table', 1),
(33, '2017_11_04_045108_create_thiet_bis_table', 1),
(34, '2017_11_04_045113_create_loai_phongs_table', 1),
(35, '2017_11_04_045120_create_phongs_table', 1),
(36, '2017_11_04_045132_create_chi_tiet_phieu_thue_phongs_table', 1),
(37, '2017_11_04_045205_create_chinh_sach_tra_phongs_table', 1),
(38, '2017_11_04_045216_create_chi_tiet_hoa_dons_table', 1),
(39, '2017_11_04_045229_create_danh_sach_su_dung_dich_vus_table', 1),
(40, '2017_11_04_045239_create_dich_vus_table', 1),
(41, '2017_11_04_045244_create_don_vis_table', 1),
(42, '2017_11_04_045252_create_loai_dich_vus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_nhan_phongs`
--

CREATE TABLE `phieu_nhan_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaPhieuThue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieu_thue_phongs`
--

CREATE TABLE `phieu_thue_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phongs`
--

CREATE TABLE `phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaLoaiPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiTinhTrangPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GhiChu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quy_dinhs`
--

CREATE TABLE `quy_dinhs` (
  `TenQuyDinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tham_sos`
--

CREATE TABLE `tham_sos` (
  `PhieuDangKi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhieuNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoaDon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `STT` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thiet_bis`
--

CREATE TABLE `thiet_bis` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenThietBi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoLuong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chinh_sach_tra_phongs`
--
ALTER TABLE `chinh_sach_tra_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_phieu_nhan_phongs`
--
ALTER TABLE `chi_tiet_phieu_nhan_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_phieu_thue_phongs`
--
ALTER TABLE `chi_tiet_phieu_thue_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_sach_su_dung_dich_vus`
--
ALTER TABLE `danh_sach_su_dung_dich_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dich_vus`
--
ALTER TABLE `dich_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_vis`
--
ALTER TABLE `don_vis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_dich_vus`
--
ALTER TABLE `loai_dich_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_phongs`
--
ALTER TABLE `loai_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_tinh_trangs`
--
ALTER TABLE `loai_tinh_trangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phieu_nhan_phongs`
--
ALTER TABLE `phieu_nhan_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phieu_thue_phongs`
--
ALTER TABLE `phieu_thue_phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phongs`
--
ALTER TABLE `phongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thiet_bis`
--
ALTER TABLE `thiet_bis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chinh_sach_tra_phongs`
--
ALTER TABLE `chinh_sach_tra_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_phieu_nhan_phongs`
--
ALTER TABLE `chi_tiet_phieu_nhan_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_phieu_thue_phongs`
--
ALTER TABLE `chi_tiet_phieu_thue_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_sach_su_dung_dich_vus`
--
ALTER TABLE `danh_sach_su_dung_dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dich_vus`
--
ALTER TABLE `dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_vis`
--
ALTER TABLE `don_vis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_dich_vus`
--
ALTER TABLE `loai_dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_phongs`
--
ALTER TABLE `loai_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_tinh_trangs`
--
ALTER TABLE `loai_tinh_trangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `phieu_nhan_phongs`
--
ALTER TABLE `phieu_nhan_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieu_thue_phongs`
--
ALTER TABLE `phieu_thue_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phongs`
--
ALTER TABLE `phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thiet_bis`
--
ALTER TABLE `thiet_bis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
