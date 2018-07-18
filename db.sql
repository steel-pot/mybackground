# Host: localhost  (Version: 5.5.53)
# Date: 2018-07-18 14:21:40
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin_login_log"
#

DROP TABLE IF EXISTS `admin_login_log`;
CREATE TABLE `admin_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `result` varchar(50) DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

#
# Data for table "admin_login_log"
#


#
# Structure for table "admin_user"
#

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  `lastip` varchar(20) DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(11) DEFAULT '0' COMMENT '0正常 1禁用',
  `err` int(11) DEFAULT '0' COMMENT '错误次数',
  `token` varchar(32) DEFAULT NULL,
  `tokenexpire` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "admin_user"
#

INSERT INTO `admin_user` VALUES (2,'admin','14e1b600b1fd579f47433b88e8d85291','admin',NULL,NULL,'2018-07-17 16:31:54',0,0,'fcbc9dc813d87508e434a3d5b6169758','2018-07-25 14:13:07');

#
# Structure for table "background"
#

DROP TABLE IF EXISTS `background`;
CREATE TABLE `background` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '`background`',
  `password` varchar(255) DEFAULT NULL COMMENT '后台密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "background"
#

/*!40000 ALTER TABLE `background` DISABLE KEYS */;
INSERT INTO `background` VALUES (1,'admin123','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `background` ENABLE KEYS */;

#
# Structure for table "sq_list"
#

DROP TABLE IF EXISTS `sq_list`;
CREATE TABLE `sq_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `deposit` varchar(255) DEFAULT NULL COMMENT '存款',
  `state` int(11) DEFAULT '0' COMMENT '0未处理 1已成功 2已拒绝',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "sq_list"
#


#
# Structure for table "sq_vcode"
#

DROP TABLE IF EXISTS `sq_vcode`;
CREATE TABLE `sq_vcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(20) DEFAULT NULL,
  `vcode` varchar(6) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "sq_vcode"
#


#
# Structure for table "web_config"
#

DROP TABLE IF EXISTS `web_config`;
CREATE TABLE `web_config` (
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '配置名',
  `value` varchar(2048) DEFAULT NULL COMMENT '内容',
  `title` varchar(255) DEFAULT NULL COMMENT '描述',
  `type` int(11) DEFAULT '0' COMMENT '0短  1长',
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='聊天服务器配置';

#
# Data for table "web_config"
#

INSERT INTO `web_config` VALUES ('incid','1','短信接口   0 1 2 3',0),('vcode_msg','尊敬的用户您好，您的验证码：$vcode【威尼斯】','验证码短信,验证码用$vcode代替',0);
