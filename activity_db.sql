/*
 Navicat MySQL Data Transfer

 Source Server         : activity
 Source Server Version : 50710
 Source Host           : localhost
 Source Database       : activity_db

 Target Server Version : 50710
 File Encoding         : utf-8

 Date: 04/01/2016 16:35:50 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `activity_info_table`
-- ----------------------------
DROP TABLE IF EXISTS `activity_info_table`;
CREATE TABLE `activity_info_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `distance` float NOT NULL DEFAULT '0',
  `create_time` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `number_of_person` int(11) DEFAULT NULL,
  `user_icon` varchar(100) NOT NULL,
  `comment` varchar(200) DEFAULT '',
  `activity_time` varchar(50) DEFAULT '',
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `activity_info_table`
-- ----------------------------
BEGIN;
INSERT INTO `activity_info_table` VALUES ('1', '周六下午去打篮球', '1', 'Freeman', '华夏公园', '0.1', '2016-02-23 19:04:13', '1', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.522', '31.2205'), ('2', '晚上去张衡公园跑步', '1', 'Freeman', '张衡公园', '0.5', '2016-02-23 19:04:13', '12', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.522', '31.2155'), ('3', '去医科大学打羽毛球', '1', 'Freeman', '医科大学', '1', '2016-02-23 19:04:13', '3', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.523', '31.5105'), ('4', '去医科大学打网球', '1', 'Freeman', '医科大学', '0.6', '2016-02-16 19:04:13', '4', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.512', '32.2105'), ('5', '交通大学打乒乓球', '1', 'Freeman', '交通大学', '3', '2016-02-15 19:04:13', '5', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.522', '31.2107'), ('6', '华夏路打桌球', '1', 'Freeman', '华夏路', '2', '2016-02-12 19:04:13', '12', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.532', '31.2105'), ('7', '骑车去崇明岛', '1', 'Freeman', '崇明岛', '1.2', '2016-02-08 19:04:13', '8', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', '121.523', '31.2104'), ('8', '去爬佘山', '1', 'Freeman', '佘山', '3.5', '2016-02-19 19:04:13', '7', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('9', '去药谷游泳池游泳', '1', 'Freeman', '药谷', '0.8', '2016-02-06 19:04:13', '6', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('10', '去KTV唱歌', '1', 'Freeman', '张江高科地铁站', '2', '2016-02-28 19:04:13', '9', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('11', 'AA制一起吃火锅', '1', 'Freeman', '长泰广场', '0.5', '2016-03-11 19:04:13', '10', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('12', '周六下午去打篮球', '1', 'Freeman', '华夏公园', '1.4', '2016-02-26 19:04:13', '1', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('13', '晚上去张衡公园跑步', '1', 'Freeman', '张衡公园', '0.8', '2016-02-26 19:04:13', '2', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('14', '去医科大学打羽毛球', '1', 'Freeman', '医科大学', '1.3', '2016-03-17 19:04:13', '3', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('15', '去医科大学打网球', '1', 'Freeman', '医科大学', '0.9', '2016-02-19 19:04:13', '4', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('16', '交通大学打乒乓球', '1', 'Freeman', '交通大学', '2.7', '2016-03-18 19:04:13', '5', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('17', '华夏路打桌球', '1', 'Freeman', '华夏路', '1.5', '2016-03-18 19:04:13', '12', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('18', '骑车去崇明岛', '1', 'Freeman', '崇明岛', '1.3', '2016-02-15 19:04:13', '8', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('19', '去爬佘山', '1', 'Freeman', '佘山', '4.8', '2016-02-19 19:04:13', '7', '1', '10', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('20', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '1456517285', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('21', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '1456517285', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('22', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '1456517285', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('23', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '2016-02-26 20:08:05', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('24', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '2016-03-03 06:Mar', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('25', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '2016-03-03 06:Mar', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('26', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '2016-03-03 06:17', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('27', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '1456985940', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('28', '去共青公园烧烤', '1', 'Freeman', '共青公园', '1.5', '1456986120', '11', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('29', '晚上去打羽毛球', '1', 'Freeman', '浦东游泳馆', '1.5', '1456986180', '3', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('30', '晚上去打羽毛球', '1', 'Freeman', '浦东游泳馆', '1.5', '1456986180', '3', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('31', '晚上去打羽毛球', '1', 'Freeman', '浦东游泳馆', '1.5', '1456986300', '3', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('32', '晚上去打羽毛球', '1', 'Freeman', '浦东游泳馆', '1.5', '1456986360', '3', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('33', '晚上打篮球', '1', 'Freeman', '浦东游泳馆', '1.5', '1456986660', '1', '1', '8', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('34', '米哦宋', '1', 'Freeman', '我现在', '1.5', '1456990200', '12', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('35', '测试', '1', 'Freeman', '测试', '1.5', '1457515560', '12', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('36', '测试2', '1', 'Freeman', '测试2', '1.5', '1457517900', '12', '1', '5', 'http://7xrqzm.com1.z0.glb.clouddn.com/FFB18203-DB21-4139-B2A3-CDE84747C58E.png', '', '', null, null), ('37', '测试活动3', '4', 'player_99110914', '上海', '1.5', '1457518080', '12', '1', '5', '', '', '', null, null), ('38', '晚上打羽毛球', '4', 'player_99110914', '浦东游泳馆', '1.5', '1458185340', '2', '1', null, 'http://7xrqzm.com1.z0.glb.clouddn.com/icon_20160315173836', '公司集合', '晚上7点', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `activity_type_table`
-- ----------------------------
DROP TABLE IF EXISTS `activity_type_table`;
CREATE TABLE `activity_type_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(100) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `activity_type_table`
-- ----------------------------
BEGIN;
INSERT INTO `activity_type_table` VALUES ('1', 'http://7xrqzm.com1.z0.glb.clouddn.com/Basketball_129.57538461538px_1183193_easyicon.net.png', '篮球'), ('2', 'http://7xrqzm.com1.z0.glb.clouddn.com/football_128px_1187334_easyicon.net.png', '足球'), ('3', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_poi_details.png', '羽毛球'), ('4', 'http://7xrqzm.com1.z0.glb.clouddn.com/Tennis_Ball_129.78086956522px_1183261_easyicon.net.png', '网球'), ('5', 'http://7xrqzm.com1.z0.glb.clouddn.com/Table_tennis_128px_1185974_easyicon.net.png', '乒乓球'), ('6', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_seller_icon_order.png', '游泳'), ('7', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_seller_icon_message.png', '爬山'), ('8', 'http://7xrqzm.com1.z0.glb.clouddn.com/bike_72px_1180471_easyicon.net.png', '骑车'), ('9', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_poi_details.png', 'KTV'), ('10', 'http://7xrqzm.com1.z0.glb.clouddn.com/Leona_Pool_Party_Unoff_128px_1184085_easyicon.net.png', '火锅'), ('11', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_seller_icon_order.png', '野炊'), ('12', 'http://7xrqzm.com1.z0.glb.clouddn.com/message_poi_details.png', '其他');
COMMIT;

-- ----------------------------
--  Table structure for `code_table`
-- ----------------------------
DROP TABLE IF EXISTS `code_table`;
CREATE TABLE `code_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel_number` varchar(20) NOT NULL,
  `code` varchar(6) NOT NULL,
  `insert_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `code_table`
-- ----------------------------
BEGIN;
INSERT INTO `code_table` VALUES ('1', '18516295124', '654321', ''), ('2', '18721559062', '123', ''), ('3', '18516295124', '623500', '1457488980'), ('4', '18516295124', '106442', '2016-03-09 10:06'), ('5', '18516295124', '497138', '2016-03-09 10:06:49'), ('6', '18516295124', '146174', '2016-03-09 10:24:39'), ('7', '18516295124', '339142', '2016-03-09 11:44:28'), ('8', '18516295124', '867798', '2016-03-09 12:48:19'), ('9', '18516295124', '571525', '2016-03-09 13:38:55'), ('10', '18516295124', '968490', '2016-03-09 13:46:55'), ('11', '18516295124', '627148', '2016-03-09 14:11:34'), ('12', '18553003370', '257214', '2016-03-09 14:12:24'), ('13', '18516295124', '062010', '2016-03-09 14:36:39'), ('14', '18516295124', '823661', '2016-03-09 14:40:33'), ('15', '18516295124', '588445', '2016-03-09 14:47:16'), ('16', '18516295124', '181755', '2016-03-09 14:48:49'), ('17', '18516295124', '689196', '2016-03-09 14:55:31'), ('18', '18516295124', '941017', '2016-03-09 14:57:54'), ('19', '18516295124', '732446', '2016-03-09 19:02:20'), ('20', '18516295124', '751471', '2016-03-18 14:55:10'), ('21', '18516295124', '067830', '2016-03-18 15:12:23'), ('22', '18516295124', '930269', '2016-03-18 15:19:24'), ('23', '18516295124', '736443', '2016-03-18 15:22:09'), ('24', '18516295124', '456030', '2016-03-18 15:28:03'), ('25', '18516295124', '974795', '2016-03-18 15:34:18'), ('26', '18516295124', '279172', '2016-03-18 15:40:13'), ('27', '18516295124', '159014', '2016-03-29 15:38:09');
COMMIT;

-- ----------------------------
--  Table structure for `position_info_table`
-- ----------------------------
DROP TABLE IF EXISTS `position_info_table`;
CREATE TABLE `position_info_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `longitude` float NOT NULL DEFAULT '0',
  `latitude` float NOT NULL DEFAULT '0',
  `location_time` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `suggestion_table`
-- ----------------------------
DROP TABLE IF EXISTS `suggestion_table`;
CREATE TABLE `suggestion_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel_number` varchar(20) DEFAULT NULL,
  `content` varchar(400) NOT NULL,
  `time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `suggestion_table`
-- ----------------------------
BEGIN;
INSERT INTO `suggestion_table` VALUES ('1', null, '你好', '2016-02-29 09:Feb:11'), ('2', null, '你好', '2016-02-29 09:Feb:04'), ('3', null, '你好', '2016-02-29 17:52:30'), ('4', null, '你好', '2016-02-29 17:52:30'), ('5', null, '你好', '2016-02-29 17:52:30'), ('6', null, '啤酒，计算机软件', '2016-02-29 17:52:30'), ('7', null, '糊涂', '2016-02-29 17:52:30'), ('8', null, '糊涂', '2016-02-29 17:52:30'), ('9', null, '         ', '2016-02-29 17:52:30'), ('10', null, '通用', '2016-02-29 17:52:30'), ('11', null, '可以提意见了', '2016-02-29 17:52:30'), ('12', null, '真的可以提意见', '2016-02-29 17:52:30');
COMMIT;

-- ----------------------------
--  Table structure for `user_info_table`
-- ----------------------------
DROP TABLE IF EXISTS `user_info_table`;
CREATE TABLE `user_info_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick_name` varchar(40) NOT NULL,
  `tel_number` varchar(20) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `create_time` varchar(20) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `has_passwd` tinyint(1) NOT NULL DEFAULT '0',
  `small_icon` varchar(100) DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `distance` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tel_number` (`tel_number`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_info_table`
-- ----------------------------
BEGIN;
INSERT INTO `user_info_table` VALUES ('1', 'Freeman', '18516295124', '0', '人生就是一场旅行。', '456', '2016-02-23 18:58:21', 'http://7xrqzm.com1.z0.glb.clouddn.com/icon_20160316195404', '1', null, '121.522', '31.2205', null), ('2', '38562252', '18721559062', null, '撒大量分解落实简单分解撒娇的弗拉索夫第九十九理发店极乐世界', '456', null, null, '0', null, '121.522', '31.2155', null), ('3', 'player_71512971', '15823795915', null, null, '123', null, null, '0', null, '121.523', '31.5105', null), ('4', 'player_99110914', '18553003370', '0', '', '147', '2016-03-09 14:15:44', 'http://7xrqzm.com1.z0.glb.clouddn.com/icon_20160315173836', '1', null, '121.512', '32.2105', null);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
