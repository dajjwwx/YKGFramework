-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2016-01-03 00:19:08
-- 服务器版本： 5.6.23-log
-- PHP Version: 5.6.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ykg`
--

-- --------------------------------------------------------

--
-- 表的结构 `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `albums`
--

INSERT INTO `albums` (`id`, `category_id`, `name`, `description`, `user_id`) VALUES
(1, 9, 'Gallery', '没erasy', 1),
(2, 1, '宝宝满月', '宝宝满月', 1);

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `catetype` int(11) DEFAULT '10',
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `pid`, `catetype`, `user_id`, `name`, `weight`) VALUES
(1, 0, 10, 1, 'YKG Framework Documents', 100),
(2, 0, 10, 1, 'Quick Start', 100),
(3, 0, 10, 1, '1.1 Install', 80),
(4, 0, 10, 1, '1.1 Install', 80),
(5, 0, 10, 1, 'Quick Start', 10),
(6, 1, 10, 1, 'test', 11),
(7, 0, 10, 1, '测试分类', 200),
(10, 9, 20, 0, '宝宝图集', 200),
(9, 0, 20, 0, '相册', 100);

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1表示允许展示0表示禁止展示',
  `allow_comment` int(11) NOT NULL DEFAULT '0',
  `hits` int(11) NOT NULL,
  `islocal` int(11) NOT NULL,
  `server` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `oriname` varchar(50) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `filetype` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `extension` int(11) NOT NULL,
  `mine` varchar(50) NOT NULL,
  `remark` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `files`
--

INSERT INTO `files` (`id`, `album_id`, `status`, `allow_comment`, `hits`, `islocal`, `server`, `name`, `oriname`, `tag`, `filetype`, `user_id`, `publish`, `size`, `extension`, `mine`, `remark`) VALUES
(1, 2, 0, 1, 0, 1, 'local', '14512324224184.jpg', '4512324224184.jpg', NULL, 21, 1, 1451232422, 2361864, 0, 'image/jpeg', NULL),
(2, 1, 0, 1, 0, 1, 'local', '14512329655019.jpg', '20151108_113807.jpg', NULL, 21, 1, 1451232965, 1434214, 0, 'image/jpeg', NULL),
(3, 2, 0, 1, 0, 1, 'local', '14512833148516.jpg', '13974704_145642706185_2[1].jpg', NULL, 21, 1, 1451283314, 137563, 0, 'image/jpeg', NULL),
(4, 1, 0, 1, 0, 1, 'local', '14512833151692.jpg', 't01d3d2542d829fdcf6[1].jpg', NULL, 21, 1, 1451283315, 203850, 0, 'image/jpeg', NULL),
(5, 0, 0, 1, 0, 1, 'local', '14512834579028.jpg', '20150811_160742.jpg', NULL, 21, 1, 1451283457, 2361864, 0, 'image/jpeg', NULL),
(6, 0, 0, 1, 0, 1, 'local', '14512834576479.jpg', '20151008_150133.jpg', NULL, 21, 1, 1451283457, 1225015, 0, 'image/jpeg', NULL),
(7, 0, 0, 1, 0, 1, 'local', '14512834575979.jpg', '20151008_145635 - 副本.jpg', NULL, 21, 1, 1451283457, 2160232, 0, 'image/jpeg', NULL),
(8, 2, 0, 1, 0, 1, 'local', '14513193127115.jpg', '20150811_160742.jpg', NULL, 21, 1, 1451319312, 2361864, 0, 'image/jpeg', NULL),
(9, 2, 0, 1, 0, 1, 'local', '14513193121840.jpg', '20151008_145635 - 副本.jpg', NULL, 21, 1, 1451319312, 2160232, 0, 'image/jpeg', NULL),
(10, 1, 0, 1, 0, 1, 'local', '14515560345590.jpg', 't01d3d2542d829fdcf6[1].jpg', NULL, 21, 1, 1451556034, 203850, 0, 'image/jpeg', NULL),
(11, 2, 0, 1, 0, 1, 'local', '14515561705091.jpg', '13974704_145642706185_2[1].jpg', NULL, 21, 1, 1451556170, 137563, 0, 'image/jpeg', NULL),
(12, 1, 0, 1, 0, 1, 'local', '14516535037937.jpg', '20131104102218607.jpg', NULL, 21, 1, 1451653503, 55748, 0, 'image/jpeg', NULL),
(13, 1, 0, 1, 0, 1, 'local', '14516535036360.jpg', 'u=2144139755,1959502157&fm=21&gp=0.jpg', NULL, 21, 1, 1451653503, 5717, 0, 'image/jpeg', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `publish` int(11) NOT NULL,
  `modify` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `tags`, `title`, `content`, `publish`, `modify`, `user_id`) VALUES
