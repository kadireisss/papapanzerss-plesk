<?php
declare(strict_types=1);

/**
 * PANZER · admin yetki yardimcilari
 * Tum forms/*.php ve deletes.php icinde admin (k_rol='admin')
 * baska kullanicilarin kayitlarini gormek/silmek/duzenlemek icin
 * bu helper'i kullanir. Mevcut sahiplik kontrollerini kirmaz —
 * sadece admin icin ekstra yetki saglar.
 */

if (!function_exists('bellla_is_admin')) {
    function bellla_is_admin(?PDO $db = null, ?string $kul_id = null): bool
    {
        // Hizli yol: session zaten set edilmisse
        if (!empty($_SESSION['is_rol']) && $_SESSION['is_rol'] === 'admin') {
            return true;
        }
        if (!$db || !$kul_id) {
            return false;
        }
        try {
            $q = $db->prepare("SELECT k_rol FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
            $q->execute([':u' => $kul_id]);
            $r = $q->fetch(PDO::FETCH_ASSOC);
            $rol = $r['k_rol'] ?? '';
            if ($rol === 'admin') {
                $_SESSION['is_rol'] = 'admin';
                return true;
            }
        } catch (\Throwable $e) {
            // sessiz
        }
        return false;
    }
}

if (!function_exists('bellla_is_mod_or_admin')) {
    function bellla_is_mod_or_admin(?PDO $db = null, ?string $kul_id = null): bool
    {
        if (!empty($_SESSION['is_rol']) && in_array($_SESSION['is_rol'], ['admin', 'mod'], true)) {
            return true;
        }
        if (!$db || !$kul_id) {
            return false;
        }
        try {
            $q = $db->prepare("SELECT k_rol FROM kullanicilar WHERE kullaniciadi = :u LIMIT 1");
            $q->execute([':u' => $kul_id]);
            $r = $q->fetch(PDO::FETCH_ASSOC);
            $rol = $r['k_rol'] ?? '';
            if (in_array($rol, ['admin', 'mod'], true)) {
                $_SESSION['is_rol'] = $rol;
                return true;
            }
        } catch (\Throwable $e) {
            // sessiz
        }
        return false;
    }
}

/**
 * Bir kayit `ekleyen` sahipligi kontrolu — admin ise her zaman gecerli.
 */
if (!function_exists('bellla_can_touch_record')) {
    function bellla_can_touch_record(?PDO $db, ?string $kul_id, ?string $ekleyen): bool
    {
        if ($kul_id !== null && $kul_id !== '' && $kul_id === ($ekleyen ?? '')) {
            return true;
        }
        return bellla_is_admin($db, $kul_id);
    }
}

/**
 * Dashboard modal listeleri (ilan/kart/hesap) — LIMIT yoksa admin tum tabloyu ceker; sayfa dakikalar surer.
 * Ortam: BELLLA_DASHBOARD_LIST_LIMIT=200 (25–500 arası kabul edilir).
 */
if (!function_exists('bellla_dashboard_list_limit')) {
    function bellla_dashboard_list_limit(): int
    {
        static $cached = null;
        if ($cached !== null) {
            return $cached;
        }
        $env = getenv('BELLLA_DASHBOARD_LIST_LIMIT');
        if ($env !== false && $env !== '') {
            return $cached = max(25, min(500, (int) $env));
        }

        return $cached = 150;
    }
}

/**
 * TL miktar string'ini karsilastirma icin float'a cevirir (dashboard formlari "1.250" vb. gonderebilir).
 */
if (!function_exists('bellla_try_amount_float')) {
    function bellla_try_amount_float($value): float
    {
        $s = preg_replace('/[^\d.,\-]/', '', (string) $value);
        if ($s === '' || $s === '-') {
            return 0.0;
        }
        $s = str_replace(',', '.', str_replace('.', '', $s));

        return (float) $s;
    }
}
