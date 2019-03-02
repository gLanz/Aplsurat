<?php ob_start();
session_start();
ob_clean();
if(isset($_SESSION['error'])){  
$error = $_SESSION['error'];  
$_POST = $_SESSION['post'];  
unset($_SESSION['error']);  
unset($_SESSION['post']);  
}

if($_REQUEST['li']==1){
	$p      = new Paging;
	$batas  = 10;
    $posisi = $p->cariPosisi($batas);
	$no=$posisi;
	$id='101';
    $news = new News(); // create a new news object
    $newsRecordSet = $news->getNewsLimit($posisi,$batas,$id); // set newsRecordSet to a MysqlRecordSet
?>

<div class="clear"></div>
<article class="module width_full">

<header><h3>Post Berita</h3></header>
                <article class="breadcrumbs"><a href="?link=coadd&tam=berita">Tambah Berita</a></article>
                <div class="clear"></div>

<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th></th> 
    				<th>Actions</th> 
                    <th>Judul </th> 
    				<th>Hits</th> 
    				<th>Created On</th> 
    				
				</tr> 
			</thead> 
            <?php 
			while( ($record = $newsRecordSet->getNextRecord()) !== false ){
			?>
            <tbody> 
				<tr> 
   					
                    <td><input type="checkbox"></td> 
    				<td><a href="?link=coedit&tampil=1&id=<?=$record[0]?>"><img src="images/icn_edit.png" width="12" title="Edit"> Edit</a>
                     <a href="?link=coview&det=2&id=<?=$record[0]?>" title="View"><img src="images/icn_search.png" alt="" width="12" title="Trash" /> View</a>
                     <a href="codelete.php?ket=haBer&id=<?=$record[0]?>"><img src="images/icn_trash.png" width="12" title="Hapus"> Hapus</a>
                    
                  </td>
                    <td><?=$record['berita_judul']?></td> 
    				<td><?=$record['hits']?></td> 
    				<td><?=TanggalUbah($record['berita_tanggal'])?></td> 
    				 
				</tr>  
			</tbody> 
			<?php }?>
  </table>		
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link">
  <?php
  $jmldata = mysql_num_rows(mysql_query("SELECT * FROM co_news "));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div >$linkHalaman</div><br>";
 ?>
              </div>
			</footer>
<?php }elseif($_REQUEST['li']==2){
	$account =new Account();
	$level='1';
	$pegRecordSet= $account->getUserSuperduper($level);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Post Sub Admin</h3></header>
	<article class="breadcrumbs"><a href="coadd.php?tam=admin" rel="faber">Tambah Data</a></article>
            <div class="clear"></div>
				<div class="module_content">

				    <table width="100%" cellspacing="0" style=" border-collapse:collapse;">
				      <tr>
				        <td width="16%" height="22"class="td1">Action</td>
				        <td width="6%" class="td1">ID</td>
				        <td width="15%"class="td1">Username</td>
				        <td width="17%"class="td1">Nama Lengkap</td>
				        <td width="10%" class="td1">Level</td>
				        <td width="9%" class="td1">Group</td>
				        <td width="13%" class="td1">Last Update</td>
                        <td width="14%" class="td1">Keterangan</td>
                      </tr>
				      <?php while( ($record = $pegRecordSet->getNextRecord()) !== false ){

						  ?>
				      <tbody>
				        <tr>
				          <td align="left" class="td2">
            <a href="coedit.php?tampil=5&id=<?=$record[0]?>&amp;isi=Edit Akun" title="Edit" rel="faberx"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a>
            <a href="codelete.php?ket=haAkun&id=<?=$record[0]?>" title="Hapus"><img src="images/icn_trash.png" width="12" title="Hapus" /> Hapus</a> 
            <a href="?link=copage&li=2&isi=Sub Admin&data=reset&id=<?=$record[0]?>" title="Reset Password"><img src="images/icn_reset.png" width="12" title="Reset" /> Reset</a> 
                          </td>
				          <td class="td2"># <?=$record['acc_id']?></td>
				          <td class="td2"><strong><?=$record['acc_user']?></strong></td>
				          <td class="td2"><?=$record['acc_nama']?></td>
				          <td class="td2"><?=$record['description']?></td>
				          <td class="td2"><?=$record['acc_group']?></td>
				          <td class="td2"><?=TanggalUbah($record['acc_lastupdate'])?></td>
				          <td class="td2"><?=$record['acc_notes']?></td>
			            </tr>
			          </tbody>
				      <?php }?>
			        </table>

<?php if($_REQUEST['data']=='reset'){
							$id=$_GET['id'];//$gro='jetusat';
	//$par=new Parameter();
	$idRecordSet = $account->getAkunById($id); // get the record set for this Id.
    $idrecord = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($idRecordSet->getRecordCount() == 1)
    {
        $idrecord = $idRecordSet->getNextRecord();
    }
						?>
                    Reset Password Akun<p></p>
                    <form action="coproses.php" method="post" enctype="multipart/form-data">
          <table width="703" style="border-collapse:collapse;">
            <tr>
            <td width="166" class="td3">ID</td>
            <td width="525" class="td2"><input type="text" readonly name="id" value="<?php echo isset($_POST['id']) ? $_POST['id'] : $idrecord[acc_id];?>" />
                          # Read Only</td>
                      </tr>
                      <tr>
                        <td class="td3">Password</td>
                        <td class="td2"><input name="password" type="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '12345';?>" size="50" /></td>
                      </tr>
                      <tr>
                        <td colspan="2" class="td4">
                          <input type="submit" name="uResetpass" value="Reset Password" id="uResetpass" class="button" />
                          <input type="reset" name="reset" value="Batal" class="button" onclick="javascript:history.back(0)" /></td>
                      </tr>
                    </table>
                    </form>
 <?php }?>
</div>

			<footer>
			  <div class="submit_link"></div>
			</footer>



<?php }elseif($_REQUEST['li']==3){ 
	$ref='1';
	$conten = new Surat(); // create a new news object
    $teamRecordSet = $conten->getSurat(); // set newsRecordSet to a MysqlRecordSet

?>

<div class="clear"></div>
		
		<article class="module width_full">
			<header>
<h3>Surat</h3>
<div id="isi"></div>
</header><article class="breadcrumbs"><a href="coadd.php?tam=surati" rel="faber">Tambah Surat Masuk</a></article>
<div class="clear"></div>
				<div class="module_content">
<div id="DivTo">
  <table width="100%" id="mytable">
		
                      <tr class="td1">
                            <th width="16%" height="22">Action</th>
				        <th width="18%">Nomor Angenda</th>
				        <th width="21%">Nomor Surat</th>
				        <th width="24%">Perihal</th>
				        <th width="21%">Asal</th>
			         </tr>

				      <?php
               while( ($record = $teamRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">
              <td>
                        <a href="coedit.php?tampil=sm&id=<?=$record[0]?>" title="Edit" rel="faber"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> |
                        <a href="codelete.php?ket=haSurati&id=<?=$record[0]?>" title="Hapus" rel="faber"><img src="images/icn_trash.png" width="12" title="Hapus" /> Hapus</a> |
                        <a href="coview.php?det=1&id=<?=$record[0]?>" title="View Surat" rel="faber"><img src="images/icn_search.png" width="12" title="Hapus" /> View</a> 
                        </td>
				          <td ><?=$record['no_agendasurat']?></td>
				          <td ><?=$record['nosurat_su']?></td>
				          <td ><?=$record['perihal_su']?></td>
				          <td ><?=$record['asal_su']?></td>
			            </tr>
</tbody> <?php }?>
                        </table>
                        </div>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>

<?php }elseif($_REQUEST['li']==4){

	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Post Surat</h3></header>
                
                <div class="clear"></div>

				<div class="module_content">Masukkan no agenda surat untuk key pencarian<br />
                <form action="" class="quick_search" method="post" style="float:left;" autocomplete="off">
                <input type="text" name="key" style=" width:250px;" placeholder="Masukkan No Agenda Surat"/>
                <input type="submit" value="Cari" name="cari" />
                </form><div class="clear"></div>
                <?php if($_POST['cari']){?>
<table width="100%" cellspacing="0" class="tablesorter"> 
			<thead> 
				<tr> 
   					<th width="13%">Action</th> 
    				<th width="37%">Nomor Agenda</th> 
    				<th width="20%">Tanggal Surat</th>
    				<th width="30%">Asal</th> 
				</tr> 
			</thead> 
<?php 	
	$slide=new Surat();$ref=$_POST['key'];
    $pegRecordSet = $slide->getSearch($ref);
	while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
            <tbody> 
				<tr> 
   					<td><a href="coedit.php?tampil=ism&id=<?=$record[0]?>" rel="faber" title="Edit"><img src="images/icn_edit.png" width="12" title="Edit"> Paraf </a>
                   </td> 
    				<td><?=$record['no_agendasurat']?></td> 
    				<td><?=ubahTanggal($record['tglmasuk_su'])?></td>
    				<td><?=$record['asal_su']?></td> 
 				</tr>  
			</tbody> 
			<?php }?>
            </table>	
            <?php }?>	
<div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
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
    <td width="25%" class="thh">Nama Login (Username) </td>
    <td width="1%" class="th">&nbsp;</td>
    <td width="74%" class="th"><input type="text" name="username" value="<?=$record[1]?>" /><input type="hidden" name="adid" value="<?=$id;?>"></td>
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
}elseif($_REQUEST['li']==5){
	
	$parameter =new Surat();
	$group='kat_pejabat';
	
	$pegRecordSet2=$parameter->getSurat($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Result Surat Masuk</h3></header>
           
            <div class="clear"></div>
				<div class="module_content">
                <div class="inganantab4">
                <a href="index.php?link=copage&li=51&isi=Status" title="Lihat Status Surat">
                <div class="tab4">
                <em class="alr"></em> 
                </div>	</a><div class="clear"></div>
                <div class="judul">Status</div>
                
                </div>
                
                <div class="inganantab4">
                <a href="index.php?link=copage&li=52&isi=RiviewPerhari" title="Result Surat Masuk Perhari">
                <div class="tab4">
                <em class="hari"></em> 
                </div>	</a><div class="clear"></div>
                <div class="judul">Hari</div>
                </div>
                
                <div class="inganantab4">
                <a href="index.php?link=copage&li=53&isi=RiviewPerbulan" title="Result Surat Masuk Perbulan">
                <div class="tab4">
                <em class="bulan"></em> 
                </div>	</a><div class="clear"></div>
                <div class="judul">Bulan</div>
                </div>
                
                <div class="clear"></div>

</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']=='51'){
 

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	//$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Result Status surat masuk</h3></header>
				
				<div class="module_content">
Masukkan no agenda surat <br />
<form action="" enctype="multipart/form-data" method="post" class="quick_search" style="float:left;">
      <input type="text" name="key" style=" width:250px;" placeholder="Masukkan No Agenda Surat" value="<?php echo isset($_POST['key']) ? $_POST['key'] : '';?>"/> 
                          <input type="submit" value="Tampilkan" name="tampil" />
                          </form>
<?php 	$tgl=$_POST['key'];
	
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSearch($tgl); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    
	if($_POST[tampil]){?>
  <table width="100%" id="mytable">
		
                      <tr class="td1">
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Diterima</th>
				        <th width="18%">Tanggal Keluar</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Pengirimin</th>
			         </tr>
                     <?php 
                     if($pegRecordSet->getRecordCount() == 0){?>
                      <tr class="td2">
                      <td colspan="4">Data not found
                      </td></tr>

				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">

				          <td ><a href="index.php?link=copage&li=54&id=<?=$record[idsurat]?>&isi=RiviewStatusSurat"><?=$record[no_agendasurat]?></a></td>
				          <td ><?=$record[tglmasuk_su]?></td>
				          <td ><?=$record[nosurat_su]?></td>
				          <td ><?=$record[perihal_su]?></td>
                          <td ><?=$record[asal_su]?></td>
			            </tr>
</tbody> <?php } }?>
    </table>
  <?php }?>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>

<?php }elseif($_REQUEST['li']=='52'){
 

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	//$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Result Surat Masuk Perhari</h3></header>
				
<div class="module_content">
Pilih tanggal surat <br />
<form action="" enctype="multipart/form-data" method="post" class="quick_date" style="float:left;" autocomplete="off">
   <input type="text" name="tanggal" id="datepicker" class="datepicker" style=" width:250px;"/> 
   <input type="submit" value="Tampilkan" name="tampil" />
</form>
<?php 	$tgl=$_POST['tanggal'];
	
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSuratLapPerhari($tgl); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    
	if($_POST[tampil]){?><p></p>
  <table width="100%" id="mytable">
		
                      <tr class="td1">
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Diterima</th>
				        <th width="18%">Tanggal Keluar</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Pengirimin</th>
			         </tr>
                     <?php 
                     if($pegRecordSet->getRecordCount() == 0){?>
                      <tr class="td2">
                      <td colspan="4">Data not found
                      </td></tr>

				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">

				          <td ><?=$record['no_agendasurat']?></td>
				          <td ><?=$record['tglmasuk_su']?></td>
				          <td ><?=$record['nosurat_su']?></td>
				          <td ><?=$record['perihal_su']?></td>
                          <td ><?=$record['asal_su']?></td>
			            </tr>
</tbody> <?php } }?>
                        </table>
                        <?php }?>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>

