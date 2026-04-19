<?php
declare(strict_types=1);

/**
 * Repo’da olmayabilen assets/media/user.png yerine her ortamda çalışan yer tutucu.
 */
function bellla_avatar_placeholder_data_uri(): string
{
    static $cached = null;
    if ($cached !== null) {
        return $cached;
    }
    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64">'
        . '<rect fill="#1a1f28" width="64" height="64" rx="14"/>'
        . '<circle cx="32" cy="24" r="10" fill="#5c6578"/>'
        . '<path fill="#5c6578" d="M14 58c0-12 8-20 18-20s18 8 18 20"/></svg>';

    return $cached = 'data:image/svg+xml;charset=UTF-8,' . rawurlencode($svg);
}

/**
 * Kullanıcı avatarı — DB’de eksik/bozuk yol veya silinmiş dosya için güvenli URL + onerror yedeği.
 */
function bellla_avatar_url(?string $userimage): string
{
    $raw = trim((string) $userimage);
    if ($raw === '') {
        return bellla_avatar_placeholder_data_uri();
    }
    if (preg_match('#^https?://#i', $raw)) {
        return $raw;
    }
    if ($raw[0] === '/') {
        return $raw;
    }
    $raw = str_replace(['../', '..\\'], '', $raw);
    $raw = ltrim($raw, '/');
    if (stripos($raw, 'images/') === 0) {
        return $raw;
    }

    return 'images/' . $raw;
}

function bellla_avatar_img_html(?string $userimage, int $w = 40, int $h = 40, string $extraClass = ''): string
{
    $src = bellla_avatar_url($userimage);
    $fallback = bellla_avatar_placeholder_data_uri();
    $cls = trim('bellla-avatar ' . $extraClass);

    return sprintf(
        '<img class="%s" src="%s" width="%d" height="%d" alt="" loading="lazy" decoding="async" onerror="this.onerror=null;this.src=%s;">',
        htmlspecialchars($cls, ENT_QUOTES, 'UTF-8'),
        htmlspecialchars($src, ENT_QUOTES, 'UTF-8'),
        $w,
        $h,
        json_encode($fallback, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT)
    );
}
