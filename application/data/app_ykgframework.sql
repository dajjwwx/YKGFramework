-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2016 年 02 月 02 日 00:13
-- 服务器版本: 5.6.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_ykgframework`
--

-- --------------------------------------------------------

--
-- 表的结构 `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `albums`
--


-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `user_id`) VALUES
(1, 'How to be Angry', 'Jax', 1),
(2, '天龙八部', '金庸', 1);

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `pid`, `uid`, `name`, `weight`) VALUES
(1, 0, 1, 'YKG Framework Documents', 100),
(2, 0, 1, 'Quick Start', 100),
(3, 0, 1, '1.1 Install', 80),
(4, 0, 1, '1.1 Install', 80),
(5, 0, 1, 'Quick Start', 10),
(6, 1, 1, 'test', 11);

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `allow_comment` tinyint(1) NOT NULL,
  `hits` int(11) NOT NULL,
  `islocal` tinyint(4) NOT NULL,
  `server` varchar(20) NOT NULL,
  `oriname` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `filetype` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `mine` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `files`
--


-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `tags` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `publish` int(11) NOT NULL,
  `modify` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `cid`, `tags`, `title`, `content`, `publish`, `modify`, `uid`) VALUES
(18, 2, 'lnmp', 'My world', 'LNMP一键安装包是一个用Linux Shell编写的可以为CentOS/RadHat、Debian/Ubuntu VPS(VDS)或独立主机安装LNMP(Nginx、MySQL/Mariadb、PHP)、LNMPA(Nginx、MySQL/Mariadb、PHP、Apache)、LAMP(Apache、MySQL/Mariadb、PHP)生产环境的Shell程序。\r\n\r\n查看本地环境: 探针  phpinfo  phpMyAdmin(为了安全，建议将phpmyadmin目录重命名为不容易猜到的目录！)\r\n\r\n更多LNMP一键安装包信息请访问: http://lnmp.org\r\n\r\nLNMP一键安装包问题反馈请访问: http://bbs.vpser.net/forum-25-1.html\r\n\r\nVPS相关教程: http://www.vpser.net/vps-howto/\r\n\r\n美国VPS推荐: http://www.vpser.net/usa-vps/', 1449466675, 1449466675, 1),
(15, 1, '舟桥', '舟桥', '舟桥', 1449416932, 1449416932, 1),
(14, 2, '测试', '标题', '测试内容', 1449416867, 1449416867, 1),
(13, 2, '测试', '标题', '测试内容', 1449416829, 1449416829, 1),
(33, 2, '主要特性', '主要特性', '### 主要特性\r\n\r\n- 支持“标准”Markdown / CommonMark和Github风格的语法，也可变身为代码编辑器；\r\n- 支持实时预览、图片（跨域）上传、预格式文本/代码/表格插入、代码折叠、搜索替换、只读模式、自定义样式主题和多语言语法高亮等功能；\r\n- 支持ToC（Table of Contents）、Emoji表情、Task lists、@链接等Markdown扩展语法；\r\n- 支持TeX科学公式（基于KaTeX）、流程图 Flowchart 和 时序图 Sequence Diagram;\r\n- 支持识别和解析HTML标签，并且支持自定义过滤标签解析，具有可靠的安全性和几乎无限的扩展性；\r\n- 支持 AMD / CMD 模块化加载（支持 Require.js & Sea.js），并且支持自定义扩展插件；\r\n- 兼容主流的浏览器（IE8+）和Zepto.js，且支持iPad等平板设备；\r\n- 支持自定义主题样式；\r\n\r\n# Editor.md\r\n\r\n![](https://pandao.github.io/editor.md/images/logos/editormd-logo-180x180.png)\r\n\r\n![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)\r\n\r\n**目录 (Table of Contents)**\r\n\r\n[TOCM]\r\n\r\n[TOC]', 1449499542, 1449499542, 1),
(45, 1, 'Test', '公式编辑器', '这是一道有关圆锥曲线的题，请大家观看：\r\n已知一椭圆的焦点为$$\\(2,0\\)$$', 1449645165, 1449645165, 1),
(44, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1449644960, 1449644960, 1),
(43, 2, '数列', '已知数列', '已知数列$${a_n}$$的前$$n$$项和中$$S_n$$,且满足$$2S_n+a_n=2,b_n=\\frac{2S_n}{a_n}+1(n\\in N*)$$\r\n(1)求数列$$\\{a_n\\},\\{b_n\\}$$的通项公式;\r\n(2)记 $$\\{c_n\\}=\\log_3{b_1}+\\log_3{b_2}+\\...+log_3{b_n}$$,\r\n$$\\frac{1}{c_1}+\\frac{1}{c_2}+\\...+\\frac{1}{c_n}$$与$$2$$的大小', 1449642509, 1449642509, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `salt`) VALUES
(1, 'admin', '21cbb1961cea5176fe1790d54cceea5c068c6de8', 'sdat');
