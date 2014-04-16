<?php
//require_once 'mysql.php'; // include this file so we can use the Mysql Class inside this class as well.

class Template
{
    // In this class we'll have a few variables to be used by the class.
    var $mysql; // the mysql variable that will hold the Mysql Object.

    public function __construct()
    {
        $this->mysql = new Mysql(); // Connect to mysql and the database so we can use it.
    }
    // This function does what it says, it gets all of the current news records from the db.
    public function getTeSelect($xid)
    {
        $rset = $this->mysql->select('*',"tbl_template","xtemp_id='$xid'");
        return $rset;
    }
    public function getKategori()
    {
        $rset = $this->mysql->select('*',"co_isiwebkategori");
        return $rset;
    }

    public function getContentById($id)
    {
        $rset = $this->mysql->select('*',"co_menu","me_id='$id'");
        return $rset;
    }
	public function getContentBaru()
    {
        $rset = $this->mysql->select('*',"co_isiweb","","isi_tgl DESC","0,5");
        return $rset;
    }
	public function getContentHits()
    {
        $rset = $this->mysql->select('*',"co_isiweb","","isi_hits DESC","0,5");
        return $rset;
    }

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
    public function addNews($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_isiweb",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // This function is just the same as addnews, except that it updates an existing record.
    public function editTemplate($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['xtemp']; // retreive the newsId we need to update
        if( $this->mysql->update("tbl_template",$fields,"xtemp='$newsId'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	public function editHits($id)
    {
        //$newsId = $post['id']; // retreive the newsId we need to update
        if( $this->mysql->update("co_isiweb","isi_hits=isi_hits+1","isi_id='$id'") )
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deleteNews($newsId)
    {
        if( $this->mysql->delete("cs_news","newsId='$newsId'") )
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
