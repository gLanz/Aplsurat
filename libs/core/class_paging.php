
<?php 
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=1 title='goto 1'>&laquo; First</a></div> 
                    <div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a></div>";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=$i title='goto ".$i."'>$i</a></div>";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=$i>$i</a></div>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a></div>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<div class='pg'> <a href=index.php?link=copage&li=1&isi=Artikel&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> </div>
                     <div class='pg'><a href=index.php?link=copage&li=1&isi=Artikel&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a></div>";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}

class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<div class='pg123'><a href=galeri-$_GET[idk]&halaman=1 title='goto 1'>&laquo; First</a></div> 
                    <div class='pg123'><a href=galeri-$_GET[idk]&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a></div>";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<div class='pg123'><a href=galeri-$_GET[idk]&halaman=$i title='goto ".$i."'>$i</a></div>";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<div class='pg123'><a href=galeri-$_GET[idk]&halaman=$i>$i</a></div>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><div class='pg123'><a href=galeri-$_GET[idk]&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a></div>" : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<div class='pg123'> <a href=galeri-$_GET[idk]&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> </div>
                     <div class='pg123'><a href=galeri-$_GET[idk]&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a></div>";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}

class Paging3{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['num'])){
	$posisi=0;
	$_GET['num']=1;
}
else{
	$posisi = ($_GET['num']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-1 title='goto 1'>&laquo; First</a></div>
                    <div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-$prev title='goto ".$prev."'>&lsaquo; Prev</a></div>";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-$i title='goto ".$i."'>$i</a></div>";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-$i>$i</a></div>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=kt-$_GET[id]-$_GET[des]-$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-$next title='goto ".$next."'>Next &rsaquo;</a></div> 
                     <div class='pg123'><a href=kt-$_GET[id]-$_GET[des]-$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a></div>";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=1 title='goto 1'>&laquo; First</a> 
                    <a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a> ";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$i title='goto ".$i."'>$i</a> ";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$i>$i</a> ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> 
                     <a href=index.php?link=copage&?=6&isi=UnitKerja&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=1 title='goto 1'>&laquo; First</a> 
                    <a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a> ";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$i title='goto ".$i."'>$i</a> ";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$i>$i</a> ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> 
                     <a href=index.php?link=copage&?=7&isi=KawasanKonservasi&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}

class Paging6{
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=1 title='goto 1'>&laquo; First</a> 
                    <a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a> ";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$i title='goto ".$i."'>$i</a> ";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$i>$i</a> ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> 
                     <a href=index.php?link=copage&?=9&isi=RekananPenangkarPengedar&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}
class Paging7{
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<a href=index.php?link=copage&?=4&isi=Humas&halaman=1 title='goto 1'>&laquo; First</a> 
                    <a href=index.php?link=copage&?=4&isi=Humas&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a> ";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href=index.php?link=copage&?=4&isi=Humas&halaman=$i title='goto ".$i."'>$i</a> ";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href=index.php?link=copage&?=4&isi=Humas&halaman=$i>$i</a> ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=index.php?link=copage&?=4&isi=Humas&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=index.php?link=copage&?=4&isi=Humas&halaman=$next title='goto ".$next."'>Next &rsaquo;</a> 
                     <a href=index.php?link=copage&?=4&isi=Humas&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a> ";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}



class Paging8{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halaman'])){
	$posisi=0;
	$_GET['halaman']=1;
}
else{
	$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
 
// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
	$prev = $halaman_aktif-1;
	$link_halaman .= "<div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=1 title='goto 1'>&laquo; First</a></div>
                    <div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$prev title='goto ".$prev."'>&lsaquo; Prev</a></div>";
}
else{ 
	$link_halaman .= "<div class='pg'>&laquo; First </div> <div class='pg'>&lsaquo; Prev </div> ";
}

// Link halaman 1,2,3, ...
$angka = ($halaman_aktif > 3 ? "<div class='pg'>... </div>" : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$i title='goto ".$i."'>$i</a></div>";
  }
	  $angka .= " <div class='pg-ak'><b>$halaman_aktif</b> </div>";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$i>$i</a></div>";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " <div class='pg'>... </div><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last) 
if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= "<div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$next title='goto ".$next."'>Next &rsaquo;</a></div> 
                     <div class='pg123'><a href=index.php?link=copage&li=9&isi=Aktivitas&halaman=$jmlhalaman title='goto ".$jmlhalaman."'>Last &raquo;</a></div>";
}
else{
	$link_halaman .= " <div class='pg'>Next &rsaquo; </div> <div class='pg'> Last &raquo;</div>";
}
return $link_halaman;
}
}

?>