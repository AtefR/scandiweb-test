/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MariaDB
 Source Server Version : 110200 (11.2.0-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : scandiweb

 Target Server Type    : MariaDB
 Target Server Version : 110200 (11.2.0-MariaDB)
 File Encoding         : 65001

 Date: 25/02/2024 01:05:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (12, 'twetwe', 'wetwe', '123', 'disc', '{\\\"size\\\":\\\"wetwe\\\"}');
INSERT INTO `products` VALUES (13, 'tewte', 'twetwe', '0', 'book', '{\\\"weight\\\":\\\"wetwe\\\"}');
INSERT INTO `products` VALUES (17, 'etw', 'twetw', '0', 'disc', '{\\\"size\\\":\\\"\\\"}');
INSERT INTO `products` VALUES (18, 'etwet', 'twetw', '0', 'disc', '{\\\"size\\\":\\\"\\\"}');
INSERT INTO `products` VALUES (19, 'wetwet', 'wetwet', '0', 'disc', '{\\\"size\\\":\\\"\\\"}');
INSERT INTO `products` VALUES (20, 'twet', 'wetwe', '123', 'disc', '{\\\"size\\\":129}');

SET FOREIGN_KEY_CHECKS = 1;
