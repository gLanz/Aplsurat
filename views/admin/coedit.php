<?php ob_start();
session_start();
ob_clean();
if(isset($_SESSION['error'])){  
$error = $_SESSION['error'];  
$_POST = $_SESSION['post'];  
unset($_SESSION['error']);  
unset($_SESSION['post']);  
}
require"../../config/includes.php";
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#cekform').ajaxForm({
			target: '#error',
			success: function() {
				$('#error').fadeIn('slow');
				
				
			
			}
		});
	});
</script>
<?php
if($_REQUEST[tampil]=='sm')
{ 
	$id = $_GET['id'];
	$content=new Surat();
	$pegRecordSet = $content->getSuratById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {$record = $pegRecordSet->getNextRecord();}
?>
<div class="clear"></div>
<div id="judulForm">EDIT SURAT MASUK</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="683" border="0"  cellspacing="0">
  <tr>
    <td width="27%" align="right" valign="top">Nomor Surat</td>
    <td width="2%" align="center" valign="top">:</td>
    <td width="71%"><input name="nosurat" type="text" id="nosurat" style="width:200px;" value="<?=$record[nosurat_su]?>"></td>
   </tr>
   <tr>
   <td align="right" valign="top"><label>Perihal Surat</label></td>
   <td align="center" valign="top">:</td>
   <td><textarea name="perihal" cols="40" id="perihal"><?php echo isset($_POST['perihal']) ? $_POST['perihal'] : $record[perihal_su];?></textarea>     
   <input type="hidden" name="id" value="<?=$record[idsurat]?>" /></td>
  </tr>
   <tr>
     <td align="right" valign="top">Asal Surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="asal" name="asal" type="text" style=" width:300px;" value="<?=$record[asal_su]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tujuan</td>
     <td align="center" valign="top">:</td>
     <td><input id="tujuan" name="tujuan" type="text" style=" width:300px;" value="<?=$record[tujuan_su]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tanggal Surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="date_filed_for-2" class="datepicker" style=" width:80px;" name="tglsurat" type="text" value="<?=$record[tglmasuk_su]?>"/></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nomor Agenda</td>
     <td align="center" valign="top">:</td>
     <td><input id="noagenda" name="noagenda" type="text" style=" width:300px;" value="<?=$record[no_agendasurat]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nama Penerima Surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="penerima" name="penerima" type="text" style=" width:300px;" value="<?=$record[penerima_su]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">File Surat</td>
     <td align="center" valign="top">:</td>
     <td valign="top"><input name="filesurat" type="file" id="filesurat" style="border:none;" value="<?php echo isset($_FILES['image']['name']) ? $_POST['image'] : '';?>"  />
       <br />* Isi File Surat jika ada, support file .pdf</td>
   </tr>
  <tr>
    <td colspan="3">&nbsp;</td></tr>
  <tr>

    <td colspan="3">

    </td>
  </tr>
</table>
</div>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="submit" value="Update Surat" name="usurat" class="tombol" id="upberita">
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div>

</form>
</div>
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }elseif($_REQUEST[tampil]=='sk')
{ 
	$id = $_GET['id'];
	//$content=new Surat();
	$skRecordSet = $surat->getSukeById($id); // get the record set for this Id.
    $skrecord = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($skRecordSet->getRecordCount() == 1)
    {$skrecord = $skRecordSet->getNextRecord();}

?>
<div id="judulForm">EDIT SURAT KELUAR</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="683" border="0"  cellspacing="0">
  <tr>
    <td width="27%" align="right" valign="top">Tanggal Surat diterima</td>
    <td width="2%" align="center" valign="top">:</td>
    <td width="71%"><input id="date3" class="datepicker" style=" width:80px;" name="tglterima" type="text" value="<?php echo isset($_POST['tglterima']) ? $_POST['tglterima'] : $skrecord['sk_tglterima']?>"/></td>
  </tr>
   <tr>
     <td align="right" valign="top">Bagian Pengirim</td>
     <td align="center" valign="top">:</td>
     <td valign="top"><select name="bagian" id="bagian">
       <option selected="selected">Pilih</option>
       <?php while( ($barecord = $baRecordSet->getNextRecord()) !== false ){
		    if($skrecord['sk_bagian']==$barecord[id]){ ?>
       <option value="<?=$barecord[1]?>" <?php echo isset($_POST['bagian']) && $_POST['bagian']==$barecord[1] ? 'selected="selected"': '';?> selected="selected"><?=$barecord[2]?></option>
       <?php }else{?>
       <option value="<?=$barecord[1]?>" <?php echo isset($_POST['bagian']) && $_POST['bagian']==$barecord[1] ? 'selected="selected"': '';?>><?=$barecord[2]?></option>
       <?php }}?>
       </select></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nomor Agenda </td>
     <td align="center" valign="top">:</td>
     <td><input id="noagenda" name="noagenda" type="text" style=" width:300px;" value="<?php echo isset($_POST['noagenda']) ? $_POST['noagenda'] : $skrecord['sk_noagenda']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top"><label>Perihal Surat</label></td>
     <td align="center" valign="top">:</td>
     <td><textarea name="perihal" cols="40" id="perihal"><?php echo isset($_POST['perihal']) ? $_POST['perihal'] : $skrecord['sk_perihal'];?></textarea>     
       <input name="idsuke" type="hidden" id="idsuke" value="<?=$skrecord['idsuke']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tanggal Surat Keluar</td>
     <td align="center" valign="top">:</td>
     <td><input id="date_filed_for-2" class="datepicker" style=" width:80px;" name="tglsuratkeluar" type="text" value="<?php echo isset($_POST['tglsuratkeluar']) ? $_POST['tglsuratkeluar'] : $skrecord['sk_tglkeluar']?>"/></td>
   </tr>
   <tr>
     <td align="right" valign="top">Pengirim Surat</td>
     <td align="center" valign="top">:</td>
     <td><select name="pengirim" id="pengirim">
       <option selected="selected">Pilih</option>
       <?php while( ($pegrecord = $pegRecordSet->getNextRecord()) !== false ){
		   if($skrecord['sk_pengirim']==$pegrecord['description']){ ?>
       <option value="<?=$pegrecord[2]?>" <?php echo isset($_POST['pengirim']) && $_POST['pengirim']==$pegrecord[2] ? 'selected="selected"': '';?> selected="selected">
         <?=$pegrecord[2]?></option>
       <?php }else{?>
       <option value="<?=$pegrecord[2]?>" <?php echo isset($_POST['pengirim']) && $_POST['pengirim']==$pegrecord[2] ? 'selected="selected"': '';?>>
         <?=$pegrecord[2]?></option>
       <?php }}?>
       </select></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tanggal Kirim Surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="date4" class="datepicker" style=" width:80px;" name="tglkirim" type="text" value="<?php echo isset($_POST['tglkirim']) ? $_POST['tglkirim'] : $skrecord['sk_tglkirim']?>"/></td>
   </tr>
   <tr>
     <td align="right" valign="top">Yang menyerahkan surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="penyerah" name="penyerah" type="text" style=" width:300px;" value="<?php echo isset($_POST['penyerah']) ? $_POST['penyerah'] : $skrecord['sk_penyerah']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Penerima Surat</td>
     <td align="center" valign="top">:</td>
     <td><input id="penerima" name="penerima" type="text" style=" width:300px;" value="<?php echo isset($_POST['penerima']) ? $_POST['penerima'] : $skrecord['sk_penerima']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Jenis Pengiriman</td>
     <td align="center" valign="top">:</td>
     <td><select name="jeniskirim" id="kategori">
       <option selected="selected">Pilih</option>
       <?php while( ($jkrecord = $jkRecordSet->getNextRecord()) !== false ){
		    if($skrecord['sk_jeniskirim']==$jkrecord['description']){ ?>
       <option value="<?=$jkrecord[2]?>" <?php echo isset($_POST['level']) && $_POST['level']==$jkrecord[2] ? 'selected="selected"': '';?> selected="selected">
         <?=$jkrecord[2]?></option>
        <?php }else{?>
               <option value="<?=$jkrecord[2]?>" <?php echo isset($_POST['level']) && $_POST['level']==$jkrecord[2] ? 'selected="selected"': '';?>>
         <?=$jkrecord[2]?></option>
       <?php }}?>
     </select></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nomor resi</td>
     <td align="center" valign="top">:</td>
     <td><input id="noresi" name="noresi" type="text" style=" width:300px;" value="<?php echo isset($_POST['noresi']) ? $_POST['noresi'] : $skrecord['sk_noresi']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tanggal resi</td>
     <td align="center" valign="top">:</td>
     <td><input id="date5" class="datepicker" style=" width:80px;" name="tglresi" type="text" value="<?php echo isset($_POST['tglresi']) ? $_POST['tglresi'] : $skrecord['sk_tglresi']?>"/></td>
   </tr>
   <tr>
     <td align="right" valign="top">File Surat</td>
     <td align="center" valign="top">:</td>
     <td valign="top"><input name="filesurat" type="file" id="filesurat" style="border:none;" value="<?php echo isset($_FILES['image']['name']) ? $_POST['image'] : '';?>"  />
       <br />* Isi File Surat jika ada, support file .pdf</td>
   </tr>
  <tr>
    <td colspan="3">&nbsp;</td></tr>
  <tr>

    <td colspan="3">

    </td>
  </tr>
</table>
</div>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <input type="submit" value="Update Surat" name="usuratkeluar" id="usuratkeluar">
    <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
    </div>

</form>
</div>

<?php }elseif($_REQUEST[tampil]=='ism')
{
	$id = $_GET['id'];
	$content=new Surat();
	$pegRecordSet = $content->getSuratById($id); // get the record set for this Id.
    $xrecord = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $xrecord = $pegRecordSet->getNextRecord();
    }
	
	$sesi = $_SESSION['id'];
	$noagenda = $record['idsurat'];
	
	$akunRecordSet = $content->getSuratAkunById($sesi,$noagenda);
	$arecord=$akunRecordSet->getNextRecord();
