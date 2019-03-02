<?php 
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
<?php if($_REQUEST['det']=='1')
{
	$id = $_GET['id'];
	$content=new Surat();
	$pegRecordSet = $content->getSuratById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
?>
<div class="clear"></div>
		
<div id="judulForm">DETAIL SURAT</div>
<div id="badanForm">
 <table width="664" class="">
   <tr>
     <td width="31%" class="td3">Nomor Surat</td>
     <td width="66%" class="td4"><?=$record['nosurat_su']?></td>
   </tr>
   <tr >
     <td class="td3">Perihal </td>
     <td class="td4"><?=$record['perihal_su']?></td>
   </tr>
   <tr>
     <td class="td3">Asal Surat</td>
     <td class="td4"><?=$record['asal_su']?></td>
   </tr>
   <tr>
     <td class="td3">Tujuan</td>
     <td class="td4"><?=$record['tujuan_su']?></td>
   </tr>
   <tr>
     <td class="td3">Penerima</td>
     <td class="td4"><?=$record['penerima_su']?></td>
   </tr>
   <tr>
     <td class="td3">Tangal Surat</td>
     <td class="td4"><?=ubahTanggal($record['tglmasuk_su'])?></td>
   </tr>
   <tr>
     <td class="td3">Nomor Agenda</td>
     <td class="td4"><?=$record['no_agendasurat']?></td>
   </tr>
 </table>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <label><input type="button" value="Tutup" onClick="javascript:$.facebox.close();"></label>
    </div>
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }elseif($_REQUEST['det']=='2')
{	$id = $_GET['id'];
	$content=new Surat();
	$pegRecordSet = $content->getSuratSessionById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
?>
<div class="clear"></div>
		
<div id="judulForm">DETAIL SURAT AFTER RECEIVE</div>
<div id="badanForm">
 <table width="664" class="">
   <tr>
     <td width="31%" class="td3">Nomor Surat</td>
     <td width="66%" class="td4"><?=$record['nosurat_su']?></td>
   </tr>
   <tr >
     <td class="td3">Perihal </td>
     <td class="td4"><?=$record['perihal_su']?></td>
   </tr>
   <tr>
     <td class="td3">Asal Surat</td>
     <td class="td4"><?=$record['asal_su']?></td>
   </tr>
   <tr>
     <td class="td3">Tujuan</td>
     <td class="td4"><?=$record['tujuan_su']?></td>
   </tr>
   <tr>
     <td class="td3">Penerima</td>
     <td class="td4"><?=$record['penerima_su']?></td>
   </tr>
   <tr>
     <td class="td3">Tangal Surat</td>
     <td class="td4"><?=ubahTanggal($record['tglmasuk_su'])?></td>
   </tr>
   <tr>
     <td class="td3">Nomor Agenda</td>
     <td class="td4"><?=$record['no_agendasurat']?></td>
   </tr>
  
  <tr>
     <td class="td4">&nbsp;</td>
     <td class="td4">&nbsp;</td>
   </tr>
  <tr>
    <td class="td3">Tanggal diterima</td>
    <td class="td4"><?=ubahTanggal($record['tglditerima'])?></td>
  </tr>
  <tr>
    <td class="td3">Tanggal disposisi</td>
    <td class="td4"><?=ubahTanggal($record['tgldisposisi'])?></td>
  </tr>
  <tr>
    <td class="td3">Isi Disposisi</td>
    <td class="td4"><?=$record['isidisposisi']?></td>
  </tr>
  <tr>
    <td class="td3">Pendisposisi</td>
    <td class="td4"><?=$record['pendisposisi']?></td>
  </tr>
  <tr>
    <td class="td3">Tindak lanjut</td>
    <td class="td4"><?=$record['tindaklanjut']?></td>
  </tr> 
 </table>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <label><input type="button" value="Tutup" onClick="javascript:$.facebox.close();"></label>
  </div>
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
</footer>
<?php }elseif($_REQUEST['det']=='3')
{
	$id = $_GET['id'];
	$content=new Surat();
	$pegRecordSet = $content->getSukeById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }
?>
<div class="clear"></div>
		
