/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.40 : Database - bbs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bbs` /*!40100 DEFAULT CHARACTER SET gbk */;

USE `bbs`;

/*Table structure for table `forum_reply` */

DROP TABLE IF EXISTS `forum_reply`;

CREATE TABLE `forum_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL DEFAULT '0',
  `reply_id` int(10) NOT NULL DEFAULT '0',
  `reply_name` varchar(32) CHARACTER SET gbk NOT NULL,
  `reply_email` varchar(100) CHARACTER SET gbk NOT NULL,
  `reply_detail` text CHARACTER SET gbk NOT NULL,
  `reply_datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `a_id` (`reply_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

/*Data for the table `forum_reply` */

insert  into `forum_reply`(`id`,`topic_id`,`reply_id`,`reply_name`,`reply_email`,`reply_detail`,`reply_datetime`) values (49,32,7,'momeakl','123245@163.com','发现bug一枚，评论消息超过四条时，第五条开始跑到第一条的位置','2015-05-30 20:13:00'),(48,32,6,'momeakl','123245@163.com','     首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟首行缩进哟','2015-05-30 20:11:57'),(43,32,1,'admin','','声の行\r\n那朵花\r\n花の语\r\n','2015-05-20 20:29:05'),(44,32,2,'momeakl','123245@163.com','海贼王\r\n东京喰种\r\n火影忍者','2015-05-30 20:09:58'),(45,32,3,'momeakl','123245@163.com','海派甜心\r\n的啦的啦的啦的啦','2015-05-30 20:10:34'),(46,32,4,'momeakl','123245@163.com','你好啊，你好啊你好啊，你好啊，你好啊，你好啊','2015-05-30 20:10:56'),(47,32,5,'momeakl','123245@163.com','呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈呼呼呼，哈哈哈哈','2015-05-30 20:11:19'),(41,31,2,'he-will','erad@dd.con','大大大大','2015-05-20 15:33:16'),(42,31,3,'he-will','erad@dd.con','哈哈哈哈哈','2015-05-20 15:33:23'),(40,31,1,'he-will','erad@dd.con','啦啦啦啦啦\r\n','2015-05-20 15:33:06'),(39,25,4,'momeakl','123245@163.com','空格  发现俩bug，提交后空格不被读取，tab键在该文本框无法使用','2015-05-18 21:32:28'),(38,25,3,'momeakl','123245@163.com','啦啦啦啦啦啦啦啦啦','2015-05-18 21:31:04'),(37,25,2,'momeakl','123245@163.com','哈哈哈哈哈哈','2015-05-18 21:30:56'),(32,20,1,'momeakl','123245@163.com','     Best wishes to you~  感恩生活，珍惜拥有','2015-05-17 11:24:28'),(33,23,1,'admin','','1.按钮需要美化、调整\r\n2.暂时没想到','2015-05-17 21:45:30'),(35,26,1,'admin','','1打开就发了卡上就懒得开\r\n2.将垃圾费\r\n3来看记录','2015-05-18 09:42:13'),(36,25,1,'momeakl','123245@163.com','    怀一颗感恩心 啦啦啦啦啦啦啦啦','2015-05-18 21:30:45'),(31,21,1,'momeakl','123245@163.com','多多捧场！！！','2015-05-16 21:55:27'),(30,19,2,'momeakl','123245@163.com','没问题~~~~','2015-05-16 21:54:21'),(29,19,1,'momeakl','123245@163.com','好哒~~~','2015-05-16 21:54:09'),(50,35,1,'admin','','管理员进行 评论','2015-06-07 14:44:18'),(51,33,1,'admin','','454687','2015-06-10 20:17:08'),(52,33,2,'admin','','54857874','2015-06-10 20:17:12');

/*Table structure for table `forum_topic` */

DROP TABLE IF EXISTS `forum_topic`;

CREATE TABLE `forum_topic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) CHARACTER SET gbk NOT NULL,
  `detail` text CHARACTER SET gbk NOT NULL,
  `name` varchar(32) CHARACTER SET gbk NOT NULL,
  `email` varchar(100) CHARACTER SET gbk NOT NULL,
  `datetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `view` int(10) NOT NULL DEFAULT '0',
  `reply` int(10) NOT NULL DEFAULT '0',
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `forum_topic` */