?>
<div class="clear"></div>
		
<div id="judulForm">ISIAN SURAT MASUK</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="600" border="0" cellspacing="0">
  <tr><td width="150" align="right" valign="top"><label>Nomor Agenda Surat</label></td>
    <td width="16" align="center" valign="top">:</td>
    <td width="428"><?=$xrecord['no_agendasurat']?><input name="noagenda" type="hidden" id="menu"readonly="readonly" value="<?=$xrecord['no_agendasurat']?>"></td>
   </tr>
  <tr><td width="150" align="right" valign="top"><label>Perihal Surat</label></td>
    <td width="16" align="center" valign="top">:</td>
    <td width="428"><?=$xrecord['perihal_su']?></td>
   </tr>
  <tr><td width="150" align="right" valign="top"><label>Asal Surat</label></td>
    <td width="16" align="center" valign="top">:</td>
    <td width="428"><?=$xrecord['asal_su']?></td>
   </tr>
  <tr><td width="150" align="right" valign="top"><label>Tujuan Surat</label></td>
    <td width="16" align="center" valign="top">:</td>
    <td width="428"><?=$xrecord['tujuan_su']?></td>
   </tr>
   <tr>
    <td colspan="3" align="right" valign="top"><hr /></td>
    </tr>

   <tr>
   <td align="right" valign="top"><label>Tanggal Terima Surat </label></td>
   <td align="center" valign="top">:</td>
   <td><input name="tglterima" type="text" id="date_filed_for-1" style="width:100px;" value="<?=$arecord['tglditerima']?>"></td>
  </tr>

   <tr>
   <td align="right" valign="top"><label>Tanggal Disposisi </label></td>
   <td align="center" valign="top">:</td>
   <td><input type="text" name="tgldisposisi" id="date_filed_for-2" style="width:100px;" value="<?=$arecord['tgldisposisi']?>"></td>
  </tr>
   <tr>
   <td align="right" valign="top"><label>Isi Disposisi</label></td>
   <td align="center" valign="top">:</td>
   <td><textarea name="isidisposisi" id="isidisposisi" style="width:400px;height:50px;"><?=$arecord['isidisposisi']?></textarea>
     <input name="acc_id" readonly type="hidden" id="id" value="<?=$_SESSION['id']?>" />
     <input name="idsurat" readonly type="hidden" id="id" value="<?=$record['idsurat']?>" />
     <input name="idx" readonly type="hidden" id="id" value="<?=$arecord['id']?>" />
     </td>
  </tr>
   <tr>
     <td align="right" valign="top">Yang Mendisposisi</td>
     <td align="center" valign="top">:</td>
     <td><input name="pendisposisi" type="text" id="menu2" style="width:300px; height:15px;" value="<?=$arecord['pendisposisi']?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Tindak Lanjut</td>
     <td align="center" valign="top">:</td>
     <td><textarea name="tindaklanjut" id="tindaklanjut" style="width:400px;height:50px;"><?=$arecord['tindaklanjut']?></textarea></td>
   </tr>

 </table>
