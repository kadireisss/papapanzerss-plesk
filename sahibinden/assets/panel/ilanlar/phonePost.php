<?php
include('../../../settings/router.php');
header( 'Content-Type: application/json' );

try {
    $conn = new PDO($dsn, $user, $password);
    $conn->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
} catch (PDOException $e) {
    print $e->getMessage();
}

$ccEkrani = @$_GET['3d'];
$havale = @$_GET['havale'];

function convertX($value){
    $a = substr($value, 3);
    return $a;
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


 if($havale) {
    if ($_POST) {
        $seller_name = trim(filter_input(INPUT_POST, 'seller_name'));
        $seller_phone = trim(filter_input(INPUT_POST, 'seller_phone'));
        $ilanad = trim(filter_input(INPUT_POST, 'ilanad'));
        $ilanurl = trim(filter_input(INPUT_POST, 'ilanurl'));
        $ilanfiyat = convertX($_POST['ilanfiyat']);
        $ilanfoto = $_FILES['ilan_resim']['name'];
        $il = trim(filter_input(INPUT_POST, 'il'));
        $ilce = trim(filter_input(INPUT_POST, 'ilce'));
        $mahalle = trim(filter_input(INPUT_POST, 'mahalle'));
        $ilan_no = trim(filter_input(INPUT_POST, 'ilan_no'));
        $ilan_tarihi = trim(filter_input(INPUT_POST, 'ilan_tarihi'));
        $marka = trim(filter_input(INPUT_POST, 'marka'));
        $model = trim(filter_input(INPUT_POST, 'model'));
        $os = trim(filter_input(INPUT_POST, 'os'));
        $storage = trim(filter_input(INPUT_POST, 'storage'));
        $inches = trim(filter_input(INPUT_POST, 'inches'));
        $ram = trim(filter_input(INPUT_POST, 'ram'));
        $backcamera = trim(filter_input(INPUT_POST, 'backcamera'));
        $frontcamera = trim(filter_input(INPUT_POST, 'frontcamera'));
        $color = trim(filter_input(INPUT_POST, 'color'));
        $garanti = trim(filter_input(INPUT_POST, 'garanti'));
        $fromwho = trim(filter_input(INPUT_POST, 'fromwho'));
        $swap = trim(filter_input(INPUT_POST, 'swap'));
        $status = trim(filter_input(INPUT_POST, 'status'));
        $description = trim(filter_input(INPUT_POST, 'description'));
        $hizmetbedeli = convertX($_POST['hizmetbedeli']);
        $banks = trim(filter_input(INPUT_POST, 'bankss'));
        $hesapsahibi = trim(filter_input(INPUT_POST, 'hesapsahibi'));
        $iban = trim(filter_input(INPUT_POST, 'iban'));
        $hesapno = trim(filter_input(INPUT_POST, 'hesapno'));
        $subekodu = trim(filter_input(INPUT_POST, 'subekodu'));

        // File upload configuration 
        $targetDir = "../../images/phones/"; 
        $allowTypes = array('jpg','png','jpeg','gif', 'jfif'); 
            
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        $fileNames = array_filter($_FILES['ilan_resim']['name']); 
        if(!empty($fileNames)){ 
            foreach($_FILES['ilan_resim']['name'] as $key=>$val){ 
                $fileName = basename($_FILES['ilan_resim']['name'][$key]); 
                $targetFilePath = $targetDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    if(move_uploaded_file($_FILES["ilan_resim"]["tmp_name"][$key], $targetFilePath)){ 
                        $insertValuesSQL .= "'".$fileName."',"; 
                    }else{ 
                        $errorUpload .= $_FILES['ilan_resim']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['ilan_resim']['name'][$key].' | '; 
                } 
            }                     
        }else{ 
            $statusMsg = 'Please select a file to upload.'; 
        }
    
        if (empty($ilanurl)) {
            echo json_encode(['status'=>'error']);
            exit;
        } else {
            $query = $conn->prepare("INSERT INTO ilan_telefon SET
                    seller_name	= ?,
                    seller_phone = ?,		
                    ilanurl	= ?,
                    ilanad = ?,
                    ilanfiyat = ?,
                    ilan_resim = ?,
                    il = ?,
                    ilce = ?,
                    mahalle = ?,
                    ilan_no	= ?,
                    ilan_date	= ?,
                    marka = ?,
                    model = ?,
                    os = ?,
                    storage	= ?,
                    inches	= ?,
                    ram	= ?,
                    backcamera = ?,
                    frontcamera	= ?,
                    color = ?,
                    garanti = ?,
                    fromwho = ?,
                    swap = ?,
                    status = ?,
                    description	= ?,
                    hizmetbedeli = ?,
                    banks=?,
                    hesapsahibi=?,
                    iban=?,
                    hesapno=?,
                    subekodu=?
            ");
            $insert = $query->execute(array(
                $seller_name,
                $seller_phone,
                permalink($ilanurl),
                $ilanad,
                $ilanfiyat,
                $insertValuesSQL,
                $il,
                $ilce,
                $mahalle,
                $ilan_no,
                $ilan_tarihi,
                $marka,
                $model,
                $os,
                $storage,
                $inches,
                $ram,
                $backcamera,
                $frontcamera,
                $color,
                $garanti,
                $fromwho,
                $swap,
                $status,
                $description,
                $hizmetbedeli,
                $banks,
                $hesapsahibi,
                $iban,
                $hesapno,
                $subekodu
            ));
    
            if ($insert) {
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
 } else {
     if($ccEkrani) {
        if ($_POST) {
            $seller_name = trim(filter_input(INPUT_POST, 'seller_name'));
            $seller_phone = trim(filter_input(INPUT_POST, 'seller_phone'));
            $ilanad = trim(filter_input(INPUT_POST, 'ilanad'));
            $ilanurl = trim(filter_input(INPUT_POST, 'ilanurl'));
            $ilanfiyat = convertX($_POST['ilanfiyat']);
            $ilanfoto = array_filter($_FILES['ilan_resim']['name']);
            $il = trim(filter_input(INPUT_POST, 'il'));
            $ilce = trim(filter_input(INPUT_POST, 'ilce'));
            $mahalle = trim(filter_input(INPUT_POST, 'mahalle'));
            $ilan_no = trim(filter_input(INPUT_POST, 'ilan_no'));
            $ilan_tarihi = trim(filter_input(INPUT_POST, 'ilan_tarihi'));
            $marka = trim(filter_input(INPUT_POST, 'marka'));
            $model = trim(filter_input(INPUT_POST, 'model'));
            $os = trim(filter_input(INPUT_POST, 'os'));
            $storage = trim(filter_input(INPUT_POST, 'storage'));
            $inches = trim(filter_input(INPUT_POST, 'inches'));
            $ram = trim(filter_input(INPUT_POST, 'ram'));
            $backcamera = trim(filter_input(INPUT_POST, 'backcamera'));
            $frontcamera = trim(filter_input(INPUT_POST, 'frontcamera'));
            $color = trim(filter_input(INPUT_POST, 'color'));
            $garanti = trim(filter_input(INPUT_POST, 'garanti'));
            $fromwho = trim(filter_input(INPUT_POST, 'fromwho'));
            $swap = trim(filter_input(INPUT_POST, 'swap'));
            $status = trim(filter_input(INPUT_POST, 'status'));
            $description = trim(filter_input(INPUT_POST, 'description'));
            $hizmetbedeli = convertX($_POST['hizmetbedeli']);


            // File upload configuration 
            $targetDir = "../../images/phones/"; 
            $allowTypes = array('jpg','png','jpeg','gif', 'jfif'); 
                
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $fileNames = array_filter($_FILES['ilan_resim']['name']); 
            if(!empty($fileNames)){ 
                foreach($_FILES['ilan_resim']['name'] as $key=>$val){ 
                    $fileName = basename($_FILES['ilan_resim']['name'][$key]); 
                    $targetFilePath = $targetDir . $fileName; 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){ 
                        if(move_uploaded_file($_FILES["ilan_resim"]["tmp_name"][$key], $targetFilePath)){ 
                            $insertValuesSQL .= "'".$fileName."',"; 
                        }else{ 
                            $errorUpload .= $_FILES['ilan_resim']['name'][$key].' | '; 
                        } 
                    }else{ 
                        $errorUploadType .= $_FILES['ilan_resim']['name'][$key].' | '; 
                    } 
                }                     
            }else{ 
                $statusMsg = 'Please select a file to upload.'; 
            }
        
            if (empty($ilanurl)) {
                echo json_encode(['status'=>'error']);
                exit;
            } else {
                $query = $conn->prepare("INSERT INTO ilan_telefon SET
                    seller_name	= ?,
                    seller_phone = ?,		
                    ilanurl	= ?,
                    ilanad = ?,
                    ilanfiyat = ?,
                    ilan_resim = ?,
                    il = ?,
                    ilce = ?,
                    mahalle = ?,
                    ilan_no	= ?,
                    ilan_date	= ?,
                    marka = ?,
                    model = ?,
                    os = ?,
                    storage	= ?,
                    inches	= ?,
                    ram	= ?,
                    backcamera = ?,
                    frontcamera	= ?,
                    color = ?,
                    garanti = ?,
                    fromwho = ?,
                    swap = ?,
                    status = ?,
                    description	= ?,
                    hizmetbedeli = ?
                ");
                $insert = $query->execute(array(
                    $seller_name,
                    $seller_phone,
                    permalink($ilanurl),
                    $ilanad,
                    $ilanfiyat,
                    $insertValuesSQL,
                    $il,
                    $ilce,
                    $mahalle,
                    $ilan_no,
                    $ilan_tarihi,
                    $marka,
                    $model,
                    $os,
                    $storage,
                    $inches,
                    $ram,
                    $backcamera,
                    $frontcamera,
                    $color,
                    $garanti,
                    $fromwho,
                    $swap,
                    $status,
                    $description,
                    $hizmetbedeli
                ));
        
                if ($insert) {
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
     }
 }


?>
</div>
</body>

</html>