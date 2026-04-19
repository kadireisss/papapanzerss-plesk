<?php
/**
 * PANZER · KOMUTA MERKEZI — admin paneli (v3, sifirdan)
 * Logo: assets/media/panzer-mark.png  ·  Imza: PANZER · the designedbybossxxlife
 *
 * Backend uyumu icin DOKUNULMAYAN seyler:
 *   - modal id:     #adminmodal
 *   - form id'leri: #kt_admin_form, #kt_admin_form2
 *   - submit id:    #kt_admin_submit, #kt_admin_submit2
 *   - tab id'leri:  #kt_tab_updatepanel, #kt_tab_userlist, #kt_tab_reflist
 *   - field name'leri: ibanad, iban, banka,
 *                      dom_panel/dom_sahibinden/dom_dolap/dom_letgo/dom_pttavm/
 *                      dom_turkcell/dom_shopier/dom_yurtici/dom_facebook,
 *                      adminbot_token/_chatid, cekimbot_token/_chatid,
 *                      dekontbot_token/_chatid, vergibot_token/_chatid,
 *                      ref_id, panelduzenle (hidden), refekle (hidden)
 *   - delete data attr'lari: data-action="deluser" / "delref" + data-id + .delete-button
 *   - edit user akisi: #editUser + #modal-user-edit + #dashuser
 *   - degeriDegistir() + input1..input8 id'leri (toplu domain)
 */

require_once __DIR__ . '/../avatar_helper.php';
require_once __DIR__ . '/../panzer_brand.php';
require_once __DIR__ . '/../admin_helper.php';

// Yetki: admin/mod degilse render bile etme
$pzrRoleQ = $db->prepare("SELECT k_rol FROM kullanicilar WHERE kullaniciadi = :u AND (k_rol = 'admin' OR k_rol = 'mod') LIMIT 1");
$pzrRoleQ->execute([':u' => $kul_id]);
$pzrRoleRow = $pzrRoleQ->fetch(PDO::FETCH_ASSOC);
if (!$pzrRoleRow) { return; }
$pzrIsAdmin = ($pzrRoleRow['k_rol'] === 'admin');

// Panel ayarlari
$pzrPanelQ = $db->prepare("SELECT * FROM panel WHERE id = 1 LIMIT 1");
$pzrPanelQ->execute();
$pzrPanel = $pzrPanelQ->fetch(PDO::FETCH_ASSOC) ?: [];

$pzrEsc = static fn($v) => htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8');
$pzrPv  = static function (string $k) use ($pzrPanel, $pzrEsc): string {
    return $pzrEsc($pzrPanel[$k] ?? '');
};

// Bankalar
$pzrBankalar = [
    'Akbank', 'Ziraat Bankasi', 'QNB Finansbank', 'Garanti BBVA',
    'Turk Ekonomi Bankasi (TEB)', 'Turkiye Is Bankasi', 'Yapi ve Kredi Bankasi',
    'DenizBank A.S.', 'Fibabanka', 'Kuveyt Turk', 'Halkbank', 'VakifBank',
    'ING', 'Aktifbank', 'Sekerbank', 'Burganbank',
    'Albaraka Turk Katilim Bankasi', 'Turkiye Finans Bankasi',
];

// Pazaryeri tanimlari (UI) — tum aktif platformlar (Facebook KULLANILMIYOR, kaldirildi)
$pzrDomains = [
    ['name' => 'dom_panel',        'label' => 'Panel',        'badge' => 'PN', 'color' => '#c41e3a'],
    ['name' => 'dom_sahibinden',   'label' => 'Sahibinden',   'badge' => 'SH', 'color' => '#ffb000'],
    ['name' => 'dom_dolap',        'label' => 'Dolap',        'badge' => 'DP', 'color' => '#ff5e7e'],
    ['name' => 'dom_letgo',        'label' => 'Letgo',        'badge' => 'LG', 'color' => '#ff7a00'],
    ['name' => 'dom_pttavm',       'label' => 'PttAVM',       'badge' => 'PT', 'color' => '#0058a3'],
    ['name' => 'dom_turkcell',     'label' => 'Turkcell',     'badge' => 'TC', 'color' => '#ffd400'],
    ['name' => 'dom_shopier',      'label' => 'Shopier',      'badge' => 'SP', 'color' => '#7c4dff'],
    ['name' => 'dom_yurtici',      'label' => 'Yurtici',      'badge' => 'YK', 'color' => '#e60000'],
    ['name' => 'dom_trendyol',     'label' => 'Trendyol',     'badge' => 'TY', 'color' => '#f27a1a'],
    ['name' => 'dom_hepsiburada',  'label' => 'Hepsiburada',  'badge' => 'HB', 'color' => '#ff6000'],
    ['name' => 'dom_migros',       'label' => 'Migros',       'badge' => 'MG', 'color' => '#16a34a'],
    ['name' => 'dom_pasaj',        'label' => 'Pasaj',        'badge' => 'PJ', 'color' => '#0d6efd'],
    ['name' => 'dom_ptt3',         'label' => 'PttAVM+',      'badge' => 'P+', 'color' => '#222222'],
    ['name' => 'dom_bim',          'label' => 'Bim',          'badge' => 'BI', 'color' => '#e91e63'],
    ['name' => 'dom_a101',         'label' => 'A101',         'badge' => 'A1', 'color' => '#c62828'],
    ['name' => 'dom_pttkargo',     'label' => 'PTT Kargo',    'badge' => 'PK', 'color' => '#ffc107'],
];