</div>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <?php if($akunRecordSet->getRecordCount() == 1){?>
    <input type="submit" value="Update Isian Surat" name="usuratstatus" class="tombol" id="usuratstatus">
    <?php }else{?>
    <input type="submit" value="Insert Isian Surat" name="isuratstatus" class="tombol" id="isuratstatus">
    <?php }?>
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
</form>
</div>
<div class="clear"></div>

			<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }elseif($_REQUEST[tampil]=='3')
{
	$id = $_GET['id']; 
	$name = 'user_level';
	$parameter = new Parameter();
	$pegRecordSet = $parameter->getParameterById($name,$id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
	$xid = $record[id]; 
	$pegRecordSet3 = $parameter->getAkunAccesById($id);
	$record2 = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet3->getRecordCount() == 1)
    {
        $record2 = $pegRecordSet3->getNextRecord();
    }
?>
<div class="clear"></div>
<div id="judulForm">EDIT ACCESS AKUN</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="500" border="0" class="" cellspacing="0">
  <tr>
    <td width="27%" align="right" valign="top">ID ACCESS</td>
    <td width="4%" align="center" valign="top">:</td>
    <td width="69%">
    <input name="kode" type="hidden" readonly style="width:100px; height:35px;" id="menu" value="<?=$record[1]?>">
    <input name="idacces" type="text" readonly style="width:50px;" id="idacces" value="<?=$record[id]?>" />
    <input name="group" type="hidden" readonly style="width:50px;" id="group" value="<?=$record[0]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nama Access Login</td>
     <td align="center" valign="top">:</td>
    <td><input name="nama" type="text" id="nama" style="width:200px; " value="<?=$record[description]?>">
    </td>
   </tr>

   <tr>
     <td align="right" valign="top">Keterangan</td>
     <td align="center" valign="top">:</td>
     <td><textarea name="notes" id="notes" style="width:300px;"><?=$record[notes]?></textarea></td>
   </tr>
   <tr>
     <td align="right" valign="top">Acces Menu</td>
     <td align="center" valign="top"> :  </td>
     <td>     <strong>Content</strong><br />
     <input type="checkbox" value="1" name="acces_1" <?=chekData('1',$record2[action_1])?> /> Akun Admin
     <input type="checkbox" value="1" name="acces_2" <?=chekData('1',$record2[action_2])?> /> Ganti Password
     <input type="checkbox" value="1" name="acces_3" <?=chekData('1',$record2[action_3])?> /> Parameter <br />
     <input type="checkbox" value="1" name="acces_4" <?=chekData('1',$record2[action_4])?> /> Aktivitas Log
     <input type="checkbox" value="1" name="acces_5" <?=chekData('1',$record2[action_5])?> /> Keluar
     <br /><hr class="hr" />
     <strong>Surat Masuk</strong><br />
     <input type="checkbox" value="1" name="acces_6" <?=chekData('1',$record2[action_6])?> /> Post Surat
     <input type="checkbox" value="1" name="acces_7" <?=chekData('1',$record2[action_7])?> /> Cari Surat
     <input type="checkbox" value="1" name="acces_8" <?=chekData('1',$record2[action_8])?> /> Result
     <input type="checkbox" value="1" name="acces_9" <?=chekData('1',$record2[action_9])?> /> Review
     <br /> <hr class="hr" />
     <strong>Surat Keluar</strong><br />
     <input type="checkbox" value="1" name="acces_10" <?=chekData('1',$record2[action_10])?> /> Post Surat
     <input type="checkbox" value="1" name="acces_11" <?=chekData('1',$record2[action_11])?> /> 
     Result
     <br /></td>
   </tr>
  <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
 </table></div>
  <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    
    <input type="submit" value="Upadata Data" name="uaccess" class="tombol" id="uaccess">
    
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
</form>
</div>
<?php }elseif($_REQUEST[tampil]=='33')
{
	$id = $_GET['xid']; 
	$nma=$_GET['nm'];
	if($nma=='peng'){$nm='Pengirim'; $name = 'pengirim'; $group='kirim';}
	elseif($nma=='jepeng'){$nm='Jenis Pengiriman';$name='jenis_kirim'; $group='jekir';}
	elseif($nma=='bagian'){$nm='Bagian'; $name='bagian';$group='sub_bidang';}
	$parameter = new Parameter();
	$pegRecordSet = $parameter->getParameterById($name,$id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
	
?>
<div class="clear"></div>
<div id="judulForm">EDIT Parameter <?=$nm?></div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="500" border="0" class="" cellspacing="0">
  <tr>
    <td width="27%" align="right" valign="top">ID <?=$nm?></td>
    <td width="4%" align="center" valign="top">:</td>
    <td width="69%">
    <input name="name" type="hidden" readonly style="width:100px;" id="menu" value="<?=$record[0]?>">
    <input name="id" type="text" readonly style="width:50px;" id="idacces" value="<?=$record[id]?>" />
    <input name="group" type="hidden" readonly style="width:50px;" id="group" value="<?=$record[groups]?>" /></td>
   </tr>
   <tr>
     <td align="right" valign="top">Nama <?=$nm?></td>
     <td align="center" valign="top">:</td>
    <td><input name="nama" type="text" id="nama" style="width:200px; " value="<?=$record[description]?>">
    </td>
   </tr>

   <tr>
     <td align="right" valign="top">Deskripsi <?=$nm?></td>
     <td align="center" valign="top">:</td>
     <td><textarea name="notes" id="notes" style="width:300px;"><?=$record[notes]?></textarea></td>
   </tr>
  <tr>
  <td colspan="3">&nbsp;</td>
  </tr>
 </table></div>
  <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    
    <input type="submit" value="Upadata Data" name="uparameter" class="tombol" id="uparameter">
    
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
</form>
</div>
<?php }elseif($_REQUEST[tampil]=='5')
{ 
	$parameter = new Parameter();
	$akun = new Account();
	$group='akun';$level='user_level'; 
	$pegRecordSet1=$parameter->getKategoriAkun($level);
	
	$id = $_GET['id']; 
	$pegRecordSet = $akun->getAkunById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
?>
<div id="judulForm">EDIT ADMIN </div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" class="post_message">
 <table width="600" style="border-collapse:collapse;">
   <tr>
     <td width="23%" class="td3">Username</td>
    <td width="77%" class="td2"><input type="hidden" value="<?=$record[acc_id]?>" name="id" />
      <input name="user" type="text" id="nama2" style="width:200px; " value="<?=$record[acc_user]?>">
    </td>
   </tr>
   <tr>
     <td class="td3">Nama</td>
     <td class="td2">
    <input name="nama" type="text" id="nama3" style="width:200px; " value="<?=$record[acc_nama]?>"> 
    <div class="error"><?php echo isset($error['image']) ? $error['image'] : '';?></div>
     </td>
   </tr>
   <tr>
     <td class="td3">Level</td>
     <td class="td2">
       <select name="level" id="level">
         <option selected="selected">Pilih</option>
         <?php while( ($trecord2 = $pegRecordSet1->getNextRecord()) !== false ){
		if($record[level]==$trecord2[id]){ ?>
         <option value="<?=$trecord2[1]?>" <?php echo isset($_POST['kat']) && $_POST['kat']==$trecord2[1] ? 'selected="selected"': $record[level];?> selected="selected"> <?=$trecord2[2]?> </option>
         <?php }else{?>
         <option value="<?=$trecord2[1]?>" <?php echo isset($_POST['kat']) && $_POST['kat']==$trecord2[0] ? 'selected="selected"': $record[level];?>>
           <?=$trecord2[2]?></option>
         <?php }}?>
       </select>
     </td>
   </tr>
   <tr>
     <td class="td3">Keterangan</td>
     <td class="td2">
       <textarea name="ket" id="ket" style="width:300px; font-size:14px; height:40px;"><?php echo isset($_POST['ket']) ? $_POST['ket'] : $record[acc_notes];?></textarea>
     </td>
   </tr>
   <tr>
     <td class="td3">Group</td>
     <td class="td2">
       <input name="group" type="text" id="group2" style="width:300px; height:25px;"value="<?php echo isset($_POST['group']) ? $_POST['group'] : $record[acc_group];?>" />
     </td>
   </tr>

  <tr>

    <td colspan="2">
    </td>
  </tr>
</table>

<div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
	<input type="submit" value="Update" name="uAkun" class="tombol" id="uAkun">
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
</form>
</div>

<?php }elseif($_REQUEST[tampil]=='6')
{ $query=mysql_query("SELECT*FROM co_questbook WHERE idquest='".$_GET[id]."'");
$jaln=mysql_fetch_array($query);
?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Edit Testimonies</h3></header>
<div class="module_content">
<form action="coproses.php" method="post" enctype="multipart/form-data" class="post_message">
 <table width="100%" border="0" class="tableie" cellspacing="0">
   <tr>
     <td width="14%" height="25">Status </td>
    <td width="86%">: <span class="tdin1">
      <?php if($jaln[status]=='1'){echo"<input type=\"radio\" value=\"1\" name=\"status\" checked=\"checked\" /> Aktif <input type=\"radio\" value=\"0\" name=\"status\" /> Tidak Aktif";}else {echo"<input type=\"radio\" value=\"1\" name=\"status\" /> Aktif <input type=\"radio\" value=\"0\" name=\"status\" checked=\"checked\" /> Tidak Aktif";}?>
    </span></td>
   </tr>
   <tr>
     <td>Tanggal Kirim</td>
     <td><span class="tdin1">: 
      
         <?=TanggalUbah($jaln[tanggal])?>
     </span></td>
   </tr>
   <tr>
     <td>Email</td>
     <td>: <span class="tdin1">
       <?=$jaln[email]?>
     </span></td>
   </tr>
   <tr>
     <td><label>Pesan</label></td>
     <td>: <?=$jaln[komentar]?>
       <input type="hidden" name="ids" value="<?=$jaln[id]?>" /></td>
   </tr>
  <tr>

    <td colspan="2"><input type="submit" value="Update" name="ubukutamu" class="tombol" id="uproduk">
    <input name="Reset" type="reset" onClick="javascript:history.back(-0)" value="Reset">
    </td>
  </tr>
</table>


</form>
</div>
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }
elseif($_REQUEST['tampil']=='10')
{
$linkQ=mysql_query("SELECT*FROM tbnews where berita_id='".$_GET[id]."'");$jaLink=mysql_fetch_array($linkQ);$isinya=$jaLink['berita_isi'];
?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Edit Bukutamu</h3></header>
<div class="module_content">
<form action="coproses.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="25%" height="25" align="right" valign="top">Judul Berita :</td>
      <td width="75%"><input name="judul" type="text" id="judul" size="100" value="<?=$jaLink[berita_judul]?>" />
        <input type="hidden" name="id" id="id" value="<?=$jaLink['berita_id']?>" /></td>
    </tr>
    <tr>
      <td height="25" align="right" valign="top">Pengirim :</td>
      <td><input name="pengirim" type="text" id="pengirim" size="50" value="<?=$jaLink[berita_penulis]?>" />
        <?php  $tgljam=date("Y-m-d H:i:s"); ?>
        <input name="tglb" type="text" id="tglb" value="<?=$jaLink[berita_tanggal]?>"  /></td>
    </tr>
    <tr class="form">
      <td height="25" align="right" valign="top"><div align="right">Foto Utama :</div></td>
      <td><input name="fotoBerita" type="file" id="fotoBerita"  value="<?=$jaLink[berita_foto]?>"/></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Isi <br />
        <?php

// Helper function for this sample file.
function printNotFound( $ver )
{
	static $warned;

	if (!empty($warned))
		return;

	echo '<p><br><strong><span style="color: #ff0000">Error</span>: '.$ver.' not found</strong>. ' .
		'This sample assumes that '.$ver.' (not included with CKFinder) is installed in ' .
		'the "ckeditor" sibling folder of the CKFinder installation folder. If you have it installed in ' .
		'a different place, just edit this file, changing the wrong paths in the include ' .
		'(line 57) and the "basePath" values (line 70).</p>' ;
	$warned = true;
}

// This is a check for the CKEditor PHP integration file. If not found, the paths must be checked.
// Usually you'll not include it in your site and use correct path in line 57 and basePath in line 70 instead.
// Remove this code after correcting the include_once statement.
if ( !@file_exists( '../inc-plug1n/ckeditor/ckeditor.php' ) )
{
	if ( @file_exists('../inc-plug1n/ckeditor/ckeditor.js') || @file_exists('../inc-plug1n/ckeditor/ckeditor_source.js') )
		printNotFound('CKEditor 3.1+');
	else
		printNotFound('CKEditor');
}

include_once '../inc-plug1n/ckeditor/ckeditor.php' ;
require_once '../inc-plug1n/ckfinderer/ckfinder.php' ;


// This is a check for the CKEditor class. If not defined, the paths in lines 57 and 70 must be checked.
if (!class_exists('CKEditor'))
{
	printNotFound('CKEditor');
}
else
{

	$ckeditor = new CKEditor( ) ;
	$ckeditor->basePath	= '../inc-plug1n/ckeditor/' ;
	$ckeditor->config['height'] = 230;
	// Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
	// in CKEditor. The second parameter (optional), is the path for the
	// CKFinder installation (default = "/ckfinder/").
	CKFinder::SetupCKEditor( $ckeditor, '../inc-plug1n/ckfinderer/' ) ;

	$ckeditor->editor('fullIsi', $isinya);
}

?></td>
    </tr>
    <tr>
      <td height="45" colspan="2"><input name="uberita" type="submit" class="form-submit" id="tb"  value="Update"/></td>
    </tr>
  </table>
</form><div class="clear"></div>
</div>
<?php }elseif($_REQUEST['tampil']=='8'){
	$content=new Account();
	$pegRecordSet = $content->getAkunById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
 ?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Edit Data Admin</h3></header>
<div class="module_content">
 <form action="" method="post" enctype="multipart/form-data" >
<table width="70%" border="0" align="center" class="tableinput">
  <tr>
    <td width="40%" class="thh">Nama Login (Username) </td>
    <td width="60%" class="th">&nbsp;</td>
    <td width="60%" class="th"><input type="text" name="username" value="<?=$record[1]?>" /><input type="hidden" name="adid" value="<?=$id;?>"></td>
    </tr>
  <tr>
    <td class="thh">Nama Administrator</td>
    <td class="th">&nbsp;</td>
    <td class="th"><input type="text" name="nama" value="<?=$record[3]?>" /></td>
  </tr>
  <tr>
    <td class="thh">Password Lama </td>
    <td class="th">&nbsp;</td>
    <td class="th"><input name="passlama" type="password" id="passlama" size="40" /></td>
    </tr>
  <tr>
    <td class="thh">Password Baru </td>
    <td class="th">&nbsp;</td>
    <td class="th"><input name="passbaru" type="password" id="passbaru"  size="40" /></td>
  </tr>
  <tr>
    <td class="thh">Konfirmasi Password Baru </td>
    <td class="th">&nbsp;</td>
    <td class="th"><input name="cekpassbaru" type="password" id="cekpassbaru"  size="40" /></td>
    </tr>
  <tr>
    <td height="46" colspan="3"><div align="center">
      <input name="UpdateUser" type="submit" class="tombo" id="UpdateUser" value="Update">
      <input type="reset" value="Reset" name="update_bukutamu2" class="tombo" onClick="javascript:history.back(1)" />
    </div></td>
    </tr>
  <tr>
    <td height="46" colspan="3">Cat : Setelah anda mengubah password anda harus mengingat dan menyimpannya dengan baik karena username dan password inilah yang nantinya anda pakai untuk login ke halaman administrator ini. </td>
  </tr>
</table>
</form>
</div>
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
         </footer>

<?php 
if(isset($_POST[UpdateUser])){
$passlama = $_POST['passlama'];
$passbaru =$_POST['passbaru'];
$cekpassbaru = $_POST['cekpassbaru'];

$query = mysql_query("select*from co_account where acc_id='".$_POST[adid]."'");
$baris = mysql_fetch_array($query);

if($passlama == "" || $passbaru == "" || $cekpassbaru == ""){
echo"<script>alert('maaf, Silahkan isi password lama, password baru dan konfirmasi jika ingin mengganti password lama anda');document.location.href='javascript:history.go(-1)';</script>";
}
elseif($passlama == $baris[password]){
echo"<script>alert('Maaf, password anda salah');document.location.href='javascript:history.go(-1)';</script>";
}
elseif($passbaru !== $cekpassbaru){
echo"<script>alert('Password anda tidak sesuai, silahkan masukkan lagi password baru anda');document.location.href='javascript:history.go(-1)';</script>";
}
else
{
$password = md5($cekpassbaru);
$query = mysql_query("update co_account set acc_pass= '".$password."',acc_user='".$_POST[username]."',acc_nama='".$_POST['nama']."'  where acc_id = '".$_SESSION[id]."'");
echo"<script>alert('Username dan Password anda sudah diganti');document.location.href='?link=coedit&tampil=8&isi=Options Administrator';</script>";
}
}

}
?>
