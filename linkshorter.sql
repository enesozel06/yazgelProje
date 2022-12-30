/*
 Navicat Premium Data Transfer

 Source Server         : mypc
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : linkshorter

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 21/12/2022 02:16:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dev_message
-- ----------------------------
DROP TABLE IF EXISTS `dev_message`;
CREATE TABLE `dev_message`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dev_message
-- ----------------------------
INSERT INTO `dev_message` VALUES (2, 'Sonuç olarak yine aynı sistem çalışsa da kullanıcılar artık php dosyalarının adını ya da diğer GET parametresi uzantılarını yazmasına gerek kalmadan temiz ve akılda kalıcı bağlantılarla sitenizde gezebiliyor.', 'denemexxx111', '2022-12-19');
INSERT INTO `dev_message` VALUES (3, 'deneme mesajı 2', 'denemexxx1112', NULL);

-- ----------------------------
-- Table structure for dev_users
-- ----------------------------
DROP TABLE IF EXISTS `dev_users`;
CREATE TABLE `dev_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `utype` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dev_users
-- ----------------------------
INSERT INTO `dev_users` VALUES (1, 'admin', '1', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '0');
INSERT INTO `dev_users` VALUES (2, 'user', 'denem', 'user1', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `dev_users` VALUES (3, 'user2', '1', 'ad', '12323', '1');
INSERT INTO `dev_users` VALUES (4, 'batuhan', 'gunay', 'user12', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- ----------------------------
-- Table structure for url
-- ----------------------------
DROP TABLE IF EXISTS `url`;
CREATE TABLE `url`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `shorten_url` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clicks` int NOT NULL,
  `degismesayi` int NULL DEFAULT NULL,
  `uid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of url
-- ----------------------------
INSERT INTO `url` VALUES (53, 'onemli2', 'denemexxx111', 4, 2, '2');
INSERT INTO `url` VALUES (54, 'aaa', 'denemexxx111', 1, 1, '3');

SET FOREIGN_KEY_CHECKS = 1;