// Bot tanimlari
$pzrBots = [
    ['key' => 'adminbot',  'label' => 'Admin Bot',  'icon' => 'fa-shield',  'class' => 'is-admin',  'desc' => 'Panel & yonetim olaylari'],
    ['key' => 'cekimbot',  'label' => 'Cekim Bot',  'icon' => 'fa-money',   'class' => 'is-cekim',  'desc' => 'Cekim talepleri & onay'],
    ['key' => 'dekontbot', 'label' => 'Dekont Bot', 'icon' => 'fa-file-text-o', 'class' => 'is-dekont', 'desc' => 'Yuklenen dekontlar'],
    ['key' => 'vergibot',  'label' => 'Vergi Bot',  'icon' => 'fa-percent', 'class' => 'is-vergi',  'desc' => 'Komisyon & vergi olaylari'],
];

// Stats
$pzrSummary = $db->query("SELECT COUNT(*) AS toplam, COALESCE(SUM(CAST(bakiye AS DECIMAL(18,2))), 0) AS bakiye_toplam FROM kullanicilar")
    ->fetch(PDO::FETCH_ASSOC) ?: ['toplam' => 0, 'bakiye_toplam' => 0];

$pzrRefCount = (int)($db->query("SELECT COUNT(*) AS c FROM refkodlari")->fetch(PDO::FETCH_ASSOC)['c'] ?? 0);

$pzrCekimCount = 0;
try {
    $pzrCekimCount = (int)($db->query("SELECT COUNT(*) AS c FROM cekimtalepleri WHERE durum = 'Beklemede'")->fetch(PDO::FETCH_ASSOC)['c'] ?? 0);
} catch (\Throwable $e) { /* tablo yoksa sessiz */ }

$pzrActiveBots = 0;
foreach ($pzrBots as $b) {
    if (!empty($pzrPanel[$b['key'] . '_token'])) { $pzrActiveBots++; }
}

