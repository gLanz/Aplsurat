<?php 
ob_start(); session_start();ob_clean();
require"../../config/includes.php";

if(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['tsurat']))
{
	
	$uptodate = new Update();
	
	$nosurat= $_POST['nosurat'];
	$tgl = date('Y-m-d');
	$perihal = $_POST['perihal'];
	$asal = $_POST['asal'];
	$tujuan=$_POST['tujuan'];
	$tglsurat = $_POST['tglsurat'];
	$noagenda=$_POST['noagenda'];
	$penerima = $_POST['penerima'];
	$filesurat = $_FILES['filesurat']['name'];
	
//	$error = array();
	if(empty($nosurat)){echo"Nomor surat harus di isi, tidak boleh kosong";}
	elseif(empty($perihal)){echo"Perihal surat harus di isi";}
	else{
//	
//	if(empty($error)){
		$post['nosurat_su']=$nosurat;
		$post['tglmasuk_su']=$tglsurat;
		$post['perihal_su']=$perihal;
		$post['asal_su']=$asal;
		$post['tujuan_su']=$tujuan;
		$post['penerima_su']=$penerima;
		$post['no_agendasurat']=$noagenda;
		$post['tglcreate']=time();
		
		$post2['update_field'] ='1';
		
		$desc='Surat Berhasil ditambah';
		$post3['logAction']='ADD';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
		
		$logging->addLog($post3);
		
		$surat->addSurat($post);
		$uptodate->editUpdate1($post2);
		echo"Berhasil";?>
        <script>tutup();refresh();</script>      
<? }
		
}
elseif(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['tsuratkeluar']))
{
	$uptodate = new Update();
	
	$nosurat= $_POST['tglsuratterima'];
/*	$tgl = date('Y-m-d');
	$perihal = $_POST['perihal'];
	$asal = $_POST['asal'];
	$tujuan=$_POST['tujuan'];
	$tglsurat = $_POST['tglsurat'];
	$noagenda=$_POST['noagenda'];
	$penerima = $_POST['penerima'];*/
	$filesurat = $_FILES['filesurat']['name'];
	
	$tglkirim=$_POST['tglkirimsurat'];
	$tglterima = $_POST['tglsuratterima'];
	$bagian=$_POST['bagian'];
	$noagenda =$_POST['noagenda'];
	$perihal =$_POST['perihal'];
	$tglsuke =$_POST['tglsuratkeluar'];
	$pengirim =$_POST['pengirim'];
	$penyerah =$_POST['penyerah'];
	$penerima =$_POST['noagenda'];
	$jeniskirim =$_POST['jeniskirim'];
	$noresi =$_POST['noresi'];
	$tglresi =$_POST['tglresi'];
	

	$post['sk_tglterima']=$tglterima;
	$post['sk_noagenda']=$noagenda;
	$post['sk_tglkeluar']=$tglsuke;
	$post['sk_tglkirim']=$tglkirim;
	$post['sk_pengirim']=$pengirim;
	$post['sk_penyerah']=$penyerah;
	$post['sk_penerima']=$penerima;
	$post['sk_jeniskirim']=$jeniskirim;
	$post['sk_noresi']=$noresi;
	$post['sk_tglresi']=$tglresi;
	$post['sk_bagian']=$bagian;
	$post['sk_perihal']=$perihal;
		
	$post2['update_field'] ='1';
	
	$desc='Surat Keluar Berhasil ditambah '.$noagenda.'';
	$post3['logAction']='ADD';
	$post3['logTime']=time();
	$post3['logIP']=getIP();
	$post3['logUrl']=geturl();
	$post3['logUser']=$_SESSION['nama'];
	$post3['logDesc']=$desc;	
//	$error = array();
	if(empty($nosurat)){echo"Tanggal terima surat harus di isi, tidak boleh kosong";}
	elseif(empty($noagenda)){echo"Nomor Agenda surat harus di isi, tidak boleh kosong";}
	elseif(empty($perihal)){echo"Perihal surat harus di isi";}
	else{
		$surat->addSuratKeluar($post);
		$uptodate->editUpdate1($post2);
		$logging->addLog($post3);
			header("location:index.php?link=copage&li=6&isi=SuratKeluar&msg=27");?>
        <script>tutup();refresh();</script> 
<? } 
		
}
//--------Batas edit coy -------//
elseif(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['usurat']))
{
	
	
	$id=$_POST['id'];
	$nosurat=$_POST['nosurat'];
	$perihal=$_POST['perihal'];
	$tujuan =$_POST['tujuan'];
	$asal =$_POST['asal'];
	$tglsurat =$_POST['tglsurat'];
	$penerima =$_POST['penerima'];
	$noagenda =$_POST['noagenda'];
	
	
	$post['nosurat_su']=$nosurat;
	$post['tglmasuk_su']=$tglsurat;
	$post['perihal_su']=$perihal;
	$post['asal_su']=$asal;
	$post['tujuan_su']=$tujuan;
	$post['penerima_su']=$penerima;
	$post['no_agendasurat']=$noagenda;
	$post['idsurat']=$id;
	
		$desc='Surat Berhasil di perbaharui';
		$post3['logAction']='UPDATE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
		
		$logging->addLog($post3);
	$surat->editSurat($post);
			echo"Berhasil";?>
        <script>tutup();
		refresh();			
        </script> 
        <? 
}
elseif(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['uisurat']))
{
	$id=$_POST['kode'];
	$nama=$_POST['nama'];
	$penulis=$_POST['jabatan'];
	$name=$_POST['nama'];
	$kat='kat_pejabat';
	$filenama=$_FILES['image'];
	$imglama = $_POST['lamafoto'];
	$filenama2=$_FILES['image']['name'];
	
	
		$desc='Surat Berhasil ditambah';
		$post3['logAction']='ADD';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
		
		$logging->addLog($post3);

		$post['id']=$id;
		$post['name']=$kat;
		$post['description']=$nama;
        $post['groups']=$penulis;
		$post['imgs']=$fileNM;
		
		if($surat->editKat($post))
		{
			header("location:index.php?link=copage&li=7&isi=Pejabat&msg=27");
		}else{
			$_SESSION['error'] = $error;
			$_SESSION['post'] = $_POST;
			header("location: index.php?link=coedit&tampil=2&msg=6&id=$id&isi=Edit Halaman");
		}
	//}
   
}