<?php }elseif($_REQUEST['li']=='53'){
 

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	//$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Result Surat Masuk Perbulan</h3></header>
				
				<div class="module_content">
Masukkan bulan dan tahun <br />
<form action="" enctype="multipart/form-data" method="post">
      <select name="bulan" class="input-selectg">
  		<option selected>Bulan</option>
  		        <?php $arr_bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
				$jumlah=count($arr_bulan);
				for($i=1; $i<=$jumlah; $i++){?>
                <option value="<?=$i?>" <?php echo isset($_POST['bulan']) && $_POST['bulan']==$i ? 'selected="selected"': '';?>><?=$arr_bulan[$i]?> </option>
                <?php }?>
	          </select>
                          <select name="tahun" id="tahun">
				          <option selected="selected">Tahun</option>
				          <?php $d=date('Y');for($i=2010;$i<=$d;$i++){?>
				          <option value="<?=$i?>" <?php echo isset($_POST['tahun']) && $_POST['tahun']==$i ? 'selected="selected"': '';?>>
				            <?=$i?>
			              </option>
				          <?php }?>
				          </select>
                          <input type="submit" value="Tampilkan" name="tampil" />
                          </form>
<?php
 	$bln=$_POST['bulan'];
	$thn=$_POST['tahun'];
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSuratLapBulan($bln,$thn); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    
	if($_POST['tampil']){?>
  <table width="100%" id="mytable">
		
                      <tr class="td1">
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Diterima</th>
				        <th width="18%">Tanggal Keluar</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Pengirimin</th>
			         </tr>
                     <?php 
                     if($pegRecordSet->getRecordCount() == 0){?>
                      <tr class="td2">
                      <td colspan="4">Data not found
                      </td></tr>

				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">

				          <td ><?=$record[no_agendasurat]?></td>
				          <td ><?=$record[tglmasuk_su]?></td>
				          <td ><?=$record[nosurat_su]?></td>
				          <td ><?=$record[perihal_su]?></td>
                          <td ><?=$record[asal_su]?></td>
			            </tr>
</tbody> <?php } }?>
                        </table>
                        <?php }?>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']=='54'){
	
	$id=$_GET['id'];
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSuratStatus($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Review Posisi Surat Masuk</h3></header>
				
				<div class="module_content">
                
<div class="tab3">Bagian Umum </div> 

                     <?php 
                     if($pegRecordSet->getRecordCount() == 0){?>

	


				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<div class="panah"></div>
<div class="tab3"><?=$record['pendisposisi']?></div> 

 <?php } }?>
                        </table>
                        
  <div class="clear"></div><p></p>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']=='6'){ 
	$ref=$_GET['id'];
	$conten = new Surat(); // create a new news object
    $sukeRecordSet = $conten->getSuke($ref); // set newsRecordSet to a MysqlRecordSet
	$osurat = $sukeRecordSet->getNextRecord();
