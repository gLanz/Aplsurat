<? 
$entries=5;

$akun	= new Account();
$surat	= new Surat();
$logging=new AccesLog();
$parameter	= new Parameter();

$group2='bagian'; //$pegRecordSet2=$parameter->getKategoriArtikel($group2);
$baRecordSet=$parameter->getAlbum($group2);
$barecord= NULL;
if($baRecordSet->getRecordCount() == 0){$barecord = $baRecordSet->getNextRecord();}

$group='jenis_kirim'; 
$jkRecordSet=$parameter->getAlbum($group);
$jkrecord = NULL;
if($jkRecordSet->getRecordCount() == 0){$jkrecord = $jkRecordSet->getNextRecord();}

$group3='pengirim'; 
$pegRecordSet=$parameter->getAlbum($group3);
$pegrecord = NULL;if($pegRecordSet->getRecordCount() == 0){$pegrecord = $pegRecordSet->getNextRecord();}


//$arecord= NULL;
//if($akunRecordSet->getRecordCount() == 1){$arecord = $akunRecordSet->getNextRecord();}
//
//$p      = new Paging2;
//$batas  = 4;
//$posisi = $p->cariPosisi($batas);
//
//$newsRecordSet = $berita->getNewsLimit($posisi,$batas); // get the record set for this Id.
//$nrecord = NULL; // This will make sure that we dont have the same record when we refresh the page.
//
//$bid=$_GET['id'];
//$nRecordSet = $berita->getNewsById($bid); // get the record set for this Id.
//$nbaris = NULL; // This is var baris by faber
//if($nRecordSet->getRecordCount() == 1){$nbaris = $nRecordSet->getNextRecord();}
//
//$key=201;
//$agendaRecordSet = $berita->getNewsLimitStic($key); 
//$agrecord = NULL; 
//
//
//$fkRecordSet = $forum->getForumKategori(); 
//$fkrecord = NULL; 
//
//$topikRecordSet = $forum->getForumTopik(); 
//$ftrecord = NULL; 
//
//$replay=$_GET['id'];
//$replayRecordSet = $forum->getForumReplayByTopik($replay); 
//$rerecord = NULL; 
//
//$adaRecordSet=$akun->getAkunById($_POST['noalumni']);
//$adarecord= NULL;
//if($adaRecordSet->getRecordCount() == 1){$adarecord = $adaRecordSet->getNextRecord();}

?>