insert  into `forum_topic`(`id`,`topic`,`detail`,`name`,`email`,`datetime`,`view`,`reply`,`sticky`) values (25,'感恩生活，珍惜拥有','1.Thanksgiving life, cherish the owns\r\n2.怀一颗感恩的心对待生活\r\n3.换行符管用喔','admin','','2015-05-18 09:32:52',138,4,1),(19,'发帖公告','话题和正文都是必填项。最好别掺入HTML代码。Thanksgiving life, cherish the owns 。','admin','','2015-05-16 21:43:04',21,2,1),(20,'蓝语论坛','感恩生活,珍惜拥有,Best wishes to you. by Energy','admin','','2015-05-16 21:44:26',9,1,0),(21,'第一帖','感恩生活,珍惜拥有,Best wishes to you. by momeakl^.^','momeakl','123245@163.com','2015-05-16 21:46:08',27,1,0),(22,'幸福如人饮水，冷暖自知','幸福如人饮水，冷暖自知，你不是我走过的路，心中的乐与苦','momeakl','123245@163.com','2015-05-17 08:56:24',10,0,0),(23,'初步完工','花语论坛于2015/5/17初步建成，各种小问题有待日后逐步解决','001','000@ww.ch','2015-05-17 21:42:32',13,1,0),(26,'测试用','1.得得得得\r\n2.得得得得得\r\n3.啦啦啦啦\r\n4哈哈哈哈哈啊哈哈','admin','','2015-05-18 09:41:02',14,1,0),(27,'花之语','我们仍未知道那年夏天所见的那朵花的名字！\r\n\r\n那朵花','In_Energy','energy@163.com','2015-05-18 09:46:59',4,0,0),(28,'声之形','声音传达时的形状会是什么样子的','In_Energy','energy@163.com','2015-05-18 09:52:30',5,0,0),(29,'花之语论坛','             花之语论坛欢迎你','momeakl','123245@163.com','2015-05-18 21:15:25',18,0,0),(30,'善始善终','成败不意味着什么，因为弱者仍可成长','In_Energy','energy@163.com','2015-05-19 16:28:16',7,0,0),(31,'新人贴','测试用\r\n木有问题','he-will','erad@dd.con','2015-05-20 15:32:51',26,3,0),(32,'竣工','花の语论坛\r\n竣工\r\n我宣布\r\n声の行','admin','','2015-05-20 20:28:04',15,7,1),(33,'那年我们所见的那朵花的名字，未闻花名','那年我们所见的那朵花的名字','momeakl','123245@163.com','2015-05-21 21:00:59',21,2,1),(35,'测试测试','话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项话题和正文都是必填项','momeakl','123245@163.com','2015-05-30 20:14:05',6,1,1),(36,'黑山羊之卵','大家好，我是佐佐木排世，喰种搜查官一等。我是金木研，半赫者，代号蜈蚣，东京喰种男主。口头禅：错的不是我，错的是这个世界','金木研','momeakl@163.com','2015-05-30 20:23:31',4,0,0);

/*Table structure for table `forum_user` */

DROP TABLE IF EXISTS `forum_user`;

CREATE TABLE `forum_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `regdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

/*Data for the table `forum_user` */

insert  into `forum_user`(`id`,`username`,`password`,`email`,`realname`,`regdate`) values (9,'admin','321321','','','2015-05-13 15:50:25'),(2,'admin2','000000','admin@webmaster.com','Administrator','2006-12-06 00:00:00'),(3,'321','e10adc3949ba59abbe56e057f20f883e','1234@dd.com','dd','2015-05-12 20:37:15'),(4,'lala','4297f44b13955235245b2497399d7a93','adlfj@qq.com','df','2015-05-12 21:24:10'),(5,'56','01cfcd4f6b8770febfb40cb906715822','1235@cc.cn','daa','2015-05-12 21:26:06'),(6,'energy','e10adc3949ba59abbe56e057f20f883e','12465@dd.co','energy','2015-05-13 15:04:52'),(7,'admin3','222222','dfdj@ee.cj','ddd','2015-05-13 15:44:41'),(8,'blue','blue','djfld@ee.cj','jjjkla','2015-05-13 15:46:48'),(10,'momeakl','67876115q','123245@163.com','Energy','2015-05-16 16:51:56'),(11,'In_Energy','67876115q','energy@163.com','高冰','2015-05-17 20:28:16'),(12,'Mike','mmmmmmm','energy@163.com','高冰','2015-05-17 20:30:53'),(13,'001','0000000','000@ww.ch','154','2015-05-17 21:40:10'),(14,'123','1234567','123@qq.com','123','2015-05-17 22:00:11'),(15,'he-will','3213213','erad@dd.con','gao','2015-05-20 15:31:51'),(16,'金木研','67876115q','momeakl@163.com','佐佐木','2015-05-30 20:19:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