(18, 2, 'lnmp', 'My world', 'LNMP一键安装包是一个用Linux Shell编写的可以为CentOS/RadHat、Debian/Ubuntu VPS(VDS)或独立主机安装LNMP(Nginx、MySQL/Mariadb、PHP)、LNMPA(Nginx、MySQL/Mariadb、PHP、Apache)、LAMP(Apache、MySQL/Mariadb、PHP)生产环境的Shell程序。\r\n\r\n查看本地环境: 探针  phpinfo  phpMyAdmin(为了安全，建议将phpmyadmin目录重命名为不容易猜到的目录！)\r\n\r\n更多LNMP一键安装包信息请访问: http://lnmp.org\r\n\r\nLNMP一键安装包问题反馈请访问: http://bbs.vpser.net/forum-25-1.html\r\n\r\nVPS相关教程: http://www.vpser.net/vps-howto/\r\n\r\n美国VPS推荐: http://www.vpser.net/usa-vps/', 1449466675, 1449466675, 1),
(66, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618124, 1450618124, 1),
(65, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618124, 1450618124, 1),
(15, 1, '舟桥', '舟桥', '舟桥', 1449416932, 1449416932, 1),
(14, 2, '测试', '标题', '测试内容', 1449416867, 1449416867, 1),
(13, 2, '测试', '标题', '测试内容', 1449416829, 1449416829, 1),
(64, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618123, 1450618123, 1),
(63, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618123, 1450618123, 1),
(62, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618122, 1450618122, 1),
(61, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618122, 1450618122, 1),
(60, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618120, 1450618120, 1),
(59, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618120, 1450618120, 1),
(58, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618119, 1450618119, 1),
(57, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618119, 1450618119, 1),
(56, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618117, 1450618117, 1),
(55, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618117, 1450618117, 1),
(54, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618111, 1450618111, 1),
(53, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618109, 1450618109, 1),
(52, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450186223, 1450186223, 1),
(51, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450186119, 1450186119, 1),
(33, 2, '主要特性', '主要特性', '### 主要特性\r\n\r\n- 支持“标准”Markdown / CommonMark和Github风格的语法，也可变身为代码编辑器；\r\n- 支持实时预览、图片（跨域）上传、预格式文本/代码/表格插入、代码折叠、搜索替换、只读模式、自定义样式主题和多语言语法高亮等功能；\r\n- 支持ToC（Table of Contents）、Emoji表情、Task lists、@链接等Markdown扩展语法；\r\n- 支持TeX科学公式（基于KaTeX）、流程图 Flowchart 和 时序图 Sequence Diagram;\r\n- 支持识别和解析HTML标签，并且支持自定义过滤标签解析，具有可靠的安全性和几乎无限的扩展性；\r\n- 支持 AMD / CMD 模块化加载（支持 Require.js & Sea.js），并且支持自定义扩展插件；\r\n- 兼容主流的浏览器（IE8+）和Zepto.js，且支持iPad等平板设备；\r\n- 支持自定义主题样式；\r\n\r\n# Editor.md\r\n\r\n![](https://pandao.github.io/editor.md/images/logos/editormd-logo-180x180.png)\r\n\r\n![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)\r\n\r\n**目录 (Table of Contents)**\r\n\r\n[TOCM]\r\n\r\n[TOC]', 1449499542, 1449499542, 1),
(50, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450186115, 1450186115, 1),
(49, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450185630, 1450185630, 1),
(48, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450185628, 1450185628, 1),
(47, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450160970, 1450160970, 1),
(46, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450160499, 1450160499, 1),
(45, 1, 'Test', '公式编辑器', '这是一道有关圆锥曲线的题，请大家观看：\r\n已知一椭圆的焦点为$$\\(2,0\\)$$', 1449645165, 1449645165, 1),
(44, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1449644960, 1449644960, 1),
(43, 2, '数列', '已知数列', '已知数列$${a_n}$$的前$$n$$项和中$$S_n$$,且满足$$2S_n+a_n=2,b_n=\\frac{2S_n}{a_n}+1(n\\in N*)$$\r\n(1)求数列$$\\{a_n\\},\\{b_n\\}$$的通项公式;\r\n(2)记 $$\\{c_n\\}=\\log_3{b_1}+\\log_3{b_2}+\\...+log_3{b_n}$$,\r\n$$\\frac{1}{c_1}+\\frac{1}{c_2}+\\...+\\frac{1}{c_n}$$与$$2$$的大小', 1449642509, 1449642509, 1),
(67, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618125, 1450618125, 1),
(68, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618126, 1450618126, 1),
(69, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618139, 1450618139, 1),
(70, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618140, 1450618140, 1),
(71, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618147, 1450618147, 1),
(72, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618147, 1450618147, 1),
(73, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618149, 1450618149, 1),
(74, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618149, 1450618149, 1),
(75, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618150, 1450618150, 1),
(76, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618150, 1450618150, 1),
(77, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618151, 1450618151, 1),
(78, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618151, 1450618151, 1),
(79, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618151, 1450618151, 1),
(80, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618151, 1450618151, 1),
(81, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618152, 1450618152, 1),
(82, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618152, 1450618152, 1),
(83, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618153, 1450618153, 1),
(84, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618153, 1450618153, 1),
(85, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618153, 1450618153, 1),
(86, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618154, 1450618154, 1),
(87, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618154, 1450618154, 1),
(88, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618155, 1450618155, 1),
(89, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618155, 1450618155, 1),
(90, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618156, 1450618156, 1),
(91, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618156, 1450618156, 1),
(92, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618157, 1450618157, 1),
(93, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618157, 1450618157, 1),
(94, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618167, 1450618167, 1),
(95, 1, '测试', '测试图片', '![](/public/uploads/2015/12/20/14506181971511.jpg)\r\n\r\n测试一下哦\r\n\r\n还有什么别的事吗？', 1450618364, 1450618364, 1),
(96, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618394, 1450618394, 1),
(97, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450618395, 1450618395, 1),
(98, 1, 'Java', 'Java测试', '\r\n[========]\r\n:fa-play:- 1. \r\n\r\n------------\r\n```java\r\n\r\npublic class A\r\n{\r\n	void main(){\r\n		System.out.println("Hello world");\r\n	}\r\n}\r\n\r\n```\r\n', 1450618546, 1450618546, 1),
(99, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450620105, 1450620105, 1),
(100, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450620108, 1450620108, 1),
(101, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450620856, 1450620856, 1),
(102, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450620858, 1450620858, 1),
(103, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450621993, 1450621993, 1),
(104, 2, '测试,没有', '天理不在', '不卢有没有kis一桍檶枯IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...\r\n\r\n不卢有没有kis一桍檶枯IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...IT学习者 -> 技术文档 -> PHP 完全中文手册 函数:implode() 字符串处理函数库 implode 将数组变成字符串。 语法: string implode(string glue, array pieces);...', 1450851538, 1450851538, 1),
(105, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450858079, 1450858079, 1),
(106, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1450858084, 1450858084, 1),
(107, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451198638, 1451198638, 1),
(108, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451198646, 1451198646, 1),
(109, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451198650, 1451198650, 1),
(110, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451207374, 1451207374, 1),
(111, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451207941, 1451207941, 1),
(112, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451207942, 1451207942, 1),
(113, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210064, 1451210064, 1),
(114, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210065, 1451210065, 1),
(115, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210076, 1451210076, 1),
(116, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210076, 1451210076, 1),
(117, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210076, 1451210076, 1),
(118, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451210078, 1451210078, 1),
(119, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451221803, 1451221803, 1),
(120, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451283235, 1451283235, 1),
(121, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451283238, 1451283238, 1),
(122, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451283239, 1451283239, 1),
(123, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451655451, 1451655451, 1),
(124, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451657958, 1451657958, 1),
(125, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451739959, 1451739959, 1),
(126, 1, 'Dream', 'Hello world', '#I''ve a dream to sing a song', 1451746722, 1451746722, 1);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(24) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `salt`) VALUES
(1, 'admin', '21cbb1961cea5176fe1790d54cceea5c068c6de8', 'sdat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
