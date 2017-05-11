/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : zf1app_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-11 08:06:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `notes` text,
  `files` varchar(255) DEFAULT NULL,
  `priority` tinyint(1) DEFAULT NULL COMMENT '1-Low\r\n2-Normal\r\n3-High\r\n4-Emergency',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('17', 'lorem impsum 121', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '1', '2017-05-11 07:56:23', '2017-05-09 14:09:08');
INSERT INTO `tickets` VALUES ('18', 'lorem impsum 1', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '2', '2017-05-11 07:55:47', '2015-02-06 00:00:00');
INSERT INTO `tickets` VALUES ('19', 'lorem impsum 1', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '3', '2017-05-11 07:55:47', '2015-02-06 00:00:00');
INSERT INTO `tickets` VALUES ('20', 'lorem impsum 2', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '2', '2017-05-11 07:56:17', '2015-01-30 00:00:00');
INSERT INTO `tickets` VALUES ('21', 'lorem impsum 3', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '1', '2017-05-11 07:56:15', '2015-01-30 00:00:00');
INSERT INTO `tickets` VALUES ('22', 'lorem impsum 4', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '2', '2017-05-11 07:56:13', '2015-01-30 00:00:00');
INSERT INTO `tickets` VALUES ('23', 'lorem impsum 5', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '3', '2017-05-11 07:56:10', '2015-02-13 00:00:00');
INSERT INTO `tickets` VALUES ('28', 'lorem impsum 6', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '3', '2017-05-11 07:56:05', '2013-02-09 00:00:00');
INSERT INTO `tickets` VALUES ('29', 'lorem impsum 7', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '2', '2017-05-11 07:56:03', '2015-03-27 00:00:00');
INSERT INTO `tickets` VALUES ('30', 'lorem impsum 8', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', null, '1', '2017-05-11 07:56:00', '2015-04-30 00:00:00');
INSERT INTO `tickets` VALUES ('126', 'lorem impsum 9', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', 'avatar92 (1).jpg', '3', '2017-05-11 07:55:58', '2017-05-09 17:23:36');
INSERT INTO `tickets` VALUES ('127', 'lorem impsum 10', 'Iners lacusque securae rudis fidem undas capacius surgere! Norant nuper mundi. Hominum distinxit litora bene pinus. Spisso lege radiis alta fixo persidaque regio. Fulminibus sunt circumdare. Mundo animal oppida. Erat: tegit. Adsiduis inter nulli arce natus concordi. Pace freta corpore mea litora deus.', 'avatar92.jpg', '1', '2017-05-11 07:55:55', '2017-05-10 17:32:25');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'member',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '2007-02-14 00:00:00', '2007-02-14 00:00:00', 'selman', '12345', 'admin', 'selman', 'tunc');
