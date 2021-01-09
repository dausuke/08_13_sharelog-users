-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 1 月 09 日 03:53
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_13`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comment_table`
--

CREATE TABLE `comment_table` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `content_id` int(100) NOT NULL,
  `content_account` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `getday` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `comment_table`
--

INSERT INTO `comment_table` (`id`, `userid`, `content_id`, `content_account`, `comment`, `getday`) VALUES
(17, 3, 45, 'testUser', '行ったことないけど、美味しいらしい', '2021-01-08 09:18:51'),
(21, 3, 59, 'testUser', '知り合いの知り合いの店', '2021-01-08 09:21:13'),
(33, 3, 48, 'testUser', '熊本のおすすめカレー', '2021-01-08 12:23:29'),
(38, 3, 55, 'testUser', '本がいっぱい', '2021-01-08 13:20:33'),
(39, 3, 48, 'testUser', '熊本城の近く', '2021-01-08 13:21:14'),
(55, 3, 59, 'testUser', 'test', '2021-01-08 14:02:42');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
