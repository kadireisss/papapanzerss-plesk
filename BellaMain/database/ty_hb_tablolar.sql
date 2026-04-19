-- Trendyol + Hepsiburada tabloları (jakartaxdw). phpMyAdmin veya mysql ile içe aktarın.

CREATE TABLE IF NOT EXISTS `ty_ilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunadi` text NOT NULL,
  `saticiadi` text NOT NULL,
  `urunaciklama` text NOT NULL,
  `urunfiyat` text NOT NULL,
  `urunkategori` text NOT NULL,
  `urunresmi` text NOT NULL,
  `ekleyen` varchar(255) DEFAULT NULL,
  `ilandurum` varchar(10) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ty_adres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresbasligi` text NOT NULL,
  `adsoyad` text NOT NULL,
  `telefonno` text NOT NULL,
  `tckimlik` text NOT NULL,
  `il` text NOT NULL,
  `ilce` text NOT NULL,
  `tamadres` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ty_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT IGNORE INTO `ty_login` (`id`, `username`, `password`) VALUES
(1, 'bellaadmin', MD5('BellaTrendyol2026!'));

CREATE TABLE IF NOT EXISTS `hb_urun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunlink` text NOT NULL,
  `urunkategori` text NOT NULL,
  `urunadi` text NOT NULL,
  `urunfiyat` text NOT NULL,
  `urunresim` text NOT NULL,
  `ekleyen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `hb_adres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` text NOT NULL,
  `telefon` text NOT NULL,
  `il` text NOT NULL,
  `ilce` text NOT NULL,
  `tamadres` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
