<?php
declare(strict_types=1);

/**
 * Panelden kopyalanan / önizlenen ilan adresleri: veritabanındaki sahte domain yerine
 * mevcut sunucu + proje kökü (BellaMain’in üst dizini) kullanılır. Böylece localhost’ta
 * DNS hatası olmadan ilan sayfaları açılır.
 */
function bellla_project_web_root(): string
{
    $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
        || (isset($_SERVER['SERVER_PORT']) && (string) $_SERVER['SERVER_PORT'] === '443');
    $scheme = $https ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? '127.0.0.1';
    $sn = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));

    if (preg_match('#^(.+)/BellaMain/[^/]+\.php$#', $sn, $m)) {
        return $scheme . '://' . $host . $m[1];
    }
    if (strpos($sn, '/BellaMain/') === 0) {
        return $scheme . '://' . $host;
    }

    return $scheme . '://' . $host;
}

function bellla_attr_url(string $url): string
{
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

function bellla_sahibinden_ilan_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/sahibinden/ilan.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_dolap_ilan_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/Dolap/ilan.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_letgo_ilan_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/Letgo/ilan.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_shopier_ilan_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/shopier/ilan.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_shopier_profil_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/shopier/profil.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_pttavm_urun_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/Pttavm/urun.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_turkcell_urun_url(int $id, string $slugPart): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/turkcell/urun.php?id=' . $id . '-' . $slugPart;
    return bellla_attr_url($u);
}

function bellla_yurtici_takip_url(int $id): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/Kargo/gonderi-Takip.php?id=' . $id;
    return bellla_attr_url($u);
}

function bellla_pttkargo_takip_url(string $takipno): string
{
    $u = rtrim(bellla_project_web_root(), '/') . '/pttkargo/sorgula.php?takipno=' . rawurlencode($takipno);
    return bellla_attr_url($u);
}
