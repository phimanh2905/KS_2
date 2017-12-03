-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2017 at 02:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Dumping data for table `chinh_sach_tra_phongs`
--

INSERT INTO `chinh_sach_tra_phongs` (`id`, `ThoiGianQuyDinh`, `PhuThu`, `created_at`, `updated_at`) VALUES
(2, '10h-12h sua', '1000000 sua', '2017-11-07 20:45:14', '2017-11-08 10:15:48'),
(4, '1', '1', '2017-11-11 05:32:49', '2017-11-11 05:32:49');

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

--
-- Dumping data for table `chi_tiet_hoa_dons`
--

INSERT INTO `chi_tiet_hoa_dons` (`id`, `MaPhong`, `MaSuDungDichVu`, `MaChinhSach`, `PhuThu`, `TienPhong`, `TienDichVu`, `GiamGiaKhachHang`, `HinhThucThanhToan`, `SoNgay`, `ThanhTien`, `created_at`, `updated_at`) VALUES
(3, 'mã phòng1', 'mã sử dụng dịch vụ1', 'mã chính sách1', 'phụ thu1', 'tiền phòng1', 'tiền dịch vụ1', 'giảm giá khách hàng1', 'hình thức thanh toán1', 'số ngày1', 'thành tiền1', '2017-11-08 11:15:15', '2017-11-08 18:44:40');

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

--
-- Dumping data for table `chi_tiet_phieu_nhan_phongs`
--

INSERT INTO `chi_tiet_phieu_nhan_phongs` (`id`, `MaPhong`, `HoTenKhachHang`, `CMND`, `NgayNhan`, `NgayTraDuKien`, `NgayTraThucTe`, `created_at`, `updated_at`) VALUES
(3, 'mã phòng', 'họ tên khách hàng', 'cmnd', 'ngày nhận', 'ngày trả dự kiến', 'ngày trả thực tế', '2017-11-08 18:54:57', '2017-11-08 18:54:57');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_phieu_thue_phongs`
--

CREATE TABLE `chi_tiet_phieu_thue_phongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `MaKhachHang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaPhong` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayDangKi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayNhan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_phieu_thue_phongs`
--

INSERT INTO `chi_tiet_phieu_thue_phongs` (`id`, `MaKhachHang`, `MaPhong`, `NgayDangKi`, `NgayNhan`, `created_at`, `updated_at`) VALUES
(2, '444 a', '444a', '444a', 'a', '2017-11-08 09:07:19', '2017-11-08 18:40:30'),
(3, 'ma khach hang1', 'ma phong1', 'ngay dang ky1', 'ngay nhan1', '2017-11-08 18:45:56', '2017-11-08 18:50:33');

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

--
-- Dumping data for table `danh_sach_su_dung_dich_vus`
--

INSERT INTO `danh_sach_su_dung_dich_vus` (`id`, `MaDichVu`, `MaNhanPhong`, `SoLuong`, `created_at`, `updated_at`) VALUES
(3, 'mã dịch vụ', 'mã nhận phòng', 'số lượng', '2017-11-08 10:20:16', '2017-11-08 10:21:35');

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

--
-- Dumping data for table `dich_vus`
--

INSERT INTO `dich_vus` (`id`, `MaLoaiDichVu`, `MaDonVi`, `DonGia`, `created_at`, `updated_at`) VALUES
(2, 'GADAI', 'BO', '9000', '2017-11-07 20:54:44', '2017-11-07 20:54:44'),
(3, '3 sua', 'quy sua', 'quy sua', '2017-11-08 00:43:38', '2017-11-08 10:16:41');

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

--
-- Dumping data for table `don_vis`
--

INSERT INTO `don_vis` (`id`, `TenDonVi`, `created_at`, `updated_at`) VALUES
(2, 'trang sua', '2017-11-07 23:21:18', '2017-11-08 10:59:00');

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

--
-- Dumping data for table `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `NhanVienLap`, `MaKhachHang`, `MaNhanPhong`, `TongTien`, `NgayLap`, `created_at`, `updated_at`) VALUES
(2, 'avbcbab', 'avbcbab', 'avbcbab', 'avbcbab', 'avbcbab', '2017-11-08 01:38:45', '2017-11-08 01:38:45'),
(3, 'nhân viên lập', 'mã khách hàng', 'mã nhận phòng', 'tổng tiền', 'ngày lập', '2017-11-08 11:10:21', '2017-11-08 11:10:21');

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

--
-- Dumping data for table `khach_hangs`
--

INSERT INTO `khach_hangs` (`id`, `TenKhachHang`, `CMND`, `GioiTinh`, `DiaChi`, `DienThoai`, `QuocTich`, `created_at`, `updated_at`) VALUES
(2, 'phi hong manh', '1', 'nam', 'thai binh', '01636679239', 'viet nam', '2017-11-07 20:40:04', '2017-11-07 20:40:04'),
(3, 'địa chỉ', 'điện thoại', 'quốc tịch', 'địa chỉ', 'điện thoại', 'quốc tịch', '2017-11-08 09:44:11', '2017-11-08 09:51:36');

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

--
-- Dumping data for table `loai_dich_vus`
--