?>           
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
<h3>Surat</h3>
<div id="isi"></div>
</header><article class="breadcrumbs"><a href="coadd.php?tam=surato" rel="faber">Tambah Surat Keluar</a></article>
<div class="clear"></div>
				<div class="module_content">

  <table width="100%" id="mytable">
		
                      <tr class="td1">
                            <th width="17%" height="22">Action</th>
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Tanggal Diterima</th>
				        <th width="18%">Tanggal Surat Keluar</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Pengirim</th>
			         </tr>

				      <?php while( ($osurat = $sukeRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">
                      <td>
                        <a href="coedit.php?tampil=sk&id=<?=$osurat[0]?>" title="Edit" rel="faber"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> |
                        <a href="codelete.php?ket=haSurato&id=<?=$osurat[0]?>" title="Hapus" rel="faber"><img src="images/icn_trash.png" width="12" title="Hapus" /> Hapus</a> |
                        <a href="coview.php?det=3&id=<?=$osurat[0]?>" title="View Surat" rel="faber"><img src="images/icn_search.png" width="12" title="Hapus" /> View</a> 
                        </td>
				          <td ><?=$osurat['sk_noagenda']?></td>
				          <td ><?=ubahTanggal($osurat['sk_tglterima'])?></td>
				          <td ><?=ubahTanggal($osurat['sk_tglkeluar'])?></td>
				          <td ><?=ubahTanggal($osurat['sk_tglkirim'])?></td>
                          <td ><?=$osurat['sk_pengirim']?></td>
			            </tr>
</tbody> <?php }?>
                        </table>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']==7){
	
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header>
			  <h3>Result Surat Keluar</h3></header>
           
            <div class="clear"></div>
				<div class="module_content">
                
                <div class="inganantab4">
                <a href="index.php?link=copage&li=71&isi=RiviewPerhari" title="Result Surat Keluar Perhari">
                <div class="tab4">
                <em class="hari"></em> 
                </div>	</a><div class="clear"></div>
                <div class="judul">Hari</div>
                </div>
                
                <div class="inganantab4">
                <a href="index.php?link=copage&li=72&isi=RiviewPerbulan" title="Result Surat Keluar Perbulan">
                <div class="tab4">
                <em class="bulan"></em> 
                </div>	</a><div class="clear"></div>
                <div class="judul">Bulan</div>
                </div>
                
                <div class="clear"></div>

</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']=='71'){
 

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	//$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Result Surat Keluar Perhari</h3></header>
				
<div class="module_content">
Pilih tanggal surat <br />
<form action="" enctype="multipart/form-data" method="post" class="quick_date" style="float:left;" autocomplete="off">
   <input type="text" name="tanggal" id="datepicker" class="datepicker" style=" width:250px;"/> 
   <input type="submit" value="Tampilkan" name="tampil" />
</form>
<?php 	$tgl=$_POST['tanggal'];
	
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSukeLapPerhari($tgl); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    
	if($_POST[tampil]){?><p></p>
  <table width="100%" id="mytable">
		
                      <tr class="td1">
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Tanggal Surat Keluar</th>
				        <th width="18%">Tanggal Diterima</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Perihal</th>
			         </tr>
                     <?php
                     if($pegRecordSet->getRecordCount() == 0){?>
                      <tr class="td2">
                      <td colspan="4">Data not found
                      </td></tr>

				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">

				          <td ><?=$record['sk_noagenda']?></td>
				          <td ><?=ubahTanggal($record['sk_tglkeluar'])?></td>
				          <td ><?=ubahTanggal($record['sk_tglterima'])?></td>
				          <td ><?=ubahTanggal($record['sk_tglkirim'])?></td>
                          <td ><?=$record['sk_perihal']?></td>
			            </tr>
</tbody> <?php } }?>
                        </table>
                        <?php }?>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>
