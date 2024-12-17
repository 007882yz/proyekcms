-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 11:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id_caraousel` int NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id_caraousel`, `judul`, `foto`) VALUES
(8, '1', '147661941.jpg'),
(9, '2', '147661421.jpg'),
(10, '3', '12299031.jpg'),
(13, 'jj', 'Jordan_Barrett.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `caraousel1`
--

CREATE TABLE `caraousel1` (
  `id_caraousel` int NOT NULL,
  `judul` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_konten` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_konten`, `name`, `price`, `quantity`, `subtotal`, `created_at`, `updated_at`) VALUES
(49, 38, 54, 'PUMA Speedcat Archive ', 1899000.00, 4, 7596000.00, '2024-12-16 01:31:26', '2024-12-16 01:31:26'),
(50, 38, 58, 'Nike Tech', 1599000.00, 4, 6396000.00, '2024-12-16 01:31:43', '2024-12-16 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `foto`) VALUES
(9, 'salomon', 'salomon.jpg'),
(10, 'nike', 'nike.jpg'),
(11, 'adidas1', 'kategori_1732845041.jpg'),
(12, 'diadora', 'diadora.jpg'),
(13, 'puma', 'puma.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int NOT NULL,
  `judul_website` varchar(200) NOT NULL,
  `profil_website` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `no_wa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `judul_website`, `profil_website`, `instagram`, `facebook`, `email`, `alamat`, `no_wa`) VALUES
(1, 'YZZAA', '\r\nnama saya yusya hidup di desa brujul jaten karanganyar , sekolah di SMKN 2 KARANGANYAR', 'https://www.instagram.com/yzzaa.fjr/', 'jbsahj', 'greyyymmx1@outlook.com', 'brujul', 'https://wa.me/0895386195187');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `foto` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` int DEFAULT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `keterangan`, `foto`, `kategori`, `tanggal`, `username`, `harga`, `stock`) VALUES
(45, 'nike jam', 'In love with the retro look of \'80s basketball but have a thing for the fast-paced culture of today\'s game? Meet the Court Vision Low. A classic remixed, its crisp upper and stitched overlays keep the soul of the original style. The plush, low-cut collar keeps it sleek and comfortable for your world.', '[\"NIKE+JAM_(1)20.jpg\",\"NIKE+JAM3.jpg\"]', 10, '2024-12-02', 'admin', 1600000, 290),
(48, 'Hoodie Essentials French Terry 3-Stripes', 'Dengan jumlah aktivitasmu setiap hari, kamu membutuhkan sesuatu yang sesuai dengan transisi yang kamu lakukan. Pakai hoodie adidas ini. Style Sport Klasik 101 dengan branding khas adidas yang tampak berbeda pada konstruksi yang solid. Kejutan yang samar muncul saat kamu membalik tudung — 3-Stripes yang memanjang dari satu manset hingga manset lainnya, semua mengarah ke atas. Ketika selesai beraktivitas, kain French terry yang lembut membuatmu merasa sepenuhnya rileks.', '[\"ic0435_1_apparel_photography_front20view_grey.jpg\",\"ic0435_4_apparel_on20model_front20view_grey1.jpg\",\"ic0435_5_apparel_on20model_back20view_grey_(1).jpg\"]', 11, '2024-12-03', 'admin', 2999000, 73),
(49, 'OUTLINE ALL SEASON HYBRID', 'Adapting to different outdoor activities like hiking, the men’s OUTLINE ALL SEASON HYBRID midlayer jacket combines light, wind-resistant thick-weave and microfleece – with recycled polyester to reduce its environmental impact. Easy to layer up under a shell jacket or wear on its own, it blends protection and breathability for your hardest feats.', '[\"salomon-m-outline-as-hybrid-mid-923-blk-28b12aef-fea8-4530-a95d-9b59459f6fdd-jpgrendition.jpg\",\"salomon-m-outline-as-hybrid-mid-923-blk-9cf1dbd4-10d9-48f8-99c0-75b04ed07544-jpgrendition.jpg\",\"salomon-m-outline-as-hybrid-mid-923-blk-02bbbb2a-3a5a-4ac9-9699-b84dcbdddbb1-jpgrendition.jpg\"]', 9, '2024-12-03', 'admin', 2300000, 2441),
(50, 'Sneakers basses Cuir MAGIC BAS LOW I', 'Sneakers basses Cuir MAGIC BAS LOW I vert/blanc DIADORA\r\nLe modèle Magic Bas Low I, de la marque DIADORA, est une paire de Sneakers basses qui saura vous apporter un confort en toutes circonstances.\r\nCaractéristiques principales produit :\r\nType : Sneakers basses\r\nStyle : Lifestyle\r\nMatières : 100% Cuir\r\nSemelle extérieure : Thermopropylen rubber\r\nFermeture :', '[\"f00a5b34790fd8f4e25c625a7f8223b2.jpg\",\"47085c98bc765e16d4055e17fd0fda8a.jpg\",\"801a1d34721b440d4959c40e600e6cae.jpg\"]', 12, '2024-12-03', 'admin', 2450000, 65),
(54, 'PUMA Speedcat Archive \"Haute Coffee\" sneakers', 'The PUMA Speedcat has been an icon of racing culture and street style for decades. The world first knew it as an ultra-slim driving shoe designed to shave milliseconds off lap times. Then it became a sleek streetwear staple seen on the streets of global fashion capitals. Its story is constantly evolving, as it’s adopted by the trendsetters and pace-setters of every generation. Rewrite the classics with Speedcat.\r\n\r\n', '[\"26561817_56117169_204818.jpg\",\"26561817_56117184_204818.jpg\",\"26561817_56117170_204818.jpg\"]', 13, '2024-12-08', 'admin', 1899000, 9999),
(55, 'SPORT STYLE | SALOMON XT 6 GORE-TEX | BLACK/FTW SILVER', 'A beacon of our trail legacy, the shoe destined for functional technicity has evolved into a sneaker with a cult following. Equipped for the harshest city conditions, XT-6 GORE-TEX features an innovative ePE membrane, PFC-free,and anti-debris mesh construction, as well as durable cushioning and stability no matter the distance.', '[\"118377ab-0ba2-4b95-b40b-6b3bd87778e0.jpg\",\"6f18375f-3c87-4498-bdb6-e6e2377b7809.jpg\",\"2c8637e0-a498-496d-9d18-6618f6ad835b.jpg\"]', 9, '2024-12-15', 'admin', 4000000, 58),
(56, 'ADIDAS POOMSAE UNIFORM PREMIUM', 'Seragam ini dirancang untuk mengoptimalkan tingkat performa para atlet taekwondo selama latihan Poomsae.', '[\"New-Project-1-3-600x600.jpg\",\"New-Project-1-5-600x600.jpg\",\"New-Project.jpg\"]', 11, '2024-12-15', 'admin', 1450000, 67),
(57, 'Nike Club Fleece', 'Go big on comfort with these spacious Club Fleece trousers. Its midweight, loopback fabric offers a soft-but-breathable feel that\'s smooth on the outside and soft on the inside.', '[\"AS+M+NK+CLUB+FT+OVERSIZED+PANT_(1).jpg\",\"AS+M+NK+CLUB+FT+OVERSIZED+PANT_(1).png\",\"AS+M+NK+CLUB+FT+OVERSIZED+PANT.jpg\",\"AS+M+NK+CLUB+FT+OVERSIZED+PANT.png\"]', 10, '2024-12-15', 'admin', 949000, 56),
(58, 'Nike Tech', 'Channelling the energy of Nike\'s Windrunner jacket, this hoodie has the iconic chevron design on the chest, updated with super-warm, smooth-on-both-sides Tech fleece construction.\r\n\r\n', '[\"AS+M+NK+TCH+FLC+FZ+WR+HOODIE_(2).jpg\",\"AS+M+NK+TCH+FLC+FZ+WR+HOODIE_(1).jpg\",\"AS+M+NK+TCH+FLC+FZ+WR+HOODIE.jpg\",\"AS+M+NK+TCH+FLC+FZ+WR+HOODIE.png\"]', 10, '2024-12-15', 'admin', 1599000, 90),
(59, 'Jordan Essentials', 'Looking for lightweight warmth? We\'ve got you. Made with a durable, water-repellent nylon shell and a breathable mesh lining, this roomy jacket helps you zip out wind and rain.\r\n\r\n', '[\"M+J+ESS+HBR+WIND+JKT_(2).png\",\"M+J+ESS+HBR+WIND+JKT_(1).png\",\"M+J+ESS+HBR+WIND+JKT.png\",\"M+J+ESS+HBR+WIND+JKT_(4).png\",\"M+J+ESS+HBR+WIND+JKT_(3).png\"]', 10, '2024-12-15', 'admin', 1169000, 90);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int NOT NULL,
  `status` enum('Pesanan Masuk','Pesanan Dikonfirmasi','Pesanan Dikemas','Pesanan Dikirim','Pesanan Dalam Menuju Alamat','Pesanan Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sub_total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_user`, `tanggal`, `jumlah`, `status`, `sub_total`) VALUES
(77, 39, '2024-12-15', 1, 'Pesanan Masuk', 1450000),
(78, 37, '2024-12-15', 1, 'Pesanan Masuk', 1450000),
(79, 37, '2024-12-16', 3, 'Pesanan Masuk', 8997000),
(80, 38, '2024-12-16', 2, 'Pesanan Masuk', 2338000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(70) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('Kontributor','Admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`, `alamat`, `no_telp`) VALUES
(37, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Brujul Jaten Karanganyar', 2147483647),
(38, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kontributor', 'Brujul Jaten Karanganyar', 2147483647),
(39, 'gabut', 'gabut', 'ee6f0d86a1be19716aa5e5b0c45442ea', 'Admin', 'Brujul Jaten Karanganyar', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `caraousel1`
--
ALTER TABLE `caraousel1`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id_caraousel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `caraousel1`
--
ALTER TABLE `caraousel1`
  MODIFY `id_caraousel` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
