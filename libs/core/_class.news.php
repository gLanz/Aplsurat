<?php
//require_once 'mysql.php'; // include this file so we can use the Mysql Class inside this class as well.

class News
{
    // In this class we'll have a few variables to be used by the class.
    var $mysql; // the mysql variable that will hold the Mysql Object.

    public function __construct()
    {
        $this->mysql = new Mysql(); // Connect to mysql and the database so we can use it.
    }
    // This function does what it says, it gets all of the current news records from the db.
    public function getNewsLimitHome($posisi,$batas,$id)
    {
        $rset = $this->mysql->select('*',"co_news","idk='$id'","berita_id DESC","$posisi,$batas");
        return $rset;
    }
    public function getNewsLimit($posisi,$batas)
    {
        $rset = $this->mysql->select('*',"co_news","","berita_id DESC","$posisi,$batas");
        return $rset;
    }
    public function getNewsLimitStic($id)
    {
        $rset = $this->mysql->select('*',"co_news","idk='$id'","berita_id DESC","5");
        return $rset;
    }


    // You should update this function how you see fit. You could add more params to return only
    // the fields you want.

    // This will get a single record in the database.
    public function getNewsById($id)
    {
        $rset = $this->mysql->select('*',"co_news","berita_id='$id'");
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
    public function addNews($post)
    {
        $fields = $this->buildFields($post, ", "); // take the post array and break it into a string.
        if( $this->mysql->insert("co_news",$fields) ) // This is pretty basic. Inserts the new news record.
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // This function is just the same as addnews, except that it updates an existing record.
    public function editNews($post)
    {
        $fields = $this->buildFields($post, ", ");
        $newsId = $post['newsId']; // retreive the newsId we need to update
        if( $this->mysql->update("co_news",$fields,"newsId='$newsId'") )
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
        if( $this->mysql->delete("co_news","berita_id='$newsId'") )
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