<?php }elseif($_REQUEST['li']=='72'){
 

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	//$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Result Surat Keluar Perbulan</h3></header>
				
				<div class="module_content">
Masukkan bulan dan tahun <br />
<form action="" enctype="multipart/form-data" method="post">
      <select name="bulan" class="input-selectg">
  		<option selected>Bulan</option>
  		        <?php $arr_bulan=array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
				$jumlah=count($arr_bulan);
				for($i=1; $i<=$jumlah; $i++){?>
                <option value="<?=$i?>" <?php echo isset($_POST['bulan']) && $_POST['bulan']==$i ? 'selected="selected"': '';?>><?=$arr_bulan[$i]?> </option>
                <?php }?>
	          </select>
                          <select name="tahun" id="tahun">
				          <option selected="selected">Tahun</option>
				          <?php $d=date('Y');for($i=2010;$i<=$d;$i++){?>
				          <option value="<?=$i?>" <?php echo isset($_POST['tahun']) && $_POST['tahun']==$i ? 'selected="selected"': '';?>>
				            <?=$i?>
			              </option>
				          <?php }?>
				          </select>
                          <input type="submit" value="Tampilkan" name="tampil" />
                          </form>
<?php 	$bln=$_POST['bulan'];
	$thn=$_POST['tahun'];
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSukeLapBulan($bln,$thn); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    
	if($_POST[tampil]){?>
  <table width="100%" id="mytable">
		
                      <tr class="td1">
				        <th width="13%">Nomor Angenda</th>
				        <th width="16%">Tanggal Surat Keluar</th>
				        <th width="18%">Tanggal Diterima</th>
				        <th width="18%">Tanggal Kirim</th>
                        <th width="18%">Perihal</th>
			         </tr>
                     <?php 
                     if($pegRecordSet->getRecordCount() == 0){?>
                      <tr class="td2">
                      <td colspan="4">Data not found
                      </td></tr>

				      <?php }else{ while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">

				           <td ><?=$record[sk_noagenda]?></td>
				          <td ><?=ubahTanggal($record[sk_tglkeluar])?></td>
				          <td ><?=ubahTanggal($record[sk_tglterima])?></td>
				          <td ><?=ubahTanggal($record[sk_tglkirim])?></td>
                          <td ><?=$record[sk_perihal]?></td> 
			            </tr>
</tbody> <?php } }?>
                        </table>
                        <?php }?>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>            
