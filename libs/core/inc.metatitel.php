<?php
$sql = mysql_query("select * from co_news where berita_id='$_GET[berita_id]'");
$j   = mysql_fetch_array($sql);
$sql2=mysql_query("select*from co_menu WHERE isi_id='".$_GET[id]."'");
$k=mysql_fetch_array($sql2);

if (isset($_GET[berita_id])){
		echo "$j[berita_judul]";
}
elseif(isset($_GET[id])){
	echo"$k[isi_judul]";
	}

else{
		echo "$title_meta";
}
?>
