

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- 表的结构 `wx_btn_event`
--

CREATE TABLE IF NOT EXISTS `wx_btn_event` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(100) NOT NULL,
  `CreateTime` varchar(100) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `Event` varchar(100) NOT NULL,
  `EventKey` varchar(100) NOT NULL,
  `BackMsg` varchar(100) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackMsgTime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `wx_link`
--

CREATE TABLE IF NOT EXISTS `wx_link` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(200) NOT NULL,
  `CreateTime` varchar(50) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Url` varchar(200) NOT NULL,
  `MsgId` varchar(100) NOT NULL,
  `BackMsg` varchar(100) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackMsgTime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- 表的结构 `wx_location`
--

CREATE TABLE IF NOT EXISTS `wx_location` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(55) NOT NULL,
  `CreateTime` varchar(100) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `Location_X` varchar(44) NOT NULL,
  `Location_Y` varchar(44) NOT NULL,
  `Scale` varchar(33) NOT NULL,
  `Label` varchar(33) NOT NULL,
  `MsgId` varchar(100) NOT NULL,
  `BackMsg` varchar(300) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackMsgTime` varchar(20) NOT NULL,
  `NickName` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `wx_msg`
--

CREATE TABLE IF NOT EXISTS `wx_msg` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(51) NOT NULL,
  `CreateTime` varchar(30) NOT NULL,
  `MsgType` varchar(110) NOT NULL,
  `Content` varchar(5000) NOT NULL,
  `MsgId` varchar(50) NOT NULL,
  `BackMsg` varchar(5000) NOT NULL,
  `BackMsgtype` varchar(110) NOT NULL,
  `BackMsgTime` varchar(100) NOT NULL,
  `NickName` varchar(56) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


--
-- 表的结构 `wx_pic`
--

CREATE TABLE IF NOT EXISTS `wx_pic` (
  `id` int(33) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(100) NOT NULL,
  `CreateTime` varchar(100) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `PicUrl` varchar(100) NOT NULL,
  `MediaId` varchar(100) NOT NULL,
  `MsgId` varchar(100) NOT NULL,
  `StorageUrl` varchar(100) NOT NULL,
  `BackMsg` varchar(400) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackTime` varchar(100) NOT NULL,
  `NickName` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `wx_user`
--

CREATE TABLE IF NOT EXISTS `wx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(50) NOT NULL,
  `FromUserName` varchar(50) NOT NULL,
  `CreateTime` varchar(30) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `Event` varchar(200) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackMsg` varchar(100) NOT NULL,
  `BackMsgTime` varchar(500) NOT NULL,
  `LastMutualType` varchar(100) NOT NULL,
  `LastMutualTime` varchar(100) NOT NULL,
  `MutualTimes` int(100) NOT NULL DEFAULT '0',
  `IsAvaible` int(10) NOT NULL,
  `Identity` int(100) NOT NULL,
  `NickName` varchar(100) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Language` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Headimgurl` varchar(300) NOT NULL,
  `SubscribeTime` varchar(300) NOT NULL,
  `Unionid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- 表的结构 `wx_video`
--

CREATE TABLE IF NOT EXISTS `wx_video` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(100) NOT NULL,
  `CreateTime` varchar(100) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `MediaId` varchar(100) NOT NULL,
  `ThumbMediaId` varchar(100) NOT NULL,
  `MsgId` varchar(100) NOT NULL,
  `BackMsg` varchar(100) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  `BackMsgTime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wx_video`
--


-- --------------------------------------------------------

--
-- 表的结构 `wx_voice`
--

CREATE TABLE IF NOT EXISTS `wx_voice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `ToUserName` varchar(100) NOT NULL,
  `FromUserName` varchar(100) NOT NULL,
  `CreateTime` varchar(100) NOT NULL,
  `MsgType` varchar(100) NOT NULL,
  `MediaId` varchar(100) NOT NULL,
  `Format` varchar(100) NOT NULL,
  `Recognition` varchar(200) NOT NULL,
  `MsgId` varchar(100) NOT NULL,
  `BackMsg` varchar(300) NOT NULL,
  `BackMsgTime` varchar(100) NOT NULL,
  `BackMsgType` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