elseif(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) && isset($_POST['usuratkeluar']))
{
	$id=$_POST['idsuke'];
	$tglkirim=$_POST['tglkirim'];
	$tglterima = $_POST['tglterima'];
	$bagian=$_POST['bagian'];
	$noagenda =$_POST['noagenda'];
	$perihal =$_POST['perihal'];
	$tglsuke =$_POST['tglsuratkeluar'];
	$pengirim =$_POST['pengirim'];
	$penyerah =$_POST['penyerah'];
	$penerima =$_POST['noagenda'];
	$jeniskirim =$_POST['jeniskirim'];
	$noresi =$_POST['noresi'];
	$tglresi =$_POST['tglresi'];
	
	$post['idsuke']=$id;
	$post['sk_tglterima']=$tglterima;
	$post['sk_noagenda']=$noagenda;
	$post['sk_tglkeluar']=$tglsuke;
	$post['sk_tglkirim']=$tglkirim;
	$post['sk_pengirim']=$pengirim;
	$post['sk_penyerah']=$penyerah;
	$post['sk_penerima']=$penerima;
	$post['sk_jeniskirim']=$jeniskirim;
	$post['sk_noresi']=$noresi;
	$post['sk_tglresi']=$tglresi;
	$post['sk_bagian']=$bagian;
	$post['sk_perihal']=$perihal;
	
		$desc='Surat Keluar Berhasil di perbaharui '.$noagenda.'';
		$post3['logAction']='UPDATE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;
		
	
	if($surat->editSuratKeluar($post)){
	$logging->addLog($post3);
	header("location:index.php?link=copage&li=6&isi=SuratKeluar&msg=27");?>
    <script>tutup();refresh();</script> 
    <? 
	}
}
elseif($_POST['isuratstatus'])
{
	$acc_id		 = $_POST['acc_id'];
	$noagenda	 = $_POST['noagenda'];
	$tglterima 	 = $_POST['tglterima'];
	$tgldisposisi	 = $_POST['tgldisposisi'];
	$isidisposisi	 = $_POST['isidisposisi'];
	$pendisposisi = $_POST['pendisposisi'];
	$tindaklanjut	 = $_POST['tindaklanjut'];
	
	$post['noagenda']=$noagenda;
	$post['tglditerima']= $tglterima;
	$post['tgldisposisi']=$tgldisposisi;
	$post['isidisposisi']=$isidisposisi;
	$post['pendisposisi']=$pendisposisi;
	$post['tindaklanjut']=$tindaklanjut;
	$post['acc_id']=$acc_id;
	$post['idsurat']=$_POST['idsurat'];
	
	
	if(empty($tglterima)){echo"Tanggal Terima surat harus di isi, tidak boleh kosong";}
	elseif(empty($tgldisposisi)){echo"Tanggal Disposisi surat harus di isi";}
	else{
		$surat->addStatusSurat($post);
		echo"Insert Sukses";?>
        <script>tutup();refresh();</script> 
        <?
	}
}
elseif($_POST['usuratstatus'])
{
	$acc_id		 = $_POST['acc_id'];
	$noagenda	 = $_POST['noagenda'];
	$tglterima 	 = $_POST['tglterima'];
	$tgldisposisi	 = $_POST['tgldisposisi'];
	$isidisposisi	 = $_POST['isidisposisi'];
	$pendisposisi = $_POST['pendisposisi'];
	$tindaklanjut	 = $_POST['tindaklanjut'];
	
	$post['noagenda']=$noagenda;
	$post['tglditerima']= $tglterima;
	$post['tgldisposisi']=$tgldisposisi;
	$post['isidisposisi']=$isidisposisi;
	$post['pendisposisi']=$pendisposisi;
	$post['tindaklanjut']=$tindaklanjut;
	$post['acc_id']=$acc_id;
	$post['idsurat']=$_POST['idsurat'];
	$post['id']=$_POST['idx'];
	
	
	if(empty($tglterima)){echo"Tanggal Terima surat harus di isi, tidak boleh kosong";}
	elseif(empty($tgldisposisi)){echo"Tanggal Disposisi surat harus di isi";}
	else{
		$surat->editStatusSurat($post);
		echo"Insert Sukses";?>
        <script>tutup();refresh();</script> 
        <?
	}
}

