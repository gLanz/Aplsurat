<?php ob_start(); ob_clean();
require"../../config/includes.php";
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#delform').ajaxForm({
			target: '#error',
			success: function() {
				$('#error').fadeIn('slow');
				
			
			}
		});
	});
</script>
<?php


if($_GET['ket']=='haParameteraccess')
{
	$parameter = new Parameter(); // Create a new News Object
    $id = $_GET['id'];
	$group = $_GET['group'];
	$pegParameter=$parameter->getParameterById($group,$id);
	$record = NULL;
	if($pegParameter->getRecordCount()==1){
	$record = $pegParameter->getNextRecord();}

	?>
	 <div id="judulForm">KONFIRMASI DELETE ACCESS AKUN</div>

<div id="untukForm" style="width:400px;">
Apakah anda yakin Ingin menghapus Access <br />
<strong>ID Access</strong> : <?=$record[id]?>, <strong>Nama</strong> : <?=$record[description]?>
</div>

   <form action="coproses.php" method="post" name="hsurat" id="delform"> 
   <div id="error" class="error"></div>
   <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="hidden" name="id" value="<?=$record[1]?>" style="width:15px;" />
    <input type="hidden" name="name" value="<?=$record[0]?>" style="width:15px;" />
    <input type="submit" value="Hapus Access" name="haccess" class="tombol" id="haccess"> 
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div></form>

<?php
}
elseif($_GET['ket']=='haParameter')
{
	$parameter = new Parameter(); // Create a new News Object
    $id = $_GET['id'];
	$nma = $_GET['nm'];
	if($nma =='peng'){$nm='Pengirim';$name='pengirim'; }
	elseif($nma=='jepeng'){$nm='Jenis Pengiriman';$name='jenis_kirim';}
	elseif($nma=='bagian'){$nm='Bagian'; $name='bagian';$groups='sub_bidang';}
	
	$pegParameter=$parameter->getParameterById($name,$id);
	$record = NULL;
	if($pegParameter->getRecordCount()==1){
	$record = $pegParameter->getNextRecord();}
	?>
	 <div id="judulForm">KONFIRMASI DELETE PARAMETER <?=$nm?></div>

<div id="untukForm" style="width:400px;">
Apakah anda yakin Ingin menghapus <?=$nm?> <br />
<strong>ID </strong> : <?=$record[id]?>, <strong>Nama</strong> : <?=$record[description]?>
</div>

   <form action="coproses.php" method="post" name="hsurat" id="delform"> 
   <div id="error" class="error"></div>
   <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="hidden" name="id" value="<?=$record[1]?>" style="width:15px;" />
    <input type="hidden" name="name" value="<?=$record[0]?>" style="width:15px;" />
    <input type="submit" value="Ya Hapus " name="hparameter" class="tombol" id="haccess"> 
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div></form>

<?php
}