<?php }elseif($_REQUEST['li']==8){
	$id=$_SESSION['id'];
	$conten = new Surat(); // create a new news object
	$pegRecordSet = $conten->getSuratAkunBySesi($id); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
    if($pegRecordSet->getRecordCount() == 0)
    {
        $record = $pegRecordSet->getNextRecord();
    }  

	//$album = $conten->getIklanId($ref);	
	//$record = $album->getNextRecord();
	$initialValue2=stripslashes($record['notes']);
	?>
<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Riview Surat Ke</h3></header>
				
				<div class="module_content">

  <table width="100%" id="mytable">
		
                      <tr class="td1">
                            <th width="18%" height="22">Action</th>
				        <th width="19%">Nomor Angenda</th>
				        <th width="36%">Diterima</th>
				        <th width="27%">Tanggal Disposisi</th>

			         </tr>

				      <?php while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">
                      <td>
         <a href="coedit.php?tampil=ism&id=<?=$record[idsurat]?>" title="Edit" rel="faber"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> |
        <a href="codelete.php?ket=haisu&id=<?=$record[idsurat]?>" title="Hapus" rel="faber"><img src="images/icn_trash.png" width="12" title="Hapus" /> Hapus</a> |
        <a href="coview.php?det=2&id=<?=$record[0]?>" title="View Surat" rel="faber"><img src="images/icn_search.png" width="12" title="Hapus" /> View</a> 
                        </td>
				          <td ><?=$record[no_agendasurat]?></td>
				          <td ><?=ubahTanggal($record[tglditerima])?></td>
				          <td ><?=ubahTanggal($record[tgldisposisi])?></td>

			            </tr>
</tbody> <?php }?>
                        </table>
  <div class="clear"></div>