$pzrUserListQ = $db->prepare("SELECT id, kullaniciadi, bakiye, k_rol, userimage FROM kullanicilar WHERE id != 1 ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
$pzrUserListQ->execute();
$pzrUserList = $pzrUserListQ->fetchAll(PDO::FETCH_ASSOC);

$pzrRefListQ = $db->prepare("SELECT id, ref_code FROM refkodlari ORDER BY id DESC LIMIT " . bellla_dashboard_list_limit());
$pzrRefListQ->execute();
$pzrRefList = $pzrRefListQ->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="modal fade" id="adminmodal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content pzr-shell">

      <!-- ============== HEADER ============== -->
      <header class="pzr-header">
        <div class="pzr-brand">
          <div class="pzr-brand__dragon">
            <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="PANZER">
          </div>
          <div class="pzr-brand__text">
            <div class="pzr-brand__title">
              <span class="pzr-brand__panzer">PANZER</span>
              <span class="pzr-brand__sep">·</span>
              <span class="pzr-brand__sub">Komuta Merkezi</span>
            </div>
            <div class="pzr-brand__signature">
              the <em>designedbybossxxlife</em>
            </div>
          </div>
        </div>

        <div class="pzr-header__right">
          <span class="pzr-role-pill">
            <span class="dot"></span>
            <?php echo $pzrIsAdmin ? 'ADMIN' : 'MODERATOR'; ?>
          </span>
          <button type="button" class="pzr-close-btn" data-bs-dismiss="modal" aria-label="Kapat">
            <i class="fa fa-times fs-4"></i>
          </button>
        </div>
      </header>

      <!-- ============== BODY ============== -->
      <div class="pzr-body">

        <!-- ====== SIDE NAV ====== -->
        <nav class="pzr-nav" id="pzrNav">
          <div class="pzr-nav__heading">Panel</div>

          <div class="pzr-nav__item is-active" data-pane="overview" data-tab="kt_tab_updatepanel">
            <span class="pzr-nav__icon"><i class="fa fa-th-large"></i></span>
            <span>Genel Bakis</span>
          </div>
          <div class="pzr-nav__item" data-pane="iban" data-tab="kt_tab_updatepanel">
            <span class="pzr-nav__icon"><i class="fa fa-credit-card"></i></span>
            <span>Odeme &amp; IBAN</span>
          </div>
          <div class="pzr-nav__item" data-pane="domain" data-tab="kt_tab_updatepanel">
            <span class="pzr-nav__icon"><i class="fa fa-globe"></i></span>
            <span>Domainler</span>
            <span class="pzr-nav__badge"><?php echo count($pzrDomains); ?></span>
          </div>
          <?php if ($pzrIsAdmin): ?>
            <div class="pzr-nav__item" data-pane="bot" data-tab="kt_tab_updatepanel">
              <span class="pzr-nav__icon"><i class="fa fa-paper-plane"></i></span>
              <span>Telegram Botlari</span>
              <span class="pzr-nav__badge"><?php echo $pzrActiveBots; ?>/4</span>
            </div>
          <?php endif; ?>

          <div class="pzr-nav__heading">Yonetim</div>

          <div class="pzr-nav__item" data-pane="users" data-tab="kt_tab_userlist">
            <span class="pzr-nav__icon"><i class="fa fa-users"></i></span>
            <span>Kullanicilar</span>
            <span class="pzr-nav__badge"><?php echo (int)$pzrSummary['toplam']; ?></span>
          </div>
          <?php if ($pzrIsAdmin): ?>
            <div class="pzr-nav__item" data-pane="refs" data-tab="kt_tab_reflist">
              <span class="pzr-nav__icon"><i class="fa fa-key"></i></span>
              <span>Davet Kodlari</span>
              <span class="pzr-nav__badge"><?php echo $pzrRefCount; ?></span>
            </div>
          <?php endif; ?>

          <div class="pzr-nav__sig">
            <img src="<?php echo $pzrEsc(panzer_brand_dragon_url()); ?>" alt="">
            <div class="pzr-nav__sig-text">
              <strong>PANZER</strong>
              the designedbybossxxlife
            </div>
          </div>
        </nav>

        <!-- ====== CONTENT ====== -->
        <div class="pzr-content tab-content" id="pzrContent">

          <!-- ===== TAB: PANEL (overview + iban + domain + bot) ===== -->
          <div class="tab-pane fade show active" id="kt_tab_updatepanel" role="tabpanel">
            <form id="kt_admin_form" autocomplete="off">

              <!-- pane: Genel Bakis -->
              <section class="pzr-pane is-active" data-pane="overview">
                <div class="pzr-pane__head">
                  <div>
                    <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Genel Bakis</h3>
                    <div class="pzr-pane__sub">PANZER · the designedbybossxxlife operasyon ozeti</div>
                  </div>
                </div>

                <div class="pzr-stats">
                  <div class="pzr-stat">
                    <span class="pzr-stat__icon"><i class="fa fa-users"></i></span>
                    <div class="pzr-stat__label">Kullanici</div>
                    <div class="pzr-stat__value"><?php echo (int)$pzrSummary['toplam']; ?></div>
                    <div class="pzr-stat__hint">kayitli toplam hesap</div>
                  </div>
                  <div class="pzr-stat">
                    <span class="pzr-stat__icon"><i class="fa fa-money"></i></span>
                    <div class="pzr-stat__label">Toplam Bakiye</div>
                    <div class="pzr-stat__value">&#8378;<?php echo number_format((float)$pzrSummary['bakiye_toplam'], 0, ',', '.'); ?></div>
                    <div class="pzr-stat__hint">tum kullanicilar</div>
                  </div>
                  <div class="pzr-stat">
                    <span class="pzr-stat__icon"><i class="fa fa-key"></i></span>
                    <div class="pzr-stat__label">Davet Kodu</div>
                    <div class="pzr-stat__value"><?php echo $pzrRefCount; ?></div>
                    <div class="pzr-stat__hint">aktif kullanim disi</div>
                  </div>
                  <div class="pzr-stat">
                    <span class="pzr-stat__icon"><i class="fa fa-paper-plane"></i></span>
                    <div class="pzr-stat__label">Aktif Bot</div>
                    <div class="pzr-stat__value"><?php echo $pzrActiveBots; ?>/4</div>
                    <div class="pzr-stat__hint">telegram entegrasyonu</div>
                  </div>
                  <div class="pzr-stat">
                    <span class="pzr-stat__icon"><i class="fa fa-clock-o"></i></span>
                    <div class="pzr-stat__label">Cekim Talebi</div>
                    <div class="pzr-stat__value"><?php echo $pzrCekimCount; ?></div>
                    <div class="pzr-stat__hint">beklemede</div>
                  </div>
                </div>

                <div class="pzr-card">
                  <div class="pzr-card__head">
                    <div>
                      <div class="pzr-card__title"><span class="pzr-dot"></span>Hizli giris</div>
                      <div class="pzr-card__sub">Soldaki menuden ilgili bolume gec</div>
                    </div>
                  </div>
                  <div class="pzr-stats" style="margin-bottom: 0;">
                    <div class="pzr-stat" data-jump="iban" style="cursor:pointer;">
                      <span class="pzr-stat__icon"><i class="fa fa-credit-card"></i></span>
                      <div class="pzr-stat__label">IBAN</div>
                      <div class="pzr-stat__value" style="font-size:1.1rem;"><?php echo $pzrPv('banka') ?: '— bos —'; ?></div>
                      <div class="pzr-stat__hint"><?php echo $pzrPv('ibanad') ?: 'henuz tanimlanmadi'; ?></div>
                    </div>
                    <div class="pzr-stat" data-jump="domain" style="cursor:pointer;">
                      <span class="pzr-stat__icon"><i class="fa fa-globe"></i></span>
                      <div class="pzr-stat__label">Domainler</div>
                      <div class="pzr-stat__value" style="font-size:1.1rem;"><?php echo count($pzrDomains); ?> adet</div>
                      <div class="pzr-stat__hint">pazaryeri ayarlari</div>
                    </div>
                    <?php if ($pzrIsAdmin): ?>
                      <div class="pzr-stat" data-jump="bot" style="cursor:pointer;">
                        <span class="pzr-stat__icon"><i class="fa fa-paper-plane"></i></span>
                        <div class="pzr-stat__label">Botlar</div>
                        <div class="pzr-stat__value" style="font-size:1.1rem;"><?php echo $pzrActiveBots; ?>/4 aktif</div>
                        <div class="pzr-stat__hint">token & chat id</div>
                      </div>
                    <?php endif; ?>
                    <div class="pzr-stat" data-jump="users" style="cursor:pointer;">
                      <span class="pzr-stat__icon"><i class="fa fa-users"></i></span>
                      <div class="pzr-stat__label">Kullanicilar</div>
                      <div class="pzr-stat__value" style="font-size:1.1rem;"><?php echo (int)$pzrSummary['toplam']; ?> kayit</div>
                      <div class="pzr-stat__hint">duzenle, bakiye, sil</div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- pane: IBAN -->
              <section class="pzr-pane" data-pane="iban">
                <div class="pzr-pane__head">
                  <div>
                    <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Odeme &amp; IBAN</h3>
                    <div class="pzr-pane__sub">Tum cekim/odeme akislarinda bu IBAN bilgisi kullanilir.</div>
                  </div>
                </div>

                <div class="pzr-iban-preview">
                  <div style="position:relative; z-index:1; min-width:0;">
                    <div class="pzr-iban-preview__chip">Aktif IBAN</div>
                    <div class="pzr-iban-preview__no" id="pzrIbanPreview"><?php echo $pzrPv('iban') ?: '— henuz tanimli degil —'; ?></div>
                  </div>
                  <div class="pzr-iban-preview__meta">
                    <span class="pzr-iban-preview__name" id="pzrIbanAdPreview"><?php echo $pzrPv('ibanad') ?: '—'; ?></span>
                    <span class="pzr-iban-preview__bank" id="pzrIbanBankPreview"><?php echo $pzrPv('banka') ?: '—'; ?></span>
                  </div>
                </div>

                <div class="pzr-card">
                  <div class="pzr-card__head">
                    <div>
                      <div class="pzr-card__title"><span class="pzr-dot"></span>IBAN bilgileri</div>
                      <div class="pzr-card__sub">Hesap sahibi, IBAN ve banka adi</div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <div class="col-lg-4">
                      <div class="pzr-field">
                        <label class="pzr-field__label">Ad Soyad</label>
                        <input class="form-control" type="text" name="ibanad" id="pzrFieldAd" value="<?php echo $pzrPv('ibanad'); ?>" autocomplete="off" placeholder="Hesap sahibi">
                      </div>
                    </div>
                    <div class="col-lg-5">
                      <div class="pzr-field">
                        <label class="pzr-field__label">IBAN</label>
                        <div class="pzr-input-wrap">
                          <input class="form-control" type="text" name="iban" id="pzrFieldIban" value="<?php echo $pzrPv('iban'); ?>" autocomplete="off" placeholder="TR00 0000 0000 0000 0000 0000 00" style="padding-right:46px;">
                          <span class="pzr-input-actions">
                            <button type="button" class="pzr-icon-btn" data-pzr-copy="#pzrFieldIban" title="Kopyala"><i class="fa fa-copy"></i></button>
                          </span>
                        </div>
                        <div class="pzr-field__hint">Bosluklar otomatik bicimlendirilir.</div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="pzr-field">
                        <label class="pzr-field__label">Banka</label>
                        <select class="form-select" name="banka" id="pzrFieldBanka" data-control="select2" data-hide-search="true" data-dropdown-parent="#adminmodal">
                          <option value="" <?php echo $pzrPv('banka') === '' ? 'selected' : ''; ?>>Secim yapiniz</option>
                          <?php foreach ($pzrBankalar as $banka):
                            $sel = ($pzrPv('banka') === $pzrEsc($banka)) ? 'selected' : ''; ?>
                            <option value="<?php echo $pzrEsc($banka); ?>" <?php echo $sel; ?>><?php echo $pzrEsc($banka); ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

              <!-- pane: Domain -->
              <section class="pzr-pane" data-pane="domain">
                <div class="pzr-pane__head">
                  <div>
                    <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Pazaryeri Domainleri</h3>
                    <div class="pzr-pane__sub">Tek noktadan yonet — toplu degistirme ile <code>.com</code> sonrasi kismi tum pazaryerlerine uygula.</div>
                  </div>
                </div>

                <div class="pzr-card">
                  <div class="pzr-card__head">
                    <div>
                      <div class="pzr-card__title"><span class="pzr-dot"></span>Toplu domain degistir</div>
                      <div class="pzr-card__sub">Tum pazaryerlerinin nokta-sonrasi uzantisini guncelle</div>
                    </div>
                  </div>
                  <div class="row g-2 align-items-end">
                    <div class="col-md-9">
                      <div class="pzr-field" style="margin-bottom:0;">
                        <label class="pzr-field__label">Yeni uzanti</label>
                        <input class="form-control" type="text" id="input1" placeholder="orn: yeni.alanadi.com" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="pzr-cta w-100 justify-content-center" onclick="degeriDegistir()" style="padding:0.65rem 1rem;">
                        <i class="fa fa-bolt"></i><span>Degistir</span>
                      </button>
                    </div>
                  </div>
                </div>

                <div class="pzr-card">
                  <div class="pzr-card__head">
                    <div>
                      <div class="pzr-card__title"><span class="pzr-dot"></span>Pazaryeri basina</div>
                      <div class="pzr-card__sub">Her pazaryeri icin ayri domain</div>
                    </div>
                  </div>
                  <div class="pzr-domain-grid">
                    <?php $pzrDomIdx = 1; foreach ($pzrDomains as $d):
                      $isPanel  = $d['name'] === 'dom_panel';
                      $value    = $isPanel ? ($_SERVER['HTTP_HOST'] ?? '') : ($pzrPanel[$d['name']] ?? '');
                      $valueEsc = $pzrEsc($value);
                      $color    = $pzrEsc($d['color']);
                      $inputId  = $isPanel ? '' : 'input' . $pzrDomIdx;
                      if (!$isPanel) { $pzrDomIdx++; } ?>
                      <div class="pzr-domain-card">
                        <div class="pzr-domain-card__head">
                          <div class="pzr-domain-card__name">
                            <span class="pzr-tag" style="background: <?php echo $color; ?>22; color: <?php echo $color; ?>; border:1px solid <?php echo $color; ?>55;">
                              <?php echo $pzrEsc($d['badge']); ?>
                            </span>
                            <?php echo $pzrEsc($d['label']); ?>
                          </div>
                          <?php if (!$isPanel): ?>
                            <a href="https://<?php echo $valueEsc; ?>" target="_blank" rel="noopener" class="pzr-icon-btn" title="Ac">
                              <i class="fa fa-external-link"></i>
                            </a>
                          <?php endif; ?>
                        </div>
                        <div class="pzr-input-wrap">
                          <input class="form-control" type="text" name="<?php echo $pzrEsc($d['name']); ?>" <?php echo $inputId ? 'id="' . $inputId . '"' : ''; ?> value="<?php echo $valueEsc; ?>" <?php echo $isPanel ? 'readonly' : ''; ?> autocomplete="off" placeholder="alanadi.com" style="padding-right:46px;">
                          <span class="pzr-input-actions">
                            <button type="button" class="pzr-icon-btn" data-pzr-copy='input[name="<?php echo $pzrEsc($d['name']); ?>"]' title="Kopyala">
                              <i class="fa fa-copy"></i>
                            </button>
                          </span>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </section>

              <!-- pane: Bot (admin only) -->
              <?php if ($pzrIsAdmin): ?>
                <section class="pzr-pane" data-pane="bot">
                  <div class="pzr-pane__head">
                    <div>
                      <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Telegram Botlari</h3>
                      <div class="pzr-pane__sub">Token ve chat ID — tokenler maskelidir, goz simgesine basin.</div>
                    </div>
                  </div>

                  <?php foreach ($pzrBots as $bot):
                    $tokenName  = $bot['key'] . '_token';
                    $chatidName = $bot['key'] . '_chatid';
                    $tokenVal   = $pzrPv($tokenName);
                    $chatidVal  = $pzrPv($chatidName);
                  ?>
                    <div class="pzr-bot-card">
                      <div class="pzr-bot-card__head">
                        <div class="pzr-bot-card__name">
                          <span class="pzr-bot-card__icon <?php echo $pzrEsc($bot['class']); ?>">
                            <i class="fa <?php echo $pzrEsc($bot['icon']); ?>"></i>
                          </span>
                          <div>
                            <div class="pzr-bot-card__title-line"><?php echo $pzrEsc($bot['label']); ?></div>
                            <div class="pzr-bot-card__desc"><?php echo $pzrEsc($bot['desc']); ?></div>
                          </div>
                        </div>
                        <span class="pzr-pill <?php echo $tokenVal !== '' ? 'pzr-pill--on' : 'pzr-pill--off'; ?>">
                          <?php echo $tokenVal !== '' ? 'AKTIF' : 'BOS'; ?>
                        </span>
                      </div>
                      <div class="pzr-bot-card__grid">
                        <div class="pzr-field" style="margin-bottom:0;">
                          <label class="pzr-field__label">Bot Token</label>
                          <div class="pzr-input-wrap">
                            <input class="form-control" type="password" name="<?php echo $pzrEsc($tokenName); ?>" value="<?php echo $tokenVal; ?>" autocomplete="off" placeholder="123456:AAEx..." style="padding-right:84px; font-family: ui-monospace, monospace;">
                            <span class="pzr-input-actions">
                              <button type="button" class="pzr-icon-btn" data-pzr-toggle title="Goster/gizle"><i class="fa fa-eye"></i></button>
                              <button type="button" class="pzr-icon-btn" data-pzr-copy='input[name="<?php echo $pzrEsc($tokenName); ?>"]' title="Kopyala"><i class="fa fa-copy"></i></button>
                            </span>
                          </div>
                        </div>
                        <div class="pzr-field" style="margin-bottom:0;">
                          <label class="pzr-field__label">Chat ID</label>
                          <div class="pzr-input-wrap">
                            <input class="form-control" type="text" name="<?php echo $pzrEsc($chatidName); ?>" value="<?php echo $chatidVal; ?>" autocomplete="off" placeholder="-1001234567890" style="padding-right:46px;">
                            <span class="pzr-input-actions">
                              <button type="button" class="pzr-icon-btn" data-pzr-copy='input[name="<?php echo $pzrEsc($chatidName); ?>"]' title="Kopyala"><i class="fa fa-copy"></i></button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </section>
              <?php endif; ?>

              <input type="hidden" name="panelduzenle" value="<?php echo isset($id_sfrli) ? $pzrEsc($id_sfrli) : ''; ?>">
            </form>
          </div>

          <!-- ===== TAB: Kullanicilar ===== -->
          <div class="tab-pane fade" id="kt_tab_userlist" role="tabpanel">
            <div class="pzr-pane is-active" data-pane="users">
              <div class="pzr-pane__head">
                <div>
                  <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Kullanicilar</h3>
                  <div class="pzr-pane__sub">Bakiye duzenleme ve silme islemleri sadece <strong>admin</strong> rolu icin.</div>
                </div>
              </div>

              <div class="pzr-stats">
                <div class="pzr-stat">
                  <span class="pzr-stat__icon"><i class="fa fa-users"></i></span>
                  <div class="pzr-stat__label">Toplam</div>
                  <div class="pzr-stat__value"><?php echo (int)$pzrSummary['toplam']; ?></div>
                </div>
                <div class="pzr-stat">
                  <span class="pzr-stat__icon"><i class="fa fa-money"></i></span>
                  <div class="pzr-stat__label">Toplam bakiye</div>
                  <div class="pzr-stat__value">&#8378;<?php echo number_format((float)$pzrSummary['bakiye_toplam'], 0, ',', '.'); ?></div>
                </div>
              </div>

              <div class="pzr-list">
                <?php if (count($pzrUserList) === 0): ?>
                  <div class="pzr-empty">
                    <i class="pzr-empty__icon fa fa-users"></i>
                    Henuz baska kullanici yok.
                  </div>
                <?php else: foreach ($pzrUserList as $u):
                  $rol = $u['k_rol'] ?? '';
                  $rolClass = $rol === 'admin' ? 'pzr-pill--admin' : ($rol === 'mod' ? 'pzr-pill--mod' : 'pzr-pill--user');
                  $rolLabel = $rol === '' ? 'USER' : strtoupper($rol);
                ?>
                  <div class="pzr-user-row">
                    <div class="pzr-user-row__left">
                      <div class="pzr-user-row__avatar">
                        <?php echo bellla_avatar_img_html($u['userimage'] ?? null, 44, 44); ?>
                      </div>
                      <div style="min-width:0;">
                        <div class="pzr-user-row__name">
                          <?php echo $pzrEsc($u['kullaniciadi']); ?>
                          <span class="pzr-pill <?php echo $rolClass; ?>"><?php echo $pzrEsc($rolLabel); ?></span>
                        </div>
                        <div class="pzr-user-row__desc">
                          Bakiye: <span class="pzr-user-row__bakiye">&#8378;<?php echo $pzrEsc((string)$u['bakiye']); ?></span>
                        </div>
                      </div>
                    </div>
                    <?php if ($pzrIsAdmin): ?>
                      <div class="pzr-user-row__actions">
                        <a href="#" class="pzr-icon-btn editUser" id="editUser" data-bs-toggle="modal" data-bs-target="#modal-user-edit" data-id="<?php echo (int)$u['id']; ?>" title="Duzenle">
                          <i class="fa fa-cog"></i>
                        </a>
                        <a href="#" class="pzr-icon-btn delete-button" data-id="<?php echo (int)$u['id']; ?>" data-action="deluser" title="Sil">
                          <i class="fa fa-trash"></i>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php endforeach; endif; ?>
              </div>
            </div>
          </div>

          <!-- ===== TAB: Davet Kodlari ===== -->
          <?php if ($pzrIsAdmin): ?>
            <div class="tab-pane fade" id="kt_tab_reflist" role="tabpanel">
              <div class="pzr-pane is-active" data-pane="refs">
                <div class="pzr-pane__head">
                  <div>
                    <h3 class="pzr-pane__title"><span class="pzr-bar"></span>Davet Kodlari</h3>
                    <div class="pzr-pane__sub">Yeni kayit icin davet kodu uret. Ayni kod birden fazla eklenemez.</div>
                  </div>
                  <div class="pzr-stats" style="margin:0; min-width:180px;">
                    <div class="pzr-stat">
                      <div class="pzr-stat__label">Aktif kod</div>
                      <div class="pzr-stat__value"><?php echo $pzrRefCount; ?></div>
                    </div>
                  </div>
                </div>

                <div class="pzr-card">
                  <form id="kt_admin_form2" autocomplete="off">
                    <div class="row g-2 align-items-end">
                      <div class="col-md-9">
                        <div class="pzr-field" style="margin-bottom:0;">
                          <label class="pzr-field__label">Davet kodu</label>
                          <div class="pzr-input-wrap">
                            <input class="form-control randomref" type="text" name="ref_id" readonly autocomplete="off" placeholder="Uret butonuna basin" style="padding-right:46px; font-family: ui-monospace, monospace; letter-spacing: 0.18em; font-weight:700;">
                            <span class="pzr-input-actions">
                              <button type="button" class="pzr-icon-btn" data-pzr-copy=".randomref" title="Kopyala"><i class="fa fa-copy"></i></button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3 d-flex gap-2">
                        <button type="button" class="pzr-cta generateref" style="padding:0.65rem 1rem; flex:1; background: linear-gradient(135deg, #444, #666); box-shadow: 0 6px 20px rgba(0,0,0,0.4);">
                          <i class="fa fa-random"></i><span>Uret</span>
                        </button>
                        <button type="submit" id="kt_admin_submit2" class="pzr-cta" style="padding:0.65rem 1rem; flex:1;">
                          <span class="indicator-label"><i class="fa fa-plus"></i><span style="margin-left:0.4rem;">Ekle</span></span>
                          <span class="indicator-progress">Kaydediliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                      </div>
                    </div>
                    <input type="hidden" name="refekle" value="refekle">
                  </form>
                </div>

                <div class="pzr-list" style="max-height: 320px; overflow-y: auto;">
                  <?php if (count($pzrRefList) === 0): ?>
                    <div class="pzr-empty">
                      <i class="pzr-empty__icon fa fa-key"></i>
                      Henuz davet kodu yok. Uret &amp; Ekle butonuyla basla.
                    </div>
                  <?php else: foreach ($pzrRefList as $r): ?>
                    <div class="pzr-ref-row">
                      <code><?php echo $pzrEsc($r['ref_code']); ?></code>
                      <div class="pzr-user-row__actions">
                        <button type="button" class="pzr-icon-btn" data-pzr-copy-text="<?php echo $pzrEsc($r['ref_code']); ?>" title="Kopyala">
                          <i class="fa fa-copy"></i>
                        </button>
                        <a href="#" class="pzr-icon-btn delete-button" data-id="<?php echo (int)$r['id']; ?>" data-action="delref" title="Sil">
                          <i class="fa fa-trash"></i>
                        </a>
                      </div>
                    </div>
                  <?php endforeach; endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

        </div>
      </div>

      <!-- ============== FOOTER ============== -->
      <footer class="pzr-footer">
        <div class="pzr-footer__hint">
          <i class="fa fa-shield"></i>
          <span>PANZER · the designedbybossxxlife — tum degisiklikler sifrelenmis kanal uzerinden</span>
        </div>

        <div class="pzr-footer__pane is-active" data-footer="kt_tab_updatepanel">
          <button type="submit" form="kt_admin_form" id="kt_admin_submit" class="pzr-cta">
            <span class="indicator-label"><i class="fa fa-save"></i><span style="margin-left:0.5rem;">Tum degisiklikleri kaydet</span></span>
            <span class="indicator-progress">Kaydediliyor… <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
          </button>
        </div>

        <div class="pzr-footer__pane" data-footer="kt_tab_userlist">
          <span class="pzr-footer__hint"><i class="fa fa-info-circle"></i> Duzenleme/silme satir ici butonlardan yapilir.</span>
        </div>

        <div class="pzr-footer__pane" data-footer="kt_tab_reflist">
          <span class="pzr-footer__hint"><i class="fa fa-info-circle"></i> Uretilen kodu kullaniciyla paylas.</span>
        </div>
      </footer>

    </div>
  </div>
</div>

<!-- Edit user popup (legacy AJAX target) -->
<div class="modal fade" tabindex="-1" id="modal-user-edit">
  <div class="modal-dialog modal-dialog-centered mw-750px">
    <div class="modal-content rounded">
      <div id="dashuser"></div>
    </div>
  </div>
</div>

<!-- ============== JS ============== -->
<script>
/* Toplu domain degistir — orijinal davranis korunur (input1..input8). */
function degeriDegistir() {
  var src = document.getElementById("input1");
  if (!src) return;
  var newPart = src.value;
  var ids = ["input2", "input3", "input4", "input5", "input6", "input7", "input8"];
  for (var i = 0; i < ids.length; i++) {
    var el = document.getElementById(ids[i]);
    if (!el) continue;
    var v = el.value;
    if (v.indexOf(".") !== -1) {
      v = v.substring(0, v.indexOf(".") + 1) + newPart;
    } else {
      v = newPart;
    }
    el.value = v;
  }
}
</script>

<script>
(function () {
  var modal = document.getElementById('adminmodal');
  if (!modal) return;

  /* ---------- side nav + tab switcher ---------- */
  var pills    = modal.querySelectorAll('.pzr-nav__item');
  var tabPanes = modal.querySelectorAll('#pzrContent > .tab-pane');
  var subPanes = modal.querySelectorAll('.pzr-pane');
  var footers  = modal.querySelectorAll('.pzr-footer__pane');

  function activate(targetTab, targetPane) {
    pills.forEach(function (p) {
      p.classList.toggle('is-active', p.dataset.pane === targetPane);
    });
    tabPanes.forEach(function (tp) {
      var on = (tp.id === targetTab);
      tp.classList.toggle('show', on);
      tp.classList.toggle('active', on);
    });
    subPanes.forEach(function (sp) {
      sp.classList.toggle('is-active', sp.dataset.pane === targetPane);
    });
    footers.forEach(function (f) {
      f.classList.toggle('is-active', f.dataset.footer === targetTab);
    });
    var content = document.getElementById('pzrContent');
    if (content) content.scrollTo({ top: 0, behavior: 'smooth' });
  }

  pills.forEach(function (pill) {
    pill.addEventListener('click', function () { activate(pill.dataset.tab, pill.dataset.pane); });
  });

  /* Genel Bakis "hizli kart" tiklamalari */
  modal.querySelectorAll('[data-jump]').forEach(function (el) {
    el.addEventListener('click', function () {
      var pane = el.getAttribute('data-jump');
      var pill = modal.querySelector('.pzr-nav__item[data-pane="' + pane + '"]');
      if (pill) pill.click();
    });
  });

  /* ---------- copy buttons ---------- */
  function copyToClipboard(text, btn) {
    if (!text) return;
    var done = function () {
      if (!btn) return;
      btn.classList.add('is-success');
      var icon = btn.querySelector('i');
      var prev = icon ? icon.className : '';
      if (icon) icon.className = 'fa fa-check';
      setTimeout(function () {
        btn.classList.remove('is-success');
        if (icon && prev) icon.className = prev;
      }, 1200);
    };
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(text).then(done).catch(function () {});
    } else {
      var ta = document.createElement('textarea');
      ta.value = text; ta.setAttribute('readonly', ''); ta.style.position = 'absolute'; ta.style.left = '-9999px';
      document.body.appendChild(ta); ta.select();
      try { document.execCommand('copy'); done(); } catch (e) {}
      document.body.removeChild(ta);
    }
  }

  modal.addEventListener('click', function (e) {
    var btn = e.target.closest('[data-pzr-copy], [data-pzr-copy-text]');
    if (!btn) return;
    var text = btn.getAttribute('data-pzr-copy-text') || '';
    var sel = btn.getAttribute('data-pzr-copy');
    if (sel) {
      var el = modal.querySelector(sel);
      if (el) text = (typeof el.value !== 'undefined') ? el.value : el.textContent;
    }
    copyToClipboard(text, btn);
  });

  /* ---------- token mask toggle ---------- */
  modal.addEventListener('click', function (e) {
    var t = e.target.closest('[data-pzr-toggle]');
    if (!t) return;
    var input = t.closest('.pzr-input-wrap').querySelector('input');
    if (!input) return;
    input.type = input.type === 'password' ? 'text' : 'password';
    var i = t.querySelector('i');
    if (i) i.className = input.type === 'password' ? 'fa fa-eye' : 'fa fa-eye-slash';
  });

  /* ---------- IBAN canli onizleme + auto format ---------- */
  var iban  = modal.querySelector('#pzrFieldIban');
  var ad    = modal.querySelector('#pzrFieldAd');
  var bk    = modal.querySelector('#pzrFieldBanka');
  var pIban = modal.querySelector('#pzrIbanPreview');
  var pAd   = modal.querySelector('#pzrIbanAdPreview');
  var pBank = modal.querySelector('#pzrIbanBankPreview');

  function fmtIban(v) {
    var clean = (v || '').toUpperCase().replace(/[^A-Z0-9]/g, '');
    return clean.replace(/(.{4})/g, '$1 ').trim();
  }

  if (iban) {
    iban.addEventListener('input', function () {
      var pos = iban.selectionStart;
      var before = iban.value.length;
      iban.value = fmtIban(iban.value);
      if (pIban) pIban.textContent = iban.value || '— henuz tanimli degil —';
      try { iban.setSelectionRange(pos + (iban.value.length - before), pos + (iban.value.length - before)); } catch (e) {}
    });
    iban.value = fmtIban(iban.value);
    if (pIban && iban.value) pIban.textContent = iban.value;
  }
  if (ad) ad.addEventListener('input', function () { if (pAd) pAd.textContent = ad.value || '—'; });
  if (bk) bk.addEventListener('change', function () { if (pBank) pBank.textContent = bk.value || '—'; });

  /* ---------- ref kodu uretici ---------- */
  var genBtn = modal.querySelector('.generateref');
  if (genBtn) {
    genBtn.addEventListener('click', function () {
      var chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      var out = '';
      for (var i = 0; i < 8; i++) out += chars.charAt(Math.floor(Math.random() * chars.length));
      var input = modal.querySelector('.randomref');
      if (input) {
        input.value = out;
        input.setAttribute('value', out);
      }
    });
  }

  /* ---------- edit user (AJAX, legacy) ---------- */
  if (window.jQuery) {
    jQuery(document).on('click', '.editUser, #editUser', function (e) {
      e.preventDefault();
      var uid = jQuery(this).data('id');
      var $box = jQuery('#dashuser');
      $box.html('');
      jQuery.ajax({ url: 'includes/editforms/edituser.php', type: 'POST', data: 'id=' + uid, dataType: 'html' })
        .done(function (data) { $box.html(data); })
        .fail(function () { $box.html('<div class="p-5 text-danger">Yuklenemedi, tekrar deneyin.</div>'); });
    });
  }
})();
</script>

