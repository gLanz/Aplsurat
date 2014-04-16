<script type="text/javascript">
function Ajax(){
var xmlHttp;
	try{	
		xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
	}
	catch (e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e){
		    try{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("No AJAX!?");
				return false;
			}
		}
	}

xmlHttp.onreadystatechange=function(){
	if(xmlHttp.readyState==4){
		document.getElementById('ReloadThis').innerHTML=xmlHttp.responseText;
		setTimeout('Ajax()',10000);
	}
}

xmlHttp.send(null);
}

window.onload=function(){
	setTimeout('Ajax()',10000);
}
</script>
<div id="ReloadThis"></div>
<div class="contenSisiKiri">
<?php
$ip      = $_SERVER['REMOTE_ADDR']; 
$tanggal = date("Ymd");
$waktu   = time();
$n='1';
$tomorrow= mktime(0, 0, 0, date("m"), date("d") - $n, date("Y"));
$tom=date("Y-m-d", $tomorrow);
$monthafter= mktime(0, 0, 0, date("m")- $n, date("d"), date("Y"));
$tom2=date("Y-m-d", $monthafter);
//print $tom2;
$s = mysql_query("SELECT * FROM co_statistik WHERE ip='$ip' AND tanggal='$tanggal'");
if(mysql_num_rows($s) == 0){
  mysql_query("INSERT INTO co_statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
} 
else{
  mysql_query("UPDATE co_statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
}
$pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM co_statistik WHERE tanggal='$tanggal' GROUP BY ip"));
$pengunjunghlalu   = mysql_num_rows(mysql_query("SELECT * FROM co_statistik WHERE tanggal='$tom' GROUP BY ip"));

$pengunjungblalu  = mysql_num_rows(mysql_query("SELECT * FROM co_statistik WHERE Month(tanggal)=Month(tanggal)-1 GROUP BY ip"));

$totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM co_statistik"), 0); 
//$hitsblalu 		  = mysql_result(mysql_query("SELECT SUM(hits) FROM co_statistik WHERE Month(tanggal)=Month(tanggal)-1 GROUP BY tanggal"); 
$hits             = mysql_result(mysql_query("SELECT SUM(hits) FROM co_statistik WHERE tanggal='$tanggal' GROUP BY tanggal"), 0); 
$hitshlalu         = mysql_result(mysql_query("SELECT SUM(hits) FROM co_statistik WHERE tanggal='$tom' GROUP BY tanggal"), 0); 
$totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM co_statistik"), 0); 
$tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM co_statistik"), 0); 
$bataswaktu       = time() - 300;
$pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM co_statistik WHERE online > '$bataswaktu'"));

$path = "counter/";
$ext = ".png";

$tothitsgbr = sprintf("%06d", $totalpengunjung);
for ( $i = 0; $i <= 9; $i++ ){
	$tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
}

//echo "<p align=center>$tothitsgbr </p>
  //    <img src=counter/06.png> Pengunjung hari ini : $pengunjung <br>
  //    <img src=counter/line_chart.png> Tot pengunjung    : $totalpengunjung <br>
  //    <img src=counter/09.png> Hits hari ini    : $hits <br>
  //    <img src=counter/total.png> Total Hits       : $totalhits <br>
  //    <img src=counter/08.png> Pengunjung Online: $pengunjungonline
  //    </hr ><br /><br>";
//	  echo "</p><hr color=#006600 noshade=noshade />";

?></div>
