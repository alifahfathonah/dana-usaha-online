-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2018 pada 12.21
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daun`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(10) NOT NULL,
  `id_pengirim` int(10) NOT NULL,
  `id_penerima` int(10) NOT NULL,
  `isi_chat` longtext NOT NULL,
  `waktu_chat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `id_pengirim`, `id_penerima`, `isi_chat`, `waktu_chat`) VALUES
(3, 34, 36, 'okee sistah', '2018-01-09 09:54:05'),
(4, 35, 34, 'okee gan siapp', '2018-01-09 10:15:44'),
(5, 35, 34, 'Terimkasih sudah order kak. ditunggu yaa', '2018-01-09 10:33:11'),
(6, 34, 35, 'Okee gan, tunggu kabar dari kami ya', '2018-01-09 10:36:20'),
(7, 34, 36, 'Okee ka, nanti dikirim ya\r\n', '2018-01-09 10:37:05'),
(8, 35, 36, 'okee ka siap', '2018-01-09 10:38:14'),
(10, 34, 36, 'habis yang balado kak', '2018-01-09 10:41:31'),
(11, 36, 34, 'OKee siap', '2018-01-09 11:09:04'),
(12, 37, 38, 'okee mas, siapp laksanakan.', '2018-01-10 03:18:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kontak`
--

CREATE TABLE `form_kontak` (
  `id_pesan` int(13) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `email_pengirim` varchar(50) NOT NULL,
  `no_hp_pengirim` varchar(14) NOT NULL,
  `pesan_pengirim` longtext NOT NULL,
  `waktu_kirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_kontak`
--

INSERT INTO `form_kontak` (`id_pesan`, `nama_pengirim`, `email_pengirim`, `no_hp_pengirim`, `pesan_pengirim`, `waktu_kirim`) VALUES
(3, 'Devin', 'devinliu97@gmail.com', '081929055398', 'Daun semoga sukses selalu yaa :)', '2018-01-04 08:11:59'),
(4, 'louis', 'louis@gmail.com', '081929055399', 'Mantap Daun', '2018-01-04 08:11:59'),
(5, 'Jafar', 'jafar@gmail.com', '081929055391', 'Gokil dah DAUN, SUKSES SELALU YEE', '2018-01-04 08:11:59'),
(9, 'Deby Stevani', 'deby@gmail.com', '081929055391', 'Min, keren web nya', '2018-01-04 10:37:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(30) NOT NULL,
  `id_penjual` int(30) NOT NULL,
  `id_pembeli` int(30) NOT NULL,
  `id_produk` int(30) NOT NULL,
  `no_hp_pembeli` varchar(13) NOT NULL,
  `jumlah_pesanan` int(5) NOT NULL,
  `lokasi_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` varchar(100) NOT NULL,
  `keterangan_pembeli` varchar(500) NOT NULL,
  `waktu_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_penjual`, `id_pembeli`, `id_produk`, `no_hp_pembeli`, `jumlah_pesanan`, `lokasi_pembeli`, `alamat_pembeli`, `keterangan_pembeli`, `waktu_order`) VALUES
(40, 36, 34, 79, '081929055398', 2, 'Kampus A UNJ (Pusat)', 'Kantin Blok M', 'Saya tunggu di blok M jam 1 siang', '2018-01-09 11:07:34'),
(41, 34, 36, 75, '081929055323', 1, 'Kampus B UNJ (FIO)', 'Parkiran Spiral', 'Jam 1 siang ya mas', '2018-01-09 13:20:16'),
(42, 34, 35, 76, '081929055323', 1, 'Kampus B UNJ (FIO)', 'FBS yaa', 'jam 1 siang', '2018-01-09 13:21:34'),
(45, 34, 36, 76, '081929055398', 3, 'Kampus D UNJ (Psikologi)', 'Kelas C', 'rasa vanila', '2018-01-09 14:59:21'),
(46, 36, 35, 79, '081929055323', 3, 'Kampus B UNJ (FIO)', 'Hall A', 'jam 2 siang ya mas', '2018-01-09 15:05:13'),
(47, 35, 36, 78, '081929055377', 3, 'Kampus A UNJ (Pusat)', 'Gd. G', 'jam 2', '2018-01-09 16:20:37'),
(48, 34, 36, 77, '081929055398', 2, 'Kampus E UNJ (PGSD)', 'Hall C', 'coklat ya', '2018-01-09 16:27:40'),
(49, 37, 38, 81, '081929054678', 3, 'Kampus A UNJ (Pusat)', 'Gedung L elektro', 'Pesan risol nya 2, sama lontong 1 yaa mas. Hubungi nomor saya aja kalo mau nganterin. terimakasih', '2018-01-10 03:17:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(30) NOT NULL,
  `judul_produk` varchar(100) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `stok_produk` varchar(50) NOT NULL,
  `harga_produk` int(70) NOT NULL,
  `lokasi_produk` varchar(50) NOT NULL,
  `no_telp_produk` varchar(15) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `foto_produk` varchar(500) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `judul_produk`, `kategori_produk`, `stok_produk`, `harga_produk`, `lokasi_produk`, `no_telp_produk`, `deskripsi_produk`, `foto_produk`, `tanggal_upload`) VALUES
(75, 34, 'QUEKUKI Snack Kue kacang', 'Makanan', 'Tersedia', 12000, 'Kampus A UNJ (Pusat)', '081929055398', 'Kue kacang olahan tradisional dengan packaging yang modern. Hasil  resep leluhur yang turun menurun yang nikmat banget dan renyahnya ga habis-habis. Kaya protein dan gizi. Tanpa pengawet dan di olah secara alami. \r\n\r\nMau order Hubungi saja langsung.', '0924QUEKUKI Snack Kue Kacang.png', '2018-01-09 08:24:24'),
(76, 34, 'Vivian Milk Pie', 'Makanan', 'Tersedia', 2500, 'Kampus D UNJ (Psikologi)', '081929055398', 'Vivian merupakan merk pai susu yang lebih gurih dari pai susu yang lainnya. Masa Kadaluarsa 4-5 hari tanpa masuk kulkas setelah pengiriman. Order aja yaaaa. Di jamin enakk', '0952vivian milk pie.jpg', '2018-01-09 08:31:52'),
(77, 34, 'Pie susu dhian', 'Makanan', 'Tersedia', 1500, 'Kampus E UNJ (PGSD)', '081929055398', 'Pie tersedia dalam 6 varian rasa:\r\nOriginal, coklat, strawberry, blueberry, dan coklat keju.\r\n\r\nPie tahan 7 hari di ruang terbuka dan tahan dikulkas selama 14 hari.', '0953Pie susu dhian.jpg', '2018-01-09 08:35:53'),
(78, 35, 'Zanana Chips(Keripik Pisang)', 'Makanan', 'Tersedia', 20000, 'Kampus D UNJ (Psikologi)', '081929055371', 'Zanan Chips merupakan keripik pisang classy khas Bandung yang terbuat dari pisang nangka segar, di iris dan potong tipis-tipis. Lalu diracik dengan bumbu spesial khas Zanana.\r\n\r\n\r\n\r\nPilihan rasa:\r\n- Green Thai Tea -- BEST SELLER\r\n- Creamy Milk -- BEST SELLR\r\n- Classy Spicy -- pedas, manis, favorite!\r\n- Smoked Beef -- Gurih, asin, favorite!\r\n- Brown Chocolate -- BEST SELLER', '0935Zanana Chips (Keripik Pisang).jpg', '2018-01-09 08:52:35'),
(79, 36, 'Gandum Goreng', 'Makanan', 'Tersedia', 6000, 'Kampus B UNJ (FIO)', '081929055398', 'Gandum Goreng, Cemilan yang lezat dan berserat.. \r\nKami menyediakan dengan berbagai rasa :\r\n\r\n1. Balado\r\n2. Balado Jeruk\r\n3. Pizza\r\n4. Original\r\n5. Keju\r\n6. Rumput Laut\r\n7. Jagung Manis\r\n8. Barbeque', '1239GANDUM GORENG.jpg', '2018-01-09 11:06:39'),
(80, 37, 'Banana Nugget', 'Makanan', 'Tersedia', 2500, 'Kampus A UNJ (Pusat)', '081929055355', 'Anda yang suka makanan manis pasti tahu dengan kudapan yang lebih hits sekarang, yatu pisang nugget. Inovasi baru dari pisang goreng ini memiliki banyak sekali topping yang membuatnya semakin unik. Anda bisa memesan pisang nugget ini dengan bermacam-macam topping seperti cokelat, mattcha, keju, vanila oreo, strawbery cheese, milk .cheese', '0320banana nugget.jpg', '2018-01-10 02:46:20'),
(81, 37, 'Jajanan Pasar', 'Makanan', 'Tersedia', 3000, 'Kampus A UNJ (Pusat)', '081929055377', 'Semua jenis jajanan dengan harga 3000/makanan. Jenis makanan : pastel, risol, tahu isi, lontong, lemper, kroket, lumpia, martabak.', '0329jajanan pasar.jpg', '2018-01-10 02:56:29'),
(82, 37, 'Cake Popsm', 'Makanan', 'Tersedia', 8000, 'Kampus A UNJ (Pusat)', '081929055377', 'Kue bolu pandan yang dilumuri coklatyang dibentuk menjadi permen lolipop lucu. Yang mau order silahkan.. terimakasih Daun', '0310Cake Pops.jpg', '2018-01-10 02:59:10'),
(83, 38, 'Donat Kentang', 'Makanan', 'Tersedia', 3000, 'Kampus A UNJ (Pusat)', '081929054678', 'Donat kentang kenyah diluar lembut di dalam dengan taburan gula halus. Order aja gan sis dijamiin enakk hehe', '0453donat kentang.jpg', '2018-01-10 03:11:53'),
(84, 38, 'Teh gelas', 'Minuman', 'Tersedia', 5000, 'Kampus A UNJ (Pusat)', '081929054678', 'Jual teh gelas, yang lagi haus yang lagi haus, lumayan untuk menyegarkan tenggorokan disaat butuh yang manis-manis.', '0451teh gelas.jpg', '2018-01-10 03:14:51'),
(85, 39, 'Roti Sosis Keju Goreng', 'Makanan', 'Tersedia', 5000, 'Kampus A UNJ (Pusat)', '081929055300', 'Roti goreng yang di dalamnya terdapat sosis dengan keju lumer dan saus  mayones.', '1254roti sosi keju goreng.jpg', '2018-01-10 11:07:54'),
(86, 39, 'Fruit Pie', 'Makanan', 'Tersedia', 4000, 'Kampus A UNJ (Pusat)', '081929055300', 'Pie mini dengan potongan buah segar dan manis sebagai toping dan kream.. Minar order aja, dijamin enakk', '1259fruit pie.jpg', '2018-01-10 11:09:59'),
(87, 39, 'Muffin', 'Makanan', 'Tersedia', 5000, 'Kampus B UNJ (FIO)', '081929055300', 'Kue cup rasa coklat yang di kasih taburan cokocip warna warni. DIjamin enakk, bikin nagihhh, order ajaa', '1221Muffin.jpg', '2018-01-10 11:11:21'),
(88, 36, 'Donat rasa-rasa', 'Makanan', 'Tersedia', 4000, 'Kampus A UNJ (Pusat)', '081929055371', 'Donat dengan berbagai rasa yaitu : \r\nstrawberry, coklat, keju, kacang, cokocip, durian. Harga 1 donat 4000 aja. Pesan ajaa, stok terbatass. Siapa cepat dia dapat', '1214donat rasa rasa.jpg', '2018-01-10 11:14:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(200) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `fakultas` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_hp`, `fakultas`, `email`, `password`, `level`) VALUES
(1, 'Admin', '+6281929055398', 'Teknik', 'admin@daun.com', '12345', 'admin'),
(34, 'Devin Liu', '081929055398', 'Teknik', 'devinliu97@gmail.com', '12345', 'user'),
(35, 'Gamizar Naufal Rafif', '081929055000', 'Bahasa & Sastra', 'gamizar@gmail.com', '12345', 'user'),
(36, 'Septia Nur Kumala', '081929055111', 'Ekonomi', 'septia@gmail.com', '12345', 'user'),
(37, 'Tommy Purnomo', '081929055234', 'Teknik', 'tommy@gmail.com', '12345', 'user'),
(38, 'Louis', '081929054678', 'Teknik', 'louis@gmail.com', '12345', 'user'),
(39, 'Juan', '081929055300', 'Ilmu Pendidikan', 'juan@gmail.com', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `form_kontak`
--
ALTER TABLE `form_kontak`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `form_kontak`
--
ALTER TABLE `form_kontak`
  MODIFY `id_pesan` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
