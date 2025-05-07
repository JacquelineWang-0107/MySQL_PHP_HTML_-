-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-03 12:00:25
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `月子中心`
--

-- --------------------------------------------------------

--
-- 資料表結構 `嬰兒`
--

CREATE TABLE `嬰兒` (
  `嬰兒姓名` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `性別` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `體重` int(50) UNSIGNED DEFAULT NULL,
  `健康程度` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `生產日` int(50) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `嬰兒`
--

INSERT INTO `嬰兒` (`嬰兒姓名`, `性別`, `體重`, `健康程度`, `生產日`) VALUES
('許雅豬', '女', 7, '健康', 361),
('許雅猴', '女', 5, '健康', 362),
('許雅雞', '女', 5, '不健康', 363),
('許雅鴨', '女', 5, '健康', 364),
('許雅鵝', '女', 5, '不健康', 365);

-- --------------------------------------------------------

--
-- 資料表結構 `房間`
--

CREATE TABLE `房間` (
  `房型` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `房號` int(50) UNSIGNED DEFAULT NULL,
  `房價` int(50) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `房間`
--

INSERT INTO `房間` (`房型`, `房號`, `房價`) VALUES
('商務套房', 4, 40000),
('雙人套房', 3, 80000),
('單人套房', 2, 100000),
('總統套房', 1, 200000);

-- --------------------------------------------------------

--
-- 資料表結構 `母親`
--

CREATE TABLE `母親` (
  `母親姓名` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `母親年齡` int(50) UNSIGNED DEFAULT NULL,
  `母親電話` int(50) UNSIGNED DEFAULT NULL,
  `母親住址` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `身體狀況` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `經濟狀況` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `母親`
--

INSERT INTO `母親` (`母親姓名`, `母親年齡`, `母親電話`, `母親住址`, `身體狀況`, `經濟狀況`) VALUES
('王芊貳', 20, 800092000, 'HK', '營養不良', '窮b'),
('王芊叁', 21, 800092000, 'CHINA', '營養不良', '窮b'),
('王芊祀', 22, 800092000, 'UK', '營養不良', '窮b'),
('王芊鹉', 23, 800092000, 'USA', '營養不良', '窮b'),
('王千坴', 34, 900876543, 'TAIWAN', '良好', '小康');

-- --------------------------------------------------------

--
-- 資料表結構 `親屬`
--

CREATE TABLE `親屬` (
  `親屬姓名` varchar(50) DEFAULT NULL,
  `關係` varchar(50) DEFAULT NULL,
  `親屬年齡` int(50) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `親屬`
--

INSERT INTO `親屬` (`親屬姓名`, `關係`, `親屬年齡`) VALUES
('浩浩', '奶奶', 38),
('瑋瑋', '姑姑', 22),
('好好', '表姊', 35),
('棒棒', '阿姨', 43),
('餵餵', '媽媽', 32);

-- --------------------------------------------------------

--
-- 資料表結構 `護理師`
--

CREATE TABLE `護理師` (
  `護理師代號` varchar(50) DEFAULT NULL,
  `薪水` varchar(50) DEFAULT NULL,
  `工作內容` varchar(50) DEFAULT NULL,
  `護理師經驗` varchar(50) DEFAULT NULL,
  `在職時間` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `護理師`
--

INSERT INTO `護理師` (`護理師代號`, `薪水`, `工作內容`, `護理師經驗`, `在職時間`) VALUES
('1005', '30000', '照顧嬰兒', '曾經讓嬰兒拉肚子', '2年'),
('1006', '35000', '協助嬰兒換尿布', '曾經讓嬰兒皮膚過敏', '3年'),
('1009', '38000', '負責清理床鋪', '床鋪未打掃乾淨', '4年'),
('1010', '40000', '幫助嬰兒洗澡', '曾經讓嬰兒喝到水', '2年'),
('1011', '40000', '陪伴嬰兒玩遊戲', '曾經讓嬰兒不慎吞下玩具', '5年');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
