
/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : 2003

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2020-07-17 19:54:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `u_id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(12) NOT NULL,
  `pwd` varchar(12) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `user` (`user`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userinfo
-- ----------------------------
INSERT INTO `userinfo` VALUES ('1', 'a123123', '123123', '17386141517', '1272071495@qq.com');
INSERT INTO `userinfo` VALUES ('2', 'b123123', '123123', '17386141516', '1272071496@qq.com');
INSERT INTO `userinfo` VALUES ('3', 'c123123', '123123', '15935728643', '127@qq.com');
INSERT INTO `userinfo` VALUES ('4', 'd123123', '123123', '17386141518', '123123123@qq.com');
INSERT INTO `userinfo` VALUES ('5', 'asdasd', '123123', '17386141555', '127201@qq.com');
INSERT INTO `userinfo` VALUES ('6', '', '', '', '');
INSERT INTO `userinfo` VALUES ('7', 'asdasd123', 'zxczxc123', '17386141556', '127202@qq.com');
INSERT INTO `userinfo` VALUES ('8', 'sdfsdf', '123123', '17386141511', '1272071433123@qq.com');
INSERT INTO `userinfo` VALUES ('9', 'a123321', '123123', '13995719825', '15761561@qq.com');
INSERT INTO `userinfo` VALUES ('10', 'sunzhonglai', 'a123456', '15272009972', '1651594521@qq.com');
INSERT INTO `userinfo` VALUES ('11', 'a00001', '000001', '15927275077', 'a13650484@163.com');
INSERT INTO `userinfo` VALUES ('12', 'ass121212121', '1231232121', '13432322323', '3232323@qq.com');
INSERT INTO `userinfo` VALUES ('13', 'guoxin52634', 'dhha254212', '15245215263', 'dhahgdhad@adad.cn');
INSERT INTO `userinfo` VALUES ('14', 'n123456', '123123', '15927129954', '2218592924@qq.com');
INSERT INTO `userinfo` VALUES ('15', 'c123123123', '123123123', '15271910074', '810755188@qq.com');
INSERT INTO `userinfo` VALUES ('16', 'ssssss', '123123', '13343434343', '1873648976@qq.com');
INSERT INTO `userinfo` VALUES ('17', 'a00002', '000001', '15927275071', 'a13650481@163.com');
INSERT INTO `userinfo` VALUES ('18', 'shizey1234', '1234567', '15623008208', '192168503@qq.com');
INSERT INTO `userinfo` VALUES ('19', 'xiaochaochao', '888888', '15825025025', 'chaogou@qq.com');
INSERT INTO `userinfo` VALUES ('20', 's1231414', 'a3268549', '18966356254', '13237@gg.com');
INSERT INTO `userinfo` VALUES ('21', 'a00003', '000001', '15927275073', 'a13650483@163.com');
INSERT INTO `userinfo` VALUES ('22', 'a988888', '8888888', '13999999999', '8822128@qq.com');
INSERT INTO `userinfo` VALUES ('23', 'a00004', '000001', '15927275074', 'a13650485@163.com');
INSERT INTO `userinfo` VALUES ('24', 'a00005', '000001', '15927275075', 'a13650486@163.com');
INSERT INTO `userinfo` VALUES ('25', 'a00006', '000001', '15927275076', 'a13650487@163.com');
INSERT INTO `userinfo` VALUES ('26', 'w12345', '234234', '15255549965', '1474525135@qq.com');
INSERT INTO `userinfo` VALUES ('27', 'manguo', 'dhfiod', '17688607679', '26262932@163.com');
INSERT INTO `userinfo` VALUES ('28', 'guoxin', '1231231', '13344333344', '44445555@qq.com');
INSERT INTO `userinfo` VALUES ('29', 'fha451200', 'dad46564512', '15245174587', 'adajhjdak@ada.cn');
INSERT INTO `userinfo` VALUES ('30', 'Tachibana', '12345678', '13111111111', 'tachinaba@163.com');
INSERT INTO `userinfo` VALUES ('31', 'r33333', 'oooooo', '13344545454', '31231@qq.com');
INSERT INTO `userinfo` VALUES ('32', 'royocong1420', 'asas123456', '15021595564', '469304334@qq.com');
INSERT INTO `userinfo` VALUES ('33', 'GayLiGayQi', '12345678', '13111111112', 'GayLiGayQi@163.com');
INSERT INTO `userinfo` VALUES ('34', 'luckyx', '12a52a', '13584725698', '3598745@qq.com');
INSERT INTO `userinfo` VALUES ('35', 'JuLiJuQi', '12345678', '13111111113', 'JuLiJuQi@163.com');
INSERT INTO `userinfo` VALUES ('36', 'qweqweqwe', 'as123456', '13971300000', '41770622@qq.com');
INSERT INTO `userinfo` VALUES ('37', 'qweqweqwdd', 'as1234567', '13971300009', '41770822@qq.com');
INSERT INTO `userinfo` VALUES ('38', 'gjbshishabi', 'FTYshiNT1', '13618675581', '2486958134@qq.com');
INSERT INTO `userinfo` VALUES ('39', 'asasasa', 'ashhus', '13525225125', '152554524@qq.com');
INSERT INTO `userinfo` VALUES ('40', 'cuili1', '213123', '15071946261', '12312@qq.com');
INSERT INTO `userinfo` VALUES ('41', 'xiecong', '1234567', '13547896321', '1234578@qq.com');
INSERT INTO `userinfo` VALUES ('42', 'qwe123', '12312142', '18636865382', '4632559@qq.com');
INSERT INTO `userinfo` VALUES ('43', '阿珍爱上了阿强', '这个后端不行啊', '119', '110');
INSERT INTO `userinfo` VALUES ('44', 'FW6666', '123456', '13435345645', '12323@qq.com');
INSERT INTO `userinfo` VALUES ('45', 'aaaa12333', '123456', '17777777777', '4122222@qq.com');
INSERT INTO `userinfo` VALUES ('46', '匹诺曹', '不是你想的那样', '89757', '我没有邮箱');
INSERT INTO `userinfo` VALUES ('47', '白雪公主', '开始你的表演', '无', '麻烦给小矮人');
INSERT INTO `userinfo` VALUES ('48', 'FFFWWW', '213213', '13435345646', '88888@qq.com');
INSERT INTO `userinfo` VALUES ('49', 'a11111111111', '111111111111', '13111111114', '111111111@qq.com');
