-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2019 at 01:24 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extrakke_perkedelku`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_article_cat`
--

CREATE TABLE `t_article_cat` (
  `id` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `permalink` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_article_cat`
--

INSERT INTO `t_article_cat` (`id`, `lang`, `catname`, `permalink`) VALUES
(1, 'ENG', 'Recipe', 'recipe'),
(1, 'INA', 'Resep', 'recipe'),
(2, 'ENG', 'Product', 'product'),
(2, 'INA', 'Produk', 'product'),
(4, 'ENG', 'perkedelku', 'perkedelku'),
(4, 'INA', 'perkedelku', 'perkedelku'),
(5, 'ENG', 'article', 'article'),
(5, 'INA', 'article', 'article');

-- --------------------------------------------------------

--
-- Table structure for table `t_article_detail`
--

CREATE TABLE `t_article_detail` (
  `id_article` int(11) NOT NULL,
  `lang` varchar(5) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `permalink` varchar(50) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_article_detail`
--

INSERT INTO `t_article_detail` (`id_article`, `lang`, `title`, `permalink`, `content`) VALUES
(1, 'ENG', '.', '.', '<p>.</p>'),
(1, 'INA', 'Perkedelku Sate Brokoli Ayam', 'Perkedelku-Sate-Brokoli-Ayam', '<p><strong>Bahan :</strong></p>\r\n<p>1 sachet Perkedelku</p>\r\n<p>1 butir telur (kocok, &frac12; untuk adonan, &frac12; untuk baluran)</p>\r\n<p>100 ml air</p>\r\n<p>Brokoli secukupnya, kukus / rebus dan cincang</p>\r\n<p>50 g daging ayam, cincang</p>\r\n<p>4 batang tusuk sate</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Cara Membuat :</strong></p>\r\n<p>1. Aduk semua bahan hingga merata</p>\r\n<p>2. Bentuk bulat-bulat kecil</p>\r\n<p>3. Balurkan ke sisa telur lalu goreng hingga matang</p>\r\n<p>4. Tusuk beberapa perkedel dengan tusuk sate</p>\r\n<p>5. Perkedelku Sate Brokoli Ayam siap disajikan, jika suka bisa disajikan dengna saus sambal atau mayonais</p>'),
(2, 'ENG', '.', '.', NULL),
(2, 'INA', 'Perkedelku', 'Perkedelku', '<p>PERKEDELKU</p>\r\n<ul>\r\n<li>Apa itu Perkedelku ?</li>\r\n</ul>\r\n<p>Adonan Perkedel yang terbuat dari kentang asli dan siap saji dalam 10 menit, dilengkapi dengan bumbu dan sayuran kering (seledri dan wortel) serta protein nabati yang bermanfaat bagi tubuh.</p>\r\n<p><strong>PRAKTIS, cepat , hemat, sehat (icon di ceklist)</strong></p>\r\n<ul>\r\n<li>Cara Pembuatan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Higienis dan Halal</li>\r\n</ul>\r\n<p>Sertifikat2 MUI, BPOM, SAP, ISO, GMP</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Tulisan halaman depan:</li>\r\n</ul>\r\n<p>-there is no love&gt;&gt;&gt;Terbuat dari&nbsp; KENTANG ASLI</p>\r\n<p>-more sincere&gt;&gt;&gt; dilengkapi SAYURAN KERING DAN BUMBU</p>\r\n<p>-than the love of food&gt;&gt;&gt;SIAP SAJI 10 MENIT</p>'),
(3, 'ENG', 'Nutrijell Mangga', 'Nutrijell-Mangga', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla dignissim ante, quis molestie lorem luctus euismod. Etiam laoreet egestas molestie. Nulla est sem, cursus nec tellus et, blandit ultricies ipsum. Suspendisse semper lacus at cursus efficitur. Duis nulla massa, sollicitudin vitae nulla volutpat, mollis lobortis urna. Aenean cursus massa erat, sed pretium dui mattis non. Vestibulum dictum lectus diam, tempor ullamcorper mi fringilla nec. Sed et diam sollicitudin, accumsan sapien a, porttitor odio. Nullam augue lorem, fermentum non iaculis id, auctor quis nunc. Vivamus eros mi, facilisis et leo et, pretium luctus justo. Quisque urna libero, egestas non quam eget, ultrices auctor elit. Quisque ultricies molestie dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet feugiat eros. Integer euismod aliquam feugiat. Integer sodales ipsum a dolor sollicitudin condimentum.</p>\r\n<p>Nunc quis orci porttitor, elementum ante eget, vehicula turpis. Sed gravida, enim sed posuere iaculis, tortor orci varius elit, id varius sapien sapien a tortor. Vestibulum ullamcorper, nunc ac fringilla facilisis, velit quam dignissim justo, ac fringilla ipsum mauris in ligula. Nulla tincidunt metus elit, at condimentum tortor efficitur vitae. Vivamus accumsan condimentum quam vitae maximus. Praesent dui enim, iaculis at vehicula nec, fermentum ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ullamcorper condimentum nisi non laoreet. Quisque vitae maximus justo. Ut mollis ex eget laoreet dignissim. Etiam ac ante eleifend, efficitur erat eu, ornare ex. Praesent mollis odio id accumsan sollicitudin.</p>\r\n<p>Sed ullamcorper urna id laoreet molestie. Quisque diam lorem, tincidunt id euismod vel, feugiat vel lacus. Nullam suscipit dui auctor, molestie quam et, dignissim ligula. Duis iaculis, lacus eget egestas gravida, est nulla dignissim mauris, ac sodales libero urna in magna. Nulla vitae fringilla arcu. Integer laoreet imperdiet massa eget semper. Proin egestas sit amet velit in elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque non tincidunt orci. Proin velit purus, tempor eu pellentesque ut, porta id nisi.</p>\r\n<p>&nbsp;</p>'),
(3, 'INA', 'Perkedelku', 'Perkedelku', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla dignissim ante, quis molestie lorem luctus euismod. Etiam laoreet egestas molestie. Nulla est sem, cursus nec tellus et, blandit ultricies ipsum. Suspendisse semper lacus at cursus efficitur. Duis nulla massa, sollicitudin vitae nulla volutpat, mollis lobortis urna. Aenean cursus massa erat, sed pretium dui mattis non. Vestibulum dictum lectus diam, tempor ullamcorper mi fringilla nec. Sed et diam sollicitudin, accumsan sapien a, porttitor odio. Nullam augue lorem, fermentum non iaculis id, auctor quis nunc. Vivamus eros mi, facilisis et leo et, pretium luctus justo. Quisque urna libero, egestas non quam eget, ultrices auctor elit. Quisque ultricies molestie dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet feugiat eros. Integer euismod aliquam feugiat. Integer sodales ipsum a dolor sollicitudin condimentum.</p>\r\n<p>Nunc quis orci porttitor, elementum ante eget, vehicula turpis. Sed gravida, enim sed posuere iaculis, tortor orci varius elit, id varius sapien sapien a tortor. Vestibulum ullamcorper, nunc ac fringilla facilisis, velit quam dignissim justo, ac fringilla ipsum mauris in ligula. Nulla tincidunt metus elit, at condimentum tortor efficitur vitae. Vivamus accumsan condimentum quam vitae maximus. Praesent dui enim, iaculis at vehicula nec, fermentum ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ullamcorper condimentum nisi non laoreet. Quisque vitae maximus justo. Ut mollis ex eget laoreet dignissim. Etiam ac ante eleifend, efficitur erat eu, ornare ex. Praesent mollis odio id accumsan sollicitudin.</p>\r\n<p>Sed ullamcorper urna id laoreet molestie. Quisque diam lorem, tincidunt id euismod vel, feugiat vel lacus. Nullam suscipit dui auctor, molestie quam et, dignissim ligula. Duis iaculis, lacus eget egestas gravida, est nulla dignissim mauris, ac sodales libero urna in magna. Nulla vitae fringilla arcu. Integer laoreet imperdiet massa eget semper. Proin egestas sit amet velit in elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque non tincidunt orci. Proin velit purus, tempor eu pellentesque ut, porta id nisi.</p>\r\n<p>&nbsp;</p>'),
(4, 'ENG', 'Nutrijell Stroberi', 'Nutrijell-Stroberi', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla dignissim ante, quis molestie lorem luctus euismod. Etiam laoreet egestas molestie. Nulla est sem, cursus nec tellus et, blandit ultricies ipsum. Suspendisse semper lacus at cursus efficitur. Duis nulla massa, sollicitudin vitae nulla volutpat, mollis lobortis urna. Aenean cursus massa erat, sed pretium dui mattis non. Vestibulum dictum lectus diam, tempor ullamcorper mi fringilla nec. Sed et diam sollicitudin, accumsan sapien a, porttitor odio. Nullam augue lorem, fermentum non iaculis id, auctor quis nunc. Vivamus eros mi, facilisis et leo et, pretium luctus justo. Quisque urna libero, egestas non quam eget, ultrices auctor elit. Quisque ultricies molestie dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet feugiat eros. Integer euismod aliquam feugiat. Integer sodales ipsum a dolor sollicitudin condimentum.</p>\r\n<p>Nunc quis orci porttitor, elementum ante eget, vehicula turpis. Sed gravida, enim sed posuere iaculis, tortor orci varius elit, id varius sapien sapien a tortor. Vestibulum ullamcorper, nunc ac fringilla facilisis, velit quam dignissim justo, ac fringilla ipsum mauris in ligula. Nulla tincidunt metus elit, at condimentum tortor efficitur vitae. Vivamus accumsan condimentum quam vitae maximus. Praesent dui enim, iaculis at vehicula nec, fermentum ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ullamcorper condimentum nisi non laoreet. Quisque vitae maximus justo. Ut mollis ex eget laoreet dignissim. Etiam ac ante eleifend, efficitur erat eu, ornare ex. Praesent mollis odio id accumsan sollicitudin.</p>\r\n<p>Sed ullamcorper urna id laoreet molestie. Quisque diam lorem, tincidunt id euismod vel, feugiat vel lacus. Nullam suscipit dui auctor, molestie quam et, dignissim ligula. Duis iaculis, lacus eget egestas gravida, est nulla dignissim mauris, ac sodales libero urna in magna. Nulla vitae fringilla arcu. Integer laoreet imperdiet massa eget semper. Proin egestas sit amet velit in elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque non tincidunt orci. Proin velit purus, tempor eu pellentesque ut, porta id nisi.</p>\r\n<p>&nbsp;</p>'),
(4, 'INA', 'Perkedelku', 'Perkedelku', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla dignissim ante, quis molestie lorem luctus euismod. Etiam laoreet egestas molestie. Nulla est sem, cursus nec tellus et, blandit ultricies ipsum. Suspendisse semper lacus at cursus efficitur. Duis nulla massa, sollicitudin vitae nulla volutpat, mollis lobortis urna. Aenean cursus massa erat, sed pretium dui mattis non. Vestibulum dictum lectus diam, tempor ullamcorper mi fringilla nec. Sed et diam sollicitudin, accumsan sapien a, porttitor odio. Nullam augue lorem, fermentum non iaculis id, auctor quis nunc. Vivamus eros mi, facilisis et leo et, pretium luctus justo. Quisque urna libero, egestas non quam eget, ultrices auctor elit. Quisque ultricies molestie dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sit amet feugiat eros. Integer euismod aliquam feugiat. Integer sodales ipsum a dolor sollicitudin condimentum.</p>\r\n<p>Nunc quis orci porttitor, elementum ante eget, vehicula turpis. Sed gravida, enim sed posuere iaculis, tortor orci varius elit, id varius sapien sapien a tortor. Vestibulum ullamcorper, nunc ac fringilla facilisis, velit quam dignissim justo, ac fringilla ipsum mauris in ligula. Nulla tincidunt metus elit, at condimentum tortor efficitur vitae. Vivamus accumsan condimentum quam vitae maximus. Praesent dui enim, iaculis at vehicula nec, fermentum ut metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ullamcorper condimentum nisi non laoreet. Quisque vitae maximus justo. Ut mollis ex eget laoreet dignissim. Etiam ac ante eleifend, efficitur erat eu, ornare ex. Praesent mollis odio id accumsan sollicitudin.</p>\r\n<p>Sed ullamcorper urna id laoreet molestie. Quisque diam lorem, tincidunt id euismod vel, feugiat vel lacus. Nullam suscipit dui auctor, molestie quam et, dignissim ligula. Duis iaculis, lacus eget egestas gravida, est nulla dignissim mauris, ac sodales libero urna in magna. Nulla vitae fringilla arcu. Integer laoreet imperdiet massa eget semper. Proin egestas sit amet velit in elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque non tincidunt orci. Proin velit purus, tempor eu pellentesque ut, porta id nisi.</p>\r\n<p>&nbsp;</p>'),
(5, 'ENG', 'Nutrijell Leci', 'Nutrijell-Leci', '<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(5, 'INA', 'Perkedelku', 'Perkedelku', '<ul>\r\n<li>Apa itu Perkedelku ?</li>\r\n</ul>\r\n<p>Adonan Perkedel yang terbuat dari kentang asli dan siap saji dalam 10 menit, dilengkapi dengan bumbu dan sayuran kering (seledri dan wortel) serta protein nabati yang bermanfaat bagi tubuh.</p>\r\n<p><strong>PRAKTIS, cepat , hemat, sehat (icon di ceklist)</strong></p>\r\n<ul>\r\n<li>Cara Pembuatan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Higienis dan Halal</li>\r\n</ul>\r\n<p>Sertifikat2 MUI, BPOM, SAP, ISO, GMP</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Tulisan halaman depan:</li>\r\n</ul>\r\n<p>-there is no love&gt;&gt;&gt;Terbuat dari&nbsp; KENTANG ASLI</p>\r\n<p>-more sincere&gt;&gt;&gt; dilengkapi SAYURAN KERING DAN BUMBU</p>\r\n<p>-than the love of food&gt;&gt;&gt;SIAP SAJI 10 MENIT</p>'),
(10, 'ENG', 'PerkedelKu Beef Croquettes', 'PerkedelKu-Beef-Croquettes', NULL),
(10, 'INA', 'PerkedelKu Kroket Daging Sapi', 'PerkedelKu-Kroket-Daging-Sapi', '<p>Bahan-bahannya:</p>\r\n<p>Adonan</p>\r\n<p>1. 1 Bungkus PerkedelKu</p>\r\n<p>2. Daging Sapi Cincang (tumis) 25 gram</p>\r\n<p>3. Bawang bombay cincang (tumis) 1/4 pc (bisa dihilangkan) 50 gram</p>\r\n<p>4. Air 125 cc</p>\r\n<p>5. Pala Bubuk (1/2 sdt) 2 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Telur (1/2 butir) 25 gram</p>\r\n<p>2. Tepung terigu 10 gram</p>\r\n<p>3. Tepung panir (coklat) 50 gram</p>\r\n<p>4. Minyak Goreng 100 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara Membuatnya:</p>\r\n<p>Adonan</p>\r\n<p>1. Campur semua bahan adonan dalam mangkuk lalu aduk hingga&nbsp;&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp; tercampur rata dan menjadi padat</p>\r\n<p>2. Bentuk oval</p>\r\n<p>*) Daging cincang bisa tidak dicampur dengan adonan, tapi menjadi isian di bagian tengah adonan.</p>\r\n<p>selanjutnya</p>\r\n<p>1. Balut tipis adonan kroket yang sudah dibentuk dengan terigu, telur</p>\r\n<p>&nbsp;&nbsp;&nbsp; lalu tepung panir secara berurutan.</p>\r\n<p>2. Goreng dengan api panas sedang sampai berwarna kuning kecoklatan&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp; dan matang</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(12, 'ENG', 'PerkedelKu Nugget Kentang Ayam', 'PerkedelKu-Nugget-Kentang-Ayam', NULL),
(12, 'INA', 'PerkedelKu Nugget Kentang Ayam', 'PerkedelKu-Nugget-Kentang-Ayam', '<p>Bahan-bahannya:</p>\r\n<p>1. 1 Bungkus perkedelku</p>\r\n<p>2. 1 telur utuh 150 gram</p>\r\n<p>3. Ayam giling (halus) 100 gram</p>\r\n<p>4. Tepung roti putih 15 gram</p>\r\n<p>5. Seledri cincang 20 gram</p>\r\n<p>6. Keju Cheddar parut 50 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Tepung Roti (putih) 100 gram</p>\r\n<p>2. Telur utuh (kocok lepas) 50 gram</p>\r\n<p>3. Tepung terigu 25 gram</p>\r\n<p>4 Minyak goreng 100 ml</p>\r\n<p>&nbsp;</p>\r\n<p>Cara membuatnya:</p>\r\n<p>Adonan</p>\r\n<p>1. Campur rata telur dan ayang giling terlebih dahulu kemuadian</p>\r\n<p>&nbsp;&nbsp;&nbsp; masukan bahan lainnya, aduk kembali sampai tercampur rata</p>\r\n<p>2. Ratakan di atas loyang yang sudah di alasi plastik / di poles margarin,</p>\r\n<p>&nbsp;&nbsp;&nbsp; kukus selama 30 menit sampai matang, keluarkan dan dinginkan</p>\r\n<p>3. Potong sesuai selera, adonan yang sudah matang dan dingin</p>\r\n<p>Panir</p>\r\n<p>1. Balut tipis Nugget dengan terigu, telur lalu tepung roti secara</p>\r\n<p>&nbsp;&nbsp; berurutan</p>\r\n<p>2. Goreng dengan minyak panas sedang hingga kuning kecoklatan</p>\r\n<p>&nbsp;</p>'),
(13, 'ENG', 'PerkedelKu Kue Lumpur Ayam', 'PerkedelKu-Kue-Lumpur-Ayam', NULL),
(13, 'INA', 'PerkedelKu Kue Lumpur Ayam', 'PerkedelKu-Kue-Lumpur-Ayam', '<p>Bahan-bahannya:</p>\r\n<p>Adonan kue lumpur</p>\r\n<p>1. 2 bungkus Perkedelku</p>\r\n<p>2. Tepung terigu 150 gram</p>\r\n<p>3. Santan 800 ml</p>\r\n<p>4. Telur utuh 4 butir 200 gram</p>\r\n<p>5. Kucai cincang 2 sdm 25 gram</p>\r\n<p>6. Margarin cair 100 gram</p>\r\n<p>Ayam suir pedas</p>\r\n<p>1. Dada ayam rebus / kukus (suir) 200 gram</p>\r\n<p>2. Cabe keriting 50 gram</p>\r\n<p>3. Bawang putih 10 gram</p>\r\n<p>4. Bawang merah 25 gram</p>\r\n<p>5. Daun Jeruk 2 gram</p>\r\n<p>6. Gula pasir 15 gram</p>\r\n<p>7. Garam 2 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara membuatnya :</p>\r\n<p>Adonan</p>\r\n<p>1. Campur semua bahan kecuali margarin cair, aduk sampai tercampur</p>\r\n<p>&nbsp;&nbsp; rata</p>\r\n<p>2. Perlahan Masukkan margarin cair, aduk kembali sampai tercampur rata</p>\r\n<p>Ayam suir pedas</p>\r\n<p>1. Haluskan cabe keriting, bawang putih, bawang merah dan daun jeruk,</p>\r\n<p>&nbsp;&nbsp;&nbsp; tumis hingga harum lalu masukkan ayam suir, aduk hingga bumbu</p>\r\n<p>&nbsp;&nbsp;&nbsp; merata</p>\r\n<p>2. Tambahkan gula pasir dan garam (penyedap rasa bila perlu) sesuai</p>\r\n<p>&nbsp;&nbsp;&nbsp; selera. Dinginkan</p>\r\n<p>Selanjutnya :</p>\r\n<p>1. Panaskan cetakan kue lumpur, lalu masukan adonan ke lubang cetakan</p>\r\n<p>&nbsp;&nbsp;&nbsp; kue lumpur setinggi 3/4 bagian, kecilkan api biarkan hingga setengah</p>\r\n<p>&nbsp;&nbsp;&nbsp; matang</p>\r\n<p>2. Tambahkan ayam suir pedas diatasnya, tutup cetakan, diamkan</p>\r\n<p>&nbsp;&nbsp;&nbsp; hingga matang lalu angkat dan sajiakan selagi hangat</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(14, 'ENG', 'PerkedelKu Kue Pancong (Bandros) Ebi', 'PerkedelKu-Kue-Pancong-Bandros-Ebi', NULL),
(14, 'INA', 'PerkedelKu Kue Pancong (Bandros) Ebi', 'PerkedelKu-Kue-Pancong-Bandros-Ebi', '<p>Bahan-bahannya :</p>\r\n<p>Adonan</p>\r\n<p>1. 2 Bungkus Perkedelku</p>\r\n<p>2. Tepung Beras 100 gram</p>\r\n<p>3. Kelapa parut 100 gram</p>\r\n<p>4. Daun Bawang (iris halus) 50 gram</p>\r\n<p>5. Santan (Kental sedang) 700 ml</p>\r\n<p>6. Garam 2 gram</p>\r\n<p>Serundeng Ebi</p>\r\n<p>1. Kelapa parut (sangrai) 100 gram</p>\r\n<p>2. Ebi Kering (sangrai) 25 gram</p>\r\n<p>3. Bawang putih iris (goreng kering) 25 gram</p>\r\n<p>4. Cabe kering bubuk 20 gram</p>\r\n<p>5. Gula halus 10 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara Membuatnya:</p>\r\n<p>Adonan</p>\r\n<p>1. Campur semua bahan jadi satu, lalu aduk hingga tercampur rata,</p>\r\n<p>&nbsp;&nbsp;&nbsp; sisihkan</p>\r\n<p>Serundeng Ebi</p>\r\n<p>1. Masukkan semua bahan ke dalam blender lalu blender hingga halus,</p>\r\n<p>&nbsp;&nbsp; sisihkan.</p>\r\n<p>Selanjutnya:</p>\r\n<p>1. Panaskan cetakan kue Pancong lalu isi dengan adonan kue pancong</p>\r\n<p>&nbsp;&nbsp;&nbsp; hingga hampir penuh, beri taburan / topping serundeng ebi diatasnya</p>\r\n<p>2. Tutup cetakan yang sudah diisi adonan lalu kecilkan api. Diamkan</p>\r\n<p>&nbsp;&nbsp;&nbsp; hingga kue pancong matang lalu angkat dan hidangkan selagi hangat</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>'),
(15, 'ENG', 'PerkedelKu Meat Balls with Black Pepper Sauce', 'PerkedelKu-Meat-Balls-with-Black-Pepper-Sauce', NULL),
(15, 'INA', 'PerkedelKu Meat Balls with Black Pepper Sauce', 'PerkedelKu-Meat-Balls-with-Black-Pepper-Sauce', '<p>Bahan-bahannya:</p>\r\n<p>Meat Balls</p>\r\n<p>1. 2 Bungkus Perkedelku</p>\r\n<p>2. Daging cincang (tumis) 200 gram</p>\r\n<p>3. Pala Bubuk 4 gram</p>\r\n<p>4. Bawang bombay cincang (Tumis) 50 gram</p>\r\n<p>5. Tepung Roti putih 20 gram</p>\r\n<p>6. Air 200 ml</p>\r\n<p>Black Pepper Sauce</p>\r\n<p>1. Kecap Manis 50 gram</p>\r\n<p>2. Saus Tiram 10 gram</p>\r\n<p>3. Saus cabe 100 gram</p>\r\n<p>4. Gula 15 gram</p>\r\n<p>5. Lada hitam tumbuk kasar 10 gram</p>\r\n<p>6. Paprika 3 warna 150 gram</p>\r\n<p>7. Bawang Bombay 100 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara Membuatnya:</p>\r\n<p>Meat Balls</p>\r\n<p>1. Campur semua bahan adonan aduk hingga tercampur rata</p>\r\n<p>2. Bulatkan adonan dengan ukuran sesuai keinginan, lalu goreng hingga</p>\r\n<p>&nbsp;&nbsp; berwarna kuning kecoklatan, angkat dan sisihkan</p>\r\n<p>*) Setelah di tumis , daging dan bawang bombay di tuang ke wadah yang dialasi tissue agar minyak terserap.</p>\r\n<p>Black papper sauce</p>\r\n<p>1. Potong segitiga Paprika dan bawang bombay lalu tumis hingga mulai</p>\r\n<p>&nbsp;&nbsp;&nbsp; layu;, kaku masukkan bahan lainnya</p>\r\n<p>2. Tambahkan sedikit air lalu masak sampai paprika &amp; bawang bombay</p>\r\n<p>&nbsp;&nbsp;&nbsp; matang dan saus mengental</p>\r\n<p>3. Masukkan meat balls ke dalam saus aduk perlahan hingga tertutup</p>\r\n<p>&nbsp;&nbsp;&nbsp; rata dengan saus, matikan api</p>\r\n<p>4. Sajikan selagi hangat, bisa dijadikan lauk dinikmati dengan nasi</p>\r\n<p>&nbsp;</p>'),
(16, 'ENG', 'PerkedelKu Mozzarella', 'PerkedelKu-Mozzarella', NULL),
(16, 'INA', 'PerkedelKu Mozzarella', 'PerkedelKu-Mozzarella', '<p>Bahan -bahannya:</p>\r\n<p>Adonan</p>\r\n<p>1. 1 Bungkus Perkedelku</p>\r\n<p>2. Telur (Kocok lepas) 25 gram</p>\r\n<p>3. Air 100 ml</p>\r\n<p>Isian</p>\r\n<p>1. Keju mozzarella (Dadu) 30 gram</p>\r\n<p>Baluran</p>\r\n<p>1. Telur (Kocok lepas) 25 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara Membuatnya:</p>\r\n<p>1. Campur semua bahan adonan jadi satu, aduk sampai tercampur rata</p>\r\n<p>&nbsp;&nbsp; lalu isi dengan keju mozzarella sisihkan</p>\r\n<p>Selanjutnya</p>\r\n<p>1. Panaskan Minyak, lalu baluri adonan perkedel yang sudah di bentuk</p>\r\n<p>&nbsp;&nbsp; dengan telur yang dikocok lepas</p>\r\n<p>2. Goreng dengan minyak panas sedang sampai berwarna kuning</p>\r\n<p>&nbsp;&nbsp; kecoklatan hingga matang</p>'),
(17, 'ENG', 'PerkedelKu Potato Cheesy Bites', 'PerkedelKu-Potato-Cheesy-Bites', NULL),
(17, 'INA', 'PerkedelKu Potato Cheesy Bites', 'PerkedelKu-Potato-Cheesy-Bites', '<p>Bahan-bahannya:</p>\r\n<p>1. 1 Bungkus Perkedelku</p>\r\n<p>2. Keju cheddar parut 50 gram</p>\r\n<p>3. Telur 25 gram</p>\r\n<p>4. oregano 2 gram</p>\r\n<p>5. saus cabe 25 gram</p>\r\n<p>6. lada hitam tumbuk 5 gram</p>\r\n<p>7. Maizena 10 gram</p>\r\n<p>8. Air 50 ml</p>\r\n<p>Isian</p>\r\n<p>1. Keju Mozzarella (Dadu) 50 gram</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Tepung Roti (Orange) 50 gram</p>\r\n<p>2. Telur utuh (Kocok lepas) 25 gram</p>\r\n<p>3. Minyak goreng 100ml</p>\r\n<p>&nbsp;</p>\r\n<p>Cara membuatnya:</p>\r\n<p>1. Masukkan semua bahan dalam mangkuk, aduk hingga tercampur rata</p>\r\n<p>2. Ambil 1 sdm adonan, isi dengan keju mozzarella, lalu bentuk bulat</p>\r\n<p>3. Balurkan adonan cheesy bites yang sudah dibentuk bulat dengan</p>\r\n<p>&nbsp;&nbsp; kocokan telur</p>\r\n<p>4. Lalu gulingkan di atas tepung roti hingga tertutup rata</p>\r\n<p>5. Panaskan minyak, lalu goreng cheesy bites hingga matang, sajikan</p>\r\n<p>&nbsp;&nbsp; selagi hangat. Nikmati dengan mayonaise atau saus sesuai selera.</p>'),
(18, 'ENG', 'PerkedelKu Rollade Kakap Saus Mangga Thai', 'PerkedelKu-Rollade-Kakap-Saus-Mangga-Thai', NULL),
(18, 'INA', 'PerkedelKu Rollade Kakap Saus Mangga Thai', 'PerkedelKu-Rollade-Kakap-Saus-Mangga-Thai', '<p>Bahan-bahannya:</p>\r\n<p>Adonan Rollade</p>\r\n<p>1. 2 Bungkus Perkedelku</p>\r\n<p>2. Daging Kakap Giling 200 gram</p>\r\n<p>3. Bawang Bombay Cincang (opsional) 50 gram</p>\r\n<p>4. Telur 250gram</p>\r\n<p>5. Tepung roti 25 gram</p>\r\n<p>6. Buncis kukus 50 gram</p>\r\n<p>7. Wortel import Kukus 100gram</p>\r\n<p>8. Kulit kembang Tahu (30 x 20 cm) 2gram</p>\r\n<p>Saus Mangga Thai</p>\r\n<p>1. Air 500ml</p>\r\n<p>2. Cabe rawit merah (iris tipis) 50 gram</p>\r\n<p>3. Cabe merah besar cincang (buang biji) 75 gram</p>\r\n<p>4. Bawang putih cincang 25 gram</p>\r\n<p>5. Mangga mengkal (iris bentuk korek api) 250 gram</p>\r\n<p>6. Daun Ketumbar segar (cincang) 10 gram</p>\r\n<p>7. Air jeruk nipis / asam jawa 50 ml</p>\r\n<p>8. Gula Pasir 75 gram</p>\r\n<p>9. Garam secukupnya</p>\r\n<p>10. Air tapioka (air 4 : 1 tapioka) 15 gram</p>\r\n<p>&nbsp;</p>\r\n<p>Cara membuatnya:</p>\r\n<p>Rollade</p>\r\n<p>1. Campur semua bahan adonan aduk hingga tercampur rata</p>\r\n<p>2. Siapkan 1 lembar kulit kembang tahu, letakkan secukupnya adonan</p>\r\n<p>&nbsp;&nbsp; rollade diatasnya, beri isian buncis dan wortel kukus</p>\r\n<p>3. Poles bagian kulit kembang tahu yang tidak terdapat adonan, lalu</p>\r\n<p>&nbsp;&nbsp; gulung dan sedikit di tekan agar padat</p>\r\n<p>4. Kukus selama 30 menit hingga adonan matang, Rollade bisa juga di</p>\r\n<p>&nbsp;&nbsp;&nbsp; goreng sebentar hingga kulit kembang tahu kecoklatan - dan crispy.</p>\r\n<p>Saus Mangga Thai</p>\r\n<p>1. Masak air, cabe rawit, cabe merah dan bawang putih cincang hingga air</p>\r\n<p>&nbsp;&nbsp; mendidih, kecilkan api masak terus selama 5 menit</p>\r\n<p>2. Masukkan mangga, daun ketumbar dan air jeruk nipis, besarkan api</p>\r\n<p>&nbsp;&nbsp;&nbsp; hingga mendidih</p>\r\n<p>3. Tambahkan air tapioka, aduk cepat hingga tercampur rata dan</p>\r\n<p>&nbsp;&nbsp; mengental lalu matikan api.</p>\r\n<p>Penyajian</p>\r\n<p>&gt; Potong / slice Rollade dengan ketebalan sesuai selera, susun di piring saji, lalu siram dengan saus.</p>'),
(19, 'ENG', 'PerkedelKu Spicy Chicken Sticks', 'PerkedelKu-Spicy-Chicken-Sticks', NULL),
(19, 'INA', 'PerkedelKu Spicy Chicken Sticks', 'PerkedelKu-Spicy-Chicken-Sticks', '<p>Bahan-bahannya:</p>\r\n<p>Adonan</p>\r\n<p>1. 1 Bungkus Perkedelku</p>\r\n<p>2. Telur Utuh 150 gram</p>\r\n<p>3. Ayam Giling 100 gram</p>\r\n<p>4. Tepung roti putih 15 gram</p>\r\n<p>5. seledri cincang&nbsp; 10 gram</p>\r\n<p>6. Cabe rawit merah iris 50 gram</p>\r\n<p>7. Keju Cheddar (dadu kecil)&nbsp; 50 gram</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Tepung Roti (putih) 50 gram</p>\r\n<p>2. Telur utuh (kocok lepas) 50 gram</p>\r\n<p>3. Tepung terigu 25 gram</p>\r\n<p>4. Minyak Goreng 100 ml</p>\r\n<p>Cara membuatnya:</p>\r\n<p>1. Masukkan semua bahan dalam mangkuk lalu aduk hingga tercampur</p>\r\n<p>&nbsp;&nbsp; rata</p>\r\n<p>2. Ratakan adonan di atas loyang kotak 20x20 cm, kukus selama 30</p>\r\n<p>&nbsp;&nbsp;&nbsp; menit</p>\r\n<p>3. Setelah matang, keluarkan dari kukusan, lalu dinginkan</p>\r\n<p>4. Potong memanjang, dengan panjang sesuai selera, bertahap</p>\r\n<p>&nbsp;&nbsp; gulingkan ke atas tepung terigu, ke kocokan telur lalu ke tepung panir</p>\r\n<p>5. Lalu goreng dengan minyak panas, hingga berwarna kuning</p>\r\n<p>&nbsp;&nbsp; kecoklatan dan crispy</p>\r\n<p>6. Sajikan dengan saus cabe atau mayonnaise</p>\r\n<p>*) Bisa disimpan (di stock) dalam Freezer setelah setelah di panir.</p>'),
(20, 'ENG', 'PerkedelKu Udang Selimut', 'PerkedelKu-Udang-Selimut', NULL),
(20, 'INA', 'PerkedelKu Udang Selimut', 'PerkedelKu-Udang-Selimut', '<p>Bahan-bahannya:</p>\r\n<p>1. 1 Bungkus Perkedelku</p>\r\n<p>2. Telur 1/2 Butir</p>\r\n<p>3. Air 75 ml</p>\r\n<p>4. Udang cincang 50 gram</p>\r\n<p>5. Bawang Putih Cincang (tumis) 1 Siung</p>\r\n<p>6. Udang Utuh kupas (dengan ekor) 5 ekor</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Tepung terigu secukupnya</p>\r\n<p>2. Telur utuh secukupnya</p>\r\n<p>3. Tepung Roti Putih secukupnya</p>\r\n<p>&nbsp;</p>\r\n<p>Cara Membuatnya;</p>\r\n<p>1. Gurat bagian punggung udang, keluarkan kotorannya. Gurat</p>\r\n<p>&nbsp;&nbsp; beberapa bagian di bagian perut lalu tekan sedikit agar udang lurus</p>\r\n<p>2. baluri udang dengan sedikit garam dan air jeruk nipis untuk</p>\r\n<p>&nbsp;&nbsp; mengurangi bau amis</p>\r\n<p>3. Buat adonan dengan mencampur semua bahan adonan dalam</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; mangkuk, aduk sampai tercampur rata</p>\r\n<p>4. Ambil kira-kira 1 sdm adonan, letakkan di tangan lalu pipihkan, isi</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; dengan udang utuh, bungkus udang dengan adonan hingga</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp; membentuk agak oval, biarkan ekor udang menyembul keluar</p>\r\n<p>5. Balut adonan yang sudah diisi udang dengan terigu, lalu ke telur dan</p>\r\n<p>&nbsp;&nbsp; tepung roti</p>\r\n<p>6.Goreng dengan minyak yang cukup panas sampai berubah warna</p>\r\n<p>&nbsp;&nbsp; menjadi kuning kecoklatan dan metang.</p>'),
(21, 'ENG', 'Sate Perkedelku Telur Puyuh', 'Sate-Perkedelku-Telur-Puyuh', NULL),
(21, 'INA', 'Sate Perkedelku Telur Puyuh', 'Sate-Perkedelku-Telur-Puyuh', '<p>Bahan - bahannya:</p>\r\n<p>Adonan</p>\r\n<p>1. Bungkus Perkedelku</p>\r\n<p>2. Air 125 ml</p>\r\n<p>Isian</p>\r\n<p>1. Telur puyuh rebus 8 butir</p>\r\n<p>Bahan Panir</p>\r\n<p>1. Tepung terigu secukupnya</p>\r\n<p>2. Telur (kocok lepas) secukupnya</p>\r\n<p>3. Tepung Panir halus secukupnya</p>\r\n<p>Saus topping</p>\r\n<p>1. Saus cabe / tomat secukupnya</p>\r\n<p>2. Mayonnaise secukupnya</p>\r\n<p>3. Minyak Goreng secukupnya</p>\r\n<p>4. Tusuk sate secukupnya</p>\r\n<p>Cara membuatnya:</p>\r\n<p>Adonan</p>\r\n<p>1. Campur Perkedelku dan air, aduk rata hingga membentuk adonan</p>\r\n<p>2. Ambil adonan secukupnya lalu isi dengan telur puyuh, bulatkan</p>\r\n<p>3. Balut tipis dengan tepung terigu, lalu ke telur terakhir panir dengan</p>\r\n<p>&nbsp;&nbsp; tepung panir</p>\r\n<p>4.Goreng adonan yang sudah di panir hingga kuning kecoklatan dan</p>\r\n<p>&nbsp;&nbsp; matang</p>\r\n<p>*) Sebaiknya goreng adonan hingga tenggelam dalam minyak dan suhu minyak - yang panas untuk menghindari pecah saat digoreng.</p>\r\n<p>Selanjutnya</p>\r\n<p>1. Belah dua adonan yang sudah di goreng lalu tusu dengan tusuk sate</p>\r\n<p>2. Beri topping saus cabe / tomat dan mayonnaise atau sesuai selera</p>\r\n<p>&nbsp;</p>'),
(23, 'ENG', '.', '.', '<p>.</p>'),
(23, 'INA', 'Perkedelku 2', 'Perkedelku-2', '<p>coba</p>'),
(25, 'ENG', '.', '.', NULL),
(25, 'INA', 'Tips agar kentang tidak berubah warna', 'Tips-agar-kentang-tidak-berubah-warna', '<p>Mom&rsquo;s pasti pernah khawatir ketika mendiamkan kentang yang telah dikupas pada ruangan terbuka. Tentunya Mom&rsquo;s khawatir kalau kentang tersebut akan berubah warna menjadi kehitaman atau abu-abu. Tapi, Mom&rsquo;s tidak usah khawatir dan takut, kentang yang berubah warnanya tidak berbahaya kok Mom&rsquo;s. Mom&rsquo;s masih bisa mengolahnya menjadi makanan yang enak loh.</p>\r\n<p>Mau tahu Mom&rsquo;s bagaimana caranya? Kali ini, Mommin punya tips yang bisa Mom&rsquo;s lakukan agar kentang tidak berubah warna menjadi gelap kehitaman setelah Mom&rsquo;s kupas.</p>\r\n<ul>\r\n<li><strong>Rendam dengan air es.</strong></li>\r\n</ul>\r\n<p>Pada saat Mom&rsquo;s akan mengolah kentang, sebaiknya kentang yang sudah Mom&rsquo;s kupas direndam ke dalam air es, karena air es berfungsi untuk memperlambat proses oksidasi pada kentang loh, Mom&rsquo;s. Selain untuk mencegah kentang berubah warna, merendam kentang dengan air es juga bisa menjaga tekstur kentang yang renyah saat akan diolah. Perendaman ini bisa menjaga kesegaran dan mempertahankan warna kentang selama kurang lebih 6 jam Mom&rsquo;s.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Rendam dengan campuran air cuka dan air lemon.</strong></li>\r\n</ul>\r\n<p>Cara lainnya, Mom&rsquo;s bisa merendam kentang di dalam mangkuk yang berisi air dingin yang sudah dicampur dengan cuka dan perasan lemon. Caranya rendam kentang yang sudah dikupas selama kurang lebih 30 menit. Kandungan asam yang ada pada cuka dan air lemon berfungsi untuk menyeimbangkan pH di dalam kentang tersebut, ini berfungsi untuk memperlambat perubahan warna pada kentang Mom&rsquo;s. Setelah 30 menit, cuci kentang hingga bersih, sebaiknya mencucinya dengan air yang mengalir Mom&rsquo;s setelah itu taruh kentang di dalam kulkas. Gunanya untuk mempertahankan kesegaran kentang Mom&rsquo;s.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Rendam dengan campuran air garam dan air kapur sirih.</strong></li>\r\n</ul>\r\n<p>Mom&rsquo;s juga bisa menggunakan cara ini loh. Sama seperti air cuka dan air lemon. Mom&rsquo;s bisa mencampurkan garam dengan air kapur sirih. Caranya larutkan garam dan kapur sirih ke dalam air, untuk ukurannya Mom&rsquo;s bisa sesuaikan dengan kebutuhan, ya. Kemudian, kentang yang sudah dikupas Mom&rsquo;s rendam selama satu jam ke dalam larutan tersebut. Cara ini juga bisa untuk mempertahankan warna, tekstur pada kentang. Proses ini juga akan membuat cita rasa kentang menjadi lebih gurih.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Cuci kentang dengan air mengalir beberapa kali.</strong></li>\r\n</ul>\r\n<p>Kentang merupakan salah satu sumber karbohidrat yang tentunya mempunyai kandungan tepung yang cukup tinggi. Kandungan tepung ini lah yang biasanya merubah warna kentang saat berada di udara terbuka. Tapi, tidak perlu khawatir Mom&rsquo;s, Mom&rsquo;s bisa mengatasinya dengan cara mencuci kentang yang sudah Mom&rsquo;s kupas dengan air mengalir selama beberapa kali. Cuci kentang sampai mengeluarkan buih-buih kusam di permukaan air Mom&rsquo;s. Lakukan cara ini selama beberapa kali dengan air yang terus mengalir sampai buih-buih kusam tersebut sudah tidak ada lagi Mom&rsquo;s. Kegiatan ini berfungsi untuk melarutkan kandungan tepung yang ada dikentang yang bisa menyebabkan perubahan warna pada kentang.</p>\r\n<p>Nah, itu tadi Mom&rsquo;s beberapa tips yang bisa Mom&rsquo;s lakukan di rumah untuk membantu mencegah kentang agar tidak berubah warna. Jadi, Mom&rsquo;s tidak perlu khawatir lagi deh jika kentang yang Mom&rsquo;s kupas tiba-tiba berubah warnanya. Selamat mencoba ya Mom&rsquo;s J</p>'),
(26, 'ENG', '.', '.', NULL),
(26, 'INA', 'Trik menyimpan kentang agar tahan lama', 'Trik-menyimpan-kentang-agar-tahan-lama', '<p>Belanja bulanan biasa dilakukan oleh Mom&rsquo;s yang tidak punya banyak waktu untuk pergi ke pasar setiap hari hanya untuk membeli bahan makanan mentah. Namun, bahan makanan mentah yang Mom&rsquo;s beli, pasti tidak semuanya langsung Mom&rsquo;s olah atau santap. Biasanya Mom&rsquo;s akan menyimpan bahan makanan tersebut di lemari pendingin atau di tempat yang sejuk dan terhindar dari sinar matahari.</p>\r\n<p>Tapi, bagaimana dengan menyimpan kentang agar tetap tahan lama dan masih layak di konsumsi, ya Mom&rsquo;s? Tidak seperti kebanyakan sayuran lainnya Mom&rsquo;s, menyimpan kentang haruslah dilakukan secara khusus, dengan penyimpanan yang tepat kentang bisa bertahan lumayan lama loh, Mom&rsquo;s. Kali ini Mommin punya triknya nih!</p>\r\n<ul>\r\n<li><strong>Jangan cuci kentang sebelum disimpan di lemari pendingin.</strong></li>\r\n</ul>\r\n<p>Saat akan menyimpan kentang di lemari pendingin, sebaiknya kentang jangan dicuci ya, Mom&rsquo;s. Biarkan saja kentang tersebut masih dalam baluran tanah dan disimpan di dalam plastik atau di wadah kayu.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Simpan kentang di tempat yang kering dan gelap.</strong></li>\r\n</ul>\r\n<p>Untuk menyimpan kentang, sebaiknya simpan di tempat yang kering dan terhindar dari paparan sinar matahari. Ada juga saran nih, Mom&rsquo;s untuk menyimpan kentang di wadah sebaiknya menggunakan wadah yang berlubang, fungsinya agar udara bisa mengalir dengan baik. Jangan simpan kentang di wadah yang kedap udara ya, Mom&rsquo;s karena dapat mempercepat pembusukan pada kentang Mom&rsquo;s.</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li><strong>Jangan simpan kentang di dekat buah-buahan.</strong></li>\r\n</ul>\r\n<p>Ternyata, menyimpan kentang dekat dengan buah-buahan seperti apel, pir dan pisang dapat mempercepat kentang bertunas loh, Mom&rsquo;s karena mengandung zat kimia bernama etilena. Etilena inilah yang menyebabkan kentang bisa bertunas, jadi alangkah baiknya jika Mom&rsquo;s menyimpan kentang pisahkan dari buah-buahan ya Mom&rsquo;s.</p>\r\n<p>Itu tadi trik dari Mommin, Mom&rsquo;s. Kalau cara Mom&rsquo;s di rumah agar kentang tetap awet seperti apa?</p>\r\n<p>Share yuk Mom&rsquo;s di kolom komen Mommin J</p>'),
(28, 'ENG', '.', '.', NULL),
(28, 'INA', 'Mengolah kentang untuk diet', 'Mengolah-kentang-untuk-diet', '<p>Tahu nggak sih? Mom&rsquo;s selain buah-buahan dan sayur-sayuran, kentang bisa mejadi sumber karbohidrat yang cukup membantu program diet Mom&rsquo;s, loh.</p>\r\n<p>Untuk Mom&rsquo;s yang sedang melakukan program diet, pasti penasaran kan gimana caranya? Nih, Mommin berikan beberapa caranya, agar diet Mom&rsquo;s goals!</p>\r\n<ol>\r\n<li><strong>Gunakan kentang sebagai pengganti makanan pokok.</strong></li>\r\n</ol>\r\n<p>Disarankan makanan pokok nasi yang biasa Mom&rsquo;s konsumsi setiap hari diganti dengan kentang. Mom&rsquo;s hanya perlu mengkonsumsi kentang 2-3 buah setiap harinya dengan ukuran kentang 75-80 gram. Ukuran kentang tersebut mengandung karbohidrat setara dengan 1 centong nasi loh, Mom&rsquo;s. Ini bagus untuk Mom&rsquo;s yang sedang menjalankan diet, karena Mom&rsquo;s bisa merasa tetap kenyang tetapi dengan porsi yang tidak banyak.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"2\">\r\n<li><strong>Hindari memasak kentang dengan digoreng.</strong></li>\r\n</ol>\r\n<p>Jika Mom&rsquo;s sedang menjalani program diet, sebaiknya Mom&rsquo;s hindari kentang goreng atau olahan kentang yang digoreng. Hindari juga menggoreng kentang dengan tepung dan mencampurkan kentang ke dalam santan ya, Mom&rsquo;s. Metode memasak kentang dengan digoreng bisa mengurangi kandungan gizi yang ada pada kentang dan bisa menambah jumlah kalori. Ada banyak metode lain yang bisa Mom&rsquo;s lakukan, misalnya Mom&rsquo;s bisa mengolah kentang dengan cara direbus, dikukus, atau dipanggang. Jangan lupa tambahkan bumbu yang tidak mengandung kalori yang tinggi Mom&rsquo;s seperti bubuk lada atau bawang.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"3\">\r\n<li><strong>Sebaiknya kulit kentang tidak dikupas.</strong></li>\r\n</ol>\r\n<p>Ternyata kulit kentang mengandung serat loh, Mom&rsquo;s yang dapat membantu melancarkan pencernaan. Sebaiknya jika Mom&rsquo;s mengkonsumsi kentang dengan kulitnya ya, tetapi tetap harus dicuci sampai bersih dengan air mengalir.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"4\">\r\n<li><strong>Bisa mencampurkan kentang dengan makanan tinggi serat.</strong></li>\r\n</ol>\r\n<p>Untuk Mom&rsquo;s yang sedang diet, bisa loh mencampurkan kentang dengan makanan lain yang tinggi serat, misalnya asparagus, brokoli, atau lauk tinggi serat, seperti tahu panggang dengan bumbu. Lengkapi juga dengan mengkonsumsi buah atau jus buah yang tinggi serat, misalnya buah apel atau jambu.</p>\r\n<p>Sederhana kan Mom&rsquo;s? Mom&rsquo;s bisa mencoba di rumah nih, praktis dan tentunya menyehatkan! Tag dan mention teman Mom&rsquo;s yang sedang menjalani program diet juga yuk!</p>'),
(29, 'ENG', '.', '.', NULL),
(29, 'INA', 'Olahan kentang untuk bekal anak', 'Olahan-kentang-untuk-bekal-anak', '<p>Anak Mom&rsquo;s tidak suka nasi? Mom&rsquo;s bisa menggantinya dengan kentang untuk sumber karbohidratnya, loh. Kentang memiliki 8% dari serat harian yang penting untuk pertumbuhan, perkembangan, dan kesehatan pada anak, Mom&rsquo;s.</p>\r\n<p>Nah, dengan mengonsumsi kentang, bisa mendorong anak untuk menikmati sayuran sebagai bagian dari pola makan untuk mendapatkan nutrisinya, Mom&rsquo;s. Mom&rsquo;s dapat menyediakan berbagai menu olahan kentang untuk bekal sekolah agar nutrisinya tetap terjaga Mom&rsquo;s.</p>\r\n<p>Mommin punya beberapa kreasi menu olahan kentang yang bisa Mom&rsquo;s berikan untuk menu bekal sekolah anak.</p>\r\n<ol>\r\n<li><strong>Kentang Panggang Piza</strong></li>\r\n</ol>\r\n<p>Tidak hanya orang dewasa saja yang bosan makan nasi, anak-anak juga bisa bosan bila terus menerus di makan nasi. Beri selingan pada bekal anak untuk sekolah. Mom&rsquo;s bisa membuat kentang panggang piza untuk bekal si anak. Makanan ini mirip dengan piza Mom&rsquo;s, yang membedakan adalah makanan ini terbuat dari kentang. Ini bisa menjadi salah satu rekomendasi untuk bekal anak, loh. Rasanya yang empuk dan gurih pasti membuat anak menyukainya.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"2\">\r\n<li><strong><em>Omelete</em> Kentang</strong></li>\r\n</ol>\r\n<p><em>Omelete</em> merupakan salah satu masakan yang sudah tidak asing lagi ya. Biasanya <em>omelete</em> terbuat dari telur yang di campurkan dengan bahan-bahan lain. Mom&rsquo;s bisa juga membuat kreasi <em>omelete</em> dengan berbahan dasar kentang. Proses pembuatannya hampir sama seperti <em>omelete-omelete</em> lain. <em>Omelete</em> kentang bisa Mom&rsquo;s beri sebagai bekal anak di sekolah.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"3\">\r\n<li><strong>Kentang Brokoli Keju</strong></li>\r\n</ol>\r\n<p>Untuk Mom&rsquo;s yang biasa membawakan bekal sekolah untuk anak-anaknya, bisa mencoba menu Kentang Brokoli Keju. Selain di sukai anak, tentunya bekal ini kaya akan nutrisi yang baik untuk tumbuh kembangnya. Mom&rsquo;s juga bisa menambahkan sayuran lain ke dalamnya agar nutrisinya makin bertambah sehingga anak menjadi sehat dan cerdas di sekolah.</p>\r\n<p>Berikut tadi beberapa menu olahan kentang yang bisa di jadikan bekal sekolah anak. Olahan kentang apa sih yang biasa Mom&rsquo;s berikan untuk menu bekal sekolah anak? <em>Share</em> yuk!</p>'),
(30, 'ENG', '.', '.', NULL),
(30, 'INA', 'Perkedelku vs Perkedel', 'Perkedelku-vs-Perkedel', '<p>Siapa sih Mom&rsquo;s yang tidak suka dengan perkedel? Dari proses pembuatannya yang tidak sederhana terkadang membuat Mom&rsquo;s jadi malas untuk membuatnya.</p>\r\n<p>Tahu nggak sih Mom&rsquo;s, kalau perkedel yang enak itu terbuat dari bahan-bahan yang berkualitas, salah satu bahan utamanya adalah kentang. Kentang yang baik itu mempunyai ciri-ciri sebagai berikut Mom&rsquo;s.</p>\r\n<ol>\r\n<li><strong>Permukaan kentang halus dan tidak bergelombang.</strong></li>\r\n</ol>\r\n<p>Kentang yang memiliki permukaan yang halus memiliki rasa yang lebih manis dibandingkan dengan kentang yang permukaannya kasar, kentang yang permukaannya halus juga mudah untuk di kupas loh, Mom&rsquo;s.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"2\">\r\n<li><strong>Kentang terlihat segar, volume kentang terasa berat, dan tidak ada bagian yang busuk.</strong></li>\r\n</ol>\r\n<p>Saat Mom&rsquo;s sedang memilih kentang, pilihkan kentang yang terlihat segar, memiliki volume yang lumayan berat, dan tidak ada kecacatan pada fisik kentang. Pilihlah juga kentang dengan kulit yang tebal yang terdapat garis-garis berwarna kecoklatan.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"3\">\r\n<li><strong>Berwarna kuning muda atau putih kekuningan.</strong></li>\r\n</ol>\r\n<p>Kentang yang memiliki warna tersebut merupakan kentang yang siap diolah ya, Mom&rsquo;s. Jika kentang masih terlihat kehijauan, sebaiknya jangan dipilih Mom&rsquo;s karena kentang yang masih berwarna kehijauan biasanya memiliki rasa yang agak pahit saat diolah atau bisa jadi kentang tersebut banyak terkena paparan sinar matahari.</p>\r\n<p>&nbsp;</p>\r\n<ol start=\"4\">\r\n<li><strong>Memiliki tekstur keras dan tidak bertunas.</strong></li>\r\n</ol>\r\n<p>Pilihlah kentang yang bertekstur keras dan tidak bertunas ya, Mom&rsquo;s. Biasanya kentang yang memiliki tekstur lunak dan bertunas memiliki kualitas yang kurang baik, Mom&rsquo;s. Pilih juga kentang yang memiliki kulit yang terlihat keriput ya, Mom&rsquo;s.</p>\r\n<p>Nah, itu tadi beberapa ciri-ciri dari kentang yang baik Mom&rsquo;s. Sekarang Mom&rsquo;s tidak perlu repot-repot lagi membeli dan mengupas kentang hanya untuk mengolahnya menjadi perkedel yang merupakan makanan favorit keluarga di rumah, loh.</p>\r\n<p>Karena sekarang sudah tersedia Perkedelku, kemasan praktis dari Perkedelku sudah mengandung adonan kentang asli yang dilengkapi dengan bumbu dan sayuran kering yang mengandung protein nabati. Tentunya ini memudahkan Mom&rsquo;s untuk membuat perkedel, Mom&rsquo;s tidak perlu menambahkan bahan tambahan lagi ke dalamnya, karena Perkedelku sudah tersedia adonan kentang yang dilengkapi sayuran kering dalam satu kemasan.</p>\r\n<p>Cara penyajiannya yang mudah, hanya dengan 1 sachet Perkedelku dan menambahkan 1 butir telur bisa membantu Mom&rsquo;s untuk membuat perkedel kesukaan keluarga kapan saja. Tentunya hasil dari perkedel yang Mom&rsquo;s buat secara manual dengan menggunakan Perkedelku tidak jauh berbeda rasanya, Mom&rsquo;s juga bisa mengkreasikan lagi perkedel yang Mom&rsquo;s buat bila dirasa perkedelnya biasa-biasa saja, loh. Selain cara penyajiannya yang mudah, Perkedelku bisa Mom&rsquo;s dapatkan di warung, minimarket, dan supermarket terdekat.</p>\r\n<p>Share yuk Mom&rsquo;s olahan apa saja sih yang sudah Mom&rsquo;s kreasikan dengan Perkedelku?</p>'),
(31, 'ENG', '.', '.', NULL),
(31, 'INA', 'Kandungan zat pada kentang dan manfaatnya', 'Kandungan-zat-pada-kentang-dan-manfaatnya', '<p>Kentang goreng? Donat kentang? Keripik kentang? Perkedel? Siapa sih yang nggak kenal dengan berbagai macam makanan ini, Mom&rsquo;s? Banyak olahan kentang yang bisa Mom&rsquo;s nikmati bersama keluarga, tapi tahukah Mom&rsquo;s dengan segudang manfaat dari kentang?</p>\r\n<p>Di dalam kentang banyak banget zat-zat yang bermanfaat buat tubuh, Mom&rsquo;s. Diantaranya adalah Potassium (NA) yang berguna untuk meningkatkan pH di dalam tubuh, ada juga Karbohidrat sebagai sumber energi, dan fiber sebagai pengawal tekanan darah.</p>\r\n<p>Selain itu juga, terdapat beberapa vitamin seperti vitamin B1, B2, dan B3 serta sedikit kadungan protein juga zat besi, Mom&rsquo;s.</p>\r\n<p>Tentunya tidak hanya zat-zat tersebut saja Mom&rsquo;s, nyatanya di dalam kentang juga terdapat kandungan Serat pada kulitnya. Kentang mengandung pati dan serat sangat bagus untuk menjadi makanan bakteri baik di dalam usus besar, yang mana difungsikan untuk membantu memelihara kesehatan saluran pencernaan.</p>\r\n<p>Ada lagi Antioksidan yang berguna untuk menangkal radikal bebas loh, Mom&rsquo;s. Antioksidan juga berguna untuk mencegah penyakit kronis seperti jantung koroner, kanker dan diabetes. Kemudian ada Folat, untuk Mom&rsquo;s yang sedang hamil asam folat sangat dianjurkan untuk dikonsumsi, loh salah satunya mengkonsumsi kentang. Ini berfungsi untuk mencegah risiko keguguran dan cacat pada bayi Mom&rsquo;s.</p>\r\n<p>Meskipun kentang banyak banget zat-zat bermanfaatnya, tapi kalau Mom&rsquo;s salah dalam mengolahnya bisa menghilangkan kandungan zat tersebut loh, Mom&rsquo;s. Sebisa mungkin Mom&rsquo;s menghindari cara mengolah kentang dengan di goreng, pengolahan dengan cara ini justru bisa menambah kalori dalam kentang. Sebaiknya Mom&rsquo;s mengolah kentang dengan cara di rebus, di kukus, atau di panggang agar nutrisi yang ada di dalam kentang tetap terjaga. Dianjurkan juga saat mengkonsumsi kentang kulitnya tidak dikupas, karena dalam kulit kentang terdapat kandungan serat yang sudah kita bahas sebelumnya.</p>\r\n<p>Mom&rsquo;s juga harus tetap berhati-hati ya, karena kalau Mom&rsquo;s salah memilih kentang juga bisa membahayakan tubuh, Mom&rsquo;s jangan memilih kentang yang berwarna kehijauan atau terdapat tunasnya ya.</p>\r\n<p>Jadi, seberapa sering sih Mom&rsquo;s dan keluarga mengkonsumsi kentang setiap harinya? Share yuk J</p>');

-- --------------------------------------------------------

--
-- Table structure for table `t_article_h`
--

CREATE TABLE `t_article_h` (
  `id` int(11) NOT NULL,
  `cat` int(11) DEFAULT NULL,
  `thumb_image` varchar(50) DEFAULT NULL,
  `main_image` varchar(50) DEFAULT NULL,
  `video_url` varchar(1000) DEFAULT NULL,
  `input_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_article_h`
--

INSERT INTO `t_article_h` (`id`, `cat`, `thumb_image`, `main_image`, `video_url`, `input_time`) VALUES
(1, 1, '5c6e0ab40ae84.jpg', '5c6e0ab4817cb.jpg', NULL, '2019-01-24 00:00:00'),
(2, 2, '5c4979cea346a.png', '5ca6f7f64780d.jpg', NULL, '2019-01-24 08:39:42'),
(3, 2, '5c4ad5138ec6c.png', '5c4ad5140360c.png', NULL, '2019-01-25 16:21:23'),
(4, 2, '5c4ad530c5df3.png', '5c4ad530f4046.png', NULL, '2019-01-25 16:21:52'),
(5, 4, '5ca6f81785560.jpg', '5ca6f82253d41.jpg', NULL, '2019-01-25 16:22:27'),
(10, 1, '5c886b9f189b3.jpg', '5c886b9f6035c.jpg', NULL, '2019-03-13 09:31:59'),
(12, 1, '5c8875a19667e.jpg', '5c8875a1ac4d7.jpg', NULL, '2019-03-13 10:14:41'),
(13, 1, '5c887ae72b35d.jpg', '5c887ae7331f9.jpg', NULL, '2019-03-13 10:37:11'),
(14, 1, '5c8882626206e.jpg', '5c8882626b328.jpg', NULL, '2019-03-13 11:09:06'),
(15, 1, '5c88852307781.jpg', '5c88852312f50.jpg', NULL, '2019-03-13 11:20:51'),
(16, 1, '5c888b41abdc1.jpg', '5c888b41b2788.jpg', NULL, '2019-03-13 11:46:57'),
(17, 1, '5c88a19559918.jpg', '5c88a19560b09.jpg', NULL, '2019-03-13 13:22:13'),
(18, 1, '5c88a47891d27.jpg', '5c88a4789a57d.jpg', NULL, '2019-03-13 13:34:32'),
(19, 1, '5c88a709e1619.jpg', '5c88a709e8e46.jpg', NULL, '2019-03-13 13:45:29'),
(20, 1, '5c88aaed57192.jpg', '5c88aaed61a1d.jpg', '<iframe width=\"300\" height=\"300\" src=\"https://www.youtube.com/embed/BG62wyAdI6M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-03-13 14:02:05'),
(21, 1, '5c88aefb73219.jpg', '5c88aefb7a4c3.jpg', NULL, '2019-03-13 14:19:23'),
(23, 2, '5c99c8723051e.png', '5c99c8729792d.png', NULL, '2019-03-26 13:36:34'),
(25, 5, '5ca1675c31efa.jpg', '5ca1675c5385a.jpg', NULL, '2019-04-01 08:20:28'),
(26, 5, '5ca167de3d54e.jpg', '5ca167de6049a.jpg', NULL, '2019-04-01 08:22:38'),
(28, 5, '5ca168b65652d.jpg', '5ca168b678b71.jpg', NULL, '2019-04-01 08:26:14'),
(29, 5, '5ca16975af37a.jpg', '5ca16975cc0bc.jpg', NULL, '2019-04-01 08:29:25'),
(30, 5, '5cc16a763cbf3.jpg', '5cc16a764f0bd.jpg', NULL, '2019-04-25 15:06:14'),
(31, 5, '5cd1306c70ab9.jpg', '5cd1306c994a7.jpg', NULL, '2019-04-01 08:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `t_content`
--

CREATE TABLE `t_content` (
  `category` varchar(50) DEFAULT NULL,
  `lang` varchar(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_content`
--

INSERT INTO `t_content` (`category`, `lang`, `name`, `content`) VALUES
('HOME', 'ENG', 'about_us', 'About Us'),
('HOME', 'ENG', 'about_us_desc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('HOME', 'ENG', 'our_products', 'Our Products'),
('HOME', 'ENG', 'stay_update', 'Stay Up To Date'),
('HOME', 'ENG', 'button_subs', 'Subscribe'),
('HOME', 'ENG', 'read_more', 'Read More'),
('HOME', 'ENG', 'contact_us', 'Contact Us'),
('HOME', 'ENG', 'contact_us_name', 'Name'),
('HOME', 'ENG', 'contact_us_phone', 'Phone Number'),
('HOME', 'ENG', 'contact_us_email', 'Email'),
('HOME', 'ENG', 'contact_us_message', 'Message'),
('HOME', 'ENG', 'contact_us_button_label', 'Send Message'),
('PRODUCTS', 'ENG', 'main_content', 'Lorem Ipsum'),
('PRODUCTS', 'INA', 'main_content', '<p>Bahasa</p>'),
('HOME', 'INA', 'about_us', NULL),
('HOME', 'INA', 'about_us_desc', NULL),
('HOME', 'INA', 'our_products', NULL),
('HOME', 'INA', 'stay_update', NULL),
('HOME', 'INA', 'button_subs', NULL),
('HOME', 'INA', 'read_more', 'Baca Selanjutnya'),
('HOME', 'INA', 'about_us', 'Tentang Kami'),
('HOME', 'INA', 'about_us_desc', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
('HOME', 'INA', 'our_products', 'Produk Kami'),
('HOME', 'INA', 'stay_update', 'Tetap terhubung dengan kami'),
('HOME', 'INA', 'button_subs', 'Berlangganan'),
('HOME', 'INA', 'read_more', 'Baca Selanjutnya'),
('HOME', 'INA', 'contact_us', 'Hubungi Kami'),
('HOME', 'INA', 'contact_us_name', 'Nama'),
('HOME', 'INA', 'contact_us_phone', 'Nomor Telepon'),
('HOME', 'INA', 'contact_us_email', 'Email'),
('HOME', 'INA', 'contact_us_message', 'Pesan'),
('HOME', 'INA', 'contact_us_button_label', 'Kirim Pesan'),
('PRODUCTS', 'INA', 'main_content', '<p>Jelly bubuk instant yang terbuat dari bahan alami seperti karagenan dan konjac yang berserat tinggi.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `t_language`
--

CREATE TABLE `t_language` (
  `lang_id` varchar(5) NOT NULL,
  `lang_name` varchar(20) DEFAULT NULL,
  `lang_icon` varchar(50) DEFAULT NULL,
  `flag_default` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_language`
--

INSERT INTO `t_language` (`lang_id`, `lang_name`, `lang_icon`, `flag_default`) VALUES
('ENG', 'English', 'ENG.png', 0),
('INA', 'Indonesia', 'INA.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_login`
--

CREATE TABLE `t_login` (
  `LoginId` int(11) DEFAULT NULL,
  `UserName` varchar(30) DEFAULT NULL,
  `Alias` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_login`
--

INSERT INTO `t_login` (`LoginId`, `UserName`, `Alias`, `Password`, `role`) VALUES
(21, 'super_admin', 'Super Admin', '$2y$10$GwXEfeOz9DTx7bGBH0VeB.x5H7uwwamPsFGwZTFhSUj3PwkHtlyCi', 99);

-- --------------------------------------------------------

--
-- Table structure for table `t_login_customer`
--

CREATE TABLE `t_login_customer` (
  `id_login_customer` int(11) NOT NULL,
  `email` int(11) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `active` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_lookup`
--

CREATE TABLE `t_lookup` (
  `CategoryId` varchar(50) DEFAULT NULL,
  `LookupValue` varchar(50) DEFAULT NULL,
  `LookupDescription` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_lookup`
--

INSERT INTO `t_lookup` (`CategoryId`, `LookupValue`, `LookupDescription`) VALUES
('logo', 'Perkedelku-Web-LOGOPERKEDELKU.png', 'logo'),
('meta_web_title', 'Perkedelku', 'Title Website'),
('meta_web_desc', 'Our products are freshly made daily to ensure the ', 'Website Description'),
('meta_web_address', 'http://perkedelku.co.id', 'Website Address'),
('meta_web_keyword', 'perkedel,kentang,perkedelku', 'Website Keyword'),
('google_analytics', '', 'Google Analytics Script'),
('google_captcha_sitekey', '6Le95p4UAAAAABIafKgkTw5_m0PEjWfr-a7EOkoz', 'Google Captcha Sitekey'),
('google_captcha_secretkey', '6Le95p4UAAAAAO_sZcYCHxIz9ziAMZ9txfcXX8F4', 'Google Captcha Secret Key'),
('homepage_top_image', '5cd15201596aa.png', 'Homepage Top Banner'),
('homepage_middle_image', '5cd15e19bdce2.png', 'Homepage Middle Banner'),
('lang_setting', 'off', 'User can change language'),
('ADMROLE', '99', 'Super Admin'),
('products_top_image', '5cd150b46f3c7.png', 'Product Page Top Banner'),
('contact_top_image', '5cd1520245583.png', 'Contact Page Top Banner'),
('contact_email', 'perkedelku@nutrijell.com', 'contact_send_email');

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id` int(11) NOT NULL,
  `displayname` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `ishavechild` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `menulvl` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id`, `displayname`, `value`, `link`, `icon`, `ishavechild`, `parentid`, `menulvl`, `active`) VALUES
(10000, 'Master Data', 'masterdata', '', 'fa fa-inbox', 1, 0, 1, 1),
(10100, 'User Login', 'userlogin', '/_admin_login/user_login', 'fa fa-circle', 0, 10000, 2, 1),
(10200, 'Matrix Menu', 'matrixmenu', '/_admin_login/matrix_menu', 'fa fa-circle', 0, 10000, 2, 1),
(10300, 'Meta Data', 'meta_data', '/_admin_login/meta_data', 'fa fa-circle', 0, 10000, 2, 1),
(10400, 'Website Language', 'language', '/_admin_login/language', 'fa fa-circle', 0, 10000, 2, 1),
(20000, 'Content', 'content', '', 'fa fa-folder-o', 1, 0, 1, 1),
(20100, 'Menu', 'homepage', '/_admin_login/content_menu', 'fa fa-circle', 0, 20000, 2, 0),
(20200, 'Home & Contact Page', 'homepa_contact', '/_admin_login/content_homepage', 'fa fa-circle', 0, 20000, 2, 1),
(20300, 'Home & Contact Page Image', 'homepage_image', '/_admin_login/homepage_image', 'fa fa-circle', 0, 20000, 2, 1),
(20400, 'Product Page', 'product_page', '/_admin_login/product_page', 'fa fa-circle', 0, 20000, 2, 1),
(30000, 'Articles', 'articles', '', 'fa fa-newspaper-o', 1, 0, 1, 1),
(30100, 'Manage Articles', 'manage_articles', '/_admin_login/manage_article', 'fa fa-circle', 0, 30000, 2, 1),
(40000, 'Subscribe', 'subscribe', '/_admin_login/subscribe', 'fa fa-address-book', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_menu_frontend`
--

CREATE TABLE `t_menu_frontend` (
  `lang` varchar(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu_frontend`
--

INSERT INTO `t_menu_frontend` (`lang`, `name`, `display_name`, `link`, `menu_order`) VALUES
('ENG', 'contact', 'Contact', '/contact', 4),
('ENG', 'home', 'Home', '/home', 1),
('ENG', 'product', 'Product', '/products', 3),
('ENG', 'recipe', 'Recipes', '/content/recipe', 2),
('INA', 'article', 'Artikel', '/content/article', 3),
('INA', 'contact', 'Hubungi Kami', '/contact', 4),
('INA', 'perkedelku', 'Tau kah kamu?', '/perkedelku', 1),
('INA', 'recipe', 'Resep', '/content/recipe', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_menu_tr`
--

CREATE TABLE `t_menu_tr` (
  `idrole` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu_tr`
--

INSERT INTO `t_menu_tr` (`idrole`, `idmenu`) VALUES
(99, 10000),
(99, 10100),
(99, 10200),
(99, 10300),
(99, 10400),
(99, 20000),
(99, 20100),
(99, 20200),
(99, 20300),
(99, 20400),
(99, 30000),
(99, 30100),
(99, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `t_subscriber`
--

CREATE TABLE `t_subscriber` (
  `id_subscriber` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_subscriber`
--

INSERT INTO `t_subscriber` (`id_subscriber`, `name`, `email`, `create_date`) VALUES
(5, 'nova', 'misbahfrsuper@gmail.com', '2019-04-23 10:06:51'),
(6, 'nova', 'misbah.ansoiri@forisa.co.id', '2019-04-23 10:07:14'),
(7, 'nova', 'misbahelka@gmail.com', '2019-04-23 10:07:38'),
(9, 'coba', 'coba@coba.com', '2019-05-08 13:40:36'),
(10, 'coba', 'coba1@coba.com', '2019-05-09 09:36:31');

-- --------------------------------------------------------

--
-- Table structure for table `t_type_access`
--

CREATE TABLE `t_type_access` (
  `id_type_akses` int(11) NOT NULL,
  `type_akses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_type_access`
--

INSERT INTO `t_type_access` (`id_type_akses`, `type_akses`) VALUES
(1, 'Admin'),
(2, 'External Editor'),
(3, 'Internal Editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_article_cat`
--
ALTER TABLE `t_article_cat`
  ADD PRIMARY KEY (`id`,`lang`,`catname`);

--
-- Indexes for table `t_article_detail`
--
ALTER TABLE `t_article_detail`
  ADD PRIMARY KEY (`id_article`,`lang`);

--
-- Indexes for table `t_article_h`
--
ALTER TABLE `t_article_h`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_language`
--
ALTER TABLE `t_language`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `t_login_customer`
--
ALTER TABLE `t_login_customer`
  ADD PRIMARY KEY (`id_login_customer`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menu_frontend`
--
ALTER TABLE `t_menu_frontend`
  ADD PRIMARY KEY (`lang`,`name`);

--
-- Indexes for table `t_menu_tr`
--
ALTER TABLE `t_menu_tr`
  ADD PRIMARY KEY (`idrole`,`idmenu`);

--
-- Indexes for table `t_subscriber`
--
ALTER TABLE `t_subscriber`
  ADD PRIMARY KEY (`id_subscriber`);

--
-- Indexes for table `t_type_access`
--
ALTER TABLE `t_type_access`
  ADD PRIMARY KEY (`id_type_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_login_customer`
--
ALTER TABLE `t_login_customer`
  MODIFY `id_login_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_subscriber`
--
ALTER TABLE `t_subscriber`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
