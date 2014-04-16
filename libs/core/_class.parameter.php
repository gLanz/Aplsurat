<?php
//require_once 'mysql.php'; // include this file so we can use the Mysql Class inside this class as well.
	//print 1;
class Parameter
{
    // In this class we'll have a few variables to be used by the class.
    var $mysql; // the mysql variable that will hold the Mysql Object.

    public function __construct()
    {
        $this->mysql = new Mysql(); // Connect to mysql and the database so we can use it.
    }
    // This function does what it says, it gets all of the current news records from the db.
    public function getSetup()
    {
        $rset = $this->mysql->select('*',"co_setconfig","id='1'");
        return $rset;
    }
	public function getUser($id)
    {
        $rset = $this->mysql->select('*',"co_account","acc_id='$id'");
        return $rset;
    }
    public function getKategoriAkun($name)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$name'");
        return $rset;
    }
	
	public function getKategoriCount($id,$group)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$group' and id='$id'");
        return $rset;
    }

	public function getAlbum($group)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$group'");
        return $rset;
    }
	
	public function getJenisKategoriById($xid,$group)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$group' and id='$xid'");
        return $rset;
    }
	
	public function getKategoriSelect()
    {
        $rset = $this->mysql->select('*',"co_produkkategori");
        return $rset;
    }
	
	public function getSelectKatById($xid)
    {
        $rset = $this->mysql->select('*',"co_produkkategori","idkat='$xid'");
        return $rset;
    }
	public function getAmbilProduk($group)
    {
        $rset = $this->mysql->select('*',"co_produk","idkat='$group'");
        return $rset;
    }
	public function getAkunByAccess($id)
    {
        $rset = $this->mysql->select('*',"co_account","level='$id'");
        return $rset;
    }
	public function getAkunAccesById($id)
    {
        $rset = $this->mysql->select('*',"co_account_access","acc_id='$id'");
        return $rset;
    }
	public function getParameterById($name,$idnya)
    {
        $rset = $this->mysql->select('*',"co_parameter","name='$name' and id='$idnya'");
        return $rset;
    }
	

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
    public function addKategori($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_parameter",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }    
	public function addParameter($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_parameter",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // This function is just the same as addnews, except that it updates an existing record.
    public function editAlbum($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['id']; // retreive the newsId we need to update
        if( $this->mysql->update("co_parameter",$fields,"name='kat_galeri' and id='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	public function editParameter($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['id']; $kode=$post['name'];// retreive the newsId we need to update
        if( $this->mysql->update("co_parameter",$fields,"id='$newsId' and name='$kode'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

	public function editSetup($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['id']; // retreive the newsId we need to update
        if( $this->mysql->update("co_setconfig",$fields,"id='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteAlbum($id,$name)
    {
        if( $this->mysql->delete("co_parameter","name='$name' and id='$id'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function deleteParameter($id,$name)
    {
        if( $this->mysql->delete("co_parameter","name='$name' and id='$id'") )
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
