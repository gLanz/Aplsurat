<? // include('../fungsiTitik.php');?>
<script src="facebox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="facebox/facebox.css" />
   <script type="text/javascript" language="javascript" src="facebox/facebox.js"></script>
    <script type="text/javascript" language="javascript" src="facebox/jquery.form.js"></script>
<script type="text/javascript" language="javascript">
function submitForm(form){
	$(form).ajaxSubmit({
		success : function(response){
			if(response.indexOf('berhasil') > -1){
					$.get('message.php?data=inputk&ket='+response,function(data){$.facebox(data)});
					tutup();
					$("#isi").load("home.php");
					refresh();
			}
			else
			{
				$.get('message.php?data=inputk&ket='+response,function(data){$.facebox(data)});
				
			}
		}
	});
	return false;
}
</script>
<? include('../../config/includes.php'); 
if(isset($_GET[id]))
{
		$cek=mysql_query("SELECT*FROM co_board WHERE idboard='$_GET[id]'");
		$hasilCek=mysql_fetch_array($cek);
}
?>
<div id="judulForm">INFORMASI</div>
<div id="badanForm">


<div id="untukForm"> <table>
  <tr><td>Sesi anda tidak sama, sesi id  berbeda silakan konfirmasi</td>
  </tr>
  <tr><td>
  </td>
  </tr>
  </table>
</div>
  <div id="untukTombol">
  <label><input type="button" value="Tutup" onClick="javascript:$.facebox.close();"></label>
</div>

</div>
<div id="komen"></div>
