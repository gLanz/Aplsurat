<?php
if (isset($_GET['msg']) && $_GET['msg']!=false) {
switch ($_GET['msg']) {
    case 0:
        $pesan="Username dan Passowrd masih kosong";
        break;
    case 1:
       $pesan="Login tidak berhasil, username dan password tidak sesuai";
        break;
    case 2:
        $pesan="Anda membutuhkan Login untuk acces selanjutnya ...";
        break;
    //Pesan berhasil
	case 21:
        $pesan="Testimonial berhasil ditambah";
        break;
	case 22:
        $pesan="Kategori berhasil ditambah";
        break;
	case 23:
        $pesan="Kategori berhasil ditambah";
        break;

	 case 26:
        $pesan="Data berhasil di Simpan";
        break;
	 case 24:
        $pesan="Kategori berhasi di Perbaharui";
        break;
	case 25:
        $pesan="Banner berhasil di Perbaharui";
        break;
	case 27:
        $pesan="Berhasil di Perbaharui";
        break;

	//Pesan gagal
	 case 4:
        $pesan="Data Produk gagal disimpan, terjadi kesalahan periksa field yang harus diisi";
        break;
	 case 42:
        $pesan="Kategori gagal disimpan, terjadi kesalahan periksa field yang harus diisi";
        break;
	 case 43:
        $pesan="Berita gagal disimpan, terjadi kesalahan periksa field yang harus diisi";
        break;	
	 case 44:
        $pesan="Besar File melebihi batas maksimal yakni 500 kb";
        break;	
	 case 45:
        $pesan="Album gagal di tambah";
        break;	
	 case 46:
        $pesan="Galeri gagal di tambah, terjadi kesalahan";
        break;	
	 case 47:
        $pesan="Galeri gagal di ubah, terjadi kesalahan";
        break;	

	//Pesan delete	
	case 51:
        $pesan="Data Produk berhasil di Hapus";
        break;
	case 52:
        $pesan="Kategori Produk berhasil di Hapus";
        break;
	case 53:
        $pesan="Artikel berhasil di Hapus";
        break;
	case 54:
        $pesan="Slider berhasil di Hapus";
        break;
	case 55:
        $pesan="Berhasil di Hapus";
        break;
		
	//
	case 7:
        $pesan="Data berhasil diperbaharui";
        break;
	 case 8:
        $pesan="Berhasil diupdate";
        break;
	case 9: 
        $pesan="Sukses merubah password";
        break;
	case 10:
        $pesan="Password belum berhasil dirubah";
        break;
	case 11:
        $pesan="Berhasil dihapus";
        break;
		
	case 12:
        $pesan="Gambar slide tidak berhasil di tambah, terjadi kesalahan";
        break;
	case 121:
    	$pesan="Slider gagal di perbaharui";
    	break;
	case 122:
        $pesan="Slider berhasil diubah, gambar tidak";
        break;
	case 123:
    $pesan="Slider berhasil diubah";
    break;
	
	case 13:
        $pesan="Slide berhasil ditambah";
        break;
	
	case 14:
        $pesan="Pesan anda telah masuk ke dalam daftar antri Testimonial kami. Terimakasih, anda dapat menunggu balasan dari kami langsung terkirim ke email anda";
        break;
			
	default :
		$pesan="";
		break;
}


?><br>
<?php $get=$_GET['msg']; $pecah=substr($get,0,1);
if($pecah == '5'){?>
<h4 class="alert_info" ><?=$pesan?></h4>
<?php }elseif($pecah =='4'){?>
<h4 class="alert_error" ><?=$pesan?></h4>
<?php }elseif($pecah =='3'){?>
<h4 class="alert_success"><?=$pesan?></h4>
<?php }elseif($pecah =='2'){?>
<h4 class="alert_success"><?=$pesan?></h4>
<?php } }; ?>
