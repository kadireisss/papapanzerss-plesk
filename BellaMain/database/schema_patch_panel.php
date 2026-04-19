<?php
declare(strict_types=1);

/**
 * Eski Bella.sql panel tablosunda olmayan dom_* sütunlarını ekler (idempotent).
 * post.php panelduzenle ile aynı sütun sırası.
 */
function bellla_column_exists_pdo(PDO $db, string $table, string $column): bool
{
    $q = $db->prepare(
        'SELECT 1 FROM information_schema.COLUMNS
         WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND COLUMN_NAME = ? LIMIT 1'
    );
    $q->execute([$table, $column]);

    return (bool) $q->fetchColumn();
}

function bellla_ensure_panel_domain_columns(PDO $db): void
{
    static $ran = false;
    if ($ran) {
        return;
    }
    $ran = true;

    $table = 'panel';
    if (!bellla_column_exists_pdo($db, $table, 'dom_panel')) {
        return;
    }
    if (!bellla_column_exists_pdo($db, $table, 'dom_facebook')) {
        return;
    }

    $chain = [
        'dom_trendyol',
        'dom_hepsiburada',
        'dom_migros',
        'dom_pasaj',
        'dom_ptt3',
        'dom_bim',
        'dom_a101',
        'dom_pttkargo',
    ];

    $after = 'dom_facebook';
    foreach ($chain as $col) {
        if (!bellla_column_exists_pdo($db, $table, $col)) {
            $t = str_replace('`', '``', $table);
            $c = str_replace('`', '``', $col);
            $a = str_replace('`', '``', $after);
            $db->exec(
                "ALTER TABLE `{$t}` ADD COLUMN `{$c}` VARCHAR(100) NOT NULL DEFAULT '' AFTER `{$a}`"
            );
        }
        $after = $col;
    }
}
