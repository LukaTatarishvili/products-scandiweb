/*
 Navicat Premium Data Transfer

 Source Server         : csmp
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : oop-products

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 07/12/2022 12:23:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for product_types
-- ----------------------------
DROP TABLE IF EXISTS `product_types`;
CREATE TABLE `product_types`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_types
-- ----------------------------
INSERT INTO `product_types` VALUES (1, 'dvd');
INSERT INTO `product_types` VALUES (2, 'furniture');
INSERT INTO `product_types` VALUES (3, 'book');

SET FOREIGN_KEY_CHECKS = 1;
