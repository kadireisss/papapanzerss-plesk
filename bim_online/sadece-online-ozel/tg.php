<?php
// ikiside aynı sonucu verir. 

$token  = '';

$chat_id = '';

    $data = [
        'text' => ' 


A-101 Log Bildirimi @lP_Tosuncuk , @IP_Tosuncuk


      ',
  'chat_id' => $chat_id
    ];
    
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );  
?>