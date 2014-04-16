<?php 
include"../../config/includes.php";

$username=$_POST['user'];
$pass=md5($_POST['pass']);
/*
if ($username == "" || $pass == "")
{
	echo"<script>alert('Maaf, userid atau password anda masih kosong');document.location.href='javascript:history.back(0)';</script>";
}
else
{
	$sql="select * from  tbaccount where (acc_user = '".$_POST['user']."') and (acc_pass = '$pass')";
	$query=mysql_query($sql);
	$row=mysql_fetch_array($query);
*/	
	
  
  //Lihat Apakah Data Usr dan Pas Ada di Tabel Admin
  $sql="select * from co_account where acc_user='$username' and acc_pass='$pass'";
  $query=mysql_query($sql);
  $nums=mysql_num_rows($query);
  if ($nums <1)
  {
	   	$desc='ERROR - Username dan atau password Anda salah ! [username:'.$username.']';
		$post3['logAction']='ERROR';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']="HostName:".gethostname();
		$post3['logDesc']=$desc;	
		
		$logging->addLog($post3);
		echo"<script>alert('Data User dan Password Tidak Dikenal');document.location='logr';</script>";
   
  }else{
	  $row=mysql_fetch_array($query);

	$nama=$row['acc_nama'];
	$id=$row['acc_id'];
	$levelnya =$row['level'];
	
		 $desc='Login Sukses [username : '.$nama.']';
		$post3['logAction']='LOGIN';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$row['acc_nama'];
		$post3['logDesc']=$desc;	
		
		$logging->addLog($post3);
  session_start();
  if ((!isset($_SESSION['usersesi'])) && (!isset($_SESSION['passsesi'])))
   {
    $_SESSION['usersesi'] = $username;
    $_SESSION['nama'] = $nama;
	$_SESSION['levelx']	  = $levelnya;
	$_SESSION['id']=$id;
   } 
  echo"<script>document.location='views/admin/index.php';</script>";
  }
?>