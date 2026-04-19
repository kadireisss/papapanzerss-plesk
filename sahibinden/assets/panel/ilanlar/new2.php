<?php
include('../../../settings/router.php');
header( 'Content-Type: application/json' );

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}
function permalink($str, $options = array()){
     $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
     $defaults = array(
         'delimiter' => '-',
         'limit' => null,
         'lowercase' => true,
         'replacements' => array(),
         'transliterate' => true
     );
     $options = array_merge($defaults, $options);
     $char_map = array(
         'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
         'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
     );
     $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
     if ($options['transliterate']) {
         $str = str_replace(array_keys($char_map), $char_map, $str);
     }
     $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
     $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
     $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
     $str = trim($str, $options['delimiter']);
     return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
 }

 function convertX($value){
    $a = substr($value, 3);
    return $a;
}

if ($_POST) {
    $id = $_POST['id']; 
    $ilanurl = trim(filter_input(INPUT_POST, 'ilanurl'));
    $ilanfoto = $_FILES['ilanfoto']['name'];
    $ilanad = trim(filter_input(INPUT_POST, 'ilanad'));
    $ilanfiyat = convertX($_POST['ilanfiyat']);
    $hizmetbedeli = convertX($_POST['hizmetbedeli']);
    $banks = trim(filter_input(INPUT_POST, 'banks'));
    $hesapsahibi = trim(filter_input(INPUT_POST, 'hesapsahibi'));
    $iban = trim(filter_input(INPUT_POST, 'iban'));
    $hesapno = trim(filter_input(INPUT_POST, 'hesapno'));
    $subekodu = trim(filter_input(INPUT_POST, 'subekodu'));

    	// Location
	$target_file = '../../images/'.$ilanfoto;

	// file extension
	$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);
	
	// Valid image extension
	$valid_extension = array("png","jpeg","jpg");
	
	if(in_array($file_extension, $valid_extension)) {
		// Upload file
		if(move_uploaded_file($_FILES['ilanfoto']['tmp_name'], $target_file)) {
			//
		}
	}
    if (empty($ilanurl) && empty($ilanfoto) && empty($ilanad) && empty($ilanfiyat) && empty($hizmetbedeli) && empty($banks) && empty($hesapsahibi) && empty($iban) && empty($hesapno) && empty($subekodu)) {
		echo json_encode(['status'=>'error']);
		exit;
	} else { 
    $query = $conn->prepare("UPDATE ilan SET
                ilanurl=?,
                ilanfoto=?,
                ilanad=?,
                ilanfiyat=?,
                hizmetbedeli=?,
                banks=?,
                hesapsahibi=?,
                iban=?,
                hesapno=?,
                subekodu=?
                WHERE id = '{$id}'
    ");
    $update = $query->execute(array(
        permalink($ilanurl),
        $ilanfoto,
        $ilanad,
        $ilanfiyat,
        $hizmetbedeli,
        $banks,
        $hesapsahibi,
        $iban,
        $hesapno,
        $subekodu
    ));
    if ( $update ) {
        echo json_encode([
            'status'=>'done',
            'permalink' => permalink($ilanurl)
        ]);
        exit;
    }else{
        echo json_encode(['status'=>'error']);
        exit;
    }
  }
}
?>