elseif($_POST['taccess'])
{
	$acc_id		 = $_POST['idaccess'];
	$nama	 ='user_level';
	$description 	 = $_POST['nama'];
	$notes	 = $_POST['notes'];
	
	//$isidisposisi	 = $_POST['isidisposisi'];
	//$pendisposisi = $_POST['pendisposisi'];
	//$tindaklanjut	 = $_POST['tindaklanjut'];
	//$idstatus =$_POST['id'];
	
	$post['id']=$acc_id;
	$post['name']=$nama;
	$post['description']= $description;
	$post['notes']=$notes;
	$post['groups']='akun';
	$post['dt_created']=time();
	
		$insert['acc_id']=$acc_id;
		$insert['action_1']=$_POST['acces_1'];
		$insert['action_2']=$_POST['acces_2'];
		$insert['action_3']=$_POST['acces_3'];
		$insert['action_4']=$_POST['acces_4'];
		$insert['action_5']=$_POST['acces_5'];
		$insert['action_6']=$_POST['acces_6'];
		$insert['action_7']=$_POST['acces_7'];
		$insert['action_8']=$_POST['acces_8'];
		$insert['action_9']=$_POST['acces_9'];
		$insert['action_10']=$_POST['acces_10'];
		$insert['action_11']=$_POST['acces_11'];
	
	if(empty($acc_id)){echo"Acces ID harus di isi, tidak boleh kosong";}
	elseif(empty($description)){echo"Nama Access harus di isi";}
	else{
		$parameter->addParameter($post);
		$akun->addAccesUser($insert);
		echo"Berhasil";?>
        <script>tutup();refresh();</script> 
     <?
	}
}
elseif($_POST['uaccess'])
{	
	$acc_id		 = $_POST['idacces'];
	$name	 = $_POST['group'];
	$description 	 = $_POST['nama'];
	$notes	 = $_POST['notes'];
	
	$post['name']=$name;
	$post['id']= $acc_id;
	$post['description']=$description;
	$post['notes']=$notes;
	$post['dt_updated']=time();
	
		$insert['acc_id']=$acc_id;
		$insert['action_1']=$_POST['acces_1'];
		$insert['action_2']=$_POST['acces_2'];
		$insert['action_3']=$_POST['acces_3'];
		$insert['action_4']=$_POST['acces_4'];
		$insert['action_5']=$_POST['acces_5'];
		$insert['action_6']=$_POST['acces_6'];
		$insert['action_7']=$_POST['acces_7'];
		$insert['action_8']=$_POST['acces_8'];
		$insert['action_9']=$_POST['acces_9'];
		$insert['action_10']=$_POST['acces_10'];
		$insert['action_11']=$_POST['acces_11'];
		
		
		$desc='Acces Akun berhasil ditambah.';
		$post3['logAction']='UPDATE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	

	if(empty($acc_id)){echo"ID Access harus di isi, tidak boleh kosong";}
	elseif(empty($description)){echo"Nama harus di isi";}
	else{
		$parameter->editParameter($post);
		$akun->editUserAccess($insert);
		$logging->addLog($post3);
		echo"Update Sukses";?>
        <script>tutup();refresh();</script> 
        <?
	}
}
elseif($_POST['tparameter'])
{
	$acc_id		 = $_POST['id'];
	$name	 =$_POST['name'];
	$groups 	= $_POST['groups'];
	$nama 	 = $_POST['nama'];
	$deskripsi	 = $_POST['notes'];
	
	//$isidisposisi	 = $_POST['isidisposisi'];
	//$pendisposisi = $_POST['pendisposisi'];
	//$tindaklanjut	 = $_POST['tindaklanjut'];
	//$idstatus =$_POST['id'];
	
	$post['id']=$acc_id;
	$post['name']=$name;
	$post['description']= $nama;
	$post['notes']=$deskripsi;
	$post['groups']=$groups;
	$post['dt_created']=time();
	
	if(empty($acc_id)){echo"ID harus di isi, tidak boleh kosong";}
	elseif(empty($nama)){echo"Nama harus di isi";}
	else{
		$parameter->addParameter($post);
		echo"Berhasil";?>
        <script>tutup();refresh();</script> 
     <?
	}
}
elseif($_POST['uparameter'])
{
	$acc_id		 = $_POST['id'];
	$group	 = $_POST['group'];
	$name 	 = $_POST['name'];
	$nama 	 = $_POST['nama'];
	$notes	 = $_POST['notes'];
	
	$post['name']=$name;
	$post['id']= $acc_id;
	$post['description']=$nama;
	$post['notes']=$notes;
	$post['dt_updated']=time();
	
	if(empty($acc_id)){echo"ID harus di isi, tidak boleh kosong";}
	elseif(empty($nama)){echo"Nama harus di isi";}
	else{
		$parameter->editParameter($post);
		echo"Update Sukses";?>
        <script>tutup();refresh();</script> 
        <?
	}
}
elseif($_POST['addUser'])
{

	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=md5('12345');
	$level=$_POST['level'];
	$notes=$_POST['ket'];
	$id=rand(11111,99999);
	$group=$_POST['group'];
	
	$post['acc_id']=$id;
	$post['acc_user']=$username;
	$post['acc_pass']=$password;
	$post['acc_notes']=$notes;
	$post['acc_nama']=$nama;
	$post['acc_group']=$group;
	$post['level']=$level;
	$post['acc_created']=strtotime(date('Y-m-d H:i:s'));
	$post['acc_lastupdate']=strtotime(date('Y-m-d H:i:s'));
	
	//$id=$_GET['id'];
	$idRecordSet = $akun->getAkunByNama($username); // get the record set for this Id.
    $idrecord = NULL; // This will make sure that we dont have the same record when we refresh the page.
    	$desc='Akun berhasil ditambah. ['.$username.']';
		$post3['logAction']='ADD';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
		
		
	if(empty($username)){echo"Username harus di isi";}
	elseif($idRecordSet->getRecordCount() > 0){echo"Username sudah digunakan sebelumnya, Username tidak boleh sama";}
	elseif(empty($nama)){echo"Nama harus di isi";}
	elseif($level=='Pilih'){echo"Level harus di isi";}
	else
	{
		$akun->addUser($post);
		$logging->addLog($post3);			
		echo"Akun Sukses ditambah";?>
        <script>tutup();refresh();</script> 
        <?
	}
}
elseif($_POST['uAkun'])
{

	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$notes=$_POST['ket'];
	$username=$_POST['user'];
	$level=$_POST['level'];
	
		$post['acc_id']=$id;
        $post['acc_user']=$username;		
		$post['acc_nama']=$nama;
        $post['acc_notes']=$notes;
		$post['level']=$level;
		$post['acc_group']=$_POST['group'];
		$post['acc_lastupdate']=strtotime(date('Y-m-d H:i:s'));
		
		$desc='Akun berhasil dihapus. ['.$id.' '.$name.']';
		$post3['logAction']='UPDATE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
		
		
		if($akun->editUser($post))
		{ $logging->addLog($post3);
		echo"<script>document.location='index.php?link=copage&li=2&isi=Data Akun&msg=27';</script>";
		}else{
		$_SESSION['error'] = $error;
		$_SESSION['post'] = $_POST;
		header("location: index.php?link=copage&li=12&isi=Edit akun&id=$id&isi=Edit");
		}
}
elseif($_POST['uResetpass'])
{
	
	$id=$_POST['id'];
	$pass=$_POST['password'];
	
	
		$post['acc_id']=$id;
        $post['acc_pass']=md5($pass);
		$post['acc_lastupdate']=strtotime(date('Y-m-d H:i:s'));
		
		if($akun->editUser($post))
		{
		echo"<script>document.location='index.php?link=copage&li=2&isi=Data Akun&msg=27';</script>";
		}else{
		$_SESSION['error'] = $error;
		$_SESSION['post'] = $_POST;
		header("location: index.php?link=copage&li=2&isi=Sub Admin&data=reset&id=$id");
		}
}
elseif($_POST['hsurat'])
{
	// Create a new News Object
    $id = $_POST['id'];
	
    	$desc='Surat Masuk berhasil dihapus. ['.$id.']';
		$post3['logAction']='DELETE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
	$logging->addLog($post3);
	$surat->deleteMail($id);
	echo"Berhasil dihapus";?>
	<script>tutup();</script>   <?

}
elseif($_POST['hsurato'])
{
	// Create a new News Object
    $id = $_POST['id'];
	    $desc='Surat Keluar berhasil dihapus. ['.$id.']';
		$post3['logAction']='DELETE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
	$logging->addLog($post3);
	$surat->deleteMailOut($id);
	echo"Berhasil dihapus";?>
	<script>tutup();</script>   <?

}
elseif($_POST['haccess'])
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	
	$desc='Access berhasil dihapus. ['.$id.' '.$name.']';
		$post3['logAction']='DELETE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
	$logging->addLog($post3);
	
	$adaAkun = $slide->getAkunByAccess($id);
	if($adaAkun->getRecordCount() > 0){echo'Query ID Access masih tertaut, harap hapus atau edit Akun yang tertaut ke <b>ID Access ( '.$id.' )<b>';}
	else{
	$parameter->deleteParameter($id,$name);
	$akun->deleteAkunAcces($id);
	echo"Berhasil dihapus";?> 
	<script>tutup();</script>   <?
	}
}
elseif($_POST['hparameter'])
{
    $id = $_POST['id'];
	$name = $_POST['name'];
	$desc='Parameter berhasil dihapus. ['.$id.' '.$name.']';
		$post3['logAction']='DELETE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
	$logging->addLog($post3);
	$parameter->deleteParameter($id,$name);
	echo"Berhasil dihapus";?> 
	<script>tutup();</script>   <?
	//}
}
elseif($_POST['hism'])
{
    $id = $_POST['id'];
	$name = $_POST['name'];
	$desc='Paraf Surat berhasil dihapus. ['.$id.' '.$name.']';
		$post3['logAction']='DELETE';
		$post3['logTime']=time();
		$post3['logIP']=getIP();
		$post3['logUrl']=geturl();
		$post3['logUser']=$_SESSION['nama'];
		$post3['logDesc']=$desc;	
	$logging->addLog($post3);
	
	$surat->deleteISM($id);
	echo"Berhasil dihapus";?> 
	<script>tutup();</script>   <?
	//}
}
///--------------Batas ---------------------///
?>