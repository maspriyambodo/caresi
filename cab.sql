/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : cab

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 08/08/2019 21:08:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dokumen_pendukung
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_pendukung`;
CREATE TABLE `dokumen_pendukung`  (
  `no_ppu` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `path` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES (1, 'Administrator');
INSERT INTO `jabatan` VALUES (2, 'Logistik');
INSERT INTO `jabatan` VALUES (3, 'Finance');
INSERT INTO `jabatan` VALUES (4, 'Direktur');

-- ----------------------------
-- Table structure for karyawan
-- ----------------------------
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE `karyawan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `j_kel` int(11) NULL DEFAULT NULL,
  `alamat` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jabatan` int(11) NULL DEFAULT NULL,
  `mail` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for laporan
-- ----------------------------
DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan`  (
  `id_laporan` int(11) NULL DEFAULT NULL,
  `no_ppu` int(11) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of laporan
-- ----------------------------
INSERT INTO `laporan` VALUES (NULL, 1);

-- ----------------------------
-- Table structure for ppu
-- ----------------------------
DROP TABLE IF EXISTS `ppu`;
CREATE TABLE `ppu`  (
  `id_ppu` int(11) NOT NULL AUTO_INCREMENT,
  `no_ppu` int(11) NULL DEFAULT NULL,
  `tgl_ppu` date NULL DEFAULT NULL,
  `keterangan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` int(11) NULL DEFAULT NULL,
  `satuan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(11) NULL DEFAULT NULL,
  `tgl_pembayaran` date NULL DEFAULT NULL,
  `vendor` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stat` int(11) NULL DEFAULT NULL COMMENT '1. belum dibayar\r\n2. sudah dibayar',
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_ppu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 84 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ppu
-- ----------------------------
INSERT INTO `ppu` VALUES (1, 1, '2019-06-24', 'PASIR HALUS', 1, 'm³', 170000, '2019-08-06', 'TB TBAN', 2, 1, NULL, 3, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (2, 1, '2019-06-24', 'BATA', 1000, 'truk', 2000, '2019-08-06', 'TB TBAN', 2, 1, NULL, 3, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (3, 1, '2019-06-24', 'BATU KERIKIL', 1, 'Truk', 180000, '2019-08-06', 'TB TBAN', 2, 1, NULL, 3, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (4, 2, '2019-06-27', 'Babat Semak + Rumput', 3725, 'm²', 2500, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (5, 2, '2019-06-27', 'paku', 1, 'lot', 11000000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (6, 2, '2019-06-27', 'batu', 12, 'lot', 7500000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (7, 2, '2019-06-27', 'Listrik Kerja', 2, 'bln', 1000000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (8, 2, '2019-06-27', 'Bouwplank dan Pengukuran', 3725, 'm²', 2500, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (9, 2, '2019-06-27', 'Mobilisasi Tenaga Kerja + Alat', 1, 'Is', 3500000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (10, 2, '2019-06-27', 'Keamanan', 2, 'bln', 2000000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (11, 2, '2019-06-27', 'Pagar Seng Proyek', 140, 'm²', 80000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (12, 2, '2019-06-27', 'Leveling', 3725, 'm²', 10000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (13, 2, '2019-06-27', 'Galian Tanah Saluran Dalam Kompleks', 117, 'm³', 128280, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (14, 2, '2019-06-27', 'Urugan Pasir 10 cm dibawah U Ditch', 20, 'm³', 385088, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (15, 2, '2019-06-27', 'U-Ditch + tutup', 310, 'm¹', 550000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (16, 2, '2019-06-27', 'Urugan \'Tanah samping U-Ditch', 1, 'Is', 2500000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (17, 2, '2019-06-27', 'Pemadatan Badan Jalan', 1105, 'm²', 8500, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (18, 2, '2019-06-27', 'Makadam 7/5 t = 10 cm', 1105, 'm²', 46000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (19, 2, '2019-06-27', 'Makadam 3/5 t =7 cm', 1105, 'm²', 34500, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (20, 2, '2019-06-27', 'Batu Split 2/3 + pemadatan + cor aspal 5 cm', 1105, 'm²', 69000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (21, 2, '2019-06-27', 'Hotmix t = 3', 1105, 'm²', 126500, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (22, 2, '2019-06-27', 'Kansten Taman 40 x 20 x 10', 116, 'm¹', 145000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (23, 3, '2019-07-31', 'Batu', 1, 'truk', 200000, '2019-08-06', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (24, 4, '2018-08-07', 'Kolom struktur 15/20', 3, 'm3', 5100000, '2018-08-07', NULL, 2, 1, '2018-08-07 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (25, 4, '2018-08-08', 'Kolom praktis 13/13', 3, 'm3', 4100000, '2018-08-07', NULL, 2, 1, '2018-08-08 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (26, 4, '2018-08-09', 'Balok Dak Talang Keliling', 8, 'm3', 4100000, '2018-08-07', NULL, 2, 1, '2018-08-09 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (27, 4, '2018-08-10', 'Ring Balok 15/15', 2, 'm3', 4100000, '2018-08-07', NULL, 2, 1, '2018-08-10 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (28, 4, '2018-08-11', 'Tangga Beton', 4, 'm3', 4100000, '2018-08-07', NULL, 2, 1, '2018-08-11 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (29, 4, '2018-08-12', 'Pasangan bata ', 291, 'm2', 142500, '2018-08-07', NULL, 2, 1, '2018-08-12 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (30, 4, '2018-08-13', 'Pasangan Plesteran dan acian', 582, 'm2', 122500, '2018-08-07', NULL, 2, 1, '2018-08-13 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (31, 4, '2018-08-14', 'Pasangan Dinding Antar Kamar', 259, 'm2', 150000, '2018-08-07', NULL, 2, 1, '2018-08-14 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (32, 4, '2018-08-15', 'Kusen + Frame Jendela', 7, 'lubang', 3000000, '2018-08-07', NULL, 2, 1, '2018-08-15 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (33, 4, '2018-08-16', 'Kusen + Frame Jendela', 7, 'lubang', 3250000, '2018-08-07', NULL, 2, 1, '2018-08-16 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (34, 4, '2018-08-17', 'Kusen + Frame Jendela Dapur/Boven', 2, 'lubang', 2000000, '2018-08-07', NULL, 2, 1, '2018-08-17 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (35, 4, '2018-08-18', 'Kusen + Pintu Kaca', 1, 'daun', 4500000, '2018-08-07', NULL, 2, 1, '2018-08-18 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (36, 4, '2018-08-19', 'Kusen + Pintu Ruangan', 10, 'bh', 4500000, '2018-08-07', NULL, 2, 1, '2018-08-19 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (37, 4, '2018-08-20', 'Pintu PVC', 11, 'bh', 750000, '2018-08-07', NULL, 2, 1, '2018-08-20 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (38, 4, '2018-08-21', 'Genteng ', 107, 'm2', 90000, '2018-08-07', NULL, 2, 1, '2018-08-21 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (39, 4, '2018-08-22', 'Rangka Atap', 107, 'm2', 110000, '2018-08-07', NULL, 2, 1, '2018-08-22 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (40, 4, '2018-08-23', 'Alluminium Foil', 107, 'm2', 25000, '2018-08-07', NULL, 2, 1, '2018-08-23 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (41, 4, '2018-08-24', 'Engsel Pintu Kayu', 11, 'set', 275000, '2018-08-07', NULL, 2, 1, '2018-08-24 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (42, 4, '2018-08-25', 'Handel dan Lockess Pintu Kayu', 11, 'set', 750000, '2018-08-07', NULL, 2, 1, '2018-08-25 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (43, 4, '2018-08-26', 'Alat Bantu Kerja', 1, 'set', 3500000, '2018-08-07', NULL, 2, 1, '2018-08-26 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (44, 4, '2018-08-27', 'Rangka plafon', 166, 'm2', 70000, '2018-08-07', NULL, 2, 1, '2018-08-27 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (45, 4, '2018-08-28', 'Plafond ', 166, 'm1', 70000, '2018-08-07', NULL, 2, 1, '2018-08-28 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (46, 4, '2018-08-29', 'Drop Ceiling', 0, 'm1', 60000, '2018-08-07', NULL, 2, 1, '2018-08-29 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (47, 4, '2018-08-30', 'Pemasangan lantai 3', 150, 'm2', 165000, '2018-08-07', NULL, 2, 1, '2018-08-30 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (48, 4, '2018-08-31', 'Plin Lantai', 1, 'ls', 5000000, '2018-08-07', NULL, 2, 1, '2018-08-31 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (49, 4, '2018-09-01', 'Lantai Toilet', 33, 'm2', 150000, '2018-08-07', NULL, 2, 1, '2018-09-01 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (50, 4, '2018-09-02', 'Dinding Toilet', 119, 'm2', 150000, '2018-08-07', NULL, 2, 1, '2018-09-02 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (51, 4, '2018-09-03', 'Instalasi Utama ( Meteran -> MCB Kamar )', 31, 'unit', 850000, '2018-08-07', NULL, 2, 1, '2018-09-03 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (52, 4, '2018-09-04', 'MCB Box', 31, 'unit', 650000, '2018-08-07', NULL, 2, 1, '2018-09-04 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (53, 4, '2018-09-05', 'Instalasi Titik Lampu/Exhaust', 57, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-05 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (54, 4, '2018-09-06', 'Instalasi Saklar Ganda + Outlet', 10, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-06 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (55, 4, '2018-09-07', 'Instalasi Saklar Tunggal + Outlet', 20, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-07 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (56, 4, '2018-09-08', 'Instalasi Stop Kontak + Outlet', 25, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-08 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (57, 4, '2018-09-09', 'Instalasi Titik TV + Outlet', 11, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-09 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (58, 4, '2018-09-10', 'Instalasi Titik Telpon + Outlet', 1, 'ttk', 175000, '2018-08-07', NULL, 2, 1, '2018-09-10 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (59, 4, '2018-09-11', 'Ring Lampu Downlight', 35, 'ttk', 100000, '2018-08-07', NULL, 2, 1, '2018-09-11 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (60, 4, '2018-09-12', 'Lampu Grill / Tempel Dinding', 5, 'ttk', 200000, '2018-08-07', NULL, 2, 1, '2018-09-12 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (61, 4, '2018-09-13', 'Lampu Outbow', 4, 'ttk', 200000, '2018-08-07', NULL, 2, 1, '2018-09-13 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (62, 4, '2018-09-14', 'Instalasi Listrik AC', 10, 'ttk', 208780, '2018-08-07', NULL, 2, 1, '2018-09-14 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (63, 4, '2018-09-15', 'Exhaust', 10, 'ttk', 400000, '2018-08-07', NULL, 2, 1, '2018-09-15 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (64, 4, '2018-09-16', 'Closet duduk ', 10, 'bh', 2750000, '2018-08-07', NULL, 2, 1, '2018-09-16 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (65, 4, '2018-09-17', 'Floor drain ', 11, 'bh', 150000, '2018-08-07', NULL, 2, 1, '2018-09-17 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (66, 4, '2018-09-18', 'Zink (2lubang 1 sayap)', 1, 'bh', 1000000, '2018-08-07', NULL, 2, 1, '2018-09-18 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (67, 4, '2018-09-19', 'Kran Zink', 1, 'bh', 1000000, '2018-08-07', NULL, 2, 1, '2018-09-19 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (68, 4, '2018-09-20', 'Instalasi Air Kotor dan Bekas', 1, 'ls', 15000000, '2018-08-07', NULL, 2, 1, '2018-09-20 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (69, 4, '2018-09-21', 'Instalasi Air Bersih', 1, 'ls', 12500000, '2018-08-07', NULL, 2, 1, '2018-09-21 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (70, 4, '2018-09-22', 'Jet Washer', 10, 'bh', 500000, '2018-08-07', NULL, 2, 1, '2018-09-22 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (71, 4, '2018-09-23', 'Kran Shower', 10, 'bh', 1000000, '2018-08-07', NULL, 2, 1, '2018-09-23 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (72, 4, '2018-09-24', 'Instalasi Air Panas', 10, 'ttk', 750000, '2018-08-07', NULL, 2, 1, '2018-09-24 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (73, 4, '2018-09-25', 'Roof Drain', 8, 'ttk', 750000, '2018-08-07', NULL, 2, 1, '2018-09-25 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (74, 4, '2018-09-26', 'Cat Dinding Interior ', 716, 'm2', 35000, '2018-08-07', NULL, 2, 1, '2018-09-26 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (75, 4, '2018-09-27', 'Cat Dinding Exterior ', 385, 'm2', 40000, '2018-08-07', NULL, 2, 1, '2018-09-27 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (76, 4, '2018-09-28', 'Cat Plafond', 151, 'm2', 37500, '2018-08-07', NULL, 2, 1, '2018-09-28 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (77, 4, '2018-09-29', 'Railing Tangga', 9, 'm2', 850000, '2018-08-07', NULL, 2, 1, '2018-09-29 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (78, 4, '2018-09-30', 'Pembersihan Proyek', 10, 'rit', 500000, '2018-08-07', NULL, 2, 1, '2018-09-30 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (79, 4, '2018-10-01', 'Instalasi Freon AC', 10, 'set', 500000, '2018-08-07', NULL, 2, 1, '2018-10-01 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (80, 4, '2018-10-02', 'Lampu LED/PIC', 35, 'set', 75000, '2018-08-07', NULL, 2, 1, '2018-10-02 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (81, 4, '2018-10-03', 'Waterproofing', 66, 'm2', 90000, '2018-08-07', NULL, 2, 1, '2018-10-03 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (82, 4, '2018-10-04', 'Plur Setelah Waterproof', 66, 'm2', 35000, '2018-08-07', NULL, 2, 1, '2018-10-04 00:00:00', NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (83, 4, '2018-10-05', 'Listrik Kerja', 2, 'bln', 500000, '2018-08-07', NULL, 2, 1, '2018-10-05 00:00:00', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for proyek
-- ----------------------------
DROP TABLE IF EXISTS `proyek`;
CREATE TABLE `proyek`  (
  `id_proyek` int(11) NOT NULL AUTO_INCREMENT,
  `id_ppu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_proyek` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmt` date NULL DEFAULT NULL,
  `tmt_stop` date NULL DEFAULT NULL,
  `pemilik_proyek` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_proyek`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES (1, '1', 'Morowali', '2018-12-30', '2019-12-30', 'Amelia Theresia');
INSERT INTO `proyek` VALUES (2, '2', 'Rumah Kebagusan', '2019-06-01', '2019-11-30', 'Teguh Aryanto');
INSERT INTO `proyek` VALUES (3, '3', 'Rusun Cakung', '2019-07-31', NULL, 'PEMDA DKI');
INSERT INTO `proyek` VALUES (4, '4', 'Rumah Kos Kelapa Gading', '2018-08-07', NULL, 'IWAN');

-- ----------------------------
-- Table structure for usr_adm
-- ----------------------------
DROP TABLE IF EXISTS `usr_adm`;
CREATE TABLE `usr_adm`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `uname` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'using case sensitive',
  `usr_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hak_akses` int(11) NULL DEFAULT NULL,
  `pict` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usr_adm
-- ----------------------------
INSERT INTO `usr_adm` VALUES (1, 123, 'pri', 'pri@gmail.com', 1, 'assets\\images\\user\\marketing.png');
INSERT INTO `usr_adm` VALUES (2, 123, 'bodo', NULL, 2, 'assets\\images\\user\\marketing.png');
INSERT INTO `usr_adm` VALUES (3, 123, 'agus', NULL, 3, 'assets\\images\\user\\marketing.png');
INSERT INTO `usr_adm` VALUES (4, 123, 'amel', NULL, 4, 'assets\\images\\user\\marketing.png');

SET FOREIGN_KEY_CHECKS = 1;
