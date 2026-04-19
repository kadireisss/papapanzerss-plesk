-- PANZER · pttkargo entegrasyonu
-- ortak DB (jakartaxdw) icinde kargo kayitlari + ekleyen sahipligi

CREATE TABLE IF NOT EXISTS `bella_pttkargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `takipno` varchar(32) NOT NULL,
  `gonderen` varchar(120) NOT NULL DEFAULT '',
  `teslimalan` varchar(120) NOT NULL DEFAULT '',
  `cikistarih` varchar(40) NOT NULL DEFAULT '',
  `teslimtarih` varchar(40) NOT NULL DEFAULT '',
  `cikisadres` text NOT NULL,
  `teslimadres` text NOT NULL,
  `telefonno` varchar(40) NOT NULL DEFAULT '',
  `gonderil` varchar(80) NOT NULL DEFAULT '',
  `alanil` varchar(80) NOT NULL DEFAULT '',
  `sonuc` varchar(120) NOT NULL DEFAULT '',
  `durumu` tinyint(4) NOT NULL DEFAULT 1,
  `ekleyen` varchar(64) NOT NULL DEFAULT '',
  `olusturulma` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `takipno` (`takipno`),
  KEY `ekleyen` (`ekleyen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