<!-- form #kt_admin_form validation + submit -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  var formEl = document.querySelector('#kt_admin_form');
  if (!formEl) return;

  // FormValidation CDN yüklenmese bile kayıt butonu çalışmaya devam eder.
  // Ayrıca panel alanları opsiyonel: boş bırakılan alan kayıt akışını bloklamaz.
  var validator = null;
  if (window.FormValidation) {
    validator = FormValidation.formValidation(formEl, {
      fields: {},
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".pzr-field, .fv-row", eleInvalidClass: "", eleValidClass: "" })
      }
    });
  }

  function jumpToPaneOf(el) {
    var modal = document.getElementById('adminmodal');
    var pane = el && el.closest('.pzr-pane');
    if (pane && pane.dataset.pane) {
      var pill = modal.querySelector('.pzr-nav__item[data-pane="' + pane.dataset.pane + '"]');
      if (pill) pill.click();
    }
  }

  var submitBtn = document.querySelector('#kt_admin_submit');
  if (!submitBtn) return;

  submitBtn.addEventListener('click', function (e) {
    e.preventDefault();
    var validationRun = validator ? validator.validate() : Promise.resolve('Valid');
    Promise.resolve(validationRun).then(function (status) {
      if (status !== 'Valid') {
        var bad = formEl.querySelector('.form-control.is-invalid, .form-select.is-invalid, [aria-invalid="true"]');
        if (bad) jumpToPaneOf(bad);
        return;
      }

      submitBtn.setAttribute('data-kt-indicator', 'on');
      submitBtn.disabled = true;

      var formData = new FormData(formEl);
      fetch('database/post.php', { method: 'POST', body: formData })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href = 'dashboard'; return; }
          if (data.sonuc === 'tamam') {
            Swal.fire({ text: "Panel guncellendi.", icon: "success", buttonsStyling: false, timer: 1500, showConfirmButton: false })
              .then(function () { location.href = 'dashboard'; });
          } else if (data.sonuc === 'bos') {
            Swal.fire({ text: "Lutfen tum alanlari doldurun.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else if (data.sonuc === 'yetkisiz') {
            Swal.fire({ text: "Bu islem icin admin yetkisi gerekiyor.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else {
            var detay = (data && data.detay) ? ("\\nDetay: " + data.detay) : "";
            Swal.fire({ text: "Kayit sirasinda bir hata olustu." + detay, icon: "error", buttonsStyling: false, confirmButtonText: "Anladim", customClass: { confirmButton: "btn btn-primary" } });
          }
        })
        .catch(function () {
          if (window.Swal) Swal.fire({ text: "Sunucuya ulasilamadi.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
        })
        .finally(function () {
          submitBtn.removeAttribute('data-kt-indicator');
          submitBtn.disabled = false;
        });
    });
  });
});
</script>

<!-- form #kt_admin_form2 (ref ekle) -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  var formEl = document.querySelector('#kt_admin_form2');
  var submitBtn = document.querySelector('#kt_admin_submit2');
  if (!formEl || !submitBtn) return;

  var validator = null;
  if (window.FormValidation) {
    validator = FormValidation.formValidation(formEl, {
      fields: { "ref_id": { validators: { notEmpty: { message: "Once kod uretin" } } } },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".pzr-field, .fv-row", eleInvalidClass: "", eleValidClass: "" })
      }
    });
  }

  submitBtn.addEventListener('click', function (e) {
    e.preventDefault();
    var run = validator ? validator.validate() : Promise.resolve('Valid');
    Promise.resolve(run).then(function (status) {
      if (status !== 'Valid') return;
      submitBtn.setAttribute('data-kt-indicator', 'on');
      submitBtn.disabled = true;
      var fd = new FormData(formEl);
      fetch('database/post.php', { method: 'POST', body: fd })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (!window.Swal) { if (data && data.sonuc === 'tamam') location.href = 'dashboard'; return; }
          if (data.sonuc === 'tamam') {
            Swal.fire({ text: "Davet kodu eklendi.", icon: "success", buttonsStyling: false, timer: 1400, showConfirmButton: false })
              .then(function () { location.href = 'dashboard'; });
          } else if (data.sonuc === 'zatenVar') {
            Swal.fire({ text: "Bu kod zaten kayitli.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else if (data.sonuc === 'bos') {
            Swal.fire({ text: "Once kod uretin.", icon: "warning", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
          } else {
            Swal.fire({ text: "Bir yerde bir aksaklik var.", icon: "error", buttonsStyling: false, confirmButtonText: "Anladim", customClass: { confirmButton: "btn btn-primary" } });
          }
        })
        .catch(function () {
          if (window.Swal) Swal.fire({ text: "Sunucuya ulasilamadi.", icon: "error", buttonsStyling: false, confirmButtonText: "Tamam", customClass: { confirmButton: "btn btn-primary" } });
        })
        .finally(function () {
          submitBtn.removeAttribute('data-kt-indicator');
          submitBtn.disabled = false;
        });
    });
  });
});
</script>