</div>
			<footer>
			  <div class="submit_link"></div>
			</footer>

<?php }elseif($_REQUEST['li']==9){
	$content=new AccesLog();
	
	$p      = new Paging8;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	
	$pegRecordSet = $content->getLogLimit($posisi,$batas); // get the record set for this Id.
    $record = NULL; // This will make sure that we dont have the same record when we refresh the page.
	?>
<div class="clear"></div>
		
<article class="module width_full">
<header><h3>Access Log</h3></header>
<div class="module_content">
 <table width="100%" id="mytable">
		
                      <tr class="td1">
                        <th width="8%" height="22">Log Acces</th>
				        <th width="14%">Tanggal</th>
				        <th width="25%">User</th>
				        <th width="27%">Url</th>
                        <th width="26%">Deskripsi</th>
			         </tr>

				      <?php while( ($record = $pegRecordSet->getNextRecord()) !== false ){?>
<tbody>
					  <tr class="td2">
                      <td valign="top" ><?=$record[logAction]?></td>
				          <td valign="top" ><?=tanggalUbah($record[logTime])?></td>
				          <td valign="top" ><?=$record[logUser]?></td>
				          <td valign="top" ><?=$record[logUrl]?></td>
                          <td valign="top" ><?=$record[logDesc]?></td>
			            </tr>
</tbody> <?php }?>
                        </table>
</div>
<div class="clear"></div>
			<footer>
			  <div class="submit_link">
              <div class="page">
<div class="page12">
                <?php
		  $jmldata = mysql_num_rows(mysql_query("SELECT * FROM co_logacces"));

    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div >$linkHalaman</div><br>";
 ?>
 </div></div>
              </div>
			</footer>
<?php }elseif($_REQUEST['li']=='p8'){
	//$hasiloperasi =new Parameter();
	//$pegRecordSet= $hasiloperasi->getGperambahan();
	?>


<article class="module width_full">
			<header>
            
			  <h3>Post Parameter</h3></header>
<div class="clear"></div>
<div class="tombolp">
	
  <div class="button2"><a href="?link=copage&li=p8&isi=Parameter&view=bagian">Bagian/ Sub Bagian</a></div> 
	<div class="button2"><a href="?link=copage&li=p8&isi=Parameter&view=jepengirim">Jenis Pengiriman</a></div>
	<div class="button2"><a href="?link=copage&li=p8&isi=Parameter&view=nmpengirim">Nama Pengirim</a></div>
 	<div class="button2"><a href="?link=copage&li=p8&isi=Parameter&view=access">Acces Login</a></div>
    <div class="clear"></div>
</div>
<?php if($_REQUEST['view']=='bagian'){
	$parameter =new Parameter();
	$group='bagian';
	
	$pegRecordSet2=$parameter->getAlbum($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }
	
	?>
<div class="clear"></div>
<table width="98%" style="border-collapse:collapse; margin:10px; ">
<tr>
 <td  colspan="3"><strong>Bagian</strong></td>
</tr>
  <tr >
    <td colspan="4" class="td2"><a href="coadd.php?tam=parameter&nm=bagian" rel="faber"><img src="images/add.png" width="12" /> Tambah Data</a></td>
  </tr>
  <tr >
    <td width="11%" class="td1">&nbsp;</td>
    <td class="td1"><strong>ID</strong></td>
    <td class="td1"><strong>Nama Bagian / Sub Bagian</strong></td>
    <td class="td1"><strong>Deskripsi</strong></td>


  </tr>
  <?php while( ($trecord2 = $pegRecordSet2->getNextRecord()) !== false ){?>
  <tr >
<td align="left" class="td2">
	<a href="coedit.php?tampil=33&nm=bagian&xid=<?php echo $trecord2['id'];?>" rel="faber"  title="Edit"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> 
	<a href="codelete.php?ket=haParameter&id=<?=$trecord2[id]?>&nm=bagian" rel="faber" title="Hapus"><img src="images/icn_trash.png" alt="" width="12" title="Trash" /> Hapus</a>

   </td>
    <td width="5%" class="td2" align="center"><?=$trecord2[id]?></td>
    <td width="21%" class="td2"><?=$trecord2[description]?></td>
    <td width="63%" class="td2"><?=$trecord2[notes]?></td>
  </tr>
  <?php }?>
</table>
<?php }elseif($_REQUEST['view']=='jepengirim'){
	$parameter =new Parameter();
	$group='jenis_kirim';
	
	$pegRecordSet2=$parameter->getAlbum($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }

	?>

<table width="98%" style="border-collapse:collapse; margin:10px; ">
<tr>
 <td  colspan="4"><strong>Jenis Pengiriman</strong></td>
</tr>
  <tr >
    <td colspan="4" class="td2"><a href="coadd.php?tam=parameter&nm=jepeng" rel="faber"><img src="images/add.png" width="12" /> Tambah Data</a></td>
  </tr>
  <tr >
    <td width="11%" class="td1">&nbsp;</td>
    <td class="td1"><strong>ID</strong></td>
    <td class="td1"><strong>Nama</strong></td>
    <td class="td1"><strong>Deskripsi</strong></td>


  </tr>
  <?php while( ($trecord2 = $pegRecordSet2->getNextRecord()) !== false ){?>
  <tr >
<td align="left" class="td2">
	<a href="coedit.php?tampil=33&nm=jepeng&xid=<?=$trecord2[id]?>" rel="faber" title="Edit"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> 
	<a href="codelete.php?ket=haParameter&id=<?=$trecord2[id]?>&nm=jepeng" rel="faber" title="Hapus"><img src="images/icn_trash.png" alt="" width="12" title="Trash" /> Hapus</a>
   </td>
    <td width="5%" class="td2" align="center"><?=$trecord2[id]?></td>
    <td width="21%" class="td2"><?=$trecord2[description]?></td>
    <td width="63%" class="td2"><?=$trecord2[notes]?></td>


  </tr>
  <?php }?>
</table>
<?php }elseif($_REQUEST['view']=='nmpengirim'){
	$parameter =new Parameter();
	$group='pengirim';
	
	$pegRecordSet2=$parameter->getAlbum($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }

	?>

<table width="98%" style="border-collapse:collapse; margin:10px; ">
<tr>
 <td  colspan="4"><strong>Nama Pengiriman</strong></td>
</tr>
  <tr >
    <td colspan="4" class="td2"><a href="coadd.php?tam=parameter&nm=peng" rel="faber"><img src="images/add.png" width="12" /> Tambah Data</a></td>
  </tr>
  <tr >
    <td width="11%" class="td1">&nbsp;</td>
    <td class="td1"><strong>ID</strong></td>
    <td class="td1"><strong>Nama</strong></td>
    <td class="td1"><strong>Deskripsi</strong></td>


  </tr>
  <?php while( ($trecord2 = $pegRecordSet2->getNextRecord()) !== false ){?>
  <tr >
<td align="left" class="td2">
	<a href="coedit.php?tampil=33&nm=peng&xid=<?=$trecord2[id]?>" rel="faber" title="Edit"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> 
	<a href="codelete.php?ket=haParameter&id=<?=$trecord2[id]?>&nm=peng" rel="faber" title="Hapus"><img src="images/icn_trash.png" alt="" width="12" title="Trash" /> Hapus</a>
   </td>
    <td width="5%" class="td2" align="center"><?=$trecord2['id']?></td>
    <td width="21%" class="td2"><?=$trecord2['description']?></td>
    <td width="63%" class="td2"><?=$trecord2['notes']?></td>


  </tr>
  <?php }?>
  </table>
<?php }elseif($_REQUEST['view']=='access'){
	$parameter =new Parameter();
	$group='user_level';
	
	$pegRecordSet2=$parameter->getAlbum($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 0)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }

	?>

<table width="98%" style="border-collapse:collapse; margin:10px; ">
<tr>
 <td  colspan="4"><strong>Access Login Akun</strong></td>
</tr>
  <tr >
    <td colspan="4" class="td2"><a href="coadd.php?tam=access" rel="faber"><img src="images/add.png" width="12" /> Tambah Data</a></td>
  </tr>
  <tr >
    <td width="11%" class="td1">&nbsp;</td>
    <td class="td1"><strong>ID</strong></td>
    <td class="td1"><strong>Nama Bagian / Sub Bagian</strong></td>
    <td class="td1"><strong>Deskripsi</strong></td>


  </tr>
  <?php while( ($trecord2 = $pegRecordSet2->getNextRecord()) !== false ){?>
  <tr >
<td align="left" class="td2">
	<a href="coedit.php?tampil=3&id=<?=$trecord2['id']?>" rel="faber" title="Edit"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> 
	<a href="codelete.php?ket=haParameteraccess&id=<?=$trecord2['id']?>&group=user_level" title="Hapus" rel="faber"><img src="images/icn_trash.png" alt="" width="12" title="Trash" /> Hapus</a>
   </td>
    <td width="5%" class="td2" align="center"><?=$trecord2['id']?></td>
    <td width="21%" class="td2"><?=$trecord2['description']?></td>
    <td width="63%" class="td2"><?=$trecord2['notes']?></td>
  </tr>
  <?php }?>
  <tr >
    <td colspan="8" >&nbsp;</td>
  </tr>
</table>
			      
<div class="clear"></div>
</article>
			<footer>
			  <div class="submit_link"></div>
			</footer>

<?php }}elseif($_REQUEST['li']=='11'){
	$surat =new Surat();
	//$group='sub_bidang';
	//$group2='jetusat';
	
	/*$pegRecordSet2=$parameter->getParametergroup($group);
	$trecord2 = NULL;
	if($pegRecordSet2->getRecordCount() == 1)
    {
        $trecord2 = $pegRecordSet2->getNextRecord();
    }*/
	


	?>

<article class="module width_full">
<header><h3>Surat Kembali</h3></header>
<div class="module_content">	    
<div class="clear"></div>
 <table width="100%" id="mytable">
  <tr class="td1">
   <th width="16%" height="22">Action</th>
   <th width="18%">Nomor Angenda</th>
   <th width="21%">Nomor Surat</th>
   <th width="24%">Perihal</th>
  </tr>
  <?php while( ($record = $teamRecordSet->getNextRecord()) !== false ){?>
 <tbody>
  <tr class="td2">
   <td>
   <a href="coedit.php?tampil=sm&id=<?=$record['0']?>" title="Edit" rel="faber"><img src="images/icn_edit.png" width="12" title="Edit" /> Edit</a> |
   <a href="codelete.php?ket=haSurati&id=<?=$record['0']?>" title="Hapus" rel="faber"><img src="images/icn_trash.png" width="12" title="Hapus" /> Hapus</a> |
   <a href="coview.php?det=1&id=<?=$record['0']?>" title="View Surat" rel="faber"><img src="images/icn_search.png" width="12" title="Hapus" /> View</a> 
   </td>
	<td ><?=$record['no_agendasurat']?></td>
	<td ><?=$record['nosurat_su']?></td>
	<td ><?=$record['perihal_su']?></td>
	<td ><?=$record['asal_su']?></td>
 </tr>
</tbody> <?php }?>
</table>
</div>
</article>
<footer>
 <div class="submit_link"></div>
</footer>
<?php }?>
