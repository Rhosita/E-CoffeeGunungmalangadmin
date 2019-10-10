/*
 Navicat Premium Data Transfer

 Source Server         : rhos
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost:3306
 Source Schema         : coffee_gnmalang

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : 65001

 Date: 04/10/2019 15:07:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pengambilan
-- ----------------------------
DROP TABLE IF EXISTS `pengambilan`;
CREATE TABLE `pengambilan`  (
  `id_pengambilan` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `jml_ambil` int(10) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_pengambilan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pengambilan
-- ----------------------------
INSERT INTO `pengambilan` VALUES (5, 9, 900, '2019-06-21');
INSERT INTO `pengambilan` VALUES (6, 9, 900, '2018-06-04');
INSERT INTO `pengambilan` VALUES (7, 9, 9000, '2018-06-04');
INSERT INTO `pengambilan` VALUES (8, 9, 899, '2017-09-04');
INSERT INTO `pengambilan` VALUES (9, 9, 800, '2017-09-04');
INSERT INTO `pengambilan` VALUES (10, 9, 2000, '2019-06-27');
INSERT INTO `pengambilan` VALUES (11, 9, 600, '2019-06-27');

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id_jual` int(10) NOT NULL AUTO_INCREMENT,
  `nama_produk` int(10) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `total` int(10) NOT NULL,
  `id_transaksi` int(32) NOT NULL,
  PRIMARY KEY (`id_jual`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for produk
-- ----------------------------
DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk`  (
  `id_barang` int(10) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `ket` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produk
-- ----------------------------
INSERT INTO `produk` VALUES (9, 'botol', 200, 'yaya', 'quick_count.png');
INSERT INTO `produk` VALUES (14, 'kuku', 123445, 'qwerqwe', 'crop.jpg');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_trs` int(10) NOT NULL AUTO_INCREMENT,
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id` int(10) NOT NULL,
  `nama` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `ttl_produk` int(4) NOT NULL,
  `ttl_harga` int(10) NOT NULL,
  PRIMARY KEY (`id_trs`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES (2, 14, 'kuku', 9, 'yana', '2019-06-21', 90, 11110050);
INSERT INTO `transaksi` VALUES (3, 9, 'botol', 9, 'yana', '2019-06-27', 7, 1400);

-- ----------------------------
-- Table structure for uang
-- ----------------------------
DROP TABLE IF EXISTS `uang`;
CREATE TABLE `uang`  (
  `id` int(10) NOT NULL,
  `uang` int(10) NOT NULL,
  `tgl` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of uang
-- ----------------------------
INSERT INTO `uang` VALUES (9, 1400, '2019-06-27');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(70) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_tlp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'eko', '', '', 'ekofebri', '1234', 1);
INSERT INTO `user` VALUES (5, 'eko', '', '', 'ekofebri2', '12345', 1);
INSERT INTO `user` VALUES (7, 'eko', '', '', 'ekofebri9', '1234', 2);
INSERT INTO `user` VALUES (8, 'asu', '', '', 'asu123', 'asu123', 1);
INSERT INTO `user` VALUES (9, 'yana', '', '', 'yana123', 'yana123', 2);
INSERT INTO `user` VALUES (10, 'titot', 'pinggir jalan', '098765432123', 'titot', 'titot123', 3);

SET FOREIGN_KEY_CHECKS = 1;
