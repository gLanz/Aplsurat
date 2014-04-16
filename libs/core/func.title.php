<?php
$sql2=mysql_query("select*from co_setconfig WHERE id='1'");
$setconfig=mysql_fetch_array($sql2);

$APP_NAME="Login Administrator";
$APP_Ver="coDes Login 1.0";
$APP_Author="CoDespro";
$APP_Back="<a href='index'>Halaman Utama</a>";
//nama klien
$CLIENT_NAME="$setconfig[1]";
$CLIENT_NAME2="Sistem Informasi Manajemen Koperasi Kredit";
$CLIENT_ALAMAT="";
$CLIENT_COPY="Copyright &copy; ".$setconfig[client_year]." ".$setconfig[1]." - All Right Reserved";
$CLIENT_DESAIN=$setconfig[client_desain];
$CLIENT_PROVINSI="Sumatera Utara";
$CLIENT_NEGARA="Indonesia";
$client_email=$setconfig[client_email];

$title_meta=$setconfig[1] ." - ". $setconfig[2];
$title_meta2=$setconfig[7];
$title_meta3=$setconfig[6];

$title_meta4=$setconfig[1] ." - ". $setconfig[2];

$icon =$setconfig['client_ico'];
$logo =$setconfig['client_logo'];
//administrator
$ad_title="Panel Administrator ";
$ad_year=$setconfig[client_year];
//array pendidikan
$PENDIDIKAN[0]="";
$PENDIDIKAN[1]="Play Group";
$PENDIDIKAN[2]="TK";
$PENDIDIKAN[3]="SD";
$PENDIDIKAN[4]="SLTP/SMP";
$PENDIDIKAN[5]="SLTA/SMA/SMK";
$PENDIDIKAN[6]="D1";
$PENDIDIKAN[7]="D2";
$PENDIDIKAN[8]="D3";
$PENDIDIKAN[9]="D4";
$PENDIDIKAN[10]="S1";
$PENDIDIKAN[11]="S2";
$PENDIDIKAN[12]="S3";

//array hubungan
$HUB[0]="Istri/Suami";
$HUB[1]="Anak";
$HUB[2]="Bapak Kandung";
$HUB[3]="Ibu Kandung";
$HUB[4]="Bapak Mertua";
$HUB[5]="Ibu Mertua";
$HUB[6]="Saudara Kandung";


//array organisasi
$ORGANISASI[0]="Sekolah";
$ORGANISASI[1]="Perguruan Tinggi";
$ORGANISASI[2]="Umum";

$title_fot='CoDes Kredit PHP - Application return to ';
$version ='Co-Version 1.0';

//array bulan
$BULAN[1]='Januari';
$BULAN[2]='Februari';
$BULAN[3]='Maret';
$BULAN[4]='April';
$BULAN[5]='Mei';
$BULAN[6]='Juni';
$BULAN[7]='Juli';
$BULAN[8]='Agustus';
$BULAN[9]='September';
$BULAN[10]='Oktober';
$BULAN[11]='Nopember';
$BULAN[12]='Desember';

$b[]='Nopember';
$b[]='Desember';


//print_r($BULAN);
			//array putusan
$PUTUSAN[1]		='Pidana mati';
$PUTUSAN[2]		='Pidana seumur hidup';
$PUTUSAN[3]		='Pidana Penjara';
$PUTUSAN[4]		='Pidana Kurungan';
$PUTUSAN[5]		='Pidana bersyarat';
$PUTUSAN[6]		='Pidana denda';
$PUTUSAN[7]		='Pidana tambahan';
$PUTUSAN[8]		='Dikembalikan kepada orangtua';
$PUTUSAN[9]		='Diserahkan kepada pemerintah';
$PUTUSAN[10]	='Bebas dari tuduhan';
$PUTUSAN[11]	='Lepas dari tuntutan';
?>