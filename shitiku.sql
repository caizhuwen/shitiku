-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 07 月 17 日 08:52
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shitiku`
--
CREATE DATABASE IF NOT EXISTS `shitiku` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `shitiku`;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `num` int(10) NOT NULL AUTO_INCREMENT COMMENT '试题号',
  `typenum` char(20) COLLATE utf8_bin NOT NULL COMMENT '题型',
  `subject` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '所属类别',
  `title` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '题目内容',
  `chooseA` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '选项A',
  `chooseB` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '选项B',
  `chooseC` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '选项C',
  `chooseD` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '选项D',
  `answer` varchar(500) COLLATE utf8_bin NOT NULL COMMENT '答案',
  `value` char(10) COLLATE utf8_bin NOT NULL COMMENT '分值',
  `deletes` varchar(10) COLLATE utf8_bin NOT NULL COMMENT '删除',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='试题表' AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`num`, `typenum`, `subject`, `title`, `chooseA`, `chooseB`, `chooseC`, `chooseD`, `answer`, `value`, `deletes`) VALUES
(3, '多选题', 'CSS', '边框的样式可以包含的值包括?', 'A、粗细', 'B、颜色  ', 'C、样式', 'D、长短', 'ABC', '4', '0'),
(4, '单选题', 'HTML', '以下属性中，可用于设置段落文本缩进的是?', 'A.text-align', 'B.text-weight  ', 'C.font-indent ', 'D.text-indent', 'D', '4', '0'),
(5, '是非题', 'CSS', '定义盒模型外补丁的时候可以使用负值 ', '对', '错', '', '', '对', '4', '0'),
(6, '单选题', 'HTML', '要使表格的边框不显示，应设置border的值是? ', ' A.1', 'B．0', 'C．2', 'D．3 ', 'B', '2', '0'),
(7, '简答题', 'CSS', '什么是CSS的盒子模型?', '无', '', '', '', 'CSS盒模型的基本原则是理解布局和大小等', '4', '1'),
(8, '多选题', 'HTML', '用于设置单元格之间的距离的属性是?', 'A.border', 'B．cellspacin', 'C.cellpadding', 'D.maigin', 'B', '4', '1'),
(9, '是非题', 'HTML', '排列文字和排列图片的标识符作用一样，都是把文字居中', '无', '', '', '', '错', '3', '1'),
(37, '简答题', 'PHP', '什么情况下需要在URL中指定端口号？\r\n', '无', '', '', '', '改用其他端口号', '7', '1'),
(43, '单选题', 'PHP', 'isset()的功能是?', '无', '', '', '', '测试变量是否存在', '6', '0'),
(53, '单选题', 'HTML', '在网页中通常采用（）完成性别的输入？', 'A.复选框', 'B.文本框', 'C.密码框', 'D.单选按钮', 'D', '5', '0'),
(58, '单选题', 'JS', '鼠标单击提交按钮时可以触发（）事件。', 'A.onenter', 'B.onsubmit', 'C.onmouseDrag', 'D.onmouseOver', 'B', '3', '0');

-- --------------------------------------------------------

--
-- 表的结构 `style_info`
--

CREATE TABLE IF NOT EXISTS `style_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '类别号',
  `subject` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '类别名称',
  `subjecte` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '科目名称',
  `time` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '时间',
  `picture` text COLLATE utf8_bin NOT NULL COMMENT '图片',
  `deletes` varchar(20) COLLATE utf8_bin NOT NULL COMMENT '软删除',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `style_info`
--

INSERT INTO `style_info` (`id`, `subject`, `subjecte`, `time`, `picture`, `deletes`) VALUES
(13, 'CSS', 'web', '2014-07-16 14:03:42', 'upload/css1.jpg', '0'),
(14, 'HTML', 'web', '2014-07-16 14:04:18', 'upload/html1.jpg', '0'),
(15, 'PHP', 'web', '2014-07-16 14:04:38', 'upload/php1.jpg', '0'),
(20, 'JS', 'web', '2014-07-16 15:34:16', 'upload/js1.jpg', '0');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `usernum` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `userpwd` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户密码',
  PRIMARY KEY (`usernum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`usernum`, `username`, `userpwd`) VALUES
(3, 'ruanyuan', '444'),
(5, 'caizhuwen', '123'),
(47, '蔡柱文', 'abc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
