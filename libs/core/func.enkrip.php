<?
function safe_b64encode($string) {
    $data = base64_encode($string);
    $data = str_replace(array('+','/','='),array('-','_',''),$data);
    return $data;
}
  
function safe_b64decode($string) {
    $data = str_replace(array('-','_'),array('+','/'),$string);
    $mod4 = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    return base64_decode($data);
}
  
function encode($value){ 
    $skey  = "$key_unit";
   
    if(!$value){return false;}
    $text = $value;
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, skey, $text, MCRYPT_MODE_ECB, $iv);
    return trim(safe_b64encode($crypttext)); 
}
  
function decode($value){
    $skey  = "$key_unit";
   
    if(!$value){return false;}
    $crypttext = safe_b64decode($value); 
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, skey, $crypttext, MCRYPT_MODE_ECB, $iv);
    return trim($decrypttext);
}
function dekripsi($str){
        $chrpwd = NULL;
        $yup = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $yip = array("~","`","!","@","#","$","%",",","^","&","*","(",")","-","_","=","+","[","{","]","}","|","<",">","/","?");
        for($i=0;$i<strlen($str);$i++){
            if(array_search(substr($str,$i,1),$yip)!==false){
                $chrpwdindex[] = array_search(substr($str,$i,1),$yip);
            }
        }
        for($j=0;$j<count($chrpwdindex);$j++){
            if($yup[$chrpwdindex[$j]]!==false){
                $chrpwd .= $yup[$chrpwdindex[$j]];    
            }
        }
        return strrev($chrpwd);
    } 
    if($_POST){
        echo dekripsi($_POST['isi']);    
 }
	
function enkripsi($portgas){
    $yup = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    $yip = array("~","`","!","@","#","$","%",",","^","&","*","(",")","-","_","=","+","[","{","]","}","|","<",">","/","?");
    $hi = strrev(str_replace($yup, $yip, $portgas));    
   // $hu = str_pad($hi,16,"Ñá£ÿ╝",STR_PAD_BOTH);
    echo $hi;
}


//Membuat fungsi random_karakter() dengan Hurup dan Angka secara acak
function random_karakter(){
 $karakter = array('a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z','1','2','3','4','5','6','7','8','9','0');
 $max = (count($karakter)-1);
 srand(((double)microtime()*1000000));
 $kar1 = $karakter[rand(0,$max)];
 $kar2 = $karakter[rand(0,$max)];
 $kar3 = $karakter[rand(0,$max)];
 $kar4 = $karakter[rand(0,$max)];
 $kar5 = $karakter[rand(0,$max)];
 $kar6 = $karakter[rand(0,$max)];
 $kar7 = $karakter[rand(0,$max)];
 $kar8 = $karakter[rand(0,$max)];
 $kar9 = $karakter[rand(0,$max)];
 //Anda bisa menambahkan variabe nya seperti $kar10 dan seterusnya
 $random_karakter = $kar1.$kar2.$kar3.$kar4.$kar5.$kar6.$kar7.$kar8.$kar9;
 return $random_karakter;
}
//Membuat fungsi decode_url() untuk memecah dan menerjemahkan Request URL
function decode_url($isi){
 $explode_1 = explode('?', $isi);
 $explode_2 = $explode_1[1];
 $explode_3 = explode('&', base64_decode($explode_2));
 for($i=0; $i<=count($explode_3)-1; $i++){
 $explode_4 = explode('=', $explode_3[$i]);
 $decode_url[$explode_4[0]] = $explode_4[1];
 }
 return $decode_url;
}

function enkripsiDekripsi($teksAsli, $kataKunci = ''){
    // jika kata kunci kosong, maka teks tidak akan diproses
	// baik enkrip atau dekrip
	if ($kataKunci == '') {
        return $teksAsli;
    }

	// membuang karakter spasi pada kata kunci
	// jika karakter kurang dari 5, maka proses tidak dilanjutkan
	// kemudian muncul error, ingat batasan karakter terserah Anda, bisa juga gag pakai
    if (strlen(trim($kataKunci)) < 5) {
        exit('Kata Kunci Salah');
    }

	$kataKunci_len = strlen($kataKunci);
    $kataKunci_len = ($kataKunci_len > 32) ? 32 : $kataKunci_len;

    $k = array();
	for ($i = 0; $i < $kataKunci_len; ++$i) {
        $k[$i] = ord($kataKunci{$i}) & 0x1F;
    }

    for ($i = 0, $j = 0; $i < strlen($teksAsli); ++$i) {
        $e = ord($teksAsli{$i});
		if ($e & 0xE0) {
            $teksAsli{$i} = chr($e ^ $k[$j]);
        }

		$j = ($j + 1) % $kataKunci_len;
    }
    return $teksAsli;
}
?>