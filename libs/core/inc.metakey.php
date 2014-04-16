<?php
$sql = mysql_query("select isi_tagline from co_menu where me_id='$_GET[id]'");
$j   = mysql_fetch_array($sql);

if (isset($_GET[id])){
		echo "$j[me_tagline]";
}
else{
		echo "$title_meta2";
}
?>