elseif($_GET['ket']=='haSurati')
{
	$slide = new Surat(); // Create a new News Object
    $id = $_GET['id'];

	$pegSlide= $slide->getSuratById($id);
	$record = NULL;
	if($pegSlide->getRecordCount()==1){
	$record = $pegSlide->getNextRecord();}
	?>
    <div id="judulForm">ALERT HAPUS SURAT</div>

<div id="untukForm" style="width:400px;">
Apakah anda yakin Ingin menghapus surat <br />
<strong>Nomor</strong> : <?=$record[nosurat_su]?>, <strong>Asal</strong> : <?=$record[asal_su]?>
</div>

   <form action="coproses.php" method="post" name="hsurat" id="delform"> 
   <div id="error" class="error"></div>
   <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="hidden" name="id" value="<?=$record[0]?>" style="width:15px;" />
    <input type="submit" value="Hapus Surat" name="hsurat" class="tombol" id="hsurat"> 
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div></form>
 
<?php 
}
elseif($_GET['ket']=='haSurato')
{
	$slide = new Surat(); // Create a new News Object
    $id = $_GET['id'];

	$pegSlide= $slide->getSukeById($id);
	$record = NULL;
	if($pegSlide->getRecordCount()==1){
	$record = $pegSlide->getNextRecord();}
	?>
    <div id="judulForm">ALERT HAPUS SURAT</div>

<div id="untukForm" style="width:400px;">
Apakah anda yakin Ingin menghapus surat <br />
<strong>Nomor</strong> : <?=$record[nosurat_su]?>, <strong>Asal</strong> : <?=$record[asal_su]?>
</div>

   <form action="coproses.php" method="post" name="hsurat" id="delform"> 
   <div id="error" class="error"></div>
   <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="hidden" name="id" value="<?=$record[0]?>" style="width:15px;" />
    <input type="submit" value="Hapus Surat" name="hsurato" class="tombol" id="hsurat"> 
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div></form>
<?php
}
elseif($_GET['ket']=='haisu')
{
	$slide = new Surat(); // Create a new News Object
    $id = $_GET['id'];

	$pegSlide= $slide->getISMById($id);
	$record = NULL;
	if($pegSlide->getRecordCount()==1){
	$record = $pegSlide->getNextRecord();}
	?>
    <div id="judulForm">ALERT HAPUS ISIAN SURAT</div>

<div id="untukForm" style="width:400px;">
Apakah anda yakin Ingin menghapus <br />
<table width="100%">
<tr>
 <td width="32%"><strong>Nomor </strong></td>
 <td width="3%">:</td>
 <td width="65%"><?=$record[id]?></td>
</tr>
<tr>
  <td><strong>Tanggal disposisi</strong></td>
  <td>:</td>
  <td><?=ubahTanggal($record[tgldisposisi]);?></td>
</tr>
<tr>
  <td><strong>Isi disposisi</strong></td>
  <td>:</td>
  <td><?=$record[isidisposisi];?></td>
</tr>
<tr>
  <td><strong>Pendisposisi</strong></td>
  <td>:</td>
  <td><?=$record[pendisposisi];?></td>
</tr>
<tr>
  <td><strong>Tindak lanjut</strong></td>
  <td>:</td>
  <td><?=$record[tindaklanjut];?></td>
</tr>
</table>
</div>

   <form action="coproses.php" method="post" name="hsurat" id="delform"> 
   <div id="error" class="error"></div>
   <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="hidden" name="id" value="<?=$record[0]?>" style="width:15px;" />
    <input type="submit" value="Hapus Surat" name="hism" class="tombol" id="hsurat"> 
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div></form>
    <?php
}
elseif($_GET['ket']=='haAlbum')
{
	$parameter = new Parameter(); // Create a new News Object
    $id = $_GET['id'];
	$name=$_GET['nama'];
	$parameter->deleteAlbum($id,$name);
	
	header("location:index.php?link=copage&li=5&isi=Parameter&view=album&msg=12");
}
elseif($_GET['ket']=='haAkun')
{
	$akun = new Account(); // Create a new News Object
    $id = $_GET['id'];
	//$group = $_GET['group'];
	$akun->deleteAkun($id);
	$akun->deleteAkunAcces($id);
	header("location:index.php?link=copage&?li=2&isi=Data Akun&msg=12");
}

elseif($_GET['ket']=='haPet')
{
	$akun = new Questbook(); // Create a new News Object
    $id = $_GET['id'];
	//$group = $_GET['group'];
	$akun->deleteQuest($id);
	header("location:index.php?link=copage&li=5&isi=Testimonial&msg=12");
}
elseif($_GET['ket']=='haTest')
{
	$money = new Questbook(); // Create a new News Object
    $id = $_GET['id'];
	$money->deleteQuest($id);
	header("location:index.php?link=copage&li=5&isi=Testimonial&msg=55");
}
elseif($_GET['ket']=='haBer')
{
	$money = new News(); // Create a new News Object
    $id = $_GET['id'];
	$money->deleteNews($id);
	header("location:index.php?link=copage&li=1&isi=Berita&msg=53");
}
elseif($_GET['ket']=='delAkun')
{
	$akun = new Account(); // Create a new News Object
    $id = $_GET['id'];
	//$group = $_GET['group'];
	$akun->deleteAkun($id);
	$akun->deleteAkunAcces($id);
	header("location:logout.php");
}

?>