<div id="judulForm">DETAIL SURAT KELUAR</div>
<div id="badanForm">
 <table width="664" class="">
   <tr>
     <td width="31%" class="td3">Nomor Agenda</td>
     <td width="66%" class="td4"><?=$record['sk_noagenda']?></td>
   </tr>
   <tr >
     <td class="td3">Perihal </td>
     <td class="td4"><?=$record['sk_perihal']?></td>
   </tr>
   <tr>
     <td class="td3">Tanggal Surat Keluar</td>
     <td class="td4"><?=ubahTanggal($record['sk_tglkeluar'])?></td>
   </tr>
   <tr>
     <td class="td3">Pengirim</td>
     <td class="td4"><?=$record['sk_pengirim']?></td>
   </tr>
   <tr>
     <td class="td3">Tanggal Surat</td>
     <td class="td4"><?=ubahTanggal($record['sk_tglkeluar'])?></td>
   </tr>
   <tr>
     <td class="td3">Yang Menyerahkan Surat</td>
     <td class="td4"><?=$record['sk_penyerah']?></td>
   </tr>
   <tr>
     <td class="td3">Yang Menerima Surat</td>
     <td class="td4"><?=$record['sk_penerima']?></td>
   </tr>
   <tr>
     <td class="td3">Tangal Terima</td>
     <td class="td4"><?=ubahTanggal($record['sk_tglterima'])?></td>
   </tr>
   <tr>
     <td class="td3">Tanggal Kirim</td>
     <td class="td4"><?=ubahTanggal($record['sk_tglkirim'])?></td>
   </tr>
      <tr>
     <td class="td3">Jenis Pengiriman</td>
     <td class="td4"><?=$record['sk_jeniskirim']?></td>
   </tr>
      <tr>
     <td class="td3">Nomor Resi Pengiriman</td>
     <td class="td4"><?=$record['sk_noresi']?></td>
   </tr>
      <tr>
     <td class="td3">Tanggal Resi</td>
     <td class="td4"><?=ubahTanggal($record['sk_tglresi'])?></td>
   </tr>
 </table>
    <div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
    <label><input type="button" value="Tutup" onClick="javascript:$.facebox.close();"></label>
  </div>
<div class="clear"></div>
</div>
<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }elseif($_REQUEST['det']=='4'){
$id = $_GET['id'];
	$content=new Questbook();
	$pegRecordSet = $content->getQuestById($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 1)
    {
        $record = $pegRecordSet->getNextRecord();
    }	
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>View Testimonial</h3></header>
<div class="module_content">
<table width="70%" align="left" class="tableinput" style="border-collapse:collapse;">
  <tr>
    <td class="td3"><div align="left">Id</div></td>
    <td width="58%" class="td2"><?=$record['idquest']?></td>
  </tr>
    <tr>
    <td class="td3"><div align="left">Nama </div></td>
    <td class="td2"><?=$record['nama']?></td>
  </tr>
  <tr>
    <td class="td3"><div align="left">Email</div></td>
    <td class="td2"><?=$record['email']?></td>
  </tr>
  <tr>
    <td width="22%" class="td3"><div align="left">Isi</div></td>
    <td valign="top" class="td2"><?=$record['komentar']?></td>
  </tr>
    <tr>
      <td height="25" colspan="2" align="right" valign="top" class="td3">
        <form action="coproses.php" method="post" enctype="multipart/form-data">
  <table width="70%" border="1" style="border-collapse:collapse; margin-top:10px;">
    <tr>
      <td colspan="2" class="td3">Balas Testimonial</td></tr>
    <tr>
      <td width="21%" valign="top" class="td2">Header</td>
      <td width="79%" class="td2">Subject : [
        Re <?=substr($record['komentar'],0,50)?>...]<br />
        From : [ <?=$client_email?> ]<br />
        Text : [ text email ]<br />
        Html : [ Balasan Testimonial/Komentar ]<br />
        Send to : [
        <?=$record[3]?> <input type="hidden" value="<?=$record[3]?>" name="email" />
        <input type="hidden" value="<?=substr($record['pesan'],0,50)?>" name="subjek" />
        <input type="hidden" value="<?=$record[0]?>" name="japid" />
        ]</td>
      </tr>
    <tr>
      <td valign="top" class="td2">Isi Balasan</td>
      <td class="td2"><textarea name="isibalasan" style="width:500px; height:100px;"></textarea></td>
      </tr>
    <tr>
      <td valign="top" class="td2">&nbsp;</td>
      <td class="td2"><input type="submit" value="Balas"  name="balas" /></td>
      </tr>
  </table>
  </form>
      </td>
    </tr>
</table>

<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
            </div>
         </footer>
<?php }?>
