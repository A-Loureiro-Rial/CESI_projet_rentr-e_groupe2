-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 sep. 2021 à 13:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `c_easy_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `a_content` text COLLATE utf8_bin NOT NULL,
  `a_views` int(11) NOT NULL,
  `a_likes` int(11) NOT NULL,
  `a_dislikes` int(11) NOT NULL,
  `a_author` int(11) NOT NULL,
  `a_status` tinyint(1) NOT NULL,
  `a_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `a_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  KEY `a_author` (`a_author`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `article_category`
--

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE IF NOT EXISTS `article_category` (
  `a_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`a_id`,`c_id`),
  KEY `a_id` (`a_id`),
  KEY `c_id` (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `ca_description` text COLLATE utf8_bin NOT NULL,
  `ca_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ca_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_author` int(11) NOT NULL,
  `c_content` text COLLATE utf8_bin NOT NULL,
  `c_article` int(11) NOT NULL,
  `c_likes` int(11) NOT NULL,
  `c_dislikes` int(11) NOT NULL,
  `c_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`),
  KEY `c_author` (`c_author`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `u_keypass` varchar(255) COLLATE utf8_bin NOT NULL,
  `u_role` tinyint(1) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
