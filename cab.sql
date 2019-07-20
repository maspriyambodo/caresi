/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100140
 Source Host           : localhost:3306
 Source Schema         : cab

 Target Server Type    : MySQL
 Target Server Version : 100140
 File Encoding         : 65001

 Date: 13/07/2019 06:51:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dokumen_pendukung
-- ----------------------------
DROP TABLE IF EXISTS `dokumen_pendukung`;
CREATE TABLE `dokumen_pendukung`  (
  `id_ppu` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `path` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ppu
-- ----------------------------
INSERT INTO `ppu` VALUES (1, 1, '2019-06-24', 'PASIR', 1, 'm³', 170000, '2019-06-26', 'TB TBAN', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (2, 1, '2019-06-24', 'BATA', 1000, 'Buah', 2000, '2019-06-26', 'TB TBAN', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (3, 1, '2019-06-24', 'BATU KERIKIL', 1, 'Truk', 180000, '2019-06-26', 'TB TBAN', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (4, 2, '2019-06-27', 'Babat Semak + Rumput', 3725, 'm²', 2500, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (5, 2, '2019-06-27', 'paku', 1, 'lot', 11000000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (6, 2, '2019-06-27', 'batu', 1, 'lot', 7500000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (7, 2, '2019-06-27', 'Listrik Kerja', 2, 'bln', 1000000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (8, 2, '2019-06-27', 'Bouwplank dan Pengukuran', 3725, 'm²', 2500, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (9, 2, '2019-06-27', 'Mobilisasi Tenaga Kerja + Alat', 1, 'Is', 3500000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (10, 2, '2019-06-27', 'Keamanan', 2, 'bln', 2000000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (11, 2, '2019-06-27', 'Pagar Seng Proyek', 140, 'm²', 80000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (12, 2, '2019-06-27', 'Leveling', 3725, 'm²', 10000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (13, 2, '2019-06-27', 'Galian Tanah Saluran Dalam Kompleks', 117, 'm³', 128280, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (14, 2, '2019-06-27', 'Urugan Pasir 10 cm dibawah U Ditch', 20, 'm³', 385088, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (15, 2, '2019-06-27', 'U-Ditch + tutup', 310, 'm¹', 550000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (16, 2, '2019-06-27', 'Urugan \'Tanah samping U-Ditch', 1, 'Is', 2500000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (17, 2, '2019-06-27', 'Pemadatan Badan Jalan', 1105, 'm²', 8500, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (18, 2, '2019-06-27', 'Makadam 7/5 t = 10 cm', 1105, 'm²', 46000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (19, 2, '2019-06-27', 'Makadam 3/5 t =7 cm', 1105, 'm²', 34500, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (20, 2, '2019-06-27', 'Batu Split 2/3 + pemadatan + cor aspal 5 cm', 1105, 'm²', 69000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (21, 2, '2019-06-27', 'Hotmix t = 3', 1105, 'm²', 126500, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `ppu` VALUES (22, 2, '2019-06-27', 'Kansten Taman 40 x 20 x 10', 116, 'm¹', 145000, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of proyek
-- ----------------------------
INSERT INTO `proyek` VALUES (1, '1', 'Morowali', '2018-12-30', '2019-12-30', 'Amelia Theresia');
INSERT INTO `proyek` VALUES (2, '2', 'Rumah Kebagusan', '2019-06-01', '2019-11-30', 'Teguh Aryanto');

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
