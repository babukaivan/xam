/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50614
 Source Host           : localhost
 Source Database       : xam

 Target Server Type    : MySQL
 Target Server Version : 50614
 File Encoding         : utf-8

 Date: 09/03/2014 09:22:34 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `bidimages`
-- ----------------------------
DROP TABLE IF EXISTS `bidimages`;
CREATE TABLE `bidimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_small` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bid_id` (`bid_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bidimages_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `bids` (`id`),
  CONSTRAINT `bidimages_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bidimages`
-- ----------------------------
BEGIN;
INSERT INTO `bidimages` VALUES ('16', '30', '/uploads/bids/23/big_5405d5a8f1c8f6.png', '/uploads/bids/23/mini_5405d5a8f1c8f6.png', '23'), ('17', '30', '/uploads/bids/23/big_5405d5a925b0e29.jpeg', '/uploads/bids/23/mini_5405d5a925b0e29.jpeg', '23'), ('18', '30', '/uploads/bids/23/big_5405d5a98993e123.png', '/uploads/bids/23/mini_5405d5a98993e123.png', '23'), ('19', '31', '/uploads/bids/23/big_5406b1bdd4aaf6.png', '/uploads/bids/23/mini_5406b1bdd4aaf6.png', '23'), ('20', '31', '/uploads/bids/23/big_5406b1be127d0123.png', '/uploads/bids/23/mini_5406b1be127d0123.png', '23'), ('21', '32', '/uploads/bids/23/big_5406b36e9edcf6.png', '/uploads/bids/23/mini_5406b36e9edcf6.png', '23'), ('22', '32', '/uploads/bids/23/big_5406b36eb52f23-d картинка №9.jpg', '/uploads/bids/23/mini_5406b36eb52f23-d картинка №9.jpg', '23'), ('23', '32', '/uploads/bids/23/big_5406b36f090b2123.png', '/uploads/bids/23/mini_5406b36f090b2123.png', '23'), ('24', '32', '/uploads/bids/23/big_5406b36f23f826.png', '/uploads/bids/23/mini_5406b36f23f826.png', '23');
COMMIT;

-- ----------------------------
--  Table structure for `bids`
-- ----------------------------
DROP TABLE IF EXISTS `bids`;
CREATE TABLE `bids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `avto_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bids`
-- ----------------------------
BEGIN;
INSERT INTO `bids` VALUES ('30', 'parking', 'вфівіфвф', 'Чоп, Закарпатская область, Украина', '', '', '2014-09-02 19:00:00', ' віфвфівіфвфівфів', '0', '2014-09-02 17:35:20', '2014-09-02 17:35:20'), ('31', 'parking', 'cfsdfsdfsdf', 'Чоп, Закарпатская область, Украина', '48.43615896579959', '22.193284034729004', '2014-07-09 12:00:00', ' ваіівававіавіавіавіавіаів', '0', '2014-09-03 09:14:21', '2014-09-03 09:14:21'), ('32', 'parking', '32242424', 'вул. Крупської, Харьков, Харьковская область, Украина', '', '', '2014-09-03 11:00:00', ' віфвфів', '0', '2014-09-03 09:21:34', '2014-09-03 09:21:34');
COMMIT;

-- ----------------------------
--  Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `role`
-- ----------------------------
BEGIN;
INSERT INTO `role` VALUES ('1', 'admin'), ('2', 'user');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `fb_id` varchar(255) DEFAULT NULL,
  `fb_accesstoken` varchar(255) DEFAULT NULL,
  `tw_id` varchar(255) DEFAULT NULL,
  `user_type` enum('simple','fb','tw') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'admin@admin.com', 'admin', '31c13d5c7b539ad3d79aae6a2c1123a9:71220246853e49fa24dfd6', '2014-08-08 13:00:02', '2014-08-08 13:00:02', '', '', '', 'simple'), ('5', '1babuka1990@mail.ru', '1babuka1990@mail.ru', 'a5b83a8e38e5cfcffcc27b5efaae212b:121304418854045b5114a70', '2014-09-01 14:41:05', '0000-00-00 00:00:00', '', '', '', 'simple'), ('12', 'adssmin@admin.com', 'adssmin@admin.com', '17e7581cb2a68939b1b2e5f8e12566e7:1922849073540489b512a6e', '2014-09-01 17:59:01', '0000-00-00 00:00:00', null, null, null, 'simple'), ('19', 'ddasda@mdsada.dsa', 'ddasda@mdsada.dsa', '5337f53e211d75f197f5e244969be1b4:57338672954049339609d8', '2014-09-01 18:39:37', '0000-00-00 00:00:00', null, null, null, 'simple'), ('22', 'babuka1990@mail.ru', 'Алкаш', null, '2014-09-02 09:32:32', '2014-09-02 09:32:32', '367543713394107', 'CAALbaCcgzmwBABXGemrBsTA6xBEIsYqUVx6DxfdoNRGpvi2JE2j3WUhWR1zF12jZB9szJRoUp2fZCOOk6V8C4XRDLDrdeKiAlaraWFRjAZAh43E3UBJDpPPBPWB6wHyQCy5GU6hkCDDbCIgpZApfHKXs54Rsd3nXeBl4uckuSB7j2LVvb9jB0pcDhkAb9P0cV6rdDfWQisqPyL9UOqjP', null, 'fb'), ('23', 'babuka1990', 'babuka1990', '2ecffc54039611b8b5a78e41b77fe3c5:19664941155405703b1a2e6', '2014-09-02 10:22:35', '0000-00-00 00:00:00', null, null, '1258985161', 'tw');
COMMIT;

-- ----------------------------
--  Table structure for `users_roles`
-- ----------------------------
DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users_roles`
-- ----------------------------
BEGIN;
INSERT INTO `users_roles` VALUES ('1', '1', '1'), ('2', '4', '1'), ('3', '5', '1'), ('4', '8', '2'), ('5', '9', '2'), ('6', '10', '2'), ('7', '11', '2'), ('8', '12', '2'), ('9', '13', '2'), ('10', '13', '2'), ('11', '14', '2'), ('12', '16', '2'), ('13', '17', '2'), ('14', '18', '2'), ('15', '19', '2'), ('16', '20', '2'), ('17', '21', '2'), ('18', '22', '2'), ('19', '20', '2'), ('20', '21', '2'), ('21', '22', '2'), ('22', '23', '2');
COMMIT;

