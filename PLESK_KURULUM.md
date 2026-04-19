# PANZER — Plesk Kurulum Rehberi

## 1. Veritabanı

1. **Plesk → Databases → Add Database**
2. Veritabanı adı, kullanıcı adı ve şifre oluştur.
3. phpMyAdmin'den **Bella.sql** dosyasını import et.
4. Ek SQL dosyalarını sırayla import et:
   - `BellaMain/database/bella_yeni_pazaryeri_tablolar.sql`
   - `BellaMain/database/ty_hb_tablolar.sql`
   - `BellaMain/database/bella_pttkargo.sql`

## 2. DB Bağlantısı

```bash
cp BellaMain/database/config.local.example.php BellaMain/database/config.local.php
```

`config.local.php` dosyasını düzenle:

```php
$dbHost = 'localhost';
$dbPort = 3306;
$dbName = 'plesk_veritabani_adi';
$dbUser = 'plesk_kullanici';
$dbPass = 'plesk_sifre';
```

## 3. Document Root

Plesk → Websites & Domains → ilgili domain:
- **Document root:** Projenin kök klasörüne ayarla (BellaMain değil, ana klasör).
- PHP sürümü: **8.0+** (8.2 önerilir).

## 4. Admin Hesabı

phpMyAdmin'den `kullanicilar` tablosunda:

```sql
-- boss kullanıcısını admin yap
UPDATE kullanicilar SET k_rol = 'admin' WHERE kullaniciadi = 'boss';
```

Eğer `boss` kullanıcısı yoksa önce kayıt sayfasından oluştur (davet kodu gerekir).

## 5. Cloudflare / doğrudan erişim (403 önleme)

`BellaMain/index.php` varsayılan olarak yalnızca **localhost**, **Cloudflare IP** aralığı ve **Railway** ortamına izin verir.

**Plesk’te doğrudan domain (turuncu bulut yok)** ile kullanım için ek kod vardır: tipik `…/vhosts/…/httpdocs` document root, Linux PSA yolu veya `BELLLA_SKIP_CF_GATE=1` / `BellaMain/.allow_direct_traffic` dosyası kapıyı atlatır.

Ayrıntılı notlar: **`plesk/KURULUM.txt`**. Ana geliştirme deposu: [papapanzerss](https://github.com/kadireisss/papapanzerss) — bu repo Plesk barındırma sürümüdür.

## 6. Dosya İzinleri

```
chmod 640 BellaMain/database/config.local.php
chmod 755 BellaMain/
```

## 7. SSL

Plesk → SSL/TLS → Let's Encrypt ile ücretsiz sertifika al.
