<?php
require"../../config/includes.php";
if(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['simpan'])){

	// Valid Email
	$telp 	 = $_REQUEST['notelp']; // Message content of what you will send in this form

	$customer = new Customer();
	$uptodate = new Update();
	$nama= $_POST['nmcustomer'];
	$tgl = date('Y-m-d');
	$sesi = $_POST['sesi_id'];
	$alamat = $_POST['alamat'];
	$plat = $_POST['plat'];
	$notelp=$_POST['notelp'];
	$team = $_POST['get_team'];
	$time=$_POST['get_time'];
	
	if(empty($nama)){echo"* Nama harus di isi, tidak boleh kosong";}
	elseif(empty($alamat)){echo"* Alamat harus di isi, tidak boleh kosong";}
	elseif(empty($plat)){echo"* Plat Mobil harus di isi, tidak boleh kosong";}
	else{
		$post['nmcustomer']=$nama;
		$post['tglboard']=$tgl;
		$post['notelp']=$telp;
		$post['alamat']=$alamat;
		$post['platmobil']=$plat;
		$post['sesi_cs']=$sesi;
		$post['waktuid']=$time;
		$post['teamid']=$team;
		$post['status']='0';
		
		$post2['update_field']='1';
		
		$customer->addCustomer($post);
		$uptodate->editUpdate1($post2);
		//header("location:index.php");
		echo"<script>alert('Berhasil');document.location='index.php';</script>";
	}
		
	//$to      	 = $emailSender;
//	$subject 	 = 'Simple Contact Form by iAPDesign';
//
//	$headers   = array();
//	$headers[] = 'MIME-Version: 1.0';
//	$headers[] = 'Content-type: text/plain; charset=iso-8859-1';
//	$headers[] = "From: $nameSender <$emailSender>";
//	$headers[] = "Subject: $subject";
//
//	mail($to, $subject, $message, implode("\r\n", $headers));

}elseif(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['usimpan'])){
	$customer = new Customer();
	$uptodate = new Update();
	$nama= $_POST['nmcustomer'];
	$sesi = $_POST['sesi_id'];
	$alamat = $_POST['alamat'];
	$plat = $_POST['plat'];
	$notelp=$_POST['notelp'];
	$team = $_POST['get_team'];
	$idboard=$_POST['idx'];
	
		$post['nmcustomer']=$nama;
		$post['idboard']=$idboard;
		$post['notelp']=$notelp;
		$post['alamat']=$alamat;
		$post['platmobil']=$plat;
		$post['sesi_cs']=$sesi;
		$post['teamid']=$team;
		$post['status']='0';
		
	$customer->editCustomer($post);
	
	$post2['update_field']='1';
	$uptodate->editUpdate1($post2);
	
	echo"<script>alert('Berhasil u');document.location='index.php';</script>";

}
?>