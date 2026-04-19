<?php

date_default_timezone_set('Europe/Istanbul');

// All Functions are here:

// Turkish Sef URL

function SefURL($text): string
{
    $text = trim($text);
    $search = array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü', ' ');
    $replace = array('c', 'c', 'g', 'g', 'i', 'i', 'o', 'o', 's', 's', 'u', 'u', '-');
    return strtolower(str_replace($search, $replace, $text));
}