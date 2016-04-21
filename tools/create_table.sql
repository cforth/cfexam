--
-- MySQL用户: `cf`
-- 密码: `123456`
-- 对数据库`tzfx`具有的权限只有SELECT
--

-- --------------------------------------------------------

--
-- 数据库: `tzfx`
--

-- --------------------------------------------------------

--
-- 表的结构 `duo` 多选题
--

CREATE TABLE IF NOT EXISTS `duo` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `dxt` 单选题
--

CREATE TABLE IF NOT EXISTS `dxt` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pdt` 判断题
--

CREATE TABLE IF NOT EXISTS `pdt` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `users` 试题用户
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varbinary(255) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

