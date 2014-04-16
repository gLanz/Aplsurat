<? // include('../fungsiTitik.php');?>
<script src="facebox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="facebox/facebox.css" />
   <script type="text/javascript" language="javascript" src="facebox/facebox.js"></script>
    <script type="text/javascript" language="javascript" src="facebox/jquery.form.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#login_form').ajaxForm({
			target: '#error',
			success: function() {
			$('#error').fadeIn('slow');
			
			}
		});
	});

</script>
<? include('../../config/includes.php'); 
if(isset($_GET[ket]))
{
	if($_GET[ket]=="edit")
	{
		$cek=mysql_query("SELECT*FROM jnspas WHERE kdjnspas='$_GET[kode]'");
		$hasilCek=mysql_fetch_array($cek);
	}
}
?>
<div id="judulForm">INPUT DATA COSTUMER</div>
<div id="badanForm">
<form action="process.php" method="post" enctype="multipart/form-data" id="login_form">
<div id="error" class="error"></div>
<div id="untukForm">
<table width="460" border="0">
  <tr>
    <td width="127">Nama Costumer</td>
    <td width="10">:</td>
    <td width="316"><label>
      <input type="text" name="nmcustomer" id="nmcustomer" value="<?=$hasilCek[kdjnspas]?>">
      *
    </label>
    <input name="sesi_id" type="hidden" value="<?=$_SESSION['id'];?>" size="8" />
    <input name="get_time" type="hidden" value="<?=$_GET['id'];?>" size="8" />
    <input name="get_team" type="hidden" value="<?=$_GET['team'];?>" size="8" />
    </td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><label>
      <textarea name="alamat" cols="30" id="alamat"><?=$hasilCek[nmjnspas]?></textarea>
    </label></td>
  </tr>
  <tr>
    <td>No Telp</td>
    <td>:</td>
    <td><label>
      <input name="notelp" type="text" id="notelp" size="20" value="<?=$hasilCek[biaya]?>">
    </label></td>
  </tr>
  <tr>
    <td>No Plat Mobil</td>
    <td>:</td>
    <td><input name="plat" type="text" id="plat" size="20" value="<?=$hasilCek[biaya]?>" /></td>
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
    <input type="submit" value="Simpan" name="simpan"  >
  </label>
  <label><input type="button" value="Batal" onClick="javascript:$.facebox.close();"></label>
</div>
</form>
</div>

