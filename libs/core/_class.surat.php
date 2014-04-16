<?php
//require_once 'mysql.php'; // include this file so we can use the Mysql Class inside this class as well.
	//print 1;
class Surat
{
    // In this class we'll have a few variables to be used by the class.
    var $mysql; // the mysql variable that will hold the Mysql Object.

    public function __construct()
    {
        $this->mysql = new Mysql(); // Connect to mysql and the database so we can use it.
    }
    // This function does what it says, it gets all of the current news records from the db.
    public function getSurat()
    {
        $rset = $this->mysql->select('*',"co_suratmasuk");
        return $rset;
    }
	public function getSliderAktif()
    {
        $rset = $this->mysql->select('*',"co_slider","statusslide='1'","idslide DESC");
        return $rset;
    }
    public function getHotProduk()
    {
        $rset = $this->mysql->select('*',"co_produk","stat_hotitem='1'","idprod DESC","0,5");
        return $rset;
    }
	    public function getSearch($key)
    {
        $rset = $this->mysql->select('*',"co_suratmasuk","no_agendasurat LIKE '%$key%'","","");
        return $rset;
    }
    public function getSuratLapBulan($bulan,$tahun)
    {
        $rset = $this->mysql->select('*',"co_suratmasuk","MONTH(tglmasuk_su)='$bulan' and YEAR(tglmasuk_su) = '$tahun'");
        return $rset;
    }
    public function getSuratLapPerhari($tgl)
    {
        $rset = $this->mysql->select('*',"co_suratmasuk","tglmasuk_su='$tgl'");
        return $rset;
    }
    public function getSukeLapBulan($bulan,$tahun)
    {
        $rset = $this->mysql->select('*',"co_suratkeluar","MONTH(sk_tglkeluar)='$bulan' and YEAR(sk_tglkeluar) = '$tahun'");
        return $rset;
    }
    public function getSukeLapPerhari($tgl)
    {
        $rset = $this->mysql->select('*',"co_suratkeluar","sk_tglkeluar='$tgl'");
        return $rset;
    }
    public function getSuratById($id)
    {
        $rset = $this->mysql->select('*',"co_suratmasuk","idsurat='$id'");
        return $rset;
    }
    public function getSuratStatus($id)
    {
        $rset = $this->mysql->select('*',"co_statussurat","idsurat='$id'");
        return $rset;
    }

    public function getSuratAkunById($sesi,$agenda)
    {
        $rset = $this->mysql->select('*',"co_statussurat","acc_id='$sesi' and idsurat='$agenda'");
        return $rset;
    }
   public function getSuratAkunBySesi($sesi)
    {
        $rset = $this->mysql->select('*',"co_statussurat a, co_suratmasuk b"," b.idsurat=a.idsurat and a.acc_id='$sesi'");
        return $rset;
    }
	   public function getSuratSessionById($id)
    {
        $rset = $this->mysql->select('*',"co_statussurat a, co_suratmasuk b"," b.idsurat=a.idsurat and a.id='$id'");
        return $rset;
    }

	    public function getSuratParahById($id)
    {
        $rset = $this->mysql->select('*',"co_suratmasuk","no_agendasurat='$id'");
        return $rset;
    }
    public function getSuke()
    {
        $rset = $this->mysql->select('*',"co_suratkeluar","","");
        return $rset;
    }
	    public function getSukeById($id)
    {
        $rset = $this->mysql->select('*',"co_suratkeluar","idsuke='$id'");
        return $rset;
    }
	public function getISMById($id)
    {
        $rset = $this->mysql->select('*',"co_statussurat","id='$id'");
        return $rset;
    }
    // Your going to need some way to add and edit your news entries right?
    // well here ya go :P

    // This function will save you lots of time writing out the fields variable everytime.
    public function buildFields($post, $sep=" ") // $post comes in as an array of variables.
    {
        $fields = ""; // This makes sure we don't run into any past fields.
        foreach($post as $key => $value)
        {
            // foreach will take each element of the $post array and seperate
            // each of the values with its key $post[key] = value;
            $value = mysql_escape_string($value); // We'll do a small security check here.
            // I'll explain that in another tutorial. Basically it protect mysql from hackers.
            if($i == 0)
                $fields .= "$key='$value'";
            else
                $fields .= $sep . "$key='$value'";
            // This will create your fields string based on each element in the post array.
            $i++;
        }
        return $fields; // Return the string, $fields.
    }
    public function addSurat($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_suratmasuk",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function addSuratKeluar($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_suratkeluar",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }    // This function is just the same as addnews, except that it updates an existing record.
    public function editSurat($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['idsurat']; // retreive the newsId we need to update
        if( $this->mysql->update("co_suratmasuk",$fields,"idsurat='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	 public function addStatusSurat($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_statussurat",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // This function is just the same as addnews, except that it updates an existing record.
    public function editStatusSurat($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['id']; // retreive the newsId we need to update
        if( $this->mysql->update("co_statussurat",$fields,"id='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function editSuratKeluar($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['idsuke']; // retreive the newsId we need to update
        if( $this->mysql->update("co_suratkeluar",$fields,"idsuke='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteMail($newsId)
    {
        if( $this->mysql->delete("co_suratmasuk","idsurat='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	    public function deleteMailOut($newsId)
    {
        if( $this->mysql->delete("co_suratkeluar","idsuke='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
		    public function deleteISM($newsId)
    {
        if( $this->mysql->delete("co_statussurat","id='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
