<?php
/* function-funtion yang digunakan*/
function ubahNol($jang)
{
	if(substr($jang,1,1)==""){
		$asd='0';$asd1=substr($jang,0,1);
		$jang="$asd$asd1";}
	else
		$jang;
	return $jang;
}	
function titik($harga)
{
	$a=(string)$harga; //membuat $harga menjadi string
	$len=strlen($a); //menghitung panjang string $a
	
	if ( $len <=18 )
	{
		$ratril=$len-3-1;
		$ramil=$len-6-1;
		$rajut=$len-9-1; //untuk mengecek apakah ada nilai ratusan juta (9angka dari belakang)
		$juta=$len-12-1; //untuk mengecek apakah ada nilai jutaan (6angka belakang)
		$ribu=$len-15-1; //untuk mengecek apakah ada nilai ribuan (3angka belakang)
		
		$angka='';
		for ($i=0;$i<$len;$i++)
		{
			if ( $i == $ratril )
			{
				$angka=$angka.$a[$i].".";
			}
			else if ($i == $ramil )
			{
				$angka=$angka.$a[$i].".";
			}
			else if ( $i == $rajut )
			{
				$angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 3angka dari depan
			}
			else if ( $i == $juta )
			{
				$angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 6angka dari depan
			}
			else if ( $i == $ribu )
			{
				$angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 9angka dari depan
			}
			else
			{
				$angka=$angka.$a[$i];
			}
		}
	}

	echo "Rp. ". $angka.",-";
	}
function ubahTanggal($tanggal)
{
 $arr_bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
 $tglBaru=explode("-",$tanggal);
 $tgl=$tglBaru[2]; $bln=$tglBaru[1]; $thn=$tglBaru[0];
 if(substr($bln,0,1)=="0") $bln=substr($bln,1,1);
 $bln=substr($arr_bulan[$bln],0,10);
 $ubahTanggal="$tgl $bln $thn";
 return $ubahTanggal;
 
}
function ubahTanggalJam($tanggal)
{
 $arr_bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
 $tglBaru=explode(" ",$tanggal);
 $tglBaru1=$tglBaru[0];$tglBaru2=$tglBaru[1];
 $tglBarua=explode("-",$tglBaru1);
 $tgl=$tglBarua[2]; $bln=$tglBarua[1]; $thn=$tglBarua[0];
 if(substr($bln,0,1)=="0") $bln=substr($bln,1,1);
 $bln=substr($arr_bulan[$bln],0,10);
 $ubahTanggal="$tgl $bln $thn | $tglBaru2 ";
 return $ubahTanggal;
}
function chekData($nilai,$def)
{
	if($nilai==$def)
	{
		return "checked=\"checked\"";
	}
}

function tampilMenu($nilai)
{
	if($nilai=='1'){
            return true;
        }
        else
        {
            return false;
        }
}
function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
 
function imageResize( $dir, $img_name, $image,$lebar ,$panjang ,$save_ori = true) 
{  
      $dir .= "/";  
        
      //Check tipe file, jika file bukan image jpg, png, gif maka function ini akan dihentikan  
      if (!($ext = getImageType($image))) {  
       return FALSE;  
      }  
      $ext = "." . $ext;  
        
      //direktori gambar  
      $vdir_upload = $dir;  
      $vfile_upload = $vdir_upload . $img_name;  
      $ori = $vdir_upload . "ori-" . $img_name . $ext;  
        
      //Simpan gambar dalam ukuran sebenarnya  
      copy($image["tmp_name"], $ori);  
        
      //identitas file asli  
      if ($ext == ".jpg") {  
       $im_src = imagecreatefromjpeg($ori);  
      }elseif ($ext == ".gif") {  
       $im_src = imagecreatefromgif($ori);  
      }elseif ($ext == ".png") {  
       $im_src = imagecreatefrompng($ori);  
      }  
        
      $src_width = imageSX($im_src);  
      $src_height = imageSY($im_src);  
        
      //Simpan dalam versi thumbnail  
      //menentukan maksimum lebar dan tinggi gambar tergantung lebih besar mana antar lebar dan tinggi gambar  
	  //500x200 
      if ($src_width > $src_height) {  
       $dst_width = ($lebar >= $src_width ? $src_width : $lebar);  
       $dst_height = ($dst_width/$src_width)*$src_height;  
      }else{  
       $dst_height = ($panjang >= $src_width ? $src_width : $panjang);  
       $dst_width = ($dst_height/$src_height)*$src_width;  
      }  
        
      //proses perubahan ukuran  
      $im = imagecreatetruecolor($dst_width,$dst_height);  
      imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);  
        
      //Simpan gambar  
      if ($ext == ".jpg") {  
       imagejpeg($im, $vdir_upload . $img_name . $ext);  
      }elseif ($ext == ".gif") {  
       imagegif($im, $vdir_upload . $img_name . $ext);  
      }elseif ($ext == ".png") {  
       imagepng($im, $vdir_upload . $img_name . $ext);  
      }  
                  
      imagedestroy($im_src);  
      imagedestroy($im);  
        
      if (!$save_ori) {  
       unlink ($ori);  
      }  
        
      return TRUE;  
}  
       
     //fungsi untuk mengecek jenis gambar  
function getImageType ($image) {  
      if ($image['type'] == "image/jpeg" || $image['type'] == "image/pjpeg") {  
       return "jpg";  
      }elseif ($image['type'] == "image/gif") {  
       return "gif";  
      }elseif ($image['type'] == "image/png" || $image['type'] == "image/x-png") {  
       return "png";  
      }else{  
       return FALSE;  
      }  
}  

