<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED ^ E_STRICT);
define( DBHOST, "localhost",true ); // The true makes it so you have to type in DBHOST
define( DBUSER, "root",true );    // in caps to retreive the string.
define( DBPASS, "", true );
define( DBNAME, "db_aplsurat",true );



mysql_connect(DBHOST,DBUSER,DBPASS) or die(mysql_error());
$konek=mysql_select_db(DBNAME) or die("Tidak bisa menemukan database dalam server, silahkan periksa konfigurasi database anda");

//default waktu indonesia
date_default_timezone_set('Asia/Jakarta');

//kode unit
$key_unit='fabernainggolan';
?>
