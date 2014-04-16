<?php
  session_start();
  require"../../config/includes.php";
  if ((isset($_SESSION['usersesi'])) || (isset($_SESSION['passsesi']))) 
	$desc='LOGOUT Berhasil ! [username: '.$_SESSION['usersesi'].']';
	$post3['logAction']='LOGOUT';
	$post3['logTime']=time();
	$post3['logIP']=getIP();
	$post3['logUrl']=geturl();
	$post3['logUser']=$_SESSION['nama'];
	$post3['logDesc']=$desc;	
	$logging->addLog($post3);
  $_SESSION=array();
  session_destroy();
  header("location:../../index");
//namafile logout.php didalam folder admin/
/*$username = $_COOKIE['acc_user'];
$password = $_COOKIE['acc_pass'];
$level=$_COOKIE['level'];
$idpn 	=$_COOKIE['acc_id'];
$namapn=$_COOKIE['acc_nama'];
setcookie("acc_nama","",time()-7200);
setcookie("acc_id","",time()-7200);
setcookie("level","",time()-7200);
setcookie("acc_user", "", time()-7200);
setcookie("acc_pass", "", time()-7200);
header("location:../index.php");
*/
 ?>