INSERT INTO `loai_dich_vus` (`id`, `TenLoaiDichVu`, `created_at`, `updated_at`) VALUES
(2, 'gadai- giặt áo dài', '2017-11-07 21:18:52', '2017-11-07 21:18:52');

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

--
-- Dumping data for table `loai_phongs`
--

INSERT INTO `loai_phongs` (`id`, `TenLoaiPhong`, `DonGia`, `SoNguoiChuan`, `SoNguoiToiDa`, `TyLeTang`, `created_at`, `updated_at`) VALUES
(2, '2', '2', '2', '2', '2', '2017-11-08 00:55:17', '2017-11-08 00:55:17'),
(3, 'tên loại phòng', 'đơn giá', 'số lượng người chuẩn', 'số lượng người tối đa', 'tỷ lệ tăng', '2017-11-08 11:03:29', '2017-11-08 11:03:29'),
(4, '10', '10', '10', '10', '10', '2017-11-11 09:30:48', '2017-11-11 09:30:48');

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

--
-- Dumping data for table `loai_tinh_trangs`
--

INSERT INTO `loai_tinh_trangs` (`id`, `TenLoaiTinhTrang`, `created_at`, `updated_at`) VALUES
(2, 'trống', '2017-11-08 01:19:07', '2017-11-08 01:19:07'),
(4, 'dáda', '2017-11-08 01:20:38', '2017-11-08 01:20:38');

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

--
-- Dumping data for table `phieu_nhan_phongs`
--

INSERT INTO `phieu_nhan_phongs` (`id`, `MaPhieuThue`, `MaKhachHang`, `created_at`, `updated_at`) VALUES
(3, 'ma phieu thue1', 'ma khach hang1', '2017-11-08 18:52:24', '2017-11-08 18:52:32'),
(4, 'phieu thue', 'khach hang', '2017-11-08 18:53:18', '2017-11-08 18:53:18'),
(5, 'the', 'hang', '2017-11-08 19:00:38', '2017-11-08 19:00:38'),
(6, '1', '2', '2017-11-08 19:01:40', '2017-11-08 19:01:40'),
(7, '11', '22', '2017-11-08 19:03:11', '2017-11-08 19:03:11');

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

--
-- Dumping data for table `phieu_thue_phongs`
--

INSERT INTO `phieu_thue_phongs` (`id`, `MaKhachHang`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL);

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

--
-- Dumping data for table `phongs`
--

INSERT INTO `phongs` (`id`, `MaLoaiPhong`, `MaLoaiTinhTrangPhong`, `GhiChu`, `created_at`, `updated_at`) VALUES
(8, '8 sua', '8sua', 'Ksua', '2017-11-08 01:10:36', '2017-11-08 11:02:48'),
(9, 'mã loại phòng', 'mã loại tình trạng phòng', 'ghi chú', '2017-11-08 11:00:12', '2017-11-08 11:00:12'),
(13, '4', '1', 'manh mnsd', '2017-11-11 09:33:25', '2017-11-11 09:33:25'),
(14, '3', '1', '1', '2017-11-11 09:34:17', '2017-11-11 09:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `quy_dinhs`
--

CREATE TABLE `quy_dinhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `TenQuyDinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MoTa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quy_dinhs`
--

INSERT INTO `quy_dinhs` (`id`, `TenQuyDinh`, `MoTa`, `created_at`, `updated_at`) VALUES
(1, '1', '1', NULL, NULL);

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

--
-- Dumping data for table `tham_sos`
--

INSERT INTO `tham_sos` (`PhieuDangKi`, `PhieuNhan`, `HoaDon`, `STT`, `created_at`, `updated_at`) VALUES
('1', '1', '1', '1', NULL, NULL);

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

--
-- Dumping data for table `thiet_bis`
--

INSERT INTO `thiet_bis` (`id`, `TenThietBi`, `MaLoaiPhong`, `SoLuong`, `created_at`, `updated_at`) VALUES
(3, 'tên thiết bị', 'mã loại phòng', 'số lượng', '2017-11-09 00:43:48', '2017-11-09 00:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '2', '2@gmail.com', '123456', '1', '', NULL, NULL, NULL);

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
-- Indexes for table `quy_dinhs`
--
ALTER TABLE `quy_dinhs`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `chi_tiet_hoa_dons`
--
ALTER TABLE `chi_tiet_hoa_dons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chi_tiet_phieu_nhan_phongs`
--
ALTER TABLE `chi_tiet_phieu_nhan_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chi_tiet_phieu_thue_phongs`
--
ALTER TABLE `chi_tiet_phieu_thue_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `danh_sach_su_dung_dich_vus`
--
ALTER TABLE `danh_sach_su_dung_dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dich_vus`
--
ALTER TABLE `dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `don_vis`
--
ALTER TABLE `don_vis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loai_dich_vus`
--
ALTER TABLE `loai_dich_vus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loai_phongs`
--
ALTER TABLE `loai_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `loai_tinh_trangs`
--
ALTER TABLE `loai_tinh_trangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `phieu_nhan_phongs`
--
ALTER TABLE `phieu_nhan_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phieu_thue_phongs`
--
ALTER TABLE `phieu_thue_phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `phongs`
--
ALTER TABLE `phongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `quy_dinhs`
--
ALTER TABLE `quy_dinhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thiet_bis`
--
ALTER TABLE `thiet_bis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
