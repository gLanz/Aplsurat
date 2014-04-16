<? // include('../fungsiTitik.php');?>
<script src="facebox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="facebox/facebox.css" />
   <script type="text/javascript" language="javascript" src="facebox/facebox.js"></script>
    <script type="text/javascript" language="javascript" src="facebox/jquery.form.js"></script>
<script type="text/javascript" language="javascript">

</script>
<? include('../../config/includes.php'); 
if(isset($_GET[id]))
{
		$cek=mysql_query("SELECT*FROM co_board WHERE idboard='$_GET[id]'");
		$hasilCek=mysql_fetch_array($cek);
}elseif($_GET[ket]=='delete'){
	
	$parameter = new Board(); // Create a new News Object
    $idc = $_GET['idv'];
	//print $idc;
	$parameter->deleteBoard($idc);
	header("location:index.php");
}
?>
<div id="judulForm">EDIT DATA COSTUMER</div>
<div id="badanForm">
<form action="process.php" method="post" enctype="multipart/form-data" >

<div id="untukForm">
<table width="460" border="0">
  <tr>
    <td width="127">Nama Costumer</td>
    <td width="10">:</td>
    <td width="316"><label>
      <input type="text" name="nmcustomer" id="nmcustomer" value="<?=$hasilCek[nmcustomer]?>">
    </label>
    <input name="sesi_id" type="hidden" value="<?=$_SESSION['id'];?>" size="8" />
    <input name="get_time" type="hidden" value="<?=$_GET['id'];?>" size="8" />
    <input name="get_team" type="text" readonly="readonly" value="<?=$_GET['team'];?>" size="1" />
    <input name="idx" type="hidden" value="<?=$hasilCek['idboard'];?>" size="8" />
    </td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><label>
      <textarea name="alamat" cols="30" id="alamat"><?=$hasilCek[alamat]?></textarea>
    </label></td>
  </tr>
  <tr>
    <td>No Telp</td>
    <td>:</td>
    <td><label>
      <input name="notelp" type="text" id="notelp" size="20" value="<?=$hasilCek[notelp]?>">
    </label></td>
  </tr>
  <tr>
    <td>No Plat Mobil</td>
    <td>:</td>
    <td><input name="plat" type="text" id="plat" size="20" value="<?=$hasilCek[platmobil]?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
<div id="untukTombol"><span style="float:left;">Tanggal Hari Ini : <i><?=ubahTanggal(date("Y-m-d"));?></i></span>
  <label>
    <input type="submit" value="Update" name="usimpan"  >
  </label>
  <a href="request_en.php?ket=delete&idv=<?=$hasilCek[idboard]?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="delete">Delete</a>
  <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
</div>
</form>
</div>
<div id="komen"></div>
