<?php
/**
 * Site kökü (Plesk httpdocs): panel girişine yönlendirir.
 * Sorgu dizesi iletilmez (kimlik bilgisi URL'de kalmasın).
 * Plesk notları: plesk/KURULUM.txt
 */
header('Location: /BellaMain/index.php', true, 302);
exit;
