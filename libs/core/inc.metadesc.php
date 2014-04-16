<?php
//$sql = mysql_query("select * from tbnews where berita_id='$_GET[berita_id]'");
//$j   = mysql_fetch_array($sql);
$sql2=mysql_query("select*from co_isiweb WHERE isi_id='".$_GET[id]."'");
$k=mysql_fetch_array($sql2);

//if (isset($_GET[berita_id])){
	//	echo "Berita - $j[berita_judul]";
//}
if(isset($_GET[id])){
	echo"$k[isi_judul] - $title_meta2";
	}
else{
		echo "$title_meta3";
}
?>
