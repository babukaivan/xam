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

 Date: 09/05/2014 11:05:24 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bidimages`
-- ----------------------------
BEGIN;
INSERT INTO `bidimages` VALUES ('29', '36', '/uploads/bids/23/big_54081e7a7b2c33-d картинка №9.jpg', '/uploads/bids/23/mini_54081e7a7b2c33-d картинка №9.jpg', '23'), ('30', '36', '/uploads/bids/23/big_54081e7b10a23Amber-Heard-Face-Actress.jpg', '/uploads/bids/23/mini_54081e7b10a23Amber-Heard-Face-Actress.jpg', '23'), ('31', '36', '/uploads/bids/23/big_54081e7ba9667123.png', '/uploads/bids/23/mini_54081e7ba9667123.png', '23'), ('32', '36', '/uploads/bids/23/big_54081e7bdf5d629.jpeg', '/uploads/bids/23/mini_54081e7bdf5d629.jpeg', '23'), ('33', '36', '/uploads/bids/23/big_54081e7c20aaa389437.jpg', '/uploads/bids/23/mini_54081e7c20aaa389437.jpg', '23'), ('34', '37', '/uploads/bids/23/big_54081f4e282eb6.png', '/uploads/bids/23/mini_54081f4e282eb6.png', '23'), ('35', '37', '/uploads/bids/23/big_54081f4e59afa3-d картинка №9.jpg', '/uploads/bids/23/mini_54081f4e59afa3-d картинка №9.jpg', '23'), ('36', '38', '/uploads/bids/23/big_54087adb26521d44ba6443bb5d610ff19a65557b0.jpg', '/uploads/bids/23/mini_54087adb26521d44ba6443bb5d610ff19a65557b0.jpg', '23'), ('37', '39', '/uploads/bids/23/big_54096d834c5266.png', '/uploads/bids/23/mini_54096d834c5266.png', '23');
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `bids`
-- ----------------------------
BEGIN;
INSERT INTO `bids` VALUES ('36', 'parking', '666', 'Гемба, Межгорский район, Закарпатская область, Украина', '', '', '2014-08-31 12:00:00', ' Порушення', '1', '2014-09-04 11:10:34', '2014-09-04 11:10:34'), ('37', 'parking', '1783 ІК', 'East London, London, ON, Canada', '', '', '2014-09-02 12:00:00', ' New', '1', '2014-09-04 11:14:06', '2014-09-04 11:14:06'), ('38', 'parking', 'mnbmb', 'Россия, город Москва, Москва, Проспект Мира', '', '', '2014-09-03 14:00:00', ' вфівфів', '1', '2014-09-04 17:44:43', '2014-09-04 17:44:43'), ('39', 'parking', 'dsdas', 'XJ61, Changde, Hunan, China', '', '', '2014-09-05 11:00:00', ' dsadada', '1', '2014-09-05 11:00:03', '2014-09-05 11:00:03');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `parent_comment_id` int(12) DEFAULT '0',
  `message` text,
  `user_id` int(12) DEFAULT NULL,
  `topic_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `bids` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('1', '0', 'sdsas', '1', '37', '2014-09-04 16:26:25'), ('2', '0', 'qqqq', '1', '37', '2014-09-04 16:27:08'), ('3', '2', 'rrr', '1', '37', '2014-09-04 16:30:57'), ('4', '3', 'eeeeeeeee312312312', null, '37', '2014-09-04 17:19:34'), ('5', '0', 'wwqeweqw', '23', '37', '2014-09-04 17:34:41'), ('6', '0', 'kyky', '23', '37', '2014-09-04 17:35:14'), ('7', '0', 'xax', '23', '37', '2014-09-04 17:37:26'), ('8', '0', '123', '23', '37', '2014-09-04 17:38:09'), ('9', '0', 'f[q\nssad', '23', '36', '2014-09-04 17:42:40'), ('10', '0', 'dsdads', '23', '36', '2014-09-04 17:42:46'), ('11', '0', 'От єблан )', '23', '38', '2014-09-04 17:45:15'), ('12', '0', 'хаха', '23', '38', '2014-09-04 17:45:26'), ('13', '0', 'dsda', '23', '39', '2014-09-05 11:00:49');
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

