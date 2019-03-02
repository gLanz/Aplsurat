<?php
  session_start();
  if ((!isset($_SESSION['usersesi'])) && (!isset($_SESSION['passsesi'])))
   {
    header("location:logr");
   } 
else
{
	require"../../config/includes.php";
	$id=$_SESSION['id'];
	$level =$_SESSION['levelx']; 
	
?>


<!doctype html>
<html lang="en"><head>
	<meta charset="utf-8"/>
	<title><?php echo $ad_title;?></title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/jquery-ui.css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<script src="js/jquery-1.9.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
 <script>
$(document).bind('reveal.facebox', function() {
	$('#date_filed_for-1,#date_filed_for-2, #date3, #date4, #date5').datepicker({ dateFormat: "yy-mm-dd", changeMonth: true,
changeYear: true });
})
$(function() {
$( "#datepicker" ).datepicker({
  showOn: "button",
  buttonImage: "../../assets/imgs/ew_calendar.gif",
  buttonImageOnly: true,
 changeMonth: true,
 changeYear: true,
 dateFormat: "yy-mm-dd"
});
});
</script>
	<script src="js/hideshow.js" type="text/javascript"></script>

 <link rel="stylesheet" type="text/css" href="facebox/facebox.css" />

  <!-- JS -->
<script type="text/javascript" language="javascript" src="facebox/facebox.js"></script>
<script type="text/javascript" language="javascript" src="facebox/jquery.form.js"></script>

<script type="text/javascript" language="javascript">
$(
 function()
 {
  $("#mytable tr").hover(
   function()
   {
    $(this).addClass("highlight");
   },
   function()
   {
    $(this).removeClass("highlight");
   }
  )
 }
)
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("a[rel*=faber]").facebox($.facebox.settings.opacity = 0.5);
});
var arefresh = setInterval(
function (){ $('#divTox').load('index.php #divTox').fadeIn("slow");}, 1000); 
</script>


  <script>
$(function() {
$( document ).tooltip({
position: {
my: "center bottom-20",
at: "center top",
using: function( position, feedback ) {
$( this ).css( position );
$( "<div>" )
.addClass( "arrow" )
.addClass( feedback.vertical )
.addClass( feedback.horizontal )
.appendTo( this );
}
}
});
});
</script>
<style>
.ui-tooltip, .arrow:after {
background: #333;
border: 1px solid white;
}
.ui-tooltip {
padding: 10px 20px ;
color: white; 
border-radius: 5px;
font: bold 12px "Helvetica Neue", Sans-Serif;
font-style:italic;
text-transform: uppercase;
box-shadow: 0 0 7px black;
}
.arrow {
width: 70px;
height: 16px;
overflow: hidden;
position: absolute;
left: 50%;
margin-left: -35px;
bottom: -16px;
}
.arrow.top {
top: -16px;
bottom: auto;
}
.arrow.left {
left: 20%;
}
.arrow:after {
content: "";
position: absolute;
left: 20px;
top: -20px;
width: 25px;
height: 25px;
box-shadow: 6px 5px 9px -9px black;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
tranform: rotate(45deg);
}
.arrow.top:after {
bottom: -20px;
top: auto;
}
</style>
</head>


<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php"><em>APL simSURAT</em></a></h1>
			<h2 class="section_title">&nbsp;</h2><div class="btn_view_site"><a href="#" target="_blank">#</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p> #<?php echo $id;?> | <?php print $_SESSION['nama'];?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Panel Admin</a> <div class="breadcrumb_divider"></div> <a class="current">
            <?php if(empty($_REQUEST[isi])){?>
            Dashboard
            <?php }else{ print $_GET['isi']; }?>
            
            </a></article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
<?php 	
	$acces=new Account();
	//print $level;
	$iduser=$_SESSION['id'];
	$pegRecordSet1=$acces->getAkunAccesById($level);
	$trecord1 = NULL;
	if($pegRecordSet1->getRecordCount() == 1)
    {
        $trecord1 = $pegRecordSet1->getNextRecord();
    }?>
        <form class="quick_search">
			<!--<input type="text" value="Quick Search" onFocus="if(!this._haschanged){this.value=''};this._haschanged=true;">-->
		</form>
		<hr/>
     
        	<h3>MASTER</h3>
		<ul class="toggle">
      <?php if(tampilMenu($trecord1['action_1'])){ ?><li class="icn_categories"><a href="?link=copage&li=2&isi=Halaman">Akun Admin</a></li><?php }?>
      <?php if(tampilMenu($trecord1['action_2'])){ ?><li class="icn_security"><a href="?link=copage&tampil=8&isi=Options Administrator">Ganti Password</a></li><?php }?>
       <?php if(tampilMenu($trecord1['action_3'])){ ?><li class="icn_categories"><a href="?link=copage&li=p8&isi=Parameter">Parameter</a></li> <?php }?>
        <?php if(tampilMenu($trecord1['action_4'])){ ?><li class="icn_categories"><a href="?link=copage&li=9&isi=Aktivitas">Aktivitas Log</a></li> <?php }?>
         <?php if(tampilMenu($trecord1['action_5'])){ ?><li class="icn_jump_back"><a href="logout.php">Keluar</a></li><?php }?>
		</ul>
		<h3>Surat Masuk</h3>
		<ul class="toggle">
			<?php if(tampilMenu($trecord1['action_6'])){ ?><li class="icn_categories"><a href="?link=copage&li=3&isi=Surat">Post Surat</a></li><?php }?>
            <?php if(tampilMenu($trecord1['action_7'])){ ?><li class="icn_new_article"><a href="?link=copage&li=4&isi=Surat">Cari Surat</a></li><?php }?>
            <?php if(tampilMenu($trecord1['action_8'])){ ?><li class="icn_categories"><a href="?link=copage&li=5&isi=RiviewSuMa">Result</a></li><?php }?>
            <?php if(tampilMenu($trecord1['action_9'])){ ?> <li class="icn_categories"><a href="?link=copage&li=8&isi=RiviewSuMa">Review</a></li><?php }?>
           </ul>
           <?php }?>
      <h3>Surat Keluar</h3> 
      <ul class="toggle">
           <?php if(tampilMenu($trecord1['action_10'])){ ?><li class="icn_categories"><a href="?link=copage&li=6&isi=SuratKeluar">Post Surat</a></li><?php }?>
           <?php if(tampilMenu($trecord1['action_11'])){ ?><li class="icn_categories"><a href="?link=copage&li=7&isi=RiviewSuKe">Result</a></li><?php }?>
         <!--  < ?php if(tampilMenu($trecord1['action_12'])){ ?><li class="icn_categories"><a href="?link=copage&li=11&isi=SuratBack">Surat Kembali</a></li>< ?php }?> ->
           
		</ul>
   
  -->
		
		<footer>
			<hr />
			<p><strong>CopyRight &copy;<?php echo $ad_year;?> <?php echo $ad_title;?></strong></p>
			<p>Theme by <a target="_blank" href="http://fabernainggolan.net">coDEs</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		 
		<?php include("../../libs/core/inc.msg.php");?>
		
		<!-- end of stats article --><!-- end of content manager article --><!-- end of messages article -->
		
 <?php $link=$_REQUEST['link'];
 if(isset($link)){include"$link.php";}
 else{include"home.php";}
 ?>  

		</article><!-- end of post new article --><!-- end of styles article -->
	  <div class="spacer"></div>
      
	</section>


</body>

</html>
<?php //}?>
