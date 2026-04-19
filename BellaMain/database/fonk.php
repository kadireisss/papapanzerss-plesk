<?php
	//SIFRELEME
	function sifreleWadanz($obj){
	 return base64_encode(gzcompress(serialize($obj)));
	}
	function sifrecozWadanz($txt){
	 return unserialize(gzuncompress(base64_decode($txt)));
	}

	//SEF_LINK
	function seo($bas) {
		$bas = str_replace(array("",""), NULL, $bas);
		$bul = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '-');
		$yap = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', ' ');
		$perma = strtolower(str_replace($bul, $yap, $bas));
		$perma = preg_replace("@[^A-Za-z0-9\-_]@i", ' ', $perma);
		$perma = trim(preg_replace('/\s+/',' ', $perma));
		$perma = str_replace(' ', '-', $perma);
		return $perma;
	}
?>