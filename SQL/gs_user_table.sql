-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 30 日 01:30
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'しげじー', 'shigeg', 'shigeg', 1, 0),
(2, 'おおはらしげる', 'tenten', 'tenten', 1, 0),
(5, '鬼瓦権蔵さん', 'oni', 'onioni', 1, 0),
(6, '桂しじゃく', 'katura', 'shijaku', 0, 0),
(7, 'はらたいら', 'taira', 'taira', 1, 0),
(8, '小柳るみこ', 'rumiko', 'rumio', 0, 0),
(9, 'なかもりあきな', 'morimori', 'akina', 0, 0),
(11, 'しんじろう', 'takano', 'takuro', 0, 0),
(12, 'しげ', 'shige', 'shige', 0, 0),
(14, 'tee', 'tee', 'tee', 0, 0),
(16, 'シャケ野郎', 'shake', 'shake', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