function selisih($jam_masuk,$jam_keluar) { 
list($h,$m,$s) = explode(":",$jam_masuk); $dtAwal = mktime($h,$m,$s,"1","1","1"); 
list($h,$m,$s) = explode(":",$jam_keluar); $dtAkhir = mktime($h,$m,$s,"1","1","1"); 
$dtSelisih = $dtAkhir-$dtAwal; $totalmenit=$dtSelisih/60; $jam =explode(".",$totalmenit/60); $sisamenit=($totalmenit/60)-$jam[0]; $sisamenit2=$sisamenit*60; $jml_jam=$jam[0]; 
return $jml_jam." jam ".$sisamenit2." menit"; 
}

function Sedikit($substr)
{
	$kecil=substr($substr,0,1000);
	$kecil=stripslashes($kecil);
	$kecil=strip_tags($kecil);
	return $kecil;
	
}
function sedikitBase20($substr)
{
	$kecil=substr($substr,0,30);
	$kecil=stripslashes($kecil);
	$kecil=strip_tags($kecil);
	return $kecil;
	
}
function sedikitBase10($substr)
{
	$kecil=substr($substr,0,20);
	$kecil=stripslashes($kecil);
	$kecil=strip_tags($kecil);
	
	if(strlen($substr) < 20){
		return $substr;
	}else{
		 return $kecil ."...";
	}
}
function sedikitBase150($substr)
{
	$kecil=substr($substr,0,150);
	$kecil=stripslashes($kecil);
	$kecil=strip_tags($kecil);
	return $kecil;
	
}

function Buang($buang)
{
	$buang=str_replace("-","",$buang);
	$buang=str_replace("/","",$buang);
	$buang=str_replace("?","",$buang);
	$buang=str_replace(":","",$buang);
	$buang=str_replace(".","",$buang);
	$buang=str_replace(" ","-",$buang);
	$buang=str_replace("@","",$buang);
	$buang=str_replace("&","",$buang);
	$buang=str_replace("#","",$buang);
	$buang=str_replace("(","",$buang);
	$buang=str_replace(")","",$buang);
	$buang=str_replace("*","",$buang);
	$buang=str_replace("!","",$buang);
	$buang=str_replace("~","",$buang);
	$buang=str_replace("+","",$buang);
	$buang=str_replace(",","",$buang);
	$buang=str_replace("`","",$buang);
	$buang=str_replace(";","",$buang);
	//$buang=str_replace(" ","",$buang);
	$buang=strtolower($buang);
	return $buang;
}
function BuangSemua($buang)
{
	$buang=str_replace("-","",$buang);
	$buang=str_replace("/","",$buang);
	$buang=str_replace("?","",$buang);
	$buang=str_replace(":","",$buang);
	$buang=str_replace(".","",$buang);
	$buang=str_replace(" ","",$buang);
	$buang=str_replace("@","",$buang);
	$buang=str_replace("&","",$buang);
	$buang=str_replace("#","",$buang);
	$buang=str_replace("(","",$buang);
	$buang=str_replace(")","",$buang);
	$buang=str_replace("*","",$buang);
	$buang=str_replace("!","",$buang);
	$buang=str_replace("~","",$buang);
	$buang=str_replace("+","",$buang);
	$buang=str_replace(",","",$buang);
	$buang=str_replace("`","",$buang);
	$buang=str_replace(";","",$buang);
	$buang=strtolower($buang);
	return $buang;
}
function TanggalUbah($tgl)
{ 
	$inttime=date('Y-m-d H:i:s',$tgl); 
	
	$arr_bulan=array("","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
 	$tglBaru=explode(" ",$inttime);
 	$tglBaru1=$tglBaru[0];$tglBaru2=$tglBaru[1];
 	$tglBarua=explode("-",$tglBaru1);
 	$tgl=$tglBarua[2]; $bln=$tglBarua[1]; $thn=$tglBarua[0];
 	if(substr($bln,0,1)=="0") $bln=substr($bln,1,1);
 	$bln=substr($arr_bulan[$bln],0,10);
 	$ubahTanggal="$tgl $bln $thn | $tglBaru2 ";

	return $ubahTanggal;
}
function TglUbahDikit($tgl)
{ 
	$inttime=date('Y-m-d H:i:s',$tgl); 
	
	$arr_bulan=array("","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
 	$tglBaru=explode(" ",$inttime);
 	$tglBaru1=$tglBaru[0];$tglBaru2=$tglBaru[1];
 	$tglBarua=explode("-",$tglBaru1);
 	$tgl=$tglBarua[2]; $bln=$tglBarua[1]; $thn=$tglBarua[0];
 	if(substr($bln,0,1)=="0") $bln=substr($bln,1,1);
 	$bln=substr($arr_bulan[$bln],0,10);
 	$ubahTanggal="$tgl $bln $thn";

	return $ubahTanggal;
}
function remoteFileExists($url) {
    $curl = curl_init($url);

    //don't fetch the actual page, you only want to check the connection is ok
    curl_setopt($curl, CURLOPT_NOBODY, true);

    //do request
    $result = curl_exec($curl);

    $ret = false;

    //if request did not fail
    if ($result !== false) {
        //if request was ok, check response code
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  

        if ($statusCode == 200) {
            $ret = true;   
        }
    }

    curl_close($curl);

    return $ret;
}
?>