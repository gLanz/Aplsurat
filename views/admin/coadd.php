<? session_start();  
if(isset($_SESSION['error'])){  
$error = $_SESSION['error'];  
$_POST = $_SESSION['post'];  
unset($_SESSION['error']);  
unset($_SESSION['post']);  
} 
require"../../config/includes.php";
?>
<div class="clear"></div>
		
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


<? if($_REQUEST['tam']=='surati')
{
	$parameter = new Surat(); 

?>

<div id="judulForm">TAMBAH SURAT</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data"  id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="600" border="0" cellspacing="0">
   <tr>
     <td width="29%" align="right" valign="top"><label>Nomor Surat Masuk</label></td>
     <td width="2%" align="center" valign="top">:</td>
     <td width="69%" valign="top"><input id="nosurat" name="nosurat" style=" width:200px;" type="text" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '';?>">
  
     </td></tr>
      <tr>
        <td align="right" valign="top">Perihal Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><textarea name="perihal" cols="40" id="perihal"><?php echo isset($_POST['keterangan']) ? $_POST['keterangan'] : '';?></textarea>
          
          <input name="ixalbum" type="hidden" id="ixalbum" value="<?=$_GET[kat]?>" />
          
          
          </td>
      </tr>
      <tr>
        <td align="right" valign="top">Asal Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="asal" name="asal" type="text" style=" width:300px;" value="" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Tujuan </td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="tujuan" name="tujuan" type="text" style=" width:300px;" value="" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Tanggal Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="date_filed_for-2" class="datepicker" style=" width:80px;" name="tglsurat" type="text"/>

        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Nomor Agenda Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="noagenda" name="noagenda" type="text" style="width:300px;" value="" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Nama Penerima Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="penerima" name="penerima" type="text" style="width:300px" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '';?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top"><label>File Surat</label></td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input name="filesurat" type="file" id="filesurat" style="border:none;" value="<?php echo isset($_FILES['image']['name']) ? $_POST['image'] : '';?>"  /> <br />
          * Isi File Surat jika ada, support file .pdf</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
   <td></td>
   <td>&nbsp;</td>
   <td><input name="tsurat" type="submit" id="tsurat" value="Simpan">
     <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label></td></tr>
  </table>
  </div>
   </form>
</div>
<? }elseif($_REQUEST['tam']=='surato'){ 
?>
<div id="judulForm">TAMBAH SURAT KELUAR</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data" id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="600" border="0" cellspacing="0">
   <tr>
     <td width="29%" align="right" valign="top">Tanggal Surat diterima</td>
     <td width="2%" align="center" valign="top">:</td>
     <td width="69%" valign="top"><input id="date3" name="tglsuratterima" class="datepicker"  style=" width:100px;" type="text" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '';?>">
  
     </td></tr>
      <tr>
        <td align="right" valign="top">Bagian Pengirim</td>
        <td align="center" valign="top">:</td>
        <td valign="top">
                <select name="bagian" id="bagian">
           <option selected="selected">Pilih</option>
           <? while( ($barecord = $baRecordSet->getNextRecord()) !== false ){?>
           <option value="<?=$barecord[1]?>" <?php echo isset($_POST['bagian']) && $_POST['bagian']==$barecord[1] ? 'selected="selected"': '';?>>
             <?=$barecord[2]?>
             </option>
           <? }?>
         </select>
        </td></td>
      </tr>
      <tr>
        <td align="right" valign="top">Nomor Agenda </td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="noagenda" name="noagenda" type="text" style=" width:300px;" value="" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Perihal Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><textarea name="perihal" cols="40" id="perihal"><?php echo isset($_POST['perihal']) ? $_POST['perihal'] : '';?></textarea></td>
      </tr>
      <tr>
        <td align="right" valign="top">Tanggal Surat Keluar</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="date4"  class="datepicker"name="tglsuratkeluar" type="text" style=" width:80px;" value="<?php echo isset($_POST['perihal']) ? $_POST['perihal'] : '';?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Tanggal Kirim Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="date_filed_for-2" class="datepicker" style=" width:80px;" name="tglkirimsurat" type="text" value="<?php echo isset($_POST['perihal']) ? $_POST['perihal'] : '';?>"/>

        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Pengirim Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top">
        <select name="pengirim" id="pengirim">
           <option selected="selected">Pilih</option>
           <? while( ($pegrecord = $pegRecordSet->getNextRecord()) !== false ){?>
           <option value="<?=$pegrecord[2]?>" <?php echo isset($_POST['pengirim']) && $_POST['pengirim']==$pegrecord[2] ? 'selected="selected"': '';?>>
             <?=$pegrecord[2]?>
             </option>
           <? }?>
         </select>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Yang menyerahkan surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="penyerah" name="penyerah" type="text" style="width:300px" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '';?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top"><label>Penerima Surat</label></td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="penerima" name="penerima" type="text" style="width:300px" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '';?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Jenis Pengiriman</td>
        <td align="center" valign="top">:</td>
        <td valign="top">
        <select name="jeniskirim" id="kategori">
           <option selected="selected">Pilih</option>
           <? while( ($jkrecord = $jkRecordSet->getNextRecord()) !== false ){?>
           <option value="<?=$jkrecord[2]?>" <?php echo isset($_POST['level']) && $_POST['level']==$jkrecord[2] ? 'selected="selected"': '';?>>
             <?=$jkrecord[2]?>
             </option>
           <? }?>
         </select>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Nomor resi</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="noresi" name="noresi" type="text" style=" width:300px;" value="<?php echo isset($_POST['perihal']) ? $_POST['perihal'] : '';?>" /></td>
      </tr>
      <tr>
        <td align="right" valign="top">Tanggal resi</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input id="date_filed_for-1" class="datepicker" style=" width:80px;" name="tglresi" type="text"/ value="<?php echo isset($_POST['perihal']) ? $_POST['perihal'] : '';?>"></td>
      </tr>
      <tr>
        <td align="right" valign="top">File Berkas Surat</td>
        <td align="center" valign="top">:</td>
        <td valign="top"><input name="filesurat2" type="file" id="filesurat2" value="<?php echo isset($_FILES['image']['name']) ? $_POST['image'] : '';?>"  /><br />* Isi File Surat jika ada, support file .pdf</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
      </tr>
  </table>
  </div>
    <div id="untukTombol">
   
    <input type="submit" value="Simpan" name="tsuratkeluar" id="tsuratkeluar">
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
  </form>
</div>
<? }elseif($_REQUEST['tam']=='access')
{ 
?>
<div id="judulForm">TAMBAH ACCESS AKUN</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data"  id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
 <table width="600" border="0"  cellspacing="0">

      <tr>
        <td align="right" valign="top">ID Access </td>
        <td align="center" valign="top">:</td>
        <td><div>
          <input id="idacces" name="idaccess" type="text" style=" width:50px;" value="" />
          <?php echo isset($error['st']) ? $error['st'] : '';?></div>
        </td>
      </tr>
      <tr>
        <td width="30%" align="right" valign="top">Nama Acces Login</td>
        <td width="3%" align="center" valign="top">:</td>
        <td width="67%">
          <input id="nama" name="nama" type="text" style=" width:200px;" value="" />
          <?php echo isset($error['image']) ? $error['image'] : '';?>
        </td>
      </tr>
      <tr>
        <td align="right" valign="top">Description</td>
        <td align="center" valign="top">:</td>
        <td><textarea name="notes" cols="30" id="notes"><?php echo isset($_POST['keterangan']) ? $_POST['keterangan'] : '';?></textarea></td>
      </tr>
      <tr>
        <td align="right" valign="top">Acces Menu</td>
        <td align="center" valign="top">:</td>
        <td>
     <strong>Content</strong><br />
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
     <input type="checkbox" value="1" name="acces_11" <?=chekData('1',$record2[action_11])?> /> Result

     <br />
</td>
  </tr></table></div>
  <div id="untukTombol">
   
    <input type="submit" value="Simpan" name="taccess" id="taccess">
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
  
  </form>
  </div>
<? }elseif($_REQUEST['tam']=='parameter')
{ 
	if($_GET['nm']=='peng'){$nm='Pengirim';$name='pengirim';$groups='kirim';}
	elseif($_GET['nm']=='jepeng'){$nm='Jenis Pengiriman'; $name='jenis_kirim';$groups='jekir';}
	elseif($_GET['nm']=='bagian'){$nm='Bagian'; $name='bagian';$groups='sub_bidang';}
?>
<div id="judulForm">TAMBAH PARAMETER <?=$nm?></div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data"  id="cekform">
<div id="untukForm">
 <table width="500" border="0"  cellspacing="0">

      <tr>
        <td align="right" valign="top"># ID <?=$nm?> </td>
        <td align="center" valign="top">:</td>
        <td>
          <input id="id" name="id" type="text" style=" width:50px;" value="" />
          <input id="name" name="name" type="hidden" style=" width:50px;" value="<?=$name?>" />
          <input id="groups" name="groups" type="hidden" style=" width:50px;" value="<?=$groups?>" />    
        </td>
      </tr>
      <tr>
        <td width="30%" align="right" valign="top"># Nama <?=$nm?></td>
        <td width="3%" align="center" valign="top">:</td>
        <td width="67%"><input id="nama" name="nama" type="text" style=" width:200px;" value="" /></td>
      </tr>
      <tr>
        <td align="right" valign="top"># Deskripsi <?=$nm?></td>
        <td align="center" valign="top">:</td>
        <td><textarea name="notes" cols="30" id="notes"></textarea></td>
      </tr>
      <tr>
        <td valign="top"></td>
        <td valign="top">&nbsp;</td>
        <td>
</td>
  </tr></table></div>
<div id="error" class="error"></div>
  <div id="untukTombol">
   
    <input type="submit" value="Simpan" name="tparameter" id="tparameter">
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
  
  </form>
  </div>
<? }elseif($_REQUEST['tam']=='admin'){
	$account= new Parameter();
		$group='akun';$level='user_level'; 
	$pegRecordSet1=$account->getKategoriAkun($level);

	
	?>
<div id="judulForm">TAMBAH ADMIN</div>
<div id="badanForm">
<form action="coproses.php" method="post" enctype="multipart/form-data"  id="cekform">
<div id="error" class="error"></div>
<div id="untukForm">
<table width="600" style="border-collapse:collapse;">
  <tr>
    <td width="23%" class="td3">Username</td>
    <td width="77%" class="td2"><input name="username" type="text" id="username" style="width:300px;" value="<?=$record[acc_user]?>" /></td>
  </tr>
  <tr>
    <td class="td3">Nama</td>
    <td class="td2"><input name="nama2" type="text" id="nama2" style="width:300px; height:25px;"value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : $record[acc_nama];?>" /></td>
  </tr>
  <tr>
    <td class="td3">Level</td>
    <td class="td2"><select name="level" id="level">
      <option selected="selected">Pilih</option>
      <? while( ($trecord2 = $pegRecordSet1->getNextRecord()) !== false ){
			
		if($record[level]==$trecord2[id]){
			 ?>
      <option value="<?=$trecord2[1]?>" <?php echo isset($_POST['kat']) && $_POST['kat']==$trecord2[1] ? 'selected="selected"': $record[level];?> selected="selected">
        <?=$trecord2[2]?>
        </option>
      <? }else{?>
      <option value="<?=$trecord2[1]?>" <?php echo isset($_POST['kat']) && $_POST['kat']==$trecord2[0] ? 'selected="selected"': $record[level];?>>
        <?=$trecord2[2]?>
        </option>
      <? }}?>
    </select></td>
  </tr>
  <tr>
    <td class="td3">Keterangan</td>
    <td class="td2"><input type="hidden" name="id2" value="<?=$record[0]?>" />
      <textarea name="ket" id="ket" style="width:300px; font-size:14px; height:40px;"><?php echo isset($_POST['ket']) ? $_POST['ket'] : $record[acc_notes];?></textarea>
      <br /></td>
  </tr>
  <tr>
    <td class="td3">Group</td>
    <td class="td2"><input name="group" type="text" id="group" style="width:300px; height:25px;"value="<?php echo isset($_POST['group']) ? $_POST['group'] : $record[acc_group];?>" /></td>
  </tr>

</table>
</div>

  <div id="untukTombol">
   
    <input type="submit" value="Simpan" name="addUser">
    <label><input type="button" value="Batal" aria-hidden="true" onClick="javascript:$.facebox.close();"></label>
    </div>
  
  </form>
  </div>
  
<? }elseif($_REQUEST['tam']=='berita')
{	$parameter =new Parameter();
	$group='kat_artikel'; 
	$pegRecordSet2=$parameter->getKategoriArtikel($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }

	
	?>
    
<header>
<h3>Post Tambah Berita</h3></header>

    <div class="sidebarisi">
    <form action="coproses.php" method="post" enctype="multipart/form-data">
      <table width="90%" align="center" class="tableinput">
        <tr>
          <td height="34">&nbsp;</td>
          <td><div align="right">Judul berita:</div></td>
          <td width="70%"><input  name="judul" type="text" id="judul" size="50" />
          <div class="error"><?php echo isset($error['judul']) ? $error['judul'] : '';?></div></td>
        </tr>
       <tr>
          <td width="11%" height="34">&nbsp;</td>
        <td width="19%"><div align="right">Pengirim :</div></td>
          <td><input name="pengirim" type="text" id="pengirim" />
            <?php  $tgljam=date("Y-m-d H:i:s"); ?>
            Post date  : <input name="tglb" type="text" id="tglb" value="<? echo"$tgljam";?>"  /></td>
        </tr>
       <tr>
         <td height="34">&nbsp;</td>
         <td><div align="right">Kategori :</div></td>
         <td><select name="kategori" id="kategori">
           <option selected="selected">Pilih</option>
           <? while( ($trecord2 = $pegRecordSet2->getNextRecord()) !== false ){?>
           <option value="<?=$trecord2[1]?>" <?php echo isset($_POST['level']) && $_POST['level']==$trecord2[1] ? 'selected="selected"': '';?>>
             <?=$trecord2[2]?>
            </option>
           <? }?>
         </select></td>
       </tr>
        <tr>
          <td height="85" colspan="3" valign="top">Isi <br />
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
if ( !@file_exists( '../../libs/plug1n/ckeditor/ckeditor.php' ) )
{
	if ( @file_exists('../../libs/plug1n/ckeditor/ckeditor.js') || @file_exists('../../libs/plug1n/ckeditor/ckeditor_source.js') )
		printNotFound('CKEditor 3.1+');
	else
		printNotFound('CKEditor');
}

include_once '../../libs/plug1n/ckeditor/ckeditor.php' ;
require_once '../../libs/plug1n/ckfinderer/ckfinder.php' ;


// This is a check for the CKEditor class. If not defined, the paths in lines 57 and 70 must be checked.
if (!class_exists('CKEditor'))
{
	printNotFound('CKEditor');
}
else
{

	$ckeditor = new CKEditor( ) ;
	$ckeditor->basePath	= '../../libs/plug1n/ckeditor/' ;
	$ckeditor->config['height'] = 230;
	// Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
	// in CKEditor. The second parameter (optional), is the path for the
	// CKFinder installation (default = "/ckfinder/").
	CKFinder::SetupCKEditor( $ckeditor, '../../libs/plug1n/ckfinderer/' ) ;

	$ckeditor->editor('Isi', $initialValue);
}

?></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><input name="tberita" type="submit" class="form-submit" id="tberita" value="Submit" />
          <input name="Reset2" type="reset" onclick="javascript:history.back(-0)" value="Reset" /></td>
        </tr>
      </table>
    </form>
</div>
<? }?>

<div class="clear"></div>
			<footer>
			  <div class="submit_link"></div>
         </footer>